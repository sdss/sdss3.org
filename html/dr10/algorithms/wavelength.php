<?php include '../../header.php'; echo head('Wavelength Calibration'); ?>

<p>The spectroscopic wavelength calibration is done quite accurately in SDSS, with typical errors of
2 km s<sup>-1</sup> or better. As the DR6 paper describes, however, detailed analyses of stellar
spectra revealed occasional errors that were substantially larger than this, especially in the blue
end of the spectrum. The algorithms for fitting arc and sky lines were made more robust for DR6, and
this improved the situation considerably. Two further improvements
were implemented for DR7 and DR8:</p>

<ul>

<li>Spectroscopy is often done on nights with a moderate amount of moon. The bluest sky line used
for wavelength calibration is a Hg line at 4046&Aring;, which is very close to a strong Fe I
absorption line in the solar spectrum. Thus when there is substantial moonlight in the sky
spectrum, a fit to what is assumed to be an isolated emission line can be significantly biased,
systematically skewing the wavelength solution at the blue end by as much as 20 km s<sup>-1</sup>.
In DR7, we now fit this line to a linear combination of a Gaussian plus a stellar template including
the absorption line, giving an unbiased estimate of the wavelength of the line. In practice, bright
moon affected 10 plates (listed in <a href="http://adsabs.harvard.edu/abs/2009arXiv0902.1781Y">Yanny
et al. 2009</a>) out of a total of 410 SEGUE plates.</li>

<li>The sky and arc lines for each fiber are fit to a wavelength solution; this is done independently
for each fiber. This works well for the vast majority of plates. However, for a small fraction of
plates, the arcs are weak (perhaps because the arc lamps themselves were faulty at that time, or
because the telescope top petals off of which the arc lamp light reflects were not properly deployed),
and the wavelength solution is poorly constrained. We therefore required that second- and higher-order
terms in the wavelength solution be continuous functions of the fiber number, to constrain the solution.
We found that this produces much more robust wavelength solutions for those plates with weak arc
observations, and has no substantial effect on the remaining plates.</li>

</ul>

<p>The stellar spectral template library which gives the best radial velocity estimates is based on
the ELODIE library (<a href="http://adsabs.harvard.edu/abs/2001A%26A...369.1048P">Prugniel &amp; Soubiran 2001</a>).
We have removed one additional ELODIE template that gave velocities with a consistent offset from
the rest of the library, as measured using the sample of ~ 5000 stars with duplicate observations
on each SEGUE plate pair. In order to provide more complete coverage in effective temperature,
surface gravity, and metallicity for hot stars, we generated a grid of synthetic spectra from
the models of <a href="http://adsabs.harvard.edu/abs/2003IAUS..210P.A20C">Castelli &amp; Kurucz (2003)</a>
over the same wavelength range and at the same resolving power as the spectra in the ELODIE
library. This blue grid spans 6000-9500 K in 500 K increments, -0.5 > [Fe/H] > -2.5 in
increments of 0.5 dex, and log <i>g</i> of 2 and 4. We also added a grid of synthetic carbon
enhanced spectra (Plez, private communication, using the stellar atmospheric code described by

<a href="http://adsabs.harvard.edu/abs/2008A%26A...486..951G">Gustafsson et al. 2008</a>)
at values of [Fe/H] between -1 and -4, [C/Fe] between 1 and 4, log <i>g</i> values between 2
and 4, and T<sub><i>eff</i></sub> in the range 4000 K - 6000 K. With these improvements, the
radial velocity scatter in repeat observations for objects that match the Carbon star templates
is now the same as for the full sample.</p>

<p>The DR6 paper describes a 7 km s<sup>-1</sup> systematic error in the radial velocities of stars
(in the sense that the pipeline-reported velocities are too small). This is still with us in DR7; a
correction is put into the outputs of the SEGUE Stellar Parameter Pipeline (SSPP;
<a href="http://adsabs.harvard.edu/abs/2008AJ....136.2022L">Lee et al. 2008</a>) but not elsewhere
in the CAS or DAS. Beyond this problem, the plate-to-plate velocities of SEGUE stars have systematic
errors of about 2 km s<sup>-1</sup> in the mean. The rms velocity error of any given SEGUE star
observation is about 5.5 km s<sup>-1</sup> at <i>g</i> = 18.5, degrading to 12 km s<sup>-1</sup>
at <i>g</i> = 19.5.</p>

<hr />
<p>*Text and figures on this page are taken from the
<a href="http://adsabs.harvard.edu/abs/2009ApJS..182..543A">Data Release 7 paper</a>.
IOP Publishing Ltd is not responsible for any errors
or omissions in this version of the manuscript or any version derived from it.</p>

<?php echo foot(); ?>
