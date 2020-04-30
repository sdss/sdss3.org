<?php include '../../../header.php'; echo head('SEGUE Target Selection'); ?>

<h2>Introduction</h2>

<p>Using the photometry from SDSS, the SEGUE survey designed a series of
color, magnitude, and other criteria to identify stellar targets that were of
particular interest. Each of these spectral types was allotted a certain number
of fibers per plate. When targeted by SEGUE, individual targets are labeled with
distinctive hexadecimal codes, which indicate which stellar type they are
associated with. For a brief explanation of the bitmask system, please use our
<a href="dr8/algorithms/segueii/bit_guide.php">Bit Guide</a>.
</p>

<p>The entire SEGUE survey consists of a number of programs with different
observing goals. For example, a number of plates are placed on regions of the sky with open
or globular clusters and probable Milky Way substructure (<i>segcluster</i>). An additional number
focus on a low latitude region of the sky (<i>seglowlat</i>). The
<a href="dr8/algorithms/segueii/plate_table.php"> SEGUE Plate Table </a>
lists every plate within the SEGUE survey, organized by the program they were
a part of, in addition to a brief description of the programs themselves. </p>

<p>Plates which are part of programs other than <i>segue</i>, <i>seguefaint</i>, and <i>segue2</i>
utilize a slightly different target selection algorithm. For example, low
latitude plates focus on K giants, with different criteria than K giants
observed as part of the segue and seguefaint programs. Additional fibers
on these plates, not used to focus on substructure or specific target types,
do follow standard target selection algorithm procedures.
</p>

<p>The target selection algorithm for SEGUE-1 plates evolved over time.
More detailed information on the evolution of target criteria is available
on the <a href="dr8/algorithms/segueii/previous_tselec_seg1.php">Past Versions </a>
page. Here we list the most current version of the target selection
algorithm. These are the criteria used to assign stars to particular spectral
categories.
</p>

<p>Below, we detail the different targets examined in SEGUE-1, SEGUE-2, and
SDSS stellar targeting originating from the SDSS Legacy Program. Each program
has a table with summary information for each target type and a description
of the different targeting criteria. Finally, we also include a
brief summary of the calibration fiber identifications for SEGUE-1, SEGUE-2,
and SDSS Stellar Targeting from the Legacy survey. </p>

<p>Jump to Summary Tables for:</p>
<ul>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#S1_table">SEGUE-1</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#S2_table">SEGUE-2</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#SEGUEClusterTargets2">SEGUE Cluster plates</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#S3_table">SDSS Stellar Targeting</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#Calib">Calibration Fibers</a></li>
</ul>

<hr />

<h2 id="SEGUEts1">SEGUE-1 Target Selection</h2>

<table class="centerfigure">
<tr><td><a href="images/color_colorts.jpg"><img src="images/color_colorts_thumb.jpg" alt="Color-color selection for SEGUE 1" /></a></td></tr>
<tr><td>Example color-color diagram of SEGUE 1 target selection categories.</td></tr>
</table>

<p>SEGUE-1 plates are listed <a href="dr8/algorithms/segueii/plate_table.php#segue">here.</a></p>

<p>The parameter <i>segue1_target1</i> in sppParams and SpecObjAll is used to identify
why a star was given a spectroscopic fiber in SEGUE-1.
These same bit settings are used for the <i>segue1_target1</i> parameter for
all stellar objects (g &lt; 21 or z &lt; 21) in the SegueTargetAll table,
whether or not they received a SEGUE fiber. </p>

<p>These target selection criteria have evolved over time. We have the latest
version (v4.6) here. However, for information about how these have evolved
over time, please see <a href="dr8/algorithms/segueii/previous_tselec_seg1.php">Past Versions</a>.</p>

<h3 id="v4.6">SEGUE-1 v4.6 Target Selection</h3>

