<?php include '../../header.php'; echo head('Help!'); ?>

<p>Please look at the FAQ and tutorials below to see if your question
has an answer.  Much of what you need to know is already
available:</p>

<ul>
<li>For help on the <a
href="http://skyserver.sdss3.org">SkyServer</a> or <a
href="http://skyservice.pha.jhu.edu/casjobs/">CASJobs</a>, or
to know more about SQL, consult the <a
href="http://skyserver.sdss3.org/dr8/en/help/docs/default.asp">SkyServer
DR8 Help</a>.</li>
<li>If you want a list of tools for accessing the data, consult the <a
href="dr8/data_access.php">data access documentation</a>.</li>
<li>If you have questions about the nature of the data (what is a
plate? what is a run?) consult the <a
href="dr8/spectro">spectroscopic</a> and <a
href="dr8/imaging">imaging</a> documentation pages.</li>
<li>If you have a question about a technique used in the data
analysis, see if it is addressed in the <a
href="dr8/algorithms">algorithms documentation</a>.</li>
<li>If there is a term you don't understand, try to find it in the
<a href="dr8/glossary.php">glossary</a>.</li>
<li>If you are looking at a file from SAS and want to know more about
its contents, consult the <a
href="http://data.sdss3.org/datamodel">survey data model</a>.</li>
</ul>

<p>If the FAQ and tutorials below, as well as the documentation here
or on SkyServer, fail to answer your question, you may email us at <a
href="mailto:helpdesk@sdss.org">the helpdesk</a>, and your question
will be directed to a survey expert.</p>

<p>Jump to:</p>

<p><a href="dr8/help/#faq">[FAQs]</a>&nbsp;<a href="dr8/help/#tutorial">[Tutorials]</a></p>

<hr />

<h2 id="faq">FAQs</h2>

<h3>General Questions</h3>

<ol>
  <li><a href="dr8/help/#whatissdss">What is the Sloan Digital Sky Survey-III?</a></li>
  <li><a href="dr8/help/#data">How can I get SDSS data?</a></li>
  <li><a href="dr8/help/#casdas">What is the Catalog Archive Server (CAS)? What is the Science Archive Server (SAS)?</a></li>
  <li><a href="dr8/help/#whatisskysrv">What is SkyServer?</a></li>
  <li><a href="dr8/help/#images">Where in the sky do the data come from?</a></li>
  <li><a href="dr8/help/#searchtools">How can I search for data?</a></li>
  <li><a href="dr8/help/#whathelp">What help is available?</a></li>
  <li><a href="dr8/help/#learn">I am a teacher. How can I use the data in my classes?</a></li>
  <li><a href="dr8/help/#findobj">How can I see if the SDSS has an image of my favorite object?</a></li>
  <li><a href="dr8/help/#crossmatch">How can I match a list of objects to see what the SDSS knows about them?</a></li>
  <li><a href="dr8/help/#brightstars">Why doesn't SDSS have data for well-known visible stars (Sirius, Vega, etc.)?</a></li>
  <li><a href="dr8/help/#stargalaxy">Why are some bright stars classified as galaxies?</a></li>
  <li><a href="dr8/help/#longID">What does the long SDSS ID number mean, and how do I work with it?</a></li>
</ol>

<h3>More Technical Questions</h3>

