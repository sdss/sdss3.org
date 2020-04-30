<?php include '../../../../header.php'; echo head('High-Redshift Quasars from SDSS and UKIDSS'); ?>

<h2>Summary</h2>

<p>Spectra of candidate high-redshift quasars, </p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET2</code> value include one or more of the bitmasks
in the following table was targeted for spectroscopy as part of this ancillary target program.
See <a href="dr10/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how to use these
values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Program<br />(bit name)</th>
<th>Bit in ANCILLARY_TARGET2</th>
<th>Target Description</th>
<th>Survey Area (deg<sup>2</sup>)</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td>HIZQSO82</td>
<td>0</td>
<td>Quasar candidate selected with UKIDSS <i>YJHK</i> photometry</td>
<td>220</td>
<td>0.5</td>
</tr>

<tr>
<td>HIZQSOIR</td>
<td>1</td>
<td>Quasar candidate in SDSS Stripe 82, selected with UKIDSS <i>YJHK</i> photometry</td>
<td>700</td>
<td>0.3</td>
</tr>

</table>


<h2>Description</h2>

<p>This ancillary program described here targets high-redshift quasar candidates through
a combination of color cuts combining SDSS <i>ugriz</i> PSF magnitudes and <i>YJHK</i>
aperture photometry (with 1" radius apertures) from the
<a href="http://www.ukidss.org/">UKIRT Infrared Deep-Sky Survey</a>. The addition of
infrared photometry from UKIDSS provides leverage to separate quasars at z ~ 5.5 from the
red end of the stellar locus. (In fact, the SDSS quasar survey was limited to
z &lt; 5.4 by the strong overlap in <i>ugriz</i> colors between high-redshift quasars and
red stars.</p>

<h2>Primary contact</h2>

<table class="contact">
<tr><th><p>Ian McGreer</p></th></tr>
<tr><td>University of Arizona</td></tr>
<tr><td>imcgreer -at- email.arizona.edu</td></tr>
</table>

<h2>Other contacts</h2>

<p>Xiaohui Fan, Linhua Jiang</p>


<h2>Target Selection Details</h2>

<p>Quasar candidates were selected by matching stellar objects from the
<a href="http://www.sdss.org/dr7">SDSS DR7</a> and
<a href="http://www.ukidss.org/dr3.html">UKIDSS DR3</a> databases. The initial target selection
sample is drawn from SDSS with color cuts <i>r - i</i> &gt; 1.4, i - z &gt; 0.5, as well as
a magnitude cut of z &lt; 20.2. Likely stars are rejected with the criteria
<i>(H - K)<sub>Vega</sub></i> &lt; 0.53 or <i>(J - K)<sub>Vega</sub></i> &lt;
1.3<i>(Y - J)<sub>Vega</sub></i> + 0.32, taking advantage of the fact that quasars are
redder than M stars at longer wavelengths and bluer at shorter wavelengths.</p>

<p>The remaining candidates are then prioritized based on <i>izYJK</i> colors. In Stripe 82,
the color criteria used for prioritizing targets were slightly relaxed, owing to the coadded
<i>ugriz</i> photometry available from Annis et al. (2011), which greatly reduced initial
stellar contamination from <i>riz</i> selection. Objects selected with the relaxed
criteria on Stripe 82 are given the <span class="term">HIZQSO82</span> target bit.</p>


<h2>REFERENCES</h2>
<p>
Annis, J.A., Soares-Santos, M., Strauss, M.A., Becker, A.C., Dodelson, S., Fan, X., Gunn, J.E.,
Hao, J., Ivezi&#263;, &#381;, Jester, S., Jiang, L., Johnston, D.E., Kubo, J.M.,
Lampeitl, H., Lin, H.,
Lupton, R.H., Miknaitis, G., Seo, H-J., Simet, M., &amp; Yanny, B., 2011,
<a href="http://arxiv.org/abs/1111.6619">arXiv:1111.6619</a>
</p>

<?php echo foot(); ?>