<table class="common" id="S1_table">
<caption>Summary of SEGUE 1 Target Selection Categories, used in segue1_target1 bitmaps</caption>
<tr><th>Category</th><th>Hex</th><th>Integer</th><th>Binary</th><th>Criteria                           </th><th>PerPlate</th><th>Total</th><th>Success</th></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#f">F turnoff, subdwarf</a>  	                        </td><td>0x80100000</td><td>   -2146435072</td><td>2<sup>20</sup>   </td><td>g &lt; 20.3 <br /> -0.7 &lt; <a href="dr8/algorithms/segueii/segue_target_selection.php#P1">P1(s)</a> &lt; -0.25 <br />
                                                                                                                                                                                                     0.4 &lt; (u-g) &lt; 1.4 <br /> 0.2 &lt; (g-r) &lt; 0.7                                                                   </td><td>200</td><td>37900</td><td> TBD</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#kg">K giants (l and red)</a> 	        	</td><td>0x80004000</td><td>   -2147467264</td><td>2<sup>14</sup>   </td><td>r &lt; 20.2 <br /> 0.35 &lt; (g-r) &lt;  0.8 <br /> 0.15 &lt; (r-i) &lt; 0.6 <br />
                                                                                                                                                                                                    <a href="dr8/algorithms/segueii/segue_target_selection.php#lcolor">l-color</a> &gt; 0.07 <br />
                                                                                                                                                                                                    PM<sub>total</sub> &lt; 11 mas/yr  <br /> <a href="dr8/algorithms/segueii/segue_target_selection.php#goodpm">good PM</a></td><td> 70</td><td>22814</td><td>  </td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#low">Low Metallicity </a>	        	        </td><td>0x80010000</td><td>   -2147418112</td><td>2<sup>16</sup>   </td><td>14 &lt; r &lt; 19.0 <br /> -0.5 &lt; (g-r) &lt; 0.75 <br /> 0.6 &lt; (u-g) &lt; 3.0 <br />
                                                                                                                                                                                                     <a href="dr8/algorithms/segueii/segue_target_selection.php#lcolor">l-color</a> &gt; 0.135 <br /> u detection           </td><td>150</td><td>29788</td><td> </td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#cwd">Cool White Dwarf </a>                	        </td><td>0x80020000</td><td>   -2147352576</td><td>2<sup>17</sup>   </td><td>14.5 &lt; r &lt; 20.5 <br /> (g-i) &gt; -2 <br /> (g-i) &lt; 1.7 if no neighbor with g &gt; 22 within 7'' <br />
                                                                                                                                                                                                     Otherwise, (g-r) &lt; 0.12 <br /> <a href="dr8/algorithms/segueii/segue_target_selection.php#goodpm">good PM</a> <br />
                                                                                                                                                                                                     <a href="dr8/algorithms/segueii/segue_target_selection.php#Hg">H<sub>g</sub></a> &gt; 16.05+2.9(g-i) <br />
                                                                                                                                                                                                     <a href="dr8/algorithms/segueii/segue_target_selection.php#Hg">H<sub>g</sub></a> &gt; 17.5                           </td><td> 10</td><td> 1187</td><td></td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#wd">White Dwarf </a>                	                </td><td>0x80080000</td><td>   -2146959360</td><td>2<sup>19</sup>   </td><td>g &lt; 20.3 <br /> -1 &lt; (g-r) &lt; -0.2 <br /> -1 &lt; (u-g) &lt; 0.7 <br /> (u-g) + 2(g-r) &lt; -0.1                     </td><td> 25</td><td> 4069</td><td> </td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#kd">K dwarf </a>           	        	        </td><td>0x80008000</td><td>   -2147450880</td><td>2<sup>15</sup>   </td><td>14.5 &lt; r &lt; 19.0 <br /> 0.55 &lt; (g-r) &lt; 0.75                                                                   </td><td> 95</td><td>18358</td><td> </td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#bhb">A/Blue Horizontal Branch </a>       	        </td><td>0x80002000</td><td>   -2147475456</td><td>2<sup>13</sup>   </td><td>g &lt; 20.5 <br /> 0.8 &lt; (u-g) &lt; 1.5 <br /> -0.5 &lt; (g-r) &lt; 0.2 <br /> u detection <br />
                                                                                                                                                                                                     Color-gravity index condition                                                                                          </td><td>150</td><td>24688</td><td> </td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#fg">F/G </a>          	                	</td><td>0x80000200</td><td>   -2147483136</td><td>2<sup>9</sup>    </td><td>g &lt; 20.2 <br /> 0.2 &lt; (g-r) &lt; 0.48                                                                              </td><td> 50</td><td> 6939</td><td>  </td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#msub">M subdwarfs </a> 	                	</td><td>0x80400000</td><td>   -2143289344</td><td>2<sup>22</sup>   </td><td>14.5 &lt; r &lt; 19.0 <br />  (g-r) &gt; 1.6 <br /> 0.95 &lt; (r-i) &lt; 1.3                                               </td><td> 5</td><td> 1012</td><td></td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#brown">L, T brown dwarfs </a>              	        </td><td>0x80200000</td><td>   -2145386496</td><td>2<sup>21</sup>   </td><td>z &lt; 19.5 <br /> (i-z) &gt; 1.7 <br /> u &gt; 21 <br /> g &gt; 22 <br /> r &gt; 21                                           </td><td> 5</td><td> 1277</td><td> </td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#agb"> AGB </a>                             	        </td><td>0x80800000</td><td>   -2139095040</td><td>2<sup>23</sup>   </td><td>14.0 &lt; r &lt; 19.0 <br /> 2.5 &lt; (u-g) &lt; 3.5 <br /> 0.9 &lt; (g-r) &lt;1.3 <br />
                                                                                                                                                                                                    <a href="dr8/algorithms/segueii/segue_target_selection.php#scolor">s-color</a> &lt; -0.06  <br /> u detection           </td><td> 10</td><td> 1343</td><td></td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#g">G dwarf </a>           	                        </td><td>0x80040000</td><td>   -2147221504</td><td>2<sup>18</sup>   </td><td>14.0 &lt; r &lt; 20.2 <br /> 0.48 &lt; (g-r) &lt; 0.55                                                                   </td><td>375</td><td>62784</td><td> </td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#mswd">Main Sequence/White dwarf pairs* </a>      	</td><td>0x80001000</td><td>   -2147479552</td><td>2<sup>12</sup>   </td><td>15.0 &lt; g &lt; 20 <br /> (u-g) &lt; 2.25 <br /> -0.2 &lt; (g-r) &lt; 1.2 <br /> 0.5 &lt; (r-i) &lt; 2.0 <br />
                                                                                                                                                                                                      (g-r) &gt; -19.78(r-i)+11.13<br /> (g-r) &lt; 0.95(r-i)+0.5 <br />
                                                                                                                                                                                                      (i-z) &gt; 0.5 for (r-i) &gt; 1 <br /> (i-z) &gt; 0.68(r-i)-0.18 for  (r-i) &le; 1                                      </td><td>  5</td><td>  431</td><td> </td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#esdm">Extreme M subdwarfs* </a>                       </td><td>0x81000000</td><td>   -2130706432</td><td>2<sup>24</sup>   </td><td>(r-i) &lt; 0.787(g-r)-0.356 <br /> (r-i) &lt; 0.9 <br />
                                                                                                                                                                                                     <a href="dr8/algorithms/segueii/segue_target_selection.php#Hr">H<sub>r</sub></a> &gt;17 <br /> 1.8 &lt; (g-i) &lt; 2.4   </td><td> 40</td><td> 9420</td><td> </td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#kg">Low latitude K giant</a>            	        </td><td>0x80000400</td><td>   -2147482624</td><td>2<sup>10</sup>   </td><td>0.55 &lt; (g-r) &lt; 0.9 <br /> g &lt; 19 <br /> PM<sub>total</sub> &lt; 11 mas/yr                                         </td><td>300</td><td> 3220</td><td> </td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#llblue">Low latitude Blue Stellar Locus</a>          </td><td>0x80000800</td><td>   -2147481600</td><td>2<sup>11</sup>   </td><td>(g-r) &lt; 0.25                                                                                                        </td><td>800</td><td> 8522</td><td> </td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#llAGB">Low latitude AGB/M giants</a>                 </td><td>0x88000000</td><td>   -2013265920</td><td>2<sup>27</sup>   </td><td><a href="dr8/algorithms/segueii/segue_target_selection.php#scolor">s-color</a> &gt; -0.13 <br />
                                                                                                                                                                                                     3.5 &gt; (u-g) &gt; 2.6 <br /> 0.8 &lt; (g-r) &lt;1.3                                                                    </td><td> 50</td><td>  499</td><td>  </td></tr>
</table>

<p>*All magnitudes for MS/WD pairs are the reddened values </p>

