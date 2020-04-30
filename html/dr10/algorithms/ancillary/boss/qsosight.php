<?php include '../../../../header.php'; echo head('Galaxies Near SDSS Quasar Sight Lines'); ?>

<h2>Summary</h2>

<p>Spectra of galaxies in the SDSS
<a href="http://www.sdss.org/dr7/coverage/index.html">Data Release 7 imaging area</a>
(7,650 deg<sup>2</sup>) which are close on the sky to known quasars, meaning that they
lie along the quasar's line-of-sight</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET1</code> value includes one or more of
the bitmasks in the following table was targeted for spectroscopy as part of this ancillary
target program. See <a href="dr10/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how
to use these values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Program<br />(bit name)</th>
<th>Bit</th>
<th>Target Description</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td>GAL_NEAR_QSO</td>
<td>62</td>
<td>A galaxy that lies between 0.006' and 1' of the line-of-sight for a spectroscopically-confirmed
quasar</td>
<td>0.3</td>
</tr>

</table>

<h2>Description</h2>

<p>Obtaining accurate redshifts of galaxies that are projected on the sky near to the lines-of-sight
to quasars allows for detailed studies of the properties of galaxies that are associated with
intervening quasar absorption systems. Such systems could not be studied with the SDSS-I/-II
spectrograph due to fiber collisions, but new the BOSS spectrograph makes it possible to
spectroscopically observe objects at close separations.</p>

<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://mingus.as.arizona.edu/~bjw/">Benjamin Weiner</a></th></tr>
<tr><td>University of Arizona</td></tr>
<tr><td>bjw -at- as.arizona.edu</td></tr>
</table>


<h2>Other contacts</h2>

<p>Christy Tremonti, Jeremy Tinker, Jill Bechtold, Patrick Petitjean,
Tim Heckman, Brice M&eacute;nard</p>


<h2>Target selection details</h2>

<p>Galaxy targets are selected by a <i>ugr</i> color cut to lie in a redshift range (z &gt; 0.35),
where the 2800 &Aring; MgII line is detectable in SDSS spectra. The sample of spectroscopically-confirmed
quasars used for target selection in this program was selected to have model magnitudes
<i>g</i> &lt; 19.2 and redshift 0.7 &lt; z &lt; 2.1 from the SDSS DR7 quasar catalog
(catalog in <a href="http://adsabs.harvard.edu/abs/2010yCat.7260....0S">Schneider et al. 2010a</a> and
source paper in <a href="http://adsabs.harvard.edu/abs/2010AJ....139.2360S">Schneider et al. 2010b</a>).
Galaxies were chosen that lie between 0.006' and 1' of a quasar with existing SDSS spectroscopy.
To photometrically select galaxies in the target redshift range (z &gt; 0.35), galaxies were
selected with model magnitudes 17.5 &lt; <i>i</i> &lt; 19.9, A<sub>g</sub> &lt; 0.3, and
[(g-r) &gt; 1.65 OR (u-g) &lt; 1.14(g-r)-0.4].</p>

<p>The sample is weighted to have similar numbers of galaxies at separations
b &lt; 0.5' and 0.5' &lt; b &lt; 1'. This sample of approximately 3,000 galaxies will help
answer questions such as: is absorption is correlated with galaxy type?; What is the covering
fraction of absorption as a function of galaxy radius?; and what is the size of velocity offsets?</p>


<h2>REFERENCES</h2>

<p>
Schneider, D.P. et al. 2010a, catalog, bibliographic code:
<a href="http://adsabs.harvard.edu/abs/2010yCat.7260....0S">2010yCat.7260....0S</a><br />
Schneider, D.P. et al. 2010b, AJ, 139, 2360,
<a href="http://iopscience.iop.org/1538-3881/139/6/2360/">doi:10.1088/0004-6256/139/6/2360</a>
</p>



<?php echo foot(); ?>

