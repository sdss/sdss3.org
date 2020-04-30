<?php include '../../header.php'; echo head('Measures Of Flux And Magnitude'); ?>

<p>This page provides detailed descriptions of various measures of
magnitude and related outputs of the photometry pipelines. We also
provide discussion of some methodology. For details of the Photo
pipeline processing please read the <a
href="http://www.adsabs.harvard.edu/abs/2002AJ....123..485S">corresponding
EDR paper section</a> (section 4.4). There is also a separate page
describing the <a href="dr8/algorithms/fluxcal.php">photometric flux
calibration</a>.</p>

<p>Jump to:</p>

<ul>
<li><a href="dr8/algorithms/magnitudes.php#nmgy">Nanomaggies</a></li>
<li><a href="dr8/algorithms/magnitudes.php#asinh">Asinh Magnitudes</a></li>
<li><a href="dr8/algorithms/magnitudes.php#mag_fiber">Fiber Magnitudes</a></li>
<li><a href="dr8/algorithms/magnitudes.php#mag_model">Model Magnitudes</a></li>
<li><a href="dr8/algorithms/magnitudes.php#cmodel">cModel Magnitudes</a></li>
<li><a href="dr8/algorithms/magnitudes.php#mag_petro">Petrosian Magnitudes</a></li>
<li><a href="dr8/algorithms/magnitudes.php#mag_psf">PSF Magnitudes</a></li>
<li><a href="dr8/algorithms/magnitudes.php#extinction">Extinction</a></li>
<li><a href="dr8/algorithms/magnitudes.php#which_mags">Which Magnitude To Use?</a></li>
<li><a href="dr8/algorithms/magnitudes.php#photo_profile">Object Radial Profiles</a></li>
</ul>

<h2 id="nmgy">Flux units: maggies and nanomaggies</h2>

<p>In SDSS-III, we express all fluxes in terms of nanomaggies, which
are a convenient linear unit.  For example, quantities labeled
<i>petroFlux</i>, <i>psfFlux</i>, etc. are (unless otherwise stated)
in these units.  In each case, there is a corresponding <a
href="dr8/algorithms/magnitudes.php#asinh">asinh magnitude</a>, such
as <i>petroMag</i>, <i>psfMag</i> etc., explained further below.</p>

<p>A "maggy" is the flux <var>f</var> of the source relative to the
standard source <var>f</var><sub>0</sub> (which defines the zeropoint of
the magnitude scale).  Therefore, a "nanomaggy" is 10<sup>-9</sup>
times a maggy.
To relate these quantities to standard magnitudes, an object with
flux <var>f</var> given in nMgy has a <a
href="dr8/help/glossary.php#mag_pogson">Pogson magnitude</a>:</p> <p
class="c"><var>m</var>&nbsp;=&nbsp;[22.5&nbsp;mag]&nbsp;&minus;&nbsp;2.5&nbsp;log<sub>
10</sub>&nbsp;<var>f</var>&nbsp;&nbsp;&nbsp;.</p>

<p>Note that magnitudes listed in the SDSS catalog, however, are
<em>not</em> standard Pogson magnitudes, but <a
href="dr8/algorithms/magnitudes.php#asinh">asinh magnitudes</a>.</p>

<p>The standard source for each SDSS band is close to but not exactly
the AB source (3631 Jy), meaning that a nanomaggy is approximately
3.631&times;10<sup>-6</sup>&nbsp;Jy. However, our current understanding is
that the absolute calibration of the SDSS system has some
percent-level offsets relative to AB, discussed in detail in the
section on <a href="dr8/algorithms/fluxcal.php#SDSStoAB">AB
calibration</a>.</p>

<h2 id="asinh">SDSS Asinh Magnitudes</h2>

<p>Magnitudes within the SDSS are expressed as inverse hyperbolic sine
(or "asinh") magnitudes, described in detail by
<a href="http://adsabs.harvard.edu/abs/1999AJ....118.1406L">Lupton, Gunn &amp; Szalay (1999)</a>.
They are sometimes referred to informally as <em>luptitudes</em>.  The transformation
from linear flux measurements to asinh magnitudes is designed to be
virtually identical to the standard astronomical magnitude at high
signal-to-noise ratio, but to behave reasonably at low signal-to-noise
ratio and even at negative values of flux, where the logarithm in the
<a href="dr8/help/glossary.php#mag_pogson">Pogson magnitude</a> fails.
This allows us to report a magnitude even in the absence of a formal
detection; we quote no upper limits in our photometry.</p>

