<?php include '../../../../header.php'; echo head('Variable Quasars with Narrow-line Absorption'); ?>

<h2>Summary</h2>

<p>Spectra of narrow absorption line quasars in a 7,650 square degree survey area</p>

<h2>Finding Targets</h2>

<p>An object whose <code>ANCILLARY_TARGET2</code> value include one or more of the bitmasks
in the following table was targeted for spectroscopy as part of this ancillary target program.
See <a href="dr10/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how to use these
values to identify objects in this ancillary target program.</p>

<table class="ancillary">
<tr>
<th>Program<br />(bit name)</th>
<th>Bit name</th>
<th>Target Description</th>
<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>
</tr>

<tr>
<td>QSO_AAL</td>
<td>22</td>
<td>Radio-quiet, with one absorption system associated with the quasar</td>
<td>0.08</td>
</tr>

<tr>
<td>QSO_AALS</td>
<td>23</td>
<td>Radio-quiet, with multiple absorption systems associated with the quasar</td>
<td>0.2</td>
</tr>

<tr>
<td>QSO_IAL</td>
<td>24</td>
<td>Radio-quiet, with one intervening absorption system</td>
<td>0.05</td>
</tr>

<tr>
<td>QSO_RADIO</td>
<td>25</td>
<td>Radio-loud, with multiple absorption systems, either local or intervening</td>
<td>0.04</td>
</tr>

<tr>
<td>QSO_RADIO_AAL</td>
<td>26</td>
<td>Radio-loud, with one absorption system associated with the quasar</td>
<td>0.02</td>
</tr>

<tr>
<td>QSO_RADIO_IAL</td>
<td>27</td>
<td>Radio loud, with one intervening absorption system</td>
<td>0.01</td>
</tr>

<tr>
<td>QSO_NO_AALS</td>
<td>28</td>
<td>Radio-quiet, with multiple intervening absorption systems and no associated
absorption systems</td>
<td>0.01</td>
</tr>

</table>


<h2>Description</h2>

<p>Quasar absorption lines are plentiful in SDSS-I and II, and have been documented
in a catalog of all lines and systems (QSOALS; York et al. 2005). This catalog
(York et al., <i>in prep.</i>), now updated through Data Release 7, contains 60,000
uniformly-detected quasar absorption line systems in which two or more transitions from
common metal absorption lines (e.g., Mg II, Fe II, C IV) are identified at the same
redshift. This dataset has been used to study the statistics of quasar absorption lines
(York et al. 2006) and to confirm correlations with quasars (Wild et al. 2007), as well
as foreground galaxies projected along the line of sight (Lundgren et al. 2009).</p>


<p>It has been shown that smaller equivalent width BALs are more prone to variation
on short timescales (e.g., Barlow 1994; Lundgren et al. 2007). A large survey of
variability in narrow absorption lines (NALs) is therefore required in order to examine
if this trend applies across a larger range in equivalent widths. Complementary to
the <a href="dr10/algorithms/ancillary/boss/balvarqso.php">BAL quasar variability</a> ancillary
target selection program, this program seeks to compile the largest dataset of multi-epoch
observations of quasar sight lines with known narrow absorption along the line of sight.
Detections of variability in narrow absorption line systems hold great promise for
identifying high-velocity intrinsic quasar absorption and mini-BAL emergence and for providing
limits on the sizes of cold gas clouds in the extended haloes of luminous galaxies in
the foreground.</p>

<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://astro.uchicago.edu/people/donald-g-york.php">Don York</a></th></tr>
<tr><td>University of Chicago</td></tr>
<tr><td>don -at- oddjob.uchicago.edu</td></tr>
</table>


<h2>Target Selection Details</h2>

<p>The targets of this program include quasars with 16.5 &lt; <i>i<sub>fib2</sub></i> &lt;
17.9 and redshift 0.7 &lt; z &lt; 2.2 from the DR7 quasar catalog (Schneider et al. 2010),
which would otherwise be ignored by the primary BOSS target selection. Sight lines
with known BALs (Gibson et al. 2008) are ignored, as this parameter space is being
covered by the <a href="dr10/algorithms/ancillary/boss/balvarqso.php">BAL quasar variability</a>
program. Each of the sight lines targeted in this program contains a NAL system detected at &gt;
4&sigma; (including multiple unambiguous transitions of Mg II, C IV, or both), which have
been identified in York et al. (2005).</p>

<p>However, this program is not limited only to cases in which previously identified
NALs disappear in later epochs, since NALs should have the same probability of emerging
along these lines of sight with and without identified NALs. In total, this program targets
about 3000 quasars with a target density of ~0.35 deg<sup>-2</sup>.</p>

<p>As one of the science goals of this program is to determine the extent of variable
NALs in velocity space relative to the quasar, the target list includes sight lines
with NALs over a wide range in velocity. The following sub-groups allow
for the identification of quasars and absorbers with particular characteristics.</p>

<ul>
<li><span class="term">QSO RADIO AAL</span>: radio-loud with 1 associated absorption system
(AAL; v &le; 5000 km/s in the quasar rest frame)</li>
<li><span class="term">QSO RADIO IAL</span>: radio-loud with 1 intervening absorption
system (IAL: v &gt; 5000 km/s in the quasar rest frame)</li>
<li><span class="term">QSO AAL</span>: radio-quiet source with 1 AAL</li>
<li><span class="term">QSO IAL</span>: radio-quiet source with 1 IAL</li>
<li><span class="term">QSO RADIO</span>: radio-loud source with multiple AALs and/or IALs</li>
<li><span class="term">QSO AALs</span>: radio-quiet source with multiple AAL and/or IALs</li>
<li><span class="term">QSO noAALs</span>: radio-quiet source with no AALs and multiple
IALs</li>
</ul>

<h2>REFERENCES</h2>
<p>
Barlow, T. A. 1994, PASP, 106, 548<br />

Gibson, R. R., Brandt, W. N., Schneider, D. P., &amp; Gallagher, S. C. 2008, ApJ, 675, 985<br />

Lundgren, B. F., Wilhite, B. C., Brunner, R. J., Hall, P. B.,
Schneider, D. P., York, D. G., Vanden Berk, D. E., &amp;
Brinkmann, J. 2007, ApJ, 656, 73<br />

Lundgren, B. F., et al. 2009, ApJ, 698, 819<br />

Schneider, D. P., et al. 2010, AJ, 139, 2360<br />

Wild, V., Hewett, P. C., &amp; Pettini, M. 2007, MNRAS, 374, 292<br />

York, D. G., et al. 2005, in IAU Colloq. 199: Probing Galaxies
through Quasar Absorption Lines, ed. P. Williams, C.-G. Shu,
&amp; B. M&eacute;nard, 58-64<br />

York, D. G., et al. 2006, MNRAS, 367, 945
</p>

<?php echo foot(); ?>

