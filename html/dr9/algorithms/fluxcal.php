<?php include '../../header.php'; echo head('Flux Calibration'); ?>

<p>Jump to:</p>

<ul>
<li><a href="dr9/algorithms/fluxcal.php#intro">Introduction</a></li>
<li><a href="dr9/algorithms/fluxcal.php#counts2mag">Calibration Parameters</a></li>
<li><a href="dr9/algorithms/fluxcal.php#calib_status">Photometric Calibration Flags</a></li>
<li><a href="dr9/algorithms/fluxcal.php#SDSStoAB">SDSS Mags to AB Mags</a></li>
<li><a href="dr9/algorithms/fluxcal.php#SDSStoflux">SDSS Mags to fluxes</a></li>
<li><a href="dr9/algorithms/fluxcal.php#assessment">QA Figures</a></li>
</ul>

<h3 id="intro">Introduction</h3>

<p>The objective of the photometric calibration process is to tie the
SDSS imaging data to an AB magnitude system, and specifically to the
"natural system" of the 2.5m telescope defined by the photon-weighted
effective wavelengths of each combination of SDSS filter, CCD
response, telescope transmission, and atmospheric transmission at a
reference airmass of 1.3 as measured at APO (see <a
href="instruments/camera.php#Filters">transmission curves for
SDSS 2.5m telescope</a>).</p>

<p>Unlike DR6 and earlier data releases, which used a multi-stage process to calibrate the imaging data, the
calibrations for SDSS-III involve two steps - determining the relative photometry over the entire survey
using the ubercal algorithm, and fixing the zero points in each filter to match the DR6 photometry.
Note that unlike DR7 which released both the ubercal and "Photometric Telescope (PT)" (pre-DR7) photometry,
we are only releasing ubercalibrated photometry in DR8 (observations with the photometric telescope
were discontinued in SDSS-III).</p>

<p>Ubercal is an algorithm to photometrically calibrate wide field
optical imaging surveys, that simultaneously solves for the
calibration parameters and relative stellar fluxes using overlapping
observations. The algorithm decouples the problem of <em>relative</em>
calibrations from that of <em>absolute</em> calibrations; the
absolute calibration is reduced to determining a few numbers for the
entire survey. We pay special attention to the spatial structure of
the calibration errors, allowing one to isolate particular error modes
in downstream analyses. Applying this to the Sloan Digital Sky Survey
imaging data, we achieve ~1% relative calibration errors across 8500
sq. deg. in griz; the errors are ~2% for the u band. These errors are
dominated by unmodeled atmospheric variations at Apache Point
Observatory. For a detailed description of ubercal, please see <a
href="http://adsabs.harvard.edu/abs/2008ApJ...674.1217P">the Ubercal
paper (Padmanabhan <i>et al.</i>, 2008, ApJ, 674, 1217)</a>.</p>

<p>The ubercal algorithm determines the relative photometry in each of the SDSS
filters independently. We determine the five zeropoints by forcing the stellar
aperture magnitudes of these data to agree on average with those in DR6. Comparisons
between ubercalibrated and PT-calibrated magnitudes can be found in the ubercal
paper.</p>

<p>We note that the ubercal algorithm is an intrinsically global algorithm. We therefore expect there
to be differences between the calibrations presented in DR7, and those in this data release (due
to the additional imaging data).</p>

<p><a href="dr9/algorithms/fluxcal.php#Top">[Back to top]</a></p>

<h3 id="counts2mag">Calibration Parameters</h3>

<p>The key parameter of the calibration for users is the conversion
from counts (more precisely, ADU) into nanomaggies. We express this
conversion factor as a single number per object per band,
<code>NMGYPERCOUNT</code>. However, naturally this parameter is
derived from the current atmospheric extinction, airmass, and
flat-field values based on the parameters of a full photometric
calibration solution for each run.</p>

<p>To perform this solution, the flux calibration assumes that the
calibrated magnitude of an object <i>m</i> is related to its
instrumental magnitude <i>m0</i> by:</p>

<p><i> m = m0 + a - k(t)*x + f(i)</i></p>

