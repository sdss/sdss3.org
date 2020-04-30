<?php include '../../header.php'; echo head('Galaxy Properties'); ?>

<div class="summary">
<p>Data Release 9 includes three different estimates for the stellar mass and velocity
dispersion estimators for galaxies. The three methods are described in this section.</p>

<p>The array of choices allows consistent comparisons with the literature and future surveys.
The proper method to use will depend on the scientific problem at hand, and should be
chosen carefully.</p>
</div>

<p>The <a href="dr9/spectro/pipeline.php">spectroscopic pipeline</a> initially
classifies all spectra without referring to any associated imaging data. That is,
a spectrally-observed object is classified by testing its spectrum against templates
for stars, galaxies, and quasars, regardless of why that object
was targeted for spectroscopic follow-up. However, in BOSS, we found that galaxy targets were often incorrectly matched
to quasar templates with unphysical fit parameters, (such as negative coefficients),
resulting in genuine galaxy absorption features being incorrectly fit to quasar
emission features. Thus, for galaxy targets in BOSS, the best classification and redshift are selected
<span class="term">only</span> from the fits to the galaxy and star templates. The
resulting quantities are listed with the suffix <code>_NOQSO</code> in the pipeline
outputs (<a href="http://adsabs.harvard.edu/abs/2012AJ....144..144B">Bolton <em>et&nbsp;al.</em> 2012</a>).  Results without this template restriction are also made available.</p>

<p>After the spectra are output from the spectroscopic pipeline, we additionally
compute a variety of derived quantities by applying stellar population models to
derive stellar masses, emission-line fluxes and equivalent widths, and gas kinematics and
stellar velocity dispersions (<a href="http://adsabs.harvard.edu/abs/2012MNRAS.421..314C">
Chen <em>et&nbsp;al.</em> 2012</a>, <a href="http://adsabs.harvard.edu/abs/2012arXiv1207.6114M">
Maraston <em>et&nbsp;al.</em> 2012</a>,
<a href="http://adsabs.harvard.edu/abs/2013MNRAS.431.1383T">Thomas
<em>et&nbsp;al.</em> 2013</a>).</p>

<p>Data Release 9 includes these derived quantities based on three stellar population
models. The <a href="dr9/algorithms/galaxy_mpa_jhu.php">MPA-JHU Galspec</a>
stellar population models are available for SDSS-I/-II galaxies, but have not been
run on BOSS galaxies.</p>

<p>The <a href="dr9/algorithms/galaxy_portsmouth.php#fitting">Portsmouth SED-fit Stellar
Masses</a>, the <a href="dr9/algorithms/galaxy_portsmouth.php#kinematics">Portsmouth
Stellar Kinematics and Emission Line Fluxes</a> and
<a href="dr9/algorithms/galaxy_wisconsin.php">Wisconsin (PCA) Galaxy Properties</a> are new
for Data Release 9, and are currently available only for
<a href="surveys/boss.php">BOSS</a> spectra. However,
<a href="http://adsabs.harvard.edu/abs/2012MNRAS.421..314C">Chen <em>et&nbsp;al.</em>
(2012)</a> and <a href="http://adsabs.harvard.edu/abs/2013MNRAS.431.1383T">Thomas
<em>et&nbsp;al.</em> (2013)</a> each found that a comparison of their respective techniques to the
MPA-JHU algorithm demonstrated consistent results for a set of SDSS
galaxies from Data Release 7.</p>

