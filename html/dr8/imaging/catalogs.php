<?php include '../../header.php'; echo head('The imaging catalogs'); ?>

<h2>Introduction</h2>

<p>The calibrated object lists reports positions, fluxes, and shapes
of all objects detected at &gt;5 sigma on the survey images. Here we
describe the basics of obtaining and searching the catalogs, and the
metadata associated with each field and run. </p>

<p>To understand the imaging data, you first need an understanding of
the <a href="dr8/imaging/imaging_basics.php">basic imaging data
information</a>.
Below we refer to the <a href="dr8/algorithms/">algorithms</a>
pages for details on the calibration and the photometric
parameters. In general, you will obtain the best results only after
carefully reading that documentation.  <strong>In particular, you need
to look at the <a href="dr8/algorithms/flags_detail.php">object flags</a> in the
object lists to obtain meaningful results.</strong></p>

<h2 id="photoObj">photoObj table and flat files</h2>

<p>
Calibrated object lists are stored both as flat files and as the
photoObj table CAS. These two sets of data are nearly identical,
with only some minor naming convention differences due to historical
artifacts, and a small number of columns that exist in one but not
the other. This data has photometric and
astrometric calibrations applied, and contains enough information
to select unique objects and to perform quality cuts.
</p>

<p>
For many purposes the best source of the object lists is the
photoObj table in CAS, which allows for SQL
searches across the entire dataset. The primary key of this table
is <a href="dr8/glossary.php#ObjID"><code>objID</code></a>, which
can be used to join with the external catalog tables (e.g. TwoMass,
TwoMassXSC, First, ROSAT, RC3, and USNOB), the proper motions
tables (properMotions), and the spectroscopic catalogs
(specObjAll, sppParams, sppLines, etc).
</p>

<p>For example, the follow query will return some basic magnitudes
of a handful of stars:</p>

<pre>
  SELECT top 50 run, camcol, field, obj, ra, dec, psfMag_u, psfMag_g, psfMag_r
  FROM photoObj
  WHERE type = 6
</pre>

<p>In the flat files on SAS, the the <a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/RERUN/RUN/CAMCOL/photoObj.html"><code>photoObj*.fits</code></a>
files directly correspond to the photoObj table in CAS, and contain
all the detected objects. There is one file per <a
href="dr8/glossary.php#field">field</a>. The files are binary fits
tables with one row per object. The total data set is about 3.7 TB, so
downloading the entire set will not be practical for most users; for
many purposes the <a href="dr8/imaging/catalogs.php#sweeps">sweeps</a>
files will be more sensible. The external catalogs are stored in
separate files, in a <a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/external/">
parallel set of directories</a>.</p>

<p>The <code>photoop</code> IDL package distributed with the <a
href="dr8/software/">SDSS software</a> contains code to read in the
photoObj files, and is designed to read in the external catalogs
together with the photoObj files as desired.  For example, to read in
the objects in run 745, camcol 4, field 300, and the matches to USNO-B
and the 2MASS point source catalog:</p>

<pre>
  pobj= photoobj_read(745, 4, 300, rerun=301, extcats=['2MASS', 'USNOB'])
</pre>

<p>In both the flat files and in CAS, detections corresponding to the same source on
the sky are included in the table. One must use the techniques
described in the <a href="dr8/algorithms/resolve.php">resolve
documentation</a> to select unique objects across the survey (or
within a single run). Note that the photoPrimary table in CAS is a
"view" of photoObj which only includes unique objects.</p>

<p>Additionally, some objects have been flagged by the photometric
software as untrustworthy (e.g. including saturated pixels, or
close to a field edge, or badly deblended). Please see the
discussion of these flags <a href="dr8/algorithms/flags_detail.php">object
flags</a> for a full description of the diagnostic flags.</p>

<p>A number of estimators of the flux, the classification, and
shape parameters of the objects are included in the files,
described in the <a
href="dr8/algorithms/magnitudes.php">magnitude</a> and <a
href="dr8/algorithms/classify.php">classification</a> algorithms pages. The
algorithms pages also describe the <a
href="dr8/algorithms/fluxcal.php">ubercalibration</a> and other
details of the photometric pipeline.</p>

<p> <b>Notes</b> </p>

<ul>
<li> In DR6 and previous, the flat files corresponding to
photoObj files were known as "tsObj" files; these are now
obsolete. In DR7, these flat files had a different name,
"drObj". Because of the changing format, we additionally
changed the name.</li>
<li> The primary header of <code>photoObj</code> files contains
some parameters applying to the entire field, such as the seeing
(but also see the PSF parameters in the <code>photoField</code>
file below). </li>
<li>The reported magnitudes are calibrated but not
Galactic extinction corrected. The Galactic extinction for each object as derived from <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=1998ApJ...500..525S">Schlegel,
Finkbeiner, and Davis (1998)</a> dust
maps is reported as <code>extinction</code>. </li>
</ul>

<h2 id="sweeps">Datasweep Files</h2>

<p>
The <a href="http://data.sdss3.org/datamodel/files/PHOTO_SWEEP/RERUN/calibObj.html">
<code>calibObj</code></a>,
AKA "datasweep", files contain a subset of
the data in the
<a href="dr8/imaging/catalogs.php#photoObj"><code>photoObj</code></a>
files.  The datasweeps are designed
for those who want to work with essentially every well measured
object, but only need the most commonly used parameters.
This use case is practical with the
datasweep files which total about 300GB of data.
</p>

