<?php include '../../header.php'; echo head('SEGUE Stellar Target Selection: Detailed Selection Criteria'); ?>

<h2 id="outline">Outline</h2>

<ul>
<li><a href="dr10/algorithms/segue_target_selection_details.php#SEGUEts1">SEGUE-1</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#SEGUEts2">SEGUE-2</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#SDSSts">SDSS Legacy Stellar Targeting</a></li>
</ul>

<h2 id="SEGUEts1">SEGUE-1 Target Type Descriptions</h2>

<p>
The following are the target types included in the SEGUE-1 survey.
To jump to a particular target category, please use the links : </p>
<table class="noborder">
<tr>
<td valign="top">
<ul>
<li><a href="dr10/algorithms/segue_target_selection_details.php#wd"> White Dwarf</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#cwd">Cool White Dwarf</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#bhb">A/BHB</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#f">F turnoff, subdwarf</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#fg">F/G stars</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#g">G stars</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#kg">K giant</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#llkg">Low Latitude K giant</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#llAGB">Low Latitude AGB/M giant</a></li>
</ul></td>
<td valign="top">
<ul>
<li><a href="dr10/algorithms/segue_target_selection_details.php#low">Low Metallicity</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#kd">K dwarf</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#mswd">Main sequence - White dwarf pair</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#msub">M sub-dwarf</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#brown">L, T Brown dwarf</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#agb">AGB candidate</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#esdm">Extreme M subdwarfs</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#llblue">Low Latitude Blue Stellar Locus</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#SpecialTS">Special targets</a></li>
</ul>
</td>
</tr>
</table>

<h3 id="wd">White dwarf selection</h3>

<p>(bit -2146959360 &rarr; 0x80080000)</p>

<ul>
<li>Color cuts:
<ul>
<li>g &lt; 20.3</li>
<li>-1 &lt; (g-r) &lt; -0.2</li>
<li>-1 &lt; (u-g) &lt; 0.7</li>
<li>u-g + 2(g-r) &lt; -0.1</li>
</ul></li>
<li>Weighting: magslope 1.2</li>
<li>Target count Goal: 25 per plate pair</li>
</ul>

<h3 id="cwd">Cool White dwarf selection</h3>

<p>(bit -2147352576 &rarr;  0x80020000)</p>

<ul><li>Color cuts:
<ul>
<li>14.5 &lt; r &lt; 20.5</li>
<li>-2 &lt; g-i</li>
<li>g-i &lt; 1.7 (if no neighbor with g &gt; 22 within 7 arcsec)</li>
<li>otherwise (g-i) &lt; 0.12</li>
</ul></li>

<li>Require reliable proper motion (&mu;) measurement (Good PM):
<ul>
<li>one-to-one match to USNO_B</li>
<li>good proper motion fit (small rms in each coordinate)</li>
<li>be detected in all 5 epochs in USNO-B</li>
<li>no neighbor brighter than g = 22 within 7 arcsec
(to avoid blending problems)<br />
OR <br />
blue enough (g-i &lt; 0.12) that target is likely white dwarf</li>
</ul></li>

<li>Cuts on reduced proper motion H<sub>g</sub>:
<ul>
<li>H<sub>g</sub> &gt; 17.5</li>
<li>H<sub>g</sub> &gt; 16.05 + 2.9(g-i)</li>
</ul></li>
<li>Weighting: magslope 1.2</li>
<li>Target count Goal: 10 per plate pair (but allow overflow if they are present)</li>
</ul>

<h3 id="bhb">A/BHB selection</h3>

<p>(bit -2147475456 &rarr; 0x80002000)</p>

<ul><li>Color cuts:
<ul>
<li>g &lt; 20.5</li>
<li>0.8 &lt; (u-g) &lt; 1.5</li>
<li>-0.5 &lt; (g-r) &lt; 0.2</li>
<li>u detection present</li>
</ul></li>
<li>Also compute color-gravity index:<br />
v = 0.283(u-g) - 0.354(g-r) + 0.455(r-i) + 0.766(i-z)</li>
<li>Weighting: weight on the 'v' parameter so object with v color
of 0 is 4 times as likely to get fiber as v of 0.4.</li>
<li>Target count Goal: 150 per plate pair  (get ~100 per pair)</li>
</ul>

