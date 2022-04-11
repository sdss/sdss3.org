<?php include '../../header.php'; echo head('SDSS-III APOGEE Radial Velocities'); ?>

<h2>Radial Velocity Determination</h2>

<p>The APOGEE radial velocities (RV) are derived in several steps:</p>
<ol>
<li>As each visit is reduced, an RV estimate is determined by cross-correlating
the visit spectrum against a grid of synthetic spectra. This provides an "estimated RV"
for the visit, which is stored in the apVisit files, but not subsequently used.</li>
<li><p>Radial velocities for each visit are rederived when the visit spectra
are combined. This is done in three steps:</p>
<ol>
<li>Relative radial velocities using the combined spectrum as the spectral
template.  This is done iteratively.</li>
<li>Absolute radial velocity determination of the combined spectrum against a grid of
synthetic spectra spanning a large range of stellar parameters.</li>
<li>The visit relative radial velocities and the absolute velocity of the combined spectrum
are then combined to produce absolute velocities for all visit spectra.</li>
</ol></li>
</ol>

<p>This scheme was employed because RVs derived from the combined spectrum (of
the star itself) should be more precise than RVs derived from a small set of synthetic
spectra.  It allows us to create a high-quality combined spectrum without even knowing
what type of object we are dealing with.  However, the absolute RV is a critical
science product and the final combined spectrum must be
on the rest wavelength scale so that it can be properly compared to the large grid of
sythetic spectra in the abundance pipeline (ASPCAP).  Therefore, the second step in the
RV determination is to derive the absolute radial velocity of the combined spectrum
against a small grid synthetic spectra (the "RV mini-grid").
</p>

<h2>Preparing the Spectra</h2>
<p>The spectra are "prepared" for cross-correlation by:</p>
<ul>
<li>Pixel masking.  Pixels marked as "bad" in the mask array or have sky lines in the
sky array are masked out for the rest of the RV determination.</li>
<li>Continuum normalization.  Each of the three chip spectra are normalized separately.
The chip spectrum is separated into 40 chunks (covering approximately 14 Angstroms each)
and the 95th percentile value is calculated for each chunk.  A robust third-order
polynomial is then fit to the chunk 95th percentile values.
Finally, the spectrum is normalized (divided) by the polynomial fit.</li>
</ul>
<p>The RV template spectra (observed combined or synthetic spectrum) are prepared in the
same way as each of the visit spectra.</p>

<h2>Cross-Correlation</h2>
<p>All radial velocities are determined by cross-correlating a spectrum against
a template spectrum.  The spectra are on the same logarithmic wavelength scale
meaning that a doppler shift is identical to a constant shift in the x-dimension.
The spectra are "prepared" for cross-correlation by continuum normalizing.
A Gaussian is fit to the peak of the cross-correlation function to more accurately
determine the best spectral shift.  Finally, the shift and its uncertainty are converted
to velocity units.</p>

<h2>Relative Radial Velocities</h2>
<p>The relative radial velocities are determined by using the combined spectrum
as the RV template.  This is done iteratively, first determining the relative RVs
and then creating the combined spectrum using the relative RVs to shift the visit
spectra to a common (mean) velocity wavelength scale.  For the first iteration,
when no combined spectrum exists yet, the highest S/N visit spectrum is used as
the template.  For all subsequent iterations the combined spectrum is used as the
template.  Each iteration finds small shifts of the shifted and resampled
visit spectra compared to the combined spectrum until the values converge.
</p>

<h2>Absolute Radial Velocities</h2>

<p>The combined spectrum after the relative RV step still has the mean RV of the
star which must be removed.  The combined spectrum is cross-correlated against
each synthetic spectrum in the "RV mini-grid".  For each synthetic spectrum the
best RV and &chi;<sup>2</sup> (of the shifted spectrum) are derived.  The
spectrum with the lowest &chi;<sup>2</sup> is chosen as the best-fitting spectrum
and it's RV is used as the absolute RV of the combined spectrum.</p>

