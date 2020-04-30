<?php include '../../../../header.php'; echo head('The Cluster Palomar 1'); ?>

<h2>Summary</h2>

<p>Members of the Palomar (Pal 1) stellar cluster</p>

<h2>Finding Targets</h2>

<!--
<p>In all, ~250 cluster candidate members are being observed as part of
this ancillary program,
and all have targeting flag bit <i>apogee_target1</i> = 24 set.</p>
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
<td> APOGEE_GC_PAL1 </td>
<td> 24 </td>
<td> star in Palomar 1 stellar cluster </td>
</tr>

</table>


<h2>Description</h2>

<p>Pal 1 is a faint, potentially young globular cluster that may be associated with the
Monoceros Ring or Galactic Anti-center Stellar Stream (Rosenberg et al. 1998b; Crane et al. 2003),
and whose spatial position, young age, and extended tidal tails
(Niederste-Ostholt et al. 2010)
make it a good candidate for a recently accreted object currently undergoing
disruption by the Milky Way.
<!--
Its metallicity has only recently been estimated from a very small sample of stars,
whose spectra also suggest other abundance patterns unusual for globular clusters (Sakari et al. 2011).
 -->
This ancillary program is collecting the first large and homogeneous set of spectra
in this red, faint, sparse cluster, with the goal of
tightly constraining the cluster's metallicity and exploring its potentially-unusual
chemistry in many dimensions.
<!--
Since Pal 1 is thought to have -1.0 &lt; [Fe/H] &lt; -0.5, the
bulk of the APOGEE survey field and cluster stars will provide a good
comparison sample for a detailed differential analysis,
including a focus on the chemical effects of cluster age, environment, and accretion history.
 -->
</p>

<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://faculty.utah.edu/u0677127-Inese_Ivans/research/index.hml">Inese Ivans</a></th></tr>
<tr><td>University of Utah</td></tr>
<tr><td>iii -at- physics.utah.edu</td></tr>
</table>


<h2>Other contacts</h2>

<p>Matthew Shetrone, Jennifer Simmerer</p>


<h2>Target Selection Details</h2>

<p>The cluster targets were selected with a combination of 2MASS and SDSS photometry.
The initial selection comprised 2MASS stars less than 90 arcmin from the
cluster center
<!--
(l,b = 130.065&deg;, 19.028&deg;)
 -->
that satisfied the following criteria:
</p>
<ul id="pagemenu">
<li> no neighboring object within 6 arcsec,</li>
<li> 2MASS JHK<sub>s</sub> photometric quality flags of "A" and all other contamination flags null, and</li>
<li> 11 &lt; H &lt; 14.5 mag.</li>
</ul>

<p>
Then the sample was trimmed to those stars bracketed in (J-K<sub>s</sub>) by isochrones
at the most probable boundaries
of the cluster age (5 to 12 Gyr) and metallicity ([Fe/H]=-1 to -0.5),
assuming E(J-K<sub>s</sub>)=0.112 and a distance
modulus of 15.76 (Rosenberg et al. 1998a,b; Sarajedini et al. 2007; Harris
2010).</p>
<p>
After all the 2MASS-selected candidates were matched with the SDSS DR7 photometric
database (Abazajian et al. 2009),
an additional cut in (u, g-r) space was performed.  As the few existing
<i>ugr</i> red giant branch isochrones are rather inconsistent
in the possible age range of the cluster,
stars along the probable giant branch locus were randomly selected, with even sampling between
0.5 &lt; (g-r) &lt; 1.6 mag.
Also included are the three stars identified as cluster members by Rosenberg et al. (1998a).
<!--
The highest targeting priority was assigned to stars that
satisfied our selection criteria and were within 10 arcmin
of the cluster center.  Targeting priority outside the cluster center was then
assigned randomly.
 -->
</p>

<h2>REFERENCES</h2>

<p>
Abazajian, K. N., Adelman-McCarthy, J. K., Agu ̈eros, M. A., et al. 2009, ApJS, 182, 543<br />
Crane, J., Majewski, S. R., Rocha-Pinto, H. J., et al. 2003, ApJ, 594, L119 <br />
Harris, W.E. 2010, arXiv:1012.3224 <br />
Niederste-Ostholt, et al. 2010, MNRAS:L, 408, L66 <br />
Rosenberg, A., Piotto, G., Saviane, I., Aparicio, A., &amp; Gratton, R. 1998a, AJ, 115, 658 <br />
Rosenberg, A., Saviane, I., Piotto, G., Aparicio, A., &amp; Zaggia, S. R. 1998b, AJ, 115, 648<br />
Sarajedini, A., et al. 2007, AJ, 133, 1658<br />
<!--
Bica, E., Bonatto, C., Barbuy, B., &amp; Ortolani, S. 2006, A&amp;A, 450, 105 <br />
Goswami, A. &amp; Prantzos, N. 2000, A&amp;A, 359, 191 <br />
Samland, M. 1998, ApJ, 496, 155 <br />
Sbordone, L., Limongi, M., Chieffi, A., Caffu, E., Ludwig, H.-G., &amp; Bonifacio, P. 2006, A&amp;A, 503, 121<br />
Searle, L. &amp; Zinn, R. 1978, ApJ, 225, 357 <br />
Takeda, Y., et al. 2005, PASJ, 57, 751 <br />
Timmes, F. X., Woosely, S. E., &amp; Weaver, T. A. 1995, ApJS, 98, 617 <br />
Zoccali, M., Renzini, A., Ortolani, S., Bica, E., &amp; Barbuy, B. 2001, AJ, 121, 2638<br />
 -->
</p>





<?php echo foot(); ?>

