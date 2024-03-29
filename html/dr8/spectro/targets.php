<?php include '../../header.php'; echo head('Spectroscopic Target Flags'); ?>

<h2>Introduction</h2>

<p>Here we describe the target flags for SDSS-III spectroscopic
data. The idea here is that each spectrum was taken for a reason, and
the target flags store what that reason was -- or possible multiple
reasons. </p>

<p>If you are not familiar with what a bitmask is, please see
our <a href="dr8/algorithms/bitmasks.php">bitmask primer</a>. In addition,
we'll discuss below the differences between various SDSS-III surveys
and programs; please see the <a
href="dr8/spectro/spectro_basics.php">basics
of SDSS spectroscopy</a> for an outline of what those mean.</p>

<h2>Quick Start</h2>

<p>Essentially, the target flags can be used to select out objects
that were targeted for some particular reason.  A very common example
is to select objects which were Main Sample galaxy targets.  These had
one of the <a
href="dr8/algorithms/bitmask_legacy_target1.php">LEGACY_TARGET1</a> bits
"GALAXY", "GALAXY_BIG" and "GALAXY_BRIGHT_CORE" set (bits 6, 7, and
8).  This corresponds to the requirement:</p>

<pre>
  (legacy_target1 &amp; (64 | 128 | 256)) &gt; 0
</pre>

<p>Or perhaps you are Jim Annis, and you want to find the objects you
targeted in your low-redshift galaxy special program.  Doing so
requires checking <a
href="dr8/algorithms/bitmask_special_target1.php">SPECIAL_TARGET1</a>
for the "LOWZ_ANNIS" bit (bit 1):</p>

<pre>
  (special_target1 &amp; 2) &gt; 0
</pre>

<p>We cannot list all of the possibilities here: which
set of flags you want to check depends on your particular
requirements. The documentation below explains what each of the
available target flags means.</p>

<h2>SDSS-III target bitmasks in DR8</h2>

<p>The target bitmasks in use are:</p>

<ol>
<li><a href="dr8/algorithms/bitmask_legacy_target1.php">LEGACY_TARGET1</a>: primary target bits for Legacy science targets</li>
<li><a href="dr8/algorithms/bitmask_legacy_target2.php">LEGACY_TARGET2</a>: secondary target bits for Legacy targets</li>
<li><a href="dr8/algorithms/bitmask_segue1_target.php">SEGUE1_TARGET1</a>: primary target bits for SEGUE-1 science targets</li>
<li><a href="dr8/algorithms/bitmask_legacy_target2.php">SEGUE1_TARGET2</a>: secondary target bits for SEGUE-1 targets</li>
<li><a href="dr8/algorithms/bitmask_segue2_target1.php">SEGUE2_TARGET1</a>: primary target bits for SEGUE-2 science targets</li>
<li><a href="dr8/algorithms/bitmask_legacy_target2.php">SEGUE2_TARGET2</a>: secondary target bits for SEGUE-2 targets</li>
<li><a href="dr8/algorithms/bitmask_special_target1.php">SPECIAL_TARGET1</a>: primary target bits for special program science targets</li>
<li><a href="dr8/algorithms/bitmask_legacy_target2.php">SPECIAL_TARGET2</a>: secondary target bits for special program targets</li>
</ol>

<p>In general, the "primary" target bits denote science targets, and
the "secondary" target bits denote spectrophotometic standards, sky
targets and other technical targets.</p>

<p>In addition, in some rare cases, one needs to check two extra
flags, PRIMTARGET and SECTARGET.  Doing so is only necessary if one is
digging into the details of some particular special programs. (Of
course,
they can be used just as they were in DR7 and previous, for backwards
compatibility).</p>

<h2>Legacy targets</h2>

<p>The Legacy targets are those taken as part of the SDSS Legacy
survey, which is the wide-field survey of galaxies brighter than
r=17.77 (Main Sample), Luminous Red Galaxies, and QSOs.  In addition
there are a number of other categories.  In DR8, only spectra on
plates that were part of the Legacy program actually have the
LEGACY_TARGET1 or LEGACY_TARGET2 bits set.</p>

<p>The <a href="dr8/algorithms/target_selection.php">target selection algorithms
documentation</a> describes the meaning of the bits of these
flags.</p>

<h2>SEGUE-1 targets</h2>

<p>The SEGUE-1 targets are those taken as part of the SEGUE-1 survey
of Galactic stars.  In DR8, only spectra on plates that were part of a
SEGUE-1 program actually have the SEGUE1_TARGET1 or SEGUE1_TARGET2
bits set.</p>

<p>The <a href="dr8/algorithms/segueii/segue_target_selection.php#SEGUEts1">SEGUE target selection algorithms
documentation</a> describes the meaning of the bits of these
flags.</p>

<h2>SEGUE-2 targets</h2>

<p>The SEGUE-2 targets are those taken as part of the SEGUE-2 survey
of Galactic stars.  In DR8, only spectra on plates that were part of a
SEGUE-2 program actually have the SEGUE2_TARGET1 or SEGUE2_TARGET2
bits set.</p>

<p>The <a href="dr8/algorithms/segueii/segue_target_selection.php#SEGUEts2">SEGUE target selection algorithms
documentation</a> describes the meaning of the bits of these
flags.</p>

<h2>SEGUE Cluster Plate targets</h2>

<p>The targets on SEGUE "cluster" plates (either SEGUE-1 or SEGUE-2)
are designated in the SEGUE-1 and SEGUE-2 target flags as described in
the
<a href="dr8/algorithms/segueii/segue_target_selection.php#SEGUEClusterTargets2">SEGUE cluster plates target selection</a> documentation.</p>


<h2>Special program targets</h2>

<p>The special programs targets are those taken as part of one of the
several special programs that SDSS has executed over the years.  </p>

<p>The <a href="dr8/algorithms/special_target.php">special programs target
selection algorithms documentation</a> describes the meaning of the
bits of these flags.</p>

<h2>What happened to "primtarget"?</h2>

<p>Old SDSS hands will recall "primtarget" and "sectarget" as the
target flags that were previously used. Indeed, our data tables
include those values for backwards compatibility (mostly! see next
paragraph). However, we felt that because the bits in those flags had
been used for multiple purposes over the years, that it would be
prudent to create some more flags to contain the information and make
querying the data easier.</p>

<p>One exception is that (as noted in the targeting tables) there are
occasionally cases like "SPECIAL_FILLER", "SOUTHERN_COMPLETE",
"SOUTHERN_EXTENDED", and "FAINT_QSO" where there is a special target
that was selected because it passed the regular Legacy target
selection or a slight modification thereof.  In those relatively rare
cases, one does need to consult PRIMTARGET to determine the actual
reason for targeting. </p>

<?php echo foot(); ?>

