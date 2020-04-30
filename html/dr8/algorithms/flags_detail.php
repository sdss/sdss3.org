<?php include '../../header.php'; echo head('Understanding the image processing flags - Details'); ?>

<h2>Introduction</h2>

<p>In the process of measuring the properties of all objects detected in
the SDSS images, the image-processing software sets an extensive
series of flags that indicate the status of each object, warn of
possible problems with the image itself, and warn of possible problems
in the measurement of various quantities associated with the object.
The present document describes the flags in different categories, and
tries to make clear how they can best be used.  For full
understanding, one should read this in parallel with <a
href="http://www.astro.princeton.edu/~rhl/flags.html">Robert Lupton's
flags document</a> containing even more detailed descriptions of the
individual flags. </p>

<p>The SDSS imaging data consist of images in five photometric bands.
The measurement of the properties of the objects is carried out in the
five bands separately, and flag bits are set in each band.  There are
enough flag bits to fill up two 32-bit quantities, thus these are
encoded in <i>two</i> quantities, called generically <i>flags</i> and
<i>flags2</i>.  There is one such pair for each of the five bands, u,
g, r, i, and z.  These are combined in various ways to make flags
appropriate for the whole object in all five bands; these are called
<i>objc_flags</i> and <i>objc_flags2</i>.  </p>

<p>Beware of interpreting the objc_flags blindly!  For example, the
<code>NOPETRO</code> flag is set in objc_flags if the Petrosian radius
cannot be measured in <i>any</i> of u, g, r, i, and z.  Imagine our
horror when the SDSS galaxy spectroscopic sample (which is defined in
terms of Petrosian magnitudes in r) had 50% of the objects flagged
<code>NOPETRO</code>!  The reason is because the u and z bands are low S/N,
and many objects had <code>NOPETRO</code> set in u or z, and therefore in
the objc_flags as well.  Only 2% of galaxy targets have <code>NOPETRO</code>
set in r.  </p>

<h2>Flags that affect the object's resolve status</h2>

<p>These flags are used by the <a
href="dr8/algorithms/resolve.php">resolve software</a> to determine
whether an object is unique within a field.  Typically, you should
rely on the <code>RUN_PRIMARY</code> bit in <a
href="dr8/algorithms/bitmask_resolve_status.php"><code>resolveStatus</code></a>
rather than use these bits directly.</p>

<h3 id="binned">BINNED</h3>

<p>An object that is detected
as greater than a 5 sigma peak (after smoothing with the local PSF) in
a given band is flagged <code>BINNED1</code> in that band.  The object-finder then
masks all detected objects thus far, bins the image 2x2, and runs the
detection algorithm again; objects discovered at this stage are
flagged <code>BINNED2</code>.  This is repeated again (i.e., now binning 4x4);
detections are labelled <code>BINNED4</code>.  Many <code>BINNED2</code> detections include the
outskirts of bright galaxies, and scattered light from bright stars
(as well as genuine low surface brightness galaxies); very few <code>BINNED4</code>
detections seem to be real astrophysical objects.  </p>

<h3 id="detected">DETECTED</h3>

<p>Used only
internally in the pipeline, but not written to files. <code>DETECTED</code>
is the OR of <code>BINNED1</code>, <code>BINNED2</code>, and <code>BINNED4</code>, in a
given band.  Even if the object is not flagged <code>DETECTED</code> in a
given band (usually because it was detected only in another band),
photometry is still carried out on it, allowing, <i>e.g.</i>, a 3-sigma
detection of a point source.</p>

<h3 id="bright">BRIGHT</h3>

<p>As described in the EDR paper, objects detected at more than 200
sigma in the r band have their properties measured twice: once with a
global sky and once with a local sky.  The former entry in the SDSS
catalogs is flagged <code>BRIGHT</code>, and in practice is rarely used to do
science.  One should always reject such objects.  This will be set in
all the bands, as well as objc_flags.</p>

<h3 id="blended">BLENDED, NODEBLEND, CHILD</h3>

