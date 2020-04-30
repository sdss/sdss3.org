<?php include '../../header.php'; echo head('Spectroscopic Data Quality Flags'); ?>

<p>Here we describe the data quality flags for SDSS-III spectroscopic
data. The data quality information is broken down on a per-plate and
per-object basis. The basic idea is that unique plates or spectra
known to be science quality are called "primary", so selecting quality
spectra should be easy.  In addition, we have separated the Legacy
program in SDSS-I and -II as a special case and tracked the unique,
best spectrum for each Legacy target to make it easy to define uniform
samples. </p>

<h2>Plate Quality</h2>

<p>Each plate is assigned a quality (PLATEQUALITY) with one of three
values:</p>

<ol>
<li> "good": a good science quality plate</li>
<li> "marginal": an acceptable plate, but lower quality than good
plates</li>
<li> "bad": a plate whose results should be treated with skepticism</li>
</ol>

<p>In addition, it has three flags set to 0 or 1:</p>
<ol>
<li>IS_BEST: set to 1 if this plate is the best observation of a plate
(whether or not it is marked as bad); 0 otherwise.</li>
<li>IS_PRIMARY: set to 1 if this plate is the best observation of a
given plate, and the observation is not marked as "bad"; 0
otherwise. A plate can only be IS_PRIMARY if it is also IS_BEST.</li>
<li>IS_TILE: set to 1 if this plate is the best Legacy plate for
covering its location; select all "IS_TILE" plates to get just the
Legacy survey; 0 otherwise. A plate can only be IS_TILE if it is also
IS_PRIMARY.</li>
</ol>

<p>Selecting plates which are not "bad" will yield a good sample of
spectra. Many of the "bad" plates actually contain useful data (in
particular, many highly certain redshifts). However, bad plates should
be treated with care (in particular, they may have bad
spectrophotometry or residual sky subtraction problems). </p>

<p>The PLATEQUALITY string is set independently for each observation
(labeled by its MJD) of each plate. For DR8 plates the definition
varies depending on whether the plate is an SDSS plate (that is, has
survey set to 'sdss'), a SEGUE-1 plate (that is, has survey set to
'segue1'), or a SEGUE-2 plate (that is, has survey set to
'segue2'). </p>

<p>For SDSS plates, the conditions are based on the signal-to-noise
and the fraction of bad pixels:</p>
<pre>
      PLATESN2&gt;15 AND FBADPIX&lt;0.05 -&gt; 'good'
      PLATESN2&gt;9 AND FBADPIX&lt;0.13 -&gt; 'marginal' (if not 'good')
      otherwise -&gt; 'bad'
</pre>

<p>For SEGUE-1 plates, the conditions are based on the signal-to-noise
of the main sequence turnoff at g=18 (stored as SNTURNOFF),
except for some special plates:</p>
<pre>
      for faint plates SN of turnoff @ g=18 &gt; 16 for 'good'
      for bright plates SN of turnoff @ g=18 &gt; 7.5 for 'good'
      for low-latitude or test plates, set by hand
</pre>

<p>For SEGUE-2 plates, the conditions are also based on the signal-to-noise
of the main sequence turnoff at g=18:</p>
<pre>
      median(SN for MS-turnoff @ g=18)>10 -&gt; 'good'
      otherwise -&gt; 'bad'
</pre>

<p>Finally, for many plates we have simply identified the data as bad
by hand, and flagged them as such.  The conditions used are noted in
the QUALITY_COMMENTS fields in the files.</p>

<h2>Spectrum Quality</h2>

<p>Quality information is also available on a per-object basis.  In
particular, to select a unique set of targets, one wants to select on
one of the following fields:</p>
<ol>
<li>SPECPRIMARY: set to 1 if this is the best observation of a
particular position on the sky; 0 otherwise.</li>
<li>SPECLEGACY: set to 1 if this is the best observation of a
particular position on the sky from a Legacy plate; 0 otherwise</li>
</ol>

<p>To be "primary", the catalog entry has to be observed on a
"primary" observation of a plate as defined above (the best
observation of a plate, and not bad quality). Of course, the same
object can be observed on different, but neighboring plates, and such
duplicates are removed with the following preferences in decreasing
order of importance:</p>
<ol>
<li>Prefer observations with positive SN_MEDIAN</li>
<li>Prefer observations with ZWARNING_NOQSO=0</li>
<li>Prefer observations with larger SN_MEDIAN</li>
</ol>

<p>The same criteria apply to be a Legacy spectrum, except the catalog
entry must be on a Legacy plate (not just a primary plate.</p>

<p>As implied above, there are some general pieces of information
stored in the catalog about the quality of the spectrum:</p>
<ol>
<li>SN_MEDIAN: a "median" signal-to-noise per resolution element from
the four spectrographs</li>
<li>ZWARNING_NOQSO: a bitmask flagging anything unusual about the spectrum;
sometimes these are benign, sometimes they indicate errors.</li>
</ol>

<h2>Pixel masks</h2>

<p>Quality information also exists on a per-pixel basis as well. There are
uncertainty values associated with the flux in each pixel, and there are also
bitmasks recording information about of the quality of each pixel. </p>

<p>HDUs 1 to 3 of the <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spPlate.html">spPlate</a>
files store the error and mask information. HDU1 stores the "inverse
variance" of the uncertainties (one over sigma-squared, that is). This quantity
may be used, for example, in model fits to the spectra. It is set to zero for
pixels that should be ignored entirely (another way of thinking about it is that
they have infinite error).</p>

<p>HDU2 and HDU3 store the pixel mask information. These images yield a
<a href="dr9/algorithms/bitmasks.php">bitmask</a> for each pixel, in particular the <a
href="dr9/algorithms/bitmask_sppixmask.php">SPPIXMASK</a> bitmask. Since the final spectrum is
a combination of individual exposures, it may be that some bits were flagged in
some exposures but not in others. HDU2 is the "and mask", which lists all the
bits that were set for that pixel in all exposures. HDU3 is the "or mask", which
lists all the bits that were set for that pixel in any one (but not necessarily
all) of the exposures. The "and mask" (HDU2) is the mask of greatest use.</p>

<?php echo foot(); ?>

