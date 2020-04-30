<?php include '../../header.php'; echo head('BOSS Tiling and Geometry'); ?>

<h2>Introduction</h2>

<p>The fibers on the fiber-optic BOSS spectrograph are attached to holes
drilled into metal plates. The image projected onto each plate subtends an
angle of 7&deg; on the sky. Tiling is the process by which plates are
positioned in a pattern that maximizes the fraction of targets that can be
assigned fibers (which we define as "tiling efficiency" or "tiling completeness"),
while minimizing the number of plates that are required to observe the full
survey&mdash;or, equivalently, maximizing the fraction of fibers that are
used for unique science targets (which we define as "fiber efficiency"). </p>

<p> Large-scale structure, as well as galactic structure, causes
inhomogeneities in the angular density of targets on the sky. Thus,
a uniform distribution of tile centers will not achieve both goals of
high tiling and fiber efficiency. The BOSS tile distribution achieves a
tiling efficiency of &gt;93% for all BOSS targets, with a fiber efficiency
of &gt;90%. The primary reason that a target does not get assigned a fiber
is fiber collisions, which we will define below. The tiling completeness of
targets not involved in a fiber collision is &gt;99%.</p>

<p>Much of the content of this page can be found in the
<a
href="http://adsabs.harvard.edu/abs/2003AJ....125.2276B">SDSS
tiling paper; Blanton et al. 2003, AJ 125, 2276</a>.
</p>

<p> A comprehensive tutorial of the tiling process, fiber collisions, and
fiber assignment, can be found at the <a href="dr10/algorithms/legacy_tiling.php">legacy tiling page</a>.</p>

<p>Jump to:</p>

<ul>
  <li><a href="dr10/algorithms/boss_tiling.php#boss_changes">Changes to tiling within BOSS</a></li>
  <li><a href="dr10/algorithms/boss_tiling.php#footprint">Survey Footprint</a></li>
  <li><a href="dr10/algorithms/boss_tiling.php#chunks">Tiling Chunks</a></li>
  <li><a href="dr10/algorithms/boss_tiling.php#mangle">Manipulating Geometry with Mangle</a></li>
  <li><a href="dr10/algorithms/boss_tiling.php#geometry">Tiling Geometry</a></li>
  <li><a href="dr10/algorithms/boss_tiling.php#veto_masks">Veto Masks</a></li>
</ul>

<h2 id="boss_changes">Changes to tiling within BOSS</h2>

<p>The pedagogical discussion of the tiling process
<a href="dr10/algorithms/legacy_tiling.php">linked</a> above contains some information
specific to the tiles used in the SDSS-I/II survey. The main BOSS changes for
tiling are:</p>

<ul>
  <li>The number of fibers per plate is 1000. 895 of these are allocated for
  unique science targets (although they are not always used as such), 100 are
  allocated to standard stars and sky, and 5 are required to be placed on
  repeat observations of targets from other plates.</li>
  <li>Fiber collisions occur when two objects are close enough together
  such that two holes cannot be drilled and plugged on the plate.
  In SDSS-I/II, the collision radius was 55". In BOSS, the collision radius is 62".</li>
</ul>

<h2 id="footprint">Survey Footprint</h2>

<p>Before describing the detailed geometry of the spectroscopic mask created
by all the tiles and chunks, a simple place to start is the overall survey
footprint. The figure below shows the survey footprint, which subtends
10,269 square degrees of sky. The spectroscopic observations are restricted
to be within this footprint, although the spectroscopic plate coverage is
not 100%. This is a subset of the DR8 imaging footprint, which covers
14,555 square degrees.</p>

<p>The <a href="http://data.sdss3.org/sas/dr9/boss/lss/boss_survey.fits">boss_survey.fits</a> file in DR9.</p>

<table class="centerfigure">
<tr><td><img style="width:450px;" src="images/boss/boss_footprint.gif" alt="Footprint" /></td></tr>
<tr><td>Figure 1: Footprint of the Spectroscopic Survey</td></tr>
</table>


<h2 id="chunks">Tiling Chunks</h2>

<p>Although the concept of a "tiling chunk" is discussed on the legacy page,
the concept of a chunk is important for discussing the geometry of the survey,
as well as the evolution of the target selection algorithms for both galaxies and QSOs.</p>
<p>A chunk is a set of tiles&mdash;usually, but not always, a spatially
contiguous set&mdash;that are designed all at the same time. Thus, the
targets within a given chunk all come from a common target selection algorithm.
The tiling solution, i.e., the distribution of tile centers, is determined for
each chunk individually. As of DR9, there are 31 chunks. Early chunks were
small, 50-100 plates. These chunks were kept small as target selection was
evolving with time. Later chunks were much larger.</p>
<p>Figure 2 below shows the geometry of the chunk <strong>boss2</strong>.
This chunk contains 47 plates and covers 144 square degrees. A
<strong>sector</strong> is defined as a region covered by a unique set of
tiles. Each sector in Figure 2 is color coded by the fraction of LRGs that
were assigned fibers. The regions where the plates overlap have a
significantly higher tiling completeness.</p>

