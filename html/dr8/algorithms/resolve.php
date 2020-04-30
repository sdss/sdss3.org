<?php include '../../header.php'; echo head('Resolve'); ?>

<h2 id="intro">Introduction</h2>

<p>The SDSS imaging runs in general overlap each other, yielding
multiple detections of the same sources. The "window" and "resolve"
algorithms handle these overlaps, to determine the window function of
the survey and the unique set of detections to use for a homogeneous
sample.  The "window" algorithm determines which imaging run should be
used for primary detections in each area of sky. Next, the "resolve"
algorithm determines which set of detections is "primary," and finds
"secondary" detections of the same sources.  There are some sources
which are detected but in fields which are not primary; these
detections are called "best."  </p>

<p>The BOSS survey targets primary objects for its galaxy and QSO
survey. We expect that most users will also want to select the primary
sample, unless they are specifically trying to coadd catalog data or
looking for time variability.</p>

<p>Note that, as usual, there are some minor differences in
nomenclature between CAS and the SAS flat files. In particular, in the
flatfiles we define <code>resolve_status</code>,
<code>image_status</code>, <code>psp_status</code> and
<code>thing_id</code>, and in CAS these are
<code>resolveStatus</code>, <code>imageStatus</code>,
<code>pspStatus</code> and <code>thingID</code>.</p>

<h2 id="using">Using resolve information</h2>

<h3>Introduction</h3>

<p>The results of resolve allow one to perform several tasks. We will
describe here: how to define a set of unique objects (that is, with
duplicate detections removed); how to find multiple detections of a
single object; and, how to describe the geometry of the survey.</p>

<h3>Selecting unique objects (removing duplicates)</h3>

<p>Users of CAS can select unique objects by using the
<code>photoPrimary</code> table, which applies the selection for
primary objects across the survey described in this section. Users of
the flat files will need to apply these criteria themselves. </p>

<p>The information about how resolve each object is stored in a
<a href="dr8/algorithms/bitmasks.php">bitmask</a> called
<a href="dr8/algorithms/bitmask_resolve_status.php">resolve_status</a> (in the
flat files) or <a
href="dr8/algorithms/bitmask_resolve_status.php">resolveStatus</a>
(in the CAS tables). Notably, <code>SURVEY_PRIMARY</code> is bit 8 (or
2<sup>8</sup> = 256).
</p>

<p>Selecting unique objects from the data is as simple as checking a
single bit in this resolve status bitmask
The selection can be applied as:</p>
<pre>
  (resolve_status &amp; SURVEY_PRIMARY) != 0
</pre>
<p>Equivalently one can check a variable called "mode", which is set to
1 for primary objects.</p>

<p>In the flat files (either the data sweeps or in the photoObj files)
the selection can be applied as:</p>
<pre>
  (resolve_status &amp; SURVEY_PRIMARY) != 0
</pre>

<p>If you are interested in just a particular run, you can also ask
whether a set of objects are unique within a run (even if they have
detections in overlapping runs). The <code>RUN_PRIMARY</code> bit selects such
objects, which eliminates duplicates detected in the overlaps between
frames in the same camcol (see below):</p>

<pre>
  (resolve_status &amp; RUN_PRIMARY) != 0
</pre>

<p> The resolve flags are only set for that unique set of objects that
are not further deblended into other objects.  In the terminology of
SDSS, these are CHILD objects.  The CHILD objects can be identified on
the basis of the <a
href="dr8/algorithms/bitmask_flags1.php">objc_flags</a> bitmask as
follows:</p>

<pre>
  ((objc_flags &amp; BLENDED) == 0  || (objc_flags &amp; NODEBLEND) != 0) &amp;&amp; (objc_flags &amp; BRIGHT) == 0
</pre>

<h3 id="multiple">Multiple detections of single objects </h3>

<p>The resolve results also allow quick retrieval of multiple detections
of single objects. However, the logic is somewhat more involved. For the
purposes of this section, we will distinguish between a "source" and a
"detection."  A source is a physical source of light in the sky, that
might have been detected in more than one field (if more than one field
covered that area of sky).  A detection is a particular detection of each
source.  Each entry in the photometric catalog is a detection, and there
can be multiple detections for each source, since fields overlap.</p>

