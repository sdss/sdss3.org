<?php include '../../../header.php'; echo head('K-Band Selected Sample of Quasars'); ?>

<h2>Summary</h2>

<p>Quasar candidates in the 220-square-degree footprint of Stripe 82 that were selected by 
matching SDSS and UKIDSS photometry</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET2</code> value include one or more of the bitmasks 
in the following table was targeted for spectroscopy as part of this ancillary target program. 
See <a href="dr9/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how to use these 
values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Program<br />(bit name)</th>
<th>Bit in ANCILLARY_TARGET2</th>
<th>Target Description</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td>KQSO_BOSS</td>
<td>2</td>
<td>Quasars selected from UKIDSS photometry</td>
<td>1</td>
</tr>

</table>


<h2>Description</h2>

<p>Potential quasars were identified by photometering data from the UKIRT Infrared 
Deep Sky Survey (UKIDSS) at the position of SDSS sources to a limiting magnitude 
K<sub>AB</sub> &lt; 19.0 (K<sub>Vega</sub> &lt; 17.1). The goal of this ancillary target 
program was to identify highly red and reddened quasars that would have been missed by 
the main <a href="dr9/algorithms/boss_quasar_ts.php">BOSS Quasar Target Selection</a> 
algorithms. The sample described here allows investigations of, for example, the incidence 
of broad absorption line (BAL) quasars, or of highly reddened gravitationally-lensed 
quasars.</p>

<p>This ancillary target program superseded the 
<a href="dr9/algorithms/ancillary/redqso.php">Reddened Quasars</a> target selection program, 
since the superior UKIDSS photometry could target red, reddened, and high-redshift quasars 
better than 2MASS photometry. In addition, the color cut of (u<sub>PSF</sub> - g<sub>PSF</sub>) 
&gt; 0.4 used here better complemented the BOSS mission to target mostly higher-redshift 
quasars.</p>

<p>The targets not included in Stripe 82 were effectively incorporated into the BONUS sample 
through the XDQSO target selection 
(<a href="http://adsabs.harvard.edu/abs/2011ApJ...729..141B">Bovy et al. 2011</a>, 
<a href="http://adsabs.harvard.edu/abs/2012ApJ...749...41B">Bovy et al. 2012</a>); therefore, this ancillary program 
will not be continued for the remainder of the BOSS footprint.</p>

<p>This ancillary program superseded the ancillary program 
<a href="dr9/algorithms/ancillary/redqso.php">A Large Sample of Reddened Quasars></a>, as the 
superior UKIDSS photometry could better target red, reddened and high redshift quasars than 
2MASS. In addition, the cut of (u<sub>PSF</sub> - g<sub>PSF</sub>) &gt; 0.4 better complemented 
the BOSS mission to target mostly higher redshift quasars.</p>

<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://www.ast.cam.ac.uk/~rgm/">Richard McMahon</a></th></tr>
<tr><td>University of Cambridge</td></tr>
<tr><td>rgm -at- ast.cam.ac.uk</td></tr>
</table>

<h2>Target selection details</h2>

<p>In the original selection, approximately 2,000 targets were identified that have 
(g<sub>PSF</sub> - i<sub>PSF</sub>) &lt; 1.153 x (i<sub>PSF</sub> - K) - 1.401, to avoid 
the color space locus of the stellar main sequence, and (u<sub>PSF</sub> - g<sub>PSF</sub>) &gt; 
0.4 to exclude UV-excess quasars (i.e., unreddened quasars at redshifts of about z &gt; 2.15).</p>


<h2>References</h2>

<p>
Bovy, J., Hennawi, J.F., Hogg, D.W., Myers, A.D., Kirkpatrick, J.A., Schlegel, D.J., 
Ross, N.P., Sheldon, E.S., McGreer, I.D., Schneider, D.P., &amp; Weaver, B.A., 2011, ApJ, 729, 141, 
<a href="http://iopscience.iop.org/0004-637X/729/2/141">doi:10.1088/0004-637X/729/2/141</a><br />

Bovy, J., Myers, A.D., Hennawi, J.F., Hogg, D.W., McMahon, R.G., 
Schiminovich, D., Sheldon, E.S., Brinkmann, J., Schneider, D.P., &amp; Weaver, B.A., 
2012, ApJ, 749, 41, 
<a href="http://iopscience.iop.org/0004-637X/749/1/41">doi:10.1088/0004-637X/749/1/41</a>
</p>



<?php echo foot(); ?>

