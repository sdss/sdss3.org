<?php include '../../../header.php'; echo head('Broad Absorption Line (BAL) Quasar Variability Survey'); ?>

<h2>Summary</h2>

<p>Spectra for broad absorption lines (BAL) quasars in a 5740 deg<sup>2</sup> survey area</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET1</code> value include one or more of the bitmasks 
in the following table was targeted for spectroscopy as part of this ancillary target program. 
See <a href="dr9/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how to use these 
values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Program<br />(bit name)</th>
<th>Bit</th>
<th>Target Description</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td>FBQSBAL</td>
<td>15</td>
<td>Broad absorption line (BAL) quasar with spectrum from the FIRST Bright Quasar Survey (FBQS)</td>
<td>0.003</td>
</tr>
<tr>
<td>LBQSBAL</td>
<td>16</td>
<td>Broad absorption line (BAL) quasar with spectrum from the Large Bright Quasar Survey (LBQS)</td>
<td>0.002</td>
</tr>
<tr>
<td>ODDBAL</td>
<td>17</td>
<td>Broad absorption line (BAL) quasar with various unusual properties</td>
<td>0.007</td>
</tr>
<tr>
<td>OTBAL</td>
<td>18</td>
<td>Photometrically-selected overlapping-trough (OT) broad absorption line (BAL) quasar</td>
<td>0.003</td>
</tr>
<tr>
<td>PREVBAL</td>
<td>19</td>
<td>Broad absorption line (BAL) quasar with prior spectrum from SDSS-I/-II</td>
<td>0.004</td>
</tr>
<tr>
<td>VARBAL</td>
<td>20</td>
<td>Photometrically-selected candidate broad absorption line (BAL) quasar</td>
<td>0.35</td>
</tr>

</table>


<h2>Description</h2>


<p>Thousands of broad absorption line (BAL) quasars were discovered in the SDSS-I and SDSS-II 
(e.g. <a href="http://adsabs.harvard.edu/abs/2009ApJ...692..758G">Gibson et al. 2009</a>). In some 
cases, repeat spectroscopy showed variable absorption, providing clues to the nature of the 
BAL phenomenon (e.g., <a href="http://adsabs.harvard.edu/abs/2007ApJ...656...73L">Lundgren et al. 2007</a>; 
<a href="http://adsabs.harvard.edu/abs/2008ApJ...675..985G">Gibson et al. 2008</a>; 
<a href="http://adsabs.harvard.edu/abs/2010ApJ...713..220G">Gibson et al. 2010</a>). Returning with 
BOSS to obtain repeat spectra for a much-larger sample of these quasars allows for large-scale study 
of BAL variability on multi-year timescales in the rest frame. The resulting data provide insight 
into the dynamics, structure, and energetics of quasar winds.</p>

<p>The first science results from this ancillary project have been submitted to ApJ (Filiz et al. 
submitted).</p>


<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://www2.astro.psu.edu/~niel/">Niel Brandt</a></th></tr>
<tr><td>Pennsylvania State University</td></tr>
<tr><td>neil -at- astro.psu.edu</td></tr>
</table>
 
<h2>Other contacts</h2>

<p>Donald Schneider</p>


<h2>Target Selection Details</h2>

<p>Targets for this ancillary project were selected before the decision was made to re-target 
known quasars at z &gt; 2.15 in the <a href="dr9/algorithms/boss_quasar_ts.php">BOSS Quasar 
target selection algorithm</a>; thus there is some overlap between these two samples. However, 
this ancillary project does provide many unique targets at z &lt; 2.15.</p>

<p>The main sample of BAL quasars chosen for study contains 2,005 objects assigned the ancillary 
target flag <span class="term">VARBAL</span>; this sample is about two orders of magnitude 
larger than those previously used to investigate BAL variability on multi-year timescales. 
These 2,005 objects were selected to be optically bright (<i>i<sub>PSF</sub></i> &lt; 19.28 
with no correction for extinction), and to have at least moderately strong absorption in one of 
their BAL troughs (with a "balnicity index" of BI<sub>0</sub> &gt; 100 km/s as measured by 
<a href="http://adsabs.harvard.edu/abs/2009ApJ...692..758G">Gibson et al. 2009</a>).</p>

<p>In addition, only quasars in redshift ranges such that strong BAL transitions are 
fully covered by the SDSS-I/-II/BOSS spectra (from outflow velocities of 0-25000 km/s) were 
included; see Section 4 of 
<a href="http://adsabs.harvard.edu/abs/2009ApJ...692..758G">Gibson et al. 2009</a> for further
explanation.</p>

