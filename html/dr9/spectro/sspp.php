<?php include '../../header.php'; echo head('SEGUE Stellar Parameter Pipeline (SSPP)'); ?>

<h2>Introduction</h2>

<p>SDSS/SEGUE stellar spectra are processed through the SEGUE Stellar Parameter
Pipeline (SSPP), and three primary stellar parameters, effective temperature (<var>T</var><sub>eff</sub>),
surface gravity (log <var>g</var>), and metallicity ([Fe/H]) are reported for
most stars in the temperature range 4000 - 10,000 K and with spectral
S/N ratios exceeding 10/1. In that process, the line indices of various atomic and molecular lines
are also measured. The detailed descriptions of the SSPP can be found in a series of papers
(<a href="http://adsabs.harvard.edu/abs/2008AJ....136.2022L">Lee et al. 2008a</a>, <a
href="http://adsabs.harvard.edu/abs/2008AJ....136.2050L">Lee et al. 2008b</a>, and <a
href="http://adsabs.harvard.edu/abs/2008AJ....136.2070A">Allende Prieto et al. 2008</a>).
The changes and improvements made on the SSPP since the DR7 are described in <a
href="http://adsabs.harvard.edu/abs/2011AJ....141...89S">Smolinski et al. (2011)</a>.
The following links highlight some important features, improvements, changes of the SSPP since the DR8.</p>




<h2>Details</h2>

<ul>
<li><a href="dr9/spectro/sspp_changes.php">List of Changes and Improvements Since DR8</a></li>
<li><a href="dr9/spectro/sspp_irfm.php">Temperature Estimate from InFred Flux Method (IRFM)</a></li>
<li><a href="dr9/spectro/sspp_calibration.php">Re-calibration of SSPP Parameters</a></li>
<li><a href="dr9/spectro/sspp_lineindexmeas.php">Line Index Measurements in SSPP</a></li>
<li><a href="dr9/spectro/sspp_methods.php">Individual Methods Used in SSPP</a></li>
<li><a href="dr9/spectro/sspp_flags.php">Flags in SSPP</a></li>
<li><a href="dr9/spectro/sspp_decision.php">Decision Tree on Temperature, Gravity, and Metallicities</a></li>
<li><a href="dr9/spectro/sspp_plots.php">SSPP Output Plots</a></li>
<li><a href="dr9/spectro/sspp_hires.php">Comparisons of SSPP Parameters with High-resolution Analysis</a></li>
<li><a href="dr9/spectro/sspp_clusters.php">Comparisons of SSPP Parameters with Clusters</a></li>
<li><a href="dr9/spectro/sspp_internal.php">Internal Consistency of Each Parameter in SSPP</a></li>
<li><a href="dr9/spectro/caveats.php#sspp">Caveats for SSPP Parameters</a></li>
<li><a href="dr9/spectro/sspp_data.php">Accessing SSPP Parameters</a></li>
</ul>

<h2>[&alpha;/Fe] Measurements</h2>

<p>There is measurement of [&alpha;/Fe] ratio by the SSPP, and 
there is <a href="dr9/spectro/alpha_catalog.php">value added catalog</a> for this in 
the DR9. A detailed description of the alpha measurement can be found 
in <a href="http://adsabs.harvard.edu/abs/2011AJ....141...90L">Lee et al. (2011)</a>.
</p>

<h2>Extinction Calculations</h2>

<p>SSPP reports extinction values in the SDSS's ugriz filter system. The pipeline calculates
these values by converting from standard extinction E(B-V) values
(<a href="http://adsabs.harvard.edu/abs/1998ApJ...500..525S">Schlegel, Finkbeiner, &amp; Davis 1998</a>),
using the following conversions:</p>

<p>Extinction_u = 5.155*E(B-V)</p>
<p>Extinction_g = 3.793*E(B-V)</p>
<p>Extinction_r = 2.751*E(B-V)</p>
<p>Extinction_i = 2.086*E(B-V)</p>
<p>Extinction_z = 1.479*E(B-V)</p>

<?php echo foot(); ?>

