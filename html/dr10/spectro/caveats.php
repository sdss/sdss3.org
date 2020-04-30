<?php include '../../header.php'; echo head('Spectroscopic Caveats'); ?>

<div class="summary">
    <p>There are several small caveats to watch out for in SDSS
	spectroscopic data. Some affect only a few spectra or a few data columns, while
	some have wider impacts. Some caveats in DR8 have been fixed with Data
	Release 9; those are listed on this page to allow for easier comparison between
	releases.</p>
	<p>This page contains a list of known
	caveats in SDSS Data Release 10 optical spectroscopic data.</p>
</div>

<h2>Caveats that affect <a href="dr10/spectro/caveats.php#allspec">all spectra</a></h2>
    <ol>
    <li><a href="dr10/spectro/caveats.php#balmerseries"><b>NEW:</b> Incorrectly-labeled Hydrogen Balmer line</a></li>
    <li><a href="dr10/spectro/caveats.php#zstatus">Redshift Status</a></li>
    <li><a href="dr10/spectro/caveats.php#extinct">Galactic Extinction Correction</a></li>
    <li><a href="dr10/spectro/caveats.php#night_sky">Night Sky Emission Lines</a></li>
    <li><a href="dr10/spectro/caveats.php#sky_sub">Sky Subtraction</a></li>
    <li><a href="dr10/spectro/caveats.php#perfect">Coadd errors</a></li>
    <li><a href="dr10/spectro/caveats.php#galveldisp">Galaxy Velocity Dispersion Measurements</a></li>
    <li><a href="dr10/spectro/caveats.php#clipped">Clipped Spectral Lines</a></li>
    <li><a href="dr10/spectro/caveats.php#fakebalmerlines">Spectrophotometric calibration induces artificial Balmer lines</a></li>
    <li><a href="dr10/spectro/caveats.php#known_missing">Known missing or corrupted spectra files on SAS</a></li>
	<li><a href="dr10/spectro/caveats.php#responselimit">SkyServer returns "response buffer limit exceeded"</a></li>

    </ol>

<h2>Caveats that affect <a href="dr10/spectro/caveats.php#Boss">BOSS spectra</a> only</h2>
    <ol>
    <li><a href="dr10/spectro/caveats.php#target">Target selection problems in early BOSS data</a></li>
    <li><a href="dr10/spectro/caveats.php#class">Classification and redshift efficiency</a></li>
    <li><a href="dr10/spectro/caveats.php#noqso">NOQSO: galaxy fits without QSO templates</a></li>
    <li><a href="dr10/spectro/caveats.php#bogus_hiz_qso">Bad CCD column results in bogus z>5 QSO identifications</a></li>
    <li><a href="dr10/spectro/caveats.php#qso_redshifts">QSO pipeline redshifts</a></li>
    <!-- <li><a href="dr10/spectro/caveats.php#coadd">Mask Bits in Coadd</a></li> -->
    <li><a href="dr10/spectro/caveats.php#qsoflux">QSO Flux Calibration is Wrong</a></li>
    <li><a href="dr10/spectro/caveats.php#qsoscans">QSO Visual Scans</a></li>
    <!-- <li><a href="dr10/spectro/caveats.php#mask">Incomplete Masking</a></li> -->
    <li><a href="dr10/spectro/caveats.php#flux_cal">BOSS Flux Calibration</a></li>
    <li><a href="dr10/spectro/caveats.php#stellar_classifications">BOSS Stellar Classifications</a></li>
    <!-- <li><a href="dr10/spectro/caveats.php#badfibers">Bad BOSS fiber 840</a></li> -->
	<li><a href="dr10/spectro/caveats.php#crosstalk">Artificial dichroic transitions at
	6000 &Aring; due to cross-talk from bright stars</a></li>
	<li><a href="dr10/spectro/caveats.php#washers">Correcting for wavelength dependence of
	focal plane when observing quasars</a></li>
	<li><a href="dr10/spectro/caveats.php#slowpokes">Position errors in some early plates in the
	Low-Mass Binary Stars ancillary target program</a></li>
    <!-- <li><a href="dr10/spectro/caveats.php#portsmouth">Problems with Portsmouth equivalent width
    and continuum flux measurements in the galaxy product.</a></li> -->
    </ol>


<h2>Caveats that affect <a href="dr10/spectro/caveats.php#Segue_Caveats">SEGUE spectra</a> only</h2>

<ol>
    <li><a href="dr10/spectro/caveats.php#Orphans">Missing Photometry</a></li>
    <li><a href="dr10/spectro/caveats.php#Duplicates">Duplicate Spectra</a></li>
    <li><a href="dr10/spectro/caveats.php#Quality_Cuts">Quality Cuts</a></li>
    <li><a href="dr10/spectro/caveats.php#obs_biases">Observational Biases</a></li>
</ol>

<h3>Caveats that affect stellar parameters from <a href="dr10/spectro/caveats.php#sspp">SSPP</a></h3>

        <ol>
        <li><a href="dr10/spectro/caveats.php#cc"> Correlation Coefficient</a></li>
        <li><a href="dr10/spectro/caveats.php#ston"> Signal-to-Noise Constraints</a></li>
        <li><a href="dr10/spectro/caveats.php#teff"> Effective Temperature Scale</a></li>
        <li><a href="dr10/spectro/caveats.php#grav"> Surface Gravity Determinations</a></li>
        <li><a href="dr10/spectro/caveats.php#rv"> Stellar Radial Velocities</a></li>
        <li><a href="dr10/spectro/caveats.php#beta"> SSPP Flags</a></li>

    </ol>

<h2>Other caveats</h2>

<h3><a href="dr10/spectro/caveats.php#phot_spec_match">Photometric-Spectroscopic Matching</a></h3>
<h3><a href="dr10/spectro/caveats.php#spec_plates">Specific Plates</a></h3>

