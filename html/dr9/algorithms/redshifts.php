<?php include '../../header.php'; echo head('Redshifts, Classifications and Velocity Dispersions'); ?>

<div class="summary">
<p>For each spectrum, we estimate a redshift and perform a
classification into <code>STAR</code>, <code>GALAXY</code> or
<code>QSO</code>. In addition, we define
subclasses for some of these.  Here we describe the redshift,
classification, and velocity dispersion methods, described in detail in <a href="http://adsabs.harvard.edu/abs/2012AJ....144..144B">Bolton <em>et&nbsp;al.</em> (2012)</a>.</p>
</div>

<h2 id="intro">Introduction</h2>

<p>The software used is called <code>idlspec2d</code> and is publicly
available in our <a href="dr9/software/">software
repository</a>.   Note that for galaxy targets in the Data Release 9 BOSS CMASS and
LOWZ samples, redshifts should now be selected using
  Z_NOQSO, Z_ERR_NOQSO, ZWARNING_NOQSO, and CLASS_NOQSO
for redshift measurements, errors, warning flags, and
classifications (respectively).  These fits do not include quasar templates in
the fitting of the spectra of objects targetted as galaxies.
This change relative to SDSS-I/II is motivated by the lower signal-to-noise
ratio of BOSS galaxy spectroscopy, which admits spurious and unphysical
quasar classifications of galaxy spectra at an unacceptably high rate.
Otherwise, the idlspec2d codes used in SDSS-I/II and BOSS are very similar.
The BOSS code includes new redshift and classification templates for stars,
galaxies, and quasars, as described in <a href="http://adsabs.harvard.edu/abs/2012AJ....144..144B">Bolton <em>et&nbsp;al.</em> (2012)</a>.</p>
<p>The essential strategy for redshift fitting is to perform, at
each potential redshift, a least-squares fit to each spectrum given
the uncertainties, using a fairly general set of models, for galaxies,
for stars, for cataclysmic variables, and for quasars. The best fit model
and redshift is chosen and reported for the object. The fits are applied
without regard to the target category of the object (so that if an object
    targeted as a galaxy turns out to be a star, we can identify it as such,
    although note the exception mentioned above for galaxy targets in BOSS).</p>

<h2 id="redclass">Redshift &amp; Classification</h2>

<p>Redshift and classification templates for galaxy, quasar, and CV star
classes are constructed by performing a rest-frame principal-component
analysis (PCA) of training samples of known redshift. The leading
"eigenspectra" from the PCA results are used to define a linear template
basis that is used to model the spectra in the redshift analysis.  Galaxy
and quasar classes use a basis consisting of four eigenspectra, while the
CV star class uses a basis consisting of three eigenspectra.  The class
of all non-CV stars uses a set of 123 stellar archetype spectra (rather
    than a PCA-defined basis), mostly drawn from The Indo-US Library of
Coud&eacute; Feed Stellar Spectra
(<a href="http://adsabs.harvard.edu/abs/2004ApJS..152..251V">Valdes <em>et&nbsp;al.</em> 2004</a>),
supplemented by model-atmosphere data from the
<a href="http://pollux.graal.univ-montp2.fr/">POLLUX Database of Stellar Spectra</a> and
additional stellar types from BOSS data.</p>

<p> For all spectra, a range of trial galaxy redshifts is explored
from redshift -0.01 to 1.00.  Trial redshifts are separated by 138
km/s (<i>i.e.</i>, two pixels in the reduced spectra).  At each trial
redshift, the galaxy eigenbasis is shifted accordingly, and the
error-weighted data spectrum is modeled as a minimum-chi-squared
linear combination of the redshifted eigenspectra, plus a quadratic
polynomial to absorb low-order calibration uncertainties.  The
chi-squared value for this trial redshift is stored, and the analysis
proceeds to the next trial redshift.  The trial redshifts
corresponding to the 5 lowest chi-squared values are then redetermined
locally to sub-pixel accuracy, and errors in these values are
determined from the curvature of the chi-squared curve at the position
of the minimum.</p>

