<?php include '../../../header.php'; echo head('Double-lobed Radio Quasars'); ?>

<h2>Summary</h2>

<p>Spectra of point-source objects near the midpoint of a double-lobed radio quasar in FIRST</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET2</code> value include one or more of the bitmasks
in the following table was targeted for spectroscopy as part of this ancillary target program.
See <a href="dr9/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how to use these
values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Program<br />(bit name)</th>
<th>Bit in <code>ANCILLARY_TARGET2</code></th>
<th>Target Description</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td>RADIO_2LOBE_QSO</td>
<td>5</td>
<td>Object near the midpoint of a double-lobed object identified in FIRST</td>
<td>0.08</td>
</tr>

</table>


<h2>Description</h2>

<p>Objects identified as optical point sources near the midpoint of pairs of FIRST radio
sources are observed as potential double-lobed radio quasars. Such quasars are important
for studying quasar evolution and interactions of radio jets with their local environment.</p>

<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://www.cv.nrao.edu/~akimball/">Amy Kimball</a></th></tr>
<tr><td>CSIRO</td></tr>
<tr><td>Amy.Kimball -at- csiro.au</td></tr>
</table>


<h2>Target Selection Details</h2>


<p>Candidates are selected by identifying FIRST pairs with a separation less than 60" and
no SDSS optical counterpart within 2" of either source. SDSS point sources located within
a search radius that ranges between 2" and 5.3" (depending on the separation distance
of the FIRST pair) from the midpoint are targeted. FIRST pairs with a flux ratio &gt; 10 are
rejected because true double-lobed sources are unlikely to have a high ratio of lobe-lobe
flux density. The final catalog includes objects not spectroscopically observed with
SDSS, not targeted in the main BOSS sample, and with 17.8 &lt; i &lt; 21.6
(Galactic extinction-corrected).</p>


<?php echo foot(); ?>

