<?php include '../../header.php'; echo head('Creating a Large Scale Structure Galaxy Catalog'); ?>

<p>
So you want to create a large scale structure (LSS) galaxy catalog? If you
want to work with the catalogs that were used in the DR10 clustering
analysis, they are available from the <a href="dr10/data_access/vac.php">Value
Added Catalogs</a> page. This
page describes the files and processes needed to create your own large
scale structure galaxy catalog from the raw SDSS-III DR10 files. The first
section describes the necessary files and where to get them, and the
subsequent sections each describe a step in the procedure.
</p>

<p>
<b><span style="color:red;">NOTE:</span></b> Some of the files listed below
will not be made available until the DR10 LSS paper has been submitted. Also,
these instructions may be revised until that time. This note will be removed
when the DR10 LSS paper is submitted.
</p>

<h2 id="files">Necessary files</h2>

<p>In order to follow this procedure, you will have to have the
following files.</p>

<ul>
  <li>Target list: <a href="http://data.sdss3.org/sas/dr10/boss/lss/bosstile-final-collated-boss2-boss32.fits.gz">bosstile-final-collated-boss2-boss32.fits</a> -
  <a href="http://data.sdss3.org/datamodel/files/BOSS_LSS_REDUX/bosstile-final-collated-boss2-boss32.html">data model</a></li>
  <li>Redshifts: <a href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/specObj-dr10.fits">specObj-dr10.fits</a> -
  <a href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/specObj.html">data model</a></li>
  <li>Acceptance mask: <a href="http://data.sdss3.org/sas/dr10/boss/lss/mask/boss_geometry_2012_11_19.fits">boss_geometry_2012_11_19.fits</a>
  or <a href="http://data.sdss3.org/sas/dr10/boss/lss/mask/boss_geometry_2012_11_19.ply">boss_geometry_2012_11_19.ply</a><!-- -
  <a href="http://data.sdss3.org/datamodel/files/BOSS_LSS_REDUX/mask/MASK.html">data model</a>--></li>
  <li>Rejection mask (bad fields): <a href="http://data.sdss3.org/sas/dr10/boss/lss/reject_mask/badfield_mask_unphot-ugriz_pix.ply">badfield_mask_unphot-ugriz_pix.ply</a><!-- -
  <a href="http://data.sdss3.org/datamodel/files/BOSS_LSS_REDUX/reject_mask/MASK.html">data model</a>--></li>
  <li>Rejection mask (bright stars): <a href="http://data.sdss3.org/sas/dr10/boss/lss/reject_mask/bright_star_mask_pix.ply">bright_star_mask_pix.ply</a> <!---
  <a href="http://data.sdss3.org/datamodel/files/BOSS_LSS_REDUX/">data model</a>--></li>
  <li>Rejection mask (centerposts): <a href="http://data.sdss3.org/sas/dr10/boss/lss/reject_mask/centerpost_mask.ply">centerpost_mask.ply</a><!-- -
  <a href="http://data.sdss3.org/datamodel/files/BOSS_LSS_REDUX/">data model</a>--></li>
  <li>Rejection mask (collision priority): <a href="http://data.sdss3.org/sas/dr10/boss/lss/reject_mask/collision_priority_mask.ply">collision_priority_mask.ply</a><!-- -
  <a href="http://data.sdss3.org/datamodel/files/BOSS_LSS_REDUX/">data model</a>--></li>
</ul>

<h2>Create target photometric catalog</h2>

<p>
The first step toward producing a uniform large scale structure
catalog is to generate a list of objects targeted with the same
<a href="dr10/algorithms/boss_galaxy_ts.php">target selection</a>
algorithm. This is complicated by the fact that the final photometry
for an object (as given in the
<a href="http://skyserver.sdss3.org/dr10/en/help/browser/browser.aspx">photoobj</a>
table) may not match the photometry when the targeting algorithm was
run for that object. Early chunks used an earlier version of the
photometric data, and one must use the correct target photometry when
generating a catalog. Also, the target selection algorithms changed
slightly after the early chunks (or, in the case of LOWZ, after bugs
in target selection were fixed).
</p>

