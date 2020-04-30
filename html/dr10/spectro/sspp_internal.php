<?php include '../../header.php'; echo head('Internal Consistency of Each Parameter in SSPP - SSPP'); ?>

<p><a href="dr10/spectro/sspp.php"><b>[Back to main SSPP page]</b></a></p>


<p> There are about 43,000 stars which have more than one spectroscopic observation
over the entire SDSS and SEGUE-1 and -2 surveys. From these, we select ~9000 stars
for which the S/N value between two spectra (both should have
S/N &ge; 10) is closer than +/-10, <a href="dr10/spectro/sspp_flags.php">SSPP flag</a> sets to 'nnnnn', correlation
coefficient between model and observed spectrum is larger than zero,
there is no any bad pixel in flux, and valid stellar parameters are available.
Comparison of the parameter estimates for these duplicate observations provides an
excellent basis for a new estimate of the internal uncertainties of the SSPP. We look at
the residual distribution between two measurements of each parameter from two different
observations as a function of signal-to-noise ratio (S/N) in four different
regions of g-r and two metallicity ranges (metal-poor for [Fe/H] &lt; -1.5 and
metal-rich for [Fe/H] &gt; -1.5).</p>

<p>
Three figures below show the residual distribution of the effective temperature,
surface gravity, and metallicity. Each panel in each figure lists the color and metallicity
ranges and the Gaussian mean (&mu;) and scatter (&sigma;) is calculated for
the stars in each color and metallicity bin. In this
analysis, when we compute the Gaussian sigma, we do not attempt to clip
the outliers as we already imposed various restrictions on each object to
obtain parameters as reliable as possible. The dashed line indicates the Gaussian sigma
listed in each panel, while the red-dashed line denotes one Gaussian sigma as computed
for bins of 200 stars ordered in S/N.  Each bin overlaps by 100 stars with the
neighboring bins.
</p>

<table class="noborder">
<tr>
<td>
<table class="centerfigure">
<tr><td><a href="images/segueii/dteff_snr_best.png"><img src="images/segueii/dteff_snr_best_thumb.png" alt="Residual distribution of Teff as a function of S/N" /></a></td></tr>
<tr><td>Residual distribution of <var>T</var><sub>eff</sub> as a function of S/N (click to get a larger version)</td></tr>
</table>
</td>
<td>
<table class="centerfigure">
<tr><td><a href="images/segueii/dlogg_snr_best.png"><img src="images/segueii/dlogg_snr_best_thumb.png" alt="Residual distribution of log g as a function of S/N" /></a></td></tr>
<tr><td>Residual distribution of log <i>g</i> as a function of S/N (click to get a larger version)</td></tr>
</table>
</td>
<td>
<table class="centerfigure">
<tr><td><a href="images/segueii/dfeh_snr_best.png"><img src="images/segueii/dfeh_snr_best_thumb.png" alt="Residual distribution of [Fe/H] as a function of S/N" /></a></td></tr>
<tr><td>Residual distribution of [Fe/H] as a function of S/N (click to get a larger version)</td></tr>
</table>
</td>
</tr>
</table>

<p>
Inspection of each figure tells that internal error of <var>T</var><sub>eff</sub> is ~50 K
for a typical G-type dwarf or redder stars in the color range of 0.4 &lt; g-r &lt; 1.3 with
S/N = 30. This error increases to ~80 K for stars with -0.3 &lt; g-r &lt; 0.2,
[Fe/H] &lt; -1.5, and S/N &lt; 15. Similarly for the surface gravity and metallicity,
the middle and right figures indicate that we can achieve the internal errors of
log <i>g</i> and [Fe/H] to ~0.12 dex and ~0.10 dex, respectively, for a typical
G-type dwarf or redder stars in the color range of 0.4 &lt; g-r &lt; 1.3 with S/N = 30.
These errors increase to ~0.30 dex for log <i>g</i> and 0.25 dex for [Fe/H]
for stars with -0.3 &lt; g-r &lt; 0.2, [Fe/H] &lt; -2.0, and S/N &lt; 15.
</p>

<?php echo foot(); ?>
