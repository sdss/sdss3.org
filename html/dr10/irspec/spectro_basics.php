<?php include '../../header.php'; echo head('Understanding SDSS-III APOGEE Infrared Spectroscopic Data'); ?>

<div class="summary">

<p>SDSS-III APOGEE infrared spectra are collected mostly for the primary scientific
program, a systematic survey of all parts of the Milky Way using homogeneous
selection criteria. </p>

<p> With the APOGEE instrument, 300 spectra (including science targets and calibration)
are taken at a time. The main APOGEE survey plans to probe
several hundred different locations in the sky; DR10 includes
results from 170 fields.  For most survey fields, multiple observations are made at different
epochs to allow for the identification of binary stars through the detection of changing
radial velocities. The combined spectra of the multiple observations are a primary
data product.</p>

<p> From the combined spectra, stellar atmospheric parameters are derived
using the APOGEE Stellar Parameters and Chemical Abundances
Pipeline (ASPCAP).  These higher level products are tabulated for each object.</p>

</div>

<!--
<table class="figure">
<tr><td>
<img src="images/plate-apogee.jpg" style="width:350px;" alt="An aluminum plate
about 1 meter across with 300 small holes drilled" /></td></tr>
<tr><td>An SDSS/APOGEE plate</td></tr>
</table>
-->

<table class="figure" style="width:350px;">
<tr><td><a href="images/apogee/temp_sequence.png"><img src="images/apogee/temp_sequence.thumbnail.gif" alt="Some selected APOGEE spectra." /></a></td></tr>
<tr><td>Some selected APOGEE spectra (click for a larger image)</td></tr>
</table>


<h2 id="spectrographs">The Spectrograph</h2>


<p> All previously released SDSS spectroscopic data (Data Releases 1-9),
including all <a href="http://www.sdss.org/segue/">SEGUE</a> and <a
href="surveys/segue2.php">SEGUE-2</a> data, were taken with optical
spectrographs. In Data Release 10 we release the first data from
a new survey and a new instrument, the APOGEE spectrograph.</p>

<p>
APOGEE spectra are quite different from previous SDSS spectra: They
are obtained in the infrared portion of the electromagnetic spectrum,
covering wavelengths between 1.5 and 1.7 microns (in the infrared <i>H</i>-band).
Moreover, the spectra are taken at relatively high spectral resolution -- 10 times higher
than the SDSS optical spectra.  This higher resolution enables a
more detailed look at the light emitted by stars, and allows the
derivation of more accurate radial velocities and more precise information about the
chemical compositions as well as the physical conditions prevailing in the
atmospheres of the survey stars.</p>

<p>
For more information on the APOGEE instrument, see the detailed description of the
<a href="instruments/apogee_spectrograph.php">APOGEE spectrograph</a>.
</p>

<h2>The APOGEE Survey</h2>

<p>
The main APOGEE survey targets cool stars -- particularly red giant stars --
throughout the multiple components
of the Milky Way: the thin disk, thick disk, bulge and halo. Some other data have
also been collected for a set of ancillary science programs. The
way that the different samples have been selected is documented in
a description of the <a href="dr10/irspec/targets.php"> target selection</a>,
which also describes how the targeting information is attached to
the output data products through the use of target flags.
</p>

<h2>The APOGEE Spectra</h2>

<p> APOGEE measures many spectra in a single observation -- 300 at a
time -- with a unique, state-of-the-art, cryogenic, infrared spectrograph.
This is done by means of a <span
class="term">plate</span>, an aluminum disk placed in the focal plane
of the telescope. Each plate corresponds to a specific patch of sky
and is pre-drilled with holes corresponding to the sky positions of
objects in that area.  Each area of the sky is covered by one or more unique
plates.</p>

<p>For APOGEE, almost all fields are observed multiple times on separate
nights to allow for the identification of binary star systems as objects
that have a radial velocity that changes over time as a reflection of the binary
star orbit. Each one of these observations is called a <span
class="term">visit</span>,
and visits are identified with a plate number and the <em>MJD</em>
(modified Julian date) on which that plate was observed. </p>

<p>Each hole on each plate corresponds to one object on the
sky. Optical fibers plugged into each hole bring the light from the
focal plane to the pseudoslit of the spectrograph.  Thus, each
spectrum is also referenced by the number of the fiber
(<span class="term">fiberID</span>) with which it was collected.
Plates used by the APOGEE survey have 300 fibers each.  If a plate
is observed on more than one MJD, in general the fibers will be replugged; thus a
given fiberID on different MJDs may correspond to different objects
on the sky.  The visit spectra for individual objects are available  in
<a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/plates/PLATE_ID/MJD5/apVisit.html">apVisit</a>
FITS files.</p>

<p>In addition to the individual visit spectra, the APOGEE software
pipeline coadds the spectra for each particular star coming
from different visits to the same field;
this produces a higher signal-to-noise spectrum of each object. These combined
spectra are identified by the catalog name of each star. The APOGEE sample
is selected almost exclusively from the 2MASS catalog, and thus the
stellar identifications are by their APOGEE ID, which basically just
encodes the position of the star on the sky from the Two Micron All-Sky Survey (2MASS).
The combined spectra are a primary data product of the APOGEE
survey.  As described in the <a href="dr10/irspec/spectro_data.php">data
access description</a>, the combined spectra themselves are provided in <a
href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/LOCATION_ID/apStar.html">apStar</a>
files in FITS format.</p>

<p>The image to the right shows examples of some typical APOGEE spectra for stars of
different spectral types.</p>

<p> Because of the nature of infrared observing, various instrumental features,
and the still developing state of the reduction pipeline, there are important
things to be aware of when looking at the APOGEE spectra. For more information,
read the page on <a href="dr10/irspec/spectra.php"> using APOGEE spectra</a>,
as well as the information about the
<a href="dr10/irspec/pipeline.php"> APOGEE pipeline</a>.
</p>

<h2>APOGEE Stellar Parameters</h2>

<p> After the reduction pipeline produces combined spectra, a separate pipeline,
the APOGEE Stellar Parameters and Chemical Abundances Pipeline (ASPCAP) analyzes them
to derive stellar atmospheric parameters (and, eventually, individual chemical abundances;
this portion of the pipeline has not been implemented for DR10 results). For more information, see the
description of the <a href="dr10/irspec/aspcap.php"> ASPCAP pipeline </a>, and,
if you are interested in using the stellar parameters, the page on
<a href="dr10/irspec/parameters.php"> Using stellar parameters </a>.</p>

<?php echo foot(); ?>

