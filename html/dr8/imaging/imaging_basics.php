<?php include '../../header.php'; echo head('Basics of Imaging Data'); ?>

<h2>Imaging runs</h2>

<table class="figure" style="width:255px;">
<tr><td><a href="images/camassy2.gif"><img src="images/camassy2_thumb.gif" alt="Schematic of the arrangement of the CCDs and filters on the SDSS camera" /></a></td></tr>
<tr><td>Schematic of the arrangement of the CCDs and filters on the SDSS camera.</td></tr>
</table>

<p>The SDSS camera worked in drift scan mode, opening its shutter for
extended periods and imaging a continuous strip of the sky. In the
coordinate system of the illustration shown at right of the SDSS
camera focal plane, the sky drifts downwards.  Each such drift
scan is referred to as a <a href="dr8/glossary.php#run">run</a> and
there is an associated integer identifying the run.  For science
quality runs, the lowest run number is 94, and the highest is
8162. </p>

<p>Because of the layout of the CCDs in the focal plane, such an
imaging run results in six continuous images associated with the six
columns of CCDs. Each of these six are known as <a
href="dr8/glossary.php#camcol">camcols</a> and are numbered from 1 to
6. Each camcol is 2048 pixels wide (the width of the CCDs). The gaps
between the camcols in most cases are filled by another, somewhat
overlapping, drift scan run.</p>

<p>Each camcol is artificially broken up into a series of overlapping
<a href="dr8/glossary.php#field">fields</a>, each 1489 pixels long,
and 2048 pixels wide. They each overlap by 128 pixels with the
adjacent fields, meaning there are 1361 unique rows in each. These
fields are the basic unit which the photometric pipeline
processes. They are designed to be overlapping even within a run so
that objects are not misdetected due to being too close to the edge of
a field.</p>

<table class="figure" style="width:345px;">
<tr><td><a href="images/run756.jpg"><img src="images/run756.small.jpg" alt="Imaging run 756" /></a></td></tr>
<tr><td>Imaging run 756.</td></tr>
</table>

<p>Finally, there have been multiple reprocessings of the data over
the years.  Each reprocessing has been denoted by an integer (the
first being rerun 0, the latest being rerun 301). Each rerun
consists only in a change to the photometric pipeline, not to the data
itself.</p>

<p>The overall result is shown at right for a small section of one run
in the SDSS. There are six continuous camcols, broken up into
fields. Each image is uniquely identified by its run, camcol, field
and rerun number. You can <a
href="http://data.sdss3.org/sas/dr9/boss/photoObj/frames/301/256/frames-run-000256.html">explore
the JPG images of a run</a> to get a sense of the geometry.</p>

<h2>Bandpasses</h2>

<p>In the top figure above, note that there are five rows of CCDs,
labeled <var>u</var>, <var>g</var>, <var>r</var>, <var>i</var> and <var>z</var>. As the <a
href="instruments/camera.php#Filters">description of the SDSS
camera</a> notes, this results in images in each of these bandpasses
nearly simultaneously (in detail, separated by approximately 71.72
seconds).  As shown in the illustration above, the observations are in
the time sequence <var>r</var>, <var>i</var>, <var>u</var>, <var>z</var> and then
<var>g</var>. </p>

<p>The multiple bands allow a determination of the colors of the
detected objects. For example, in the JPGs shown above are a composite
of the <var>g</var>, <var>r</var>, and <var>i</var> images. In the flat-file
versions of the catalogs on SAS, the bandpasses are given in order of
increasing wavelength. In the CAS, parameters that are specific to a
given bandpasses are named accordingly (<em>e.g.</em>, "petroflux_u",
"petroflux_g", etc.).</p>

<h2>Deblending and resolve basics</h2>

<table class="figure" style="width:353px;">
<tr><td><a href="images/parents-big.jpg"><img src="images/parents-big.jpg" alt="Parents and children" /></a></td></tr>
<tr><td>Illustration of "parent" and "child" objects.</td></tr>
</table>

<p>In the final catalog, there are a number of important pieces of
nomenclature to note regarding deblending, resolve, and quality flags.
The <a href="dr8/glossary.php">glossary</a> gives a full description
of SDSS nomenclature, and the <a href="dr8/algorithms/">algorithms
section</a> gives a detailed account of the methods. Here we simply
try to highlight some of the most relevant points.</p>

<p>The most important regards determination of unique objects in the
catalog. The full catalog contains two classes of objects that are to
be ignored entirely: "bright" objects, which are detected in a
first-pass object detection step; and "parent" objects, which are
deblended into "child" objects.  "Bright" objects should be ignored
entirely, and in almost all cases so should parents, since they are
usually successfully separated into their component children.</p>

<p>For example, in the image on the right, the island of
high-resolution pixels indicates the region associated with a "parent"
object. The yellow diamond is the "center" of the parent.  The red
diamonds are the centers of the component children. The child objects
are the ones to use for any analysis of the catalog.  Additionally,
there is overlap between each field within a run, and also between
fields in different runs.  Thus, any source on the sky can in
principle appear as a child detection in a number of different runs.
The resolve procedure determines which entry is "primary."  The <a
href="dr8/algorithms/resolve.php">resolve</a> documentation describes
how to select primary children. </p>

<p>Finally, not all objects are "good" even when they are
unique. These objects can be identified using the <a
href="dr8/algorithms/bitmask_flags1.php">objc_flags</a> bitmask. Some
are associated with saturated pixels, generally bright stars (SATUR),
or are close to the edge of a frame (EDGE), or are possible
misclassified cosmic rays (MAYBE_CR).</p>

<?php echo foot(); ?>