<p>Each detected object is
examined to see if it is composite; if it is, it is flagged <b>BLENDED</b> in
all bands, as well as objc_flags.  An attempt is made to deblend it.
If for some reason it is not deblended (usually because it is too
close to the edge), it will be flagged <code>NODEBLEND</code>.  Otherwise, its
children will have their properties measured as well, and one wants to
reject <code>BLENDED</code> objects not flagged <code>DEBLENDED</code> in order to avoid
duplicate entries.  Note that selecting <code>PRIMARY</code> objects does this, and
the cut on <code>BRIGHT</code> entries, automatically.  </p>

<p> The children of a deblend are flagged <code>CHILD</code>.  It is
possible for multiple peaks to be detected in the <code>CHILD</code>,
and for it to also be labelled <code>BLENDED</code> as well.  There
are further flags related to deblending that are mostly informational
in nature; see <a
href="dr8/algorithms/flags_detail.php#deblend">below</a>.</p>

<h2>Flags that indicate problems with the raw data</h2>

<h3 id="saturated">SATURATED, SATURATED_CENTER</h3>

<p>The photometry of saturated objects is questionable, needless to say (in
fact, the total PSF counts of mildly saturated stars should not be too
much in error, as it attempts to include all photons, including those
in the saturated core and the bleed trail).  The <code>SATURATED</code> flag is set
in each band that includes saturated pixels; if it is set in any band,
it is also set in objc_flags.  Objects that are saturated can be
deblended if they show multiple peaks.  Note that a galaxy with a
superposed saturated star in its disk, even if successfully deblended,
will be flagged <code>SATURATED</code>, as some of the pixels in the object
footprint are indeed saturated.</p>

<p> <code>SATURATED_CENTER</code> indicates that the saturated pixels are close to
the center of the object.  This can be used to distinguish, <i>e.g.</i>,
galaxies which are flagged <code>SATURATED</code> because of a superposed star,
from those with a very bright Seyfert nucleus, although it still needs
further testing.  Note that star-galaxy separation is not very
effective for saturated objects; many saturated stars are
misclassified as galaxies.</p>

<h3 id="edge">EDGE, LOCAL_EDGE, DEBLENDED_AT_EDGE</h3>

<p>The photometric pipeline works on one field at a time.  An object which is
too close to the edge of a frame is flagged <code>EDGE</code> in that band.  Among
<code>PRIMARY</code> objects (which have been resolved in overlaps, and thus should
remove most <code>EDGE</code> objects), only large extended objects should be
flagged <code>EDGE</code>.  Thus, if you are interested in point sources, you will
probably not need to worry about the <code>EDGE</code> flag (or at least be
suspicious of objects with <code>EDGE</code> and <code>PRIMARY</code> set).  On rare occasions,
it has happened that half of a chip has gone on the blink; objects
close to the new edge there are flagged <code>LOCAL_EDGE</code> in the appropriate
band.</p>

<p>The deblending algorithm has to work harder for objects close to the
edge; it runs only for big objects which otherwise might be missed.
If so, the flag <code>DEBLENDED_AT_EDGE</code> is set.  This is an informational
flag; it by itself does not indicate any trouble.</p>

<h3 id="otherraw">Other pixel-level problems</h3>

<p>If the photometric pipeline recognizes a pixel as bad (due to a bad
column, a cosmic ray, or a bleed trail), it is interpolated over.  If
this is true for any pixel within the object, it is flagged
<code>INTERP</code>.  This by itself it just informational; if the
interpolation is over a cosmic ray or a single bad column, for
example, the photometry should be essentially perfect.  Further flags
give additional information.</p>

<ul>
  <li> <code>CR</code> means that the object contained a cosmic ray that was
      interpolated over.  This does <i>not</i> mean that the object in
      question <i>is</i> a cosmic ray!  Again, the photometry of objects
      flagged <code>CR</code> is usually fine.  Thus this is mostly an informational flag.</li>

  <li> <code>MAYBE_CR</code> is an indication that object may be a cosmic ray.  It is
      <i>not</i> interpolated over; it is set with a threshold lower than
      the main cosmic-ray finding algorithm.  It is a useful flag to trigger
      on if one is looking, <i>e.g.</i>, for objects detected in a single band
      (such as the high-redshift quasars and T dwarfs, which can show up
      only in the z band).</li>
  <li> <code>MAYBE_EGHOST</code> says that the object in question is in a position
      that it may be an electronics ghost of a bright star in the given
      band.  You should be suspicious of objects with this flag that are
      faint and detected in only one band.</li>
  <li> <code>INTERP_CENTER</code> means that the interpolated pixel(s) in question
      fell within 3 pixels of the center of the object.  This is a warning
      that perhaps the photometry of this object may be affected.  You
      should really get concerned when</li>

  <li> <code>PSF_FLUX_INTERP</code> is set.  This means that more than 20% of the
      PSF flux is interpolated over in the band in question, which may make
      one suspicious of the accuracy of the flux.  In practice, most objects
      with this flag set still appear to have perfectly good PSF photometry,
      but the number of outliers (say, in a color-color plot) is definitely
      larger than usual. </li>
  <li> You should be especially suspicious if <code>BAD_COUNTS_ERROR</code> is set in
      a given band,
      which says that the interpolation over bad pixels is so significant
      that you should not believe the PSF flux error; it is probably
      underestimated.</li>
