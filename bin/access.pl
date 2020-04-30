#!/usr/bin/perl
#
# $Id: access.pl 147950 2013-07-11 21:45:57Z sdss3svn $
#
use warnings;
use strict;
use Getopt::Long;
use IO::File;
use DBI;
use Date::Parse;
#
# Get options
#
my $test = 0;
my $verbose = 0;
my $logname = 'access_log';
my $logdir = '/var/log/httpd';
my $dbfile = 'access.sqlite';
my $logformat = 'common';
GetOptions( 'test' => \$test, 'verbose' => \$verbose, 'logname=s' => \$logname,
    'db=s' => \$dbfile, 'format=s' => \$logformat);
my %formats = (
    #
    # apache 'common' log format
    #
    'common' => qr{^([0-9a-f.:]+)\s-\s(.+)\s\[([^]]+)\]\s"([^"]*)"\s([0-9]+)\s([-0-9]+|-)$},
    #
    # apache 'combined' log format
    #
    'combined' => qr{^([0-9a-f.:]+)\s-\s(.+)\s\[([^]]+)\]\s"([^"]*)"\s([0-9]+)\s([-0-9]+|-)\s"([^"]*)"\s"([^"]*)"$},
    );
#
# Open db connection
#
my $dbh = DBI->connect("dbi:SQLite:$dbfile",'','',
    {'RaiseError' => 1, 'AutoCommit' => 0});
#
# Create mapping tables
#
my %mappings = ( 'ipaddress' => {'__COUNT__' => 1},
    'action' => {'__COUNT__' => 1},
    'protocol' => {'__COUNT__' => 1},
    'response' => {'__COUNT__' => 1},
    'user' => {'__COUNT__' => 1},
    'refer' => {'__COUNT__' => 1},
    'browser' => {'__COUNT__' => 1});
