<?php include '../../header.php'; echo head('Astrometry'); ?>

<p>Jump to:</p>

<ul>
<li><a href="dr8/algorithms/astrometry.php#intro">Introduction</a></li>
<li><a
href="dr8/algorithms/astrometry.php#caveats">Important caveats on
calibration</a></li>
<li><a
href="dr8/algorithms/astrometry.php#dr9">DR9 astrometry
corrections</a></li>
<li><a href="dr8/algorithms/astrometry.php#propermotions">Proper
Motions</a></li>
<li><a href="dr8/algorithms/astrometry.php#errors">Calculating errors for indiv. objects</a></li>
<li><a href="dr8/algorithms/astrometry.php#eqn">Calibration equations</a></li>
<li><a href="dr8/algorithms/astrometry.php#gcToEq">Transformation from Great Circle Coordinates to J2000 Celestial Coordinates</a></li>
<li><a href="dr8/algorithms/astrometry.php#astromqa">QA files</a></li>
</ul>

<h2 id="intro">Introduction</h2>

<p>A detailed description of the astrometric calibration is given in
<a href="http://adsabs.harvard.edu/abs/2003AJ....125.1559P">Pier et
al. (2003)</a>.  Portions of that discussion are summarized here.</p>

<p><b>Note that the default astrometry in DR8 has substantial errors,
particular northward of around 41 deg in declination. Please see the
description of the <a
href="dr8/algorithms/astrometry.php#caveats">astrometry caveats</a>
below. We have fixed the astrometry for DR9 and the <a
href="dr8/algorithms/astrometry.php#dr9">DR9 version of the
astrometry</a> is available through DR8 now.</b></p>

<p>The <var>r</var> photometric CCDs serve as the astrometric
reference CCDs for the SDSS.  That is, the positions for SDSS objects
are based on the <var>r</var> centroids and calibrations.  The
<var>r</var> CCDs are calibrated by matching up bright stars detected
by SDSS with existing astrometric reference catalogs.  One of two
reduction strategies is employed, depending on the coverage of the
astrometric catalogs:</p>

<ol>

<li> Whenever possible, stars detected on the <var>r</var> CCDs are
     matched directly with stars in the <a
     href="http://www.usno.navy.mil/USNO/astrometry/optical-IR-prod/ucac">United
     States Naval Observatory CCD Astrograph Catalog</a> (UCAC2, <a
     href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2000AJ....120.2131Z">Zacharias
     et al. 2000</a>), an (eventually) all-sky astrometric catalog
     with a precision of 70 mas at its catalog limit of <var>r</var>=
     16, and systematic errors of less than 30 mas.  There are
     approximately 2 - 3 magnitudes of overlap between UCAC and
     unsaturated stars on the <var>r</var> CCDs.  The astrometric CCDs
     are not used.  </li>

<li> If a scan was not covered by UCAC2, then in DR8 it was
     calibrated against the <a
     href="http://tdc-www.harvard.edu/catalogs/ub1.html">USNO-B
     catalog</a>. This occurs northward of about 41 deg in
     declination. This choice introduced a large systematic shift in
     the declination direction (about 200 mas). See <a
     href="dr8/algorithms/astrometry.php#caveats">the caveats below</a> for details. </li>

</ol>

