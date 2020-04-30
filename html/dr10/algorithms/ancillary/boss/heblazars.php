<?php include '../../../../header.php'; echo head('High Energy Blazars and Optical Counterparts of Gamma-ray Sources'); ?>

<h2>Summary</h2>

<p>A search for the optical counterparts of Fermi gamma-ray source in a 7,650 square degree
area of sky</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET1</code> value includes one or more of
the bitmasks in the following table was targeted for spectroscopy as part of this ancillary
target program. See <a href="dr10/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how
to use these values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Sub-program<br />(bit name)</th>
<th>Bit number</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td>BLAZGRFLAT</td>
<td>50</td>
<td>0.02</td>
</tr>

<tr>
<td>BLAZGRQSO</td>
<td>51</td>
<td>0.02 </td>
</tr>

<tr>
<td>BLAZGX</td>
<td>52</td>
<td>0.01 </td>
</tr>

<tr>
<td>BLAZGXQSO</td>
<td>53</td>
<td>0.01 </td>
</tr>

<tr>
<td>BLAZGXR</td>
<td>54</td>
<td>0.03 </td>
</tr>

<tr>
<td>BLAZXR</td>
<td>55</td>
<td>0.11 </td>
</tr>

</table>



<h2>Description</h2>

<p>We targeted candidate optical
counterparts of sources detected (or likely to be detected) by NASA's Fermi
Gamma-ray Space Telescope
(<a href="http://adsabs.harvard.edu/abs/2009ApJ...697.1071A">Atwood et al. 2009</a>), with the
goal to spectroscopically confirm and provide redshifts for candidate gamma-ray blazars. </p>



<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://www.astro.washington.edu/users/anderson/">Scott Anderson</a></th></tr>
<tr><td>University of Washington</td></tr>
<tr><td>anderson -at- astro.washington.edu</td></tr>
</table>


<h2>Other contacts</h2>

<p>Toby Burnett</p>

<h2>Target selection details</h2>

<p>We require:</p>
<ul>
   <li> Model magnitude &lt; 21 in any of the three bandpasses g, r, or i. </li>
  <li> 3" fiber magnitudes &gt; 16.5 (to minimize impact of fiber cross-talk). </li>
</ul>

<p>Ranked in approximate order of priority, fibers are assigned to targets
from the following subprograms: </p>
<ul>

   <li><span class="term">BLAZGXR</span>: about 300 blazar candidates are assigned at highest
priority to DR7 optical sources within Fermi gamma-ray error ellipses. Targets must also lie within
the &lt; 1' radius error circle for X-ray sources in the ROSAT
All-Sky Survey (RASS) (Voges et al. 1999, 2000) and within 2" of a FIRST (Becker et al. 1995)
radio source. </li>


  <li><span class="term">BLAZGRFLAT</span>: about 175 blazar candidates detected with Fermi and
the Combined Radio All-Sky Targeted
Eight GHz Survey (CRATES; Healey et al. 2007). Objects from the DR7 catalog within 2" of a CRATES radio
source and within a Fermi error ellipse were targeted. </li>


  <li><span class="term">BLAZGXQSO</span>: 95 further candidate X-ray and gamma-ray emitting
quasars/blazars, including photometric
quasar/blazar candidates (Richards et al. 2009), as well as confirmed DR7 quasars/blazars
(Schneider et al. 2010)
    revisited to assess optical spectral variability. Targets are selected that lie
within &lt; 1' of a RASS X-ray source
and within Fermi error ellipses. </li>


 <li><span class="term">BLAZGRQSO</span>: 185 candidate radio and gamma-ray emitting
quasars/blazars, including both photometric
candidates (Richards et al. 2009), and DR7 confirmations (Schneider et al. 2010) revisited
to assess optical
spectral variability. Targets are selected that lie within 2" of a FIRST radio source and
within Fermi error
ellipses. </li>


 <li><span class="term">BLAZGX</span>: 75 targets that are candidate high-energy counterparts
but which lack typical (e.g., radio emission,
unusual optical color, etc.) blazar properties were targeted to probe unknown classes of
gamma ray sources. The
optically brightest objects from DR7 within the Fermi error ellipses and within 1' of a RASS
X-ray source were
preferentially targeted. </li>

 <li><span class="term">BLAZXR</span>: 1100 targets are selected that may plausibly emerge
as Fermi sources, but are still below the detection
                       limits in the early Fermi source catalogs. The
approach is similar to the "ROSAT_A" target selection scheme
described in Anderson et al. (2003) and the "pre-selection" approach of Healey et al. (2008)
that provided many
of the gamma-ray counterpart associations reported in the first Fermi catalogs (Abdo et al. 2010b,a).
Targets
are chosen from the DR7 photometry catalog with radio coincidence (within 2" of a FIRST source)
and X-ray
coincidence (&lt; 1' of a RASS source). This sample overlaps heavily with the
<span class="term">BONUS</span> quasar sample, but includes
quasars at lower redshift. </li>

</ul>

<p>In addition, there were ten miscellaneous candidate blazar spectra taken in an early
trial of this program. These targets were assigned subcategory names using the following
flags: <span class="term">BLAZGVAR</span>, <span class="term">BLAZR</span>, and
<span class="term">BLAZXRSAM</span>.</p>



<h2>REFERENCES</h2>

<p>


Atwood., W., B., et al., 2009, ApJ, 697, 1071
<a href="http://iopscience.iop.org/0004-637X/697/2/1071/">doi:10.1088/0004-637X/697/2/1071</a> <br />
Voges, W., et al, 1999, A&amp;A, 349, 389 <br/>
Voges, W., et al., 2000, IAU Circ., 7432, 1 <br />
Healey, S. E., et al, 2007, ApJS, 171, 61
<a href="http://iopscience.iop.org/0067-0049/171/1/61/">doi:10.1086/513742</a><br />

Richards, G. T., et al., 2009, ApJS, 180, 67
<a  href="http://iopscience.iop.org/0067-0049/180/1/67/">doi:10.1088/0067-0049/180/1/67</a><br />

Schneider, D. P., et al., 2010, AJ, 139, 2360
<a href="http://iopscience.iop.org/1538-3881/139/6/2360">doi:10.1088/0004-6256/139/6/2360</a><br />

Anderson, S. F.,  et al., 2003, AJ, 126, 2209
<a href="http://iopscience.iop.org/1538-3881/126/5/2209/">doi:10.1086/378999</a><br />

Abdo, A. A., et al, 2010a, ApJ, 715, 429
<a href="http://iopscience.iop.org/0004-637X/715/1/429/">doi:10.1088/0004-637X/715/1/429</a><br />

Abdo, A. A., et al, 2010b, ApJS, 188, 405
<a href="http://iopscience.iop.org/0067-0049/188/2/405/">doi:10.1088/0067-0049/188/2/405</a><br />

</p>



<?php echo foot(); ?>








