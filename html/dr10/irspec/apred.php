<?php include '../../header.php'; echo head('SDSS-III APOGEE visit reduction'); ?>


<h2>Introduction</h2>

<p>The first stage of APOGEE data reduction (apred) reduces raw data, taken from
multiple exposures of a given plate on a given night (a visit), to
individual spectra of each of the objects on the plate.  This stage
of the pipeline applies basic calibration to the images, extracts
one dimensional spectra from the raw exposures produced by the
spectrograph, calibrates them in wavelength and flux, attempts
to remove sky emisssion and correct for absorption within the Earth's
atmosphere, and combined individual spectrally-dithered exposures into
single spectra for each object. It also makes an initial estimate of the radial velocity
of each object.</p>

<p> The basic steps of APOGEE data reduction are described here. More
details are available in Nidever et al. (2013)</p>

<h2 id="specobs">Spectroscopic Observing</h2>

<p>To understand the steps of APOGEE visit reduction, one needs to understand
a bit of detail about how the data are taken.</p>

<h3>Plate Plugging (plug)</h3>

<p>When the observatory is ready to observe a plate, the
observatory staff plugs optical fibers into the holes drilled
into the plates, and maps which fiber corresponds to which hole
(and therefore which object) by shining light through each fiber.
This data is incorporated into one of the Header and Data Units (HDUs) of the apPlate file
described below.</p>

<h3>Raw Data Collection</h3>

<p>Observers mount cartridges containing the drilled, plugged
plates on the telescope, and generally collect a series of 500s exposures on each plate.
For most APOGEE plates, 8 exposures are obtained on any given night, although
this number can vary based on available time, observing conditions, etc.</p>

<p>The resolution of the APOGEE spectrum, combined with the pixel size of the
APOGEE detector, leads to the property that a single spectrum slightly undersamples
the resolution at the short wavelength end of the recorded APOGEE spectrum. To avoid
the challenges of working with undersampled data, APOGEE spectra are taken in
pairs, with the detectors moved slightly (a distance of a half-pixel) between the
two exposures of the pair; we refer to these as observations at different dither
positions. A standard 8-exposure APOGEE observing sequence consists of exposures at the two differ
dither positions (A and B), in the pattern: ABBA ABBA. In any case, the data reduction
requires exposures in dither pairs; any unpaired exposure is discarded.</p>

<p> The infrared detectors that are used have the capability to be read "non-destructively",
in which the amount of charge per pixel can be detected without affecting that charge,
allowing the levels on the detectors to be measured as the exposure is proceding. This
ability to read the detectors multiple times allows for a reduction in the readout noise,
which can be significant for a single read of the detectors. For APOGEE, the detectors
are read in an "up-the-ramp" mode where the detectors are read every 10.7 seconds. A single
exposure generally consists of 47 readouts, corresponding to an exposure time of 500 seconds.
Because of the mulitiple readouts, the raw APOGEE data for an exposure is actually a "data
cube", with two of the dimensions representing the location on the detectors, and the third
dimension representing the time sequence.</p>

<h2>APOGEE Visit Data Reduction</h2>

<p>The apred software consists of three sequential steps:</p>
 <ul>
  <li>
    ap3d: Extract 2-dimensional images from the 3-dimensional raw data cubes and apply the basic calibration steps of dark subtraction and flat fielding.
  </li>
  <li>
    ap2d: Extract and calibrate 1-dimensional spectra from 2-dimensional images and attach a wavelength
calibration.
  </li>
  <li>
    ap1dvisit: From the 1-dimensional spectra, measure the dither shifts between the frames, subtract
sky from each fiber, correct for telluric absorption in each fiber, combine the dithered exposures in
a single well-sampled visit spectrum, perform flux calibration, and get an initial radial velocity
estimate for the spectrum.
  </li>
 </ul>

<h3> ap3d </h3>