<h3 id="f">F turnoff, sub-dwarf selection</h3>

<p>(bit -2146435072 &rarr; 0x80100000)</p>

<ul><li>Color cuts:
<ul>
<li>-0.7 &lt; <a href="dr10/algorithms/segue_target_selection.php#P1">P1(s)</a> &lt; -0.25</li>
<li>0.4 &lt; (u-g) &lt; 1.4</li>
<li>0.2 &lt; (g-r) &lt; 0.7</li>
<li>g &lt; 20.3</li>
</ul></li>
<li><a href="dr10/algorithms/segue_target_selection.php#P1">P1</a> is a color perpendicular to the locus for F/G/K stars;
more negative P1 indicates lower-metallicity side of locus.</li>
<li>Note: there was an <a href="dr10/algorithms/segue_target_selection.php#scolor">s-color</a> cut in versions prior to v3.3,  s &ge; -0.065,
no longer present for v3.3 and beyond.</li>
<li>Weighting: colorslope+ magnitude weighting P1 min/max slope = 5</li>
<li>Target count Goal: 200 per plate pair</li>
</ul>

<h3 id="fg">F/G stars</h3>

<p>(bit -2147483136 &rarr;  0x80000200)</p>

<ul><li>Color cuts:
<ul>
<li>0.2 &lt; (g-r) &lt; 0.48</li>
<li>14.0 &lt; g &lt; 20.2</li>
</ul></li>
<li>Unbiased random subsampling of this range of (g-r) color space</li>
<li>Target count Goal: 50 per plate pair</li>
</ul>

<h3 id="g">G selection</h3>

<p>(bit -2147221504 &rarr; 0x80040000)</p>

<ul><li>Color cuts:
<ul>
<li>14.0 &lt; r &lt; 20.2</li>
<li>0.48 &lt; (g-r) &lt; 0.55</li>
</ul></li>
<li>Note: slightly wider (g-r) color band to get sufficient targets at high |b|.</li>
<li>Weighting: random</li>
<li>Target count Goal: 375 per plate pair</li>
</ul>

<h3 id="kg">K Giant Selection</h3>

<p>(bit -2147467264 &rarr; 0x80004000)</p>

<ul><li>Color cuts:
<ul>
<li>r &lt; 20.2</li>
<li>0.7 &lt; (u-g) &lt; 4.0</li>
<li>0.35 &lt; (g-r) &lt; 0.8</li>
<li>0.15 &lt; (r-i) &lt; 0.6</li>
<li><a href="dr10/algorithms/segue_target_selection.php#lcolor">l-color</a> &gt; 0.07</li>
</ul></li>
<li> PM<sub>total</sub> &lt; 11 milliarcsec/year</li>
<li> <a href="dr10/algorithms/segue_target_selection.php#goodpm">Good proper motion</a></li>
<li>Weighting: magslope 2.0</li>
<li>Target count Goal: 95 per plate pair (expected density 4/sq deg = 28/plate pair)</li>
</ul>

<h3 id="low">Low Metallicity selection</h3>

<p>(bit -2147418112 &rarr; 0x80010000)</p>

<ul><li>Color cuts:
<ul>
<li>14 &lt; r &lt; 19.5</li>
<li>-0.5 &lt; (g-r) &lt; 0.75</li>
<li>0.6 &lt; (u-g) &lt; 3.0</li>
<li><a href="dr10/algorithms/segue_target_selection.php#lcolor">l-color</a> &gt; 0.135</li>
<li>require detection in u band</li>
</ul></li>
<li>Weighting: magslope 1.8. Faint plate targets sorted by
magnitude to 'pack' them, so that brightest ones targeted before
fainter ones.</li>
<li>Target count Goal: 150 per plate pair</li>
</ul>

<h3 id="kd">K dwarf selection</h3>

<p>(bit -2147450880 &rarr; 0x80008000)</p>

<ul><li>Color cuts:
<ul>
<li>14.5 &lt; r &lt; 19.0</li>
<li>0.55 &lt; (g-r) &lt; 0.75</li>
</ul></li>
<li>Selection: Random subsample</li>
<li>Target count Goal: 95 per plate pair</li>
</ul>

<h3 id="mswd">Main Sequence - White Dwarf pairs</h3>

<p>(bit -2147479552  &rarr; 0x80001000)</p>

