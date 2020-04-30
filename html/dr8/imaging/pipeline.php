<?php include '../../header.php'; echo head('The Imaging Pipeline'); ?>

<h2 id="resources">Introduction and Resources</h2>

<p>The <a href="http://adsabs.harvard.edu/abs/2002AJ....123..485S">Early
Data Release (EDR) paper</a> is the fundamental resource for
understanding the processing and data products from the SDSS,
describing the pipelines and contents of generated data
products. Successive data release papers:
<a href="http://adsabs.harvard.edu/abs/2003AJ....126.2081A">DR1</a>,
<a href="http://adsabs.harvard.edu/abs/2004AJ....128..502A">DR2</a>,
<a href="http://adsabs.harvard.edu/abs/2005AJ....129.1755A">DR3</a>,
<a href="http://adsabs.harvard.edu/abs/2006ApJS..162...38A">DR4</a>,
<a href="http://adsabs.harvard.edu/abs/2007ApJS..172..634A">DR5</a>,
<a href="http://adsabs.harvard.edu/abs/2008ApJS..175..297A">DR6</a> and
<a href="http://adsabs.harvard.edu/abs/2009ApJS..182..543A">DR7</a>,
describe changes between data
releases. The <a href="http://adsabs.harvard.edu/abs/2000AJ....120.1579Y">technical
summary</a> provides more general information on the survey. The
<a href="http://das.sdss.org/www/html/documents/PBOOK">SDSS Project Book</a>,
written for a funding proposal early in the survey, is the most
exhaustive description of the survey but was last updated in
1997. </p>

<p>The <a href="dr8/algorithms/">algorithms page</a> includes links to
pages describing algorithms used by the data reduction pipelines, and
the <a href="http://data.sdss3.org/datamodel/index-files.html">SAS
datamodel</a> has a table of the most commonly useful files in the
SAS. Truly gory details can be found on Robert Lupton's page of <a
href="http://www.astro.princeton.edu/~rhl/photomisc/">photo
documents</a>, including the draft photometric reduction paper as well
as a treasure trove of photometric data reduction wisdom.</p>

<p>The remainder of this page starts with a brief overview of imaging data
processing, followed by sections that describe the steps in data
processing in detail. In addition to the more detailed description,
each detail section privedes references to papers that give additional
details, and a table of the files associated with that step of the
pipeline that can be found in the SAS. These tables include links to
descriptions of the formats of those files and templates that can be
used to generate SAS URLs for those files. The templates are in "C
printf" format, and can be used in C, bash, Python, and many other
languages to automatically generate URLs.</p>

<p>Most of the catalog data (but not the images themselves) have been
loaded into the <a href="http://skyserver.sdss3.org/">Catalog Archive
Server</a> (CAS) database. Users are often better off obtaining SDSS-III
data through a carefully constructed CAS query than they are
downloading the data files from the SAS. Simple queries can be used to
select just the objects and parameters of interest, while more complex
queries can be used to do complex calculations on many objects,
thereby avoiding the need to download the data on them at all.</p>

<h2 id="overview">Overview</h2>

<ul>
<li><a href="dr8/imaging/pipeline.php#imobs"><b>Imaging Observing</b></a><br />
We used three instruments when collecting imaging data: the
<a href="http://adsabs.harvard.edu/abs/1998AJ....116.3040G">imaging
camera</a> mounted on
the <a href="http://adsabs.harvard.edu/abs/2006AJ....131.2332G">primary
2.5m SDSS telescope</a>, which collected the imaging data
themselves; the 0.5m photometric telescope, which collected
images of photometric standard stars and reference fields; and a
<a href="http://adsabs.harvard.edu/abs/1994SPIE.2199..852H">10
micron all sky scanner</a> (and later camera), used to detect
clouds. The photometric telescope is no longer used in imaging data
reduction and its data is not described here.</li>
<li><a href="dr8/imaging/pipeline.php#imred"><b>Imaging Data Reduction</b></a><br />
The SDSS data processing factory used a collection of
pipelines to process and calibrate the data from the imaging
camera, ultimately producing a
variety of data products including images with instrumental
signatures removed, a photometric solution for the night, and a
catalog of objects found in the data.</li>
<li><a href="dr8/imaging/pipeline.php#resolve"><b>Resolution of Multiple Detections</b></a><br />
The resolve step declares one observation on an object the
primary observation, and others secondary, thereby avoiding
unintentional duplication of objects. This step ultimately
produces an astrometrically and photometrically calibrated
catalog of objects found in the data from the imaging camera.</li>
<!--
<li><b>Loading the Catalog Archive Server</b><br />
To load the catalogs into the CAS, we generated CSV files from the
FITS tables produced by the data reduction pipelines and imported these
into tables in the SQL database used by the CAS.</li>
-->
<li><a href="dr8/imaging/pipeline.php#ubercal"><b>Recalibration</b></a><br />
Improved photometric calibrations became possible at
the end of the survey; we used a separate pipeline to refine the photometric
calibrations.</li>
<li><a href="dr8/imaging/pipeline.php#catalogs"><b>Final Photometric Catalog</b></a><br />
The results of the resolve and calibration stages are combined with the
uncalibrated object catalogs to produce final catalogs.</li>
</ul>

