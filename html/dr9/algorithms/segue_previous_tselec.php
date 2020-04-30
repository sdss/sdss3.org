<?php include '../../header.php'; echo head('Previous versions of SEGUE1 Target Selection'); ?>

<p>The target selection criteria evolved over time. In the main target selection page,
we list the current version of the selection algorithm, version
<a href="dr9/algorithms/segue_target_selection.php#v4.6">4.6</a>. Here we list the previous
versions. Although all the targets are identified based on the criteria of v4.6 in the SEGUE
data sets, plates were often designed based on the previous target selection algorithms.
Below we summarize the changes of each version from that before it. </p>

<p>Previous versions:</p>
<ul>
<li><a href="dr9/algorithms/segue_previous_tselec.php#v4.0">v4.0</a></li>
<li><a href="dr9/algorithms/segue_previous_tselec.php#v3.4">v3.4</a></li>
<li><a href="dr9/algorithms/segue_previous_tselec.php#v3.3">v3.3</a></li>
<li><a href="dr9/algorithms/segue_previous_tselec.php#v3.2">v3.2</a></li>
<li><a href="dr9/algorithms/segue_previous_tselec.php#v3.2">v3.1</a></li>
<li><a href="dr9/algorithms/segue_previous_tselec.php#v3.2">v3.0</a></li>
<li><a href="dr9/algorithms/segue_previous_tselec.php#v2.0">v2.0</a></li>
</ul>

<hr />

<h3 id="v4.0">v4.0 Target Selection</h3>

<p>Summary of changes from v3.4:</p>

<ul><li>Low Latitude Algorithms implemented:
<ul>
<li>AGB type objects at low lat  </li>
<li>K III type objects at low lat </li>
<li>Bluetip objects at low lat </li>
<li>AMNH high proper motion objects at low lat </li>
</ul></li>
</ul>

<hr />

<h3 id="v3.4">v3.4 Target Selection</h3>

<p>Summary of changes from v3.3:</p>

<ul>
<li>MSWD colors are now NOT dereddened psf mags (previously were
        dereddened). </li>

<li>'l-cut' for Low metallicity backed off to 0.135 from 0.15,
    which allows more in, as too many bright candidates were
    not getting fibers. </li>
</ul>

<hr />

<h3 id="v3.3">v3.3 Target Selection</h3>

<p>Summary of changes from v3.2:</p>

<ul><li>A/BHB
<ul>
<li>new color cuts (H. Newberg algorithm)<br />
g &lt; 20.5, 0.8 &lt; u-g &lt; 1.5, -0.5 &lt; g-r &lt; 0.2, u detection present  </li>
<li>Also: compute color-gravity index:<br />
    v = 0.283(u-g) - 0.354(g-r) + 0.455 (r-i) + 0.766 (i-z) </li>
<li>Weighting: weight on the 'v' parameter so object with
    v color of 0 is 4 times as likely to get fiber as v of 0.4. </li>
<li>Target count Goal: 150 per plate pair  (get ~100 per pair) </li>
</ul></li>
<li>F turnoff
<ul>
<li>s-color cut is no longer present </li>
</ul></li>
<li>Addition of new F/G stars category:
<ul>
<li> bit -2147483136 </li>
<li>0.2 &lt; g-r &lt; 0.48, 14.0 &lt; g &lt; 20.2, unbiased random subsampling
    of this range of g-r color space,   </li>
<li>Target count Goal: 50 per plate pair </li>
</ul></li>
<li>Low Metallicity
<ul>
<li>New for v3_3: We move the 'l' weight to l-color &gt; 0.15 (was &gt; 0.12).
    This is more restrictive, hoping to land higher fraction
    of [Fe/H] &lt; -2 objects. </li>
</ul></li>
<li>Addition of new Main Sequence-White Dwarf pair category (based on color cuts from Potsdam group):
<ul>
<li>Note that for this category only: colors are NOT dereddened.</li>
<li>bit -2147479552
<ul>
<li>u-g &lt; 2.25 </li>
<li>g-r &gt; -0.2</li>
<li>g-r &lt; 1.2</li>
<li>r-i &gt; 0.5</li>
<li>r-i &lt; 2.0</li>
<li>g-r &gt; -19.78*(r-i) + 11.13 </li>
<li>g-r &lt; 0.95*(r-i) + 0.5</li>
<li>i-z &gt; 0.5 for r-i &gt; 1.0</li>
<li>i-z &gt; 0.68*(r-i)-0.18 for r-i &le; 1.0</li>
<li>15 &lt; g &lt; 20</li>
</ul></li>
<li>Target goal: 5 per plate pair, maximum of 10</li>
</ul></li>
</ul>

<hr />

<h3 id="v3.2">v3.2 Target Selection</h3>

