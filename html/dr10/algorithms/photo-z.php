<?php include '../../header.php'; echo head('Photometric Redshifts'); ?>

<p>
Data Release 10 includes photometric redshift estimations for all galaxies. As
with previous releases, we provide two alternative versions. This page
summarizes the methods used to calculate the photometric redshift estimates,
with details to follow in a paper in preparation by Istvan Csabai.
</p>

<p>
One method is similar to the one used in Data Release 7; following the name used
in <a href="http://adsabs.harvard.edu/abs/2007AN....328..852C">Csabai et al.  (2007)</a>,
we refer to it as a kd-tree nearest neighbor fit (KF). The KF estimates are stored in
the table <em>Photoz</em>. The other technique, described in
<a href="http://adsabs.harvard.edu/abs/2010ApJ...712..511C">Carliles et al. (2010)</a>, is
based on random forests (RF). The RF estimates are stored in the table <em>PhotozRF</em>.
</p>

<p>
Both methods are empirical in the sense that they use a training set as a reference, then
apply machine learning techniques to estimate redshifts. The training sets contain
photometric and spectroscopic observations for galaxies. We have chosen to use machine
learning techniques with training sets, as opposed to template fitting methods,
because of the machine learning techniques' higher overall precision.
</p>

<p>
To infer values of physical parameters of galaxies, such as k-corrections, spectral type, and
various spectral features, we extend both the KF and RF methods with a template fitting estimator
similar to the one described in
<a href="http://adsabs.harvard.edu/abs/2003AJ....125..580C">Csabai et al. (2003)</a>;
(the approach used in DR5 and DR6).  We also used the colors and inclination angle
(expAB_r in the PhotoObj table) of each galaxy. Although using inclination angle does not
significantly improve the overall estimation, as described in
<a href="http://adsabs.harvard.edu/abs/2011ApJ...730...54Y">Yip et al. (2011)</a>
it does remove a systematic bias.
</p>

<p>
The training set contains more than 850,000 galaxies from the DR8 spectroscopic
catalog (average r magnitude 17.3), and an additional 14,000 galaxies from
other spectroscopic redshift surveys that include deeper (up to redshift of 1) and fainter
(average r magnitude 20.75) galaxies. The RMS of the estimation
errors for the two parts of the training set are 0.018 and 0.103, respectively.
The more than fivefold increase of error for the faint subset is mostly due to
the larger photometric errors.
</p>

<p>
The error statistics for the reference set is not always good indicator for
the error of the estimated redshifts, especially when the objects are at distant parts
of the magnitude space where the photometric error characteristics are different
than that of the reference set. Fortunately both KF and RF provide an explicit estimate
of the redshift errors (zErr) and we have found this estimate to be reliable and unbiased.
We suggest the users of this catalog to take into account these values when using
the photometric redshifts in their analysis.
</p>

<p>
The KF method provides some additional parameters that can be useful for quality assurance.
For each galaxy in the <em>photoZ</em> table, nnCount is the number of nearest neighbors,
after removing outliers. A value much smaller than 100 indicates poor training set coverage
for that galaxy. The parameter nnInside is another indication of the training set coverage;
nnInside=0 indicates that the galaxy is outside of this box in color space, and so outside
of the training set coverage. Similarly, the parameter nnVol warns that reference set is
only very sparsely populated around that galaxy. Although the spectroscopic redshift of
the nearest object (nnSpecz) and the average nearest neighbor redshift (nnAvgZ) is not
as good estimator as the fitted redshift (z), significantly different values might indicate large
errors. Note that in all the related tables instead of NULL value we use large negative values (&lt;= -1000)
to indicate that the estimation was not possible for some reason.
</p>

<p>
When the photometric redshift of each galaxy is estimated, template fitting is used to estimate the galaxy's
k-correction, distance modulus, absolute magnitudes, rest frame colors, and spectral type.
The non-negative linear combination (NNLS) of spectral model templates is searched
for which synthetic colors, calculated by the convolution with the filter transmission curves matched to
the observed colors at the best at the redshifts given by the KF or RF estimator.
To improve the accuracy of the k-correction and synthetic magnitude estimations,
slightly different filter transmission curves were used for each camera column, respectively.
Where applicable, Omega=0.3, Lambda=0.7 cosmology was assumed, where the unit of the luminosity distance is Mpc/h.
Chisq and rnorm values indicate the quality of the NNLS fit and nTemplates give the
number of spectral templates used for fitting. Spectral templates described in
<a href="http://adsabs.harvard.edu/abs/2005MNRAS.362..799M">Maraston (2005)</a> were used for NNLS.
The value of parameter nTemplates shows the number of templates with which the method could reconstruct the observed photometry of
the given object. If nTemplates is a small positive value, one can check the coefficients and templates based on the
information in the related <em>PhotozTemplateCoeff</em> and <em>PhotozRFTemplateCoeff</em> tables for the KF and RF
estimations, respectively. Note that a nTemplates=0 indicates a failed fit; on the other hand, nTemplates=5 is sign of overfitting.
</p>