<p>Note that for this category only: colors are NOT dereddened.</p>

<ul><li>Color cuts (from Potsdam group):
<ul>
<li>u-g &lt; 2.25</li>
<li>-0.2 &lt; g-r &lt; 1.2</li>
<li>0.5 &lt; r-i &lt; 2.0</li>
<li>g-r &gt; -19.78*(r-i) + 11.13</li>
<li>g-r &lt; 0.95*(r-i) + 0.5</li>
<li>i-z &gt; 0.5 for (r-i) &gt; 1.0</li>
<li>i-z &gt; 0.68*(r-i)-0.18 for (r-i) &le; 1.0</li>
<li>15 &lt; g &lt; 20</li>
</ul></li>
<li>Target goal: 5 per plate pair, maximum of 10</li>
</ul>

<h3 id="msub">M sub-dwarf selection</h3>

<p>(bit -2143289344 &rarr; 0x80400000)</p>

<ul><li>Color cuts (based on West <i>et al.</i>):
<ul>
<li>g-r &gt; 1.6</li>
<li>0.95 &lt; (r-i) &lt; 1.3</li>
<li>14.5 &lt; r &lt; 19.0</li>
</ul></li>
<li>Selection: magslope 0.9</li>
<li>Target count Goal: &lt; ~5 per plate pair</li>
<li>Plus:
<ul>
<li>Lepine Shara AMNH high proper motion stars </li>
<li>Goal 25-30 per plate pair </li>
<li>Proper motion selected. </li>
</ul></li>
</ul>

<h3 id="brown">L,T brown-dwarf selection</h3>

<p>(bit -2145386496 &rarr; 0x80200000)</p>

<ul><li>Color cuts:
<ul>
<li>z &lt; 19.5</li>
<li>u &gt; 21</li>
<li>g &gt; 22</li>
<li>r &gt; 21</li>
<li>i-z &gt; 1.7</li>
</ul></li>
<li>Note: for brown dwarf selection we require additional flag
checks on i and z band as suggested by X.Fan.</li>
<li>Target count Goal: &lt; 5 per plate pair</li>
</ul>

<h3 id="agb">AGB candidate selection</h3>

<p>(bit -2139095040 &rarr;  0x80800000)</p>

<ul><li>Color cuts:
<ul>
<li>14.0 &lt; r &lt; 19.0</li>
<li>2.5 &lt; (u-g) &lt; 3.5</li>
<li>0.9 &lt; (g-r) &lt; 1.3</li>
<li><a href="dr10/algorithms/segue_target_selection.php#scolor">s-color</a> &lt; -0.06</li>
<li>detection in u band</li>
</ul></li>
<li>Selection: magslope 1.4</li>
<li>Target count Goal: 10 per plate pair</li>
</ul>

<h3 id="esdm">Extreme M subdwarfs </h3>
<p>(bit -2130706432 &rarr; 0x81000000) </p>

<ul><li>Color cuts:
<ul>
<li>(r-i) &lt; 0.787(g-r)-0.356 </li>
<li>(r-i) &lt; 0.9 </li>
<li>1.8 &lt; (g-i) &lt; 2.4</li>
<li><a href="dr10/algorithms/segue_target_selection.php#Hr">H<sub>r</sub></a> &gt; 17</li>
</ul></li>
<li>Selection: </li>
<li>Target count Goal: 40 per plate pair </li>
</ul>

<h3 id="lowlat">Low Latitude Targets </h3>
<p>The <i>seguelowlat</i> program consists of a number of pointings at |b| &lt; 20, all
with E(B-V) &gt; 0.3. These plates required a different target selection
algorithm, focusing on the three stellar types listed below. </p>

<h4 id="llkg">Low Latitude K Giants</h4>
<p>(bit -2147482624 &rarr; 0x80000400) </p>

<ul><li>Color cuts:
<ul>
<li>0.55 &lt; (g-r) &lt; 0.9 </li>
<li>g &lt; 19.0 </li>
</ul></li>
<li>PM<sub>total</sub> &lt; 11 mas/yr</li>
<li>Selection: </li>
<li>Target count Goal: 300 </li>
</ul>

<h4 id="llblue">Low Latitude Blue Stellar Locus</h4>
<p>(bit -2147481600 &rarr; 0x80000800) </p>

