<?php include '../../header.php'; echo head('Imaging caveats'); ?>

<div class="summary">
    <p>There are several small caveats to watch out for in SDSS
	imaging data. Some affect only a few objects or a few data columns, while
	some have wider impacts. Some caveats in DR8 were fixed in Data
	Release 9 and later those are listed on this page to allow for easier comparison between
	releases.</p>
	<p>This page contains a list of known
	caveats in SDSS Data Release 10 imaging data.</p>
</div>

<h2>List of caveats</h2>

<ol>
<li><a href="dr10/imaging/caveats.php#astrometry">Astrometry errors: FIXED IN DR9!</a></li>
<li><a href="dr10/imaging/caveats.php#skylev">Sky levels sometimes overestimated</a></li>
<li><a href="dr10/imaging/caveats.php#objid">Changes in SDSS object IDs</a></li>
<li><a href="dr10/imaging/caveats.php#timeout">Field timeouts</a></li>
<li><a href="dr10/imaging/caveats.php#flags2">Missing flag bits: FIXED!</a></li>
<li><a href="dr10/imaging/caveats.php#badcol">Bad CCD columns</a></li>
<li><a href="dr10/imaging/caveats.php#redleak">Very red objects</a></li>
<li><a href="dr10/imaging/caveats.php#usky">Bias in u-band sky</a></li>
<li><a href="dr10/imaging/caveats.php#highpmstars">Missing high-proper-motion stars</a></li>
<li><a href="dr10/imaging/caveats.php#cav_lowlat">Photometry at lower galactic latitudes</a></li>
<li><a href="dr10/imaging/caveats.php#cav_outlines">Missing atlas outlines in some camcols</a></li>
<!-- <li><a href="dr10/imaging/caveats.php#sectors">Missing survey geometry</a></li>
<li><a href="dr10/imaging/caveats.php#responselimit">SkyServer returns "response buffer limit exceeded"</a></li> -->
</ol>


<h2 id="astrometry">Not a caveat anymore! Astrometry errors corrected in DR9</h2>

<p>This caveat is appropriate for users of the DR8 catalog, but
irrelevant for DR9 and subsequent releases. The DR9/DR10 astrometry and
proper motions are superior to both DR8 and DR7.  </p>

<p>Because of several errors, the absolute astrometry in DR8 was
degraded relative to that in DR7, and degraded substantially northward
of a declination of around 40 deg. Note that the proper motions are
considerably less degraded. See the full details on the <a
href="dr8/algorithms/astrometry.php#caveats">DR8 astrometry algorithms
page</a>. Systematic errors introduced in DR8 southward of 40 deg
declination are typically smaller than or comparable to the 45 mas
systematic errors that characterize the SDSS astrometry for brighter
stars.  However, northward of 40 deg there is a systematic offset of
around 250 mas in the declination direction.  </p>

<p>For very precise astrometry it is necessary to use the DR9 version
of the catalog or, if it is necessary to use DR8, two special CAS
tables included in that release: <code>astromDR9</code> and
<code>properMotionsDR9</code>, described on the <a
href="dr8/algorithms/astrometry.php#dr9">DR8 astrometry algorithms
page</a>. These tables contain the values for positions and proper
motions that are distributed in the DR9 release.  (Note that there are
some much smaller differences between DR8 and DR9 because of
astrometry, in the sizes and position angles of objects for example;
these are tiny and are not included in these tables). </p>

<p><a href="dr10/imaging/caveats.php#Top">Back to top</a></p>


<h2 id="skylev">Overestimation of sky levels near  bright galaxies </h2>

<table class="figure" style="width:291px;">
<tr><td><a href="images/skytest_photometry.png"><img src="images/skytest_photometry_thumb.png" alt="Photometry of large galaxies" /></a></td></tr>
<tr><td>Differences between the true and measured sizes
 and magnitudes of large galaxies, based on simulated images.  The
 measured sizes are based on the better of the exponential and de
 Vaucouleurs models. The measured magnitudes are the <a
 href="dr10/algorithms/magnitudes.php#cmodel">cmodel</a>
 magnitudes. The galaxies are measured by <code>photo</code> to be
 smaller and less bright than they truly are.</td></tr>
