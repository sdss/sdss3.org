<?php include '../../header.php'; echo head('Image quality information'); ?>

<h2>Introduction</h2>

<p>Here we compile some other quantifications about the quality and
nature of the SDSS images.</p>

<ul>
<li><a href="dr10/imaging/other_info.php#flags">Quality flags</a></li>
<li><a href="dr10/imaging/other_info.php#seeing">Seeing and Sky</a></li>
<li><a href="dr10/imaging/other_info.php#completeness">Completeness</a></li>
<li><a href="dr10/imaging/other_info.php#stargalaxy">Star-galaxy separation</a></li>
</ul>

<h2 id="flags">Quality flags</h2>

<p>Most of the discussion below covers the overall quality of SDSS data. In order to evaluate the quality of individual fields, please see our <a href="dr10/algorithms/image_quality.php">description of image quality flags</a>. </p>

<h2 id="seeing">Seeing and Sky Brightness</h2>

<p> Seeing and sky brightness affect both the <a
href="dr10/imaging/other_info.php#completeness">completeness</a> of the SDSS and the
accuracy of its <a href="dr10/imaging/other_info.php#stargalaxy">star/galaxy
separation.</a> Seeing is defined here as the effective width of the
point spread function (see <a
href="http://www.sdss.org/dr7/algorithms/edrpaper.html#psfWidth">section
4.3 of the EDR paper</a>, on the SDSS DR7 site).  The following plots
show the fraction of DR1 fields exceeding a given seeing and sky
brightness. <!-- (Note that SDSS corrects --> <!-- the sky brightness
for atmospheric extinction in the same way as --> <!-- calibrated
object magnitudes in the catalogs to facilitate conversion -->

<!-- of object and sky brightnesses back to counts. This implies that the -->
<!-- reported brightness values are in fact too bright by a typical -->
<!-- extinction correction.) --></p>

<table class="noborder">
<tr><th style="text-align:center;">Seeing</th><th style="text-align:center;">Sky brightness</th></tr>
<tr>
<td><a href="images/psfhist.ps"><img src="images/seeing.jpg" alt="Seeing" /></a></td>
<td><a href="images/skyhist.ps"><img src="images/skybrightness.jpg" alt="Sky Brightness" /></a></td>
</tr>
</table>

<p>These are the r-band quartiles:</p>

<table class="common">
<tr>
    <th>Parameter</th>
    <th>Lower quartile</th>
    <th>Median</th>
    <th>Upper quartile</th>
 </tr>
  <tr>
    <td>PSF width</td>
    <td style="text-align:center;">1.58"</td>
    <td style="text-align:center;">1.43"</td>
    <td style="text-align:center;">1.30"</td>
  </tr>
  <tr>
    <td>Sky brightness</td>
    <td style="text-align:center;">20.70 mag</td>
    <td style="text-align:center;">20.86 mag</td>
    <td style="text-align:center;">21.03 mag</td>
  </tr>
</table>


<h2 id="completeness">Completeness of the SDSS photometric survey</h2>

<p>We have determined the completeness of the SDSS photometric survey
by comparing the number of objects found by the SDSS pipeline to the
number found by the <a href="http://www.mpia-hd.mpg.de/COMBO/">COMBO-17
survey</a> in a region of sky that has been scanned by both surveys,
and in a second comparison with data from observations of a <a
href="http://www.astro.utoronto.ca/~cnoc/">CNOC</a> survey field.
While the comparison was carried out for DR1 data, the DR2/DR3 data are
not significantly different.</p>

<p>Here we show details for the comparison with COMBO-17 data. The region
of sky used here for calibration is COMBO-17's S11 field, which is
covered by run 1140, camcol 5, fields 151-154 and run 1231 camcol 5
and 6, fields 42-45.</p>

<p>The sky brightness in over half the SDSS is better than it is in
these fields, and the seeing in most of the survey is better than it
is in one of these runs, so the completeness in most of the survey
should be better than what is shown here. See the <a
href="dr10/imaging/other_info.php#seeingandskybrighttable">seeing and sky brightness table for
COMBO-17/SDSS overlap</a> below.</p>

<p>In the following plots, PSF r-band magnitudes are used for stars,
and Petrosian r-band magnitudes are used for galaxies.</p>

<table class="noborder">
  <tr>
    <th style="text-align:center;">Which objects</th>
    <th style="text-align:center;">Number counts</th>
    <th style="text-align:center;">Fractional completeness</th>
  </tr>
  <tr>
    <td>Stars</td>
    <td><a href="images/combo_number_counts_stars_r.jpg"><img
        src="images/combo_number_counts_stars_r.jpg" alt="Count of Stars"
        width="300" /></a></td>
    <td><a href="images/combo_fractional_completeness_stars_r.jpg"><img src="images/combo_fractional_completeness_stars_r.jpg" alt="Fractional Completeness of Stars" width="300" /></a></td>
  </tr>
  <tr>
    <td>Galaxies</td>
    <td><a href="images/number_counts_galaxies_r.jpg"><img src="images/number_counts_galaxies_r.jpg" alt="Count of
        Galaxies" width="300" /></a></td>
    <td><a href="images/fraction_galaxies_r.jpg"><img src="images/fraction_galaxies_r.jpg" alt="Fractional
        Completeness of Galaxies" width="300" /></a></td>
  </tr>
