<?php include '../../../../header.php'; echo head('Ages of Red Giants in the Kepler and CoRoT Fields'); ?>

<h2>Summary</h2>

<p>Sample of stars with asteroseismic data to facilitate determination of parameters, including ages</p>

<h2>Finding Targets</h2>

<!--
<p>Both <i>Kepler</i> and <i>CoRoT</i> targets in this ancillary program have bit apogee target1 = 22 set, and targets
in the <i>Kepler</i> fields also have bit apogee target1 = 27 set.</p>
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
<td> APOGEE_DISK_RED_GIANT </td>
<td> 22 </td>
<td> asteroseismic target in <i>Kepler</i> or <i>CoRoT</i> sample </td>
</tr>

</table>

<h2>Description</h2>

<p>In addition to the 21 "APOGEE-<i>Kepler</i>" fields,
APOGEE is targeting two fields observed by the <i>CoRoT</i> satellite (Baglin et al. 2006).
These fields lie on opposite sides of the Galaxy, with <i>COROTA</i> at (l,b) ~ (212&deg;, -2&deg;)
and <i>COROTC</i> at (l,b) ~ (38&deg;, -8&deg;).
Because <i>CoRoT</i> stars probe the disk at a range of Galactocentric radii,
they complement the <i>Kepler</i> sample stars, most of which lie near the solar circle.
As with the <i>Kepler</i> sample, the seismic information available for the <i>CoRoT</i> stars permits the
determination of fundamental stellar parameters, including age.</p>

<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://www.astronomy.ohio-state.edu/~epstein/">Courtney Epstein</a></th></tr>
<tr><td>The Ohio State University</td></tr>
<tr><td>epstein -at- astronomy.ohio-state.edu</td></tr>
</table>


<h2>Other contacts</h2>

<p>Jonathan Bird, Cristina Chiappini, Jennifer Johnson, David Lai, Marc Pinsonneault, Ralph Schonrich
</p>


<h2>Target Selection Details</h2>

<p>The <i>CoRoT</i> set of RG stars with seismic detections was selected from the sample analyzed in Mosser
et al. (2010). Approximately 120 stars were targeted in the <i>COROTA</i> field, and approximately 360 in
<i>COROTC</i>. </p>
<!--
; because of the higher number of candidate targets in <i>COROTC</i>,
a targeting strategy was employed similar to that for the Galactic Center field <i>GALCEN</i>:
division of targets into three one-visit short
cohorts and one three-visit medium cohort.</p>
 -->

<h2>REFERENCES</h2>

<p>
Baglin, A., et al. 2006, in 36th COSPAR Scientific Assembly, Vol. 36, 3749<br />
Mosser, B. et al. 2010, A&amp;A, 517, 22<br />
<!--
Abadi, M. G., Navarro, J. F., Steinmetz, M., & Eke, V. R. 2003, ApJ, 597, 21<br />
Bahcall, J. N., Pinsonneault, M. H., & Basu, S. 2001, ApJ, 555, 990<br />
Bedding, T. et al. 2010, ApJ, 713, L176<br />
Chiappini, C. 2009, in The Galaxy Disk in Cosmological Context, IAU 254, p. 191<br />
Demarque, P., Woo, J.-H., Kim, Y.-C., & Yi, S. K. 2004, ApJS, 155, 667<br />
Edvardsson, B., et al. 1993, A&A, 275,101<br />
Feltzing, S. & Bensby, T. 2009, in The Ages of Stars, IAU 258, p. 23<br />
Fuhrmann, K. 2008, MNRAS, 384, 173<br />
Gai, N., Basu, S., Chaplin, W. J., & Elsworth, Y. 2010, astro-ph/1009.3018<br />
Gilliland, R. et al. 2010, PASP, 122, 131<br />
Girardi, L. Grebel, E. K., Odenkirchen, M., & Chiosi, C. 2004, A&A, 422, 205<br />
Haywood, M. 2006, MNRAS, 371, 1760<br />
Loebman, S., et al. 2010, astro-ph1009.5997<br />
Minchev, I. & Famaey, B. 2010, ApJ, 722, 112<br />
Nordstr&ouml;m, et al. 2004, A&A, 418, 989<br />
Sch&ouml;nrich, R. & Binney, J. 2009a, MNRAS, 396, 203<br />
Sch&ouml;nrich, R. & Binney, J. 2009b, MNRAS, 399, 1145<br />
Sellwood, J. A. & Binney, J. 2002, MNRAS, 336, 785<br />
Tinsley, B. 1979, ApJ, 229, 1046<br />
Walker, I. R., Mihos, J. C., & Hernquist, L. 1996, ApJ, 460, 121<br />
 -->
</p>





<?php echo foot(); ?>

