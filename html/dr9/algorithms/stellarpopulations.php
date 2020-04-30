<?php include '../../header.php'; echo head('Stellar Populations Models'); ?>

<p>Jump to:</p>

<ul>
<li><a href="dr9/algorithms/stellarpopulations.php#fitting">Spectro-Photometric Model Fitting</a></li>
<li><a href="dr9/algorithms/stellarpopulations.php#kinematics">Emission Line Kinematics</a></li>
<li><a href="dr9/algorithms/stellarpopulations.php#PCA">Principal Component Analysis (PCA) Method</a></li>
</ul>

<h2 id="fitting">Spectro-Photometric Model Fitting</h2>

<p>The stellar population models of
<a href="http://adsabs.harvard.edu/abs/2005MNRAS.362..799M">Maraston (2005)</a> and
<a href="http://adsabs.harvard.edu/abs/2009MNRAS.394L.107M">Maraston <em>et&nbsp;al.</em> (2009)</a>
are used to perform
a best-fit to the observed <var>ugriz</var> magnitudes of BOSS galaxies with the
spectroscopic redshift determined by the BOSS pipeline, using an adaptation of
the <a href="http://webast.ast.obs-mip.fr/hyperz/">publicly available Hyper-Z code</a> of
<a href="http://adsabs.harvard.edu/abs/2000A%26A...363..476B">Bolzonella, Miralles &amp; Pelló (2000)</a>.
The fit is carried out on extinction corrected model magnitudes that are scaled
to the <var>i</var>-band <a href="dr9/help/glossary.php#mag_cmodel">c-model magnitude</a>, <em>i.e.</em>:</p>

<pre>
mag_x = modelmag_x - extinction_x + (cmodelmag_i - modelmag_i),
</pre>

<p>where x denotes the photometric band (<var>ugriz</var>).</p>

<p>Two sets of template spectra are used (see <a href="http://www.maraston.eu">Maraston <em>et&nbsp;al.</em> 2012</a> for details):</p>
<ol>
<li>a passively evolving galaxy with a two-component metallicity of same
age and no ongoing star formation or reddening, as in
<a href="http://adsabs.harvard.edu/abs/2009MNRAS.394L.107M">Maraston <em>et&nbsp;al.</em> (2009)</a>, </li>
<li> an ensemble of canonical star formation modes, including
exponentially-declining, constant with truncation, and constant, star
formation, for various timescales and various metallicities, as in
<a href="http://adsabs.harvard.edu/abs/2006ApJ...652...85M">Maraston <em>et&nbsp;al.</em> (2006)</a>.
In order to minimize the event of low-age, high-dust fake solutions,
reddening is not included (<a href="http://www.maraston.eu">Pforr, Maraston &amp; Tonini 2012 [submitted to MNRAS]</a>).
Both template sets are available for Salpeter and Kroupa initial mass functions. </li>
</ol>

<p>The output of the fit for each galaxy includes: age, star formation mode,
metallicity, k-corrected absolute magnitudes in <var>ugriz</var>, plus the
reduced χ<sup>2</sup>. Additionally, the best fit model spectrum as well
as the probability distribution function (PDF) for the stellar mass are provided.</p>

<p>Stellar masses and star formation rates are computed from the best-fit
SED as in <a href="http://adsabs.harvard.edu/abs/2006ApJ...652...85M">Maraston <em>et&nbsp;al.</em> (2006)</a>.
Furthermore the stellar mass at the median PDF and 68% confidence levels are provided.
Mass loss due to stellar evolution and the account of mass in stellar
remnants is included.</p>

<p>The algorithm assumes a &Lambda;CDM cosmology with <var>H</var><sub>0</sub> = 71.9,
&Omega;<sub>m</sub> = 0.258, and &Omega;<sub>&Lambda;</sub> = 0.742.</p>

<h2 id="kinematics">Emission Line Kinematics</h2>