<ol>
  <li><a href="dr8/help/#cas">What interfaces are available to SDSS catalog data?</a></li>
  <li><a href="dr8/help/#ubvri">How do I convert from the SDSS's ugriz magnitudes to UBVRI magnitudes?</a></li>
  <li><a href="dr8/help/#scienceprimary">What is the difference between <code>SpecObj</code> and <code>SpecObjAll</code>? What does sciencePrimary mean?</a></li>
  <li><a href="dr8/help/#photoobjtag">What are the differences between <code>PhotoObj</code>, <code>PhotoTag</code>, and <code>PhotoObjAll</code>?</a></li>
  <li><a href="dr8/help/#specphotoall">How do I get photometry for spectroscopic objects? What is the SpecPhotoAll table?</a></li>
  <li><a href="dr8/help/#specphoto">What is the difference between <code>SpecPhoto</code> and <code>SpecPhotoAll</code>?</a></li>
  <li><a href="dr8/help/#numprec">Why do z and zErr (in SpecObj) have different numerical precision?</a></li>
  <li><a href="dr8/help/#str">How do I change the precision of values in the output of my query?</a></li>
  <li><a href="dr8/help/#spectype2">What is the difference between <code>specClass</code> and <code>objType</code> for spectroscopic objects, and which one should I use?</a></li>
  <li><a href="dr8/help/#longID2">Why does SDSS use the long (64-bit) objID fields, and what is the composition of the PhotoObj <code>objID</code> and SpecObj <code>specObjID</code> fields?</a></li>
  <li><a href="dr8/help/#mirror">I want to mirror the SDSS archive - how can I get a copy of <i>all</i> the data?</a></li>
  <li><a href="dr8/help/#htm">Where can I get a copy of the <code>HTM (Hierarchical Triangular Mesh)</code> spatial index library?</a></li>
  <li><a href="dr8/help/#bestzero">In SDSS spectroscopic data, why do some objects show up as bestObjID = 0?</a></li>
</ol>


<hr />

<h2>Answers</h2>

<ol>

<li id="whatissdss">
<h3>What is the Sloan Digital Sky Survey-III?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>

<p>A terrific new survey mapping the Universe on the largest scales,
mapping our galaxy, and finding planets around other stars. A
full description of SDSS-III is available <a href="index.php">on our
front page</a>.</p>
</li>

<li id="data">
<h3>How can I get SDSS data?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>The most recent, 8th data release (DR8), is available <a href="dr8/">here</a>.
The previous SDSS data release, DR7, can be obtained from  <a href="http://www.sdss.org/dr7">this</a> website.</p>
</li>

<li id="casdas">
<h3>What is the Catalog Archive Server (CAS)? What is the Science Archive Server (SAS)?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>
The SDSS-III data can be accessed in two ways. It can be viewed as catalog data (such as redshifts, metallicity, etc.) or
as FITS images and data files. Catalog data, along with preview images
and spectra, are available from the <a href="http://skyserver.sdss3.org/dr8/">Catalog Archive Server</a>.
FITS images and data are available from the <a href="http://data.sdss3.org">Science Archive Server</a>.
For specific detail on how to access the data
please refer to <a href="dr8/imaging/imaging_access.php">this page</a>
for the imaging data and <a href="dr8/spectro/spectro_access.php">this page</a>
for the spectroscopic data.</p>
</li>

<li id="whatisskysrv">
<h3>What is SkyServer?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>

<a href="http://skyserver.sdss3.org">SkyServer</a> is a web site where
professional astronomers, students and members of the general public
can get data from the SDSS.  SkyServer's <a
href="http://skyserver.sdss3.org/dr8/en/proj/">Projects</a> are excellent
resources for astronomy educators who want to include real data in
their courses.</p> </li>

<li id="images">
<h3>Where in the sky do the data come from?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>The SDSS takes data in long, narrow "stripes."  See the <a href="dr8/scope.php">scope</a> page showing the DR8 imaging and spectroscopic coverage.
The CAS <a href="http://skyserver.sdss3.org/dr8/en/tools/chart/navi.asp">Navigate</a> tool
also has an interactive sky globe that shows where the SDSS has data. To see if a specific area has been seen
by the SDSS, enter its coordinates into the <a href="http://skyserver.sdss3.org/dr8/en/tools/chart/chart.asp">Finding Chart</a>.</p>
</li>

