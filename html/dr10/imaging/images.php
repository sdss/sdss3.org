<?php include '../../header.php'; echo head('Image Files'); ?>

<p>
<a href="dr10/imaging/images.php#getting">[Getting Images]</a>&nbsp;
<a href="dr10/imaging/images.php#corr">[Corrected Frames]</a>&nbsp;
<a href="dr10/imaging/images.php#mosaics">[Mosaics]</a>&nbsp;
<a href="dr10/imaging/images.php#atlas">[Atlas Images]</a>&nbsp;
<a href="dr10/imaging/images.php#psf">[PSF Data]</a>
</p>

<h2 id="getting">Getting and Using Images</h2>

<p>The <a href="http://skyserver.sdss3.org">Catalog Archive Server</a>
provides an flexible interface to JPG images for finding charts,
cutouts for object lists, and point-and-click navigation. See its
documentation (or just browse the list of tools on that site) to learn
how to use it.  The <a href="dr10/data_access/">data access</a> page
links to various query forms on CAS to get images by coordinates, or
to search for objects from the imaging and spectroscopic catalogs by
redshift, object magnitude, color etc., and to retrieve the
corresponding data from the SAS.</p>

<p>The <a href="http://data.sdss3.org">Science Archive Server</a>
provides two versions of the FITS images, which can be used for
quantitative analysis:</p>
<ul>
<li><a href="dr10/imaging/images.php#corr">corrected frames for each
field and band</a> (sky-subtracted, calibrated)</li>
<li><a href="dr10/imaging/images.php#atlas">atlas images for each
objects</a>  (sky-subtracted, but uncalibrated)</li>
</ul>
<p>The atlas images correspond to what the imaging catalog actually
measured its parameters from.</p>

<p>To use the images, it is useful to know the point-spread function
(PSF).  The SDSS <code>photo</code> software has estimated the PSF
from the images, and this information is described in the <a
href="dr10/imaging/images.php#psf">PSF section</a> below.</p>

<p>Convenient tools for searching for images of interest are available
on SAS as well (by <a href="dr10/help/glossary.php#run">run</a>, <a
href="dr10/help/glossary.php#camcol">camcol</a>, <a
href="dr10/help/glossary.php#field">field</a>, or by RA and Dec).
Additionally, it is able to produce and return an arbitrary FITS
mosaic using the corrected frames. </p>

<h2 id="corr">Corrected Frames</h2>

<p>The Science Archive Server provides the survey images, called
"corrected frames", as "frames-*.fits.bz2" files.  See the <a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/frames/RERUN/RUN/CAMCOL/frame.html">frame
datamodel</a>, which explains the format in detail. These
images are calibrated in <a
href="dr10/help/glossary.php#nanomaggie">nanomaggies</a> per pixel, and have
had a sky-subtraction applied.  The information about the calibration
and sky-subtraction is provided, and can thus be backed-out if
necessary. </p>

<p>The SAS provides an <a href="http://data.sdss3.org/fields">image
search tool</a>, using RUN, CAMCOL, FIELD or RA, DEC, that returns
these corrected frames.  When searching for RA and DEC, SAS will
return the field which is "primary" at that location according to the
<a href="dr10/algorithms/resolve.php">resolve</a> algorithm.</p>

<p>The <a href="dr10/algorithms/sky.php#global">sky-subtraction is
described in the algorithms page</a>.  The "global" method used for
creating these images is different from, and far less aggressive than,
that applied by the photometric pipeline. The effective smoothing
length for the sky background used in these images is around 2 field
widths, or 20 arcmin, as opposed to about 2 arcmin for the photometric
pipeline. </p>

<p>The image headers have WCS headers that have been corrected to
align correctly with the final astrometric solution, but without the
polynomial distortion terms. In case the full astrometric solution is
desired, it is included as an HDU in the file. The <a
href="dr10/algorithms/astrometry.php">astrometry algorithms page</a>
describes how to use the astrometric calibration information.</p>

<p>The images have a very slightly lossy compression applied, and are
subsequently very efficiently losslessly compressed with bzip2. The
lossy compression results in a relative loss of precision strictly
limited to be less than 0.1% in each pixel, which amounts to a
standard deviation of about 0.06%.  This precision is far less than
the fractional noise already present in the images; since the lossy
compression is applied after sky subtraction, this statement about the
fractional noise is very safe. As <a
href="http://adsabs.harvard.edu/abs/2010PASP..122..207P">Price-Whelan
&amp; Hogg (2010)</a> discuss, the lossy compression thus will have no
scientific impact even on stacked images.</p>

<p>It is possible to calculate the noise in the images from the images
themselves, using information about their dark variance and gain
values. The method for doing so is described in the <a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/frames/RERUN/RUN/CAMCOL/frame.html">frame
datamodel</a>. </p>

<h2 id="mosaics">Mosaics</h2>

