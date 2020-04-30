<?php include '../header.php'; echo head("What&apos;s New in DR8?"); ?>

<p>SDSS Data Release 8 differs from its predecessors, both because
there is additional data, but also in the processing of the data and
in some details of the data distribution. Here we summarize the main
differences between DR8 and DR7: <a
href="dr8/whatsnew.php#newdata">new data</a>, <a
href="dr8/whatsnew.php#newredux">new reductions</a> and
<a href="dr8/whatsnew.php#newformats">new formats</a>. </p>

<h2 id="newdata">New data</h2>

<p>As part of the first two seasons of SDSS-III observations, we
obtained new imaging and spectroscopic data.</p>

<p>From the SDSS imaging camera, there is 3000 square degrees more of
unique imaging coverage, mostly in the Southern Galactic Cap. There
are a small number of runs that were taken as part of SDSS-I and -II
that were not previously released that we include here.</p>

<p>As previously, we include matches to <a
href="http://tdc-www.harvard.edu/catalogs/ub1.html">USNO-B
catalog</a>, the ROSAT All-Sky Survey <a
href="http://www.xray.mpe.mpg.de/rosat/survey/rass-fsc/">Faint Source
Catalogue</a> and <a
href="http://www.xray.mpe.mpg.de/rosat/survey/rass-bsc/">Bright Source
Catalogue</a>, and the <a
href="http://ned.ipac.caltech.edu/cgi-bin/ex_refcode?refcode=1991RC3.9.C...0000d">Third Reference
Catalog</a> (but with object coordinates updated to those listed in
the <a href="http://nedwww.ipac.caltech.edu/">NASA Extragalactic
Database</a> as of Spring 2009). For DR8 we have added matches of the
photometry to the <a
href="http://www.ipac.caltech.edu/2mass/releases/allsky/">2MASS</a>
PSC and XSC All Sky catalogs. Furthermore, we have updated the matches
to the <a href="http://sundog.stsci.edu/">FIRST</a> radio survey
catalog to its 2008 version. </p>

<p>Using the SDSS spectrograph, SEGUE-2 took 211 new plates of data,
or 135,040 more spectra. These new plates use somewhat different
targeting schemes than the SEGUE-1 observations did. In addition,
several new calibration observations of clusters have been taken. </p>

<p>We include in DR8 a small number of plate observations (108) which
were taken as part of SDSS-I and SDSS-II but not included in DR7.
These include 12 plates with no observation at all in DR7; in the
other cases DR7 did not include all observations (MJDs) of the plate.
Some of these plates are excellent quality, some are of lower
signal-to-noise.  Quality flags are available to check each plate for
its individual quality.</p>

<p>Finally, as part of this release, we include detailed target
selection information for all the SEGUE-1 and SEGUE-2 plates.  In
addition, we include the results of target selection as run on the
entire photometric data set. </p>

<h2 id="newredux">New reductions</h2>

<p>In addition, there have been new reductions of all of the data.
The imaging data has been entirely reprocessed, and the stellar
spectroscopy has been re-analyzed with a new stellar parameters
pipeline.</p>

<p>The imaging data has been reprocessed through the latest version
the photometric pipeline (v5_6_3) and re-calibrated and
re-resolved. In more detail:</p>
<ol>
<li> The new photo v5_6_3 improves the sky
subtraction around bright objects.</li>
<li> All of the data has
been recalibration with the "ubercalibration" procedure of <a
href="http://adsabs.harvard.edu/abs/2008ApJ...674.1217P">Padmanabhan
et al. (2008)</a>. </li>
<li> A new version of <a href="dr8/algorithms/resolve.php">resolve</a>,
which determines the unique set of
objects across the survey area, has been run. This version includes
"non-standard" SDSS imaging runs more naturally, and retains more
information about multiply-observed objects.</li>
</ol>
<p>Not all of the old information is pertinent to the new
reductions. For example, there are no "imaging QA pages"; instead each
field is given a "score" to define its quality (as explained in the <a
href="dr8/algorithms/resolve.php">resolve documenation</a>).</p>

<p>Unfortunately, the new reductions introduced some errors in
astrometry, which are quite substantial at declinations greater than
about 41 deg in declination. See the <a
href="dr8/algorithms/astrometry.php#caveats">astrometry algorithms
description</a> for details.</p>

<p>As in DR7 and earlier, we provide "corrected frames" for each
filter and each field. However, we have altered the format of these
files somewhat, applying sky-subtraction and calibration to the
pixels, as well as correcting the WCS headers to be much closer to the
true astrometric solution. Thus, these files are immediately usable
for science without any calibration.  The new files contain enough
information in them to back out both the sky-subtraction and
calibration and thus recover the original corrected frame.</p>

<p>The spectroscopic results have been partially reprocessed. There
are two basic steps to the processing: </p>
<ol>
<li><b>2D Extraction:</b> This step produces the calibrated spectra.
For SDSS-I and -II data re-released here,
we use the same reductions as released in DR7.  For most of the new
SEGUE-2 data, the same version of the reduction pipeline was used.  An
exception is the cluster plates, for which some adjustments to the
pipeline were made. </li>
<li><b>1D Analysis:</b> This step produces redshifts and
classifications for each spectrum. For all data, we rely on the
idlspec2d pipeline for redshifts (also known as "specBS"). This
pipeline differs in detail wth the previous pipeline used in DR7,
though for virtually all objects (&gt; 99%) they agree. </li>
</ol>

<p>For stars, a new version of the SEGUE Stellar Parameters Pipeline
(SSPP) has been run, with improved determinations of stellar
properties. This procedure has been run on both the SEGUE data, and on
all stars in the full DR8 spectroscopy.</p>

<p>For galaxies, for the purpose of line index measurements, we
include the results of the "Garching" group measurements for DR7
galaxies (e.g. <a
href="http://adsabs.harvard.edu/abs/2004MNRAS.351.1151B">Brinchmann et
al. (2004)</a>, <a
href="http://adsabs.harvard.edu/abs/2003MNRAS.341...33K">Kauffmann et
al. (2003)</a> and <a
href="http://adsabs.harvard.edu/abs/2004ApJ...613..898T">Tremonti et
al. (2004)</a>).</p>

<h2 id="newformats">New Data Distribution</h2>

<p>The data distribution system has changed somewhat, due to the
different focus of SDSS-III and with respect to changes in the
calibration and resolve of the photometric data.  The Catalog Archive
Server (CAS) is largely the same, with some additional data, and some
data not included.  The Science Archive Server (SAS) uses a
significantly different front-end than did the Data Archive Server
(DAS) of DR7 and previous. </p>

<p>A major difference in the CAS and SkyServer is that for DR7 and
previous, there was a set of full photometric catalogs distributed
corresponding to the version of the data reductions used for targeting
the <a href="dr8/glossary.php#legacy">SDSS Legacy</a> survey. In DR8
we do not distribute that catalog, only the latest version of the
photometric reductions.</p> .


<?php echo foot(); ?>


