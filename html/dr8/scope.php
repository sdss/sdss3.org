<?php include '../header.php'; echo head('The Scope of DR8'); ?>

<h2>Introduction</h2>

<p>SDSS-III has committed to publicly release its raw and reduced data
sets.  We are doing so using the same highly successful systems used
by SDSS-I and -II, including a <i>Catalog Archive Server</i> for retrieval of
catalog data from a powerful SQL database and a <i>Science Archive Server</i>
for retrieval of calibrated spectra and images. </p>

<p>Data Release 8 (DR8), made publicly available in January 2011,
contains the full imaging survey from the SDSS imaging camera
(including a large contiguous area in the Southern Galactic Cap,
centered on RA ~ 0) and
new spectra from the last year of operations of the SDSS
spectrograph from the SEGUE-2 project. All of the imaging data have been
re-reduced through new
pipelines.</p>

<p>A <a href="http://adsabs.harvard.edu/abs/2011ApJS..193...29A">publication</a> accompanies the data release
which details the
differences between DR8 and its predecessors.  Major differences from
the <a href="http://www.sdss.org/dr7">DR7</a> release are:
</p>
<ol>
<li> 2395 deg<sup>2</sup> of additional imaging, to give contiguous
coverage over 3172 deg<sup>2</sup> of the Southern Galactic
Cap.</li>
<li> New reductions and calibrations of all imaging, using an improved
sky subtraction algorithm.</li>
<li> 211 new plates from the SEGUE-2 survey.</li>
<li> Reanalysis of the stellar parameters of all stars.</li>
</ol>

<table class="centerfigure">
<tr><td><a href="images/dr8_spectro_coverage.png"><img src="images/dr8_spectro_coverage.thumb.png" alt="DR8 spectroscopic coverage" /></a></td></tr>
<tr><td>DR8 imaging and spectroscopic coverage in
 Equatorial coordinates (plot centered at RA = 6h, or 90 deg).  The
 greyscale shows the coverage of the
 Legacy spectroscopic survey, while
 the red and green dots show the SEGUE-1 and SEGUE-2 surveys,
 respectively.</td></tr>
</table>

<p>The figure shows the resulting imaging coverage and
spectroscopic coverage for DR8. The spectroscopic surveys were
executed through several programs: SDSS Legacy, SDSS special programs,
SEGUE-1, and SEGUE-2. In the tables below, we cite a few numbers of
interest with regard to the imaging and spectroscopic data.</p>

<p>The data is defined as a set of photometric <a
href="dr8/glossary.php#run">runs</a> and a set of spectroscopic <a
href="dr8/glossary.php#plate">plates</a> (see the basics on <a
href="dr8/imaging/imaging_basics.php">imaging</a> and <a
href="dr8/spectro/spectro_basics.php">spectroscopy</a>). We provide
links here to ASCII and FITS lists of the runs and the plates. These
lists are essentially a summary of all of the data in the data
release.</p>

<ul>
<li> List of runs: <a
href="http://data.sdss3.org/sas/dr8/groups/boss/photoObj/photoRunAll-dr8.par">photoRunAll-dr8.par</a>, <a
href="http://data.sdss3.org/sas/dr8/groups/boss/photoObj/photoRunAll-dr8.fits">photoRunAll-dr8.fits</a></li>
<li> List of plates: <a
href="http://data.sdss3.org/sas/dr8/common/sdss-spectro/redux/plates-dr8.par">plates-dr8.par</a>, <a
href="http://data.sdss3.org/sas/dr8/common/sdss-spectro/redux/plates-dr8.fits">plates-dr8.fits</a></li>
</ul>

<h2>Imaging Data Statistics</h2>

<?php include 'imaging/imaging_statistics.html'; ?>

<h2>Spectroscopic Data Statistics</h2>

<?php include 'spectro/spectro_statistics.html'; ?>

<?php echo foot(); ?>
