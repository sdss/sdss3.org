<?php include '../../header.php'; echo head('Galaxy Properties from the Granada Group'); ?>

<p><a href="dr10/spectro/galaxy.php"><b>[Back to main galaxy properties page]</b></a></p>

<h2 id="fitting">Spectro-Photometric Stellar Masses</h2>


<p>Photometric Stellar masses have been estimated by finding the best-fitting CSP templates
to the observed <var>ugriz</var> magnitudes of BOSS galaxies, with the
spectroscopic redshift determined by the BOSS pipeline. An extensive and adequate grid of templates
have been generated using the publicly available Flexible Stellar Population Synthesis code
(FSPS, <a href="http://adsabs.harvard.edu/abs/2009ApJ...699..486C">Conroy <em>et&nbsp;al.</em> 2009</a>).
FSPS is a flexible SPS package that allows the user to compute simple and composite stellar
populations for a range of IMFs and metallicities, and with a variety of
assumptions regarding the average properties of the stellar population,
star formation histories and dust attenuation prescriptions. The FSPS code
is publicly available <a href="http://people.ucsc.edu/~conroy/FSPS.html">here</a>.</p>

<p>The fit is carried out on extinction corrected model magnitudes that are scaled
to the <var>i</var>-band <a href="dr10/help/glossary.php#mag_cmodel">c-model magnitude</a>, <em>i.e.</em>:</p>

<pre>
mag_x = modelmag_x - extinction_x + (cmodelmag_i - modelmag_i),
</pre>

<p>where x denotes the photometric band (<var>ugriz</var>).</p>

<p>Below we describe our FSPS parent grid of templates, along with the 3 different configurations to which
our SPS fitting procedure is applied. These configurations are obtained by imposing very simple physically
plausible priors on different parameters of the parent grid. Note that these results have been so far vetted
on LOWZ and CMASS galaxies. For some ancilliary targets, which span a wider range of galaxy properties,
this FSPS grid might not be adequate.</p>

<h2>Grid of templates</h2>



<p>The FSPS parent grid comprises 1500 redshift slices within the interval 0.0 &lt; z  &lt; 1.5. For each redshift
bin (&Delta;z=0.001), we build a set of 84,000 &tau;-models with
varying SFH, metallicity and dust content. For each model, FSPS provides observed-frame AB magnitudes
in each of the SDSS bands. Here, the spectrum is normalized so that 1 solar mass of stars
is formed during the life span of the galaxy. Mass loss is taken into account.</p>



<p>In practice, 4 different stellar population properties are allowed for variation:</p>

<dl>
    <dt>Star formation history (SFH)</dt>
    <dd>We assume an exponentially declining SFH (&tau;-models) with 30 possible log-spaced values for the e-folding time, &tau;,
    within the range 0 &lt; &tau;(Gyr) &lt; 10. The SFH is assume to start at a look-back formation time t<sub>age</sub>.</dd>

    <dt>Look-back formation time (t<sub>age</sub>)</dt>
    <dd>We consider 20 different look-back formation times, t<sub>age</sub>, spanning a
    range  0 &lt; t<sub>age</sub>(Gyr) &lt; 13.7. A condition is always imposed that t<sub>age</sub> is smaller than the
    age of the Universe at the corresponding redshift of the galaxy, T<sub>Universe</sub>(z), <em>i.e.</em> t<sub>age</sub> &lt; T<sub>Universe</sub>(z).</dd>

    <dt>Metallicity</dt>
    <dd>We consider 7 different values within the range
    -0.49 &lt; log(Z/Z<sub>solar </sub>) &lt; 0.20, where Z<sub>solar</sub>=0.019.</dd>

    <dt>Dust attenuation</dt>
    <dd>The dust attenuation is modelled following the two-component prescription of
    <a href="http://adsabs.harvard.edu/abs/2000ApJ...539..718C">Charlot &amp; Fall (2000)</a>,
    with parameters &tau;<sub>1</sub> and &tau;<sub>2</sub> describing the attenuation around young
    and old stars, respectively. Following Charlot &amp; Fall (2000) and
    <a href="http://adsabs.harvard.edu/abs/2000ApJ...533..682C">Calzetti <em>et al.</em> (2000) </a>,
    we assume &tau;<sub>1</sub>=3&tau;<sub>2</sub> and we only consider &tau;<sub>2</sub> as an independent parameter.
    The grid comprises 15 linearly-space values spanning a range 0 &lt; &tau;<sub>2</sub> &lt; 0.75.</dd>
</dl>

<p>For a detailed discussion on the motivation for each prior see Montero-Dorta <em>et al.</em>
 (<i>in preparation</i>).</p>


<h2>Multiple configurations</h2>

<p>To the above grid we impose 2 different priors on the star formation:</p>

<dl>
    <dt>earlyform</dt>
    <dd>The lifetime of the galaxy (t<sub>age</sub>) is restricted by imposing
    a formation time for CMASS/low-z galaxies within 2 Gyr after the Big Bang.</dd>

    <dt>wideform</dt>
    <dd>Dust is allowed but the range in the t<sub>age</sub> parameter (look-back formation time)
    is extended to 2 &lt; t<sub>age</sub> (Gyr) &lt; T<sub>Universe</sub>(z).</dd>
