<?php include '../../header.php'; echo head('Understanding SDSS Imaging Data'); ?>

<div class="summary">
<p>SDSS has imaged about one-third of the night sky in five broad bands (ugriz).
The resulting catalog includes photometry for almost half a billion unique objects.
Understanding how to use SDSS imaging data requires some knowledge of how the data were
collected. This page explains what you need to know about SDSS imaging data.</p>
</div>


<h2>Describing SDSS images</h2>

<p> The SDSS imaging camera scanned the sky in <em>strips</em> along
great circles.  Each strip consists of six parallel <em>scanlines</em>, 13
arcmin wide, with gaps of about the same width.  Thus two strips,
offset slightly from each other, together make a single <em>stripe</em>
2.5 degrees wide.  Each scanline includes data in all five filters,
<var>ugriz</var>.</p>

<p>The fundamental units of SDSS images are <a href="dr10/help/glossary.php#field">fields</a>
into which the scanlines are divided (with some overlap).  Each is 10
by 13 arcminutes, corresponding to 2048 by 1489 pixels. Each
field can be uniquely identified by a sequence of three numbers: </p>
<ul>
<li> the <a href="dr10/help/glossary.php#run">run</a> number, which
identifies the specific scan,</li>
<li> the <a href="dr10/help/glossary.php#camcol">camera
column</a>, or "camcol," a number from 1 to 6, identifying the scanline within the run,
and</li>
<li> the <a href="dr10/help/glossary.php#field">field number</a>.  The
field number typically starts at 11 (after an initial rampup time),
and can be as large as 800 for particularly long runs.</li>
</ul>

<p>For example, the image below shows a single SDSS field (gri color
composite). You can
search for this area of sky by its RA and Dec position in the
SkyServer <a
href="http://skyserver.sdss3.org/public/en/tools/chart/navi.aspx">Navigate</a>
tool, but to understand when and under what conditions this image was
taken, it helps to know the field's run-camcol-field identifier. Using
those numbers, you can search for more information about this field in
the CAS "field" table.  An additional number, rerun, specifies how the
image was processed. </p>

<p>The run-camcol-field identifier can also be useful to download the
FITS files for each SDSS filter, in this case, 3704-3-91. Entering
that identifier into the <a
href="http://data.sdss3.org/fields/runCamcolField?run=3704&amp;camcol=3&amp;field=91&amp;submit=Submit">Science Archive Server Imaging Fields search</a> will create links to
download the individual filter images as FITS files.</p>

<table class="centerfigure" style="width:496px;">
<tr><td><a href="images/fieldvoorwerp-big.jpg">
<img src="images/fieldvoorwerp.jpg" alt="An individual SDSS field (2048 x 1489
pixels / 10 by 14 arcminutes)" /></a></td></tr>
<tr><td>SDSS field 3704-3-91 (click for a larger image)</td></tr>
</table>

<table class="figure" style="width:255px;">
<tr><td><a href="images/camassy2.gif">
    <img src="images/camassy2_thumb.gif" alt="Schematic of the arrangement of the CCDs and filters on the SDSS camera" /></a></td></tr>
<tr><td>Schematic of the arrangement of the CCDs and filters on the SDSS camera.</td></tr>
</table>

<p>The SDSS camera worked in drift scan mode,
opening its shutter for
extended periods and imaging a continuous strip of the sky. The image to the right
illustrates the focal plane of the SDSS camera. In the coordinate system shown there,
the sky drifts downwards. Each continuous drift scan is referred to as a
<a href="dr10/help/glossary.php#run">run</a> and there is a unique integer identifying
the run.  For science quality runs, the lowest run number is 94, and the highest is
8162. </p>

