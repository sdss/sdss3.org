<?php include '../../header.php'; echo head('SEGUE Target Selection'); ?>

<p>Using the photometry from SDSS, the SEGUE survey designed a series of
color, magnitude, and proper motion criteria to identify stellar targets that were of
particular interest. Each photometric target is labeled with distinctive hexadecimal
codes (<a href="dr10/algorithms/segue_bit_guide.php">bitmasks</a>) which indicate which
stellar types they are associated with. For each individual stellar category, a certain
number of photometric targets that fulfill the selection criteria are observed spectroscopically.
For example, around 25 stars that meet the SEGUE White Dwarf criteria are observed along each
line-of-sight. </p>

<p>Below, we list the different selection criteria for the different programs in the SEGUE survey.
The SEGUE sample consists of three different surveys,
SEGUE-1, SEGUE-2, and SDSS stellar targeting originating from the SDSS Legacy Program.
Each of these also consists of different observing <a href="dr10/algorithms/segue_plate_table.php">programs</a>, with different
targeting goals and a different target-selection algorithm. For example, low
latitude plates focus on K giants, with different criteria than K giants
observed as part of the <i>segue</i> and <i>seguefaint</i> programs. </p>

<p>In addition to variation from program-to-program, the target selection algorithm for SEGUE-1 plates evolved over time.
More detailed information on the evolution of target criteria is available
on the <a href="dr10/algorithms/segue_previous_tselec.php">Past Versions </a>
page. Here we list the most current version of the target selection
algorithm. The target identification for each star listed in sppParams, SpecObjAll, and segueTargetAll is
based on the latest version of the selection criteria. </p>

<p>Finally, the photometry and proper motions for SDSS stars has
evolved over time. SEGUE-1 selected targets for spectroscopic based on
a series of SEGUE imaging stripes in conjunction with proper motions
from various astrometric catalogs (see <a
href="dr10/tutorials/segue_getting_started.php#s1s2_tselec">Getting
Started with SEGUE: Target Selection Differences</a> and <a
href="http://adsabs.harvard.edu/abs/2009AJ....137.4377Y">Yanny et
al. 2009</a> for more detail). SEGUE-2 selects targets based on
photometry and astrometry from SDSS DR7. These data sets have changed
for DR9. Targets that may have fulfilled the criteria for a SEGUE
target type in DR7 may no longer, thanks to photometric errors, among
other things. Thus, there is variation in the number of targets for
each category between DR7 and DR9 (due to the astrometry errors in
SDSS DR8, this SEGUE data set should not be used). </p>

<p>Below, we detail the different targets examined in SEGUE-1, SEGUE-2, and
SDSS stellar targeting originating from the SDSS Legacy Program. Each program
has a table with summary information for each target type and a description
of the different targeting criteria. Finally, we also include a
brief summary of the calibration fiber identifications. </p>

<p>Jump to Summary Tables for:</p>
<ul>
<li><a href="dr10/algorithms/segue_target_selection.php#SEGUEts1">SEGUE-1</a>
<ul>
                    <li><a href="dr10/algorithms/segue_target_selection.php#segueprog"><i>segue, seguefaint</i></a></li>
                    <li><a href="dr10/algorithms/segue_target_selection.php#seguelowlat"><i>seglowlat</i></a></li>
                    <li><a href="dr10/algorithms/segue_target_selection.php#seguecluster"><i>segcluster</i></a></li>
                    <li><a href="dr10/algorithms/segue_target_selection.php#seguepointed"><i>segpointed, segpointedf</i></a></li>
                    <li><a href="dr10/algorithms/segue_target_selection.php#seguetest"><i>segtest</i></a></li>
</ul>
</li>
<li><a href="dr10/algorithms/segue_target_selection.php#S2_table">SEGUE-2</a></li>
<li><a href="dr10/algorithms/segue_target_selection.php#S3_table">SDSS Legacy Stellar Targeting</a></li>
<li><a href="dr10/algorithms/segue_target_selection.php#Calib">Calibration Fibers</a></li>
</ul>

<hr />

<h2 id="SEGUEts1">SEGUE-1 Target Selection</h2>

