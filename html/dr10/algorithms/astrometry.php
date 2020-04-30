<?php include '../../header.php'; echo head('Astrometry'); ?>

<p>Jump to:</p>

<ul>
<li><a href="dr10/algorithms/astrometry.php#intro">Introduction</a></li>
<li><a href="dr10/algorithms/astrometry.php#propermotions">Proper
Motions</a></li>
<li><a href="dr10/algorithms/astrometry.php#errors">Calculating errors for individual objects</a></li>
<li><a href="dr10/algorithms/astrometry.php#eqn">Calibration equations</a></li>
<li><a href="dr10/algorithms/astrometry.php#gcToEq">Transformation from Great Circle Coordinates to J2000 Celestial Coordinates</a></li>
<li><a href="dr10/algorithms/astrometry.php#astromqa">QA files</a></li>
<li><a
href="dr10/algorithms/astrometry.php#caveats">Caveats on
DR8 astrometry</a></li>
</ul>

<h2 id="intro">Introduction</h2>

<p>A detailed description of the astrometric calibration is given in
<a href="http://adsabs.harvard.edu/abs/2003AJ....125.1559P">Pier et
al. (2003)</a>.  Portions of that discussion are summarized here.</p>

<p>The <var>r</var> photometric CCDs serve as the astrometric
reference CCDs for the SDSS.  That is, the positions for SDSS objects
are based on the <var>r</var> centroids and calibrations.  The
<var>r</var> CCDs are calibrated by matching up bright stars detected
by SDSS with the UCAC astrometric reference catalogs. </p>

<p>Stars detected on the <var>r</var> CCDs are matched directly with
stars in the <a
href="http://www.usno.navy.mil/USNO/astrometry/optical-IR-prod/ucac">United
States Naval Observatory CCD Astrograph Catalog</a> (UCAC2, <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2000AJ....120.2131Z">Zacharias
et al. 2000</a>), which has a precision of 70 mas at its catalog limit
of <var>r</var>= 16, and systematic errors of less than 30 mas. UCAC2
extends up to around a declination of 41 degrees north.  Outside the
UCAC2 area we use an "internal" UCAC data release known as
"r14". Together UCAC2 and r14 cover the whole sky.  There are
approximately 2 - 3 magnitudes of overlap between UCAC and unsaturated
stars on the <var>r</var> CCDs.  The astrometric CCDs are not used.
</p>

<p>The <var>r</var> CCDs are calibrated directly against the primary
astrometric reference catalog.  FRAMES uses the astrometric
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

<p><a href="dr10/algorithms/astrometry.php#Top">[Back to top]</a></p>


<h2 id="propermotions">Proper Motions</h2>

<p> The SAS and CAS include proper motions for objects derived by
combining SDSS astrometry with USNO-B positions, recalibrated against
SDSS (Munn et al. 2004).  These are given in the
<tt>ProperMotions</tt> table in the CAS, and in the <a
href="http://data.sdss3.org/sas/dr10/boss/photoObj/external/PM">"PM"
external catalogs directory</a> in SAS. </p>

<p>The proper motions in DR9 and later correct an error in DR7 proper motions
for stars at low Galactic latitude; see the <a
href="/dr10/algorithms/astrometry.php#astromqa">QA discussion below</a>
for more details. </p>

<p><a href="dr10/algorithms/astrometry.php#Top">[Back to top]</a></p>

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

<p><a href="dr10/algorithms/astrometry.php#Top">[Back to top]</a></p>
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

<p>Note that in these equations, for DR8 we did not account
for the color term at all, which results in 10 to 20 mas systematic
errors. However, for DR9 and subsequent releases, we accounted for
this color term correctly.</p>

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

<p><a href="dr10/algorithms/astrometry.php#Top">[Back to top]</a></p>
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
order to identify errors in the SDSS imaging astrometry better. The <a
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
href="http://data.sdss3.org/sas/dr9/boss/photoObj/astromqa/astromQAFields.fits">downloaded
directly</a> (note, it is large at around 2.5 Gbytes). This file
contains for each field in DR9/DR10 an estimate of the DR9/DR10 position offset
relative to the set of reference catalogs
and an indication of whether the field is
catastrophically bad.</p>
</li>

