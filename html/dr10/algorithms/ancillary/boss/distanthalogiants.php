<?php include '../../../../header.php'; echo head('Distant Halo Giants'); ?>

<h2>Summary</h2>

<p>Spectra of class K giant stars in the outer halo of the Milky Way</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET1</code> value include one or more of
the bitmasks in the following table was targeted for spectroscopy as part of this ancillary
target program. See <a href="dr10/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how
to use these values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Sub-program<br />(bit name)</th>
<th>Bit Number</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
<th>Survey Area<br />(deg<sup>2</sup>)</th>
</tr>

<tr>
<td>RED_KG</td>
<td>48</td>
<td>0.75</td>
<td>10,000</td>
</tr>

<tr>
<td>RVTEST</td>
<td>49</td>
<td>~0.75 </td>
<td>~50</td>
</tr>

</table>



<h2>Description</h2>

<p>Rare giants in the outer halo of the Milky Way are selected using a targeting strategy
tested in SEGUE2 (the SDSS-III counterpart to SEGUE;
<a href="http://adsabs.harvard.edu/abs/2009AJ....137.4377Y">Yanny et al. 2009</a>,
Rockosi et al., <i>in prep.</i>).
Observations of the new BOSS targets are expected to increase the number of known halo stars
beyond 60 kpc by a factor of ten. The full sample <span class="term">RED_KG</span>
will enable measurements of substructure of the Milky Way in position-velocity phase-space,
a signature of the hierarchical assembly of the stellar halo. The data will thus provide
tests of CDM predictions for galaxy assembly in a part of the Galaxy expected to be almost
entirely composed of debris from recent accretions
(<a href="http://adsabs.harvard.edu/abs/2011ApJ...738...79X">Xue et al. 2011</a>).
The sample will also enable dynamical mass estimates for the Milky Way out to 150 kpc. </p>


<h2>Target Selection Details</h2>

<p>The following object selection criteria were used:</p>

<ul>
  <li> 17 &lt; g<sub>fib2</sub> &lt; 19.5  </li>
  <li> Color box, with PSF - gPSF, gPSF - rPSF) corners of (0.8,2.35), (0.8,2.65),
                         (1.4,3.0), and (1.4,3.9) </li>
</ul>

<p>
The first two selection criteria identify stars near the tip of the red giant branch in the
  region of the (u-g)/(g-r)
diagram where giants separate from the locus of foreground dwarfs (Yanny et al. 2009). In addition,
it is required that  </p>
<ul>
<li> Total proper motion be &lt; 11 mas/year, zero within three standard deviations of the proper
                       motion errors (to reject nearby stars.) </li>
<li>The 3'' fiber magnitude must be i > 16.5 (an additional mechanism to reject bright targets).</li>
</ul>

<p> A smaller sample
  of targets is found on the commissioning plates. Denoted <span class="term">RVTEST</span>, this sample targets stars
previously observed
spectroscopically as a test of the reproducibility of velocity measurements.
</p>



<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://www.ucolick.org/~crockosi/">Connie Rockosi</a></th></tr>
<tr><td>UC Santa Cruz and UCO/Lick Observatory</td></tr>
<tr><td>crockosi -at- ucolick.org</td></tr>
</table>


<h2>Other contacts</h2>
<p>Heather Morrison, Paul Harding</p>


<h2>REFERENCES</h2>

<p>
Yanny, B., et al., 2009, AJ, 137, 4377,
<a href="http://iopscience.iop.org/1538-3881/137/5/4377/">doi:10.1088/0004-6256/137/5/4377</a><br />

Xue, X.-X., Rix, H-W., Yanny, B., Beers, T.C., Bell, E.F., Zhao, G., Bullock, J.S.,
Johnston, K.V., Morrison, H., Rockosi, C., Koposov, S.E., Kang, X., Liu, C., Luo, A.,
Lee, Y.S., Weaver, B.A., 2011, ApJ, 738, 79,
<a href="http://iopscience.iop.org/0004-637X/738/1/79/">doi:10.1088/0004-637X/738/1/79</a><br />
</p>



<?php echo foot(); ?>