<table class="centerfigure">
<tr><td><img style="width:450px;" src="images/boss/boss2_geometry.gif" alt="BOSS2 Geometry" /></td></tr>
<tr><td>Figure 2: Geometry for chunk boss2</td></tr>
</table>

<p>Figure 3 below shows the entire footprint of the survey, now color-coded
such that each chunk is a distinct color. In this figure, boss2 is the dark
blue chunk in the upper left-hand side of the plate. Note that, although these
chunks cover the entire survey, the number of chunks will increase as the survey
progresses: subsets of older chunks will be retiled as target selection is
refined and new ancillary targets are added to the survey.</p>

<table class="centerfigure">
<tr><td><img style="width:450px;" src="images/boss/all_boss_chunks.gif" alt="All BOSS Chunks" /></td></tr>
<tr><td>Figure 3: All BOSS chunks (as of 4/2012)</td></tr>
</table>

<p>Here is a chart showing the target selection algorithms (TSA) for galaxies,
QSOs and standard stars for each chunk. Each entry links to the
<a href="dr10/algorithms/boss_target_selection.php">boss target selection</a>
page, which details the various algorithms used to select targets from the
imaging over the course of the survey.</p>

<table class="common">
  <tr><th>Chunk Name</th><th>Galaxy TSA</th><th>QSO TSA</th><th>Standard TSA</th></tr>
  <tr><td>boss1</td><td><a href="dr10/algorithms/boss_target_selection.php#comm">comm</a></td><td><a href="dr10/algorithms/boss_target_selection.php#comm">comm</a></td><td><a href="dr10/algorithms/boss_target_selection.php#comm">comm</a></td></tr>
  <tr><td>boss2</td><td><a href="dr10/algorithms/boss_target_selection.php#comm2">comm2</a></td><td><a href="dr10/algorithms/boss_target_selection.php#comm2">comm2</a></td><td><a href="dr10/algorithms/boss_target_selection.php#comm2">comm2</a></td></tr>
  <tr><td>boss3</td><td><a href="dr10/algorithms/boss_target_selection.php#main002">main002</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main002">main002</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main004">main004</a></td></tr>
  <tr><td>boss4</td><td><a href="dr10/algorithms/boss_target_selection.php#main002">main002</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main002">main002</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main004">main004</a></td></tr>
  <tr><td>boss5</td><td><a href="dr10/algorithms/boss_target_selection.php#main005">main005</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main005">main005</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main005">main005</a></td></tr>
  <tr><td>boss6</td><td><a href="dr10/algorithms/boss_target_selection.php#main005">main005</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main005">main005</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main005">main005</a></td></tr>
  <tr><td>boss7</td><td><a href="dr10/algorithms/boss_target_selection.php#main007">main007</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main006">main006</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main005">main005</a></td></tr>
  <tr><td>boss8</td><td><a href="dr10/algorithms/boss_target_selection.php#main007">main007</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main006">main006</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main005">main005</a></td></tr>
  <tr><td>boss9</td><td><a href="dr10/algorithms/boss_target_selection.php#main007">main007</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main006">main006</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main005">main005</a></td></tr>
  <tr><td>boss10</td><td><a href="dr10/algorithms/boss_target_selection.php#main007">main007</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main006">main006</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main005">main005</a></td></tr>
  <tr><td>boss11</td><td><a href="dr10/algorithms/boss_target_selection.php#main007">main007</a></td><td><a href="dr10/algorithms/boss_target_selection.php#varcat">vcat-2010-07-02</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main005">main005</a></td></tr>
  <tr><td>boss12</td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main005">main005</a></td></tr>
  <tr><td>boss13</td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss14</td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss15</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss16</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main010">main010</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss17</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main011">main011</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss18</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main012">main012</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss19</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main013">main013</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss20</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main013">main013</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss21</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main013">main013</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss22</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main013">main013</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss23</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main013">main013</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss24</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main014">main014</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss25</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main014">main014</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss26</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main014">main014</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss27</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main014">main014</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss28</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main015">main015</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss29</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main016">main016</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
  <tr><td>boss30</td><td><a href="dr10/algorithms/boss_target_selection.php#main009">main009</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main016">main016</a></td><td><a href="dr10/algorithms/boss_target_selection.php#main008">main008</a></td></tr>
