<?php include '../../../../header.php'; echo head('Optical Calibrator Stars'); ?>

<h2>Summary</h2>

<p>Stars with high-resolution optical spectroscopy and published parameters and/or abundances</p>

<h2>Finding Targets</h2>

<!--
<p>All of the ~20 stars have targeting flag bit <i>apogee_target1</i> = 20 set.</p>
 -->

<p>An object whose <code>APOGEE_TARGET1</code> value includes one or more of
the bitmasks in the following table was targeted for spectroscopy as part of this ancillary
target program. See <a href="dr10/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how
to use these values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>APOGEE_TARGET1<br />bit name</th>
<th>Bit</th>
<th>Target Description</th>
</tr>

<tr>
<td> APOGEE_HIRES </td>
<td> 20 </td>
<td> star with parameters and/or abundances derived from high-resolution optical spectroscopy </td>
</tr>

</table>


<h2>Description</h2>

<p>In addition to the stellar parameter and abundance calibrators targeted in well-studied clusters and
the bulge, One ancillary program is targeting a number of field stars
that have been the subject of optical high-resolution spectroscopic studies.
The program goals include:
comparing abundances and atmospheric parameters derived using APOGEE's
IR spectra with those in the literature; testing advanced 3D stellar model
atmospheres (e.g., Fabbian et al. 2010, 2012) as a complement to observations of even closer stars
with well-determined angular diameters and very accurate parallaxes; and establishing kinematical and chemical
memberships in the Galactic thin/thick disks or halo.</p>

<h2>Primary contact</h2>

<table class="contact">
<tr><th>Damian Fabbian</th></tr>
<tr><td>Instituto de Astrofisica de Canarias</td></tr>
<tr><td>damian -at- iac.es</td></tr>
</table>


<h2>Other contacts</h2>

<p>Carlos Allende Prieto, Katia Cunha, Verne Smith</p>


<h2>Target Selection Details</h2>

<p>The target list for this program comprises stars from the
<a href="http://irtfweb.ifa.hawaii.edu/~spex/IRTF_Spectral_Library/">IRTF "Cool Stars" Spectral Library</a>
(Rayner et al. 2009)
and stars observed by Reddy et al. (2003) and Reddy et al. (2006) at McDonald Observatory,
limited to those with H &lt; 12.5 mag (Vega) falling within
APOGEE's existing disk and halo fields at the time of the first call for ancillary programs.</p>

<h2>REFERENCES</h2>

<p>
Fabbian, D., Khomenko, E., Moreno-Insertis, F., &amp; Nordlund, Å. 2010, ApJ, 724, 1536<br />
Fabbian, D., Moreno-Insertis, F., Khomenko, E., &amp; Nordlund, Å. 2012, A&amp;A, 548, A35<br />
Rayner, J. T., Cushing, M. C., &amp; Vacca, W. D. 2009, ApJS, 185, 289<br />
Reddy, B. E., Lambert, D. L., &amp; Allende Prieto, C. 2006, MNRAS, 367, 1329<br />
Reddy, B. E., Tomkin, J., Lambert, D. L., &amp; Allende Prieto, C. 2003, MNRAS, 340, 304<br />
</p>





<?php echo foot(); ?>

