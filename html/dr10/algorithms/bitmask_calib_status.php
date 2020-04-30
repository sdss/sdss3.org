<?php include '../../header.php'; echo head('CALIB_STATUS: Calibration status for an SDSS image'); ?>

<p>
In the flat files there are arrays of length five for each band
<code>calib_status[5]</code> ordered
<code>u,g,r,i,z</code>.  In the CAS these are named by
band pass <code>calibstatus_{band}</code>.
</p>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td>PHOTOMETRIC</td>
<td>0</td>
<td>Photometric observations</td>
</tr>
<tr>
<td>UNPHOT_OVERLAP</td>
<td>1</td>
<td>Unphotometric observations, calibrated based on overlaps with clear, ubercalibrated data; done on a field-by-field basis. Use with caution.</td>
</tr>
<tr>
<td>UNPHOT_EXTRAP_CLEAR</td>
<td>2</td>
<td>Extrapolate the solution from the clear part of a night (that was ubercalibrated) to the cloudy part. Not recommended for use.</td>
</tr>
<tr>
<td>UNPHOT_EXTRAP_CLOUDY</td>
<td>3</td>
<td> Extrapolate the solution from a cloudy part of the night (where there is overlap) to a region of no overlap. Not recommended for use.</td>
</tr>
<tr>
<td>UNPHOT_DISJOINT</td>
<td>4</td>
<td>Data is disjoint from the rest of the survey (even though conditions may be photometric), the calibration is suspect. Not recommended for use.</td>
</tr>
<tr>
<td>INCREMENT_CALIB</td>
<td>5</td>
<td>Incrementally calibrated by considering overlaps with ubercalibrated data</td>
</tr>
<tr>
<td>RESERVED2</td>
<td>6</td>
<td>reserved for future use</td>
</tr>
<tr>
<td>RESERVED3</td>
<td>7</td>
<td>reserved for future use</td>
</tr>
<tr>
<td>PT_CLEAR</td>
<td>8</td>
<td>(INTERNAL USE ONLY in DR8 and later) PT calibration for clear data</td>
</tr>
<tr>
<td>PT_CLOUDY</td>
<td>9</td>
<td>(INTERNAL USE ONLY in DR8 and later) PT calibration for cloudy data</td>
</tr>
<tr>
<td>DEFAULT</td>
<td>10</td>
<td>(INTERNAL USE ONLY in DR8 and later) a default calibration used</td>
</tr>
<tr>
<td>NO_UBERCAL</td>
<td>11</td>
<td>(INTERNAL USE ONLY in DR8 and later) not uber-calibrated</td>
</tr>
</table>

<?php echo foot(); ?>