<p>
To this end, we have created a merged target list, using the correct
target photometry for each object, and have created a version of the
<a href="dr10/algorithms/bitmask_boss_target1.php">BOSS_TARGET1</a>
target flag that reflects the final target selection, as applied to
the appropriate photometry for each object. The target list file,
<a href="dr10/tutorials/lss_galaxy.php#files">linked above</a>,
includes a bitfield--BOSS_TARGET1_009--that can be used just
like BOSS_TARGET1 to select a set of galaxy targets:
</p>

<ul>
  <li>LOWZ: (BOSS_TARGET1_009 &gt; 0) &amp;&amp; ((BOSS_TARGET1_009
  &amp;&amp; 2<sup>0</sup>)&nbsp;&gt;&nbsp;0)</li>
  <li>CMASS: (BOSS_TARGET1_009 &gt; 0) &amp;&amp; ((BOSS_TARGET1_009
  &amp;&amp; 2<sup>1</sup>)&nbsp;&gt;&nbsp;0)</li>
</ul>

<p>
Selecting objects with these flags will remove chunks 1-6 for LOWZ
(where the target selection bug appeared), and will use the correct
version of the photometry to select targets for CMASS, applying the
final version of target selection (i.e., with the final brighter
magnitude cut). If you want to see the values of the target photometry
(e.g., magnitudes) that were used to target each object, the
<a href="dr10/imaging/imaging_basics.php">run/rerun/camcol/field/id</a>
values in this file refer to the target photometry in
<a href="dr10/imaging/catalogs.php">photoObj</a>.
</p>

<p>
Note that some targets fall into both the LOWZ and CMASS selection
boxes. This is not a problem if you are only considering objects from
one of the samples. If you are performing a combined analysis using
both sets of targets, you should assign a redshift cut to separate
them. The minimum in their number densities falls around
z&nbsp;~&nbsp;0.43.
</p>

<h2>Classify (match) objects with redshifts</h2>

<p>Objects matched to the target photometry should be classified as
one of four types:
</p>

<ul>
  <li>good redshift from SDSS-I/II ("legacy"), ZWARNING&nbsp;==&nbsp;0,
      SPECPRIMARY&nbsp;==&nbsp;1, classified as GALAXY.</li>
  <li>good redshift from BOSS observations (classified as a galaxy
       or a star, with SPECPRIMARY&nbsp;==&nbsp;1), using Z_NOQSO.</li>
  <li>redshift failures (ZWARNING_NOQSO&nbsp;&gt;&nbsp;0).</li>
</ul>

<p>
Objects should be matched in the above sequence. If an
object matches multiple times, the last match overrides the others. 
These all contribute differently when computing the completeness in 
each sector on the sky.
</p>

<h3>Redshift matching details.</h3>

<p>
Match objects from your target catalog with redshifts from the
specObj file.  Use the PROGRAMNAME field in that file to select "boss"
and "legacy" redshifts:
</p>

<ul>
  <li>PROGRAMNAME&nbsp;==&nbsp;"boss"</li>
</ul>

<p>or</p>

<ul>
  <li>PROGRAMNAME&nbsp;==&nbsp;"legacy"</li>
</ul>

<p>
Match targets to their redshifts with
RUN, RERUN, CAMCOL, FIELD, ID (in the target list) and TARGETOBJID (in
specObj). See the <a href="dr10/help/glossary.php#ObjID">ObjID glossary
entry</a> for a description of the relationship between these fields,
and how to convert between them. Warning: TARGETOBJID in
specObj is a 22-character string (because of problems with
unsigned 64-bit integers in fits binary tables), so you will have to strip
it of whitespace and convert to an unsigned 64-bit int before performing
the match.
</p>

<p>
From this matched target/redshift list, select the individual primary,
"best" spectra, (to ignore multiple observations of the same object)
with the following applied to all of the selections below:
</p>

<ul>
  <li>SPECPRIMARY == 1</li>
</ul>

<p>Select "good" redshifts from the "best" observations with:</p>

<ul>
  <li>(ZWARNING_NOQSO&nbsp;==&nbsp;0) and (PROGRAMNAME&nbsp;==&nbsp;"boss")</li>
  <li>(ZWARNING&nbsp;==&nbsp;0) and (PROGRAMNAME&nbsp;==&nbsp;"legacy")</li>
</ul>