<li id="searchtools">
<h3>How can I search for data?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>When you search for data in the SDSS, you are going through the SDSS
database and looking for objects that match criteria you
choose. For simple searches of photometric data, use the
<a href="http://skyserver.sdss3.org/dr8/en/tools/search/iqs.asp">Imaging Query Form</a>.
For simple searches of spectroscopic data, use the
<a href="http://skyserver.sdss3.org/dr8/en/tools/search/sqs.asp">Spectroscopic Query Form</a>.
For more complex searches,  use Structured Query Language (SQL). See the CAS's
guide on <a href="http://skyserver.sdss3.org/dr8/en/help/howto/search/">Searching for Data</a>
to learn more about SQL. To see thumbnail results of objects that meet your
criteria, use the <a href="http://skyserver.sdss3.org/dr8/en/tools/chart/list.asp">Image List</a> tool.</p>

<p>For large, complex queries that will take a long time to run, use
<a href="http://skyservice.pha.jhu.edu/casjobs/">CasJobs</a>,
the SDSS's batch query interface.</p>

<p>The CAS has many other tools too. See
<a href="http://skyserver.sdss3.org/dr8/en/tools/started/">Getting Started</a>
for more information on all the tools, as well as
<a href="dr8/imaging/imaging_access.php">the imaging data access</a> page
and the <a href="dr8/spectro/spectro_access.php">the spectro data access</a> page.
</p>
</li>

<li id="whathelp">
<h3>What help is available?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>Apart from this page there is
a <a href="dr8/glossary.php">Glossary of SDSS-III terms</a>.
Each SkyServer tool also has its own Help section.
Finally, the SDSS <a href="mailto:helpdesk@sdss.org">helpdesk</a> is there to help.
</p>
</li>

<li id="learn">
<h3>I am a teacher. How can I use the data in my classes?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>SkyServer's <a href="http://skyserver.sdss3.org/dr8/en/proj/">Projects</a>
use SDSS data to teach topics in astronomy and other sciences,
using guided and open inquiry. With our Projects, you and your students can
learn about spectra and
colors of stars, galaxy types, the history of the universe, and much more.</p>

<p>You are welcome to use and adapt any of our projects in your classes, free of charge. For more
information on what you can do with SkyServer in the classroom, see our
<a href="http://skyserver.sdss3.org/dr8/en/proj/teach.asp">Teacher FAQ</a>.</p>
</li>

<li id="findobj">
<h3>How can I see if the SDSS has an image of my favorite object?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>Find the coordinates of the object using a name resolver like
<a href="http://simbad.u-strasbg.fr/simbad/sim-fid">SIMBAD</a> or
<a href="http://nedwww.ipac.caltech.edu/forms/byname.html">NED</a>.</p>

<p>Then, go to the CAS's <a href="http://skyserver.sdss3.org/dr8/en/tools/chart/navi.asp">Navigate</a>
tool and enter the object's coordinates. You can enter the coordinates as
decimal degrees or as sexagesimal in the format HH:MM:SS and
(+/-)DD:MM:SS. Click "Get Image" to see the object, and click on the object
for its SDSS data. See the
Help link in the Navigate tool for more information.</p>
</li>


<li id="crossmatch">
<h3>How can I match a list of objects to see what the SDSS knows about them?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>

<p>
If you have a fairly small list of objects to match - a few hundred or so - use the
<a href="http://skyserver.sdss3.org/dr8/en/tools/crossid/">Cross-ID</a>
tool. Paste your list of objects, or upload a file containing data with the last two columns as (ra, dec)
in decimal degrees. Click Submit. The next page will show only those objects that appear in the SDSS, with SDSS Object IDs that
link to the <a href="http://skyserver.sdss3.org/dr8/en/tools/explore/obj.asp">Explore</a> tool.</p>