for my $table (keys(%mappings)) {
    my $do = "CREATE TABLE $table (id INTEGER PRIMARY KEY, name TEXT UNIQUE NOT NULL);";
    print "$do\n" if $verbose;
    $dbh->do($do);
}
#
# Create invalid table
#
my $do = "CREATE TABLE invalid (id INTEGER PRIMARY KEY AUTOINCREMENT, request TEXT NOT NULL);";
print "$do\n" if $verbose;
$dbh->do($do);
$do = "INSERT INTO invalid (request) VALUES ('This request was valid.');";
print "$do\n" if $verbose;
$dbh->do($do);
my $invalidindex = 1;
#
# Create main table.
#
my $schema = <<EOT;
CREATE TABLE connection (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    ip INTEGER NOT NULL,
    user INTEGER NOT NULL,
    timestamp INTEGER NOT NULL, -- Unix time
    action INTEGER NOT NULL,
    url TEXT,
    protocol INTEGER NOT NULL,
    response INTEGER NOT NULL,
    size INTEGER NOT NULL,
    refer INTEGER NOT NULL,
    browser INTEGER NOT NULL,
    invalid INTEGER NOT NULL --,
    -- FOREIGN KEY (ip) REFERENCES ipaddress(id),
    -- FOREIGN KEY (user) REFERNCES user(id),
    -- FOREIGN KEY (action) REFERENCES action(id),
    -- FOREIGN KEY (protocol) REFERENCES protocol(id),
    -- FOREIGN KEY (response) REFERENCES response(id),
    -- FOREIGN KEY (browser) REFERENCES browser(id),
    -- FOREIGN KEY (invalid) REFERENCES invalid(id)
);
EOT
print "$schema\n" if $verbose;
$dbh->do($schema);
$dbh->commit;
#
# Prepare insert statements
#
my $dth = $dbh->prepare("INSERT INTO connection (ip,user,timestamp,action,url,protocol,response,size,refer,browser,invalid) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
my $ith = $dbh->prepare("INSERT INTO invalid (request) VALUES (?);");
#
# Read the log files
#
my @order = qw{ipaddress user date request response size refer browser};
my $mintime = str2time('2012-01-01T00:00:00 -0000');
my $maxtime = str2time('2014-01-01T00:00:00 -0000');
FILE: for my $file (sort cmp_messages glob("$logdir/$logname*")) {
    print "$file\n";
    my $f = ($file =~ m{\.gz$}) ? IO::File->new("zcat $file |") : IO::File->new($file);
    LINE: while (my $line = <$f>) {
        chomp $line;
        print "$line\n" if $verbose;
        #
        # Convert escaped quotation marks
        #
        if ($line =~ m{\\"}) {
            if ($line =~ m{Mozilla4\.0\\\\"$}) {
                $line =~ s{\\\\"$}{"};
            }
            $line =~ s{\\"}{<EQ>}g if ($line =~ m{\\"});
        }
        my @match = ($line =~ m{$formats{$logformat}});
        if ($#match < 5) {
            print "$line\n";
            next LINE;
        }
        my %data;
        for my $k (0..$#match) {
            $data{$order[$k]} = $match[$k];
        }
        #
        # Restore escaped quotation marks
        #
        for my $k (qw{request refer browser}) {
            if (defined($data{$k})) {
                $data{$k} =~ s{<EQ>}{\\"}g if ($data{$k} =~ m{\\"});
            }
        }
        if ($data{'request'} =~ m{^[A-Z]+ [^ ]+ [A-Z0-9/.]+ ?$}) {
            my @foo = split(/\s+/,$data{'request'});
            $data{'action'} = $foo[0];
            $data{'url'} = $foo[1];
            $data{'protocol'} = $foo[2];
            if ($data{'url'} =~ m{^//+}) {
                $data{'url'} =~ s{^/+}{/};
            }
        } else {
            $data{'action'}='INVALID';
            $data{'url'}='INVALID';
            $data{'protocol'}='INVALID';
        }
        print "ACTION=$data{action}, URL=$data{url}, PROTOCOL=$data{protocol}\n" if $verbose;
        # print "$line\n" if $size eq '0';
        #
        # Update the mappings
        #
        for my $table (keys(%mappings)) {
            unless (defined($mappings{$table}->{$data{$table}})) {
                $mappings{$table}->{$data{$table}} = $mappings{$table}->{'__COUNT__'};
                my $sth = $dbh->prepare("INSERT INTO $table (id, name) VALUES ( ?,? );");
                $sth->execute($mappings{$table}->{'__COUNT__'},$data{$table});
                $mappings{$table}->{'__COUNT__'} += 1;
            }
        }
        #
        # Time limits
        #
        $data{'date'} = str2time($data{'date'});
        next LINE if ($data{'date'} < $mintime or $data{'date'} > $maxtime);
        $data{'size'} = $data{'size'} eq '-' ? 0 : int($data{'size'});
        print "IP=$data{ipaddress}, ID=$data{user}, DATE=$data{date}, REQUEST=$data{request}, RESPONSE=$data{response}, SIZE=$data{size}\n" if $verbose;
        print "REFER=$data{refer}, BROWSER=$data{browser}\n" if ($verbose && $logformat eq 'combined');
        #
        # Insert the real data
        #
        my $i = 1;
        if ($data{'action'} eq 'INVALID') {
            $ith->execute($data{'request'});
            $invalidindex++;
            $i = $invalidindex;
        }
        my @values = (
            $mappings{'ipaddress'}->{$data{'ipaddress'}},
            $mappings{'user'}->{$data{'user'}},
            $data{'date'},
            $mappings{'action'}->{$data{'action'}},
            $data{'url'},
            $mappings{'protocol'}->{$data{'protocol'}},
            $mappings{'response'}->{$data{'response'}},
            $data{'size'},
            $mappings{'refer'}->{$data{'refer'}},
            $mappings{'browser'}->{$data{'browser'}},
            $i,
            );
        $dth->execute(@values);
    }
    $f->close();
    $dbh->commit;
}
#
# Order messages from oldest to newest.
#
sub cmp_messages ($$)
{
    return message_number($_[1]) <=> message_number($_[0]);
}
#
# Convert a message filename into a number that can be sorted.
#
sub message_number
{
    my $filename = shift;
    my $gz = index($filename,'.gz');
    my $f = $gz >= 0 ? substr($filename,0,$gz) : $filename;
    my $i = index($f,'.');
    my $n = $i >= 0 ? substr($f,$i+1) : 0;
    return $n;
}
#
#
#
END {
    $dbh->disconnect;
}
#
# Here's how you extract all the data from a valid log file line:
# SELECT i.name, u.name, c.timestamp, a.name, c.url, p.name, r.name, c.size, rf.name, b.name
# FROM connection AS c
# JOIN ipaddress AS i ON c.ip = i.id
# JOIN user AS u ON c.user = u.id
# JOIN action AS a ON c.action = a.id
# JOIN protocol AS p ON c.protocol = p.id
# JOIN response AS r ON c.response = r.id
# JOIN refer AS rf ON c.refer = rf.id
# JOIN browser AS b ON c.browser = b.id
# WHERE c.invalid = 1 LIMIT 10;
#
# Here's how you exactly reconstruct a valid log file line:
# SELECT i.name||' - '||u.name||' ['||datetime(c.timestamp,'unixepoch')||'] "'||a.name||' '||c.url||' '||p.name||'" '||r.name||' '||c.size||' "'||rf.name||'" "'||b.name||'"'
# FROM connection AS c
# JOIN ipaddress AS i ON c.ip = i.id
# JOIN user AS u ON c.user = u.id
# JOIN action AS a ON c.action = a.id
# JOIN protocol AS p ON c.protocol = p.id
# JOIN response AS r ON c.response = r.id
# JOIN refer AS rf ON c.refer = rf.id
# JOIN browser AS b ON c.browser = b.id
# WHERE c.invalid = 1 LIMIT 10;
#
