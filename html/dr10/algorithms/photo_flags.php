<?php include '../../header.php'; echo head('Understanding the image processing flags - Summary table'); ?>

<h2 id="intro">Introduction</h2>

<p>For objects in the calibrated object lists (<a
href="dr10/help/glossary.php#photoobj">photoObj</a> files and
the <a
href="http://skyserver.sdss3.org/dr10/en/help/docs/intro.aspx#phototables">tables
with photometric data in the Catalog Archive Server database</a>), the
photometric pipeline sets a number of flags that indicate the status
of each object, warn of possible problems with the image itself, and
warn of possible problems in the measurement of various quantities
associated with the object. They are briefly described here, with
links to a companion page with <a href="dr10/algorithms/flags_detail.php">details
about the flags</a>. For yet more details, refer to <a
href="http://www.astro.princeton.edu/~rhl/flags.html">Robert Lupton's
flags document</a>.</p>

<p>Objects in the catalog have several sets of flags:</p>
<ul>
  <li>The
<a href="dr10/algorithms/bitmask_resolve_status.php">resolveStatus</a>
flag used to remove duplicate observations, described briefly
    <a href="dr10/algorithms/photo_flags.php#resolvestatus">
    below</a>, and in full in the <a
    href="dr10/algorithms/resolve.php">resolve algorithm
    documentation</a>.</li>
  <li>The <a
    href="dr10/algorithms/bitmask_calib_status.php">calibStatus</a> flags
    (one per band) used to identify well-calibrated objects, described
    briefly <a
    href="dr10/algorithms/photo_flags.php#calibstatus">below</a> and in
    full in the <a href="dr10/algorithms/fluxcal.php">calibration
    algorithm documentation</a>.</li>
  <li>The <a href="dr10/algorithms/photo_flags.php#flags">object flags</a>, with information
      about the success of measuring the object's location, flux, or
      morphology.</li>

</ul>

<p>Jump to:</p>

<ul>
<li><a href="dr10/algorithms/photo_flags.php#resolvestatus">Resolve Status</a></li>
<li><a href="dr10/algorithms/photo_flags.php#calibstatus">Calibration Status</a></li>
<li><a href="dr10/algorithms/photo_flags.php#flags">Object flags intro</a></li>
<li><a href="dr10/algorithms/photo_flags.php#flagsdescstatus">Object status flags in detail</a></li>
<li><a href="dr10/algorithms/photo_flags.php#flagsdesc_raw">Flagging problems with raw data</a></li>
<li><a href="dr10/algorithms/photo_flags.php#flagsdesc_image">Flagging problems with the image</a></li>
<li><a href="dr10/algorithms/photo_flags.php#flagsdesc_deblend">Flags related to deblending</a></li>
<li><a href="dr10/algorithms/photo_flags.php#flagsdesc_further">Further informational flags</a></li>
</ul>


<h2 id="resolvestatus">Resolve status</h2>

<p>The catalogs contain multiple detections of objects from
overlapping CCD frames. For most applications, remove duplicate
detections of the same objects by considering only those which have
<code>(resolveStatus &amp; 256) != 0</code>
(see <a href="dr10/algorithms/bitmasks.php">a description of bitmasks</a>).
An equivalent method included for simplicity and backward
compatibility is to search for objects with <code>mode=1</code>.</p>

<p>
A description of how resolve status is set is in the <a
href="dr10/algorithms/resolve.php">resolve documentation</a>. </p>

<p><a href="dr10/algorithms/photo_flags.php#Top">[Back to top]</a></p>

<h2 id="calibstatus">Calibration status</h2>

<p>The catalogs contain some field which were taken under
non-photometric conditions, or at times where certain CCDs were
misbehaving. The <code>calibStatus</code> flags provide for each band
an indication of whether the data is photometric.  For most
applications, include only objects with <code>(calibStatus[band] &amp; 1) !=
0</code>. </p>

<p> A description of how calibration status is set is in the <a
href="dr10/algorithms/fluxcal.php">flux calibration
documentation</a>. </p>

<p><a href="dr10/algorithms/photo_flags.php#Top">[Back to top]</a></p>


<h2 id="flags">Object "flags"</h2>