<h2>Notes</h2>

<ul>
<li>In the tables below, add 'http://data.sdss3.org/sas/dr8/' to all 'URL format'
values to get the full URL.</li>
<li>Data reduction could occur multiple times for both images and spectra.
Each time we repeated a data reduction, we labeled the output from that
reduction process with a distinct rerun number.</li>
<li>In the case of imaging rerun numbers, different decades in the rerun
number designate significant differences in the data reduction software. For
example, rerun 1 and rerun 2 of a given run would have been processed by
identical (or at least very similar) versions of the data reduction software,
while rerun 40 would have been reduced with a significantly different version
of the pipeline. However, the only relevant reruns for DR8 are 157 and 301,
with the bulk of the data in rerun 301.</li>
</ul>


<h2 id="imobs">Imaging Observing</h2>

<h3>Imager</h3>

<p>The imager collected survey data from the imager in drift scan (also
called TDI) mode. We use the term "run" to designate a single scan
along a great circle. The data acquisition system system divided the
data from each CCD into frames, stored as FITS files; the observatory
sent data to be processed as a collection of FITS files, each
corresponding to an arc along the great circle 1361 rows (539
arcseconds) long from a single CCD. In addition to the images
themselves, the data acquisition system also generated a variety of
metadata and other engineering files, which included pixel statistics
and a catalog of bright stars for each field.</p>

<table class="common">
<caption>SAS files generated in imager data collection</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/idReport.html">idReport</a></td>
<td>out</td>
<td>records runs collected on a night</td>
<td>groups/boss/photo/redux/%d/%d/logs/idReport-%05d.par</td>
<td>rerun, run, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_DATA/RUN/fields/CAMCOL/idR.html">idR</a></td>
<td>out</td>
<td>raw imaging frames</td>
<td>groups/boss/photo/data/%d/fields/%d/idR-%06d-%s%d-%04d.fit.Z</td>
<td>run, camcol, run, filter, camcol, field</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_DATA/RUN/gangs/idGang.html">idGang</a></td>
<td>out</td>
<td>assorted data gathered by the data acquisition system</td>
<td>groups/boss/photo/data/%d/gangs/idGang-%06d-%s%d-%04d.fit</td>
<td>run, run, r(ow) or c(ol), row number or column number, frame</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/idFrameLog.html">idFrameLog</a></td>
<td>out</td>
<td>camera position information for each frame</td>
<td>groups/boss/photo/redux/%d/%d/logs/idFrameLog-%06d-%d.par</td>
<td>rerun, run, run, crate</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opCamera.html">opCamera</a></td>
<td>out</td>
<td>imaging camera geometry</td>
<td>groups/boss/photo/redux/%d/%d/logs/opCamera-%05d.par</td>
<td>rerun, run, mjd (of generation)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opConfig.html">opConfig</a></td>
<td>out</td>
<td>CCD readout configurations</td>
<td>groups/boss/photo/redux/%d/%d/logs/opConfig-%05d.par</td>
<td>rerun, run, mjd (of generation)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opECalib.html">opECalib</a></td>
<td>out</td>
<td>CCD electronic calibrations</td>
<td>groups/boss/photo/redux/%d/%d/logs/opECalib-%05d.par</td>
<td>rerun, run, mjd (of generation)</td>
</tr>
</table>

<!--
<h3>Photometric Telescope</h3>
<p>The photometric telescope collected images of standard stars
("primary standards") at a variety of airmasses throughout the night to
measure the photometric solution for the night, and images that sample
the survey area for each imaging run ("secondary patches") that can be
used to calibrate the runs from the imager using photometric solutions
generated by the photometric telescope.</p>
<table class="common">
<caption>SAS files generated in photometric telescope data collection</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/STAGING_DATA/oplogs/MJD/mdReport.html">mdReport</a></td>
<td>out</td>
<td>records exposures collected on a night</td>
<td>apo_staging/oplogs/%05d/mdReport-%05d.par</td>
<td>mjd, mjd</td>
</tr>
</table>
-->

<h3>Infrared All-Sky Camera</h3>

<p>Clouds can be clearly seen at night in a 10 micron all-sky camera. We
used two such cameras at different times in the survey to
monitor the sky for cloud (and therefore non-photometric
conditions).</p>

<table class="common">
<caption>SAS files generated by the infrared all sky camera
or scanner</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/STAGING_DATA/ircam/MJD/cR.html">cR</a></td>
<td>out</td>
<td>A single image from the infrared camera</td>
<td>apo_staging/ircam/%05d/cR%06d.fit</td>
<td>mjd, UTC time (HHMMSS)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/STAGING_DATA/ircam/MJD/irsc.html">irsc</a></td>
<td>out</td>
<td>A log of statistics on ircam frames</td>
<td>apo_staging/ircam/%05d/irsc.log</td>
<td>mjd</td>
</tr>
</table>

<h3>Other metadata</h3>

<p>The observatory produces an assortment of engineering and other
metadata.</p>

