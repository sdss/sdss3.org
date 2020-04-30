<?php include '../../header.php'; echo head('APOGEE_PIXMASK: APOGEE pixel level mask bits'); ?>

<p>This bit mask describes the warnings and failures for pixels within the 1D spectra for APOGEE. The bits are set on a per-pixel basis.</p>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td> BADPIX</td>
<td>           0</td>
<td>Pixel marked as BAD in bad pixel mask</td>
</tr>
<tr>
<td> CRPIX</td>
<td>           1</td>
<td>Pixel marked as cosmic ray in ap3d</td>
</tr>
<tr>
<td> SATPIX</td>
<td>           2</td>
<td>Pixel marked as saturated in ap3d</td>
</tr>
<tr>
<td> UNFIXABLE</td>
<td>           3</td>
<td>Pixel marked as unfixable in ap3d</td>
</tr>
<tr>
<td> BADDARK</td>
<td>           4</td>
<td>Pixel marked as bad as determined from dark frame</td>
</tr>
<tr>
<td> BADFLAT</td>
<td>           5</td>
<td>Pixel marked as bad as determined from flat frame</td>
</tr>
<tr>
<td> BADERR</td>
<td>           6</td>
<td>Pixel set to have very high error (not used)</td>
</tr>
<tr>
<td> NOSKY</td>
<td>           7</td>
<td>No sky available for this pixel from sky fibers</td>
</tr>
<tr>
<td> LITTROW_GHOST</td>
<td>           8</td>
<td>Pixel falls in Littrow ghost, may be affected</td>
</tr>
<tr>
<td> PERSIST_HIGH</td>
<td>           9</td>
<td>Pixel falls in high persistence region, may be affected</td>
</tr>
<tr>
<td> PERSIST_MED</td>
<td>          10</td>
<td>Pixel falls in medium persistence region, may be affected</td>
</tr>
<tr>
<td> PERSIST_LOW</td>
<td>          11</td>
<td>Pixel falls in low persistence region, may be affected</td>
</tr>
<tr>
<td> SIG_SKYLINE</td>
<td>          12</td>
<td>Pixel falls near sky line that has significant flux compared with object</td>
</tr>
<tr>
<td> SIG_TELLURIC</td>
<td>          13</td>
<td>Pixel falls near telluric line that has significant absorption</td>
</tr>
<tr>
<td>NOT_ENOUGH_PSF </td>
<td>          14</td>
<td>Less than 50 percent PSF in good pixels</td>
</tr>
<tr>
<td> </td>
<td>          15</td>
<td></td>
</tr>
</table>

<?php echo foot(); ?>