</dl>

<p>For each of the 2 star formation scenarios, we consider the case of dust and nost and we assume 2 different IMFs - Kroupa and Salpeter - resulting
in a total of 8 different configurations.</p>

<table class="centerfigure">
<tr><td><img src="images/fsps_1.png" alt="Examples of SFHs" style="width:700px;" /></td></tr>
<tr><td>Figure 1: CMASS data and models in a d<sub>&perp;</sub> vs. (r-i) diagram for 6 different redshift bins </td></tr>
</table>

<p>In Figure 1, we illustrate how the models (grey points) and the data (black symbols)
distribute in a d<sub>&perp;</sub> vs. (r-i) diagram for 6 different redshift bins within the redshift range 0.4 &lt; z &lt; 0.7.
The data shown consist of a randomly selected sample of 2,000 CMASS galaxies and the error bars represent the
photometric errors. In each plot, the dashed line shows the d<sub>&perp;</sub> &gt; 0.55 demarcation.
The "krou_earlyform" configuration has been adopted here. Similar coverage is obtained with the rest of the configurations. </p>

<p>The WMAP 7 flat &Lambda;CDM cosmology with <var>H</var><sub>0</sub> = 70,
&Omega;<sub>m</sub> = 0.274, and &Omega;<sub>&Lambda;</sub> = 0.726.
(<a href="http://adsabs.harvard.edu/abs/2011ApJ...728..126W">White <em>et al.</em> 2011</a>)
is applied universally to each of the Portsmouth-Wisconsin-Granada computations by the BOSS Pipeline.</p>

<h2>DATA</h2>

<p> Data Release 10 was processed under GALAXY_VERSION v1_0.</p>
<p> Output is browsable via <a href="http://skyserver.sdss3.org/dr10/en/help/browser/browser.aspx">Catalog Archive Server (CAS) DR10 database</a> by selecting:</p>
<ul>
    <li><a href="http://skyserver.sdss3.org/dr10/en/help/browser/browser.aspx#&&history=description+stellarMassFSPSGranEarlyDust+U">Table stellarMassFSPSGranEarlyDust</a>.</li>
    <li><a href="http://skyserver.sdss3.org/dr10/en/help/browser/browser.aspx#&&history=description+stellarMassFSPSGranEarlyNoDust+U">Table stellarMassFSPSGranEarlyNoDust</a>.</li>
    <li><a href="http://skyserver.sdss3.org/dr10/en/help/browser/browser.aspx#&&history=description+stellarMassFSPSGranWideDust+U">Table stellarMassFSPSGranWideDust</a>.</li>
    <li><a href="http://skyserver.sdss3.org/dr10/en/help/browser/browser.aspx#&&history=description+stellarMassFSPSGranWideNoDust+U">Table stellarMassFSPSGranWideNoDust</a>.</li>
</ul>
<p> FITS output files are available from the
<a href="http://data.sdss3.org/datamodel/files/BOSS_GALAXY_REDUX/GALAXY_VERSION/">BOSS_GALAXY_REDUX/GALAXY_VERSION</a>
available at the SAS URL:
<a href="http://data.sdss3.org/sas/dr10/boss/spectro/redux/galaxy/v1_0">http://data.sdss3.org/sas/dr10/boss/spectro/redux/galaxy/v1_0</a>. </p>
<p>You may download data based on the <a href="http://data.sdss3.org/datamodel/files/BOSS_GALAXY_REDUX/GALAXY_VERSION/granada_fsps.html">Granada FSPS datamodel</a>
from:</p>
<p><b>krou_earlyform_dust:</b></p>
<ul>
    <li><a href="http://data.sdss3.org/sas/dr10/boss/spectro/redux/galaxy/v1_0/granada_fsps_krou_earlyform_dust-v5_5_12.fits.gz">granada_fsps_krou_earlyform_dust-v5_5_12.fits.gz</a> [BOSS DR10], </li>
    <li><a href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/galaxy/v1_0/granada_fsps-26.fits.gz">granada_fsps_krou_earlyform_dust-26.fits.gz</a> [SDSS DR8].</li>
</ul>
<p><b>krou_earlyform_nodust:</b></p>
<ul>
    <li><a href="http://data.sdss3.org/sas/dr10/boss/spectro/redux/galaxy/v1_0/granada_fsps_krou_earlyform_nodust-v5_5_12.fits.gz">granada_fsps_krou_earlyform_nodust-v5_5_12.fits.gz</a> [BOSS DR10], </li>
    <li><a href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/galaxy/v1_0/granada_fsps_krou_earlyform_nodust-26.fits.gz">granada_fsps_krou_earlyform_nodust-26.fits.gz</a> [SDSS DR8].</li>