<p>where <i>a</i> (the a-term) is a zero point, <i>k</i> (the k-term) describes the atmospheric
extinction as a function of airmass <i>x</i>, and <i>f</i> is the flat field as a function of CCD column <i>i</i> (note that the
SDSS flat fields are 1 dimensional, due to drift scanning). The a-terms are defined per camera column per night per filter.
The k-terms are defined per night per filter, with a fixed linear time dependence (see the ubercal paper for details), </p>

<p><i> k(t) = k + (dk/dt)(t-tref)</i> </p>

<p>where the reference time is assumed to be 0700 UT, and the time dependence of the k-terms (<i>dk/dt</i>) is fixed to the values below.
The flat fields are defined per "season", defined below. </p>

<table class="common">
<tr> <th>Filter</th> <th> dk/dt (mag/airmass/10hr) </th></tr>
<tr> <td> u </td> <td> -0.012 </td> </tr>
<tr> <td> g </td> <td> -0.007 </td> </tr>
<tr> <td> r </td> <td> -0.010 </td> </tr>
<tr> <td> i </td> <td> -0.012 </td> </tr>
<tr> <td> z </td> <td> -0.022 </td> </tr>
</table>

<table class="common">
<tr>
<th>Flat field Season</th>
<th>Starting Run</th>
<th>Starting MJD</th>
<th>Comments</th>
</tr>
<tr><td>  1</td><td>    1</td><td> 51075  </td><td> 19-Sep-1998                                         </td> </tr>
<tr><td>  2</td><td>  205</td><td> 51115  </td><td> 28-Oct-1998                                         </td> </tr>
<tr><td>  3</td><td>  725</td><td> 51251  </td><td> 13-Mar-1999                                         </td> </tr>
<tr><td>  4</td><td>  941</td><td> 51433  </td><td> 12-Sep-1999                                         </td> </tr>
<tr><td>  5</td><td> 1231</td><td> 51606  </td><td> 03-Mar-2000                                         </td> </tr>
<tr><td>  6</td><td> 1659</td><td> 51790  </td><td> 03-Sep-2000 (after i2 gain change)                  </td> </tr>
<tr><td>  7</td><td> 1869</td><td> 51865  </td><td> 17-Nov-2000 (vacuum leak in Dec 2000)               </td> </tr>
<tr><td>  8</td><td> 2121</td><td> 51960  </td><td> 20-Feb-2001 (after vacuum fixed)                    </td> </tr>
<tr><td>  9</td><td> 2166</td><td> 51980  </td><td> 12-Mar-2001 (Zeljko boundary)                       </td> </tr>
<tr><td> 10</td><td> 2504</td><td> 52144  </td><td> 23-Aug-2001 (after camera tear-down)                </td> </tr>
<tr><td> 11</td><td> 3311</td><td> 52516  </td><td> 30-Aug-2002 (after camera tear-down)                </td> </tr>
<tr><td> 12</td><td> 4069</td><td> 52872  </td><td> 20-Aug-2003 (after summer shut-down)                </td> </tr>
<tr><td> 13</td><td> 4792</td><td> 53243  </td><td> 26-Aug-2004 (after summer shut-down)                </td> </tr>
<tr><td> 14</td><td> 5528</td><td> 53609  </td><td> 26-Aug-2005 (after summer shut-down)                </td> </tr>
<tr><td> 15</td><td> 6245</td><td> 53959  </td><td> 11-Aug-2006 (after summer shut-down)                </td> </tr>
<tr><td> 16</td><td> 7642</td><td> 54701  </td><td> 23-Aug-2008 (SDSS-III, after summer shut-down)      </td> </tr>
<tr><td> 17</td><td> 8032</td><td> 55090  </td><td> 16-Sep-2009 (SDSS-III yr 2, after summer shut-down) </td> </tr>
</table>


<p><a href="dr9/algorithms/fluxcal.php#Top">[Back to top]</a></p>

<h3 id="calib_status">Photometric Calibration Flags</h3>