<table class="common">
<caption>Other SAS files generated in observing</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td>night log</td>
<td>out</td>
<td>A prose account of the night</td>
<td>apo_staging/astrolog/%05d/manualLog-full.txt</td>
<td>mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/idWeather.html">idWeather</a></td>
<td>out</td>
<td>A log of weather data</td>
<td>groups/boss/photo/redux/%d/%d/logs/idWeather-%05d.par</td>
<td>rerun, run, mjd</td>
</tr>
</table>

<h2 id="imred">Imaging Data Reduction</h2>

<h3>Serial Stamp Collecting Pipeline (SSC)</h3>

<p>The SSC repackages some of the data produced by the data acquisition
system and produces postage stamps of bright reference stars.</p>

<table class="common">
<caption>SAS files read by the SSC pipeline</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/ssc/scPlan.html">scPlan</a></td>
<td>in</td>
<td>the SSC processing plan</td>
<td>groups/boss/photo/redux/%d/%d/ssc/scPlan.par</td>
<td>run, rerun</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/idReport.html">idReport</a></td>
<td>in</td>
<td>records runs collected on a night</td>
<td>groups/boss/photo/redux/%d/%d/logs/idReport-%05d.par</td>
<td>rerun, run, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opCamera.html">opCamera</a></td>
<td>in</td>
<td>imaging camera geometry</td>
<td>groups/boss/photo/redux/%d/%d/logs/opCamera-%05d.par</td>
<td>rerun, run, mjd (of generation)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opConfig.html">opConfig</a></td>
<td>in</td>
<td>CCD readout configurations</td>
<td>groups/boss/photo/redux/%d/%d/logs/opConfig-%05d.par</td>
<td>rerun, run, mjd (of generation)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opECalib.html">opECalib</a></td>
<td>in</td>
<td>CCD electronic calibrations</td>
<td>groups/boss/photo/redux/%d/%d/logs/opECalib-%05d.par</td>
<td>rerun, run, mjd (of generation)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opBC.html">opBC</a></td>
<td>in</td>
<td>CCD bad pixel file</td>
<td>groups/boss/photo/redux/%d/%d/log/opBC-%d.par</td>
<td>rerun, run, mjd<sub>bp</sub> (see fpPlan)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_DATA/RUN/fields/CAMCOL/idR.html">idR</a></td>
<td>in</td>
<td>raw imaging frames</td>
<td>groups/boss/photo/data/%d/fields/%d/idR-%06d-%s%d-%04d.fit.Z</td>
<td>run, camcol, run, filter, camcol, field</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_DATA/RUN/gangs/idGang.html">idGang</a></td>
<td>in</td>
<td>assorted data gathered by the data acquisition system</td>
<td>groups/boss/photo/data/%d/gangs/idGang-%06d-%s%d-%04d.fit</td>
<td>run, run, r(ow) or c(ol), row number or column number, frame</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/ssc/koCat.html">koCat</a></td>
<td>in</td>
<td>the catalog of known bright stars</td>
<td>groups/boss/photo/redux/%d/%d/ssc/koCat-%06d.fit</td>
<td>run, rerun, run</td>
</tr>
</table>

<h3>Postage Stamp Pipeline (PSP)</h3>

<p>References: <a href="http://adsabs.harvard.edu/abs/2002AJ....123..485S">2002AJ....123..485S</a>,
section 4.3</p>

<p>The PSP measures the bias and global sky level,
and fits a model for the point spread function for each field.</p>

<table class="common">
<caption>SAS files used or generated by the PSP pipeline</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/photo/psParam.html">psParam</a></td>
<td>in</td>
<td>PSP tunable parameters</td>
<td>groups/boss/photo/redux/%d/%d/photo/psParam.par</td>
<td>run, rerun</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/photo/psPlan.html">psPlan</a></td>
<td>in</td>
<td>the PSP processing plan</td>
<td>groups/boss/photo/redux/%d/%d/photo/psPlan.par</td>
<td>run, rerun</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opCamera.html">opCamera</a></td>
<td>in</td>
<td>imaging camera geometry</td>
<td>groups/boss/photo/redux/%d/%d/logs/opCamera-%05d.par</td>
<td>rerun, run, mjd (of generation)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opConfig.html">opConfig</a></td>
<td>in</td>
<td>CCD readout configurations</td>
<td>groups/boss/photo/redux/%d/%d/logs/opConfig-%05d.par</td>
<td>rerun, run, mjd (of generation)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opECalib.html">opECalib</a></td>
<td>in</td>
<td>CCD electronic calibrations</td>
<td>groups/boss/photo/redux/%d/%d/logs/opECalib-%05d.par</td>
<td>rerun, run, mjd (of generation)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opBC.html">opBC</a></td>
<td>in</td>
<td>CCD bad pixel file</td>
<td>groups/boss/photo/redux/%d/%d/log/opBC-%d.par</td>
<td>rerun, run, mjd<sub>bp</sub> (see fpPlan)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/photo/calib/idB.html">idB</a></td>
<td>in</td>
<td>bias vector</td>
<td>groups/boss/photo/redux/%d/%d/photo/calib/idB-%06d-%c%d.fit</td>
<td>rerun, run, calibration run, filter, camcol</td>
</tr>
<!--
WHAT REPLACES THE PT TELESCOPE FILES?
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/exPhotom.html">exPhotom</a></td>
<td>in</td>
<td>photometric solutions</td>
<td>http://das.sdss.org/pt/solutions/%s/exPhotom-%05d.par</td>
<td>version, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/kaCalObj.html">kaCalObj</a></td>
<td>in</td>
<td>calibrated objects</td>
<td>http://das.sdss.org/pt/objects/%s/%d/kaCalObj-%08d.fit</td>
<td>version, stripe, sequenceId</td>
</tr>
-->
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/psField.html">psField</a></td>
<td>out</td>
<td>the initial photometric calibration and point spread
function fit by field (see
the <a href="dr8/imaging/images.php#psf">extracting
PSF images</a> page) </td>
<td>groups/boss/photo/redux/%d/%d/objcs/%d/psField-%06d-%d-%04d.fit</td>
<td>rerun, run, camcol, run, camcol, field</td>
</tr>
</table>

