<?php include '../../header.php'; echo head('Sky Measurements'); ?>

<h2>Introduction</h2>

<p>The SDSS imaging data have all been processed with the latest
photometric pipeline (<code>photo</code>), version <code>v5_6</code>.
The major new feature of this version is improved sky subtraction
around bright objects, which improves the flux estimates of the bright
objects, as well as the detection of faint objects near those bright
objects.  The sky subtraction algorithm used in versions
<code>v5_4</code> and earlier tended to oversubtract the outer parts
of large galaxies, affecting the photometry both of those galaxies,
and of smaller and fainter objects in their vicinity. </p>

<p>Here we describe the various sky estimates calculated and used in
latest version of <code>photo</code>. These include an initial
estimate of the sky in each field (the "PSP" sky), the
<code>photo</code> sky estimates that were applied to the flux
measurements of the catalog, and finally "global sky", a new estimate
of the sky calculated in postprocessing that is included in the
corrected frames.</p>

<h2 id="psp">PSP sky estimates</h2>

<p>The "postage stamp pipeline", or PSP, is preprocessing of the
imaging run before <code>photo</code> to calculate relevant
quantities, like the overall sky level and the point spread
function. Its results (converted to calibrated quantities) are stored
in the <a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/RERUN/RUN/photoField.html">photoField</a>
files for each field.</p>

<p>The PSP "sky" value in each band yields the median sky in each
frame, given in <a href="dr10/help/glossary.php#nanomaggie">nanomaggies</a>. In
addition, the rate of change of the sky, and the sigma of the
distribution of pixels around the median, are given.</p>

<h2 id="photo">PHOTO sky estimates</h2>

<p>In the <code>PHOTO</code> pipeline, sky is estimated on a
rectangular grid of 128 pixels (roughly 50 arcsec) by taking the
median of a set of 256 by 256 pixels centered on each grid point.  The
version of <code>photo</code> used in DR7 and before simply
interpolated bilinearly between these grid points as an estimate of
sky; this tended to erroneously include light from extended regions
around bright galaxies.</p>

<p>The new algorithm first identifies and models those extended
galaxies before finalizing sky subtraction.  Using the preliminary sky
value for an entire field from PSP, it identifies BRIGHT (&gt; 51
sigma) sources.  These sources are run through the deblender, to
separate overlapping BRIGHT objects.  Models are determined for each
object, and these are then subtracted away: two-dimensional
exponential and de Vaucouleurs profile of arbitrary axis ratio,
convolved with the local PSF.  As described in the DR2 paper, one can
fit the observed profile of galaxies with a linear combination of the
best-fit exponential and de Vaucouleurs models to any given galaxy in
a given band. This composite model is then subtracted from the image,
removing the extended wings of the galaxy.
Unsaturated BRIGHT stars are not subtracted at this stage.  But
for saturated stars (brighter than about r = 14), the outer wings are
fit to a power-law, and this wing is then subtracted.</p>

<p>At this stage, the local sky is estimated as before, i.e., linearly
interpolated on a 128-pixel grid.  The galaxies (but not the stars)
are then added back to the sky-subtracted frame, and faint object
detection proceeds as normal.</p>

<p>Note that the galaxy models that are subtracted away at the first
stage don't have to be very good as they get replaced bit-for-bit;
they just have to stop the sky detection code from being affected by
the outer parts of the galaxy.</p>

<p>With this change in the sky subtraction routine, the outer parts of
galaxies are quite a bit more extended than they were in the previous
version of the software, meaning that they are likely to overlap with
more objects in their outer parts.  With this in mind, we increase the
number of children any blended parent can be decomposed into from 25
to 100.</p>

<p>The binned estimated sky values are stored in the <a
href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/fpBIN.html">fpBIN</a>
files for each field.</p>

<h2 id="global">Global sky estimates</h2>

<p>As a post-processing step, that does not affect the fluxes or
structural measurements in the final catalog, we also calculate a
"global" sky using the full set of fields for each run. This global
sky is subtracted from the <a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/frames/RERUN/RUN/CAMCOL/frame.html">new
corrected frames</a>, and also stored inside those files. </p>

<p>For each band, the global sky algorithm first builds a set of
masks, based on detected objects as well as RC3 galaxies and Tycho
stars known to be inside or close to the edge of each field. Any field
marked as bad we mask entirely.</p>

<p>Second, the global sky algorithm fits a smooth spline to the binned
<code>photo</code> sky estimates, ignoring data in the mask. The
spline is high-resolution along each row (with a breakpoint every 8
pixels) but low resolution along each column (with a breakpoint every
field, or 1361 pixels). The high-resolution on the row direction means
that very tiny misestimates of the flat-field are properly taken into
account.  The fit function is almost separable in the row and column
directions, but the spline along each row is allowed to vary very
slowly (on a scale of 40 or so fields). We took care to handle chips
with two amplifiers, allowing each side to vary independently, since
the relative gains appear to vary at the subpercent level during a
run. </p>

<p>The result is a very smooth fit to the sky background, that quite
effectively serves as a good sky subtraction for large objects. For
example, in simulations the typical light subtracted by this
algorithms for a galaxy with a half-light radius of up to 100 arcsec
is less than about 10 percent (of course, sky-subtraction is only
<strong>part</strong> of the challenge of correctly measuring fluxes
at that level for large objects). For a set of real nearby galaxies
brighter than r = 15, we have also compared results with the <a
href="http://montage.ipac.caltech.edu/">Montage</a> service for SDSS
image mosaicking and sky-subtraction. We find differences of less than
5% with their quite different algorithm.  In the mean our technique
also effective for point sources or small galaxies, though those near
bright objects obviously require the smaller scale sky subtraction as
well as the deblending of photo.</p>

<p>Problems remain in some areas, either due to lack of photometricity
or due to quickly varying sky line emission.  This latter problem is
most serious in the i- and z-bands, though to a lesser extent it also
affects the r-band. Typically even short time scale variations (a few
minutes) are followed well, but residuals can occur when too much of
the image is masked.</p>

<table class="noborder" style="text-align:center;">
<tr>
<th style="width:175px;">Sky estimate from <code>photo</code></th>
<th style="width:175px;">Mask</th>
<th style="width:175px;">Spline fit</th>
<th style="width:175px;">Residuals</th>
</tr>
<tr>
<td><a href="images/Sky-fpbin.jpg"><img src="images/Sky-fpbin.jpg" alt="fpBIN"
width="175" /></a></td>
<td><a href="images/Sky-mask.jpg"><img src="images/Sky-mask.jpg" alt="mask"
width="175" /></a></td>
<td><a href="images/Sky-model.jpg"><img src="images/Sky-model.jpg" alt="model"
width="175" /></a></td>
<td><a href="images/Sky-subtracted.jpg"><img src="images/Sky-subtracted.jpg" alt="subtracted"
width="175" /></a></td>
</tr>
</table>

<?php echo foot(); ?>
