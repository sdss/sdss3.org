<?php include '../../header.php'; echo head('Morphology/Classification'); ?>

<p>This page provides detailed descriptions of various morphological
outputs of the photometry pipelines. We also provide discussion of
some methodology; for details of the Photo pipeline processing please
read the corresponding section in <a
href="http://adsabs.harvard.edu/abs/2002AJ....123..485S">the EDR paper</a>. Other photometric outputs,
specifically the various
magnitudes, are described on the <a href="dr9/algorithms/magnitudes.php">photometry
page</a>.</p>


<p>Jump to:</p>

<ul>
<li><a href="dr9/algorithms/classify.php#photo_class">Star/Galaxy Classification</a></li>
<li><a href="dr9/algorithms/classify.php#photo_sb">Surface Brightness</a></li>
<li><a href="dr9/algorithms/classify.php#photo_fits">Model Fit Likelihoods &amp; Parameters</a></li>
<li><a href="dr9/algorithms/classify.php#photo_stokes">Ellipticities</a></li>
<li><a href="dr9/algorithms/classify.php#photo_iso">Isophotal Quantities</a></li>
<li><a href="dr9/algorithms/classify.php#photo_adaptive">Adaptive Moments</a></li>
</ul>

<h2 id="photo_class">Star/Galaxy Classification</h2>

<p>
The <code><a href="dr9/help/glossary.php#frames_pipeline">frames</a></code> pipeline
provides a simple star/galaxy separator in its
<code>type</code>
parameters (provided separately for each band) and its
<code>objc_type</code> parameters
(one value per object); these are set to:</p>

<table class="common">
<tr><th>Class</th><th>Name</th><th>Code</th></tr>
<tr><td>Unknown</td><td>UNK</td><td style="text-align:center;">0</td></tr>
<tr><td>Cosmic Ray</td><td>CR</td><td style="text-align:center;">1</td></tr>
<tr><td>Defect</td><td>DEFECT</td><td style="text-align:center;">2</td></tr>
<tr><td>Galaxy</td><td>GALAXY</td><td style="text-align:center;">3</td></tr>
<tr><td>Ghost</td><td>GHOST</td><td style="text-align:center;">4</td></tr>
<tr><td>Known object</td><td>KNOWNOBJ</td><td style="text-align:center;"> 5</td></tr>
<tr><td>Star</td><td>STAR</td><td style="text-align:center;">6</td></tr>
<tr><td>Star trail</td><td> TRAIL</td><td style="text-align:center;">7</td></tr>
<tr><td>Sky</td><td>SKY</td><td style="text-align:center;">8</td></tr>
</table>

<p>The photometric pipeline version used for DR2 and later data (5_4)
classifies objects as extended ("galaxy") or point-like ("star") based
on the difference between the <a
href="dr9/help/glossary.php#mag_cmodel">cmodel</a> and <a
href="dr9/help/glossary.php#mag_psf">PSF</a> magnitude. An object is
classified as extended if</p>

<p>
psfMag - cmodelMag &gt; 0.145.
</p>

<p>If satisfied, <code>type</code> is set to <code>GALAXY</code>
for that band; otherwise, <code>type</code> is set to <code>STAR</code>.
The global type <code>objc_type</code> is set according to the same criterion,
applied to the summed fluxes from all bands in which the object is detected.</p>

<p>Experimentation has shown that simple variants on this scheme,
such as defining galaxies as those objects classified as such in any
two of the three high signal-to-noise ratio bands (namely, <em>g</em>,
<em>r</em>, and <em>i</em>), work better in some circumstances.  This
scheme occasionally fails to distinguish pairs of stars with
separation small enough (&lt;2'') that the deblender does not split
them; it also occasionally classifies Seyfert galaxies with
particularly bright nuclei as stars.</p>

<p>Further information to refine the star-galaxy separation further
may be used, depending on scientific application.  For example,
<a href="http://adsabs.harvard.edu/abs/2002ApJ...579...48S">Scranton et al. (2002)</a>
advocate applying a Bayesian prior to the above
difference between the PSF and exponential magnitudes, depending on
seeing and using prior knowledge about the counts of galaxies and
stars with magnitude.</p>