<h3>Astrometric Pipeline (astrom)</h3>

<p>References: <a href="http://adsabs.harvard.edu/abs/2003AJ....125.1559P">2003AJ....125.1559P</a></p>

<p>The astrometric pipeline calculates the astrometric solution. The <a href="dr8/algorithms/astrometry.php">astrometry</a>
and <a href="http://www.sdss.org/dr7/products/general/astrometry.html">astrometry QA (UPDATE LINK)</a> web pages
provide more information on the algorithms used and the proper
interpretation of the output.</p>

<table class="common">
<caption>SAS files used or generated by the astrom pipeline</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/astrom/asParam.html">asParam</a></td>
<td>in</td>
<td>astrom tunable parameters</td>
<td>groups/boss/photo/redux/%d/%d/astrom/asParam.par</td>
<td>rerun, run</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/astrom/asPlan.html">asPlan</a></td>
<td>in</td>
<td>the astrom processing plan</td>
<td>groups/boss/photo/redux/%d/%d/astrom/asPlan.par</td>
<td>rerun, run</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opCamera.html">opCamera</a></td>
<td>in</td>
<td>imaging camera geometry</td>
<td>groups/boss/photo/redux/%d/%d/logs/opCamera-%05d.par</td>
<td>rerun, run, mjd (of generation)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opConfig.html">opConfig</a></td>
<td>in</td>
<td>CCD readout configurations</td>
<td>groups/boss/photo/redux/%d/%d/logs/opConfig-%05d.par</td>
<td>rerun, run, mjd (of generation)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/idReport.html">idReport</a></td>
<td>in</td>
<td>records runs collected on a night</td>
<td>groups/boss/photo/redux/%d/%d/logs/idReport-%05d.par</td>
<td>rerun, run, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/idWeather.html">idWeather</a></td>
<td>in</td>
<td>A log of weather data</td>
<td>groups/boss/photo/redux/%d/%d/logs/idWeather-%05d.par</td>
<td>rerun, run, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/astrom/asTrans.html">asTrans</a></td>
<td>out</td>
<td>tranformation coefficients from row, column to great circle
coordinates</td>
<td>groups/boss/photo/redux/%d/%d/astrom/asTrans-%06d.fit</td>
<td>rerun, run, run</td>
</tr>
</table>

<h3>Frames Pipeline (frames)</h3>

<p>References: <a href="http://adsabs.harvard.edu/abs/2002AJ....123..485S">2002AJ....123..485S</a>,
section 4.4</p>

<p>The frames pipeline applies flat field and bias corrections to
each frame, and interpolates values for pixels in bad columns
and bleed trails and those corrupted by cosmic rays.  In previous
data releases, this pipeline would produce a "corrected frame" or
<a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/fpC.html">fpC</a> file.
These files are no longer produced.  Instead, a
<a href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/frames/RERUN/RUN/CAMCOL/frame.html">frame</a>
file is produced by a different method, though it contains substantially
the same information.
The frames pipeline described here also detects bright objects and
estimates the varying sky background, detects fainter objects,
and measures a variety of properties for each object. Several
algorithms pages describe details of the processing performed by frames.</p>

