<?php include '../../header.php'; echo head('idlutils'); ?>

<h2>Documentation</h2>

<p>idlutils is a collection of IDL utilities useful for astronomical
applications, developed by an assortment of folks over the
years. Various pipelines for the Sloan Digital Sky Survey and other
projects rely on tools from this product.</p>

<p>Also included within idlutils is a version of the
<a href="http://idlastro.gsfc.nasa.gov/">Goddard utilities</a>
maintained by Wayne Landsman, copied here for convenience but
also to establish versioning. Many thanks to the intrepid authors
of those utilities!</p>

<p>Documentation of individual routines can be found below:</p>

<ul>
<li><a href="dr9/software/idlutils_doc.php">idlutils software</a></li>
<li><a href="dr9/software/goddard_doc.php">Goddard utilities</a></li>
</ul>

<h2>Download Instructions</h2>

<p>To download the latest tagged version of idlutils, use
<a href="http://subversion.apache.org/">svn</a> ("subversion").  On most
Unix machines you should be able to execute:</p>

<pre>
svn export http://www.sdss3.org/svn/repo/idlutils/tags/v5_5_5 idlutils
</pre>

<p>Version <code>v5_5_5</code> has the most up-to-date Goddard utilities
and supports Mac OS 10.7 (Lion).  To list other available tags, use the command:</p>

<pre>
svn ls http://www.sdss3.org/svn/repo/idlutils/tags
</pre>

<p>If you want to keep up-to-date on the latest, evolving version
(the "trunk" in SVN parlance), then execute:</p>

<pre>
svn co http://www.sdss3.org/svn/repo/idlutils/trunk idlutils
</pre>

<p>Afterward, an "svn up" in the idlutils directory will update your
working copy.</p>

<p>These access points are read-only.  If you want to develop or add
to the idlutils software you must be an SDSS-III collaborator.  See
the <a href="https://trac.sdss3.org/wiki/Software/SVNTutorial">SDSS-III
svn tutorial</a> for further instructions.</p>

<h2>Installation</h2>

<h3>Prerequisites</h3>

<ol>
<li>You do <em>not</em> need to install IDL, buy a license, <em>etc.</em> to
install idlutils.  However, you <em>do</em> need a copy of IDL's <code>export.h</code>
file.  If you already have IDL installed, set the environment variable <code>IDL_DIR</code>
to the directory containing the <code>external</code> directory.  The
<code>external</code> directory should contain the <code>export.h</code> file.
If you do not have IDL installed, but do have an <code>export.h</code> file,
then you can place that file in a directory called <code>external</code> then
place that directory in any directory you want and set  <code>IDL_DIR</code>
to the directory containing <code>external</code>.</li>
<li>You need both a C compiler and a Fortran compiler.</li>
<li>If you want to build the documentation, you <em>must</em> have IDL installed,
and the executable <code>idl</code> must live somewhere in your <code>PATH</code>.
Note that some IDL installations define the executable <code>idl</code> as a
shell alias, and thus it will not be in your <code>PATH</code>.</li>
</ol>

<h3>Compilation</h3>

<p>After exporting or checking out the code, set the environmental
variable <code>IDLUTILS_DIR</code> to the location of your idlutils directory.
Then set the variables:</p>

<pre>
export PATH=$IDLUTILS_DIR/bin:$PATH
export IDL_PATH=+$IDLUTILS_DIR/pro:$IDL_PATH
export IDL_PATH=+$IDLUTILS_DIR/goddard/pro:$IDL_PATH
</pre>

<p>Of course, you should put those commands into your <code>.bash_profile</code>
or (suitably modified) into your <code>.tcshrc</code> file where appropriate.</p>

<p>To build the code, execute:</p>

<pre>
cd $IDLUTILS_DIR
evilmake all
</pre>

<p>This will build all of the C libraries.</p>

<p>To build the documentation (see the Prerequisites above), execute:</p>

<pre>
cd $IDLUTILS_DIR
make doc
</pre>

<p>Special cases: For EUPS-users (you know who you are), there is an
idlutils.table file in the ups directory.  For users of the SDSS-III
"sdss3tools" product, a full export/make/install can be executed with
"sdss3install".</p>

<h2>Don't Blame Us</h2>

<p>No warranty is expressed or implied or anything regarding this
software.</p>

<?php echo foot(); ?>
