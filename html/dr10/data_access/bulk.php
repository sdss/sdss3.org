<?php include '../../header.php'; echo head('Bulk Data Downloads')?>

<h2>Introduction</h2>

<p>
All data can be downloaded directly from data.sdss3.org using the <a
href="http://www.samba.org/rsync/features.html">rsync</a>
or <a href="http://www.gnu.org/software/wget/">wget</a> commands.
See the <a href="http://data.sdss3.org/datamodel/">Data Model</a> for a
description of the directory structure and file formats.
</p>

<p>
Note that the total SDSS-III data volume is ~70&nbsp;TB; see
<a href="dr10/data_access/volume.php">the data volume table</a>.
If you need a substantial fraction of that data (&gt;1&nbsp;TB),
please contact
<a href="mailto:helpdesk@sdss3.org">the helpdesk</a> to arrange
a custom data transfer. This will be faster for you and easier on
our servers.
</p>

<p>NOTE: all rsync commands on this page have <code>--dry-run</code>
added to them, and all wget commands have <code>--spider</code> added
to them.  You have to remove those command line arguments for these
commands to actually download data.</p>

<p>
wget commands use the same URL as you would in a web browser, <em>e.g.</em>,
</p>
<!-- verified -->
<pre>
  wget --spider http://data.sdss3.org/sas/dr10/sdss/spectro/redux/plates-dr10.fits
</pre>
<p>
or for rsync drop the "sas" from the URL, <em>e.g.</em>,
</p>
<!--
For sdss3@data user:
rsync - - dry-run -v rsync://sdss3@data.sdss3.org/sas/dr10/sdss/spectro/redux/plates-dr10.fits .
-->
<pre>
  rsync --dry-run -v rsync://data.sdss3.org/dr10/sdss/spectro/redux/plates-dr10.fits .
</pre>

<p>If you are having any difficulty with rsync URLs, check <a href="dr10/data_access/bulk.php#rsyncnotes">the notes below</a>.</p>

<p>
  The number of rsync connections is throttled but the number of wget
  connections is not.  Thus it is recommended to use wget to initially
  fetch the data, and use rsync only to confirm that the data you have
  is correct and complete.
</p>

<p>
  The SAS website
  <a href="http://data.sdss3.org/sas/dr10">data.sdss3.org/sas/dr10</a>
  (US West Coast)
  is completely mirrored at
  <a href="http://mirror.sdss3.org/sas/dr10">mirror.sdss3.org/sas/dr10</a>
  (US East Coast).  If you have difficulty connecting to data.sdss3.org,
  try mirror.sdss3.org instead.
  Also check the <a href="dr10/data_access/status.php">status page</a> for
  outage announcements.
</p>
<!--
<h2>Bulk downloads with CAS + SAS</h2>

<p>
  <span class="todo">TODO</span>: This doesn't work.
  <a href="https://trac.sdss3.org/ticket/1611">Ticket 1617</a>.
  If it isn't fixed before DR10, remove this section.
</p>

<p>
  When submitting a catalog database query via the
  <a href="http://skyserver.sdss3.org/dr10/en/tools/search/">
  SkyServer/CAS search tools</a>,
  the returned results have an "Upload list of fields to SAS" link at the
  bottom. This will direct you to the SAS page for downloading the
  matching FITS files (either images or spectra).
</p>
-->
<h2 id="globus">Globus Online</h2>

<p>
SDSS data are also available via
<a href="https://globus.org">Globus Online</a> using the endpoint
sdss3#orion (US East Coast).
For large transfers, Globus is significantly faster than using wget or rsync.
Globus Online requires a separate account, but once that is
setup Globus offers a "fire-and-forget" transfer that automatically
optimizes transfer settings, retries any failures, and emails you when
your transfer is done.
The <a href="https://www.globus.org/globus_connect/">Globus Connect</a>
tool allows you to use globus to download data to your laptop or other
computers which are not permanent Globus endpoint servers.
</p>

<h2 id="irspeccatalog">Infrared Spectra Catalog Data</h2>

<p>
Catalogs of parameters derived from the APOGEE infrared spectra and
matched are documented on the
<a href="dr10/irspec/spectro_data.php">spectra data page</a>.  These
can be directly downloaded from the links on that page, or via wget
commands.  For example, to download the stellar parameters
for all APOGEE star spectra:
</p>
<pre>
  wget --spider http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/allStar-v304.fits
</pre>
<p>
To download the catalog information for each
APOGEE visit spectrum:
</p>
<pre>
  wget --spider http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/allVisit-v304.fits
</pre>

<h2 id="irspecperobject">Infrared Spectra Per-Star Files</h2>

