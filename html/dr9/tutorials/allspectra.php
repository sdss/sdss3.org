<?php include '../../header.php'; echo head('Catalog Tutorial'); ?>

<p><a href="dr9/tutorials/">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Get redshift catalogs with corresponding
photometric information?</h2>

<p>If you are interested in the full redshift catalogs in flat file
format then you want to be using the <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/specObj.html">specObj</a>
file. This file has all of the spectroscopic catalog information
included within it, and exactly corresponds to the
<code>specObjAll</code> table in the CAS.
Photometric information for each spectroscopic object is also
available in flat file format, in the <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/photoPlate.html">photoPlate</a>
file. </p>

<p>These and other files are described in the <a
href="dr9/spectro/spectro_access.php">spectroscopic data access</a>
page.</p>

<h2>Get all the spectra</h2>

<p>If you are interested in a handful of SDSS spectra (less than a few
thousand) in FITS format, an excellent way to retrieve them is using
the <a href="http://data.sdss3.org/">Science Archive
Server</a>. However, if you want to look at tens of thousands of
spectra or more, it becomes more sensible to simply download the
entire spectroscopic data set.</p>

<p>Thus, we supply all of the spectra as bulk FITS files (one file per
plate), called <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spPlate.html">spPlate</a>.
A general description of how to use <code>rsync</code> to retrieve
these files is given in the <a href="dr9/data_access/">data access
page</a>.
</p>

<p>An example rsync command that retrieves all the
<code>spPlate</code> files (but excludes other, less important
ancillary information) would be:</p>

<pre>
rsync -nrtkvz --include "26" --include "103" --include "104" \
  --include "v5_4_45" --include "[0-9][0-9][0-9][0-9]" \
  --include "spPlate*fits" --include "spZ*fits" \
  --exclude "*" rsync://data.sdss3.org/dr9/sdss/spectro/redux/ redux/
</pre>

<p>Notice that we have put a "-n" flag in, so in fact this command
just reports what it would copy; to actually copy the files, use just
"-rtkvz" in front.  However, think before doing so if you only need a
subset of plates, since this full rsync is about 700&nbsp;GB of data.</p>

<p>We also have a
<a href="dr9/tutorials/spPlate-dr9.txt">list of URLs</a>
pointing to all <code>spPlate</code> files in text format. This
could be used with <em>e.g.</em> wget to retrieve all <code>spPlate</code> files.
This list can also be created with the following Python commands:</p>

<pre>
import os
import os.path
import yanny

par = yanny.yanny(os.path.join(os.getenv('SPECTRO_REDUX'),'plates-dr9.par'))
base = 'http://data.sdss3.org/sas/dr9/sdss/spectro/redux/{0}/{1:04d}/spPlate-{1:04d}-{2:5d}.fits\n'
url = [base.format(
    par['PLATES']['run2d'][k],
    par['PLATES']['plate'][k],
    par['PLATES']['mjd'][k])
    for k in range(par.size('PLATES'))]
with open('spPlate.txt','w') as f:
    f.writelines(url)
</pre>

<p><a href="dr9/software/">Software in idlspec2d</a> can be used to
read and plot the data in these files, in particular
<code>readspec</code> and <code>plotspec</code>.</p>

<p>Please note that these directories contain some reductions and
plates considered very bad, and that are not included in the <a
href="http://data.sdss3.org/sas/dr9/sdss/spectro/redux/plates-dr9.par">official
list of DR9 plates</a>. Do not trust any results from a plate-mjd that
is not in that official list (and pay attention to the quality and
comments listed in that file too!).</p>

<h2>What about objects not observed due to fiber collisions?</h2>

<p>
You will want the <a href="dr9/algorithms/tiling.php">tiling
information</a>.</p>



<?php echo foot(); ?>
