<?php include '../../header.php'; echo head('Data Access for SDSS DR10'); ?>

<p>
Data Release 10 includes four types of data: images, optical spectra, infrared spectra, and
catalog data (parameters measured from images and spectra, such as magnitudes and redshifts).
The SDSS web sites offer several different online data access tools, each suited to a
particular need. The primary websites, described in more detail in the 
<a href="dr10/data_access/tools.php">Available Tools</a> page, are:
</p>

<table class="common">
  <tr> <th>Website</th>  <th>Purpose</th> </tr>
  <tr>
    <td><a href="http://www.sdss3.org/dr10">www.sdss3.org/dr10</a></td>
    <td>DR10 Documentation (this site)</td>
  </tr>
  <tr>
    <td><a href="http://dr10.sdss3.org" 
    		onclick="trackOutboundLink('http://dr10.sdss3.org'); return false;">
            	dr10.sdss3.org</a></td>
    <td>Science Archive Server (SAS): interactive
        spectra and image mosaics</td>
  </tr>
  <tr>
    <td><a href="http://data.sdss3.org/sas/dr10" 
    		onclick="trackOutboundLink('http://data.sdss3.org/sas/dr10'); return false;">
data.sdss3.org/sas/dr10</a></td>
    <td>Direct download access to DR10 FITS data files for experts</td>
  </tr>
  <tr>
    <td><a href="http://data.sdss3.org/datamodel" 
    		onclick="trackOutboundLink('http://data.sdss3.org/datamodel'); return false;">
data.sdss3.org/datamodel</a></td>
    <td>Details of the SAS directory structure, file formats, 
	and the contents of each file</td>
  </tr>
  <tr>
    <td><a href="http://skyserver.sdss3.org/dr10" 
    		onclick="trackOutboundLink('http://skyserver.sdss3.org/dr10'); return false;">
skyserver.sdss3.org/dr10</a></td>
    <td>SkyServer: Browser-based access to the Catalog Archive Server (CAS) database, 
		with resources for learning SQL and projects to teach science</td>
  </tr>
  <tr>
    <td><a href="http://skyserver.sdss3.org/casjobs" 
    		onclick="trackOutboundLink('http://skyserver.sdss3.org/casjobs'); return false;">
skyserver.sdss3.org/casjobs</a></td>
    <td>Flexible advanced SQL-based interface to the CAS, for all data releases</td>
  </tr>
</table>

<p>
The tables below provide links to the appropriate tools for various
common tasks. The first column describes something you might need 
to do with SDSS data, and the second column links to the best tool to 
do that. If your question isn't addressed here, please look at the
<a href="dr10/help/faq.php">Frequently Asked Questions</a> and/or
<a href="dr10/tutorials/index.php">Tutorials</a> help pages.
</p>

<p>If you are having difficulty connecting to any data server, please check
the <a href="dr10/data_access/status.php">status page</a> for announcements about
planned outages.</p>



<h2 id="images">Images</h2>

<p>The SDSS has taken deep images of more than one-third of the entire night sky. You can view
SDSS images online for any object or sky position in the survey area, and download images of
SDSS fields as FITS files. Since some stars were targeted for APOGEE infrared spectroscopy using
2MASS survey data, we also offer access to 2MASS images. Data from the SDSS-II Supernova Survey 
is <span class="term">not</span> available in DR10, but is available in its entirety at the
<a href="http://www.sdss.org/supernova/aboutsupernova.html" 
    		onclick="trackOutboundLink('http://www.sdss.org/supernova/aboutsupernova.html'); return false;">
SDSS-II Supernova
Survey website</a>.</p>

<table class="common" id="imagetable">
  <tr>
    <th style="width:60%;">I need to...</th>
    <th style="width:40%;">Tool to use</th>
  </tr>
  <tr>
    <td>browse through sky images to look for interesting objects</td>
    <td><a href="http://skyserver.sdss3.org/dr10/en/tools/chart/navi.aspx" 
		onclick="trackOutboundLink('http://skyserver.sdss3.org/dr10/en/tools/chart/navi.aspx'); return false;">