<hr />
  <h2 id="allspec">Caveats that affect all spectra in DR10</h2>

	  <h3 id="balmerseries">Incorrectly-labeled Hydrogen Balmer line</h3>
      
      <p>In SDSS spectra released in DR8 – DR13, the Balmer Series line H&zeta; 
      (H-zeta, 3889.049 &Aring;) was incorrectly labeled as H&epsilon; 
      (H-epsilon, 3970.072 &Aring;), and the real H&epsilon; was not included in 
      the analysis of spectral lines. This affects line measurements tabulated in 
      <a href="https://data.sdss.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spZline.html">spZline</a> 
      files. These files are only available on the SAS. These measurements 
      are not loaded into any version of the CAS.</p>

      <h3 id="zstatus">Redshift status</h3>

        <p>
          The quality flags for the redshift fitting procedure is stored in
          the <a
        href="dr10/algorithms/bitmask_zwarning.php">
            <code>ZWARNING</code>
          </a>
          bit mask. Most redshift warnings indicate a likely substantial problem
          with the data, or an indication that the best-fit
	  classification or redshift is not reliable (due, e.g., to
	  low S/N, or the unusual nature of the spectrum). An exception is
	  <code>MANY_OUTLIERS</code>, which flags
          when many pixels are poorly explained in a statistical sense by the
          best-fit redshift model.  This bit is typically set for very high
          signal-to-noise ratio stars (where errors are small, so
          &chi;<sup>2</sup> is high), or galaxies with broad lines (the redshift
          fitting model includes only narrow lines); in such cases, the redshift
          is usually fine.
        </p>

        <p>
          About 2% of non-sky spectra have some warning set other than
          <code>MANY_OUTLIERS</code>. The redshifts of the remainder are
          virtually always correct. Many of the spectra flagged with problems
          also have correct redshifts and classifications, but we recommend care
          before using them.
        </p>

        <p>Note that the ZWARNING flag bits in BOSS are similar, but
	not identical, to those used in SDSS-I/II.</p>


      <h3 id="extinct">Galactic extinction correction</h3>

        <p>
          The spectra released in DR10 have not been corrected for Galactic
          extinction, because the SDSS includes a substantial number of spectra
          of Milky Way stars whose extinction would differ from that given in
          the Galactic dust maps, as they don't lie beyond the full
	  dust column.  This policy has been the standard since DR2; in the EDR
          and DR1, the spectroscopic data were corrected for galactic
          extinction.  The extinction is a relatively small effect
	  over most of the survey area, since the
          median <var>E(B-V)</var> over the survey is around 0.04; however, for
          some SEGUE pointings the reddening can be substantially larger.
        </p>

        <p></p>


        <h3 id="night_sky">Night sky emission lines</h3>

        <p>
          The night sky emission lines at 5577&Aring;,  at
	  6300&Aring;, 6363&Aring; (when there is auroral
          activity), and in the OH forest in the red
          can be very strong, and leave significant residuals in the spectra
          whose amplitude is occasionally underestimated by the noise model.  Be
          cautious about interpreting the reality of weak features close to
          these lines.
        </p>

      <h3 id="sky_sub">Sky Subtraction Bias</h3>
          <!-- Ticket 1486 -->

          <p>The sky spectrum estimates in BOSS (and in fact in SDSS)
          that are subtracted from each object are biased slightly low.
          This is due to the well-known bias associated with fitting an
          error-weighted model to data when the errors are estimated
          from the data itself (e.g. in the case of Poisson estimates of
          errors). These residuals can be detected by taking the average
          of the sky-subtracted sky fibers, which yield a slightly
          positive spectrum ranging from 7&times;10<sup>-20</sup>
          erg/cm<sup>2</sup>/s/A at around 8000 Angstroms to up to
          10<sup>-18</sup> erg/cm<sup>2</sup>/s/A at the bluest and
          reddest end of the spectra.</p>

      <h3 id="perfect">Coadd errors are not perfect</h3>

          <p> The default BOSS spectra distributed in DR10 are coadded
            from several individual exposures. Each individual exposure
            has a slightly different relationship of pixel number to
            wavelength.  Thus, errors in the coadded spectra have
            covariance between neighboring spectral bins; however, we do
            not calculate or track this covariance.  As a result, there
            is a 10-20% "error-on-the-error" in the coadd noise model.
            If discrepancies at this level matter for your analysis, you
            should use the individual exposures, which have a much
            better accuracy in their noise model (1-2%).  </p>

      <h3 id="galveldisp">Galaxy velocity dispersion measurements</h3>

        <p>
          We recommend not to use SDSS velocity dispersion measurements
          for:
        </p>
        <ul>
          <li>
            spectra with median per-pixel <var>(S/N)</var><sup>2</sup> &lt; 10
          </li>
          <li>
            velocity dispersion estimates smaller than about 70 km s<sup>-1</sup>
            given the typical S/N and the instrumental resolution of the SDSS
            spectra
          </li>
        </ul>

        <p>
          Also note that the velocity dispersion measurements are not
          corrected to a standard aperture size.
        </p>

        <p>
          See the <a href="dr10/algorithms/redshifts.php#veldisp">
            velocity dispersion
            algorithm
          </a> for details.
        </p>


    <h3 id="clipped">Clipped Spectral Lines</h3>

        <p>
          Some emission lines are erroneously clipped because they were
          identified as cosmic rays.  If an emission line is so bright that it
          is saturated in the individual 15-minute exposures of the
          spectrograph, it can suffer this effect.  Unfortunately, such
          saturated pixels are not flagged as such, although usually that region
          of the spectrum has an inverse variance equal to zero.
        </p>

        <p>
          Luckily, objects with such strong emission lines are very rare, but
          the user should be aware of the possibility of objects with extremely
          strong emission lines and unphysical or unusual line ratios.
        </p>



    <h3 id="fakebalmerlines">Spectrophotometric calibration induces artificial Balmer lines</h3>

        <p>
          Very occasionally, the spectrophotometric calibration procedure
          induces redshift-zero Balmer lines that are apparently due to
          mismatches between the calibration stars and the template library.
          This is noticeable in particular on some fibers in plate 274.  This
          problem existed in previous data releases as well.
        </p>

    <h3 id="known_missing">Known missing or corrupted spectra files on SAS</h3>

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