<table class="centerfigure">
<tr><td><a href="images/color_colorts.jpg"><img src="images/color_colorts_thumb.jpg" alt="Color-color selection for SEGUE 1" /></a></td></tr>
<tr><td>Example color-color diagram of SEGUE 1 target selection categories.</td></tr>
</table>

                    <p>Each star observed in photometry (g &lt; 21 or z &lt; 21) is assigned a bitmask, <i>segue1_target1</i>, which indicates the different
                    selection criteria it fulfills, regardless of whether or not it receives a SEGUE fiber. These are in segueTargetAll. There is also
                    a <i>segue1_target1</i> parameter in sppParams and SpecObjAll; however, rather than listing all of the different target categories a
                    star belongs to, this parameter indicates why each of the observed
                    stars received a spectroscopic fiber. For example, if a star fulfills
                    the selection criteria of both the G-dwarf and low-metallicity categories but is
                    assigned a fiber as a G dwarf, segueTargetAll.<i>segue1_target1</i> will mark the stars as both types, whereas sppParams.<i>segue1_target1</i>
                   and specObjAll.<i>segue1_target1</i> will indicate the G-dwarf category alone.</p>

                    <p>The SEGUE-1 survey consisted of a number of different programs, which utilize different
                    target-selection algorithms. Each of the programs and their associated plates are listed
                    <a href="dr10/algorithms/segue_plate_table.php#segue">here</a>. Plates in the <i>segue</i> or <i>seguefaint</i> programs make
                    up the majority of the observations. The <i>segcluster</i>, <i>segpointed</i>, and <i>segpointedf</i>
                    plates focused on open and globular clusters and Milky Way substructure. Any additional spectroscopic
                    fibers not used for these were assigned to stars according to the target selection categories of
                    <i>segue</i> and <i>seguefaint</i>. For a uniform SEGUE-1 sample over a large portion of the sky, only use
                    the plates targeted under the <i>segue</i> and <i>seguefaint</i> programs. </p>


<p>These target selection criteria have evolved over time. We have the latest
version (v4.6) here. However, for information about how these have evolved
over time, please see <a href="dr10/algorithms/segue_previous_tselec.php">Past Versions</a>.</p>

<h3 id="v4.6">SEGUE-1 v4.6 Target Selection: <i>segue</i> and <i>seguefaint</i> programs</h3>

