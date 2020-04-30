<?php include '../header.php'; echo head('The Scope of DR10'); ?>

<div class="summary">
<p>Data Release 10 (DR10), made publicly available in July 2013, contains the
full imaging survey from the SDSS imaging camera, all of the spectra from the original SDSS
640-fiber spectrograph data, and an additional 684,000 new
spectra from the BOSS 1000-fiber spectrograph. DR10 also contains the first data
release from the SDSS-III APOGEE spectrograph, with spectra of
57,454 stars. This page describes the scope of DR10 data.</p>
</div>

<p>The new data in DR10 are:</p>
<ol>
<li>684,000 new optical spectra from the SDSS-III Baryon Oscillation
Spectroscopic Survey (BOSS), and new reductions for all BOSS spectra</li>
<li>Entirely new high resolution, infrared spectra for 57,454 Milky
Way stars from the SDSS-III Apache Point Observatory Galactic
Evolution Experiment (APOGEE), with stellar parameters, elemental
abundances, and precise radial velocities</li>
</ol>

<p>Jump to:</p>

<ul>
<li><a href="dr10/scope.php#opticalstats">The Scope of DR10 Optical data</a></li>
<li><a href="dr10/scope.php#apogeestats">The Scope of DR10 Infrared data</a></li>
</ul>

<p>SDSS-III has committed to publicly release its raw and reduced data
sets.  We are doing so using the <i>Catalog Archive Server</i> for
retrieval of catalog data from a powerful SQL database and a
<i>Science Archive Server</i> for retrieval of calibrated spectra and
images.
</p>

<h2 id="opticalstats">Optical Data</h2>

<p>SDSS Optical data encompass the entirety of the original SDSS-I and -II imaging and
spectroscopy, along with the follow-on SEGUE and BOSS surveys. All data previously released
in DR1-DR9 are included in DR10.</p>

<p id="covercheck">To check whether a location is
covered in DR10 optical data, please use the form below.
Enter RA/Dec coordinates in the box, in
decimal degrees, and click Submit. Your coordinates will be loaded into the
<a href="http://dr10.sdss3.org">DR10 Science Archive Server (SAS)</a>. If your point is in
the DR10 optical survey area, results will include links to all available SDSS imaging and
optical spectroscopic data.</p>

<form action="http://dr10.mirror.sdss3.org/coverageCheck/search" method="post">
   <table class="centerfigure" style="width:50%;">
			<tr>
       <td style="text-align:center;">SDSS Optical Data RA/Dec <br />Coverage Check:</td>
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
<tr><td><a href="images/dr10_spectro_coverage.png"><img src="images/dr10_spectro_coverage.thumb.png" alt="DR10 optical spectroscopic coverage" /></a></td></tr>
<tr><td>DR10 imaging and optical spectroscopic coverage in
Equatorial coordinates (plot centered at RA = 6h, or 90 deg.)
</td></tr>
</table>

<p>The optical data are defined as a set of photometric <a
href="dr10/help/glossary.php#run">runs</a> and a set of spectroscopic <a
href="dr10/help/glossary.php#plate">plates</a> (see the basics on <a
href="dr10/imaging/imaging_basics.php">imaging</a> and <a
href="dr10/spectro/spectro_basics.php">spectroscopy</a>). We provide
links here to ASCII and FITS lists of the runs and the plates. These
lists are essentially a summary of all of the data in the data
release.</p>

<ul>
<li> List of runs: <a
href="http://data.sdss3.org/sas/dr10/boss/photoObj/photoRunAll-dr10.par">photoRunAll-dr10.par</a>, <a
href="http://data.sdss3.org/sas/dr10/boss/photoObj/photoRunAll-dr10.fits">photoRunAll-dr10.fits</a></li>
<li> List of plates: <a
href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/plates-dr10.par">plates-dr10.par</a>, <a
href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/plates-dr10.fits">plates-dr10.fits</a></li>
</ul>

<h2 id="imagestats">Optical imaging data statistics</h2>

<?php include 'imaging/imaging_statistics.html'; ?>

<h2 id="specstats">Optical spectroscopic data statistics</h2>

<?php include 'spectro/spectro_statistics.html'; ?>


<h2 id="apogeestats">Infrared (APOGEE) Data</h2>

<p>DR10 includes the first data released by the APOGEE survey. SDSS APOGEE infrared
spectroscopy data are defined by a set of
<a href="dr10/help/glossary.php#field-centers">field centers</a>, defined
in galactic coordiantes. Each field may have had multiple plates observed. (See
the <a href="dr10/irspec/targets.php">APOGEE target selection</a> documentation
for more on the concepts of fields and plates.)</p>

<!-- <p id="ircovercheck">To check whether a location is covered in the APOGEE data within
DR10 please use the form below.
Enter RA/Dec coordinates in the box, in
decimal degrees, and click Submit. Your coordinates will be loaded into the
<a href="http://dr10.sdss3.org">DR10 Science Archive Server (SAS)</a>. If your point is in
the DR10 survey area, results will include links to all available APOGEE
spectroscopic data.</p>

<form action="http://dr10.mirror.sdss3.org/coverageCheck/search" method="post">
   <table class="centerfigure" style="width:50%;">
			<tr>
       <td style="text-align:center;">RA/Dec <br />Coverage Check: <span class="todo">TODO: Update or remove!</span></td>
       <td style="text-align:center;">
        <textarea name="radecs" cols="25" rows="1">180.00 50.00</textarea>
       </td>
       <td style="text-align:center;">
        <input type="submit" name="submit" value="Submit" />
       </td>
      </tr>
   </table>
</form> -->

<table class="centerfigure" id="ircovermap">
<tr>
	<td>
		<a href="images/apogee_fields_dr10.jpg">
		<img src="images/apogee_fields_dr10.jpg" alt="APOGEE
		Coverage Map" />
		</a>
	</td>
</tr>
<tr>
	<td class="caption">Index map showing locations of APOGEE fields with spectra
    in DR10.<br />Note that different fields have been visited different numbers of times,
    and not all fields have been completed. The figure is an Aitoff projection of
    2MASS survey data in galactic coordiantes.</td>
</tr>
</table>

<p>The links below provide FITS lists of the field centers, associated plates, and the dates
those plates were were observed. See the <a href="dr10/irspec/spectro_data.php">APOGEE
infrared spectroscopic data</a> page for more details.
</p>


<ul id="apogeesummary">
<li> List of field centers: <a
href="http://data.sdss3.org/sas/dr10/apogee/target/apogee_DR10/apogeeField_DR10.fits">apogeeField_DR10.fits</a></li>

<li> List of visits to each field: <a
href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/allPlates-v304.fits">allPlates-v304.fits</a></li>
<li> Catalog parameters for each star (150 Mbytes): <a
href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/allStar-v304.fits">allStar-v304.fits</a></li>
<li> Catalog parameters for each visit spectrum (115 Mbytes): <a
href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/allVisit-v304.fits">allVisit-v304.fits</a></li>
</ul>

<p>More APOGEE fields will be included in Data Releases 11 and 12.</p>

<h2 id="irspecstats">Infrared (APOGEE) spectroscopic data statistics</h2>

<?php include 'irspec/apogee_spectro_statistics.html'; ?>



<?php echo foot(); ?>