<h2 id="responselimit">SkyServer returns "response buffer limit exceeded"</h2>

<p>A <a href="http://skyserver.sdss3.org/dr10/en/tools/search/sql.aspx">SQL Search</a> query
on SkyServer might, on very rare occasions, return the following error:<br /><br />

<code>
 SQL returned the following error message:<br />
006~ASP 0251~Response Buffer Limit Exceeded~Execution of the ASP page caused the Response Buffer to exceed its configured limit.<br />
Your SQL command was:<br />
</code>
</p>

<p>This message is due to a default behavior of Microsoft Internet Information Services (IIS)
version 6.0 and higher -
<a href="http://support.microsoft.com/kb/925764">documented in the Microsoft Knowledge Base</a> -
in which responses to actions of Active Server Pages (.asp) are limited to 4 MB file size.</p>

<p>This error is extremely rare, but there is a simple workaround: simply run the
query in <a href="http://skyserver.sdss3.org/casjobs/">CasJobs</a> instead.</p>

<p><a href="dr10/spectro/caveats.php">Back to top</a></p>


<hr />

   <h2 id="Boss">Caveats that affect BOSS spectra</h2>

    <h3 id="target">Target selection issues in early BOSS data(<em>BOSS</em>)</h3>

        <p> The details of the targeting algorithm and photometric
            pipeline have changed throughout the first year of BOSS
            observations. Particular care should be taken with the
            following:</p>

				<ul>

          <li> <b>Chunks "boss1" and "boss2" (around 5% of the BOSS
          data in DR9)</b>: these used a different definition of the
          <code>BOSS_TARGET1</code> flags. In particular, the
          <code>GAL_CMASS</code> and <code>GAL_CMASS_SPARSE</code>
          bits were used for internal tests and should not be used to
          select objects from these chunks. In order to select a
          <code>CMASS</code> or <code>CMASS_SPARSE</code> sample of
          objects, one should select objects based on the
          <code>GAL_CMASS_COMM</code> bit and sub-select objects that
          pass the final <code>CMASS</code> cuts (taking into account
          possible changes in photometry).</li>

					<li> <b>Chunks "boss1" to "boss14" (around 70% of the BOSS
          data in DR9)</b>: the targeting photometry of a given object
          in these chunks may not correspond to its final
          photometry. This affects a tiny percentage of targets, and
          may mean that the final matched photometry of a target falls
          outside the color and flux limits. In these cases, such
          objects should still be considered as valid targets: the
          scatter across the boundaries simply reflects the stochastic
          element of targeting a sample from noisy data. To find the
          original targeting photometry for any galaxy use the
          <code>targetObjID</code> in <code>specObj</code> (either
          within CAS or within the flat files).</li>
          <!-- More details are
          available in <a href="dr10/tutorials/lss_galaxy.php">the LSS
          Galaxy Catalog cookbook</a>.</li> -->

          <li> <b>Chunks "boss1" to "boss6" (around 40% of the LOWZ
          data)</b>: due to a bug in the target selection,
          <code>LOWZ</code> galaxies were incorrectly targeted during
          the initial stages of the survey. These chunks should be
          excluded from any LOWZ analysis. The simplest way to do so
          is to require <code>tileID</code> &ge; 10324.</li>

			 </ul>

    <h3 id="class">Classification and redshift efficiency (<em>BOSS</em>)</h3>

        <p>Classification and redshift efficiency depends mildly on fiber number and thus
          position on the focal plane.  The spectrograph PSF gets worse
          at the CCD edges which results in lower-quality spectra with
          lower efficiency for determining classification and redshift.
          See <a href="http://adsabs.harvard.edu/abs/2012MNRAS.424..564R">Ross et al. (2012)</a>,
          Figure 3.
        </p>

    <h3 id="noqso">NOQSO</h3>
    <p>
      A dominant source of bad classification/redshift fits to galaxy spectra
      is QSO templates with unphysical parameters, e.g. negative terms
      so that QSO emission lines "fit" galaxy absorption lines.
      To correct for this, galaxy spectra also have a
      <code>ZWARNING_NOQSO</code> mask,
      <code>Z_NOQSO</code> redshift, etc.
      which excludes QSO templates
      when performing classification/redshift fits.
      For studies with galaxy spectra, these <code>*_NOQSO</code>
      values should be used instead of the original
      <code>ZWARNING</code> mask,
      <code>Z</code> redshift, etc.
    </p>

    <h3 id="bogus_hiz_qso">Bad CCD column results in bogus high-z quasars</h3>
    <p>
      Some unmasked intermittently bad CCD columns result in spurious
      identifications of spectra as z&gt;5 quasars.  These affect fibers
      40, 59, 60, 833, 839, and 840.
      Treat any redshifts this large with caution, and especially these fibers.
    </p>

    <h3 id="qso_redshifts">QSO pipeline redshifts</h3>
    <p>The accuracy of the quasar redshift estimated by the BOSS
     pipeline depends on the quasar redshift. At low redshifts
     (<var>z</var>&lt;1.6), the pipeline estimate is very accurate. At
     higher redshifts, when the CIV line enters in the BOSS wavelength
     range, the redshift estimate tends to be biased by the CIV
     emission line position. In the redshift range 2 to 2.5, where the
     MgII emission line still lies in the spectrum, about half of the
     redshifts are underestimated by about +0.005 in <var>z</var>.
     </p>

