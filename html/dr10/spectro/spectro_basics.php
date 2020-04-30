<?php include '../../header.php'; echo head('Understanding SDSS spectroscopic data'); ?>

<div class="summary">

<p>In SDSS, spectra for many objects are taken simultaneously. This is
possible because the spectrographs are connected by fiber optic cables
to an aluminum plate in the telescope's focal plane. With this
arrangement in mind, any SDSS spectrum can be identified with three
numbers:</p>

<ul>
<li><em>Plate</em>, an integer indicating which SDSS plug plate was
used to collect the spectrum</li>
<li><em>MJD</em>, an integer denoting the Modified Julian Date of the
night when the observation was carried out.  Some plates were observed
more than once; these different observations will have different MJD
values.</li>
<li><em>FiberID</em>, an integer denoting the fiber number (1 to 640 for
SDSS-I/II; 1 to 1000 for BOSS)</li>
</ul>

<p>SDSS spectra were collected by a series of spectroscopic programs, described
below. The SDSS Tenth Data Release (summer 2013) will include data from
<a href="surveys/apogee.php">APOGEE</a> as well.</p>

<p>When analyzing spectral lines in SDSS data, remember that the SDSS
wavelength scale is based on
<a href="dr10/spectro/spectro_basics.php#vacuum">vacuum wavelengths</a>.</p>

</div>

<table class="figure">
<tr><td>
<img src="images/plate-sdss.jpg" style="width:350px;" alt="An aluminum plate
about 1 meter across with 640 small holes drilled" /></td></tr>
<tr><td>An SDSS plate</td></tr>
</table>

<h2 id="spectrographs">The spectrographs</h2>

<p> All previous SDSS spectroscopic data (Data Releases 1-8),
including all <a href="http://www.sdss.org/segue/">SEGUE</a> and <a
href="surveys/segue2.php">SEGUE-2</a> data, was taken with the <a
href="http://www.sdss.org/dr7/instruments/spectrographs/index.html">SDSS
spectrograph</a>. With Data Release 9, we released the first data from
a new instrument: the <a href="instruments/boss_spectrograph.php">BOSS
spectrograph</a>. </p>

<p>The table below gives some important information about SDSS spectra
measured with both spectrographs. More information is available in <a
href="dr10/scope.php#specstats">The Scope of DR10: Spectroscopic data
statistics</a>.</p>

<?php include 'specfacts.html'; ?>

<h2 id="identifying">Identifying SDSS spectra</h2>

<p> The SDSS measures many spectra in a single observation: 640 at a
time with the SDSS spectrograph (used in SDSS-I, -II and in the SEGUE
surveys) and 1000 with the BOSS spectrograph (used in the SDSS-III
BOSS survey). The SDSS does this by means of a <span
class="term">plate</span>, an aluminum disk placed in the focal plane
of the telescope. Each plate corresponds to a specific patch of sky,
and is pre-drilled with holes corresponding to the sky positions of
objects in that area, meaning that each area requires its own unique
plate.</p>


<p>Some plates were observed in a single night; others were observed
over multiple nights. Still others had intentionally repeated
spectroscopic observations, with the same plate being re-observed
several times. Thus, in addition to a plate number, identifying an
SDSS spectrum requires knowing the <em>MJD</em> (modified Julian date)
on which that spectrum was observed.</p>

<p>Each hole on each plate corresponds to one object on the
sky. Optical fibers plugged into each hole bring the light from the
focal plane to the pseudoslit of the spectrographs.  Thus, each
spectrum is also referenced by the number of the fiber
(<em>fiberID</em>) with which it was collected. Plates used by the
BOSS spectroscopic program had 1,000 fibers each; plates used by
earlier SDSS spectroscopic programs had 640 fibers each.  If a plate
is observed on more than one MJD, the fibers will be replugged; thus a
given fiberID on different MJDs will correspond to different objects
on the sky.</p>

<p>In addition to the plate-MJD-fiberID system, <a
href="http://skyserver.sdss3.org/dr10">SkyServer</a> uses a unique
number that encodes (64-bit hash) both plate-MJD-fiberID and the <a
href="dr10/help/glossary.php#run2d">RUN2D reduction value</a> of the <a
href="dr10/spectro/pipeline.php">spectroscopic redshift
pipeline</a>. This quantity, <a
href="dr10/help/glossary.php#specobj"><span
class="term">specObjID</span></a>, is unique to each spectrum. You
should use it to <a
href="http://skyserver.sdss3.org/dr10/en/help/howto/search/query3.aspx">join
tables</a> in your SkyServer SQL queries.</p>

<h2 id="Plate">Plate information</h2>

<p> In both SAS and CAS, we provide information about each plate,
including design information, observing conditions, signal-to-noise
and overall quality. We discuss in more detail elsewhere the <a
href="dr10/spectro/targets.php">targeting criteria</a> and <a
href="dr10/spectro/spectro_catalog_quality.php">data quality
flags</a>. Included in the latter is how to find which plates are
"primary" observations. </p>