<p>
The combined spectra for each star can be found in
the <a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/LOCATION_ID/apStar.html">apStar</a>
files. In the path to this file, <code>APRED_VERS</code> refers to the
reduction version used to extract the spectrum for each visit
and <code>APSTAR_VERS</code> refers to the version of the combination
of the spectra into a single spectrum.</p>

<p>
There is
a <a href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/s3/">large
directory of location IDs</a>, each of which corresponds to a
particular line of sight in the survey.  Within each of those
directories, the spectra are organized by their APOGEE ID.
For example, one of these files may be downloaded as follows:
</p>
<pre>
  wget --spider http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/s3/4289/apStar-s3-2M05370702+6137006.fits
</pre>
<p>In this case, <code>APRED_VERS</code> is <code>r3</code> and <code>APSTAR_VERS</code> is <code>s3</code>.
Observations taken during commissioning were not combined with observations taken after commissioning, so stellar
spectra from commissioning data are stored in files with the name <code>apStarC</code>. For example:
</p>
<pre>
  wget --spider http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/s3/4105/apStarC-s3-2M16380721+3638388.fits
</pre>
<p>Note that there can be both <code>apStar</code> and <code>apStarC</code> results for the same star, if
it was observed both before and after commissioning.</p>

<p>To download these spectra in bulk, you can generate a list of
  spectra you wish to download in a text file where each line looks
  like "[LOCATIONID]/[FILENAME]", for example:
</p>
<pre>
 4289/apStar-s3-2M05370702+6137006.fits
</pre>
<p>Then use wget:
</p>
<pre>
  wget --spider -nv -r -nH --cut-dirs=7 \
      -i speclist.txt \
      -B http://data.sdss3.org/sas/dr10/boss/spectro/redux/r3/s3
</pre>

<p>To download all of the apStar files (about 8 Gbytes total), it is best to use rsync:</p>
<pre>
  rsync --dry-run -aLvz --include "[0-9][0-9][0-9][0-9]/" \
    --include "apStar*.fits" --exclude "*"\
    --prune-empty-dirs --progress \
    rsync://data.sdss3.org/dr10/apogee/spectro/redux/r3/s3/ s3/
</pre>

<p>The majority of the stars have stellar parameters determined, with
corresponding best-fit, pseudo-continuum-normalized spectra.  The
combined spectra for each star, along with the ASPCAP fits, can be
found in
the <a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/ASPCAP_VERS/RESULTS_VERS/LOCATION_ID/aspcapStar.html">aspcapStar</a>
files. As for <code>apStar</code> files, there is
a <a href="http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/s3/a3/v304/">large
directory of location IDs</a> with the resulting files.  For example,
one of these files may be downloaded as follows:
</p>
<pre>
  wget --spider http://data.sdss3.org/sas/dr10/apogee/spectro/redux/r3/s3/a3/v304/4289/aspcapStar-v304-2M05370702+6137006.fits
</pre>


<p>To download these spectra in bulk, you can generate a list of
  spectra you wish to download in a text file where each line looks
  like "[LOCATIONID]/[FILENAME]", for example:
</p>
<pre>
 4289/aspcapStar-v304-2M05370702+6137006.fits
</pre>
<p>Then use wget:
</p>
<pre>
  wget --spider -nv -r -nH --cut-dirs=9 \
      -i speclist.txt \
      -B http://data.sdss3.org/sas/dr10/boss/spectro/redux/r3/s3/a3/v304
</pre>

<p>To download all of the aspcapStar files (about 8 Gbytes total), it is best to use rsync:</p>
<pre>
  rsync --dry-run -aLvz --include "[0-9][0-9][0-9][0-9]/" \
    --include "aspcapStar*.fits" --exclude "*"\
    --prune-empty-dirs --progress \
    rsync://data.sdss3.org/dr10/apogee/spectro/redux/r3/s3/a3/v304/ v304/
</pre>

<h2 id="spectrocatalog">Optical Spectra Catalog Data</h2>

<p>
Catalogs of parameters derived from the SDSS/BOSS optical spectra and matched to photometric
data are documented on the
<a href="dr10/spectro/spectro_access.php">spectra data page</a>.
These can be directly downloaded from the links on that page, or
via wget commands.
For example, to download the redshifts and classifications of all
SDSS spectra (2.9 GB):
</p>
<!-- verified -->
<pre>
  wget --spider http://data.sdss3.org/sas/dr10/sdss/spectro/redux/specObj-dr10.fits
</pre>
<p>
Or to get the associated photometric position based matches (7.5 GB):
</p>
<!-- verified -->
<pre>
  wget --spider http://data.sdss3.org/sas/dr10/sdss/spectro/redux/photoPosPlate-dr10.fits
