<?php include '../../header.php'; echo head('Galaxy Properties for DR8 spectra from MPA-JHU'); ?>

<p><a href="dr10/spectro/galaxy.php"><b>[Back to main galaxy properties page]</b></a></p>

<h2 id="mpa_jhu">MPA-JHU</h2>

	 <p>For DR8 galaxy spectra (virtually all of which were in DR7 too) we provide the "galSpec" galaxy properties from MPA-JHU.  These properties are deprecated in DR10 in favor of the Wisconsin, Portsmouth, and Granada team analyses of the same data, but are provided in DR10 for comparison.</p>

<p>We refer to this set of line measurements as the MPA-JHU measurements,
after the Max Planck Institute for Astrophysics and the Johns Hopkins
University where the technique was developed. The Galspec product provided by
the MPA-JHU group is based on the methods of
<a
href="http://adsabs.harvard.edu/abs/2004MNRAS.351.1151B">Brinchmann et
al. 2004</a>, <a
href="http://adsabs.harvard.edu/abs/2003MNRAS.341...33K">Kauffmann et
	 al. 2003</a>,
and <a href="http://adsabs.harvard.edu/abs/2004ApJ...613..898T">Tremonti et al. 2004</a>. These have
been run on previous SDSS data releases and the catalog has been made
<a href="http://www.mpa-garching.mpg.de/SDSS">publicly available</a>
since DR4, and has been included in the SDSS data release since DR8.</p>

<p>We provide MPA measurements for all objects
that <code>idlspec2d</code> calls a galaxy in <a
href="dr9/help/glossary.php#run2d"><code>run2d</code></a>=26 (used for the
DR7 plates). This code has not been run on the new SEGUE-2 plates in
<code>run2d</code>=103 and 104 or on any BOSS spectra.
We briefly describe the technique
here; details can be found in the papers referenced above.</p>