<!--  Removed; this was fixed for DR10
    <h3 id="coadd">Mask Bits in Coadd (<em>BOSS</em>)</h3>

        <p>In the <a href="dr10/algorithms/bitmask_sppixmask.php">SPPIXMASK</a> associated with each spectrum, mask bit 24 (NODATA) should be ignored in the AND_MASK of
          BOSS coadded spectra (
          <a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/PLATE4/spPlate.html">spPlate</a> and
          <a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/spectra/PLATE4/spec.html">spec</a>). That is, a good pixel is one that satisfies the conditions:
        </p>

        <pre>good = (AND_MASK=0 or AND_MASK=2^24) and ivar &gt; 0</pre>

				<p>The NODATA bit is being incorrectly set in these cases near the overlap of the dichroic between the two spectra. This error will be fixed in future reductions.</p>
-->

     <h3 id="qsoflux">QSO Flux Calibration is Wrong (<em>BOSS</em>)</h3>

        <p> BOSS QSO target fiber positions are purposefully offset in
          X and Y (position in the focal plane), and Z (vertical
          offset from focal plane) to optimize the S/N in the at 4000
          &Aring; for Lyman-alpha forest studies.  Since the standard
          stars used for flux calibration are positioned for &lambda;
          = 5400 &Aring; (like the galaxies), and because (primarily)
          of chromatic differential refraction therefore affects the
          standards differently than the quasars, the derived flux
          solutions are not appropriate for quasars.  This results in
          overall bluer quasar spectra, though the mis-calibration
          varies from exposure to exposure and position in the focal
          plane.  This does <em>not</em> affect original SDSS quasar
          spectra which did not have the xyz hole offsets, or most of
          the ancillary spectra. The quantity <code>lambdaEff</code>
          stored for each spectrum reports what wavelength the fiber
          position was optimized for.  See
          <a href="http://adsabs.harvard.edu/abs/2013AJ....145...10D">Dawson et al. (2012)</a>.</p>

    <h3 id="qsoscans">QSO Visual Scans (<em>BOSS</em>)</h3>

      <p>All QSO targets are visually inspected to verify their classification
        and redshift.  In DR9, these results were
        included in the spAll and specObj catalogs as columns Z_PERSON, CLASS_PERSON,
        and Z_CONF_PERSON.  For DR10 and beyond, these have been
        factored out into the DR10Q catalog be published separately
        as an update to the <a href="dr9/algorithms/qso_catalog.php">DR9Q SDSS QSO
        catalog</a>.
        </p>

<!-- Fixed in DR10
    <h3 id="mask">Incomplete Masking (<em>BOSS</em>)</h3>

        <p> Some CCD columns have transient glitches which are
          unmasked in the raw data.  This primary affects fiber 840
          which has an unusually large number of bad spectra around
          8300 &Aring;.  </p>
-->

    <h3 id="flux_cal">BOSS Flux Calibration</h3>

        <p>
          The flux calibration of individual exposures
          has an observing hour-angle and fiber dependence,
          especially below 4200 Angstroms.
          Analyses which rely upon accurate flux calibration of
          individual exposures should perform additional systematics
          cross checks for the consistency between different exposures
          of the same object,
          and avoid data observed at large hour-angles.
          </p>
          <p>
          This issue may also affect SDSS spectra but that has not
          been confirmed.
          </p>

<h3 id="stellar_classifications">BOSS Stellar Classifications</h3>

  <p>
  BOSS object classifications are primarily focused on the identification
  of galaxy vs. quasar vs. star.  Although sub-classifications are provided,
  they are not optimized for accuracy.  In particular, the CV star templates
  have more degrees of freedom than other stellar templates, which can
  result in unphysical solutions where negative PCA components of the
  CV templates can fit absorption features of White Dwarfs.  Fixing this
  has not been a high priority since the primary classification of "star"
  vs. "galaxy" or "qso" is still correct.
  </p>

<!-- Fixed in DR10
    <h3 id="badfibers">Bad BOSS Fiber 840</h3>

        <p> Due to an untracked, transient bad column in one of the
          CCDs, in BOSS spectra FIBERID 840 occasionally (around 20%
          of the time) has unflagged bad data, which can cause
          unphysical fits, including classifying objects as very high
          redshift quasars.  </p>
-->


    <h3 id="crosstalk">Artificial dichroic transitions at 6000 &Aring; due to
	cross-talk from bright stars</h3>

<p>A small number of spectra are affected by cross-talk from bright stars
(generally spectrophotometric standards) in neighboring fibers. This is
often manifested in a strong break feature at the dichroic transition
around 6000 &Aring;, resulting from different levels of cross-talk between
the red and blue arms of the spectrograph.</p>

<p>These effects appear to occur less frequently at later survey dates, which
would be consistent with the improvements in the focus of the BOSS
spectrograph cameras that have been achieved with routine operation.</p>

<p>We intend to mitigate these effects in future BOSS data releases through
improvements in the extraction codes, and to flag any spectra that remain compromised.
No masking of this effect is implemented for BOSS DR10 data, however, except
to the extent that it triggers a <code>ZWARNING</code> bit in certain instances.</p>

<h3 id="washers">Correcting for wavelength dependence of focal plane when observing quasars</h3>


<p>In addition to the wavelength-dependent ADR offset, we also
account for the wavelength dependence of the focal plane when
observing the quasar targets.  The focal plane for 4000 &Aring;ngstrom
light differs from the focal plane for 5400 &Aring; light by 0-300
microns, depending on the distance from the center of the plate.
To account for this difference, small, sticky washers are inserted
at the location of certain quasar targets.</p>

<p>The washer causes the fiber tip to sit slightly behind the 5400 &Aring; focus.
No washers are used for holes within 1.02 degrees of the plate center.
Between 1.02&deg; and 1.34&deg;, 175 &mu;m washers are used; between
1.34&deg; and 1.49&deg;, 300 &mu;m washers are used.  Washers only became
available after MJD 55441 (September 2, 2010), and were not consistently used until
MJD 55474 (October 5, 2010).
</p>

<p>In the DR10 data model, the value of <code>ZOFFSET</code> is given in microns
(&mu;m). It can be found in the <a href="http://data.sdss3.org">Science Archive
Server&nbsp;<img src="images/offsite.png" alt="(offsite)" /></a> in the
<a href="http://data.sdss3.org/datamodel/files/PLATELIST_DIR/designs/DESIGNID6XX/DESIGNID6/plateDesign.html"><code>plateDesign</code></a>,
<a href="http://data.sdss3.org/sas/dr10/boss/spectro/redux/v5_5_12/spAll-v5_5_12.fits"><code>spAll</code></a>, and
<a href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/specObj-dr10.fits"><code>specObjAll</code></a>
files, and in
<a href="http://skyserver.sdss3.org">SkyServer&nbsp;<img src="images/offsite.png" alt="(offsite)" /></a>
in the
<a href="http://skyserver.sdss3.org/dr10/en/help/browser/browser.aspx#&&history=search+specobjall">
<code>specObjAll</code>&nbsp;<img src="images/offsite.png" alt="(offsite)" /></a>
table and its associated views.</p>


<p>Note that <code>ZOFFSET</code> is the <span class="term">intended</span>
washer usage, which may not match the
<span class="term">actual</span> washer usage. The exact washer usage for each observation during
this transition period (including plates with repeat observations spanning this
time-period) is documented in the file found at
<a href="http://www.sdss3.org/svn/repo/idlspec2d/trunk/opfiles/washers.par">
http://www.sdss3.org/svn/repo/idlspec2d/trunk/opfiles/washers.par
<img src="images/offsite.png" alt="(offsite)" /></a>.
Observations prior to MJD 55441 did not have washers;
Observations after 55474 have washers unless they are
listed otherwise in washers.par.
</p>

<p>The discrepancy will be resolved with Data Release 10 in the summer of 2013. By
optimizing the focal plane position, and thus the signal-to-noise ratio (SNR),
for 4000 &Aring; light, we are also perturbing the spectrophotometry relative to the
standard stars as discussed in <a href="http://adsabs.harvard.edu/abs/2013AJ....145...10D">Dawson et al. (2012)</a>.
</p>

<p>Only the <code>CORE</code>, <code>BONUS</code>, and <code>QSO_VAR_SDSS</code>
quasar targets are optimized in this way for 4000 &Aring; focal plane and ADR offsets.
Otherwise, the plate design remains the same as it was in the SDSS-I and
SDSS-II surveys (<a href="http://adsabs.harvard.edu/abs/2002AJ....123..485S">Stoughton et al.
2002</a>).</p>

<h3 id="slowpokes">Position errors in some early plates in the
	<a href="dr10/algorithms/ancillary/boss/lowmassbinary.php">Low-Mass Binary Stars</a> ancillary
	target program</h3>

<p>There was an error in correcting the positions of the target for their proper motions in the first year of the ancillary target program, affecting targets in plates numbered less than 3879 or between 3965-3987.</p>

<!-- FIXED IN DR10
<h3 id="portsmouth">Problems with Portsmouth equivalent width and continuum
flux measurements in the galaxy product.</h3>

<p>Due to a bug in the DR9 version of the
<a href="dr9/algorithms/galaxy_portsmouth.php">Portsmouth Stellar Kinematics and Emission Line Fluxes code</a>,
EW values need to be divided by a factor (1+<var>z</var>) and Continuum Flux measurements need to
be multiplied by a factor (1+<var>z</var>) before being used. This will be corrected in the DR10 version.</p>
-->
<hr />



<h2 id="Segue_Caveats">Caveats that affect SEGUE spectra</h2>

<h3 id="Duplicates">Duplicate Spectra</h3>

<p>Some objects have multiple spectroscopic observations, either from
being an intentional repeat, as a QA target, or as part of a different
program or survey, or, finally, from being on a plate with multiple
observations.  Thus, while each object in the CAS has only one
<i>bestobjid</i>, associated with the photometry, it may have multiple
<i>specobjid</i>, one for each spectroscopic observation. </p>

<p>SpecObjAll has a number of parameters that signify whether or not
       an observation is the best (defined as the highest S/N) available:</p>
<ul>
       <li><i>segue1primary</i>: Best observation of a target in SEGUE-1. </li>
       <li><i>segue2primary</i>: Best observation of a target in SEGUE-2. </li>
       <li><i>segueprimary</i>: Best observation of a target in all of SEGUE, also in the sppParams table  </li>
</ul>

<p>For example, imagine a star that we have three observations of. Two of these observations are
on SEGUE-1 plates. Of these two, the one with the highest S/N will have <i>segue1primary</i> set to 1. Imagine
that the third observation is on a SEGUE-2 plate, and that this has the highest S/N overall.
This third observation will have <i>segue2primary</i> set to 1, as it is the best observation of an
object in SEGUE-2. It will also have <i>segueprimary</i>=1. Thus, even though one of the two
SEGUE-1 observations is better than the other, and has <i>segue1primary</i>, set to 1,
it will not have <i>segueprimary</i>=1. </p>

<p>To make sure that any query returns one and only one
spectroscopic observation of any object, and that it is the best observation of that object,
use the <i>segueprimary</i> parameter in either sppParams or SpecObjAll. To extract
the best observation from exclusively SEGUE-1 plates, use <i>segue1primary</i>. Finally,
to pull out the best observation from SEGUE-2, use <i>segue2primary</i>.
The criteria for an observation to be <i>sciencePrimary</i> and more general information is
available at the <a href="dr10/spectro/catalogs.php">SDSS Spectroscopic Catalogs</a> page.
Adding the following clause to a query will ensure that it returns a unique set of SEGUE objects:</p>
<pre>
SELECT ...
FROM SpecObjAll as sp
WHERE sp.seguePrimary = 1
AND ....
</pre>

<p>This same criteria will work for the sppParams table. </p>

<p>If, for any particular reason, you do not want to use the <i>seguePrimary</i> parameter
to eliminate duplicates, you can examine the number of times a particular target appears in CASJobs output by
using the <i>count</i> function. This can be a useful way to verify that your
queries are working appropriately. For example, to examine the number of times each <i>bestobjid</i> value
appears in a particular sample, one would use the following query: </p>
<pre>
SELECT sp.bestobjid, count(sp.bestobjid) as count
FROM SpecObjAll as sp
group by sp.bestobjid
</pre>

<p>The query above lists every <i>bestobjid</i> in SpecObjAll and the number of times it appears. If you
want to avoid any target that is observed multiple times, which will severely limit any sample, you can use
the following query: </p>
<pre>
SELECT sp.bestobjid, count(sp.bestobjid) as count
FROM SpecObjAll as sp
group by sp.bestobjid
having count(sp.bestobjid) = 1
</pre>

<p>Similarly, altering the query above to read <i>having count(sp.bestobjid) &gt; 1</i> would list every target that
is observed multiple times. </p>

<p>It is critical to identify and account for duplicates in your sample, both from the perspective of avoiding
repeats and to ensure a complete sample. They can also be very useful for testing different aspects of the
SSPP and other estimates of stellar properties. <a href="dr10/spectro/duplicates.php">Duplicate SEGUE Observations</a> lists the stars with multiple observations. </p>

<h3 id="Quality_Cuts">Quality Cuts</h3>

<p>There are a number of CAS parameters that allow you to avoid poor quality SEGUE data. These are
detailed in the <a href="dr10/tutorials/segue_sqlcookbook.php#Quality">SEGUE SQL Cookbook</a>.</p>

<h3 id="obs_biases">Observational Biases in SEGUE</h3>

<p>The survey design and target selection algorithm of SEGUE will give
rise to a number of different observational biases. It is imperative
to constrain and correct for these biases when extracting a SEGUE
sample representative of the underlying Milky Way properties. <a href="http://adsabs.harvard.edu/abs/2012ApJ...761..160S">Schlesinger et al. 2012</a> determined and corrected for the effect of SEGUE target selection on cool dwarf stars using a series of scaling
weights. These weights, and a brief description of how they were determined,
is available in the <a
href="dr10/algorithms/segue_target_selection_weights.php">Target Selection
Weights</a> value-added catalog. Although DR10 contains corrections for
only the G- and K-dwarf SEGUE-1 samples, many of the techniques are
applicable, with modification, to other SEGUE stellar categories.</p>

<h3 id="sspp">SSPP</h3>

<p>Caveats that affect fitted parameters from SSPP</p>
    <h4 id="cc"> Correlation Coefficient </h4>
         <p>
           The correlation coefficient quantifies how well an
           observed SEGUE spectrum matches a synthetic spectrum generated
           with its adopted <i>T</i><sub>eff</sub>, log <i>g</i>, and [Fe/H].
           These measurements are listed in the SSPP as
           <i>CCCAHK</i>, which compares the spectra from 3850-4250 &#8491;,
           and <i>CCMGH</i>, from 4500-5500 &#8491;. The correlation coefficient
           ranges from 0 to 1, with 1 indicating an excellent match
           between the two.
        </p>

	<p>However, due to an error in the treatment of the inverse variance flux error
	   array in the methods of NGS1, NGS2, and CaIIK1, there are some stars with very
	   incorrect parameters. There are 8280 stars are affected by this bug in the SSPP. This
	   is less than 2% of the set of SDSS, SEGUE-1, and SEGUE-2 stellar spectra with
	   valid g-r and S/N limits that the SSPP is able to estimate parameters for. These
	   stars can be removed by requiring <i>CCMGH</i> and <i>CCCAHK</i> in the SSPP parameter table
	   to be greater than zero, that is, <i>CCMGH</i> > 0 and <i>CCCAHK</i> > 0.
	</p>

   <p>Similarly, if more than 5&#37; of a wavelength region used by a particular
   parameter estimation method is missing pixels for an individual star (e.g., has the inverse variance of the
   spectrum flux array set to 0), the SSPP does not report the estimated value from this technique. This
   improves the reliability of the parameter estimates, especially at very low metallicity. </p>

    <h4 id="ston"> Signal-to-Noise Constraints </h4>
        <p>
        The SSPP only provides stellar parameter estimates for stars where the measured
        S/N per 1&#8491; pixel is 10 or greater (<i>sppParams.snr</i>). Below this limit,
        the spectra are too noisy for reliable estimates.
       </p>

       <p>
        There are around 373,300 stars in SEGUE-1 and SEGUE-2. Around 67,200 of
        these spectroscopic observations have S/N&lt;10, approximately 18&#37;. Thus,
        S/N constraints affect a significant portion of the sample.
      </p>

    <h4 id="teff"> Effective Temperature Scale </h4>
        <p>
         The DR9 and beyond versions of the SSPP adopts a much improved (<i>g-i</i>)-temperature
         relation, the InfraRed Flux Method (IRFM)
         (<a href="http://adsabs.harvard.edu/abs/2010A%26A...512A..54C">Casagrande et al. 2010</a>).
         Each SSPP temperature estimate is re-scaled to match the IRFM estimate. In particular,
         this improves the estimates of T<sub>eff</sub> for cool stars (&lt;5000 K).
        </p>

    <h4 id="grav"> Surface Gravity Determinations </h4>
        <p>
         The SSPP for DR7 and DR8 used 10 different methods to estimate surface gravity. However,
         the gravity estimates from MgH, CaI2, and k24, have been removed starting with DR9. Comparison
         with high-resolution observations of SEGUE targets found that these techniques deviated
	 significantly from the expected log <i>g</i>. Although removing these techniques from the pipeline have improved the
         surface gravity estimates, there are still known problems. Specifically, the DR9+ SSPP
         gravity estimate tends to overestimate log <i>g</i> by up to 1.0 dex for very cool giant
         stars. This issue was also in the DR8 SSPP.
       </p>

       <p>
         Although the SSPP continues to improve its log <i>g</i> techniques, the SSPP surface gravity
         estimates have large uncertainties. They are meant to help distinguish between the evolutionary
         states of different stars but are not meant to be used as a precise log <i>g</i> value.
       </p>


    <h4 id="rv"> Stellar Radial Velocities</h4>

          <p>
            The standard redshift <code>z</code> from <code>idlspec2d</code> is
            available unaltered in the specObj and sppParams tables.  These
            redshifts, primarily for galaxy work, have no offsets or corrections
            applied.
          </p>

          <p>
            For stars, a better redshift to use is the ELODIE-matched template
            redshifts, stored as <code>elodie_z</code> in the <a
          href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/specObj.html">specObj</a>
            file and the <code>specObj</code> table in CAS.  The CAS also records
            this as the quantity <code>elodierv</code> in the sppParams table, but
            with a correction term:
          </p>

          <pre>
            elodierv = c*elodie_z+7.3 km/s
          </pre>

          <p>
            The 7.3 km/s is an empirically derived offset putting the
            <code>elodierv</code> of all stars on a system consistent with that of
            other literature measures of known radial velocity standards.
          </p>

    <h4 id="beta"> SSPP Flags</h4>
   <p>The DR10 SSPP has a flag 'B', which indicates that the
      measured H&#945; strength is different than that predicted from the H&#948; line.
      The relation used to predict H&#945; strength breaks down for stars below 5800 K,
      as their H&#948; lines are too weak. Therefore, the 'B' flag should not be used
      for stars below this temperature.</p>

<h2 id="phot_spec_match">Photometric-Spectroscopic Matching Caveats</h2>

<p>Caveats that affect matching between photometric and spectroscopic data.</p>

     <h3 id="missingdr10">Missing matches in DR10
     <code>photoObjAll</code> table (fixed)</h3>

		    <p>
         At the time of the DR10 release, the <code>photoObjAll</code> table
				 values of <code>specObjID</code> were incompletely updated at
         first. This meant that a <code>JOIN ON photoObjAll.specObjID
         = specObjAll.specObjID</code> would yield incorrect results
         (although <code>JOIN ON photoObjAll.objID =
         specObjAll.bestObjID</code> would yield correct results).
         This problem was corrected as of August 10, 2013.
		    </p>

     <h3 id="specphotomismatch">Mismatches between spectra and photometric data</h3>

        <p>
          There are occasional "mismatches" between the spectra and the
          photometry, both due to problems on the spectroscopic side in
          identifying the location associated with every fiber, and due to
          problems on the photometric side in finding an associated photometric
          object given a location.
        </p>

        <p>
          With some frequency, the fiber mapping failed which identifies
          which fiber has been plugged into which hole. There are around 7200
          such cases in DR10, which are marked as <code>UNPLUGGED</code> in the
          <code>
            <a
        href="dr10/algorithms/bitmask_zwarning.php">ZWARNING</a>
          </code>
          bitmask. The vast majority of these cases occur because the fiber was
          actually not plugged or was broken (in such cases, essentially no
          signal is detected in the fiber, and <code>snMedian</code> is reported
          as zero). In around 200 cases, there is measurable signal down the
          fiber. In cases where there is more than one such fiber on plate,
          there is a possibility that the fiber location associated with the
          spectrum is incorrect (and thus that the photometric and
          spectroscopic information is mismatched). This problem occurs for
          around 70 objects in the survey.
        </p>

        <p>
          Other mismatches can occur due to problems in the
          photometry. Errors in the deblending algorithm in the
          <code>target</code> reductions caused spectroscopy to be carried out
          occasionally on non-existent objects (<i>e.g.</i>, diffraction spikes
          of bright stars or satellite trails).  Many of these objects no longer
          exist in the current imaging reductions, with its improvements to the
          deblender over the years. We have in fact tried to mitigate this
          problem in this data release, as described in the <a
        href="dr10/algorithms/match.php">
            spectroscopic-photometric matching
            documentation
          </a>.
        </p>

      <h3 id="Orphans">Missing SEGUE Photometry</h3>

   <p>The latest photometry is available for nearly
   all SEGUE objects; however, for a small fraction of fields (about 0.5%),
   the photo pipeline timed out before it finished
   cataloging and deblending objects. This is usually because there is
   a bright star in the field with scattered light wings that cause
   the deblender to work especially hard, as mentioned above. It also occurs for some of
   the lines-of-sight that include an open or globular cluster, where
   the deblender has difficulty separating stars from one another in the
   crowded field. Finally, it also occurs for SEGUE "SKY" spectra,
   which are pointed at a blank piece of sky, with no star or other
   imaging object underneath, for calibration purposes. For all of
   these spectroscopic observations, <i>bestobjid</i> is set to 0.
   </p>

   <p>
   There are about 12,500 stellar spectra that have no
   matching photometry. One can still find the photometry for these
   objects by looking in the DR7 database and doing a position match.
   This requires a two stage query, as follows:
   </p>

<p> 1) To extract spectra of objects with no photometry, search
   for targets with <i>sppparams.bestobjid = 0 </i> and
   <i>sppparams.elodiervfinalerr &gt; 0</i>, while rejecting sky
   spectra by excluding objects with <i>sp.sourcetype ='SKY'</i> or <i>sp.sectarget != 16</i>: </p>

