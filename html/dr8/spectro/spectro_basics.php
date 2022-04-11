<?php include '../../header.php'; echo head('Basics of SDSS spectrograph data'); ?>

<p>Here we describe the general principles around which the SDSS-III
data is organized, as well as the major parameters associated with the
data set. See the <a
href="dr8/spectro/spectro_access.php">spectroscopic data
access documentation</a> for how to access the data.</p>

<p>Keep in mind that the DR8 SDSS spectroscopic data was executed in
several different programs. Each observation in each program
corresponds to a particular plate, an actual physical aluminum plate
that sits in the focal plane, with holes in it into which optical
fibers are plugged. In many cases several observations on different
dates were performed using the same plate.</p>

<p>The largest program was the SDSS Legacy survey, consisting of
around 1800 plates. The next largest were SEGUE-1 (407 plates) and
SEGUE-2 (204 plates). There were a number of smaller special programs
executed as well. The information below describes the bookkeeping
we use to keep track of these observations.</p>

<p><a href="dr8/spectro/spectro_basics.php#IDandVersion">[ID and Version Numbers]</a>&nbsp;<a href="dr8/spectro/spectro_basics.php#Plate">[Plate Info]</a>&nbsp;<a href="dr8/spectro/spectro_basics.php#Object">[Object Info]</a>
</p>

<h2 id="IDandVersion">Identification and version numbers</h2>

<table class="figure">
<tr><td><a href="images/supportbldg3_large.jpg"><img
src="images/supportbldg3_large.jpg" width="340" alt="An SDSS plug plate being plugged" /></a></td></tr>
<tr><td>An SDSS plug plate being plugged.</td></tr>
</table>

<p>The spectroscopic data in SDSS-III is organized according to the
"plate" associated with each observation. To uniquely identify a
spectrum in the survey, one must specify three quantities:</p>

<ol>
<li> PLATE, a unique integer indicating the plug plate used </li>
<li> MJD, an integer denoting the night of the observation</li>
<li> FIBERID, an integer denoting the fiber number</li>
</ol>

<p>The same plate may be observed on multiple MJDs.  If so, the
the same fiber numbers will not in general match the same objects on
different MJDs, since the plate will have been unplugged and
replugged. So all three of these numbers are necessary to track.</p>

<p>In addition, the pipelines used to reduce the data can change over
time. To denote which pipelines have been used, in DR8 we use two
extra parameters:</p>

<ol>
<li> RUN2D, an integer denoting the version of extraction and
redshift-finding used</li>
<li> RUNSSPP, an integer denoting the version of the SEGUE	Stellar
Parameters Pipeline used</li>
</ol>

<p> For DR8, there are three possible RUN2D values: 26, which
corresponds to the pipeline version used for DR7; 103, which is a
special version of the pipeline to handle stellar cluster plates; and
104, which is the version of the pipeline run on SEGUE-2 plates. There
is only one version of SSPP released in DR8, version 116.</p>

<p> Finally, in CAS, there is a quantity SPECOBJID, which is a 64-bit
hash of the above parameters, and is unique within the database. It
should be used for joins of spectroscopic data and photometric or
targeting data tables.</p>

<table class="figure" style="width:262px;">
<tr><td><a href="images/plateLines-003481.png"><img src="images/plateLines-003481_thumb.png" alt="Example of hole positions" /></a></td></tr>
<tr><td>Plate plugging image for an SEGUE-2 plate.</td></tr>
</table>

<p><a href="dr8/spectro/spectro_basics.php#Top">[Back to top]</a></p>


<h2 id="Plate">Plate information</h2>

<p> In both SAS and CAS, we provide information about each plate,
including design information, observing conditions, signal-to-noise
and overall quality. We discuss in more detail elsewhere the <a
href="dr8/spectro/targets.php">targeting criteria</a> and <a
href="dr8/spectro/spectro_catalog_quality.php">data quality flags</a>. Included in
the latter is how to find which plates are "primary" observations. </p>

<p>Each plate has a radius of 1.49 deg.  In addition, fibers cannot be
placed more closely together than 55 arcsec due to collision
constraints. Finally, no target can be closer than 100 arcsec to the
center of the plate, because of the center post on the plate.</p>

<p> The general design information about each plate is given by two
parameters:</p>
<ol>
<li> SURVEY, a string denoting the survey this plate is associated
with within SDSS-III.
In DR8, SURVEY is one of "sdss",
"segue1" or "segue2". </li>
<li>PROGRAMNAME, a string denoting which program within a given survey
this plate is associated with.
For example, within each survey, some plates were designed
for different purposes than others.</li>
</ol>

<p>For the "sdss" survey plates, the most common PROGRAMNAME is
"legacy", which indicates the plates used for the primary
spectroscopic survey. The SDSS also had a number of special programs.
SEGUE-1 and SEGUE-2 were broken down into a
number of different programs with somewhat different targeting
parameters. </p>

<p>There are also some parameters giving more detailed information, in
particular CHUNK and PLATERUN.  Most users can ignore these
parameters; they give internal information about how exactly the plate
design steps were executed.</p>

<p>Additional information for each plate is available, including the
position of the plate on the sky, the date of observation, and other
design information. A complete roster of this information can be found
in the schema of the plateX table on CAS, and <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/plates.html">
the plates file datamodel page</a>.</p>

<p><a href="dr8/spectro/spectro_basics.php#Top">[Back to top]</a></p>
<h2 id="Object">Object information</h2>

<p> In both SAS and CAS, we provide information about each object
within each plate as well. Each spectrum is labeled by its FIBERID,
which for DR8 runs from 1 to 640. Note that if a plate has been
observed on two different MJDs, the FIBERID in each does not
necessarily correspond to the same location on the sky.  The plates
are plugged by human beings, and so there is naturally variation each
time a plate is plugged.</p>

<p>We discuss in more detail elsewhere the <a
href="dr8/spectro/targets.php">targeting criteria</a>, <a
href="dr8/spectro/spectra.php">the spectra themselves</a> and <a
href="dr8/spectro/catalogs.php">catalog information</a>, including
data quality flags. Included in the latter is how to decide which
spectra among repeat observations of the same object are "primary."</p>

<p>Finally, we distribute separate catalogs describing <a
href="dr8/spectro/galspec.php">galaxy parameter measurements</a> and
<a href="dr8/spectro/sspp.php">stellar parameter measurements</a> from
the spectra.</p>

<?php echo foot(); ?>