<p> For each readout of each exposure, the raw data are first corrected for bias
variations in the IR detectors and electronics. This is accomplished by using a
reference array of pixels that are generated by the readout electronics, as well
as a set of reference pixels around the edge of each detector.</p>

<p> Each individual readout is then corrected for a contribution from dark current,
by subtracting a calibration dark current frame made from a combination of
multiple individual dark frames.</p>

<p>The data are then collapsed from the 3D data cubes into 2D images. This
is done on a pixel-by-pixel basic. At the most basic level, a linear function is fit to
the series of up-the-ramp readouts for each pixel to determine the best-fitting slope. This
slope, multiplied by the total exposure time, is taken to be the flux at
this pixel location for the exposure. </p>

<ul>
<li>
The up-the-ramp sampling does allow for the recognition of cosmic rays in
the images, as these appear as significant jumps in the up-the-ramp sampling. The
ap3d software attempts to recognize these, and flag these pixels as being
affected by cosmic rays.
</li>
</ul>

<p>The 2D images are then corrected for variations in pixel-to-pixel response by
dividing them by a calibration flat field, which is constructed from an average
of multiple frames illuminated by an internal light source.</p>

<h3> ap2d </h3>

<p> ap2d takes the calibrated 2D images and extracts individual 1D spectra
for each exposure. This is accomplished by modelling the distribution of
the light from each fiber, separately for each individual wavelength. The
flux from all 300 fibers is fit simultaneously, allowing for contributions from
each fiber into the two adjacent spectra. The profiles for each fiber are
derived from a calibration frame taken immediately after the exposure sequence
on each plate. The contribution of light from one fiber into the adjacent fiber
is estimated using calibration observations where only every sixth fiber is
illuminated.</p>

<p> After the 1D images are extracted, a wavelength calibration is applied,
as determined from observations of some arc calibration lamps. Since the APOGEE
spectrograph is in a fixed location and has been kept under the same vacuum
and at the same temperature since the beginning of the survey, the form of
this wavelength correction is very stable, and we have been using a single
wavelength calibration to determine the non-linear terms in the conversion
between pixel location and wavelength. Note the the wavelength scale for
each fiber is slightly different because of the different locations of the
fibers in the pseudo-slit.</p>

<p>The SDSS/APOGEE data describing spectral line wavelengths use <span class="term">vacuum
wavelengths</span>. However, the wavelengths of atomic transitions are usually quoted
at standard temperature and pressure (S.T.P.); this is how the
<a href="http://www.hbcpnetbase.com/">CRC Handbook of Chemistry and Physics</a>
lists them for any transitions redward of 2000 &Aring;ngstroms.
Thus, recognizing spectral lines associated with atomic transitions may require
converting the SDSS data to the equivalent values at S.T.P.</p>