<p> The asinh magnitudes are characterized by a softening parameter
<var>b</var>, the typical 1-sigma noise of the sky in a PSF aperture in
1'' seeing.  The relation between detected flux <var>f</var> and asinh
magnitude <var>m</var> is:</p>

<p><var>m</var> = -2.5/ln(10) * [asinh((<var>f</var>/<var>f</var><sub>0</sub>)/(2<var>b</var>)) + ln(<var>b</var>)].</p>

<p>Here, <var>f</var><sub>0</sub> is given by the <em>classical</em>
zero point of the magnitude scale, <em>i.e.</em>,
<var>f</var><sub>0</sub> is the flux of an object with
<em>conventional</em> magnitude of zero.  The quantity <var>b</var> is
measured relative to <var>f</var><sub>0</sub>, and thus is in maggies;
it is given in the <a
href="dr8/algorithms/magnitudes.php#asinh_table">table of asinh softening
parameters</a> below (Table 21 in the <a
href="http://www.adsabs.harvard.edu/abs/2002AJ....123..485S"> EDR
paper</a>), along with the asinh magnitude associated with a zero flux
object.  The table also lists the flux corresponding to
10<var>f</var><sub>0</sub>, above which the asinh magnitude and the
traditional logarithmic magnitude differ by less than 1% in flux.  For
details on converting asinh magnitudes to other flux measures, see <a
href="dr8/algorithms/fluxcal.php#counts2mag">converting counts to
magnitudes</a>.</p>

<table class="common" id="asinh_table" style="text-align:center;">
<caption>Asinh Softening Parameters</caption>
<tr>
<th>Filter</th>
<th><var>b</var></th>
<th>Zero-flux Magnitude [<var>m</var>(<var>f</var>/<var>f</var><sub>0</sub> = 0)]</th>
<th><var>m</var>(<var>f</var>/<var>f</var><sub>0</sub> = 10<var>b</var>)</th>
</tr>
<tr><td><i>u</i></td><td>1.4&times;10<sup>-10</sup></td><td>24.63</td><td>22.12</td></tr>
<tr><td><i>g</i></td><td>0.9&times;10<sup>-10</sup></td><td>25.11</td><td>22.60</td></tr>
<tr><td><i>r</i></td><td>1.2&times;10<sup>-10</sup></td><td>24.80</td><td>22.29</td></tr>
<tr><td><i>i</i></td><td>1.8&times;10<sup>-10</sup></td><td>24.36</td><td>21.85</td></tr>
<tr><td><i>z</i></td><td>7.4&times;10<sup>-10</sup></td><td>22.83</td><td>20.32</td></tr>
</table>

<p><a href="dr8/algorithms/magnitudes.php#Top">[Back to top]</a></p>

<h2 id="mag_fiber">Fiber Magnitudes: fiberMag and fiber2Mag</h2>

<p>Fiber magnitudes reflect the flux contained within the aperture of
an <a href="dr8/help/glossary.php#fiber">spectroscopic fiber</a> in each
band.
In the case of fiberMag we assume an aperture appropriate to
the SDSS spectrograph (3'' in diameter).
In the case of fiber2Mag we assume an aperture appropriate to
the BOSS spectrograph (2'' in diameter).</p>

<h4>Notes</h4>

<ul>
  <li>For <a href="dr8/help/glossary.php#child">children</a>
      of <a href="dr8/help/glossary.php#deblend">deblended</a> galaxies,
      some of the pixels within a 1.5'' radius may belong to other
      children; we now measure the flux of the parent at the position of the
      child; this properly reflects the amount of light which the
      spectrograph will see.</li>
  <li>Images are convolved to 2'' seeing before fiberMags are
      measured. This also makes the fiber magnitudes closer to what is seen
      by the spectrograph.</li>
</ul>

<p><a href="dr8/algorithms/magnitudes.php#Top">[Back to top]</a></p>

<h2 id="mag_model">Model Magnitudes: devMag, expMag, modelMag</h2>