</table>

<p>Note that COMBO-17's multicolor classification starts to become
incomplete for stars at about one magnitude fainter than
SDSS. Therefore, the SDSS 50% completeness is slightly brighter than
indicated by this plot.</p>

<p>The number of objects above the 5-sigma detection threshold depends
heavily on the <a href="dr10/imaging/other_info.php#seeing">seeing and sky brightness</a> in
a given field. The following table summarizes the seeing and sky
brightness in the overlap region.</p>

<table id="seeingandskybrighttable" class="common">
  <tr style="text-align:center;">
   <th>run</th>
   <th>camcol</th>
   <th>field</th>
   <th>seeing ["]</th>
   <th>sky brightness [mag/sq. "]</th>
  </tr>
 <tr style="text-align:center;">
    <td>1140</td>
    <td>5</td>

    <td>151</td>
    <td>1.293</td>
    <td>20.8210</td>
  </tr><tr style="text-align:center;">
    <td>1140</td>

    <td>5</td>
    <td>152</td>
    <td>1.273</td>
    <td>20.8210</td>
  </tr><tr style="text-align:center;">

    <td>1140</td>
    <td>5</td>
    <td>153</td>
    <td>1.280</td>
    <td>20.8150</td>

  </tr><tr style="text-align:center;">
    <td>1140</td>
    <td>5</td>
    <td>154</td>
    <td>1.331</td>

    <td>20.8060</td>
  </tr><tr style="text-align:center;">
    <td>1231</td>
    <td>5</td>
    <td>42</td>

    <td>1.941</td>
    <td>20.7670</td>
  </tr><tr style="text-align:center;">
    <td>1231</td>
    <td>5</td>

    <td>43</td>
    <td>2.051</td>
    <td>20.7670</td>
  </tr><tr style="text-align:center;">
    <td>1231</td>

    <td>5</td>
    <td>44</td>
    <td>2.052</td>
    <td>20.7700</td>
  </tr><tr style="text-align:center;">

    <td>1231</td>
    <td>5</td>
    <td>45</td>
    <td>2.011</td>
    <td>20.7710</td>

  </tr><tr style="text-align:center;">
    <td>1231</td>
    <td>6</td>
    <td>42</td>
    <td>2.010</td>

    <td>20.7740</td>
  </tr><tr style="text-align:center;">
    <td>1231</td>
    <td>6</td>
    <td>43</td>

    <td>2.113</td>
    <td>20.7750</td>
  </tr><tr style="text-align:center;">
    <td>1231</td>
    <td>6</td>

    <td>44</td>
    <td>2.122</td>
    <td>20.7750</td>
  </tr><tr style="text-align:center;">
    <td>1231</td>

    <td>5</td>
    <td>45</td>
    <td>2.033</td>
    <td>20.7780</td>
   </tr>
</table>


<p>Comparing with the <a href="dr10/imaging/other_info.php#seeing">seeing and sky
brightness</a> statistics, most of the SDSS fields have better seeing
than this overlap region.  Over half of the fields have lower sky
levels. Therefore, the completeness in most of the survey should be
better than what is shown here</p>

<h2 id="stargalaxy">Star/galaxy separation</h2>

<p>The SDSS photometric pipeline performs a <a
href="dr10/algorithms/classify.php#photo_class">morphological
star/galaxy separation</a>. The quality of this separation is
therefore intimately related to <a
href="dr10/imaging/other_info.php#seeing">the seeing and
sky brightness.</a> Photo's classifications have been tested against
those of the <a href="http://www.mpia-hd.mpg.de/COMBO/">COMBO
survey</a> (which effectively uses low-resolution spectroscopy for
star/galaxy separation) in a region of the sky that both surveys have
scanned. While the comparison was carried out for DR1 data, the DR2/DR3
data are not significantly different.</p>

<p>We assess the quality of the SDSS star/galaxy separation
using the <a
href="http://www.mpia-hd.mpg.de/COMBO/combo_fields.html">COMBO S11
field</a> which corresponds to SDSS run 1140 camcol 5 fields 151-154,
run 1231 fields 42-25 camcols 5-6. We assume the COMBO classification
is correct and determine which fraction of SDSS-detected objects is
classified identically by SDSS.</p>

<table class="noborder">
  <tr>
    <th style="text-align:center:">Stars</th>
    <th style="text-align:center:">Galaxies</th>
   </tr>
    <tr>
      <td><img src="images/combo_stargal_stars.jpg" alt="Correct Stars" /></td>
      <td><img src="images/combo_stargal_gals.jpg" alt="Correct Galaxies" /></td>
     </tr>
</table>


<p>To see how the seeing and sky brightness of these fields
compare to the rest of the SDSS, look at the <a
href="dr10/imaging/other_info.php#seeing">seeing and sky
brightness in the SDSS/COMBO overlap region</a>.</p>

<?php echo foot(); ?>