<p>The <var>r</var> CCDs are therefore calibrated directly against the
primary astrometric reference catalog.  FRAMES uses the astrometric
calibrations to match up detections of the same object observed in the
other four filters.  The accuracy of the relative astrometry between
filters can thus significantly impact FRAMES, in particular the
deblending of overlapping objects, photometry based on the same
aperture in different filters, and detection of moving objects.  To
minimize the errors in the relative astrometry between filters, the
<var>u</var>, <var>g</var>, <var>i</var>, and <var>z</var> CCDs are
calibrated against the <var>r</var> CCDs.  Each drift scan is
processed separately.  All six camera columns are processed in a
single reduction.  In brief, stars detected on the <var>r</var> CCDs ,
are matched to catalog stars.  Transformations from <var>r</var> pixel
coordinates to catalog mean place (CMP) celestial coordinates are
derived using a running-means least-squares fit to a focal plane
model, using all six <var>r</var> CCDs together to solve for both the
telescope tracking and the <var>r</var> CCDs' focal plane offsets,
rotations, and scales, combined with smoothing spline fits to the
intermediate residuals.  These transformations, comprising the
calibrations for the <var>r</var> CCDs, are then applied to the stars
detected on the <var>r</var> CCDs, converting them to CMP coordinates
and creating a catalog of secondary astrometric standards.  Stars
detected on the <var>u</var>, <var>g</var>, <var>i</var>, and
<var>z</var> CCDs are then matched to this secondary catalog, and a
similar fitting procedure (each CCD is fitted separately) is used to
derive transformations from the pixel coordinates for the other
photometric CCDs to CMP celestial coordinates, comprising the
calibrations for the <var>u</var>, <var>g</var>, <var>i</var>, and
<var>z</var> CCDs.</p>

<p>Note: At the edges of pixels, the quantities <em>objc_rowc</em> and
<em>objc_colc</em> take integer values, contrary to standard
practice.</p>

<p><a href="dr8/algorithms/astrometry.php#Top">[Back to top]</a></p>

<h2 id="caveats">Important caveats on DR8 calibration</h2>

<p>The DR8 astrometric calibrations are substantially degraded
relative to the DR7 astrometric calibrations, particularly at
declinations northward of about 41 deg. These errors have a much
smaller, but non-zero, effect on the DR8 proper motions. We have
completed and made available ahead of schedule in DR8 the <a
href="dr8/algorithms/astrometry.php#dr9">DR9 version of the
astrometry</a>.</p>

<p> DR7 (but not DR8) was recalibrated astrometrically against the
second data release of UCAC (UCAC2; Zacharias et al. 2004) plus a
supplemental set of UCAC results covering the Northern Celestial Pole
at declinations northward of about 41 deg (an internal USNO product
known as "r14").  While the systematic errors for UCAC2 are not yet
well characterized, they are thought to be less than 20 mas
(N. Zacharias, private communication).  UCAC2 also includes proper
motions for stars with &delta; &lt; +41&ordm;.  For stars at higher
declination, proper motions from the SDSS+USNO-B catalog (Munn et
al. 2004) were merged with the UCAC2 positions.  With these
improvements, DR7 astrometry has statistical errors per coordinate for
bright stars of approximately 45 mas, with systematic errors of less
than 20 mas. </p>

<p>Unfortunately, in DR8 these improvements were not properly
incorporated. In particular:</p>

<ul>
<li>Northward of a declination of about 41 deg, we did not calibrate
to the UCAC r14 catalog, but instead to the USNO-B catalog.  There is
a substantial shift between the UCAC and USNO-B systems, of about 250
mas in the declination direction. The UCAC system is in much better
agreement with the Tycho-2 system.  </li>
<li>Color terms were not included in the transformation from
position on the detector to right ascension and declination. This
causes 10 to 20 mas systematic errors with color in catalog positions.
Systematic errors of similar size are introduced in the measure of
position offsets between filters; the errors are somewhat smaller in i
and z, and somewhat larger in u and g.</li>
<li>The UCAC2 proper motions in right ascension were
incorrectly applied, introducing systemic errors in right ascension of
5 to 10 mas.  For declinations above 41 deg, the SDSS+USNO-B proper
motions were not applied at all, introducing systematic errors in both
right ascension and declination of typically 20 to 40 mas, and as high
as 60 mas.</li>
<li> Previous SDSS data releases based the catalog right ascension and
declination values on the catalog <code>objc_rowc</code> and
<code>objc_colc</code> frame coordinates.  These coordinates use the
r-band centroid for unsaturated stars brighter than <var>r=22.5</var>,
but for stars that are saturated in the <var>r</var> filter but
unsaturated in another filter, or fainter than 22.5 in <var>r</var>
but better exposed in another filter, uses the centroid from an
optimal filter.  For DR8, the right ascension and declination values
use the <var>r</var>-band centroid for all stars.  This increases the
statistical error for some stars fainter than <var>r=22.5</var> over
that in earlier data releases.  For stars saturated in <var>r</var>
but unsaturated in other filters, it can introduce systematic errors
of up to 100 mas compared to previous data releases.</li>
</ul>

