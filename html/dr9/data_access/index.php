<?php include '../../header.php'; echo head('Data Access for SDSS DR9'); ?>

<p>
Data Release 9 includes three types of data: images, spectra, and catalog data (parameters
measured from images and spectra, such as magnitudes and redshifts). The SDSS web sites offer
several different online data access tools, each suited to a particular need.
The primary websites are:
</p>

<table class="common">
  <tr> <th>Website</th>  <th>Purpose</th> </tr>
  <tr>
    <td><a href="http://www.sdss3.org/dr9">www.sdss3.org/dr9</a></td>
    <td>DR9 Documentation (this site)</td>
  </tr>
  <tr>
    <td><a href="http://dr9.sdss3.org">dr9.sdss3.org</a></td>
    <td>Science Archive Server (SAS) DR9 front end with searchable interactive
        spectra and image mosaics</td>
  </tr>
  <tr>
    <td><a href="http://data.sdss3.org/sas/dr9">data.sdss3.org/sas/dr9</a></td>
    <td>Direct access to the DR9 data files for experts</td>
  </tr>
  <tr>
    <td><a href="http://data.sdss3.org/datamodel">data.sdss3.org/datamodel</a></td>
    <td>Detailed description of SAS directory structure and file
    formats and content</td>
  </tr>
  <tr>
    <td><a href="http://skyserver.sdss3.org/dr9">skyserver.sdss3.org/dr9</a></td>
    <td>Browsable interface to Catalog Archive Server (CAS) database and
      simple SQL queries; browsable sky images with associated spectra and
      catalog data.</td>
  </tr>
  <tr>
    <td><a href="http://skyserver.sdss3.org/casjobs">skyserver.sdss3.org/casjobs</a></td>
    <td>Advanced CAS database interface for all data releases</td>
  </tr>
  <tr>
    <td><a href="http://api.sdss3.org">api.sdss3.org</a></td>
    <td>Programmatic access to query or retrieve SDSS spectra (FITS or JSON formats)</td>
  </tr>  
</table>

<p>
These are described in more detail on the
<a href="dr9/data_access/tools.php">available tools</a> page.
The tables below provide links to the appropriate tools for various
common tasks.
If your question isn't addressed here, please take a look at the
<a href="dr9/help/faq.php">FAQ</a> and/or
<a href="dr9/tutorials/index.php">tutorial</a> help pages.  Note that the
<a href="dr9/tutorials/#gettingstarted">getting started tutorials</a>
might be particularly helpful if you are new to SDSS-III.
</p>

<p>If you are having difficulty connecting to any data server, please check
the <a href="dr9/data_access/status.php">status page</a> for announcements about
planned outages.</p>

<p>Data from the SDSS-II Supernova Survey is <span class="term">not</span> available in DR9,
but is available in its entirety at the
<a href="http://www.sdss.org/supernova/aboutsupernova.html">SDSS-II Supernova
Survey website</a>.</p>

<h2 id="images">Images</h2>

<p>The SDSS has taken deep images of more than one-third of the entire night sky. You can view
SDSS images online for any object or sky position in the survey area, and download images of
SDSS fields as FITS files.</p>

<table class="common" id="imagetable">
  <tr>
    <th style="width:60%;">I need to...</th>
    <th style="width:40%;">Tool to use</th>
  </tr>
  <tr>
    <td>browse through sky images to look for interesting objects</td>
    <td><a href="http://skyserver.sdss3.org/dr9/en/tools/chart/navi.asp">Navigate</a></td>
  </tr>
  <tr>
    <td>create a finding chart for my telescope using SDSS imaging</td>
    <td><a href="http://skyserver.sdss3.org/dr9/en/tools/chart/chart.asp">Finding chart</a></td>
  </tr>
  <tr>
    <td>download FITS images for a specific SDSS field containing a given object or sky position</td>
    <td><a href="http://dr9.sdss3.org/fields/">Imaging (FITS) Field Search</a></td>
  </tr>
  <tr>
    <td>download FITS images for many SDSS fields</td>
    <td><a href="http://dr9.sdss3.org/bulkFields/">Bulk Imaging (FITS) Search</a></td>
  </tr>
  <tr>
    <td>see thumbnail images for a list of objects</td>
    <td><a href="http://skyserver.sdss3.org/dr9/en/tools/chart/list.asp">Image List</a></td>
  </tr>
  <tr>
    <td>see thumbnail images of objects that match my search criteria</td>
    <td><a href="http://skyserver.sdss3.org/dr9/en/tools/chart/list.asp">Image List</a></td>
  </tr>