<p>To see a thumbnail SDSS image of each matching object, use the <a href="http://skyserver.sdss3.org/dr8/en/tools/chart/list.asp">Image List</a> tool. Enter
your list in the textbox on the upper left and click "Get Image". Click on one of the thumbnails to go to that position in the
<a href="http://skyserver.sdss3.org/dr8/en/tools/chart/navi.asp">Navigate</a> tool, or on one of the object names to go to that object's
<a href="http://skyserver.sdss3.org/dr8/en/tools/explore/obj.asp">Explore</a> tool entry.</p>

<p>
For longer lists, use the Neighbors Search feature of <a href="http://skyservice.pha.jhu.edu/casjobs/">CasJobs</a>. See the
<a href="http://skyservice.pha.jhu.edu/casjobs/faq.aspx#crossid">CasJobs FAQ entry</a> on "How can I cross-identify
(find matching objects in SDSS) for my list of sources for which I have RA,decs?" for more information.
</p>

</li>

<li id="brightstars">
<h3>Why doesn't the SDSS have data for well-known visible stars (Sirius, Vega, etc.)?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>The SDSS has a very sensitive <a href="instruments/camera.php">camera</a>.
Stars that you can see with your unaided eyes are a little too bright for the
SDSS's camera, so they show up as washed out. The SDSS still gets an image of
those stars (for example, here is an image of <a href="http://skyserver.sdss3.org/dr8/en/tools/chart/navi.asp?ra=116.2997&amp;dec=28&amp;scale=10">Pollux</a> from SkyServer),
but their images are unreliable, and the SDSS gets no catalog data.</p>
</li>

<li id="stargalaxy">
<h3>Why are some bright stars classified as galaxies?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>The SDSS distinguishes between stars and galaxies based on their shapes: single points of light are stars, and
fuzzy patches of light are galaxies. Some stars are bright enough that their light washes out the camera, so
to the SDSS's camera, they look like fuzzy disks instead of single points of light. Their appearance fools the
SDSS's software into classifying them as galaxies.</p>
</li>

<li id="longID">
<h3>What does the long SDSS ID number mean, and how do I work with it?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>The SDSS needs a way to uniquely identify every object in the database, so it generates ID numbers. The ID numbers are code numbers that
include information about how the object was observed.</p>

<p>One very important point when working with SkyServer is that the object IDs are so long that they get cut off in Excel, and show up with
000 as the last three digits. This means you won't be able to find your objects anymore! To get around this problem, see this
<a
href="http://skyserver.sdss3.org/dr8/en/help/howto/graph/caveat.asp">workaround</a>. </p>
</li>

</ol>

<h2>More Technical Answers</h2>

<ol>

<li id="cas">
<h3>What interfaces are available to SDSS-III catalog data?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>

<p>The Catalog Archive Server (CAS) is the database that contains the
SDSS-III's catalog data. The Science Archive Server (SAS) serves flat
files and provides searches for FITS spectra, images of fields, and
mosaics. There are multiple interfaces to the data, including:</p>

<ol>
<li><a href="http://skyserver.sdss3.org/dr8/en/">SkyServer</a>: an
interface to the Catalog Archive Server designed for astronomers,
students and the general public</li>
<li><a href="http://skyservice.pha.jhu.edu/casjobs/">CasJobs</a>: a batch (asynchronous) system for querying the database and storing results</li>
<li><a
href="http://skyserver.sdss3.org/dr8/en/help/download/sqlcl">sqlcl</a>:
a command-line Python interface to SkyServer</li>
<li><a href="http://www.astro.princeton.edu/~rhl/skyserver/">Emacs
buffer</a>: an Emacs interface to SkyServer for running queries</li>
<li><a href="http://data.sdss3.org">SAS</a>: simple queries for
retrieval of individual spectra and field binary FITS images, plus
direct download of flat files</li>
</ol>
</li>

<li id="ubvri">
<h3>How do I convert from the SDSS's ugriz magnitudes to UBVRI magnitudes?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>The SDSS measures magnitudes through <i>ugriz</i> filters, which give
<i>ugriz</i> magnitudes. These magnitudes can be converted into UBVRI magnitudes using
<a href="dr8/algorithms/sdssUBVRITransform.php">a set of transformations</a> described on the
Algorithms page of this site.</p>
</li>

