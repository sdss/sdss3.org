<?php include '../../header.php'; echo head('Parameter Files'); ?>

<h2>Introduction</h2>

<p>Parameter files are ASCII files with the extension .par.  They are
extensively used in SDSS-III data for storing moderate amounts of data
in a form that is both human and machine readable. Parameter files are
sometimes informally called 'Yanny' files, or, more rarely, 'FTCL' files.</p>

<p>Originally, they were designed to be written and read by the FTCL package,
'dervish'.  However, in SDSS-III software, they are most commonly used with
IDL, perl and Python.</p>

<h2>Formal Description</h2>

<h3>Contents</h3>

<p>A parameter file may contain the following five things.  They are
described in detail below.</p>

<ol>
<li>Comments and blank lines.</li>
<li>Keyword-value pairs.</li>
<li>Enumeration definitions.</li>
<li>Table definitions.</li>
<li>Data lines.</li>
</ol>

<h3>Comments</h3>

<p>The 'hash' or 'pound' sign: #, introduces a comment.  Anything after a #
sign is ignored.  Blank lines are also ignored.  Comments may follow other
data on a line, for example:</p>

<pre>
mjd 54321 # MJD of the observation.
</pre>

<h3>Keyword-Value Pairs</h3>

<p>A line may contain a keyword-value pair.  The first word is the key, and
the remainder of the line is the value (excluding comments). For example:</p>

<pre>
mjd 54321 # MJD of the observation.
filters u g r i z # List of filters.
</pre>

<p>The keys are 'mjd' and 'filters' and the values are '54321' and 'u g r i z'.
Note that no further processing is done to the values.  They are treated as
literal strings.</p>

<p>In at least some software packages, the set of keyword-value pairs is
called the 'header', analogous to a FITS-file header.</p>

<h3>Enumerations</h3>

<p>Enumerations are similar to the enum type in C.  They can be used to limit
the values a variable in a table may have.  Note that in software implementations,
enums are not converted to integers, but retain their string values. The
definition of an enum is essentially identical to the C definition:</p>

<pre>
typedef enum {
    FAILURE,
    INCOMPLETE,
    SUCCESS
} STATUS;
</pre>

<p>Enumeration values (above, FAILURE, INCOMPLETE, SUCCESS) should be all-caps, and
newlines should separate the comma-separated entries in the typedef definition of the
enum.</p>

<h3>Tables</h3>

<p>Tables, also called 'structures', are the main component of parameter
files.  They are used to define subsequent data lines (see below).
Table definitions are similar to struct definitions in C. For example:</p>

<pre>
typedef struct {
    float mag[5];
    char b[5][20];
    double c;
    int flags[2];
    STATUS state;
} MYSTRUCT;
</pre>

<p>The name of the table should be in all capitals. The underscore
character and digits (0-9) are also permitted. The values defined in the
definition are the columns of the table.</p>

<p>Variables defined in tables may have the following types.</p>

<ul>
<li><b>short</b> - 16-bit integer.</li>
<li><b>int</b> - 32-bit integer.</li>
<li><b>long</b> - 64-bit integer.</li>
<li><b>float</b> - 32-bit floating point.</li>
<li><b>double</b> - 64-bit floating point.</li>
<li><b>char[N]</b> - Character string of length N.</li>
<li><b>enum</b> - A named enum type.  In the example above, the 'state'
variable has enumerated type STATUS.</li>
</ul>

<p>All types can be arrays.  Arrays are declared by adding the length of the
array in square brackets after the name of the variable.  One exception to this
is for character arrays.  In the example above, the char variable 'b' is an array
of 5 strings of length 20, not an array of 20 strings of length 5.  This
may seem counter-intuitive at first, but this is exactly how arrays of
strings are declared in C. Multi-dimensional arrays are not supported.</p>

<p>Strings may also be declared with an empty length, for example,
'char comment[];'.  This is not considered good practice, but most software
packages support this.</p>

<p>A parameter file may have multiple table definitions, as long as they
have different names.</p>

<h3>Data</h3>

<p>Data that is defined by a table is stored on a single line (a row) starting with
the name of the table. Continuing the example above, a data line would
look like:</p>

<pre>
MYSTRUCT {17.5 17.546 17.4 16.1 16.0} {the rain in "spain is" wet} 1.24345567 {123123 1231213} INCOMPLETE
MYSTRUCT {17.5 17.446 17.4 16.1 16.0} {the snow in chile "is dry"} \
    7.24345567 {123123 0} SUCCESS
</pre>

<p>There are several things to note here.</p>

<ul>
<li>The first word on the line is the name of the table.  Since a
parameter file may have multiple table definitions, this is absolutely
essential.  It is good practice to have the name of the table in all
capitals to match the table name exactly, though in software
implementations, lower-case table names are also interpreted as
belonging to the correct table.</li>
<li>Data is separated by white space.  Thus, if a string contains white
space, it <i>must</i> enclosed in double quotes.  However, if a string does
not contain white space, quotes are not necessary.  Empty strings are
allowed and must be designated with empty double quotes ("").</li>
<li>Arrays are delimited by curly braces ({}).</li>
<li>Long data lines may be continued onto a new line by adding a backlash
character (\) to the preceding line. Note, however, that most software
packages do not <i>write</i> long lines onto multiple lines, though they
can <i>read</i> them.</li>
</ul>

