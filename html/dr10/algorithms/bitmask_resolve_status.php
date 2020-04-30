<?php include '../../header.php'; echo head('RESOLVE_STATUS'); ?>

<p>Resolve status for an SDSS catalog entry. Only one of bits
RUN_PRIMARY, RUN_RAMP, RUN_OVERLAPONLY, RUN_IGNORE, and RUN_DUPLICATE
can be set. RUN_EDGE can be set for any object. To get a unique set of
objects across the whole survey, search for objects with
SURVEY_PRIMARY set. To get a unique set of objects within a run,
search for objects with RUN_PRIMARY set.</p>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td>RUN_PRIMARY</td>
<td>0</td>
<td>primary within the objects own run (but not necessarily for the survey as a whole)</td>
</tr>
<tr>
<td>RUN_RAMP</td>
<td>1</td>
<td>in what would be the overlap area of a field, but with no neighboring field</td>
</tr>
<tr>
<td>RUN_OVERLAPONLY</td>
<td>2</td>
<td>only appears in the overlap between two fields</td>
</tr>
<tr>
<td>RUN_IGNORE</td>
<td>3</td>
<td>bright or parent object that should be ignored</td>
</tr>
<tr>
<td>RUN_EDGE</td>
<td>4</td>
<td>near lowest or highest column</td>
</tr>
<tr>
<td>RUN_DUPLICATE</td>
<td>5</td>
<td>duplicate measurement of same pixels in two different fields</td>
</tr>
<tr>
<td>SURVEY_PRIMARY</td>
<td>8</td>
<td>Primary observation within the full survey, where it appears in the primary observation of this part of the sky</td>
</tr>
<tr>
<td>SURVEY_BEST</td>
<td>9</td>
<td>Best observation within the full survey, but it does not appear in the primary observation of this part of the sky</td>
</tr>
<tr>
<td>SURVEY_SECONDARY</td>
<td>10</td>
<td>Repeat (independent) observation of an object that has a different primary or best observation</td>
</tr>
<tr>
<td>SURVEY_BADFIELD</td>
<td>11</td>
<td>In field with score=0</td>
</tr>
<tr>
<td>SURVEY_EDGE</td>
<td>12</td>
<td>Not kept as secondary because it is RUN_RAMP or RUN_EDGE object</td>
</tr>
</table>

<?php echo foot(); ?>
