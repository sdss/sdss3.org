<?php include '../../header.php'; echo head('Redshifts and Classifications'); ?>

<p>For each spectrum, we estimate a redshift and perform a
classification into <code>STAR</code>, <code>GALAXY</code>,
<code>QSO</code> or <code>UNKNOWN</code>. In addition, we define
subclasses for some of these.  Here we describe the redshift and
classification methods.
The software used is called <code>idlspec2d</code> and is publicly
available in our <a href="dr8/software/">software
repository</a>.</p>

<p>The essential strategy for redshift fitting is to perform, at each
potential redshift, a least-squares fit to each spectrum given the
uncertainties, using a fairly general set of models, for galaxies, for
stars, for cataclysmic variables, and for QSOs. The best fit model and
redshift is chosen as the reported parameters for the object. The fits
are applied without regard to the target category of the object (so
that if an object targeted as a galaxy turns out to be a star, we can
identify it as such). We describe the galaxy-template redshift
analysis in detail here, and describe the differences of other
template class analyses relative to the galaxy case.</p>

<p>In detail, for each spectroscopic plate, the fits are done to the
spectra, with some pixels masked as untrustworthy as follows.  The
<code>spreduce1d</code> module in <code>idlspec2d</code> reads the
calibrated spectrum flux vectors, associated inverse-variance vectors,
and wavelength baseline from the <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spPlate.html">spPlate</a>
file written by the two-dimensional extraction procedures.  In
addition to masking bad pixels within each spectrum, zero weight is
given to pixels at wavelengths where the residual reduced chi-squared
of the sky-subtracted sky spectra exceeds 3, and to pixels where the
brightness from a sky line exceeds the sum of the extracted object
flux plus ten times its associated error.  </p>

<p> The galaxy class is defined by a rest-frame principal-component
analysis (PCA) of 480 galaxies observed on SDSS plate number 306, MJD
51690, which is used to define a basis of 4 "eigenspectra"
corresponding to the four most significant modes of variation in the
PCA analysis.  The redshifts of the galaxy PCA training sample are
established by fitting each spectrum with a linear combination of two
stellar template spectra and a set of narrow Gaussian profiles at the
wavelengths of common nebular emission lines.  The stellar template
spectra used in this procedure are obtained from the first two
components of a PCA analysis of 10 velocity standard stars observed on
SDSS plate 321, MJD 51612.  The galaxy PCA training sample redshifts
are verified by visual inspection.</p>

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

<p> QSO redshifts are determined for all spectra in similar fashion to
the galaxy redshifts, but over a larger range of exploration (z =
0.0333 to 7.00) and with a larger initial velocity step (276 km/s).
The QSO eigenspectrum basis is defined by a PCA of 412 QSO spectra
with known redshifts.  Star redshifts are determined separately for
each of 32 single sub-type templates (excluding CV stars) using a
single eigenspectrum plus a cubic polynomial for each subtype, over a
radial velocity range from -1200 to +1200 km/s.  Only the single best
radial velocity is retained for each stellar subtype.  Because of
their intrinsic emission-line diversity, CV stars are handled
differently than other stellar subtypes, with a 3-component PCA
eigenbasis plus a quadratic polynomial, over a radial velocity range of
from -1000 to +1000 km/s.</p>

<p> Once the best 5 galaxy redshifts, best 5 QSO redshifts, and best
stellar sub-type radial velocities for a given spectrum have been
determined, these identifications are sorted in order of increasing
reduced chi-squared, and the difference in reduced chi-squared between
each fit and the next-best fit with a radial velocity difference of
greater than 1000 km/s is computed.  The model spectra for all fits
are redetermined, and used to compute statistics of the distribution
of data-minus-model residual values in the spectrum for each fit.
Both the spectra and the models are integrated over the SDSS imaging
filter band-passes to determine the implied broadband magnitudes.</p>

<p> The combination of redshift and template class that yields the
overall best fit (in terms of lowest reduced chi-squared) is adopted
as the pipeline measurement of the redshift and classification of the
spectrum.  Several warning flags can be set so as to indicate low
confidence in this identification, which are documented in the online
data model.  The most common flag is set to indicate that the change
in reduced chi-squared between the best and next-best
redshift/classification is less than 0.01, which indicates a poorly
determined redshift.</p>

<p> At the best galaxy redshift, the stellar velocity dispersion is
also determined.  This is done by computing a PCA basis of
eigenspectra from the ELODIE stellar library (<a
href="http://adsabs.harvard.edu/abs/2001A%26A...369.1048P">Prugniel
&amp; Soubiran 2001</a>), convolved and binned to match the
instrumental resolution and constant-velocity pixel scale of the
reduced SDSS spectra, and broadened by Gaussian kernels of
successively larger velocity width ranging from 100 to 850 km/s in
steps of 25 km/s.  The broadened stellar template sets are redshifted
to the best-fit galaxy redshift, and the spectrum is modeled as a
least-squares linear combination of the basis at each trial
broadening, masking pixels at the position of common emission lines in
the galaxy-redshift rest frame.  The best-fit velocity dispersion is
determined by fitting locally for the position of the minimum of
chi-squared versus trial velocity dispersion in the neighborhood of
the lowest gridded chi-squared value.  Velocity-dispersion error
estimates are determined from the curvature of the chi-squared curve
at the global minimum, and are set to a negative value if the best
value occurs at the high-velocity end of the fitting range. Reported
best-fit velocity-dispersion values less than about 100 km/s are below
the resolution limit of the SDSS spectrograph and are to be regarded
with caution.</p>

<p> Flux values, redshifts, line-widths, and continuum levels are
computed for common rest-frame ultraviolet and optical emission lines
by fitting multiple Gaussian-plus-background models at their observed
positions within the spectra.  The initial-guess emission-line
redshift is taken from the main redshift analysis, but is subsequently
re-fit nonlinearly in the emission-line fitting routine.  All lines
are constrained to have the same redshift except for Lyman-alpha.
Intrinsic line-widths are constrained to be the same for all emission
lines, with the exception of the hydrogen Balmer series, which is
given its own line-width as a free parameter, and Lyman-alpha and
NV 1214, which each have their own free line-width parameters.  Known
3:1 line flux ratios between the members of the [OIII] 5007 and
[NII] 6583 doublets are imposed.  When the signal-to-noise of the line
measurements permits doing so, spectra classified as galaxies and QSOs
are sub-classified into AGN and star-forming galaxies based upon
measured [OIII]/H&beta; and [NII]/H&alpha; line ratios, and galaxies
with very high equivalent width in H&alpha; are sub-classified as
starburst objects. See the <a href="dr8/spectro/catalogs.php#objects">spectro catalogs</a>
page for details on the line ratio criteria.</p>

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


<?php echo foot(); ?>
