<?php include '../header.php'; echo head("What&apos;s New in DR9?"); ?>

<div class="summary">
<p>Prior data releases have not changed. Data from <a href="dr8/">DR8</a> is available on
this site, and data from <a href="http://www.sdss.org/dr7">DR7</a> is available
from the original SDSS.</p>

</div>

<h2 id="BOSS">New spectra: Baryon Oscillation Spectroscopic Survey (BOSS)</h2>

<p>SDSS Data Release 9 includes the first public release of spectroscopic data from the
SDSS-III's <a href="surveys/boss.php">Baryon Oscillation Spectroscopic Survey (BOSS)</a>,
including 831,000 spectra of galaxies, quasars and stars over 3,300 square degrees.</p>

<p>BOSS is an ongoing survey whose primary science driver is to measure the baryon acoustic
oscillation (BAO) feature in the clustering of galaxies and the Lyman-&alpha; forest. By the end
of the survey, BOSS will measure spectra of 1.5 million galaxies to z~0.7, as well
as for 160,000 quasars with redshifts between 2.2 and 3.5. Data Release 9 contains the first
two years of BOSS spectroscopy (all BOSS observations between
2009 December 5 and 2011 July),
about 20% of the final BOSS dataset.</p>

<p>DR9 contains 540,000 spectroscopically-confirmed galaxies (with a
median redshift of 0.52), 100,000 quasars
most with redshift z &gt; 2.2,
and 116,000 stars, all selected over 3300 deg<sup>2</sup> of sky.</p>

<h3>New spectrographs</h3>

<p>To prepare for BOSS observations, in 2009 the original
<a href="http://www.sdss.org/dr7/instruments/spectrographs/index.html">SDSS spectrographs</a>
were completely revamped into the <a href="instruments/boss_spectrograph.php">BOSS
spectrographs</a>.  In particular:</p>

<ul>
<li>The spectrographs are now fed by
1000 fibers of 2" entrance aperture, rather than 640 fibers of 3" aperture</li>
<li>The CCDs were replaced with new devices with higher throughput and smaller pixels</li>
<li>The gratings were replaced with volume-phase holographic gratings</li>
<li>Much of the optics of the cameras were recoated or replaced</li>
</ul>

<p>These changes significantly improved the throughput of the spectrographs and increased the
wavelength coverage to 3600-10,400 &Aring;.  The spectral resolution varies from ~ 1300 at
3600 &Aring; to 3000 at 10,000 &Aring;.  </p>

<h3>New target selection algorithms</h3>

<p>The BOSS <a href="dr9/algorithms/boss_galaxy_ts.php">galaxy target selection
algorithm</a> is similar in spirit to the
<a href="dr9/algorithms/target_selection.php#lrg">Luminous Red
Galaxy target selection</a> used in SDSS-I and II, in that it selects the reddest
and most luminous objects at each redshift. However, the new algorithms target objects with a larger range of luminosities and colors than the old
LRG algorithm. In addition, the BOSS target selection algorithms are focused on
higher redshifts, aiming to measure the BAO signal at a median redshift of z~0.6.</p>

<p>The <a href="dr9/algorithms/target_selection.php#qso">SDSS-I/II quasar
target selection algorithm</a> aimed for completeness at all redshifts
below z=5.4. In contrast, the goal of BOSS is to measure the large-scale
structure of the Lyman-&alpha; forest, and thus focuses on the
redshift range between 2.2 and 3.5, with a magnitude limit of g=21.8.
This range of redshifts and magnitudes is challenging since quasars
with redshift z~2.7 have colors very similar to those of F stars, which means
that the quasar spectroscopic sample has extensive contamination from stars. </p>

<p>In addition, about 3.5 percent of the fibers are
<a href="dr9/algorithms/ancillary/">ancillary targets</a>, chosen to accommodate a
variety of science goals, ranging from stars in the halo to distant quasars.
Almost 30,000 objects have spectra repeated from SDSS-I/II;
the typical such object has a spectroscopic S/N a factor of almost 2 higher in BOSS than in SDSS-I/II.</p>

<h3>New processing pipelines</h3>

