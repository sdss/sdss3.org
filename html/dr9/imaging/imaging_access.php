<?php include '../../header.php'; echo head('Available imaging data'); ?>


<p>The major imaging results are contained in a few different file
structures (on SAS) and database tables (in CAS), listed below. Of
particular use in browsing and using these data is the full <a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/photoRunAll.html">photoRunAll</a>
list of imaging runs, available either on CAS or in flat-file form as
a <a
href="http://data.sdss3.org/sas/dr9/boss/photoObj/photoRunAll-dr9.fits">FITS</a>
or <a
href="http://data.sdss3.org/sas/dr9/boss/photoObj/photoRunAll-dr9.par">Yanny</a>
file. Note that the links into SAS below bring
you into the full directory tree; it is best not to wander there
before first reading both <a
href="dr9/imaging/imaging_basics.php">Understanding SDSS Imaging Data</a> and 
the <a
href="http://data.sdss3.org/datamodel">data model</a>.</p>

<p>Methods for accessing these data are summarized on the <a
href="dr9/data_access">data access</a> pages.</p>

<?php include 'imaging_table.html'; ?>

<p>
The "datasweep" catalogs (calibObj-*.fits.gz) require each object to
have a solid detection in at least one band and not all of the quantities are
reported for each object.  While they therefore form a subset of the full
dataset in photoObj*.fits,
for many purposes they are sufficient. For example, the BOSS
galaxy and quasar target selection is performed on the basis of the sweeps.
</p>

<p>
  For the images themselves,
  the 'corrected' frames have been flat-fielded and bias-subtracted; bad
  columns and cosmic rays have been interpolated over, sky has been subtracted,
  and they have been calibrated to nanomaggies per pixel.
</p>

<?php echo foot(); ?>

