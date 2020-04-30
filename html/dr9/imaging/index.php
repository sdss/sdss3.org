<?php include '../../header.php'; echo head('Imaging data'); ?>

<!--
<table class="figure" style="width:300px;">
<tr><td><a href="images/dr8_spectro_coverage.png"><img src="images/dr8_spectro_coverage.thumb.png" alt="DR8 spectroscopic coverage" width="300" /></a></td></tr>
<tr><td>DR8 imaging and spectroscopic coverage.</td></tr>
</table>
-->

<div class="summary">
<p>Data Release 9 includes the same
<a href="dr9/scope.php">sky coverage</a> as the previous data release (DR8).
No new imaging data are released in DR9, but systematic errors in astrometry and
proper motions introduced with DR8 have been fixed.</p>
</div>


<table class="figure" style="width:400px;">
<tr><td>
<a href="http://skyserver.sdss3.org/dr9/en/tools/chart/navi.asp?ra=151.38274&amp;dec=0.077247&amp;opt=S">
<img src="images/skyserver_pal3_navigator.jpg" alt="A screenshot of the Navigate tool. A frame
in the center shows an image of the globular cluster with red squares marking which
stars have measured spectra. A panel on the right shows magnitudes of the selected star,
with links to more data." /></a></td></tr>
<tr><td>The Navigate tool showing globular cluster Palomar 3 (click on the image to go to the
Navigate tool in this view)</td></tr>
</table>

<p>The quickest way to view SDSS imaging data for an area of sky is the SkyServer
<a href="http://skyserver.sdss3.org/dr9/en/tools/chart/navi.asp">Navigate</a> tool. Navigate
provides an interactive image of a given area of sky, with an overlay of catalog
data for objects identified in that sky area. When you click on an object, its
data appears, with links to more detailed data.</p>

<h2 id="catalogdata">Catalog data</h2>

<p>All imaging catalog data is available through the search tools of SkyServer. The
<a href="http://skyserver.sdss3.org/dr9/en/tools/search/IQS.asp">Imaging Query Form</a>
lets you search for catalog objects by position, magnitude, and other imaging constraints.
<a href="http://skyserver.sdss3.org/dr9/en/tools/search/sql.asp">SQL Search</a> lets you
create your own search; see the SkyServer
<a href="http://skyserver.sdss3.org/dr9/en/help/howto/search/">SQL Tutorial</a> to
learn how to write SQL queries. An even more flexible and powerful interface is
<a href="http://skyservice.pha.jhu.edu/casjobs/">CasJobs</a>, which allows you to
save and analyze all your search results.</p>

<h2 id="fits">Imaging files (FITS)</h2>

<p>In addition to catalog data, SDSS also makes all its imaging available
through the <a href="http://dr9.sdss3.org">Science Archive Server</a> (SAS), which can return
FITS files either <a href="http://dr9.sdss3.org/fields">for single SDSS fields</a> or
<a href="http://dr9.sdss3.org/bulkFields">in bulk</a>. Available imaging includes not
only the final output of the Imaging pipeline (<em>calibrated frames</em>), but also
intermediate images at various stages of processing. To learn how to work with SDSS
FITS images, see <a href="dr9/imaging/imaging_basics.php">Understanding SDSS
Imaging Data</a>.</p>

<h2 id="more">More information on SDSS imaging</h2>

<p>These pages describe how to use SDSS-III imaging data. Use the links below to learn more.</p>

<ul>
<li><a href="dr9/imaging/imaging_basics.php">Understanding SDSS imaging</a> describes how
SDSS imaging data are organized, and provides definitions for SDSS-specific terms.</li>
<li> <a href="dr9/imaging/imaging_access.php">Available data</a> describes
what images and imaging catalog data products are available through the SAS and CAS.</li>
<li> <a href="dr9/imaging/pipeline.php">Pipeline</a> describes how the imaging
pipeline generates outputs from raw images</li>
<li> <a href="dr9/imaging/images.php">Image files</a> describes
the available FITS images.</li>
<li> <a href="dr9/imaging/catalogs.php">Imaging catalogs</a> describes
the available imaging catalog products.</li>
<li> <a href="dr9/imaging/other_info.php">Image quality</a> describes some
quantifications of imaging quality.</li>
<li> <a href="dr9/imaging/caveats.php">Caveats</a> describes a
number of known issues regarding the images.</li>
</ul>


<p>See <a href="dr9/data_access/">Data Access</a> for a guide on how to access DR9 data,
and <a href="dr9/data_access/tools.php">Available Tools</a> for a complete list of options.
This page gives quick links to some of the most common tools for accessing SDSS images.</p>



<p>The SDSS imaging camera took its first science quality data the
night of September 19, 1998, and was the world's most productive
wide-field imaging facility until its last night of science quality
data on November 18, 2009. In between it took a total of around 35,000
square degrees of images, covering a unique footprint of 14,055 square
degrees of sky.</p>

<p>For more detailed information about how SDSS data were processed, see the
<a href="dr9/algorithms/">Algorithms</a> section.</p>


<?php echo foot(); ?>

