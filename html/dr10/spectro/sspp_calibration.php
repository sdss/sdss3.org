<?php include '../../header.php'; echo head('Re-calibration of SSPP Parameters - SSPP'); ?>

<p><a href="dr10/spectro/sspp.php"><b>[Back to main SSPP page]</b></a></p>

<h2>Introduction</h2>
<p>
The parameters derived for the calibration sample of 126 stars with SDSS/SEGUE
and high-resolution spectra were used to re-calibrate the SSPP's estimates of 
effective temperature, surface gravity and metallicity. Here, the re-calibration 
of each method in the SSPP is briefly described.</p>


<h2>Effective Temperature</h2>
<p>
In DR9 three color-based temperature estimates used previously, <i>T</i><sub>K</sub>, T<sub>G</sub>, 
and <var>T</var><sub>eff</sub> are no longer used and are replaced by the 
new IRFM estimate of <var>T</var><sub>eff</sub>. As a result, the total number 
of <var>T</var><sub>eff</sub> estimators is 9, including the auxiliary estimates from HA24 and
HD24. For each of these nine temperature estimates, we compute the
difference between the estimates of each method and the IRFM temperature 
estimates from the SDSS/SEGUE high-resolution sample. We then 
fit a quadratic function to the offset as a function of <var>T</var><sub>eff</sub> and use this 
relation to apply a correction to all the <var>T</var><sub>eff</sub> estimates reported by the SSPP.  
One thing to note is that there is a smaller number of 107 stars available for the 
temperature comparison, as only those stars have available J, H, and K band photometry.
</p>

<h2>Surface Gravity</h2>
<p>
The gravity estimates delivered by MgH and CaI2
line index methods have been removed from the SSPP. In addition, due to large
deviation from the high-resolution results, the gravity determined by 
<a href="dr10/spectro/sspp_methods.php">k24</a> is also not used in any of the 
final, adopted surface gravity estimates from the
SSPP. Therefore, there are seven estimators of log <i>g</i> considered when 
computing the final adopted log <i>g</i>. For each of the seven methods,
we fit a linear relation to the offset between the SSPP estimate and the value
of log <i>g</i> determined from the high resolution spectra. This relation is used to
correct the log <i>g</i> estimates reported by the SSPP. 
</p>

<h2>Metallicity</h2>
<p>
First of all, the metallicity estimates from ACF and CaIIT are not
reported in this version of the SSPP. The metallicity estimates from the new
version of the ANNSR estimator proved to have significant offsets relative
to the high-resolution sample.  As a result, it is not considered in the
determination of the adopted SSPP metallicity.  Hence, there are nine
metallicity estimators used to compute the final adopted metallicity.
</p>
<p>
Because the high-resolution sample does not include the stars with [Fe/H]~-1.5 
and [Fe/H] > 0.0, we attempt to fill in the hole in the abundance space
by making use of members of some open and globular clusters with known
metallicity. Therefore, we added some of the cluster members with SEGUE spectra
of S/N > 50 to the high resolution sample to calibrate each metallicity
estimate in the SSPP. For each SSPP metallicity estimator, we fit a quadratic
relation to the difference between the SSPP value and the metallicity determined
from the high resolution spectrum or, for cluster stars, the known literature
value.  We use this quadratic relation to correct the SSPP metallicity
estimates.  
</p>
<p>
The introduction of new synthetic spectra with variable micro-turbulence velocities 
with surface gravities improves the metallicity estimates of NGS1 and CaIIK1 
methods in a sense that there is no need to correct the offset for
metal-rich stars ([Fe/H] > -0.5). <a href="images/segueii/dr8_dr9_vt.png">This figure</a> 
well illustrates the effect of micro-turbulence velocity on the metallicity estimate. 
The figure shows metallicity distribution as a function of g-r for the members of M67 
and NGC 6791 (Top two panels) and difference in metallicity between <a href="dr10/spectro/sspp_methods.php">NGS1</a> and the 
high-resolution analysis. The black dots indicate the estimates from the grid of 
synthetic spectra with micro-turbulence velocity of 2 km/s, while the filled squares are the 
determinations from the grid with the adopted relation between the gravity and 
micro-turbulence velocity. It is obvious to notice the big improvement in 
estimating [Fe/H], especially [Fe/H] > -0.5.
</p>
<?php echo foot(); ?>
