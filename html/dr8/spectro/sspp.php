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
href="http://adsabs.harvard.edu/abs/2010arXiv1008.1959S">Smolinski et al. (2010)</a>.
The following links highlight some important features of the SSPP.</p>

<h2>Two Output Files in SSPP</h2>

<p>Note that the FITS files linked to below
<!-- <a href="http://data.sdss3.org/sas/dr8/groups/segue2/sspp/ssppOut-dr8.fits">ssppOut</a>
and <a
href="http://data.sdss3.org/sas/dr8/groups/segue2/sspp/ssppOut-dr8.lineindex.fits">ssppOut_lineindex</a>
-->
are very large as they include all DR8 products.</p>
<ul>
<li><a
href="http://data.sdss3.org/sas/dr8/groups/segue2/sspp/ssppOut-dr8.fits">ssppOut</a>
(1.7 Gb)
contains information on stellar parameters from individual pipes in the SSPP
(<a href="http://data.sdss3.org/datamodel/files/SSPP_REDUX/RERUN/PLATE4/output/param/ssppOut.html">datamodel</a>).
<strong>Among the various parameters, it is mostly recommended to use the
adopted <var>T</var><sub>eff</sub>, log <var>g</var>, and [Fe/H] unless one
wants to use the parameters from a specific method for a very good
reason</strong>. These are named "TEFF_ADOP", "LOGG_ADOP", and "FEH_ADOP", respectively,
in the <a href="http://data.sdss3.org/datamodel/files/SSPP_REDUX/RERUN/PLATE4/output/param/ssppOut.html">data model.</a></li>
<li><a
href="http://data.sdss3.org/sas/dr8/groups/segue2/sspp/ssppOut-dr8.lineindex.fits">ssppOut_lineindex</a>
(2.2 Gb)
includes line index measurements for various atomic and molecular lines
(<a href="http://data.sdss3.org/datamodel/files/SSPP_REDUX/RERUN/PLATE4/output/param/ssppOut_lineindex.html">datamodel</a>).</li>
</ul>

<h2>Details</h2>

<ul>
<li><a href="dr8/spectro/sspp_lineindexmeas.php">Line Index Measurements in SSPP</a></li>
<li><a href="dr8/spectro/sspp_methods.php">Individual Methods Used in SSPP</a></li>
<li><a href="dr8/spectro/sspp_flags.php">Flags in SSPP</a></li>
<li><a href="dr8/spectro/sspp_decision.php">Decision Tree on
Temperature, Gravity, and Metallicities</a></li>
<li><a href="dr8/spectro/sspp_clusters.php">Comparisons of SSPP Parameters with Clusters</a></li>
<li><a href="dr8/spectro/sspp_plots.php">SSPP Output Plots</a></li>
<li><a href="dr8/spectro/sspp_hires.php">Status of High-resolution Observations</a></li>
</ul>

<h2>[&alpha;/Fe] Measurements</h2>

<p>Although the [&alpha;/Fe] ratio is determined by the SSPP, the estimate is not
available in the DR8. A detailed description of the alpha measurement can be
found in <a href="http://adsabs.harvard.edu/abs/2011AJ....141...90L">Lee et al. (2011)</a>.
Note that the [&alpha;/Fe] ratio was released in DR7. However, it is not recommend to use it as
its measurement and error were not well characterized as decribed in Lee et al. (2011).</p>

<h2>Caveats on Temperature and Gravity Estimates</h2>

<p>The effective temperatures for cool metal-poor giant stars (less than 4800 K),
derived by the SSPP are higher by about 100 - 200 K than the high-resolution analysis
of the same SDSS/SEGUE stellar spectra, and surface gravities for
metal-rich giants (log <var>g</var> less than 3.0 or so) are gradually larger
by about 0.1 - 0.7 dex.</p>


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