</table>

<p>A number of investigators have shown that the sky subtraction
algorithm used by the photometric pipeline causes it to systematically
underestimate the brightness of large galaxies (<a
href="http://adsabs.harvard.edu/abs/2005AJ....129.2562B">Blanton et
al. 2005</a>, <a
href="http://adsabs.harvard.edu/abs/2007ApJ...662..808L">Lauer et
al. 2007</a>, <a
href="http://adsabs.harvard.edu/abs/2007AJ....133.1741B">Bernardi et
al. 2007</a>, and <a
href="http://adsabs.harvard.edu/abs/2007ApJ...660.1186L">Lisker et
al. 2007</a>, among others).  We quantified this by adding 1300 fake
galaxies at random positions to SDSS imaging frames, reducing them
with both the old (DR7) and new (DR8) versions of <code>photo</code>,
and comparing the results with the truth.  The galaxies, which have
S&eacute;rsic radial profiles with a range of inclinations and S&eacute;rsic
indices, follow the observed correlation between apparent magnitude
and angular size seen for real galaxies. However, we biased the sample
somewhat to larger and brighter objects, as this is the regime in
which the sky subtraction errors are likely to be worst; in addition,
the sample is approximately size-limited at <var>r<sub>50</sub></var>
~ 5 arcsec.</p>

<p> The results are shown at right, where we plot the difference
between measured and true magnitude in the <var>r</var> band for the
simulated galaxies for the DR7 (red) and DR8 (blue) versions of the
pipeline.  Results in the other bands are similar.  The new sky
subtraction algorithm helps, but is not a panacea.  The principal
trend is with galaxy size, because that couples most directly to the
sky measurement.  The bias at the largest sizes (of well over a
magnitude) is reduced in the new code by only about 0.25 magnitudes.
The improvement as a function of half-light radius is also subtle at
best, and is visible only for galaxies with <var>r<sub>50</sub></var>
&gt; 30 arcsec.  Some of the problem may be due not to sky subtraction,
but rather to the deblender systematically assigning some of the light
in the outer parts of galaxies to superposed fainter stars and
galaxies.</p>

<table class="figure" style="width:256px;">
<tr><td><a href="images/skytest_counts.png"><img src="images/skytest_counts_thumb.png" alt="Counts around large galaxies" /></a></td></tr>
<tr><td>Background galaxy counts around bright galaxies,
 for several different magnitude bins, in both DR7 and DR8.  Except in
 the case of the brightest foreground galaxies, the DR8 counts are
 always closer to flat with distance (which is the desired result).</td></tr>
</table>

<p>A related problem reported by
<a href="http://adsabs.harvard.edu/abs/2005MNRAS.361.1287M">Mandelbaum et al. (2005)</a> was an
observed suppression in the number density of faint galaxies around
bright galaxies, due to the sky misestimation caused by the latter. We
have reinvestigated this problem for the new photometric pipeline.
The results are shown at right, the number counts of faint galaxies
around bright galaxies as a function of bright galaxy magnitude.  In
three of the panels, all potential background galaxies are included,
and both DR7 (black) and DR8 (red) results are shown. In the bottom
right panel, faint galaxies with a possible physical association with
the bright galaxies are excluded, and only DR8 is shown.</p>

<p>In all cases, the background galaxy counts are perturbed by the
presence of the foreground galaxies; in particular, as the bottom
right panel shows, the effect seems to be a net removal of
sources. For DR8, the faint galaxy counts are substantially less
affected by the bright galaxies than for DR7, particularly for
foreground galaxies with <var>r</var> > 15. For the brightest set of
foreground galaxies (very rare on the sky), the sense of the change is
ambiguous, since it may be caused in an <em>improvement</em> in the
deblending of the brightest galaxies.</p>

<p><a href="dr10/imaging/caveats.php#Top">Back to top</a></p>

<h2 id="objid">Changes in OBJID and primary objects in DR8</h2>

<p>There are two major imaging bookkeeping changes between DR7 and
subsequent releases.</p>

