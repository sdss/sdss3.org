<?php include '../header.php';  echo head('APOGEE Spectrograph');?>

<p><a href="instruments/apogee_spectrograph.php#General">[General&nbsp;Information]</a>&nbsp;<a
href="instruments/apogee_spectrograph.php#Parameters">[Specs]</a>&nbsp;<a
href="instruments/apogee_spectrograph.php#Gallery">[Pictures]</a></p>


<h2 id="General">Overview</h2>

<table class="figure" style="width:473px;">

<tr><td><a href="images/apogee/apogee_optics.gif"><img src="images/apogee/apogee_optics.gif"
alt="Optical Engineer Paul Maseman (U. of Arizona) checks the laser alignment of the APOGEE
spectrograph fore-optics during commissioning." /></a></td></tr>

<tr><td>Optical Engineer Paul Maseman (Univ of Arizona) checks the laser alignment of the APOGEE
spectrograph fore-optics during commissioning.</td></tr>

</table>

<p>

APOGEE is a high-resolution near-infrared spectrographic survey of ~100,000 stars in the
Milky Way galaxy.  Spectra are observed with a custom-built multi-object spectrograph which records
the spectrum of 300 targets simultaneously across 1.51 to 1.70 micron within the H-band with a
nominal resolution of 22,500.

</p>

<p>