<p>The photometric pipeline's flags describe how certain measurements
were performed for each object, and which measurements are considered
unreliable or have failed altogether. <strong>You must interpret the
flags correctly to obtain meaningful results.</strong></p>

<p>For each object, there are flags stored as bit fields in two 32-bit
table columns in the <code>photoObj</code> file.
There are two sets of these flag variables for each
object: </p>

<ul>

  <li><var>flags</var> and <var>flags2</var> as arrays of five flags,
      one each for <var>u, g, r, i, z</var>.</li>
  <li><var>objc_flags</var> and <var>objc_flags2</var> are
      scalars. These are a
      combination of the per-filter flags appropriate for the whole
      object.</li>

</ul>

<p>Here we describe which flags should be checked for which measurements,
including whether you need to look at the flag in each filter, or at
the <var>objc_flag</var>.</p>

<p><a href="dr10/algorithms/photo_flags.php#Top">[Back to top]</a></p>

<h2 id="flagsdescstatus">Flags that affect the object's resolve status</h2>

<p>These flags are used to reject duplicate catalog
entries of the same object within each field. By using only objects with
<code>SURVEY_PRIMARY</code> or <code>RUN_PRIMARY</code> resolve status
(see the <a href="dr10/algorithms/resolve.php">resolve documentation</a>), you automatically
account for these flags.</p>

<p>In the tables, flag names link to detailed descriptions. The objc
column indicates that this flag will be set in <var>objc_flags</var>
or <var>objc_flags2</var> if this flag is set in any of the
filters. "bit" is the number of the bit; to check whether bit
<var>n</var> in flags1 is set, compute <code>flags1 &amp; 2**n</code>
where <code>&amp;</code> is the bitwise <code>AND</code> operator.</p>

<p>Note also that there is a complementary description of most of these flags
<a href="dr10/algorithms/bitmask_flags1.php">here</a>.</p>

<table class="common">
  <tr>
    <th>Flag</th>
    <th>1/2</th>
    <th>bit</th>
    <th>objc</th>
    <th>Description</th>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#binned"><code>BINNED1</code></a></td>
    <td>1</td>
    <td>28</td>
    <td></td>
    <td>detected at &gt;=5 sigma in original imaging frame</td>
  </tr>

 <tr>
    <td><a href="dr10/algorithms/flags_detail.php#binned"><code>BINNED2</code></a></td>
    <td>1</td>
    <td>29</td>
    <td></td>
    <td>detected in 2x2 binned frame; often outskirts
    of bright galaxies, scattered light, low surface brightness galaxies</td>
  </tr>

 <tr>
    <td><a href="dr10/algorithms/flags_detail.php#binned"><code>BINNED4</code></a></td>
    <td>1</td>
    <td>30</td>
    <td></td>
    <td>detected in 4x4 binned frame; few are genuine astrophysical objects</td>
  </tr>

 <tr>
    <td><a href="dr10/algorithms/flags_detail.php#detected"><code>DETECTED</code></a></td>
    <td></td>
    <td></td>
    <td></td>
    <td>Flag internal to the pipeline code, <code>BINNED1</code> | <code>BINNED2</code> | <code>BINNED4</code></td>
  </tr>

 <tr>
    <td><a href="dr10/algorithms/flags_detail.php#bright"><code>BRIGHT</code></a></td>
    <td>1</td>
    <td>1</td>
    <td>X</td>
    <td>duplicate detection of &gt; 200 sigma objects, discard.</td>
  </tr>

 <tr>
    <td><a href="dr10/algorithms/flags_detail.php#blended"><code>BLENDED</code></a></td>
    <td>1</td>
    <td>3</td>
    <td>X</td>
    <td>Object has more than one peak, there was an attempt to deblend
    it into several <code>CHILD</code> objects. Discard unless <code>NODEBLEND</code> is set.</td>
  </tr>
 <tr>
    <td><a href="dr10/algorithms/flags_detail.php#blended"><code>NODEBLEND</code></a></td>
    <td>1</td>
    <td>6</td>
    <td>X</td>
    <td>Object is a blend, but was not deblended because it is:
    <ul>

      <li>too close to an edge (<code>EDGE</code> already set),</li>
      <li>too large	(<code>TOO_LARGE</code>), or </li>
      <li>a child overlaps an edge (<code>EDGE</code> will be set).</li>

      </ul>
      </td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#blended"><code>CHILD</code></a></td>
    <td>1</td>
    <td>4</td>

    <td>X</td>
    <td>Object is part of a <code>BLENDED</code> "parent" object. May be <code>BLENDED</code> itself.</td>
  </tr>