<p>
An example of how to query for photometric redshifts in DR10 data is shown in SkyServer at
<a href="http://skyserver.sdss3.org/dr10/en/help/docs/realquery.aspx#photoz">Sample Queries: Photometric Redshifts</a>.
</p>

<!--

<h1 id="Top">Photometric Redshift Distributions</h1>

<h2 id="weights">Redshift Distributions Derived Using the Weighting Method</h2>




<p>Photometric redshifts use fluxes, colors (and in general possibly
other imaging parameters) to infer approximate redshifts.
<a href="http://adsabs.harvard.edu/abs/2008MNRAS.390..118L">Lima et al. 2008</a>
and
<a href="http://adsabs.harvard.edu/abs/2009MNRAS.396.2379C">Cunha et
al. 2009</a> describe the "weighting method" of performing this
task. In our results, we do not report a single "best fit" photometric
redshift, as is commonly done, but instead a probability distribution
for the redshift of each object. </p>

<p>
This "weighting method" derives weights for a training set of spectroscopically confirmed
galaxies such that the distribution of relevant quantities, such as magnitudes
or colors, matches that of a secondary set of galaxies without known redshifts.
Assuming these quantities correlate with redshift, and are the only relevant
quantities for redshift determination, the resulting weighted redshift
histogram is proportional the redshift distribution <code>N(z)</code>
of the secondary sample.  This method is also used to predict the
redshift probability distribution <code>p(z)</code> for individual
galaxies.  </p>

<p>
Both the overall redshift distribution <code>N(z)</code> and the
individual <code>p(z)</code> for a set of well-measured galaxies
will be available for download. We have a more detailed description
of the catalog generation in Sheldon et al. (2011, in preparation).
</p>

THIS WAS ALREADY COMMENTED OUT WHEN JORDAN COMMENTED OUT THE REST!!!!!!!!!!!!

<p>
Both the overall redshift distribution <code>N(z)</code> and the
individual <code>p(z)</code> for a set of well-measured galaxies are
<a href="TODO.php">available for download</a>. We have a more detailed description
of the catalog generation in <a href="TODO.php">Sheldon et al. (2011)</a>.
</p>


<h2> OTHER ALGORITHMS </h2>

<p>As described in the DR5 paper, the SDSS makes available the results of
two different photometric redshift determinations for galaxies, one based
on neural nets and the other based on a template-fitting approach.
</p>

<p>Jump to:</p>

<p>
<a href="dr10/algorithms/photo-z.php#nn">[Photo-z with Neural Nets]</a>&nbsp;  <a href="dr10/algorithms/photo-z.php#hybrid">[Photo-z with Hybrid Technique]</a>&nbsp;

</p>

<hr />

<h2  id="nn">Photometric Redshifts with Neural Nets</h2>

<p>
The neural net solutions for photometric redshifts and their errors (listed as
<tt>Photoz2</tt> in the CAS, and described in
<a href="http://adsabs.harvard.edu/abs/2008ApJ...674..768O">Oyaizu et al. 2008</a>) have
not changed since DR6, and do not use the ubercalibrated magnitudes.
However, we now provide a value-added catalog containing the redshift
probability distribution for each galaxy, p(z), calculated using the
weights method presented in

<a href="http://adsabs.harvard.edu/abs/2008arXiv0810.2991C">Cunha et al. (2008)</a>.
The p(z) for each
galaxy in the catalog is the weighted distribution of the
spectroscopic redshifts of the 100 nearest training-set galaxies in
the space of dereddened model colors and r magnitude.  For the p(z)
calculation we also added the zCOSMOS
(<a href="http://adsabs.harvard.edu/abs/2007ApJS..172...70L">Lilly et al. 2007</a>) and
DEEP2-EGS
(<a href="http://adsabs.harvard.edu/abs/2007ApJ...660L...1D">Davis et al. 2007</a>)
galaxies to the spectroscopic training
set used for the <tt>Photoz2</tt> solution.

