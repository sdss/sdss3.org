<?php include '../../header.php'; echo head('ZWARNING: Warnings for SDSS spectra.'); ?>

<p>Spectra with <code>zWarning</code> equal to zero have no known
problems. If <code>MANY_OUTLIERS</code> is set, that usually indicates
a high signal-to-noise spectrum or broad emission lines in a galaxy;
that is, <code>MANY_OUTLIERS</code> only rarely signifies a real
error.</p>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td>SKY</td>
<td>0</td>
<td>sky fiber</td>
</tr>
<tr>
<td>LITTLE_COVERAGE</td>
<td>1</td>
<td>too little wavelength coverage (WCOVERAGE &lt; 0.18)</td>
</tr>
<tr>
<td>SMALL_DELTA_CHI2</td>
<td>2</td>
<td>chi-squared of best fit is too close to that of second best (&lt; 0.01 in reduced chi-sqaured)</td>
</tr>
<tr>
<td>NEGATIVE_MODEL</td>
<td>3</td>
<td>synthetic spectrum is negative (only set for stars and QSOs)</td>
</tr>
<tr>
<td>MANY_OUTLIERS</td>
<td>4</td>
<td>fraction of points more than 5 sigma away from best model is too large (&gt; 0.05)</td>
</tr>
<tr>
<td>Z_FITLIMIT</td>
<td>5</td>
<td>chi-squared minimum at edge of the redshift fitting range (Z_ERR set to -1)</td>
</tr>
<tr>
<td>NEGATIVE_EMISSION</td>
<td>6</td>
<td>a QSO line exhibits negative emission, triggered only in QSO spectra, if C_IV, C_III, Mg_II, H_beta, or H_alpha has LINEAREA + 3 * LINEAREA_ERR &lt; 0</td>
</tr>
<tr>
<td>UNPLUGGED</td>
<td>7</td>
<td>the fiber was unplugged, so no spectrum obtained</td>
</tr>
</table>

<?php echo foot(); ?>
