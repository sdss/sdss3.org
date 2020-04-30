<?php include '../../../../header.php'; echo head('Globular Clusters in M31'); ?>

<h2>Summary</h2>

<!-- 
<p>The main goal of this project is to determine the detailed abundance pattern of the old M31 halo and bulge to an unprecedented level of detail, 
shedding new light on the history of formation of our nearest giant spiral galaxy.</p>
 -->
<p> 
Spectra of the integrated stellar light of globular clusters in M31
</p>

<h2>Finding Targets</h2>

<!-- 
<p>Both cluster targets and background
regions are considered "targets" for this ancillary program and have bit <i>apogee_target1</i> = 18 set.  The background regions are also flagged
as sky fibers on these plates (<i>apogee_target2</i> = 4), since they serve the same purpose as the regularly-selected sky fibers &#8212;
representation of the typical unresolved sky background in the field &#8212; and can be used in the APOGEE data reduction pipeline
in the removal of airglow lines from spectra of both non-cluster and M31 cluster targets.</p>
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
<td> APOGEE_M31_CLUSTER </td>
<td> 18 </td>
<td> globular cluster in M31 </td>
</tr>

</table>

<h2>Description</h2>

<p>
<!-- 
Until the commissioning of 20-30 m class telescopes, the only way in which the chemical composition 
of the old stellar populations of M31 can be appraised in a statistically significant way is 
via the study of its globular cluster population in integrated light. 
 -->
By studying the chemical composition and internal kinematics of M31 clusters 
observed in integrated light with the
APOGEE spectrograph (i.e., each cluster observed with a single fiber), 
this program aims to determine the abundance pattern of M31's old
halo and bulge, 
provide insights into the star formation timescales in the halo and bulge,
and constrain the initial mass function of their first stellar generations.  
These data will greatly 
expand upon the set of elemental cluster abundances
obtained in optical studies (e.g., Colucci et al. 2009; Schiavon et al. 2012)
by enabling the determination of abundances of elements such as O (the most abundant metal and a key 
indicator of the timescales for star formation)
which lack lines at optical wavelengths.
Other key elements accessible by APOGEE include C, N, and Na, 
whose abundances based on optical spectra are uncertain or unavailable altogether.
Further, these data will allow for the derivation of internal velocity dispersions for the 
target sample's massive clusters.</p>

<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="https://publications.ljmu.ac.uk/departments/7/people/7160">Ricardo Schiavon</a></th></tr>
<tr><td>Liverpool John Moores University</td></tr>
<tr><td>R.P.Schiavon -at- ljmu.ac.uk</td></tr>
</table>


<h2>Other contacts</h2>

<p>Carlos Allende Prieto, Dmitry Bizyaev, Robert O'Connell, Matthew Shetrone
</p>


<h2>Target Selection Details</h2>

<p>From the initial list of more than 350 M31 globular clusters (Caldwell et al. 2009), 
about 250 objects brighter than H = 15.0 mag (Vega) were targeted, along with the M31 core, M32, and M110. 
To isolate the integrated cluster spectra from that of the background (unresolved) M31 stellar populations, 
each observation of a cluster in the vicinity of the M31 bulge
was accompanied by one of a very nearby "non-cluster" background region, 
ideally &#8804; 10 arcsec offset from the cluster.
As this distance is significantly smaller than the fiber collision radius of APOGEE fibers,
simultaneous observations of the cluster and background positions could not be made.  
We adopted a scheme whereby two designs were made, each
containing a mixture of cluster targets and background regions for clusters on the <i>other</i> design.  
Globular clusters at large M31-centric distances, against a faint stellar background, 
do not require background region counterparts and were instead targeted on both plates.
</p>

<h2>REFERENCES</h2>

<p>
Caldwell, N. et al. 2009, AJ, 137, 94<br />
Colucci, J.E. et al. 2009, ApJ, 704, 835<br />
Schiavon, R. P., Caldwell, N., Morrison, H., et al. 2012, AJ, 143, 14<br />
<!-- 
Aparicio, A. et al. 2009, AIP Conf. Series, 1111, 222<br />
Cesetti, M. et al. 2009, A&A, 497, 41<br />
Conroy, C. & Gunn, J.E. 2010, ApJ, 712, 833<br />
Galleti, S. et al. 2009, A&A, 508, 1285<br />
Graves, G.J. & Schiavon, R.P. 2008, ApJS, 177, 446<br />
Piotto, G. 2009, IAUS, 258, 2334<br />
Salaris, M. & Cassisi, S. 2007, A&A, 461, 493<br />
Schiavon, R.P. 2007, ApJS, 171, 146<br />
Schiavon, R.P. et al. 2002, ApJ, 580, 850<br />
Schiavon, R.P., Caldwell, N. et al. 2010, AJ, submitted<br />
Strader, J. et al. 2009, AJ, 138, 547<br />
 -->
</p>





<?php echo foot(); ?>