<p>We have performed a detailed comparison of the large-scale
astrometry errors relative to the UCAC2 and r14 catalogs. In the
regions not covered by UCAC2 (starting above around 41 deg
declination) the DR8 astrometry is offset 240 mas to the North and 50
mas to the West relative to the r14 catalog.  On scales of about 0.25
deg, the scatter around this offset is about 80 mas in the declination
direction and 94 mas in the right ascension direction. Some of that
scatter is coherent on larger scales; if we unsharp mask by
subtracting off the residual field smoothed with a Gaussian (FWHM = 3
deg), the remaining scatter is about 60 mas in either direction.  A
similar analysis in the regions covered by UCAC2 finds very small
offsets (less than 10 mas), with the expected level of scatter (40
mas), and with no large-scale coherence to the scatter.</p>

<p>The figure below shows the DR8 astrometry and proper motions versus
the DR7 versions as a function of position on the sky (DR8 minus
DR7). The difference between the region covered by UCAC2 and the
regions northward of 41 deg or so is clear: the DR8 astrometry is
systematically 250 mas northward of the DR7 astrometry. There are also
a few areas of extreme outliers between DR7 and DR8 in that region,
which turn out to be catastrophic errors in the DR7 astrometry (in
certain areas of runs 3358, 4829, 5960, 6074, and 6162).</p>

<table class='noborder'>
<thead>
<tr>
<td></td>
<td><b>RA offsets</b></td>
<td><b>Dec offsets</b></td>
</tr>
</thead>
<tbody>
<tr>
<td><b>Position</b></td>
<td><a href="images/astromQAImage-DR7-dra-1500-750.png"><img
src="images/astromQAImage-DR7-dra-1500-750.thumb.png" alt="DR7/DR8 RA
offsets" style="width:310px"/></a></td>
<td><a href="images/astromQAImage-DR7-ddec-1500-750.png"><img
src="images/astromQAImage-DR7-ddec-1500-750.thumb.png" alt="DR7/DR8
Dec offsets" style="width:310px"/></a></td>
</tr>
<tr>
<td><b>Proper Motions</b></td>
<td><a href="images/astromQAImage-DR7-dpmra-1500-750.png"><img
src="images/astromQAImage-DR7-dpmra-1500-750.thumb.png" alt="DR7/DR8 RA
proper motion offsets" style="width:310px"/></a></td>
<td><a href="images/astromQAImage-DR7-dpmdec-1500-750.png"><img
src="images/astromQAImage-DR7-dpmdec-1500-750.thumb.png" alt="DR7/DR8
Dec proper motion offsets" style="width:310px"/></a></td>
</tr>
</tbody>
</table>

<p>Southward of 41 deg in declination, the systematic errors
introduced in DR8 are typically smaller than or comparable to the 45
mas systematic errors that characterize the SDSS astrometry for
brighter stars.  Given these problems (which we plan to fix in a
future data release), we recommend that users interested in precise
astrometry, especially statistical studies of star positions at the
less than 0.1 arcsec level, use the DR7 results.  For many
applications, however, the quoted positions should be acceptable.</p>

<p> Note in particular that the <a
href="dr8/algorithms/astrometry.php#propermotions">proper motions</a>
tabulated in the CAS are only mildly affected by these problems.  The
primary effects on the proper motions are to introduce an additional
systematic error with color of order 0.5 mas/yr, and to introduce an
additional source of error for stars with declinations above 41 deg,
of order 1 mas/yr.</p>

<h2 id="dr9">DR9 improvements now available</h2>

