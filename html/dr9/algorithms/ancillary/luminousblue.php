<?php include '../../../header.php'; echo head('Luminous Blue Galaxies'); ?>

<h2>Summary</h2>

<p>Spectra of a sample of luminous blue galaxies at 0.7 &lt; z &lt; 1.7 in a 143-square-degree 
subset of the BOSS survey area</p>

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
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td>ELG</td>
<td>61</td>
<td>Luminous Blue Galaxies</td>
<td>22</td>
</tr>
</table>

<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://lam.oamp.fr/people/article/jean-paul-kneib">Jean-Paul Kneib</a></th></tr>
<tr><td>Laboratoire d'Astrophysique de Marseille</td></tr>
<tr><td>jean-paul.kneib -at- oamp.fr</td></tr>
</table>
 

<h2>Other contacts</h2>

<p>Johan Comparat, S&eacute;bastien Heinis, Anne Ealet, St&eacute;phanie Escoffier, 
David Schlegel, Martin White, Nick Mostek, Alexie Leauthaud, Eric Huff, Will Percival, 
Jeffrey Newman
</p>


<h2>Description</h2>

<p>Studies from the second Deep Extragalactic Evolutionary Probe (DEEP2; Davis et al. 2003) 
reveal that the most luminous, most star-forming blue galaxies at z ~ 1 appear to be a 
population that evolves into massive red galaxies at lower redshifts (Cooper et al. 2008). 
Sampling 2,000 color-selected galaxies from either SDSS Stripe 82 or the CFHT-LS Wide fields 
(W1, W3, and W4) allows a measure of the clustering of the rarest, most luminous of 
these blue galaxies on large scales. Such a measurement has not yet been conducted, as 
prior galaxy-evolution motivated surveys have a limited field of view and mostly 
target fainter galaxies.</p>



<h2>Target Selection Details</h2>

<p>The galaxy targets were color-selected based on the CFHT-LS photometric-redshift 
catalog (Coupon et al. 2009). Different color selections were explored using either the 
(u<sub>PSF</sub> - g<sub>PSF</sub> , g<sub>PSF</sub> - r<sub>PSF</sub> ) color-color 
diagram down to g<sub>PSF</sub> &lt; 22.5 or the (g<sub>PSF</sub> - r<sub>PSF</sub> , 
r<sub>PSF</sub> -i<sub>PSF</sub>) color-color diagram down to i<sub>PSF</sub> &lt; 21.3. 
Detailed description of the color selection and redshift measurements will be discussed 
in Comparat et al (2012a, to be submitted). Using this dataset, photometric redshifts 
can be re-calibrated in the CFHT-LS W3 field, thereby reducing biases in redshift 
estimates at z &gt; 1. Measurement of the galaxy bias of these luminous blue galaxies 
will be presented in Comparat et al (<i>in preparation</i>).</p>

<p>This dataset has been important in motivating the "extended-BOSS" project (PI, J.-P. Kneib), 
a survey that is proposed to begin in Fall 2014 as part of the successor to SDSS-III. The data 
will also be used to improve the targeting strategy of future projects such as BigBOSS 
(Schlegel et al. 2011).</p>


<h2>REFERENCES</h2>


<p>
Cooper, M. C., et al. 2008, MNRAS, 383, 1058<br />
Coupon, J., et al. 2009, A&amp;A, 500, 981<br />
Davis, M., et al. 2003, in Discoveries and Research Prospects from 6- to 10-Meter-Class Telescopes II. Edited 
by Guhathakurta, Puragra. Proceedings of the SPIE, Volume 4834, 161-172<br />
Schlegel, D., et al. 2011, ArXiv e-prints
</p>



<?php echo foot(); ?>

