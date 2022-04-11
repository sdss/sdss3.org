<?php include '../../header.php'; echo head('Imaging data access tools'); ?>

<h2>Access tools</h2>

<p>See the <a href="dr8/data_access.php">description of DR8 data
access</a> for a full listing of the tools available.
Users primarily interested in catalog parameters should usually use
the CAS.  Users who are interested in reanalyzing images themselves
are encouraged to use the Science Archive Server.</p>

<p>In a nutshell, <a href="http://skyserver.sdss3.org/">Catalog
Archive Server (CAS)</a> and <a
href="http://skyservice.pha.jhu.edu/casjobs/">CASJobs</a> provide
interfaces to a SQL database with all of the SDSS imaging results.
The simplest place to start is the <a
href="http://skyserver.sdss3.org/dr8/en/tools/search/IQS.asp">imaging
query form</a>.</p>

<p> The <a href="http://data.sdss3.org">SAS</a> has the same results
available for browsing on the web and through wget and rsync access,
as described on the <a href="dr8/data_access.php">Data Access</a>
page. The SAS provides access to the individual FITS images, directly
through the directory structure, through its <a
href="http://data.sdss3.org/fields">search interface</a> and
through its <a href="http://data.sdss3.org/mosaics">mosaicking
tool</a>. It also has a tool that allows one to <a
href="http://data.sdss3.org/coverageCheck">check the imaging survey
coverage</a>.</p>

<p>In addition, as we explain below, there is a reduced form of the
imaging catalogs in FITS format on the SAS called the "sweeps", which
is about 326Gb of data and thus relatively portable.</p>

<h2>Outline of tables</h2>

<p>The major imaging results are contained in a few different file
structures (on SAS) and database tables (in CAS), listed below. Of
particular use in browsing and using these data is the full <a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/photoRunAll.html">photoRunAll</a>
list of imaging runs, available either on CAS or in flat-file form as
a <a
href="http://data.sdss3.org/sas/dr8/groups/boss/photoObj/photoRunAll-dr8.fits">FITS</a>
or <a
href="http://data.sdss3.org/sas/dr8/groups/boss/photoObj/photoRunAll-dr8.par">Yanny</a>
file. Note that the links into SAS below bring
you into the full directory tree; it is best not to wander there
before first understanding the <a
href="dr8/imaging/imaging_basics.php">imaging basics</a> and
understanding how to use the <a
href="http://data.sdss3.org/datamodel">data model</a>.</p>

<?php include 'imaging_table.html'; ?>

<?php echo foot(); ?>

