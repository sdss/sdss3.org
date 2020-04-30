<?php include '../../header.php'; echo head('Spectroscopic Caveats'); ?>

<h3 id="balmerseries">Incorrectly-labeled Hydrogen Balmer line</h3>
      
  <p>In SDSS spectra released in DR8 – DR13, the Balmer Series line H&zeta; 
  (H-zeta, 3889.049 &Aring;) was incorrectly labeled as H&epsilon; 
  (H-epsilon, 3970.072 &Aring;), and the real H&epsilon; was not included in 
  the analysis of spectral lines. This affects line measurements tabulated in 
  <a href="https://data.sdss.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spZline.html">spZline</a> 
  files. These files are only available on the SAS. These measurements 
  are not loaded into any version of the CAS.</p>


<h2>SAS-only plates</h2>

<p>If one browses the directory trees containing all of the spectra
(see <a href="dr8/spectro/spectro_access.php">the spectroscopic data
access page</a>) one will find files associated with a certain number
of plates not listed in the <a
href="http://data.sdss3.org/sas/dr8/common/sdss-spectro/redux/plates-dr8.par">DR8
list of plates</a> and not loaded into CAS. In essentially all cases,
it is best to ignore such files and plates. For DR8, we went through
some effort to include all reasonably good plate observations; any
plate observations found on SAS but not in CAS are likely to be
disastrously bad.</p>

<h2> Note on stellar radial velocities</h2>

<p>The standard redshift <code>z</code> from <code>idlspec2d</code> is
available unaltered in the specObj and sppParams tables.  These
redshifts, primarily for galaxy work, have no offsets or corrections
applied.</p>

<p>For stars, a better redshift to use is the ELODIE-matched template
redshifts, stored as <code>elodie_z</code> in the <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/specObj.html">specObj</a>
file and the <code>specObj</code> table in CAS.  The CAS also records
this as the quantity <code>elodierv</code> in the sppParams table, but
with a correction term:</p>

<pre>
   elodierv = c*elodie_z+7.3 km/s
</pre>

<p> The 7.3 km/s is an empirically derived offset putting the
<code>elodierv</code> of all stars on a system consistent with that of
other literature measures of known radial velocity standards.</p>

<h2 id="zstatus">Redshift status</h2>

<p>The quality flags for the redshift fitting procedure is stored in
the <a
href="dr8/algorithms/bitmask_zwarning.php"><code>zwarning</code></a>
bit mask. Most redshift warnings indicate a likely substantial problem
with the data. An exception is <code>MANY_OUTLIERS</code>, which flags
when many pixels are poorly explained in a statistical sense by the
best-fit redshift model.  This bit is typically set for very high
signal-to-noise ratio stars (where errors are small, so
&chi;<sup>2</sup> is high), or galaxies with broad lines (the redshift
fitting model includes only narrow lines); in such cases, the redshift
is usually fine.</p>

<p> About 2% of non-sky spectra have some warning set other than
<code>MANY_OUTLIERS</code>. The redshifts of the remainder are
virtually always correct. Many of the spectra flagged with problems
also have correct redshifts and classifications, but we recommend care
before using them. </p>

<p>Note that this set of flags to check has changed since DR7.</p>

<h2 id="extinct">Galactic extinction correction</h2>

<p>The spectra released in DR8 has not been corrected for Galactic
extinction, because the SDSS includes a substantial number of spectra
of Milky Way stars whose extinction would differ from that given in
the dust maps.  This policy has been the standard since DR2; in the EDR
and DR1, the spectroscopic data were corrected for galactic
extinction.  The extinction is a relatively small effect, since the
median <var>E(B-V)</var> over the survey is around 0.04; however, for
some SEGUE pointings the reddening can be substantially larger.</p>

<h2>Night sky emission lines</h2>

<p>The night sky emission lines at 5577&Aring; (when there is auroral
activity) at 6300&Aring;, 6363&Aring;, and in the OH forest in the red
can be very strong, and leave significant residuals in the spectra
whose amplitude is occasionally underestimated by the noise model.  Be
cautious about interpreting the reality of weak features close to
these lines.</p>

<h2 id="badplates">Not-quite-perfect plates</h2>

<p>A small number of plates suffered from a variety of minor problems.
For plates that we deem that the data is unreliable, they have had
their <code>platequality</code> set to bad, and some terse comments
put into the <code>qualityComments</code> status.</p>