<p>Quasar redshifts are determined for all spectra in similar fashion to
the galaxy redshifts, but over a larger range of exploration
(z = 0.0333 to 7.00) and with a larger initial velocity step
(276 km/s). Star redshifts are determined separately for each of the
123 single sub-type templates (excluding CV stars) using a single
eigenspectrum plus a cubic polynomial for each subtype, over a radial
velocity range from -1200 to +1200 km/s. Only the single best radial
velocity is retained for each stellar subtype. Because of their
intrinsic emission-line diversity, CV stars are computed with their
3-component PCA eigenbasis plus a quadratic polynomial, over a radial
velocity range of from -1000 to +1000 km/s.</p>

<p>Once the best 5 galaxy redshifts, best 5 quasar redshifts, and best
stellar sub-type radial velocities for a given spectrum have been
determined, these identifications are sorted in order of increasing
reduced chi-squared, and the difference in reduced chi-squared between
each fit and the next-best fit with a radial velocity difference of
greater than 1000 km/s is computed.  The model spectra for all fits
are redetermined, and used to compute statistics of the distribution
of data-minus-model residual values in the spectrum for each fit.
Both the spectra and the models are integrated over the SDSS imaging
filter band-passes to determine the implied broadband magnitudes.</p>

<p>The combination of redshift and template class that yields the overall
best fit (in terms of lowest reduced chi-squared) is adopted as the
pipeline measurement of the redshift and classification of the spectrum.
Several warning flags can be set so as to indicate low confidence in this
identification, which are documented in the online data model. The most
common flag is set to indicate that the change in reduced chi-squared
between the best and next-best redshift/classification is either less
than 0.01 in an absolute sense, or less than 1% of the best model reduced
chi-squared, which indicates a poorly determined redshift.</p>

<h2 id="veldisp">Velocity Dispersions</h2>

<p>At the best galaxy redshift, the stellar velocity dispersion is also
determined. This is done by computing a PCA basis of 24 eigenspectra from
the ELODIE stellar library
(<a href="http://adsabs.harvard.edu/abs/2001A%26A...369.1048P">Prugniel &amp; Soubiran 2001</a>),
convolved and binned to match the instrumental resolution and constant-velocity
pixel scale of the reduced SDSS spectra, and broadened by Gaussian kernels of
successively larger velocity width ranging from 100 to 850 km/s in steps of
25 km/s. The broadened stellar template sets are redshifted to the best-fit
galaxy redshift, and the spectrum is modeled as a least-squares linear
combination of the basis at each trial broadening, masking pixels at the
position of common emission lines in the galaxy-redshift rest frame. The
best-fit velocity dispersion is determined by fitting locally for the
position of the minimum of chi-squared versus trial velocity dispersion
in the neighborhood of the lowest gridded chi-squared value.
Velocity-dispersion error estimates are determined from the curvature of
the chi-squared curve at the global minimum, and are set to a negative value
if the best value occurs at the high-velocity end of the fitting range.
Reported best-fit velocity-dispersion values less than about 100 km/s are
below the resolution limit of the SDSS spectrograph and are to be regarded
with caution.</p>

<p> Not all redshifts and classifications from the pipeline are
reliable!  Most commonly, if the spectrum is of overly low S/N ratio
or has no strong emission or absorption features, multiple templates
will give equally good (or bad) chi2 fits.  Other common indicators of
trouble could be that a large fraction of the
pixels in a spectrum are considered unreliable, or fit emission lines in
a spectrum classified as a quasar are negative.  These are indicated
in a flag called <a
href="dr9/algorithms/bitmask_zwarning.php">ZWARNING</a>; if ZWARNING=0
(as it is for the vast majority of the spectra),
we have a high degree of confidence that the classification and
redshift are reliable.</p>

<p>The previous idlspec2d velocity-dispersion measurements are
implemented for BOSS spectra in the exact same manner as for SDSS-I/II
spectra in previous data releases.  For BOSS Data Release 9,
velocity-dispersion likelihood functions are also computed for objects
targeted as galaxies and assigned a <code>CLASS_NOQSO</code> of
<code>GALAXY</code>.  These are reported over the same 100 to 850 km/s
baseline in steps of 25 km/s as above in the <code>VDISP_LNL</code> vector.
This computation uses only 5 stellar eigenspectra, and marginalizes over
redshift uncertainties.  The applications of <code>VDISP_LNL</code> to
hierarchical galaxy population analysis are described in
<a href="http://adsabs.harvard.edu/abs/2012AJ....143...90S">Shu
<em>et&nbsp;al.</em> (2012)</a>.</p>

