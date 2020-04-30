<?php include '../../header.php'; echo head('Galaxy Properties'); ?>

<div class="summary">
<p>Data Release 10 includes three different estimates for the stellar mass and velocity
dispersion estimators for galaxies, plus a legacy set of estimates run
on only the DR8 spectra. The four methods are described in
this section, and more details are available at the following
locations:</p>

        <ul>
            <li><a href="dr10/spectro/galaxy_portsmouth.php">Portsmouth group [Spectro-photometric]</a></li>
            <li><a href="dr10/spectro/galaxy_wisconsin.php">Wisconsin group [Principal Component Analysis]</a></li>
            <li><a href="dr10/spectro/galaxy_granada.php">Granada group [Flexible Stellar Population Synthesis]</a></li>
            <li><a href="dr10/spectro/galaxy_mpajhu.php">MPA-JHU group [GalSpec]</a> (for DR8 data)</li>
        </ul>

<p>The array of choices allows consistent comparisons with the literature and future surveys.
The proper method to use will depend on the scientific problem at hand, and should be
chosen carefully.</p>
</div>

<p>The <a href="dr10/spectro/pipeline.php">spectroscopic pipeline</a> initially
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

<p>Data Release 10 includes these derived quantities based on three methods, plus a legacy set of determinations that was originally released in DR8 and is  included here for completeness.</p>

<p>The <a href="dr10/spectro/galaxy_portsmouth.php#fitting">Portsmouth SED-fit Stellar
Masses</a>, the <a href="dr10/spectro/galaxy_portsmouth.php#kinematics">Portsmouth
Stellar Kinematics and Emission Line Fluxes</a> and
<a href="dr10/spectro/galaxy_wisconsin.php">Wisconsin (PCA) Galaxy Properties</a> have been
available since <a href="dr9/">DR9</a>. The <a href="dr10/spectro/galaxy_granada.php">Granada SED-fit Stellar Masses based on FSPS</a> are new for Data Release 10. Each of these products is currently available only for
<a href="surveys/boss.php">BOSS</a> spectra. However, <a href="http://adsabs.harvard.edu/abs/2012arXiv1207.6114M">Maraston <em>et&nbsp;al.</em> (2012)</a> and <a href="http://adsabs.harvard.edu/abs/2013MNRAS.431.1383T">Thomas
<em>et&nbsp;al.</em> (2013)</a> each found that a comparison of their respective techniques to the
MPA-JHU algorithm demonstrated consistent results for a set of SDSS
galaxies from Data Release 7.</p>