<p>Each plate has a radius of 1.49 deg.  In addition, fibers cannot be
placed more closely together than 55 arcsec (SDSS) or 62 arcsec (BOSS)
due to the finite size of the fiber cladding.  Finally, no target can
be closer than 100 arcsec to the
center of the plate, because of the center post on the plate.</p>

<p> The general design information about each plate is given by two
parameters:</p>
<ol>
<li> SURVEY, a string denoting the survey this plate is associated
with within SDSS-III.
In DR9, SURVEY is one of "sdss", "boss",
"segue1" or "segue2". </li>
<li>PROGRAMNAME, a string denoting which program within a given survey
this plate is associated with.
</li>
</ol>

<p>As implied in this list, spectra were collected in a series of
<span class="term">surveys</span>, each of which consisted of specific
plate numbers. The largest survey was the <a
href="http://www.sdss.org/legacy/index.html">SDSS Legacy Survey</a>,
which completed the original SDSS spectroscopic survey plan. Other
SDSS spectroscopic surveys include the <a
href="http://www.sdss.org/segue/">Sloan Extension for Galactic
Understanding and Exploration (SEGUE)</a> and its successor <a
href="surveys/segue2.php">SEGUE-2</a>, and the <a
href="surveys/boss.php">Baryon Oscillation Spectroscopic Survey
(BOSS)</a>. </p>

<p>SDSS Legacy and SEGUE-1 cover plate numbers from 266 to
2974. SEGUE-2 covers plate numbers 3000 to 3509; all spectra on these
plates were measured with the <a
href="http://www.sdss.org/dr7/instruments/spectrographs/index.html">SDSS-I/-II
spectrograph.</a> Plate numbers 3510 or larger are BOSS plates, taken
with the new <a href="instruments/boss_spectrograph.php">BOSS
spectrograph</a>.</p>

<p>Each survey has a number of different programs. For the "sdss"
survey plates, the most common PROGRAMNAME is "legacy", which
indicates the plates used for the primary spectroscopic survey. The
SDSS also had a number of special programs, especially on Stripe 82.
SEGUE-1 and SEGUE-2 were broken down into a number of different
programs with somewhat different targeting parameters.  The primary
BOSS survey PROGRAMNAME is "boss". The <a
href="dr10/spectro/targets.php">target selection page</a> has links to
all of the individual types of target selection, where the program
names are defined.</p>

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

<h2 id="version">Version numbers</h2>

<p>Each spectrum was reduced by the SDSS <a href="dr10/spectro/pipeline.php">Spectroscopic
Pipeline</a>. The pipeline has changed slightly over time, so it is important to track
which version of the pipeline was used to reduce which spectra. DR9
and later include
two parameters to track pipeline versions:</p>

<ul>
<li><em>RUN2D</em> denotes the version of extraction and
redshift-finding code used</li>
<li><em>RUNSSPP</em> denotes the version of the SEGUE Stellar
Parameters Pipeline (SSPP) used </li>
</ul>

<p>Through DR10 and including previous data releases, there are five possible values of <em>RUN2D</em>:</p>
<ul>
  <li>v5_5_12: the pipeline version used for BOSS in DR10</li>
  <li>v5_4_45: the pipeline version used for BOSS in DR9</li>
  <li>26: the pipeline version used for the SDSS Legacy and SEGUE-1 programs</li>
  <li>103: a special version of the SDSS pipeline to handle stellar
      cluster plates</li>
  <li>104: the version of the pipeline run on SEGUE-2 plates</li>
</ul>

<p>There are two possible values of <em>RUNSSPP</em>:</p>
<ul>
  <li>116: the DR8 version of the pipeline run on all SEGUE and SDSS Legacy programs</li>
  <li>122: the DR9 version of the pipeline run on all SEGUE and SDSS Legacy programs </li>
</ul>

<h2 id="Object">Fiber information</h2>

<p> In both SAS and CAS, we provide information about each object
within each plate as well. Each spectrum is labeled by its FIBERID,
which for SDSS runs from 1 to 640, and from 1 to 1000 for BOSS. Note
that if a plate has been observed on two different MJDs, the FIBERID
in each does not necessarily correspond to the same location on the
sky.  The plates are plugged by human beings, and the same fiber is
not necessarily plugged into the same hole each time a plate is
plugged.</p>

<p>We discuss in more detail elsewhere the <a
href="dr10/spectro/targets.php">targeting criteria</a>, <a
href="dr10/spectro/spectra.php">the spectra themselves</a> and <a
href="dr10/spectro/catalogs.php">catalog information</a>, including
data quality flags. Included in the latter is how to decide which
spectra among repeat observations of the same object are
"primary."</p>

<p>Finally, we distribute separate catalogs describing <a
href="dr10/spectro/galaxy.php">galaxy parameter measurements</a> and <a
href="dr10/spectro/sspp.php">stellar parameter measurements</a> from
the spectra.</p>

