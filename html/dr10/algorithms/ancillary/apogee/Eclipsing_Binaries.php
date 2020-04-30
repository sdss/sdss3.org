<?php include '../../../../header.php'; echo head('Eclipsing Binaries'); ?>

<h2>Summary</h2>

<p>Monitoring <i>Kepler</i> eclipsing binary (EB) systems.</p>

<h2>Finding Targets</h2>

<!--
<p>A total of ~115 EB systems in 5 APOGEE fields are targeted,
and all have targeting flag bit <i>apogee_target1</i> = 23 set.</p>
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
<td> APOGEE_KEPLER_EB </td>
<td> 23 </td>
<td> eclipsing binary system </td>
</tr>

</table>

<h2>Description</h2>

<p>This ancillary program is monitoring <i>Kepler</i> EB systems to derive their dynamical mass ratios.
Although masses and radii have been measured to the ~3% level for nearly 300 EBs
(e.g., <a href="http://www.astro.keele.ac.uk/jkt/debcat/">DEBCat</a>),
low-mass (M &lt; 0.8M<sub>&#9737;</sub>) and longer-period (P &gt; 5 days) systems remain under-explored.
The <i>Kepler</i> dataset is a valuable source of EBs,
providing nearly continuous, extremely high-precision photometry (Caldwell et al. 2010)
that has been used to detect thousands of EBs across a wide range of stellar parameters and orbital periods
(Coughlin et al. 2011; Pr&#353;a
et al. 2011; Slawson et al. 2011).
When combined with time-series spectroscopy to measure precise RVs (e.g., Bender et al. 2012),
these EBs will offer empirical constraints for next-generation stellar models.
</p>

<h2>Primary contacts</h2>

<table class="contact">
<tr><th><a href="http://www.astro.psu.edu/people/sqm107">Suvrath Mahadevan</a></th></tr>
<tr><td>Penn State University</td></tr>
<tr><td>suvrath -at- astro.psu.edu</td></tr>

<tr><th><a href="http://www.personal.psu.edu/users/s/w/swf13/">Scott Fleming</a></th></tr>
<tr><td>Penn State University</td></tr>
<tr><td>swf13 -at - psu.edu</td></tr>
</table>

<h2>Other contacts</h2>

<p>Chad Bender, Rohit Deshpande, Fred Hearty, David Nidever, Ryan Terrien
</p>


<h2>Target Selection Details</h2>

<p>The sample of <i>Kepler</i> EBs comes from the catalogs of Pr&#353;a et al. (2011) and Slawson et al. (2011)
and includes targets in two APOGEE fields that overlap <i>Kepler</i> pointings (<i>N6791</i> and <i>N6819</i>).
By design, the target selection imposed a minimum amount of selection cuts in order to explore as
diverse a range of stellar and orbital properties as possible.
The sample targets are limited to EBs with H &lt; 13.0 mag (Vega) and classified as having a "detached morphology"
(i.e., excluding those binaries that experience Roche lobe overflow),
which minimizes the number of model parameters. In addition to the <i>Kepler</i> sample,
4 EBs detected using ground-based photometry (Devor et al. 2008),
the well-studied EB system CV Boo (Torres et al. 2008), and
the M dwarf spectroscopic binary GJ 3630 (Shkolnik et al. 2010)
are included as analysis calibrators.</p>

<h2>REFERENCES</h2>

<p>
Bender, C. F., Mahadevan, S., Deshpande, R., et al. 2012, ApJ, 751, L31<br />
Caldwell, D. A., Kolodziejczak, J. J., Van Cleve, J. E., et al. 2010, ApJ, 713, L92<br />
Coughlin, J. L., Lo ́pez-Morales, M., Harrison, T. E., Ule, N., &amp; Hoffman, D. I. 2011, AJ, 141, 78<br />
Pr&#353;a, A. et al. 2011, AJ, 141, 83 <br />
Slawson, R. W., Prsˇa, A., Welsh, W. F., et al. 2011, AJ, 142, 160<br />
<!--
Bender, C. et al. 2011, in prep. <br />
Bender, C. &amp; Simon, M. 2008, ApJ, 689, 416B <br />
Bender, C. et al. 2005, AJ, 129, 402B <br />
Lopez-Morales, M. 2007, ApJ, 660, 732 <br />
Lejeune et al. 1997, A&amp;AS, 125, 229L <br />
Mazeh, T. et al. 2002, ApJ, 564, 1007M <br />
Morales, J.C. et al. 2010, ApJ, 718, 502 <br />
Torres, G. et al. 2010, A&amp;ARV, 18, 67 <br />
Zucker, S. &amp; Mazeh, T. 1994, ApJ, 420, 806Z<br />
 -->
</p>





<?php echo foot(); ?>