</table>

<p><a href="dr10/algorithms/photo_flags.php#Top">[Back to top]</a></p>


<h2 id="flagsdesc_raw">Flags that indicate problems with the raw data</h2>

<p>These flags are mainly informational and important only for some
objects and science applications.</p>

<p>Note also that there is a complementary description of most of these flags
<a href="dr10/algorithms/bitmask_flags1.php">here</a> and especially
<a href="dr10/algorithms/bitmask_flags2.php">here</a>.
</p>



<table class="common">
  <tr>
    <th>Flag</th>
    <th>1/2</th>
    <th>bit</th>
    <th>objc</th>
    <th>Description</th>
  </tr>
 <tr>
    <td><a href="dr10/algorithms/flags_detail.php#saturated"><code>SATURATED</code></a></td>
    <td>1</td>
    <td>18</td>
    <td>X</td>
    <td>contains saturated pixels; affects star-galaxy separation</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#saturated"><code>SATURATED_CENTER</code></a></td>
    <td>2</td>
    <td>11</td>
    <td></td>
    <td>as <code>SATURATED</code>, affected pixels close to the center</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#edge"><code>EDGE</code></a></td>
    <td>1</td>
    <td>2</td>
    <td></td>
    <td>object was too close to edge of frame to be measured; should not affect
    point sources</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#edge"><code>LOCAL_EDGE</code></a></td>
    <td>2</td>
    <td>7</td>
    <td></td>
    <td>like <code>EDGE</code>, but for rare cases when one-half of a <code>CCD</code> failed</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#edge"><code>DEBLENDED_AT_EDGE</code></a></td>
    <td>2</td>
    <td>13</td>
    <td></td>
    <td>object is near <code>EDGE</code>, but so large that it was deblended
    anyway. Otherwise, it might have been missed.</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#otherraw"><code>INTERP</code></a></td>
    <td>1</td>
    <td>17</td>
    <td></td>
    <td>object contains interpolated-over pixels (bad columns, cosmic
    rays, bleed trails); should not affect photometry for
    single bad column or cosmic ray</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#otherraw"><code>INTERP_CENTER</code></a></td>
    <td>2</td>
    <td>12</td>
    <td></td>
    <td>interpolated pixel(s) within 3 pix of the center. Photometry
    may be affected.</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#otherraw"><code>PSF_FLUX_INTERP</code></a></td>
    <td>2</td>
    <td>15</td>
    <td></td>
    <td>more than 20% of PSF flux is interpolated over. May cause
    outliers in color-color plots, e.g.</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#otherraw"><code>BAD_COUNTS_ERROR</code></a></td>
    <td>2</td>
    <td>8</td>
    <td></td>
    <td>interpolation affected many pixels; PSF flux error is
    inaccurate and likely underestimated.</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#otherraw"><code>COSMIC_RAY</code> (<code>CR</code>)</a></td>
    <td>1</td>
    <td>12</td>
    <td></td>
    <td>object contains cosmic rays which have been interpolated over;
    should not affect photometry</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#otherraw"><code>MAYBE_CR</code></a></td>
    <td>2</td>
    <td>24</td>
    <td></td>
    <td>object may be a cosmic ray; <em>not</em> interpolated
    over. Useful in searches for single-filter detections.</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#otherraw"><code>MAYBE_EGHOST</code></a></td>
    <td>2</td>
    <td>25</td>
    <td></td>
    <td>object may be an electronics ghost of a bright star. Be
    suspicious about faint single-filter detections.</td>
  </tr>
</table>

<p><a href="dr10/algorithms/photo_flags.php#Top">[Back to top]</a></p>



<h2 id="flagsdesc_image">Flags that indicate problems with the image</h2>

<p>These flags may be hints that an object may not be real or that a
measurement on the object failed. </p>