</ul>

<h2>Flags that indicate problems with the image</h2>

<h3 id="centroid">CANONICAL_CENTER, PEAKCENTER, DEBLEND_NOPEAK, NOPROFILE,
NOTCHECKED, NOTCHECKED_CENTER, TOO_LARGE, BADSKY</h3>

<p>
Often, in deblending, objects near the edge, and at low S/N, various
flags will be set indicating trouble defining the center of the
object.  This should make one suspicious of its detailed photometric
properties.  In particular:</p>
<ul>
  <li><code>CANONICAL_CENTER</code>: The centroid of a given object is usually determined separately
      in each band.  If in some band, it is impossible to measure the center
      (due to being at the edge), one uses the center in another band,
      transformed according to the relative astrometry between the bands,
      and this flag is set. </li>
  <li><code>PEAKCENTER</code>: If the centroiding algorithm can't find a better center, it will
      often simply report the position of the peak pixel in a given band.
      This often happens with little wisps of objects deblended from
      something bright; the flag <code>PEAKCENTER</code> is set.  It is a hint that this
      object may not be real.  A related flag is </li>
  <li><code>DEBLEND_NOPEAK</code>: indicates that after deblending, the child in question doesn't have a
      peak.  Objects with either of these flags set (especially nominal
      point sources in a nominally high S/N band) should be treated with
      suspicion. </li>

  <li> An object with <code>NOPROFILE</code> set in a given band had (as the name
      implies) zero or one entries in the radial profile; most photometric
      quantities measured from it are likely to be suspect. </li>
  <li><code>NOTCHECKED</code>: An object includes pixels which were not checked for peaks by the
      deblender; this can happen close to the edge, and in the cores of
      saturated stars.  Be suspicious of the
      performance of the deblender in this case.  If the flag</li>
  <li><code>NOTCHECKED_CENTER</code> is also set, the situation is worse; the center of
      the object is in a not-checked region.  This should not happen for any
      <code>BINNED1</code> object. </li>

  <li> The flag <code>TOO_LARGE</code> indicates an object which is still detected at
      the outermost point of the radial profile (a radius of over 4 arcmin),
      or at least one child in a deblend is larger than 1/2 a frame.  This
      is indicative either of a very large object, or a poorly determined
      sky, or a particularly horrific deblend.  The detailed photometry of
      this object is questionable. </li>
  <li><code>BADSKY</code>: If the local sky is badly determined (as occasionally
      happens in regions with complex backgrounds), the core of an object
      can be strongly negative.  This
      is bad; the photometry of such objects is meaningless.</li>
</ul>

<h2>Problems associated with specific quantities</h2>

<h3 id="nostokes">Introduction</h3>

<p>Some of these are easy; they simply say that the quantity in question
could not be measured.  In particular:</p>
<ul>
<li><code>NOSTOKES</code>: Objects whose Q and U (Stokes parameters) were not measured in a
given band.</li>
<li><code>ELLIPFAINT</code>: Objects whose isophotal shape could not
be measured.</li>
</ul>

<p>Three types of measurement generate a lot of flags: Petrosian
quantities, the proper motion of objects, and adaptive shape moments.  These
are described below.</p>

<h3 id="petro">Flags associated with the measurement of
Petrosian quantities</h3>

