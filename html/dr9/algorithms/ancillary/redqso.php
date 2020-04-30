<?php include '../../../header.php'; echo head('Reddened Quasars'); ?>

<h2>Summary</h2>

<p>A search for quasars reddened by dust absorption (either from intervening sources or
sources local to the quasar) in the 220-square-degree survey area of Stripe 82.</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET1</code> value includes one or more of the bitmasks
in the following table was targeted for spectroscopy as part of this ancillary target
program. See <a href="dr9/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how to use
these values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Sub-program<br />(bit name)</th>
<th>Bit</th>
<th>Target Description</th>
</tr>

<tr>
<td>RQSS_SF</td>
<td>32</td>
<td>Selected from SDSS and FIRST photometry</td>
</tr>

<tr>
<td>RQSS_SFC</td>
<td>33</td>
<td>Selected from SDSS and FIRST photometry (child object in SDSS imaging)</td>
</tr>

<tr>
<td>RQSS_STM</td>
<td>34</td>
<td>Selected from SDSS and 2MASS photometry</td>
</tr>

<tr>
<td>RQSS_STMC</td>
<td>35</td>
<td>Selected from SDSS and 2MASS photometry (child object in SDSS imaging)</td>
</tr>

</table>


<h2>Description</h2>

<p>Quasar candidates likely to be intrinsically reddened - quasar candidates
with E(B-V) &gt; 0.5 - were selected from SDSS photometry complemented by photometry
from either the Faint Images of the Radio Sky at Twenty-one centimeters (FIRST;
<a href="http://adsabs.harvard.edu/abs/1996AJ....112..407G">Gregg et al. 1996</a>) or the Two Micron All-Sky Survey
(2MASS; Skrutskie et al. 2006). The goal of observing these reddened quasars was
to better determine the distribution of reddenings, both in intervening absorbers
and at quasar redshifts - which in turn enables studies of reddening as a function
of quasar properties.</p>

<p>Targets were selected based on color selection and stellar morphology. All targets
were required to have 17 &lt; z<sub>PSF</sub> &lt; 21, with dereddened colors satisfying
the equation (g<sub>PSF</sub> - i<sub>PSF</sub>) - 3&sigma;(g<sub>PSF</sub> - i<sub>PSF</sub>)
&gt; 0.9.</p>

<p>Targets selected from SDSS plus FIRST data were denoted by sub-programs RQSS_SF or
RQSS_SFC (the trailing C indicates that the target was a CHILD object in SDSS), and were
additionally required to match within 2" of a FIRST source. Targets selected from
SDSS plus 2MASS data (sub-programs RQSS_TM or RQSS_TMC) were additionally required
to match within 3" of a 2MASS source having 11 &lt; K &lt; 15.1, (J - K) &gt; 1.25, and
a 7-dimensional color distance (Covey et al. 2007) greater
than 50 (this is the distance in units of &chi;<sup>2</sup> to the point on the stellar
locus with the same (g &ndash; i) color as the object).</p>

<p>This ancillary target program was discontinued after the first year due to low yield,
and targets are included on only 13 completed plates. It is superseded by the
ancillary target program <a href="dr9/algorithms/ancillary/kbandqso.php">K-band Limited Sample of
Quasars</a>.</p>

<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://www.yorku.ca/phall/HOME/astro.html">Pat Hall</a></th></tr>
<tr><td>York University</td></tr>
<tr><td>phall -at- yorku.ca</td></tr>
</table>


<h2>REFERENCES</h2>

<p>
Covey, K. R., et al. 2007, AJ, 134, 2398<br />
Gregg, M.D., Becker, R.H., White, R.L., Helfand, D.J., McMahon, R.G., Hook, I.M., 1996, AJ, 112, 407,
doi:10.1086/118024<br />
Skrutskie, M. F., et al. 2006, AJ, 131, 1163
</p>




<?php echo foot(); ?>

