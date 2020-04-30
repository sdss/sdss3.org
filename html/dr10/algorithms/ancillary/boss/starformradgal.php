<?php include '../../../../header.php'; echo head('Star-Forming Radio Galaxies'); ?>


<h2>Finding Targets</h2>

<p>An object whose <span class="term">ANCILLARY_TARGET1</span> value include one or more of
the bitmasks in the following table was targeted for spectroscopy as part of this ancillary
target program. See <a href="dr10/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how
to use these values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Primary Program</th>
<th>Sub-program<br />(bit name)</th>
<th>Bit Number</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
<th>Survey Area<br />(deg<sup>2</sup>)</th>
</tr>

<tr>
<td>Star Forming Radio Galaxies</td>
<td>BLUE_RADIO</td>
<td>56</td>
<td>0.4</td>
<td>10,000</td>
</tr>

</table>

<h2>Description</h2>

<p>Joint analysis of SDSS, FIRST, and the NRAO VLA Sky Survey
(NVSS; Condon et al. 1998) has shown that low redshift radio AGNs play an
essential role in regulating the growth of massive galaxies
(e.g. Best et al. 2005, 2007). However, much less is known about the
detailed interplay of gas cooling and radio
feedback in more luminous radio galaxies at higher redshifts. Current
samples are incomplete, in particular for radio
galaxies with significant on-going star formation.  </p>


<h2>Target Selection Details</h2>

<p>This ancillary program selects radio galaxies with blue colors at
z &gt; 0.3 that would otherwise be missed from the LOWZ
and CMASS samples.

Galaxy targets were selected from DR7
according to the following criteria:  </p>

<ul>
  <li> extended morphology in SDSS photometry; </li>
  <li> clean <i>ugriz</i> model photometry and 17 &lt; <i>i</i> &lt; 19.9;  </li>
  <li> <i>i<sub>fib2</sub></i> &lt; 21.7; </li>
  <li>[(<i>g - r</i>) &gt; 1.45] OR [(<i>u - g</i>) &lt; 1.14 * (<i>g - r</i>)],
where photometry is determined from model magnitudes. </li>
</ul>

<p>The last criterion is designed to color-select objects at z &gt; 0.3.
We cross-matched this
sample with the FIRST catalog (July 2008 version) and selected all objects
within 3" of FIRST sources with fluxes &gt; 3.5 mJy.
Most targets were within 1.5". Finally, we rejected
objects spectroscopically observed by SDSS-I/II, and
objects meeting the target selection criterion for
the galaxy samples. In total there were 4610 targets; we randomly
sampled these to produce a final list of 4170 ancillary targets.</p>



<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://www.mpa-garching.mpg.de/mpa/institute/members/popups/IMdTclb3pp5Ag.html">Guinevere Kauffmann</a></th></tr>
<tr><td>MPA-Garching</td></tr>
<tr><td>gkauffmann -at- mpa-garching.mpg.de</td></tr>
</table>


<h2>Other contacts</h2>

<p>Christy Tremonti, Tim Heckman, Kevin Bundy, Yen-Ting Lin, Yan-Mei Chen</p>

<h2>REFERENCES</h2>

<p>
Condon, J. J., et al., 1998, AJ, 115, 1693
<a href="http://iopscience.iop.org/1538-3881/115/5/1693/">doi:10.1086/300337</a><br />
Best, P. N., et al., 2005, MNRAS, 362, 25 <br />
Best, P. N., et al., 2007, MNRAS, 379, 894 <br />


</p>



<?php echo foot(); ?>

