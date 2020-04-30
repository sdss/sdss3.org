<?php include '../../header.php'; echo head('Spectroscopic Data Processing'); ?>

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
exhaustive description of the survey but was last updated in 1997. The
<a href="http://www.sdss.org/publications/#technical">SDSS publications web
page (UPDATE LINK?)</a> includes a list of additional SDSS technical papers.</p>

<p>The <a href="dr8/algorithms/">algorithms
page</a> includes links to pages describing
algorithms used by the data reduction pipelines, and
the <a href="http://data.sdss3.org/datamodel/index-files.html">SAS datamodel</a>
has a table of the most commonly useful files in the SAS.</p>

<p>The remainder of this page starts with a brief overview of spectroscopic data
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
Server</a> (CAS) database. Users are often better off obtaining SDSS
data through a carefully constructed CAS query than they are
downloading the data files from the SAS. Simple queries can be used to
select just the objects and parameters of interest, while more complex
queries can be used to do complex calculations on many objects,
thereby avoiding the need to download the data on them at all.</p>

<h2 id="overview">Overview</h2>

<ul>
<li><a href="dr8/spectro/pipeline.php#specobs"><b>Spectroscopic Observing</b></a><br />
The spectrographs mounted on the primary 2.5m telescope collected
spectra from each plate. There were two spectrographs, each of which
collected data from 320 fibers. Each spectrograph had two CCDs, so the
instrument produced a total of four images for each exposure.</li>
<li><a href="dr8/spectro/pipeline.php#specred"><b>Spectroscopic Data Reduction</b></a><br />
The spectroscopic pipelines extracted one dimensional spectra
from the raw exposures produced by the spectrographs, calibrated
them in wavelength and flux, measured features in these spectra,
measured redshifts from these features, and classified the
objects as galaxies, stars, or quasars.</li>
</ul>

<h2>Notes</h2>

<ul>
<li>In the tables below, add 'http://data.sdss3.org/sas/dr8/' to all 'URL format'
values to get the full URL.</li>
<li>Data reduction could occur multiple times for both images and spectra.
Each time we repeated a data reduction, we labeled the output from that
reduction process with a distinct rerun number.</li>
<li>The <a href="dr8/algorithms/target_selection.php">target
selection algorithms page</a> describes how the pipeline performs
target selection, including selection of
<a href="dr8/algorithms/target_selection.php#main">Main Galaxy Sample</a>,
<a href="dr8/algorithms/target_selection.php#lrg">Luminous Red Galaxies (LRG)</a>,
<a href="dr8/algorithms/target_selection.php#qso">Quasars</a>,
<a href="dr8/algorithms/target_selection.php#stars">Stars</a>,
<a href="dr8/algorithms/target_selection.php#ROSAT">ROSAT All-Sky Survey sources</a>,
<a href="dr8/algorithms/target_selection.php#serendip">Serendipity</a>,
and
<a href="dr8/algorithms/segueii/segue_target_selection.php">SEGUE</a>
targets. The target selection pipeline extracts calibrated catalogs
of objects and corresponding field by field statistics from the
operations database.</li>
<li>The <a href="dr8/algorithms/tiling.php">tiling
algorithms page</a> describes the process by which the spectroscopic
plates are designed and placed relative to each other.</li>
</ul>

<h2 id="specobs">Spectroscopic Observing</h2>

<h3>Plate Plugging (plug)</h3>

<p>When the observatory is ready to observe a plate, the
observatory staff plugs optical fibers into the holes drilled
into the plates, and maps which fiber correponds to which hole
(and therefor which object) by shining light through each fiber.
This data is incorporated into one of the HDUs of the spPlate file
described below.</p>

<h3>Data Collection</h3>

<p>Observers mount cartridges containing the drilled, plugged
plates on the telescope, and collected exposures on each plate
until it reached a threshold estimated signal to noise and at
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
<td>common/sdss-spectro/raw/%d/sdR-%c%d-%08d.fit.gz</td>
<td>mjd, CCD (r or b), camera (1 or 2), exposure id</td>
</tr>
</table>

<h2 id="specred">Spectroscopic Data Reduction</h2>

<h3>Two-dimensional Pipeline (spectro2d, also called idlspec2d)</h3>

<p>References: <a href="http://adsabs.harvard.edu/abs/2002AJ....123..485S">2002AJ....123..485S</a>,
section 4.10.1</p>

<p>The spectro2d pipeline reads science and calibration exposures
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
<td>common/sdss-spectro/redux/%d/%04d/spPlan2d-%04d-%d.par</td>
<td>rerun, plate, plate, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spPlancomb.html">spPlancomb</a></td>
<td>in</td>
<td>the processing plan for combining spectra</td>
<td>common/sdss-spectro/redux/%d/%04d/spPlancomd-%04d-%d.par</td>
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
<td><a href="http://data.sdss3.org/datamodel/files/STAGING_DATA/spectro/MJD/sdR.html">sdR</a></td>
<td>out</td>
<td>raw spectroscopic data frames</td>
<td>common/sdss-spectro/raw/%d/sdR-%c%d-%08d.fit.gz</td>
<td>mjd, CCD (r or b), camera (1 or 2), exposure id</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spCFrame.html">spCFrame</a></td>
<td>out</td>
<td>calibrated spectra for a single CCD and exposure</td>
<td>common/sdss-spectro/redux/%d/%04d/spCFrame-%c%d-%08d.par</td>
<td>rerun, plate, CCD (r or b), camera,
exposure id</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spPlan2d.html">spPlate</a></td>
<td>out</td>
<td>the 640 combined flux- and wavelength-calibrated
spectra over all exposures (potentially spanning multiple
nights) for a given mapped plate</td>
<td>common/sdss-spectro/redux/%d/%04d/spPlate-%04d-%d.par</td>
<td>rerun, plate, plate, mjd</td>
</tr>
</table>

<h3>One-dimensional Pipeline</h3>

<p>The idlspec2d product incorporates <a href="dr8/algorithms/redshifts.php">
the Princeton-1D pipeline</a> (sometimes called specBS)
which  produces the following files:</p>

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
<td><a href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spZline.html">spZline</a></td>
<td>out</td>
<td>emission line fits</td>
<td>common/sdss-spectro/redux/%d/%04d/spZline-%04d-%d.fits</td>
<td>rerun, plate, plate, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spZall.html">spZall</a></td>
<td>out</td>
<td>all spectroscopic classifications and redshifts</td>
<td>common/sdss-spectro/redux/%d/%04d/spZall-%04d-%d.fits</td>
<td>rerun, plate, plate, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spZbest.html">spZbest</a></td>
<td>out</td>
<td>spectroscopic classifications and redshifts</td>
<td>common/sdss-spectro/redux/%d/%04d/spZbest-%04d-%d.fits</td>
<td>rerun, plate, plate, mjd</td>
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
<td>groups/segue2/sspp/%d/%04d/output/param/ssppOut-%04d-%5d.fit</td>
<td>rerun, plate, plate, mjd</td>
</tr>
<tr>
<td><a href="http://data.sdss3.org/datamodel/files/SSPP_REDUX/RERUN/PLATE4/output/param/ssppOut_lineindex.html">ssppOut_lineindex</a></td>
<td>out</td>
<td>SSPP line indices</td>
<td>groups/segue2/sspp/%d/%04d/output/param/ssppOut-%04d-%5d.lineindex.fit</td>
<td>rerun, plate, plate, mjd</td>
</tr>
</table>

<?php echo foot(); ?>
