<?php include '../../header.php'; echo head('Velocity dispersion measurements'); ?>

<h2 id="intro">Introduction</h2>

<p><strong>The velocity dispersion measurement has been changed to use
only the direct-fitting method in DR6 and DR7.</strong></p>

<p>The observed velocity dispersion <var>sigma</var> is the result of
the superposition of many individual stellar spectra, each of which
has been Doppler shifted because of the star's motion within the
galaxy.  Therefore, it can be determined by analyzing the integrated
spectrum of the whole galaxy - the galaxy integrated spectrum will
be similar to the spectrum of the stars which dominate the light of
the galaxy, but with broader absorption lines due to the motions of the
stars.  The velocity dispersion is a fundamental parameter because it is
an observable which better quantifies the potential well of a galaxy.</p>
<p>Jump to:</p>

<ul>
<li><a href="dr8/algorithms/veldisp.php#selection">[Selection Criteria]</a></li>
<li><a href="dr8/algorithms/veldisp.php#method">[Method]</a></li>
<li><a href="dr8/algorithms/veldisp.php#bias">[Bias Correction]</a></li>
<li><a href="dr8/algorithms/veldisp.php#templates">[Templates]</a></li>
<li><a href="dr8/algorithms/veldisp.php#caveats">[Caveats]</a></li>
</ul>

<h2 id="selection">Selection criteria</h2>

<p>Estimating velocity dispersions for galaxies which have integrated
spectra which are dominated by multiple components showing different
stellar populations and different kinematics (<i>e.g.</i> bulge and disk
components) is complex.  Therefore, the SDSS estimates the velocity
dispersion only for spheroidal systems whose spectra are dominated by
the light of red giant stars. With this in mind, we have selected
galaxies which satisfy the following criteria:</p>

<ul>
 <li>classified as galaxy (specClass EQ 'SPEC_GALAXY')</li>
 <li>redshift obtained from cross-correlation with template (zStat EQ 'XCORR_HIC')</li>
 <li>no warnings from the spectroscopic pipeline (zWarning AND ('Z_WARNING_NO_SPEC' OR
     'Z_WARNING_NO_BLUE' OR 'Z_WARNING_NO_RED' OR 'Z_WARNING_LOC') EQ 0)  </li>
 <li>PCA classification (eClass &lt; 0) typical of
     early-type galaxy spectra (Connolly &amp; Szalay 1999)</li>
 <li>redshift &lt; 0.4</li>
</ul>

<p>Because the aperture of an SDSS spectroscopic fiber (3 arcsec)
samples only the inner parts of nearby galaxies, and because the
spectrum of the bulge of a nearby late-type galaxy can resemble that
of an early-type galaxy, our selection includes spectra of bulges of
nearby late-type galaxies. Note that weak emission lines, such as
H<sub><var>alpha</var></sub> and/or O II, could still be present in
the selected spectra. </p>

<p><a href="dr8/algorithms/veldisp.php#Top">[Back to top]</a></p>

<h2 id="method">Method</h2>

<p>A number of objective and accurate methods for making velocity
dispersion measurements have been developed (Sargent et al. 1977;
Tonry &amp; Davis 1979; Franx, Illingworth &amp; Heckman 1989; Bender 1990;
Rix &amp; White 1992).  These methods are all based on a comparison
between the spectrum of the galaxy whose velocity dispersion is to be
determined, and a fiducial spectral template. This can either be the
spectrum of an appropriate star, with spectral lines unresolved at the
spectra resolution being used, or a combination of different stellar
types, or a high S/N spectrum of a galaxy with known velocity
dispersion.</p>

<p>From DR1 to DR5, SDSS velocity dispersions were the average of a
result from direct-fitting and Fourier methods for measuring the
velocity dispersion.  From DR6, only the "Direct-fitting" method (<a
href="http://adsabs.harvard.edu/abs/1961ApJ...133..393B">Burbidge,
Burbidge &amp; Fish 1961</a>; <a
href="http://adsabs.harvard.edu/abs/1992MNRAS.254..389R">Rix &amp; White
1992</a>) is used. It finds the minimum of</p>
<p>&chi;<sup>2</sup> = sum { [G - B * S]<sup>2</sup> }</p>
<p>where G is the galaxy, S the star
and B is the gaussian broadening function (* denotes a convolution).
Although the Fourier space seems to be the natural choice to estimate
the velocity dispersions, there are several advantages to treating the
problem entirely in pixel space.  In particular, the effects of noise
are much more easily incorporated in the pixel-space based
"Direct-fitting" method which minimizes</p>
<p>&chi;<sup>2</sup> = sum { [G(n) - B(n,<var>sigma</var>) S(n)]<sup>2</sup>
/Var<sub>n</sub><sup>2</sup>}.</p>
<p>Because the S/N of the SDSS
spectra are relatively low, we assume that the observed absorption
line profiles in early-type galaxies are Gaussian. </p>

<p><a href="dr8/algorithms/veldisp.php#Top">[Back to top]</a></p>

<h2 id="bias">Correction of biases in veloctiy dispersions</h2>