</pre>

<p>The stellar parameter (SSPP) results can be downloaded
similarly:</p>
<pre>
  wget --spider http://data.sdss3.org/sas/dr10/sdss/sspp/ssppOut-dr10.fits
</pre>

<h2 id="perobject">Optical Spectra Per-Object Files</h2>

<p>
If you want just a subset of the spectra, the most convenient form may
be the spec files with one file per PLATE-MJD-FIBER containing the
coadded spectrum, the redshift and classification fits, spectral line fits,
and optionally the individual exposures which contributed to the coadd:
These are located at:
</p>
<ul>
  <li>
    BOSS spectra:
    <a href="http://data.sdss3.org/sas/dr10/boss/spectro/redux/v5_5_12/spectra/">
            data.sdss3.org/sas/dr10/boss/spectro/redux/v5_5_12/spectra/</a>
  </li>
  <li>
    SDSS Legacy spectra:
    <a href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/26/spectra/">
            data.sdss3.org/sas/dr10/sdss/spectro/redux/26/spectra/</a>
  </li>
  <li>
    SDSS stellar cluster plates:
    <a href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/103/spectra/">
            data.sdss3.org/sas/dr10/sdss/spectro/redux/103/spectra/</a>
  </li>
  <li>
    SDSS SEGUE-2 plates:
    <a href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/104/spectra/">
            data.sdss3.org/sas/dr10/sdss/spectro/redux/104/spectra/</a>
  </li>
</ul>

<p>
Beneath each of those directories, the spectra are organized by plate
in the form
</p>
<pre>
  PLATE/spec-PLATE-MJD-FIBER.fits
</pre>
<p><em>e.g.</em>,</p>
<pre>
  3586/spec-3586-55181-0016.fits
  3609/spec-3609-55201-0646.fits
  3661/spec-3661-55614-0020.fits
  ...
</pre>

<p>To download these spectra in bulk, generate a list of spectra you
  wish to download in a text file of that format and then use wget:
</p>
<!-- verified -->
<pre>
  wget --spider -nv -r -nH --cut-dirs=7 \
      -i speclist.txt \
      -B http://data.sdss3.org/sas/dr10/boss/spectro/redux/v5_5_12/spectra/
</pre>

<p>
  For BOSS spectra, a few sample lists have been pre-generated in
  <a href="http://data.sdss3.org/sas/dr10/boss/spectro/redux/v5_5_12/spectra/">
          data.sdss3.org/sas/dr10/boss/spectro/redux/v5_5_12/spectra/</a>specfiles*.txt.
  <em>e.g.</em>, to download all the objects which were either targeted or classified
  as a QSO (201k files, ~250 GB),
</p>
<!-- verified -->
<pre>
  wget --spider -nv -r -nH --cut-dirs=7 \
    -i http://data.sdss3.org/sas/dr10/boss/spectro/redux/v5_5_12/spectra/specfiles-qso-v5_5_12.txt \
    -B http://data.sdss3.org/sas/dr10/boss/spectro/redux/v5_5_12/spectra/
</pre>

<h2 id="perobjectlite">Optical Spectra Per-Object Lite Files</h2>

<p>
  A "lite" version of the above files are also available in the
  "spectra/lite/PLATE/" subdirectories.  These contain the same coadd
  and catalog information as the full spec files, but don't include the
  individual exposures which contributed to the coadd. For example, to download
  the "lite" version of the above QSO files (~42 GB instead of ~250 GB):
</p>
<!-- verified -->
<pre>
  wget --spider -nv -r -nH --cut-dirs=8 \
    -i http://data.sdss3.org/sas/dr10/boss/spectro/redux/v5_5_12/spectra/specfiles-qso-v5_5_12.txt \
    -B http://data.sdss3.org/sas/dr10/boss/spectro/redux/v5_5_12/spectra/lite/
</pre>

<h2 id="perplate">Spectra per-Plate Files</h2>

<p>
The spectra are also available grouped by plate, with all 640 (SDSS)
or 1000 (BOSS) spectra in a single file.  These are the original outputs
of the spectroscopic pipeline and are itemized on the
<a href="dr10/spectro/pipeline.php">spectro pipeline</a> page,
including where they are in the SAS directory structure.
The primary files are:
</p>