<p>For DR9, we have rerun the astrometry for the full imaging data
set, fixing the errors described above. These new data are available
within DR8 in the special CAS tables: <code>astromDR9</code> and
<code>properMotionsDR9</code>. These tables can be joined with
<code>photoObj</code> using <code>objID</code> to recover more correct
astrometry and proper motions for DR8 objects. </p>

<p>To use the DR9 proper motions, simply replace
<code>properMotions</code> in your SQL query with
<code>properMotionsDR9</code>. For example, you can try that using the
<a
href="http://skyserver.sdss3.org/dr8/en/help/docs/realquery.asp#pm">proper
motions sample query</a>.  </p>

<p>To use the DR9 astrometry, you must use an SQL join to obtain the
better astrometry.  For example, the <a
href="http://skyserver.sdss3.org/dr8/en/help/docs/realquery.asp#clean">
clean photometry</a> sample query could be altered to:</p>
<pre>
SELECT top 10 PhotoObj.objID, PhotoObj.ra as ra_dr8, PhotoObj.dec as dec_dr8, g, clean, astromDR9.ra, astromDR9.dec
FROM PhotoObj
JOIN astromDR9 ON astromDR9.objID = PhotoObj.objID
WHERE CLEAN=1
</pre>

<p>In order to obtain the DR9 astrometry, we have applied the
following corrections:</p>

<ul>
<li> We used the UCAC2 and UCAC r14 catalogs across the entire
survey, removing the systematic shift at northern declinations. </li>
<li> We included color terms in the same manner as included in
DR7.</li>
<li> We corrected the application of proper motions to the UCAC stars
used for astrometric calibration. Note that although we have new
proper motions available for most of those using SDSS itself, we
retained the UCAC proper motions for consistency. The UCAC astrometry
was taken around the year 2000; for images taken late in the SDSS
survey (up through 2009), this difference yields about 20 to 30 mas
difference in the overall calibration.</li>
<li> We used <code>objc_rowc</code> and <code>objc_colc</code> for the
astrometry.</li>
</ul>

<p>The resulting residuals relative to DR7 are shown below.  There are
several catastrophic outliers, in the runs 3358, 4829, 5960, 6074, and
6162, which are errors in DR7. </p>

<table class='noborder'>
<thead>
<tr>
<td></td>
<td><b>RA offsets</b></td>
<td><b>Dec offsets</b></td>
</tr>
</thead>
<tbody>
<tr>
<td><b>Position (DR9)</b></td>
<td><a href="images/astromDR9QAImage-DR7-dra-1500-750.png"><img
src="images/astromDR9QAImage-DR7-dra-1500-750.thumb.png" alt="DR7/DR9 RA
offsets" style="width:310px"/></a></td>
<td><a href="images/astromDR9QAImage-DR7-ddec-1500-750.png"><img
src="images/astromDR9QAImage-DR7-ddec-1500-750.thumb.png" alt="DR7/DR9
Dec offsets" style="width:310px"/></a></td>
</tr>
<tr>
<td><b>Proper Motions (DR9)</b></td>
<td><a href="images/astromDR9QAImage-DR7-dpmra-1500-750.png"><img
src="images/astromDR9QAImage-DR7-dpmra-1500-750.thumb.png" alt="DR7/DR8 RA
proper motion offsets" style="width:310px"/></a></td>
<td><a href="images/astromDR9QAImage-DR7-dpmdec-1500-750.png"><img
src="images/astromDR9QAImage-DR7-dpmdec-1500-750.thumb.png" alt="DR7/DR8
Dec proper motion offsets" style="width:310px"/></a></td>
</tr>
</tbody>
</table>

<p>In addition, there are remaining proper motion discrepancies at low
Galactic latitude (the "SEGUE stripes"), particularly in the
declination direction. These errors are due to DR7 photometric catalog
errors that cause a number of stars to be misclassified as galaxies in
the reductions for these runs (in rerun 648); since galaxies are used
as the reference for the proper motion calculation, this error has the
effect of making the stars appear to have slower proper motions than
they actually do. </p>

