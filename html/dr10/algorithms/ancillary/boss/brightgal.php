<?php include '../../../../header.php'; echo head('Bright Galaxies'); ?>

<h2>Summary</h2>

<p>A search for bright galaxies that were missed by prior SDSS spectroscopic surveys</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET1</code> value include one or more of
the bitmasks in the following table was targeted for spectroscopy as part of this ancillary
target program. See <a href="dr10/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how
to use these values to identify objects in this ancillary target program.</p>

<table class="ancillary" style="float:right;margin-left:20px;">
<tr>
<th>Program<br />(bit name)</th>
<th>Bit Number</th>
<!--<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
<th>Survey Area<br />(deg<sup>2</sup>)</th>-->
</tr>

<tr>
<td>BRIGHTGAL</td>
<td>21</td>
</tr>

</table>


<h2>Description</h2>

<p>
Bright galaxies were commonly missed in the original SDSS spectroscopic survey due to fiber
collisions, bright limits (objects with model magnitudes r &gt;15, g &gt;15,
or i &gt;14.5 were excluded), and errors in the deblending of overlapping images
(<a href="http://adsabs.harvard.edu/abs/2002AJ....124.1810S">Strauss et al. 2002</a>).
Approximately 10% of the brightest galaxies were not
spectroscopically observed
(<a href="http://adsabs.harvard.edu/abs/2007AJ....134..579F">Fukugita et al. 2007</a>).
To improve the completeness of this spectroscopic sample, we have implemented the
selection criteria described below. </p>

<h2>Target Selection Details</h2>
<p>
Objects were chosen with  </p>

<ul>
<li> Petrosian radius &gt;1" in r (to reject stars) </li>
<li> No saturated pixels </li>
<li> Extinction-corrected, Petrosian
(<a href="http://adsabs.harvard.edu/abs/1976ApJ...209L...1P">Petrosian 1976</a>;
<a href="http://adsabs.harvard.edu/abs/2002AJ....124.1810S">Strauss et al. 2002</a>) r
magnitude between 10 and 16.  </li>
<li> Extinction-corrected Petrosian magnitude i &lt;20 and z &lt;20 (to exclude misidentified satellite tracks which would not show up in the other bands). </li>
</ul>


<p>
Galaxies without spectra (24,000 from the original list of 93,000) where then visually
vetted to remove foreground stars that remained in the sample, detector artifacts
(e.g. internal reflections) that were
misidentified, and other sources of confusion. In cases where a foreground star was
misidentified as the galaxy center,
the target position was moved to the correct position. In cases of merging galaxies,
we visually identified multiple
targets corresponding to the centers of each galaxy. The list was cross-correlated with
the Third Reference Catalog of Bright Galaxies (RC3 de Vaucouleurs et al. 1991; Corwin
et al. 1994), and any targets that did not appear in the
original SDSS spectroscopic survey were added to the target list (0.05%
of the final list). Finally, targets within 2'' of a star that appears in the
Tycho-2 Catalog
(<a href="http://adsabs.harvard.edu/abs/2000A%26A...355L..27H">H&#248;g et al. 2000</a>) were removed. The final sample includes 8637 galaxies
over the BOSS footprint. </p>



<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://www.physics.nyu.edu/people/muna.demitri.html">Demitri Muna</a></th></tr>
<tr><td>New York University</td></tr>
<tr><td>demitri.muna -at- nyu.edu</td></tr>
</table>



<h2>REFERENCES</h2>

<p>
Fukugita, M., Nakamura, O., Okamura, S., Yasuda, N., Barentine, J.C., Brinkmann, J.,
Gunn, J.E., Harvanek, M., Ichikawa, T., Lupton, R.H., Schneider, D.P., Strauss, M.A.,
&amp; York, D.G., 2007, AJ, 134, 579
<a href="http://iopscience.iop.org/1538-3881/134/2/579">doi:10.1086/518962</a> <br />



Strauss, M. A., Weinberg, D.H., Lupton, R.H., Narayanan, V.K., Annis, J., Bernardi, M.,
Blanton, M., Burles, S., Connolly, A.J., Dalcanton, J., Doi, M., Eisenstein, D.,
Frieman, J.A., Fukugita, M., Gunn, J.E., Ivezi&#263;, &#381;, Kent, S., Kim, R.S.J.,
Knapp, G.K., Kron, R.G., Munn, J.A., Newberg, H.J., Nichol, R.C., Okamura, S., Quinn, T.R.,
Richmond, M.W., Schlegel, D.J., Shimasaku, K., SubbaRao, M., Szalay, A.S., Vanden Berk, D.,
Vogeley, M.S., Yanny, B., Yasuda, N., York, D.G., &amp; Zehavi, I.,  2002, AJ, 124, 1810
<a href="http://iopscience.iop.org/1538-3881/124/3/1810/">doi:10.1086/342343</a> <br />


Petrosian, V., 1976, ApJ, 209, L1
<a href="http://adsabs.harvard.edu/abs/1976ApJ...209L...1P">doi:10.1086/182253</a><br />

H&#248;g, E., Fabricius, C., Makarov, V.V., Urban, S., Corbin, T., Wycoff, G., Bastian, U.,
Schwekendiek, P., Wicenec, A., 2000, A&amp;A, 355, L27,
<a href="http://adsabs.harvard.edu/abs/2000A%26A...355L..27H">Link to PDF</a><br />
</p>



<?php echo foot(); ?>