<table class="common" id="segueprog">
<caption>SEGUE 1 Target Selection Categories: <i>segue</i> and <i>seguefaint</i></caption>
<tr><th>Category</th><th>Hex</th><th>Integer</th><th>Binary</th><th>Criteria                           </th><th>Per <br />
                                                                                                                    LoS</th><th>Total*</th></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#fg">F/G </a>          	                	</td><td>0x80000200</td><td>   -2147483136</td><td>2<sup>9</sup>    </td><td>g &lt; 20.2 <br /> 0.2 &lt; (g-r) &lt; 0.48                                                                                </td><td> 50</td><td> 55189</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#mswd">Main Sequence/White dwarf pairs** </a>     </td><td>0x80001000</td><td>   -2147479552</td><td>2<sup>12</sup>   </td><td>15.0 &lt; g &lt; 20 <br /> (u-g) &lt; 2.25 <br /> -0.2 &lt; (g-r) &lt; 1.2 <br /> 0.5 &lt; (r-i) &lt; 2.0 <br />
                                                                                                                                                                                                      (g-r) &gt; -19.78(r-i)+11.13<br /> (g-r) &lt; 0.95(r-i)+0.5 <br />
                                                                                                                                                                                                      (i-z) &gt; 0.5 for (r-i) &gt; 1 <br /> (i-z) &gt; 0.68(r-i)-0.18 for  (r-i) &le; 1                        </td><td>  5</td><td>  338</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#bhb">A/Blue Horizontal Branch </a>       	</td><td>0x80002000</td><td>   -2147475456</td><td>2<sup>13</sup>   </td><td>g &lt; 20.5 <br /> 0.8 &lt; (u-g) &lt; 1.5 <br /> -0.5 &lt; (g-r) &lt; 0.2 <br /> u detection <br />
                                                                                                                                                                                                     Color-gravity index condition                                                                              </td><td>150</td><td>15626</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#kg">K giants (l and red)</a> 	        	</td><td>0x80004000</td><td>   -2147467264</td><td>2<sup>14</sup>   </td><td>r &lt; 20.2 <br /> 0.35 &lt; (g-r) &lt;  0.8 <br /> 0.15 &lt; (r-i) &lt; 0.6 <br />
                                                                                                                                                                                                    <a href="dr10/algorithms/segue_target_selection.php#lcolor">l-color</a> &gt; 0.07 <br />
                                                                                                                                                                                                    PM<sub>total</sub> &lt; 11 mas/yr  <br /> <a href="dr10/algorithms/segue_target_selection.php#goodpm">good PM</a>    </td><td> 70</td><td>17924</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#kd">K dwarf </a>           	        	</td><td>0x80008000</td><td>   -2147450880</td><td>2<sup>15</sup>   </td><td>14.5 &lt; r &lt; 19.0 <br /> 0.55 &lt; (g-r) &lt; 0.75                                                                     </td><td> 95</td><td>28580</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#low">Low Metallicity </a>	        	</td><td>0x80010000</td><td>   -2147418112</td><td>2<sup>16</sup>   </td><td>14 &lt; r &lt; 19.0 <br /> -0.5 &lt; (g-r) &lt; 0.75 <br /> 0.6 &lt; (u-g) &lt; 3.0 <br />
                                                                                                                                                                                                    <a href="dr10/algorithms/segue_target_selection.php#lcolor">l-color</a> &gt; 0.135 <br /> u detection           </td><td>150</td><td>21741</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#cwd">Cool White Dwarf </a>                	</td><td>0x80020000</td><td>   -2147352576</td><td>2<sup>17</sup>   </td><td>14.5 &lt; r &lt; 20.5 <br /> (g-i) &gt; -2 <br /> (g-i) &lt; 1.7 if no neighbor with g &gt; 22 within 7'' <br />
                                                                                                                                                                                                     Otherwise, (g-r) &lt; 0.12 <br /> <a href="dr10/algorithms/segue_target_selection.php#goodpm">good PM</a> <br />
                                                                                                                                                                                                     <a href="dr10/algorithms/segue_target_selection.php#Hg">H<sub>g</sub></a> &gt; 16.05+2.9(g-i) <br />
                                                                                                                                                                                                     <a href="dr10/algorithms/segue_target_selection.php#Hg">H<sub>g</sub></a> &gt; 17.5                            </td><td> 10</td><td>  789</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#g">G dwarf </a>           	                </td><td>0x80040000</td><td>   -2147221504</td><td>2<sup>18</sup>   </td><td>14.0 &lt; r &lt; 20.2 <br /> 0.48 &lt; (g-r) &lt; 0.55                                                                     </td><td>375</td><td>43339</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#wd">White Dwarf </a>                	        </td><td>0x80080000</td><td>   -2146959360</td><td>2<sup>19</sup>   </td><td>g &lt; 20.3 <br /> -1 &lt; (g-r) &lt; -0.2 <br /> -1 &lt; (u-g) &lt; 0.7 <br /> (u-g) + 2(g-r) &lt; -0.1                   </td><td> 25</td><td> 2997</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#f">Metal-poor main sequence turnoff, subdwarfs</a></td><td>0x80100000</td><td>   -2146435072</td><td>2<sup>20</sup>   </td><td>g &lt; 20.3 <br /> -0.7 &lt; <a href="dr10/algorithms/segue_target_selection.php#P1">P1(s)</a> &lt; -0.25 <br />
                                                                                                                                                                                                     0.4 &lt; (u-g) &lt; 1.4 <br /> 0.2 &lt; (g-r) &lt; 0.7                                                     </td><td>200</td><td>35617</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#brown">L, T brown dwarfs </a>              	</td><td>0x80200000</td><td>   -2145386496</td><td>2<sup>21</sup>   </td><td>z &lt; 19.5 <br /> (i-z) &gt; 1.7 <br /> u &gt; 21 <br /> g &gt; 22 <br /> r &gt; 21                                       </td><td>  5</td><td>   59</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#msub">M subdwarfs </a> 	                	</td><td>0x80400000</td><td>   -2143289344</td><td>2<sup>22</sup>   </td><td>14.5 &lt; r &lt; 19.0 <br />  (g-r) &gt; 1.6 <br /> 0.95 &lt; (r-i) &lt; 1.3                                               </td><td>  5</td><td>  238</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#agb"> AGB </a>                             	</td><td>0x80800000</td><td>   -2139095040</td><td>2<sup>23</sup>   </td><td>14.0 &lt; r &lt; 19.0 <br /> 2.5 &lt; (u-g) &lt; 3.5 <br /> 0.9 &lt; (g-r) &lt;1.3 <br />
                                                                                                                                                                                                    <a href="dr10/algorithms/segue_target_selection.php#scolor">s-color</a> &lt; -0.06  <br /> u detection          </td><td> 10</td><td>  198</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#esdm">Extreme M subdwarfs* </a>                 </td><td>0x81000000</td><td>   -2130706432</td><td>2<sup>24</sup>   </td><td>(r-i) &lt; 0.787(g-r)-0.356 <br /> (r-i) &lt; 0.9 <br />
                                                                                                                                                                                                     <a href="dr10/algorithms/segue_target_selection.php#Hr">H<sub>r</sub></a> &gt;17 <br /> 1.8 &lt; (g-i) &lt; 2.4     </td><td> 40</td><td>  596</td></tr>
