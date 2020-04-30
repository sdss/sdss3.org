<?php include '../../header.php'; echo head('Recommendation on use photometric processing flags'); ?>

<p>A number of flags can be set during photometric processing. Here we
briefly describe some basic recommendations for using them to achieve
clean samples.  For details on the meaning of these flags, please
see the complete documentation:</p>

<ul>
<li><a href="dr10/algorithms/photo_flags.php">Summary of flags</a></li>
<li><a href="dr10/algorithms/flags_detail.php">Photometric flags detail</a></li>
<li><a href="http://www.astro.princeton.edu/~rhl/flags.html">Full flag
details</a> (link to Lupton's page)</li>
</ul>

<p>For a quick way to select a clean sample of stars and galaxies
(that is, however, probably not optimal for what you want to do), it
is enough to check the "clean" flag and the calibration status in
whatever bands are of interest to you. A SQL query in CAS that would
do this would be as follows (obviously you would add to this query
whatever other selection criteria you had):</p>

<pre>
  SELECT TOP 100 ra, dec FROM photoObj
  WHERE clean = 1 and (calibStatus_r &amp; 1) != 0
</pre>

<p>Let us pick apart "clean" so that you can understand it better and
optimize it for your purposes. Note that, for example, the target
selection codes for SDSS Legacy, BOSS, or SEGUE did not always use all
these checks, and sometimes checked <i>other</i> bits. There is no
perfect set of checks for all purposes!</p>

<p>There is also a <a href="dr10/tutorials/flags.php">clean photometry
tutorial</a> that can guide you through the various ways to select
clean photometry.</p>

<h2>Removing duplicates</h2>

<p>First, "clean" includes only
objects which are "primary" in the survey (see the <a
href="dr10/algorithms/resolve.php">resolve documentation</a>). One can
apply this criterion using either:</p>

<pre>
  SELECT TOP 100 ra, dec FROM photoObj
  WHERE mode = 1
</pre>

<p>or</p>

<pre>
  SELECT TOP 100 ra, dec FROM photoObj
  WHERE (resolveStatus &amp; 256) != 0
</pre>

<p>which are equivalent.</p>

<h2>Removing objects with deblending problems</h2>

<p>For both stars and galaxies, "clean" also checks that there are no
<var>r</var> band deblending problems, in particular checking <a
href="dr10/algorithms/flags_detail.php#centroid"><code>PEAKCENTER</code>
and <code>NOTCHECKED</code></a>. In addition, for low signal-to-noise objects
<a
href="dr10/algorithms/flags_detail.php#centroid"><code>DEBLEND_NOPEAK</code></a>
can also be a sign of trouble.</p>

<p>The equivalent SQL code is:</p>

<pre>
  (flags_r &amp; 0x20) = 0 --/ not PEAKCENTER
  and (flags_r &amp; 0x80000) = 0 --/ not NOTCHECKED
  and ((flags_r &amp; 0x400000000000) = 0 or psfmagerr_r &lt;= 0.2) --/ high S/N or not DEBLEND_NOPEAK
</pre>

<h2>Removing objects with interpolation problems</h2>

<p>For both stars and galaxies, "clean" checks that there are no
substantial <var>r</var> band interpolation issues, checking <a
href="dr10/algorithms/flags_detail.php#other"><code>PSF_FLUX_INTERP</code>,
<code>BAD_COUNTS_ERROR</code></a> and cases where <a
href="dr10/algorithms/flags_detail.php#other"><code>INTERP_CENTER</code>
and <code>CR</code></a> are set.</p>

<p>The equivalent SQL code is:</p>

<pre>
  ((flags_r &amp; 0x800000000000) = 0) --/ not PSF_FLUX_INTERP
  and ((flags_r &amp; 0x10000000000) = 0) --/ not BAD_COUNTS_ERROR
  and ((flags_r &amp; 0x100000000000) = 0 or (flags_r &amp; 0x1000) = 0) --/ not both INTERP_CENTER and CR
</pre>

<h2>Removing suspicious detections</h2>

<p>For stars and galaxies (with <code>type = 6</code> or
<code>3</code>), the "clean" flag checks that the object has pixels
detected in the first pass (<a
href="dr10/algorithms/flags_detail.php#detected"><code>BINNED1</code></a>),
that it isn't saturated (<a
href="dr10/algorithms/flags_detail.php#saturated"><code>SATURATED</code></a>),
and that it has a valid radial profile (<a
href="dr10/algorithms/flags_detail.php#centroid"><code>NOPROFILE</code></a>).</p>

<p>The equivalent SQL code is:</p>

<pre>
  ((flags_r &amp; 0x10000000) != 0) --/ BINNED1
  and ((flags_r &amp; 0x40000) = 0) --/ not SATURATED
  and ((flags_r &amp; 0x80) = 0) --/ not NOPROFILE
</pre>

<h2>Edge condition for stars</h2>

<p>In addition, for stars alone (with <code>type = 6</code>), "clean" checks
that the object isn't too close to the <a
href="dr10/algorithms/flags_detail.php#edge"><code>EDGE</code></a>.</p>

<p>The equivalent SQL code is:</p>

<pre>
  ((flags_r &amp; 0x4) = 0) and --/ not EDGE
</pre>


<?php echo foot(); ?>