Navigate</a></td>
  </tr>
  <tr>
    <td>create a finding chart for my telescope using SDSS imaging</td>
    <td><a href="http://skyserver.sdss3.org/dr10/en/tools/chart/chart.aspx" 
    		onclick="trackOutboundLink('http://skyserver.sdss3.org/dr10/en/tools/chart/chart.aspx'); return false;">
Finding chart</a></td>
  </tr>
  <tr>
    <td>download FITS images for a specific SDSS field containing a given object or sky position</td>
    <td><a href="http://dr10.sdss3.org/fields/" 
    		onclick="trackOutboundLink('http://dr10.sdss3.org/fields/'); return false;">
Imaging (FITS) Field Search</a></td>
  </tr>
  <tr>
    <td>download FITS images for many SDSS fields</td>
    <td><a href="http://dr10.sdss3.org/bulkFields/" 
    		onclick="trackOutboundLink('http://dr10.sdss3.org/bulkFields/'); return false;">
Bulk Imaging (FITS) Search</a></td>
  </tr>
  <tr>
    <td>see thumbnail images for a list of objects, or for objects matching 
	search criteria</td>
    <td><a href="http://skyserver.sdss3.org/dr10/en/tools/chart/list.aspx" 
    		onclick="trackOutboundLink('http://skyserver.sdss3.org/dr10/en/tools/chart/list.aspx'); return false;">
Image List</a></td>
  </tr>
</table>


<h2 id="spectra">Optical Spectra</h2>

<p>DR10 includes all optical spectra from the original SDSS-I/-II, all 
SEGUE spectra, and all BOSS spectra through July 2012.</p>

<table class="common" id="spectrumtable">
  <tr>
    <th style="width:60%;">I need to...</th>
    <th style="width:40%;">Tool to use</th>
  </tr>
  <tr>
    <td>know whether SDSS has measured an optical spectrum for my object</td>
    <td><a href="http://skyserver.sdss3.org/dr10/en/tools/chart/navi.aspx" 
    		onclick="trackOutboundLink('http://skyserver.sdss3.org/dr10/en/tools/chart/navi.aspx'); return false;">
Navigate</a></td>
  </tr>
  <tr>
    <td>see the optical spectrum for my object</td>
    <td><a href="http://dr10.sdss3.org/advancedSearch" 
    		onclick="trackOutboundLink('http://dr10.sdss3.org/advancedSearch'); return false;">
Spectrum Search</a></td>
  </tr>
  <tr>
    <td>download the FITS file with the optical spectrum for my object</td>
    <td><a href="http://dr10.sdss3.org/advancedSearch" 
    		onclick="trackOutboundLink('http://dr10.sdss3.org/advancedSearch'); return false;">
Spectrum Search</a></td>
  </tr>
  <tr>
    <td>get 50,000 spectra</td>
    <td><a href="dr10/data_access/bulk.php">See the bulk download documentation</a></td>
  </tr>
  <tr>
    <td>Know which optical spectroscopic data files are available</td>
    <td><a href="dr10/spectro/pipeline.php">
      Spectroscopic pipeline description</a></td>
  </tr>
  <tr>
    <td>Understand the format of a specific data file</td>
    <td><a href="http://data.sdss3.org/datamodel/">
      Data Model</a></td>
  </tr>

</table>

<h2 id="irspec">Infrared Spectra</h2>

<p>DR10 includes all APOGEE Infrared Spectra through July 2012.</p>

<table class="common" id="irspectrumtable">
  <tr>
    <th style="width:60%;">I need to...</th>
    <th style="width:40%;">Tool to use</th>
  </tr>
  <tr>
    <td>know whether the SDSS has measured an infrared spectrum for my object</td>
    <td><a href="http://skyserver.sdss3.org/dr10/en/tools/chart/navi.aspx" 
    		onclick="trackOutboundLink('http://skyserver.sdss3.org/dr10/en/tools/chart/navi.aspx'); return false;">
