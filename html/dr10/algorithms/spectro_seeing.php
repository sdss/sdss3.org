<?php include '../../header.php'; echo head('Seeing During Spectroscopic Observations'); ?>

<p>
The seeing during BOSS spectroscopic observations is estimated from
Gaussian fits to the point-spread-function of the guide camera images,
with ~200 measurements per 15 minute BOSS exposure.
The 20th percentile, 50th percentile (median), and 80th percentile
of the instantaneous FWHM values are stored in the SEEING20, SEEING50,
and SEEING80 header keywords of the spCFrame and spPlate files.
The spPlate SEEING* values are the unweighted average of the SEEING*
values from the contributing exposures.
</p>

<p>
If the seeing isn't changing during an exposure, then
SEEING20 = SEEING50 = SEEING80.  If SEEING80 >> SEEING20,
then the seeing changed considerably during the exposure.
</p>

<p>
Note that the guide camera images are not the highest quality piece
of SDSS data and these SEEING values should be interpreted with some
caution.  They provide an approximate guideline for the seeing and
variability during an exposure, but analyses should not be critically
sensitive to them.
</p>

<?php echo foot(); ?>