<p>The photometric calibration status flags are detailed <a href="dr9/algorithms/bitmask_calib_status.php">here</a>; we describe their recommended
usage here. Most users will want to restrict to <var>PHOTOMETRIC</var> data. If a user needs to use unphotometric data for some
reason, there are four flavors to be aware of. The first, and <i>best</i>, is <var>UNPHOT_OVERLAP</var> - in this case, the unphotometric
data overlaps photometric data, allowing a determination of the zero-point (a-term) on a field-by-field basis. For such data, the fluxes
of objects should be correct on average, although the data could have larger than normal scatter. The next two <var>UNPHOT_EXTRAP_CLEAR</var>
and <var>UNPHOT_EXTRAP_CLOUDY</var> are set when the data are assumed to be unphotometric and do not overlap any photometric data. In these cases,
the ubercal algorithm extrapolates the solution from a clear (<var>UNPHOT_EXTRAP_CLEAR</var>, if available) or cloudy (<var>UNPHOT_EXTRAP_CLOUDY</var>)
part of the night. Note that this is an extrapolation under unphotometric conditions, and there is no guarantee made
on the data quality. The final class is <var>UNPHOT_DISJOINT</var>; this is set if the data are both spatially and temporally disjoint from the
any survey data. In this case, <i>even</i> if the data may be photometric, the calibrations are set to an arbitrary default value
and could have significant errors. Users should <em>NOT</em> treat these data as being calibrated.</p>

<p><a href="dr9/algorithms/fluxcal.php#Top">[Back to top]</a></p>


<h3 id="SDSStoAB">Conversion from SDSS <var>ugriz</var> magnitudes to AB
<var>ugriz</var> magnitudes</h3>

<p>The SDSS photometry is intended to be on the AB system <a
href="http://adsabs.harvard.edu/abs/1983ApJ...266..713O">(Oke &amp;
Gunn 1983)</a>, by which a magnitude 0 object should have the same
counts as a source of F<sub>&nu;</sub> = 3631 Jy.  However, this is
known not to be exactly true, such that the photometric zeropoints are
slightly off the AB standard.  We continue to work to pin down these
shifts.  Our present estimate, based on comparison to the STIS
standards of <a
href="http://adsabs.harvard.edu/abs/2001AJ....122.2118B">Bohlin,
Dickinson, &amp; Calzetti (2001)</a> and confirmed by SDSS photometry
and spectroscopy of fainter hot white dwarfs, is that the <var>u</var>
band zeropoint is in error by 0.04 mag, <var>u</var><sub>AB</sub> =
<var>u</var><sub>SDSS</sub> - 0.04 mag, and that <var>g, r</var>, and
<var>i</var> are close to AB.  The <var>z</var> band zeropoint is not
as certain at this time, but there is mild evidence that it may be
shifted by about 0.02 mag in the sense <var>z</var><sub>AB</sub> =
<var>z</var><sub>SDSS</sub> + 0.02 mag.  </p>

<p>The large shift in the <var>u</var> band was expected because the
adopted magnitude of the SDSS standard BD+17 in <a
href="http://adsabs.harvard.edu/abs/1996AJ....111.1748F">Fukugita et
al. (1996)</a> was computed at zero airmass, thereby making the
assumed <var>u</var> response bluer than that of the USNO system
response.</p>

<p>These statements are certainly not precise to better than 0.01 mag;
in addition, they depend on the system response of the SDSS 2.5-meter,
which was measured by <a
href="http://adsabs.harvard.edu/abs/2010AJ....139.1628D"> Doi et
al. (2010)</a> and found to differ somewhat from the curves used to
estimate the offsets just mentioned, and to probably be a function of
time. They estimate the <i>u-g</i> change due to these differences to
be at the 0.01 to 0.02 mag level.</p>

<p> Note that our <i>relative</i> photometry across the sky is quite a
bit better than these numbers would imply; repeat observations and
simulations of the ubercal pipeline show that our calibrations are
about 1% in <var>gri</var> and about 2% in <var>u</var> and
<var>z</var>.</p>


<p><a href="dr9/algorithms/fluxcal.php#Top">[Back to top]</a></p>

<h3 id="SDSStoflux">Conversion from SDSS <var>ugriz</var>
magnitudes to physical fluxes</h3>

<p>As explained in the preceding section, the SDSS system is nearly an
AB system. Assuming you know the <a href="dr9/algorithms/fluxcal.php#SDSStoAB">correction from
SDSS zeropoints to AB zeropoints (see above)</a>, you can turn the AB
magnitudes into a flux density using the AB zeropoint flux
density. The AB system is defined such that every filter has a
zero-point flux density of 3631 Jy (1 Jy = 1 Jansky = 10<sup>-26</sup>
W Hz<sup>-1</sup> m<sup>-2</sup> = 10<sup>-23</sup> erg s<sup>-1</sup>

Hz<sup>-1</sup> cm<sup>-2</sup>).</p>

