<?php include '../../header.php'; echo head('A Guide to SEGUE Bitmasks'); ?>

<p> SEGUE uses bitmasks to report what category a target is from. These
patterns represent different types of stars and calibration
targets. The <a href="dr10/algorithms/bitmasks.php">bitmask algorithms
page</a> describes bitmasks in general, focusing 
on the quality of a particular observation. Here we detail 
how to use bitmasks to extract particular types of stars from 
the SEGUE sample. </p>

<p> Every target in SEGUE 1 and 2 is given a spectroscopic fiber
because it fulfills the selection criteria for a particular
category. However, stars frequently pass the criteria for
multiple categories. This information is contained in various 
 bitmasks, which vary in what information they provide from 
table to table. Yes, it's confusing. Stick 
with us, and we'll clarify!</p> 


<p>For SEGUE, there are 4 32-bit bitmasks: 
<i><a href="dr10/algorithms/bitmask_segue1_target.php">segue1_target1</a></i>,
<i><a href="dr10/algorithms/bitmask_segue2_target1.php">segue2_target1</a></i>, 
<i><a href="dr10/algorithms/bitmask_segue1_target2.php">segue1_target2</a></i>, 
and <i><a href="dr10/algorithms/bitmask_segue2_target2.php">segue2_target2</a></i>. The first two
provide information about which target criteria the star fulfills. The
last two identify calibration or other non-science targets.</p>

<p> The parameters with the prefix <i>segue1</i> are different than those
labeled <i>segue2</i>. The two surveys focused on different types of
targets. Thus, the parameters in <i>segue1</i> present information for each
target with respect to SEGUE-1 target selection. Those with <i>segue2</i>
use bitmasks for the SEGUE-2 target selection. This applies to both the
stellar type target selection (<i>target1</i>) and the calibration
identification (<i>target2</i>). We list the different bitmasks for the
4 parameters on the
<a href="dr10/algorithms/segue_target_selection.php">SEGUE Target Selection</a> page.</p>

<p>Three CAS tables contain these four parameters: specObjAll,
sppParams, and segueTargetAll. There is some variation to what the
values mean between the tables. For SEGUE-1 targets, specObjAll and sppParams,
which list identical values for these target flags for each spectrum,
report why a spectroscopic fiber was assigned to that particular
target. For example, if it was observed spectroscopically as part of
the sample of G dwarfs, it will be labeled in <i>segue1_target1</i> as
a G dwarf. These bitmasks thus reflect the photometric and proper motion information for SEGUE-1 
targets when they were first assigned fibers. This data used for 
target selection came from a variety of different sources (see <a href="http://adsabs.harvard.edu/abs/2009AJ....137.4377Y">Yanny et al. 2009</a>). </p>

<p><i>segue2_target1</i> in specObjAll and sppParams is slightly different. Whereas
in SEGUE-1, this parameter included information about why a star was assigned 
a fiber, for SEGUE-2, <i>segue2_target1</i> represents the different target 
categories each star fulfilled when fibers were assigned. Thus, for SEGUE-2, 
it represents the target bitmasks for each star from DR7, and does 
not indicate under which category it received a spectroscopic fiber. </p>

<p>In contrast, in segueTargetAll, the bitmask <i>segue1_target1</i>
indicates every single SEGUE-1 or SEGUE-2 target type for which the
star meets the criteria in DR9 photometry and astrometry. For these targets, the
bitmasks are set for both stellar categories. For instance, a low
metallicity G dwarf will have the bits set for both the G dwarf and
low metallicity categories. The <i>segue1_target1</i> bitmask for a star
that meets the criteria of multiple categories is a combination of the
different bits: </p>

<ul>
<li> binary:     10000000000001010000000000000000 </li>
<li> hex:        0x80050000 = 0x80040000 +  0x00010000 </li>
<li> integer:    -2147155968 = (-2147483648 + 262144 + 65536) </li>
</ul>

<p>From the provided example, one can see that for targets that
fulfill criteria for multiple categories, it can be much easier to
think in terms of hex, rather than binary or integer! </p>

<p>Similarly, for a target that fulfills the criteria for both a low
metallicity star and a main sequence turnoff star, <i>segue2_target1</i> in
segueTargetAll will be a combination of the two bitmasks: </p>

<ul>
<li> binary:     10000000000000000000000000010001 </li>
<li> hex:        0x80000011 = 0x80000010 +  0x00000001 </li>
<li> integer:    -2147483631 = (-2147483648 + 16 + 1) </li>
</ul>

<p>In summary, for SEGUE-1 and SEGUE-2, <i>segue1/2_target1</i> in
specObjAll and sppParams represents the criteria a target fulfills
when fiber assignment occurred. In SEGUE-1, this parameter records
<i>why</i> each target was observed spectroscopically. The bitmask for
SEGUE-2 is more general. The targets for SEGUE were always selected
from DR7 reductions or previous, so the target flags reflect the
results of those reductions. The bitmasks in segueTargetAll reflect 
the different stellar categories each star belongs to in DR9 photometry 
and astrometry.</p> 

<p> If you want every star assigned a fiber for a specific type
in SEGUE-1, you would use <i>segue1_target1</i> from specObjAll or
sppParams. If you want every star that meets the criteria of a
specific type in SEGUE-1, you should use <i>segue1_target1</i> from
segueTargetAll.  </p>

<p>If you want to see which targeting criteria a particular SEGUE-2
star met in DR7, use <i>segue2_target1</i> in sppParams or specObjAll.
To see what criteria it fulfills using updated DR9 photometry and
astrometry, use segueTargetall.<i>segue2_target1</i>. As explained on
the <a href="dr10/algorithms/segue_target_selection.php">SEGUE Target
Selection</a>, this helps us investigate how the samples for each 
category have changed as SDSS has refined and recalibrated its data.  </p>

<p> Finally, targets that belong in multiple categories require some adjustment
of SQL queries.  In a query, specifying </p>
<pre>
segue1_target1 = 0x80040000
</pre>
<p> is quite different than </p>
<pre>
(segue1_target1 &amp; 0x40000) != 0
</pre>

<p>In the first example, the query specifies that the bitmask must be
that of a G dwarf, and only a G dwarf. The second query specifies that
the bit mask must be that of a G dwarf, but can also fulfill the
criteria of other target categories. The first query would not have
any targets with <i>segue1_target1</i> = -2147155968, but the second
would.</p>


<?php echo foot(); ?>

