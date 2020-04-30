<?php include '../header.php'; echo head('Camera'); ?>

<p><a href="instruments/camera.php#General">[General Information]</a>&nbsp;<a href="instruments/camera.php#Filters">[Filters]</a>&nbsp;<a href="instruments/camera.php#Parameters">[Specs]</a></p>

<h2 id="General">Overview</h2>

<table class="figure" style="width:317px;">
<tr><td><a href="images/faceplat.gif"><img src="images/faceplat.gif" alt="An illustration of the arrangement of the CCDs and filters on the SDSS-III camera" /></a></td></tr>
<tr><td>An illustration of the arrangement of the CCDs and filters on the SDSS-III camera</td></tr>
</table>

<p> A detailed description of the imager can be found in <a
      href="http://adsabs.harvard.edu/abs/1998AJ....116.3040G">Gunn et al. (1998)</a>
and in the SDSS-I <a href="http://www.astro.princeton.edu/PBOOK/camera/camera.htm">project book</a>. </p>

<p>
The imaging camera collects photometric imaging data using an array
   of 30 SITe/Tektronix 2048 by 2048 pixel CCDs arranged in six columns of
   five CCDs each, aligned with the pixel columns of the CCDs themselves.
   SDSS <i>r</i>, <i>i</i>, <i>u</i>, <i>z</i>, and <i>g</i> filters cover
   the respective rows of the array, in that order. The survey operates
   the instrument in a drift scan mode: the camera slowly reads the CCDs
   as the data is being collected, while the telescope moves along great
   circles on the sky so that images of objects move along the columns
   of the CCDs at the same rate the CCDs are being read. As an image of an
   object moves along the column of the CCDs, a CCD in each row collects
   data on that object. Therefore, the camera produces five images of a
   given object, all from the same column of CCDs, one from each CCD in
   that column. It takes an object 54 seconds to move from the beginning
   of a CCD to the end, so the effective exposure time in each filter is
   54 seconds. Because there is some space between the rows of CCDs it
   takes an image 71.7 seconds to move from the beginning of one row to
   the next.  Each row corresponds to a different filter, so each object
   has one image in each filter, taken at 71.7 second intervals.
</p>
<p>
   An additional 24 CCDs placed before and after the photometric CCDs
   collect astrometric data. Neutral density filters cover these CCDs, and
   allow collection of data on bright reference stars without
    saturation.  In practice, the UCAC2 network of calibration standards
   extends to magnitudes fainter than the saturation limit of the main camera.
   so the data from these astrometric
   chips is not needed for calibration.
</p>
<p>
   Because there is space between the columns of CCDs, two passes along
   a great circle are required to obtain a solid area. The second pass is
   offset from the first such that the area that fell between columns in
   the first pass is images in the center of the columns in the second
   pass.
</p>

<p><a href="instruments/camera.php#Top">[Back to top]</a></p>

<h2 id="Filters">Filters</h2>

<p>SDSS-III used the same filter system as the original SDSS.  The
central wavelengths of the five filters are given below:</p>

<table class="figure" style="width:279px;">
<tr><td><a href="images/camera_filters.jpg"><img src="images/camera_filters_thumb.jpg" alt="The SDSS-III filter throughput curves" /></a></td></tr>
<tr><td>The SDSS-III camera filter throughput curves</td></tr>
</table>


<table class="common">
<caption>Central wavelengths of SDSS filters</caption>
<tr>
<th style="text-align:center;"><i>u</i></th>
<th style="text-align:center;"><i>g</i></th>
<th style="text-align:center;"><i>r</i></th>
<th style="text-align:center;"><i>i</i></th>
<th style="text-align:center;"><i>z</i></th>
</tr>
<tr>
<td style="text-align:center;">3551&Aring;</td>
<td style="text-align:center;">4686&Aring;</td>
<td style="text-align:center;">6166&Aring;</td>
<td style="text-align:center;">7480&Aring;</td>
<td style="text-align:center;">8932&Aring;</td>
</tr>
</table>