<ul>
<li><a href="dr8/algorithms/magnitudes.php">Measures
of flux and magnitudes</a> discribes the variety of methods
frames uses to measure the magnitude of each object,
including
<a href="dr8/algorithms/magnitudes.php#photo_profile">radial
profiles</a>,
<a href="dr8/algorithms/magnitudes.php#mag_fiber">fiber</a>,
<a href="dr8/algorithms/magnitudes.php#mag_model">model</a>,
<a href="dr8/algorithms/magnitudes.php#cmodel">cModel</a>,
<a href="dr8/algorithms/magnitudes.php#mag_petro">Petrosian</a> and
<a href="dr8/algorithms/magnitudes.php#mag_psf">PSF</a>
magnitudes and
<a href="dr8/algorithms/magnitudes.php#which_mags">when to use each</a>.</li>
<li><a href="dr8/algorithms/classify.php">Classification
and Morphology</a> describes other measurements of objects,
including
<a href="dr8/algorithms/classify.php#photo_class">star/galaxy separation</a>,
<a href="dr8/algorithms/classify.php#photo_fits">model fits</a>,
<a href="dr8/algorithms/classify.php#photo_sb">surface brightnesses</a>,
<a href="dr8/algorithms/classify.php#photo_stokes">ellipticities</a>,
<a href="dr8/algorithms/classify.php#photo_adaptive">adaptive
moments</a> and
<a href="dr8/algorithms/classify.php#photo_iso">isophotal quantities</a>.</li>
<li><span style="color:red;">IMPORTANT!</span> <a href="dr8/algorithms/photo_flags.php">Photometric
processing flags</a> describes the variety of flags frames
sets for each object, essential for properly interpreting
the catalog.</li>
<li><a href="dr8/algorithms/fluxcal.php#counts2mag">Flat
field creation and quality.</a>  See
<a href="http://adsabs.harvard.edu/abs/2008ApJ...674.1217P">the Ubercal
paper</a> for a more detailed discussion of flat-fielding.</li>
<li><a href="dr8/algorithms/sky.php">Sky measurement</a></li>
<li><a href="dr8/algorithms/deblend.php">Deblending</a>
describes how the frames pipeline decides if an initial single
detection is in fact a blend of multiple overlapping objects,
and, if so, how it separates (or "deblends") them.</li>
<li><a href="dr8/algorithms/masks.php">Creation of imaging masks</a></li>
</ul>

<table class="common">
<caption>SAS files used or generated by the frames pipeline</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/photo/fpParam.html">fpParam</a></td>
<td>in</td>
<td>frames tunable parameters</td>
<td>groups/boss/photo/redux/%d/%d/photo/fpParam.par</td>
<td>rerun, run</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/photo/fpPlan.html">fpPlan</a></td>
<td>in</td>
<td>frames processing plan</td>
<td>groups/boss/photo/redux/%d/%d/photo/fpPlan.par</td>
<td>rerun, run</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/idReport.html">idReport</a></td>
<td>in</td>
<td>records runs collected on a night</td>
<td>groups/boss/photo/redux/%d/%d/logs/idReport-%05d.par</td>
<td>rerun, run, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/ssc/koCat.html">koCat</a></td>
<td>in</td>
<td>the catalog of known bright stars</td>
<td>groups/boss/photo/redux/%d/%d/ssc/koCat-%06d.fit</td>
<td>run, rerun, run</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opConfig.html">opConfig</a></td>
<td>in</td>
<td>CCD readout configurations</td>
<td>groups/boss/photo/redux/%d/%d/logs/opConfig-%05d.par</td>
<td>rerun, run, mjd (of generation)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opECalib.html">opECalib</a></td>
<td>in</td>
<td>CCD electronic calibrations</td>
<td>groups/boss/photo/redux/%d/%d/logs/opECalib-%05d.par</td>
<td>rerun, run, mjd (of generation)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/opBC.html">opBC</a></td>
<td>in</td>
<td>CCD bad pixel file</td>
<td>groups/boss/photo/redux/%d/%d/log/opBC-%d.par</td>
<td>rerun, run, mjd<sub>bp</sub> (see fpPlan)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/photo/calib/idB.html">idB</a></td>
<td>in</td>
<td>bias vector</td>
<td>groups/boss/photo/redux/%d/%d/photo/calib/idB-%06d-%c%d.fit</td>
<td>rerun, run, calibration run, filter, camcol</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/psField.html">psField</a></td>
<td>in</td>
<td>the initial photometric calibration and point spread
function fit by field (see
the <a href="dr8/imaging/images.php#psf">extracting
PSF images</a> page) </td>
<td>groups/boss/photo/redux/%d/%d/objcs/%d/psField-%06d-%d-%04d.fit</td>
<td>rerun, run, camcol, run, camcol, field</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/astrom/asTrans.html">asTrans</a></td>
<td>in</td>
<td>tranformation coefficients from row, column to great circle
coordinates</td>
<td>groups/boss/photo/redux/%d/%d/astrom/asTrans-%06d.fit</td>
<td>rerun, run, run</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/fpFieldStat.html">fpFieldStat</a></td>
<td>out</td>
<td>field statistics</td>
<td>groups/boss/photo/redux/%d/%d/objcs/%d/fpFieldStat-%06d-%d-%04d.fit</td>
<td>rerun, run, camcol, run, camcol, field</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/fpObjc.html">fpObjc</a></td>
<td>out</td>
<td>the (uncalibrated) object catalog</td>
<td>groups/boss/photo/redux/%d/%d/objcs/%d/fpObjc-%06d-%d-%04d.fit</td>
<td>rerun, run, camcol, run, camcol, field</td>
</tr>
<!--
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/fpC.html">fpC</a></td>
<td>out</td>
<td>the image itself, bias subtracted, flat fielded, and with bad pixels replaced by interpolated values (the "corrected frame")</td>
<td>groups/boss/photo/redux/%d/%d/corr/%d/fpC-%06d-%c%d-%04d.fit</td>
<td>rerun, run, camcol, run, filter, camcol, field</td>
</tr>
-->
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/fpBIN.html">fpBIN</a></td>
<td>out</td>
<td>a 4x4 binned version of the corrected image after
masking of objects and subtraction of sky, an image of the
estimate of the sky, an image of the uncertainty in the
sky estimate, and a table of bright star wings</td>
<td>groups/boss/photo/redux/%d/%d/objcs/%d/fpBIN-%06d-%c%d-%04d.fit.gz</td>
<td>rerun, run, camcol, run, filter, camcol, field</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/fpM.html">fpM</a></td>
<td>out</td>
<td>the frame masks (read using <a href="dr8/imaging/images.php#readAtlasImages">readAtlasImages</a>)</td>
<td>groups/boss/photo/redux/%d/%d/objcs/%d/fpM-%06d-%c%d-%04d.fit.gz</td>
<td>rerun, run, camcol, run, filter, camcol, field</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/fpAtlas.html">fpAtlas</a></td>
<td>out</td>
<td>the atlas images for all objects detected (read using <a href="dr8/imaging/images.php#readAtlasImages">readAtlasImages</a>)</td>
<td>groups/boss/photo/redux/%d/%d/objcs/%d/fpAtlas-%06d-%d-%04d.fit</td>
<td>rerun, run, camcol, run, camcol, field</td>
</tr>
</table>