<p><a href="dr9/algorithms/classify.php#Top">[Back to top]</a></p>
<h2 id="photo_sb">Surface Brightness &amp; Concentration Index</h2>
<p>The <code>frames</code> pipeline also reports the radii containing 50% and 90% of
the Petrosian
flux for each band, <code> petroR50</code> and <code> petroR90</code> respectively.
The usual characterization of surface-brightness in the target
selection pipeline of the SDSS is the mean surface brightness within <code>petroR50</code>.
It turns out that the ratio of <code> petroR50</code> to <code> petroR90</code>, the
so-called "inverse concentration index", is correlated with
morphology (<a href="http://adsabs.harvard.edu/abs/2001AJ....122.1238S">Shimasaku et al. 2001</a>,
<a href="http://adsabs.harvard.edu/abs/2001AJ....122.1861S">Strateva et al. 2001</a>).
Galaxies with a de&nbsp;Vaucouleurs profile have an inverse concentration index of around 0.3;
exponential galaxies have an inverse concentration index of around
0.43. Thus, this parameter can be used as a simple morphological
classifier.</p>
<p>An important caveat when using these quantities is that they
are <i>not</i> corrected for seeing.  This causes the surface
brightness to be underestimated, and the inverse concentration index
to be overestimated, for objects of size comparable to the PSF.  The
amplitudes of these effects, however, are not yet well characterized.</p>

<p><a href="dr9/algorithms/classify.php#Top">[Back to top]</a></p>

<h2 id="photo_fits">Model Fit Likelihood and Parameters</h2>
<p>
In addition to the model and PSF magnitudes described on the
<a href="dr9/algorithms/magnitudes.php">photometry page</a>,
the likelihoods <code> deV_L</code>, <code> exp_L</code>, and <code> star_L</code> are also
calculated by <code> frames</code>. These are the probabilities of achieving the
measured chi-squared for the de&nbsp;Vaucouleurs, exponential, and PSF fits,
respectively. For instance, <code>star_L</code> is the probability that an
object would have at least the measured value of chi-squared if it is really
well represented by a PSF. If one wishes to make use of a trinary scheme to
classify objects, calculation of the fractional likelihoods is
recommended:</p>

<pre>
f(deV_L) = deV_L/[deV_L+exp_L+star_L]
</pre>

<p>and similarly for <code><em>f</em>(exp_L)</code> and <code><em>f</em>(star_L)</code>.
A fractional likelihood greater than 0.5 for any of these three profiles
is generally a good threshold for object classification.  This works
well in the range 18&lt;<em>r</em>&lt;21.5; at the bright end, the
likelihoods have a tendency to underflow to zero, which makes them less
useful.  In particular, <code> star_L</code> is often zero for bright
stars. </p>

<p><a href="dr9/algorithms/classify.php#Top">[Back to top]</a></p>

<h2 id="photo_stokes">Ellipticities</h2>
<p>
The model fits yield an estimate of the axis ratio and position angle
of each object, but it is useful to have model-independent measures of
ellipticity. In the data released here, <code> frames</code> provides two further
measures of ellipticity, one based on second moments, the other based
on the ellipticity of a particular isophote.  The model fits do
correctly account for the effect of the seeing, while the methods
presented here do not.</p>
<p>
The first method measures flux-weighted second moments,
defined as:</p>
<p>
<em>
M<sub>xx</sub> = &lt;x<sup>2</sup>/r<sup>2</sup>&gt;<br />
M<sub>yy</sub> = &lt;y<sup>2</sup>/r<sup>2</sup>&gt;<br />
M<sub>xy</sub> = &lt;xy/r<sup>2</sup>&gt;
</em>
</p>

<p>In the case that the object's isophotes are self-similar ellipses, one
can show:</p>
<p><em> Q = M<sub>xx</sub> - M<sub>yy</sub> =
[(a-b)/(a+b)]cos2&phi;<br /> U = M<sub>xy</sub> =
[(a-b)/(a+b)]sin2&phi;<br /> </em></p>

<p>where <em>a</em> and <em>b</em>
are the semi-major and semi-minor axes, and &phi; is the position
angle. <em>Q</em> and <em>U</em> are <code>Q</code> and <code>U</code>
in <code> PhotoObj</code> and are referred to as "Stokes
parameters." They can be used to reconstruct the axis ratio and
position angle, measured relative to row and column of the CCDs.  This
is equivalent to the normal definition of position angle (East of
North), for the scans on the Equator.  The performance of the Stokes
parameters are not ideal at low S/N.  As of DR1, <code>frames</code>
provides measurements of
adaptive moments which are better shape estimators than the Stokes
parameters. Read the <a href="dr9/algorithms/classify.php#photo_adaptive">detailed description of
adaptive moments</a>.</p>

<p><a href="dr9/algorithms/classify.php#Top">[Back to top]</a></p>


<h2 id="photo_iso">Isophotal Quantities</h2>

