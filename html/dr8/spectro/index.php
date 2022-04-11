<?php include '../../header.php'; echo head('Spectroscopic data'); ?>

<p>SDSS-III will release full spectra and spectroscopic parameters
from all the plates observed by the SDSS spectrograph in DR8. These
pages describe the nature of the DR8 spectroscopic data and how to use
it.  In particular:</p>

<ul>
<li> <a href="dr8/spectro/spectro_basics.php">Basics</a> describes
the general nature of the spectroscopic data (plates, MJDs, etc).</li>
<li> <a href="dr8/spectro/pipeline.php">Pipeline</a> describes the steps in
the spectroscopic data processing and the associated files.</li>
<li> <a href="dr8/spectro/spectro_access.php">Data Access</a> describes
how to get the data from SAS or CAS.</li>
<li> <a href="dr8/spectro/targets.php">Target flags</a> describes
the target classifications and how to track them in the data</li>
<li> <a href="dr8/spectro/spectra.php">Spectra</a> describes using and
analyzing the spectra</li>
<li> <a href="dr8/spectro/catalogs.php">Catalogs</a> describes
the basic catalog parameters like redshifts and classifications.</li>
<li> <a href="dr8/spectro/galspec.php">Galaxies</a> describes
some extra parameters calculated for galaxy spectra in the
data set.</li>
<li> <a href="dr8/spectro/sspp.php">Stars (SSPP)</a> describes
the SEGUE-2 Stellar Parameters Pipeline.</li>
<li> <a href="dr8/algorithms/segueii/segue_sqlcookbook.php">SEGUE SQL cookbook</a> describes getting stellar parameters out of the SQL database, with examples.</li>
<li> <a href="dr8/spectro/caveats.php">Caveats</a> describes
some important caveats in using this data</li>
</ul>

<p> The table below gives a breakdown of the numbers of plates of
various sorts included in the DR8 release. The spectroscopy was
executed through several programs: SDSS Legacy, SDSS special programs,
SEGUE-1, and SEGUE-2. The <a
href="dr8/spectro/spectro_basics.php">page on spectroscopic basics</a>
explains how we track the nature of the plates (its survey and
program).</p>

<table class="common">
<tr>
<th>Survey</th>
<th>Program</th>
<th>N<sub>plate</sub></th>
<th>N<sub>ok</sub></th>
<th>N<sub>primary</sub></th>
</tr>
<tr>
<td>all</td>
<td>all</td>
<td>2880</td>
<td>2764</td>
<td>2654</td>
</tr>
<tr>
<td>sdss</td>
<td>all</td>
<td>2227</td>
<td>2126</td>
<td>2043</td>
</tr>
<tr>
<td>sdss</td>
<td>legacy</td>
<td>1926</td>
<td>1869</td>
<td>1794</td>
</tr>
<tr>
<td>segue1</td>
<td>all</td>
<td>442</td>
<td>427</td>
<td>407</td>
</tr>
<tr>
<td>segue2</td>
<td>all</td>
<td>211</td>
<td>211</td>
<td>204</td>
</tr>
</table>

<!--
<p> The spectra use 3 arcsec fiber apertures, and are taken 640
objects at a time (with some of those fibers reserved for sky and
standard stars). Each plate covers a circle with a 1.49 deg radius on
the sky.  The wavelength coverage of the spectra is from 3800 to 9200
Angstroms approximately, with a pixel size of about 70 km/s (R = 2000
approximately).

<p>A note on plate quality is in order.  This release contains only
plates that have redeeming scientific value.  However, some are fairly
low signal-to-noise, or have other problems that require special care;
such plates are marked as "bad". In the table above, the number of
"OK" plates indicates those that are not "bad".  In addition, this
release contains some plates that are repeat observations. The
"primary" plate column counts the number of unique plates.</p> -->

<p>Please pay attention to the notes included here about how to check
data quality and the various caveats on the data. </p>

<?php echo foot(); ?>