<p> Only objects with well determined flux in at least one band are
included.  For galaxies, the limit is set at an extinction corrected
<a href="dr8/algorithms/magnitudes.php#mag_model">model magnitude</a>
less than [21.0,22.0,22.0,20.5,20.1] in <code>u,g,r,i,z</code>
respectively. For stars, the limit is set at an extinction-corrected
<a href="dr8/algorithms/magnitudes.php#mag_psf">PSF magnitude</a>
less than [22.5,22.5,22.5,22.0,21.5] in <code>u,g,r,i,z</code>.
In addition, only a subset of the measured parameters are included,
such as positions, magnitudes, shapes, sizes, processing flags,
etc.</p>

<p> As opposed to the <a
href="dr8/imaging/catalogs.php#photoObj"><code>photoObj</code></a>
files, there is one <code>calibObj</code> file per <a
href="dr8/glossary.php#camcol">camcol</a>.  There is also a separate
file for each of the primary types: "star", "gal", and "sky".  Each of
these files contains a FITS binary table.  See the <a
href="http://data.sdss3.org/datamodel/files/PHOTO_SWEEP/RERUN/calibObj.html">
<code>calibObj description</code></a> for full details.  </p>

<p>
The <code>calibObj</code> files can be read with any FITS binary table
reader.  The <code>photoop</code> IDL package contains code to simplify
reading these files by <code>run,camcol, and type</code>.  If the
environment variable <code>$PHOTO_SWEEP</code> is set to the base directory
holding these files, one can use the <code>sweep_readobj</code>
function to read the data.  E.g. to read
run=756, camcol=2, rerun=301 for galaxies, one can use the sweep_readobj
function:</p>
<pre>
IDL> data=sweep_readobj(756, 2, rerun=301, type='gal')
</pre>
<p>
See the <a href="dr8/software/">software page</a>
to get <code>photoop</code> and other officially supported software.
</p>
<p>
Further cuts should be made on these data before using them for science.  Most
users will only want the
<a href="dr8/glossary.php#primary"><code>SURVEY PRIMARY</code></a>
objects.  See the <a href="dr8/algorithms/resolve.php"><code>resolve</code></a>
documentation for how to select primary objects. Of the primary objects,
most users will
want to remove saturated and other problematic detections.  See the
<a href="dr8/algorithms/flags_detail.php">object flags</a> for a full description
of the diagnostic flags.
</p>


<h2>Field and run metadata</h2>

<p>For each run, and each field within each run, we provide metadata
with information on the location of each run, the observing
conditions, quality flags, and other relevant information. This are
stored in the CAS as the Run and Field tables, and in the flat files
as the
<a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/RERUN/RUN/photoField.html">
<code>photoField</code></a> and
<a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/RERUN/RUN/photoRun.html">
<code>photoRun</code></a> files.
</p>

<p>The following information is included for each field:</p>
<ol>
<li><a href="dr8/algorithms/image_quality.php">image quality
flags</a></li>
<li><a href="dr8/algorithms/fluxcal.php">flux calibration information</a></li>
<li><a href="dr8/imaging/images.php#psf">point-spread function
quantities</a></li>
<li><a href="dr8/algorithms/sky.php">sky measurement quantities</a></li>
<li><a href="dr8/algorithms/astrometry.php">astrometric calibrations</a></li>
</ol>

<p>The following information is included for each run:</p>
<ol>
<li><a href="dr8/glossary.php#mjd">date of observation</a></li>
<li><a href="dr8/glossary.php#stripe">stripe</a> and <a
href="dr8/glossary.php#strip">strip</a> designation</li>
<li>starting and ending <a href="dr8/glossary.php#field">field</a>
numbers</li>
</ol>

<h2 id="fpObjc">Uncalibrated files: fpAtlas, fpObjc, and others</h2>

<p>Our release also contains all of the processed, but uncalibrated
files for reference, in a directory referred to as <a
href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX">PHOTO_REDUX</a>
(click <a
href="http://data.sdss3.org/sas/dr8/groups/boss/photo/redux">here</a>
to browse the actual files).
For example, corresponding to each photoObj file there is an
uncalibrated set of data in an <a
href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/fpObjc.html">fpObjc</a>
file. Included in the same directory are other intermediate outputs
of the pipeline, explained by the data model.
</p>

<p>Most of these files are not for general consumption, but the
directories do contain the <a
href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/fpAtlas.html">fpAtlas</a>
files, which contain the individual atlas images for each object. See
the <a href="dr8/imaging/images.php#atlas">images page</a> for
instructions on how to read these files.</p>

<p>Inside the <a
href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX">PHOTO_REDUX</a>
directory for DR8 we also include the reductions of the Apache Wheel
scans in the rerun 157 directories, described in the page on <a
href="dr8/algorithms/fluxcal.php">calibration</a>. These scans are
fast binned scans that are lower signal-to-noise and lower resolution
than standard SDSS camera imaging. These reductions are essential to
the survey calibration, and we include them here for that reason.
However, we do not recommend their general use.</p>

<?php echo foot(); ?>