<p>The <a href="instruments/camera.php">SDSS camera</a> had six
parallel camera columns, meaning that each run is divided into six
parallel scanlines, one for each camera column.  These images are known as
<a href="dr10/help/glossary.php#camcol">camcols</a>, and are numbered 1
through 6. Each camcol is 2048 pixels wide (the width of the CCDs).
There is a 11.7 arcmin gap between camcols; usually, the gap between
camcols in a run is filled in by images from another drift scanning
run that slightly overlaps in sky coverage.</p>

<p>Each camcol is artificially broken up into a series of overlapping
<a href="dr10/help/glossary.php#field">fields</a>, each 1489 pixels
long (2048 pixels wide). Each field overlaps by 128 pixels with
adjacent fields, to ensure that objects are not misdetected due to
being too close to the edge of a field. Fields are the basic unit of
analysis input into the <a href="dr10/imaging/pipeline.php">SDSS
imaging pipeline</a>.</p>

<table class="figure" style="width:345px;">
<tr><td><a href="images/run756.jpg"><img src="images/run756.small.jpg" alt="Imaging run 756" /></a></td></tr>
<tr><td>Imaging run 756.</td></tr>
</table>

<p>Finally, there have been multiple reprocessings of the data over
the years.  Each reprocessing has been denoted by an integer (the
first being rerun 0, the latest being rerun 301). Each rerun
consists only in a change to the photometric pipeline, not to the underlying data.</p>

<p>The overall result is shown at right for a small section of one run
in the SDSS. There are six continuous camcols, broken up into
fields. Each image is uniquely identified by its run, camcol, field
and rerun number. You can <a
href="http://data.sdss3.org/sas/dr10/boss/photoObj/frames/301/256/frames-run-000256.html">explore
the JPG images of a run</a> to get a sense of the geometry.</p>

<h2>Filters</h2>

<p>In the camera schematic above, note that there are five rows of CCDs,
labeled <var>u</var>, <var>g</var>, <var>r</var>, <var>i</var> and <var>z</var>. The SDSS
camera has <a href="instruments/camera.php#Filters">five filters</a>,
which together span the optical window.
Each filter images a section of sky nearly,  but not exactly, simultaneously
(each filter is separated by 71.72 seconds). The filters always observe in the
same time sequence: <var>r</var>, <var>i</var>, <var>u</var>, <var>z</var> and then
<var>g</var>. A mnemonic for remembering the order is "<var>r</var>obert <var>i</var>s
<var>u</var>nder <var>z</var>e <var>g</var>unn."</p>

<p>The multiple bands allow a determination of the colors of detected objects.
For example, in the JPGs shown above are a composite of the <var>g</var>, <var>r</var>,
and <var>i</var> images. In the catalog data returned by
<a href="http://skyserver.sdss3.org/dr10">SkyServer</a> and
<a href="http://skyserver.sdss3.org/casjobs/">CasJobs</a>, all imaging parameters
associated with a given bandpass are named accordingly (<em>e.g.</em>, the Petrosian flux in
the <var>u</var> band is named <code>petroflux_u</code>; in the <var>g</var> band it is named <code>petroflux_g</code>,
etc.). In the flat-file (FITS) versions of the catalog data returned by the
<a href="http://data.sdss3.org">DR10 Science Archive Server</a>, the bandpasses are
given in order of increasing wavelength, <var>ugriz</var>. Additionally, note that the time
gap between filters means that the images of moving objects (<em>i.e.</em>,
asteroids) are offset slightly
between successive filters. We have used this to put together a
comprehensive catalog of asteroids found in SDSS, the
<a href="http://www.astro.washington.edu/users/ivezic/sdssmoc/sdssmoc.html">SDSS
Moving Object Catalog</a>.</p>


<h2>Object ID numbers, deblending and resolving</h2>

<table class="figure" style="width:353px;">
<tr><td><a href="images/parents-big.jpg"><img src="images/parents-big.jpg" alt="Parents and children" /></a></td></tr>
<tr><td>Illustration of "parent" and "child" objects. This is a small
patch of an image of the sky, with five individual astronomical
sources. The photometric pipeline detects all five together as a
single "parent" object, and determines the center of the parent to be
at the yellow diamond. The deblending procedure then breaks up the
parent into five children, whose centers are shown as the red
diamonds. </td></tr>
</table>