<!--
<h3>Monitor Telescope Pipeline (mtpipe)</h3>

<p>References: <a href="http://adsabs.harvard.edu/abs/2006AN....327..821T">2006AN....327..821T</a></p>

<p>On nights the primary SDSS telescope collects imaging data,
the photometric telescope (PT), a second telescope at the same
site, collects images of two types of standard star fields:
primary and secondary. The primary fields contain standard stars
with well established magnitudes, and are used to determine a
photometric solution for the night.  Secondary fields contain
stars that overlap imaging runs, and allow calibration of those
runs.
(The survey originally planned to use a 0.6m telescope, the
Monitor Telescope (MT), for these observations. We replaced the MT
with a 0.5m telescope before the start of data collection. We
called this new telescope the photometric telescope (PT) to
distinguish it from the original 0.6m MT, but most of the
reduction software, file formats and file name standards remained
the same, and retained their original names.)</p>

<table class="common">
<caption>SAS files used or generated by the mtpipe pipeline</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/mdReport.html">mdReport</a></td>
<td>in</td>
<td>records exposures collected on a night</td>
<td>http://das.sdss.org/nightly/%05d/mdReport-%05d.par</td>
<td>mjd, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/metaFC.html">metaFC</a></td>
<td>in</td>
<td>table of reference standard stars</td>
<td>http://das.sdss.org/pt/metaFC.fit</td>
<td>(none)</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/exPhotom.html">exPhotom</a></td>
<td>out</td>
<td>photometric solutions</td>
<td>http://das.sdss.org/pt/solutions/%s/exPhotom-%05d.par</td>
<td>version, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/kaCalObj.html">kaCalObj</a></td>
<td>out</td>
<td>calibrated objects in the PT images</td>
<td>http://das.sdss.org/pt/objects/%s/%d/kaCalObj-%08d.fit</td>
<td>version, stripe, sequenceId</td>
</tr>
</table>
-->

<!--
<h3>"Final" Calibration Pipeline (nfcalib)</h3>

<p>References: <a href="http://adsabs.harvard.edu/abs/2002AJ....123..485S">2002AJ....123..485S</a>,
section 4.5.3</p>

<p>fcalib generates the photometric calibration for a run
based on photometric telescope data (the output of the monitor
telescope pipeline). This was originally considered the "final"
calibration of a run, but now the <a href="dr8/imaging/pipeline.php#ubercal">"ubercal"
calibrations</a> supersede these "final" calibrations.</p>

<p>The <a href="dr8/algorithms/fluxcal.php">photometric
flux calibration algorithms page</a> describes the calibration
and use of calibrated quantities in more detail, and includes
sections on
<a href="dr8/algorithms/fluxcal.php#assessment">assessment of
photometric calibration</a>,
<a href="dr8/algorithms/fluxcal.php#counts2mag">converting SDSS counts to
SDSS (asinh) magnitudes</a> (and <em>vice versa</em>),
<a href="dr8/algorithms/fluxcal.php#SDSStoAB">converting SDSS to AB
magnitudes</a>, and
<a href="dr8/algorithms/fluxcal.php#SDSStoflux">converting SDSS
asinh magnitudes to fluxes.</a>
<a href="dr8/algorithms/sdssUBVRITransform.php">Another
page</a> describes conversion between SDSS magnitudes and
UBVR<sub>c</sub>I<sub>c</sub>, and ugriz colors of Vega and
the Sun.</p>

<p>You can determine which version of the mt calibrations (the
"version" parameters in the formats in the table describing
the monitor telescope pipeline outputs) by looking at the
mtVerPhotom parameter of the fpPlan file, below.</p>

