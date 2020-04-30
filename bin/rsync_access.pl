#!/usr/bin/perl
#
# $Id: rsync_access.pl 142492 2013-01-28 19:32:52Z weaver $
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
my $logname = 'messages';
my $logdir = '/var/log';
my $dbfile = 'rsync-access.sqlite';
my $logformat = 'common';
GetOptions( 'test' => \$test, 'verbose' => \$verbose, 'logname=s' => \$logname,
    'db=s' => \$dbfile, 'format=s' => \$logformat);
my %formats = (
    #
    # syslog format
    #
    'common' => qr{^([A-Z][a-z][a-z] [ 0-9][0-9] [0-9][0-9]:[0-9][0-9]:[0-9][0-9]) sdss3data (xinetd|rsyncd)\[([0-9]+)\]: (.*)$},
    );
my $mintime = str2time('2012-10-01T00:00:00 -0000');
my $maxtime = str2time('2013-01-01T00:00:00 -0000');
my $now = time();
my %connections;
FILE: for my $file (sort cmp_messages glob("$logdir/$logname*")) {
    print "$file\n";
    my $f = ($file =~ m{\.gz$}) ? IO::File->new("zcat $file |") : IO::File->new($file);
    LINE: while (my $line = <$f>) {
        chomp $line;
        my @match = ($line =~ m/$formats{$logformat}/);
        next LINE if $#match < 3;
        my $date = $match[0];
        my $daemon = $match[1];
        my $daemon_pid = $match[2];
        my $message = $match[3];
        #
        # Time limits
        #
        my $t = str2time($date.' 2013');
        $t = str2time($date.' 2012') if ($t > $now);
        print "$t $daemon $daemon_pid $message\n" if $verbose;
        if ($daemon eq 'xinetd') {
            #
            # Analyze xinetd messages
            #
            my @foo = split(/ /,$message);
            if ($foo[0] eq 'START:' and $foo[1] eq 'rsync') {
                next LINE if ($t < $mintime or $t > $maxtime);
                my $pid = substr($foo[2],index($foo[2],'=')+1);
                my $ip = substr($foo[3],index($foo[3],'=')+1);
                my $key = $t . '+' . $pid;
                my $data = { 'started' => $t, 'xinetd_pid' => $daemon_pid,
                    'xinetd_ip' => $ip };
                if (defined($connections{$pid})) {
                    push @{$connections{$pid}}, $data;
                } else {
                    $connections{$pid} = [ $data ];
                }
            } elsif ($foo[0] eq 'EXIT:' and $foo[1] eq 'rsync') {
                my $status = substr($foo[2],index($foo[2],'=')+1);
                my $pid = substr($foo[3],index($foo[3],'=')+1);
                my $d = substr($foo[4],index($foo[4],'=')+1);
                my $units = substr($d,index($d,'('));
                my $duration = substr($d,0,index($d,'('));
                if ($units eq '(sec)') {
                    my @keys = (($t - $duration),
                        ($t - $duration - 1),
                        ($t - $duration + 1));
                    my $key_found = 0;
                    for my $key (@keys) {
                        if (defined($connections{$pid})) {
                            for my $entry (@{$connections{$pid}}) {
                                if ($entry->{'started'} == $key) {
                                    $key_found = 1;
                                    $entry->{'ended'} = $t;
                                    $entry->{'duration'} = $duration;
                                    $entry->{'units'} = $units;
                                    $entry->{'status'} = $status;
                                }
                            }
                        }
                    }
                    if (! $key_found) {
                        if (($t - $duration) < $mintime) {
                            print "Connection started before time window: $line\n" if $verbose;
                        } elsif (($t - $duration) > $maxtime) {
                            print "Connection started after time window: $line\n" if $verbose;
                        } else {
                            print "Could not find matching connection: $line\n";
                        }
                        next LINE;
                    }
                } else {
                    print "Oddball units: $line\n";
                    next LINE;
                }
            } else {
                print "$line\n" if $verbose;
                next LINE;
            }
        } else {
            #
            # Analyze rsync messages
            #
            my @foo = split(/\s+/,$message);
            if ($foo[0] eq 'sent' or "$foo[0] $foo[1]" eq 'rsync on') {
                if (defined($connections{$daemon_pid})) {
                    SCAN: for my $entry (@{$connections{$daemon_pid}}) {
                        next SCAN if defined($entry->{'ended'});
                        if ($foo[0] eq 'sent') {
                            $entry->{'sent'} = $foo[1];
                            $entry->{'received'} = $foo[4];
                            $entry->{'total'} = $foo[8];
                        }
                        if ("$foo[0] $foo[1]" eq 'rsync on') {
                            $entry->{'url'} = $foo[2];
                            $entry->{'hostname'} = lc($foo[4]);
                            $entry->{'rsync_ip'} = substr($foo[5],1,index($foo[5],')')-1);
                        }
                    }
                }
            }
        }
    }
    $f->close();
}
#
# Find unique IP addresses.
#
my %ips;
for my $key (keys(%connections)) {
    for my $entry (@{$connections{$key}}) {
        if (defined($entry->{'ended'}) and defined($entry->{'rsync_ip'}) and defined($entry->{'sent'})) {
            if ($entry->{'rsync_ip'} eq $entry->{'xinetd_ip'}) {
                if (defined($ips{$entry->{'xinetd_ip'}})) {
                    if ($ips{$entry->{'xinetd_ip'}} ne $entry->{'hostname'}) {
                        print "Hostname change: ", format_connection($entry),", was ",$ips{$entry->{'xinetd_ip'}},"\n";
                    }
                } else {
                    $ips{$entry->{'xinetd_ip'}} = $entry->{'hostname'};
                }
            } else {
                print "Weird IP address: ",format_connection($entry),"\n";
            }
        }
    }
}
#
# Open db connection
#
my $dbh = DBI->connect("dbi:SQLite:$dbfile",'','',
    {'RaiseError' => 1, 'AutoCommit' => 0});
