<?php include '../../header.php'; echo head('Deblending Overlapping Objects'); ?>

<p>One of the jobs of the <a
href="dr9/help/glossary.php#frames_pipeline">frames pipeline</a> is
to decide if an initial single detection is in fact a blend of
multiple overlapping objects, and, if so, to separate, or
<em>deblend</em> them. The deblending process is performed
self-consistently across the bands (thus, all children have
measurements in all bands). After deblending, the pipeline again
measures the properties of these individual children.</p>

<p>Bright objects are measured at least twice: once with a global sky
and no deblending run (this detection is <a
href="dr9/algorithms/flags_detail.php#bright">flagged

<code>BRIGHT</code></a>) and a second time with a local sky. They may
also be measured more times if they are <code>BLENDED</code> and a
<code>CHILD</code>.</p>

<p> Once objects are detected, they are deblended by identifying
individual peaks within each object, merging the list of peaks across
bands, and adaptively determining the profile of images associated
with each peak, which sum to form the original image in each band. The
originally detected object is referred to as the "parent" object and
has the <a href="dr9/algorithms/flags_detail.php#blended">flag
<code>BLENDED</code></a> set if multiple peaks are detected; the final
set of subimages of which the parent consists are referred to as the
"children" and have the <a
href="dr9/algorithms/flags_detail.php#blended">flag
<code>CHILD</code></a> set. Note that all quantities in the
photometric catalogs (currently in the <a
href="dr9/help/glossary.php#photoobj">photoObj files</a>) are measured for
both parent and child. For each child object, the quantity

<em>parent</em> gives the object id (<a
href="dr9/help/glossary.php#object"><em>object</em></a>) of the
parent (for parents themselves or isolated objects, this is set to the
object id of the <code>BRIGHT</code> counterpart if that exists;
otherwise it is set to -1); for each parent, <em>nchild</em> gives the
number of children an object has. Children are assigned the id numbers
immediately after the id of the parent. Thus, if an object with id 23
is set as <code>BLENDED</code> and has <em>nchild</em> equal to 2,
objects 24 and 25 will be set as <code>CHILD</code> and have

<em>parent</em> equal to 23.  </p>

<p> The list of peaks in the parent is trimmed to combine peaks (from
different bands) that are too close to each other (if this happens,
the <a href="dr9/algorithms/flags_detail.php#deblend">flag
<code>PEAKS_TOO_CLOSE</code></a> is set in the parent). If there are
more than 25 peaks, only the most significant are kept, and the <a
href="dr9/algorithms/flags_detail.php#deblend">flag
<code>DEBLEND_TOO_MANY_PEAKS</code></a> is set in the parent.</p>

<p>In a number of situations, the deblender decides not to process a
<code>BLENDED</code> object; in this case the object is <a
href="dr9/algorithms/flags_detail.php#blended">flagged as
<code>NODEBLEND</code></a>. Most objects with <a
href="dr9/algorithms/flags_detail.php#edge"><code>EDGE</code></a>
set are not deblended. The exceptions are when the object is large
enough (larger than roughly an arcminute) that it will most likely not
be completely included in the adjacent scan line either; in this case,
<a
href="dr9/algorithms/flags_detail.php#edge"><code>DEBLENDED_AT_EDGE</code></a>
is set, and the deblender gives it its best shot. When an object is
larger than half a frame, the deblender also gives up, and the object
is <a href="dr9/algorithms/flags_detail.php#centroid">flagged
as <code>TOO_LARGE</code></a>. Other intricacies of the deblending
results are recorded in flags described on the <a
href="dr9/algorithms/photo_flags.php#flagsdescstatus">Object Flags
section</a> of the Flags page.  </p>

<p>On average, about 15% - 20% of all detected objects are blended,
and many of these are superpositions of galaxies that the deblender
successfully treats by separating the images of the nearby
objects. Thus, it is almost always the childless
(<code>nChild</code>=0, or <code>!BLENDED || (BLENDED &amp;&amp;
NODEBLEND)</code>; equivalently <code>status = GOOD</code>) objects
that are of most interest for science applications. Occassionally, very
large galaxies may be treated somewhat improperly, but this is quite
rare. <!-- For examples of the deblender at work, see <a -->
<!-- href="http://www.astro.princeton.edu/~rhl/Zwicky/20/">Robert Lupton's -->
<!-- page of all the Zwicky galaxies in run 756/20</a>. --></p>

<p>The behavior of the deblender of overlapping images has been
further improved since the DR1; these changes are most important for
bright galaxies of large angular extent (&gt; 1 arcmin).  In the EDR,
and to a lesser extent in the DR1, bright galaxies were occasionally
"shredded" by the deblender, <i>i.e.</i>, interpreted as two or more
objects and taken apart.  With improvements in the code that finds the
center of large galaxies in the presence of superposed stars, and the
deblending of stars superposed on galaxies, this shredding now rarely
happens.  Indeed, inspections of several hundred NGC galaxies shows
that the deblend is correct in 95% of the cases; most of the
exceptions are irregular galaxies of various sorts.</p>



<?php echo foot(); ?>
