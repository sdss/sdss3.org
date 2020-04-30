<?php include '../../header.php'; echo head('ANCILLARY_TARGET2: More objects selected as BOSS Ancillary Targets'); ?>

<p>The presence of a nonzero value for this target flag indicates that the object 
was selected through one or more of the BOSS 
<a href="dr9/algorithms/ancillary/">ancillary target selection programs</a>.</p>

<p>If you don't see the ancillary target bit you're looking for here, try the other 
ancillary target flag parameter, <a href="dr9/algorithms/bitmask_ancillary_target1.php"><code>
ANCILLARY_TARGET1</code></a>.</p>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr style="color:white;">
<td><a href="dr9/algorithms/ancillary/ukidss.php">HIZQSO82</a></td>
<td>0</td>
<td>High-redshift quasar candidate selected from color cuts in
SDSS <i>ugriz</i> and UKIDSS <i>YJHK</i> photometry</td>
</tr>
<tr style="color:white;">
<td><a href="dr9/algorithms/ancillary/remarkxray.php">HIZQSOIR</a></td>
<td>1</td>
<td>High-redshift quasar candidate selected from color cuts in
SDSS <i>ugriz</i> and <a href="http://www.ukidss.org/">UKIDSS</a>
<i>YJHK</i> photometry in the
Stripe 82 footprint</td>
</tr>
<tr style="color:white;">
<td><a href="dr9/algorithms/ancillary/kbandqso.php">KQSO_BOSS</a></td>
<td>2</td>
<td>Quasar candidate selected from <a href="http://www.ukidss.org/">UKIDSS</a>
K-band photometry </td>
</tr>
<tr style="color:white;">
<td><a href="dr9/algorithms/ancillary/noqso.php">QSO_VAR</a></td>
<td>3</td>
<td>Candidate quasar in Stripe 82 survey area, selected from variability
alone</td>
</tr>
<tr style="color:white;">
<td><a href="dr9/algorithms/ancillary/varqso.php">QSO_VAR_FPG</a></td>
<td>4</td>
<td>Candidate quasar in Stripe 82 survey area, selected from variability
alone</td>
</tr>
<tr style="color:white;">
<td><a href="dr9/algorithms/ancillary/doublelobed.php">RADIO_2LOBE_QSO</a></td>
<td>5</td>
<td>SDSS point source object near the midpoint of double-lobed objects
identified in <a href="http://sundog.stsci.edu/first/catalogs.html">FIRST Catalogs</a></td>
</tr>
<tr style="color:white;">
<td><a href="dr9/algorithms/ancillary/bcg82.php">STRIPE82BCG</a></td>
<td>6</td>
<td>The brightest cluster member of a galaxy cluster or group identified
in the Stripe 82 survey area</td>
</tr>
<tr style="color:white;">
<td>QSO_SUPPZ</td>
<td>7</td>
<td>Reserved for future data releases</td>
</tr>
<tr style="color:white;">
<td>QSO_VAR_SDSS</td>
<td>8</td>
<td>Reserved for future data releases</td>
</tr>
<tr style="color:white;">
<td>QSO_WISE_SUPP</td>
<td>9</td>
<td>Reserved for future data releases</td>
</tr>
</table>
<?php echo foot(); ?>