<p>The SAS provides a <a href="http://data.sdss3.org/mosaics">mosaic
tool</a> to stitch together corrected frames to form coherent images
over larger patches of the sky. These mosaics are created using the <a
href="http://www.astromatic.net/software/swarp">swarp</a> utility. The
resulting images are calibrated and sky-subtracted just as the
corrected frames themselves are. Only the minimal number of "primary"
fields necessary are used for each mosaic.</p>

<p>Currently, mosaics are only provided at the native pixel resolution
(0.396 arcsec) and with a position angle of zero (north-up). </p>

<h2 id="atlas">Atlas images</h2>

<h3>Description</h3>

<p>The <code>photo</code> software cuts out a patch of each corrected
frame around each object in order to perform its measurements. There
is a set of <a
href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/fpAtlas.html"><code>fpAtlas*.fits</code></a> files, containing
the "postage-stamp" images for individual objects from the <a
href="dr10/imaging/catalogs.php">photometric object lists</a>. These
images are "deblended," so that those atlas images corresponding to
child objects contain only the flux that <code>photo</code> decided
was part of that object.  Atlas images corresponding to parent objects
obviously contain all the flux of the children. Note that these images
have been sky-subtracted using the <a
href="dr10/algorithms/sky.php#photo">photo sky-subtraction
method</a>.</p>

<p> These "atlas images" are in a binary heap format that is not
easily readable by normal humans; think soft encryption.  Also, most
standard FITS readers will not decode them, or if they do they will
appear as a string of integers rather than an actual image raster.</p>

<p>Note that the atlas images once read in need to be calibrated as
described below.  Additionally, because they are uncalibrated
products, they exist in a separate directory tree from the
<code>photoObj</code> files, as described in their <a
href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/fpAtlas.html">data
model page</a>.</p>

<h3 id="readAtlasImages">Stand-alone reader</h3>

<p>We have created a standalone code that serves to both read them and as a
template library for inclusion in other codes. The code is available as: <a
href="binaries/readAtlasImages-v5_4_11.tar.gz">readAtlasImages-v5_4_11.tar.gz</a>,
and can be compiled as follows on Unix:</p>

<ol>
<li><code>% make clean</code></li>
<li><code>% make</code></li>
</ol>
<p>If you are on a big-endian machine, remove -DSDSS_LITTLE_ENDIAN from
CFLAGS in the Makefile. Note that most PCs and Macs that are Intel-based
are little-endian, so there is no need to change the Makefile.</p>

<p>If you are using Mac OS 10.6, Snow Leopard, you may encounter an error
when compiling.  If you see error messages that look like this:</p>
<pre>
cc -o read_atlas_image main.o  -L. -latlas  -lm
Undefined symbols:
  "_phRegionSetFromAtlasImage", referenced from:
      _main in main.o
  "_shRegNew", referenced from:
      _main in main.o
...
</pre>
<p>Then you should do</p>
<pre>
export LDFLAGS=libatlas.a
</pre>
<p>if you use bash, or</p>
<pre>
setenv LDFLAGS libatlas.a
</pre>
<p>if you use tcsh.  Then do <code>make clean; make</code>.</p>

<p>To investigate how to use the stand-alone
reader, it is helpful to read the help string:</p>

<pre>
% read_atlas_image -h
Usage: read_atlas_image [options] input-file row output-file
Your options are:
       -?      This message
       -b #    Set background level to #
       -c #    Use color # (0..ncolor-1; default 0)
       -h      This message
       -i      Print an ID string and exit
       -v      Turn up verbosity (repeat flag for more chatter)

</pre>

<p>If one wanted to read the r-band atlas image of an object with id=432 in
run 752, rerun 20, camcol 3, field 177, one would say:</p>

<pre>% read_atlas_image -c 2 fpAtlas-000752-3-0177.fit 432  myAtlasImage.fits</pre>

<p>where filters u,g,r,i,z are referred to here as color #s 0,1,2,3,4
respectively. The background level is an artificial offset added to all
pixels. The SDSS convention is 1000.</p>

<p>The pixel values in the output images are given in counts, not calibrated
quantities.  To convert to <a
href="dr10/help/glossary.php#nanomaggie">nanomaggies</a>, one would use
the <a href="dr10/help/glossary.php#nmgypercount">nmgypercount</a> value of
the object in question, available in the <a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/RERUN/RUN/CAMCOL/photoObj.html">photoObj
file or CAS table</a>.</p>

<p>The standalone programs read_mask (reads fpM files) and read_PSF
(reads psField files, see <a
href="dr10/imaging/images.php#psf">below</a>) are similar; all three
are built by the same 'make' command.</p>

<h3>Developer Comments</h3>

<p>Although the <code>read_atlas_image</code> executable is perfectly
functional, many users prefer to link into custom built executables
that need to process atlas image data. The code is easily reused for
this purpose.</p>

<p>If you look at the code you'll see that it actually manipulates a type
called an ATLAS_IMAGE.  This contains a field called a master_mask that
contains inter alia the bounding box of the atlas image ([rc]{min,max}) in
the r band, and offsets to that band (d{row,col}).</p>

