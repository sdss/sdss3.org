<?php include '../../../../header.php'; echo head('Massive Stars'); ?>

<h2>Summary</h2>

<p>Spectra of massive stars: OB dwarfs and red supergiants</p>

<h2>Finding Targets</h2>

<!--
<p>All of the ~150 targets for this ancillary program have targeting flag bit <i>apogee_target1</i> = 25 set.
</p>
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
<td> APOGEE_MASSIVE_STAR </td>
<td> 25 </td>
<td> OB or red supergiant star </td>
</tr>

</table>


<h2>Description</h2>

<p>This ancillary project is targeting OB stars and red supergiants (RSGs) in a
two-pronged study of obscured massive stars.
The first goal is to compile a spectral library of known OB stars.
<!--
superior to existing libraries in terms of S/N, which is important for very hot weak-lined stars,
and particularly of OB stars too highly obscured for more traditional UV or optical studies.
 -->
These objects' young ages imply that they reflect the present properties of the ISM, and their
rapid evolution means that even a relatively small sample of these stars provides us with multiple
snapshots of different evolutionary phases.
As the progenitors of supernovae, OB stars are some of the primary drivers of galactic chemical evolution.
<br />
<br />
The second goal of this ancillary program is to observe a number of main-sequence stars and
RSGs located in the massive star-forming regions near Galactic longitude ~ 30&deg;.
These regions, often referred to collectively as the Scutum Complex
(e.g., Davies et al. 2007; Negueruela et al. 2012),
contain a large number of massive (M &le; 10<sup>5</sup> M<sub>&#9737;</sub>)
but highly-obscured clusters in which only the RSGs have been observed spectroscopically.
Multiple theories to explain this high concentration of massive clusters have been proposed,
<!--
including
(i) the interaction of the Milky Way "long bar" with the Scutum spiral arm producing a localized starburst
(e.g., L&oacute;pez-Corredoira et al. 1999) and
(ii) the projection along our line of sight of a dense star-formation ring with a Galactocentric radius similar to the length
of the long bar.
 -->
but the lack of absolute luminosity or robust distance estimates has so far prevented clear discrimination amongst
these scenarios.
</p>

<h2>Primary contact</h2>

<table class="contact">
<tr><th>Artemio Herrero Dav&oacute;</th></tr>
<tr><td>Instituto de Astrofisica de Canarias</td></tr>
<tr><td>ahd -at- iac.es</td></tr>
</table>


<h2>Other contacts</h2>

<p>M. Garcia, S. Ramirez Alegria</p>


<h2>Target Selection Details</h2>

<p>The early-type stars for this ancillary program are drawn from the
Galactic O-Stars Spectroscopic Survey (Sota et al. 2011),
in which all of the stars have a well-established spectral type and luminosity class.
Cluster RSGs are selected to have 8 &le; H &le; 10 mag (Vega), (J-K) &gt; 0.75,
and color index 0.1 &lt; Q<sub>IR</sub> &lt; 0.4 (following Comer&oacute;n et al. 2002),
while the unevolved stars are selected using the IR pseudo-color technique of Negueruela et al. (2010)
and have magnitudes as faint as H &le; 14.8 mag.</p>

<h2>REFERENCES</h2>

<p>
Comerón, F., Pasquali, A., Rodighiero, G., et al. 2002, A&amp;A, 389, 874<br />
Davies, B., Figer, D. F., Kudritzki, R.-P., et al. 2007, ApJ, 671, 781<br />
Negueruela, I., Clark, J. S., &amp; Ritchie, B. W. 2010, A&amp;A, 516, A78<br />
Negueruela, I., Marco, A., González-Fernández, C., et al. 2012, A&amp;A, 547, A15<br />
Sota, A., et al. 2011, Bulletin de la Societe Royale des Sciences de Liege,
80, 519<br />
</p>





<?php echo foot(); ?>

