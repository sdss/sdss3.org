<?php include '../../header.php'; echo head('Galaxy Properties from the Portsmouth Group'); ?>

<p><a href="dr9/algorithms/galaxy.php"><b>[Back to main galaxy properties page]</b></a></p>

<p>Jump to:</p>

<ul>
<li><a href="dr9/algorithms/galaxy_portsmouth.php#fitting">Spectro-Photometric Model Fitting</a></li>
<li><a href="dr9/algorithms/galaxy_portsmouth.php#kinematics">Stellar Kinematics and Emission Line Fluxes</a></li>
<li><a href="dr9/algorithms/galaxy_portsmouth.php#caveats">Caveats!</a></li>
</ul>

<h2 id="fitting">Spectro-Photometric Model Fitting</h2>


<p>The stellar population models of
<a href="http://adsabs.harvard.edu/abs/2005MNRAS.362..799M">Maraston (2005)</a> and
<a href="http://adsabs.harvard.edu/abs/2009MNRAS.394L.107M">Maraston <em>et&nbsp;al.</em> (2009)</a>
are used to perform
a best-fit to the observed <var>ugriz</var> magnitudes of BOSS galaxies with the
spectroscopic redshift determined by the BOSS pipeline, using an adaptation of
the <a href="http://webast.ast.obs-mip.fr/hyperz/">publicly available Hyper-Z code</a> of
<a href="http://adsabs.harvard.edu/abs/2000A%26A...363..476B">Bolzonella, Miralles
&amp; Pell&oacute; (2000)</a>.
The fit is carried out on extinction corrected model magnitudes that are scaled
to the <var>i</var>-band <a href="dr9/help/glossary.php#mag_cmodel">c-model magnitude</a>, <em>i.e.</em>:</p>

<pre>
mag_x = modelmag_x - extinction_x + (cmodelmag_i - modelmag_i),
</pre>

<p>where x denotes the photometric band (<var>ugriz</var>).</p>

<p>Two sets of template spectra are used (for details, see
<a href="http://adsabs.harvard.edu/abs/2013MNRAS.435.2764M">Maraston <em>et&nbsp;al.</em> 2013</a>).</p>
<ol>
<li>a passively evolving galaxy with a two-component metallicity of same
age and no ongoing star formation or reddening, as in
<a href="http://adsabs.harvard.edu/abs/2009MNRAS.394L.107M">Maraston <em>et&nbsp;al.</em> (2009)</a>, </li>
<li> an ensemble of canonical star formation modes, including
exponentially-declining, constant with truncation, and constant, star
formation, for various timescales and various metallicities, as in
<a href="http://adsabs.harvard.edu/abs/2006ApJ...652...85M">Maraston <em>et&nbsp;al.</em> (2006)</a>.
In order to minimize the event of low-age, high-dust fake solutions,
reddening is not included (<a href="http://adsabs.harvard.edu/abs/2012MNRAS.422.3285P">Pforr, Maraston &amp; Tonini 2012</a>).
</li>
</ol>

<p>The output of the fit for each galaxy includes: age, star formation mode,
metallicity, the absolute rest-frame magnitude in the K-band as derived from the best-fitting model, plus the
reduced &chi;<sup>2</sup>. Additionally, the best fit model spectrum as well
as the probability distribution function (PDF) for the stellar mass are provided.</p>

<p>Stellar masses and star formation rates are computed from the best-fit
SED as in <a href="http://adsabs.harvard.edu/abs/2006ApJ...652...85M">Maraston <em>et&nbsp;al.</em> (2006)</a>.
Furthermore the stellar mass at the median PDF and 68% confidence levels are provided.
</p>

<p>Both calculation sets are available for Salpeter and Kroupa initial mass functions, and both account for the cases of with and without stellar mass losses from stellar evolution.</p>

<p>The algorithm assumes a &Lambda;CDM cosmology with <var>H</var><sub>0</sub> = 71.9,
&Omega;<sub>m</sub> = 0.258, and &Omega;<sub>&Lambda;</sub> = 0.742.</p>

