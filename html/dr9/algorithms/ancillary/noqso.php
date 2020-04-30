<?php include '../../../header.php'; echo head('No Quasar Left Behind'); ?>

<h2>Summary</h2>

<p>An attempt to find all likely quasars in the 220-square-degree footprint of SDSS Stripe 82,
selecting based only on variable source light curve data.</p>

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
<td>QSO_VAR</td>
<td>3</td>
<td>Likely quasar selected by "No Quasar Left Behind" program</td>
<td>6.0</td>
</tr>

</table>


<h2>Description</h2>

<p>We observed unresolved sources that had not been previously observed in SDSS spectroscopy
that exhibit photometric variability statistically similar to that of spectroscopically
confirmed quasars. Out of 11,000 variable sources with 16.2 &lt; i<sub>PSF</sub> &lt; 20.5,
we selected 1,500 targets identified using the technique outlined in Butler &amp; Bloom (2011).
The sample complements the sample from the ancillary product
<a href="dr9/algorithms/ancillary/varqso.php">Variability Selected Quasars</a>,
but targets brighter objects without color cuts, thus leading to a higher density of
lower-redshift quasars.</p>

<p>The adopted variability-based selection criteria correctly identify 96 percent of previously
known quasars. Overall, than 80 percent of these ancillary targets are expected to be quasars
in the redshift range 0 &lt; z &lt; 5.</p>

<p>The brightest of these targets (i<sub>PSF</sub> &lt; 19) were observed to test the
completeness of the color-selected SDSS sample (Ross et al. 2011). The fainter subset
represents a nearly complete sample that was selected from uniform photometry. In addition,
this ancillary target program provides an invaluable training sample for optimizing quasar
selection algorithms based on photometric variability, which will be vital for planning future
synoptic surveys.</p>


<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://butler.lab.asu.edu/">Nat Butler</a></th></tr>
<tr><td>Arizona State University</td></tr>
<tr><td>natbutler -at- asu.edu</td></tr>
</table>


<h2>Other contacts</h2>

<p>
Nic Ross, &#381;eljko Ivezii&#263;, Chelsea MacLeod, Amy Kimball, Scott Anderson, Rob Gibson,
Neil Brandt, Michael Strauss
</p>


<h2>REFERENCES</h2>

<p>
Butler, N. R. &amp; Bloom, J. S. 2011, AJ, 141, 93<br />
Ross, A. J., et al. 2011, MNRAS, 417, 1350<br />
</p>



<?php echo foot(); ?>