<p>First, for each detection, in addition to the resolve status bits, there
are indicators of how many fields that object could have been detected
in (<code>NOBSERVE</code>) and of how many fields that object actually was
detected in (<code>NDETECT</code>) The photoObj flat files and the photoObjAll table
in CAS both have this information. </p>

<p>Second, for each unique source, we assign a unique identification
number called <a href="dr8/glossary.php#thingid"><code>thing_id</code></a>.  All
detections associated with that source have that same value of
<code><a href="dr8/glossary.php#thingid">thing_id</a></code>
associated with them.</p>

<p>To actually find the multiple detections of a single source, the
method differs between the FITS flat files and the CAS.</p>

<p>In the flat-file distribution, we provide two files. One contains
all of the detections (<a
href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/thingList.html">thingList</a>)
and one which contains all of the unique sources (<a
href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/thingIndex.html">thingIndex</a>).
In fact, <code><a href="dr8/glossary.php#thingid">thing_id</a></code> simply is equal to the zero-indexed row of thingIndex
that contains the information about that source. In thingIndex is
listed (as <code>ISTART</code>) the first occurrence of a detection in thingList;
all of the detections of individual sources are grouped together, so
along with <code>NDETECT</code> this yields enough information to find all of the
detections.  </p>

<p>Thus, say you have a primary detection of some source, and want to
find the list of all detections of that source.  Then you look in
<code>thingIndex[thing_id]</code> for <code>ISTART</code> and
<code>NDETECT</code>.  The information about all of the other
detections can then be found in the elements
<code>thingList[ISTART...ISTART+NDETECT]</code>. In those elements are
listed the <a href="dr8/glossary.php#run"><code>RUN</code></a>, <a
href="dr8/glossary.php#run"><code>CAMCOL</code></a>, <a
href="dr8/glossary.php#run"><code>FIELD</code></a>, and <a
href="dr8/glossary.php#run"><code>ID</code></a> of all of the detections.</p>

<p>For CAS, we provide the same information in two tables:
<code>detectionIndex</code> (which corresponds to the <a
href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/thingList.html">thingList</a>
file) and <code>thingIndex</code> (which corresponds to the (<a
href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/thingIndex.html">thingIndex</a>
file). <code>thingIndex</code> provides the full list of unique
sources.  <code>detectionIndex</code> provides pairs of <a
href="dr8/glossary.php#ObjID">objId</a> and <a
href="dr8/glossary.php#thingid">thingID</a>. Thus, with known <a
href="dr8/glossary.php#thingid">thingId</a>s, one can join to all the
photometric information in <code>photoObj</code> for each detection
using the <code>detectionIndex</code> table.</p>

<h3 id="geometry">Geometry of survey</h3>

<p>As we explain below, in each direction on the sky covered by SDSS
data, we have chosen one <a href="dr8/glossary.php#field">field</a> covering it as primary.  Over about
two-thirds of the are there is single-field coverage, but about
one-third of the time there are two or more fields and a choice must
be made. Here we describe the tools to use this information, using the
flat-files, using the SAS front-end, and using the CAS database.</p>

<p>The essential information expressing the primary field coverage is
contained in the <a
href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/window_unified.html">window_unified.fits</a>
and <a
href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/window_flist.html">window_flist.fits</a>
files. <a
href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/window_unified.html">window_unified.fits</a>
is a FITS-format file with a Mangle-style geometry in it. <a
href="dr8/software/idlutils.php">idlutils</a> users can read it in
with <a
href="dr8/software/idlutils_doc.php#READ_FITS_POLYGONS">read_fits_polygons</a>. It
contains a set of polygons; the parameter "IFIELD" is an index into
the <a
href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/window_flist.html">window_flist.fits</a>
file that indicates which <a href="dr8/glossary.php#field">field</a> is primary in that polygon.
</p>

<p>The SAS front-end also provides <a href="http://data.sdss3.org/coverageCheck/">an interface to the same
information</a>, allowing the user to check the primary <a href="dr8/glossary.php#field">field</a> covering a
particular RA and Dec or a list.</p>

<p>In CAS, the window function information is encoded in the
<code>sdssPolygons</code> table. <b>EXAMPLE OF USAGE</b></p>

<h2>Resolve algorithm</h2>

<h3>Introduction and nomenclature</h3>

<p>The catalogs generated by the SDSS imaging camera and the
photometric pipeline often contains areas of sky which have been
covered multiple times. Thus, to evaluate the sky coverage of the
survey and to define a unique set of detected objects requires
understanding these overlaps. We refer to our description of the sky
coverage as the "window" of the SDSS survey, and we refer to the
process of identifying duplicate observations as "resolving" the
caatalog.
</p>

<p> We will refer to the unique coverage of the survey as the
"primary" area. The primary area is built up as a union of the
individual SDSS fields. At each position in that area there is a
single field deemed "primary." For each field, some parts of it might
be primary and others not. We will show examples below.</p>

<p> We will refer to individual detections in a field as a "detection"
or a "catalog entry." Only detections that are in the primary area of
a field are classified as "primary". Detections in a non-primary part
of a field are usually called "secondary."  Some unique detections
exist but in areas of fields where that field is not primary; that is,
cases where a secondary observation of an area contains a detection
whereas the primary field covering that area does not.  Such cases are
called "best".</p>

<h3>Geometry of a run</h3>

<table class="centerfigure">
<tr><td><a href="images/resolve_fields.jpg"><img src="images/resolve_fields.jpg" alt="example of figures" /></a></td></tr>
<tr><td>A range of fields in run 4632. Each camcol is
labeled on the right, and along the top the field numbers are listed
for camcol 6 (the parallel fields in the other camcols have the same
field numbers).</td></tr>
</table>

<p>The SDSS imaging data set is built up from a series of drift scan
<a href="dr8/glossary.php#run">run</a>s, ranging from an hour to over
eight hours in length. The scan rate across the sky is similar to the
siderial rate on the equator. During each run, images are taken in six
long, narrow <a href="dr8/glossary.php#camcol">camcol</a>s on the sky,
about 13.5 arcmin in width.  The camcols are separated from each other
by slightly less than their 13.5 arcmin width. Each camcol is divided
into individual <a href="dr8/glossary.php#field">field</a>s that 9.8
arcmin long. Each overlaps by about 50 arcsec with the next field and
the previous field.  In pixel units, each field is 2048 columns by
1489 rows, with 128 rows overlap with the previous and next field
(0.396 arcsec per pixel).</p>

<p>For each field, there is an image in each of the five bands (u, g,
r, i, and z) taken within a few minutes of each other. The photometric
reduction software processes each field mostly independently.</p>

<p>The figure above shows an image of the coverage of part of
an SDSS run. Each field is denoted by its run, camcol, and field
numbers, which fully identify it.  Note the gaps between the camcols.
Generally speaking, the gaps are filled with imaging from runs that
run nearly parallel.</p>

<p>As a first step in defining the geometry of the full survey, we
define the official area covered by each field.  This is the full area
of the corrected frame (<code>2048x1489</code>) with 64 pixels trimmed
off of each edge. The trimming along the drift scan direction prevents
adjacent fields from overlapping.  The trimming perpendicular to the
drift scan direction prevents objects that are too close to the frame
edge from entering the primary catalog; these objects near the edge
are often incorrectly analyzed by the <code>photo</code> software, and
thus best left out of the primary sample.</p>

<h3>Distribution of fields on the sky</h3>

<table class="centerfigure">
<tr><td><a href="images/resolve_skydist.jpg"><img src="images/resolve_skydist_thumb.jpg" alt="example of figures" /></a></td></tr>
<tr><td>Distribution of fields on the sky. Darking
regions indicate more overlapping fields; darkest areas have three or
more overlapping fields.</td></tr>
</table>

<p>Next we show the distribution of all the individual fields on the
sky for the full survey. The shading as a function of position
indicates the number of fields covering each position.</p>

<p>The survey has defined a set of standard "stripes" which most
(though not all) of the runs can be associated with. In this case, the
full stripe is imaged with runs in two "strips", one identified as the
"north" strip and one as the "south" strip. Each stripe has an integer
number associated with it, so runs are identified as being part of
strip "11N" or "82S" or the like. </p>

<p> Most of the stripes lie on great circles with a common pole at a
right ascension of 95 deg and a declination of 0 deg, which lies
outside the main survey near the Galactic Plane. For this reason the
stripes actually overlap each other considerably near the survey
edges.</p>

<p>Obviously, many objects that lie in regions covered more than once
will be detected multiple times.  The purpose of resolve is to
identify such cases and remove duplicates.</p>

<h3>Scoring the fields</h3>

<p>In each region shown in the above figure, there are one or more
fields covering the area. We strive to pick the best possible field to
represent each area. As the first step to doing so, we have to rank
the fields according to some metric, which we call the field
"score."</p>

<p>For normal SDSS runs, the formula for the score is:</p>
<pre>
  sensitivity = (0.7 / (PSF_FWHM[2] * sqrt(SKYFLUX[2]))) &lt; 0.4
  score = QEXIST * (0.1 + 0.5 * QPHOT + sensitivity)
</pre>
<p>
where sensitivity is bounded between [0,0.4], and measures the point-source
sensitivity according to the FWHM and the sky level in the r-band.</p>

<p>A field is considered to exist (QEXIST) if photoStatus is 0 (that
is, the photometric reductions were completed) and <code><a
href="dr8/algorithms/bitmask_image_status.php">image_status</a></code> doesn't
have any of the following bits set in any band:
<code>BAD_ROTATOR</code>,
<code>BAD_ASTROM</code>, <code>BAD_FOCUS</code>, or <code>SHUTTERS</code>. </p>

<p>A field is considered photometric (QPHOT) if it is darker than 12
deg twi in the r-band, if the postage stamp pipeline did not return
errors in any band (that is, if <code>psp_status</code> is &lt;= 2 (in the lower 5
bits), which rejects <code>PSP_FIELD_NOPSF</code>,
<code>PSP_FIELD_ABORTED</code>, <code>PSP_FIELD_MISSING</code>,
<code>PSP_FIELD_OE_TRANSIENT</code>), and if <code><a
href="dr8/algorithms/bitmask_image_status.php">image_status</a></code>
doesn't have any of the bits set in any band: <code>CLOUDY</code>,
<code>UNKNOWN</code>, <code>FF_PETALS</code>, <code>DEAD_CCD</code>,
or <code>NOISY_CCD</code>.</p>

<p>Therefore, the possible values of the score are:</p>
<pre>
     [0]         -- No data or un-reducable data
     (0.1 ,0.5 ] -- Unphotometric data
     (0.6 ,1   ] -- Photometric data
</pre>
<p>The range between 0 and 0.1 is reserved for fast "binned" Apache Wheel
drift scans used in the calibration of the survey.</p>

<h3>Geometry of the primary survey</h3>

<table class="centerfigure">
<tr><td><a href="images/resolve_balkans.png"><img src="images/resolve_balkans.png" alt="example of figures" /></a></td></tr>
<tr><td>Example set of balkans (polygons describing
survey coverage). Note that you can see the imprint of the overlapping
runs in the resulting set of disjoint polygons.</td></tr>
</table>

<p>As noted above, the primary survey area is defined as the union of
all of the fields. Determining this area requires two steps: first,
determining for each position on the sky which fields cover it;
second, at each position determine which field should be considered
primary.</p>

<p>To determine which fields cover which positions, we treat each
field as a four-sided spherical polygon (a spherical rectangle?) on
the sky defined by its trimmed area as described above (which is
<code>1920x1361</code> pixels in size).  For an example case, the
figure shows the boundaries of all the fields.  Notice that there is a
unique set of disjoint polygons on the sky defined by all the field
boundaries. In fact, one can calculate exactly what all those polygons
are using the package <a
href="http://space.mit.edu/~molly/mangle/">mangle</a>. We refer to
them here as "balkans." Each field is broken into several balkans, and
each balkan is fully covered by a single combination of one or more
fields.</p>

<p>Then, for each balkan we determine which field that covers it is
primary. We start with the highest ranked field. It becomes primary
for any balkan covered by it. Then we step to its adjacent fields in
the same run and camcol. As long as their score is within 0.05 of the
initial field we assign them primary to the balkans they cover as
well. We continue along the camcol in both direction until we reach a
substantially worse field than the first. Once that is done, we then
step to the next highest ranked field that has not already been
assigned. We execute the same steps for that field. Finally, we
iterate this procedure until we have assigned all of the
fields. During this procedure, if a balkan has already been assigned a
primary field, that assignment is not change.</p>

<p>The result is that for any area, the highest score fields that
cover it will most likely be primary. The reason we step through the
surrounding fields is to avoid changing between two comparably good
runs on the same strip; for homogeneity, it is better just to pick one
and go with it if the different in quality is not too large.</p>

<h3>Resolving catalog detections</h3>

<p>Once the window function is defined, we can resolve multiple
detections of individual objects. This proceeds in four steps:</p>
<ol>
<li> defining the set of "run primary" detections, unique in each
run and selected as <code>RUN_PRIMARY</code> as described above;</li>
<li> defining the set of "survey primary" detections, unique across
the survey as a whole and detected in the primary area of field and
selected as <code>SURVEY_PRIMARY</code> as described above; </li>
<li>defining the set of "best"
detections, unique in the survey as a whole but with no detection in
the primary field covering its position, and selected as
<code>SURVEY_BEST</code>
using <code><a
href="dr8/algorithms/bitmask_resolve_status.php">resolve_status</a></code>; and</li>
<li>defining the set of secondary detections, duplicate detections
of survey primary detections, and selected as
<code>SURVEY_SECONDARY</code> using
<code><a
href="dr8/algorithms/bitmask_resolve_status.php">resolve_status</a></code>.</li>
</ol>

<p>The first step is the "run resolve" step, where duplicates between
adjacent fields in a run are resolved. In this step, we select objects
which are in the <code>2048x1361</code> central area of the corrected
frame for the field, as described above. However, along the edges in
the drift scan direction, we take care to account for small
astrometric differences that might cause lost or duplicate objects.
To do so, if any two detections in adjacent fields are within 2 arcsec
of each other and straddle an edge, one and only one of them is chosen
as primary for the run. For objects that pass these selection cuts,
the <code>RUN_PRIMARY</code> bit of <code>resolve_status</code> is
set. </p>

<p>Note that <code>RUN_PRIMARY</code> objects within 64 pixels of the
boundary perpendicular to the scan edge (columns 0 to 63 and 1984 to
2047) are marked <code>RUN_EDGE</code>.  <code>RUN_EDGE</code> objects
in almost all cases do not become <code>SURVEY_PRIMARY</code>.</p>

<p>In addition, we do not allow any <code>RUN_PRIMARY</code> objects
which are parents, are classifed as <code>BRIGHT</code> detections, or
have been classified as "SKY" or "CR" in the "type" indicator. This
exclusion also means that such objects can never be primary for the
full survey either.</p>

<p>The second step is to define the "survey primary" detections, which
is a list of unique detections among all the runs. In each area of
sky, detections can only be primary if they are from the primary field
in that direction as defined by the window function above. To find
this set of objects, we loop over all the balkans defining the survey
geometry. From the primary field covering each balkan, we select
<code>RUN_PRIMARY</code> detections that are within the balkan, or
within 1 arcsec of the edge. In this step we ignore
<code>RUN_EDGE</code> objects (mostly! see next paragraph).  We match
each selected detection to the current list of primary detections. If
it matches a previous primary detection, as it might if it is near the
edge of the balkan, then we do not include it (this step accounts for
small astrometric jitter between adjacent balkans). Otherwise it is
called <code>SURVEY_PRIMARY</code> in <code>resolve_status</code>.</p>

<p>As this procedure is performed, we are also careful to check
detections that are close to, but outside, the "official" boundaries
perpendicular to the scan direction. That is, we check those marked
<code>RUN_EDGE</code> but within 1 arcsec of the border. Sometimes it
happens that there are multiple detections of the same source from
different runs, but both detections are in this tiny strip.  Rather
than lose such objects, we flag the one in the higher quality field as
<code>SURVEY_PRIMARY</code>. </p>

<p>The third step is to define the "survey best" detections, which is
a list of unique detections, but in cases where there is no detection
of the source in the primary field covering it. Such cases can occur
for transient or low signal-to-noise sources, where it is detected in
some fields observing it but not in others. To find such objects, we
loop over all the fields, and match all of the <code>RUN_PRIMARY</code> objects to
the full list of <code>SURVEY_PRIMARY</code> objects.  Objects that are unmatched
are good detections in this field, but have no corresponding primary
objects, and are labeled as <code>SURVEY_BEST</code> in
<code>resolve_status</code>.</p>

<p>Finally, the last step is to define the "survey secondary"
detections, which are the duplicate detections of primary or best
objects. To find such objects, we loop over all fields and select
objects which are <code>RUN_PRIMARY</code> but neither <code>SURVEY_PRIMARY</code> nor
<code>SURVEY_BEST</code>. We match these objects against the <code>SURVEY_PRIMARY</code> and
<code>SURVEY_BEST</code> lists (excluding objects in this field).  If it is
matched, and the balkan containing the primary/best observation
contains the current field we are considering, then this detection is
labeled <code>SURVEY_SECONDARY</code>.</p>

<p>As these procedures are run, we create the <a
href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/thingList.html">thingList</a>
and <a
href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/thingIndex.html">thingIndex</a>
files. <a
href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/thingList.html">thingList</a>
has all of the detections in it and labels its status
(e.g. <code>SURVEY_PRIMARY</code>, <code>SURVEY_BEST</code> or <code>SURVEY_SECONDARY</code>) as well as
listing the <code><a href="dr8/glossary.php#thingid">thing_id</a></code> of its primary if appropriate. <a
href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/thingIndex.html">thingIndex</a>
is a list of all unique detections, listing the <code>SURVEY_PRIMARY</code> or
<code>SURVEY_BEST</code> detection as appropriate. Above we describe how to use
these files to find primaries and to find multiple detections of each
object.</p>

<p>At the end of the process, most <code>RUN_PRIMARY</code> detections
have one of <code>SURVEY_PRIMARY</code>, <code>SURVEY_BEST</code> or
<code>SURVEY_SECONDARY</code> set. The only exceptions are those
<code>RUN_PRIMARY</code> objects which also have <code>RUN_EDGE</code>
set; while such objects can have a survey status, they do not have
to.</p>

<h3>Toy example</h3>

<table class="centerfigure">
<tr><td><a href="images/resolve-example.jpg"><img src="images/resolve-example.jpg" alt="example of figures" /></a></td></tr>
<tr><td>Toy example of resolve, in terms of a survey
with only two fields. The balkans it is broken up into are shown. The
background color indicates which field is primary in which area. The
RUN_PRIMARY objects for each field are shown. Except in the indicated
cases, these all become SURVEY_PRIMARY in the resolve.</td></tr>
</table>

<p>The basics of the algorithm can be illustrated with a toy example,
shown above.  There are two fields in this toy survey, which
overlap.  The geometry is broken up into five balkans (not three,
since each balkan must be convex). In this case, in four of the
balkans, there is only a single field. In the other one, balkan 1,
there are two fields covering the area. The better field is chosen as
primary.</p>

<p>In this case, the <a
href="http://data.sdss3.org/datamodel/files/PHOTO_RESOLVE/window_unified.html">window_unified.fits</a>
file would have 5 entries. For one of them, balkan 0,
<code>IFIELD</code> would be set to 0, and for balkans 1 through 4,
<code>IFIELD</code> would be set to 1. </p>

<p>Shown in the figure are the RUN_PRIMARY objects detected in each
field. Those which are in the area of their field which is primary
will become SURVEY_PRIMARY (that is, all of the field 1 objects, and
the field 0 objects which are in balkan 0).</p>

<p>In this case, there are two objects detected in field 0 that are in
the overlap between the two fields, where field 0 is not primary. One
object matches a field 1 SURVEY_PRIMARY object, and thus is called
SURVEY_SECONDARY.  It will be given the same THING_ID as the
corresponding field 1 object. The other object does not match any
field 1 SURVEY_PRIMARY object; this is a case that will be flagged
SURVEY_BEST. Finally, note that there is a field 1 object with no
matching field 0 object.</p>

<h3>Caveats</h3>

<p>A very rare case occurs for objects just outside of the first or
last field of a run in the scan direction, where the object must be
included in analogy to the <code>RUN_EDGE</code> case described
above. In exactly one case such an object has not been designated
<code>RUN_PRIMARY</code> but <em>is</em> designated
<code>SURVEY_PRIMARY</code>, which is the only example of that in the
survey. </p>

<?php echo foot(); ?>
