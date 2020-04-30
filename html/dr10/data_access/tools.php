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
<a href="dr10/imaging/imaging_access.php">imaging data</a>, and
<a href="dr10/spectro/spectro_access.php">spectroscopic data</a>, and
<a href="dr10/irspec/spectro_data.php">infrared spectroscopy</a> pages.
To understand the way in which the SDSS organizes its data, see
<a href="dr10/imaging/imaging_basics.php">Understanding SDSS Imaging Data</a>,
<a href="dr10/spectro/spectro_basics.php">Understanding SDSS Spectroscopic Data</a>,
<a href="dr10/irspec/spectro_basics.php">Understanding SDSS Infrared Spectroscopy Data</a>.
Full details on the structure of all the data are in the
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
<a href="dr10/data_access/bulk.php">bulk download</a> page.
</p>

<!-- We're not quite ready with this.  Commenting out

<h2>Web API</h2>

<p>
The SAS web interface also provides a
<a href="http://data.sdss3.org/documentation">web API</a>
to return spectra as CSV files, FITS files, or JSON objects
using http requests.
</p>

-->

<?php echo foot(); ?>