<p>
<a href="http://adsabs.harvard.edu/abs/2008arXiv0810.2991C">Cunha et al. (2008)</a>
showed that summing the p(z) for a sample of
galaxies yields a better estimation of their true redshift
distribution than that of the individual photometric redshifts.
<a href="http://adsabs.harvard.edu/abs/2008MNRAS.386..781M">Mandelbaum et al. (2008)</a>
found that this gives significantly smaller
photometric lensing calibration bias than the use of a single photometric redshift
estimate for each galaxy.

<p><a href="dr10/algorithms/photo-z.php#Top">[Back to top]</a></p>
<h2 id="hybrid">Photometric Redshifts: A New Hybrid Technique</h2>

<p>
With DR7, we have made substantial improvements in the other
photometric redshift code (<tt>Photoz</tt>), using a hybrid method
that combines the template fitting approach of
<a href="http://adsabs.harvard.edu/abs/2003AJ....125..580C">Csabai et al. (2003)</a>;
i.e., the approach used in DR5 and DR6, and an empirical calibration
using objects with both observed colors and spectroscopic redshifts.
We summarize the method briefly here, with details to follow in a
paper in preparation.

<p>
The spectroscopic sample of SDSS contains over 900,000
spectroscopically confirmed galaxies, and the combination of the main
sample
(<a href="http://adsabs.harvard.edu/abs/2002AJ....124.1810S">Strauss et al. 2001</a>),
the LRG sample
(<a href="http://adsabs.harvard.edu/abs/2001AJ....122.2267E">Eisenstein et al. 2001</a>)
and special plates targeted at fainter blue galaxies (DR4 paper) more
or less cover the whole color region in which galaxies lie to the
depths of SDSS.  Thus we use the DR7 spectroscopic set as a reference
set for redshift estimation without any additional data from synthetic
spectra.

<p>
The estimation method uses a k-d tree (following
<a href="http://adsabs.harvard.edu/abs/2007AN....328..852C">Csabai et al.  2007</a>)
to search in the ubercalibrated u-g, g-r, r-i, i-z color space for the
100 nearest neighbors of every object in the estimation set (i.e. the
galaxies for which we want to estimate redshift) and then estimates
redshift by fitting a local hyperplane to these points, after
rejecting outliers.  If an object lies outside the bounding box of the
100 nearest neighbors in color space, the photometric redshift is less
reliable, and the object is flagged accordingly.


<p>
We use template fitting to estimate the K-correction, distance
modulus, absolute magnitudes, rest frame colors, and spectral type.
We search for the best match of the measured colors and the synthetic
colors calculated from repaired
(<a href="http://adsabs.harvard.edu/abs/2000AJ....120.1588B">Budavari et al. 2000</a>)
empirical
template spectra at the redshift given by the local nearest neighbor
fit.

<p>
We have found that the mean deviations of the redshifts from the
best-fit hyperplane is a good estimate of the error.  That, together
with the flag indicating whether an object lies outside the bounding
box of its neighbors, and the difference between the estimated
photometric redshift and the average redshift of its neighbors, can be
used to select objects with reliable photometric redshift values.

<p>
The rms error of the redshift estimation for the reference set
decreases from 0.044 in DR6 to 0.025 in DR7 with this improved
algorithm:


<table class="centerfigure">
<tr><td><a href="images/dr7-fig5.png"><img src="images/dr7-fig5.png" alt="velocity dispersion" width="576" height="360"></a></td></tr>
<tr><td>The template-based estimated redshifts versus the true spectroscopic redshifts for a
random sample of 30,000 galaxies with redshifts from SDSS. The
estimated values calculated with the old (DR6) method has
significantly larger scatter and more outliers than the ones with the
new hybrid (DR7) technique. Note that the sample is dominated by red
galaxies (whose photometric redshifts are intrinsically easier to
measure) at z &gt; 0.2.</td></tr>
</table>


<br><br>
<p>
Iteratively removing the outliers beyond 3 &sigma; gives rms errors of
0.028 and 0.020 for the old and new methods, respectively. In
addition, the reliability of the quoted errors is much higher.



<hr />
<p id="footnotes"><font size="-2">*Text and figures on this page come from an author-created, un-copyedited
version of the SDSS Data Release 7 paper, an article [accepted for publication in] submitted
to <i>Astrophysical Journal Supplements</i>. IOP Publishing Ltd is not responsible for any errors
or omissions in this version of the manuscript or any version derived from it. [The definitive publisher authenticated version
is available online at [insert DOI].] <a href="http://adsabs.harvard.edu/abs/2009ApJS..182..543A">A preprint of the
DR7 paper</a> is available from the arXiv preprint server.</font></p>



<p><a href="dr10/algorithms/photo-z.php#Top">[Back to top]</a></p>

-->

<?php echo foot(); ?>
