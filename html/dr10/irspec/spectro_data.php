<?php include '../../header.php'; echo head('Available Infrared Spectroscopic Data from SDSS-III APOGEE'); ?>

<ul>
<li><a href="dr10/irspec/spectro_data.php#intro">Introduction</a></li>
<li><a href="dr10/irspec/spectro_data.php#versions">Reduction Versions</a></li>
<li><a href="dr10/irspec/spectro_data.php#catalogs">Data catalogs</a></li>
<li><a href="dr10/irspec/spectro_data.php#spectral">Spectral data</a></li>
<li><a href="dr10/irspec/spectro_data.php#intermediate">Raw and intermediate spectral data</a></li>
</ul>

<h2 id="intro">Introduction</h2>

<p>Detailed descriptions of the APOGEE pipeline reduction steps are
provided on other pages:</p>

<ul>
<li><a href="dr10/irspec/apred.php">Visit spectral reduction</a></li>
<li><a href="dr10/irspec/spectral_combination.php">Spectral combination</a></li>
<li><a href="dr10/irspec/aspcap.php">Derivation of stellar parameters</a></li>
</ul>

<p> Here, we provide a summary of the files associated with the different steps
of the pipeline.  These tables include links to
the
<a href="http://data.sdss3.org/datamodel/index-files.html">
file format documentation</a> (the "data model")
and templates that can be
used to generate SAS URLs for those files. The templates are in "C
printf " format, and can be used in C, bash, Python, and many other
languages to automatically generate URLs.</p>

<p>Most of the catalog data (but not the spectra themselves) have been
loaded into the <a href="http://skyserver.sdss3.org/">Catalog Archive
Server</a> (CAS) database. Users may be better off obtaining SDSS
data through a carefully constructed CAS query than they are
downloading the data files from the SAS. Simple queries can be used to
select just the objects and parameters of interest, while more complex
queries can be used to do complex calculations on many objects,
thereby avoiding the need to download the data on them at all.</p>

<p>The major spectroscopic results are contained in a few different
file structures (on SAS) and database tables (in CAS), listed below.
Note that the links
into SAS below bring you into the full directory tree; before perusing
that, it may be best to read both
<a href="dr10/irspec/spectro_basics.php">Understanding APOGEE Spectroscopic
Data</a> and the <a href="http://data.sdss3.org/datamodel">data
model</a>.</p>

<p>Methods for accessing these data are summarized on the <a
href="dr10/data_access">data access</a> page.  </p>

<h2 id="versions">Reduction Version Numbers</h2>

<p> The APOGEE pipeline is likely to continue to be developed, so it may be
important to track the version of the pipeline that was used to reduce APOGEE spectra. To
allow for changes in different sections of the pipeline without requiring everything to
be rerun with any change, four separate version names track the software used in different
portions of the pipeline:</p>

<ul>
<li><em>APRED_VERS</em> denotes the version of the basic spectra reduction code used to generate
the visit spectra.</li>
<li><em>APSTAR_VERS</em> denotes the version of the code used to combine individual visit spectra
into higher signal-to-noise, resampled, combined spectra.</li>
<li><em>ASPCAP_VERS</em> denotes the version of the code used to determine the stellar atmospheric
parameters for each combined spectrum.</li>
<li><em>RESULTS_VERS</em> denotes the version of the code used to compile the final results, along
with applying additional empirical corrections and providing data flag information about data
quality, based on evaluation of the results for calibration objects. A given RESULTS_VERS implies
versions of all of the preceding steps, and thus uniquely identifies the full set of software
used.</li>
</ul>

<p>APOGEE DR10 uses the following versions:</p>
<table class="common">
<tr><th>Version (RESULTS_VERS)</th><th>APRED_VERSION</th><th>APSTAR_VERSION</th><th>ASPCAP_VERSION</th><th>Comment</th></tr>
<tr><td>v304 </td><td> r3 </td><td> s3 </td><td> v304 </td><td> Improves minor bugs in calibrated Teff and external errors</td></tr>
<!--
<tr><td>v303 </td><td> r3 </td><td> s3 </td><td> v303 </td><td> Tag name changes, object info from apogeeObject, modified flag</td></tr>
<tr><td>v302 </td><td> r3 </td><td> s3 </td><td> v302 </td><td> Include modified calibrations and flags</td></tr>
<tr><td>v301 </td><td> r3 </td><td> s3 </td><td> v301 </td><td> Add aspcapStar files, modified summary files</td></tr>
<tr><td>v300 </td><td> r3 </td><td> s3 </td><td> v300 </td><td> Initial v3 run</td></tr>
<tr><td>v202 </td><td> r2 </td><td> s2 </td><td> a2 </td><td> Initial DR10 attempt, some failed plates/fields, new ASPCAP grid combination to improve grid boundary effects</td></tr>
<tr><td>v201 </td><td> r2 </td><td> s2 </td><td> a2 </td><td> Initial DR10 attempt, some failed plates/fields, attempt at new ASPCAP grid combination to improve grid boundary effects (but book-keeping failure!)</td></tr>
<tr><td>v200 </td><td> r2 </td><td> s2 </td><td> a2 </td><td> Initial DR10 attempt, some failed plates/fields</td></tr>
-->
</table>

