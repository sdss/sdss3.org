<?php include '../../../../header.php'; echo head('White Dwarfs and Hot Subdwarf Stars'); ?>

<h2>Summary</h2>

<p>Spectra of white dwarf candidates in the SDSS
<a href="http://www.sdss.org/dr7/coverage/index.html">Data Release 7 imaging area</a>
(7,430 deg<sup>2</sup>)</p>

<h2>Finding Targets</h2>

<p>An object whose <span class="term">ANCILLARY_TARGET1</span> value includes one or more of
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
<td>WHITEDWARF_NEW</td>
<td>42</td>
<td>White dwarf candidate whose spectrum had not been observed previously by the SDSS</td>
<td>0.5</td>
</tr>

<tr>
<td>WHITEDWARF_SDSS</td>
<td>43</td>
<td>White dwarf candidate with a pre-existing SDSS spectrum</td>
<td>0.5</td>
</tr>

</table>



<h2>Description</h2>

<p>The original SDSS data massively increased the number of known white dwarfs, which
had an enormous impact on the science of these stars. However, target selection considerations
of the original SDSS meant that white dwarf selection was incomplete. This ancillary target
program is measuring the spectra of thousands of white dwarfs that were missed by prior
SDSS spectroscopic surveys.</p>

<p>SDSS multi-color imaging efficiently distinguishes hot white dwarf and subdwarf
stars from the bulk of the stellar and quasar loci in color-color space
(<a href="http://adsabs.harvard.edu/abs/2003AJ....126.1023H">Harris et al. 2003</a>).
Special target classes in SDSS produced the world's
largest spectroscopic samples of white dwarfs
(<a href="http://adsabs.harvard.edu/abs/2004ApJ...607..426K">Kleinman et al. 2004</a>;
<a href="http://adsabs.harvard.edu/abs/2006ApJS..167...40E">Eisenstein et al. 2006</a>).
However, much of SDSS white dwarf targeting
required that the objects be unblended, which caused many brighter
white dwarfs to be skipped (for a detailed discussion, see Section 5.6 of
Eisenstein et al. 2006). This BOSS ancillary targeting program relaxes this
requirement and imposes color cuts to focus on warm and hot white dwarfs.
Importantly, the BOSS spectral range extends further into the UV, allowing
full coverage of the Balmer lines.</p>


<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://scholar.harvard.edu/deisenstein/">Daniel Eisenstein</a></th></tr>
<tr><td>Harvard Smithsonian Center for Astrophysics</td></tr>
<tr><td>deisenstein -at- harvard.edu</td></tr>
</table>

<h2>Target Selection Details</h2>

<p>We require targets to be point sources with clean <i>u</i>, <i>g</i>, and
<i>r</i> photometry (following the clean point source selection from the
DR7 documentation), and USNO counterparts. We restrict to regions inside the
DR7 imaging footprint and require that (all magnitudes quoted are
extinction-corrected model magnitudes):
</p>
<ul>
<li>Identified as a star in imaging <code>(type=6)</code></li>
<li>Clean photometry data (see the <a href="dr10/tutorials/flags.php">Clean Photometry</a> tutorial)</li>
<li>Galactic extinction <i>A</i><sub>r</sub> &lt; 0.5 mag <code>(extinction_r &lt; 0.5)</code></li>
<li><i>g</i> &lt; 19.2 <code>(dered_g &lt; 19.2)</code></li>
<li>(<i>u-r</i>) &lt; 0.4 <code>(dered_u - dered_r &lt; 0.4)</code></li>
<li>-1 &lt; (<i>u-g</i>) &lt; 0.3 <code>(dered_u - dered_g &gt; -1 AND dered_u - dered_g &lt; 0.3)</code></li>
<li>-1 &lt; (<i>g-r</i>) &lt; 0.5 <code>(dered_g - dered_r &gt; -1 AND dered_g - dered_r &lt; 0.5)</code></li>
</ul>
<p>Additionally, targets that do not have (<i>u-r</i>) &lt; -0.1 and (<i>g-r</i>) &lt; -0.1
must have USNO proper motions of more than 2 arcsec per century
<code>[propermotion &gt; 2 || (dered_g-dered_r &lt; -0.15 &amp;&amp; dered_u-dered_r &lt; -0.2)]</code>.</p>


<p>Objects satisfying the selection criteria that had not observed in previously by the
SDSS are denoted by the <span class="term">WHITEDWARF_NEW</span> target flag, while those
with prior SDSS spectra are assigned the <span class="term">WHITEDWARF_SDSS</span> flag.
Some of the latter were re-observed with BOSS in order to obtain the extended wavelength coverage
that the BOSS spectrograph offers.</p>

<p>The color selection used here includes DA stars with temperatures above ~14,000 K, helium
atmosphere white dwarfs above ~8000 K, as well as many rarer
classes of white dwarfs. Hot subdwarfs (sdB and sdO) are included as
well. Many of these stars are excellent spectrophotometric standards, and can be tested in
comparison to the BOSS F-star calibration.</p>

<h3>SQL statement used in target selection</h3>s

<pre>
SELECT ................
FROM USNO u, Field f, Star s left outer join SpecObjAll sp
ON s.specObjID=sp.specObjID
WHERE dered_g &lt; 19.2
AND u.objID=s.objID
AND f.fieldID=s.fieldID
AND extinction_r &lt; 0.5
AND dered_u-dered_r &lt; 0.4
AND dered_g-dered_r &lt; 0.5
AND dered_g-dered_r &gt; -1
AND dered_u-dered_g &lt; 0.3
AND dered_u-dered_g &gt; -1
AND ( u.propermotion &gt; 2 OR ( dered_g-dered_r &lt; -0.1 AND dered_u-dered_r &lt; -0.1))
AND ((flags_u &amp; 0x10000000) != 0)
AND ((flags_u &amp; 0x8100000c00a4) = 0)
AND (((flags_u &amp; 0x400000000000) = 0) or (psfmagerr_u &lt;= 0.2))
AND (((flags_u &amp; 0x100000000000) = 0) or (flags_u &amp; 0x1000) = 0)
AND ((flags_g &amp; 0x10000000) != 0)
AND ((flags_g &amp; 0x8100000c00a4) = 0)
AND (((flags_g &amp; 0x400000000000) = 0) or (psfmagerr_g &lt;= 0.2))
AND (((flags_g &amp; 0x100000000000) = 0) or (flags_g &amp; 0x1000) = 0)
AND ((flags_r &amp; 0x10000000) != 0)
AND ((flags_r &amp; 0x8100000c00a4) = 0)
AND (((flags_r &amp; 0x400000000000) = 0) or (psfmagerr_r &lt;= 0.2))
AND (((flags_r &amp; 0x100000000000) = 0) or (flags_r &amp; 0x1000) = 0)
</pre>

<h2>REFERENCES</h2>

<p>
Eisenstein, D. J., et al., 2006, ApJS, 167, 40,
<a href="http://iopscience.iop.org/0067-0049/167/1/40">doi:10.1086/507110</a><br />
Harris, H. C., et al., 2003, AJ, 126, 1023,
<a href="http://iopscience.iop.org/1538-3881/126/2/1023/">doi:10.1086/376842</a><br />
Kleinman, S. J., et al., 2004, ApJ, 607, 426,
<a href="http://iopscience.iop.org/0004-637X/607/1/426">doi:10.1086/383464</a><br/>
</p>



<?php echo foot(); ?>

