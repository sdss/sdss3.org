<?php include '../../header.php'; echo head('IRAF Tutorial'); ?>

<p><a href="dr10/tutorials/">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>View Individual Spectrum Files in IRAF</h2>

<p>The <a href="http://iraf.noao.edu">IRAF</a> package has been traditionally
used in astronomy for various data analysis tasks.  For SDSS data, the
<code>splot</code> task has been used to view individual spectrum
files.  However, <code>splot</code> only understands spectrum files
formatted in a specific way.  In SDSS DR7 and prior,
<a href="http://www.sdss.org/DR7/dm/flatFiles/spSpec.html"><code>spSpec</code></a>
files were formatted in a manner consistent with <code>splot</code>.  If you
retrieve these files from DR7, you should have no problem viewing them in
IRAF.</p>

<p>Because the structure of <code>spSpec</code> is very constrained, and
because the pipeline that originally produced them is no longer used,
starting in DR9 we have a new type of individual spectrum file,
called a <code>spec</code> file.  In a <code>spec</code> file, wavelength,
flux, and other data are stored in a FITS binary table.  We have a
<a href="http://data.sdss3.org/datamodel/files/BOSS_SPECTRO_REDUX/RUN2D/spectra/PLATE4/spec.html">detailed data model</a>
for <code>spec</code> files.  These files contain quite a bit more data
than the old <code>spSpec</code> files.</p>

<p>To extract and plot spectra from <code>spec</code> files in IRAF, we
recommend installing the <a href="http://www.stsci.edu/institute/software_hardware/tables">STSDAS tables package</a>.
<a href="http://adsabs.harvard.edu/abs/1996ASPC..101...84H">Hodge (1996)</a>
shows how to extract and plot data from a FITS binary table, using the
tables package.  Here is a
<a href="http://iraf.noao.edu/ADASS/adass_proc/adass_95/hodgep/hodgep.html">direct link to the article</a>.</p>

<?php echo foot(); ?>