<p>Due to changes in the spectroscopic reductions from the EDR to
later releases, a bias appeared in the veloctiy dispersion values
available in the CAS. As shown in <a
href="http://adsabs.harvard.edu/abs/2007AJ....133.1954B">Bernardi
(2007; Appendix A)</a>, &sigma; values in the DR5 do not match the
values used by <a
href="http://adsabs.harvard.edu/abs/2003AJ....125.1882B">Bernardi et
al. (2003; B03)</a>. The difference is small but systematic, with
spectro1d DR5 larger than B03 at &sigma; &le; 150 km/s. A similar bias
is seen when comparing spectro1d DR5 with measurements from the
literature (using the <a
href="http://leda.univ-lyon1.fr/">HyperLeda</a> database; Paturel et
al.  2003). Simulations similar to those in B03 show that the
discrepancy results from the fact that the Fourier-fitting method is
biased by &lt; 15% at low dispersions (~100 km/s), whereas the
direct-fitting method is not. We therefore use the direct-fitting
method only in DR6 and DR7. Below, we show comparisons of the spectro1d DR6
velocity dispersions with those from B03, DR5 and the <a
href="dr8/glossary.php#idlspec2d">specBS</a> measurements.
There is
good agreement between spectro1d DR6 and B03 (rms scatter ~ 7.5%), and
between spectro1d DR6 and specBS (rms scatter ~ 6.5%), whereas
spectro1d DR5 is clearly biased high at &sigma; &le; 150 km/s. The
agreement between spectro1d DR6 and specBS is not surprising, since
both are now based only on the direct-fitting method. The specBS
measurements tend to be slightly smaller than DR6 at &sigma; &le; 100
km/s; specBS is similarly smaller than HyperLeda, whereas DR6 agrees
with HyperLeda at these low dispersions.</p>

<table class="centerfigure">
<tr><td><img src="images/f8.jpg" alt="velocity dispersion" /></td></tr>
<tr><td>
Top panels: velocity dispersion measurements from B03
(left), DR5 (middle) and specBS (right) versus the spectro1d DR6
values for the sample of elliptical galaxies used in <a
href="http://adsabs.harvard.edu/abs/2003AJ....125.1817B">Bernardi et
al. (2003a)</a>. Bottom panels: The ratio of DR6 values to the other
three samples (i.e. B03, DR5, and specBS) versus the mean value
(<i>e.g.</i> left panel &sigma; = ( &sigma;DR6 + &sigma;B03 )/2).  The median value
at each value of &sigma; is shown as the red curve.</td></tr>
</table>


<p><a href="dr8/algorithms/veldisp.php#Top">[Back to top]</a></p>

<h2 id="templates">Velocity dispersion templates for download</h2>

<p>We offer the velocity dispersion templates for download here. There
are two sets of templates, 32 template stars (giant stars in M67)
which were used in the &quot;Fourier-fitting&quot; method prior to
DR6, and 7 principal component analysis (PCA) Eigentemplates used in
the &quot;Direct-fitting&quot; method. We offer the templates in two
formats:</p>

<ul>
  <li><p>An IDL save file <a
      href="binaries/veldisptemplates.sav">veldisptemplates.sav</a>. Save the
      file, and type <code>RESTORE, 'veldisptemplates.sav'</code> at
      the IDL prompt. The file includes:</p>
      <pre>
      EIG             DOUBLE    = Array[1944, 7]  -> flux of the PCA template
      EIGLAMBDA       FLOAT     = Array[1944]     -> wavelength of the PCA template
      STARFLUX        FLOAT     = Array[3918, 32] -> flux of the 32 M67 giant stars
      STARSIG         FLOAT     = Array[3918, 32] -> fluxerr
      STARWAVE        FLOAT     = Array[3918, 32] -> wavelength
      </pre>
  </li>
  <li><p>Two fits tables with the templates as a function of wavelength,
      one for each set:</p>
      <ul>
    <li><a href="binaries/eigtemplates.fits">eigtemplates.fits</a>, the PCA
        Eigentemplates</li>
    <li><a href="binaries/startemplates.fits">startemplates.fits</a>, the
        stellar templates</li>
      </ul>
  </li>
</ul>


<p><a href="dr8/algorithms/veldisp.php#Top">[Back to top]</a></p>

<h2 id="caveats">Caveats</h2>

<table class="figure">
<tr><td><a href="images/vdisp_errcomp.png"><img src="images/vdisp_errcomp_thumb.png" alt="velocity dispersion error" /></a></td></tr>
<tr><td>Error distribution of the velocity dispersion
measurements from spectro1d DR6 (thin black solid line), spectro1d DR5
(dotted red line), specBS (dashed blue line), and B03 (dotted-dashed
green line). The thick solid line was obtained by comparing repeated
measurements.</td></tr>
</table>

<p>The velocity dispersion measurements distributed with SDSS spectra
use template spectra convolved to a maximum sigma of 420
km/s. Therefore, velocity dispersion sigma &gt; 420 km/s are not
reliable and must not be used. The figure to the right shows the quality of
velocity dispersion error estimates.</p>


<p>We recommend the user to not use SDSS velocity dispersion
     measurements for:</p>
<ul>
   <li> spectra with median per-pixel S/N&lt; 10</li>
   <li> velocity dispersion estimates smaller than about 70 km s<sup>-1</sup>
      given the typical S/N and the instrumental resolution of the
      SDSS spectra</li>
</ul>
<p>Also note that the velocity dispersion measurements output by the
     SDSS spectro-1D pipeline are not corrected to a standard relative
     circular aperture.
     (The SDSS spectra measure the light within a fixed aperture of radius
      1.5 arcsec.  Therefore, the estimated velocity dispersions of more
      distant galaxies are affected by the motions of stars at larger
      physical radii than for similar galaxies which are nearby.  If the
      velocity dispersions of early-type galaxies decrease with radius,
      then the estimated velocity dispersions (using a fixed aperture) of
      more distant galaxies will be systematically smaller than those of
      similar galaxies nearby.)</p>

<p><a href="dr8/algorithms/veldisp.php#Top">[Back to top]</a></p>



<?php echo foot(); ?>
