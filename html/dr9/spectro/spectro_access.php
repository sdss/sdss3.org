<?php include '../../header.php'; echo head('Available spectroscopic data'); ?>

<p>The major spectroscopic results are contained in a few different
file structures (on SAS) and database tables (in CAS), listed below.
In the case of the SAS files, the large FITS files are all
line-by-line matched, so that the Nth entry in any file refers to the
same object. The "plates" file, listed first below, is especially
useful as a full list of the plates released.  Note that the links
into SAS below bring you into the full directory tree; it is best not
to wander there before first reading both <a
href="dr9/spectro/spectro_basics.php">Understanding SDSS Spectroscopic
Data</a> and the <a href="http://data.sdss3.org/datamodel">data
model</a>.</p>

<p>Methods for accessing these data are summarized on the <a
href="dr9/data_access">data access</a> page.
Also see the <a
href="dr9/spectro/pipeline.php">spectro pipeline</a> page for
a more complete list of spectro pipeline output files and their
download locations.
</p>

<?php include 'spectro_table.html'; ?>

<!-- <p>A note on plate quality is in order.  We have only released plates
that have redeeming scientific value.  However, some are fairly low
signal-to-noise, or have other problems that require special care in
reduction; such plates are marked as "bad". In the table above, the
number of "OK" plates indicates those that are not "bad".  In
addition, this release contains some plates that are repeat
observations. The "primary" plate column counts the number of unique
plates.</p> -->

<?php echo foot(); ?>

