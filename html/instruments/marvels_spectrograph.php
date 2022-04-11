<?php include '../header.php'; echo head('MARVELS Spectrograph'); ?>

<table class="figure" style="width:388px;">
<tr><td><a href="images/marvels/MARVELS_schematic.jpg"><img src="images/marvels/MARVELS_schematic.jpg" alt="A schematic illustration of the MARVELS spectrograph" /></a></td></tr>
<tr><td>A schematic illustration of the MARVELS spectrograph.  Figure taken from Ge, Erskine, and Rushford, 2002, PASP.</td></tr>
</table>

      <p> MARVELS is using a specially built spectrograph to obtain
      high precision radial velocity measurements of stars looking for
      exoplanet candidates.  In contrast to the more traditional high-resolution
      echelle spectrographs, MARVELS uses a new approach to measuring
      radial velocities.  The spectrograph is a fiber-fed dispersed fixed-delay
    interferometer (DFDI), a combination of Michelson interferometer and
    medium resolution (R~6,000-10,000) spectrograph, which overlays interferometer
     fringes on a long-slit stellar spectrum.
    The Doppler sensitivity for this approach is proportional to the 1/2 power of
     the spectrograph resolution. Because of this, the post-dispersing spectrograph
    can be of much lower resolution than those in more traditional techniques.
    Consequently, the overall instrument can have a much higher throughput while
     allowing for a much smaller size than the echelle instruments. The cost of the
    instrument is comparatively low, and most importantly, it operates in a
   single-order mode: a single spectrum only takes up one strip along the CCD
    detector.  Hence, spectra from multiple stars can be lined up at once on a
    single detector to increase  survey speed. In combination with a wide field
    multi-fiber telescope, multi-object surveying can be achieved (indeed, 60
    stars are observed in each exposure). </p>

<p>
   MARVELS' dispersed fixed-delay interferometer consists of a wide angle
   Michelson interferometer followed by a medium resolution spectrograph.
   The spectrograph can be thought of as dispersing the light output from the
   interferometer into a large number of narrow wavelength channels. The
   interferometer creates interference fringes within each of these channels.
   The interferometer has a fixed path difference between its two arms, and has
   one mirror tilted by a few wavelengths in the slit direction. With a wide beam
   entering the interferometer, this produces a spectrum that is spread out so
   that a very narrow range of delays is effectively scanned across the length
   of the slit. Over this range, the interference fringes show a sinusoidal
    response in the slit direction, with an approximately constant phase offset and
   visibility.  Such fringing spectra can be thought of as an overlap between the
   interferometer comb and the stellar spectrum. When there is a small Doppler
   shift in the spectral lines, there is a correspondingly large shift in the phase
  of the sinusoidal fringes. Hence by fitting sine functions to each detector
   column and measuring how they shift in phase, one is able to determine
   a relative Doppler shift.</p>


<?php echo foot(); ?>