</table>



<h2 id="mangle">Manipulating Geometry with Mangle</h2>

<p>All geometry files, or masks, are created using the software package
<code>mangle</code>. To mangle, a mask is an arbitrary union of arbitrarily
weighted angular regions bounded by arbitrary numbers of edges. The
restrictions on the mask are only (1) that each edge must be part of some
circle on the sphere (but not necessarily a great circle), and (2) that the
weight within each subregion of the mask must be constant. For more
information, check out mangle <a href="http://space.mit.edu/~molly/mangle/">web page</a>.</p>

<p>Here are a couple of examples of using the geometry files for the purpose
of calculating a correlation function. In both examples, "polygonfile" can be
the tiling geometry file discussed below. Note that the tiling geometry does
NOT have weight set currently. Different users may define different sets of
targets, thus this field is set to 1 everywhere as a default.</p>

<ul>
<li><code>polyid [polygonfile] [list of targets (ra/dec)] polyid.out</code> <br />
This command takes a list of targets and tells you what polygon each target is in.
This allows you to sum up the number of targets in each polygon to compute
completeness values. This command can also be used with the veto mask
(described at the end of this page) to remove targets and randoms from the
sample as well. </li>
<li><code>ransack -r100000 [polygonfile] ransack.out</code> <br />
This command creates 10,000 random points using the angular selection function
defined in the polygonfile, outputted in ra and dec in the ransack.out file.</li>
</ul>

<h2 id="geometry">Tiling Geometry</h2>

<p>Although DR9 consists of only one third of the survey, the full distribution of tile centers has been set.
Thus, the tiling geometry of the full spectroscopic survey is fully known.</p>

<p>The full tiling geometry can be found
<a href="http://data.sdss3.org/sas/dr10/boss/lss/mask/boss_geometry_2012_11_19.fits">here</a> with a description of the fields given
<a href="http://data.sdss3.org/datamodel/files/BOSS_LSS_REDUX/mask/MASK.html">here</a>.</p>

<h2 id="veto_masks">Veto Masks</h2>

<p>Some regions of the sky are not observable for myriad reasons. To create a
consistent set of targets and a proper distribution of random points within
they tiling geometry, the excluded areas within the survey are given in the
<strong>veto masks</strong>. These veto masks are also created and manipulated
with the <code>mangle</code> software. All of these masks are
<strong>exclusion</strong> masks: if a random is within the mask, it
should be vetoed. The veto masks include:</p>

<ul>
  <li>Bright Star Mask</li>
  <li>Centerpost Mask</li>
  <li>Bad Field Mask</li>
  <li>Collision Priority Mask</li>
</ul>

<h3>Bright Star Mask</h3>

<p> The bright star mask blocks out regions around bright
stars in the <a href="http://adsabs.harvard.edu/abs/2000A%26A...355L..27H">Tycho-2 catalog</a>.
The radius of each masked region is a function of the apparent brightness of the star. For
both galaxy and QSO targets, the bright star mask is used to remove targets from the list.
No BOSS targets should be within the bright star mask; it should be used to remove randoms.</p>

<p>The bright star mask can be found <a href="http://data.sdss3.org/sas/dr10/boss/lss/reject_mask/bright_star_mask_pix.ply">here</a>.</p>

<h3>Centerpost Mask</h3>
<p>The inner 92" of every plate has a hole for the centerpost. No target
within 92" of a plate center can be assigned a fiber. The centerpost
mask can be found <a href="http://data.sdss3.org/sas/dr10/boss/lss/reject_mask/centerpost_mask.ply">here</a>.</p>

<h3>Bad Field Mask</h3>
<p>Some imaging fields have bad photometry. Targets can still be located
within bad fields, thus both targets and randoms within bad fields should
be rejected. The bad field mask can be found
<a href="http://data.sdss3.org/sas/dr10/boss/lss/reject_mask/badfield_mask_unphot-ugriz_pix.ply">here</a>.</p>

<h3>Collision Priority Mask</h3>

<p>The collision priority mask places 62 arcsecond circles around all targets that have
higher priority than the BOSS galaxy targets. Priority in this context refers to allocation
of fibers in the event of a fiber collision. This mask is for all higher priority targets,
regardless of whether they knocked out a galaxy target or not. It is in mangle polygon
format. The mask is available as
<a href="http://data.sdss3.org/sas/dr10/boss/lss/reject_mask/collision_priority_mask.ply">a .ply file
on the DR9 Science Archive Server</a>.</p>


<?php echo foot(); ?>

