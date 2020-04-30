<?php include '../../header.php'; echo head('Spectra and parameters on the Science Archive Server'); ?>

<h2>Access tools</h2>

<p>See the <a href="dr8/data_access.php">description of DR8 data
access</a> for a full listing of the tools available.  Users primarily
interested in catalog parameters (redshift, metallicity, etc.)  should
use the CAS. Users who are interested primarily in the spectra
themselves are encouraged to use the Science Archive Server. </p>

<p>In a nutshell, <a href="http://skyserver.sdss3.org/dr8/">Catalog
Archive Server (CAS)</a> and <a
href="http://skyservice.pha.jhu.edu/casjobs/">CASJobs</a> provide
interfaces to a SQL database with all of the SDSS spectroscopic
results. The simplest place to start is the <a
href="http://skyserver.sdss3.org/dr8/en/tools/search/SQS.asp">spectroscopic
query form</a>.  A SEGUE SQL cookbook, with some example queries to
get you started is <a href="dr8/algorithms/segueii/segue_sqlcookbook.php">here</a></p>

<p>The SAS has same spectroscopic results available for browsing on
the web, through its <a
href="http://data.sdss3.org/basicSpectra">spectrum search page</a>.
This page allows the individual and bulk searches for spectra and
retrieval of FITS-format versions of the spectra. It also provides an
interactive visual interfacce to the spectra. For users interested in
a small number of spectra (hundreds to a few thousand), we recommend
that interface.  For users interested in all or most of the spectra,
we recommend the wget and rsync tools, as described on the <a
href="dr8/data_access.php">Data Access</a> page. </p>

<h2>Outline of tables</h2>

<p>The major spectroscopic results are contained in a few different
files (on SAS) and database tables (in CAS), listed below. In the case
of the SAS files, the large FITS files are all line-by-line matched,
so that the Nth entry in any file refers to the same object. The
"plates" file, listed first below, is especially useful as a full list
of the plates released. Note that the links into SAS below bring you
into the full directory tree; it is best not to wander there before
first understanding the <a
href="dr8/spectro/spectro_basics.php">spectroscopy basics</a> and
understanding how to use the <a
href="http://data.sdss3.org/datamodel">data model</a>.</p>

<?php include 'spectro_table.html'; ?>


<?php echo foot(); ?>