<p>Tables of camera sensitivity through each filter, as determined
by Jim Gunn in June 2001, are available as
a <a href="binaries/filter_curves.fits">FITS file</a>.</p>

<p>Note that <a
href="http://adsabs.harvard.edu/abs/2010AJ....139.1628D">Doi et
al. 2010</a> have published more recent estimates of the filter curves
using more data and over a longer time baseline. They found that the
<i>u</i> band in particular has changed over time and appears to
differ now from the curve estimated in the 2001 filter curves
distributed above.</p>

<p>
The response curves on the right correspond to the second
column in the tables above and show the throughput
defining the survey's photometric system, which includes extinction
through an airmass of 1.3 at Apache Point Observatory.
Note that these are not "complete" filter curves, as
they do not include the full system response from atmosphere
to detector.
</p>

<!--<p>The <a href="dr8/algorithms/fluxcal.php">photometric flux
calibration web page</a> is essential reading for those wishing to
understand the SDSS photometric system. There is a long page describing <a
href="dr8/algorithms/sdssUBVRITransform.php">transformations</a> between
the SDSS (ugriz) and Kron-Cousins (UBVR<sub>c</sub>I<sub>c</sub>) photometry.
</p>-->


<p><a href="instruments/camera.php#Top">[Back to top]</a></p>

<h2 id="Parameters">Main Parameter Summary</h2>

<table class="common">
    <tr>
     <td>Photometric CCDs</td>
     <td>30 2048 &times; 2048 SITe/Tektronix 49.2 mm square CCDs,
        arranged in 6
        columns parallel to the scan direction and 5 rows perpendicular to
        the scan direction</td>
    </tr>
    <tr>
      <td>CCD read noise</td>
      <td>&lt; 5e<sup>-</sup> pixel<sup>-1</sup> (overall system is sky
        limited)</td>
    </tr>
    <tr>
      <td>Image frame size</td>
      <td>2048 &times; 1361 pixels (13.51 &times; 8.98 arcminutes)</td>
    </tr>
    <tr>
      <td>Image column separation</td>
      <td>25.17 arcminutes</td>
    </tr>
    <tr>
      <td>Detector separation along column</td>
      <td>17.98 arcminutes</td>
    </tr>
    <tr>
      <td>Focal-plane image scale</td>
      <td>3.616 mm arcmin<sup>-1</sup></td>
    </tr>
    <tr>
      <td>Detector image scale</td>
      <td>3.636 mm arcmin<sup>-1</sup></td>
    </tr>
    <tr>
      <td>Pixel size and scale</td>
      <td>24 &#956;m; 0.396 arcseconds pixel<sup>-1</sup></td>
    </tr>
    <tr>
      <td>Filters</td>
      <td><i>r i u z g</i> scanned in that order, 71.7 seconds apart</td>
    </tr>
    <tr>
      <td>Integration time</td>
      <td>54 s</td>
    </tr>
    <tr>
      <td>Operating mode</td>
      <td>drift scan</td>
    </tr>
    <tr>
      <td>Field distortion</td>
      <td>&lt;0.1 arcseconds over the entire field</td>
    </tr>
    <tr>
      <td>Field size</td>
      <td>2&deg;.5</td>
    </tr>
    <tr>
      <td>Flux calibration</td>
      <td>Standard-star fields at 15&deg; intervals along scans,
        tied to BD + 17&deg; 4708, atmospheric extinction
        determined by the PT</td>
    </tr>
    <tr>
      <td>Astrometric CCDs</td>
      <td>22, 0.25 &times; 2 inches, above and below CCD columns;
        r filter plus 3
        mag neutral density filter, 10.5 second integration time</td>
    </tr>
</table>

<p><a href="instruments/camera.php#Top">[Back to top]</a></p>

<?php echo foot(); ?>

