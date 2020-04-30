<?php include '../../header.php'; echo head('Examples of SSPP Output Plots - SSPP'); ?>

<p><a href="dr10/spectro/sspp.php"><b>[Back to main SSPP page]</b></a></p>

<h2>Introduction</h2>

<p>There are two types of plots made during the run of the SSPP. One is plots of
10 stars per page and the other one is plots of a star per
page. This page shows an example of each type of the plots. Note that however,
these outputs are not available to public users at this point.</p>

<h2>Stacked Plots</h2>
<p>It is called ssppOut-pppp-mmmmm.ps.gz, where pppp is a 4-digit plate number,
and mmmmm is a 5-digit MJD. The following figure shows 10 spectra in one page; each row corresponds to
one star with different wavelength ranges.
The panels of the first column plot the entire spectrum with the
continuum fitted in red. The second is the pseudo continuum-normalized
spectrum over 3850 - 6000 &Aring;, the third over 3850 - 4250 &Aring;, and the
fourth over 4500 - 5500 &Aring;. The red spectrum in the third and the fourth
column panel is the synthetic spectrum generated with the derived
parameters by the SSPP, which lists at the top of each row ,
denoted by T (<i>T</i><sub>eff</sub>),G (log <i>g</i>) and M ([Fe/H]),
so that one can easily check if the parameters estimated from the SSPP are
reasonable.</p>

<table class="figure" style="width:263px;">
<tr><td><a href="images/segueii/ssppOut-hires_full-0.png">
<img src="images/segueii/ssppOut-hires_full-0_thumb.png" alt="SSPP Stacked Plots" />
</a></td></tr>
<tr><td>Example of SSPP Stacked Plots</td></tr>
</table>

<p>Giving an example with the first row for the meaning of the listed
parameters at the top of each row:</p>

<ul>
<li>0001: running number</li>
<li>0282-51658-530: plate-mjd-fiber</li>
<li>T: adopted temperature</li>
<li>G: adopted gravity</li>
<li>M: adopted metallicity</li>
<li>PHO: <a href="dr10/algorithms/segue_target_selection.php">initial target</a></li>
<li>nnnnn: <a href="dr10/spectro/sspp_flags.php">a flag with five letter combination</a></li>
<li>g: reddening corrected g magnitude</li>
<li>g-r: reddening corrected g-r/predicted g-r</li>
<li>SN: average signal-to-noise ratio over 4000 - 8000 &Aring;</li>
<li>C: correlation coefficient (CC) between the observed spectrum and the
synthetic spectrum over 3850 - 4250 &Aring; / CC over 4500 - 5500 &Aring;</li>
<li>V: heliocentric radial velocity/galactocentric radial velocity</li>
</ul>

<p>The plot in purple indicates the
observed g-r does not agreed with the predicted color. These plots are
intended for visual inspection of interesting spectra with the
parameters estimated. There will be one post script file of the plots per
plate.</p>

<h2>Plots of individual stars</h2>

<p>It is called ssppOut-pppp-mmmmm-fff.ps.gz, where pppp is a 4-digit plate number,
mmmmm is a 5-digit MJD, and a 3-digit fiber number. The following figure
shows one spectrum in one page. The first panel is the
entire spectrum with the continuum fitted in red. The second is the pseudo
continuum-normalized spectrum over 3850 - 6000 &Aring;, the third over
3850 - 4250 &Aring;, and the fourth over 4500 - 5500 &Aring;. The red dashed
line spectrum in the third and the fourth column panel is the synthetic
spectrum generated with the derived parameters by the SSPP, which lists at
the top of each row , denoted by T (<i>T</i><sub>eff</sub>),
G (log <i>g</i>) and M ([Fe/H]), so that one can easily check if the parameters
estimated from the SSPP are reasonable.</p>

<table class="figure" style="width:263px;">
<tr><td><a href="images/segueii/0282-51658-530.png">
<img src="images/segueii/0282-51658-530_thumb.png" alt="SSPP Star Plot" /></a></td></tr>
<tr><td>Example of SSPP Individual Star Plots</td></tr>
</table>

<p>The meaning of the listed parameters at the top of each row is:</p>

<ul>
<li>0001: running number</li>
<li>0282-51658-530: plate-mjd-fiber</li>
<li>Flag: <a href="dr10/spectro/sspp_flags.php">a flag with five letter combination</a></li>
<li>Target: <a href="dr10/algorithms/segue_target_selection.php">initial target</a></li>
<li>Type: spectral type</li>
<li>&lt;S/N&gt;: average signal-to-noise ratio over 4000 - 8000 &Aring;</li>
<li><i>T</i><sub>eff</sub>: adopted temperature (uncertainty, number of estimators)</li>
<li>log <i>g</i>: adopted gravity (uncertainty, number of estimators)</li>
<li>[Fe/H]: adopted metallicity (uncertainty, number of estimators)</li>
<li>g: reddening corrected g magnitude</li>
<li>V: reddening corrected V magnitude from&nbsp; V = g - 0.561(g-r) - 0.004</li>
<li>g-r: reddening corrected g-r</li>
<li>g-r_p: predicted g-r</li>
<li>B-V: reddening corrected B-V from B-V = 0.916(g-r) + 0.187</li>
<li>RV : heliocentric radial velocity/galactocentric radial velocity</li>
<li>RA: R.A.</li>
<li>DEC : Declaration</li>
<li>l : Galactic longitude</li>
<li>b: Galactic latitude</li>
<li>C: correlation coefficient (CC) between the observed spectrum and the
synthetic spectrum over 3850 - 4250 &Aring; / CC over 4500 - 5500 &Aring;</li>
</ul>

<p>These plots are also intended for visual inspection of interesting spectra
with the parameters estimated. There will be one post script file per star.</p>

<?php echo foot(); ?>
