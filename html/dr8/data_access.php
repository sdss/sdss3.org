<?php include '../header.php'; echo head('Data Access for SDSS DR8'); ?>

<h2>Introduction</h2>
<p>
We provide data access for Data Release 8 (DR8) through two main
sources: the Science Archive Server (SAS) and the Catalog Archive Server (CAS).
In general, SAS is designed for access to the full dynamic range FITS
images and the actual spectra, whereas CAS is designed for access to the
catalog-level results through an SQL database interface. This page
summarizes the tools; more information is given in the <a
href="dr8/imaging/imaging_access.php">image data access</a> and <a
href="dr8/spectro/spectro_access.php">spectroscopic data access</a>
pages.
</p>

<h2 id="CAS">Data access tools for CAS:</h2>

<?php include 'cas_summary_table.html'; ?>

<h2 id="SAS">Data access tools for SAS:</h2>

<p> The <a href="http://data.sdss3.org">Science Archive Server</a>
provides an interface to interactively view and download SDSS spectra,
images of SDSS fields, and to generate mosaics of those fields. In
addition, SAS contains directory structures with the data in flat file
formats. The links below lead to these directories. To navigate these
directories successfully, please study the <a
href="http://data.sdss3.org/datamodel">detailed data model</a> as well
as the basics of <a href="dr8/spectro/spectro_basics.php">SDSS
spectroscopy</a> and <a href="dr8/imaging/imaging_basics.php">SDSS
imaging</a>.  </p>

<?php include 'sas_summary_table.html'; ?>

<p>Occasionally users require quick access for analysis to essentially
all of the objects detected in the images. For this purpose, we provide a subset of the
objects and the quantities associated with them in the so-called "datasweep"
files. The datasweep catalogs require for each object that it have a solid
detection in at least one band; in addition, not all of the quantities are
reported for each object. While they therefore form a subset of the full
dataset, for many purposes they are sufficient. For example, the BOSS
galaxy and quasar target selection is performed on the basis of the sweeps.</p>

<p> The 'corrected' frames have been flat-fielded and bias-subtracted; bad
columns and cosmic rays have been interpolated over, and sky has been subtracted.</p>

<p>Essentially all of the data input into CAS is included in some
form in the SAS. However, there are some small changes in naming convention
(for example, "resolve_status" in SAS flat files is referred to as
"resolveStatus" in CAS).
</p>

<h2 id="VAC">Value-Added Catalogs</h2>

<h3>Introduction</h3>

<p>In addition to the primary SDSS-III photometry and spectroscopy, there are a few
extra catalogs created by our collaborators that are distributed through the SAS.</p>

<h3>XDQSO</h3>

<p><a href="http://adsabs.harvard.edu/abs/2011ApJ...729..141B">Bovy et al. (2011)</a> describes a
technique for QSO target selection based on an extreme deconvolution method.
The associated catalog is available
<a href="http://data.sdss3.org/sas/dr8/groups/boss/photoObj/xdqso">here</a>.  The
files in the catalog are described in the
<a href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/xdqso/xdcore/xdcore_RUN6.html">data model</a>.
</p>

<h3>Photometric Redshift Distributions</h3>

<p><a href="http://www.example.com/">Sheldon et al. (2011)</a> have created a set of
photometric redshift probability distributions for SDSS-III objects.  The
catalog is available
<a href="http://data.sdss3.org/sas/dr8/groups/boss/photoObj/photoz-weight">here</a>.  The
files in the catalog are described in the
<a href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/photoz-weight/pofz.html">data model</a>.
</p>

<h2 id="volume">Data Volume</h2>

<p>The table below lists the sizes of the various data products in DR8.  Note
that the total data volume is 49.6&nbsp;TB.  However, a substantial fraction (~50%)
of this is raw or intermediate data that is primarily of interest to
experts.  If your institution requires most or all of this
data you may email us at <a
href="mailto:helpdesk@sdss.org">the helpdesk</a> to contact a
data transfer expert.</p>

<?php include 'dr8_volume_table.html'; ?>

<h2 id="rsync">rsync</h2>

<p>Data can be downloaded directly using the <a
href="http://www.samba.org/rsync/features.html">rsync (samba.org)</a>
tool. Subsets of the data can be selected either by accessing
sub-directories or using the advanced filtering features of rsync.
The following example bash script shows how to sync a file to the
current local directory.</p>
<pre>
#!/bin/bash
host=data.sdss3.org
remotefile=dr8/common/sdss-spectro/redux/plates-dr8.fits
#
# Classic rsync form
#
rsync -av "$host::$remotefile" .
#
# Alternate URL form
#
# rsync -av "rsync://$host/$remotefile" .
</pre>
<p>Any path to data (<i>i.e.</i> part of a http URL)
in the dr8 tree will commence with '/sas/dr8'.  However,
that same path is visible to rsync by <i>removing</i> '/sas'.  For example,
these two URLs would retrieve the same file:</p>
<pre>
http://data.sdss3.org/sas/dr8/common/sdss-spectro/redux/plates-dr8.fits

rsync://data.sdss3.org/dr8/common/sdss-spectro/redux/plates-dr8.fits
</pre>

<p>Note there are many terabytes of data under the /sas/dr8 hierarchy,
please use the rsync command with care.  If your institution needs this much
data you may email us at <a
href="mailto:helpdesk@sdss.org">the helpdesk</a> to contact a
data transfer expert.</p>


<?php echo foot(); ?>