</table>
<p>*This is the number of unique SEGUE-1 observations of this type on
<i>segue</i> or <i>seguefaint</i> plates. We use the bitmasks from the
DR9 segueTargetAll table. Individual stars can belong to multiple
categories. </p>
<p>**All magnitudes for MS/WD pairs are the reddened
values </p>

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
and is a photometry metallicity indicator for stars
in the color range 0.5 &lt; (g-r) &lt; 0.8.<br />
Reference: <a href="http://adsabs.harvard.edu/abs/1998ApJS..119..121L">Lenz et al. (1998)</a></li>
<li><a id="scolor">s-color</a> = -0.249u + 0.794g - 0.555r + 0.234</li>
<li><a id="P1">P1(s)</a> = P1 = 0.91(u-g) + 0.415(g-r) -1.280<br />
Reference: <a href="http://adsabs.harvard.edu/abs/2003ApJ...586..195H">Helmi et al. (2003)</a></li>
<li><a id="Hg">H<sub>g</sub></a> = g + 5 + 5log10(PM (arcsec/year)) </li>
<li><a id="Hr">H<sub>r</sub></a> = r + 5 + 5log10(PM (arcsec/year)) </li>
</ul></li>
</ul>

<h3 id="v4.6low">SEGUE-1 v4.6 Target Selection: <i>seglowlat</i> and <i>seglowlatf</i> programs</h3>

<table class="common" id="seguelowlat">
<caption>SEGUE 1 Target Selection Categories: <i>seglowlat</i></caption>
<tr><th>Category</th><th>Hex</th><th>Integer</th><th>Binary</th><th>Criteria                           </th><th>Per <br />
                                                                                                                    LoS</th><th>Total*</th></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#kg">Low latitude K giant</a>            	</td><td>0x80000400</td><td>   -2147482624</td><td>2<sup>10</sup>   </td><td>0.55 &lt; (g-r) &lt; 0.9 <br /> g &lt; 19 <br /> PM<sub>total</sub> &lt; 11 mas/yr                                         </td><td>300</td><td> 2699</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#llblue">Low latitude Blue Stellar Locus</a>     </td><td>0x80000800</td><td>   -2147481600</td><td>2<sup>11</sup>   </td><td>(g-r) &lt; 0.25                                                                                                            </td><td>800</td><td> 1940</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#llAGB">Low latitude AGB/M giants</a>            </td><td>0x88000000</td><td>   -2013265920</td><td>2<sup>27</sup>   </td><td><a href="dr10/algorithms/segue_target_selection.php#scolor">s-color</a> &gt; -0.13 <br />
                                                                                                                                                                                                     3.5 &gt; (u-g) &gt; 2.6 <br /> 0.8 &lt; (g-r) &lt;1.3                                                       </td><td> 50</td><td>  115</td></tr>
</table>
<p>*This is the number of unique SEGUE-1 observations of this type on
<i>seglowlat</i> plates. We use the bitmasks from the
DR9 segueTargetAll table. Individual stars can belong to multiple
categories. </p>

            <h3 id="seguecluster">SEGUE-1 v4.6 Target Selection: <i>segcluster</i>, <i>segclusterf</i></h3>

<p>A number of SEGUE plates (mostly in SEGUE-1, but also in SEGUE-2)
specifically targeted known globular or open clusters. Since these
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
cluster is <a href="dr10/algorithms/segue_plate_table.php#segcluster">here.</a></p>

<h3 id="seguepointed">SEGUE-1 v4.6 Target Selection: <i>segpointed</i> and <i>seguepointedf</i></h3>

<p>The <i>segpointed</i> and <i>segpointedf</i> programs focused on regions of the sky
with probably Milky Way substructure. Any spectroscopic fibers not devoted to the
substructure were assigned to targets using the selection criteria of <i>segue</i>
and <i>seguefaint</i>. Just like the <i>segcluster</i> plates, we caution that
these plates should not be used when composing a uniform SEGUE sample over
the sky. The list of plates targeted in this fashion is <a href="dr10/algorithms/segue_plate_table.php#segpointed">here.</a></p>

                     <h3 id="seguetest">SEGUE-1 v4.6 Target Selection: <i>segtest</i>,<i>segtestf</i></h3>

<p>These plates were done to test the S/N and other constraints for the
SEGUE target selection algorithm. While the spectra from these plates
are fine, these targets should not be included in larger SEGUE samples.
The list of plates targeted in this fashion is <a href="dr10/algorithms/segue_plate_table.php#segtest">here.</a></p>