<p><strong>Notes:</strong></p>
<ul>
<li>All <i>ugriz</i> magnitudes listed below are dereddened PSF mags,
unless otherwise specified. This means that a check of
objc_flag[2] indicates the target has no bright, no edge, no bad interp, no bad deblends</li>
<li>For selections which involve <i>u</i> band, we require that
the <i>u</i> flags indicate a u band detection.</li>
<li>The 'regular SDSS bright end cut' is: <br />
No spectra of objects with <i>g,r</i> or <i>i</i> fiber mag &lt; 14.5
allowed.</li>
<li>Proper motions have been included for objects
which have matches to the USNO-B catalog and are used
in various selection categories. Many criteria state <a id="goodpm">"good PM."</a> This
uses parameters from the Proper Motions catalog and is defined below:
<ul>
<li>Match = 1 </li>
<li>dist22 &gt; 7.0 arcsec (i.e., the nearest neighbor brighter than 22nd magnitude is more than 7'' away) </li>
<li>pmSigmaRa &lt; 525 mas/yr </li>
<li>pmSigmaDec &lt; 525 mas/yr </li>
<li>nFit = 6 (nFit is the number of measurements used in the proper motion fit) </li>
</ul></li>
<li>Low Latitude Algorithms implemented:
<ul>
<li>AGB type objects at low latitude</li>
<li>K III type objects at low latitude</li>
<li>Bluetip objects at low latitude</li>
<li>AMNH high proper motion objects at low latitude</li>
</ul></li>
<li>Principal component color definitions:
<ul>
<li><a id="lcolor">l-color</a> = -0.436u + 1.129g - 0.119r - 0.574i + 0.1984<br />
and is a photometry metalicity indicator for stars
in the color range 0.5 &lt; (g-r) &lt; 0.8.<br />
Reference: <a href="http://adsabs.harvard.edu/abs/1998ApJS..119..121L">Lenz et al. (1998)</a></li>
<li><a id="scolor">s-color</a> = -0.249u + 0.794g - 0.555r + 0.234</li>
<li><a id="P1">P1(s)</a> = P1 = 0.91(u-g) + 0.415(g-r) -1.280<br />
Reference: <a href="http://adsabs.harvard.edu/abs/2003ApJ...586..195H">Helmi et al. (2003)</a></li>
<li><a id="Hg">H<sub>g</sub></a> = g + 5 + 5log10(PM (arcsec/year)) </li>
<li><a id="Hr">H<sub>r</sub></a> = r + 5 + 5log10(PM (arcsec/year)) </li>
</ul></li>
</ul>

<hr />

<h3>SEGUE-1 Target Type Descriptions</h3>

<p>
The following are the target types included in the SEGUE-1 survey.
To jump to a particular target category, please use the links : </p>
<table class="noborder">
<tr>
<td valign="top">
<ul>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#wd"> White Dwarf</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#cwd">Cool White Dwarf</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#bhb">A/BHB</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#f">F turnoff, subdwarf</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#fg">F/G stars</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#g">G stars</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#kg">K giant</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#llkg">Low Latitude K giant</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#llAGB">Low Latitude AGB/M giant</a></li>
</ul></td>
<td valign="top">
<ul>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#low">Low Metallicity</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#kd">K dwarf</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#mswd">Main sequence - White dwarf pair</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#msub">M sub-dwarf</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#brown">L, T Brown dwarf</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#agb">AGB candidate</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#esdm">Extreme M subdwarfs</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#llblue">Low Latitude Blue Stellar Locus</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#SpecialTS">Special targets</a></li>
</ul>
</td>
</tr>
</table>

<h4 id="wd">White dwarf selection</h4>

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

<h4 id="cwd">Cool White dwarf selection</h4>

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

<h4 id="bhb">A/BHB selection</h4>

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

<h4 id="f">F turnoff, sub-dwarf selection</h4>

<p>(bit -2146435072 &rarr; 0x80100000)</p>

<ul><li>Color cuts:
<ul>
<li>-0.7 &lt; <a href="dr8/algorithms/segueii/segue_target_selection.php#P1">P1(s)</a> &lt; -0.25</li>
<li>0.4 &lt; (u-g) &lt; 1.4</li>
<li>0.2 &lt; (g-r) &lt; 0.7</li>
<li>g &lt; 20.3</li>
</ul></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#P1">P1</a> is a color perpendicular to the locus for F/G/K stars;
more negative P1 indicates lower-metallicity side of locus.</li>
<li>Note: there was an <a href="dr8/algorithms/segueii/segue_target_selection.php#scolor">s-color</a> cut in versions prior to v3.3,  s &ge; -0.065,
no longer present for v3.3 and beyond.</li>
<li>Weighting: colorslope+ magnitude weighting P1 min/max slope = 5</li>
<li>Target count Goal: 200 per plate pair</li>
</ul>

<h4 id="fg">F/G stars</h4>

<p>(bit -2147483136 &rarr;  0x80000200)</p>

<ul><li>Color cuts:
<ul>
<li>0.2 &lt; (g-r) &lt; 0.48</li>
<li>14.0 &lt; g &lt; 20.2</li>
</ul></li>
<li>Unbiased random subsampling of this range of (g-r) color space</li>
<li>Target count Goal: 50 per plate pair</li>
</ul>

<h4 id="g">G selection</h4>

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

<h4 id="kg">K Giant Selection</h4>

<p>(bit -2147467264 &rarr; 0x80004000)</p>

<ul><li>Color cuts:
<ul>
<li>r &lt; 20.2</li>
<li>0.7 &lt; (u-g) &lt; 4.0</li>
<li>0.35 &lt; (g-r) &lt; 0.8</li>
<li>0.15 &lt; (r-i) &lt; 0.6</li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#lcolor">l-color</a> &gt; 0.07</li>
</ul></li>
<li> PM<sub>total</sub> &lt; 11 milliarcsec/year</li>
<li> <a href="dr8/algorithms/segueii/segue_target_selection.php#goodpm">Good proper motion</a></li>
<li>Weighting: magslope 2.0</li>
<li>Target count Goal: 95 per plate pair (expected density 4/sq deg = 28/plate pair)</li>
</ul>

<h4 id="low">Low Metallicity selection</h4>

<p>(bit -2147418112 &rarr; 0x80010000)</p>

<ul><li>Color cuts:
<ul>
<li>14 &lt; r &lt; 19.5</li>
<li>-0.5 &lt; (g-r) &lt; 0.75</li>
<li>0.6 &lt; (u-g) &lt; 3.0</li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#lcolor">l-color</a> &gt; 0.135</li>
<li>require detection in u band</li>
</ul></li>
<li>Weighting: magslope 1.8. Faint plate targets sorted by
magnitude to 'pack' them, so that brightest ones targeted before
fainter ones.</li>
<li>Target count Goal: 150 per plate pair</li>
</ul>

<h4 id="kd">K dwarf selection</h4>