<p>Note also that there is a complementary description of most of these flags
<a href="dr10/algorithms/bitmask_flags1.php">here</a> and
<a href="dr10/algorithms/bitmask_flags2.php">here</a>.
</p>


<table class="common">
  <tr>
    <th>Flag</th>
    <th>1/2</th>
    <th>bit</th>
    <th>objc</th>
    <th>Description</th>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#centroid"><code>CANONICAL_CENTER</code></a></td>
    <td>1</td>

    <td>0</td>
    <td></td>
    <td>could not determine a centroid in this band; used centroid in
    <code>CANONICAL_BAND</code> instead</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#centroid"><code>PEAKCENTER</code></a></td>

    <td>1</td>
    <td>5</td>
    <td></td>
    <td>used brightest pixel as centroid; hint that an object may not
    be real</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#centroid"><code>DEBLEND_NOPEAK</code></a></td>

    <td>2</td>
    <td>14</td>
    <td></td>
    <td>object is a <code>CHILD</code> of a <code>DEBLEND</code> but has no peak; hint that an
    object may not be real</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#centroid"><code>NOPROFILE</code></a></td>
    <td>1</td>
    <td>7</td>
    <td></td>
    <td>only 0 or 1 entries for the radial flux profile; photometric
    quantities derived from profile are suspect</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#centroid"><code>NOTCHECKED</code></a></td>
    <td>1</td>
    <td>19</td>
    <td></td>
    <td>object contains pixels which were not checked for peaks by
    deblender; deblending may be unreliable</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#centroid"><code>NOTCHECKED_CENTER</code></a></td>
    <td>2</td>
    <td>26</td>
    <td></td>
    <td>as <code>NOTCHECKED</code>, but affected pixels are near object's center</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#centroid"><code>TOO_LARGE</code></a></td>
    <td>1</td>
    <td>24</td>
    <td></td>
    <td>object is larger than outermost radial profile bin (<var>r
    &gt; 4</var>arcmin), or a <code>CHILD</code> in a deblend is &gt; 1/2
    frame. Very large object, poorly determined sky, or bad
    deblend. Photometry questionable.</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#centroid"><code>BADSKY</code></a></td>
    <td>1</td>
    <td>22</td>
    <td></td>
    <td>local sky measurement failed, object photometry is meaningless</td>

  </tr>
</table>

<p><a href="dr10/algorithms/photo_flags.php#Top">[Back to top]</a></p>


<h2 id="flagsdesc_specific">Problems associated with specific quantities</h2>

<p>Some simply say that the quantity in question could not be
measured. Others indicate more subtle aspects of the measurements,
particular of <a
href="dr10/help/glossary.php#mag_petro">Petrosian
quantities</a>.</p>

<p>Note also that there is a complementary description of most of these flags
<a href="dr10/algorithms/bitmask_flags1.php">here</a> and
<a href="dr10/algorithms/bitmask_flags2.php">here</a>.
</p>