<p>The <a href="dr10/spectro/galaxy_portsmouth.php">Portsmouth</a>,
<a href="dr10/spectro/galaxy_wisconsin.php">Wisconsin</a> and <a href="dr10/spectro/galaxy_granada.php">Granada</a> galaxy property computations have been applied to all objects that the spectroscopic pipeline classifies
as a galaxy with a reliable and positive definite redshift
(i.e. with <code>CLASS_NOQSO='galaxy' and ZWARNING_NOQSO=0 and
(Z_NOQSO &gt; Z_ERR_NOQSO &gt; 0)</code>
(<a href="http://adsabs.harvard.edu/abs/2012AJ....144..144B">Bolton <em>et&nbsp;al.</em> 2012</a>). A detailed comparison between
the Portsmouth SED-fit and the Wisconsin spectral PCA stellar masses is discussed in
Appendix A of <a href="http://adsabs.harvard.edu/abs/2012arXiv1207.6114M">Maraston
<em>et&nbsp;al.</em> (2012)</a>.</p>

<p>The three galaxy computations are described below. Click on their
names for a page giving further information.</p>


<h2>Portsmouth SED-fit Stellar Masses</h2>

<p><a href="dr10/spectro/galaxy_portsmouth.php#fitting">Portsmouth SED-fit stellar masses</a>
(<a href="http://adsabs.harvard.edu/abs/2012arXiv1207.6114M">Maraston <em>et&nbsp;al.</em>
(2012</a>) are calculated using the BOSS spectroscopic redshift,
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

<p>In Data Release 10, internal galaxy reddening is not included in the fitting procedures,
in order not to underestimate stellar mass. Reddening for individual galaxies may, however,
be obtained via the Portsmouth emission-line flux calculations
<a href="http://adsabs.harvard.edu/abs/2013MNRAS.431.1383T">Thomas <em>et&nbsp;al.</em> (2013)</a>.</p>

<h2>Portsmouth Stellar Kinematics and Emission Line Fluxes</h2>

<p><a href="dr10/spectro/galaxy_portsmouth.php#kinematics">Portsmouth Stellar Kinematics and Emission Line Fluxes</a> (<a href="http://adsabs.harvard.edu/abs/2012arXiv1207.6115T">Thomas <em>et&nbsp;al.</em> 2012</a>),
  are based on the stellar population synthesis
  models of <a href="http://adsabs.harvard.edu/abs/2011MNRAS.418.2785M">Maraston &amp;
Str&ouml;mb&auml;ck (2011)</a>
  applied to BOSS spectra using an
  adaptation of the publicly available Gas AND Absorption Line
  Fitting (GANDALF, <a href="http://adsabs.harvard.edu/abs/2006MNRAS.366.1151S">Sarzi <em>et&nbsp;al.</em> 2006</a>) and penalized PiXel
  Fitting (pPXF,
<a href="http://adsabs.harvard.edu/abs/2004PASP..116..138C">Cappellari &amp; Emsellem 2004</a>).</p>

<h2>Wisconsin PCA-based Stellar Masses and Velocity Dispersions</h2>

<p><a href="dr10/spectro/galaxy_wisconsin.php">Wisconsin stellar masses and velocity
dispersions</a> are derived from the optical rest-frame spectral region
(3700-5500 &Aring;ngstroms) using a  principal component analysis (PCA) method
(<a href="http://adsabs.harvard.edu/abs/2012MNRAS.421..314C">Chen <em>et&nbsp;al.</em> 2012</a>).
The estimation is based on a library of model spectra generated using the
single stellar population models of
<a href="http://adsabs.harvard.edu/abs/2003MNRAS.344.1000B">Bruzal &amp; Charlot (2003)</a>,
assuming a <a href="http://adsabs.harvard.edu/abs/2001MNRAS.322..231K">Kroupa (2001)</a>
initial mass function, and with a broad range of star-formation histories,
metallicities, dust extinctions, and stellar velocity dispersions.</p>

<h2>Granada FSPS Stellar Masses</h2>

<p><a href="dr10/spectro/galaxy_granada.php">Granada FSPS stellar masses</a> (Montero-Dorta <em>et&nbsp;al.</em>
(<i>in preparation</i>))
  are calculated using the BOSS spectroscopic redshift,
<code>Z_NOQSO</code> and <em>u,g,r,i,z</em> photometry by means of broad-band
spectral energy distribution (SED) fitting of models based on a Flexible Stellar Population Synthesis (FSPS, <a href="http://adsabs.harvard.edu/abs/2009ApJ...699..486C">Conroy <em>et&nbsp;al.</em> 2009</a>) grid of templates.  The flexibility of the model templates allows for a variety of formation-time scenarios including <em>early</em> formation-time (with and without dust), and a <em>wide</em> range of formation times. Calculations have been carried out for both
<a href="http://adsabs.harvard.edu/abs/1955ApJ...121..161S">Salpeter (1955)</a> and
<a href="http://adsabs.harvard.edu/abs/2001MNRAS.322..231K">Kroupa (2001)</a> initial
mass functions. </p>

<h2>MPA-JHU Stellar Masses (for DR8 spectra only)</h2>

<p>For DR8 galaxy spectra (virtually all of which were in DR7 too) we
provide the <a href="dr10/spectro/galaxy_mpajhu.php">galSpec galaxy
properties from MPA-JHU</a>.  These properties are deprecated in DR10
in favor of the Wisconsin, Portsmouth, and Granada team analyses of
the same data, but are provided in DR10 for comparison with the other
galaxy property measurements listed here.</p>

<h2>Comparison</h2>

<p>The different stellar mass estimates for BOSS galaxies encompass calculations based
on different stellar population models
(Portsmouth, <a href="http://adsabs.harvard.edu/abs/2005MNRAS.362..799M">Maraston 2005</a>;
Wisconsin, <a href="http://adsabs.harvard.edu/abs/2003MNRAS.344.1000B">Bruzal &amp; Charlot 2003</a>;
Granada FSPS, <a href="http://adsabs.harvard.edu/abs/2009ApJ...699..486C">Conroy <em>et&nbsp;al.</em> 2009</a>),
different assumptions regarding galaxy star formation histories and reddening, as well as multiple
choices for the initial mass function and stellar-mass loss rates.</p>

<p>In addition, each method focuses on a different aspect of the available imaging and
spectroscopic data. The Portsmouth and the Granada FSPS SED fitting focuses on broad-band colors and
BOSS redshifts, the Portsmouth emission-line fitting focuses on specific regions of
the spectrum that contain specific information on gas and stellar kinematics,
and the Wisconsin PCA analysis uses the rest-frame 3700-5500 &Aring; stellar continuum.</p>

<p>The WMAP 7 flat &Lambda;CDM cosmology with <var>H</var><sub>0</sub> = 70,
&Omega;<sub>m</sub> = 0.274, and &Omega;<sub>&Lambda;</sub> = 0.726. (<a href="http://adsabs.harvard.edu/abs/2011ApJ...728..126W">White <em>et al.</em> 2011</a>) is applied universally to each of the Portsmouth-Wisconsin-Granada computations by the BOSS Pipeline.</p>


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

<p>Bruzal, G. &amp; Charlot, S., 2003, MNRAS, 344(4), 1000,
<a href="http://onlinelibrary.wiley.com/doi/10.1046/j.1365-8711.2003.06897.x/abstract">
doi:10.1046/j.1365-8711.2003.06897.x</a>.</p>

<p>Chen, Y.-M., <em>et&nbsp;al.</em> 2012, MNRAS, 421, 314,
<a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1365-2966.2011.20306.x/abstract">
doi:10.1111/j.1365-2966.2011.20306.x</a>.</p>

<p>Conroy, C.; Gunn, J. E. &amp; White, M., 2009, APJ, 699, 486
<a href="http://adsabs.harvard.edu/abs/2009ApJ...699..486C">
doi:10.1088/0004-637X/699/1/486</a>. </p>

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

<p>Montero-Dorta, A. D.; Brownstein, J. R; Prada, F. (in preparation)</p>

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

<p>White, M.; Blanton, M.; Bolton, A.; Schlegel, D.; Tinker, J.; Berlind, A.; da Costa, L.; Kazin, E.; Lin, Y. T.; Maia, M.; McBride, C. K.; Padmanabhan, N.; Parejko, J.; Percival, W.; Prada, F.; Ramos, B.; Sheldon, E.; de Simoni, F.; Skibba, R.; Thomas, D.; Wake, D.; Zehavi, I.; Zheng, Z.; Nichol, R.; Schneider, D. P.; Strauss, M. A.; Weaver, B. A.; Weinberg, D. H. &amp; White, M.; &amp; 2011, APJ, 728, 126,
<a href="http://adsabs.harvard.edu/abs/2011ApJ...728..126W">
doi:10.1088/0004-637X/728/2/126</a></p>

<?php echo foot(); ?>
