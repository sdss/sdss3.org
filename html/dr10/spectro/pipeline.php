<?php include '../../header.php'; echo head('The Spectroscopic Pipeline'); ?>

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
<a href="http://adsabs.harvard.edu/abs/2008ApJS..175..297A">DR6</a>,
<a href="http://adsabs.harvard.edu/abs/2009ApJS..182..543A">DR7</a> and
<a href="http://adsabs.harvard.edu/abs/2011ApJS..193...29A">DR8</a>,
describe changes between data
releases. The <a href="http://adsabs.harvard.edu/abs/2000AJ....120.1579Y">technical
summary</a> provides more general information on the SDSS-I survey. The
<a href="http://das.sdss.org/www/html/documents/PBOOK">SDSS Project Book</a>,
written for a funding proposal early in the survey, is the most
exhaustive description of the survey but was last updated in 1997. The
<a href="http://www.sdss.org/publications/#technical">SDSS</a> and <a href="science/technical_publications.php">SDSS-III</a> web pages list the technical publications.</p>


<p>The <a href="dr10/algorithms/">algorithms
page</a> includes links to pages describing
algorithms used by the spectroscopic data reduction pipelines.
This page provides a summary of those steps and
the associated output files.</p>

<p>The remainder of this page starts with a brief overview of spectroscopic data
processing, followed by sections that describe the steps in data
processing in detail. In addition to the more detailed description,
each section provides references to papers that give additional
details, and a table of the files associated with that step of the
pipeline that can be found in the <a href="http://data.sdss3.org">SAS</a>. These tables include links to
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

<h2 id="overview">Overview</h2>

<ul>
<li><a href="dr10/spectro/pipeline.php#specobs"><b>Spectroscopic Observing</b></a><br />
The spectrographs mounted on the primary 2.5m telescope collected
spectra from each plate. There are two spectrographs, each of which
collects data from 320 (SDSS) or 500 (BOSS) fibers.
Each spectrograph has a dichroic that sends light to red and blue
cameras, so the
instrument produces a total of four images for each exposure.</li>
<li><a href="dr10/spectro/pipeline.php#specred"><b>Spectroscopic Data Reduction</b></a><br />
The spectroscopic pipelines extract one dimensional spectra
from the raw exposures produced by the spectrographs, calibrate
them in wavelength and flux, combine the red and blue halves of the
spectra, measure features in these spectra,
measure redshifts from these features, and classify the
objects as galaxies, stars, or quasars.</li>
</ul>

<h2>Notes</h2>

<ul>
<li>In the tables below, prepend 'http://data.sdss3.org/sas/dr10/' to all
  'URL format' values to get the full URL.</li>
<li>URL suffixes are listed for the original SDSS-I/-II survey.
  Replace "sdss/" with "boss/" to get the equivalent BOSS survey files.</li>
<li>Data reduction could occur multiple times for both images and spectra.
Each time we repeated a data reduction, we labeled the output from that
reduction process with a distinct rerun number.</li>
<li>The <a href="dr10/algorithms/legacy_target_selection.php">target
selection algorithms page</a> describes how the pipeline performs
target selection, including selection of
<a href="dr10/algorithms/legacy_target_selection.php#main">Main Galaxy Sample</a>,
<a href="dr10/algorithms/legacy_target_selection.php#lrg">Luminous Red Galaxies (LRG)</a>,
<a href="dr10/algorithms/legacy_target_selection.php#qso">Quasars</a>,
<a href="dr10/algorithms/legacy_target_selection.php#stars">Stars</a>,
<a href="dr10/algorithms/legacy_target_selection.php#ROSAT">ROSAT All-Sky Survey sources</a>,
<a href="dr10/algorithms/legacy_target_selection.php#serendip">Serendipity</a>,
and
<a href="dr10/algorithms/segue_target_selection.php">SEGUE</a>
targets. The target selection pipeline extracts calibrated catalogs
of objects and corresponding field by field statistics from the
operations database.</li>
<li>The <a href="dr10/algorithms/legacy_tiling.php">tiling
algorithms page</a> describes the process by which the spectroscopic
plates are designed and placed relative to each other.</li>
</ul>