<p>The pipeline measures Petrosian radii, fluxes, 50% and 90% radii,
and errors for all these quantities.  This is described in detail in
Appendix A to <a
href="http://adsabs.harvard.edu/abs/2002AJ....124.1810S">Strauss
et al. (2002)</a>, which discusses the flags as well.  The Petrosian
radius (and there can be more than one of them) is often measured at a
fairly low S/N point in the profile of an object.  Thus the most
common flags that are set (especially at the faint end) are</p>

<ul>
  <li><code>PETROFAINT</code> the
Petrosian radius is measured at a very low surface brightness level,
and</li>
  <li><code>NOPETRO</code> the code was unable to measure the Petrosian
radius.</li> </ul>

<p>These two often appear together.  In this case
(and in the absence of other warning flags such as <code>BADSKY</code> or
<code>NOPROFILE</code>, which mean real trouble), the code still returns a
meaningful magnitude (<i>i.e.</i>, the total flux within the aperture with
detected counts), so the Petrosian magnitude will still be usable.  A
related flag is <code>NOPETRO_BIG</code>, which indicates that the Petrosian
radius appears to be larger than the outermost point of the extracted
radial profile.  This can happen in regions in which the background
sky is noisy, or for low S/N objects.</p>

<p> Other Petrosian flags, mostly informational in nature, include:</p>
<ul> <li><code>MANYPETRO</code> For galaxies with composite profiles, it is
possible for there to be more than one Petrosian radius.</li>

<li><code>MANY_R50, MANY_R90</code> Galaxies which have a radial profile
    which dips below zero can have more than one radius including 50%
or 90% of the light.  This is a rare
    occurrence.</li>

<li> If the Petrosian radius hits the edge of the frame, the flag
<code>INCOMPLETE_PROFILE</code> is set.  The radial profile, and thus the Petrosian
quantities, are still calculated in an unbiased way, and the results
should be reasonable.</li>
</ul>

<h3 id="moving">Flags associated with moving objects</h3>

<p>A main-belt asteroid will show a parallax of a few arcseconds between
the r and g exposure in the SDSS camera.  The photometric pipeline,
and in particular, the deblending algorithm, explicitly tests for
this, and measures the motion as appropriate.  There are quite a few
flags associated with this process.  For most purposes, the
<i>only</i> flag you need to examine is <code>DEBLENDED_AS_MOVING</code>, whose
name should be self-explanatory.  If one wants a catalog of moving
objects, for example, cut on this flag, as well as the derived motion
(rowv, colv) and associated errors.  It is possible that objects with
small enough motion will have a statistically significant proper
motion, but not trigger this flag; this requires further exploration.
There are no doubt a number of Kuiper Belt objects to be discovered in
the SDSS data! </p>
<p>
The remaining flags related to moving objects are mostly informational
in nature, but are useful in understanding why a specific object
was not deblended as moving:</p>
<ul>
  <li><code>MOVED</code> indicates that the object is a candidate to be deblended as
      moving.  This is not a terribly useful flag.  In particular, despite
      its name, it does
      <i>not</i> mean that the object is actually determined to be moving!</li>
  <li><code>NODEBLEND_MOVING</code> Objects flagged <code>MOVED</code> that are
      not deblended as moving.  Not terribly useful.</li>

  <li> Objects with detections in only a few bands will not be able to
      be tested for motion; they are flagged <code>TOO_FEW_DETECTIONS</code>.   Even if
      the object passes this threshold, it may turn out that the centroids
      are not good in a few of the bands, in which case the flag
      <code>TOO_FEW_GOOD_DETECTIONS</code> is also set. </li>
  <li><code>BAD_MOVING_FIT</code> the motion of the object is inconsistent
      with a straight line and it is not deblended as moving.  A related
      flag is</li>
  <li><code>BAD_MOVING_FIT_CHILD</code>, which states that in a complicated
      deblend putatively involving both a moving and stationary object, a
      child's velocity fit is too poor, so the parent wasn't deblended as moving.</li>

  <li><code>STATIONARY</code> the moving object's velocity is consistent with zero</li>
  <li><code>CENTER_OFF_AIMAGE</code> the nominal motion moves the object right off the edge of the
      atlas image in some band.</li>
</ul>

<h3 id="mmoment"> Flags associated with the measurement of
adaptive moments</h3>

