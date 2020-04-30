<?php include '../../header.php'; echo head('Spectrophotometry'); ?>

<h2 id="intro">Introduction</h2>

<p>Because the SDSS spectra are obtained through 3-arcsecond fibers
during non-photometric observing conditions, special techniques must
be employed to spectrophotometrically calibrate the data.  In DR6,
there were substantial improvements introducted to the algorithms which
photometrically calibrate the spectra, and all spectra were
re-reduced since that time (in DR7 and DR8).</p>

<p>Jump to:</p>

<ul>
<li><a href="dr8/algorithms/spectrophotometry.php#dr7">DR7 Updates</a></li>
<li><a href="dr8/algorithms/spectrophotometry.php#dr6">DR6 Updates</a></li>
<li><a href="dr8/algorithms/spectrophotometry.php#unchanged">Unchanged since DR2/DR3</a></li>
</ul>

<h2 id="dr7">DR7 Updates</h2>

<h3 id="flats">Correction of Instability in the Spectroscopic Flats</h3>

<table class="centerfigure">
<tr><td><img src="images/superflat.jpg" alt="Wiggles in the flat field determination" /></td></tr>
<tr><td><b>Figure A:</b> The decomposition of the flat field of the first blue
  spectrograph (upper curve) into stable (lower curve, offset slightly
  for clarity) and unstable (interference) components. The unstable
  component is close to zero, but shows wiggles at wavelengths that
  shift from one exposure to another.</td></tr>
</table>

<table class="centerfigure">
<tr><td><img src="images/ratios.jpg" alt="Meidan flux ratios of plate 1916" /></td></tr>
<tr><td><b>Figure B:</b> Median flux ratios over all objects in the three exposures of
  plate 1916, before (left) and after (right) correction for the
  moving interference filters.  The ratio is fit to the derivative of
  the interference component of the flat field
  (Figure A) after allowing for an arbitrary
  wavelength shift.</td></tr>
</table>

<table class="centerfigure">
<tr><td><img src="images/wiggle_spectrum.jpg" alt="Spectrum of an A0 star observed by SEGUE" /></td></tr>
<tr><td><b>Figure C:</b> The spectrum of SDSSJ172637.26+264127.6, an A0 star observed as
part of SEGUE. The strong broad lines are due to Balmer absorption.
The red spectrum is that available in DR6, while the black spectrum is
from DR7.</td></tr>
</table>

<p>Spectroscopic flatfields for the blue camera in the first spectrograph contain an interference
pattern produced by the dichroic. The thickness of the dichroic coating is believed to
be sensitive to the ambient humidity, and moisture which enters the system during plate
changes affects the instrument response, shifting the interference pattern in wavelength in
unpredictable ways on timescales comparable to the 900 s exposure time.</p>

<p>The flats applied in processing were exposed several minutes prior to, or after, the science
frames and therefore were not always representative of the true instrument response at the time
of exposure. The interference pattern is most pronounced in the 3800-4100 &Aring; region of the spectrum
and, when shifted during exposure, causes significant distortion of the H and K Calcium lines in
stellar spectra, systematically affecting estimates of metallicities and surface temperatures.</p>

<p>Flats obtained under different conditions were used to identify and model the stable and
unstable (shifting) components of the flat, as shown in the Figure A (Figure 7 of the
Data Release 7 paper<a href="dr8/algorithms/spectrophotometry.php#footnotes">*</a>).</p>

<p>With this model in hand, we looked for shifts in the interference pattern over the typically 45
minute time a given plate was observed by comparing the results of the
individual 15-minute exposures for each object. Thus, we took ratios
of the extracted spectra from the separate exposures, and medianed
them over all objects on a plate, giving results like those on the
left-hand side of Figure B (Figure 8 of the Data Release 7
paper<a href="dr8/algorithms/spectrophotometry.php#footnotes">*</a>).</p>


<p>We fit this ratio to the
results expected from a shifting interference pattern (essentially a
derivative of the shifting component in Figure A),
with the only free parameter being the amount of shift, and divided
out this remaining component in each spectrum. The
right-hand panel of Figure B shows that this technique
removes the majority of the effects of the shifting interference.</p>


<p>An example is shown in Figure C (Figure 9 of the Data
Release 7 paper<a href="dr8/algorithms/spectrophotometry.php#footnotes">*</a>), the spectrum of
an A star observed on a place where the interference term was
particularly bad, as is seen in DR6 and DR7. The shapes of the absorption
lines, especially H&epsilon; at 3970 &Aring;, is much more regular in the
new reductions.</p>

<p><a href="dr8/algorithms/spectrophotometry.php#Top">[Back to top]</a></p>

<h2 id="dr6">DR6 updates</h2>

<p>The pipeline that extracts, combines, and calibrates the SDSS
spectra of individual objects from the two-dimensional spectrograms
(<code>idlspec2d</code>) was originally designed to obtain meaningful
redshifts for galaxies and quasars.  However, there were several ways
in which the code was inadequate, especially in light of the stellar
focus of the SEGUE project, and the recognition of the rich stellar
data available among the spectra of the main SDSS survey.  The
spectrophotometry was tied to the fiber magnitudes of stars, whose
relation to the true, PSF magnitudes of stars is seeing-dependent.  In
addition, the SEGUE spectroscopy includes &quot;bright plates&quot;
which contain substantial numbers of stars as bright as
<var>i</var><sub>fiber</sub> = 14.2, and scattered light from these
stars caused systematic errors in the sky subtraction on these plates.
Finally, there were errors in the wavelength calibration as large as
15 km/s on some plates, acceptable for most extragalactic science, but
a real limitation for SEGUE spectroscopy.  These concerns and others
have caused us to substantially revise and improve the
<code>idlspec2d</code> pipeline; the results of this improvement are
included in DR6.</p>