#
# Add IP addresses
#
my $do = "CREATE TABLE ipaddress (id INTEGER PRIMARY KEY AUTOINCREMENT, ip TEXT UNIQUE NOT NULL, hostname TEXT);";
print "$do\n" if $verbose;
$dbh->do($do);
my $sth = $dbh->prepare("INSERT INTO ipaddress (ip, hostname) VALUES ( ?, ? );");
for my $k (keys(%ips)) {
    $sth->execute($k,$ips{$k});
}
$dbh->commit;
#
# Create main table.
#
my $schema = <<EOT;
CREATE TABLE connection (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    ip INTEGER NOT NULL,
    started INTEGER NOT NULL, -- Unix time
    ended INTEGER NOT NULL, -- Unix time
    duration INTEGER NOT NULL,
    status INTEGER NOT NULL,
    sent INTEGER NOT NULL,
    received INTEGER NOT NULL,
    total INTEGER NOT NULL,
    url TEXT --,
    -- FOREIGN KEY (ip) REFERENCES ipaddress(id),
);
EOT
print "$schema\n" if $verbose;
$dbh->do($schema);
$dbh->commit;
#
# Get mappings
#
my $rows = $dbh->selectall_arrayref("SELECT id, ip FROM ipaddress;");
my %ipmap;
for my $r (@{$rows}) {
    $ipmap{$r->[1]} = $r->[0];
}
#
# Insert the real data
#
$sth = $dbh->prepare("INSERT INTO connection (ip,started,ended,duration,status,sent,received,total,url) VALUES (?,?,?,?,?,?,?,?,?);");
for my $key (keys(%connections)) {
    for my $d (@{$connections{$key}}) {
        if (defined($d->{'ended'}) and defined($d->{'rsync_ip'}) and defined($d->{'sent'})) {
            my @values = ( $ipmap{$d->{'xinetd_ip'}}, $d->{'started'}, $d->{'ended'},
                $d->{'duration'}, $d->{'status'}, $d->{'sent'},
                $d->{'received'}, $d->{'total'}, $d->{'url'});
            $sth->execute(@values);
        }
    }
}
$dbh->commit;
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
sub format_connection
{
    my $entry = shift;
    my $started = gmtime($entry->{'started'});
    my $hostname = defined($entry->{'hostname'}) ? $entry->{'hostname'} : '';
    return "Connection from $entry->{xinetd_ip} ($hostname) started at $started.";
}
#
#
#
END {
    $dbh->disconnect;
}
