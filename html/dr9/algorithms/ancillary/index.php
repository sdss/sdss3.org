<?php include '../../../header.php'; echo head('BOSS Ancillary Targets'); ?>

 <p>The number density of BOSS's galaxy and quasar targets is not
 uniform on the sky, and in regions of lower-than-average target
 density, not all the 1,000 fibers on a plate will be assigned to
 these core target categories.  With this in mind, we solicited
 proposals within the BOSS collaboration for relatively small (a few
 hundred to a few thousand fibers) programs to use spare fibers when
 available. Twenty-five different programs are included in DR9; these
 <span class="term">ancillary targets</span> together make up
 3.5 percent of all DR9 spectra. </p>

 <p>Spectra for ancillary targets are available in the same manner as any
 other SDSS spectra: individually through the DR9 SkyServer
 <a href="http://skyserver.sdss3.org/dr9/en/tools/chart/navi.asp">Navigate</a> and 
 <a href="http://skyserver.sdss3.org/dr9/en/tools/explore/obj.asp">Explore</a> tools,
 and collectively through <a href="http://skyserver.sdss3.org/dr9/en/tools/search/">SkyServer
 search tools</a>, the <a href="http://skyservice.pha.jhu.edu/casjobs/">CasJobs batch
 interface</a>, or the
 <a href="http://dr9.sdss3.org/advancedSearch">Science Archive Server Advanced Search</a>.</p>

 <h2>Ancillary Target Flags</h2>


 <p>For all SDSS-III spectroscopic data, information about how that object was targeted for
 spectroscopy is included in the object's <a href="dr9/spectro/targets.php">Target Flags</a>.
 Information about whether a target was selected for one or more ancillary target programs is
 included in the flags <em>ANCILLARY_TARGET1</em> and <em>ANCILLARY_TARGET2</em>. (These
 parameters, like all SDSS flag data, are stored as bitmasks. For more information on how
 to work with such data, see the description of
 <a href="dr9/algorithms/bitmasks.php">SDSS-III bitmasks</a>).</p>


<h2>Ancillary Target Selection</h2>

<p>This page describes how to use SDSS-III ancillary targets in general; the pages linked from
the list below describe how targets were selected for specific ancillary targeting programs.</p>

<p>BOSS's ancillary target programs were intended to support studies that require fairly
large samples over large regions of sky, making them difficult to complete in conventional
observations at shared facilities. Thus, the BOSS ancillary target programs provide opportunities
to pursue studies that would be difficult to accomplish in other ways.</p>

<p>Ancillary targets were requested in two calls for proposals made to the SDSS-III
collaboration: one in 2009 and one in 2010. Ancillary targets were given a lower priority for
target selection than the primary science drivers of BOSS; therefore, sample selection for
the ancillary target programs is often not complete.</p>

<p>Ancillary targeting programs fall into two categories: programs that selected targets from
the repeated/stacked imaging of SDSS Stripe 82, and those selected from the rest of SDSS
imaging data. BOSS's spectroscopic observations of the Stripe 82 coverage area are now complete,
so the complete spectroscopic dataset for those ancillary targets in Stripe 82 is being
released as part of Data Release 9. Observations of the remaining ancillary targeting programs
will continue through the end of the survey; DR9 includes the first
part of these data.
Data from additional ancillary programs will likely appear in future
data releases.</p>


<h2>Ancillary Science Programs in Stripe 82</h2>

<p>The following ancillary target programs are now complete. Complete data for these ancillary
targets is being released as part of Data Release 9.</p>

<ul>
    <li><a href="dr9/algorithms/ancillary/transient82.php">The Transient Universe through Stripe 82</a></li>
    <li><a href="dr9/algorithms/ancillary/supernovahosts.php">SDSS-II Supernovae</a></li>
    <li><a href="dr9/algorithms/ancillary/bcg82.php">Brightest Cluster Galaxies in Stripe 82</a></li>
    <li><a href="dr9/algorithms/ancillary/hiqlrg.php">High-Quality LRG Spectra</a></li>
    <li><a href="dr9/algorithms/ancillary/redqso.php">Reddened Quasars</a></li>
    <li><a href="dr9/algorithms/ancillary/noqso.php">No Quasar Left Behind</a></li>
    <li><a href="dr9/algorithms/ancillary/varqso.php">Variability-Selected Quasars</a></li>
    <li><a href="dr9/algorithms/ancillary/kbandqso.php">K-band Limited Sample of Quasars</a></li>
</ul>


<h2>Ancillary Science Programs in the Full BOSS Survey Area</h2>

<p>Spectroscopic observations in the following ancillary target programs have not yet been
completed. In each of these ancillary target programs, data for a subset of targets is part of DR9.
Future data releases will include more targets from these ancillary target programs.</p>

<ul>
    <li><a href="dr9/algorithms/ancillary/lowmass.php">Very Low-Mass Stars and Brown Dwarfs</a></li>
    <li><a href="dr9/algorithms/ancillary/lowmassbinary.php">Low-Mass Binary Stars</a></li>
    <li><a href="dr9/algorithms/ancillary/whitedwarfs.php">White Dwarfs and Hot Subdwarfs</a></li>
    <li><a href="dr9/algorithms/ancillary/distanthalogiants.php">Distant Halo Giants</a></li>
    <li><a href="dr9/algorithms/ancillary/brightgal.php">Bright Galaxies</a></li>
    <li><a href="dr9/algorithms/ancillary/heblazars.php">High-Energy Blazars and Optical Counterparts to Gamma-Ray Sources</a></li>
    <li><a href="dr9/algorithms/ancillary/xrayview.php">An  X-Ray View of Star Formation and Accretion in Normal Galaxies</a></li>
     <li><a href="dr9/algorithms/ancillary/remarkxray.php">Remarkable X-Ray Source Populations</a></li>
    <li><a href="dr9/algorithms/ancillary/starformradgal.php">Star-Forming Radio Galaxies</a></li>
    <li><a href="dr9/algorithms/ancillary/qsosight.php">Galaxies Near SDSS Quasar Sight Lines</a></li>
    <li><a href="dr9/algorithms/ancillary/luminousblue.php">Luminous Blue Galaxies</a></li>
    <li><a href="dr9/algorithms/ancillary/balvarqso.php">Broad Absorption Line (BAL) Quasar
    Variability Survey</a></li>
    <li><a href="dr9/algorithms/ancillary/varqsoabsorb.php">Variable Quasar Absorption</a></li>
    <li><a href="dr9/algorithms/ancillary/doublelobed.php">Double-Lobed Radio Quasars</a></li>
    <li><a href="dr9/algorithms/ancillary/highz.php">High-Redshift Quasars</a></li>
    <li><a href="dr9/algorithms/ancillary/ukidss.php">High-Redshift Quasars from SDSS and
    UKIDSS</a></li>
</ul>

<p>The DR9 documentation includes an index of the values of
<a href="dr9/algorithms/bitmask_ancillary_target1.php">ANCILLARY_TARGET1</a> and
<a href="dr9/algorithms/bitmask_ancillary_target2.php">ANCILLARY_TARGET2</a> that correspond to
each ancillary target program.</p>


<?php echo foot(); ?>