<p>First, for DR8 and later releases the photometry was reduced using
a new version of the <code>photo</code> pipeline, under rerun "301".
The <a href="dr10/help/glossary.php#ObjID"><code>objID</code></a>
identifier depends on both the rerun value and the object number
within each field (called <code>id</code> in flat files or
<code>obj</code> in CAS). Both of these values can change under a new
rerun. Thus, all of the <code>objID</code> values of every object
changes from DR7 to DR8. </p>

<p>Second, the <a href="dr10/algorithms/resolve.php">resolve</a>
algorithm changed between DR7 and DR8. This algorithm determines which
fields are used as the "primary" observation of any given region of
sky and which catalog entries are the "primary" detections of the
given source. Thus, some fields (and objects) which were considered
primary in DR7 are not primary in DR8 (and vice-versa). Thus, the set
of runs that contribute to the <code>photoPrimary</code> table in CAS
are different, even in areas where no new imaging was taken between
DR7 and DR8.  Note that one aspect of the new resolve algorithm is
that there are no "special" runs or areas of the survey; SEGUE runs
and other imaging outside the "Legacy" survey area is all treated the
same way. </p>

<p>For users who need to match between DR7 and DR8 (or subsequent), we
recommend using the <code>photoObjDR7</code> and
<code>photoPrimaryDR7</code> tables in CAS> The
<code>photoObjDR7</code> stores a positional match between the DR7 and
DR8 data within each run (that is, it only allows a match between the
two data releases for two catalog entries within the same run).  The
<code>photoPrimaryDR7</code> table matches between the "primary"
photometry for each data release (so can contain a match between an
object in run X of DR7 but run Y of DR8). </p>

<p><a href="dr10/imaging/caveats.php#Top">Back to top</a></p>


<h2 id="timeout">DR8 field timeouts more common</h2>

<p>About 1% of fields in DR8 timed out, whereas that rate was about
0.1% in DR7. These cases are usually due to large galaxies or bright
stars; on fields containing such objects, the new sky-subtraction
techniques cause larger deblends and processing times. Many of the
timed-out fields in DR8 are in the Galactic Plane; the rate at
Galactic latitudes greater than 15 deg is about 0.5%. </p>

<p>One can identify a timed-out field in the <code>field</code> table
or <code>photoField</code> files with the <code>photoStatus</code>
flag, which is set to 3 for timed-out fields.  See the <a
href="dr10/algorithms/image_quality.php">image quality documentation</a>
for a more complete description.</p>

<p><a href="dr10/imaging/caveats.php#Top">Back to top</a></p>

<h2 id="flags2">Not a caveat anymore! Early DR8 version missing bits in (flags, flags_u, flags_g, flags_r, flags_i, flags_z), now fixed in DR8 and DR9</h2>

<p>Until June 2011, the CAS photoObj tables (and all related views),
the <code>flags</code> variables were missing the last 32 bits of
information. This included <code>flags</code>, <code>flags_u</code>,
<code>flags_g</code>, <code>flags_r</code>, <code>flags_i</code>, and
<code>flags_z</code>. This error occurred due to an error in preparing
the inputs for the database load.</p>

<p>This problem has been repaired in the current version of the DR8
database.</p>

<p><a href="dr10/imaging/caveats.php#Top">Back to top</a></p>


<h2 id="badcol">Bad CCD columns</h2>