</ul>
<p><b>krou_wideform_dust:</b></p>
<ul>
    <li><a href="http://data.sdss3.org/sas/dr10/boss/spectro/redux/galaxy/v1_0/granada_fsps_krou_wideform_dust-v5_5_12.fits.gz">granada_fsps_krou_wideform_dust-v5_5_12.fits.gz</a> [BOSS DR10], </li>
    <li><a href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/galaxy/v1_0/granada_fsps-26.fits.gz">granada_fsps_krou_wideform_dust-26.fits.gz</a> [SDSS DR8].</li>
</ul>
<p><b>krou_wideform_nodust:</b></p>
<ul>
    <li><a href="http://data.sdss3.org/sas/dr10/boss/spectro/redux/galaxy/v1_0/granada_fsps_krou_wideform_nodust-v5_5_12.fits.gz">granada_fsps_krou_wideform_nodust-v5_5_12.fits.gz</a> [BOSS DR10], </li>
    <li><a href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/galaxy/v1_0/granada_fsps_krou_wideform_nodust-26.fits.gz">granada_fsps_krou_wideform_nodust-26.fits.gz</a> [SDSS DR8].</li>
</ul>
<p><b>salp_earlyform_dust:</b></p>
<ul>
    <li><a href="http://data.sdss3.org/sas/dr10/boss/spectro/redux/galaxy/v1_0/granada_fsps_salp_earlyform_dust-v5_5_12.fits.gz">granada_fsps_salp_earlyform_dust-v5_5_12.fits.gz</a> [BOSS DR10], </li>
    <li><a href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/galaxy/v1_0/granada_fsps_salp_earlyform_dust-26.fits.gz">granada_fsps_salp_earlyform_dust-26.fits.gz</a> [SDSS DR8].</li>
</ul>
<p><b>salp_earlyform_nodust:</b></p>
<ul>
    <li><a href="http://data.sdss3.org/sas/dr10/boss/spectro/redux/galaxy/v1_0/granada_fsps_salp_earlyform_nodust-v5_5_12.fits.gz">granada_fsps_salp_earlyform_nodust-v5_5_12.fits.gz</a> [BOSS DR10], </li>
    <li><a href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/galaxy/v1_0/granada_fsps_salp_earlyform_nodust-26.fits.gz">granada_fsps_salp_earlyform_nodust-26.fits.gz</a> [SDSS DR8].</li>
</ul>
<p><b>salp_wideform_dust:</b></p>
<ul>
    <li><a href="http://data.sdss3.org/sas/dr10/boss/spectro/redux/galaxy/v1_0/granada_fsps_salp_wideform_dust-v5_5_12.fits.gz">granada_fsps_salp_wideform_dust-v5_5_12.fits.gz</a> [BOSS DR10], </li>
    <li><a href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/galaxy/v1_0/granada_fsps_salp_wideform_dust-26.fits.gz">granada_fsps_salp_wideform_dust-26.fits.gz</a> [SDSS DR8].</li>
</ul>
<p><b>salp_wideform_nodust:</b></p>
<ul>
    <li><a href="http://data.sdss3.org/sas/dr10/boss/spectro/redux/galaxy/v1_0/granada_fsps_salp_wideform_nodust-v5_5_12.fits.gz">granada_fsps_salp_wideform_nodust-v5_5_12.fits.gz</a> [BOSS DR10], </li>
    <li><a href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/galaxy/v1_0/granada_fsps-26.fits.gz">granada_fsps_salp_wideform_nodust-26.fits.gz</a> [SDSS DR8].</li>
</ul>

<h2>REFERENCES</h2>


<p>Calzetti, D.; Armus, L.; Bohlin, R. C.; Kinney, A. L.; Koornneef &amp; J.  Storchi-Bergmann, T., 2000, APJ, 533,
682 <a href="http://adsabs.harvard.edu/abs/2000ApJ...533..682C">
doi:10.1086/308692</a></p>

<p>Conroy, C.; Gunn, J. E. &amp; White, M., 2009, APJ, 699, 486
<a href="http://adsabs.harvard.edu/abs/2009ApJ...699..486C">
doi:10.1088/0004-637X/699/1/486</a></p>

<p>Charlot, S.; &amp; Fall, S. M., 2000, APJ, 539, 718
<a href="http://adsabs.harvard.edu/abs/2000ApJ...539..718C">
doi:10.1086/309250</a></p>

<p>Montero-Dorta A. D.; Brownstein J. R., Prada, F. (<i>in preparation</span>)</p>

<p>White, M.; Blanton, M.; Bolton, A.; Schlegel, D.; Tinker, J.; Berlind, A.; da Costa, L.; Kazin, E.; Lin, Y. T.; Maia, M.; McBride, C. K.; Padmanabhan, N.; Parejko, J.; Percival, W.; Prada, F.; Ramos, B.; Sheldon, E.; de Simoni, F.; Skibba, R.; Thomas, D.; Wake, D.; Zehavi, I.; Zheng, Z.; Nichol, R.; Schneider, D. P.; Strauss, M. A.; Weaver, B. A.; Weinberg, D. H. &amp; White, M.; &amp; 2011, APJ, 728, 126,
<a href="http://adsabs.harvard.edu/abs/2011ApJ...728..126W">
doi:10.1088/0004-637X/728/2/126</a></p>

<?php echo foot(); ?>