<pre>
SELECT
  s.plate,s.mjd,s.fiberid,sp.ra,sp.dec,s.elodiervfinal,s.elodiervfinalerr,
  s.fehadop,s.loggadop,sp.sourcetype
INTO mydb.orphandr9spectra
FROM sppparams s
JOIN specobjall sp on s.specobjid=sp.specobjid
WHERE s.bestobjid = 0
  AND s.scienceprimary =1
  AND elodiervfinalerr > 0
  AND sp.sourcetype != 'SKY'
  AND sp.sectarget != 16
</pre>

<p>2) The PhotoObjDR7 and SpecDR7 tables match the objid from DR7 to those
  from later data releases. We can use
  these to extract DR7 photometry from PhotoObjAll: </p>

<pre>
SELECT top 10
  poa7.run,poa7.rerun,poa7.camcol,poa7.field,poa7.obj,
  poa7.ra as pra,poa7.dec as pdec,poa7.psfmag_g,poa7.psfmag_r,m.*
FROM mydb.orphandr9spectra_newquery as m
  JOIN specdr7 as sdr7 on m.specobjid=sdr7.specobjid
  JOIN dr7.photoobjall as poa7 on sdr7.dr7objid=poa7.objid
</pre>

<p> Not all of the "orphan" spectra have matching DR7 photometry, only around 5,300 do. Many of
the lines of sight missing photometry come from crowded fields, such as the <i>segcluster</i> pointings.</p>


      <h3 id="photomatch">Targeting photometry vs. matched photometry (<em>BOSS</em>)</h3>

          <p>
            The SDSS photometry version used when selecting targets for spectroscopy
            can be different than the DR8 version of the photometry used for matching
            observed spectra with photometric objects.  The extreme case is ancillary
            programs, which may not have used SDSS photometry at all for their target
            selection.
          </p>
          <ul>
            <li>
              The <b>plugMap</b> information, e.g. in spPlate HDU 5, tracks the
              photometry used for targeting.
            </li>
            <li>
              The <b>photoPos</b> information in photoPosPlate*.fits, tracks the
              match of the spectroscopic (RA, dec) with an object from DR8 photometry.
            </li>
          </ul>
          <p>
            If the matching process identifies a different object from what was
            originally targeted, the following fields may disagree between the plugMap
            and the photoPos:  RUN, RERUN, CAMCOL, FIELD, ID, RA, DEC, and
            plugMap.MAG may not match photoPos.FIBER2MAG.
          </p>
          <p>
            If the matching process fails to identify an object,
            then photoPos.THING_ID = -1, which is also the same THING_ID
            used for sky fibers.
          </p>


    <h3>BOSS Photometric Mismatches</h3>

        <p>There are main survey targets with THING_ID = -1 due to a mismatch between targetting on pre-DR8 photometry followed by matching to DR8 photometry.</p>

