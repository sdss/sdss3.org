<?php include '../../header.php'; echo head('Software Products'); ?>

<h2 id="svn">Subversion Repository</h2>

<h3>Subversion Downloads</h3>

<p>SDSS-III software should be downloaded with
<a href="http://subversion.apache.org/">subversion</a> (a.k.a. svn).
Generally speaking, the products below are organized into three subdirectories.</p>

<ul>
<li><b>trunk</b> - holds the very latest development version of the software.
Stability is not guaranteed, but if you need to track developments in 'real time',
you should check out trunk.</li>
<li><b>tags</b> - holds labeled versions of the software that are intended for
release.</li>
<li><b>branches</b> - holds active development areas that are meant to be
kept separate from trunk.  Only experts should look here.</li>
</ul>

<p>If you <i>only</i> want a copy of the software, a subversion export is
the best option.  For example to download version v5_4_20 of idlutils:</p>

<pre>
svn export http://www.sdss3.org/svn/repo/idlutils/tags/v5_4_20 idlutils-v5_4_20
</pre>

<p>Checking out the trunk of a product (if you really need to do this) is
somewhat different:</p>

<pre>
svn co http://www.sdss3.org/svn/repo/idlutils/trunk idlutils-trunk
</pre>

<p>Your checkout of the trunk can be kept up-to-date by doing 'svn up'.
Consult the <a href="http://svnbook.red-bean.com/">subversion documentation</a>
for further details.</p>

<h3>Publicly Available Software</h3>

<p>This tree can be used to browse files in the SDSS-III software products.</p>

<ul>
<li><a href="http://www.sdss3.org/svn/repo/calibplate">calibplate</a></li>
<li><a href="http://www.sdss3.org/svn/repo/catalogs">catalogs</a>
    <ul>
        <li><a href="http://www.sdss3.org/svn/repo/catalogs/dust">dust</a></li>
        <li><a href="http://www.sdss3.org/svn/repo/catalogs/first">first</a></li>
        <li><a href="http://www.sdss3.org/svn/repo/catalogs/galaxyzoo">galaxyzoo</a></li>
        <li><a href="http://www.sdss3.org/svn/repo/catalogs/galspec">galspec</a></li>
        <li><a href="http://www.sdss3.org/svn/repo/catalogs/gsc">gsc</a></li>
        <li><a href="http://www.sdss3.org/svn/repo/catalogs/marcs">marcs</a></li>
        <li><a href="http://www.sdss3.org/svn/repo/catalogs/rass">rass</a></li>
        <li><a href="http://www.sdss3.org/svn/repo/catalogs/rc3">rc3</a></li>
        <li><a href="http://www.sdss3.org/svn/repo/catalogs/secondary_patches">secondary_patches</a></li>
        <li><a href="http://www.sdss3.org/svn/repo/catalogs/tycho2">tycho2</a></li>
    </ul>
</li>
<li><a href="http://www.sdss3.org/svn/repo/elodie">elodie</a></li>
<li><a href="http://www.sdss3.org/svn/repo/idlspec2d">idlspec2d</a></li>
<li><a href="http://www.sdss3.org/svn/repo/idlutils">idlutils</a></li>
<li><a href="http://www.sdss3.org/svn/repo/photolog">photolog</a></li>
<li><a href="http://www.sdss3.org/svn/repo/photoop">photoop</a></li>
<li><a href="http://www.sdss3.org/svn/repo/ptcoeff">ptcoeff</a></li>
<li><a href="http://www.sdss3.org/svn/repo/pydl">pydl</a></li>
<li><a href="http://www.sdss3.org/svn/repo/sdss3tools">sdss3tools</a></li>
<li><a href="http://www.sdss3.org/svn/repo/sm">sm</a></li>
<li><a href="http://www.sdss3.org/svn/repo/speclog">speclog</a></li>
<li><a href="http://www.sdss3.org/svn/repo/xdqso">xdqso</a></li>
<li><a href="http://www.sdss3.org/svn/repo/yannytools">yannytools</a></li>
</ul>

<h3>Requirements</h3>

<p>Some SDSS-III software products require other products.  Listed below
are the products that require other products in order to function.  In
addition, there are optional software products that will enhance the
functionality of some products, but will not prevent the software from
operating if it is not installed.</p>

<p>Note that many of these products are written in and require
<a href="http://www.ittvis.com/ProductServices/IDL.aspx">IDL</a> to function.</p>

<table class="common">
<caption>Summary of SDSS-III software requirements</caption>
<tr><th>Product</th><th>Requires</th><th>Optional</th></tr>
<tr><td>idlspec2d</td><td>idlutils</td><td>elodie, speclog</td></tr>
<tr><td>idlutils</td><td></td><td>dust, first, rass, rc3, tycho2</td></tr>
<tr><td>photoop</td><td>idlutils</td><td>photolog, ptcoeff, secondary_patches, speclog, yannytools</td></tr>
<tr><td>pydl</td><td>yannytools</td><td>idlutils</td></tr>
<tr><td>xdqso</td><td>idlutils</td><td></td></tr>
</table>

<h3>Read-Write Access</h3>

<p>Read-write access is limited to members of the SDSS-III
collaboration.  If you are a member of the collaboration, you can set up
read-write access by following
<a href="https://trac.sdss3.org/wiki/Software/SVNTutorial">the instructions on the SDSS-III wiki</a>.</p>

<h2 id="sdss3tools">sdss3tools</h2>

<p><b>If you don't know what EUPS is, you should ignore this section.</b></p>

<p>If you use EUPS at your institution, there is a more automated way to
install SDSS-III software.  The procedure below describes how to install
sdss3tools, which will then allow you to install other products.</p>

<ol>
<li>Install EUPS</li>
<li>Download the bootstrap installer:<br />
svn export http://www.sdss3.org/svn/repo/sdss3tools/trunk/bin/sdss3bootstrap</li>
<li>Run the bootstrap installer:<br />
/bin/bash sdss3bootstrap</li>
<li>Get sdss3tools into you path:<br />
setup sdss3tools</li>
</ol>

<p>It will now be possible to install other products by doing, <i>e.g.</i>:</p>

<pre>
sdss3install -c idlutils v5_4_20
</pre>

<?php echo foot(); ?>