<p>Rest-frame magnitudes in other bands and additional quantities described by
<a href="http://adsabs.harvard.edu/abs/2013MNRAS.435.2764M">Maraston <em>et&nbsp;al.</em> (2013)</a>
may be obtained by contacting <a href="mailto:claudia.maraston@port.ac.uk">C. Maraston</a>.</p>

<h2 id="kinematics">Stellar Kinematics and Emission Line Fluxes</h2>


<p>Portsmouth stellar kinematics and emission-line flux measurements
<a href="http://adsabs.harvard.edu/abs/2013MNRAS.431.1383T">Thomas <em>et&nbsp;al.</em> (2013)</a>
are based on adaptations of the publicly available codes Penalized PiXel Fitting (pPXF,
<a href="http://adsabs.harvard.edu/abs/2004PASP..116..138C">Cappellari &amp; Emsellem 2004</a>) and
<a href="http://star-www.herts.ac.uk/~sarzi/PaperV_nutshell/PaperV_nutshell.html">Gas and Absorption Line Fitting code</a>
(GANDALF v1.5; <a href="http://adsabs.harvard.edu/abs/2006MNRAS.366.1151S">Sarzi <em>et&nbsp;al.</em> 2006</a>)
to calculate stellar kinematics and to derive emission line properties.
GANDALF fits stellar population and Gaussian emission line templates to the
galaxy spectrum simultaneously to separate stellar continuum and absorption
lines from the ionized gas emission. Stellar kinematics are evaluated by pPXF
where the line-of-sight velocity distribution is fitted directly in pixel
space. The fits account for the impact of diffuse dust in the galaxy on the
spectral shape adopting a Calzetti (2001) obscuration curve. The code further
determines the kinematics of the gas (velocity and velocity dispersion) and
measures emission line fluxes and equivalent widths (EWs) on the resulting
Gaussian emission line template.</p>

<p>The stellar population models from
<a href="http://adsabs.harvard.edu/abs/2011MNRAS.418.2785M">Maraston &amp; Str&ouml;mb&auml;ck (2011)</a>
based on the
<a href="http://miles.iac.es/pages/stellar-libraries.php">MILES stellar library</a>
(<a href="http://adsabs.harvard.edu/abs/2006MNRAS.371..703S">S&aacute;nchez-Bl&aacute;zquez <em>et&nbsp;al.</em> 2006</a>),
augmented with theoretical spectra at wavelengths &lambda; &lt; 3500 &Aring; from
<a href="http://adsabs.harvard.edu/abs/2009MNRAS.394L.107M">Maraston <em>et&nbsp;al.</em> (2009)</a>,
based on the theoretical library UVBLUE
(<a href="http://adsabs.harvard.edu/abs/2005ApJ...626..411R">Rodr&iacute;guez-Merino <em>et&nbsp;al.</em> 2005)</a>
are adopted as galaxy templates (available at <a href="http://www.maraston.eu/M11">www.maraston.eu/M11</a>).
The stellar population templates were fixed to solar metallicity to limit
computing time, with an age range from 6.5&nbsp;Myr to 11&nbsp;Gyr. The
templates were slightly downgraded from MILES spectral resolution
(<a href="http://adsabs.harvard.edu/abs/2011A%26A...531A.109B">Beifiori <em>et&nbsp;al.</em> 2011)</a>
to the resolution of BOSS.</p>

<p>Outputs from this fitting process include stellar velocity dispersions,
emission-line fluxes (both observed and de-reddened) and
equivalent widths, the gas kinematics,
an <var>E(B-V)</var> value and derived BPT classifications. The reddening
values can be obtained by plugging the <var>E(B-V)</var> value for each
object into the dust attenuation equation of
<a href="http://adsabs.harvard.edu/abs/2000ApJ...533..682C">Calzetti <em>et&nbsp;al.</em> (2000)</a>. A reduced &chi;<sup>2</sup> value is also provided for the fit, as well as
Amplitude-over-Noise (AoN) values for each of the emission lines.</p>

