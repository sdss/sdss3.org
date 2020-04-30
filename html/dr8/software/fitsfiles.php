<?php include '../../header.php'; echo head('Reading FITS Files'); ?>

<h2 id="intro">Introduction</h2>

<p>Most of the numerical SDSS-III data is stored in the form of
<a href="http://heasarc.gsfc.nasa.gov/docs/heasarc/fits.html">FITS files</a>.
These files can contain both images and binary data tables in a well-defined
format.  FITS files can be read and written with many programming languages,
but the most common ones used by SDSS-III are
<a href="dr8/software/fitsfiles.php#idl">IDL</a> and <a href="dr8/software/fitsfiles.php#python">Python</a>.</p>

<h2 id="idl">IDL</h2>

<p>The <a href="http://idlastro.gsfc.nasa.gov/">Goddard utilities</a> contain
tools for reading and writing FITS files.  The most commonly used functions are
<a href="dr8/software/goddard_doc.php#MRDFITS"><code>mrdfits</code></a>
and <a href="dr8/software/goddard_doc.php#MWRFITS"><code>mwrfits</code></a>.
The Goddard utilities are included in the <a href="dr8/software/idlutils.php">idlutils</a> package,
which also contains additional programs for manipulating FITS files.</p>

<h2 id="python">Python</h2>

<p>The <a href="http://www.stsci.edu/resources/software_hardware/pyfits">PyFITS</a>
package handles the reading and writing of FITS files in Python.
<a href="http://www.stsci.edu/resources/software_hardware/pyfits/release">Version 2.4.0</a>
or later is strongly recommended, since this version now correctly reads and
writes FITS checksum headers.</p>

<?php echo foot(); ?>