<p>The DR9 values can be shown to be correct by comparing to
photometric UV-excess quasar samples, which should return zero.  Using
the low-redshift (z &lt; 2) quasars from <a
href="http://adsabs.harvard.edu/abs/2011ApJ...729..141B">Bovy et
al. (2011)</a>, we find proper motions as a function of position to be
nearly zero across the sky (see below).  There is some declination
proper motion detected at the 1-2 mas/yr level at low declinations,
similar to that reported by <a
href="http://adsabs.harvard.edu/abs/2010ApJ...716....1B">Bond et
al. (2010)</a> and likely due to color-dependent refraction offset
errors either in the USNO-B or SDSS data.</p>

<table class='noborder'>
<thead>
<tr>
<td></td>
<td><b>RA PM</b></td>
<td><b>Dec PM</b></td>
</tr>
</thead>
<tbody>
<tr>
<td><b>QSO Proper Motions (DR9)</b></td>
<td><a href="images/astromDR9QAImage-xdqso-dpmra-1500-750.png"><img
src="images/astromDR9QAImage-xdqso-dpmra-1500-750.thumb.png" alt="RA
proper motion offsets" style="width:310px"/></a></td>
<td><a href="images/astromDR9QAImage-xdqso-dpmdec-1500-750.png"><img
src="images/astromDR9QAImage-xdqso-dpmdec-1500-750.thumb.png" alt="Dec proper motion offsets" style="width:310px"/></a></td>
</tr>
</tbody>
</table>

<p> Finally, note that when changing the astrometry, a large number of
other photometric parameters change in principle (for example, sizes,
surface brightnesses and position angles). In practice, these changes
are very small, and for this reason the special DR9 tables included in
DR8 do not have new versions of these parameters.  The full DR9 data
set will have these parameters updated to be consistent with the new
astrometry.</p>

<h2 id="propermotions">Proper Motions</h2>

<p> The SAS and CAS include proper motions for objects derived by
combining SDSS astrometry with USNO-B positions, recalibrated against
SDSS (Munn et al. 2004).  These are given in the
<tt>ProperMotions</tt> table in the CAS, and in the <a
href="http://data.sdss3.org/sas/dr8/groups/boss/photoObj/external">external
catalogs directory</a> in SAS. </p>

<p>As <a href="dr8/algorithms/astrometry.php#caveats">noted above</a>,
the proper motions in DR8 are slightly degraded in quality relative to
DR7. However, improved DR9 proper motions are now available through
CAS in the <code>ProperMotionsDR9</code> table. As shown above, these
proper motions are superior to both those in DR7 and in DR8.</p>

<p><a href="dr8/algorithms/astrometry.php#Top">[Back to top]</a></p>

<h2 id="errors">Calculating Errors for Individual Objects</h2>
<p>
The calibrations are performed in great circle coordinates.
The estimated errors in the calibrations are given on a per-frame
basis.  The calibration errors in great circle longitude and latitude are
given by the attributes <em>muErr</em> and <em>nuErr</em>, respectively
(in arcseconds).  These are in the <em>photoField</em> files in the SAS.
 These should be added in quadrature with the
centroiding errors for individual objects to give the estimated total error
in the position of a given object.  The centroiding errors in great circle
longitude and latitude are given by the attributes <em>objc_rowcErr</em> and
<em>objc_colcErr</em>, respectively (in pixels; these should be multiplied by
the focal plane scale of 0.396 arcseconds/pixel to convert to arcseconds).
These attributes are in the <em>photoObj</em> files in the SAS.</p>

<p><a href="dr8/algorithms/astrometry.php#Top">[Back to top]</a></p>
<h2 id="eqn">Calibration Equations</h2>

<p>Astrometric calibrations are generated as a separate set of equations for
each frame, converting frame row (x), frame column (y), and
star color to catalog mean place great circle longitude (&mu;) and latitude (&nu;),
in degrees:</p>