<p>An adaptation of the publicly available Gas AND Absorption Line Fitting
(GANDALF, <a href="http://adsabs.harvard.edu/abs/2006MNRAS.366.1151S">Sarzi <em>et&nbsp;al.</em> 2006</a>)
and penalised PiXel Fitting (pPXF,
<a href="http://adsabs.harvard.edu/abs/2004PASP..116..138C">Cappellari &amp; Emsellem 2004</a>)
codes are used to fit the stellar population
synthesis models of <a href="http://adsabs.harvard.edu/abs/2011MNRAS.418.2785M">Maraston &amp; Strömbäck (2011)</a>
and <a href="http://adsabs.harvard.edu/abs/2011MNRAS.412.2183T">Thomas, Maraston &amp; Johansson (2011)</a>
to observed BOSS galaxy spectra. We chose these codes as GANDALF simultaneously
fits stellar templates and Gaussian emission-line models.</p>

<p>The stellar population synthesis models used were all at fixed solar
metallicity to limit computing time, utilised the MILES stellar library and
had age ranges from 6.5&nbsp;Myr to 11&nbsp;Gyr. Since we were not using this fit to
extract stellar population metallicities and ages, considering only solar
metallicity did not impact on our results and age-metallicity degeneracy
effects were unimportant. We adopted the MILES resolution calculated in
<a href="http://adsabs.harvard.edu/abs/2011A%26A...531A.109B">Beifiori <em>et&nbsp;al.</em> (2011)</a>.</p>

<p>Outputs from this fitting process that we are providing include
the emission-line fluxes (both observed and de-reddened) and
equivalent widths, the gas kinematics, the stellar kinematics,
an <var>E(B-V)</var> value and derived BPT classifications. Our reddening
values can be obtained by plugging the <var>E(B-V)</var> value for each
object into the dust attenuation equation of
<a href="http://adsabs.harvard.edu/abs/2000ApJ...533..682C">Calzetti <em>et&nbsp;al.</em> (2000)</a>.</p>

<p>Outputs from this fitting process that we are providing include the
emission-line fluxes (both observed and de-reddened) and equivalent widths,
the gas kinematics, the stellar kinematics, two <var>E(B-V)</var> values
(explained below), absorption line indices and derived BPT classifications.</p>

<p>A reduced χ<sup>2</sup> value is also provided for the fit, as well as
Amplitude-over-Noise (AoN) values for each of the emission lines.</p>

<h2 id="PCA">Principal Component Analysis (PCA) Method</h2>

<p><a href="http://adsabs.harvard.edu/abs/2012MNRAS.421..314C">Chen <em>et&nbsp;al.</em> (2012)</a>
model physical galaxy parameters based on a library of
model spectra for which principal components (PCs) have been identified.
The method is applied in the following steps.</p>

<h3>Create library of model spectra</h3>

<p>The library of model spectra is based on
<a href="http://adsabs.harvard.edu/abs/2003MNRAS.344.1000B">Bruzual &amp; Charlot (2003)</a>
stellar population synthesis models.  The model is parameterized by the
following characteristics.</p>

<dl>
    <dt>Star formation histories (SFHs)</dt>
    <dd>
        <p>Each SFH consists of three parts:
        an underlying continuous model + a series of super-imposed stochastic bursts
        + a random probability for star formation to stop exponentially
        (<em>i.e.</em> truncation). Figure 1 shows three examples of SFHs. The top panel
        is a continuous model, middle panel shows a continuous model with two
        random bursts, a truncation can be found in the bottom panel.</p>

        <table class="centerfigure">
        <tr><td><img src="images/pca_1.png" alt="Examples of SFHs" style="width:500px;" /></td></tr>
        <tr><td>Figure 1: Three different examples of SFHs.</td></tr>
        </table>
    </dd>
    <dt>Metallicity</dt>
    <dd>
        <p>95% of the model galaxies in the library are distributed
        uniformly in metallicity from 0.2 - 2.5 <var>Z</var><sub>☉</sub>;
        5% of the model galaxies are
        distributed uniformly between 0.02 and 0.2 <var>Z</var><sub>☉</sub>.</p>
    </dd>
    <dt>Dust extinction</dt>
    <dd>
        <p>Dust extinction is modelled using the two-component
        model described in <a href="http://adsabs.harvard.edu/abs/2000ApJ...539..718C">Charlot &amp; Fall (2000)</a>.
        The <var>V</var>-band optical depth has a
        Gaussian distribution over the range 0 &lt; &tau;<sub><var>V</var></sub> &lt; 6. with a
        peak at 1.2 and 68% of the total probability distribution distributed over
        the range 0~2. This prior distribution of &tau;<sub><var>V</var></sub> values is
        motivated by the observed distribution of Balmer decrements in SDSS spectra
        (<a href="http://adsabs.harvard.edu/abs/2004MNRAS.351.1151B">Brinchmann <em>et&nbsp;al.</em> 2004</a>).
        The fraction of the optical depth that affects
        stellar populations older than 0.01&nbsp;Gyr is parametrized as &mu;, which is
        again modeled as a Gaussian with a peak at &mu; = 0.3, and a 68 percentile range of 0.1~1.</p>
    </dd>
    <dt>Velocity dispersion</dt>
    <dd>
        <p>Each of the model spectra is convolved to a velocity that is uniformly
        distributed over the range of values from 75 to 400 km/s.</p>
    </dd>