<h2 id="specobs">Spectroscopic Observing</h2>

<h3>Plate Plugging (plug)</h3>

<p>When the observatory is ready to observe a plate, the
observatory staff plugs optical fibers into the holes drilled
into the plates, and maps which fiber corresponds to which hole
(and therefore which object) by shining light through each fiber.
This data is incorporated into one of the HDUs of the spPlate file
described below.</p>

<h3>Raw Data Collection</h3>

<p>Observers mount cartridges containing the drilled, plugged
plates on the telescope, and collect a series of 15-minute exposures on each plate
until it reached a threshold estimated signal to noise ratio and at
least three exposures had been collected.</p>

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
<td><a href="http://data.sdss3.org/datamodel/files/STAGING_DATA/oplogs/MJD/sdReport.html">sdReport</a></td>
<td>out</td>
<td>records exposures collected on a night</td>
<td>Not public</td>
<td></td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/STAGING_DATA/spectro/MJD/sdR.html">sdR</a></td>
<td>out</td>
<td>raw spectroscopic data frames</td>
<td>
  sdss/spectro/data/%d/sdR-%c%d-%08d.fit.gz <br/>
</td>
<td>mjd, CCD (r or b), camera (1 or 2), exposure id</td>
</tr>
</table>

<h2 id="specred">Spectroscopic Data Reduction</h2>

<p>
  The <a href="http://www.sdss3.org/svn/repo/idlspec2d/tags/v5_4_45/">
  idlspec2d software</a> has two major pipeline steps:
</p>
<ul>
  <li>
    spec2d: Extract and calibrate 1-dimensional spectra from 2-dimensional raw CCD data
  </li>
  <li>
    spec1d: Measure object classifications and redshift from those 1D spectra.
  </li>
</ul>

<h3>Two-dimensional Pipeline (spec2d)</h3>

<p>References: <a href="http://adsabs.harvard.edu/abs/2002AJ....123..485S">2002AJ....123..485S</a>,
section 4.10.1</p>

<p>The spec2d pipeline reads science and calibration exposures
from the spectrographs, reduces and calibrates the science
exposures, extracts the one dimensional spectra from the two
dimensional exposures, stacks multiple exposures into combined
spectra, and produces corresponding masks and noise
estimates.</p>

<table class="common">
<caption>SAS files used or generated by the spectro2d pipeline</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spPlan2d.html">spPlan2d</a></td>
<td>in</td>
<td>the spectro2d processing plan</td>
<td>sdss/spectro/redux/%d/%04d/spPlan2d-%04d-%d.par</td>
<td>rerun, plate, plate, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spPlancomb.html">spPlancomb</a></td>
<td>in</td>
<td>the processing plan for combining spectra</td>
<td>sdss/spectro/redux/%d/%04d/spPlancomd-%04d-%d.par</td>
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
<td><a href="http://data.sdss3.org/datamodel/files/STAGING_DATA/oplogs/MJD/sdReport.html">sdReport</a></td>
<td>in</td>
<td>records exposures collected on a night</td>
<td>Not public</td>
<td></td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_DATA/MJD/sdR.html">sdR</a></td>
<td>in</td>
<td>raw spectroscopic data frames</td>
<td>sdss/spectro/data/%d/sdR-%c%d-%08d.fit.gz</td>
<td>mjd, CCD (r or b), camera (1 or 2), exposure id</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/PLATE4/spCFrame.html">spCFrame</a></td>
<td>out</td>
<td>calibrated spectra for a single CCD and exposure</td>
<td>sdss/spectro/redux/%d/%04d/spCFrame-%c%d-%08d.par</td>
<td>rerun, plate, CCD (r or b), camera,
exposure id</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/PLATE4/spPlate.html">spPlate</a></td>
<td>out</td>
<td>the 640 (SDSS) or 1000 (BOSS) combined flux- and wavelength-calibrated
spectra over all exposures (potentially spanning multiple
nights) for a given mapped plate</td>
<td>sdss/spectro/redux/%s/%04d/spPlate-%04d-%d.fits</td>
<td>run2d, plate, plate, mjd</td>
</tr>
</table>

