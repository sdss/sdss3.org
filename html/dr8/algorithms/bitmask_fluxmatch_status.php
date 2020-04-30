<?php include '../../header.php'; echo head('FLUXMATCH_STATUS: Flags from flux-based matching to SDSS photometry'); ?>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td>ORIGINAL_FLUXMATCH</td>
<td>0</td>
<td>used the original positional match (which exists)</td>
</tr>
<tr>
<td>FIBER_FLUXMATCH</td>
<td>1</td>
<td>flagged due to fiberflux/aperflux issue</td>
</tr>
<tr>
<td>NONMATCH_FLUXMATCH</td>
<td>2</td>
<td>flagged due to non-match</td>
</tr>
<tr>
<td>NOPARENT_FLUXMATCH</td>
<td>3</td>
<td>no overlapping parent in primary field</td>
</tr>
<tr>
<td>PARENT_FLUXMATCH</td>
<td>4</td>
<td>overlapping parent has no children, so used it</td>
</tr>
<tr>
<td>BRIGHTEST_FLUXMATCH</td>
<td>5</td>
<td>picked the brightest child</td>
</tr>
</table>

<?php echo foot(); ?>