</table>


<h2 id="spectra">Spectra</h2>

<p>DR9 includes all spectra from SDSS-I/-II including SEGUE-I/-II, and all
  BOSS spectra through July 2011</p>

<table class="common" id="spectrumtable">
  <tr>
    <th style="width:60%;">I need to...</th>
    <th style="width:40%;">Tool to use</th>
  </tr>
  <tr>
    <td>know whether SDSS has measured a spectrum for my object</td>
    <td><a href="http://skyserver.sdss3.org/dr9/en/tools/chart/navi.asp">Navigate</a></td>
  </tr>
  <tr>
    <td>see the spectrum for my object</td>
    <td><a href="http://dr9.sdss3.org/advancedSearch">Spectrum Search</a></td>
  </tr>
  <tr>
    <td>get the spectrum for my object</td>
    <td><a href="http://dr9.sdss3.org/advancedSearch">Spectrum Search</a></td>
  </tr>
  <tr>
    <td>get 50,000 spectra</td>
    <td><a href="dr9/data_access/bulk.php">See the bulk download documentation</a></td>
  </tr>
  <tr>
    <td>retrieve SDSS spectra from within a script (e.g. Python, JavaScript...) </td>
    <td><a href="http://api.sdss3.org">SDSS-III API</a></td>
  </tr>  
  <tr>
    <td>Know which spectra data files are available</td>
    <td><a href="dr9/spectro/pipeline.php">
      Spectroscopic pipeline description</a></td>
  </tr>
  <tr>
    <td>Understand the format of a specific data file</td>
    <td><a href="http://data.sdss3.org/datamodel/">
      Data Model</a></td>
  </tr>

</table>


<h2 id="catalog">Catalog Data</h2>

<p>Catalog data summarize quantities measured from the images and spectra
  such as magnitudes, redshifts, and object classifications.  These are
  available either from the Catalog Archive Server (CAS) database, or
  as binary tables in FITS file format.</p>

<table class="common">
  <tr>
    <th style="width:60%;">I need to...</th>
    <th style="width:40%;">Tool to use</th>
  </tr>
  <tr>
    <td>Find all objects which match some simple selection criteria</td>
    <td><a href="http://skyserver.sdss3.org/dr9/en/tools/search/sql.asp">SkyServer SQL Search</a></td>
  </tr>
  <tr>
    <td>Perform a complicated CPU intensive catalog query</td>
    <td><a href="http://skyserver.sdss3.org/CasJobs/">CasJobs</a></td>
  </tr>
  <tr>
    <td>Generate my own database with custom tables of a subset of the SDSS-III data</td>
    <td><a href="http://skyserver.sdss3.org/CasJobs/">CasJobs</a></td>
  </tr>
  <tr>
    <td>Understand the CAS database schema</td>
    <td><a href="http://skyserver.sdss3.org/dr9/en/help/browser/browser.asp">
      Schema Browser</a></td>
  </tr>

  <tr>
    <td>Download fits files with the catalog data</td>
    <td><a href="dr9/data_access/bulk.php">
      See the bulk download documentation</a></td>
  </tr>
  <tr>
    <td>Understand the format of a specific catalog data file</td>
    <td><a href="http://data.sdss3.org/datamodel/">
      Data Model</a></td>
  </tr>
</table>

<?php echo foot(); ?>