<h2 id="other">Other Values</h2>

<p>Flux values, redshifts, line-widths, and continuum levels
are computed for common rest-frame ultraviolet and optical emission
lines by fitting multiple Gaussian-plus-background models at their
observed positions within the spectra. The initial-guess emission-line
redshift is taken from the main redshift analysis, but is subsequently
re-fit nonlinearly in the emission-line fitting routine. All lines are
constrained to have the same redshift except for Lyman-alpha. Intrinsic
line-widths are constrained to be the same for all emission lines, with
the exception of the hydrogen Balmer series, which is given its own line-
width as a free parameter, and Lyman-alpha and NV 1214, which each have
their own free line-width parameters. Known 3:1 line flux ratios between
the members of the [OIII] 5007 and [NII] 6583 doublets are imposed. When
the signal-to-noise of the line measurements permits doing so, spectra
classified as galaxies and quasars are sub-classified into AGN and
star-forming galaxies based upon measured [OIII]/H&beta; and [NII]/H&alpha;
line ratios, and galaxies with very high equivalent width in H&alpha; are
sub-classified as starburst objects. See the
<a href="dr9/spectro/catalogs.php#objects">spectro catalogs</a> page for
details on the line ratio criteria.</p>

<h2 id="output">Output</h2>

<p> The output of the redshift and classification pipeline is stored
in three files for each spectroscopic plate observation.  The <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spZbest.html">spZbest</a>
file contains the detailed results for the best-fit
redshift/classification of each spectrum, and includes the best-fit
model spectrum that was used to make the redshift measurement.  The <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spZall.html">spZall</a>
file contains parameters from all the next-best identifications,
without the full representation of the associated model spectra
(although these can be reconstructed from template files and reported
coefficients).  The <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spZline.html">spZline</a>
file contains the results of the emission-line fits for each
object.</p>

<h2 id="ref">REFERENCES</h2>

<!-- SDSS publication 87 -->
<p>Bolton, A. S., Schlegel, D. J., Aubourg, &Eacute;., Bailey, S., Bizyaev D.,
Bhardwaj, V., Brewington, H., Brownstein, J. R., Burles, S., Chen, Y.,
Dawson, K., Ebelke G., Eisenstein, D. J., Malanushenko, E., Malanushenko, V.,
Maraston, C., Myers, A. D., Olmstead, M. D., Oravetz, D., Padmanabhan N.,
Pan, K., Pâris, I., Percival, W. J., Petitjean, P., Ross, N. P.,
Schneider, D. P., Shelden A., Shu, Y., Simmons, A., Snedden, S.,
Strauss, M. A., Thomas. D., Tremonti, C. A., Wake, D. A., Weaver, B. A.,
Wood-Vasey, W. M., 2012, AJ, 144, 144, <a href="http://dx.doi.org/10.1088/0004-6256/144/5/144">doi:10.1088/0004-6256/144/5/144</a>.</p>

<p>Prugniel, P., Soubiran, C., 2001, A&amp;A, 369, 1048, <a href="http://dx.doi.org/10.1051/0004-6361:20010163">doi:10.1051/0004-6361:20010163</a></p>

<p>Shu, Y., Bolton, A. S., Schlegel, D. J., Dawson, K. S., Wake, D. A., Brownstein, J. R., Brinkmann, J., Weaver, B. A., 2012, AJ, 143, 90, <a href="http://dx.doi.org/10.1088/0004-6256/143/4/90">doi:10.1088/0004-6256/143/4/90</a></p>

<p>Valdes, F., Gupta, R.; Rose, J. A., Singh, J. P., Bell, D. J., 2004, ApJS, 152, 251, <a href="http://dx.doi.org/10.1086/386343">doi:10.1086/386343</a></p>



<?php echo foot(); ?>