<h3>Linking the atlas code to scripting languages</h3>

<p> Example IDL code that links directly to modified versions of the
atlas reader can be found in the <code>photoop</code> product
distributed with the <a href="dr10/software/">SDSS software</a> (see
<code>pro/atlas/sdss_atlas_image.pro</code> and associated C code) as
well as <a
href="http://code.google.com/p/sdssidl/"><code>SDSSIDL</code></a> (see
<code>pro/sdss/read_atlas.pro</code> and associated C code).  </p>

<p> The atlas images can also be used to reconstruct entire frames.
See for example the <code>photoop</code> routine
<code>pro/atlas/fpbin_to_frame.pro</code> and the <a
href="http://code.google.com/p/sdssidl/"><code>SDSSIDL</code></a>
routine pro/sdss/sdss_recframe.pro and associate C code.  </p>

<h2 id="psf">PSF Data</h2>

<h3>Description</h3>

<p> The <code>photo</code> software fits a PSF as a function of
position for every SDSS field.  General metadata on the PSF is stored
in the <a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/RERUN/RUN/photoField.html">photoField</a>
file on SAS, which is equivalent to the <code>field</code> table in
CAS. Specifically, the <code>psf_width</code> parameter reports the
average FWHM of a double Gaussian fit to the PSF. In addition, this
file reports the parameters of that fit, as the data model
describes.</p>

<p>The <a
href="http://data.sdss3.org/datamodel/files/PHOTO_REDUX/RERUN/RUN/objcs/CAMCOL/psField.html">psField</a>
files additionally contain more detailed metadata about the PSF for a
given field, in particular the relevant quantities necessary to
reconstruct the full PSF at any position in each frame. </p>

<h3>Generic Code to Reconstruct the PSF</h3>

<p>The PSF reconstruction can be performed without any specialized
tools. For example, to read the psf info from a psField file for the r
band, read extension 3 using your favorite FITS reader.  Examples in
IDL and Python:</p>

<dl>
<dt>IDL</dt>
<dd><code>IDL&gt; pstruct = mrdfits(psfield_file, 3)</code></dd>
<dt>Python</dt>
<dd><code>&gt;&gt;&gt; pstruct = pyfits.getdata(psfield_file, ext=3)</code></dd>
</dl>

<p>(recall u,g,r,i,z == 0,1,2,3,4, which means these bands can be
found in extensions 1,2,3,4,5).</p>

<p>The resulting structure can then be used to reconstruct the image.  The following
IDL code, taken from the <a href="http://code.google.com/p/sdssidl/">SDSSIDL</a>
routine "sdss_psfrec.pro", demonstrates the algorithm to reconstruct
the PSF at location (row,col) in the field.  The code would be quite
similar in Python with NumPy.</p>

<pre>
    nrow_b=(pstruct.nrow_b)[0]
    ncol_b=(pstruct.ncol_b)[0]
    ;assumes they are the same for each eigen
    ;so only use the 0 one
    rnrow=(pstruct.rnrow)[0]
    rncol=(pstruct.rncol)[0]

    nb=nrow_b*ncol_b
    coeffs=fltarr(nb)
    ecoeff=fltarr(3)
    cmat=pstruct.c

    rcs=0.001
    for i=0l, nb-1 do coeffs[i]=(row*rcs)^(i mod nrow_b) * (col*rcs)^(i/nrow_b)

    for j=0,2 do begin
        for i=0l, nb-1 do begin
            ecoeff[j]=ecoeff[j]+cmat(i/nrow_b,i mod nrow_b,j)*coeffs[i]
        endfor
    endfor
    psf = (pstruct.rrows)[*,0]*ecoeff[0]+$
          (pstruct.rrows)[*,1]*ecoeff[1]+$
          (pstruct.rrows)[*,2]*ecoeff[2]
</pre>

<h3>Stand-alone Code</h3>

<p>The atlas image reading code discussed <a
href="dr10/imaging/images.php#atlas">above</a> also includes a
stand-alone piece of software to read in the PSF:</p>

<pre>% read_PSF -h
Usage: read_PSF [options] input-file hdu output-file
Your options are:
       -?      This message
       -h      This message
       -i      Print an ID string and exit
       -v      Turn up verbosity (repeat flag for more chatter) </pre>

<p>To reconstruct the <var>z</var> PSF (i.e. the 5th HDU) at the position (row, col) =
(500, 600) from run 1336, column 2, field 51 you'd say:</p>

<pre>%  read_PSF psField-001336-2-0051.fit 5 500.0 600.0 foo.fit </pre>

<p>The desired PSF would appear as an unsigned short FITS file in foo.fit;
the background level is set to the standard "soft bias" of 1000. If you want
a floating point image, change a line in the read_PSF.c; look for</p>

<pre>        /* create a float region */</pre>

<?php echo foot(); ?>

