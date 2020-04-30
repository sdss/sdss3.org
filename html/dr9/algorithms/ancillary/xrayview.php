<?php include '../../../header.php'; echo head('X-Ray View of Star-Formation and Accretion in Normal Galaxies'); ?>


<h2>Summary</h2>

<p>Spectra for the optical counterparts of Chandra x-ray targets in a 7,650 survey area</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET1</code> value include one or more of
the bitmasks in the following table was targeted for spectroscopy as part of this ancillary
target program. See <a href="dr9/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how
to use these values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Program<br />(bit name)</th>
<th>Bit Number</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td>CHANDRAV1</td>
<td>57</td>
<td>0.2</td>
</tr>

</table>



<h2>Description</h2>

<p>
The extended wavelength coverage
and improved throughput of BOSS relative to SDSS enable studies of the
relationship between star formation and
black hole accretion in galaxies using the key diagnostic
H<sub>&#945;</sub>/N[II] to z ~0.49.  </p>



<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://faculty.wcas.northwestern.edu/~dha724/">Daryl Haggard</a></th></tr>
<tr><td>Northwestern University</td></tr>
<tr><td>dhaggard -at- northwestern.edu</td></tr>
</table>

<h2>Other contacts</h2>

<p>Paul J. Green, Niel Brandt, Adam Myers, Anca Constantin</p>

<h2> Target Selection Details </h2>

<ul>
   <li>For this study, a target list was derived
from the matched Chandra Source Catalog (CSC; version 1; Evans et al. 2010)
and SDSS DR7 photometric catalogs. </li>
   <li>High quality matches underwent visual inspection in X-ray and
optical imaging and were required to have positional
matches between the SDSS DR7 catalog and the CSC as defined by the
Rots et al. (2009) matching method that
incorporates positions, positional errors, and sky coverage.
     <ul>
        <li>Matches with Bayesian probability &lt; 0.5 suffer from a
            larger number of multiple matches and are discarded. </li>
     </ul></li>
    <li>Targets were required to have model magnitude 16.5 &lt; r &lt; 20.75</li>
    <li>Targets were also required to have Chandra off-axis angles  &lt; 10'.  </li>

    <li>Objects with existing SDSS spectroscopy, proper motions from
Munn et al. (2004, 2008) exceeding 11 mas/year (selection criteria
are described further in Haggard et al. 2010), or
poor-quality X-ray measurements are removed from the sample. </li>

</ul>

<p>Because only sources with Chandra coverage were
included, the target have a non-uniform distribution over the DR7 footprint.
To avoid overlap between the targets
selected for this program and the program
<a href="dr9/algorithms/ancillary/remarkxray.php">"Remarkable X-ray Source
Populations"</a>, the target lists
were cross-correlated (using a 2" match radius) and
754 duplicates were removed from this program designation.</p>


<h2>REFERENCES</h2>

<p>

Evans, I. N., et al., 2010, ApJS, 189, 37
<a href="http://iopscience.iop.org/0067-0049/189/1/37/">doi:10.1088/0067-0049/189/1/37</a><br />

Rots, A., et al., 2009, in Chandra's First Decade of Discovery, ed. S. Wolk, A. Fruscione, D. Swartz <br />

Munn, J. A., et al., 2004, AJ, 127, 3034
<a href="http://iopscience.iop.org/1538-3881/127/5/3034/">doi:10.1086/383292</a><br />
Munn, J. A., et al., 2008, AJ, 136, 895
<a href="http://iopscience.iop.org/1538-3881/136/2/895">doi:10.1088/0004-6256/136/2/895</a><br />

Haggard, D., et al., 2010, ApJ, 723, 1447
<a href="http://iopscience.iop.org/0004-637X/723/2/1447/">doi:10.1088/0004-637X/723/2/1447</a><br />
</p>



<?php echo foot(); ?>








