<?php include '../../header.php'; echo head('Spectrophotometry'); ?>

<h2 id="intro">Updates in DR9</h2>

<p>In SDSS, the spectra were observed through 3 arcsecond fibers,
while in BOSS, they are 2 arcsecond.  A number of standard stars
(chosen by color to be F stars) are observed on each plate: fitting
the absorption lines to stellar models gives a model for their true
spectral energy distribution, which is used to make a model for the
conversion of counts to flux density as a function of wavelength and
position on the plate.  Because the standard stars are observed
simultaneously, spectrophotometry is possible even in the presence of
clouds and differential chromatic aberration.</p>

<p>The spectrophotometry is normalized to PSF magnitudes for point
sources.</p>

<p>The spectrophotometric algorithms were improved throughout SDSS-I/II.
The calibrations for spectroscopic data released in DR7 and SEGUE2
(<em>i.e.</em>, with the original SDSS spectrographs) are unchanged
for DR9.  The rms difference between PSF g and r magnitudes, and the
synthesized g and r magnitudes from the calibrated spectra, is of
order 4% for stars in DR7.</p>

<p>With its smaller fibers, BOSS spectrophotometry is not as accurate,
with an rms difference between the imaging photometry and
integrated spectrophotometry of stars of about 6%.  Note that the
imaging data now include the quantity fiber2flux, the flux of each
object in each filter, measured through a 2&prime;&prime; circular aperture.</p>

<p>There is also a <a href="dr9/spectro/caveats.php#qsoflux">systematic
error</a> in the calibration of quasar targets in BOSS spectroscopy.
In order to maximize signal-to-noise ratio in the blue part of the
spectra, the holes in plugplates corresponding to quasars are drawn to
the expected position of the 4000 &Aring; light (given atmospheric
dispersion), and washers are added to the plate to move the focus
appropriate for that wavelength.  However, the standard stars (like
the galaxies) are drilled for light at 5400 &Aring;, and are therefore not
on the same system.  This means that the quasar spectra are biased
blue, by an amount depending on airmass and position on the plate, but
is of order 0.4 in spectral index.</p>

<p>Below we describe some of the details of previous improvements to
the spectrophotometric calibration.</p>

<p>Jump to:</p>

<ul>
<li><a href="dr9/algorithms/spectrophotometry.php#dr7">DR7 Updates</a></li>
<li><a href="dr9/algorithms/spectrophotometry.php#dr6">DR6 Updates</a></li>
<li><a href="dr9/algorithms/spectrophotometry.php#unchanged">Unchanged since DR2/DR3</a></li>
<li><a href="dr9/algorithms/spectrophotometry.php#flux2photons">DR9: Flux to Photons</a></li>
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
Data Release 7 paper<a href="dr9/algorithms/spectrophotometry.php#footnotes">*</a>).</p>

<p>With this model in hand, we looked for shifts in the interference pattern over the typically 45
minute time a given plate was observed by comparing the results of the
individual 15-minute exposures for each object. Thus, we took ratios
of the extracted spectra from the separate exposures, and medianed
them over all objects on a plate, giving results like those on the
left-hand side of Figure B (Figure 8 of the Data Release 7
paper<a href="dr9/algorithms/spectrophotometry.php#footnotes">*</a>).</p>


<p>We fit this ratio to the
results expected from a shifting interference pattern (essentially a
derivative of the shifting component in Figure A),
with the only free parameter being the amount of shift, and divided
out this remaining component in each spectrum. The
right-hand panel of Figure B shows that this technique
removes the majority of the effects of the shifting interference.</p>


<p>An example is shown in Figure C (Figure 9 of the Data
Release 7 paper<a href="dr9/algorithms/spectrophotometry.php#footnotes">*</a>), the spectrum of
an A star observed on a place where the interference term was
particularly bad, as is seen in DR6 and DR7. The shapes of the absorption
lines, especially H&epsilon; at 3970 &Aring;, is much more regular in the
new reductions.</p>

<p><a href="dr9/algorithms/spectrophotometry.php#Top">[Back to top]</a></p>

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

<p><a href="dr9/algorithms/spectrophotometry.php#Top">[Back to top]</a></p>

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
in the right hand plot are "hot standards" used for telluric absorption
correction.)</td></tr>
</table>

<p>The flux calibration of the spectra is handled by the
<code>idlspec2d</code>
pipeline.  It is performed separately for each of the 2 spectrographs,
hence each half-<a href="dr9/help/glossary.php#plate">plate</a> has its
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



<h2 id="flux2photons">DR9 Flux to Photons</h2>

<p>This section documents how to convert the pipeline outputs from flux
(ergs/s/cm<sup>2</sup>/&Aring;) back to photons (electrons) as extracted from the
original CCD images. This is useful for modeling noise for mocks and alternate
weighting schemes when coadding.</p>