<ul><li>Color cuts:
<ul>
<li>(g-r) &lt; 0.25</li>
<li>Note that this cut varies with reddening</li></ul></li>
<li>Selection: </li>
<li>Target count Goal: 800 </li>
</ul>

<h4 id="llAGB">Low Latitude AGB/M giants </h4>
<p>(bit -2013265920 &rarr; 0x88000000) </p>

<ul><li>Color cuts:
<ul>
<li>2.6 &lt; (u-g) &lt; 3.5 </li>
<li>0.8 &lt; (g-r) &lt; 1.3 </li>
<li><a href="dr10/algorithms/segue_target_selection.php#scolor">s-color</a> &gt; -0.13</li>
</ul></li>
<li>Selection: </li>
<li>Target count Goal: 50 </li>
</ul>


<h3 id="SpecialTS">Special Targets</h3>

<p>Plates 2336, 2337: Special K giant selection</p>

<ul><li>Approximately 200 fibers allocated to objects with
<ul>
<li>0.35 &lt; (g-r) &lt; 0.9 </li>
<li>proper motion consistent with zero.</li>
<li>No selection boundary parallel to the stellar locus imposed.</li>
</ul></li>
<li>Another 200 fibers allocated to random subsample of stellar
locus with
<ul>
<li>0.2 &lt; (g-r) &lt; 0.48 </li>
</ul></li>
</ul>

<p>These two plates are at (l,b) = (130, -23), (150,+26) respectively,
and likely contain Monoceros Giants.</p>

<hr />

<h2 id="SEGUEts2">SEGUE-2 Target Type Descriptions</h2>

<p>
The following are the target types included in the SEGUE-2 survey.
To jump to a particular target category, please use the links : </p>
<table class="noborder">
<tr>
<td valign="top">
<ul>
<li><a href="dr10/algorithms/segue_target_selection_details.php#bhb2"> Blue Horizontal Branch</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#msto2">Main Sequence Turnoff</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#kg2">K Giants</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#mg2">M Giants</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#fg">F/G stars</a></li>
</ul></td>
<td valign="top">
<ul>
<li><a href="dr10/algorithms/segue_target_selection_details.php#cool_eusd2">Cool Extreme and Ultra subdwarfs</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#hyperv2">Hypervelocity Stars</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#hhv2">Halo High Velocity Stars</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#ultracool2">Ultra-Cool CIA White Dwarfs</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#lowmet2">Low Metallicity Candidates</a></li>
</ul>
</td>
</tr>
</table>

<h3 id="bhb2">Blue Horizontal Branch selection</h3>
<p>(bit -2147475456 &rarr; 0x80002000)</p>

<ul>
<li>Color cuts:
<ul>
<li>15.5 &lt; g &lt; 20.3 </li>
<li>-0.5 &lt; (g-r) &lt; 0.1 </li>
<li>0.8 &lt; (u-g) &lt; 1.5 </li>
</ul></li>

<li>The highest priority BHBs are 15.5 &lt; g &lt; 19.5
<ul><li> Next highest priority are 19.5 &lt; g &lt; 20.0 </li>
<li> Lowest priority are 20.0 &lt; g &lt; 20.3 </li>
</ul></li>
<li>This category is given up to 100 fibers per plate but does not
always have enough targets to fill its allocation. </li>
</ul>

<h3 id="msto2">Main Sequence Turnoff selection</h3>
<p>(bit -2147483647 &rarr; 0x80000001)</p>

<ul>
<li>Color cuts:
<ul>
<li>18.0 &lt; g &lt; 19.5 </li>
<li>0.1 &lt; (g-r) &lt; 0.48 </li>
<li>g, r, i psfmag errors &lt; 0.05 </li>
</ul></li>
<li>There are around 1000 objects that pass these criteria per plate region. This
category is allotted around 100 fibers. </li>
<li>The magnitude limit is set such that every target will be above the S/N per
pix &ge; 10 limit for the SSPP. </li>
<li>The color and magnitude selection for targets given a fiber is
a random subsample from the entire candidate pool. </li>
</ul>

<h3 id="kg2">K Giants</h3>