<p>These spectroscopic data are processed by a pipeline that is a
direct extension of that used by SDSS-I/II, and therefore the format
of the spectroscopic data is very similar to the format in SDSS-I/II. Therefore,
the <a href="dr9/data_access/#spectra">tools to access spectra</a> are similar
to those used in prior data releases.</p>

<p>For galaxies, the BOSS redshift pipeline now includes the following
<a href="dr9/algorithms/galaxy_portsmouth.php">Portsmouth</a> and
<a href="dr9/algorithms/galaxy_wisconsin.php">Wisconsin</a> stellar
population model algorithms, in addition to the
<a href="dr9/algorithms/galaxy_mpa_jhu.php">MPA-JHU value-added catalogs</a> released in DR8:</p>
<ul>
<li>Portsmouth spectro-photometric stellar masses, ages and stellar formation
rates based on the star-forming or passive stellar population models of
<a href="http://adsabs.harvard.edu/abs/2005MNRAS.362..799M">Maraston et al. (2005)</a>,
<a href="http://adsabs.harvard.edu/abs/2009MNRAS.394L.107M">Maraston et al. (2009)</a>,
computed from the best-fit SED model of
<a href="http://adsabs.harvard.edu/abs/2006ApJ...652...85M">Maraston et al. (2006)</a>.</li>
<li>Portsmouth Emission-line fluxes and equivalent widths, stellar and gas
kinematics, based on the stellar population synthesis models of
<a href="http://adsabs.harvard.edu/abs/2011MNRAS.418.2785M">Maraston &amp; Stromback (2011)</a>
and <a href="http://adsabs.harvard.edu/abs/2011MNRAS.412.2183T">Thomas, Maraston &amp;
Johansson (2011)</a> applied to BOSS spectra.</li>
<li>Wisconsin Stellar masses and velocity dispersions are derived from a BOSS spectrum principal
component analysis of
<a  href="http://adsabs.harvard.edu/abs/2012MNRAS.421..314C">Chen et al. (2012)</a> using
the stellar population models of
<a href="http://adsabs.harvard.edu/abs/2003MNRAS.344.1000B">Bruzual &amp; Charlot (2003)</a>.
</li></ul>

<h2 id="sspp">Stellar Parameters: Improvements to SSPP</h2>

<p>
For stars, a new version of the SEGUE Stellar Parameters Pipeline
(<a href="dr9/spectro/sspp.php">SSPP</a>) has been run, with improved temperature estimates for
cool stars (T<sub>eff</sub> &lt; 5000 K) thanks to <a href="dr9/spectro/sspp_irfm.php">
InfraRed Flux Method (IRFM)</a> implemented in the SSPP.</p>

<p>A grid of synthetic spectra with microturbulence depending on
surface gravity gives improved estimates of metallicity for metal-rich
stars ([Fe/H] &gt; -0.5). In comparison with values from DR8, the mean
DR9 T<sub>eff</sub> are larger by ~60 K, the mean log <i>g</i> values
are lower by 0.2 dex, and the [Fe/H] have not changed significantly.
The new SSPP code has been run on all stars in the SEGUE-1 and SEGUE-2 surveys,
as well as those in the SDSS-I/II Legacy survey. However, the new SSPP code
has <b>not</b> been run on stars that were observed as part of the BOSS survey.</p>

<h2 id="segue_vac">New SEGUE Value-Added Catalogs</h2>

<p>SEGUE has released three important value-added catalogs as part of
DR9. First, the SSPP automated measurements of <a
href="dr9/spectro/alpha_catalog.php">[&alpha;/Fe]</a> from <a
href="http://adsabs.harvard.edu/abs/2011AJ....141...90L">Lee et
al. 2011</a> are now available. Second, we have released the target
selection weights from <a
href="http://adsabs.harvard.edu/abs/2011arXiv1112.2214S">Schlesinger
et al. 2012</a>. This <a
href="dr9/algorithms/segue_target_selection_weights.php">value-added
catalog</a> explains the different observational biases in the SEGUE
G- and K-dwarf sample and how to correct for them. Finally, SEGUE also
provides a catalog of <a href="dr9/spectro/duplicates.php">Duplicate
Spectra</a>.</p>

<h2 id="astrometry">Improvements to Astrometric Calibration</h2>