<li> <p>There is a <a
href="http://data.sdss3.org/sas/dr10/boss/photoObj/astromqa/astromqa-1500-750.html">global
picture</a> of the offsets relative to the reference catalogs.  The
left side of the top row is blank by design, and just exists to verify
that the color terms in the astrometry described above are applied
properly.  On the right side of the top row are the DR10 proper motions
as a function of position.</p>

<p>The subsequent rows show position offsets for each reference
catalog, and proper motion offsets for SDSS DR7. The examples below
illustrate the differences between the DR9/DR10 astrometry and the UCAC2
plus r14 reference catalog, showing good agreement.</p>

<table class="centerfigure">
<tr>
<td><a href="images/astromDR9QAImage-ucac-dra-1500-750.png"><img
src="images/astromDR9QAImage-ucac-dra-1500-750.thumb.png" alt="ucac/DR8 RA
offsets" style="width:350px;" /></a></td>
<td><a href="images/astromDR9QAImage-ucac-ddec-1500-750.png"><img
src="images/astromDR9QAImage-ucac-ddec-1500-750.thumb.png" alt="ucac/DR8
Dec offsets" style="width:350px;" /></a></td>
</tr>
</table>

<p> There are some outlying regions in the comparison to SDSS DR7,
which are due to catastrophic errors in the DR7 astrometry (in certain
areas of runs 3358, 4829, 5960, 6074, and 6162). </p>

<p>Additionally, there are some differences with respect to the DR7
proper motions at low Galactic latitude; this results from an error in
DR7 runs processed through rerun 648 causing a number of stars to be
misclassified as galaxies and contaminating the reference frame used
for the proper motions. We believe that the DR9/DR10 proper motions are 
superior in these areas.</p>

<p>Finally, the proper motions values in DR9/DR10 have been checked for
photometrically identified "XDQSO" quasars from <a
href="http://adsabs.harvard.edu/abs/2011ApJ...729..141B">Bovy et
al. (2011)</a>, in the bottom row of the <a
href="http://data.sdss3.org/sas/dr10/boss/photoObj/astromqa/astromqa-1500-750.html">astrometry
QA page</a>. These results are consistent with those found by <a
href="http://adsabs.harvard.edu/abs/2010ApJ...716....1B">Bond et
al. (2010)</a>, who found a small (mas/yr) offset at low declination
that may be related to refractive effects in the USNO-B catalog for
these very blue sources.</p> 
</li>

<li> <p>For each run, we produce plots of the comparisons to each
reference catalog. For example, consider <a
href="http://data.sdss3.org/sas/dr10/boss/photoObj/astromqa/plots/301/752/">run
752</a>. We provide overall offsets for each camcol, as well as the
distribution of matched star offsets for each camcol as a function of
field number. For DR7, we include a comparison of the proper
motions. For some runs, DR7 did not include them so those are blank.</p>
</li>

</ul>

<h2 id="caveats">Caveats on DR8 astrometric calibration</h2>

<p>The DR8 astrometric calibrations were substantially degraded
relative to the DR7 astrometric calibrations, particularly at
declinations northward of about 41 deg. These errors have a much
smaller, but non-zero, effect on the DR8 proper motions. We recommend
using the DR9/DR10 astrometry and proper motions, which are available in
the DR9 or DR10 releases, or in the <code>astromDR9</code> and
<code>properMotionsDR9</code> tables of the DR9 CAS.</p>

<p>A detailed description of these errors was released as part of the
<a href="http://adsabs.harvard.edu/abs/2011ApJS..195...26A">DR8 Paper
Erratum</a>, and is also available on the <a
href="/dr8/algorithms/astrometry.php">DR8 version of this algorithms
page</a>.</p>

<p> Note in particular that the <a
href="dr10/algorithms/astrometry.php#propermotions">proper motions</a>
tabulated in the CAS were only mildly affected by these problems.  The
primary effects on the proper motions are to introduce an additional
systematic error with color of order 0.5 mas/yr, and to introduce an
additional source of error for stars with declinations above 41 deg,
of order 1 mas/yr.</p>

<p><a href="dr10/algorithms/astrometry.php#Top">[Back to top]</a></p>

<?php echo foot(); ?>
