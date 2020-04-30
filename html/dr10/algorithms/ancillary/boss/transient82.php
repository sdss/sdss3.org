<?php include '../../../../header.php'; echo head('The Transient Universe in Stripe 82'); ?>

<h2>Summary</h2>

<p>Spectra of a variety of variable objects in a 220-square-degree section of the repeated imaging of SDSS stripe 82</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET1</code> value includes one or more of the bitmasks
in the following table was targeted for spectroscopy as part of this ancillary target program.
See <a href="dr10/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how to use these
values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Sub-program<br />(bit name)</th>
<th>Bit</th>
<th>Target Description</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td>AMC</td>
<td>0</td>
<td>Candidate Am CVn variables</td>
<td>0.05</td>
</tr>

<tr>
<td>FLARE1</td>
<td>1</td>
<td>Flaring M stars (year 1 targets)</td>
<td>0.2</td>
</tr>

<tr>
<td>FLARE2</td>
<td>2</td>
<td>Flaring M stars (year 2 targets)</td>
<td>0.7</td>
</tr>

<tr>
<td>HPM</td>
<td>3</td>
<td>High Proper Motion stars</td>
<td>0.5</td>
</tr>

<tr>
<td>LOW_MET</td>
<td>4</td>
<td>Low-metallicity M dwarfs</td>
<td>0.3</td>
</tr>

<tr>
<td>VARS</td>
<td>5</td>
<td>Variables outside the stellar and quasar loci</td>
<td>0.9</td>
</tr>

<tr>
<td>MTEMP</td>
<td>63</td>
<td>Template M-stars observed as a comparison sample</td>
<td>0.5</td>
</tr>


</table>


<h2>Description</h2>

<p>The repeat imaging in SDSS's Stripe 82 allows identification of transient and variable phenomena
of all sorts (for example Anderson et al. 2008; Blake et al. 2008; Becker et al. 2008;
Kowalski et al. 2009; Bhatti et al. 2010; Becker et al. 2011; Sako et al. 2011). In this program,
several classes of variable point sources and high-proper-motion stars discovered in Stripe 82
photometry were targeted for follow-up spectroscopy with the BOSS spectrograph. Targeted objects
include flaring M stars (Kowalski et al. 2009), faint high proper motion stars (Scholz et al. 2009;
Schmidt et al. 2010c), candidate low-metallicity M dwarfs, and diverse
samples of variable stars (Roelofs et al. 2007; Anderson et al. 2008; Blake et al. 2008).</p>

<p>The target selection criteria for each class of transient objects
is described in the "Target selection details" section below.</p>


<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://sites.sas.upenn.edu/chblake/">Cullen Blake</a></th></tr>
<tr><td>University of Pennsylvania</td></tr>
<tr><td>chblake -at- sas.upenn.edu</td></tr>
</table>


<h2>Other contacts</h2>

<p>Scott Anderson, Joshua S. Bloom, John Bochanski, John
M. Brewer, Daryl Haggard, Suzanne Hawley, Eric Hilton, Adam
Kowalski, Peter Nugent, Sarah Schmidt, Lucianne Walkowicz, and
Andrew West
</p>


<h2>Target Selection Details</h2>

<p>The target selection for this program is complicated. Each of the six sub-programs used
a different target selection algorithm. The paragraphs below describe the algorithm for
each sub-program.</p>

<h3>Candidate Am CVn Stars</h3>

<p>Consists of ten candidate Am CVn stars selected based on their variability and colors <br />
((u<sub>psf</sub> &ndash; g<sub>psf</sub>) &gt; 0.4 and (g<sub>psf</sub> &ndash; r<sub>psf</sub>) &gt; 0)</p>

<p>To identify candidate AM CVn stars in the Stripe 82 footprint, this ancillary target program
used variability indices developed by Stetson (1996), which take advantage of simultaneous
multi-band observations of stars with AM CVn-like colors. The color selection criteria were
defined based on the colors of known AM CVn stars, but do allowed for objects bluer than any
known AM CVn system.</p>

<p>The addition of variability information to the color-selected sample has allows a subset of
variable star candidates to be defined; this subset should be more likely to contain genuine AM
CVn stars. Quasars and Active Galactic Nuclei (AGN) are the dominant confusing variable
sources in this region of color-space.</p>


<h3>Flare Stars</h3>