<li id="scienceprimary">
<h3>What is the difference between <em>SpecObj</em> and <em>SpecObjAll</em>? What does <em>sciencePrimary</em> mean?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>

<p>The <code>SpecObjAll</code> table contains ALL spectroscopic
objects, even duplicate spectra of the same object.  Thus, we have
created the <code>SpecObj</code> view, which contains data for ONLY
those fibers defined as sciencePrimary. That is, specObj contains no
duplicate observations. An exact definition of sciencePrimary can be
found in the <a href="dr8/spectro/catalogs.php">spectroscopic catalog
documentation</a>.</p>

</li>

<li id="photoobjtag">
<h3>What are the differences between <em>PhotoObj</em>, <em>PhotoTag</em>, and <em>PhotoObjAll</em>?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>

<p><em>PhotoObjAll</em> is a table which contains
<b>all</b> of the measured photometric quantities for <b>all</b> of
the imaging detections.
Because we measure hundreds of parameters for each of 1.2 billion detections, this is a
very large table, and queries can take very long to run. Also, because
it includes duplicates and "special" detections such as <a
href="dr8/glossary.php#parent">parent</a> or <a
href="dr8/glossary.php#bright">bright</a> detections, it is not normally
what you want.</p>

<p>In an effort to speed up queries, we have created
<em>PhotoTag</em>, a table with only a subset of the parameters that
are requested most often (a "thin table"). If you have a query that
uses and returns only values stored in <em>PhotoTag</em>, it will
execute much faster than if you used <em>PhotoObjAll</em>.</p>

<p>In addition, we have created <em>PhotoObj</em>, a view of
<em>PhotoObjAll</em> that contains only those objects that are <a
href="dr8/glossary.php#surveyprimary">survey primary</a> or <a
href="dr8/glossary.php#surveysecondary">survey secondary</a>.
These tables exclude special
objects such as <a href="dr8/glossary.php#parent">parent</a> or <a
href="dr8/glossary.php#bright">bright</a> detections. Because this
view effectively contains fewer objects than PhotoObjAll (but all the
measured quantities for these objects), queries will execute
faster.</p>

<p>Finally, there is <em>PhotoPrimary</em>, a view of
<em>PhotoObjAll</em> which only includes <a
href="dr8/glossary.php#surveyprimary">survey primary</a> detections;
if you are not interested in duplicate detections at all, this is the
table to use.</p>

<p>Given the above, you should consider:</p>

<ol>
<li>Querying from <code>PhotoTag</code> if it contains everything you are looking for</li>
<li>Querying from <code>PhotoObj</code> otherwise, UNLESS you are interested in data for objects which are
<em>neither PRIMARY nor SECONDARY</em>. In that case, you will need to use <em>PhotoObjAll</em>.</li>
<li>Importantly, the "shorthand" quantities <em>u,g,r,i,z</em> do <b>not</b> exist in
the <em>PhotoTag</em> table (because we want to keep it as thin as possible). Instead, you must use
ModelMag_[ugriz], which is indexed to make queries faster.
<b>HOWEVER</b>, in <em>PhotoObjAll</em> and its views, only the <em>u,g,r,i,z</em> are indexed,
and <em>not</em> the ModelMags!</li>
</ol>

<p> Because PhotoTag has many fewer parameters, larger portions of it
can be cached, improving performance. We have found that for almost
all queries which contain parameters fully in <em>PhotoTag</em>, it is
faster. </p>

</li>

<li id="specphotoall">

<h3>How do I get photometry for spectroscopic objects? What is the <em>SpecPhotoAll</em> table?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>

<p>The <em>SpecPhotoAll</em> table is a precomputed join between the
<em>PhotoObjAll</em> and
<em>SpecObjAll</em> tables. It includes the most requested parameters
from these two tables. Because the join has already been performed, it
can be faster than computing the join on the fly.</p>