<p>The corresponding redshift ranges are 1.96 &lt; z &lt; 5.55 for Si IV BALs, 1.68 &lt; z &lt; 4.93 
for C IV BALs, 1.23 &lt; z &lt; 3.93 for Al III BALs, and 0.48 &lt; z &lt; 2.28 for Mg II BALs. 
Finally, for those objects in the <a href="http://adsabs.harvard.edu/abs/2009ApJ...692..758G">Gibson et 
al. (2009)</a> catalog that have measurements of the signal-to-noise ratio at rest-frame 
1700 &Aring; (SN1700), we require SN1700 &gt; 6; this criterion ensures that high-quality 
SDSS/SDSS-II spectra are available for these targets.</p>

<p>In addition to the primary sample objects described above as <span class="term">VARBAL</span>, 
the BAL quasar variability survey also targets 102 additional BAL quasars selected through other 
target selection approaches. These targets may violate one or more of the selection criteria used 
for the <span class="term">VARBAL</span> targets, but they have been identified as worthy of new 
observations nonetheless.</p>

<p>The relevant source types for these additional BAL quasars are the following:</p>

<ul>
<li><span class="term">LBQSBAL</span> and <span class="term">FBQSBAL</span> are BAL quasars 
identified in the Large Bright Quasar Survey 
(LBQS; e.g., <a href="http://adsabs.harvard.edu/abs/1995AJ....109.1498H">Hewett et al. 1995</a>) 
and the FIRST Bright Quasar Survey (FBQS; e.g., 
<a href="http://adsabs.harvard.edu/abs/2000ApJS..126..133W">White et al. 2000</a>), respectively. 
These targets thus have LBQS or FBQS spectra predating the SDSS-I/-II spectra by up to a decade or more.</li>
<li><span class="term">OTBAL</span> (Overlapping-Trough BAL quasars) are BAL quasars with nearly 
complete absorption at wavelengths shortward of Mg II in one epoch, and which in one case have already 
shown extreme variability (e.g., <a href="http://adsabs.harvard.edu/abs/2002ApJS..141..267H">Hall et al. 
2002</a>). These objects were selected by hand as likely to be highly unusual.</li>
<li><span class="term">PREVBAL</span> are BAL quasars observed more than once by SDSS-I/-II. They thus 
already possess more than one observation epoch for comparison to BOSS spectra.</li>
<li><span class="term">ODDBAL</span> are BAL quasars selected to have various unusual 
properties (e.g., <a href="http://adsabs.harvard.edu/abs/2002ApJS..141..267H">Hall et al. 
2002</a>). For these objects, variability (or lack thereof) between SDSS-I/-II and BOSS may 
help to unravel the processes responsible for their unusual spectra.</li>
</ul>


<h2>References</h2>

<p>
Gibson, R.R., Brandt, W.N., Schneider, D.P., &amp; Gallagher, S.C., 2008, AJ, 675, 985, 
<a href="http://iopscience.iop.org/0004-637X/675/2/985/">doi:10.1086/527462</a><br />

Gibson, R.R., Jiang, L., Brandt, W.N., Hall, P.B., Shen, Y., Wu, J., Anderson, S.F., 
Schneider, D.P., Vanden Berk, D., Gallagher, S.C., Fan, X., &amp; York, D.G., 2009, 
AJ, 692, 758, <a href="http://iopscience.iop.org/0004-637X/692/1/758/">
doi:10.1088/0004-637X/692/1/758</a><br />

Gibson, R.R., Brandt, W.N., Gallagher, S.C., Hewett, P.C., &amp; Schneider, D.P., 
2010, ApJ, 713, 200, 
<a href="http://iopscience.iop.org/0004-637X/713/1/220/">doi:10.1088/0004-637X/713/1/220</a><br />

Hall, P.B., et al., 2002, ApJS, 141, 267, <a href="http://iopscience.iop.org/0067-0049/141/2/267/">
doi:10.1086/340546</a><br />

Hewett, P.C., Foltz, C.B. &amp; Chaffee, F.H., 1995, AJ, 109, 1498<br /> 

Lundgren, B.F., Wilhite, B.C., Brunner, R.J., Hall, P.B., Schneider, D.P., York, D.G., 
Vanden Berk, D.E., &amp; Brinkmann, J., 2007, AJ, 656, 73, 
<a href="http://iopscience.iop.org/0004-637X/656/1/73/">doi:10.1086/510202</a><br />

White, R.L., Becker, R.H., Gregg, M.D., Laurent-Muehleisen, S.A., Brotherton, M.S., 
Impey, C.D., Petry, C.E., Foltz, C.B., Chaffee, F.H., Richards, G.T., Oegerle, W.R., 
Helfand, D.J., McMahon, R.G., &amp; Cabanela, J.E., 2000, ApJS, 126, 133, 
<a href="http://iopscience.iop.org/0067-0049/126/2/133/">doi:10.1086/313300</a>
</p>



<?php echo foot(); ?>

