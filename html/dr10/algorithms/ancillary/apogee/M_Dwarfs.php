<?php include '../../../../header.php'; echo head('M Dwarfs'); ?>

<h2>Summary</h2>

<p>Spectra of stars with known spectral class M</p>

<h2>Finding Targets</h2>

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
<td> APOGEE_MDWARF </td>
<td> 19 </td>
<td> M dwarf star </td>
</tr>

</table>

<h2>Description</h2>

<p>M dwarfs make excellent candidates for planet searches due to both their ubiquity and
the increased RV signal of a planet in the Habitable Zone (HZ; Kasting et al. 1993),
relative to the same planet around an F, G, or K star. 
<!-- 
The M dwarf planet population is beginning to be uncovered,
with ~30 planetary systems around M dwarfs discovered through RV variations, transits, and microlensing.
These systems include a possible planet in the HZ around GJ 667C (Anglada-Escud&#233; et al. 2012)
and the super-Earth GJ 1214b (Charbonneau
et al. 2009). Due to their intrinsic optical faintness,
M dwarfs of subtypes later than ~M4 are difficult targets for optical RV and transit searches.
<br />
<br />
 -->
However, the coming generation of NIR precision-RV planet surveys, such as HPF (Mahadevan et al.
2010)
and CARMENES (Quirrenbach et al. 2010), will be able to search efficiently around hundreds of nearby M dwarfs.
<!-- 
These surveys will require careful target selection in order to sample a range of stellar abundances 
and slow projected rotational velocities. APOGEE is particularly well-suited for the study of nearby M dwarfs 
because these stars emit a much higher fraction of their total flux in the NIR <i>Y&#8211;H</i>-band 
spectral region (0.9-1.8&#956;m) than in the optical,
enabling the study of later type stars than can be observed with current optical instruments.
<br />
<br />
 -->
The primary goals of this ancillary program are to
constrain the rotational velocities and compositions of &ge; 1400 M dwarfs and to
detect their low mass companions through RV variability measurements.
<!-- 
As <i>v</i>sin(i) estimates exist in the literature for only ~300 M dwarfs,
this sample will increase the number of available M dwarf <i>v</i>sin(i) measurements by nearly a factor of five. 
 -->
By using metallicity-sensitive <i>H</i>-band features, including some blended K and Ca lines (Terrien et al. 2012),
<!-- 
and bootstrapping off targets with previous metallicity estimates, 
 -->
we can derive metallicities for these M dwarfs,
a measurement notoriously difficult to make directly because of their complex spectra. Finally,
the multiplicity of M dwarfs and the rate of both brown dwarf and 
high-mass giant planet companions to M dwarfs can be probed
via RV variability (along with direct <i>K</i>-band imaging),
particularly in the subset of M dwarfs that will have &ge; 12 APOGEE epochs,
with time baselines beginning years before dedicated NIR RV planet searches come online.
</p>

<h2>Primary contacts</h2>

<table class="contact">
<tr><th><a href="http://www.astro.psu.edu/people/sqm107">Suvrath Mahadevan</a></th></tr>
<tr><td>Penn State University</td></tr>
<tr><td>suvrath -at- astro.psu.edu</td></tr>

<tr><th>Cullen Blake</th></tr>
<tr><td>Princeton University</td></tr>
<tr><td>cblake -at- astro.princeton.edu</td></tr>
</table>


<h2>Other contacts</h2>

<p>Chad Bender, Joleen Carlberg, Justin Crepp, Rohit Deshpande, Fred Hearty, David Nidever, Don Schneider, Ryan Terrien</p>


<h2>Target Selection Details</h2>

<p>Targets are drawn from two primary sources:
the LSPM-North catalog of nearby stars (L&eacute;pine &amp; Shara 2005) and the
L&eacute;pine &amp; Gaidos (2011) catalog of nearby M dwarfs, which are both proper motion-selected catalogs.
The LSPM-N sample required a simple color cut of (V-K) &gt; 4 to select dwarfs of subtype M4 and later;
the LG11 catalog already includes extensive color and reduced proper motion cuts aimed at selecting M dwarfs.
For calibration, several targets are included that are known planet hosts, RV standards,
and/or have previous <i>v</i>sin(<i>i</i>) or [Fe/H] estimates.
We also include five M dwarfs that are <i>Kepler</i> objects of interest (Borucki et al. 2010),
and three L dwarfs (Wilson et al. 2003; Phan-Bao et al. 2008).</p>

<h2>REFERENCES</h2>

<p>
Allard, F. &amp; Hauschildt, P. 1995, ApJ, 445, 433A <br />
Bean, J. et al. 2006, ApJ, 652, 1604B <br />
Bender, C. et al. 2011, in prep. <br />
Bonfils, X. et al. 2005, A&amp;A, 442, 635B <br />
Cushing, M. et al. 2005, ApJ, 623, 1115C <br />
Endl, M. et al. 2006, ApJ, 649, 436 <br />
Figueira, P. et al. 2010, A&amp;A, 511A, 55F <br />
Gustafsson, B. 1989, ARA&amp;A, 27, 701G <br />
Heacox, W. 1986, AJ, 92, 219H <br />
Irwin, J. et al. 2010, ApJ, 718, 1353I <br />
Jenkins et al. 2009, ApJ, 704, 975J <br />
Jones, H. R. A et al. 2002, MNRAS, 330, 675J <br />
Johnson, J. &amp; Apps, K. 2009, ApJ, 699, 933J <br />
Johnson, J. et al. 2010, ApJ, 721L, 153J <br />
Lepine, S. Shara, M. M. 2005, AJ, 129, 1483L <br />
Maness, H. et al. 2007, PASP, 119, 90M <br />
Mayor, M. et al. 2009b, A&amp;A, 507, 487M <br />
Mayor, M. et al. 2009a, A&amp;A, 493, 639M <br />
Rojas-Ayala, B. et al. 2010, ApJ, 720L, 113R <br />
Schlaufman, K. &amp; Laughlin, G. 2010, A&amp;A, 519A, 105S<br />
Tull, R. 1969, Appl. Opt., Vol 8., pg. 1635-1638 <br />
Valenti et al. 1995, PASP, 107, 966V <br />
Valenti,J.&amp; Fischer, D. 2005, ApJS, 159, 141V <br />
Vogt, S. et al. 2010, arXiv1009.5733V <br />
Woolf V. &amp; Wallerstein, G. 2006, PASP, 118, 218W <br />
</p>





<?php echo foot(); ?>