<p>Both the <a href="dr9/algorithms/galaxy_portsmouth.php">Portsmouth</a> and
<a href="dr9/algorithms/galaxy_wisconsin.php">Wisconsin</a> galaxy property computations have been applied to all objects that the spectroscopic pipeline classifies
as a galaxy with a reliable and positive definite redshift
(i.e. with <code>CLASS_NOQSO='galaxy' and ZWARNING_NOQSO=0 and
(Z_NOQSO &gt; Z_ERR_NOQSO &gt; 0)</code>
(<a href="http://adsabs.harvard.edu/abs/2012AJ....144..144B">Bolton <em>et&nbsp;al.</em> 2012</a>). A detailed comparison between
the Portsmouth SED-fit and the Wisconsin spectral PCA stellar masses is discussed in
Appendix A of <a href="http://adsabs.harvard.edu/abs/2012arXiv1207.6114M">Maraston
<em>et&nbsp;al.</em> (2012)</a>.</p>

<p>The three galaxy computations are described below. Click on their
names for a page giving further information.</p>


<h2>Galspec</h2>

<p>The <a href="dr9/algorithms/galaxy_mpa_jhu.php">Galspec</a> product
(<a href="http://adsabs.harvard.edu/abs/2003MNRAS.341...33K">Kauffmann
<em>et&nbsp;al.</em> 2003</a>, <a href="http://adsabs.harvard.edu/abs/2004MNRAS.351.1151B">Brinchmann
<em>et&nbsp;al.</em> 2004</a>, <a href="http://adsabs.harvard.edu/abs/2004ApJ...613..898T">Tremonti et
al. 2004</a>), provided by the Max Planck Institute for Astrophysics and the Johns
Hopkins University (MPA-JHU), introduced in Data Release 8 and is maintained for SDSS-I/II
galaxies, but is not available for SDSS-III BOSS spectra.</p>


<h2>Portsmouth SED-fit Stellar Masses</h2>

<p><a href="dr9/algorithms/galaxy_portsmouth.php#fitting">Portsmouth SED-fit stellar masses</a>
<a href="http://adsabs.harvard.edu/abs/2012arXiv1207.6114M">Maraston <em>et&nbsp;al.</em>
(2012)</a> are calculated using the BOSS spectroscopic redshift,
<code>Z_NOQSO</code> and <em>u,g,r,i,z</em> photometry by means of broad-band
spectral energy distribution (SED) fitting of stellar population models.


Separate
calculations are carried out with a passive template and a star-forming template,
and in each case for both
<a href="http://adsabs.harvard.edu/abs/1955ApJ...121..161S">Salpeter (1955)</a> and
<a href="http://adsabs.harvard.edu/abs/2001MNRAS.322..231K">Kroupa (2001)</a> initial
mass functions, and for stellar evolution with and without stellar mass loss.</p>

<p>Templates are based on
<a href="http://adsabs.harvard.edu/abs/2005MNRAS.362..799M">Maraston (2005)</a> and
<a href="http://adsabs.harvard.edu/abs/2009MNRAS.394L.107M">Maraston <em>et&nbsp;al.</em> (2009)</a>
for the star-forming and passive stellar population models, respectively, for the best-fit
spectral energy distribution model of
<a href="http://adsabs.harvard.edu/abs/2006ApJ...652...85M">Maraston <em>et&nbsp;al.</em> (2006)</a>.</p>

<p>In Data Release 9, internal galaxy reddening is not included in the fitting procedures,
in order not to underestimate stellar mass. Reddening for individual galaxies may, however,
be obtained via the Portsmouth emission-line flux calculations
<a href="http://adsabs.harvard.edu/abs/2013MNRAS.431.1383T">Thomas <em>et&nbsp;al.</em> (2013)</a>.</p>

<h2>Portsmouth Stellar Kinematics and Emission Line Fluxes</h2>

<p><a href="dr9/algorithms/galaxy_portsmouth.php#kinematics">Portsmouth Stellar Kinematics and Emission Line Fluxes</a>
(<a href="http://adsabs.harvard.edu/abs/2013MNRAS.431.1383T">Thomas <em>et&nbsp;al.</em> 2013</a>)
are based on the stellar population synthesis models of
<a href="http://adsabs.harvard.edu/abs/2011MNRAS.418.2785M">Maraston &amp; Str&ouml;mb&auml;ck (2011)</a>
applied to BOSS spectra using an adaptation of the publicly available Gas AND Absorption Line
  Fitting (GANDALF, <a href="http://adsabs.harvard.edu/abs/2006MNRAS.366.1151S">Sarzi <em>et&nbsp;al.</em> 2006</a>) and penalized PiXel
  Fitting (pPXF,
<a href="http://adsabs.harvard.edu/abs/2004PASP..116..138C">Cappellari &amp; Emsellem 2004</a>).</p>

<p><strong>Caveat</strong>: Please note that due to a bug in the DR9 version of the Portsmouth Stellar Kinematics and Emission Line Fluxes code, EW values need to be divided
by a factor (1+<var>z</var>) and Continuum Flux measurements need to be multiplied by a factor (1+<var>z</var>) before
being used. This will be corrected in the DR10 version.</p>

<h2>Wisconsin PCA-based Stellar Masses and Velocity Dispersions</h2>

<p><a href="dr9/algorithms/galaxy_wisconsin.php">Wisconsin stellar masses and velocity
dispersions</a> are derived from the optical rest-frame spectral region
(3700-5500 &Aring;) using a  principal component analysis (PCA) method
(<a href="http://adsabs.harvard.edu/abs/2012MNRAS.421..314C">Chen <em>et&nbsp;al.</em> 2012</a>).
The estimation is based on a library of model spectra generated using the
single stellar population models of
<a href="http://adsabs.harvard.edu/abs/2003MNRAS.344.1000B">Bruzal &amp; Charlot (2003)</a>,
assuming a <a href="http://adsabs.harvard.edu/abs/2001MNRAS.322..231K">Kroupa (2001)</a>
initial mass function, and with a broad range of star-formation histories,
metallicities, dust extinctions, and stellar velocity dispersions.</p>

<h2>Comparison</h2>

<p>The different stellar mass estimates for BOSS galaxies encompass calculations based
on different stellar population models
(Portsmouth, <a href="http://adsabs.harvard.edu/abs/2005MNRAS.362..799M">Maraston 2005</a>;
Wisconsin, <a href="http://adsabs.harvard.edu/abs/2003MNRAS.344.1000B">Bruzal &amp; Charlot 2003</a>),
different assumptions regarding galaxy star formation histories and reddening, as well as multiple
choices for the initial mass function and stellar-mass loss rates.</p>

<p>In addition, each method focuses on a different aspect of the available imaging and
spectroscopic data. The Portsmouth SED fitting focuses on broad-band colors and
BOSS redshifts, the Portsmouth emission-line fitting focuses on specific regions of
the spectrum that contain specific information on gas and stellar kinematics,
and the Wisconsin PCA analysis uses the rest-frame 3700-5500 &Aring; stellar continuum.</p>

<h2>REFERENCES</h2>

<!-- SDSS publication 87 -->
<p>Bolton, A. S., Schlegel, D. J., Aubourg, &Eacute;., Bailey, S., Bizyaev D.,
Bhardwaj, V., Brewington, H., Brownstein, J. R., Burles, S., Chen, Y.,
Dawson, K., Ebelke G., Eisenstein, D. J., Malanushenko, E., Malanushenko, V.,
Maraston, C., Myers, A. D., Olmstead, M. D., Oravetz, D., Padmanabhan N.,
Pan, K., Pâris, I., Percival, W. J., Petitjean, P., Ross, N. P.,
Schneider, D. P., Shelden A., Shu, Y., Simmons, A., Snedden, S.,
Strauss, M. A., Thomas. D., Tremonti, C. A., Wake, D. A., Weaver, B. A.,
Wood-Vasey, W. M., 2012, AJ, 144, 144, <a href="http://dx.doi.org/10.1088/0004-6256/144/5/144">doi:10.1088/0004-6256/144/5/144</a>.</p>

<p>Brinchmann, J., Charlot, S., White, S.D.M., Tremonti, C.A., Kauffmann, G.,
Heckman, T.M., &amp; Brinkmann, J., 2004, MNRAS,
<a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1365-2966.2004.07881.x/abstract">
doi:10.1111/j.1365-2966.2004.07881.x</a>.</p>

<p>Bruzal, G. &amp; Charlot, S., 2003, MNRAS, 344(4), 1000,
<a href="http://onlinelibrary.wiley.com/doi/10.1046/j.1365-8711.2003.06897.x/abstract">
doi:10.1046/j.1365-8711.2003.06897.x</a>.</p>

<p>Chen, Y.-M., <em>et&nbsp;al.</em> 2012, MNRAS, 421, 314,
<a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1365-2966.2011.20306.x/abstract">
doi:10.1111/j.1365-2966.2011.20306.x</a>.</p>

<p>Kauffmann, G., Heckman, T.M., White, S.D.M., Charlot, S., Tremonti, C.A.,
Brinchmann, J., Bruzal, G., Peng, E.W., Seibert, M., Bernardi, M., Blanton, M.,
Brikmann, J., Castander, F., Cs&aacute;bai, I., Fukugita, M.,
Ivezi&#263;, &#381;., Munn, J.A., Nichol, R.C., Padmanabhan, N., Thakar, A.R.,
Weinberg, D.H., &amp; York, D., 2003, MNRAS, 341(1), 33,
<a href="http://onlinelibrary.wiley.com/doi/10.1046/j.1365-8711.2003.06291.x/abstract">
doi:10.1046/j.1365-8711.2003.06291.x</a>.</p>

<p>Kroupa, P., 2001, MNRAS, 322(2), 231,
<a href="http://onlinelibrary.wiley.com/doi/10.1046/j.1365-8711.2001.04022.x/abstract">
doi:10.1046/j.1365-8711.2001.04022.x</a>.</p>

<p>Maraston, C., 2005, MNRAS, 362(3), 799,
<a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1365-2966.2005.09270.x/abstract">
doi:10.1111/j.1365-2966.2005.09270.x</a>.</p>

<p>Maraston, C., Daddi, E., Renzini, A., Cimatti, A., Dickinson, M., Papovich, C., Pasquali,
A., &amp; Pirzkal, N., 2006, ApJ, 652, 85,
<a href="http://iopscience.iop.org/0004-637X/652/1/85">doi:10.1086/508143</a>.</p>

<p>Maraston, C., Str&ouml;mb&auml;ck, G., Thomas, D., Wake, D.A., Nichol, R.C., 2009,
MNRAS Letters, 394(1), L107,
<a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1745-3933.2009.00621.x/abstract">
doi:10.1111/j.1745-3933.2009.00621.x</a>.</p>

<p>Maraston, C., Str&ouml;mb&auml;ck, G., 2011,
MNRAS Letters, 394(1), L107,
<a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1365-2966.2011.19738.x/abstract">
doi:10.1111/j.1365-2966.2011.19738.x</a>.</p>

<!-- SDSS publication 86 -->

<p id="maraston2012">Maraston, C., Pforr, J., Henriques, B., Thomas, D., Wake, D.,
Bundy, K., Skibba, R., Beifiori, A., Brownstein, J., Capozzi, D., Edmondson, E., &amp; Ross, N.,
2012, <a href="http://arxiv.org/abs/1207.6114">arXiv:1207.6114</a>, Submitted to MNRAS</p>

<p>Salpeter, E.E., 1955, ApJ, 121, 161, doi:10.1086/145971</p>

<!--<p>Thomas, D., Maraston, C., &amp; Johansson, J., 2011, MNRAS 412(4), 2183,
<a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1365-2966.2010.18049.x/abstract">doi:
10.1111/j.1365-2966.2010.18049.x</a>.</p>-->

<!-- SDSS publication 60 -->
<p>Thomas, D., Steele, O., Maraston, C., Johansson, J., Beifiori, A., Pforr, J., Str&ouml;mb&auml;ck,
G., Tremonti, C. A., Wake, D., Bizyaev, D., Bolton, A., Brewington, H., Brownstein, J. R., Comparat, J.,
Kneib, J.-P., Malanushenko, E., Malanushenko, V. , Oravetz, D., Pan, K., Parejko, J. K., Schneider, D. P.,
Shelden, A.,Simmons,  A., Snedden, S., Tanaka, M., Weaver,  B. A.,Yan, R., 2013,
MNRAS, 431(2), 1383.</p>

<p>Tremonti, C.A., Heckman, T.M., Kauffmann, G., Brinchmann, J., Charlot, S.,
White, S.D.M., Seibert, M., Peng, E.W., Schlegel, D.J., Uomoto, A.,
Fukugita, M., &amp; Brinkmann, J., 2004, ApJ, 613, 898,
<a href="http://iopscience.iop.org/0004-637X/613/2/898/">doi:10.1086/423264</a>.</p>


<?php echo foot(); ?>