<hr />


<h2 id="SEGUEts2">SEGUE-2 Target Selection</h2>

<p>The SEGUE-2 survey consisted only of the <i>segue2</i>
program. This focused on different target categories than the various
programs in SEGUE-1. In contrast to SEGUE-1 stars, the parameter
<i>segue2_target1</i> in sppParams and SpecObjAll identifies all of the
different stellar categories each star fulfills at the time of target selection (e.g.,
using DR7 photometry). It
does not exclusively reflect why a star received a fiber.
segueTargetAll.<i>segue2_target1</i> lists all of the different
SEGUE-2 categories each photometric target (g &lt; 21 or z &lt; 21)
fulfills in DR9 data, regardless of whether it was observed spectroscopically or
as part of SEGUE-1. SEGUE-2 plates are listed <a
href="dr10/algorithms/segue_plate_table.php#segue2">here.</a></p>

<h3>SEGUE-2 Target Selection</h3>

<table class="common" id="S2_table">
<caption>Hex and Decimal values for segue2_target1 bitmaps</caption>
<tr><th>Category</th><th>Hex</th><th>Integer</th><th>Binary</th><th>Criteria</th><th>Per <br />
                                                                                      LoS</th><th>Total*</th></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#msto2">MS turnoff</a>                 </td><td>0x80000001 </td><td>-2147483647     </td><td>2<sup>0</sup>     </td><td>18 &lt; g &lt; 19.5 <br /> 0.1 &lt; (g-r) &lt; 0.48 <br /> psfmagerr(g,r,i) &lt; 0.05                                              </td><td>100       </td><td>35466</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#kg2">Red K giants</a>                 </td><td>0x80000002 </td><td>-2147483646     </td><td>2<sup>1</sup>     </td><td>15.5 &lt; g &lt; 18.5 <br /> r &gt; 15 <br /> psfmagerr(g,r,i) &lt; 0.05 <br />
                                                                                                                                                                                            <a href="dr10/algorithms/segue_target_selection.php#goodpm">good PM</a> <br />
                                                                                                                                                                                            0.8 &lt; (g-r) &lt; 1.3 <br /> (u-g) &gt; 0.84(g-r)+1.758 <br /> (u-g) &lt; 2.4(g-r)+0.73 <br />
                                                                                                                                                                                            PM<sub>total</sub> &lt; 11 mas/yr                                                                                                </td><td>&lt; 50   </td><td> 805</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#kg2">l-color K giants</a>             </td><td>0x80000004 </td><td>-2147483644 	</td><td>2<sup>2</sup> 	   </td><td>15.5 &lt; g &lt; 18.5 <br /> r &gt; 15 <br /> psfmagerr(g,r,i) &lt; 0.05 <br />
                                                                                                                                                                                            <a href="dr10/algorithms/segue_target_selection.php#goodpm">good PM</a> <br />
                                                                                                                                                                                            0.7 &lt; (u-g) &lt; 3 <br /> 0.5 &lt; (g-r) &lt; 0.8 <br /> l-color &gt; 0.09 <br />
                                                                                                                                                                                            0.1 &lt; (r-i) &lt; 0.6 <br /> PM<sub>total</sub> &lt; 11 mas/yr                                                                 </td><td>100       </td><td>16016</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#kg2">Proper motion only K giants</a>  </td><td>0x80000008 </td><td>-2147483640     </td><td>2<sup>3</sup>     </td><td>15.5 &lt; g &lt; 18.5 <br /> r &gt; 15 <br /> psfmagerr(g,r,i) &lt; 0.05 <br />
                                                                                                                                                                                            <a href="dr10/algorithms/segue_target_selection.php#goodpm">good PM</a> <br />
                                                                                                                                                                                            0.8 &lt; (u-g) &lt; 1.2 <br /> PM<sub>total</sub> &lt; 7 mas/yr <br /> (u-g) &gt; 2.375(g-r)-0.45 <br />
                                                                                                                                                                                            (u-g) &lt; 0.84(g-r)+1.758                                                                                                       </td><td>150       </td><td>14729</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#lowmet2">Low Metallicity</a>          </td><td>0x80000010 </td><td>-2147483632 	</td><td>2<sup>4</sup> 	   </td><td>0.3 &lt; (g-r) &lt; 0.8 <br /> 0.5 &lt; (u-g) &lt; 2.0 <br /> 15.5 &lt; g &lt; 18 <br /> r &gt; 15 <br />
                                                                                                                                                                                            psfmagerr(g,r,i) &lt; 0.05 <br /> psfmagerr(u) &lt; 0.2 <br />
                                                                                                                                    <a href="dr10/algorithms/segue_target_selection.php#lcolor2">l-color</a> &gt; 0.115 <br />
                                                                                                                                                                                            <a href="dr10/algorithms/segue_target_selection.php#goodpm">good PM</a>                                                   </td><td>100       </td><td>17020</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#hyperv2">Hypervelocity</a>                    </td><td>0x80000020 </td><td>-2147483616     </td><td>2<sup>5</sup>     </td><td> 17 &lt; g &lt; 20 <br /> PM<sub>total</sub> &gt; 8 mas/yr <br />
                                                                                                                                                                                             <a href="dr10/algorithms/segue_target_selection.php#goodpm">good PM</a> <br />
                                                                                                                                                                                             Box 1 criteria or Box 2 criteria                                                                                                </td><td> &lt;5    </td><td>  226</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#cool_eusd2">Cool Extreme and Ultra Subdwarfs** </a></td><td>0x80000040 </td><td>-2147483584 	</td><td>2<sup>6</sup> 	   </td><td> g &gt; 15.5 <br /> (g-r) &gt; 1.4 <br /> (r-i) &gt; 0.4 <br /> 15 &lt; r &lt; 20 <br />
                                                                                                                                                                                            (r-i) &lt; 3.0(g-r)-3.5 <br /> PM<sub>total</sub> &lt; 10 mas/yr <br /> H<sub>r</sub> &gt; 10.0+2.5(g-r) <br />
                                                                                                                                                                                            psfmagerr(r,i) &lt; 0.05 <br />
                                                                                                                                                                                            <a href="dr10/algorithms/segue_target_selection.php#goodpm">good PM</a>                                                   </td><td>50        </td><td> 7396</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#mg2">M giants</a>                     </td><td>0x80000080 </td><td>-2147483520 	</td><td>2<sup>7</sup> 	   </td><td>(g-r) &gt; 1.3 <br /> (u-g) &gt; 1.8+0.9(g-r) <br /> i &gt; 14.5 <br /> 15.5 &lt; g &lt; 19.25 <br />
                                                                                                                                                                                            PM<sub>total</sub> &lt; 11 mas/yr <br /> psfmagerr(g,r) &lt; 0.05 <br />
                                                                                                                                                                                            <a href="dr10/algorithms/segue_target_selection.php#goodpm">good PM</a>                                                   </td><td>&lt;50    </td><td>  344</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#hhv2">Halo high velocity</a>           </td><td>0x80000100 </td><td>-2147483392 	</td><td>2<sup>8</sup>     </td><td> 17 &lt; g &lt; 20 <br /> 0.1 &lt; (g-r) &lt; 0.48 <br />
                                                                                                                                                                                             <a href="dr10/algorithms/segue_target_selection.php#Vtan">V<sub>tan</sub></a> &gt; 300 km/s <br />
                                                                                                                                                                                             V<sub>tan</sub>/ <a href="dr10/algorithms/segue_target_selection.php#sigVtan">&sigma;(V<sub>tan</sub>)</a> &gt; 3.0      </td><td> &lt;5   </td><td> 3432</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#bhb2">Blue Horizontal Branch</a>      </td><td>0x80002000 </td><td>-2147475456 	</td><td>2<sup>13</sup>    </td><td>15.5 &lt; g &lt; 20.3 <br /> -0.5 &lt; (g-r) &lt; 0.1 <br /> 0.8 &lt; (u-g) &lt; 1.5                                             </td><td>&lt; 100  </td><td> 8602</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#ultracool2">Ultra-Cool CIA White Dwarfs</a></td><td>0x80020000 </td><td>-2147352576 	</td><td>2<sup>17</sup>    </td><td>15.5 &lt; r &lt; 20.5 <br /> g &gt; 15.5 <br /> -2.0 &lt; (g-i) &gt; 1.7 <br />
                                                                                                                                                                                            <a href="dr10/algorithms/segue_target_selection.php#goodpm">good PM</a> <br />
                                                                                                                                                                                            <a href="dr10/algorithms/segue_target_selection.php#Hg2">H<sub>g</sub></a> &gt; 17.5 <br />
                                                                                                                                                                                            <a href="dr10/algorithms/segue_target_selection.php#Hg2">H<sub>g</sub></a> &gt; 16.05+2.9(g-i)                            </td><td>&lt; 10   </td><td>107</td></tr>
 </table>