<p><strong>As of DR8, the isophotal quantities are only retained in the
uncalibrated files. Because they are generally unreliable
measurements, we have dropped them from the photoObj files and from
CAS.</strong> For completeness, we note that these measures of ellipticity
use the ellipticity of the 25 magnitudes per square arcsecond isophote
(in all bands).  In detail, <code>frames</code> measures the radius of a
particular isophote as a function of angle and Fourier expands this
function.  It then extracts from the coefficients the centroid
(<code>isoRowC,isoColC</code>), major and minor axis
(<code>isoA,isoB</code>), position angle (<code>isoPhi</code>), and
average radius of the isophote in question (<code>Profile</code>).  It
also reports the derivative of each of these quantities with respect
to isophote level, necessary to recompute these quantities if the
photometric calibration changes.</p>

<p><a href="dr9/algorithms/classify.php#Top">[Back to top]</a></p>

<h2 id="photo_adaptive">Adaptive Moments</h2>
<p>Adaptive moments are the second moments of the object intensity, measured using
a particular scheme designed to have near-optimal signal-to-noise ratio.
Moments are measured using a radial weight function iteratively adapted to the
shape (ellipticity) and size of the object.  This elliptical weight function
has a signal-to-noise advantage over axially symmetric weight functions.  In
principle there is an optimal (in terms of signal-to-noise) radial shape for
the weight function, which is related to the light profile of the object
itself.  In practice a Gaussian with size matched to that of the object is
used, and is nearly optimal. Details can be found in
<a href="http://adsabs.harvard.edu/abs/2002AJ....123..583B">Bernstein &amp; Jarvis (2002)</a>.</p>
<p>The outputs included in the SDSS data release are the following. <b>Note</b>: the
outputs are the parameters of the matched gaussian rather than actual
measured moments, but we will use the moment notation below for clarity.</p>
<ol>
 <li>The sum of the second moments in the CCD row and column direction:<br />
   <code>m<sub>rr_cc</sub> = &lt;col<sup>2</sup>&gt; + &lt;row<sup>2</sup>&gt;</code><br />
   and its error <code>m<sub>rr_cc_err</sub></code>. <br />
   The second moments are defined in the following way:<br />
   <code> &lt;col<sup>2</sup>&gt;= sum[I(col,row) w(col,row) col<sup>2</sup>]/sum[I*w]</code><br />
   where <code>I</code> is the intensity of the object and <code>w</code> is the weight function.
  </li>

  <li>The ellipticity (polarization) components:<br />
     <code>m<sub>e1</sub> = &lt;col<sup>2</sup>&gt; - &lt;row<sup>2</sup>&gt;)/m<sub>rr_cc</sub><br />
     m<sub>e2</sub> = 2.*&lt;col*row&gt;/m<sub>rr_cc</sub></code><br />
     and square root of the components of the covariance matrix:<br />
     <code>
     m<sub>e1e1err</sub> = sqrt( Var(e1) )<br />
     m<sub>e1e2err</sub> = sign(Covar(e1,e2))*sqrt( abs( Covar(e1,e2) ) )<br />
     m<sub>e2e2err</sub> = sqrt( Var(e2) )</code><br />
  </li>

  <li>A fourth-order moment<br />
      <code>m<sub>cr4</sub> = &lt;r<sup>4</sup>&gt;/sigma<sup>4</sup><br /></code>
      where <code>r<sup>2</sup> = col<sup>2</sup> + row<sup>2</sup></code>, and
      sigma is the size of the gaussian weight. No error is quoted on this quantity.
   </li>

  <li><p>These quantities are also measured for the PSF, reconstructed at the position
     of the object.  The names are the same with an appended <code>_psf</code>.  No errors are
      quoted for PSF quantities.  These PSF moments can be used to correct the
      object shapes for smearing due to seeing and PSF anisotropy using
      the following formulas.</p>
      <p>
      e1 = (e1meas - R*e1psf)/(1-R) <br />
      e2 = (e2meas - R*e2psf)/(1-R) <br />
      R = m<sub>rr_cc_psf</sub>/m<sub>rr_cc</sub>*(4/m<sub>cr4_psf</sub>-1)/(4/m<sub>cr4</sub>-1)
      </p>
      <p>But as Hirata &amp; Seljak point out, this formula results in a small bias.
      See <a href="http://adsabs.harvard.edu/abs/2002AJ....123..583B">Bernstein &amp;
     Jarvis (2002)</a> and <a href="http://adsabs.harvard.edu/abs/2003MNRAS.343..459H">Hirata &amp; Seljak (2003)</a>
     for details and more accurate correction formulas.  In particular, Hirata &amp; Seljak give accurate
     correction formulas that use only the above measured parameters.</p>

   </li>
</ol>

<p><a href="dr9/algorithms/classify.php#Top">[Back to top]</a></p>

<?php echo foot(); ?>