<p>(bit -2147450880 &rarr; 0x80008000)</p>

<ul><li>Color cuts:
<ul>
<li>14.5 &lt; r &lt; 19.0</li>
<li>0.55 &lt; (g-r) &lt; 0.75</li>
</ul></li>
<li>Selection: Random subsample</li>
<li>Target count Goal: 95 per plate pair</li>
</ul>

<h4 id="mswd">Main Sequence - White Dwarf pairs</h4>

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

<h4 id="msub">M sub-dwarf selection</h4>

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

<h4 id="brown">L,T brown-dwarf selection</h4>

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

<h4 id="agb">AGB candidate selection</h4>

<p>(bit -2139095040 &rarr;  0x80800000)</p>

<ul><li>Color cuts:
<ul>
<li>14.0 &lt; r &lt; 19.0</li>
<li>2.5 &lt; (u-g) &lt; 3.5</li>
<li>0.9 &lt; (g-r) &lt; 1.3</li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#scolor">s-color</a> &lt; -0.06</li>
<li>detection in u band</li>
</ul></li>
<li>Selection: magslope 1.4</li>
<li>Target count Goal: 10 per plate pair</li>
</ul>

<h4 id="esdm">Extreme M subdwarfs </h4>
<p>(bit -2130706432 &rarr; 0x81000000) </p>

<ul><li>Color cuts:
<ul>
<li>(r-i) &lt; 0.787(g-r)-0.356 </li>
<li>(r-i) &lt; 0.9 </li>
<li>1.8 &lt; (g-i) &lt; 2.4</li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#Hr">H<sub>r</sub></a> &gt; 17</li>
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
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#scolor">s-color</a> &gt; -0.13</li>
</ul></li>
<li>Selection: </li>
<li>Target count Goal: 50 </li>
</ul>


<h4 id="SpecialTS">Special Targets</h4>

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

<h2 id="SEGUEts2">SEGUE-2 Target Selection</h2>

<p>The parameter <i>segue2_target1</i> in sppParams and SpecObjAll is used to identify
why a star was given a spectroscopic fiber in SEGUE-2.
These same bit settings are used for the <i>segue2_target1</i> parameter for
all stellar objects (g &lt; 21 or z &lt; 21) in the PhotoObjAll table,
whether or not they received a SEGUE fiber. </p>

<p>SEGUE-2 plates are listed <a href="dr8/algorithms/segueii/plate_table.php#segue2">here.</a></p>

<h3>SEGUE-2 Target Selection</h3>

<table class="common" id="S2_table">
<caption>Hex and Decimal values for segue2_target1 bitmaps</caption>
<tr><th>Category</th><th>Hex</th><th>Integer</th><th>Binary</th><th>Criteria</th><th>PerPlate</th><th>Total</th><th>Success</th></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#msto2">MS turnoff</a>                 </td><td>0x80000001 </td><td>-2147483647     </td><td>2<sup>0</sup>     </td><td>18 &lt; g &lt; 19.5 <br /> 0.1 &lt; (g-r) &lt; 0.48 <br /> psfmagerr(g,r,i) &lt; 0.05                          </td><td>100       </td><td>37222</td><td>TBD</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#kg2">Red K giants</a>                 </td><td>0x80000002 </td><td>-2147483646     </td><td>2<sup>1</sup>     </td><td>15.5 &lt; g &lt; 18.5 <br /> r &gt; 15 <br /> psfmagerr(g,r,i) &lt; 0.05 <br />
                                                                                                                                                                                            <a href="dr8/algorithms/segueii/segue_target_selection.php#goodpm">good PM</a> <br />
                                                                                                                                                                                            0.8 &lt; (g-r) &lt; 1.3 <br /> (u-g) &gt; 0.84(g-r)+1.758 <br /> (u-g) &lt; 2.4(g-r)+0.73 <br />
                                                                                                                                                                                            PM<sub>total</sub> &lt; 11 mas/yr                                                                          </td><td>&lt; 50   </td><td>1377</td><td></td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#kg2">l-color K giants</a>             </td><td>0x80000004 </td><td>-2147483644 	</td><td>2<sup>2</sup> 	   </td><td>15.5 &lt; g &lt; 18.5 <br /> r &gt; 15 <br /> psfmagerr(g,r,i) &lt; 0.05 <br />
                                                                                                                                                                                            <a href="dr8/algorithms/segueii/segue_target_selection.php#goodpm">good PM</a> <br />
                                                                                                                                                                                            0.7 &lt; (u-g) &lt; 3 <br /> 0.5 &lt; (g-r) &lt; 0.8 <br /> l-color &gt; 0.09 <br />
                                                                                                                                                                                            0.1 &lt; (r-i) &lt; 0.6 <br /> PM<sub>total</sub> &lt; 11 mas/yr                                                                          </td><td>100 </td><td>23724</td><td></td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#kg2">Proper motion only K giants</a>  </td><td>0x80000008 </td><td>-2147483640     </td><td>2<sup>3</sup>     </td><td>15.5 &lt; g &lt; 18.5 <br /> r &gt; 15 <br /> psfmagerr(g,r,i) &lt; 0.05 <br />
                                                                                                                                                                                            <a href="dr8/algorithms/segueii/segue_target_selection.php#goodpm">good PM</a> <br />
                                                                                                                                                                                            0.8 &lt; (u-g) &lt; 1.2 <br /> PM<sub>total</sub> &lt; 7 mas/yr <br /> (u-g) &gt; 2.375(g-r)-0.45 <br />
                                                                                                                                                                                            (u-g) &lt; 0.84(g-r)+1.758                                                                                 </td><td>150       </td><td>17872</td><td></td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#lowmet2">Low Metallicity</a>          </td><td>0x80000010 </td><td>-2147483632 	</td><td>2<sup>4</sup> 	   </td><td>0.3 &lt; (g-r) &lt; 0.8 <br /> 0.5 &lt; (u-g) &lt; 2.0 <br /> 15.5 &lt; g &lt; 18 <br /> r &gt; 15 <br />
                                                                                                                                                                                            psfmagerr(g,r,i) &lt; 0.05 <br /> psfmagerr(u) &lt; 0.2 <br />
                                                                                                                                    <a href="dr8/algorithms/segueii/segue_target_selection.php#lcolor2">l-color</a> &gt; 0.115 <br />
                                                                                                                                                                                            <a href="dr8/algorithms/segueii/segue_target_selection.php#goodpm">good PM</a>                           </td><td>100      </td><td>16383</td><td></td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#hyperv2">Hypervelocity</a>            </td><td>0x80000020 </td><td>-2147483616     </td><td>2<sup>5</sup>     </td><td> 17 &lt; g &lt; 20 <br /> PM<sub>total</sub> &gt; 8 mas/yr <br />
                                                                                                                                                                                             <a href="dr8/algorithms/segueii/segue_target_selection.php#goodpm">good PM</a> <br />
                                                                                                                                                                                             Box 1 criteria or Box 2 criteria                                                                        </td><td> &lt;5   </td><td>  561</td><td></td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#cool_eusd2">Cool Extreme and Ultra Subdwarfs* </a></td><td>0x80000040 </td><td>-2147483584 	</td><td>2<sup>6</sup> 	   </td><td> g &gt; 15.5 <br /> (g-r) &gt; 1.4 <br /> (r-i) &gt; 0.4 <br /> 15 &lt; r &lt; 20 <br />
                                                                                                                                                                                            (r-i) &lt; 3.0(g-r)-3.5 <br /> PM<sub>total</sub> &lt; 10 mas/yr <br /> H<sub>r</sub> &gt; 10.0+2.5(g-r) <br />
                                                                                                                                                                                            psfmagerr(r,i) &lt; 0.05 <br />
                                                                                                                                                                                            <a href="dr8/algorithms/segueii/segue_target_selection.php#goodpm">good PM</a>                           </td><td>50       </td><td>10587</td><td></td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#mg2">M giants</a>                     </td><td>0x80000080 </td><td>-2147483520 	</td><td>2<sup>7</sup> 	   </td><td>(g-r) &gt; 1.3 <br /> (u-g) &gt; 1.8+0.9(g-r) <br /> i &gt; 14.5 <br /> 15.5 &lt; g &lt; 19.25 <br />
                                                                                                                                                                                            PM<sub>total</sub> &lt; 11 mas/yr <br /> psfmagerr(g,r) &lt; 0.05 <br />
                                                                                                                                                                                            <a href="dr8/algorithms/segueii/segue_target_selection.php#goodpm">good PM</a>                           </td><td>&lt;50   </td><td>  631</td><td></td></tr>
                                                                                                <tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#hhv2">Halo high velocity</a>           </td><td>0x80000100 </td><td>-2147483392 	</td><td>2<sup>8</sup>     </td><td> 17 &lt; g &lt; 20 <br /> 0.1 &lt; (g-r) &lt; 0.48 <br /> <a href="dr8/algorithms/segueii/segue_target_selection.php#Vtan">V<sub>tan</sub></a> &gt; 300 km/s <br /> V<sub>tan</sub>/ <a href="dr8/algorithms/segueii/segue_target_selection.php#sigVtan">&sigma;(V<sub>tan</sub>)</a> &gt; 3.0       </td><td> &lt;5   </td><td> 4133</td><td></td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#bhb2">Blue Horizontal Branch</a>      </td><td>0x80002000 </td><td>-2147475456 	</td><td>2<sup>13</sup>    </td><td>15.5 &lt; g &lt; 20.3 <br /> -0.5 &lt; (g-r) &lt; 0.1 <br /> 0.8 &lt; (u-g) &lt; 1.5                           </td><td>&lt; 100 </td><td> 9983</td><td></td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#ultracool2">Ultra-Cool CIA White Dwarfs</a></td><td>0x80020000 </td><td>-2147352576 	</td><td>2<sup>17</sup>    </td><td>15.5 &lt; r &lt; 20.5 <br /> g &gt; 15.5 <br /> -2.0 &lt; (g-i) &gt; 1.7 <br />
                                                                                                                                                                                            <a href="dr8/algorithms/segueii/segue_target_selection.php#goodpm">good PM</a> <br />
                                                                                                                                                                                            <a href="dr8/algorithms/segueii/segue_target_selection.php#Hg2">H<sub>g</sub></a> &gt; 17.5 <br />
                                                                                                                                                                                            <a href="dr8/algorithms/segueii/segue_target_selection.php#Hg2">H<sub>g</sub></a> &gt; 16.05+2.9(g-i)         </td><td>&lt; 10  </td><td>0</td><td></td></tr>