<p>*This is the number of unique SEGUE-2 observations of this type on
<i>segue2</i> plates. We use the bitmasks from the
DR9 segueTargetAll table. Individual stars can belong to multiple
categories. </p>
<p>**The magnitudes used for cool extreme and ultra subdwarfs are uncorrected for extinction (i.e., reddened). </p>

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

<h3 id="Legacy">SDSS Stellar Targeting - Legacy</h3>

<p>Approximately 200,000 stars were spectroscopically observed as part of the
SDSS and SDSS-II Legacy program. These targets are briefly described in
<a href="http://adsabs.harvard.edu/abs/2009AJ....137.4377Y">Yanny et al. 2009</a>,and
the target categories are explained in <a href="http://adsabs.harvard.edu/abs/2002AJ....123..485S">Stoughton et al. 2002</a>
There is a brief description of the overall Legacy target selection algorithm
<a href="dr10/algorithms/legacy_target_selection.php">here</a>. </p>

<p> The table below lists the possible <i>legacy1_target1</i> (located in the sppParams and SpecObjAll
tables) bit settings available on each spectrum if this object was a Legacy target.
Unlike SEGUE-1 and SEGUE-2, every target in the Legacy component is identified by the
target type criteria it fulfills, rather than why it was assigned a fiber. </p>