<p>Be aware that the join was performed using <code>bestobjid</code>,
the flux-based match.  Consult the <a
href="dr8/algorithms/match.php">spectroscopic-photoometric matching
documentation</a> for details. In particular, for spectroscopic
objects which are definitely point sources, the flux-based match can
be less appropriate than a pure position-based match. To perform a
join using the position-based match, join using
<code>origobjid</code>.</p>

</li>

<li id="specphoto">
<h3>What is the difference between <em>SpecPhoto</em> and <em>SpecPhotoAll</em>?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>

<p>The <em>SpecPhoto</em> view includes only those pairs where the
SpecObj is a sciencePrimary (<a href="dr8/help/#scienceprimary">see the
definition above</a>), and the PhotoObj is a <a
href="dr8/glossary.php#surveyprimary">survey primary</a> object.</p> </li>

<li id="numprec">
<h3>Why do z and zErr (in SpecObj) have different numerical precisions?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>Internally, these numbers are stored to their full precision as they come out
of the spectroscopic pipeline. When you perform a query, they have some
default string format applied that cuts them to what you see. But you can use
SQL's str() function to change the string format to whatever you like.</p>

<p>To get z to 6 decimals, for example, change your query to 'select str(z,8,6) as z'
instead of just z, and analogously for zErr. This applies the function str()
to the values in column z and returns the result with column label z (without
the "as", the result of a function has no column label). The
str(col,length,dec) function takes the numerical value in 'col' and formats it
as a string of length 'length' and with 'dec' significant digits. In other words,
str(z,8,6) is the SQL equivalent to the C function printf("%8.6f",z). str() rounds the
result to the number of decimals you request.  </p>
</li>

<li id="str"> <h3>How do I change the default precision of values in
the output of my query?&nbsp;<a
href="dr8/help/#Top"><small>Top</small></a></h3> <p>Use the
<b>str(<i>column</i>,<i>n</i>,<i>d</i>)</b> SQL construct (where
<i>n</i> is the total number of digits and <i>d</i> is the number of
decimal places) to set the precision of the column that your query
requests.  SkyServer returns values with a default precision that is
set for each data type, and this may not be enough precision for some
types of science. See the sample query "<a
href="http://skyserver.sdss3.org/dr8/en/help/docs/realquery.asp#nbrrun">Selected
neighbors in run</a>" for an example of how to use STR.</p> </li>

<li id="spectype2">
<h3>What is the difference between <em>class</em> and <em>objType</em> for spectroscopic objects, and which one should I use?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>

