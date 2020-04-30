<?php include '../../../../header.php'; echo head('APOGEE Ancillary Targets'); ?>

 <p>Spectra for ancillary targets are available in the same manner as any
 other SDSS spectra: individually through the DR10 SkyServer
 <a href="http://skyserver.sdss3.org/dr10/en/tools/chart/navi.aspx">Navigate</a> and
 <a href="http://skyserver.sdss3.org/dr10/en/tools/explore/obj.aspx">Explore</a> tools,
 and collectively through <a href="http://skyserver.sdss3.org/dr10/en/tools/search/">SkyServer
 search tools</a>, the <a href="http://skyserver.sdss3.org/casjobs/">CasJobs batch
 interface</a>, or the
 <a href="http://dr10.sdss3.org/advancedSearch">Science Archive Server Advanced Search</a>.</p>

 <h2>Ancillary Target Flags</h2>


 <p>For all SDSS-III spectroscopic data, information about how that object was targeted for
 spectroscopy is included in the object's <a href="dr10/spectro/targets.php">Target Flags</a>.
 Information about whether a target was selected for one or more ancillary target programs is
 included in the flags <a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a>
 and <a href="dr10/algorithms/bitmask_apogee_target2.php">APOGEE_TARGET2</a>. (These
 parameters, like all SDSS flag data, are stored as bitmasks. For more information on how
 to work with such data, see the description of
 <a href="dr10/algorithms/bitmasks.php">SDSS-III bitmasks</a>).</p>


<h2>Ancillary Target Selection</h2>

<p>This page describes APOGEE's ancillary targets in general; the pages linked from
the list below describe how targets were selected for specific ancillary targeting programs.</p>

<p>Ancillary targets were requested in two calls for proposals made to the SDSS-III
collaboration: one in 2011 and one in 2012.  DR10 includes targets from proposals accepted in the first
call; additional targets from these and from the second-call proposals will be included
in future data releases (see <a href="http://xxx.lanl.gov/abs/1308.0351">Zasowski et al. (2013)</a> 
for a description of the second-call programs).</p>

<p>Ancillary programs range from those that just use a few fibers on already-planned APOGEE fields to some that involve entirely new plates.  The fraction of ancillary targets per field thus ranges from 0-100%
(but is generally very small, except for the dedicated "new" fields).
Fibers were alloted such that ancillary targets use approximately 5% of APOGEE's total fiber-visits.
Ancillary targets were given high priority on plates, above the main survey sample, because
of their small numbers and high science impact.
</p>

<h2>DR10 Ancillary Science Programs</h2>

<ul>
  <li><a href="dr10/algorithms/ancillary/apogee/M31_clusters.php">Globular Clusters in M31</a></li>
  <li><a href="dr10/algorithms/ancillary/apogee/RG_ages.php">Ages of Red Giants in the <i>Kepler</i> and <i>CoRoT</i> Fields</a></li>
  <li><a href="dr10/algorithms/ancillary/apogee/Eclipsing_Binaries.php">Eclipsing Binaries</a></li>
  <li><a href="dr10/algorithms/ancillary/apogee/M_Dwarfs.php">M Dwarfs</a></li>
  <li><a href="dr10/algorithms/ancillary/apogee/Pal1.php">The Cluster Palomar 1</a></li>
  <li><a href="dr10/algorithms/ancillary/apogee/optical_stars.php">Optical Calibrator Stars</a></li>
  <li><a href="dr10/algorithms/ancillary/apogee/massive_stars.php">Massive Stars</a></li>
<!--
  <li>Kinematics of Young Nebulous Clusters</li>
  <li>The Milky Way's Long Bar</li>
  <li>Early-Type Emission Line Stars</li>
  <li><i>Kepler</i> Cool Dwarfs</li>
  <li>MIR-Detected Open Clusters</li>
-->
</ul>

<p>The DR10 documentation includes an index of the values of
<a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a> and
<a href="dr10/algorithms/bitmask_apogee_target2.php">APOGEE_TARGET2</a> that correspond to
each ancillary target program.</p>


<?php echo foot(); ?>