<table class="common" id="S3_table">
<caption>SDSS Stellar Targeting Selection Categories</caption>
<tr><th>Category</th><th>Hex</th><th>Integer</th><th>Binary</th><th>Color, Mag Cuts</th><th>Total Fibers</th></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#rosatc">ROSAT C  </a>                  </td><td> 0x00000800</td><td>2048     </td><td>2<sup>11</sup></td><td>r &lt; 16.5 <br />  ROSAT X-ray source within 60'' <br />
                                                                                                                                                                                (u-g) &lt; 1.1 <br />                                                                                            </td><td> 8000</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#leg_bhb">BHB Star   </a>               </td><td> 0x00002000</td><td>8192     </td><td>2<sup>13</sup></td><td>-0.4 &lt; (g-r) &lt; 0 <br /> 0.8 &lt; (u-g) &lt; 1.8                                                            </td><td>19887</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#carbon">Carbon Star  </a>              </td><td> 0x00004000</td><td>16384    </td><td>2<sup>14</sup></td><td>(g-r) &gt; 0.85 <br /> (r-i) &gt; 0.05 <br /> (i-z) &gt; 0 <br /> (r-i) &lt; -0.4+0.65(g-r) <br /> (g-r) &gt; 1.75     </td><td> 4453</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#browndwarf">Brown Dwarf </a>           </td><td> 0x00008000</td><td>32768    </td><td>2<sup>15</sup></td><td>z &lt; 19 <br /> psfmagerr(i) &lt; 0.3 <br /> (r-i) &gt; 1.8 <br /> (i-z) &gt; 1.8                                   </td><td>  667</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#leg_subdwarf">Subdwarf  </a>           </td><td> 0x00010000</td><td>65536    </td><td>2<sup>16</sup></td><td>(g-r) &gt; 1.6 <br /> 0.95 &lt; (r-i) &lt; 1.6 <br /> psfmagerr(g) &lt; 0.1                                        </td><td> 1482</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#cv">Cataclysmic Variable*</a>           </td><td> 0x00020000</td><td>131072   </td><td>2<sup>17</sup></td><td>g &lt; 19.5 <br /> (u-g) &lt; 0.45 <br /> (g-r) &lt; 0.7 <br /> (r-i) &gt; 0.3 <br /> (i-z) &gt; 0.4 <br />
                                                                                                                                                                                (u-g)-1.314(g-r) &lt; 0.61 <br /> (r-i) &gt; 0.91 <br /> (i-z) &gt; 0.49                                           </td><td> 8959</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#reddwarf">Red Dwarf  </a>              </td><td> 0x00040000</td><td>262144   </td><td>2<sup>18</sup></td><td>i &lt; 19.5 <br /> psfmagerr(i) &lt; 0.2 <br /> (r-i) &gt; 1.0 <br /> (r-i) &gt; 1.8                                 </td><td>14649</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#whitedwarf">White Dwarf   </a>         </td><td> 0x00080000</td><td>524288   </td><td>2<sup>19</sup></td><td>(g-r) &lt; -0.15 <br /> (u-g)+2(g-r) &lt; 0 <br /> (r-i) &lt; 0 <br />
                                                                                                                                                                                H<sub>g</sub> &gt; 19 <br /> H<sub>g</sub> &gt; 16.136 + 2.727(g-i) <br />
                                                                                                                                                        (g-i) &gt; 0                                                                                                   </td><td> 6059</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#serenblue">Serendipity Blue </a>         </td><td> 0x00100000</td><td>1048576  </td><td>2<sup>20</sup></td><td>(u-g) &lt; 0.8 <br /> (g-r) &lt; -0.05                                                                           </td><td>81937</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#serenfirst">Serendipity FIRST </a>         </td><td> 0x00200000</td><td>2097152  </td><td>2<sup>21</sup></td><td>FIRST radio source within 1.5''                                                                                </td><td>14689</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#serenred">Serendipity Red*   </a>          </td><td> 0x00400000</td><td>4194304  </td><td>2<sup>22</sup></td><td>(r-i) &gt; 2.7 <br /> (i-z) &gt; 1.6                                                                             </td><td> 4179</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#serendistant">Serendipity Distant*</a>     </td><td> 0x00800000</td><td>8388608  </td><td>2<sup>23</sup></td><td>(g-r) &gt; 2 <br /> (r-i) &lt; 0                                                                                 </td><td>11820</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#rosate">ROSAT E  </a>                  </td><td> 0x08000000</td><td>134217728</td><td>2<sup>27</sup></td><td>ROSAT source within 60''                                                                                       </td><td> 8000</td></tr>
