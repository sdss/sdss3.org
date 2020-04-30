<?php include '../../header.php'; echo head('Algorithms in SDSS DR8'); ?>

<p> This page contains detailed information about the algorithms used
to process SDSS-III data.  </p>

<div id="algorithms">

<table border="0">
<tbody>

<tr>
<td style='width:45%;vertical-align:top;'>
<?php include 'general_algorithms.html'; ?>
<?php include 'image_algorithms.html'; ?>
<?php include 'target_algorithms.html'; ?>
<?php include 'spectrum_algorithms.html'; ?>
</td>

<td style='width:45%;vertical-align:top;'>
<?php include 'image_catalog_algorithms.html'; ?>
</td>
</tr>

</tbody>
</table>

</div>

<?php echo foot(); ?>