</table>
<p>*The magnitudes used for cool extreme and ultra subdwarfs are uncorrected for extinction (i.e., reddened). </p>

<p><strong>Notes:</strong></p>
<ul>
<li> All <i>ugriz</i> magnitudes listed below are dereddened PSF mags,
unless otherwise specified. This means that a check of
objc_flag[2] indicates the target has no bright, no edge, no bad interp, no bad deblends</li>
<li>For selections which involve <i>u</i> band, we require that
the u flags indicate a <i>u</i> band detection.</li>
<li>The 'regular SDSS bright end cut' is: <br />
No spectra of objects with <i>g,r</i> or <i>i</i> fiber mag &lt; 14.5
allowed.</li>
<li>Proper motions have been included for objects
which have matches to the USNO-B catalog and are used
in various selection categories. Many criteria state "good PM." This
uses parameters from the Proper Motions catalog and is defined below:
<ul>
<li>Match = 1 </li>
<li>dist22 &gt; 7.0 arcsec (i.e., the nearest neighbor brighter than 22nd magnitude is more than 7'' away) </li>
<li>pmSigmaRa &lt; 525 mas/yr </li>
<li>pmSigmaDec &lt; 525 mas/yr </li>
<li>nFit = 6 (nFit is the number of measurements used in the proper motion fit) </li>
</ul></li>
<li>Principal component color definitions:
<ul>
<li><a id="lcolor2">l-color</a> = -0.436u + 1.129g - 0.119r - 0.574i + 0.1984<br />
and is a photometry metalicity indicator for stars
in the color range 0.5 &lt; (g-r) &lt; 0.8.<br />
Reference: <a href="http://adsabs.harvard.edu/abs/1998ApJS..119..121L">Lenz et al. (1998)</a></li>
<li><a id="scolor2">s-color</a> = -0.249u + 0.794g - 0.555r + 0.234</li>
<li><a id="P12">P1(s)</a> = P1 = 0.91(u-g) + 0.415(g-r) -1.280<br />
Reference: <a href="http://adsabs.harvard.edu/abs/2003ApJ...586..195H">Helmi et al. (2003)</a></li>
<li><a id="Hg2">H<sub>g</sub></a> = g + 5 + 5log10(PM (arcsec/year)) is the reduced proper motion with respect to g. </li>
<li><a id="Hr2">H<sub>r</sub></a> = r + 5 + 5log10(PM (arcsec/year)) is the reduced proper motion with respect to r. </li>
<li><a id="Vtan">V<sub>tan</sub></a> is the tangential velocity, computed from the measured proper motions and an estimated
distance from photometric parallax. </li>
<li><a id="sigVtan">&sigma;(V<sub>tan</sub>)</a> is the error on the tangential velocity calculation, based on the errors of the
proper motions and distances. </li>
</ul></li>
</ul>