<p>Summary of changes from v3.1:</p>

<ul>
<li>A/BHB selection
<ul>
<li>CHANGE For v3_2:  Sort candidates by color,
so that all, or most, blue BHBs g-r &lt; 0 , get a fiber.</li>
</ul></li>
</ul>

<hr />

<h3 id="v3.1">v3.1 Target Selection</h3>

<p>Summary of changes from v3.0 (in bold):</p>

<ul>
<li>Cool White Dwarf:
<ul>
<li>Target goal: 10 per plate pair, <b>but allow overflow if they are present</b>.</li>
</ul></li>
<li>K Giant
<ul>
<li>Target Goal: <b>95</b> per plate pair (expected density 4/sq deg = 28/plate pair)</li>
</ul></li>
<li>Low Metallicity
<ul>
<li>New for v 3.1:  We also weight by <a href="dr9/algorithms/segue_target_selection.php#lcolor">l-color</a> to
favor the ones closer to the blue edge of the u-g color in the stellar locus.</li>
</ul></li>
<li>K dwarf
<ul>
<li>Target Goal: <b>95</b> per plate pair</li>
</ul></li>
<li>M sub-dwarf
<ul>
<li>M sub-dwarfs (color based West <i>et al.</i>)<br />
g-r &gt; <b>1.6</b>, 0.95 &lt; r-i &lt; 1.3, 14.5 &lt; r &lt; 19.0</li>
<li>Target count Goal: &lt;~<b>5</b> per plate pair </li>
<li>Selection: magslope 0.9</li>
</ul></li>
<li><b>Plus: Lepine Shara AMNH high proper motion stars , goal 25-30 per
plate pair, proper motion selected.</b></li>
</ul>

<hr />

<h3 id="v3.0">v3.0 Target Selection</h3>

<p>Summary of changes from v2.0:</p>
<ul>
<li>For selections which involve u band, we require that
    the u flags indicate a u band detection.</li>

<li>The 'regular SDSS bright end cut' is: No spectra of
    objects with g, r or i fiber mag &lt; 14.5 allowed.</li>

<li>For SEGUE v2.0 we cut on r only at r<sub>fiber</sub> &lt; 14.5,
    this resulted in "whopping" fiber warnings for
    red stars where r-i &gt; 0 &rarr; i &lt; 14.5.
    The spectra were ok however and scattered light was not
    harmful to adjacent fibers on the CCDs.</li>

<li>For SEGUE v3_0 we are cutting on i<sub>fiber</sub> &lt; 14.2.
    This allows bright blue things to get spectra and still avoids
    putting very red bright stars on the plate to scatter.</li>

<li>Also, proper motions have been included for objects
    which have matches to the USNO-B catalog and are used
    in the K giant and Cool White dwarf selection categories.</li>
<li> Significant changes to Cool White Dwarf, M dwarf</li>
<li> Addition of Brown dwarf category</li>
</ul>

<p>Specific category changes (in bold):</p>