<p>Consists of about 200 flaring M stars selected from the Bramich et al. (2008) and
Ivezi&#263; et al. (2007) catalogs with g<sub>psf</sub> &lt; 21.4, i<sub>PSF</sub> &lt; 19,
0.3 <sub>&lt;</sub> (i<sub>psf</sub> - z<sub>psf</sub>) &lt; 1.3, and exhibiting a flare
event in the Stripe 82 imaging data with amplitude &Delta;u &gt; 1 mag (Kowalski et al. 2009).</p>

<p>The <code>FLARE1</code> and <code>FLARE2</code> targets were selected using 
slightly different methodologies for estimating the quiescent u-band 
magnitudes of the M stars.</p>


<h3>High Proper Motion Stars</h3>

<p>Consists of about 100 high-proper-motion stars selected from the catalogs of Bramich et al.
(2008) and Ivezi&#263; et al. (2007) with an emphasis on faint objects with high proper
motions (&mu; &gt; 0.1 mas/yr).</p>

<p>The goal of this target selection sub-program was to identify nearby low-mass stars 
and white dwarfs. Candidate nearby low-mass stars include faint stars 
(19 &lt; <i>z<sub>PSF</sub></i> &lt; 20) with (<i>i<sub>PSF</sub></i> - <i>z<sub>PSF</sub></i>) 
&gt; 1.5, including objects with photometric detections in <i>z</i> band only. Candidate 
nearby white dwarfs include stars with (<i>g<sub>PSF</sub></i> - <i>r<sub>PSF</sub></i>) ~ 0 
and <i>g<sub>PSF</sub></i> &gt; 19.</p>


<h3>Low-Metallicity M Dwarfs</h3>

<p>Approximately 70 candidate low-metallicity M stars (flag LOW MET) were also targeted based on their
colors being slightly outside the low-mass star stellar locus defined in West et al. (2005).</p>




<h3>Other Variable Objects</h3>

<p>Consists of ~ 200 variables with g<sub>psf</sub> &lt; 21.5, (g<sub>psf</sub> &ndash; r<sub>psf</sub>) &gt; -0.5,
and RMS variability in g band &gt; 0.1 mag. These objects were selected to lie outside the stellar
and quasar loci in (g<sub>psf</sub> &ndash; r<sub>psf</sub>) &ndash; (r<sub>psf</sub> - i<sub>psf</sub>)
color-color space as defined in Fan et al. (1999).</p>


<h3>MTEMP Stars</h3>

<p>As part of this ancillary program, a number of spectral templates were observed as well. These include a
random sample of approximately 100 M stars, designated MTEMP, selected to span the spectra range M0
to M8 following the color criteria outlined in West et al. (2005) (17.5 &lt; iPSF &lt; 18.5,
(r<sub>psf</sub> &ndash; i<sub>psf</sub>) &gt; 0.5, (i<sub>psf</sub> &ndash; z<sub>psf</sub>) &gt; 0.3).</p>


<h2>REFERENCES</h2>

<p>
Anderson, S. F., et al. 2008, AJ, 135, 2108<br/>
Becker, A. C., et al. 2008, MNRAS, 386, 416<br/>
Bhatti, W. A., Richmond, M. W., Ford, H. C., &amp; Petro, L. D. 2010, ApJS, 186, 233<br/>
Blake, C. H., Torres, G., Bloom, J. S., &amp; Gaudi, B. S. 2008, ApJ, 684, 635<br/>
Bramich, D. M., et al. 2008, MNRAS, 386, 887<br/>
Fan, X., et al. 1999, AJ, 118, 1<br />
Ivezi&#263;, &#381;., et al. 2004, Astronomische Nachrichten, 325, 583<br/>
Kowalski, A. F., Hawley, S. L., Hilton, E. J., Becker, A. C., West, A. A., Bochanski, J. J., &amp; Sesar, B. 2009,
AJ, 138, 633<br/>
Roelofs, G. H. A., Nelemans, G., &amp; Groot, P. J. 2007, MNRAS, 382, 685<br/>
Sako, M., et al. 2011, ApJ, 738, 162<br/>
Schmidt, S. J., West, A. A., Hawley, S. L., &amp; Pineda, J. S. 2010c, AJ, 139, 1808
Scholz, R.-D., Storm, J., Knapp, G. R., &amp; Zinnecker, H. 2009, A&amp;A, 494, 949<br/>
Stetson, P.B., 1996, PASP, 108, 851<br />
West, A. A., Walkowicz, L. M., &amp; Hawley, S. L. 2005, PASP, 117, 706<br />
</p>





<?php echo foot(); ?>