<p>&nbsp;</p>


<h2 id="spec_plates">Caveats that affect specific plates</h2>

    <h3>SAS-only plates</h3>

        <p>
          If one browses the directory trees containing all of the spectra
          (see <a href="dr10/spectro/spectro_access.php">
            the spectroscopic data
            access page
          </a>) one will find files associated with a certain number
          of plates not listed in the <a
          href="http://data.sdss3.org/sas/dr10/sdss/spectro/redux/plates-dr10.par">
            DR10 list of plates
          </a> and not loaded into CAS. In essentially all cases,
          it is best to ignore such files and plates.  We went through
          some effort to include all reasonably good plate observations; any
          plate observations found on SAS but not in CAS are likely to be
          disastrously bad.
        </p>



    <h3 id="badplates">Bad plates</h3>

      <p>
	  A small number of plates suffered from a variety of
	  problems, some more serious than others.
        For plates that we deem that the data is unreliable, they have had
        their <code>platequality</code> set to <i>bad</i>, and some terse comments
        put into the <code>qualityComments</code> status.
      </p>

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
          precision work or spectrophotometry.
        </li>
        <li>
          Plates in the apbias program used multiple, very slightly offset
          pointings, but the reductions do not properly combine them.  They
          should have valid redshifts in these spectra, but the
          spectrophotometry will be very inaccurate.
        </li>
        <li>
          For some plates the software had issues with rejecting cosmic
          rays, because there was only a single exposure to work with.  These
          are all marked as bad plates (though again in many cases the redshifts
          and spectrophotometry are fine, except for the cosmic rays).
        </li>
        <li>
          Plates located in regions with extended diffuse Galactic emission (like in
          Orion or Taurus) often have sky-subtraction errors and issues, because
          there is no truly blank sky available.  In these cases, the emission
          lines from the nebula are partially, but not wholly, subtracted and
          hard to interpret.  Similar problems can occasionally happen
	  if there is auroral activity while the spectrum was taken.
	  If you suspect such problems, examine the spectra associated
	  with the sky fibers.
        </li>
        <li>
          Because of time-variability in the dichroic throughput,
          occasionally the spectrophotometry has "kinks" at the transition
          between the red and blue spectrographs; we have identified some,
          though perhaps not all, of the worst cases of these.
        </li>
        <li>
          Occasionally the second spectrograph electronics caused serious
          issues for fibers 321 through 640 in SDSS.
        </li>
        <li>
          One plate had
	  substantial contamination from Pollux because of
          light scattered through clouds.
        </li>
        <li>
          A number of other plates are simply low signal-to-noise ratio for
          a variety of reasons, but because they were special plates, needed to
          have their quality values set by hand. That is, they targeted deeper
          than we normally do, and so would have passed the survey's
          signal-to-noise criteria at the standard fiducial
	  magnitudes.
        </li>
      </ul>



    <h3>Uncertain ZOFFSETs for some QSO targets (<em>BOSS</em>)</h3>

        <p>
        BOSS QSO targets at plate radius &gt; 1.02 degrees generally have
        washers to offset their fibers in Z to optimize the signal-to-noise
        at 4000 Angstroms.  ZOFFSET records the <em>intended</em>
        z-offset in microns, not the <em>actual</em> offset.
        </p>

        <ul>
          <li>Prior to MJD 55442, washers were not used.</li>
          <li>55442 &lt;= MJD &lt;= 55474 was a transition period where
            washers were only sometimes used.</li>
          <li>After MJD 55474 washers were regularly used for new plates.</li>
          <li>Plates observed both before and after MJD 55474 may or may not
            have had washers for the later observations.</li>
        </ul>

        <p>
          The actual washer state of a given plate/mjd is recorded in the
          yanny parameter file
          <a href="http://www.sdss3.org/svn/repo/idlspec2d/trunk/opfiles/washers.par">
            idlspec2d/opfiles/washers.par</a>.
          Analyses which use ZOFFSET should consult that file to confirm
          the washer state or restrict themselves to plates which were
          first observed after MJD 55474.
        </p>

    <h3>Bad Sky Measurements for Some Plates</h3>

        <p>Plate 3770 MJD 55234 has bad sky measurements for fibers &le; 500, due to being taken in marginal conditions.</p>

<p>&nbsp;</p>

<hr />








<?php echo foot(); ?>