<table class="common">
  <tr>
    <th>File</th>
    <th>Description</th>
  </tr>
  <tr>
    <td><a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/PLATE4/spPlate.html">spPlate</a></td>
    <td>Coadded spectra</td>
  </tr>
  <tr>
    <td><a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/PLATE4/spCFrame.html">spCFrame</a></td>
    <td>Individual exposure spectra</td>
  </tr>
  <tr>
    <td><a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/PLATE4/RUN1D/spZbest.html">spZbest</a></td>
    <td>Redshifts and classifications</td>
  </tr>
  <tr>
    <td><a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/PLATE4/RUN1D/spZall.html">spZall</a></td>
    <td>Redshifts and classifications including second, third, etc. best fits</td>
  </tr>
  <tr>
    <td><a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/PLATE4/RUN1D/spZline.html">spZline</a></td>
    <td>Spectral line fits</td>
  </tr>
</table>

<p>
To download all the spPlate files for BOSS:
</p>
<!-- verified for sdss3 user -->
<pre>
  rsync --dry-run -aLvz --include "????/" --include "spPlate*.fits" \
    --exclude "*" --exclude "spectra/*" \
    --prune-empty-dirs --progress \
    rsync://data.sdss3.org/dr10/boss/spectro/redux/v5_5_12/ v5_5_12/
</pre>
<p>Or for spPlate, spZall, spZbest, spZline:</p>
<!-- verified for sdss3 user -->
<pre>
  rsync --dry-run -aLvz --include "????/" \
    --include "spPlate*.fits" --include "spZ*.fits" \
    --exclude "*" --exclude "spectra/*" \
    --prune-empty-dirs --progress \
    rsync://data.sdss3.org/dr10/boss/spectro/redux/v5_5_12/ v5_5_12/
</pre>

<p>A version of the above command specific to SEGUE-2:</p>
<!-- verified for sdss3 user -->
<pre>
  rsync --dry-run -aLvz --include "????/" --include "spPlate*.fits" --exclude "*" \
    --prune-empty-dirs --progress \
    rsync://data.sdss3.org/dr10/sdss/spectro/redux/104/segue2/ segue2/
</pre>

<!-- verified for sdss3 user -->
<p>This command will download the spectroscopic parameters by plate.  If you need
stellar parameter data, you need to use:</p>
<pre>
  rsync --dry-run -aLvz --include "????/" --include "output/" \
    --include "param/" --include "ssppOut*.fit" \
    --include "ssppOut.lineindex*.fit" --exclude "*" \
    --prune-empty-dirs --progress \
    rsync://data.sdss3.org/dr10/sdss/sspp/122/ .
</pre>

<h2 id="bulkimaging">Imaging Data</h2>
<p>
Images and derived catalog data are described on the
<a href="dr10/imaging/imaging_access.php">imaging data</a> page.
You can use a
<a href="http://skyserver.sdss3.org/dr10/en/tools/search/">SkyServer search</a>
or the file
<a href="http://data.sdss3.org/sas/dr10/boss/resolve/2010-05-23/window_flist.fits">
window_flist.fits</a> file to identify which
RERUN-RUN-CAMCOL-FIELD overlaps your region of interest.
Then download the matching calibObj files (catalog data) or
frame files (calibrated imaging data), <em>e.g.</em>, for RERUN 301, RUN 2505,
CAMCOL 3, FIELD 38, the r-band image is:
</p>
<!-- verified -->
<pre>
  wget --spider http://data.sdss3.org/sas/dr10/boss/photoObj/frames/301/2505/3/frame-r-002505-3-0038.fits.bz2

</pre>
<p>
and the associated catalog of identified galaxies for that patch of sky is:
</p>
<!-- verified -->
<pre>
  wget --spider http://data.sdss3.org/sas/dr10/boss/sweeps/dr10/301/calibObj-002505-3-gal.fits.gz
</pre>

<h2 id="rsyncnotes">Notes on using rsync</h2>

<p><em>Remember</em>, to convert an http URL to an rsync URL you must:</p>
<ol>
<li>Replace <code>http://</code> with <code>rsync://</code>.</li>
<li>Remove <code>/sas/</code>.</li>
</ol>
<p>Here's a Python function that accomplishes these steps:</p>
<pre>
def http2rsync(url):
    """Convert a valid SDSS-III http URL to the rsync equivalent.
    """
    from re import sub
    return sub(r'https?://(data|mirror)\.sdss3\.org/sas/dr([0-9]+)/(.*)$',
        r'rsync://\1.sdss3.org/dr\2/\3',url)
</pre>
<p>And here's the equivalent in IDL:</p>
<pre>
FUNCTION http2rsync, url
    parts = STREGEX(url,'https?://(data|mirror)\.sdss3\.org/sas/dr([0-9]+)/(.*)$',/EXTRACT,/SUBEXPR)
    RETURN, 'rsync://'+parts[1]+'.sdss3.org/dr'+parts[2]+'/'+parts[3]
END
</pre>

<?php echo foot(); ?>

