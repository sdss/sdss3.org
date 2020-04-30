<?php include '../../header.php'; echo head('Tutorials'); ?>
<!--
<h2><span class="todo">TODO: reorganize!</span></h2>
-->
<p>These pages provide detailed worked examples of
SDSS data retrieval using the various interfaces provided. In addition, we
provide discussions of how to access and read some of the unusual file
types used in the survey, and perform certain operations, such as
calibration.</p>

<ul>
  <li id="gettingstarted">Getting Started
   <ul>
    <li><a href="dr9/tutorials/gettingstarted.php">Download the data</a></li>
    <li><a href="dr9/tutorials/understanddata.php">Understand what the different data files are</a></li>
    <li><a href="dr9/tutorials/quicklook.php">Take a quick look at the data using IDL, Python, etc.</a></li>
   </ul>
  </li>

  <li>Getting Data for Individual objects
   <ul>
    <li><a href="dr9/tutorials/getimage.php">Get an image of my favorite object?</a></li>
    <li><a href="dr9/tutorials/getspec.php">Get a spectrum of my favorite object?</a></li>
    <li><a href="dr9/tutorials/flags.php">Find out if SDSS's imaging data for an object are reliable?</a></li>
	<li><a href="dr9/tutorials/flagspropermotion.php">Get flags and proper motions?</a></li>
    <li><a href="dr9/tutorials/finding.php">Create a finding chart for my telescope?</a></li>
    <li><a href="dr9/tutorials/retrieveFITS.php">Get FITS images</a></li>
   </ul>
  </li>
  <li>Searching for Data
   <ul>
    <li><a href="dr9/tutorials/getdata.php">Find all objects in a given RA/Dec/Magnitude/Absolute Magnitude range?</a></li>
    <li><a href="dr9/tutorials/searchimage.php">Find images and spectra for all objects in a given RA/Dec/Magnitude/Absolute Magnitude range?</a></li>
    <li><a href="dr9/tutorials/crossid.php">Upload my own data to see what the SDSS knows about those objects?</a></li>
    <li><a href="dr9/tutorials/random.php">Get a random subset of the data?</a></li>
    <li><a href="dr9/tutorials/pairs.php">Find closely paired objects?</a></li>
    <li><a href="dr9/tutorials/colorconstraints.php">Get spectra based on color constraints?</a></li>
    <li><a href="dr9/tutorials/allspectra.php">Get all spectra in bulk</a>?</li>
   </ul>
  </li>
  <li>Reading SDSS Data Files
   <ul>
    <li><a href="dr9/software/par.php">Reading <code>.par</code> files</a></li>
    <li><a href="dr9/imaging/images.php#atlas">Reading Atlas Images</a></li>
    <li><a href="dr9/algorithms/read_psf.php">Extracting PSF Images</a> to reconstruct the PSF at a given location.</li>
   </ul>
  </li>
  <li id="segue_work">Working with SEGUE
     <ul>
     <li><a href="dr9/tutorials/segue_getting_started.php">SEGUE Overview for Beginners</a></li>
     <li><a href="dr9/tutorials/segue_getting_started.php#extract_segue_data">Extracting SEGUE Data</a></li>
     <li><a href="dr9/tutorials/segue_sqlcookbook.php#Tables">SEGUE CAS Data Tables</a></li>
     <li><a href="dr9/tutorials/segue_sqlcookbook.php#Functions">Useful SQL Functions for SEGUE</a></li>
     <li><a href="dr9/tutorials/segue_sqlcookbook.php#Join">Combining Information from Different Tables</a></li>
     <li><a href="dr9/tutorials/segue_sqlcookbook.php#Quality">Ensuring Data Quality</a></li>
     <li><a href="dr9/tutorials/segue_sqlcookbook.php#Cookbook">Sample SEGUE Queries</a></li>
     </ul>
  </li>
  <!--
  <li>Creating your own catalogs
   <ul>
    <li><a href="dr9/tutorials/lss_galaxy.php">Large Scale Structure Galaxy Catalogs</a></li>
   </ul>
  </li>
  -->
</ul>

<p><a href="dr9/tutorials/#Top">[Back to top]</a></p>

<?php echo foot(); ?>