<p>For APOGEE data, we have used the conversion from <a href="http://adsabs.harvard.edu/abs/1996ApOpt..35.1566C">Ciddor
(Applied Optics, Vol 35, p 1566, 1996)</a> to
convert between vacuum and air wavelengths.
For a vacuum wavelength (VAC) in &Aring;ngstroms, convert to air
wavelength (AIR) using the equation:</p>
<pre>
AIR = VAC / (1.0 +  5.792105E-2/(238.0185E0 - (1.E4/VAC)^2) + 1.67917E-3/( 57.362E0 - (1.E4/VAC)^2)
</pre>

<p> There are small linear shifts in the wavelength scale between different
exposures, which result from (1) the intentional dithering of the detectors
between exposures to allow for well-sampled combined images, and (2) small
flexure in the instrument that causes small shifts as the liquid nitrogen tank
gets depleted (a larger shift occurs when the tank is filled, but this always
happens during the daytime). The linear shifts are measured using prominent
night sky emission lines that appear in every spectrum, and these shifts
are applied to the wavelength solution.</p>

<h3> ap1dvisit </h3>

<p> The first stage in ap1dvisit is to determine to high accuracy the
linear shifts between each exposure in a visit that result from the
dithering of the detectors. This can be done at higher accuracy than
the determination of the wavelength zeropoint from the sky lines by
cross-correlating the different exposures with each other.</p>

<p> Each fiber of each exposure is then corrected for contribution of
night sky emission. The IR portion of the spectrum includes significant
numbers of very bright OH emission lines. There can also be some
continuum sky contribution, especially when there is significant
moonlight (and even more so when thin clouds are present).
Sky subtraction is accomplished using 35 sky fibers that are
distributed across the plate. Multiple fibers are used because the IR
sky can be spatially variable. For each object, the sky is estimated from
nearest four sky fibers. However, since the wavelength scale is not
identical for each fiber, the sky spectra need to be shifted slightly
before they can be subtracted. Also, since the profiles of the lines
differ slightly from fiber to fiber, there are small differences that
lead to imperfect sky subtraction, in particular, of the bright night
sky lines. As a result, the sky subtraction of the bright night sky
lines is very imperfect, and essentially, the small regions surrounding
each line are rendered useless for science. This is an area for potential
improvement in the pipeline, but we note that even with perfect sky modelling,
the signal-to-noise under bright sky lines would be significantly degraded
compared with the surrounding spectra.  </p>

<p> The Earth's atmosphere also leads to significant absorption in
the observed spectra, which arises from absorption of CO_2, H_2 O, and
CH_4 bands in the APOGEE spectral window. A correction for this telluric
absorption is derived from observations of 35 "telluric" standards
spread across the plate, where these stars are chosen by their
intrinsic color, with the goal of targetting hot stars with relatively
few spectral features in the APOGEE wavelength region. Multiple telluric
stars are chosen because the absorption can vary across the field of
view. For each telluric star, the amplitude of the absoprtion in each
of CO2, H2O, and CH4 is estimated by fitting model absorption spectra
to the observed. A surface is fit to these scaling factors, and this
surface is used to predict the appropriate scale factors to be used
for each individual fiber. These scaling factors, along with model
telluric spectra that are convolved with the fiber-specific line spread
function, are used to correct each individual spectrum. This method
seems to work reasonably well in many cases, but the telluric correction
is still imperfect in some cases; the leading hypothesis for this is
a combination of errors in the wavelength solution, inaccuracies in
the telluric model, and inaccuracies in the determination of the instrumental
LSF. Improvements in telluric correction are a high priority for
potential pipeline improvements.
</p>

<p> After sky correction, pairs of dithered frames are combined
to produce well-sampled images. All of the different pairs are then
combined to produce a single spectrum of each object for the
visit.</p>

<p> The final visit spectra are then approximately flux calibrated.
The relative flux calibration is performed using a calibration frame
which tabulates the instrument spectral response, as determined from
an observation of a blackbody source. The absolute level of the
spectrum is then determining using a scaling with the objects
catalogs H-band magnitude. We note that subsequent analysis for
stellar parameters and abundances (ASPCAP) normalizes the spectra
to a pseudo-continuum, so the flux calibration done here is not
critical.</p>

<p> Finally, an initial radial velocity (RV) estimate is made by cross-correlating
each visit spectrum with a grid of synthetic spectra. The best matching
one serves as a template, and the derived shift between the observed
spectra and the best-fitting templates provide an initial RV estimate.
Note that this estimate is later refined using multiple visits to the
same object, since these provide a higher signal-to-noise spectrum.</p>

<h2> output visit spectra: apVisit files </h2>

<p>The final dither combined spectra from a given visit are written
into individual apVisit files, as described in detail in the
<a
href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/plates/PLATE_ID/MJD5/apVisit.html">
apVisit data model</a>. </p>

<!-- <p class="todo">TODO: WRITE MORE!</p>-->

<p> Most stars are observed in more than one visit. Spectra from
multiple visits are shifted to rest wavelength, resampled, and combined
as part of the <a href="dr10/irspec/spectral_combination.php"> visit combination </a>
portion of the pipeline.</p>

<?php echo foot(); ?>

