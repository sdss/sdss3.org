<?php include '../../header.php'; echo head('The BOSS DR9 Lyman-alpha Forest Catalog and Sample'); ?>

<h2 id="intro">Introduction</h2>

<!-- INTRODUCTION -->

<p>
One of the key science goals of BOSS is the measurement of the BAO scale from the z ~ 2 Lyman-alpha forest in the
high-redshift quasar sightlines. To aid in this analysis, we have selected objects suited for Lyman-alpha forest
analysis, and provide additional spectral products to aid in this.
</p>

<p>
The sample is described in detail in <a href="http://adsabs.harvard.edu/abs/2013AJ....145...69L">Lee et al. (2013)</a>. There are 3 main components to this sample:</p>
<dl>
<dt>Catalog (<a href="http://data.sdss3.org/datamodel/files/BOSS_LYA/cat/BOSSLyaDR9_cat.html">BOSSLyaDR9_cat</a> file)</dt>
<dd>Lists objects in our catalog, including information on SNR, fitted continuum, DLAs etc.
Available in <a href="http://data.sdss3.org/sas/dr9/boss/lya/cat/BOSSLyaDR9_cat.fits">FITS</a> and
<a href="http://data.sdss3.org/sas/dr9/boss/lya/cat/BOSSLyaDR9_cat.txt">ASCII</a> formats.</dd>
<dt>Individual spectra (<a href="http://data.sdss3.org/datamodel/files/BOSS_LYA/cat/speclya.html">speclya-[plate]-[mjd]-[fiberid].fits</a> files)</dt>
<dd>Extension of the "lite" per-object <a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/spectra/PLATE4/spec.html">spec</a> files, with fluxes, pipeline errors, masks, correction vectors and continua. A Gzipped tarball is available for download <a href="http://data.sdss3.org/sas/dr9/boss/lya/cat/BOSSLyaDR9_spectra.tar.gz">here</a>.</dd>
<dt>Flux artifact corrections</dt>
<dd>A global correction vector for the flux calibration artifacts noted by
<a href="http://adsabs.harvard.edu/abs/2013A%26A...552A..96B">Busca et al. (2013)</a> and <a href="http://adsabs.harvard.edu/abs/2013AJ....145...69L">Lee et al. (2013)</a>.
Divide observed fluxes by this vector.
Available as an ASCII file <a href="http://data.sdss3.org/sas/dr9/boss/lya/cat/residcorr_v5_4_45.dat">here</a>.</dd>
</dl>

<p>
Below we briefly summarize these products.
</p>

<!-- CATALOG PRODUCTION -->
<h2 id="selection">Sample Selection and Catalog</h2>

<p>
As a starting point, we use the
<a href="dr9/algorithms/qso_catalog.php">BOSS DR9 Quasar Catalog</a> (DR9Q).
We make the following cuts on the catalog to select the objects suitable for Lyman-alpha forest analysis:</p>
<ul>
<li> z &gt; 2.15 (using Z_VI visual inspection redshift from DR9Q) </li>
<li> No BAL quasars (BAL_FLAG_VI=0 in DR9Q) </li>
<li> S/N &gt; 0.5 per pixel in 1268-1340 &Aring; and S/N &gt; 0.2 per pixel in 1041-1185 &Aring; (restframe wavelengths) </li>
<li> No more than 20% of pixels flagged by pipeline maskbit system </li>
<li> Continua (see below) must be positive  </li>
</ul>

<p>
The 54,468 selected objects are listed in a simple catalog, BOSSLyaDR9_cat, that is available in both
<a href="http://data.sdss3.org/sas/dr9/boss/lya/cat/BOSSLyaDR9_cat.fits">FITS</a> (4.3 MB) and <a href="http://data.sdss3.org/sas/dr9/boss/lya/cat/BOSSLyaDR9_cat.txt">ASCII</a> (8.9 MB)
formats. The detailed data model description of the catalog is available
<a href="http://data.sdss3.org/datamodel/files/BOSS_LYA/cat/BOSSLyaDR9_cat.html">here</a>.
</p>

<!-- SPECTRAL FILE DESCRIPTION -->

<h2 id="spectra">Individual Spectral Files</h2>