<ul>
<li>Color Cuts:
<ul>
<li>15.5 &lt; g &lt; 18.5 </li>
<li>r &gt; 15.0 </li>
<li>g, r, i psfmag errors &lt; 0.05 </li>
</ul></li>
<li>Proper Motion Cuts (using parameters in the propermotions table):
<ul>
<li>Match = 1</li>
<li>dist22 &gt; 7.0 arcsec (i.e., the nearest neighbor brighter than 22nd magnitude is more than 7'' away.) </li>
<li>pmSigmaRa &lt; 525 mas/yr</li>
<li>pmSigmaDec &lt; 525 mas/yr</li>
<li>nFit = 6 (number of measurements used in the proper motion fit) </li>
</ul></li>
</ul>

<p>The K giants are then split into three subcategories:</p>
<ul>
<li>Red K giants
<ul>
<li> bit -2147483646 &rarr; 0x80000002 </li>
<li>0.8 &lt; (g-r) &lt; 1.3 </li>
<li>(u-g) &gt; 0.84(g-r)+1.758 </li>
<li>(u-g) &lt; 2.4(g-r)+0.73 </li>
<li>PM<sub>total</sub> &lt; 11 mas/yr </li>
<li>Highest priority targets, up to 50 targets given fibers </li>
</ul></li>

<li>l-Color K giants
<ul>
<li>bit -2147483644 &rarr; 0x80000004 </li>
<li>0.7 &lt; (u-g) &lt; 3.0 </li>
<li>0.1 &lt; (r-i) &lt; 0.6 </li>
<li>0.5 &lt; (g-r) &lt; 0.8 </li>
<li>l-color &gt; 0.09 </li>
<li>PM<sub>total</sub> &lt; 11 mas/yr </li>
<li>Allotted 100 fibers </li>
<li>Candidates with (g-r) between 0.6 and 0.8 are higher priority
than those with (g-r) between 0.5 and 0.6. These redder targets are
given fibers first, drawing randomly from the candidate pool. If there are still
available fibers, randomly select targets from the bluer
sample until you reach up to 100 fibers. </li>
</ul></li>

<li>Proper Motion K giants
<ul>
<li>bit -2147483640 &rarr; 0x80000008 </li>
<li>0.8 &lt; (u-g) &lt; 1.2 </li>
<li>PM<sub>total</sub> &lt; 7 mas/yr </li>
<li>(u-g) &gt; 2.375(g-r)-0.45</li>
<li>(u-g) &lt; 0.84(g-r)+1.758 </li>
<li>These targets are supplementary if the other
two K giant subcategories do not number 150. </li>
</ul></li>
</ul>

<h3 id="mg2">M Giants</h3>
<p> (bit -2147483520 &rarr; 0x80000080)</p>

<ul>
<li>Color Cuts:
<ul>
<li>(g-r) &gt; 1.3 </li>
<li>(u-g) &gt; 1.8+0.9(g-r) </li>
<li>i &gt; 14.5 </li>
<li>15.5 &lt; g &lt; 19.25 </li>
<li>g, r psfmag errors &lt; 0.05 </li>
</ul></li>

<li>Proper Motion Cuts (using parameters in the propermotions table):
<ul>
<li>PM<sub>total</sub> &lt; 11 mas/yr </li>
<li>Match = 1</li>
<li>dist22 &gt; 7.0 arcsec (i.e., the nearest neighbor brighter than 22nd magnitude is more than 7'' away.) </li>
<li>pmSigmaRa &lt; 525 mas/yr</li>
<li>pmSigmaDec &lt; 525 mas/yr</li>
<li>nFit = 6 (number of measurements used in the proper motion fit) </li>
</ul></li>

<li>Candidates with g &lt; 18.5 are highest priority </li>
<li>These are allotted up to 50 fibers, but there are rarely more than 5 candidates per plate region </li>
</ul>

<h3 id="cool_eusd2">Cool Extreme and Ultra subdwarfs</h3>
<p> (bit -2147483584 &rarr; 0x80000040)</p>

<p>Note that all of the magnitudes used for these selection criteria are uncorrected for extinction. </p>

