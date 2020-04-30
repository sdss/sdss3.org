<?php include '../header.php'; echo head('The Scope of DR9'); ?>

<div class="summary">
<p>Data Release 9 (DR9), made publicly available in July 2012, contains the
full imaging survey from the SDSS imaging camera, all of the SDSS
640-fiber spectrograph data from DR8, plus 831,000 new spectra from
the new BOSS 1000-fiber spectrograph.</p>
</div>

<p>A <a href="science/dr9.pdf">paper</a> accompanies the data release
which details the differences between DR9 and its predecessors. Major
differences from the <a href="http://www.sdss3.org/dr8">DR8</a>
release are:
</p>
<ol>
<li> Updates to the astrometric positions and proper motions in the
imaging.</li>
<li> New stellar parameters for SDSS spectrograph data</li>
<li> 831,000 new spectra from the BOSS spectrograph data</li>
</ol>

<p id="covercheck">To check whether a location is
covered in DR9 please use the form below. Enter RA/Dec coordinates in the box, in 
decimal degrees, and click Submit. Your coordinates will be loaded into the 
<a href="http://dr9.sdss3.org">DR9 Science Archive Server (SAS)</a>. If your point is in 
the DR9 survey area, results will include links to all available SDSS imaging and 
spectroscopic data.</p>

<form action="http://dr9.sdss3.org/coverageCheck/search" method="post">
   <table class="centerfigure" style="width:50%;">
			<tr>
       <td style="text-align:center;">RA/Dec <br />Coverage Check:</td>
       <td style="text-align:center;">
        <textarea name="radecs" cols="25" rows="1">180.00 50.00</textarea>
       </td>
       <td style="text-align:center;">
        <input type="submit" name="submit" value="Submit" />
       </td>
      </tr>
   </table>
</form>

<table class="centerfigure" id="covermap">
<tr><td><a href="images/dr9_spectro_coverage.png"><img src="images/dr9_spectro_coverage.thumb.png" alt="DR9 spectroscopic coverage" /></a></td></tr>
<tr><td>DR9 imaging and spectroscopic coverage in
Equatorial coordinates (plot centered at RA = 6h, or 90 deg.)</td></tr>
</table>

<p>The data is defined as a set of photometric <a
href="dr9/help/glossary.php#run">runs</a> and a set of spectroscopic <a
href="dr9/help/glossary.php#plate">plates</a> (see the basics on <a
href="dr9/imaging/imaging_basics.php">imaging</a> and <a
href="dr9/spectro/spectro_basics.php">spectroscopy</a>). We provide
links here to ASCII and FITS lists of the runs and the plates. These
lists are essentially a summary of all of the data in the data
release.</p>

<ul>
<li> List of runs: <a
href="http://data.sdss3.org/sas/dr9/boss/photoObj/photoRunAll-dr9.par">photoRunAll-dr9.par</a>, <a
href="http://data.sdss3.org/sas/dr9/boss/photoObj/photoRunAll-dr9.fits">photoRunAll-dr9.fits</a></li>
<li> List of plates: <a
href="http://data.sdss3.org/sas/dr9/sdss/spectro/redux/plates-dr9.par">plates-dr9.par</a>, <a
href="http://data.sdss3.org/sas/dr9/sdss/spectro/redux/plates-dr9.fits">plates-dr9.fits</a></li>
</ul>

<p>SDSS-III has committed to publicly release its raw and reduced data
sets.  We are doing so using the <i>Catalog Archive Server</i> for
retrieval of catalog data from a powerful SQL database and a
<i>Science Archive Server</i> for retrieval of calibrated spectra and
images. </p>

<h2 id="imagestats">Imaging data statistics</h2>

<?php include 'imaging/imaging_statistics.html'; ?>

<h2 id="specstats">Spectroscopic data statistics</span></h2>

<?php include 'spectro/spectro_statistics.html'; ?>

<?php echo foot(); ?>
