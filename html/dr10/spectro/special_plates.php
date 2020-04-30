<?php include '../../header.php'; echo head('Special Plates'); ?>

<h3>Extra Deep Plates</h3>
<p>
A few BOSS plates have been observed multiple times with different
pluggings, or observed with the same plugging to greater depth
(summed signal-to-noise squared) than typical:
</p>
<ul>
    <!-- Depths based upon platelist summed PLATESN2 -->
    <li>Observed to ~3x median depth:
        <ul>
            <li>Plate 3683 MJD 55178, 55245</li>
            <li>Plate 3879 MJD 55244</li>
            <li>Plate 4083 MJD 55441, 55443</li>
            <li>Plate 4202 MJD 55445</li>
            <li>Plate 5141 MJD 55746</li>
            <li>Plate 5399 MJD 55956</li>
            <!-- <li>Plate 4277 MJD 55506</li> -->
            <!-- <li>Plate 4405 MJD 55854</li> -->
        </ul>
    </li>
    <li>Observed to ~7x median depth split over 3 pluggings:
        <ul>
            <li>Plate 6037 MJD 56074, 56104, 56106</li>
        </ul>
    </li>
    <li>
    Multi-epoch Stripe 82 commissioning plates for LOWZ, CMASS, and QSO samples,
    also going to greater depth than typical.
    These two plates cover the exact same targets on the same sky location:
        <ul>
            <li>Plate 3615 MJDs 55856, 55445, 55208, 55179</li>
            <li>Plate 3647 MJDs 55945, 55827, 55476, 55241, 55181</li>
        </ul>
    </li>
</ul>

<h3>Ancillary Program Plates</h3>
<p>
  There are also several plates which were dedicated mostly to particular
  ancillary programs.  These are:
</p>
<ul>
  <li><a href="dr10/algorithms/ancillary/boss/luminousblue.php">Emission Line Galaxies
         / Luminous Blue Galaxies</a>: plates 5017, 5018</li>
  <li><a href="http://adsabs.harvard.edu/abs/2011A%26A...530A.122P">QSO
    variability selection in Stripe 82</a>: plates 5141 - 5147</li>
  <li>Mostly sky fibers for sky subtraction tests: plate 5745</li>
</ul>

<!--
Getting a jump on DR11 documentation...

ELG test plates:
  5017, 5018
  6931, 6932, 6933

LRG test plates:
  6373 - 6398

Test plate with mostly sky fibers to test sky subtraction:
  5745

TDSS / Spiders test plates:
  6369, 6783

QSO plates with same targets but different plate drilling:
  6370 (with xy offsets: optimize S/N at 4000 A)
  6780 (without xy offsets: optimize S/N at 5400 A)

Other QSO test plates:
  6780, 6781, 6782
  5141 - 5147: Stripe 82 QSO variability selection study

Unless listed in the main html, these plates are in DR11 but not DR10
-->

<h3>Notes</h3>
<ul>
  <li>
    In all cases, the plates are processed identially to standard survey
    plates and all targets treated the same.
  </li>
  <li>
    See the
    <a href="dr10/algorithms/bitmask_boss_target1.php">BOSS_TARGET1</a>,
    <a href="dr10/algorithms/bitmask_ancillary_target1.php">ANCILLARY_TARGET1</a>, and
    <a href="dr10/algorithms/bitmask_ancillary_target2.php">ANCILLARY_TARGET2</a>
    bits for details of which targets come from which programs and details
    about those programs.
  </li>
  <li>
    Also note that there are many other ancillary program targets interleaved
    with the rest of the survey on standard BOSS plates as identified by
    their ANCILLARY_TARGET1 and ANCILLARY_TARGET2 bits.  The above plates
    simply point out a few cases where most of a plate is dedicated to
    ancillary programs.
  </li>
</ul>



<?php echo foot(); ?>

