<?php include '../../../header.php'; echo head('High-Redshift Quasars'); ?>

<h2>Summary</h2>

<p>Spectra of candidate high-redshift quasars identified from SDSS imaging. Separate target
selection was carried out in the 220 deg<sup>2</sup> footprint of SDSS Stripe 82 and in the
7,650 deg<sup>2</sup> area of DR7 imaging.</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET2</code> value include one or more of the bitmasks
in the following table was targeted for spectroscopy as part of this ancillary target program.
See <a href="dr9/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how to use these
values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Program<br />(bit name)</th>
<th>Bit number</th>
<th>Target Description</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td>QSO_GRI</td>
<td>29</td>
<td>Quasar candidate selected in <i>gri</i> color space</td>
<td>2.7 (<i>Stripe 82</i>);<br />0.8 (<i>elsewhere</i>)</td>
</tr>

<tr>
<td>QSO_HIZ</td>
<td>30</td>
<td>Quasar candidate detected only in SDSS <i>i</i> and <i>z</i> filters</td>
<td>0.7 (<i>Stripe 82</i>);<br />0.2 (<i>elsewhere</i>)</td>
</tr>

<tr>
<td>QSO_RIZ</td>
<td>31</td>
<td>Quasar candidate selected in <i>riz</i> color space</td>
<td>1.2 (<i>Stripe 82</i>);<br />0.6 (<i>elsewhere</i>)</td>
</tr>

</table>


<h2>Description</h2>

<p>High-redshift quasars trace the evolution of early generations of supermassive
black holes, provide tests for models of quasar formation and AGN evolution, and
probe evolution in the intergalactic medium (IGM). However, the BOSS quasar survey
(Ross et al. 2012) selects objects only to z ~ 3.5. Light emitted by
high-redshift quasars at wavelengths shorter than Ly&alpha; is absorbed by the intergalactic
medium, meaning that for redshifts z &gt; 5.7, quasars are detected in only the <i>z</i> band,
the reddest filter in the SDSS imaging survey.</p>

<p>This BOSS ancillary target program uses areas of SDSS imaging where there is overlap
between stripes, meaning that objects in those areas have more than one SDSS detection. This
serves to reduce contamination from cosmic rays and improves the photometry, allowing
selection of high-redshift quasar candidates in three redshift ranges to fainter
magnitudes than in the SDSS survey.</p>


<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://sancerre.as.arizona.edu/~fan">Xiaohui Fan</a></th></tr>
<tr><td>University of Arizona</td></tr>
<tr><td>fan -at- as.arizona.edu</td></tr>
</table>

<h2>Other contacts</h2>

<p>Linhua Jiang, Gordon Richards, Michael Strauss</p>


<h2>Target Selection Details</h2>

<p>For the main survey, PSF magnitudes for objects with multiple detections were
extracted from the
<a href="http://cas.sdss.org/dr7/en/help/browser/browser.asp?n=Neighbors&amp;t=U">Neighbors</a>
table in <a href="http://cas.sdss.org/dr7/en/">DR7 SkyServer</a>, and detections were co-added
in each band. Target selection was performed on the coadded photometry.</p>

<p>For objects within Stripe 82, PSF magnitudes were extracted from the coadded image catalogs
described in Annis et al. (2011). The Stripe 82 coadd catalogs combine roughly twenty epochs
instead of just two, and thus allow selection of targets at fainter magnitudes.</p>

<p>The first part of this ancillary target program targets objects with color cuts similar to
those imposed in the SDSS-I quasar survey (Richards et al. 2002). The SDSS quasar target
selection defined two inclusion regions in <i>gri</i> and <i>riz</i> color space for targeting
quasars at z &gt; 3.6 and z &gt; 4.5, respectively (Richards et al. 2002). Both this
ancillary target selection program and the
<a href="dr9/algorithms/ancillary/ukidss.php">High-Redshift Quasars from SDSS and UKIDSS</a>
program are straightforward extensions of these color selection criteria to fainter magnitudes,
with limits of <i>i<sub>PSF</sub></i> &lt; 21.3 in the main survey regions and
<i>i<sub>PSF</sub></i> &lt; 21.5 (compared to <i>i<sub>PSF</sub></i> &lt; 20.2 for SDSS-I). The
ancillary target flag <span class="term">QSO_GRI</span> is assigned to objects that met the
<i>gri</i> color criteria, and the flag <span class="term">QSO_RIZ</span> to those
meeting the <i>riz</i> criteria. In both cases, the primary color cut follows a diagonal
line in the respective color plane.</p>

<h2>REFERENCES</h2>
<p>
Annis, J.A., Soares-Santos, M., Strauss, M.A., Becker, A.C., Dodelson, S., Fan, X., Gunn, J.E.,
Hao, J., Ivezi&#263;, &#381;, Jester, S., Jiang, L., Johnston, D.E., Kubo, J.M., Lampeitl, H., Lin, H.,
Lupton, R.H., Miknaitis, G., Seo, H-J., Simet, M., &amp; Yanny, B., 2011,
<a href="http://arxiv.org/abs/1111.6619">arXiv:1111.6619</a><br />
Richards, G. T., et al. 2002, AJ, 123, 2945<br />
Ross, N. P., et al. 2012, ApJS, 199, 3
</p>

<?php echo foot(); ?>

