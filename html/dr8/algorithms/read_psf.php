<?php include '../../header.php'; echo head('Extracting PSF Images'); ?>

<h2>Generic Code to Reconstruct the PSF</h2>
<p>
The PSF reconstruction can be performed without any specialized tools.
</p>
<p>
To read the psf info from a psField file for the r band, read extension 3:
</p>
<pre>
    IDL> pstruct = mrdfits(psfield_file, 3)
</pre>
<p>(recall u,g,r,i,z == 0,1,2,3,4 so just add one to the index).</p>
<p>The resulting structure can then be used to reconstruct the image.  The following
IDL code, taken from the <a href="http://code.google.com/p/sdssidl/">SDSSIDL</a>
routine "sdss_psfrec.pro", demonstrates the algorithm to reconstruct
the PSF at location (row,col) in the field.</p>
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

<h2>Stand Alone Code</h2>

<p>We have also created a standalone code that serves to both read them and as a
template library for inclusion in other codes. The code is available as: <a
href="binaries/readAtlasImages-v5_4_11.tar.gz">readAtlasImages-v5_4_11.tar.gz</a>.</p>

<h3>Compiling</h3>

<p>1. % make clean</p>

<p>2. % make</p>

<p>If you are on a big-endian machine, remove -DSDSS_LITTLE_ENDIAN from
CFLAGS in the Makefile.</p>

<h3>Using</h3>
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
the background level is set to the standard `soft bias' of 1000. If you want
a floating image, change a line in the read_PSF.c; look for</p>
<pre>        /* create a float region */</pre>

<h3>Developer Comments</h3>

<p>The standalone programs read_atlas_image (reads fpAtlas files) and
read_mask (reads fpM files) are similar. All three are built by the
same 'make' command.</p>

<p>I don't expect that many users will actually want to use the
read_PSF executable (although it is perfectly functional). The main
use of the product will probably be to link into custom built executables
that need to process atlas image data. I believe that the code should be
easily reused for this purpose.</p>

<?php echo foot(); ?>
