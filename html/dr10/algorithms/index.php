<?php include '../../header.php'; echo head('Algorithms in SDSS Data Release 10'); ?>

<div class="summary">
<p>This page contains detailed information about the algorithms
used to process the imaging and spectroscopic data used in SDSS
and SDSS-III. </p>

</div>

<div id="algorithms">

<table class="noborder">
<tbody>

<tr>
<td style="width:45%;vertical-align:top;">

<?php include 'general_algorithms.html'; ?>

<h2 id="target">Target selection</h2>

<?php include 'target_algorithms.html'; ?>

<?php include 'spectrum_algorithms.html'; ?>

<?php include 'ir_spectrum_algorithms.html'; ?>

</td>

<td style="width:45%;vertical-align:top;">

<?php include 'image_algorithms.html'; ?>

<?php include 'image_catalog_algorithms.html'; ?>

</td>
</tr>

</tbody>
</table>

</div>

<?php echo foot(); ?>

