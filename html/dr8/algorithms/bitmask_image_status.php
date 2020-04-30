<?php include '../../header.php'; echo head('IMAGE_STATUS: Sky and instrument conditions of SDSS image'); ?>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td>CLEAR</td>
<td>0</td>
<td>Clear skies</td>
</tr>
<tr>
<td>CLOUDY</td>
<td>1</td>
<td>Cloudy skies (unphotometric)</td>
</tr>
<tr>
<td>UNKNOWN</td>
<td>2</td>
<td>Sky conditions unknown (unphotometric)</td>
</tr>
<tr>
<td>BAD_ROTATOR</td>
<td>3</td>
<td>Rotator problems (set score=0)</td>
</tr>
<tr>
<td>BAD_ASTROM</td>
<td>4</td>
<td>Astrometry problems (set score=0)</td>
</tr>
<tr>
<td>BAD_FOCUS</td>
<td>5</td>
<td>Focus bad (set score=0)</td>
</tr>
<tr>
<td>SHUTTERS</td>
<td>6</td>
<td>Shutter out of place (set score=0)</td>
</tr>
<tr>
<td>FF_PETALS</td>
<td>7</td>
<td>Flat-field petals out of place (unphotometric)</td>
</tr>
<tr>
<td>DEAD_CCD</td>
<td>8</td>
<td>CCD bad (unphotometric)</td>
</tr>
<tr>
<td>NOISY_CCD</td>
<td>9</td>
<td>CCD noisy (unphotometric)</td>
</tr>
</table>

<?php echo foot(); ?>
