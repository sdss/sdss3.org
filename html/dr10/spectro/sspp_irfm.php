<?php include '../../header.php'; echo head('Temperature Estimate from InFred Flux Method (IRFM) - SSPP'); ?>

<p><a href="dr10/spectro/sspp.php"><b>[Back to main SSPP page]</b></a></p>

<p>In DR9, the SSPP adopts a much improved color (g-i)-temperature
relation, the InfraRed Flux Method (IRFM). This relation is derived
from about 14,000 stars, having both SDSS (u, g, r, i, z) and
near infrared (J, H, and K) photometry, as well as surface gravity and metallicity
from the SSPP. The adopted relation for obtaining the IRFM temperature is</p>
<p>
<i>T</i><sub>eff, IRFM</sub> = 5040/(a0 + a1&times;X + a2&times;X<sup>2</sup> + a3&times;X<sup>3</sup> +
                        a4&times;X&times;[Fe/H] + a5&times;[Fe/H] + a6&times;[Fe/H]<sup>2</sup>),
</p>
<p>where, X is g-i and a0=0.6787, a1=0.3116, a2=0.0573, a3=-0.0406,
a4=-0.0163, a5=-0.0021, and a6=-0.0003 for log <i>g</i> &ge; 3.7, while
a0=0.6919, a1=0.3091, a2=0.0688, a3=-0.0428, a4=-0.0078, a5=-0.0086,
and a6=-0.0042 for log <i>g</i> &lt; 3.7.</p>

<p>
As noted in the equation above, because the IRFM relation depends on the metallicity
and surface gravity of the stars in question, an iterative procedure is used for the
IRFM temperature estimate. The metallicity and gravity determined by NGS1 are used
in this equation to obtain the first guess for effective temperature.  With this first
pass of temperature held fixed during the &chi;<sup>2</sup>
minimization in the <a href="dr10/spectro/sspp_methods.php">NGS1</a> synthetic spectra grid, a new set of log <i>g</i> and [Fe/H] is obtained.
These log <i>g</i> and [Fe/H] are again plugged into the derived color-temperature relation
to determine the final estimate of <var>T</var><sub>eff</sub>. This IRFM temperature estimate
is considered in averaging to obtain the adopted <var>T</var><sub>eff</sub> for the range
of -0.3 &le; g-r &le; 1.3 and S/N &ge; 10.
</p>

<?php echo foot(); ?>