<p>
For each object in our catalog, we have generated an individual spectral file. These
<a href="http://data.sdss3.org/datamodel/files/BOSS_LYA/cat/speclya.html">"speclya"</a> files extend the "lite" per-object
<a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/spectra/PLATE4/spec.html">spec</a> format
with the following additional vectors in HDU 1:</p>
<dl>
<dt>MASK_COMB</dt>
<dd>Combined pixel mask system, incorporating <a href="dr9/algorithms/bitmask_sppixmask.php">pipeline masks</a>
(MASK_COMB = 1),
a thorough sky emission line mask (MASK_COMB = 2), and masks for the central equivalent widths of Damped Lyman-alpha Absorbers (DLAs)
detected by a combination of template-fitting
(<a href="http://adsabs.harvard.edu/abs/2012A%26A...547L...1N">Noterdaeme et al. 2012</a>) and Fisher Discriminant Analysis (Carithers et al., in prep)
(MASK_COMB = 3).
Pixels with MASK_COMB != 0 should be masked or discarded.</dd>
<dt>NOISE_CORR</dt>
<dd>A correction to ensure that the pipeline noise estimate is accurate to within several percent. This is derived by
comparing the observed dispersion in the data with the pipeline estimate.
The pipeline errors should be divided by this vector.</dd>
<dt>DLA_CORR</dt>
<dd>Corrections for damping wings of known DLAs in our spectra. While DLA cores are already masked by MASK_COMB,
the damping wings suppresses the fluxes in the vicinity of the DLA. These corrections are derived using the absorption redshift
Z_DLA and column-density LOG_NHI of the DLA, as listed in the <a href="http://data.sdss3.org/datamodel/files/BOSS_LYA/cat/BOSSLyaDR9_cat.html">BOSSLyaDR9_cat</a> catalog. Multiply the observed fluxes by this vector to implement the correction. </dd>
<dt>CONT</dt>
<dd>Quasar continuum in the restframe 1040-1600 Ang region, estimated using a modified version of the MF-PCA method
(<a href="http://adsabs.harvard.edu/abs/2012AJ....143...51L">Lee et al. 2012</a>).
Divide the observed fluxes by the continuum to extract the Lyman-alpha forest transmission.</dd>
</dl>

<p>
All other HDUs in the spectra are unchanged from the "spec" files.
The spectra in the DR9 Lyman-alpha Forest Sample
can be downloaded in bulk <a href="http://data.sdss3.org/sas/dr9/boss/lya/cat/BOSSLyaDR9_spectra.tar.gz">here</a> ,
where the individual spectra are grouped in sub-directories by plate number.
</p>

<!-- FLUX CORRECTION -->

<h2 id="fluxcorrection">Flux Artifact Correction</h2>

<p>
There are 2-3% level artifacts, corresponding to observed Balmer wavelengths,
in the average flux calibration of the DR9 spectra reduced by the v5_4_45 idlspec2d pipeline.
These are caused by the interpolation over masked Balmer lines in the standard stars used to do flux calibration.
</p>

<p>
We derive a global correction for these artifacts by comparing continuum flux from ~29,000 quasars by their best-fit
1D pipeline model, available <a href="http://data.sdss3.org/sas/dr9/boss/lya/cat/residcorr_v5_4_45.dat">here</a>.
For a given spectrum, this correction vector should be interpolated to the given wavelength
grid and used to divide the observed flux.
</p>

<!-- Usage guidelines -->

<h2 id="usage_guidelines">Usage Guidelines</h2>

<p>
To fully implement the DR9 Lyman-alpha Forest Sample, <em>e.g.</em>, for comparing BAO measurements, all the objects
in the BOSSDR9Lya_cat catalog should be used. For each spectrum (downloadable in bulk from <a href="http://data.sdss3.org/sas/dr9/boss/lya/cat/BOSSLyaDR9_spectra.tar.gz">here</a>), the following operations should be performed:
</p>
<pre>
  F = FLUX * DLA_CORR / (CONT * RESID)
  SIGMA_F = (IVAR * RESID^2 * NOISE_CORR^2 * CONT^2 / DLA_CORR^2)^(-1/2)
</pre>
<p>
where RESID is interpolated from <a href="http://data.sdss3.org/sas/dr9/boss/lya/cat/residcorr_v5_4_45.dat">residcorr_v5_4_45.dat </a>.
The Lyman-alpha forest interval is defined in 1041-1185 &Aring; restframe with respect to
Z_VI in <a href="http://data.sdss3.org/datamodel/files/BOSS_LYA/cat/BOSSLyaDR9_cat.html">BOSSLyaDR9_cat</a>, and all pixels with MASK_COMB !=0 or IVAR=0
should be discarded or masked.
</p>

<?php echo foot(); ?>