<h3>One-dimensional Pipeline (spec1d)</h3>

<p>The <a href="dr10/algorithms/redshifts.php"> spec1d pipeline</a>
produces the following files:</p>

<table class="common">
<caption>SAS files generated by the Princeton 1D pipeline</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/PLATE4/RUN1D/spZline.html">spZline</a></td>
<td>out</td>
<td>emission line fits</td>
<td>sdss/spectro/redux/%d/%04d/spZline-%04d-%d.fits</td>
<td>rerun, plate, plate, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/PLATE4/RUN1D/spZall.html">spZall</a></td>
<td>out</td>
<td>all spectroscopic classifications and redshifts</td>
<td>sdss/spectro/redux/%d/%04d/spZall-%04d-%d.fits</td>
<td>rerun, plate, plate, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/PLATE4/RUN1D/spZbest.html">spZbest</a></td>
<td>out</td>
<td>spectroscopic classifications and redshifts</td>
<td>sdss/spectro/redux/%d/%04d/spZbest-%04d-%d.fits</td>
<td>rerun, plate, plate, mjd</td>
</tr>
</table>

<h3>Per-object spec files</h3>

<p>
  <b>NEW with DR9</b>:
  The pipeline also provides a reformatting of the same spectral data
  into one file per PLATE-MJD-FIBER, including the coadded spectra from
  spPlate, the emission line fits from spZline, the redshifts
  and classifications from spZall and spZbest, and optionally the
  individual exposure spectra from spCFrame.  These are useful when
  you need all of the information for a small subset of objects.
</p>

<table class="common">
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/spectra/PLATE4/spec.html">spec</a></td>
<td>out</td>
<td>All spectral information for a single PLATE-MJD-FIBER</td>
<td>sdss/spectro/redux/%d/spectra/%04d/spec-%04d-%05d-%04d.fits</td>
<td>run2d, plate, plate, mjd, fiber</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/spectra/lite/PLATE4/spec.html">speclite</a></td>
<td>out</td>
<td>All spectral information for a single PLATE-MJD-FIBER
  except the individual exposures</td>
<td>sdss/spectro/redux/%d/spectra/lite/%04d/spec-%04d-%05d-%04d.fits</td>
<td>run2d, plate, plate, mjd, fiber</td>
</tr>
</table>

<h3>Stellar Parameters Pipeline (sspp)</h3>

<p>References: <a href="http://adsabs.harvard.edu/abs/2008AJ....136.2022L">2008AJ....136.2022L</a>,
<a href="http://adsabs.harvard.edu/abs/2008AJ....136.2050L">2008AJ....136.2050L</a>,
<a href="http://adsabs.harvard.edu/abs/2008AJ....136.2070A">2008AJ....136.2070A</a></p>

<p>The SEGUE stellar parameters pipeline produces a number of
files, stored together:</p>

<table class="common">
<caption>SAS files used or generated by the SSPP pipeline</caption>
<tr>
<th>File Type</th>
<th>in/out</th>
<th>Description</th>
<th>URL format</th>
<th>format parameters</th>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/SSPP_REDUX/RERUN/PLATE4/output/param/ssppOut.html">ssppOut</a></td>
<td>out</td>
<td>SSPP stellar parameters ([Fe/H], log g, etc.)</td>
<td>sdss/sspp/%d/%04d/output/param/ssppOut-%04d-%5d.fit</td>
<td>rerun, plate, plate, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/SSPP_REDUX/RERUN/PLATE4/output/param/ssppOut_lineindex.html">ssppOut_lineindex</a></td>
<td>out</td>
<td>SSPP line indices</td>
<td>sdss/sspp/%d/%04d/output/param/ssppOut-%04d-%5d.lineindex.fit</td>
<td>rerun, plate, plate, mjd</td>
</tr>
</table>

<?php echo foot(); ?>
