<?php include '../../../header.php'; echo head('A Guide to SEGUE Bitmasks'); ?>

<p> SDSS uses bitmasks to report what category a target is from. These
patterns represent different types of stars and calibration
targets. The <a href="dr8/algorithms/bitmasks.php">bitmask algorithms
page</a> describes bitmasks in general. Here we give some details
about the SEGUE-2 bitmasks.</p>

<p>For SEGUE, there are 4 32-bit bitmasks: <i>segue1_target1</i>,
<i>segue2_target1</i>, <i>segue1_target2</i>, and <i>segue2_target2</i>. The first two
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
<a href="dr8/algorithms/segueii/segue_target_selection.php">SEGUE Target Selection</a> page.</p>

<p>Three CAS tables contain these four parameters: specObjAll,
sppParams, and segueTargetAll.  There is some variation to what the
values mean between the tables. specObjAll and sppParams, which for
each spectrum list identical values for these target flags, report why
each fiber was assigned to that target.  For example, if it was
observed spectroscopically as part of the overall sample of G dwarfs,
it will be labeled in <i>segue1_target1</i> as a G dwarf. The targets for
SEGUE were always selected from DR7 reductions or previous, so the
target flags reflect the results of those reductions.</p>

<p>In contrast, in segueTargetAll, the bitmask segue1_target1
indicates every single SEGUE-1 or SEGUE-2 target type for which the
star meets the criteria, i.e., if it meets the parameter cuts for both
G dwarfs and low-metallicity stars, the bitmask will indicate both of
these target types. Furthermore, the target flags in this table were
generated by running SEGUE target selection on the final DR8 imaging
reductions. Thus, for the same set of objects, there will be some
variation in what target flags are set between specObjAll and
segueTargetAll.</p>

<p> Thus, if you want every star assigned a fiber for a specific type
in SEGUE-1, you would use <i>segue1_target1</i> from specObjAll or
sppParams. If you want every star that meets the criteria of a
specific type in SEGUE-1, you should use segue1_target1 from
segueTargetAll. The same rules apply to the target selection criteria
from SEGUE-2 using <i>segue2_target1</i>. </p>

<p> Every target in SEGUE 1 and 2 is given a spectroscopic fiber
because it fulfills the selection criteria for one particular
category. In specObjAll and SppParams, <i>segue1_target1</i> and
<i>segue2_target1</i> designate only one category, that which a star was
given a fiber for. However, stars frequently pass the criteria for
multiple categories. This information is contained in <i>segue1_target1</i>
and <i>segue2_target1</i> in the segueTargetAll table. For these targets, the
bitmasks are set for both stellar categories. For instance, a low
metallicity G dwarf will have the bits set for both the G dwarf and
low metallicity categories.  The <i>segue1_target1</i> bitmask for a star
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

<p> Targets that belong in multiple categories require some adjustment
of SQL queries as well.  In a query, specifying </p>
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