<hr />

<h3>SEGUE-2 Target Type Descriptions</h3>

<p>
The following are the target types included in the SEGUE-2 survey.
To jump to a particular target category, please use the links : </p>
<table class="noborder">
<tr>
<td valign="top">
<ul>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#bhb2"> Blue Horizontal Branch</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#msto2">Main Sequence Turnoff</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#kg2">K Giants</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#mg2">M Giants</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#fg">F/G stars</a></li>
</ul></td>
<td valign="top">
<ul>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#cool_eusd2">Cool Extreme and Ultra subdwarfs</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#hyperv2">Hypervelocity Stars</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#hhv2">Halo High Velocity Stars</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#ultracool2">Ultra-Cool CIA White Dwarfs</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#lowmet2">Low Metallicity Candidates</a></li>
</ul>
</td>
</tr>
</table>

<h4 id="bhb2">Blue Horizontal Branch selection</h4>
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

<h4 id="msto2">Main Sequence Turnoff selection</h4>
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

<h4 id="kg2">K Giants</h4>

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

<h4 id="mg2">M Giants</h4>
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

<h4 id="cool_eusd2">Cool Extreme and Ultra subdwarfs</h4>
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

<h4 id="hyperv2">Hypervelocity Stars</h4>
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

<h4 id="hhv2">Halo High Velocity Stars </h4>
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

<h4 id="ultracool2">Ultra-Cool CIA White Dwarfs</h4>
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

<h4 id="lowmet2">Low Metallicity Candidates</h4>
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

<h3 id="SEGUEClusterTargets2">SDSS Cluster Plate Targeting</h3>

<p>A number of SEGUE plates (mostly in SEGUE-1, but also in SEGUE-2)
specificially targeted on known globular or open clusters.   Since these
clusters are generally quite bright, the exposure times of these plates
were often shorter than the normal 45 min to 2 hours exposure time, in
some cases as short as two minutes.  Such a short exposure time can
result in lack of sky signal, and the wavelength calibration for these
plates as well as the spectrophotometric flux calibration must be
carefully be done by hand.  While we have taken many precautions in
getting these calibrations correct, users are cautioned to regard these
with care.  The spectra and measured SSPP output parameters from these
cluster stars, combined with their ugriz or other photometry is the
basis for putting the log(g), [Fe/H] and T<sub>eff</sub> systems on uniform
system.  The list of plates targeted in this fashion with their target
cluster is <a href="dr8/algorithms/segueii/plate_table.php#segcluster">here.</a></p>


<hr />

<h3 id="Legacy">SDSS Stellar Targeting - Legacy</h3>

<p>Approximately 200,000 stars were spectroscopically observed as part of the
SDSS and SDSS-II Legacy program. These targets are briefly described in
<a href="http://adsabs.harvard.edu/abs/2009AJ....137.4377Y">Yanny et al. 2009</a>,and
the target categories are explained in <a href="http://adsabs.harvard.edu/abs/2002AJ....123..485S">Stoughton et al. 2002</a>
There is a brief description of the overall Legacy target selection algorithm
<a href="dr8/algorithms/target_selection.php">here</a>. </p>

<p> The table below lists the possible <i>legacy1_target1</i> (located in the sppParams and SpecObjAll
tables) bit settings available on each spectrum if this object was a Legacy target.
Unlike SEGUE-1 and SEGUE-2, every target in the Legacy component is identified by the
target type criteria it fulfills, rather than why it was assigned a fiber. </p>

<table class="common" id="S3_table">
<caption>SDSS Stellar Targeting Selection Categories</caption>
<tr><th>Category</th><th>Hex</th><th>Integer</th><th>Binary</th><th>Color, Mag Cuts</th><th>Total Fibers</th></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#spstd">Spectrophotometric Standard</a> </td><td> 0x00000020</td><td>32       </td><td>2<sup>5</sup> </td><td>0.1 &lt; (g-r) &lt; 0.4 <br /> 16 &lt; g &lt; 17.1                                                               </td><td>20320</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#redstd">Reddening Standard</a>         </td><td> 0x00000002</td><td>2        </td><td>2<sup>1</sup> </td><td>0.1 &lt; (g-r) &lt; 0.4 <br /> 17.1 &lt; g &lt; 18.5                                                             </td><td>22337</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#hotstd">Hot Standard </a>              </td><td> 0x00000200</td><td>512      </td><td>2<sup>9</sup> </td><td>g &lt; 19 <br /> (u-g) &lt; 0 <br /> (g-r) &lt; 0                                                                  </td><td> 3370</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#rosatc">ROSAT C  </a>                  </td><td> 0x00000800</td><td>2048     </td><td>2<sup>11</sup></td><td>r &lt; 16.5 <br />  ROSAT X-ray source within 60'' <br />
                                                                                                                                                                                (u-g) &lt; 1.1 <br />                                                                                            </td><td> 8000</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#rosate">ROSAT E  </a>                  </td><td> 0x08000000</td><td>134217728</td><td>2<sup>27</sup></td><td>ROSAT source within 60''                                                                                       </td><td> 8000</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#leg_bhb">BHB Star   </a>               </td><td> 0x00002000</td><td>8192     </td><td>2<sup>13</sup></td><td>-0.4 &lt; (g-r) &lt; 0 <br /> 0.8 &lt; (u-g) &lt; 1.8                                                            </td><td>19887</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#carbon">Carbon Star  </a>              </td><td> 0x00004000</td><td>16384    </td><td>2<sup>14</sup></td><td>(g-r) &gt; 0.85 <br /> (r-i) &gt; 0.05 <br /> (i-z) &gt; 0 <br /> (r-i) &lt; -0.4+0.65(g-r) <br /> (g-r) &gt; 1.75     </td><td> 4453</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#browndwarf">Brown Dwarf </a>           </td><td> 0x00008000</td><td>32768    </td><td>2<sup>15</sup></td><td>z &lt; 19 <br /> psfmagerr(i) &lt; 0.3 <br /> (r-i) &gt; 1.8 <br /> (i-z) &gt; 1.8                                   </td><td>  667</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#leg_subdwarf">Subdwarf  </a>           </td><td> 0x00010000</td><td>65536    </td><td>2<sup>16</sup></td><td>(g-r) &gt; 1.6 <br /> 0.95 &lt; (r-i) &lt; 1.6 <br /> psfmagerr(g) &lt; 0.1                                        </td><td> 1482</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#cv">Catyclismic Variable*</a>           </td><td> 0x00020000</td><td>131072   </td><td>2<sup>17</sup></td><td>g &lt; 19.5 <br /> (u-g) &lt; 0.45 <br /> (g-r) &lt; 0.7 <br /> (r-i) &gt; 0.3 <br /> (i-z) &gt; 0.4 <br />
                                                                                                                                                                                (u-g)-1.314(g-r) &lt; 0.61 <br /> (r-i) &gt; 0.91 <br /> (i-z) &gt; 0.49                                           </td><td> 8959</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#reddwarf">Red Dwarf  </a>              </td><td> 0x00040000</td><td>262144   </td><td>2<sup>18</sup></td><td>i &lt; 19.5 <br /> psfmagerr(i) &lt; 0.2 <br /> (r-i) &gt; 1.0 <br /> (r-i) &gt; 1.8                                 </td><td>14649</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#whitedwarf">White Dwarf   </a>         </td><td> 0x00080000</td><td>524288   </td><td>2<sup>19</sup></td><td>(g-r) &lt; -0.15 <br /> (u-g)+2(g-r) &lt; 0 <br /> (r-i) &lt; 0 <br />
                                                                                                                                                                                H<sub>g</sub> &gt; 19 <br /> H<sub>g</sub> &gt; 16.136 + 2.727(g-i) <br />
                                                                                                                                                        (g-i) &gt; 0                                                                                                   </td><td> 6059</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#pnstar">PN Star </a>                   </td><td> 0x10000000</td><td>268435456</td><td>2<sup>28</sup></td><td>(g-r) &gt; 0.4 <br /> (r-i) &lt; -0.6 <br /> (i-z) &gt; -0.2 <br /> 16 &lt; r &lt; 20.5                              </td><td>   20</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#serenblue">Serendipity Blue </a>         </td><td> 0x00100000</td><td>1048576  </td><td>2<sup>20</sup></td><td>(u-g) &lt; 0.8 <br /> (g-r) &lt; -0.05                                                                           </td><td>81937</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#serenfirst">Serendipity FIRST </a>         </td><td> 0x00200000</td><td>2097152  </td><td>2<sup>21</sup></td><td>FIRST radio source within 1.5''                                                                                </td><td>14689</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#serenred">Serendipity Red*   </a>          </td><td> 0x00400000</td><td>4194304  </td><td>2<sup>22</sup></td><td>(r-i) &gt; 2.7 <br /> (i-z) &gt; 1.6                                                                             </td><td> 4179</td></tr>
