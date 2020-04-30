<?php include '../../header.php'; echo head('The SDSS-III APOGEE Spectroscopic Pipeline'); ?>

<p>Detailed descriptions of the APOGEE pipeline reduction steps are
provided on other pages:</p>

<ul>
<li><a href="dr10/irspec/apred.php">Visit spectral reduction</a></li>
<li><a href="dr10/irspec/spectral_combination.php">Spectra combination</a></li>
<li><a href="dr10/irspec/aspcap.php">Derivation of stellar parameters</a></li>
</ul>

<p> Here, we provide references to papers that give additional
details, and a table of the files associated with that step of the
pipeline that can be found in the <a href="http://data.sdss3.org">SAS</a>.
These tables include links to
the
<a href="http://data.sdss3.org/datamodel/index-files.html">
file format documentation</a> (the "data model")
and templates which can be
used to generate SAS URLs for those files. The templates are in "C
printf" format, and can be used in C, bash, Python, and many other
languages to automatically generate URLs.</p>

<p>Most of the catalog data (but not the spectra themselves) have been
loaded into the <a href="http://skyserver.sdss3.org/">Catalog Archive
Server</a> (CAS) database. Users are often better off obtaining SDSS
data through a carefully constructed CAS query than they are
downloading the data files from the SAS. Simple queries can be used to
select just the objects and parameters of interest, while more complex
queries can be used to do complex calculations on many objects,
thereby avoiding the need to download the data on them at all.</p>

<h2>APOGEE Raw Data Collection</h2>

<table class="common">
<caption>SAS files generated in spectroscopic data collection</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_DATA/MJD/%d.html">Log file</a></td>
<td>out</td>
<td>records exposures collected on a night</td>
<td>Not public</td>
<td></td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_DATA/MJD5/apR.html">apR</a></td>
<td>out</td>
<td>raw spectroscopic data frames</td>
<td>
  sdss/spectro/data/%d/apR-%c-%08d.apz <br/>
</td>
<td>mjd, detector (a,b,or c), exposure id</td>
</tr>
</table>

<h2 id="specred">APOGEE Spectroscopic Data Reduction</h2>

<h3>Visit reduction pipeline (apred)</h3>

<p>References: Nidever et al., in prep</p>

<p>The apred pipeline reads science and calibration exposures
from the spectrographs, reduces and calibrates the science
exposures, extracts the one dimensional spectra from the two
dimensional exposures, corrects for sky emission and telluric
absorption, stacks multiple dithered exposures into well-sampled
spectra, and produces corresponding masks and noise
estimates.</p>

<table class="common">
<caption>SAS files used or generated by the apred pipeline</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/plates/PLATE_ID/MJD5/apPlan.html">apPlan</a></td>
<td>in</td>
<td>the apred processing plan</td>
<td>sdss/spectro/redux/%d/%04d/apPlan-%04d-%05d.par</td>
<td>rerun, plate, plate, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PLATELIST_DIR/runs/PLATERUN/plPlugMap.html">plPlugMapM</a></td>
<td>in</td>
<td>records which fiber corresponds to which hole in a
plate (and therefore objects, and what coordinates on the sky)</td>
<td>Not public</td>
<td></td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_DATA/MJD5/apR.html">apR</a></td>
<td>in</td>
<td>raw spectroscopic data frames</td>
<td>sdss/apogee/data/%d/apR-%c-%08d.apz</td>
<td>mjd, chip (a, b, or c), exposure id</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/plates/PLATE_ID/MJD5/apCframe.html">apCFrame</a></td>
<td>out</td>
<td>calibrated spectra for a single CCD and exposure</td>
<td>sdss/apogee/redux/%s/plates/%04d/%05d/apCFrame-%c-%08d.par</td>
<td>apred_vers, plate, mjd, chip (a, b, or c), exposure id</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/plates/PLATE_ID/MJD5/apPlate.html">apPlate</a></td>
<td>out</td>
<td>the 300 combined flux- and wavelength-calibrated
spectra over all exposures (potentially spanning multiple
nights) for a given mapped plate</td>
<td>sdss/apogee/redux/%s/%04d/apPlate-%04d-%05d.fits</td>
<td>run2d, plate, plate, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/plates/PLATE_ID/MJD5/apVisit.html">apVisit</a></td>
<td>out</td>
<td>thecombined flux- and wavelength-calibrated spectra over all exposures (potentially spanning multiple
nights) for a given object on a given plate/MJD</td>
<td>sdss/spectro/redux/%s/%04d/apVisit-%04d-%05d-%03d.fits</td>
<td>run2d, plate, plate, mjd</td>
</tr>
</table>


<h3>Stellar combination pipeline (apstar)</h3>

<h3>APOGEE Stellar Parameters and Chemical Abundances Pipeline (aspcap)</h3>

<p>References: Garcia-Perez et al, Mezsaros et al., Shetrone et al. </p>

<p>The ASPCAP stellar parameters pipeline produces a number of
files, stored together:</p>

<table class="common">
<caption>SAS files used or generated by the ASPCAP pipeline</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/ASPCAP_VERS/RESULTS_VERS/LOCATION_ID/aspcapField.html">aspcapField</a></td>
<td>out</td>
<td>ASPCAP stellar parameters ([Fe/H], log g, etc.)</td>
<td>sdss/apogee/%s/%s/%s/%s//aspcapField-%04d.fits</td>
<td>APRED_VERS, APSTAR_VERS, ASPCAP_VERS, RESULTS_VERS, LOCID</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/ASPCAP_VERS/RESULTS_VERS/LOCATION_ID/aspcapStar.html">aspcapStar</a></td>
<td>out</td>
<td>ASPCAP stellar parameters</td>
<td>sdss/apogee/%s/%s/%s/%s/LOCID/aspcapStar-%s-%04d.fits</td>
<td>APRED_VERS, APSTAR_VERS, ASPCAP_VERS, RESULTS_VERS, RESULTS_VERS, LOCID</td>
</tr>
</table>

<?php echo foot(); ?>