<ul>
    <li>White Dwarf:
        <ul>
            <li>g &lt; 20.3 , -1 &lt; g-r &lt; -0.2, -1 &lt; u-g &lt; <b>0.7 </b>  </li>
            <li><b>u-g + 2(g-r) &lt; -0.1</b></li>
            <li>Weighting: <b>magslope 1.2</b></li>
            <li>Target goal: 25 per plate pair</li>
        </ul>
    </li>
    <li>Cool White Dwarf:
        <ul>
            <li>Color cuts:
                <ul>
                    <li>14.5 &lt; r &lt; 20.5</li>
                    <li>-2 &lt; g-i</li>
                    <li>g-i &lt; 1.7 (if no neighbor with g &gt; 22 within 7 arcsec)</li>
                    <li>otherwise g-i &lt; 0.12</li>
                </ul>
            </li>
            <li>Require reliable proper motion (&mu;) measurement:
                <ul>
                    <li>one-to-one match to USNO_B</li>
                    <li>good proper motion fit (small rems in each coordinate)</li>
                    <li>be detected in all 5 epochs in USNO-B</li>
                    <li>no neighbor brighter than g = 22 within 7 arcsec
                    (to avoid blending problems)<br />
                    OR <br />
                    blue enough (g-i &lt; 0.12) that target is likely white dwarf</li>
                </ul>
            </li>
            <li>Weighting: <b>magslope 1.2</b></li>
            <li>Target goal: 10 per plate pair</li>
        </ul>
    </li>
    <li>A/BHB
        <ul>
            <li>g &lt; 20.5,<b> 0.6</b> &lt; u-g &lt; 1.4, <b>-0.5</b> &lt; g-r &lt; 0.2,
            <a href="dr9/algorithms/segue_target_selection.php#scolor">s-color</a> &lt; -0.065 </li>
            <li>Weighting: <b>magslope 2.0</b> </li>
            <li> Target goal: 150 per plate pair (get ~ 100 per pair)</li>
        </ul>
    </li>
    <li>F turnoff, subdwarf
        <ul>
            <li>-0.7 &lt; <a href="dr9/algorithms/segue_target_selection.php#P1">p1(s)</a> &lt; <b>-0.25</b>, 0.4 &lt; u-g &lt; <b>1.4</b>,
            <b>0.2</b> &lt; g-r &lt; 3.0, g &lt; 20.3</li>
            <li><b>Weighting: colorslope + magnitude weighting P1 min/max slope = 5</b></li>
            <li>Target goal: 200 per plate pair</li>
        </ul>
    </li>
    <li>G star
        <ul>
            <li><b>14.0</b> &lt; r &lt; 20.2, <b>0.48</b> &lt; g-r &lt; 0.55</li>
            <li>Note slightly wider g-r color band to get sufficient targets
            at high |b|.</li>
            <li>Weighting: random</li>
            <li>Target goal: 375 per plate pair</li>
        </ul>
    </li>
    <li>K Giant
        <ul>
            <li>r &lt; 20.2, 0.7 &lt; u-g &lt; 4.0 ,<b> 0.35 &lt; g-r &lt; 0.8</b>, 0.15 &lt; r-i &lt; 0.6,
            <a href="dr9/algorithms/segue_target_selection.php#lcolor">l-color</a> &gt; <b>0.07</b></li>
            <li>proper_motion &lt; 11 milliarcsec/year and good propermotion match</li>
            <li>Weighting: <b>magslope 2.0</b></li>
            <li>Target Goal: 100 per plate pair</li>
        </ul>
    </li>
    <li>Low Metallicity
        <ul>
            <li><b>14 &lt; r &lt; 19.5, -0.5 &lt; g-r &lt; 0.75, 0.3 &lt; u-g &lt; 3.0, l-color &gt; 0.12</b></li>
            <li>also require detection in u band.</li>
            <li>Weighting: magslope 1.8 and</li>
            <li><b>Faint plate targets sorted by magnitude to 'pack' them, so
            that brightest ones targeted before fainter ones.</b></li>
            <li>Target Goal: 150 per plate pair</li>
        </ul>
    </li>
    <li>K dwarf
        <ul>
            <li>14.5 &lt; r &lt; <b>19.0, 0.55 &lt; g-r &lt; 0.75</b></li>
            <li>Selection: Random subsample</li>
            <li>Target count Goal: <b>100</b> per plate pair</li>
        </ul>
    </li>
    <li>M sub-dwarf
        <ul>
            <li><b>bit -2143289344</b></li>
            <li><b>M sub-dwarfs (color based West <i>et al.</i> )</b></li>
            <li><b>g-r &gt; 1.51, 0.95 &lt; r-i &lt; 1.3, 14.5 &lt; r &lt; 19.0</b></li>
            <li><b>Target count Goal: &lt;~25 per plate pair</b></li>
            <li><b>Selection: magslope 0.9</b></li>
        </ul>
    </li>
    <li>L,T brown-dwarf selection
        <ul>
            <li><b>bit -2145386496</b></li>
            <li><b>z &lt; 19.5, u &gt; 21, g &gt; 22, r &gt; 21, i-z &gt; 1.7</b></li>
            <li><b>for Brown dwarf selection we require additional flag
            checks on i and z band as suggested by X. Fan.</b></li>
            <li><b>Target count Goal: &lt; 5 per plate pair</b></li>
        </ul>
    </li>
    <li>AGB candidate selection
        <ul>
            <li>14.0 &lt; r &lt; <b>19.0</b>, 2.5 &lt; u-g &lt; 3.5, 0.9 &lt; g-r &lt; 1.3,
            <a href="dr9/algorithms/segue_target_selection.php#scolor">s-color</a> &lt; <b>-0.06</b></li>
            <li><b>detection in u band required.</b></li>
            <li>Selection: <b>magslope 1.4</b></li>
            <li>Target count Goal: <b>10</b> per plate pair</li>
        </ul>
    </li>
</ul>

<hr />

<h3 id="v2.0">v2.0 Target Selection</h3>

