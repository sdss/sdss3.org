<?php include '../../header.php'; echo head('Getting Started with SEGUE'); ?>

<p>New to SEGUE? This page has some basic information to help you get started on working
with the data.</p>

<ul>
<li><a href="dr10/tutorials/segue_getting_started.php#survey_design">Survey Design</a></li>
<li><a href="dr10/tutorials/segue_getting_started.php#segue1_vs_segue2">Differences between SEGUE-1 and SEGUE-2</a>
    <ul>
        <li><a href="dr10/tutorials/segue_getting_started.php#spatial">Spatial Coverage</a></li>
        <li><a href="dr10/tutorials/segue_getting_started.php#s1s2_tselec">Target Selection</a></li>
    </ul>
</li>
<li><a href="dr10/tutorials/segue_getting_started.php#segue_data">SEGUE Data</a>
    <ul>
       <li><a href="dr10/tutorials/segue_getting_started.php#data_processing">Data Processing</a></li>
	<li><a href="dr10/tutorials/segue_getting_started.php#sspp">SEGUE Stellar Parameter Pipeline (SSPP)</a></li>
       <li><a href="dr10/tutorials/segue_getting_started.php#added_value">SEGUE Value-Added Catalogs</a></li>
</ul>
</li>
<li><a href="dr10/tutorials/segue_getting_started.php#extract_segue_data">Extracting Different Types of SEGUE Data</a>
    <ul>
       <li><a href="dr10/tutorials/segue_getting_started.php#extract_spec">Extracting SEGUE Spectra</a></li>
      <li><a href="dr10/tutorials/segue_getting_started.php#extract_image">Extracting SDSS Images of SEGUE Targets</a></li>
       <li><a href="dr10/tutorials/segue_getting_started.php#extract_param">Extracting Stellar Properties from SEGUE</a></li>
       <li><a href="dr10/tutorials/segue_getting_started.php#warnings">Warnings</a></li>
    </ul>
</li>
</ul>

<hr />

<h2 id="survey_design">Survey Design</h2>

<p>Both SEGUE-1 and SEGUE-2 use the 2.5m Sloan Foundation Telescope (<a
href="http://adsabs.harvard.edu/abs/2006AJ....131.2332G">Gunn et
al. 2006</a>) and the two Sloan Digital Sky Survey fiber
spectrographs. For a SEGUE line-of-sight, each of these spectrographs
acquires data for 320 of the 640 fibers over the 7 square degree
field. The fibers are plugged into aluminum plates mounted in the
telescope focal plane; each set of 640 spectra in a single 7 square
degree field is referred to as a "<a
href="dr10/spectro/spectro_basics.php#identifying">plate</a>." The
spectrograph resolution is 2&#197; at 5000&#197;. SEGUE is a
magnitude-limited survey; the spectra on each plate are integrated to
a target S/N at a fiducial magnitude. </p>

<!--<table class="figure" style="width:262px;">
<tr><td><a href="images/plateLines-003481.png"><img src="images/plateLines-003481_thumb.png" alt="Example of hole positions" /></a></td></tr>
<tr><td>Plate plugging image for a SEGUE-2 plate. Each red circle represents the placement of
a spectroscopic fiber.</td></tr>
</table>-->

<p>For each line of sight, SEGUE identifies spectroscopic targets
using SDSS photometry and astrometry for fiber assignment (see <a
href="dr10/algorithms/segue_target_selection.php">SEGUE Target
Selection</a>). A number of fibers are also devoted to calibration. </p>

<p>SEGUE-1 ran from Winter 2004-2008. With 413 unique plates (and 29
repeated plates), the spectroscopic component covered 1438 square degrees of the sky, with
259,257 spectra of 228,127 unique stars, including calibration
standard stars. SEGUE-2 observed from Summer 2008-2009, covering 1317
square degrees with 204 unique and 7 repeated plates. This survey
obtained 128,288 spectra of 118,958 unique stars. The different plates
and programs in the SEGUE survey are available on the <a
href="dr10/algorithms/segue_plate_table.php">SEGUE Plates</a> page.</p>

<hr />

<h2 id="segue1_vs_segue2">Differences between SEGUE-1 and SEGUE-2</h2>

