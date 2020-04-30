<?php include '../../header.php'; echo head('Available Tools for Data Access'); ?>

<p>
  This page describes several tools for accessing the SDSS-III data:
  the Catalog Archive Server (CAS), the Science Archive Server (SAS),
  and direct data file access via rsync, wget, or http.
</p>

<h2>Catalog Archive Server (CAS)</h2>

<p>
  Catalog data are available through
  <a href="http://skyserver.sdss3.org">SkyServer</a> (also known as the Catalog Archive
  Server, or CAS). SkyServer also offers interactive tools to browse through SDSS images
  with links to associated spectra and catalog data about the objects on the images.
</p>

<?php include 'cas_summary_table.html'; ?>

<p>
  The advanced
  <a href="http://skyserver.sdss3.org/casjobs/">CasJobs</a>
  database interface gives you 500 MB or more of
  personal database space to select, analyze, and cross-identify SDSS data.
</p>

<h2>Science Archive Server (SAS)</h2>

<p>
While CAS is the primary interface to the catalog data,
the <a href="http://data.sdss3.org">Science Archive Server</a> (SAS)
is the primary interface to the original images and spectra.
It provides tools to interactively view and download SDSS spectra,
download images of SDSS fields, and generate mosaics of those fields.
</p>
<p>
In addition, SAS contains directory structures with the data in the
original binary (FITS) and text file formats.
To understand the directory structure and file formats, please see the
<a href="dr9/imaging/imaging_access.php">imaging data</a> and
<a href="dr9/spectro/spectro_access.php">spectro data</a> pages,
as well as the basics of
<a href="dr9/spectro/spectro_basics.php">SDSS spectroscopy</a>,
<a href="dr9/imaging/imaging_basics.php">SDSS imaging</a>, and the
<a href="http://data.sdss3.org/datamodel">detailed data model</a>.
</p>

<?php include 'sas_summary_table.html'; ?>

<p>
Note that both CAS and SAS will give you <i>exactly</i> the same catalog data.
Essentially all of the data input into CAS is included in some
form in the SAS. However, there are some small changes in naming convention
(for example, "resolve_status" in SAS flat files is referred to as
"resolveStatus" in CAS).
</p>


<h2>Direct file downloads</h2>

<p>
Expert users may need direct access to the data files themselves
instead of webpage or database views of it.  For this purpose,
we provide the ability to directly download the files from SAS
as described on the 
<a href="dr9/data_access/bulk.php">bulk download</a> page.
</p>

<h2>SDSS Application Programming Interface (API)</h2>

<p>The <a href="http://api.sdss3.org">SDSS API</a> provides a programmatic 
interface to DR9 spectroscopic data &mdash; an easy way to query and retrieve 
spectra from within scripts. The API provides a quick way to retrieve one or 
many spectra as FITS or JSON files. The SDSS API can provide a foundation to 
build your own tools or interfaces to SDSS data, without having to worry about 
downloading or hosting the data yourself. Documentation, details, and examples 
are available at <a href="http://api.sdss3.org">api.sdss3.org</a>.</p>


<?php echo foot(); ?>

