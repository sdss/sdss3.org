<?php include '../../../header.php'; echo head('Very Low-Mass Stars and Brown Dwarfs'); ?>

<h2>Summary</h2>

<p>A search for M stars and L dwarfs in the BOSS survey area (7,650 square degrees)</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET1</code> value includes one or more of the bitmasks
in the following table was targeted for spectroscopy as part of this ancillary target
program. See <a href="dr9/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how to use
these values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Program (bit name)</th>
<th>Bit</th>
<th>Target Description</th>
<th>Survey area (deg<sup>2</sup>)</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td rowspan='2'>BRIGHTERL</td>
<td rowspan='2'>44</td>
<td rowspan='2'>Bright L dwarf candidates</td>
<td>220</td>
<td>0.07</td>
</tr>
<tr>
<td>7,650</td>
<td>0.08</td>
</tr>
<tr>
<td rowspan='2'>BRIGHTERM</td>
<td rowspan='2'>45</td>
<td rowspan='2'>Bright M star candidates</td>
<td>220</td>
<td>2.9</td>
</tr>
<tr>
<td>7,650</td>
<td>0.3</td>
</tr>

<tr>
<td rowspan='2'>FAINTERL</td>
<td rowspan='2'>46</td>
<td rowspan='2'>Faint L dwarf candidates</td>
<td>220</td>
<td>0.3</td>
</tr>
<tr>
<td>7,650</td>
<td>0.2</td>
</tr>

<tr>
<td rowspan='2'>FAINTERM</td>
<td rowspan='2'>47</td>
<td rowspan='2'>Faint M star candidates</td>
<td>220</td>
<td>>2.2</td>
</tr>
<tr>
<td>7,650</td>
<td>0.6</td>
</tr>

</table>

<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://www.astro.washington.edu/users/slh/">Suzanne Hawley</a></th></tr>
<tr><td>University of Washington</td></tr>
<tr><td>slh -at- astro.washington.edu</td></tr>
</table>


<h2>Other contacts</h2>

<p>Sarah Schmidt, Andrew West, John Bochanski</p>


<h2>Description</h2>

<p>Very-low-mass stars and brown dwarfs (spectral types M8, M9 and L) are ideal tracers
of the kinematic properties of the Milky Way thin disk. While the program
<a href="dr9/algorithms/ancillary/transient82.php">The Transient Universe Through Stripe 82</a>
uses variability information over Stripe 82 to identify rare classes of stars, this ancillary
target program uses photometric selection over the much larger BOSS survey area to identify
new low-mass stars and brown dwarfs.</p>

<p>SDSS-I and SDSS-II yielded a wealth of spectroscopic data of these ultracool dwarfs
(Schmidt et al. 2010b; West et al. 2011), but were limited by the small number of
spectra observed for stars with spectral types later than M7. Additional observations
of these objects are essential to understand the properties of magnetic activity in
these ultracool dwarfs (extending the results of West et al. 2008). The data will also
enable studies using kinematics to understand the distribution of stellar ages, especially
at the stellar/sub-stellar boundary. Finally, the sample will contain a class of L dwarfs
which are peculiarly blue in the near-infrared, but have typical L dwarf colors in
SDSS i - z (Schmidt et al. 2010a).</p>

<h2>Target Selection Details</h2>

<p>The ancillary target program was divided into two survey areas: the stripe 82 footprint
(with target density 5 deg<sup>-2</sup>) and the overall BOSS footprint (with target density
1 deg<sup>-2</sup>). Within the stripe 82 footprint, targets were sought at five per
square degree; in the rest of the BOSS footprint, targets were sought at one per square
degree. To select the cleanest possible sample, the photometric selection criteria included
2MASS magnitudes.</p>

<p>The target selection criteria in the stripe 82 footprint are:</p>

<ul>
<li>i<sub>PSF</sub> - z<sub>PSF</sub> &gt; 1.14</li>
<li>i<sub>PSF</sub> &lt; 21</li>
<li>i<sub>PSF</sub> - J &gt; 3.7</li>
<li>1.9 &lt; z<sub>PSF</sub> - J &lt; 4</li>
</ul>

<p>Criteria for the rest of the BOSS footprint are:</p>

<ul>
<li>i<sub>PSF</sub> - z<sub>PSF</sub> &gt; 1.44</li>
<li>i<sub>PSF</sub> &lt; 20.5</li>
<li>i<sub>PSF</sub> - J &gt; 3.7</li>
<li>1.9 &lt; z<sub>PSF</sub> - J &lt; 4</li>
</ul>

<p>Here, the J-band photometry, unlike the SDSS photometry, is Vega-based.</p>

<p>In both survey areas, targets are divided into subsamples with different priorities.
L dwarfs are both less common and fainter, so our priority was to detect L dwarfs over
late-M dwarfs. Targets likely to be bright L dwarfs are indicated by the
<span class="term">BRIGHTERL</span> sub-program, and are assigned first priority. Fainter
L dwarfs (<span class="term">FAINTERL</span>) are assigned second priority. Lower priorities
are assigned to likely M dwarfs, both brighter (<span class="term">BRIGHTERM</span>) and
fainter (<span class="term">FAINTERM</span>).</p>

<p>The selection criteria used to assign targets to each of the four sub-programs is:</p>

<table class="ancillary">
<tr>
<th>Sub-program</th>
<th>Magnitude cut</th>
<th>Color cut</th>
</tr>
<tr>
<td>BRIGHTERL</td>
<td>i<sub>PSF</sub> &lt; 19.5</td>
<td>i<sub>PSF</sub> - z<sub>PSF</sub> &gt; 1.14</td>
</tr>
<tr>
<td>FAINTERL</td>
<td>i<sub>PSF</sub> &gt; 19.5</td>
<td>i<sub>PSF</sub> - z<sub>PSF</sub> &gt; 1.14</td>
</tr>
<tr>
<td>BRIGHTERM</td>
<td>i<sub>PSF</sub> &lt; 19.5</td>
<td>i<sub>PSF</sub> - z<sub>PSF</sub> &lt; 1.14</td>
</tr>
<tr>
<td>FAINTERM</td>
<td>i<sub>PSF</sub> &lt; 19.5</td>
<td>i<sub>PSF</sub> - z<sub>PSF</sub> &lt; 1.14</td>
</tr>
</table>


<h2>REFERENCES</h2>

<p>
Schmidt, S. J., West, A. A., Burgasser, A. J., Bochanski, J. J., &amp; Hawley, S. L. 2010a, AJ, 139, 1045<br />
Schmidt, S. J., West, A. A., Hawley, S. L., &amp; Pineda, J. S. 2010b, AJ, 139, 1808<br />
West, A. A., Hawley, S. L., Bochanski, J. J., Covey, K. R., Reid, I. N., Dhital, S., Hilton, E. J., &amp; Masuda, M. 2008, AJ, 135, 785<br />
West, A. A., et al. 2011, AJ, 141, 97
</p>



<?php echo foot(); ?>