<p>Select "failed" redshifts from the "best" observations with:</p>

<ul>
  <li>(ZWARNING_NOQSO&nbsp;&gt;&nbsp;0) and (PROGRAMNAME == "boss")</li>
  <li>(ZWARNING&nbsp;&gt;&nbsp;0) and (PROGRMANAME == "legacy")</li>
</ul>

<p>
To use the redshift failure correction of Anderson et al. (section
3.5), you need to separate good star redshifts from good galaxy
redshifts. Select objects with spectra that are best fit as "star"
from "best" redshifts with:
</p>

<h2>Weights </h2>
<h3>Fiber correction weights</h3>
<p>
Because of the finite size of the fibers, objects closer than 62"
cannot have spectra taken on the same plate. In order to correct
for this, one must apply a set of weights to those targets that have
"collided" with other targets within that radius. There are a number of
different choices for how to correct for fiber collisions, including
using the nearest-neighbor redshift (used in
<a href="http://adsabs.harvard.edu/abs/2012arXiv1203.6594A">Anderson
et al.</a>) projected-correlation function weights (used in
<a href="http://adsabs.harvard.edu/abs/2011ApJ...728..126W">White
et al.</a>), and using the sectors covered by multiple plates to
directly compute the correlation function of collided fibers (detailed
in <a href="http://arxiv.org/abs/1111.6598">Guo et al.</a>). See the
respective papers for details on these different methods. In addition,
<a href="http://arxiv.org/abs/1111.6598">Guo et al.</a> provides a
comprehensive overview of the pros and cons of each method.
</p>

<h3>Redshift failures weights </h3>

<p> As discussed in detail in Section 2.3 of
<a href="http://adsabs.harvard.edu/cgi-bin/bib_query?arXiv:1203.6499">Ross
et al.(2012)</a>, a small fraction of targeted BOSS galaxies do not
obtain a redshift (1.8% for CMASS, 0.4% for LOWZ), and the
distribution of these redshift failures is not uniformly distributed;
to remove these spurious fluctuations, the weight of a redshift
failure galaxy is applied to its nearest neighbor in the analysis of
the CMASS and LOWZ samples.</p>

<h3>Angular systematic weights </h3>

<p>In DR10, we find both seeing and stellar density to correlate with
galaxy density, as suggested in
<a href="http://arxiv.org/abs/1201.2137">Ho et al. 2012</a> and
<a href="http://arxiv.org/abs/1203.6499">Ross et al. 2012.</a>
We correct the effects by taking a seeing map and a stellar density
map and calculate a weight (for each galaxy).  For more details see
Anderson et al 2013. (in prep). For DR10, we apply the weights derived
to each galaxy according to the stellar density and seeing at its position:
</p>

<ul>
  <li>weight_star&nbsp;=&nbsp;Astar_interpol&nbsp;+&nbsp;(Bstar_interpol*starden)</li>
  <li>weight_seeing&nbsp;=&nbsp;2.0d0/Aseeing/(1.-erf((seeingval-Bseeing)/Cseeing))</li>
  <li>weight_systot&nbsp;=&nbsp;weight_star*weight_seeing</li>
</ul>

<h3>Minimum variance weights </h3>

<p>To minimize the error in the measured clustering signal, weights
based on the sample redshift distribution, such as <a
href="http://adsabs.harvard.edu/abs/1994ApJ...426...23F">FKP</a> or <a
href="http://adsabs.harvard.edu/abs/1993ApJ...417...19H">J3</a> should
be applied. In the DR10 LSS catalogs, FKP weights were applied.</p>

<h3>Weights summary </h3>

<p>The weights we have described above should be combined using
Equation 18 of <a href="http://adsabs.harvard.edu/abs/2012arXiv1203.6594A">Anderson et
al. 2012</a> to generate a final weight for each galaxy.  Note that
use of the J3 weights (as in <a href="http://adsabs.harvard.edu/abs/2012arXiv1203.6641R">Reid et al.
2012</a>) is slightly more complicated, as the J3 weight is applied to
pairs of galaxies.</p>

<h2> Angular Selection function</h2>

