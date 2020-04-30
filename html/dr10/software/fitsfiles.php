<?php include '../../header.php'; echo head('Reading FITS Files'); ?>

<h2 id="intro">Introduction</h2>

<p>Most of the numerical SDSS-III data is stored in the form of
<a href="http://heasarc.gsfc.nasa.gov/docs/heasarc/fits.html">FITS files</a>.
These files can contain both images and binary data tables in a well-defined
format.  FITS files can be read and written with many programming languages,
but the most common ones used by SDSS-III are
<a href="dr10/software/fitsfiles.php#idl">IDL</a> and <a href="dr10/software/fitsfiles.php#python">Python</a>.</p>

<h2 id="idl">IDL</h2>

<p>The <a href="http://idlastro.gsfc.nasa.gov/">Goddard utilities</a> contain
tools for reading and writing FITS files.  The most commonly used functions are
<a href="dr10/software/goddard_doc.php#MRDFITS"><code>mrdfits</code></a>
and <a href="dr10/software/goddard_doc.php#MWRFITS"><code>mwrfits</code></a>.
The Goddard utilities are included in the <a href="dr10/software/idlutils.php">idlutils</a> package,
which also contains additional programs for manipulating FITS files.</p>

<h2 id="python">Python</h2>

<p>The <a href="http://www.stsci.edu/resources/software_hardware/pyfits">PyFITS</a>
package handles the reading and writing of FITS files in Python.
<a href="http://www.stsci.edu/resources/software_hardware/pyfits/release">Version 2.4.0</a>
or later is strongly recommended, since this version now correctly reads and
writes FITS checksum headers.</p>

<p>Another package is <code>fitsio</code>, developed by
Erin Sheldon, which is a Python wrapper on the
<a href="http://heasarc.gsfc.nasa.gov/fitsio/">CFITSIO library</a>.
It allows direct access to the columns of a FITS binary table
which can be useful for reading large fits files, as detailed
<a href="dr10/software/fitsfiles.php#largefiles">below</a>. This package
is available for download
<a href="https://github.com/esheldon/fitsio/downloads">here</a>.</p>

<h2 id="largefiles">Large FITS Files</h2>

<p>FITS files larger than about 2 GB can be more challenging to read.
One such file is the
<a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/spAll.html">spAll</a>
file.  The simplest method for reading
large FITS files is to download the <code>fitsio</code> Python
module described above.  The module can read only selected columns from the
FITS file:</p>

<pre>
import fitsio
columns = ['PLATE', 'MJD', 'FIBERID', 'Z', 'ZWARNING', 'Z_ERR']
d = fitsio.read('spAll-v5_5_12.fits', columns=columns)
</pre>

<p>The PyFITS module has more stringent hardware requirements as it must read
the whole file in order to use it.  On a 64-bit machine with &gt;&nbsp;4&nbsp;GB
of memory, it is possible to use the <code>memmap</code> option:</p>

<pre>
import pyfits
fx = pyfits.open('spAll-v5_5_12.fits', memmap=True)
d = fx[1].data
</pre>

<p>In IDL, the routine
<a href="dr10/software/idlutils_doc.php#HOGG_MRDFITS"><code>hogg_mrdfits</code></a>
is available as part of the <a href="dr10/software/idlutils.php">idlutils</a> package.
This routine is similar to <code>fitsio</code>, in that one can specify a
subset of columns to read.  It avoids memory overload by reading only a subset of the rows
of a FITS file, extracting the columns, then moving on to the next subset of
rows.</p>

<?php echo foot(); ?>
