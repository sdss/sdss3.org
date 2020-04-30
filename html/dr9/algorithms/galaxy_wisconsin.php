<?php include '../../header.php'; echo head('Galaxy Properties from the Wisconsin Group'); ?>

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
        uniformly in metallicity from 0.2 - 2.5 <var>Z</var><sub>&#9737;</sub>;
        5% of the model galaxies are
        distributed uniformly between 0.02 and 0.2 <var>Z</var><sub>&#9737;</sub>.</p>
    </dd>
    <dt>Dust extinction</dt>
    <dd>
        <p>Dust extinction is modeled using the two-component
        model described in <a href="http://adsabs.harvard.edu/abs/2000ApJ...539..718C">Charlot &amp; Fall (2000)</a>.
        The <var>V</var>-band optical depth has a
        Gaussian distribution over the range 0 &lt; &tau;<sub><var>V</var></sub> &lt; 6. with a
        peak at 1.2 and 68% of the total probability distribution distributed over
        the range 0~2. This prior distribution of &tau;<sub><var>V</var></sub> values is
        motivated by the observed distribution of Balmer decrements in SDSS spectra
        (<a href="http://adsabs.harvard.edu/abs/2004MNRAS.351.1151B">Brinchmann <em>et&nbsp;al.</em> 2004</a>).
        The fraction of the optical depth that affects
        stellar populations older than 0.01&nbsp;Gyr is parameterized as &mu;, which is
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
is calculated in the projection process.</p>

<p>A weight <em>w<sub>i</sub></em> = exp(<em>-&chi;<sub>i</sub><sup>2</sup>/2</em>) is defined to describe the similarity between the 
given galaxy and model <em>i</em>. A probability distribution function (PDF) is then 
built for each parameter <em>P</em>, by looping over all the model galaxies in 
the library and by summing the weights <em>w<sub>i</sub></em>  at the value of <em>P</em> for 
each model. The final PDF is normalized, and the parameter values at the 2.5, 16, 
50 (median), 84 and 97.5 percentiles of the cumulative PDF are calculated. The 
median is adopted as the nominal estimation of <em>P</em> and the <em>16 - 84</em> 
percentile range of the PDF as its  &plusmn;1&sigma; confidence interval.</p>


<?php echo foot(); ?>