<h3>Deprecated Features</h3>

<p>The following features may exist in very old parameter files.  Some
software packages support them, but they should never be used in practice.</p>

<ul>
<li>Arrays may be declared with angle brackets (&lt; &gt;) rather than square
brackets.</li>
<li>Empty double braces ({{}}) can stand for empty double quotes, that is, an
empty string.</li>
</ul>

<h2>Software</h2>

<h3>IDL</h3>

<p>Parameter files may be read and written by routines in the
<a href="http://www.sdss3.org/svn/repo/idlutils/trunk/pro/yanny/">yanny directory</a>
of the <a href="dr9/software/idlutils.php">idlutils</a> package.
The function <a
href="dr9/software/idlutils_doc.php#YANNY_READONE">yanny_readone</a>
is most commonly used, but should be used with caution as it is intended for
files with only one table definition. Here is a simple example of the use
of yanny_readone:</p>

<pre>
IDL&gt; a= yanny_readone('sdReport-52059.par', hdr=hdr)
IDL&gt; HELP, a, /STRUCTURE
</pre>

<p>Keywords may be retrieved from the header with <a
href="dr9/software/idlutils_doc.php#YANNY_PAR">yanny_par</a>:</p>

<pre>
IDL&gt; PRINT, yanny_par(hdr,'equinox')
</pre>

<p>More complicated parameter files can be read with <a
href="dr9/software/idlutils_doc.php#YANNY_READ">yanny_read</a>,
but this requires some knowledge of IDL pointers:</p>

<pre>
IDL&gt; yanny_read, 'sdReport-52059.par', a, hdr=hdr
IDL&gt; HELP, *a[0], /STRUCTURE
IDL&gt; HELP, *a[1], /STRUCTURE
</pre>

<p>The MJDs in the first structure can be printed with</p>

<pre>
IDL&gt; PRINT, (*a[0]).mjd
</pre>

<h3>Python</h3>

<p>Parameter files may be read and written by methods of the yanny
class defined in the <a href="http://www.sdss3.org/svn/repo/yannytools/trunk/python/yanny.py">yanny module</a>.
Recent versions of this class can automatically convert between yanny files and
NumPy record arrays.</p>

<pre>
&gt;&gt;&gt; import yanny
&gt;&gt;&gt; par = yanny.yanny('sdReport-52059.par', np=True)
&gt;&gt;&gt; print par['SEXP']['mjd']
&gt;&gt;&gt; print par['equinox']
</pre>

<h3>Perl</h3>

<p>Parameter files may be read and written by methods of the
<a href="http://www.sdss3.org/svn/repo/yannytools/trunk/perl5/SDSS3/Yanny.pm">SDSS3::Yanny</a>
class.  The methods and functionality are similar to Python.  Since
object-oriented programming in Perl is a bit esoteric, a historical wrapper
module, <a href="http://www.sdss3.org/svn/repo/yannytools/trunk/perl5/efftickle.pm">efftickle</a>,
is provided, which contains functions similar to those in IDL.</p>

<pre>
use SDSS3::Yanny;
my $par = SDSS3::Yanny-&gt;new('sdReport-52059.par');
print join(', ',@{$par-&gt;{'SEXP'}-&gt;{'mjd'}}), "\n";
print $par-&gt;{'equinox'}, "\n";
</pre>

<pre>
use efftickle;
my %par = read_yanny('sdReport-52059.par');
print join(', ',@{$par{'SEXP'}-&gt;{'mjd'}}), "\n";
print $par{'equinox'}, "\n";
</pre>

<h3>FTCL</h3>

<p>SDSS legacy software, such as photo or plate, uses an old tcl
modification called 'dervish'.  This language has tools to read and
write parameter files, most comprehensively explained by <a
href="http://home.fnal.gov/~neilsen/notebook/dervish.html">Eric Neilsen's Dervish site</a>
at Fermilab.</p>

<p>Within any dervish-based shell, one can read an FTCL parameter file using the
command "param2Chain".  For example, to read the file '$fileName':</p>

<pre>
ftcl&gt; set chains [param2Chain $fileName keys]
</pre>

<p>The keyword/value pairs will be returned as a TCLX keyed list in the variable
'keys'.  Each table will be read into a DERVISH chain.  The list of chains is
returned by the command as a TCL list.</p>

<p>Say we have a TCLX keyed list stored in the variable "keys", and two chains
with the handles "h1" and "h2" that we wish to write to an FTCL parameter file
named "$outFileName""</p>

<pre>
ftcl&gt; chain2Param $outFile "h1 h2" keys
</pre>

<p>Both commands have various options to control how the files are read and
written.  See their documentation for more details.</p>

<h2>Historical Note</h2>

<p>This description is based on
<a href="http://www.sdss.org/dr6/dm/flatFiles/yanny.html">the original parameter file definition</a>.</p>

<?php echo foot(); ?>