<tr><td><a href="dr10/algorithms/segue_target_selection_details.php#pnstar">PN Star </a>                   </td><td> 0x10000000</td><td>268435456</td><td>2<sup>28</sup></td><td>(g-r) &gt; 0.4 <br /> (r-i) &lt; -0.6 <br /> (i-z) &gt; -0.2 <br /> 16 &lt; r &lt; 20.5                              </td><td>   20</td></tr>
</table>
<p>*The magnitudes for these targets are not dereddened.</p>

<hr />

<h2 id="Calib">Calibration Fibers in SEGUE</h2>

<p>A number of stellar targets are assigned fibers for calibration purposes. This
is indicated in the parameter <a href="dr10/algorithms/bitmask_segue1_target2.php"><i>segue1_target2</i></a> in the SpecObjAll and sppParams tables for
SEGUE-1 targets and in <a href="dr10/algorithms/bitmask_segue2_target2.php"><i>segue2_target2</i></a> for SEGUE-2.</p>

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
<caption>Hex and Integer values for segue2_target2 bitmasks</caption>
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

<p>*QA duplicate observations are no longer marked in <i>segue1_target2</i> bitmasks. These are only
marked in <i>sourcetype</i> in SpecObjAll. </p>

<p>The bitmask assignments for <i>legacy_target2</i> are listed below: </p>

<table class="common">
<caption>Hex and Integer values for legacy_target2 bitmasks</caption>
<tr><th>Category</th><th>Hex</th><th>Integer</th><th>Binary</th></tr>
<tr><td> Light Trap                  </td><td>0x80000001</td><td>-2147483647 </td><td> 2<sup>0</sup> </td></tr>
<tr><td> <a href="dr10/algorithms/segue_target_selection_details.php#redstd">Reddening Standard</a>      </td><td>0x80000002</td><td>-2147483646 </td><td> 2<sup>1</sup>  </td></tr>
<tr><td> Test                        </td><td>0x80000004</td><td>-2147483644 </td><td> 2<sup>2</sup>  </td></tr>
<tr><td> QA Duplicate Observation*   </td><td>0x80000008</td><td>-2147483640 </td><td> 2<sup>3</sup>  </td></tr>
<tr><td> Sky	                     </td><td>0x80000010</td><td>-2147483632 </td><td> 2<sup>4</sup>  </td></tr>
<tr><td> <a href="dr10/algorithms/segue_target_selection_details.php#spstd">Spectrophotometric Standard</a></td><td>0x80000020</td><td>-2147483616 </td><td> 2<sup>5</sup>  </td></tr>
<tr><td> Guide Star                  </td><td>0x80000040</td><td>-2147483584 </td><td> 2<sup>6</sup>  </td></tr>
<tr><td> Bundle Hole                 </td><td>0x80000080</td><td>-2147483520 </td><td> 2<sup>7</sup>  </td></tr>
<tr><td> Quality Hole                </td><td>0x80000100</td><td>-2147483392 </td><td> 2<sup>8</sup>  </td></tr>
<tr><td> <a href="dr10/algorithms/segue_target_selection_details.php#hotstd">Hot Standard</a>	             </td><td>0x80000200</td><td>-2147483136 </td><td> 2<sup>9</sup>  </td></tr>
<tr><td> Southern Survey Target      </td><td>0x80000000</td><td>-2147483648 </td><td> 2<sup>31</sup> </td></tr>
</table>

<?php echo foot(); ?>