<p>The <em>objType</em> parameter in <code>SpecObj</code> and other
tables was set when the objects are targeted
for spectroscopy in the Legacy survey, based only on the photometry.  The
<em>class</em> parameter is set by the spectroscopic
pipeline after the spectrum is observed. Typically, you should use
the class attribute, which tells you what the spectrum actually
was. The objType field tells you about why it was targeted (however,
there is more information in the target bits; see the <a
href="dr8/algorithms">algorithms pages on target selection</a>.</p>
</li>

<li id="longID2">
<h3>Why does SDSS use the long (64-bit) objID fields, and what is the composition of the PhotoObj <em>objID</em> and SpecObj <em>specObjID</em> fields?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>The 64-bit ID fields are required as primary keys (unique identifiers) in the SDSS database tables.  They are used to uniquely identify
each record in the <a href="http://skyserver.sdss3.org/dr8/en/help/docs/intro.asp#indices">database indices</a> for enhanced
performance.  Each of them are bit-encoded with information about the observational origin, i.e., the run,rerun, camera column, etc. for
photometric data, and the plate, MJD, fiberID etc. for spectroscopic
objects. See the glossary for exactly how <a
href="dr8/glossary.php#ObjID">objid</a> and <a
href="dr8/glossary.php#specobj">specobjid</a> are defined.</p>
</li>

<li id="mirror">
<h3>I want to mirror the SDSS archive - how can I get a copy of <i>all</i> the data?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>A copy of the current publicly-available SDSS data release is available from UIC (University of Illinois at Chicago)
for worldwide distribution over fast links.  Please see the <a href="http://www.skyserver.org/">SkyServer support site at skyserver.org</a>
for further details on how to host a mirror site and where to get the data. Click on the <b>SDSS Mirrors</b> link on that site.</p>
</li>

<li id="htm">
<h3>Where can I get a copy of the <span class="vocabulary">HTM (Hierarchical Triangular Mesh)</span> spatial index library?&nbsp;<a href="dr8/help/#Top"><small>Top</small></a></h3>
<p>Freely downloadable copies of the HTM library (in C++, Java and now C#) are available at the <a href="http://www.skyserver.org/">SkyServer
support site at skyserver.org</a>. Click on the <b>HTM</b> link on that site.</p>
</li>



<li id="bestzero">
<h3>In SDSS spectroscopic data, why do some objects show up as bestObjID = 0?</h3>
<p>These are places where the SDSS spectrograph measured a spectrum, but that spectrum did not match spatially with a specific object in SDSS photometry. Most of these spectra without photometric matches are Sky spectra - but some are spectra of real objects that have no photometric match in DR8. For example, the deblending may have changed, or in the latest reductions the photometric pipeline may have failed on the field containing that object.</p>

</li>

</ol>

<p><a href="dr8/help/#Top">[Back to top]</a></p>

<hr />


<h2 id="tutorial">Tutorials</h2>

<p>These pages provide detailed worked examples of
SDSS data retrieval using the various interfaces provided. In addition, we
provide discussions of how to access and read some of the unusual file
types used in the survey, and perform certain operations, such as
calibration.</p>

<ul>
  <li>Getting Data for Individual objects
   <ul>
    <li><a href="dr8/help/getimage.php">Get an image of my favorite object?</a></li>
    <li><a href="dr8/help/getspec.php">Get a spectrum of my favorite object?</a></li>
    <li><a href="dr8/help/flags.php">Find out if SDSS's imaging data for an object are reliable?</a></li>
    <li><a href="dr8/help/flagspropermotion.php">Get flags and proper motions</a></li>
    <li><a href="dr8/help/finding.php">Create a finding chart for my telescope?</a></li>
    <li><a href="dr8/help/retrieveFITS.php">Get FITS images of objects?</a></li>
   </ul>
  </li>
  <li>Searching for Data
   <ul>
    <li><a href="dr8/help/getdata.php">Find all objects in a given RA/Dec/Magnitude/Absolute Magnitude range?</a></li>
    <li><a href="dr8/help/searchimage.php">Find images and spectra for all objects in a given RA/Dec/Magnitude/Absolute Magnitude range?</a></li>
    <li><a href="dr8/help/crossid.php">Upload my own data to see what the SDSS knows about those objects?</a></li>
    <li><a href="dr8/help/random.php">Get a random subset of the data?</a></li>
    <li><a href="dr8/help/pairs.php">Find closely paired objects?</a></li>
    <li><a href="dr8/help/colorconstraints.php">Get spectra based on color constraints?</a></li>
    <li><a href="dr8/help/allspectra.php">Get all spectra in
  bulk</a>?</li>
   </ul>
  </li>
  <li>Reading SDSS Data Files
   <ul>
    <li><a href="dr8/software/par.php">Reading <code>.par</code> files</a></li>
    <li><a href="dr8/imaging/images.php#atlas">Reading Atlas Images</a></li>
    <li><a href="dr8/algorithms/read_psf.php">Extracting PSF Images</a> to reconstruct the PSF at a given location.</li>
   </ul>
  </li>
</ul>

<p><a href="dr8/help/#Top">[Back to top]</a></p>

<?php echo foot(); ?>