<tr><td><a href="dr8/algorithms/segueii/segue_target_selection.php#serendistant">Serendipity Distant*</a>     </td><td> 0x00800000</td><td>8388608  </td><td>2<sup>23</sup></td><td>(g-r) &gt; 2 <br /> (r-i) &lt; 0                                                                                 </td><td>11820</td></tr>
</table>
<p>*The magnitudes for these targets are not dereddened.</p>

<hr />


<h3>SDSS Stellar Targeting Category Descriptions</h3>

<p>
The following are the target types included in the SDSS Legacy survey.
To jump to a particular target category, please use the links : </p>
<table class="noborder">
<tr>
<td valign="top">
<ul>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#spstd"> Spectrophotometric Standard </a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#redstd">Reddening Standard</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#hotstd">Hot Standard</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#rosatc">ROSAT C</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#rosate">ROSAT E</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#reddwarf">Red dwarf</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#pnstar">Planetary Nebula Star</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#serenblue">Serendipity Blue</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#serenred">Serendipity Red</a></li>
</ul></td>
<td valign="top">
<ul>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#leg_bhb">Blue Horizontal Branch</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#carbon">Carbon Star</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#browndwarf">Brown Dwarf</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#leg_subdwarf">Subdwarf</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#cv">Cataclysmic Variable</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#whitedwarf">White dwarf</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#serenfirst">Serendipity First</a></li>
<li><a href="dr8/algorithms/segueii/segue_target_selection.php#serendistant">Serendipity Distant</a></li>
</ul>
</td>
</tr>
</table>

<h4 id="spstd">Spectrophotometric Standard</h4>
<p> (bit 32 &rarr; 0x00000020)</p>

<ul>
     <li>0.1 &lt; (g-r) &lt; 0.4 </li>
     <li>16.0 &lt; g &lt; 17.1 </li>
</ul>

<h4 id="redstd">Reddening Standard</h4>
<p> (bit 2 &rarr; 0x00000002)</p>

<ul>
     <li>0.1 &lt; (g-r) &lt; 0.4 </li>
     <li>17.1 &lt; g &lt; 18.5 </li>
</ul>


<h4 id="hotstd">Hot Standard</h4>
<p> (bit 512 &rarr; 0x00000200)</p>

<ul>
     <li>g &lt; 19</li>
     <li>(g-r) &lt; 0   </li>
     <li>(u-g) &lt; 0 </li>
</ul>



<h4 id="rosatc">ROSAT C</h4>
<p> (bit 2048 &rarr; 0x00000800)</p>

<ul>
     <li>r &lt; 16.5 </li>
     <li>(u-g) &lt; 1.1 </li>
     <li>ROSAT within 60'' </li>
</ul>

<h4 id="rosate">ROSAT E</h4>
<p> (bit 134217728 &rarr; 0x08000000)</p>

<ul>
     <li>ROSAT within 60''</li>
</ul>

<h4 id="reddwarf">Red dwarf</h4>
<p> (bit 262144 &rarr; 0x00040000)</p>

<ul>
     <li>i &lt; 19.5 </li>
     <li>psfmagerr(i) &lt; 0.2 </li>
     <li>(r-i) &gt; 1.0 </li>
     <li>(r-i) &gt; 1.8 </li>
</ul>

<h4 id="pnstar">Planetary Nebula Star</h4>
<p> (bit 268435456 &rarr; 0x10000000)</p>

<ul>
     <li>(g-r) &gt; 0.4 </li>
     <li>(r-i) &lt; 0.6 </li>
     <li>(i-z) &gt; -0.2 </li>
     <li>16 &lt; r &lt; 20.5 </li>
</ul>

<h4 id="serenblue">Serendipity Blue</h4>
<p> (bit 1048576 &rarr; 0x00100000)</p>

<ul>
     <li>(u-g) &lt; 0.8 </li>
     <li>(g-r) &lt; -0.05 </li>