<p>The new code has a different spectrophotometric calibration flux
scale.  The fiber magnitude reported by the photometric pipeline is
the brightness of each object, as measured through a 3&prime;&prime;
diameter aperture corrected to 2&prime;&prime; seeing to match the
entrance aperture of the fibers (see the discussion in the EDR paper).
However, the relationship between the fiber magnitudes of stars and
the PSF magnitudes (which, for unresolved objects, is our best
determination of a true, total magnitude) is dependent on seeing; this
is made worse because the <em>colors</em> of stars measured via fiber
magnitudes will be sensitive to the different seeing in the different
filters (although cases in which the seeing is dramatically different
in the different bands are fairly rare).  With this in mind, the
pipeline used in DR6 determines the spectrophotometric calibration on
each plate such that the flux of the spectrum of standard stars
integrated over the filter curve matches the PSF magnitude of the
stars as measured from their imaging.  This calibration is determined
for each of the four cameras (two in each spectrograph) from
observations of standard stars.  Additional corrections to handle
large-scale astrometric and chromatic terms are measured from isolated
stars and galaxies of high S/N, and are then applied to all the
objects on the plate.</p>

<p><a href="dr8/algorithms/spectrophotometry.php#Top">[Back to top]</a></p>

<h2 id="unchanged">Unchanged since DR2/DR3</h2>

<h3>Introduction</h3>

<p>The following items have remained unchanged since <a
href="http://www.sdss.org/dr2/algorithms/spectrophotometry.html">DR2/DR3,
which had the previous major change of SDSS spectrophotometry
calibration</a>.</p>

<h3>Selection of spectroscopic standard stars</h3>

<p> On each spectroscopic plate, 16 objects are targeted as
spectroscopic standards.  These objects are color-selected to be F8
subdwarfs, similar in spectral type to the SDSS primary standard BD+17
4708.</p>

<table class="centerfigure">
<tr><td><img src="images/stdstar_colors.jpg" alt="standard star colors" /></td></tr>
<tr><td>The color selection of the
SDSS standard stars. Red points represent stars selected as
spectroscopic standards. (Most are flux standards; the very blue stars
in the right hand plot are"hot standards"used for telluric absorption
correction.)</td></tr>
</table>

<p>The flux calibration of the spectra is handled by the
<code>idlspec2d</code>
pipeline.  It is performed separately for each of the 2 spectrographs,
hence each half-<a href="dr8/glossary.php#plate">plate</a> has its
own calibration. In the EDR and DR1 <code>idlspec2d</code> calibration
pipelines, fluxing was achieved by <em>assuming</em> that the mean
spectrum of the stars on each half-plate was equivalent to a synthetic
composite F8 subdwarf spectrum from <a
href="http://adsabs.harvard.edu/abs/1998PASP..110..863P">Pickles
(1998)</a>.  In the reductions included in DR2/DR3, the spectrum of each
standard star is spectrally typed by comparing with a grid of
theoretical spectra generated from Kurucz model atmospheres <a
href="http://adsabs.harvard.edu/abs/1992IAUS..149..225K">(Kurucz
1992)</a> using the spectral synthesis code SPECTRUM (<a
href="http://adsabs.harvard.edu/abs/1994AJ....107..742G">Gray

&amp; Corbally 1994</a>; <a
href="http://adsabs.harvard.edu/abs/2001AJ....121.2159G">Gray,
Graham, &amp; Hoyt 2001</a>).  The flux calibration vector is derived
from the average ratio of each star (after correcting for Galactic
reddening) and its best-fit model. Since the red and blue halves of
the spectra are imaged onto separate CCDs, separate red and blue flux
calibration vectors are produced. These will resemble the throughput
curves under photometric conditions. Finally, the red and blue halves
of each spectrum on each exposure are multiplied by the appropriate
flux calibration vector. The spectra are then combined with bad pixel
rejection and rebinned to a constant dispersion.</p>

<table class="centerfigure">
<tr><td><img src="images/throughput.jpg" alt="throughput plot" /></td></tr>
<tr><td>Throughput curves for the
red and blue channels on the two SDSS spectrographs</td></tr>
</table>

<h3 id="ext">Note about galactic extinction correction</h3>

<p>In the EDR and DR1, the spectroscopic data were nominally corrected
for galactic extinction.  The spectrophotometry since DR2 is vastly
improved compared to DR1, but the final calibrated spectra in DR2 and
beyond are <em>not</em> corrected for foreground Galactic reddening (a
relatively small effect; the median <var>E(B-V)</var> over the survey
is 0.034).  Users of spectra should note that the fractional
improvement in spectrophotometry from DR1 to DR2 and beyond was much
greater than the extinction correction itself. As the SDSS includes a
substantial number of spectra of galactic stars, a decision has been
taken <strong>not</strong> to apply any extinction correction to
spectra, since it would only be appropriate for extragalactic objects,
but to report the observational result of the SDSS, namely, the
spectrum including galactic extinction.</p>


<h2 id="footnotes">Footnotes</h2>
<p>*Text and figures on this page come from an author-created, un-copyedited
version of the SDSS Data Release 7 paper, an article <!--accepted for publication in-->submitted
to <i>Astrophysical Journal Supplements</i>. IOP Publishing Ltd is not responsible for any errors
or omissions in this version of the manuscript or any version derived from it.<!--The definitive publisher authenticated version
is available online at [insert DOI].--> <a href="http://adsabs.harvard.edu/abs/2009ApJS..182..543A">A preprint of the
DR7 paper</a> is available from the arXiv preprint server.</p>

<?php echo foot(); ?>