<ul>
    <li><a href="http://data.sdss3.org/sas/dr8/common/sdss-spectro/redux/galSpecInfo-dr8.fits">
    galSpecInfo</a> (364 Mb) gives basic information about each spectrum (see <a
    href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/galSpecInfo.html">datamodel</a>)</li>
    <li><a href="http://data.sdss3.org/sas/dr8/common/sdss-spectro/redux/galSpecLine-dr8.fits">
    galSpecLine</a> (1.7 Gb) gives line measurements for each spectrum (see <a
    href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/galSpecLine.html">datamodel</a>)</li>
    <li><a href="http://data.sdss3.org/sas/dr8/common/sdss-spectro/redux/galSpecIndx-dr8.fits">
    galSpecIndx</a> (1.9 Gb) gives Lick and other indices for each spectrum (see <a
    href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/galSpecIndx.html">datamodel</a>)</li>
    <li><a href="http://data.sdss3.org/sas/dr8/common/sdss-spectro/redux/galSpecExtra-dr8.fits">
    galSpecExtra</a> (339 Mb) gives some ancillary physical parameters for each spectrum (see <a
    href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/galSpecExtra.html">datamodel</a>)</li>
</ul>

<p>These files are line-by-line matched with the specObj file.
However, no SDSS-III spectra have been analyzed by galSpec.
The galSpec pipelines have not been run on all data;
if the PLATE, FIBERID, MJD values
are -1 then there is no result for that spectrum.
Furthermore, if RELIABLE
in the galSpecInfo file is set to zero, then the parameters are not considered
reliable.</p>

<p>These files contain measurements of emission lines
in galaxies, Lick and other indices, and derived quantities.  The
sections below describe the methods in more detail.</p>

<h2>Galaxy emission lines</h2>

<p> In measuring the nebular emission lines of galaxies, it is
important to properly account for the galaxy continuum which is very
rich in stellar absorption features.  In DR8 we offer a set of
emission line measurements for galaxy spectra which makes use of
stellar population synthesis models to accurately fit and subtract the
stellar continuum.  </p>


<p>We first scale each galaxy spectrum to match its r-band fiber
magnitude, and correct each spectrum for Galactic extinction following
SFD and the O'Donnell (1994) attenuation curve.  We adopt the basic
assumption that any galaxy star formation history can be approximated
as a sum of discrete bursts.  Our library of template spectra is
composed of single stellar population models generated using the
population synthesis code of Bruzual &amp; Charlot (2003).  We have
used a new version kindly made available by the authors which
incorporates the MILES empirical spectral library (Sanchez-Blazquez et
al. 2006; these spectra cover the range 3525-7500 Angstroms with 2.3
Angstrom FWHM). The spectral-type and metallicity coverage,
flux-calibration accuracy, and number of stars in the library
represent a substantial improvement over previous libraries. Our
templates include models of ten different ages (0.005, 0.025, 0.1,
0.2, 0.6, 0.9, 1.4, 2.5, 5, 10 Gyr) and four metallicities (1/4, 1/2,
1, 2.4 solar).  For each galaxy we transform the templates to the
measured redshift and velocity dispersion and resample them to match
the data.  To construct the best-fitting model we perform a
non-negative least squares fit to a linear combination of our ten
single-age populations, with internal dust attenuation modeled as an
additional free parameter following Charlot &amp; Fall (2000).  Given the
S/N of the spectra, we model galaxies as single metallicity
populations and select the metallicity that yields the minimum
&chi;<sup>2</sup>.</p>

<p>
After subtracting the best-fitting stellar population model of the
continuum, we remove any remaining residuals (usually of order a few
percent) with a sliding 150-pixel median, and fit all the nebular emission
lines simultaneously as Gaussians.  In doing so, we require that the
Balmer lines (H&delta;, H&gamma;, H&beta;, and H&alpha;) have the
same line width and velocity offset, and likewise for the
forbidden lines.
We take into account the
wavelength-dependent instrumental resolution of each fiber, which is
measured by the <code>idlspec2d</code>
pipeline from the arc lamp images.  </p>

<h2>Derived galaxy parameters</h2>

<p>
The files and tables above also include a number of galaxy parameters
derived by the MPA-JHU group available.</p>

<ul>
<li><b>BPT classification:</b> We supply emission line
  classifications based on the BPT diagram.
  Galaxies are divided into "Star Forming", "Composite", "AGN", "Low
    S/N Star Forming", "Low S/N AGN", and "Unclassifiable"
    categories.</li>
<li><b>Stellar Mass:</b> Stellar masses are calculated using the
  Bayesian methodology and model grids described in Kauffmann et al.
  (2003).  The spectra are measured through a 3 arcsec aperture, and
  therefore do not represent the entire galaxy.  We therefore base our
  model on the ugriz galaxy
  photometry alone (rather than the spectral indices D<sub>n</sub>(4000) and
  H&delta; used by Kauffmann et al. 2003). We have
  corrected the photometry for the small contribution due to nebular
  emission using the spectra.  We estimate the stellar mass within the
  SDSS spectroscopic fiber aperture using fiber magnitudes and the total stellar
  mass using model magnitudes.  A Kroupa (2001) initial mass function
  is assumed.  We output the stellar mass corresponding to
  the median and 2.5%, 16%, 84%, 97.5% of the probability
  distribution function.</li>
<li><b>Nebular Oxygen Abundance:</b> Nebular oxygen abundances
  are estimated from the strong optical emission lines
  ([O II] 3727, H&beta;, [O III] 5007,
  [N II] 6548, 6584 and [S II] 6717, 6731) using the Bayesian
  methodology outlined in Tremonti at al. (2004) and Brinchmann et al. (2004).
  Oxygen abundances are only computed for objects classified as
  "Star Forming". We output the value of <code>12+\log(O/H)</code> at the median
  and 2.5%, 16%, 84%, 97.5% of the probability distribution
  function.  </li>
<li><b>Star Formation Rate:</b> Star formation rates (SFRs) are computed
  within the galaxy fiber aperture using the nebular emission lines
  as described in Brinchmann et al. (2004). SFRs outside of the fiber are
  estimated using the galaxy photometry following Salim et al.
  (2007).   For AGN and galaxies with weak emission lines, SFRs are estimated
  from the photometry.  We report both the fiber SFR and the total SFR
  at the median and 2.5%, 16%, 84%, 97.5% of the probability
  distribution function.</li>
<li><b>Specific SFR:</b>  The Specific SFR (SFR divided by the
  stellar mass)
 has been calculated by combining the SFR and stellar mass likelihood
 distributions as outlined in Appendix A of Brinchmann et al. (2004).
 We report both the fiber and the total specific SFR
 at the median and 2.5%, 16%, 84%, 97.5% of the probability
 distribution function.</li>
</ul>


<?php echo foot(); ?>