<table class="common">
<caption>SAS files used or generated by the nfcalib pipeline</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/nfpParam.html">nfpParam</a></td>
<td>in</td>
<td>fcalib tunable parameters</td>
<td>http://das.sdss.org/imaging/%d/%d/nfcalib/fpParam.par</td>
<td>run, rerun</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/fpPlan.html">fpPlan</a></td>
<td>in</td>
<td>fcalib processing plan</td>
<td>http://das.sdss.org/imaging/%d/%d/nfcalib/fpPlan-%d.par</td>
<td>run, rerun, camcol</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/logs/idReport.html">idReport</a></td>
<td>in</td>
<td>records runs collected on a night</td>
<td>groups/boss/photo/redux/%d/%d/logs/idReport-%05d.par</td>
<td>rerun, run, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/astrom/asTrans.html">asTrans</a></td>
<td>in</td>
<td>tranformation coefficients from row, column to great circle
coordinates</td>
<td>groups/boss/photo/redux/%d/%d/astrom/asTrans-%06d.fit</td>
<td>rerun, run, run</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/exPhotom.html">exPhotom</a></td>
<td>in</td>
<td>photometric solutions</td>
<td>http://das.sdss.org/pt/solutions/%s/exPhotom-%05d.par</td>
<td>version, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/kaCalObj.html">kaCalObj</a></td>
<td>in</td>
<td>calibrated objects</td>
<td>http://das.sdss.org/pt/objects/%s/%d/kaCalObj-%08d.fit</td>
<td>version, stripe, sequenceId</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/fpObjc.html">fpObjc</a></td>
<td>in</td>
<td>the (uncalibrated) object catalog</td>
<td>groups/boss/photo/redux/%d/%d/objcs/%d/fpObjc-%06d-%d-%04d.fit</td>
<td>rerun, run, camcol, run, camcol, field</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/fcPCalib.html">fcPCalib</a></td>
<td>out</td>
<td>the photometric calibration of a run</td>
<td>http://das.sdss.org/imaging/%d/%d/nfcalib/fcPCalib-%06d-%d.fit</td>
<td>run, rerun, run, camcol</td>
</tr>
</table>
-->

<h2 id="resolve">Resolve Multiple Detections</h2>

<p>A given area on the sky may be observed by multiple runs. The final
calibrated catalogs contain a field declaring whether the the specific observation
of the object is "primary," and the canonical measurement of the
object, or "secondary," a duplicate. These catalogs are generated
twice, once based on the single run in isolation by exportChunk, and
again in the resolve step. The catalogs produced by exportChunk
declare an object primary or secondary based on position alone,
introducing the possibility of inconsistencies due to errors in position; it is
possible, for example, that two separate observation of an object be
declared primary if the position measured for the object is slightly
different in each detection.</p>

<p>The catalog generated by the resolve step, on the other hand, uses an
operational database to search for other detections, and guarantees
that one and only one detection be declared primary.</p>

<p>See <a href="http://adsabs.harvard.edu/abs/2002AJ....123..485S">the
EDR paper, 2002AJ....123..485S</a>, section 4.7 for details on how
objects are resolved.</p>

<p>The catalogs produced by exportChunk can be found in the run directory
of each run:</p>

<table class="common">
<caption>SAS files used or generated by the resolve stage</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/RERUN/RUN/resolve/CAMCOL/reObjGlobal.html">reObjGlobal</a></td>
<td>out</td>
<td>Global resolve status for every object in a field</td>
<td>groups/boss/resolve/%s/%d/%d/resolve/%d/reObjGlobal-%06d-%d-%04d.fit</td>
<td>resolve rerun, rerun, run, camcol, run, camcol, field</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/thingList.html">thingList</a></td>
<td>out</td>
<td>The full list of catalog entries for the resolved survey</td>
<td>groups/boss/resolve/%s/thingList.fits</td>
<td>resolve rerun</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/thingIndex.html">thingIndex</a></td>
<td>out</td>
<td>The full list of unique primary objects, gives position of an object in the thingList</td>
<td>groups/boss/resolve/%s/thingIndex.fits</td>
<td>resolve rerun</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/window_flist.html">window_flist</a></td>
<td>out</td>
<td>The full list of fields used to determine the window function</td>
<td>groups/boss/resolve/%s/window_flist.fits</td>
<td>resolve rerun</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/window_unified.html">window_unified</a></td>
<td>out</td>
<td>The full list of polygons determining the primary area of the window function</td>
<td>groups/boss/resolve/%s/window_unified.fits</td>
<td>resolve rerun</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/window_blist.html">window_blist</a></td>
<td>out</td>
<td>The full list of balkans determining the primary area of the window function</td>
<td>groups/boss/resolve/%s/window_blist.fits</td>
<td>resolve rerun</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/window_bcaps.html">window_bcaps</a></td>
<td>out</td>
<td>The full list of caps determining the primary area of the window function</td>
<td>groups/boss/resolve/%s/window_bcaps.fits</td>
<td>resolve rerun</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/window_bindx.html">window_bindx</a></td>
<td>out</td>
<td>Matches balkans to fields in the window function, sorted by balkans</td>
<td>groups/boss/resolve/%s/window_bindx.fits</td>
<td>resolve rerun</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/window_findx.html">window_findx</a></td>
<td>out</td>
<td>Matches balkans to fields in the window function, sorted by sorted by fields</td>
<td>groups/boss/resolve/%s/window_findx.fits</td>
<td>resolve rerun</td>
</tr>
</table>

<!--

<h3>Astrometric Recalibration</h3>

<p>We recalibrated the astrometry for the final data release,
using updated reference catalogs and improved centroiding:</p>