<p>Going from pixels on the camera to a robust catalog of sky objects is a long
and complicated process. The entire process is explained in the
<a href="dr10/imaging/pipeline.php">Imaging Pipeline</a> and
<a href="dr10/algorithms/">Algorithms</a> pages. The result is a set of
objects within each field, which each get a unique identifier within
the field known as "obj" in CAS, and as "id" in the flat files. Thus,
each catalog object has a unique combination of
run-camcol-field-id-rerun; this combination is hashed into a single
64-bit integer called <a href="dr10/help/glossary.php#ObjID">ObjID</a>.
Note that between different photometric reduction versions
(<em>e.g.</em>, between DR7 and DR8) the rerun value, the id, and the objid all
change for each object. </p>

<p>Using the SDSS imaging catalogs requires understanding two
important processes: deblending and resolving.</p>

<p>First, the imaging pipeline detects objects in the images by
flagging contiguous regions of pixels with a signal exceeding the sky
background. These contiguous regions often actually contain multiple
astronomical sources, and are thus known as <a
href="dr10/help/glossary.php#parent">parent</a> objects.  The image to
the right shows a single parent object. Each parent has its properties
measured and is tracked into the final catalog, but it is not usually
recommended for the user to use them, and they are never considered
"primary" detections.  A process called <a
href="dr10/help/glossary.php#deblend">deblending</a> breaks each parent
up into individual, distinct astronomical sources, known as the
"child" objects.  For example, in the image to the right, the yellow
diamond is the "center" of the parent, and the red diamonds mark the
<a href="dr10/help/glossary.php#parent">child</a> objects.  For nearly
all purposes, analyses of the catalog data should use the
children.</p>

<p>Second, there is some overlap between fields within each run, as
well as between different runs. Because of these overlaps, any source
on the sky can in principle be deblended as a child detection on
several different runs. The imaging pipeline's <a
href="dr10/help/glossary.php#resolve">resolve</a> procedure determines
the "best" observation of every object, which it identifies as the <a
href="dr10/help/glossary.php#primary">primary</a> object. The
documentation on the <a href="dr10/algorithms/resolve.php">Resolve
Algorithm</a> describes how resolve chooses which observation to
define as the primary object. For most purposes, users want primary
objects, which can be identified using the <code><a
href="dr10/algorithms/bitmask_resolve_status.php">resolve_status</a></code>
bitmask or by search for objects with <code>mode</code> set to 1.</p>

<p>Finally, not all objects are "good" even when they are unique. Many
objects, for various reasons, have less-than-perfect photometry. Data
describing the image quality associated with each catalog object is
stored in the parameters <a
href="dr10/algorithms/bitmask_flags1.php">FLAGS1</a> and <a
href="dr10/algorithms/bitmask_flags2.php">FLAGS2</a> (in CAS and
SkyServer, these are combined into a single 64-bit FLAGS
bitmask). Some examples of imaging quality flags are those associated
with saturated pixels (SATURATED), objects too close to the edge of a
field (EDGE), or objects that are possible misclassified cosmic rays
(MAYBE_CR).  These flags are stored as <a
href="dr10/algorithms/bitmasks.php">bitmasks</a>. To learn how to use
them to find reliable imaging, see the <a
href="dr10/tutorials/flags.php">Clean Photometry</a> tutorial and look
at our <a href="dr10/algorithms/photo_flags_recommend.php">photometric
catalog recommendations</a>. A shortcut is to use the
<code>clean</code> flag in the photometric catalog, which is 1 for
"clean" data and 0 otherwise; however, we recommend that users
evaluate whether this flag is being overly (or underly) restrictive
for their particular use cases. </p>

<?php echo foot(); ?>