<h3 id="spatial">Spatial Coverage</h3>

<p> SEGUE-1 plates were placed to probe all of the major known
Galactic structures (disk, halo, streams) with the exception of the
bulge. In contrast, the SEGUE-2 survey focused on stars <i>in situ</i>
in the Milky Way halo. For more information about the motivation of
the two surveys, see the <a href="surveys/segue2.php">SEGUE overview</a> page.</p>

<table class="centerfigure">
<tr><td><a href="images/segueii/segue_fields.jpg"><img src="images/segueii/segue_fields_thumb.jpg" alt="Fields of the SEGUE-1 and SEGUE-2 surveys" /></a></td></tr>
<tr><td>The SEGUE-1 fields are displayed in blue and the SEGUE-2 are in red. The map
is in Galactic coordinates (credit: M. Strauss).</td></tr>
</table>

<p>Nearly all of the SEGUE-1 lines of sight are studied with two
plates, one bright (<i>segue</i>,
14.0&#60;<i>r<sub>0</sub></i>&#60;17.8) and one faint
(<i>seguefaint</i>, <i>r<sub>0</sub></i>&#62;17.8). SEGUE-2 devotes
 only one plate to each line of sight. The plates for each
 SEGUE program, and their RA, Dec, etc., are listed on
the <a
href="dr10/algorithms/segue_plate_table.php">SEGUE Plates</a> page.</p>

<h3 id="s1s2_tselec">Target Selection</h3>

<p>SEGUE-1 sought to characterize the large-scale stellar structures
in the Galaxy. In addition, it sought samples of rare objects, such as
stars with unusually low metallicity. The variety of science goals
dictated a target-selection algorithm that sampled stars at a variety
of distances. SEGUE-1 targets <a
href="dr10/algorithms/segue_target_selection.php#SEGUEts1">15 different
types of stars</a> at a variety of colors and apparent magnitudes to
probe distances from 10 pc (with WDs and M and K dwarfs) to the outer
halo at d ~ 100 kpc (with BHB and red K giant stars). </p>

<p>In contrast, SEGUE-2 focuses on <i>in situ</i> stars in the distant
halo. As SEGUE is a magnitude-limited survey, this goal requires
observing stars more intrinsically luminous than the main sequence.
SEGUE-2 samples <a
href="dr10/algorithms/segue_target_selection.php#SEGUEts2">9 different
target categories</a>.</p>

<p>The photometric and astrometric sample used to select spectroscopic
targets differs for the two surveys. SEGUE-1 relies on photometry from
a series of SEGUE imaging stripes (see <a
href="http://adsabs.harvard.edu/abs/2009AJ....137.4377Y">Yanny et
al. 2009</a> for more detail), processed in the same manner as SDSS
photometry, in conjunction with proper motions from various
astrometric catalogs (<a
href="http://adsabs.harvard.edu/abs/2004AJ....127.3034M">Munn et
al. 2004</a>, <a
href="http://adsabs.harvard.edu/abs/2008AJ....135.2177L">Lepine
2008</a>). SEGUE-2 selects targets using SDSS DR7, from <i>ugriz</i>
photometry (<a
href="http://adsabs.harvard.edu/abs/2009ApJS..182..543A">Abazajian et
al. 2009</a>) and proper motions from the USNOB catalog, recalibrated
for SDSS (<a
href="http://adsabs.harvard.edu/abs/2004AJ....127.3034M">Munn et
al. 2004</a>). </p>

<p>Except for the specific target selection used for the two surveys,
the data from SEGUE-1 and SEGUE-2 are otherwise very
similar. Combining data from the two surveys in an analysis is no
different than combining the different spectroscopic target types from
an individual survey. </p>

<hr />

<h2 id="segue_data">SEGUE Data</h2>

<h3 id="data_processing">Data Processing</h3>

<p>Each spectroscopic observation was extracted and reduced
with the <a href="dr10/spectro/pipeline.php">SDSS spectroscopic
pipeline</a>. These stellar spectra range from 3850 to 9200&#197; in
<a href="dr10/spectro/spectro_basics.php#vacuum">vacuum
wavelengths</a>.  </p>

<p>Along with spectroscopic data, SEGUE utilizes photometry from
SDSS. Information about the reduction of these data is available on the
<a href="dr10/imaging/pipeline.php">Imaging Pipeline</a> page.  As part
of this pipeline, each photometric object is <a
href="dr10/algorithms/classify.php#photo_class">classified as either a
star or galaxy</a>. Additionally, each individual spectra is <a
href="dr10/algorithms/match.php">position-matched in RA and Dec</a>
with the photometric catalog. </p>


<h3 id="sspp">SEGUE Stellar Parameter Pipeline (SSPP)</h3>

<p> After the <a href="dr10/spectro/pipeline.php">SDSS spectroscopic
pipeline</a> has reduced and calibrated the SEGUE and SDSS Legacy
stellar spectra, each one is processed by the <a
href="dr10/spectro/sspp.php">SEGUE Stellar Parameter Pipeline</a>,
which provides estimates of T<sub>eff</sub>, log <i>g</i>, and [Fe/H]
for most stars with T<sub>eff</sub> between 4000 and 10,000 K and S/N
greater than 10. The SSPP also measures the line indices of various
atomic and molecular lines. This pipeline has been <a
href="dr10/spectro/sspp_changes.php">improved considerably since
DR8</a>. In addition, the SSPP now determines the [&alpha;/Fe]
abundance to 0.1 dex for stars with T<sub>eff</sub> between 4500 and
7500 K, log g between 1.5 and 5.0, [Fe/H] between -1.4 and +0.3, and
S/N greater than 20. These are in the <a
href="dr10/spectro/alpha_catalog.php">[&alpha;/Fe] value-added
catalog</a>. </p>

<h3 id="added_value">SEGUE Value-Added Catalogs</h3>

<p>In addition to the new SSPP <a
href="dr10/spectro/alpha_catalog.php">[&alpha;/Fe] value-added
catalog</a>, DR9 provides two more value-added catalogs.  First,
<a href="dr10/spectro/duplicates.php">Duplicate Spectra</a> provides a
list of all of the repeat spectroscopic observations of a single
photometric target.  Second, DR9 provides <a
href="dr10/algorithms/segue_target_selection_weights.php">various weights for
SEGUE G- and K-dwarf stars</a>, to account for observational biases.
This value-added catalog explains some of the different observational
biases in the SEGUE sample and provides guidance on correcting for them
to achieve a complete, unbiased sample. </p>

<hr />

<h2 id="extract_segue_data">Extracting Different Types of SEGUE Data</h2>

<p>There are two main types of data product from SEGUE: the spectra
and the observed and estimated stellar properties, such as
<i>ugriz</i> photometry, proper motions, and estimated stellar
parameters. There are a range of different options to <a
href="dr10/data_access/">access this data</a>. Experts can directly
access the <a href="http://data.sdss3.org/sas/dr10/">DR9 data
files</a>. Below we briefly summarize some of the best ways to extract
information from SEGUE for beginners.  </p>

<h3 id="extract_spec">Extracting SEGUE spectra</h3>

<p>Each individual spectroscopic observation is identified by the
<i>plate</i> it was observed on, the <i>MJD</i> the observation
occurred on, and the fiber number it was assigned to, called the
<i>fiberid</i>. In addition, each spectrum has a unique identifier,
called <i>specobjid</i>. For an overview of the available
spectroscopic information, please use the <a href="dr10/spectro">SDSS
Spectroscopic Data</a> and <a
href="dr10/tutorials/gettingstarted.php#segue2">Getting the Data</a>
pages.</p>

<p>If you just want a quick look at the spectrum for an individual
target, use the <a href="http://dr10.sdss3.org/basicSpectra">DR9
Science Archive Server (SAS)</a>.  Using <i>plate, MJD,</i> and
<i>fiberid</i>, you can examine the observed spectra, best fit
spectra, basic information about the target (RA, Dec, <i>ugriz</i>
information), and more high level information, such as the line
measurements. You also have the option of downloading the individual spectrum
as a FIT file. </p>

<p>If you have a list of multiple spectra you would like to examine, you can use
the <a href="http://dr10.sdss3.org/bulkSpectra">bulk version</a> of the DR9 SAS.
This will provide you with the basic SAS information listed above for numerous
stars. </p>

<p>Finally, one can also access the spectroscopic data on-line with
the <i>rerun</i> and <i>plate</i> information. Experts should feel
free to jump to the <a href="http://data.sdss3.org/datamodel/">Data
Model for SDSS-III</a>. The SEGUE and stellar spectra for DR9 are
organized into three <i>reruns</i>: rerun 26 which contains plates
from the SDSS Legacy survey and SEGUE-1 (plates 182 through 2974),
rerun 103 which contains a few special cluster plates, and rerun 104,
which contains SEGUE-2 plates (generally plate number > 3000). Rerun
103 reexamined the cluster plates to improve flux calibration. Due to
crowded fields or a lack of photometry when the plate was designed,
the list of stars used by the SDSS pipeline for flux calibration
needed to be edited by hand for these plates. Note that for all of the
reruns the actual spectroscopic pipeline was unchanged in any way that
would affect the science. </p>

<p> If you know which rerun your plate is in, you may go to the SAS
 archive for that plate by pointing your browser <a
 href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/">here</a>,
 and selecting the appropriate SPRERUN (26,103, or 104) and
 PLATE. Each spPlate-$PLATE-$MJD.fits file in this directory contains
 the 640 spectra associated with that individual plate. Alternatively,
 you can use rsync and wget to do a <a
 href="dr10/data_access/bulk.php">Bulk Data Download</a>. More
 information is available in the section on <a
 href="dr10/tutorials/gettingstarted.php">Downloading the Data</a>.</p>

<h3 id="extract_image">Extracting SDSS Images of SEGUE Stars</h3>

<p>There are various tools available to extract SDSS images for SEGUE targets.
 You can create a <a href="http://skyserver.sdss3.org/dr10/en/tools/chart/chart.aspx">Finding Chart</a>, or extract images for up to 1000 objects using
 the <a href="http://skyserver.sdss3.org/dr10/en/tools/chart/list.aspx">Image List Tool</a>. If your needs are more complex than this, please use the <a href="dr10/imaging">Imaging Data</a>. </p>

<h3 id="extract_param">Extracting Stellar Properties from SEGUE</h3>

<p>There are a number of different data sets for SEGUE, such as the
DR9 SDSS <i>ugriz</i> photometry and the estimated stellar parameters
from the SSPP. All of this material is in the <a
href="http://skyserver.sdss3.org/dr10/en/">SDSS-III SkyServer</a>. If
you only need some basic information about a particular target, this
is a good resource. </p>

<p>If you want extensive information for a large sample of stars, it
is best to use the <a href="http://skyserver.sdss3.org/CasJobs/">DR9
Catalog Archive Server (CAS)</a>. Using the SQL language, this allows
you to match up data from numerous different tables for a large sample
of objects. If you are new to SEGUE, SQL, and/or the CAS, we recommend
using the <a
href="http://skyserver.sdss3.org/dr10/en/help/howto/search/">SkyServer
SQL Tutorial</a>, <a
href="http://skyserver.sdss3.org/dr10/en/help/docs/realquery.aspx">Sample
SQL Queries</a>, and, most importantly, the <a
href="dr10/tutorials/segue_sqlcookbook.php">Using
SEGUE and CASJobs Tutorial</a>.</p>

<h3 id="warnings">Warnings</h3>

<p>There are a number of issues in the SEGUE photometry and
spectroscopy. Before diving into science, it is important to make sure
you understand how various known problems may affect your
sample. There is extensive documentation on <a
href="dr10/imaging/caveats.php">photometric</a> and <a
href="dr10/spectro/caveats.php">spectroscopic</a> caveats.</p>

<p>There are a number of methods you can use to ensure quality
data. The SSPP provides various <a href="dr10/spectro/sspp_flags.php">
warning flags</a> for its stellar parameter estimates.  In addition,
the <a href="dr10/tutorials/segue_sqlcookbook.php#Quality">SEGUE SQL
Cookbook</a> provides some basic information about making sure you
retrieve high quality observations and parameters for your sample.</p>

<?php echo foot(); ?>
