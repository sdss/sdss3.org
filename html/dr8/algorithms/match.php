<?php include '../../header.php'; echo head('Matching photometry and spectra.'); ?>

<h2 id="intro">Introduction</h2>

<p>This page details how we determine which photometric objects match
each spectrum. This task is nontrivial because the original runs
used to target the SDSS spectra differs in many areas from the
"primary" runs covering thus areas in the final data set.  Even in
those cases where the primary and targeting runs were the same, the
photometric data has since been reanalyzed, and object detections and
identifier have changed.</p>

<p>There are two versions of matching photometry for each spectrum: a
positional match within 2 arcsec, and a flux-based match that tells
you which object contributed the most light to the spectrum.  These
two matches differ about 0.5% of the time.</p>

<p> Position-based matches are stored in the spectroscopic catalog as
<code>origobjid</code>, and are most appropriate for
spectrophotometry.  Flux-based matches are stored as
<code>bestobjid</code> (the usual default), and are superior if you
primarily want redshifts; in particular, they recover a number of
nearby galaxy much better than the position-based match.</p>

<p>If you know for a fact that the spectrum you are interested in is
of a point source (e.g. it is a star), then the position-based matches
are sufficient; that is, in such cases, the flux-based match is
unlikely to be appropriate. However, in such cases, if the
position-based match and flux-based match disagree
(<code>origobjid!=bestobjid</code>) then with great
certainty the photometry and astrometry of the position-based match is
incorrect and should be used with great caution.</p>

<h2 id="position">Position-based matches</h2>

<p>Position-based matches are best to use if you are primarily
interested in the <a href="dr8/algorithms/magnitudes.php">fiber
fluxes</a>, for example for spectrophotometry. In addition, if you are
<strong>certain</strong> that your sources of interest are point
sources, the position-based match may be of interest (though take
great care if it differs from the flux-based match). </p>

<p>The position-based match simply finds the primary photometric
object closest to the location of the spectrum within 2 arcsec. Note
that for some number of objects, there is no such match (either the
target object does not exist in the latest version of the imaging at
that location, or the original target was a "sky" fiber).</p>

<p> In the flatfiles, the information about this match is stored in
the <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/photoMatchPlate.html">photoMatchPlate</a>
file (in the columns labeled with "orig"), and the detailed
photometric information compiled in the <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/photoPosPlate.html">photoPosPlate</a>
file.</p>

<p>In the CAS database, the <code>objid</code> of the position-matched
photometric object is stored in <code>origobjid</code> in the specObj
tables.</p>

<h2 id="flux">Flux-based matches</h2>

<p>The flux-based match is usually appropriate and typically more
accurate for large, nearby galaxies. In particular, the latest
photometric pipeline version deblends parent objects into children
differently than the version used for targeting. Therefore, the
spectrum we took of a galaxy might be significantly away from the
location that we now deem to be the "center." The "flux-based"
matches recover many such cases.</p>

<p>The flux-based match is determined as follows:</p>
<ul>
<li> For spectra that have no position-based match, we find the
primary imaging field that contains the location of the spectrum. If
there are no detected pixels at the location of the spectrum (that is,
if it is not contained in a <a
href="dr8/glossary.php#parent">parent</a> object) then the object is
unmatched. Such objects typically result from sky fibers or from
transient objects such as satellites, in cases where the primary
imaging field in the final photometric catalog differs from the
original field used to target the spectroscopy.</li>
<li> Some spectra with no position-based match nevertheless fall
within the boundaries of some "parent" object.  In these cases, we
perform 3 arcsec aperture photometry in the r-band at the location of
the spectrum, using the atlas images of the parent and all of its
children. We choose the child that contributes the most flux to the
parent as the flux-based match, and store its object id as the
<code>bestobjid</code> associated with the spectrum. </li>
<li> Finally, for spectra with a position-based match, we compare the
3 arcsec fiber flux with a 3 arcsec aperture flux based on the radial
profile measured by <code>photo</code>.  The fiber magnitude is based
on the parent atlas image, whereas the radial profile is calculated
using only the child atlas image. Therefore, in cases where our
aperture flux is less than 50\% of the fiber flux, it signifies that
some other child may have contributed more light to the fiber than the
position-matched child. In such cases, we perform aperture photometry
on the atlas images of the children and select the child with the most
flux as the flux-based match, and store its object id as the
<code>bestobjid</code> associated with the spectrum.  </li>
</ul>

<p>About 0.5% of all spectra have flux-based matches that differ from
the position-based matches. Typically, half of these are cases where
the photometry is irretreivably bad in some way (such as a long
satellite trail or airplane). The other half are cases where by-eye
the flux-based match appears more appropriate; that is, where the
redshift of the spectrum should be associated with the flux-based
match in the photometric catalog.</p>

<p> In the flatfiles, the information about the flux-based match is
stored in the <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/photoMatchPlate.html">photoMatchPlate</a>
file, and the detailed photometric information compiled in the <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/photoPlate.html">photoPlate</a>
file.</p>

<p>In the CAS database, the <code>objid</code> of the flux-based
matched photometric object is stored in <code>bestobjid</code> in the
specObj tables.</p>

<h2 id="example">Examples</h2>

<p>Below are shown two illustrative examples, one (A) a "success" of the
flux-based matching, and the other (B) a "failure".</p>

<p>In Example A, we targeted the HII region of a nearby galaxy (marked
with a red star at center).  This spectrum matched a detected object
in the final photometric catalog within 2 arcsec, yielding a
position-based match (marked with a blue cross).  However, most of the
light at that location is actually contributed by the galaxy as a
whole, in particular the child whose center is shown as the green box.
Thus, the "flux-based" match is to the child that basically
corresponds best to the galaxy, and this is normally the match one
would want. (Of course, sometimes you actually do just want the
position-based match, which we therefore also provide.</p>

<p>In Example B, we targeted a galaxy (marked with a red star at
center) that happens to be close to a very bright star. The
position-based match correctly finds the match in the final
photometric catalog. Because <code>photo</code>'s deblender can
misbehave in cases like this, most of the light from this galaxy is
actually assigned to the bright star, not to the galaxy. Thus, the
flux-based match is to the bright star, which is not
appropriate. However, in cases such as this, the position-based match
is of limited use in any case, because the photometry of the galaxy in
question is clearly highly flawed. </p>

<p>Other cases exist where the flux-based match does unexpected things
(such as for passing satellites accidentally targeted for
spectroscopy). In most such cases, achieving a meaningful and
scientifically useful match to a quality photometric object is in fact
impossible.</p>

<table class="noborder">
<tr>
<th style="text-align:center;width:350px;">Example A</th>
<th style="text-align:center;width:350px;">Example B</th>
</tr>
<tr>
<td><a href="images/flux-success.jpg"><img src="images/flux-success.jpg" alt="Flux-based Success" width="350" /></a></td>
<td><a href="images/flux-failure.jpg"><img src="images/flux-failure.jpg" alt="Flux-based Failure" width="350" /></a></td>
</tr>
</table>


<?php echo foot(); ?>