<h2 id="Spectrum">About the Spectra</h2>


<table class="figure" style="width:350px;">
<tr><td><a href="images/sdss_grid_spec.png"><img src="images/sdss_grid_spec.thumb.png" alt="Some selected SDSS spectra." /></a></td></tr>
<tr><td>Some selected SDSS spectra (click for a larger image)</td></tr>
</table>

<p>The image to the right shows previews of 12 typical SDSS spectra.
As described in the <a href="dr10/spectro/spectro_access.php">data
access description</a>, the spectra themselves are provided in <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spPlate.html">spPlate</a>
files in FITS format. The primary HDU of each file contains an image
which yields all 640 (SDSS) or 1000 (BOSS) spectra on each plate, each
as a row in the image. These spectra are flux- and
wavelength-calibrated. Additional HDUs contain the wavelength
solution, variances, masks, and other information. </p>

<p>The logarithmic wavelength grid <em>spacing</em> is the same for all plates
  (log<sub>10</sub> &lambda;<sub>i+1</sub> - log<sub>10</sub> &lambda;<sub>i</sub> = 0.0001)
  but the starting wavelength differs from plate to plate.
  All fibers on the same plate share exactly the same grid.
</p>

<p>
  For more information, see the detailed descriptions of the
  <a href="instruments/boss_spectrograph.php">BOSS spectrographs</a>
  and the <a href="http://www.sdss.org/dr7/instruments/spectrographs/index.html">
    SDSS-I/-II spectrographs</a>.
</p>

<p>In subsequent HDU's, the <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spPlate.html">spPlate</a>
files store the error and mask information. HDU1 stores the "inverse
variance" of the uncertainties per pixel (i.e., one over
sigma-squared). This quantity may be used, for example, in model fits
to the spectra. It is set to zero for pixels that should be ignored
entirely due to, e.g., bad columns (another way of thinking about it
is that they have infinite error). In the spectra shown above the
errors per pixel are shown as the grey band surrounding the spectrum;
for masked pixels the grey band covers the full vertical extent of the
figure.</p>

<p>The pixel mask information is stored in HDU2 and HDU3. These images yield a
<a href="dr10/algorithms/bitmasks.php">bitmask</a> for each pixel, in particular the <a
href="dr10/algorithms/bitmask_sppixmask.php">SPPIXMASK</a> bitmask. Since the final spectrum is
a combination of 3 or more individual exposures, it may be that some bits were flagged in
some exposures but not in others. HDU2 is the "and mask", which lists all the
bits that were set for that pixel in all exposures. HDU3 is the "or mask", which
lists all the bits that were set for that pixel in any one (but not necessarily
all) of the exposures. The "and mask" (HDU2) is the mask of greatest use.</p>

<h2 id="vacuum">Conversion between vacuum and air wavelengths</h2>

<p>The SDSS data describing spectral line wavelengths use <span class="term">vacuum
wavelengths</span>. However, the wavelengths of atomic transitions are usually quoted
at standard temperature and pressure (S.T.P.); this is how the
<a href="http://www.hbcpnetbase.com/">CRC Handbook of Chemistry and Physics</a>
lists them for any transitions redward of 2000 &Aring;ngstroms.</p>

<p>Thus, recognizing spectral lines associated with atomic transitions may require
converting the SDSS data to the equivalent values at S.T.P.</p>

<p>The IAU standard for conversion from air to vacuum wavelengths is
given in <a href="http://adsabs.harvard.edu/abs/1991ApJS...77..119M">Morton (1991,
ApJS, 77, 119)</a>. For a vacuum wavelength (VAC) in &Aring;ngstroms, convert to air
wavelength (AIR) using the equation:</p>
<pre>
AIR = VAC / (1.0 + 2.735182E-4 + 131.4182 / VAC^2 + 2.76249E8 / VAC^4)
</pre>

<p>These are the air and vacuum wavelength of some common transitions:</p>

<table class="common">
<tr><th>Line</th><th>Air</th><th>Vacuum</th></tr>
<tr><td>H-beta</td><td>4861.363</td><td>4862.721</td></tr>
<tr><td>[O III]</td><td>4958.911</td><td>4960.295</td></tr>
<tr><td>[O III]</td><td>5006.843</td><td>5008.239</td></tr>
<tr><td>[N II]</td><td>6548.05</td><td>6549.86</td></tr>
<tr><td>H-alpha</td><td>6562.801</td><td>6564.614</td></tr>
<tr><td>[N II]</td><td>6583.45</td><td>6585.27</td></tr>
<tr><td>[S II]</td><td>6716.44</td><td>6718.29</td></tr>
<tr><td>[S II]</td><td>6730.82</td><td>6732.68</td></tr>
</table>

<p>Note also that the wavelengths are also shifted such that measured
velocities will be relative to the solar system barycentric at the
mid-point of each 15-minute exposure (using TAI-BEG + 0.5 * EXPTIME
from the header).</p>

<?php echo foot(); ?>

