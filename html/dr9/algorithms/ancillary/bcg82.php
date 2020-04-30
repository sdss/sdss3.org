<?php include '../../../header.php'; echo head('Brightest Cluster Galaxies in SDSS Stripe 82'); ?>

<h2>Summary</h2>

<p>Spectra of brightest cluster galaxies (BCGs) in the 220-square-degree stripe 82 survey area</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET2</code> value includes one or more of the bitmasks 
in the following table was targeted for spectroscopy as part of this
ancillary target program. See <a href="dr9/algorithms/bitmasks.php">SDSS-III bitmasks</a> to
learn how to use these values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Program<br />(bit name)</th>
<th>Bit in ANCILLARY_TARGET2</th>
<th>Target Description</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td>STRIPE82BCG</td>
<td>6</td>
<td>Brightest cluster galaxy in stripe 82 survey area</td>
<td>6.0</td>
</tr>

</table>


<h2>Description</h2>

<p>Over 3,000 groups and clusters have been identified photometrically in SDSS Stripe 82
(<a href="http://adsabs.harvard.edu/abs/2011MNRAS.413.3059G">Geach et al. 2011</a>; 
<a href="http://adsabs.harvard.edu/abs/2012MNRAS.420.1861M">Murphy et al. 2012</a>). 
These clusters were identified from ugriz photometry generated from the coaddition of 
Stripe 82 images 
(<a href="http://adsabs.harvard.edu/abs/2011arXiv1111.6619A">Annis et al. 2011</a>); 
this co-added image is ~ 2 mag deeper than imaging in the rest of the BOSS footprint. These
clusters have photometric redshifts in the range 0 &lt; z &lt; 0.6 (median z = 0.32), and
are expected to reside in dark matter halos with masses in excess of 2.5 x 10<sup>13</sup>
solar mass.</p>

<p>Each cluster is assigned a brightest cluster galaxy (BCG), which is simply defined as
the brightest member associated with the cluster detection. To confirm the cluster redshifts,
we obtained spectra of the likely BCGs with magnitudes 17 &lt; <i>i<sub>fib2</sub></i> &lt; 21.7 and colors 
that vary with redshift according to the cluster detection algorithm (Murphy et al. 2012).
A sample of 1,505 BCGs was identified; the BOSS spectrograph obtained spectra of 1,345 of
these galaxies. These 1,345 galaxies had not been previously included in the SDSS Data
Release 7 main galaxy sample, or in the 2SLAQ or WiggleZ samples.</p>

<p>This new sample of spectroscopically confirmed galaxy clusters will enable a wide variety
of science, including the weak lensing of groups and clusters, the link between star
formation and AGN activity in BCGs, and the LRG population of dark matter halos.</p>


<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://member.ipmu.jp/alexie.leauthaud/index.html">Alexie Leauthaud</a></th></tr>
<tr><td>University of Tokyo</td></tr>
<tr><td>alexie.leauthaud -at- ipmu.jp</td></tr>
</table>


<h2>Other contacts</h2>

<p>
James Geach, David Murphy, Nic Ross, David Wake, Richard Bower, Kevin Bundy, Kyle Dawson,
Matt George, Shirley Ho, Eric Huff, Jean-Paul Kneib, Yen-Ting Lin, Martin Makler,
Rachel Mandelbaum, Daisuke Nagai, Nikhil Padmanabhan, Erin Sheldon, Jeremy Tinker,
Frank van den Bosch, Martin White
</p>


<h2>REFERENCES</h2>

<p>
Annis, J.A., Soares-Santos, M., Strauss, M.A., Becker, A.C., Dodelson, S., Fan, X., 
Gunn, J.E., Hao, J., Ivezi&#263;, &#381;, Jester, S., Jiang, L., Johnston, D.E., 
Kubo, J.M., Lampeitl, H., Lin, H., Lupton, R.H., Miknaitis, G., Seo, H-J., 
Simet, M., &amp; Yanny, B., 2011, <a href="http://arxiv.org/abs/1111.6619">arXiv:1111.6619</a><br />
Geach, J. E., Murphy, D. N. A., &amp; Bower, R. G. 2011, MNRAS, 413, 3059, 
<a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1365-2966.2011.18380.x/abstract">
doi:10.1111/j.1365-2966.2011.18380.x</a><br />
Murphy, D. N. A., Geach, J. E., &amp; Bower, R. G. 2012, MNRAS, 420, 1861, 
<a href="http://onlinelibrary.wiley.com/doi/10.1111/j.1365-2966.2011.19782.x/abstract">
doi:10.1111/j.1365-2966.2011.19782.x</a>
</p>


<?php echo foot(); ?>

