<?php include '../../header.php'; echo head('SEGUE1_TARGET2: SEGUE-1 secondary target bits'); ?>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td>REDDEN_STD</td>
<td>1</td>
<td>reddening standard star</td>
</tr>
<tr>
<td>SEGUE1_QA&nbsp;<sup>1</sup></td>
<td>3</td>
<td>QA Duplicate Observations (unused)</td>
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
<td>SEGUE1_SCIENCE&nbsp;<sup>2</sup></td>
<td>30</td>
<td>SEGUE-1 science target</td>
</tr>
<tr>
<td>SEGUE1_TEST&nbsp;<sup>3</sup></td>
<td>31</td>
<td>SEGUE-1 test target</td>
</tr>
</table>

<h2>Notes</h2>
<ol>
<li>QA duplicate observations are not currently marked in SEGUE1_TARGET2
bitmasks. These are only marked in <em>sourcetype</em> in SpecObjAll.</li>
<li>These objects are specific science targets, but since reddening and
spectrophotometric targets were also used for SEGUE science, it is not quite
as useful as it might appear. <em>Use with caution!</em></li>
<li>These objects have
<a href="dr10/help/glossary.php#programname">programname</a> 'segtest',
but not all 'segtest' plates
have this bit set. <em>Use with caution!</em></li>
</ol>

<?php echo foot(); ?>
