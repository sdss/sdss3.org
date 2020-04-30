<?php include '../../../../header.php'; echo head('Low-Mass Binary Stars'); ?>

<h2>Summary</h2>

<p>Spectra for widely-separated binary stars of spectral class M</p>

<!--
<p class="todo">TODO: Dhital/Dawson: survey area???</p>
-->

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET1</code> value includes one or more of
the bitmasks in the following table was targeted for spectroscopy as part of this ancillary
target program. See <a href="dr10/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how
to use these values to identify objects in this ancillary target program.</p>

<p>Note the <a href="dr10/algorithms/ancillary/boss/lowmassbinary.php#caveat">caveat</a> regarding
observations of these targets on some early BOSS plates</p>

<table class="ancillary">
<tr>
<th>Program<br />(bit name)</th>
<th>Bit</th>
<th>Target Description</th>
<!--<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>-->
</tr>

<tr>
<td>SPOKE</td>
<td>41</td>
<td>Widely-separated binary systems in which both stars are low-mass (spectral class M)</td>
</tr>

</table>


<h2>Description</h2>

<p>Ultra-wide, low-mass binaries probe how dynamical interactions affect and
shape star formation process and the environments in which those processes occur.
Such binaries are also ideal coeval laboratories to constrain and calibrate properties of
low-mass stars, because the two stars in the binary system were presumably born at the
same time, from the same material.</p>

<p>The Sloan Low-mass Wide Pairs of Kinematically Equivalent Stars
(SLoWPoKES; <a href="http://adsabs.harvard.edu/abs/2010AJ....139.2566D">Dhital et al. 2010</a>)
catalog is the largest sample so far of wide, low-mass binaries. The objects in the catalog
were identified from common proper motions and photometric distances, but without any
information about stellar radial velocities. The goal of this ancillary target program was to
get RV information about these stars to better constrain their binary system
membership, which will in turn lead to a better understanding of widely-separated
binary star systems.</p>


<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://vpac00.phy.vanderbilt.edu/~dhitals/">Saurav Dhital</a></th></tr>
<tr><td>Boston University</td></tr>
<tr><td>saurav -at- bu.edu</td></tr>
</table>


<h2>Other contacts</h2>

<p>Keivan Stassun</p>


<h2>Target selection details</h2>

<p>Targets for this program were selected in two ways:</p>
<ul>
<li>SLoWPoKES systems of spectral type M0 or later that have robust SDSS/USNO-B proper motions
(<a href="http://adsabs.harvard.edu/abs/2004AJ....127.3034M">Munn et al. 2004</a>)</li>
<li>systems of spectral type M4 or later, without proper motions</li>
</ul>

<p>Both sets of targets were selected to have angular separations of 65-180 arcsec, to
avoid fiber collisions; and also to be brighter than <i>i<sub>fib2</sub></i> = 20 to
achieve the critical signal-to-noise radio. The pairs from the second sub-sample
(M4 or later) are valuable for probing lower-mass, mid-to-late-type-M stars, which were
underrepresented in SLoWPoKES.</p>

<p>Although the lack of proper motion matching for pairs in the second target selection
sub-sample would make them more susceptible to chance alignments, the BOSS radial velocities
obtained by this ancillary target program confirm or disprove their common motions.</p>

<p>From the combined sample using both target selection methods, 500 pairs were randomly
selected for targeting with BOSS, with both stellar components being observed. The measured radial
velocities can be used to verify the physical association of the ultra-wide binaries; this
will be especially important for the second set of targets for which there were no previously-known
proper motions. The spectra can be used to measure and calibrate the metallicity and
mass-age-activity relationship for low-mass stars (e.g.,
<a href="http://adsabs.harvard.edu/abs/2012AJ....143...67D">Dhital et al. 2012</a>), especially
at mid-late M spectral types.</p>

<h2 id="caveat">Caveat</h2>

<p>There was an error in correcting the positions of the target for their proper motions in
the first year of the ancillary target program, affecting targets in plates numbered less than
3879 or between 3965-3987.</p>




<h2>REFERENCES</h2>

<p>
Dhital, S., West, A. A., Stassun, K. G., and Bochanski, J. J., 2010, AJ, 139, 2556,
<a href="http://iopscience.iop.org/1538-3881/139/6/2566/">doi:10.1088/0004-6256/139/6/2566</a><br />
Dhital, S., West, A. A., Stassun, K. G., Bochanski, J. J., Massey, A. P., and Bastein, F. A.,
2012, AJ, 143, 67,
<a href="http://iopscience.iop.org/1538-3881/143/3/67"> doi:10.1088/0004-6256/143/3/67</a> <br />
Munn, J. A., et al., 2004, AJ, 127, 3034, <a href="http://iopscience.iop.org/1538-3881/127/5/3034/">
doi:10.1086/383292</a>
</p>



<?php echo foot(); ?>