<table class="common">
<caption>SAS files used or generated in astrometric recalibration</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/asParam.html">asParam</a></td>
<td>in</td>
<td>astrom tunable parameters</td>
<td>http://das.sdss.org/imaging/%d/%d/fastrom/asParam.par</td>
<td>run, rerun</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/asPlan.html">asPlan</a></td>
<td>in</td>
<td>the astrom processing plan</td>
<td>http://das.sdss.org/imaging/%d/%d/fastrom/asPlan.par</td>
<td>run, rerun</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/opConfig.html">opConfig</a></td>
<td>in</td>
<td>CCD configuration, specifying the readout characteristics for each CCD</td>
<td>http://das.sdss.org/nightly/%d/opConfig-%d.par</td>
<td>mjd, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/opCamera.html">opCamera</a></td>
<td>in</td>
<td>positions of the CCDs in the camera</td>
<td>http://das.sdss.org/nightly/%d/opCamera-%d.par</td>
<td>mjd, mjd<sub>cam</sub></td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/idReport.html">idReport</a></td>
<td>in</td>
<td>records runs collected on a night</td>
<td>http://das.sdss.org/nightly/%05d/idReport-%05d.par</td>
<td>mjd, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/idWeather.html">idWeather</a></td>
<td>in</td>
<td>A log of weather data</td>
<td>http://das.sdss.org/nightly/%05d/idWeather-%05d.par</td>
<td>mjd, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/asTrans.html">asTrans</a></td>
<td>out</td>
<td>tranformation coefficients from row, column to great circle
coordinates</td>
<td>http://das.sdss.org/imaging/%d/%d/fastrom/asTrans-%06d.fit</td>
<td>run, rerun, run</td>
</tr>
</table>
-->

<h2 id="ubercal">Photometric Recalibration (Ubercal)</h2>

<p>References: <a href="http://adsabs.harvard.edu/abs/2008ApJ...674.1217P">2008ApJ...674.1217P</a></p>

<p>The "ubercal" recalibration recalibrates the survey by simultaneously solving for the
calibration parameters and relative stellar fluxes using
overlapping observations. The algorithm used decouples the problem of
relative calibrations from that of absolute calibrations; the
absolute calibration is reduced to determining a few numbers for
the entire survey. See the <a href="dr8/algorithms/fluxcal.php">photometric
calibration algorithms page</a>.</p>

<table class="common">
<caption>SAS files generated in photometric recalibration</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/PHOTO_CALIB/RERUN/RUN/nfcalib/calibPhotomGlobal.html">calibPhotomGlobal</a></td>
<td>out</td>
<td>Ubercal results (nanomaggies/count) and associated flat fields</td>
<td>groups/boss/calib/%s/%d/%d/nfcalib/calibPhotomGlobal-%06d-%d.fits</td>
<td>calibration rerun, rerun, run, run, camcol</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/sas/dr8/groups/boss/calib/dr8_final/plots/">calib</a></td>
<td>out</td>
<td>Uberal quality assurance plots</td>
<td>groups/boss/calib/%s/plots/calib-%06d-%c-%s.png</td>
<td>calibration rerun, run, filter, type (flat, hist, run)</td>
</tr>
</table>

<h2 id="catalogs">Photometric Catalogs</h2>

<p>The final photometric catalogs contain the raw data that will be loaded
into the CAS database.</p>

<table class="common">
<caption>SAS files produced by the final catalog</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/RERUN/RUN/CAMCOL/photoObj.html">photoObj</a></td>
<td>out</td>
<td>Full, calibrated outputs of the imager photometric pipeline</td>
<td>groups/boss/photoObj/%d/%d/%d/photoObj-%06d-%d-%04d.fits</td>
<td>rerun, run, camcol, run, camcol, field</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/RERUN/RUN/photoField.html">photoField</a></td>
<td>out</td>
<td>Summary outputs of the properties of every field</td>
<td>groups/boss/photoObj/%d/%d/photoField-%06d-%d.fits</td>
<td>rerun, run, run, camcol</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/photoRunAll.html">photoRunAll</a></td>
<td>out</td>
<td>Summary information of the properties of every photometric run</td>
<td>groups/boss/photoObj/photoRunAll-%s.fits</td>
<td>release (dr8)</td>
</tr>
</table>

<!--
<h3>SuperNova Photometric Calibration</h3>

<p>References: follows method of <a href="http://adsabs.harvard.edu/abs/2008MNRAS.386..887B">2008MNRAS.386..887B</a></p>

<table class="common">
<caption>SAS files generated in photometric
calibration of SuperNova data</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/tsObj.html">tsObj</a></td>
<td>out</td>
<td>the calibrated object catalogs</td>
<td>http://das.sdss.org/imaging/%d/%d/calibChunks/%d/tsObj-%06d-%d-%d-%04d.fit</td>
<td>run, rerun, camcol, run, camcol, rerun,
field</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/tsField.html">tsField</a></td>
<td>out</td>
<td>the calibrated field statistics</td>
<td>http://das.sdss.org/imaging/%d/%d/calibChunks/%d/tsField-%06d-%d-%d-%04d.fit</td>
<td>run, rerun, camcol, run, camcol, rerun,
field</td>
</tr>
</table>
-->

<?php echo foot(); ?>

