<?php include '../../header.php'; echo head('SEGUE1_TARGET2: SEGUE-1 secondary target bits'); ?>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td>SCIENCE</td>
<td>1</td>
<td>Science Target</td>
</tr>
<tr>
<td>SEGUE1_REDDENING</td>
<td>2</td>
<td>Reddening standard</td>
</tr>
<tr>
<td>SEGUE1_QA*</td>
<td>3</td>
<td>QA Duplicate Observations</td>
</tr>
<tr>
<td>SKY</td>
<td>4</td>
<td>Empty area for sky subtraction</td>
</tr>
<tr>
<td>SEGUE1_SPECPHOTO</td>
<td>5</td>
<td>Spectrophotometric standard star</td>
</tr>
</table>

<p>*QA duplicate observations are not currently marked in <i>segue1_target2</i> bitmasks. These are only
marked in <i>sourcetype</i> in SpecObjAll. </p>

<?php echo foot(); ?>
