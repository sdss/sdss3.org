<?php include '../../header.php'; echo head('Secondary target mask bits in SDSS-I, -II (for LEGACY_TARGET2, SEGUE1_TARGET2, SEGUE2_TARGET2, SPECIAL_TARGET2 or SECTARGET).'); ?>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td>LIGHT_TRAP</td>
<td>0</td>
<td>hole drilled for bright star, to avoid scattered light</td>
</tr>
<tr>
<td>REDDEN_STD</td>
<td>1</td>
<td>reddening standard star</td>
</tr>
<tr>
<td>TEST_TARGET</td>
<td>2</td>
<td>a test target</td>
</tr>
<tr>
<td>QA</td>
<td>3</td>
<td>quality assurance target</td>
</tr>
<tr>
<td>SKY</td>
<td>4</td>
<td>sky target</td>
</tr>
<tr>
<td>SPECTROPHOTO_STD</td>
<td>5</td>
<td>spectrophotometry standard (typically an F-star)</td>
</tr>
<tr>
<td>GUIDE_STAR</td>
<td>6</td>
<td>guide star hole</td>
</tr>
<tr>
<td>BUNDLE_HOLE</td>
<td>7</td>
<td>fiber bundle hole</td>
</tr>
<tr>
<td>QUALITY_HOLE</td>
<td>8</td>
<td>hole drilled for plate shop quality measurements</td>
</tr>
<tr>
<td>HOT_STD</td>
<td>9</td>
<td>hot standard star</td>
</tr>
<tr>
<td>SOUTHERN_SURVEY</td>
<td>31</td>
<td>a segue or southern survey target</td>
</tr>
</table>

<?php echo foot(); ?>