Navigate</a></td>
  </tr>
  <tr>
    <td>see the infrared spectrum for my object</td>
    <td><a href="http://dr10.sdss3.org/basicIRSpectra" 
    		onclick="trackOutboundLink('http://dr10.sdss3.org/basicIRSpectra'); return false;">
Basic Spectrum Search</a></td>
  </tr>
  <tr>
    <td>browse infrared spectra for many objects</td>
    <td><a href="http://dr10.sdss3.org/bulkIRSpectra" 
    		onclick="trackOutboundLink('http://dr10.sdss3.org/bulkIRSpectra'); return false;">
Bulk Spectrum Search</a></td>
  </tr>
  <tr>
    <td>get 50,000 spectra</td>
    <td><a href="dr10/data_access/bulk.php">See the bulk download documentation</a></td>
  </tr>
  <tr>
    <td>Know which APOGEE spectra data files are available</td>
    <td><a href="dr10/irspec/spectro_data.php">
      Spectroscopic pipeline description</a></td>
  </tr>
  <tr>
    <td>get all measured parameters for all APOGEE stars at once</td>
    <td><a href="dr10/irspec/spectro_data.php#catalogs">allStar and allVisit files</a></td>
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
    <td>find all objects which match some simple selection criteria</td>
    <td><a href="http://skyserver.sdss3.org/dr10/en/tools/search/sql.aspx" 
    		onclick="trackOutboundLink('http://skyserver.sdss3.org/dr10/en/tools/search/sql.aspx'); return false;">
SkyServer SQL Search</a></td>
  </tr>
   <tr>
    <td>learn how to write SQL queries</td>
    <td>
		<a href="http://skyserver.sdss3.org/dr10/en/help/howto/search/searchhowtohome.aspx" 
    		onclick="trackOutboundLink('http://skyserver.sdss3.org/dr10/en/help/howto/search/searchhowtohome.aspx'); return false;">
SQL Tutorial</a> or <br />
		<a href="http://skyserver.sdss3.org/dr10/en/help/docs/sql_help.aspx" 
    		onclick="trackOutboundLink('http://skyserver.sdss3.org/dr10/en/help/docs/sql_help.aspx'); return false;">
SQL in SkyServer</a> or <br />
		<a href="http://skyserver.sdss3.org/dr10/en/help/docs/realquery.aspx" 
    		onclick="trackOutboundLink('http://skyserver.sdss3.org/dr10/en/help/docs/realquery.aspx'); return false;">
Sample Queries</a>		
	</td>
  </tr> 
  <tr>
    <td>perform a complicated, CPU-intensive query of SDSS catalog data</td>
    <td><a href="http://skyserver.sdss3.org/CasJobs/" 
    		onclick="trackOutboundLink('http://skyserver.sdss3.org/CasJobs/'); return false;">
CasJobs</a></td>
  </tr>
  <tr>
    <td>generate my own database with custom tables of a subset of SDSS data</td>
    <td><a href="http://skyserver.sdss3.org/CasJobs/" 
    		onclick="trackOutboundLink('http://skyserver.sdss3.org/CasJobs/'); return false;">
CasJobs</a></td>
  </tr>
  <tr>
    <td>understand the CAS database schema</td>
    <td><a href="http://skyserver.sdss3.org/dr10/en/help/browser/browser.aspx" 
    		onclick="trackOutboundLink('http://skyserver.sdss3.org/dr10/en/help/browser/browser.aspx'); return false;">

      Schema Browser</a></td>
  </tr>
  <tr>
    <td>download fits files with the catalog data</td>
    <td><a href="dr10/data_access/bulk.php">
      See the bulk download documentation</a></td>
  </tr>
  <tr>
    <td>understand the format of a specific catalog data file</td>
    <td><a href="http://data.sdss3.org/datamodel/">
      Data Model</a></td>
  </tr>
</table>

<?php echo foot(); ?>