</ul>

<h4 id="serenred">Serendipity Red</h4>
<p> (bit 4194304 &rarr; 0x00400000)</p>

<ul>
     <li>(r-i) &gt; 2.7 </li>
     <li>(i-z) &gt; 1.6 </li>
<li>Colors for the above criteria are not dereddened</li>
</ul>

<h4 id="leg_bhb">Blue Horizontal Branch</h4>
<p> (bit 8192 &rarr; 0x00002000)</p>

<ul>
     <li>-0.4 &lt; (g-r) &lt; 0 </li>
     <li>0.8 &lt; (u-g) &lt; 1.8 </li>
</ul>


<h4 id="carbon">Carbon Star</h4>
<p> (bit 16384 &rarr; 0x00004000)</p>

<ul>
     <li>(r-i) &gt; 0.05 </li>
     <li>(g-r) &gt; 0.85 </li>
     <li>(i-z) &gt; 0 </li>
     <li>(r-i) &lt; -0.4 + 0.65(g-r) </li>
     <li>(g-r) &lt; 1.75 </li>
</ul>


<h4 id="browndwarf">Brown dwarf</h4>
<p> (bit 32768 &rarr; 0x00008000)</p>

<ul>
     <li>z &lt; 19  </li>
     <li>psfmagerr(i) &lt; 0.3 </li>
     <li>(r-i) &gt; 1.8 </li>
     <li>(i-z) &gt; 1.8 </li>
</ul>

<h4 id="leg_subdwarf">Subdwarf</h4>
<p> (bit 65536 &rarr; 0x00010000)</p>

<ul>
     <li>(g-r) &gt; 1.6 </li>
     <li>0.95 &lt; (r-i) &lt; 1.6 </li>
     <li>psfmagerr(g) &lt; 0.1 </li>
</ul>

<h4 id="cv">Cataclysmic Variable</h4>
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

<h4 id="whitedwarf">White dwarf</h4>
<p> (bit 524288 &rarr; 0x00080000)</p>

<ul>
     <li>(g-r) &lt; -0.15 </li>
     <li>(u-g)+2(g-r) &lt; 0 </li>
     <li>(r-i) &lt; 0  </li>
     <li>(g-i) &gt; 0 </li>
     <li>H<sub>g</sub> &gt; 19  </li>
     <li>H<sub>g</sub> &gt; 16.136+2.727(g-i)  </li>
</ul>

<h4 id="serenfirst">Serendipity First</h4>
<p> (bit 2097152 &rarr; 0x00200000 )</p>

<ul>
<li>FIRST Radio source within 1''.5 </li>
</ul>


<h4 id="serendistant">Serendipity Distant</h4>
<p> (bit 8388608 &rarr; 0x00800000)</p>
<ul>
     <li>(g-r) &gt; 2 </li>
     <li>(r-i) &lt; 0 </li>
<li>Magnitudes are not dereddened for this category.</li>
</ul>

<hr />

<h2 id="Calib">Calibration Fibers in SEGUE-1 and SEGUE-2</h2>

<p>A number of stellar targets are assigned fibers for calibration purposes. This
is indicated in the parameter <i>segue1_target2</i> in the SpecObjAll and sppParams tables for
SEGUE-1 targets and in <i>segue2_target2</i> for SEGUE-2.</p>

<p>The bitmask assignments for <i>segue1_target2</i> are listed below: </p>

<table class="common">
<caption>Hex and Integer values for segue1_target2 bitmasks</caption>
<tr><th>Category</th><th>Hex</th><th>Integer</th><th>Binary</th></tr>
<tr><td>Science Target              </td><td>0x40000000</td><td>1073741824</td><td> 2<sup>30</sup> </td></tr>
<tr><td>Reddening Standard          </td><td>0x2       </td><td>2         </td><td> 2<sup>1</sup>  </td></tr>
<tr><td>QA Duplicate Observation*   </td><td>0x8       </td><td>8         </td><td> 2<sup>3</sup>  </td></tr>
<tr><td>Sky                         </td><td>0x10      </td><td>16        </td><td> 2<sup>4</sup>  </td></tr>
<tr><td>Spectrophotometric Standard </td><td>0x20      </td><td>32        </td><td> 2<sup>5</sup>  </td></tr>
</table>

<p>The bitmask assignments for <i>segue2_target2</i> are listed below: </p>

<table class="common">
<caption>Hex and Integer values for segue2_target2 bitmaps</caption>
<tr><th>Category</th><th>Hex</th><th>Integer</th><th>Binary</th></tr>
<tr><td> Light Trap                  </td><td>0x80000001</td><td>-2147483647 </td><td> 2<sup>0</sup> </td></tr>
<tr><td> Reddening Standard          </td><td>0x80000002</td><td>-2147483646 </td><td> 2<sup>1</sup>  </td></tr>
<tr><td> Test                        </td><td>0x80000004</td><td>-2147483644 </td><td> 2<sup>2</sup>  </td></tr>
<tr><td> QA Duplicate Observation*   </td><td>0x80000008</td><td>-2147483640 </td><td> 2<sup>3</sup>  </td></tr>
<tr><td> Sky	                     </td><td>0x80000010</td><td>-2147483632 </td><td> 2<sup>4</sup>  </td></tr>
<tr><td> Spectrophotometric Standard </td><td>0x80000020</td><td>-2147483616 </td><td> 2<sup>5</sup>  </td></tr>
<tr><td> Guide Star                  </td><td>0x80000040</td><td>-2147483584 </td><td> 2<sup>6</sup>  </td></tr>
<tr><td> Bundle Hole                 </td><td>0x80000080</td><td>-2147483520 </td><td> 2<sup>7</sup>  </td></tr>
<tr><td> Quality Hole                </td><td>0x80000100</td><td>-2147483392 </td><td> 2<sup>8</sup>  </td></tr>
<tr><td> Hot Standard	             </td><td>0x80000200</td><td>-2147483136 </td><td> 2<sup>9</sup>  </td></tr>
<tr><td> Stellar Cluster Target      </td><td>0x80000400</td><td>-2147482624 </td><td> 2<sup>10</sup> </td></tr>
<tr><td> Stetson Standard            </td><td>0x80000800</td><td>-2147481600 </td><td> 2<sup>11</sup> </td></tr>
</table>

<p>*QA duplicate observations are not currently marked in <i>segue1_target2</i> bitmasks. These are only
marked in <i>objtype</i> in SpecObjAll. </p>

<?php echo foot(); ?>