<p>The fits account for the impact of diffuse dust in the galaxy on the spectral shape,
adopting a <a href="http://adsabs.harvard.edu/abs/2001PASP..113.1449C">Calzetti (2001)</a>
obscuration curve. The code further determines the kinematics of the gas
(velocity and velocity dispersion), and measures emission line fluxes and equivalent
widths (EWs) on the resulting Gaussian emission line template.</p>

<p>An emission line measurement is made when the amplitude-over-noise (AoN) ratio
is larger than two, which implies that many emission lines are too weak to be
detected in BOSS. Reasonable AoN ratios can be obtained in a subsample of BOSS
galaxies, however, for some of the stronger lines such as the forbidden lines
[OIII]5007 and [NII]6583, as well as the Balmer lines H<sub>&beta;</sub> and
H<sub>&alpha;</sub>. EWs are calculated as the ratio between line and continuum fluxes.</p>

<p>The original GANDALF code considers two dust components: the diffuse dust in the galaxy
affecting the spectral shape, and dust in emission line regions additionally affecting
emission line fluxes and ratios. The latter is estimated through the Balmer decrement
between H<sub>&beta;</sub> and H<sub>&alpha;</sub>, when available
(<a href="http://adsabs.harvard.edu/abs/1987ApJS...63..295V">Veilleux &amp; Osterbrock 1987</a>).
</p>

<p>However, the relatively low signal-to-noise ratios in the BOSS spectra make measurement
of the Balmer decrement highly uncertain. In cases in which the H<sub>&beta;</sub> emission
line is barely detected, the inclusion of this second dust component tends to yield
unreasonably high values for dust extinction. Thus,
<a href="http://adsabs.harvard.edu/abs/2013MNRAS.431.1383T">Thomas <em>et&nbsp;al.</em> (2013)</a> do not consider this
second dust component in the fits; instead, they focus on the diffuse dust component
that only affects the spectral shape adopting a
<a href="http://adsabs.harvard.edu/abs/2001PASP..113.1449C">Calzetti (2001)</a> obscuration
curve. The emission line fluxes provided have been corrected for dust extinction
obtained in this way.</p>

<p>Note that the spectra have not been corrected for Milky Way foreground extinction
before the emission lines analysis. This does not affect the emission line measurements,
but does imply that the resulting E(B-V) values need to be corrected for Milky Way
extinction a posteriori. To calibrate the procedure,
<a href="http://adsabs.harvard.edu/abs/2013MNRAS.431.1383T">Thomas <em>et&nbsp;al.</em> (2013)</a> have derived stellar
velocity dispersions and emission line properties for a subset of SDSS galaxies from
SDSS <a href="http://www.sdss.org/dr7">Data Release 7</a>
(<a href="http://adsabs.harvard.edu/abs/2009ApJS..182..543A">Abazajian <em>et&nbsp;al.</em> 2009</a>),
and have found satisfying agreement.</p>

<h2 id="caveats">Caveats</h2>

<p>Please note that due to a bug in the DR9 version of the Portsmouth Stellar Kinematics and Emission Line Fluxes code, EW values need to be divided
by a factor (1+<var>z</var>) and Continuum Flux measurements need to be multiplied by a factor (1+<var>z</var>) before
being used. This will be corrected in the DR10 version.</p>

<h2>REFERENCES</h2>

<p>Abazajian, K.N., <em>et&nbsp;al.</em>, 2009, ApJS, 182, 543,
<a href="http://iopscience.iop.org/0067-0049/182/2/543/">doi:10.1088/0067-0049/182/2/543</a>.</p>

<p>Bolzonella, M., Miralles, J.M., Pell&oacute;, R., 2000, A&amp;A, 363, 476,
<a href="http://adsabs.harvard.edu/abs/2000A%26A...363..476B">ads:2000A%26A...363..476B</a>.</p>

<p>Calzetti, D., 2001, PASP, 113, 9, <a href="http://www.jstor.org/stable/10.1086/324269">
doi:10.1086/324269</a>.</p>

<p>Maraston, C., 2005, MNRAS, 362(3), 799,
<a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1365-2966.2005.09270.x/abstract">
doi:10.1111/j.1365-2966.2005.09270.x</a>.</p>

