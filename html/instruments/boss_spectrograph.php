<?php include '../header.php'; echo head('BOSS Spectrograph'); ?>

<p><a href="instruments/boss_spectrograph.php#General">[General&nbsp;Information]</a>&nbsp;<a href="instruments/boss_spectrograph.php#Parameters">[Specs]</a>&nbsp;<a href="instruments/boss_spectrograph.php#Gallery">[Pictures]</a></p>

<h2 id="General">Overview</h2>

<table class="figure" style="width:446px;">
<tr><td><a href="images/boss/boss_spectrograph.jpg"><img src="images/boss/boss_spectrograph_small.jpg" alt="An illustration of the BOSS spectrograph setup" /></a></td></tr>
<tr><td>An illustration of the BOSS spectrograph setup (click on the image for a larger picture)</td></tr>
</table>

<p> BOSS is a spectroscopic survey that will measure redshifts of 1.5 million
luminous red galaxies and Lyman-alpha absorption towards 160,000 high redshift
quasars.  Its two identical spectrographs are rebuilt from the
<a href="http://www.sdss.org/dr7/instruments/spectrographs/index.html">original SDSS spectrographs</a>.
Each spectrograph has two cameras, one red and one blue, with a dichroic
splitting the light at roughly 6000 Angstroms. The principal upgrades from the
original cameras are:</p>
<ul>
<li> New, higher efficiency volume holographic gratings. </li>
<li> New, fully-depleted CCDs on the red side, with much better red response,
as well as blue CCDs with improved blue response.</li>
<li> New fibers (1000 rather than 640 per plate), with smaller holes (2" rather than 3"). </li>
</ul>
<p>
1,000 holes are drilled in an aluminum plate (a plug plate, which subtends
3 degrees on the sky), each hole corresponding to an astronomical object
such as a quasar, a galaxy, a standard star, or a random blank area on the sky
(to measure and subtract the foreground sky emission).  The plug plate is then
mounted on a cartridge that can be quickly affixed to the telescope.  1,000
optical fibers with 2 arcsec diameters are plugged into the holes.  The fibers
send the light from each object through a beamsplitter with a coating that
reflects the blue part of the spectrum while allowing the red part through.
Each spectrum is thus split into two parts, blue and red,
and the two parts are recorded on separate CCDs.   The red spectrograph uses
thick, fully depleted 4Kx4K <a href="http://www-ccd.lbl.gov">LBNL CCDs</a>
that have a high quantum efficiency in the near-infrared and much reduced
fringing.  The blue side has blue-sensitive
<a href="http://www.e2v.com/products-and-services/imaging/space---scientific-imaging/datasheets">e2v CCDs</a>
(CCD231-84).
</p>
<p>
The blue cameras cover at least 3600-6350 Angstroms.  The blue limit is set to
include the wavelength-calibration Cd I arc line at 3610.51 Angstroms, although
the throughput requirements for the Lyman-alpha forest analysis begin at 3700
Angstroms.  The red cameras cover at least 5650-10000 Angstroms.  The red
limit is set by detection of the Mg b 5175 A and the Na D 5893 A
absorption features redshifted to z = 0.7.
</p>
<p>
The main scientific goals of BOSS could be achieved using a broad range of
spectroscopic resolution.  The adopted design has a resolution running from
<i>R</i> = 1560 at 3700 Angstroms to <i>R</i>= 2270 at 6000 Angstroms
(blue channel), and from <i>R</i> = 1850 at 6000 Angstroms to <i>R</i> = 2650
at 9000 Angstroms (reds channel).
The higher resolution and the extended red wavelength coverage is necessary to
capture the Lyman-alpha break and the strongest Mg lines redshifted to about
9300 Angstroms.
</p>

<p><a href="instruments/boss_spectrograph.php#Top">[Back to top]</a></p>

<h2 id="Parameters">Main Parameter Summary</h2>

<table class="common">
    <tr>
     <td>Number of spectrographs</td>
     <td>2</td>
    </tr>
    <tr>
      <td>Spectral resolution</td>
      <td>1560-2270 in the blue channel, 1850-2650 in the red channel</td>
    </tr>
   <tr>
      <td>Wavelength coverage</td>
      <td>3600-10,400 Angstroms</td>
    </tr>
    <tr>
      <td>Fiber diameter</td>
      <td>2 arcsec </td>
    </tr>
   <tr>
      <td>CCDs </td>
      <td>4Kx4K fully-depleted LBNL CCDs with 15 micron pixels for the red side,
      <br /> blue-sensitive 4Kx4K e2V CCDs with 15 micron pixels for the blue side</td>
    </tr>
     <tr>
      <td>Collimator coating reflectivity</td>
      <td>>95% from 420 nm to 1000 nm</td>
    </tr>
</table>

<p><a href="instruments/boss_spectrograph.php#Top">[Back to top]</a></p>

<h2 id="Gallery">Some nice instrument pictures</h2>

<table class="noborder">
    <tr style="vertical-align:top;">
        <td>
            <table class="centerfigure">
            <tr><td><a href="images/boss/boss_optbench.gif"><img src="images/boss/boss_optbench.gif" alt="BOSS optical bench" /></a></td></tr>
            <tr><td>The BOSS optical bench.  The large hole will hold the blue camera.</td></tr>
            </table>
        </td>
        <td>
            <table class="centerfigure">
            <tr><td><a href="images/boss/boss_beamsplitter.JPG"><img src="images/boss/boss_beamsplitter_small.JPG" alt="BOSS beamsplitter" /></a></td></tr>
            <tr><td>The dichroic (beamsplitter).</td></tr>
            </table>
        </td>
    </tr>
    <tr style="vertical-align:top;">
        <td>
            <table class="centerfigure">
            <tr><td><a href="images/boss/boss_onedispersive_dichroic.JPG"><img src="images/boss/boss_onedispersive_dichroic_small.JPG" alt="BOSS one dispersive element + dichroic" /></a></td></tr>
            <tr><td>The dichroic plus one dispersive element.</td></tr>
            </table>
        </td>
        <td>
            <table class="centerfigure">
            <tr><td><a href="images/boss/boss_twodispersive_dichroic.JPG"><img src="images/boss/boss_twodispersive_dichroic_small.JPG" alt="BOSS two dispersive elements + dichroic" /></a></td></tr>
            <tr><td>The assembled central optics (two dispersive elements  and the dichroic).</td></tr>
            </table>
        </td>
    </tr>
</table>

<p><a href="instruments/boss_spectrograph.php#Top">[Back to top]</a></p>

<?php echo foot(); ?>

