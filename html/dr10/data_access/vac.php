<?php include '../../header.php'; echo head('Value Added Catalogs'); ?>

<p>In addition to the primary SDSS-III photometry and spectroscopy, there are a few
extra catalogs created by our collaborators that are distributed through the SAS.</p>

<h2>SEGUE Value-Added Catalogs</h2>

<h3><a href="dr10/spectro/alpha_catalog.php">[&#945;/Fe] Values</a></h3>
<p>This catalog provides the [&#945;/Fe] ratios for SDSS and SEGUE
stars from <a href="http://adsabs.harvard.edu/abs/2011AJ....141...90L">Lee et
al. 2011</a>. They are able to determine [&alpha;/Fe] abundance
to an error less than 0.1 dex for stars with <i>T</i><sub>eff</sub> between 4500
and 7500 K, log <i>g</i> between 1.5 and 5.0, [Fe/H] between -1.4 and +0.3, and
S/N greater than 20. To accomplish this precision for a star with [Fe/H] &lt; -1.4,
a spectrum with S/N larger than 25 is required. The [&alpha;/Fe] abundance ranges
from -0.1 to +0.6.</p>

<p>These abundance measurements were tested on degraded ELODIE spectra, samples
of high- (R=15,000) and medium-resolution (R=6,000) spectra, and six open
and globular clusters.</p>

<h3><a href="dr10/algorithms/segue_target_selection_weights.php">Accounting for Observational Biases in SEGUE</a></h3>

<p>Certain aspects of the SEGUE target selection algorithm, in
addition to components of the survey's design,
will create observational biases in the sample. For example,
SEGUE assigns the same number of spectroscopic fibers to each plate,
regardless of the stellar density of the line-of-sight. As the stellar
number density changes over the SEGUE footprint, investigations using
the survey data must correct for this variable sampling to represent
the true underlying Milky Way stellar distributions. In
addition, some target types will require corrections for the color,
magnitude, and/or proper motion selection.  </p>

<p><a
href="http://adsabs.harvard.edu/abs/2011arXiv1112.2214S">Schlesinger
et al. 2012</a> investigated these biases for cool dwarf stars in
the SEGUE sample. This value-added catalog explains a technique to
constrain and account for the observational biases in SEGUE. It also
provides a series of weights that can be used to determine a complete,
unbiased SEGUE G- and K-dwarf sample. </p>

<h3><a href="dr10/spectro/duplicates.php">Duplicate Observations</a></h3>

<p>A list of identifiers for repeat spectroscopic observations of individual photometric
targets in SEGUE. These are particularly useful for testing consistency of the SSPP. </p>

<h2>Large Scale Structure Galaxy Catalogs</h2>

<p>The galaxy catalogs used in the DR10 large scale structure analyses, <em>e.g.</em>,
<!-- TODO: add link to Anderson et al. which will be after DR10 is released. -->
<a href=http://arxiv.org/abs/1312.4877>Anderson et al. (2013)</a> and
will be available from
<a href="http://data.sdss3.org/sas/dr10/boss/lss/">the SAS</a> when they are released.
The files in the catalogs are described in the
<a href="http://data.sdss3.org/datamodel/files/BOSS_LSS_REDUX/">data
model</a> on data.sdss3.org.</p>
<!-- <p>If you want to create your own LSS galaxy catalog from
scratch, we have created an <a href="dr10/tutorials/lss_galaxy.php">Large
Scale Structure Cookbook for Galaxies</a> to help you with that process.</p> -->

<h2>XDQSO</h2>

<p><a href="http://adsabs.harvard.edu/abs/2011ApJ...729..141B">Bovy et al. (2011)</a> describes a
technique for QSO target selection based on an extreme deconvolution method, which models the distribution of quasars and stars in color-color space, including their errors.
The associated catalog is available
<a href="http://data.sdss3.org/sas/dr10/boss/photoObj/xdqso">here</a>.  The
files in the catalog are described in the
<a href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/xdqso/xdcore/xdcore_RUN6.html">data model</a>.
</p>

<h2>Photometric Redshift Distributions</h2>

<p><a href="http://arxiv.org/abs/1109.5192">Sheldon et al. (2011)</a> have created a set of
photometric redshift probability distributions for galaxies in the SDSS-III imaging data. The
catalog is available
<a href="http://data.sdss3.org/sas/dr10/boss/photoObj/photoz-weight">here</a>.  The
files in the catalog are described in the
<a href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/photoz-weight/pofz.html">data model</a>.
</p>

<h2>Galaxy Parameters</h2>

<p>
  Catalogs of galaxy properties such as stellar masses, ages,
  stellar formation rates, and velocity dispersions are described
  on the <a href="dr10/spectro/galaxy.php">Galaxy Products</a> page.
</p>

<h2>QSO Catalog</h2>

<p>
The French Participation Group (FPG) to SDSS-III has produced a quasar
catalog, described in detail in <a href="http://arxiv.org/abs/1311.4870">Pâris et al. 2013</a>
and summarized on the
<a href="dr10/algorithms/qso_catalog.php">DR10Q algorithms page</a>.
</p>

<!--
<h2>Lyman-alpha Concordance Sample</h2>
<p>
  <span style='color:red'>TODO</span>: KG Lee et al 2012
</p>
<p>
  The Lyman-alpha concordance sample will be released with the Lyman-alpha
  BAO analysis (Fall 2012)
</p>
-->

<?php echo foot(); ?>