<p>The reprocessing of the SDSS imaging data in DR8 unfortunately
introduced several <a
href="dr9/algorithms/astrometry.php#caveats">errors</a> in the
astrometric calibration. These have been corrected in DR9, and all
relevant files updated. The principal improvement is fixing a
systematic 250 mas error in coordinates, in regions northwards of
declination +41 degrees. We now also properly apply color terms to the
astrometry, the principal effect of which is to improve proper motion
estimates for a number of objects. SDSS Object IDs have <span class='term'>not</span> 
changed as a result as a the improved astrometry, although the IAU identifiers 
(SDSSJ...) may have changed.</p>


<h2 id="schema">Significant Changes to Data From DR8 and DR7</h2>

<ul>

   <li>The spectra are now available in the <a
   href="http://data.sdss3.org/">Science Archive Server (SAS) spectra
   search</a> in a packaged file, one per spectrum. The spectra were
   created by co-adding individual 15-minute exposures. In DR9, those
   individual exposures are also available as FITS files for both BOSS
   and SDSS spectrograph data (see the <a href="dr9/data_access/bulk.php#perobject">Spectra 
   per-object files download</a> page for instructions).</li>
   
   <li id="perobject">As of DR9, the imaging mask tables are now available in the
   Catalog Archive Server (CAS). These mask tables track the
   geometrical regions surrounding bright stars and their bleed
   trails, as well as the seeing in each subregion of each field. The
   Navigate tool allows you to see masks in Navigate tool, and why you
   might want to see the masks</li>

   <li>Starting in DR9, multi-epoch image information is now included
   in the <a
   href="http://data.sdss3.org/datamodel/files/PHOTO_SWEEP/RERUN/calibObj.html">sweep
   files of the photometry</a>, including coadded catalog fluxes and
   variability information from multiple observations of the same
   object.</li>

   <li>In DR8, we had changed the default algorithm for matching
   imaging and spectra to match each spectrum to the object
   contributing most to the <i>r</i>-band light at the location of the
   spectrum (a flux-based match), rather than simply searching for the
   object with the closest center (a position-based match).  For DR8,
   <code>bestObjID</code> gave the flux-based match and
   <code>origObjID</code> gave the position-based match. For DR9, we
   have changed the default algorithm back to position-based matching,
   so that <code>bestObjID</code> now gives the position-based match
   (as in DR7 and previous) whereas <code>fluxObjID</code> gives the
   flux-based match. Very few objects are affected by this change, but
   some spectra have <code>bestObjID</code> that now differ from their
   DR8 value. See <a href="dr9/algorithms/match.php">the matching
   algorithm documentation</a> for a more detailed description.</li>

   <li>In DR8 and later, several changes to the format were made
   relative to DR7 and earlier:
    <ul>

      <li>The <a
       href="dr9/algorithms/classify.php#photo_iso">isophotal
       parameters</a> in the photometry were dropped, since we
       consider them untrustworthy in most cases. </li>

      <li>Because DR9 contains target lists of a number of sorts
      (Legacy, SEGUE, and BOSS, as well as a number of special
      programs), we no longer have a target flag defined for every
      object.  Thus, features such as the SkyServer Navigate tool no
      longer will show every potential spectroscopic target, only
      those with actual spectra.</li>

      <li>In particular, the <code>primTarget</code> and
       <code>secTarget</code> flags are not reset for the new
       photometric reductions in DR8 and later, and are not given for
       each photometric object. In addition, in the spectroscopic
       catalogs these flags are deprecated because their meanings are
       overloaded, as describe in the <a
       href="dr9/spectro/targets.php">spectroscopic targeting
       documentation</a>.</li>

      <li>The <a
      href="dr9/help/glossary.php#ObjID"><code>objID</code></a> values
      for photometric objects changed between DR7 and DR8 and later,
      because the new photometric reductions mean that new objects
      have appeared, and others have disappeared, and the
      <code>rerun</code> number is different.</li>

      <li>The <code>specClass</code> spectroscopic classification in
      DR7 has been replaced by <code>class</code> and
      <code>subclass</code>. </li>
    <ul>

</ul>

<?php echo foot(); ?>
