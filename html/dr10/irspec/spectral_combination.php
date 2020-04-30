<?php include '../../header.php'; echo head('SDSS-III APOGEE Visit Combination'); ?>

<h2>Introduction</h2>

<p>Most APOGEE fields are observed multiple times to obtain our desired high signal to
noise ratio for faint stars and to detect stellar binaries by their radial velocity
oscillations.  These multiple "visit" spectra need to be combined into one spectrum
for each star.  This process is called "visit combination" and involves several steps:</p>
<ol>
<li>Determination of doppler shift (i.e. radial velocity) for each visit spectrum.</li>
<li>Resampling of each visit spectrum onto the same rest (i.e. no doppler shift) wavelength
scale.</li>
<li>Continuum normalization of each visit spectrum using a median filter.</li>
<li>Weighted combination of all the resampled visit spectra.</li>
<li>Re-application of mean continuum shape.</li>
</ol>
<p>The output of this process is a single apStar file for each star.  This file contains the
combined spectrum and all the resampled visit spectra on the same wavelength scale.</p>

<h2> Radial Velocity Determination</h2>

<p>The radial velocities (RV) in visit combination are derived in two separate steps:</p>
<ol>
<li>Relative radial velocities using the combined spectrum as the spectral
template.  This is done iteratively.</li>
<li>Absolute radial velocity determination of the combined spectrum against a grid of
synthetic spectra spanning a large range of stellar parameters.</li>
</ol>
<p>The visit relative radial velocities and the absolute velocity of the combined spectrum
are then combined to produce absolute velocities for all visit spectra.</p>

<p>This two-step scheme was employed because RVs derived from the combined spectrum (of
the star itself) should be more precise than RVs derived from a small set of synthetic
spectra.  It allows us to create a high-quality combined spectrum without even knowing
what type of object we are dealing with.  However, the final combined spectrum must be
on the rest wavelength scale so that it can be properly compared to the large grid of
sythetic spectra in the abundance pipeline (<a href="dr10/irspec/aspcap.php">ASPCAP</a>).
Therefore, the second step in the
RV determination is to derive the absolute radial velocity of the combined spectrum
against a small grid synthetic spectra (the "RV mini-grid").
</p>

<p>The procedure for determining radial velocities is further described
<a href="dr10/irspec/radialvelocities.php">here</a>.</p>

<h2> Resampling</h2>

<p>
In order to combine the visit spectra their individual doppler shifts
must be removed and then they must be resampled onto the same wavelength
scale.  Using the radial velocity determined in step (1) the wavelengths
are corrected to the rest wavelengths (&lambda;<sub>rest</sub>=&lambda;<sub>obs</sub>/(1+RV/c),
where c is the speed of light).  Using the de-doppler-shifted wavelengths
the spectrum is resampled onto the final logarithmically-spaced wavelength scale using
sinc interpolation.
</p>

<h2>Continuum Normalization</h2>

<p>
Since the visit spectra are taken under different conditions the absolute fluxes
can vary from visit to visit.  Therefore, each visit spectrum needs to be roughly
continuum normalized before they are combined.  A 500-pixel median filter (excluding
bad pixels) is used to calculate the continuum and normalize the spectrum.  This
continuum is saved for a final re-normalizing step at the end.
</p>

<h2> Weighted Combination</h2>

<p>
The final step is to combine the rest-frame shifted, resampled and normalized visit
spectra.  The combination is done in two different ways: (1) global weighting, where
each visit spectrum is weighted by its (S/N)<sup>2</sup>, and (2) pixel-by-pixel
weighting, where each pixel is weighted by its (S/N)<sup>2</sup>.
Finally, the combined spectrum is multiplied by the average (over the multiple visit
spectra) of the continua found in step (3).
</p>


<h2>output star spectra: apStar files</h2>

<p>
As described in the <a href="dr10/irspec/spectro_data.php">data
access description</a>, the combined spectra are provided in <a
href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/LOCATION_ID/apStar.html">apStar</a>
files in FITS format. The primary HDU of each file contains an image
which gives two versions of the combined spectrum for the object, plus
the individual visit spectra that went into the combination.

For these files, all of the individual spectra have been resampled to a common
logarithmically-spaced wavelength scale, with the radial
velocity of each individual spectrum removed.  Note that the APOGEE
wavelength scale is based on <a href="dr10/irspec/spectra.php#wavelengths">vacuum wavelengths</a>.
The logarithmic wavelength grid spacing is the same for all objects
(log<sub>10</sub> &lambda;<sub>i+1</sub> - log<sub>10</sub> &lambda;<sub>i</sub> = 6E-6)
with a common starting wavelength of 15100.802 Angstroms.

These spectra are roughly flux-calibrated.  Additional HDUs contain the estimated
uncertanties in each pixel, masks, and other information. </p>

<p> HDU2 stores the uncertainties per pixel.
It is set to a large number for pixels that should be ignored
entirely due to, e.g., bad columns (another way of thinking about it
is that they have infinite error). In the spectra shown above the
errors per pixel are shown as the grey band surrounding the spectrum;
for masked pixels the grey band covers the full vertical extent of the
figure.</p>

<p>The pixel mask information is stored in HDU3. These images yield a
<a href="dr10/algorithms/bitmasks.php">bitmask</a> for each pixel, in particular the <a
href="dr10/algorithms/bitmask_apogee_pixmask.php">APOGEEPIXMASK</a> bitmask. Since the final spectrum is
a combination of 3 or more individual exposures, it may be that some bits were flagged in
some exposures but not in others. HDU3 include both an "and mask" and an "or mask" for
the combined spectra.</p>


<?php echo foot(); ?>