<ul>
<li>
Plates with comments about collimation problems refer to hardware
problem causing a mismatch between the flatfields and the science
exposure instrumental profile shapes, in both the spatial and
wavelength directions. This problem caused the optimal extraction
process to reject an excessive number of pixels.  This problem was
fixed in software, and comparing overlapping objects from adjacent
plates confirms that the redshifts from these problematic plates are
unbiased.  However, the spectra themselves should not be used for
precision work or spectrophotometry.  </li>
<li>Plates in the apbias program used multiple, very slightly offset
pointings, but the reductions do not properly combine them.  They
should have valid redshifts in these spectra, but the
spectrophotometry will be very inaccurate.</li>
<li>For some plates the software had issues with rejecting cosmic
rays, because there was only a single exposure to work with.  These
are all marked as bad plates (though again in many cases the redshifts
and spectrophotometry are fine, except for the cosmic rays).</li>
<li>Plates located in regions with extended diffuse emission (like in
Orion or Taurus) often have sky-subtraction errors and issues, because
there is no truly blank sky available.  In these cases, the emission
lines from the nebula are partially, but not wholly. subtracted and
hard to interpret.</li>
<li>Because of time-variability in the dichroic throughput,
occasionally the spectrophotometry has "kinks" at the transition
between the red and blue spectrographs; we have identified some,
though perhaps not all, of the worst cases of these. </li>
<li>Occasionally the second spectrograph electronics caused serious
issues for fibers 321 through 640.</li>
<li>One plate had substantial contamination from Pollux because of
light scattered through clouds.</li>
<li>A number of other plates are simply low signal-to-noise ratio for
a variety of reasons, but because they were special plates, needed to
have their quality values set by hand. That is, they targeted deeper
than we normally do, and so would have passed the surveys
signal-to-noise criteria at the standard magnitude for which it is
defined.</li>
</ul>

<h2 id="specphotomismatch">Mismatches between spectra and photometric data</h2>

<p>There are occasional "mismatches" between the spectra and the
photometry, both due to problems on the spectroscopic side in
identifying the location associated with every fiber, and due to
problems on the photometric side in finding an associated photometric
object given a location.</p>

<p>With some frequency, the fiber mapping failed which identifies
which fiber has been plugged into which hole. There are around 7200
such cases in DR8, which are marked as <code>UNPLUGGED</code> in the
<code><a
href="dr8/algorithms/bitmask_zwarning.php">ZWARNING</a></code>
bitmask. The vast majority of these cases occur because the fiber was
actually not plugged or was broken (in such cases, essentially no
signal is detected in the fiber, and <code>snMedian</code> is reported
as zero). In around 200 cases, there is measureable signal down the
fiber. In cases where there is more than one such fiber on plate,
there is a possibility that the fiber location associated with the
spectrum is incorrected (and thus that the photometric and
spectroscopic information is mismatched). This problem occurs for
around 70 objects in the survey.</p>

<p>Other mismatches can occur due to problems in the
photometry. Errors in the deblending algorithm in the
<code>target</code> reductions caused spectroscopy to be carried out
occasionally on non-existent objects (<i>e.g.</i>, diffraction spikes
of bright stars or satellite trails).  Many of these objects no longer
exist in the current imaging reductions, with its improvements to the
deblender over the years. We have in fact tried to mitigate this
problem in this data release, as described in the <a
href="dr8/algorithms/match.php">spectroscopic-photometric matching
documentation</a>.
</p>

<h2 id="galveldisp">Galaxy velocity dispersion measurements</h2>

<p>We recommend not to use SDSS velocity dispersion measurements
for:</p>
<ul>
  <li>spectra with median per-pixel <var>(S/N)</var><sup>2</sup> &lt; 10</li>
  <li>velocity dispersion estimates smaller than about 70 km s<sup>-1</sup>
    given the typical S/N and the instrumental resolution of the SDSS
  spectra</li>
</ul>

<p>Also note that the velocity dispersion measurements are not
corrected to a standard aperture size.</p>

<p>See the <a href="dr8/algorithms/veldisp.php">velocity dispersion
algorithm</a> for details.</p>

<h2 id="clipped">Clipped Spectral Lines</h2>

<p>Some emission lines are erroneously clipped because they were
identified as cosmic rays.  If an emission line is so bright that it
is saturated in the individual 15-minute exposures of the
spectrograph, it can suffer this effect.  Unfortunately, such
saturated pixels are not flagged as such, although usually that region
of the spectrum has an inverse variance equal to zero.</p>

<p>Luckily, objects with such strong emission lines are very rare, but
the user should be aware of the possibility of objects with extremely
strong emission lines and unphysical or unusual line ratios.</p>

<h2 id="fakebalmerlines">Spectrophotometric calibration induces
artificial Balmer lines</h2>

<p>Very occasionally, the spectrophotometric calibration procedure
induces redshift-zero Balmer lines that are apparently due to
mismatches between the calibration stars and the template library.
This is noticeable in particular on some fibers in plate 274.  This
problem existed in DR7 and earlier as well as in DR8.</p>

<h2 id="known_missing">Known missing or corrupted spectra files on SAS</h2>

<p>
  There are some spectra-related files on SAS which are known to be missing.
  These are documented in the "knownMissing.txt" files in
  each subdirectory.  Most of these are logs and diagnostic plots, but a
  few spZline (redshift fits to individual lines) and
  spCFrame (calibrated individual exposures) files are missing.
  There are no known cases of missing coadded spectra.
</p>

<p>
  In addition, the individual spectrum exposure
  <tt>SPECTRO_REDUX/26/2639/spCFrame-b2-00042347.fits</tt>
  is missing HDU 6 (sky), but the other HDUs are fine.
</p>

<?php echo foot(); ?>