<ul>
    <li>All magnitudes are  dereddened PSF mags</li>
    <li>Flags:  No bright, no edge, no bad interp, no bad deblend</li>
    <li>White dwarf selection
        <ul>
            <li>bit -2146959360 </li>
            <li>g &lt; 20.3 , -1 &lt; g-r &lt; -0.2, -1 &lt; u-g &lt; 0.5 </li>
            <li>Weighting: colorslope</li>
            <li>Target count Goal: 25 per plate pair</li>
        </ul>
    </li>
    <li>Cool White dwarf selection
        <ul>
            <li>bit -2147352576</li>
            <li>15 &lt; r &lt; 20, -0.1 &lt; g-r &lt; 1.1, g-r &gt; 2.4(r-i) + 0.5, i-z &lt; 0</li>
            <li>Weighting: colorslope</li>
            <li>Target count Goal: 10 per plate pair</li>
        </ul>
    </li>
    <li>A/BHB selection
        <ul>
            <li>bit -2147475456</li>
            <li>g &lt; 20.5, 0.5 &lt; u-g &lt; 1.4, -0.8 &lt; g-r &lt; 0.2,
            <a href="dr9/algorithms/segue_target_selection.php#scolor">s-color</a> &lt; -0.065</li>
            <li>Weighting: colorslope</li>
            <li>Target count Goal: 150 per plate pair</li>
        </ul>
    </li>
    <li>F turnoff, sub-dwarf selection
        <ul>
            <li>bit  -2146435072</li>
            <li>-0.7 &lt; p1(s) &lt; -0.3, 0.4 &lt; u-g &lt; 1.7, -0.3 &lt; g-r &lt; 3, g &lt; 20.3</li>
            <li>Weighting: colorslope+ magnitude weighting</li>
            <li>Target count Goal: 150 per plate pair </li>
        </ul>
    </li>
    <li>G selection
        <ul>
            <li>bit -2147221504</li>
            <li>14.2 &lt; r &lt; 20.2, 0.50 &lt; g-r &lt; 0.55</li>
            <li>Weighting: random</li>
            <li>Target count Goal: 375 per plate pair</li>
        </ul>
    </li>
    <li>K Giant Selection
        <ul>
            <li>bit -2147467264</li>
            <li>r &lt; 20.2, 0.7 &lt; u-g &lt; 4.0 , 0.40 &lt; g-r &lt; 1.2,
            0.15 &lt; r-i &lt; 0.6, <a href="dr9/algorithms/segue_target_selection.php#lcolor">l-color</a> &gt; 0.1</li>
            <li>proper_motion &lt; 15 arcsec/century (this should have been 1.5 arcsec/cent)</li>
            <li>Weighting: colorslope</li>
            <li>Target count Goal: 100 per plate pair</li>
        </ul>
    </li>
    <li>Low Metallicity selection
        <ul>
            <li> bit -2147418112</li>
            <li>r &lt; 20.2, -0.5 &lt; g-r &lt; 0.9, 0.3 &lt; u-g &lt; 3.0,
            <a href="dr9/algorithms/segue_target_selection.php#lcolor">l-color</a> &gt; 0.15</li>
            <li>Weighting: colorslope</li>
            <li>Target count Goal: 150 per plate pair</li>
        </ul>
    </li>
    <li>K dwarf selection
        <ul>
            <li>bit -2147450880</li>
            <li>14.5 &lt; r &lt; 19.5, g-r &gt; 0.7,  r-i &lt; 0.8</li>
            <li>Selection: Random</li>
            <li>Target count Goal: 125 per plate pair</li>
        </ul>
    </li>
    <li>M dwarf selection
        <ul>
            <li>bit -2145386496</li>
            <li>Three selections in one:
                <ul>
                    <li>regular M dwarfs</li>
                    <li>high velocity M dwarfs (ppm based),</li>
                    <li>M sub-dwarfs (color based)</li>
                </ul>
            </li>
            <li>regular M dwarfs: r-i &gt; 0.3, 14.5 &lt; r &lt; 19.0 (N=12)</li>
            <li>sub-dwarf cands: u-g &gt; 1.8, g-r &gt; 0.8, 0.5 &lt; r-i , 14.5 &lt; r &lt; 19 (N=15)</li>
            <li>high-velocity M dwarfs: r-i &gt; 0.3, 14.5 &lt; r &lt; 19.3</li>
            <li>velocity proxy &gt;~ 100 km/s (25)</li>
            <li>Selection: colorslope (Mdwarfs), high velocity weighted colorslope,
            colorslope (SubDwarfs)</li>
            <li>Target count Goal: 50 per plate pair (sum of three sub-categories)</li>
        </ul>
    </li>
    <li>AGB candidate selection
        <ul>
            <li>bit -2139095040</li>
            <li>14.5 &lt; r &lt; 19.5, 2.5 &lt; u-g &lt; 3.5, 0.9 &lt; g-r &lt; 1.3,
            <a href="dr9/algorithms/segue_target_selection.php#scolor">s-color</a> &lt; -0.07</li>
            <li>Selection: colorslope</li>
            <li>Target count Goal: 15</li>
        </ul>
    </li>
</ul>

<?php echo foot(); ?>