<p>Some chips have bad CCD columns which get interpolated over by the
photometric pipeline, leading to noticeably correlated noise. The bad
columns for each run are currently available in <a
href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/fpM.html">fpM*.fits</a>.
These files can be found on the Science Archive Server in the
<code>objcs</code> subdirectory of each <code>run/rerun</code>
directory (<em>e.g.</em>, <a
href="http://data.sdss3.org/sas/dr10/boss/photo/redux/301/1740/objcs/1/">http://data.sdss3.org/sas/dr10/groups/boss/photo/redux/301/1740/objcs/1/</a>.
They can be read with the <code>read_mask</code> command; see our
description of <a href="dr10/imaging/images.php#atlas">reading atlas
images</a> for access to that software.</p>

<p><a href="dr10/imaging/caveats.php#Top">Back to top</a></p>


<h2 id="redleak">Very red objects</h2>

<p>The <var>u</var> filter has a natural red leak around 7100 &Aring;
which is supposed to be blocked by an interference coating.  However,
under the vacuum in the camera, the wavelength cutoff of the
interference coating has shifted redward (see the discussion in the
EDR paper), allowing some of this red leak through.  The extent of
this contamination is different for each camera column.  It is not
completely clear if the effect is deterministic; there is some
evidence that it is variable from one run to another with very similar
conditions in a given camera column.  Roughly speaking, however, this
is a 0.02 magnitude effect in the <var>u</var> magnitudes for mid-K
stars (and galaxies of similar color), increasing to 0.06 magnitude
for M0 stars (<var>r-i</var> ~ 0.5), 0.2 magnitude at <var>r-i</var> ~
1.2, and 0.3 magnitude at <var>r-i</var> = 1.5.  There is a large
dispersion in the red leak for the redder stars, caused by three
effects:</p>

<ul>
  <li>The differences in the detailed red
leak response from column to column, beating with the complex red
spectra of these objects.</li>
  <li>The almost certain time variability of the red leak.</li>
  <li>The red-leak images on the <var>u</var> chips are out of focus and are
      not centered at the same place as the <var>u</var> image because of
      lateral color in the optics and differential refraction - this means
      that the fraction of the red-leak flux recovered by the PSF fitting
      depends on the amount of centroid displacement.</li>
</ul>

<p>To make matters even more complicated, this is a <em>detector</em>
effect.  This means that it is not the real <var>i</var> and
<var>z</var> which drive the excess, but the instrumental colors
(<em>i.e.</em>, including the effects of atmospheric extinction), so the leak
is worse at high airmass, when the true ultraviolet flux is heavily
absorbed but the infrared flux is relatively unaffected.  Given these
complications, we cannot recommend a specific correction to the
<var>u</var>-band magnitudes of red stars, and warn the user of these
data about over-interpreting results on colors involving the
<var>u</var> band for stars later than K.</p>

<p><a href="dr10/imaging/caveats.php#Top">Back to top</a></p>


<h2 id="usky">u-band sky</h2>

      <p>There is a slight and only recently recognized downward bias in the
determination of the sky level in the photometry, at the level of
roughly 0.1 DN per pixel.  This is apparent if one compares
large-aperture and PSF photometry of faint stars; the bias is of order
29 mag arcsec<sup>-2</sup> in <var>r</var>.  This, together with
scattered light problems in the <var>u</var> band, can cause of order
10% errors in the <var>u</var> band Petrosian fluxes of large
galaxies. As implied, this effect does perturb galaxy colors; that is
the sky subtraction problem described above has slightly worse effects
on the <var>u</var> band than on other bands.</p>

<p><a href="dr10/imaging/caveats.php">Back to top</a></p>


<h2 id="highpmstars">Missing high proper-motion stars </h2>

<p>
A comparison of SDSS catalogs has shown that high proper motion
stars from Sebastien Lepine's database (SUPERBLINK) are not registered
as high proper motion stars in the DR6. For those stars, the <a
href="http://skyserver.sdss3.org/dr10/en/help/browser/browser.aspx#&&history=description+ProperMotions+U">ProperMotions
table</a> lists <var>pm</var>=0.0. The reason their motion is not
registered in DR6 is because of the incompleteness of the USNO-B
catalog, from which the DR6 proper motions are derived. Areas where
the incompleteness is particularly severe include regions where there
are bad SERC-I or POSS-II N plates (open squares, list from
J. Munn).</p>

<p>If one tries to select off nearby stars with <em>e.g.</em> a
<var>pm</var>&lt;0.75 mas/yr proper motion cutoff, then the sample
will be contaminated with these &quot;<var>pm</var>=0&quot; high
proper motion stars. The plot shows the stars with
<var>pm</var>&gt;100 mas/yr, which are relatively rare, but I suspect
that a similar fraction of 10 mas/yr &lt; <var>pm</var> &lt; 100
mas/yr stars will be similarly unregistered in the DR6, which can add
up a lot of foreground contaminants.</p>

<table class="centerfigure">
<tr><td><a href="images/DR6_missinghighpmstars.jpg"><img src="images/DR6_missinghighpmstars_thumb.jpg" alt="Missing high proper motion" /></a></td></tr>
<tr><td>Top panel: high proper motion stars from the
Superblink survey that are missing in DR6. Bottom panel: High proper
motion stars recovered by SDSS.</td></tr>
</table>

<p>At the moment, the only mitigation strategy is to avoid the regions
where contamination will be most severe.</p>

<p><a href="dr10/imaging/caveats.php#Top">Back to top</a></p>



<h2 id="cav_lowlat">Incomplete and/or inaccurate photometry at low galactic latitudes</h2>

<p>DR8 includes a fair amount of imaging at low Galactic latitude |b|
&lt; 25 degrees, and as such, there are highly crowded fields, and
regions of high extinction. These data were processed with the
standard SDSS photo pipelines. Since these pipelines were not designed
to work in such crowded regions, the quality of the photometry in
these areas is not guaranteed to be accurate to the SDSS quoted limits
of 2% in color and <var>r</var> magnitude, nor is each and every
crowded frame fully deblended; <em>i.e.</em>, many fields are
incompletely cataloged. Some fields, in particular many at |b| &lt; 5
degrees, time out completely and have no cataloged objects
whatsoever. Using the <a href="dr10/algorithms/image_quality.php">image
quality flags</a> is often useful to identify such cases.</p>

<h2 id="cav_outlines">Missing atlas outlines in some camcols</h2>

<p>In DR9 and beyond, photometric object outlines are missing for some camcols of 
some imaging fields. For these fields, the <em>Outlines</em> option will not be 
available in the SkyServer 
<a href="http://skyserver.sdss3.org/dr10/en/tools/chart/navi.aspx">Navigate</a> tool.</p>

<p>The missing camcols are:</p>

<table class="common">
	<tr>
    	<th>Run</th>
        <th>Full</th>
        <th>Partial</th>
        <th>Missing</th>
    </tr>
    <tr>
    	<td>1462</td>
        <td>1-2</td>
        <td>3</td>
        <td>4-6</td>
    </tr>
    <tr>
    	<td>2326</td>
        <td>1</td>
        <td>2</td>
        <td>3-6</td>
    </tr>
    <tr>
    	<td>6794</td>
        <td>1</td>
        <td>None</td>
        <td>2-6</td>
    </tr>
</table>    


<!-- 
<p><a href="dr10/imaging/caveats.php#Top">Back to top</a></p>

<h2 id="sectors">Missing survey geometry</h2>

<p>The survey geometries, including
<a href="http://skyserver.sdss3.org/public/en/help/browser/browser.aspx?n=sdssSector&t=U">Sectors</a>
and
<a href="http://skyserver.sdss3.org/public/en/help/browser/browser.aspx?n=fFootprintEq&t=F">Footprints</a>,
will be created shortly. We are also developing a new Geometry viewer, which will
allow interactive inspection of the different survey boundaries.</p> <span class="todo">Is this still true??</span>

<p><a href="dr10/imaging/caveats.php#Top">Back to top</a></p>

<h2 id="responselimit">SkyServer returns "response buffer limit exceeded"</h2>

<p>A <a href="http://skyserver.sdss3.org/public/en/tools/search/sql.aspx">SQL Search</a> query
on SkyServer might, on very rare occasions, return the following error:<br /><br />

<code>
 SQL returned the following error message:<br />
006~ASP 0251~Response Buffer Limit Exceeded~Execution of the ASP page caused the Response Buffer to exceed its configured limit.<br />
Your SQL command was:<br />
</code>
</p>

<p>This message is due to a default behavior of Microsoft Internet Information Services (IIS)
version 6.0 and higher -
<a href="http://support.microsoft.com/kb/925764">documented in the Microsoft Knowledge Base</a> -
in which responses to actions of Active Server Pages (.asp) are limited to 4 MB file size.</p>

<p>This error is extremely rare, but there is a simple workaround: simply run the
query in <a href="http://skyserver.sdss3.org/casjobs/">CasJobs</a> instead.</p> -->

<p><a href="dr10/imaging/caveats.php#Top">Back to top</a></p>


<?php echo foot(); ?>