</dl>

<h3>Principal components (PCs) are identified from the model library</h3>

<p>
The regions around nebular emission lines are masked in the model
spectra. We mask 500 km/s around the [OII]3726.03, [OII]3728.82,
H&zeta;3889.05, [NeIII]3869.06, H&delta;4101.73, H&gamma;4340.46, H&beta;4861.33,
[OIII]4959.91, and [OIII]5007.84&nbsp;&Aring; lines. Each spectrum in the masked
library is normalized to its mean flux between 3700-5500&nbsp;&Aring; (this is the
range we use for analysis). The mean spectrum of the masked library
is calculated and subtracted from each of the model spectra. </p>

<table class="centerfigure">
<tr><td><img src="images/pca_2.png" alt="Mean spectrum of model library and 7 eigenspectra" style="width:500px;" /></td></tr>
<tr><td>Figure 2: From top to bottom: the mean spectrum of the
model library followed by the first to seventh eigenspectra.</td></tr>
</table>

<p>
PCA code is run on the "residual" spectra. Figure 2 presents the mean
spectrum and the top seven PCs for the input model library.
</p>

<h3>Project BOSS data and models onto PCs</h3>

<p>
Figure 3 shows an example of projection. The black is the BOSS spectrum.
The red is the PCA fit, it is a linear combination of the mean spectrum and
the PCs, namely, fit = mean + <var>C</var><sub>1</sub>&nbsp;&times;&nbsp;PC<sub>1</sub> + <var>C</var><sub>2</sub>&nbsp;&times;&nbsp;PC<sub>2</sub> + &hellip; + <var>C</var><sub>7</sub>&nbsp;&times;&nbsp;PC<sub>7</sub>,
where <var>C</var><sub>&alpha;</sub> (&alpha; = 1&ndash;7) are the coefficients of the projection.
</p>

<table class="centerfigure">
<tr><td><img src="images/pca_3.png" alt="Projection example" style="width:500px;" /></td></tr>
<tr><td>Figure 3: An example of projection. The black is the BOSS spectrum. The red is the PCA fit.</td></tr>
</table>

<h3>Estimate galaxy physical parameters for BOSS</h3>

<p>
For an observed galaxy at redshift <var>z</var>, we select only models that have an
age smaller than the age of the universe at that redshift. We step through
the models one at a time, calculating the χ<sup>2</sup> as follows:
</p>

<table class="centerfigure">
<tr><td><img src="images/pca_4.png" alt="Chi2" /></td></tr>
<tr><td>Figure 4: χ<sup>2</sup> formula.</td></tr>
</table>

<p>where <var>C</var><sub>&alpha;</sub> (&alpha; = 1&ndash;7) represents the projection
coefficients. The superscript "m" and "d" refer to model and data. <var>i</var>
represents the <var>i</var>-th model. <var>P</var><sub>&alpha;,&alpha;&prime;</sub> is the inverse of the
covariance matrix of <var>C</var><sub>&alpha;</sub>. The covariance matrix of <var>C</var><sub>&alpha;</sub>
is calculated in the projection process.
</p>

<?php echo foot(); ?>
