<?php include '../../../../header.php'; echo head('Host Galaxies of SDSS Supernovae'); ?>

<h2>Summary</h2>

<p>Spectra of host galaxies of supernovae that were identified by the 2005-2008 SDSS supernova 
survey</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET1</code> value include one or more of the bitmasks 
in the following table was targeted for spectroscopy as part of this ancillary target 
program. See <a href="dr10/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how to use 
these values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Sub-program<br />(bit name)</th>
<th>Bit</th>
<th>Target Description</th>
<th>Completeness</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td>SN_GAL1</td>
<td>36</td>
<td>Fiber assigned to the galaxy nearest the supernova position</td>
<td>0.84</td>
<td>13.8</td>
</tr>

<tr>
<td>SN_GAL2</td>
<td>37</td>
<td>Fiber assigned to second-nearest galaxy</td>
<td>0.76</td>
<td>0.4</td>
</tr>

<tr>
<td>SN_GAL3</td>
<td>38</td>
<td>Fiber assigned to third-nearest galaxy</td>
<td>0.79</td>
<td>0.1</td>
</tr>

<tr>
<td>SN_LOC</td>
<td>39</td>
<td>Fiber assigned to position of original supernova</td>
<td>0.88</td>
<td>1.6</td>
</tr>

<tr>
<td>SPEC_SN</td>
<td>40</td>
<td>Target selected from spectroscopy instead of photometric variation</td>
<td>0.25</td>
<td>0.009</td>
</tr>


</table>


<h2>Description</h2>


<p>Between 2005 and 2008, the <a href="http://www.sdss.org/supernova/aboutsupernova.html">Sloan 
Digital Sky Survey supernova survey</a> took repeated images of SDSS stripe 82 (Frieman et al. 
2008). These images were used to identify candidate type Ia supernovae, some of which were 
confirmed through spectroscopic follow-up on larger telescopes. These confirmed type Ia 
supernovae were then analyzed to obtain better constraints on cosmological parameters 
(Kessler et al. 2009).</p>

<p>Although the supernova survey obtained spectra of the supernovae, most of their host galaxies 
had never been observed spectroscopically. Finding redshifts of host galaxies allows the light 
curves to be fit with fewer degrees of freedom, leading to identification of supernova type with 
higher confidence. These higher-confidence classifications will allow a much larger number 
of SNe Ia to be placed on the Hubble diagram.</p>


<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://research.icg.port.ac.uk/user/23">Bob Nichol</a></th></tr>
<tr><td>University of Portsmouth</td></tr>
<tr><td>bob.nichol -at- port.ac.uk</td></tr>
</table>
 

<h2>Other contacts</h2>

<p>
Heather Campbell, Peter Brown, Kyle Dawson, Masao Sako, Josh Frieman, 
&Eacute;ric Aubourg, Bruce Bassett, David Cinabro, Scott Croom, Ben Dilday, Ryan Foley, 
Peter Garnavich, Ariel Goobar, Ren&eacute;e Hlozek, John Holtzman, Saurabh Jha, 
Jonas Johansson, Raul Jimenez, Rick Kessler, Alex Kim, Kohki Konishi, Martin Kunz, 
John Marriner, Claudia Maraston, Ramon Miquel, Matt Olmstead, Adam Riess, Kevin Schawinski, 
Mat Smith, Jesper Sollerman, Michael Strauss, Daniel Thomas, Rita Tojeiro, 
Lifen Wang, Michael Wood-Vasey, Naoki Yasuda, Chen Zheng
</p>


<h2>Target Selection Details</h2>

<p>In this ancillary program, the host galaxies of candidate supernovae were drawn from a 
database containing 21,787 potentially variable objects determined from repeat imaging of 
Stripe 82. The next stage of target selection required signal detection in at least two 
passbands, after vetoing regions of bright stars, as well as variability from known active 
galactic nuclei (AGN) or variable stars. In total, the target list included 4,099 candidates, 
of different SN types and different confidence levels as determined from a Bayesian 
classification of light curve shapes (Sako et al. 2011).</p>

<p>Of these candidate targets, 3,743 were selected for this ancillary program. Fibers on 
the BOSS spectrograph were assigned to these host galaxies, with the goal of obtaining the 
host galaxy's redshift, leading in turn to an improved supernova classification. Approximately 
one third of these 3,743 targets have lightcurves that do not resemble SNe; these are included as 
a control sample.</p>

<p>The redshifts and SNe classifications obtained by this ancillary target program will lead 
to a nearly complete sample of SNe Ia out to z &lt; 0.4, and thus to an enhanced cosmological 
analysis. The new classifications will also enable a large statistical studies of the 
correlated properties between SNe Ia and their host galaxies (e.g. Kelly et al. 2010; 
Sullivan et al. 2010; Lampeitl et al. 2010; Brandt et al. 2010).</p>

<h3>Targets by Sub-Program</h3>

<p>Targets were assigned to sub-programs by visual inspection. Sub-program SN_GAL1 was used for 
fibers positioned at the core of the host galaxy nearest the supernova. Sub-program SN_GAL2 
was used for fibers positioned at the core of the second-nearest host galaxy; similarly, 
SN_GAL3 was used for fibers positioned at the core of the third-nearest host galaxy. Sub-program 
SN_LOC was used for host galaxies whose spectra had already been measured by the SDSS; for these 
galaxies, the fibers were positioned at the location of the original variability of the 
supernova. Sub-program SPEC_SN was used for host galaxies that had been targeted from 
SDSS spectra (e.g. Krughoff et al. 2011), rather than from photometric variability.</p>



<h2>REFERENCES</h2>

<p>
Brandt, T. D., Tojeiro, R., Aubourg, &Eacute;., Heavens, A., Jimenez, R., &amp; Strauss, M. A. 2010, AJ, 140, 804<br />
Frieman, J. A., et al. 2008, AJ, 135, 338<br />
Kelly, P. L., Hicken, M., Burke, D. L., Mandel, K. S., &amp; Kirshner, R. P. 2010, ApJ, 715, 743<br />
Kessler, R., et al. 2009, ApJS, 185, 32<br />
Krughoff, K. S., Connolly, A. J., Frieman, J., SubbaRao, M., Kilper, G., &amp; Schneider, D. P. 2011, ApJ, 731, 42<br />
Lampeitl, H., et al. 2010, MNRAS, 401, 2331<br />
Sako, M., et al. 2008, AJ, 135, 348<br />
Sako, M., et al. 2011, ApJ, 738, 162<br />
Sullivan, M., et al. 2010, ArXiv e-prints
</p>




<?php echo foot(); ?>