Light is transmitted from the 2.5-m Sloan Foundation Telescope focal plane to the pseudo-slit
within the cryogenically cooled instrument, located in the adjacent warm support building, via 300
low-OH ("dry") fused silica fibers which have a 2" field of view on the sky.  Each of the 300 fiber
runs consist of two fiber assemblies connected in series.  A 2-m fiber run (so-called "fiber
harness") goes from the plug plate to a "gang-connector" just below the telescope and plug plate
cartridge.  Multiple cartridges are used throughout the night to observe different parts of the sky
and each cartridge has its own set of 300 fiber harnesses.  An innovative gang-connector allows the
simultaneous connection of all 300 fibers from a specific cartridge to the single 40-m fiber run
("fiber link") which transmits the light from the telescope and cartridges over to the adjacent
building and into the apogee spectrograph.  To avoid throughput losses from the use of another
fiber coupling, the fibers are fed through an epoxy-sealed vacuum feed-through without break at the
cryostat wall.  Lastly, fibers which make up the fiber link terminate at the instrument pseudo-slit
inside the cryogenically cooled instrument.

</p>

<table class="centerfigure">

<tr><td><a href="images/apogee/apogee_gangconnector.gif"><img
src="images/apogee/apogee_gangconnector.gif" alt="Diagram of the fiber routing and the 300-fiber
gang connector which allows quick change of light source to the instrument." /></a></td></tr>

<tr><td>Diagram of the fiber routing and the 300-fiber gang connector which allows quick change of
light source to the instrument.</td></tr>

</table>

<p>

An 'uncorrected' Schmidt camera, used in reverse, collimates the light of each of the fibers.  Thus
the fiber tips are carefully positioned on a curved pseudo-slit.  The pseudo-slit and spherical
collimator have a common center of curvature near the system pupil which is also the approximate
position of the spectrograph grating.  The design is on-axis so the pseudo-slit is an obscuration
in the collimated beam.  Two-fold mirrors are used for efficient packaging of the optics train
within the cryostat.

</p>

<table class="centerfigure">

<tr><td><a href="images/apogee/apogee_schematic.gif"><img src="images/apogee/apogee_schematic.gif"
alt="A schematic of the instrument optics." /></a></td></tr>

<tr><td>A schematic of the instrument optics.</td></tr>

</table>

<p>

The dispersive optic is a transmissive 3-panel mosaic Volume Phase Holographic (VPH) grating
fabricated by Kaiser Optical Systems Inc., the first ever of its kind deployed in a cryogenic
astronomical instrument.  Due to its size the grating area of the VPH was recorded in multiple
steps (panels) and then processed and capped as a single unit.  A challenging 6-element refractive
camera fabricated by New England Optical Systems focuses the various wavelengths of light onto the
detectors.  The camera features elements of mono-crystalline silicon and fused silica, the largest
of which are nearly 400 mm diameter.  Three JWST H2RG near-infrared detectors, on-loan from the
University of Arizona, are mounted side-by-side to record the blue, middle and red portions of the
spectrum.  An Astronomical Research Camera (so-called Leach) controller operates all three
detectors in sample-up-the-ramp mode.

</p>

<p>

While the nominal full-width half-maximum is approx. 2.3 pixels wide, the blue end of the spectrum
is sampled with less than 2 pixels.  To recover optimal sampling, the detector mount is translated
(spectrally dithered) between sets of frames with a custom, precision single-axis actuator.

</p>

<p><a href="instruments/apogee_spectrograph.php#Top">[Back to top]</a></p>



<h2 id="Parameters">Main Parameter Summary</h2>

<table class="common">
    <tr>
      <td>Nominal Spectral resolution</td>
      <td>22,500</td>
    </tr>
   <tr>
      <td>Wavelength coverage</td>
      <td>1.51 - 1.70 &mu;m</td>
    </tr>
    <tr>
      <td>Fiber diameter</td>
      <td>2 arcsec </td>
    </tr>
    <tr>
      <td>Throughput</td>
      <td>~15% H broad-band efficiency (including atmosphere) </td>
    </tr>
    <tr>
      <td>Sensitivity</td>
      <td>S/N~100/pixel for H &ge; 12.2 and 3-hour integration</td>
    </tr>
   <tr>
      <td>Detectors </td>
      <td>Three JWST H2RG (2048 x 2048) Near-Infrared HgCdTe Detectors with 18 micron pixels</td>
    </tr>

</table>

<p><a href="instruments/apogee_spectrograph.php#Top">[Back to top]</a></p>


<h2 id="Gallery">Some nice instrument pictures</h2>

<table class="noborder">
    <tr style="vertical-align:top;">
        <td>
            <table class="centerfigure">
            <tr><td><a href="images/apogee/apogee_vph.gif"><img src="images/apogee/apogee_vph.thumbnail.gif" alt="The
            APOGEE mosaic Volume Phase Holographic (VPH) grating is installed during instrument assembly." /></a></td></tr>
            <tr><td>The APOGEE mosaic Volume Phase Holographic (VPH) grating is installed during instrument assembly.</td></tr>
            </table>
        </td>
        <td>
            <table class="centerfigure">
            <tr><td><a href="images/apogee/apogee_camera.gif"><img src="images/apogee/apogee_camera.thumbnail.gif" alt="The 6-element, 250 lb, APOGEE refractive camera undergoes interferometric null-testing at New England Optical Systems, Inc." /></a></td></tr>
            <tr><td>The 6-element, 250 lb, APOGEE refractive camera undergoes interferometric null-testing at New England Optical Systems, Inc.</td></tr>
            </table>
        </td>
    </tr>
    <tr style="vertical-align:top;">
        <td>
            <table class="centerfigure">
            <tr><td><a href="images/apogee/apogee_pseudoslit.gif"><img src="images/apogee/apogee_pseudoslit.gif" alt="APOGEE fibers terminate in v-groove blocks.  Each of the 10 v-groove blocks contain 30 fibers." /></a></td></tr>
            <tr><td>APOGEE fibers terminate in v-groove blocks.  Each of the 10 v-groove blocks contain 30 fibers.</td></tr>
            </table>
        </td>
        <td>
            <table class="centerfigure">
            <tr><td><a href="images/apogee/apogee_arrival.gif"><img src="images/apogee/apogee_arrival.gif" alt="The 2-ton APOGEE instrument is lowered to the concrete pad in front of its room in the warm building next to the telescope." /></a></td></tr>
            <tr><td>The 2-ton APOGEE instrument is lowered to the concrete pad in front of its room in the warm building next to the telescope.</td></tr>
            </table>
        </td>
    </tr>
</table>

<p><a href="instruments/apogee_spectrograph.php#Top">[Back to top]</a></p>


<?php echo foot(); ?>