<h2 id="catalogs">Catalogs of quantities measured from APOGEE spectra</h2>

<p>Summary FITS table files of cataloged parameters (not the spectra themselves) are
provided in the SAS. These data are also loaded into the CAS to enable
database access. Note that one of the FITS table files (allStar) is split
into two separate CAS tables: aspcapStar and apogeeStar, and thus listed twice in the table below.</p>


<table class="common">
<!-- Spectra catalogs -->
<tr><th>SAS location</th><th>CAS table</th><th>Description</th></tr>
<tr>
<td>
<a href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/allStar-v304.fits">allStar-RESULTS_VERS.fits</a>
<br />
<span class="ismall">(in <a
href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3">APOGEE_REDUX</a>;
see <a
    href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/ASPCAP_VERS/RESULTS_VERS/allStar.html">datamodel</a>)
</span>
</td>
<td>
aspcapStar
</td>
<td>
Catalog of ASPCAP parameters for observed stars
</td>
</tr>

<tr>
<td>
<a
href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/allStar-v304.fits">allStar-RESULTS_VERS.fits</a>
<br />
<span class="ismall">(in <a
href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3">APOGEE_REDUX</a>;
see <a
    href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/ASPCAP_VERS/RESULTS_VERS/allStar.html">datamodel</a>)
</span>
</td>
<td>
apogeeStar
</td>
<td>
Catalog of stellar parameters from combined spectra (e.g., RVs)
</td>
</tr>
<tr>
<td>
<a
href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/allVisit-v304.fits">allVisit-RESULTS_VERS.fits</a>
<br />
<span class="ismall">(in <a
href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3">APOGEE_REDUX</a>;
see <a
    href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/ASPCAP_VERS/RESULTS_VERS/allVisit.html">datamodel</a>)
</span>
</td>
<td>
apogeeVisit
</td>
<td>
Catalog of parameters from individual visit spectra
</td>
</tr>
</table>

<h2 id="spectral"> Spectral data </h2>

<p>
Spectral data is available in the SAS. Visit spectra are organized by PLATE and MJD.
Combined spectra and ASPCAP spectra (which are derived from the combined spectra) are
organized by field (encoded by a LOCATION_ID). One way to associate PLATES, LOCATION_ID, and
field names is to look at the <a href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/fields.html"> index </a> embedded in the SAS. You can also get this information from the CAS
or the summary data files, see e.g., examples for <a href="dr10/irspec/catalogs.php#plates">plates</a>
or for <a href="dr10/irspec/catalogs.php#plates">location IDs</a>. For
downloading a large number of these spectra in a single step, see our
<a href="dr10/data_access/bulk.php">bulk data access</a>
documentation. </a></p>

<table class="common">
<!-- Spectra themselves -->
<tr><th>SAS location</th><th>SAS interface</th><th>Description</th></tr>

<tr>
<td>
<a href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/s3/a3/v304"> aspcapStar-RESULTS_VERS-STARNAME.fits</a><br/>
<span class="ismall">(in
APOGEE_REDUX/APRED_VERS/APSTAR_VERS/ASPCAP_VERS/RESULTS_VERS/LOCATION_ID; <br />
see <a
    href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/ASPCAP_VERS/RESULTS_VERS/LOCATION_ID/aspcapStar.html">datamodel</a>)
        </span><br />
</td>
<td>
<a href="http://data.sdss3.org/advancedIRSearch">aspcapStar-RESULTS_VERS-STARNAME.fits</a><br/>
</td>
<td>
Pseudo-continuum normalized, combined spectra, with best matching synthetic spectrum, one file per object
</td>
</tr>

<tr>
<td>
<a href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/s3"> apStar-APSTAR_VERS-STARNAME.fits</a><br/>
<span class="ismall">(in
APOGEE_REDUX/APRED_VERS/APSTAR_VERS/LOCATION_ID; <br />
see <a
    href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/LOCATION_ID/apStar.html">datamodel</a>)
        </span><br />
</td>
<td>
<a href="http://data.sdss3.org/advancedIRSearch">apStar-APSTAR_VERS-STARNAME.fits</a><br/>
</td>
<td>
Combined spectra, one file per object
</td>
</tr>

<tr>
<td>
<a href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/plates"> apVisit-APRED_VERS-PLATE-MJD-FIBER.fits</a><br/>
<span class="ismall">(in
APOGEE_REDUX/APRED_VERS/plates/PLATE_ID/MJD5; <br />
see <a
    href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/plates/PLATE_ID/MJD5/apVisit.html">datamodel</a>)
        </span><br />
</td>
<td>
<a href="http://data.sdss3.org/advancedIRSearch"> apVisit-APRED_VERS-PLATE-MJD-FIBER.fits</a><br/>
</td>
<td>
Individual spectra, one file per PLATE-MJD-FIBER
</td>
</tr>

</table>


<h2 id="intermediate"> Intermediate data products </h2>

<p>While most users are likely to be satisfied with the data in the files listed above,
there are a number of lower level intermediate processed files which we list here.</p>

<h3>APOGEE Raw Data Collection</h3>

<p>APOGEE raw data is stored on the SAS. It is probably unlikely that users will
want to access this, as the raw data contains all of the up-the-ramp reads (every
10s) for every exposure; its a lot of data!</p>

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
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_DATA/MJD5/MJD5.html">Log file</a></td>
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
  $APOGEE_DATA/%d/apR-%c-%08d.apz <br/>
</td>
<td>mjd, detector (a,b,or c), exposure id</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PLATELIST_DIR/runs/PLATERUN/plPlugMap.html">plPlugMapM</a></td>
<td>in</td>
<td>records which fiber corresponds to which hole in a
plate (and therefore which objects, and what coordinates on the sky)</td>
<td>Not public</td>
<td></td>
</tr>
</table>

<h3 id="specred">APOGEE Visit Processing</h3>

<p>For details about the process, see the page on
<a href="dr10/irspec/apred.php"> visit reduction </a> and
and/or the reduction paper (Nidever et al., in prep)</p>

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
<td>$APOGEE_REDUX/APRED_VERS/plates/%d/%05d/apPlan-%04d-%05d.par</td>
<td>plate, mjd, plate, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/plates/PLATE_ID/MJD5/apCframe.html">apCframe</a></td>
<td>out</td>
<td>calibrated spectra for a single CCD and exposure</td>
<td>$APOGEE_REDUX/APRED_VERS/plates/%04d/%05d/apCframe-%c-%08d.par</td>
<td>plate, mjd, chip (a, b, or c), exposure id</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/plates/PLATE_ID/MJD5/apPlate.html">apPlate</a></td>
<td>out</td>
<td>the 300 combined flux- and wavelength-calibrated
spectra over all exposures (potentially spanning multiple
nights) for a given mapped plate</td>
<td>$APOGEE_REDUX/APRED_VERS/plates/%s/%04d/apPlate-%04d-%05d.fits</td>
<td>plate, mjd, plate, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/plates/PLATE_ID/MJD5/apVisit.html">apVisit</a></td>
<td>out</td>
<td>the combined flux- and wavelength-calibrated spectra over all exposures (potentially spanning multiple
nights) for a given object on a given plate/MJD</td>
<td>$APOGEE_REDUX/APRED_VERS/plates/%s/%04d/apVisit-%04d-%05d-%03d.fits</td>
<td>plate, mjd, plate, mjd</td>
</tr>
</table>

<h3>Stellar Combination Processing (apstar)</h3>

<p>For details about the process, see the page on
<a href="dr10/irspec/spectral_combination.php"> visit combination </a> and
and/or the reduction paper (Nidever et al., in prep)</p>

<table class="common">
<caption>SAS files used or generated by the visit combination pipeline</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/LOCATION_ID/apStar.html">apStar</a></td>
<td>out</td>
<td></td>
<td>$APOGEE_REDUX/%s/%s/%s/apStar-%s.fits</td>
<td>APRED_VERS, APSTAR_VERS, LOCATION_ID, APOGEE_ID</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/LOCATION_ID/apField.html">apField</a></td>
<td>out</td>
<td></td>
<td>$APOGEE_REDUX/%s/%s/%s/apField-%d.fits</td>
<td>APRED_VERS, APSTAR_VERS, LOCATION_ID</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/LOCATION_ID/apFieldVisits.html">apFieldVisits</a></td>
<td>out</td>
<td></td>
<td>$APOGEE_REDUX/%s/%s/%s/apFieldVisits-%d.fits</td>
<td>APRED_VERS, APSTAR_VERS, LOCATION_ID</td>
</tr>
</table>

<h3>APOGEE Stellar Parameters and Chemical Abundances Pipeline (ASPCAP)</h3>

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
<td>ASPCAP stellar parameters ([M/H], log g, etc.)</td>
<td>$APOGEE_REDUX/%s/%s/%s/%s//aspcapField-%04d.fits</td>
<td>APRED_VERS, APSTAR_VERS, ASPCAP_VERS, RESULTS_VERS, LOCATION_ID</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/ASPCAP_VERS/RESULTS_VERS/LOCATION_ID/aspcapStar.html">aspcapStar</a></td>
<td>out</td>
<td>ASPCAP stellar parameters</td>
<td>$APOGEE_REDUX/%s/%s/%s/%s/LOCATION_ID/aspcapStar-%s-%04d.fits</td>
<td>APRED_VERS, APSTAR_VERS, ASPCAP_VERS, RESULTS_VERS, RESULTS_VERS, LOCATION_ID</td>
</tr>
</table>

<?php echo foot(); ?>