<p>Maraston, C., Str&ouml;mb&auml;ck, G., Thomas, D., Wake, D.A., Nichol, R.C., 2009,
MNRAS Letters, 394(1), L107,
<a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1745-3933.2009.00621.x/abstract">
doi:10.1111/j.1745-3933.2009.00621.x</a>.</p>

<p>Maraston, C., Str&ouml;mb&auml;ck, G., 2011,
MNRAS Letters, 394(1), L107,
<a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1365-2966.2011.19738.x/abstract">
doi:10.1111/j.1365-2966.2011.19738.x</a>.</p>

<!-- SDSS publication 86 -->
<p>Maraston, C., Pforr, J., Henriques, B.M., Thomas, D., Wake, D.,
Brownstein, J.R.,  Capozzi, D., Tinker, J., Bundy, K., Skibba, R.A.,
Beifiori, A., Nichol, R.C., Edmondson, E., Schneider, D.P., Chen, Y.,
Masters, K.L., Steele, O., Bolton, A.S., York, D.G., Weaver, B.A., Higgs, T.,
Bizyaev, D., Brewington, H., Malanushenko, E., Malanushenko, V., Snedden, S.,
Oravetz, D., Pan, K., Shelden, A., Simmons, A., 2013,
MNRAS, 435, 2764,
<a href="http://dx.doi.org/10.1093/mnras/stt1424">doi:10.1093/mnras/stt1424</a>.</p>

<p>Pforr, J., Maraston, C., Tonini, C., 2012, MNRAS, 422, 3285,
ApJ, 626, 411,
<a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1365-2966.2012.20848.x/abstract">doi:10.1111/j.1365-2966.2012.20848.x</a>.</p>

<p>Rodr&iacute;guez-Merino, L.H., Chavez, M., Bertone, E., Buzzoni, A., 2005,
ApJ, 626, 411, <a href="http://iopscience.iop.org/0004-637X/626/1/411/">doi:10.1086/429858</a>.</p>

<p>S&aacute;nchez-Bl&aacute;zquez, P., R.F. Peletier, J. Jim&eacute;nez-Vincente,
N. Cardiel, J. Cenarro, J. Falc&oacute;n-Barroso, J. Gorgas, S. Selam,
A. Vazdekis, 2006, MNRAS, 371(2), 703,
<a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1365-2966.2006.10699.x/abstract">
doi:10.1111/j.1365-2966.2006.10699.x</a>.</p>

<p>Sarzi, M., Falc&oacute;n-Barroso, J., Davies, R.L., Bacon, R., Bureau, M.,
Cappellari, M., de Zeeuw, P.T., Emsellem, E., Kambiz, F., Krajnovi&#263;, D.,
Kuntschner, H., McDermid, R.M., Peletier, R.F., 2006, MNRAS, 366(4),
1151, <a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1365-2966.2005.09839.x/abstract">doi:10.1111/j.1365-2966.2005.09839.x</a>.</p>

<!-- SDSS publication 60 -->
<p>Thomas, D., Steele, O., Maraston, C., Johansson, J., Beifiori, A., Pforr, J.,
Str&ouml;mb&auml;ck, G., Tremonti, C.A., Wake, D., Bizyaev, D., Bolton, A.,
Brewington, H., Brownstein, J.R., Comparat, J., Kneib, J.-P., Malanushenko, E.,
Malanushenko, V., Oravetz, D., Pan, K., Parejko, J.K., Schneider, D.P.,
Shelden, A., Simmons, A., Snedden, S., Tanaka, M., Weaver, B.A., Yan, R., 2013,
MNRAS, 431(2), 1383,
<a href="http://dx.doi.org/10.1093/mnras/stt261">doi:10.1093/mnras/stt261</a>.</p>

<p>Veilleux, S., Osterbrock, D.E., 1987, ApJS, 63, 295,
<a href="http://dx.doi.org/10.1086/191166">doi:10.1086/191166</a>.</p>

<?php echo foot(); ?>