<p>The RV mini-grid is composed of 538 synthetic spectra that span a large range of
stellar parameters:</p>
<ul>
<li>2700 &lt; <var>T</var><sub>eff</sub> &lt; 30,000 K</li>
<li>0.0 &lt; log&nbsp;<var>g</var> &lt; 5.0 </li>
<li>-2.5 &lt; [Fe/H] &lt; 0.5</li>
</ul>
<p>However, the step sizes and ranges for logg and [Fe/H] vary with
effective temperature.  A number of spectra with high carbon and also high alpha
elements are included to help serve as templates for carbon-rich and oxygen-rich
stars. The synthetic spectra have a resolution of 23,500 and are on the same
logarithmically-spaced wavelength scale as the APOGEE combined spectra.</p>

<h2>Synthetic Radial Velocities</h2>

<p> After the best fitting template is determined, each individual visit spectrum
is cross-correlated against this template to derive what we call synthetic radial
velocities. We prefer the relative velocities derived (as discussed above) from the
cross-correlation of each visit with the combined spectrum, because this should be
a better match that does not depend on accuracy or completeness of the synthetic
library. Nonetheless, the synthetic RVs provide a check of the relative RVs  for
objects where there is a good library match. The scatter between the two types of
RVs is stored in SYNTHSCATTER, and when this is larger than 1 km/s, the SUSPECT_RV_COMBINATION
bit is set is the <a href="dr10/algorithms/bitmask_apogee_starflag.php">STARFLAG</a> bitmask.</p>

<h2>Barycentric correction</h2>

<p>Radial velocities in APOGEE are reported with respect to the
center of mass of the Solar System - the barycenter.
The individual exposures are corrected for the relative motion
of the Earth along the line-of-sight of the star
during each observation.  This is called the
"barycentric correction" and can be calculated very accurately (to m/s levels).
When these corrections are applied to the absolute RVs from above we attain
the RV with respect to the barycenter, or V<sub>helio</sub> for short.
</p>

<h2>RV Uncertainties</h2>

<p>
The RV uncertainty depends on the S/N, the resolution, and the information in the spectral
lines themselves.  A spectrum with lots of deep and thin lines (such as in cool and
metal-rich stars) will have a much more accurate RV than a spectrum with few shallow and
wide lines (such in hot stars).
We can easily estimate the RV uncertainty in the APOGEE spectra by looking at the RV scatter
for stars with multiple visits.  The histogram of the RV scatter peaks at ~100-150 m/s (much
less than our origial survey target of 500 m/s) but has a long tail to larger scatter.
Much of this is due to real variability from stellar binaries. The observed scatter is stored
in the VSCATTER parameter for each star; this is probably the best indicator to use to
determine whether a star is a binary (for stars with multiple visits): if VSCATTER&gt;1 km/s (i.e.,
much larger than the typical uncertainties), then it is likely a binary.
</p>

<h2> Saved quantities </h2>

<p>The barycentric radial velocities derived by cross-correlation of each visit with the combined
spectrum, along with an absolute velocity from cross-correlation of the combined spectrum with
a synthetic spectrum, is stored in VHELIO for each visit spectrum; an estimated error is stored
in VERR. For the combined spectrum a signal-to-noise weighted average is stored in VHELIO_AVG
and the scatter around this average is stored in VSCATTER; the S/N weighted error is stored in VERR,
and the median visit RV error is stored in VERR_MED.</p>

<p>Equivalent velocities, scatter, and errrors derived by cross-correlation of each visit with the
best-fitting
sythetic spectrum are stored in SYNTHVHELIO, SYNTHVERR, SYNTHEVHELIO_AVG, SYNTHVERR, and SYNTHVERR_MED.</p>

<p>The scatter between the two different RVs are stored in SYNTHSCATTER.</p>

<p>In the apStar file headers, values of the velocity relative to the local standard of rest (VLSR) and
galactic standard of rest (VGSR) are given, but note that these assume some information about the Galaxy,
namely a solar motion of (U,V,W)=(10,5.25,7.17) and a circular velocity at the solar circle of 220 km/s.
Since there is not general agreement on these values, and since it is straightforward to calculate these
given a user's preferred values, these will likely not be included in subsequent data releases.
</p>

<?php echo foot(); ?>