<p>The imaging pipeline carries out the calculations of optimally
weighted second moments of objects in order to determine their shapes
(especially for weak lensing studies).  The flags indicate trouble
with this process for a given object in a given band, usually at low
S/N and such moment measurements should not be used.</p>

<ul>

  <li><code>AMOMENT_UNWEIGHTED</code> (also called <code>AMOMENT_FAINT</code>) the
      calculation of the weights failed, the adaptive moments are
      calculated without weights</li>
  <li><code>AMOMENT_SHIFT</code> in the determination of adaptive moments, the centroid is
      recalculated; if it shifts too far, the flag <code>AMOMENT_SHIFT</code> is set, and
      M_e1 and M_e2 give the value of shift</li>

  <li><code>AMOMENT_MAXITER</code> the moment calculation did not converge</li>
</ul>

<h2 id="deblend">Further flags related to deblending (all informational)</h2>

<p>A complicated object may have many peaks in it (think of the core
of a globular cluster as the worst-case scenario!). However
complicated an object is, the deblender conserves flux, in so much as
the flux in each pixel is split among the children.  Still, no effort
is made to ensure that the sum of the children is exactly equal to the
parent, so rounding error could lead to discrepancies of one or two
DN. A number of informational flags point out cases where deblending
was complicated.</p>

<p>If the number of peaks is larger than 25, the flag
<code>DEBLEND_TOO_MANY_PEAKS</code> is set (in the parent, *not* the child),
and only the 25 most significant peaks are deblended.
<code>DEBLEND_UNASSIGNED_FLUX</code> indicates that initially, &gt;5% of the
parent's flux was not assigned to any of the children and that this
flux has been redistributed among them.  Thus this is not an indicator
of any problem with the deblender; this is an informational flag
only.</p>

<p>It is occasionally true (especially in complicated deblends) that
some of the peaks are not deblended, for one of two reasons.  The
parents in such cases are labelled <code>DEBLEND_PRUNED</code>.  The two
reasons are that these peaks lie too close to other peaks (in which
case the flag <code>PEAKS_TOO_CLOSE</code> is set), or that the templates
associated with the peak is degenerate with others (in which case
<code>DEBLEND_DEGENERATE</code> is set -- see <a
href="http://www.sdss.org/dr1/algorithms/dr1changes.html#deblender">deblender
description in DR1 changes document</a>).</p>

<p> In a complicated deblend, especially those involving galaxies,
there can be many children, and it is not always obvious (without
looking at the image by eye) which child is the main galaxy.  The flag
<code>BRIGHTEST_GALAXY_CHILD</code> flags that object which the code
believes to be the brightest galaxy child.
If the deblending algorithm recognizes a given child as unresolved, it
will use that information in the deblend, and flag it as
<code>DEBLENDED_AS_PSF</code>.</p>

<p><code>HAS_SATUR_DN</code> indicates that the object is saturated in this
band and the bleed trail doesn't touch the edge of the frame. In such
cases, an attempt is made to add up all the flux in the bleed trails,
and to include it in the object's photometry. Note: some of the CCDs
saturate at over 65535 DN; for these chips, the bled flux will be
underestimated.</p>

<p> After the regular deblender had completed, photo took another pass
looking for some special cases, and the deblend was modified based on
this analysis are flagged <code>DEBLEND_PEEPHOLE</code>. Currently, only one
special case is considered: objects that, when merged together, were
consistent with a moving object that the deblender had missed in the
first pass.</p>


<h2 id="other"> Further informational flags</h2>

<p>It is often true that the last bin in the radial profile of an
object goes slightly negative.  When this happens, the <code>BAD_RADIAL</code> flag
is set; it can usually be ignored.</p>

<p>    The Petrosian and model magnitude calculations make reference to
a canonical band, which defaults to the r band.  In the case that the
object is undetected in r, the canonical band is set to the highest
S/N band.  The band in question is flagged
<code>CANONICAL_BAND</code>.</p>

<p>    The extended wings around bright stars are subtracted; such
objects are flagged <code>SUBTRACTED</code>. </p>

<p>    For sufficiently extended objects, the PSF-weighted centroid is not optimal,
and the centroid is found using a 2x2-binned images.  Such objects are
flagged <code>BINNED_CENTER</code>; such objects probably should not
be used, <i>e.g.</i>,
as part of a local astrometric reference frame.
</p>

<?php echo foot(); ?>