<p>The <a href="dr10/tutorials/lss_galaxy.php#files">masks</a> describe the
regions of sky observable by BOSS. The masks are spherical polygon files in
the <a href="http://space.mit.edu/~molly/mangle/">mangle</a> format. The mask
includes both an acceptance mask (regions of the sky that were
included in the survey), and an rejection mask (regions of the sky
that are explicitly excluded). The rejection mask removes regions
around bright stars, the center posts of the plates, fields with bad
imaging data, and regions where other targets had priority for being
assigned a fiber.
</p>

<p>
When computing a correlation function statistic, we use points
uniformly randomly distributed in the mask to trace out the geometry.
The program <a href="http://space.mit.edu/~molly/mangle/manual/ransack.html">ransack</a>,
distributed with mangle, will generate uniformly distributed randoms
in an inclusion mask. Note that ransack will not work with fits files,
but we have provided a mangle .ply formatted version of the file for
this purpose.
</p>

<h4 id="acceptancemask">Acceptance masks</h4>

<p>
There is one acceptance mask file given in the <a href="dr10/tutorials/lss_galaxy.php#files">file
list</a> above. Accept all objects (galaxy targets and randoms) that
are contained within the polygons in the acceptance mask.
</p>

<!-- <p class="todo">Write a few sentences about the diffference between
the .fits and .ply files and also about where you can find the sector
ids.</p> -->

<h4 id="rejectionmask">Rejection masks</h4>

<p>
There are 4 rejection mask files given in the <a href="dr10/tutorials/lss_galaxy.php#files">file
list</a> above. Reject all objects (galaxy targets and randoms) that
are in the polygons in the bright-star mask, centerposts mask,
collision priority mask, and bad field mask.
</p>

<h2>Determine BOSS completeness by sector </h2>

<p>
This completeness specifies the probability in a given sector of
the survey of obtaining a redshift for a target, and is an input for
creating the angular mask of your galaxy sample.
<a href="http://adsabs.harvard.edu/abs/2012arXiv1203.6594A">Anderson et
al. 2012</a> (section 3.3) provide details on how to account for redshift failures,
fiber collision corrections, and legacy objects when computing the
sector completeness.
</p>

<p>
The completeness in sectors containing no BOSS targets is ambiguous
(these sectors are typically very small). In Anderson et al.,
we chose to remove such sectors if they were not surrounded in
every direction by nearby sectors within 2 degrees that had
spectroscopic observations, or if they were smaller than 0.1273 square
degrees.
</p>

<h2>Downsample the legacy sample and close pairs to BOSS completeness</h2>

<p>
The DR10 analysis subsamples the "legacy" galaxy sample in
each sector based on its "BOSS" completeness so that the full galaxy
sample is described by a single mask. This uses the sector completeness
defined above. This random downsampling of "legacy" galaxies ensures that
it has the same selection function as the BOSS sample. Moreover, one 
redshift is removed from fiber collision BOSS-legacy and legacy-legacy pairs
in each sector based on the fraction of unresolved fiber collisions on a
sector-by-sector basis. See section 3.3 of Anderson et al. 2012 for
more detail.
</p>

<h3>Remove incomplete sectors</h3>

<p>
One should also reject sectors from the mask (and their associated
galaxies and randoms) with a completeness less than some threshold
value (taken to be 70% in Anderson et al., section 3.5), to remove
highly incomplete sectors that have been only partially observed.
Anderson et al. also applied a redshift completeness for sectors with
more than 10 galaxies, but less than 80% good redshifts (see equation
13). This removes sectors with a significant fraction of bad data.
</p>

<h2> Radial selection function </h2>

<p>
The radial selection function for both LOWZ and CMASS galaxies
differs between the northern and southern hemispheres, so distinct
radial distributions for the two hemispheres must be used when
assigning redshifts to the random galaxy catalog.  Section 6 of <a
href="http://arxiv.org/abs/1203.6499">Ross et al. (2012)</a> compares
methods of sampling the underlying redshift distribution to assign
redshifts to the random galaxies, including randomly selecting from a
"shuffled" list of galaxy redshifts and various choices for smooth
spline fits to the observed distribution.
</p>

<h2> Clustering statistics </h2>

<p>The instructions above provide all of the necessary information to
generate data and random catalogs.  You are now ready to compute your
favorite clustering statistic!</p>

<?php echo foot(); ?>
