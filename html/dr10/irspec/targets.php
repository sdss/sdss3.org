<?php include '../../header.php'; echo head('Spectroscopic Target Selection and Target Flags'); ?>

<div class="summary">
<p>
<!--
Every SDSS/APOGEE spectrum was taken for a reason.
 -->
Every 7 deg<sup>2</sup> APOGEE field has many more objects in it than APOGEE can observe.
The process of selecting which
objects have a spectrum taken is called <span class="term">targeting</span>. An
object may have been targeted for spectroscopy for any one of many different purposes, or
for several different reasons at once. It is important to keep track of all the reasons why
a particular object was targeted for spectroscopy.</p>

<p>To keep track of why each object was targeted for spectroscopy, SDSS uses
<span class="term">target flags</span>. Target flags can be used in catalog queries to
select only objects that were (or were not) targeted for a specific set of reasons.</p>
</div>


<h2>Quick Start</h2>

<!--
<p class="todo">Super quick summary of APOGEE targeting principles: minimal
selection criteria for main survey + OMG we haz special targets!</p>
 -->

<p>The majority of APOGEE's targeted sample is composed of red giant stars,
selected with very few criteria --
this is referred to as the "main sample" or "normal targets".
The other scientific sample component comprises the "special targets",
which include (among others) stars with measured parameters and abundances from
other spectroscopic studies, cluster members, and
targets submitted by one of APOGEE's numerous ancillary science programs.
Finally, a sample of early-type stars is observed in order to measure
telluric absorption contamination and remove it from all of the spectra.</p>

<p>See details of these different target classes below, along with a much expanded description in 
<a href="http://xxx.lanl.gov/abs/1308.0351">Zasowski et al. (2013)</a>.</p>

<ul id="pagemenu">
<li><a href="dr10/irspec/targets.php#bitmasks">SDSS-III/APOGEE Target Bitmasks in DR10</a></li>
<li><a href="dr10/irspec/targets.php#mainsurvey">Main Survey Targets</a></li>
<li><a href="dr10/irspec/targets.php#calclusters">Calibration and Cluster Targets</a></li>
<li><a href="dr10/irspec/targets.php#special">Ancillary and Other Special Targets</a></li>
<li><a href="dr10/irspec/targets.php#speccalib">Spectral Calibration Targets</a></li>
<li><a href="dr10/irspec/targets.php#targetfiles">Targeting-Related Files</a></li>
<li><a href="dr10/irspec/targets.php#caveats">Caveats and Special Notes</a></li>
</ul>

<h2 id="bitmasks">SDSS-III/APOGEE Target Bitmasks in DR10</h2>

<p>If you are not familiar with bitmasks, please see
our <a href="dr10/algorithms/bitmasks.php">bitmask primer</a>.</p>

<!--
<p>In addition,
we'll discuss below the differences between various SDSS-III surveys
and programs; please see the <a
href="dr10/irspec/spectro_basics.php">basics
of APOGEE spectroscopy</a> for an outline of what those mean.</p>
 -->

<p>The targeting bitmasks, also called flags, can be used to select out objects
that were targeted for some particular reason(s).
The target bitmasks used by the APOGEE survey are
<a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a>
and
<a href="dr10/algorithms/bitmask_apogee_target2.php">APOGEE_TARGET2</a>.</p>

<p>As an example, to select stars observed as part of APOGEE's "normal" sample (regardless of whether they overlap
an ancillary or other special sample), look for stars identified as
"APOGEE_SHORT", "APOGEE_INTERMEDIATE", or "APOGEE_LONG" cohort members
(see below; <a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a> flags 11, 12, 13). For example, using SQL syntax: </p>

<pre>
  ((apogee_target1 &amp; power(2,11)) != 0) |
  ((apogee_target1 &amp; power(2,12)) != 0) |
  ((apogee_target1 &amp; power(2,13)) != 0)