<p>
Note: the
<a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/spectra/PLATE4/spec.html">
per-object spec files</a> have this calibration precomputed as the "calib"
column of the individual exposures.  The following describes how to perform
this calibration when using the per-plate files such as spCFrame.
</p>

<p>The final calibrated spectra in
<a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/PLATE4/spPlate.html">spPlate</a>
(coadded spectra) and
<a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/PLATE4/spCFrame.html">spCFrame</a>
(individual exposures) are in flux: 10<sup>-17</sup> ergs/s/cm<sup>2</sup>/&Aring;.
The individual spectra are wavelength sampled to the native pixel grid of the CCD
(unique to each exposure), while the coadded spectra are wavelength sampled
at a constant &Delta;log<sub>10</sub>&nbsp;&lambda; = 10<sup>-4</sup>. As a result of this different
wavelength sampling, you can't directly add them, but they are in the same units --
<em>i.e.</em> you can overplot or interpolate them and they should agree between the individual
spectra and the coadded spectrum.</p>

<p>The individual extracted spectra in spFrame are in units of flat-fielded electrons
per CCD row. They have the same wavelength sampling as the spCFrame files, <em>i.e.</em>
registered to the native pixel spacing of the CCDs.</p>

<p>To convert these spFrame spectra back to electrons (<em>i.e.</em> photons), you need to
undo the flat-fielding with both the fiber-flat (spFlat HDU 0) and the
superflat (spFrame HDU 8):</p>
<pre>
eflux     = spFrame HDU 0
superflat = spFrame HDU 8
fiberflat = spFlat  HDU 0
electrons = eflux * superflat * fiberflat
</pre>

<p>So to form the correction vector to convert from flux back to electrons,</p>
<pre>
flux = spCFrame HDU 0
calib = flux / electrons
      = flux / (eflux * superflat * fiberflat)
      = spCFrame[0] / (spFrame[0] * spFrame[8] * spFlat[0])
</pre>

<p>Notes:</p>
<ul>
    <li> Each exposure has a unique calibration vector for each fiber.</li>
    <li> The b-channel spCFrame arrays have different dimensions than the equivalent
arrays in spFrame. They are just padded with zeros; trim them back to the same size
before dividing, etc. </li>
    <li> In principle, the sky flux (spFrame/spCFrame HDU 6) has a different calibration
vector than the object flux, since the sky light isn't affected by guider errors,
misaligned holes, etc. In practice, the quoted sky flux uses the same calibration vectors
as the objects. Thus the spCFrame sky calibration is actually wrong, but if you use the
same flux calibration vectors to get back to electrons, you'll have the correct object:
sky ratio in electrons as extracted from the CCD.</li>
    <li> To convert a flux model or the coadded spectra back into electrons, you need
to resample it to the same wavelength grid as one of the calibration vectors, and then
apply that calibration vector.</li>
    <li> The in-progress "per-object" format will do this calculation for you. For
each exposure, you will get the flux in ergs/s/cm2/&Aring; and the calibration vector
necessary to turn it back to electrons. </li>
</ul>
<p>
Example IDL Code: starting in riemann $BOSS_SPECTRO_REDUX/v5_4_40/4444/
</p>


<pre>
;; Define the input files
flat_file   = 'spFlat-b1-00123584.fits.gz'
coadd_file  = 'spPlate-4444-55538.fits'
frame_file  = 'spFrame-b1-00123586.fits.gz'
cframe_file = 'spCFrame-b1-00123586.fits'

;; Load the data
flux      = mrdfits(cframe_file, 0)
eflux     = mrdfits(frame_file, 0)
superflat = mrdfits(frame_file, 8)
fiberflat = mrdfits(flat_file, 0)

;; b spectra have different dimensions pre/post calib
n = size(eflux, /dim)
flux  = flux[0:n[0]-1, 0:n[1]-1]

electrons = eflux * superflat * fiberflat
calib = flux / electrons

;; Plot fiber 261
plot, electrons[*,261]
plot, flux[*,261]
plot, calib[*,261]
</pre>

<h2 id="footnotes">Footnotes</h2>
<p>*Text and figures on this page come from an author-created, un-copyedited
version of the SDSS Data Release 7 paper, an article <!--accepted for publication in-->submitted
to <i>Astrophysical Journal Supplements</i>. IOP Publishing Ltd is not responsible for any errors
or omissions in this version of the manuscript or any version derived from it.<!--The definitive publisher authenticated version
is available online at [insert DOI].--> <a href="http://adsabs.harvard.edu/abs/2009ApJS..182..543A">A preprint of the
DR7 paper</a> is available from the arXiv preprint server.</p>

<?php echo foot(); ?>