<p>for color &lt; (color)<sub>0</sub>:</p>
<p>
x' = x + g<sub>0</sub> + g<sub>1</sub> y + g<sub>2</sub> y<sup>2</sup> + g<sub>3</sub> y<sup>3</sup> + p<sub>x</sub> color<br />
y' = y + h<sub>0</sub> + h<sub>1</sub> y + h<sub>2</sub> y<sup>2</sup> + h<sub>3</sub> y<sup>3</sup> + p<sub>y</sub> color
</p>
<p>for color &gt; (color)<sub>0</sub>:</p>
<p>
x' = x + g<sub>0</sub> + g<sub>1</sub> y + g<sub>2</sub> y<sup>2</sup> + g<sub>3</sub> y<sup>3</sup> + q<sub>x</sub><br />
y' = y + h<sub>0</sub> + h<sub>1</sub> y + h<sub>2</sub> y<sup>2</sup> + h<sub>3</sub> y<sup>3</sup> + q<sub>y</sub>
</p>
<p>
&mu; = a + b x' + c y'
&nu; = d + e x' + f y'
</p>

<p>However, note that in these equations, for DR8 we did not account
for the color term at all, which results in 10 to 20 mas systematic
errors. </p>

<p>
The transformation from (x, y) to (x', y') corrects for optical
distortions (which, in TDI mode, are a function of column
only) and differential chromatic refraction (DCR).  For u and
g frames, DCR is modeled as a linear function of color (u-g for u
frames, g-r for g frames) for blue stars
[(color)<sub>0</sub> = (u-g)<sub>0</sub> = 3.0 for u frames,
(color)<sub>0</sub> = (g-r)<sub>0</sub> = 1.5 for g frames],
and a constant for redder stars. For <var>r</var>, <var>i</var>, and z frames,
DCR is modeled as a linear function of color (r-i) for all stars
[(color)<sub>0</sub> = (r-i)<sub>0</sub> &gt;&gt; 1].
(The DCR corrections are mis-stated in Pier et al. [2003], where
[r-i]<sub>0</sub> appears in the equations rather than the correct
[color]<sub>0</sub>, and where the wrong value for
[color]<sub>0</sub> is given for u frames.)
The corrected frame coordinates (x', y') are then transformed to catalog mean
place great circle coordinates (&mu;, &nu;) using an affine
transformation.</p>

<p>The calibration coefficients may be found in the <code>photoField</code> files in
the DAS<!--  , and the "field????" object in the CAS -->, where the attribute names are
different than given in the transformation equations above;  (color)<sub>0</sub>
is called <em>riCut</em>;
g<sub>0</sub>, g<sub>1</sub>, g<sub>2</sub>, and
g<sub>3</sub> are called <em>dRow0</em>, <em>dRow1</em>, <em>dRow2</em>,
and <em>dRow3</em>, respectively;
h<sub>0</sub>, h<sub>1</sub>, h<sub>2</sub>, and
h<sub>3</sub> are called <em>dCol0</em>, <em>dCol1</em>, <em>dCol2</em>,
and <em>dCol3</em>, respectively;
p<sub>x</sub> and p<sub>y</sub> are called <em>csRow</em> and <em>csCol</em>,
respectively; and
q<sub>x</sub> and q<sub>y</sub> are called <em>ccRow</em> and <em>ccCol</em>,
respectively.</p>

<p><a href="dr8/algorithms/astrometry.php#Top">[Back to top]</a></p>
<h2 id="gcToEq">Transformation from Great Circle Coordinates to J2000 Celestial Coordinates</h2>

<p>The calibration equations above yield catalog mean place in great circle
coordinates.  To convert these to J2000 celestial coordinates you need to know
the right ascension and inclination of the ascending node of the scan great
circle with respect to the J2000
celestial equator.  These are given as the header keywords "NODE" and "INCL",
respectively, in the "photoField" file.  The celestial coordinates are
then </p>
<p>
tan(&alpha;<sub>2000</sub> - &alpha;<sub>0</sub>) = [sin(&mu; - &alpha;<sub>0</sub>)cos &nu; cos <em>i</em> - sin &nu; sin <em>i</em>]/[cos(&mu; - &alpha;<sub>0</sub>)cos &nu;]<br />
sin &delta;<sub>2000</sub> = sin(&mu; - &alpha;<sub>0</sub>)cos &nu; sin <em>i</em> + sin &nu; cos <em>i</em>
</p>
<p>where <em>&mu;</em> and <em>&nu;</em> are great circle longitude and latitude,
<em>&alpha;<sub>0</sub></em> and <em>i</em> are the right ascension and
inclination of the ascending node of the great circle with respect to the J2000
celestial equator, and <em>&alpha;<sub>2000</sub></em> and
<em>&delta;<sub>2000</sub></em> are J2000 right ascension and declination. </p>


