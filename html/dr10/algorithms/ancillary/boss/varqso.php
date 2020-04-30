<?php include '../../../../header.php'; echo head('Variability-Selected Quasars'); ?>

<h2>Summary</h2>

<p>Candidate quasars in the 220-square-degree footprint of Stripe 82, selected by variability
alone</p>

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
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td>QSO_VAR_FPG</td>
<td>4</td>
<td>Quasars selected by variability</td>
<td>3.4</td>
</tr>

</table>


<h2>Description</h2>

<p>Variability is used to improve the selection efficiency for quasars around z = 2.7 and
z ~ 3.5, where they often lie in the region of color-color space that is occupied by
the stellar locus. The selection method used in this Ancillary Target program is quite
similar to the variability target selection used to select the main sample of quasars in
Stripe 82, as described in <a href="dr10/algorithms/boss_quasar_ts.php">BOSS Quasar Target
Selection</a>. The sample from this Ancillary Target program also complements the sample
of the <a href="dr10/algorithms/ancillary/boss/noqso.php">No Quasar Left Behind</a>  program,
but the sample discussed here includes fainter quasars. This sample also results from a
loose color selection, intended to select primarily objects at z &gt; 2.15.</p>

<p>Data from this Ancillary Target program help to address the completeness of color
selections, and help to identify obscured objects that would not otherwise be selected
(more details are found in
<a href="http://adsabs.harvard.edu/abs/2011A%26A...530A.122P">Palanque-Delabrouille et al. 2011</a>). These data are also being
used to demonstrate the efficiency of variability target selection for possible
implementation in future surveys such as BigBOSS (Schlegel et al. 2011), a ground-based
dark energy experiment to study baryon acoustic oscillations and the growth of structure
with a wide-area galaxy and quasar redshift survey.</p>

<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://irfu.cea.fr/en/Pisp/nathalie.palanque-delabrouille/">Nathalie Palanque-Delabrouille</a></th></tr>
<tr><td>Institute of Research into the Fundamental Laws of the Universe (IRFU)</td></tr>
<tr><td>nathalie.palanque-delabrouille -at- cea.fr</td></tr>
</table>


<h2>Target Selection Details</h2>

<p>In this method, objects were included with i<sub>fib2</sub> &gt; 18,
(g<sub>PSF</sub> - i<sub>PSF</sub>) &lt; 2.2, (u<sub>PSF</sub> - g<sub>PSF</sub>) &gt; 0.4,
and (c<sub>1</sub> &lt; 1.5 or c<sub>3</sub> &lt; 0. Colors c<sub>1</sub> and c<sub>3</sub>
are defined in <a href="http://adsabs.harvard.edu/abs/1999AJ....118....1F">Fan et al. (1999)</a>
as:</p>

<p>
c1 = 0.95(u - g) + 0.31(g - r) + 0.11(r - i) ,<br />
c3 = -0.39(u - g) + 0.79(g - r) + 0.47(r - i) .
</p>

<p>For each object, a variability neural network was used to quantify the likelihood
that the object is a quasar. The neural network takes as an input:</p>

<ol>
  <li>the value of the &chi;<sup>2</sup> fit between each object's observed light curve
  in each band and a model which assumes no variability</li>
  <li>a structure function derived from the lightcurve as in
  <a href="http://adsabs.harvard.edu/abs/2010ApJ...714.1194S">Schmidt et al. (2010)</a></li>
</ol>

<p>Targets require a probability of being a quasar from the variability neural network
greater than 0.95. Candidate quasars are chosen from ~60 imaging epochs from the last
ten years, resulting in about 15 quasar candidates per square degree. After removal
of previously-known quasars, as well as candidates that had already been included in
the main <a href="dr10/algorithms/boss_quasar_ts.php">BOSS Quasar Target Selection</a>,
3.4 objects per square degree were selected for this sample.</p>

<p>These data address the completeness of color selections and identifies obscured
objects that would not be selected otherwise
(<a href="http://adsabs.harvard.edu/abs/2011A%26A...530A.122P">Palanque-Delabrouille
et al. 2011</a>). These
data are also being used to demonstrate the efficiency of variability target selection for
possible implementation in future surveys such as BigBOSS
(<a href="http://arxiv.org/abs/1106.1706">Schlegel et al. 2011</a>), a ground-based
dark energy experiment to study BAO and the growth of structure with deeper observations than BOSS.</p>

<h2>REFERENCES</h2>

<p>
Fan, X., et al. 1999, AJ, 118, 1,
<a href="http://iopscience.iop.org/1538-3881/118/1/1">doi:10.1086/300944</a><br />
Palanque-Delabrouille, N., et al. 2011, A&amp;A, 530, A122,
<a href="http://www.aanda.org/index.php?Itemid=129&amp;volume=530&amp;page=A122&amp;option=com_article&amp;access=linkmanager&amp;edpsname=aa&amp;lang=en">doi:10.1051/0004-6361/201016254</a><br />
Schlegel, D., et al. 2011, <a href="http://arxiv.org/abs/1106.1706">arXiv:1106.1706</a>
<br />
Schmidt, K. B., Marshall, P. J., Rix, H.-W., Jester, S., Hennawi, J. F.,
&amp; Dobler, G. 2010, ApJ, 714, 1194,
<a href="http://iopscience.iop.org/0004-637X/714/2/1194">doi:10.1088/0004-637X/714/2/1194</a>
</p>



<?php echo foot(); ?>