<p>There are several "model" magnitudes associated with each catalog
object. First, there are devMag and expMag magnitudes, associated with
de Vaucouleurs and exponential model fits, as explained more fully
below. These magnitudes are calculated from independent models in each
band.  Second, there is modelMag, which uses the better of the two
fits in the <i>r</i>-band as a matched aperture to calculate the flux
in all bands. For extended objects, modelMag usually provides the best
available SDSS colors.</p>

<p>Just as the <a href="dr8/algorithms/magnitudes.php#mag_psf">PSF magnitudes</a>
are optimal
measures of the fluxes of stars, the optimal measure of the flux of a
galaxy uses a matched galaxy model.  With this in mind, the code
fits two models to the two-dimensional image of each object in each
band:</p>
<ol>
  <li><b>A pure de&nbsp;Vaucouleurs profile</b>

      <br />I(r) = I<sub>0</sub> exp{-7.67 [(r/r<sub>e</sub>)<sup>1/4</sup>]} <br />
      (truncated beyond <em>7r<sub>e</sub></em> to smoothly go to zero at
      <em>8r<sub>e</sub></em>, and with some softening within
      <em>r=r<sub>e</sub>/50</em>). </li>

  <li><b>A pure exponential profile</b><br />
      I(r) = I<sub>0</sub> exp(-1.68r/r<sub>e</sub>)<br />
      (truncated beyond <em>3r<sub>e</sub></em> to smoothly go to zero
      at <em>4r<sub>e</sub></em>.</li>

</ol>

<p>Each model has an arbitrary axis ratio and position angle.
Although for large objects it is possible and even desirable to fit
more complicated models (<em>e.g.</em>, bulge plus disk), the computational
expense to compute them is not justified for the majority of the
detected objects.  The models are convolved with a double-Gaussian fit
to the PSF, which is provided by <code>psp</code>.
Residuals between the double-Gaussian and the full KL PSF model are
added on for just the central PSF component of the image. These
fitting procedures yield the quantities </p>

<ul>
  <li><code>rdeV</code> and <code>rExp</code>, the effective radii of the models;</li>
  <li><code>abDeV</code> and <code>abExp</code>, the axis ratio of the best fit models;</li>
  <li><code>phiDeV</code> and <code>phiExp</code>, the position angles of the ellipticity (in degrees East of North).</li>
  <li><code>deVlnL</code> and <code>explnL</code>, the likelihoods associated with each model from the chi-squared fit;</li>
  <li><code>deVMag</code> and <code>expMag</code>, the total magnitudes associated with each fit.</li>
</ul>

<p>Note that these quantities roughly correctly model the effects of
the PSF.  Errors for each of the last two quantities (which are based
only on photon statistics) are also reported.  We apply aperture
corrections to make these model magnitudes equal the PSF magnitudes in
the case of an unresolved object.</p>

<p>In order to measure unbiased colors of galaxies, we measure their
flux through equivalent apertures in all bands.  We choose the model
(exponential or de&nbsp;Vaucouleurs) of higher likelihood in the
<em>r</em> filter, and apply that model (<em>i.e.</em>, allowing only
the amplitude to vary) in the other bands after convolving with the
appropriate PSF in each band.  The resulting magnitudes are termed
<code>modelMag</code>.  The resulting estimate of galaxy
color will be unbiased in the absence of color gradients.  Systematic
differences from Petrosian colors are in fact often seen due to color
gradients, in which case the concept of a global galaxy color is
somewhat obviously aperture-dependent.  For faint galaxies, the model
colors have appreciably higher signal-to-noise ratio than do the
Petrosian colors.</p>

<p>For the current version of the photometric pipeline, the model
magnitude is a good proxy for point spread function (PSF) magnitude
for point sources, and Petrosian magnitude (which have larger errors
than model magnitude) for extended sources.</p>

<p>Due to the way in which model fits are carried out, there is some
weak discretization of model parameters, including <code>rExp</code> and <code>rDeV</code> but
especially <code>phiDeV</code> and <code>phiDeV</code>. </p>

<p><a href="dr8/algorithms/magnitudes.php#Top">[Back to top]</a></p>
<h2 id="cmodel">Composite Model Magnitudes: cModelMag</h2>

<p>The code also takes the best fit exponential and
de&nbsp;Vaucouleurs fits in each band and asks for the linear
combination of the two that best fits the image.  The coefficient
(clipped between zero and one) of the de&nbsp;Vaucouleurs term is
stored in the quantity <code>fracDeV</code>. From this we
calculate and store a composite flux as follows:</p>

<p><code>F<sub>composite</sub></code> =
<code>fracDeV</code> <code>F<sub>deV</sub></code> +
(1 - <code>fracDeV</code>) <code>F<sub>exp</sub></code>,</p>

<p>where <code>F<sub>deV</sub></code> and
<code>F<sub>exp</sub></code> are the de&nbsp;Vaucouleurs and exponential
fluxes (<em>not</em> magnitudes) of the object in question.  The
magnitude derived from <code>F<sub>composite</sub></code>
is referred to below as the <code>cmodel</code> magnitude (as distinct from
the <code>model</code> magnitude, which is based on the better-fitting of the
exponential and de&nbsp;Vaucouleurs models in the <em>r</em> band).</p>

<p>There is excellent agreement between <code>cmodel</code> and Petrosian magnitudes of galaxies, and
<code>cmodel</code> and PSF magnitudes of stars. <code>Cmodel</code> and Petrosian magnitudes are not expected to
be identical, of course; as <a
href="http://adsabs.harvard.edu/abs/2002AJ....124.1810S">Strauss
et al. (2002)</a> describe, the Petrosian aperture excludes the outer
parts of galaxy profiles, especially for elliptical galaxies.  As a
consequence, there is an offset of 0.05-0.1 mag between <code>cmodel</code> and Petrosian magnitudes of bright galaxies,
depending on the photometric bandpass and the type of galaxy.  The rms
scatter between model and Petrosian magnitudes at the bright end is
between 0.05 and 0.08 magnitudes, depending on bandpass; the
scatter between <code>cmodel</code> and Petrosian
magnitudes for galaxies is smaller, 0.03 to 0.05 magnitudes. </p>

<p>The <code>cmodel</code> and PSF magnitudes of stars are
in good agreement (they are forced to be identical in the mean by
aperture corrections, as was true in older versions of the pipeline).
The rms scatter between model and PSF magnitudes for stars is much
reduced, going from 0.03 mag to 0.02 magnitudes, the exact values
depending on bandpass.  In the EDR and DR1, star-galaxy separation was
based on the difference between model and PSF magnitudes.  We do
star-galaxy separation using the difference between <code>cmodel</code> and PSF magnitudes, with the threshold at
the same value (0.145 magnitudes).</p>

<p>Please note that while cModelMag is a good total flux indicator, it
is based on the independent model fits (devMag and expMag) in each
bandpass. For that reason, it generally does <em>not</em> yield as a
high signal-to-noise color as the aperture-matched modelMag values
do. For this reason, photometric redshift algorithms and other
color-sensitive procedures are usually better off relying on modelMag.</p>

<p><a href="dr8/algorithms/magnitudes.php#Top">[Back to top]</a></p>

<h2 id="mag_petro">Petrosian Magnitudes: petroMag</h2>

<p>For galaxy photometry, measuring flux is more difficult than for
stars, because galaxies do not all have the same radial surface
brightness profile, and have no consistently distinct edges.  In order
to avoid biases, we wish to measure a constant fraction of the total
light, independent of the position and distance of the object. To
satisfy these requirements, the SDSS has adopted a modified form of
the <a href="http://adsabs.harvard.edu/abs/1976ApJ...209L...1P">Petrosian
(1976)</a> system, measuring galaxy fluxes
within a circular aperture whose radius is defined by the shape of the
azimuthally averaged light profile.  </p>

<p>We define the "Petrosian ratio" <var>R</var><sub>P</sub> at a
radius <var>r</var> from the center of an object to be the ratio of the
local surface brightness in an annulus at <var>r</var> to the mean
surface brightness within <var>r</var>, as described by
<a href="http://adsabs.harvard.edu/abs/2001AJ....121.2358B">Blanton et al. (2001)</a> and
<a href="http://adsabs.harvard.edu/abs/2001AJ....122.1104Y">Yasuda et al. (2001)</a>:</p>

<table class="centerfigure">
<tr><td><img alt="eqn 1" src="images/petroeq1.gif" /></td></tr>
</table>

<p> where <var>I(r)</var> is the azimuthally averaged surface brightness profile.
The Petrosian radius <var>r</var><sub>P</sub> is defined as
the radius at which <var>R</var><sub>P</sub>(<var>r</var><sub>P</sub>) equals some
specified value <var>R</var><sub>P,lim</sub>, set to 0.2 in our
case. The Petrosian flux in any band is then defined as the flux
within a certain number <var>N</var><sub>P</sub> (equal to 2.0 in
our case) of <var>r</var> Petrosian radii:</p>

<table class="centerfigure">
<tr><td><img alt="eqn 2" src="images/petroeq2.gif" /></td></tr>
</table>

<p>In the SDSS
five-band photometry, the aperture in all bands is set by the profile
of the galaxy in the <var>r</var> band alone.  This procedure ensures
that the color measured by comparing the Petrosian flux
<var>F</var><sub>P</sub> in different bands is measured through a
consistent aperture.</p>

<p>The aperture 2<var>r</var><sub>P</sub> is large enough to contain nearly all of
 the flux for typical galaxy profiles, but small enough that the sky noise in
<var>F</var><sub>P</sub> is small.  Thus, even substantial errors in
<var>r</var><sub>P</sub> cause only
small errors in the Petrosian flux (typical statistical errors near
the spectroscopic flux limit of <var>r</var> ~17.7 are &lt; 5%),
although these errors are correlated.</p>

<p>The Petrosian radius in each band is the parameter <code>petroRad</code>,
and the Petrosian magnitude in each band
(calculated, remember, using only <code>petroRad</code>
for the <em>r</em> band) is the parameter <code>petroMag</code>.</p>

<p>In practice, there are a number of complications associated with
this definition, because noise, substructure, and the finite size of
objects can cause objects to have no Petrosian radius, or more than
one. Those with more than one are flagged as <code>MANYPETRO</code>;
the largest one is used.  Those with
none have <code>NOPETRO</code> set.  Most commonly, these
objects are faint (<em>r</em> &gt; 20.5 or so); the Petrosian ratio
becomes unmeasurable before dropping to the limiting value of 0.2;
these have <code>PETROFAINT</code> set and have their
"Petrosian radii" set to the default value of the larger of 3'' or the
outermost measured point in the radial profile.  Finally, a galaxy
with a bright stellar nucleus, such as a Seyfert galaxy, can have a
Petrosian radius set by the nucleus alone; in this case, the Petrosian
flux misses most of the extended light of the object.  This happens
quite rarely, but one dramatic example is the Seyfert galaxy NGC 7603
= Arp 092, at RA(2000) = 23:18:56.6, Dec(2000) = +00:14:38.</p>

<p>How well does the Petrosian magnitude perform as a reliable and
complete measure of galaxy flux? Theoretically, the Petrosian
magnitudes defined here should recover essentially all of the flux of
an exponential galaxy profile and about 80% of the flux for a
de&nbsp;Vaucouleurs profile. As shown by Blanton et al. (2001), this fraction
is fairly constant with axis ratio, while as galaxies become smaller
(due to worse seeing or greater distance) the fraction of light
recovered becomes closer to that fraction measured for a typical PSF,
about 95% in the case of the SDSS. This implies that the fraction of
flux measured for exponential profiles decreases while the fraction of
flux measured for de&nbsp;Vaucouleurs profiles increases as a function of
distance. However, for galaxies in the spectroscopic sample
(<em>r</em> &lt; 17.7), these effects are small; the Petrosian radius
measured by <code>frames</code> is extraordinarily
constant in physical size as a function of redshift.</p>

<p><a href="dr8/algorithms/magnitudes.php#Top">[Back to top]</a></p>

<h2 id="mag_psf">PSF Magnitudes: psfMag</h2>

<p>For isolated stars, which are well-described by the point spread
function (PSF), the optimal measure of the total flux is determined by
fitting a PSF model to the object.  In practice, we do this by
sync-shifting the image of a star so that it is exactly centered on a
pixel, and then fitting a Gaussian model of the PSF to it.  This fit
is carried out on the local PSF KL model at each position as well; the
difference between the two is then a local aperture correction, which
gives a corrected PSF magnitude.  Finally, we use bright stars to
determine a further aperture correction to a radius of 7.4'' as a
function of seeing, and apply this to each frame based on its seeing.
This involved procedure is necessary to take into account the full
variation of the PSF across the field, including the low
signal-to-noise ratio wings.  Empirically, this reduces the
seeing-dependence of the photometry to below 0.02 mag for seeing as
poor as 2''.  The resulting magnitude is stored in the quantity <code>psfMag</code>.</p>

<p>The flag <code>PSF_FLUX_INTERP</code> warns that the
PSF photometry might be suspect.  The flag <code>BAD_COUNTS_ERROR</code> warns
that because of interpolated
pixels, the error may be under-estimated.</p>

<p><a href="dr8/algorithms/magnitudes.php#Top">[Back to top]</a></p>

<h2 id="extinction">Extinction Correction</h2>

<p>Galactic extinction corrections in magnitudes at the position of
each object, <code>extinction</code>, are computed
following Schlegel, Finkbeiner &amp; Davis (1998).  These corrections
are <em>not</em> applied to the magnitudes in the databases unless
otherwise noted; if desired, they must be explicitly applied by the
user.</p>

<p>The conversions we use from <var>E</var>(<var>B</var>-<var>V</var>) to total extinction
<var>A</var><sub>&lambda;</sub>, assuming a <var>z</var>=0 elliptical galaxy
spectral energy distribution, are tabulated in Table 22 of the EDR
Paper.</p>

<p><a href="dr8/algorithms/magnitudes.php#Top">[Back to top]</a></p>


<h2 id="which_mags">Which Magnitude Should I Use?</h2>

<p>Faced with this array of different magnitude measurements to choose
from, which one is appropriate in which circumstances? We cannot give
any guarantees of what is appropriate for the science <em>you</em>
want to do, but here we present some examples, where we use the
general guideline that one usually wants to maximize some combination
of signal-to-noise ratio, fraction of the total flux included, and
freedom from systematic variations with observing conditions and
distance.</p>

<p>Given the excellent agreement between <code>cmodel</code> magnitudes (see
<a href="dr8/algorithms/magnitudes.php#cmodel">cmodel
magnitudes</a> above) and PSF magnitudes for point sources, and
between <code>cmodel</code> magnitudes and Petrosian
magnitudes (albeit with intrinsic offsets due to aperture corrections)
for galaxies, the <code>cmodel</code> magnitude is now an
adequate proxy to use as a universal magnitude for all types of
objects.  As it is approximately a matched aperture to a galaxy, it
has the great advantage over Petrosian magnitudes, in particular, of
having close to optimal noise properties.</p>

<h3>Example magnitude usage</h3>
 <ul>
   <li><b>Photometry of Bright Stars</b>: If the objects are bright enough,
       add up all the flux from the profile <code>profMean</code> and generate a large aperture
       magnitude.  We recommend using the first 7 annuli.</li>
   <li><b>Photometry of Distant Quasars</b>: These will be unresolved,
       and therefore have images consistent with the PSF.  For this reason,
       <code>psfMag</code> is unbiased and optimal.</li>

   <li><b>Colors of Stars</b>: Again, these objects are unresolved, and <code>psfMag</code> is the optimal measure of their
       brightness. </li>
   <li> <b>Photometry of Nearby Galaxies</b>: Galaxies bright enough to
       be included in our spectroscopic sample have relatively high
       signal-to-noise ratio measurements of their Petrosian magnitudes. Since
       these magnitudes are model-independent and yield a large fraction of
       the total flux, roughly constant with redshift,  <code>petroMag</code>
       is the measurement of choice for such objects. In fact, the noise
       properties of Petrosian magnitudes remain good to <em>r=20</em>
       or so. </li>

   <li><b>Photometry of Galaxies</b>: Under most conditions, the <code>cmodel</code> magnitude is
       now a reliable estimate of the galaxy flux.  In addition, this
       magnitude account for the effects of local seeing and thus are
       less dependent on local seeing variations.</li>
   <li><b>Colors of Galaxies</b>: For measuring <em>colors</em> of
       extended objects, we continue to recommend using
       the model (not the <code>cmodel</code>) magnitudes.
       The model magnitude is calculated using the
       best-fit parameters in the <em>r</em> band, and applies it to
       all other bands; the light is therefore measured consistently
       through the same aperture in all bands.</li>

 </ul>

<p> Of course, it would <em>not</em> be appropriate to study the
evolution of galaxies and their colors by using Petrosian magnitudes
for bright galaxies, and model magnitudes for faint galaxies, without
fully modeling and accounting for the resulting aperture corrections.
</p>

<p>Finally, we note that azimuthally-averaged radial profiles are also
provided, as described <a href="dr8/algorithms/magnitudes.php#photo_profile">below</a>, and can
easily be used to create circular aperture magnitudes of any desired
type. For instance, to study a large dynamic range of galaxy fluxes,
one could measure alternative Petrosian magnitudes with parameters
tuned such that the Petrosian flux includes a small fraction of the
total flux, but yields higher signal-to-noise ratio measurements at
faint magnitudes.</p>

<p><a href="dr8/algorithms/magnitudes.php#Top">[Back to top]</a></p>

<h2 id="photo_profile">Radial Profiles</h2>

<p>The <code> frames</code> pipeline extracts an
azimuthally-averaged radial surface brightness profile. In the
catalogs, it is given as the average surface brightness in a series of
annuli.  This quantity is in units of <a
href="dr8/algorithms/magnitudes.php#nmgy">nanomaggies</a> per square
arcsec, as described above.  The number of annuli for which there is a
measurable signal is listed as <code>nprof</code> (in CAS,
in the photoObjAll table). The mean surface brightness is listed as
<code> profMean</code>, and the error is listed as <code>profErr</code> (in CAS, both of these values are stored
separately in the photoProfile table).  The error includes both
photon noise, and the small-scale "bumpiness" in the counts as a
function of azimuthal angle.</p>

<p>When converting the <code>profMean</code> values to a local surface
brightness, it is not the best approach to assign the mean
surface brightness to some radius within the annulus and then linearly
interpolate between radial bins.  Do not use smoothing
splines, as they will not go through the points in the cumulative
profile and thus (obviously) will not conserve flux. What <code>frames</code>
does, <em>e.g.</em>, in determining the Petrosian ratio, is to fit a taut spline to the
<em>cumulative</em> profile and then differentiate that spline fit,
after transforming both the radii and cumulative profiles with asinh
functions.  We recommend doing the same here.</p>

<p>The annuli used are:</p>

<table class="common">
<tr><th>Aperture</th><th>Radius (pixels)</th><th>Radius (arcsec)</th><th>Area (pixels)</th></tr>
<tr><td>1</td><td>0.56</td><td>0.23</td><td>1</td></tr>
<tr><td>2</td><td>1.69</td><td>0.68</td><td>9</td></tr>
<tr><td>3</td><td>2.58</td><td>1.03</td><td>21</td></tr>
<tr><td>4</td><td>4.41</td><td>1.76</td><td>61</td></tr>
<tr><td>5</td><td>7.51</td><td>3.00</td><td>177</td></tr>
<tr><td>6</td><td>11.58</td><td>4.63</td><td>421</td></tr>
<tr><td>7</td><td>18.58</td><td>7.43</td><td>1085</td></tr>
<tr><td>8</td><td>28.55</td><td>11.42</td><td>2561</td></tr>
<tr><td>9</td><td>45.50</td><td>18.20</td><td>6505</td></tr>
<tr><td>10</td><td>70.15</td><td>28.20</td><td>15619</td></tr>
<tr><td>11</td><td>110.50</td><td>44.21</td><td>38381</td></tr>
<tr><td>12</td><td>172.50</td><td>69.00</td><td>93475</td></tr>
<tr><td>13</td><td>269.50</td><td>107.81</td><td>228207</td></tr>
<tr><td>14</td><td>420.50</td><td>168.20</td><td>555525</td></tr>
<tr><td>15</td><td>657.50</td><td>263.00</td><td>1358149</td></tr>
</table>

<p><a href="dr8/algorithms/magnitudes.php#Top">[Back to top]</a></p>

<?php echo foot(); ?>