<h2 id="astromqa">Astrometry QA files</h2>

<p>We have implemented a new astrometry quality assurance system in
order to understand the errors in the SDSS imaging astrometry
better. The <a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/astromqa/">astromqa
data model</a> fully describes all of the files that are produced in
this process. Here we outline the major results and plots that are
produced, both the global plots and those appropriate for each
run.</p>

<p>The astrometric QA is defined with respect to a set of reference
catalogs:</p>

<ul>
<li>DR7 where available (including the proper motions)</li>
<li>2MASS</li>
<li>USNO-B</li>
<li>UCAC2 plus r14 (the latter an internal USNO product filling in
UCAC at declinations greater than 41 deg)</li>
<li>UCAC3</li>
</ul>

<p> The astrometry QA results are summarized in the following way:</p>

<ul>

<li>
<p>A description of the astrometric quality of each field is
produced, the <a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/astromqa/astromQAFields.html">astromQAFields</a>
file, which can be <a
href="http://data.sdss3.org/sas/dr8/groups/boss/photoObj/astromqa/astromQAFields.fits">downloaded
directly</a> (note, it is large at arouund 2.5 Gbytes). This file
contains for each field in DR8 an estimate of the DR8 position offset
relative to the set of reference catalogs
and an indication of whether the field is
catastrophically bad.</p>
</li>

<li>
<p>There is a <a
href="http://data.sdss3.org/sas/dr8/groups/boss/photoObj/astromqa/astromqa-1500-750.html">global
picture</a> of the offsets relative to the reference catalogs. The top
row of this table shows on the left the position offsets induced by
fact that DR8 ignored color terms when applying the photometry; on
this stretch these offsets do not appear large. On the right side of
the top row are the DR8 proper motions as a function of position.</p>

<p>The subsequent rows show position offsets for each reference
catalog, and proper motion offsets for SDSS DR7. The examples below
illustrate the differences between the DR8 astrometry and the UCAC2
plus r14 reference catalog. Note that above 41 deg, DR8 is offset by a
large amount relative to UCAC; this is because DR8 calibrated to
USNO-B in this region.  </p>

<table class='centerfigure'>
<tbody>
<tr>
<td><a href="images/astromQAImage-ucac-dra-1500-750.png"><img
src="images/astromQAImage-ucac-dra-1500-750.thumb.png" alt="ucac/DR8 RA
offsets" style="width:350px"/></a></td>
<td><a href="images/astromQAImage-ucac-ddec-1500-750.png"><img
src="images/astromQAImage-ucac-ddec-1500-750.thumb.png" alt="ucac/DR8
Dec offsets" style="width:350px"/></a></td>
</tr>
</tbody>
</table>

<p>Similar errors are seen in the comparison to 2MASS and to SDSS
DR7. There are some additional outlying regions in the comparison to
SDSS DR7, which are due to catastrophic errors in the DR7
astrometry.</p>
</li>

<li> For each run, we produce plots of the comparisons to each
reference catalog. For example, consider <a
href="http://data.sdss3.org/sas/dr8/groups/boss/photoObj/astromqa/plots/301/752/">run
752</a>. We provide overall offsets for each camcol, as well as the
distribution of matched star offsets for each camcol as a function of
field number. For DR7, we include a comparison of the proper
motions. For some runs, DR7 did not include them so those are blank.
</li>

</ul>

<p><a href="dr8/algorithms/astrometry.php#Top">[Back to top]</a></p>

<?php echo foot(); ?>