<ul>
<li>Color Cuts:
<ul>
<li>g &gt; 15.5 </li>
<li>(g-r) &gt; 1.4 </li>
<li>(r-i) &gt; 0.4 </li>
<li>15.0 &lt; r &lt; 20.0 </li>
<li>(r-i &lt; 3.0(g-r)-3.5 </li>
<li>r, i psfmag errors &lt; 0.05 </li>
</ul></li>

<li>Proper Motion Cuts:
<ul>
<li>PM<sub>total</sub> &gt; 10 mas/yr </li>
<li>H<sub>r</sub> &gt; 10.0+2.5(g-r) </li>
<li>Match = 1</li>
<li>dist22 &gt; 7.0 arcsec (i.e., the nearest neighbor brighter than 22nd magnitude is more than 7'' away.) </li>
<li>pmSigmaRa &lt; 525 mas/yr</li>
<li>pmSigmaDec &lt; 525 mas/yr</li>
<li>nFit = 3 (number of measurements used in the proper motion fit) </li>
</ul></li>

<li>These are allotted 50 fibers per plate</li>
<li>If there are more than 50 candidates per plate, they are sorted from
reddest to bluest in (g-i) and assigned to fibers in
that priority order </li>
</ul>

<h3 id="hyperv2">Hypervelocity Stars</h3>
<p> (bit -2147483392 &rarr; 0x80000100)</p>

<ul>
    <li>Color Cuts:
        <ul>
            <li>17 &lt; g &lt; 20 </li>
        </ul>
        <ul>

    <li>Box 1 Cuts:
        <ul>
            <li>0.4 &lt; (g-r) &lt; 0.6 </li>
            <li>(u-g) &gt; 2.5(g-r)+0.225 </li>
            <li>(u-g) &lt; 2.5(g-r)+0.425 </li>
        </ul>
    </li>
    <li>Box 2 Cuts:
        <ul>
            <li>0.35 &lt; (g-r) &lt; 0.4 </li>
            <li>(u-g) &gt; 2.5(g-r)+0.375 </li>
            <li>(u-g) &gt; 2.5(g-r)+0.525 </li>
        </ul>
    </li>
    </ul></li>
    <li>Proper Motion Cuts:
        <ul>
            <li>PM<sub>total</sub> &gt; 8 mas/yr </li>
        </ul>
    </li>
<li>Assuming motion exactly along the Galactocentric radial direction,
all potential targets must have a total space velocity &gt; 400 km/s in
a frame at rest with respect to the Galaxy  </li>
<li>The candidate is selected if either of the following is also true:
<ul>
<li>Assuming GC-radial motion, the proper motion perpendicular to the
GC-radial direction is &lt; 6 mas/yr </li>
<li>The total transverse velocity (at rest with respect to the Galaxy with
no assumed direction) is &gt; 400 km/s </li>
</ul></li>
<li>This category only has a few targets per plate and is based
off of the <a href="http://adsabs.harvard.edu/abs/2010ApJ...723..812K">Kollmeier
et al. (2010)</a> paper.</li>
</ul>

<h3 id="hhv2">Halo High Velocity Stars </h3>
<p> (bit -2147483392 &rarr; 0x80000100) </p>

<ul>
<li>Color Cuts:
<ul>
     <li>17.0 &lt; g &lt; 19.5 </li>
     <li>0.1 &lt; (g-r) &lt; 0.48 </li>
</ul></li>
<li>Proper Motion Cuts:
<ul>
     <li>V<sub>tan</sub> &gt; 300 km/s </li>
     <li>&sigma;(V<sub>tan</sub>) &gt; 3.0 </li>
</ul></li>
</ul>

<h3 id="ultracool2">Ultra-Cool CIA White Dwarfs</h3>
<p> (bit -2147352576 &rarr; 0x80020000)</p>

<ul>
<li>Color Cuts:
<ul>
     <li>15.5 &lt; r &lt; 20.5 </li>
     <li>g &gt; 15.5 </li>
     <li>-2.0 &lt; (g-i) &lt; 1.7 </li>
</ul></li>
<li>Proper Motion Cuts:
<ul>
     <li>Match = 1</li>
     <li>pmSigmaRa &lt; 525 mas/yr</li>
     <li>pmSigmaDec &lt; 525 mas/yr</li>
     <li>(dist22 &gt; 7.0 arcsec and nfit=6) OR (g-i) &lt; 0.12 </li>
     <li>H<sub>g</sub> &gt; 17.5 </li>
     <li>H<sub>g</sub> &gt; 16.05 + 2.9(g-r) </li>
</ul></li>
<li>There is some variation in the definition of "good" USNOB proper motions. The
distance to the nearest star of 22nd magnitude or brighter neighbor and the nFit cut
are relaxed for targets with (g-i) &lt; 0.12 because anything that
blue is likely a white dwarf. </li>
</ul>

<h3 id="lowmet2">Low Metallicity Candidates</h3>
<p> (bit -2147483632 &rarr; 0x80000010)</p>

<ul>
<li>Color Cuts:
<ul>
     <li>0.3 &lt; (g-r) &lt; 0.8 </li>
     <li>0.5 &lt; (u-g) &lt; 2.0 </li>
     <li>15.5 &lt; g &lt; 18 </li>
     <li>r &gt; 15 </li>

     <li>g, r, i psfmag errors &lt; 0.05 </li>
     <li>u psfmag errors &lt; 0.2 </li>
     <li>l-color &gt; 0.115 </li>
</ul></li>
<li>Proper Motion Cuts:
<ul>
     <li>Match = 1</li>
     <li>dist22 &gt; 7.0 arcsec  </li>
     <li>pmSigmaRa &lt; 525 mas/yr</li>
     <li>pmSigmaDec &lt; 525 mas/yr</li>
     <li>nFit = 6  </li>
</ul></li>
<li>Candidates with PM<sub>total</sub> &gt; 20 mas/yr are the highest priority </li>
<li>All other candidates are lower priority and assigned fibers until reaching the
allotted 100 fibers per plate.</li>
</ul>

<hr />

<h2 id="SDSSts">SDSS Stellar Targeting Category Descriptions</h2>

<p>
The following are the target types included in the SDSS Legacy survey.
To jump to a particular target category, please use the links : </p>
<table class="noborder">
<tr>
<td valign="top">
<ul>
<li><a href="dr10/algorithms/segue_target_selection_details.php#spstd"> Spectrophotometric Standard </a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#redstd">Reddening Standard</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#hotstd">Hot Standard</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#rosatc">ROSAT C</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#rosate">ROSAT E</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#reddwarf">Red dwarf</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#pnstar">Planetary Nebula Star</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#serenblue">Serendipity Blue</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#serenred">Serendipity Red</a></li>
</ul></td>
<td valign="top">
<ul>
<li><a href="dr10/algorithms/segue_target_selection_details.php#leg_bhb">Blue Horizontal Branch</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#carbon">Carbon Star</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#browndwarf">Brown Dwarf</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#leg_subdwarf">Subdwarf</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#cv">Cataclysmic Variable</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#whitedwarf">White dwarf</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#serenfirst">Serendipity First</a></li>
<li><a href="dr10/algorithms/segue_target_selection_details.php#serendistant">Serendipity Distant</a></li>
</ul>
</td>
</tr>
</table>

<h3 id="spstd">Spectrophotometric Standard</h3>
<p> (bit 32 &rarr; 0x00000020)</p>

<ul>
     <li>0.1 &lt; (g-r) &lt; 0.4 </li>
     <li>16.0 &lt; g &lt; 17.1 </li>
</ul>

<h3 id="redstd">Reddening Standard</h3>
<p> (bit 2 &rarr; 0x00000002)</p>

<ul>
     <li>0.1 &lt; (g-r) &lt; 0.4 </li>
     <li>17.1 &lt; g &lt; 18.5 </li>
</ul>


<h3 id="hotstd">Hot Standard</h3>
<p> (bit 512 &rarr; 0x00000200)</p>

<ul>
     <li>g &lt; 19</li>
     <li>(g-r) &lt; 0   </li>
     <li>(u-g) &lt; 0 </li>
</ul>



<h3 id="rosatc">ROSAT C</h3>
<p> (bit 2048 &rarr; 0x00000800)</p>

<ul>
     <li>r &lt; 16.5 </li>
     <li>(u-g) &lt; 1.1 </li>
     <li>ROSAT within 60'' </li>
</ul>

<h3 id="rosate">ROSAT E</h3>
<p> (bit 134217728 &rarr; 0x08000000)</p>

<ul>
     <li>ROSAT within 60''</li>
</ul>

<h3 id="reddwarf">Red dwarf</h3>
<p> (bit 262144 &rarr; 0x00040000)</p>

<ul>
     <li>i &lt; 19.5 </li>
     <li>psfmagerr(i) &lt; 0.2 </li>
     <li>(r-i) &gt; 1.0 </li>
     <li>(r-i) &gt; 1.8 </li>
</ul>

<h3 id="pnstar">Planetary Nebula Star</h3>
<p> (bit 268435456 &rarr; 0x10000000)</p>

<ul>
     <li>(g-r) &gt; 0.4 </li>
     <li>(r-i) &lt; 0.6 </li>
     <li>(i-z) &gt; -0.2 </li>
     <li>16 &lt; r &lt; 20.5 </li>
</ul>

<h3 id="serenblue">Serendipity Blue</h3>
<p> (bit 1048576 &rarr; 0x00100000)</p>

<ul>
     <li>(u-g) &lt; 0.8 </li>
     <li>(g-r) &lt; -0.05 </li>
</ul>

<h3 id="serenred">Serendipity Red</h3>
<p> (bit 4194304 &rarr; 0x00400000)</p>

<ul>
     <li>(r-i) &gt; 2.7 </li>
     <li>(i-z) &gt; 1.6 </li>
<li>Colors for the above criteria are not dereddened</li>
</ul>

<h3 id="leg_bhb">Blue Horizontal Branch</h3>
<p> (bit 8192 &rarr; 0x00002000)</p>

<ul>
     <li>-0.4 &lt; (g-r) &lt; 0 </li>
     <li>0.8 &lt; (u-g) &lt; 1.8 </li>
</ul>


<h3 id="carbon">Carbon Star</h3>
<p> (bit 16384 &rarr; 0x00004000)</p>

<ul>
     <li>(r-i) &gt; 0.05 </li>
     <li>(g-r) &gt; 0.85 </li>
     <li>(i-z) &gt; 0 </li>
     <li>(r-i) &lt; -0.4 + 0.65(g-r) </li>
     <li>(g-r) &lt; 1.75 </li>
</ul>


<h3 id="browndwarf">Brown dwarf</h3>
<p> (bit 32768 &rarr; 0x00008000)</p>

<ul>
     <li>z &lt; 19  </li>
     <li>psfmagerr(i) &lt; 0.3 </li>
     <li>(r-i) &gt; 1.8 </li>
     <li>(i-z) &gt; 1.8 </li>
</ul>

<h3 id="leg_subdwarf">Subdwarf</h3>
<p> (bit 65536 &rarr; 0x00010000)</p>

<ul>
     <li>(g-r) &gt; 1.6 </li>
     <li>0.95 &lt; (r-i) &lt; 1.6 </li>
     <li>psfmagerr(g) &lt; 0.1 </li>
</ul>

<h3 id="cv">Cataclysmic Variable</h3>
<p> (bit 131072 &rarr; 0x00020000)</p>

<ul>
     <li>g &lt; 19.5  </li>
     <li>(u-g) &lt; 0.45 </li>
     <li>(g-r) &lt; 0.7 </li>
     <li>(r-i) &gt; 0.3 </li>
     <li>(i-z) &gt; 0.4 </li>
     <li>(u-g)-1.314(g-r) &lt; 0.61 </li>
     <li>(r-i) &gt; 0.91 </li>
     <li>(i-z) &gt; 0.49 </li>
<li>Magnitudes are not dereddened for this category.</li>
</ul>

<h3 id="whitedwarf">White dwarf</h3>
<p> (bit 524288 &rarr; 0x00080000)</p>

<ul>
     <li>(g-r) &lt; -0.15 </li>
     <li>(u-g)+2(g-r) &lt; 0 </li>
     <li>(r-i) &lt; 0  </li>
     <li>(g-i) &gt; 0 </li>
     <li>H<sub>g</sub> &gt; 19  </li>
     <li>H<sub>g</sub> &gt; 16.136+2.727(g-i)  </li>
</ul>

<h3 id="serenfirst">Serendipity First</h3>
<p> (bit 2097152 &rarr; 0x00200000 )</p>

<ul>
<li>FIRST Radio source within 1''.5 </li>
</ul>


<h3 id="serendistant">Serendipity Distant</h3>
<p> (bit 8388608 &rarr; 0x00800000)</p>
<ul>
     <li>(g-r) &gt; 2 </li>
     <li>(r-i) &lt; 0 </li>
<li>Magnitudes are not dereddened for this category.</li>
</ul>


<?php echo foot(); ?>
