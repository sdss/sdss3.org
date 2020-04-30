<?php include '../../header.php'; echo head('ANCILLARY_TARGET2: More objects selected as BOSS Ancillary Targets'); ?>

<p>The presence of a nonzero value for this target flag indicates that the object
was selected through one or more of the BOSS
<a href="dr10/algorithms/ancillary/boss/">ancillary target selection programs</a>.</p>

<p>If you don't see the ancillary target bit you're looking for here, try the other
ancillary target flag parameter, <a href="dr10/algorithms/bitmask_ancillary_target1.php"><code>
ANCILLARY_TARGET1</code></a>.</p>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr style="color:white;">
<td><a href="dr10/algorithms/ancillary/boss/ukidss.php">HIZQSO82</a></td>
<td>0</td>
<td>High-redshift quasar candidate selected from color cuts in
SDSS <i>ugriz</i> and UKIDSS <i>YJHK</i> photometry</td>
</tr>
<tr style="color:white;">
<td><a href="dr10/algorithms/ancillary/boss/remarkxray.php">HIZQSOIR</a></td>
<td>1</td>
<td>High-redshift quasar candidate selected from color cuts in
SDSS <i>ugriz</i> and <a href="http://www.ukidss.org/">UKIDSS</a>
<i>YJHK</i> photometry in the
Stripe 82 footprint</td>
</tr>
<tr style="color:white;">
<td><a href="dr10/algorithms/ancillary/boss/kbandqso.php">KQSO_BOSS</a></td>
<td>2</td>
<td>Quasar candidate selected from <a href="http://www.ukidss.org/">UKIDSS</a>
K-band photometry </td>
</tr>
<tr style="color:white;">
<td><a href="dr10/algorithms/ancillary/boss/noqso.php">QSO_VAR</a></td>
<td>3</td>
<td>Candidate quasar in Stripe 82 survey area, selected from variability
alone</td>
</tr>
<tr style="color:white;">
<td><a href="dr10/algorithms/ancillary/boss/varqso.php">QSO_VAR_FPG</a></td>
<td>4</td>
<td>Candidate quasar in Stripe 82 survey area, selected from variability
alone</td>
</tr>
<tr style="color:white;">
<td><a href="dr10/algorithms/ancillary/boss/doublelobed.php">RADIO_2LOBE_QSO</a></td>
<td>5</td>
<td>SDSS point source object near the midpoint of double-lobed objects
identified in <a href="http://sundog.stsci.edu/first/catalogs.html">FIRST Catalogs</a></td>
</tr>
<tr style="color:white;">
<td><a href="dr10/algorithms/ancillary/boss/bcg82.php">STRIPE82BCG</a></td>
<td>6</td>
<td>The brightest cluster member of a galaxy cluster or group identified
in the Stripe 82 survey area</td>
</tr>
<tr style="color:white;">
<td>QSO_SUPPZ</td>
<td>7</td>
<td>A subset of SDSS-I/-II quasars with 1.8 &lt; z &lt; 2.15 that were reobserved with
the BOSS spectrograph to measure metal absorption free of any effects from the
Lyman-&alpha; forest</td>
</tr>
<tr style="color:white;">
<td>QSO_VAR_SDSS</td>
<td>8</td>
<td>Quasars selected by photometric variability in the overlap regions between stripes of
SDSS-I/-II imaging, accounting for roughly 30% of the total BOSS footprint</td>
</tr>
<tr style="color:white;">
<td>QSO_WISE_SUPP</td>
<td>9</td>
<td>Quasar targets selected on their
mid-infrared colors from the WISE satellite, thought to be z>2.2 quasars, as
a supplement to the primary BOSS quasar sample.</td>
</tr>
</table>
<?php echo foot(); ?>
