<?php include '../../header.php'; echo head('Spectra'); ?>

<table class="figure" style="width:350px;">
<tr><td><a href="images/sdss_grid_spec.png"><img src="images/sdss_grid_spec.thumb.png" alt="Some selected SDSS spectra." /></a></td></tr>
<tr><td>Some selected SDSS spectra.</td></tr>
</table>

<p>Here we describe details of the spectra from the SDSS spectrograph
and the tools available to use them.  See the <a
href="dr8/spectro/spectro_access.php">spectroscopic data access
documentation</a> for how to access the data. Before proceeding, make
sure you have learned the <a
href="dr8/spectro/spectro_basics.php">basics of SDSS spectra</a>.</p>

<h2 id="Spectrum">Spectrum information</h2>

<p>As described in the <a
href="dr8/spectro/spectro_access.php">data access
description</a>, the spectra themselves are provided in <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spPlate.html">spPlate</a>
files in FITS format. The primary HDU of each file contains an image which
yields all 640 spectra on each plate, each as a row in the image. These spectra
are flux- and wavelength-calibrated. Further HDU contain error masks and other
information. </p>

<p>Note that the wavelength grid for each fiber on a given plate is
the same; however, the wavelength grid differs from plate to
plate. Similarly, the exact spectral coverage varies slightly from
plate to plate due to differing observing conditions. </p>

<p>The table below yields some pertinent information regarding these
spectra:</p>

<table class="common">
<tr>
<td>Fibers per plate</td>
<td>640</td>
</tr>
<tr>
<td>Pixel spacing</td>
<td>log-wavelength (10<sup>-4</sup> dex)</td>
</tr>
<tr>
<td>Units</td>
<td>10<sup>-17</sup> erg cm<sup>-2</sup> s<sup>-1</sup> &Aring;<sup>-1</sup></td>
</tr>
<tr>
<td>Wavelength calibration</td>
<td>&lt; 5 km/s</td>
</tr>
<tr>
<td>Wavelength reference</td>
<td>heliocentric <a href="dr8/spectro/spectra.php#vacuum">vacuum
wavelengths</a></td>
</tr>
<tr>
<td>Fiber diameter</td>
<td>3 arcsec (180 microns)</td>
</tr>
</table>

<p>
See the <a
href="http://www.sdss.org/dr7/instruments/spectrographs/index.html">
detailed instrument specifications</a> at the SDSS DR7 site for more
information.</p>

<p>In further HDU the <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/RUN2D/PLATE4/spPlate.html">spPlate</a>
files store the error and mask information. HDU1 stores the "inverse
variance" of the uncertainties (one over sigma-squared, that is). This quantity
may be used, for example, in model fits to the spectra. It is set to zero for
pixels that should be ignored entirely (another way of thinking about it is that
they have infinite error). For example, in the spectra shown above the
errors are shown as the grey band surrounding the spectrum; for masked pixels
the grey band becomes vertical.</p>

<p>The pixel mask information is stored in HDU2 and HDU3. These images yield a
<a href="dr8/algorithms/bitmasks.php">bitmask</a> for each pixel, in particular the <a
href="dr8/algorithms/bitmask_sppixmask.php">SPPIXMASK</a> bitmask. Since the final spectrum is
a combination of individual exposures, it may be that some bits were flagged in
some exposures but not in others. HDU2 is the "and mask", which lists all the
bits that were set for that pixel in all exposures. HDU3 is the "or mask", which
lists all the bits that were set for that pixel in any one (but not necessarily
all) of the exposures. The "and mask" (HDU2) is the mask of greatest use.</p>

<h2 id="vacuum">Conversion between vacuum and air wavelengths</h2>

<p>The SDSS data are stored in vacuum wavelengths.  However, most
optical astronomers know the wavelengths of transitions as measured at
S.T.P., which is how the CRC lists them for any transitions redward of
2000 Angstroms.</p>

<p>The IAU standard for conversion from air to vacuum wavelengths is
given in <a href="http://adsabs.harvard.edu/abs/1991ApJS...77..119M">Morton (1991,
ApJS, 77, 119)</a>.  For vacuum wavelengths (VAC) in Angstroms,
convert to air wavelength (AIR) via:</p>
<pre>
AIR = VAC / (1.0 + 2.735182E-4 + 131.4182 / VAC^2 + 2.76249E8 / VAC^4)
</pre>

<p>These are the air and vacuum wavelength of some common transitions:</p>

<table class="common">
<tr><th>Line</th><th>Air</th><th>Vacuum</th></tr>
<tr><td>H-beta</td><td>4861.363</td><td>4862.721</td></tr>
<tr><td>[O III]</td><td>4958.911</td><td>4960.295</td></tr>
<tr><td>[O III]</td><td>5006.843</td><td>5008.239</td></tr>
<tr><td>[N II]</td><td>6548.05</td><td>6549.86</td></tr>
<tr><td>H-alpha</td><td>6562.801</td><td>6564.614</td></tr>
<tr><td>[N II]</td><td>6583.45</td><td>6585.27</td></tr>
<tr><td>[S II]</td><td>6716.44</td><td>6718.29</td></tr>
<tr><td>[S II]</td><td>6730.82</td><td>6732.68</td></tr>
</table>


<p>Note that the wavelengths are also shifted such that measured
velocities will be relative to the solar system barycentric at the
mid-point of each 15-minute exposure (using TAI-BEG + 0.5 * EXPTIME
from the header).</p>

<?php echo foot(); ?>