</pre>
<p>or, using predefined constants in the CAS</p>
<pre>
  ((apogee_target1 &amp; dbo.fApogeeTarget1('APOGEE_SHORT'))  != 0) |
  ((apogee_target1 &amp; dbo.fApogeeTarget1('APOGEE_INTERMEDIATE')) != 0) |
  ((apogee_target1 &amp; (dbo.fApogeeTarget1('APOGEE_LONG')) != 0)
</pre>

<p> Another common usage is to select stars that have pre-existing stellar parameter values.
These targets have
"APOGEE_STANDARD_STAR" (<a href="dr10/algorithms/bitmask_apogee_target2.php">APOGEE_TARGET2</a> bit 2) set,
corresponding to the SQL requirement </p>

<pre>
  (apogee_target2 &amp; power(2,2)) != 0
or
  (apogee_target2 &amp; dbo.fApogeeTarget2('APOGEE_STANDARD_STAR')) != 0
</pre>

<p>Or, one may be interested in removing all of the telluric calibrator targets from a given sample.
This can be done by restricting the sample to all stars meeting the requirement that the
<a href="dr10/algorithms/bitmask_apogee_target2.php">APOGEE_TARGET2</a> flag "APOGEE_TELLURIC" (bit 9)
is <i>not</i> set:</p>

<pre>
  (apogee_target2 &amp; power(2,9)) = 0
</pre>

<p>Because targets can have multiple bits set (and often do), selections can be made on multiple criteria.
For example, to identify globular cluster members that are also photometrically classified as giants,
impose the requirement that
<a href="dr10/algorithms/bitmask_apogee_target2.php">APOGEE_TARGET2</a> flag "APOGEE_CALIB_CLUSTER" (bit 10)
<i>and</i>
<a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a> flag "APOGEE_WASH_GIANT" (bit 7)
be set:</p>

<pre>
  ((apogee_target2 &amp; power(2,10)) != 0) &amp;&amp; ((apogee_target1 &amp; power(2,7)) != 0)
</pre>

<p>We cannot list all of the possibilities here; the
set of flags one needs to check depends on the particular query
requirements. The tables at <a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a>
and <a href="dr10/algorithms/bitmask_apogee_target2.php">APOGEE_TARGET2</a>, along with the text
below, summarize what the available target flags mean.</p>

<h2 id="mainsurvey">APOGEE Main Survey Targets</h2>

<p>APOGEE's primary sample of red giant stars is selected using <i>H</i>-band magnitude limits
and a dereddened (J-K<sub>s</sub>)<sub>0</sub> color limit.
</p>

<p>
The magnitude limits are set by the number of complete visits expected for a group of stars.
In a given field, some stars will be observed every time APOGEE visits the field, and some will
only be observed for a subset of the visits.  A group of stars observed together in the same
visit(s) is called a <span class="term">cohort</span>, which comes in one of three types
(short, intermediate, long), depending on how many visits it is expected to span.  The type of
cohort in which a star is included is recorded in the
<a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a> targeting flag
as "APOGEE_SHORT", "APOGEE_INTERMEDIATE", or "APOGEE_LONG" (bit 11, 12, or 13),
and the magnitude limits are chosen such that the faintest stars in each cohort will
have a final (combined) S/N of 100.
</p>

<!-- <table class="facts"> -->
<!--
<table class="common" style="float:left;margin:1em;width:300px;">
 -->
<table class="common" style="margin:1em;width:300px;">

<caption>H Magnitude Limits</caption>
<tr>
<td><b>Number of Visits</b></td>
<td><b>H Magnitude Range</b></td>
</tr>

<tr>
<td>1</td>
<td>7.0 &le; H &le; 11.0 </td>
</tr>

<tr>
<td>3</td>
<td>7.0 &le; H &le; 12.2 </td>
</tr>

<tr>
<td>6</td>
<td>12.2 &lt; H &le; 12.8 </td>
</tr>

<tr>
<td>12</td>
<td>12.8 &lt; H &le; 13.3 </td>
</tr>

<tr>
<td>24</td>
<td>12.8 &lt; H &le; 13.8 </td>
</tr>
</table>

<p>For the dereddened color selection, we apply a reddening correction to
each potential target based on its E(H-4.5&mu;m) color excess
(using the RJCE method, <a href="http://adsabs.harvard.edu/abs/2011ApJ...739...25M"> Majewski et al 2011</a>, if 4.5&mu;m photometry is available from <i>Spitzer</i> or the WISE mission)
or its position in the Schlegel et al. E(B-V) maps.
The method used for a given star is encoded in the star's
<a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a> bitmask:
"APOGEE_IRAC_DERED" (bit 3), "APOGEE_WISE_DERED" (bit 4), "APOGEE_SFD_DERED" (bit 5), or
APOGEE_NO_DERED (bit 6) if no reddening corrections were applied (the latter is largely
confined to telluric absorption calibrators and stars on certain commissioning plates).
Comparison to stellar atmospheric and Galactic stellar population models indicate
that within APOGEE's typical magnitude range, a color limit of (J-K<sub>s</sub>)<sub>0</sub>&ge;0.5
substantially reduces the dwarf contamination in the final sample.
(See note on the halo fields below.)
</p>

<!--
<p><span class="todo">Something about color cut being good for giants.</span></p>
 -->

<p>
Stars with (J-K<sub>s</sub>)<sub>0</sub>&ge;0.5
and an <i>H</i> mag within the relevant limits
are then sampled in a way that
closely approximates a random draw within each cohort.
Note that the final <i>total</i> magnitude distribution of spectroscopic targets in a field may differ
significantly from the distribution of candidates, since the former also depends on the number
of each type of cohort in the field as well as on the fraction of APOGEE's science fibers
alloted to each type of cohort.
</p>

<p>
In many of APOGEE's halo fields, we use Washington (<i>M</i> and <i>T<sub>2</sub></i>) and <i>DDO51</i>
photometry to classify stars as dwarfs or giants prior to their selection as spectroscopic targets
(in addition to the reddening and magnitude limits).  This is done to increase the giant selection
efficiency in these fields, which have an intrinsically higher dwarf fraction in APOGEE's magnitude range
than the disk and bulge fields.  Stars targeted as photometrically classified giants
are flagged as "APOGEE_WASH_GIANT"
(<a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a> bit 7)
and are prioritized over dwarfs
("APOGEE_WASH_DWARF", <a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a> bit 8).
</p>

<!--
<p>The Legacy targets are those taken as part of the SDSS Legacy
survey, which is the wide-field survey of galaxies brighter than
r=17.77 (Main Sample), Luminous Red Galaxies, and QSOs.  In addition
there are a number of other categories.  In DR9, only spectra on
plates that were part of the Legacy program actually have the
LEGACY_TARGET1 or LEGACY_TARGET2 bits set (i.e. those with
<code>survey</code> set to "sdss" and <code>programName</code> set to
"legacy").</p>


<p>The <a href="dr10/algorithms/legacy_target_selection.php">target selection algorithms
documentation</a> describes the meaning of the bits of these
flags.</p>

 -->
<h2 id="calclusters">APOGEE Calibration and Cluster Targets</h2>
<p>
In addition to the primary target sample, a number of stars with published stellar parameters or
chemical abundances derived from (usually optical) spectroscopy are observed in order to calibrate
the <a href="dr10/irspec/aspcap.php">ASPCAP pipeline</a>.  These targets are flagged in
<a href="dr10/algorithms/bitmask_apogee_target2.php">APOGEE_TARGET2</a> as "APOGEE_STANDARD_STAR" (bit 2).
A concerted effort was made to target the large number of spectroscopically confirmed giants and
supergiants in the Galactic bulge, which have
<a href="dr10/algorithms/bitmask_apogee_target2.php">APOGEE_TARGET2</a> flags
"APOGEE_BULGE_GIANT" and "APOGEE_BULGE_SUPER_GIANT" (bits 11,12) set, respectively.
Stars in the Galactic halo with data from the <a href="http://sdss3.org/surveys/segue2.php">SEGUE</a> surveys are also
deliberately targeted to compare the APOGEE and SEGUE stellar analysis pipelines;
these are indicated in <a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a>
as "APOGEE_SEGUE_OVERLAP" (bit 30).
</p>

<p>
APOGEE targeting in stellar clusters falls into two categories.  One is the targeting of
well characterized clusters (mostly globular), whose members are selected as those confirmed
by existing abundance, proper motion, and/or radial velocity measurements.
Stars observed for this reason are flagged in
<a href="dr10/algorithms/bitmask_apogee_target2.php">APOGEE_TARGET2</a> as "APOGEE_CALIB_CLUSTER" (bit 10).
The other is the targeting of candidate members of poorly studied or unverified clusters,
and candidate members of well studied clusters identified solely by their spatial proximity to the cluster
or their position relative to the cluster locus in a color-magnitude diagram.
Stars in this category are flagged as "APOGEE_SCI_CLUSTER" in
<a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a> (bit 9).
</p>

<h2 id="special">APOGEE Ancillary and Other Special Targets</h2>

<p>
Targets observed as part of APOGEE's approved ancillary science programs are indicated in
<a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a> as "APOGEE_ANCILLARY" (bit 17)
in addition to a bit set in
<a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a>
or
<a href="dr10/algorithms/bitmask_apogee_target2.php">APOGEE_TARGET2</a>
for each individual program.  See those tables for the complete list
and <a href="dr10/algorithms/ancillary/apogee/index.php">these pages</a>
(as well as <a href="http://xxx.lanl.gov/abs/1308.0351">Zasowski et al. 2013</a>) for the relative prioritizations and
an expanded description of each program's goals and target selection.
</p>

<p>
Other supplementary science samples include stars identified by radial velocities as
members of the Sgr dwarf spheroidal galaxy
("APOGEE_SGR_DSPH", <a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a> bit 26)
and stars overlapping with those observed by the <i>Kepler</i> mission.
<i>Kepler</i> stars targeted because of the existence of high-quality
asteroseismological measurements, which can be combined with the APOGEE/ASPCAP abundances
for a number of interesting analyses (including stellar ages), are flagged in
<a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a> as "APOGEE_KEPLER_SEISMO" (bit 27).
Planet-host candidate stars are flagged in <a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a>
as "APOGEE_KEPLER_HOST" (bit 28).
</p>

<!--
<p>The SEGUE-1 targets are those taken as part of the SEGUE-1 survey
of Galactic stars.  In DR9, only spectra on plates that were part of a
SEGUE-1 program actually have the SEGUE1_TARGET1 or SEGUE1_TARGET2
bits set (i.e. those with <code>survey</code> set to "segue1").</p>

<p>The <a href="dr10/algorithms/segue_target_selection.php#SEGUEts1">SEGUE target selection algorithms
documentation</a> describes the meaning of the bits of these
flags.</p>
 -->

<h2 id="speccalib">APOGEE Spectral Calibration Targets</h2>

<p>
APOGEE's observed wavelength range contains a number of contaminating spectral features from
Earth's atmosphere, such as CO<sub>2</sub>, H<sub>2</sub>O, and CH<sub>4</sub> absorption bands and OH airglow emission lines.
These features are removed from the spectra during the "ap1Dvisit" step of
<a href="dr10/irspec/apred.php">the data reduction pipeline</a>.
</p>

<p>
The stars used for telluric absorption calibration are chosen from amongst the bluest stars in the
field (uncorrected for reddening), spatially distributed as evenly as possible.  Generally the same
set of about 35 stars is used for each visit to a given field.  These targets are flagged as "APOGEE_TELLURIC"
in <a href="dr10/algorithms/bitmask_apogee_target2.php">APOGEE_TARGET2</a> (bit 9).
</p>

<p>
<a href="dr10/irspec/apred.php">The data reduction pipeline</a> also uses observations of star-less sky
(i.e., sky positions with no 2MASS source within 6 arcsec) to monitor the airglow and other
emissive contaminants.  These "targets" are flagged in
<a href="dr10/algorithms/bitmask_apogee_target2.php">APOGEE_TARGET2</a>
as "SKY" (bit 4), but the resulting spectra are only available
<!--
as <span class="todo">what kind of file on the Science Archive Server</span>.
 -->
through individual <a href="dr10/irspec/apred.php">exposure ap1Dvisit frames</a>,
since sky subtraction is performed on an exposure-by-exposure basis.
</p>

<h2 id="targetfiles">Targeting-Related Files</h2>
<p> DR10 includes four files containing useful information on stars (targeted and untargeted) in
APOGEE's fields and on the fields themselves, the designs, and the plates in which the targets are organized.
(See further details on this organizational structure in <a href="http://xxx.lanl.gov/abs/1308.0351">Zasowski et al. 2013</a>.)
</p>
<ul>
<li><a href="http://data.sdss3.org/datamodel/files/APOGEE_TARGET/apogeeObject.html">apogeeObject</a>
  contains photometric and proper motion information on the 2MASS objects
  in the APOGEE fields.</li>
<li><a href="http://data.sdss3.org/datamodel/files/APOGEE_TARGET/apogeeField.html">apogeeField</a>
  contains information on the spatial fields, like central coordinates.</li>
<li><a href="http://data.sdss3.org/datamodel/files/APOGEE_TARGET/apogeeDesign.html">apogeeDesign</a>
  contains information on the individual designs, or groups of stars, like color limits and cohort fiber
  allocations.</li>
<li><a href="http://data.sdss3.org/datamodel/files/APOGEE_TARGET/apogeePlate.html">apogeePlate</a>
  contains information on the physical plates.</li>
</ul>


<h2 id="caveats">Caveats and Special Notes</h2>
<h3>Overlap with MARVELS</h3>
<p>
Some of APOGEE's early observations used plates shared with the MARVELS survey,
with a potential <i>small</i> impact on the final APOGEE sample in these fields because the
MARVELS targets were prioritized ahead of the APOGEE targets.
Though the number of stars affected by this sharing is extremely small,
a complete list of shared fields and designs is given in <a href="http://xxx.lanl.gov/abs/1308.0351">Zasowski et al. (2013)</a>.
</p>

<h3>Incorrect APOGEE IDs in the <i>Pleiades</i> and <i>M54SGRC1</i> fields</h3>
<p>
An error resulted in incorrect APOGEE IDs for a number of stars in these fields.
Lists of these IDs and the correct 2MASS identifier for the stars can be found
<a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/pleiades/">here for the Pleiades</a>
and <a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/m54sgrc1/"> here
for <i>M54SGRC1</i></a>.
Note that because of the way the final data files are processed, one or the other of these IDs may be
used.  For example, the summary <code>allStar</code> and <code>allVisit</code> files use the
correct 2MASS identifier, with the incorrect one preserved in the REDUCTION_ID tag, while the
spectra and ASPCAP files (e.g., <code>apStar</code> and <code>aspcapStar</code>) use the incorrect
ID as the primary identifier.
</p>

<h3>Special Selections and Fiber Allocations in Long Halo Fields</h3>
<p>
Due to the paucity of stars, targeting in many of the halo fields differed slightly from that in the disk
and bulge fields, primarily in the use of Washington and DDO51 photometry to prioritize giants over
dwarfs, as described above.  Furthermore, the allocation of fibers among short, medium, and long cohorts
in the long fields is set by the magnitude distribution of high-priority targets (e.g., globular cluster members).
The details of these selections and fiber distributions can be found here for the following fields:
</p>

<table class="common" style="margin:1em;width:600px;">

<!--
<caption>Caption</caption>
 -->
<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/disk120-04/">120-04</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo000+30/">000+30</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo000+60/">000+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo000+75/">000+75</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo010+60/">010+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo015+30/">015+30</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo020+60/">020+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo030+30/">030+30</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo030+60/">030+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo040+45/">040+45</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo040+60/">040+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo045+30/">045+30</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo046+48/">046+48</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo049+62/">049+62</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo050+60/">050+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo058+57/">058+57</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo060+30/">060+30</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo060+56/">060+56</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo060+60/">060+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo060+75/">060+75</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo062+62/">062+62</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo070+54/">070+54</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo070+60/">070+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo075+30/">075+30</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo075+35/">075+35</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo075-45/">075-45</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo080+45/">080+45</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo080+60/">080+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo082+35/">082+35</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo086+77/">086+77</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo088+36/">088+36</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo089+70/">089+70</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo090+30/">090+30</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo090+60/">090+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo090+75/">090+75</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo090-45/">090-45</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo100+60/">100+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo105+30/">105+30</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo105-45/">105-45</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo110+60/">110+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo120+30/">120+30</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo120+45/">120+45</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo120+60/">120+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo120-45/">120-45</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo130+60/">130+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo135+30/">135+30</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo135-45/">135-45</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo150+30/">150+30</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo150+60/">150+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo150-45/">150-45</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo165+30/">165+30</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo165-45/">165-45</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo170+60/">170+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo180+30/">180+30</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo180+60/">180+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo180-45/">180-45</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo186+42/">186+42</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo190+60/">190+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo195+30/">195+30</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo200+45/">200+45</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo200+60/">200+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo210+30/">210+30</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo210+60/">210+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo220+60/">220+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo221+84/">221+84</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo225+30/">225+30</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo228+60/">228+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo240+30/">240+30</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo240+60/">240+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo240+75/">240+75</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo253+75/">253+75</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo255+45/">255+45</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo260+40/">260+40</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo260+60/">260+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo261+48/">261+48</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo266+44/">266+44</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo270+60/">270+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo270+75/">270+75</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo277+76/">277+76</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo279+66/">279+66</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo280+49/">280+49</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo286+44/">286+44</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo300+60/">300+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo300+75/">300+75</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo310+60/">310+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo320+45/">320+45</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo320+60/">320+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo325+76/">325+76</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo330+60/">330+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo330+75/">330+75</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo340+60/">340+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/halo350+60/">350+60</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/m107/">M107</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/m13/">M13</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/m3/">M3</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/m53/">M53</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/m5pal5/">M5PAL5</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/m92/">M92</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/n1333/">N1333</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/ngc4147/">N4147</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/ngc5466/">N5466</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/ngc5634sgr2/">N5634SGR2</a></td>
</tr>

<tr>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/ngc6229/">N6229</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/sgr1/">SGR1</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/vod1/">VOD1</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/vod2/">VOD2</a></td>
<td><a href="http://data.sdss3.org/sas/bosswork/apogee/target/targeting_README/vod3/">VOD3</a></td>
<td> </td>
</tr>
</table>

<h3>Proper Motion Catalogs</h3>
<p>
Many special targets (especially for the ancillary programs) have proper motions gathered
from catalogs other than the ones in
<a href="http://www.usno.navy.mil/USNO/astrometry/information/catalog-info">NOMAD</a>
(used for the main survey targets), particularly when high-accuracy proper motions were required.
Here we give the references for these sources, identified by the PM_CAT tag for each star.
</p>
<table class="common" style="margin:1em;width:600px;">

<caption>Target Proper Motion Catalogs</caption>
<tr>
<td><b>Catalog</b></td>
<td><b>Reference</b></td>
</tr>

<tr>
<td>KIC, KEPLER</td>
<td>(Kepler Input Catalog) Brown et al., 2011, AJ, 142, 112; see <a href="http://archive.stsci.edu/kepler/kepler_fov/help/search_help.html">MAST site</a></td>
</tr>

<tr>
<td>CPS</td>
<td>(California Planet Survey) Target source only, proper motions from van Leeuwen, 2007, A&amp;A, 474, 653</td>
</tr>

<tr>
<td>LSPM, LSPM-N, LSPMd</td>
<td>L&eacute;pine &amp; Shara, 2005, AJ, 129, 1483</td>
</tr>

<tr>
<td>LG11</td>
<td>L&eacute;pine &amp; Gaidos, 2011, AJ, 142, 138</td>
</tr>

<tr>
<td>N188</td>
<td><!--<span class="todo">Waiting for Peter.</span>--></td>
</tr>

<tr>
<td>Schodel+09</td>
<td>Sch&ouml;del et al., 2009, A&amp;A, 502, 91</td>
</tr>

<tr>
<td>CRD, JNKS, LUCY, MRTH, VSINI</td>
<td>Target source catalogs only; proper motions drawn from LSPM or LG11 (above)</td>
</tr>

</table>


<?php echo foot(); ?>