<table class="common">
 <tr>
    <th>Flag</th>
    <th>1/2</th>
    <th>bit</th>
    <th>objc</th>
    <th>Description</th>
  </tr>
 <tr>
    <td><a href="dr10/algorithms/flags_detail.php#nostokes"><code>NOSTOKES</code></a></td>

    <td>1</td>
    <td>21</td>
    <td></td>
    <td>Stokes Q and U (isophotal shape parameters) undetermined</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#nostokes"><code>ELLIPFAINT</code></a></td>

    <td>1</td>
    <td>27</td>
    <td></td>
    <td>no isophotal fits performed</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#petro"><code>PETROFAINT</code></a></td>

    <td>1</td>
    <td>23</td>
    <td></td>
    <td>Petrosian radius measured at very low surface
    brightness. Petrosian magnitude still usable.</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#petro"><code>NOPETRO</code></a></td>

    <td>1</td>
    <td>8</td>
    <td></td>
    <td>no Petrosian radius could be determined. Petrosian magnitude
    still usable.</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#petro"><code>NOPETRO_BIG</code></a></td>

    <td>1</td>
    <td>10</td>
    <td></td>
    <td>Petrosian radius larger than extracted radial profile. Happens
    for noisy sky or low S/N objects.</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#petro"><code>MANYPETRO</code></a></td>

    <td>1</td>
    <td>9</td>
    <td></td>
    <td>more than 1 value was found for the Petrosian radius.</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#petro"><code>MANY_R50</code> / <code>MANY_R90</code></a></td>

    <td>1</td>
    <td>13/14</td>
    <td></td>
    <td>object's radial profile dips below 0 and more than one radius
    was found enclosing 50%/90% of the light. Rare.</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#petro"><code>INCOMPLETE_PROFILE</code></a></td>

    <td>1</td>
    <td>16</td>
    <td></td>
    <td>Petrosian radius hits edge of frame. Petrosian quantities
    should still be reasonable.</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#moving"><code>DEBLENDED_AS_MOVING</code></a></td>

    <td>2</td>
    <td>0</td>
    <td></td>
    <td>object recognized to be moving between different
    filters. <strong>For most purposes, consider <em>only</em> this flag to
    find moving objects.</strong></td>
  </tr>
  <tr>

    <td><a href="dr10/algorithms/flags_detail.php#moving"><code>MOVED</code></a></td>
    <td>1</td>
    <td>31</td>
    <td></td>
    <td>candidate for moving object. <strong>Does not mean it did move
    - consider <code>DEBLENDED_AS_MOVING</code> instead!</strong> Not useful.</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#moving"><code>NODEBLEND_MOVING</code></a></td>
    <td>2</td>
    <td>1</td>
    <td>X</td>
    <td>candidate moving object (<code>MOVED</code>) but was not deblended as moving</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#moving"><code>TOO_FEW_DETECTIONS</code></a></td>
    <td>2</td>
    <td>2</td>
    <td></td>
    <td>object detected in too few bands for motion determination</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#moving"><code>TOO_FEW_GOOD_DETECTIONS</code></a></td>
    <td>2</td>
    <td>16</td>
    <td></td>
    <td>even though detected, no good centroid found in enough bands
    for motion determination</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#moving"><code>STATIONARY</code></a></td>
    <td>2</td>
    <td>4</td>
    <td></td>
    <td>A "moving" object's velocity is consistent with zero.</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#moving"><code>BAD_MOVING_FIT</code></a></td>
    <td>2</td>
    <td>3</td>
    <td></td>
    <td>motion inconsistent with straight line, not deblended as moving</td>
  </tr>
  <tr>

    <td><a href="dr10/algorithms/flags_detail.php#moving"><code>BAD_MOVING_FIT_CHILD</code></a></td>
    <td>2</td>
    <td>9</td>
    <td></td>
    <td>in a complicated blend, child's motion was inconsistent with
    straight line and parent was not deblended as moving</td>
  </tr>
  <tr>

    <td><a href="dr10/algorithms/flags_detail.php#moving"><code>CENTER_OFF_AIMAGE</code></a></td>
    <td>2</td>
    <td>17</td>
    <td></td>
    <td>nominal motion moves object off atlas image in this band</td>
  </tr>
  <tr>

    <td><a
  href="dr10/algorithms/flags_detail.php#mmoment"><code>AMOMENT_UNWEIGHTED</code></a>
  <br /> (also called <a
  href="dr10/algorithms/flags_detail.php#mmoment"><code>AMOMENT_FAINT</code></a>)</td>
    <td>2</td>
    <td>21</td>
    <td></td>

    <td>'adaptive' moment are actually unweighted for this object. NB:
    to find out if a moment measurement failed entirely, check the
    error field.</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#mmoment"><code>AMOMENT_SHIFT</code></a></td>
    <td>2</td>
    <td>22</td>
    <td></td>

    <td>centroid shifted too far during calculation of moments,
    <strong>moment calculation failed and <code>M_e1,M_e2</code> give the value
    of the shift</strong></td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#mmoment"><code>AMOMENT_MAXITER</code></a></td>
    <td>2</td>
    <td>23</td>

    <td></td>
    <td>moment calculation did not converge</td>
  </tr>
</table>


<p><a href="dr10/algorithms/photo_flags.php#Top">[Back to top]</a></p>

<p>All flags so far indicate some problem or failure of a
measurement. The following flags provide information about the
processing, but do not indicate a severe problem or failure.</p>