<p>To obtain a flux density from SDSS data, you need to work out
<code>f/f<sub>0</sub></code> (e.g. from the asinh magnitudes in the
<code>photoObj</code> files by using the inverse of the relations given
<a href="dr9/algorithms/magnitudes.php#asinh">on the magnitudes page</a>). This
number is then the also the object's flux density, expressed as
fraction of the AB zeropoint flux density. Therefore, the conversion
to flux density is</p>

<p>S = 3631 Jy *  f/f<sub>0</sub></p>


<p>Then you need to apply the correction for the zeropoint offset
between the SDSS system and the AB system. See the <a
href="dr9/algorithms/fluxcal.php#SDSStoAB">description of SDSS to AB conversion</a>
above.</p>


<p><a href="dr9/algorithms/fluxcal.php#Top">[Back to top]</a></p>


<h3 id="assessment">QA Figures</h3>

<p>The calibration algorithm produces a series of QA plots that are
used to validate the quality of the data. There are three pages
produced per run per filter; the full list of figures is <a
href="http://data.sdss3.org/sas/dr9/boss/calib/dr8_final/plots/">available
on SAS</a>, sorted by run and filter. An example (for Run 94 in the
<i>r</i> band is shown below.</p>

<p>The naming convention for the QA figures is as follows:</p>

<pre>
   calib-RRRRRR-F-type.png
</pre>

<p>where <code>RRRRRR</code> is the six-digit, zero-padded run number
(e.g. '000094'), <code>F</code> is the filter ( <code>u</code>,
<code>g</code>, <code>r</code>, <code>i</code>, or <code>z</code>),
and <code>type</code> is one of <code>run</code>, <code>flat</code> or
<code>hist</code>.</p>

<p>The <code>run</code> files summarize the photometric quality of all six camera columns combined as a function of field number (and
time along the run). The top panel shows the residuals from the mean magnitudes of stars using the best fit photometric parameters,
while the middle panel shows the same residuals with the mean trend
removed. Also plotted are the 25%, 50% and 75% contours.
 These two figures will be the same for photometric runs, but will
differ for unphotometric runs; the latter figure is a good indicator of the quality of <i>UNPHOT_OVERLAP</i> data. The bottom panel shows the
number of stars used for calibration and the best fit <i>k</i> term value. Grey hashed regions mark areas where the imaging reductions had issues,
while red hashed regions mark unphotometric fields.</p>

<p>The <code>flat</code> files shows the photometric residuals as a function of CCD column, for each of the camera columns, and tests the quality of the
flat fields. The contours are the same as above. </p>

<p>The <code>hist</code> files show histograms of the photometric residuals for each of the six camera columns individually.</p>

<table class="centerfigure">
<tr><td><a href="images/fluxcal_94_r1.png"><img src="images/fluxcal_94_r1_thumb.png" alt="fluxcal 1" /></a></td></tr>
<tr><td> An example page of QA figures for Run 94 in the <i>r</i> band. The figure shows the mean photometric residuals
as a function of field and time along the run, for the best fit photometric parameters (top panel) and correcting for overlap photometry (middle
panel), with the 25%, 50% and 75% contours plotted. The bottom panel shows the number of stars used by the calibration algorithm. </td></tr>
</table>

<table class="centerfigure">
<tr><td><a href="images/fluxcal_94_r2.png"><img src="images/fluxcal_94_r2_thumb.png" alt="fluxcal 2" /></a></td></tr>
<tr><td> A second example page of QA figures for Run 94 in the <i>r</i> band, plotting photometric residuals as a function of CCD column.</td></tr>
</table>

<table class="centerfigure">
<tr><td><a href="images/fluxcal_94_r3.png"><img src="images/fluxcal_94_r3_thumb.png" alt="fluxcal 3" /></a></td></tr>
<tr><td>A third example page of QA figures for Run 94 in the <i>r</i> band, plotting histograms of photometric residuals for
the six camera columns.</td></tr>
</table>

<p><a href="dr9/algorithms/fluxcal.php#Top">[Back to top]</a></p>

<?php echo foot(); ?>
