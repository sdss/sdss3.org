<?php include '../../header.php'; echo head('Understand data'); ?>

<p><a href="dr9/tutorials/index.php">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Understand what's in the data files?</h2>



<h2>Jump to:</h2>
<ul>
  <li><a href="dr9/tutorials/understanddata.php#organization">Data organization for BOSS spectroscopic data</a></li>
</ul>



<h2 id="organization">Data organization for BOSS spectroscopic data</h2>

<h3>Plate MJD fiber</h3>
<p>Each plate contains 1000 objects in our 3 deg field of view, observed
over the full wavelength range 3600 -- 10,000 Angstroms. The plate number
plus the observation date uniquely identifies an observation. We track the
date with modified Julian date (MJD). If the same plate plugging is observed
on subsequent nights, we identify it by the last MJD observed for this
plugging. However, if the plate is re-plugged and re-observed, the fibers
may be plugged into different holes so fiber #1 on plate 3841 won't be the
same on the MJD=55295 observation as on MJD=55572. Therefore,
PLATE + MJD + FIBERID uniquely determines a single observation of a
single object. The TILE number uniquely determines a position on the sky,
and there are a few instances where two PLATEs are drilled for one TILE.
THINGID tracks unique objects over multiple pluggings of the same plate and overlapping plates.
</p>


<h3>What plates have been observed?</h3>
<p>The observed plates are available
<a href="http://data.sdss3.org/sas/dr9/boss/spectro/redux/v5_4_45/platelist.html">here</a>, sorted
by plate number, or
<a href="http://data.sdss3.org/sas/dr9/boss/spectro/redux/v5_4_45/platelist-mjdsort.html">here</a>,
sorted by MJD.</p>


<h3>Reduction software versions</h3>
<p>DR9 will use v5_4_45, covering data through MJD 55811. The code was
then updated to accommodate the new r1 CCD installed summer 2011 and
retagged as v5_5_0. Older data were reprocessed with this version so
that v5_4_45 remains purely DR9, while v5_5_0 contains the complete dataset,
including new data.</p>

<h3>What kind of data is available?</h3>

<p>There are three types of data files which you might be interested in:</p>

<dl>
    <dt>spAll</dt><dd>A summary file of metadata such as photometry, classification, and redshifts. Does not contain the actual spectra.</dd>
    <dt>spPlate (coadds) and <b>spCFrame</b> (individual exposures)</dt><dd>Calibrated spectra organized by plate and MJD, including all spectra off all types (galaxies, QSOs, sky...) taken together.</dd>
    <dt>spec files</dt><dd>A reformatting of the data into one file per PLATE-MJD-FIBER, to streamline analyses which are spectrum-oriented but only need a subset of the total data (e.g. QSO Ly&alpha;).</dd>
</dl>


<?php echo foot(); ?>