<h2 id="flagsdesc_deblend">Informational flags related to deblending</h2>

<p>Note also that there is a complementary description of most of these flags
<a href="dr10/algorithms/bitmask_flags1.php">here</a> and
<a href="dr10/algorithms/bitmask_flags2.php">here</a>.
</p>

<table class="common">
 <tr>
    <th>Flag</th>
    <th>1/2</th>
    <th>bit</th>
    <th>objc</th>
    <th>Description</th>
  </tr>
<tr>
    <td><a href="dr10/algorithms/flags_detail.php#deblend"><code>DEBLEND_TOO_MANY_PEAKS</code></a></td>
    <td>1</td>
    <td>11</td>
    <td></td>
    <td>object has more than 25 peaks; only first 25 were deblended
    and contain all of the parent's flux</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#deblend"><code>DEBLEND_UNASSIGNED_FLUX</code></a></td>
    <td>2</td>
    <td>10</td>
    <td>X</td>
    <td>more than 5% of the parent's Petrosian flux was initially not assigned to
    children; all this flux has been redistributed among children</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#deblend"><code>DEBLEND_PRUNED</code></a></td>
    <td>1</td>
    <td>26</td>
    <td></td>
    <td>parent containing peaks which were not deblended</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#deblend"><code>PEAKS_TOO_CLOSE</code></a></td>
    <td>2</td>
    <td>5</td>
    <td></td>
    <td>some peaks were too close to be deblended</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#deblend"><code>DEBLEND_DEGENERATE</code></a></td>
    <td>2</td>
    <td>18</td>
    <td></td>
    <td>some peaks had degenerate templates<!-- XXX What does this mean? --></td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#deblend"><code>BRIGHTEST_GALAXY_CHILD</code></a></td>
    <td>2</td>
    <td>19</td>
    <td></td>
    <td>brightest child among one parent's children</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#deblend"><code>DEBLENDED_AS_PSF</code></a></td>
    <td>1</td>
    <td>25</td>
    <td></td>
    <td>child is unresolved</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#deblend"><code>HAS_SATUR_DN</code></a></td>
    <td>2</td>
    <td>27</td>
    <td></td>
    <td>object is saturated, but attempted to add counts from bleed
    trail back in</td>

  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#deblend"><code>DEBLEND_PEEPHOLE</code></a></td>
    <td>2</td>
    <td>28</td>
    <td></td>
    <td>object was found in a second deblender pass attempting to
    catch special cases</td>

  </tr>
</table>

<p><a href="dr10/algorithms/photo_flags.php#Top">[Back to top]</a></p>

<h2 id="flagsdesc_further">Further informational flags</h2>

<p>Note also that there is a complementary description of most of these flags
<a href="dr10/algorithms/bitmask_flags1.php">here</a> and
<a href="dr10/algorithms/bitmask_flags2.php">here</a>.
</p>

<table class="common">
 <tr>
  <th>Flag</th>
    <th>1/2</th>
    <th>bit</th>
    <th>objc</th>
    <th>Description</th>
  </tr>
 <tr>
    <td><a href="dr10/algorithms/flags_detail.php#other"><code>BAD_RADIAL</code></a></td>
    <td>1</td>

    <td>15</td>
    <td></td>
    <td>last bin in radial profile &lt; 0; usually can be ignored</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#other"><code>CANONICAL_BAND</code></a></td>
    <td>2</td>

    <td>20</td>
    <td></td>
    <td>object is undetected in <var>r</var>-band; this band was used
    to determine Petrosian and Model radii</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#other"><code>SUBTRACTED</code></a></td>

    <td>1</td>
    <td>20</td>
    <td></td>
    <td>object is part of extended wing of a bright star</td>
  </tr>
  <tr>
    <td><a href="dr10/algorithms/flags_detail.php#other"><code>BINNED_CENTER</code></a></td>

    <td>2</td>
    <td>6</td>
    <td></td>
    <td>object was extended and centroid was determined on 2x2 binned
    frame. Avoid for astrometric work, e.g.</td>
  </tr>
</table>

<p><a href="dr10/algorithms/photo_flags.php#Top">[Back to top]</a></p>

<?php echo foot(); ?>
