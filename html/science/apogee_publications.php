<?php include '../header.php'; echo head('APOGEE Publications and Results'); ?>

<h2 id="intro">Introduction</h2>

<ul>
<li>For a list of APOGEE technical publications, see the <a href="science/technical_publications.php">technical
papers</a> page.</li>
<li>For a complete list of SDSS-III publications, see the <a href="science/publications.php">publications
page</a>.</li>
<li>On the remainder of this page, we provide some  APOGEE results of general interest to the community.</li>
</ul>

<h2 id="scilit">APOGEE Science Papers</h2>

<table class="common">
<tr>
    <th>Title</th>
    <th>First Author</th>
    <th>Journal</th>
</tr>
<?php
include './bib.php';
$pubs = array(
    '2014ApJ...785L..28E',
    '2014ApJ...782...61T',
    '2014AJ....148...24S',
    '2014AJ....147..116H',
    '2014ApJ...784L..30E',
    '2014A&A...564A.115A',
    '2013AJ....146..156D',
    '2013ApJ...777L..13M',
    '2013ApJ...777L...1F',
    '2013ApJ...767L...9G',
    '2013ApJ...765...16S',
    '2012ApJ...759..131B',
    '2012AJ....144..120M',
    '2012ApJ...755L..25N',
    );
foreach ($pubs as $p) {
    $bibtex = new BibTeX($p);
    echo '<tr>'.PHP_EOL;
    echo '    <td class="ref">'.$bibtex->title.'</td>'.PHP_EOL;
    echo '    <td class="ref">'.$bibtex->first_author().'</td>'.PHP_EOL;
    echo '    <td><a href="'.$bibtex->adsurl.'">'.$p.'</a></td>'.PHP_EOL;
    echo '</tr>'.PHP_EOL;
}
?>
</table>


<h2 id="crosscalib">Cross-Calibration of APOGEE Targets</h2>

<p> As described in the <a href="dr10/irspec/targets.php">APOGEE target selection page</a>,
APOGEE has observed a significant number of "calibration" stars. 
Other surveys may wish to observe the same stars when possible, so we release
this list of stars here.</p>

<p>This <a href="binaries/APOGEE_CrossCalib.fits.gz">compressed FITS file</a>
contains a subset of stars that APOGEE has
started observing. These are located in fields with well-studied open and
globular clusters, bulge fields, and equatorial fields.  Almost all the
stars were observed in Year 1 of APOGEE, and so their spectra (co-added with all
observations through July 2012) were released
in Data Release 10 (DR10) in July 2013. The exceptions are the stars with the flag <code>COROT_STD</code>
and Right Ascension near 19:25<i>h</i>. That field's data will be released
later because it was observed in Year 2.</p>

<p>A subset of these stars that meet S/N and other quality requirements
had their stellar parameters,
as determined by the APOGEE pipeline, released in DR10.
We cannot guarantee that <i>every</i> star in this list will eventually have
high quality stellar parameters and/or abundances from APOGEE.
For instance, while APOGEE has started observations of all the listed stars, the
fainter stars are scheduled for additional visits and therefore
may not achieve the necessary signal before the end of the survey
(depending on variables such as weather), which means their
parameters may not be well-determined even in future data releases.
Furthermore, APOGEE currently has only
approximate parameters for the hot telluric standards.
</p>

<p>The <a href="binaries/APOGEE_CrossCalib.fits.gz">FITS table APOGEE_CrossCalib.fits.gz</a>
has six columns:</p>

<table class="common">
<caption>Columns of APOGEE_CrossCalib.fits</caption>
<tr><th>Column</th><th>Name</th><th>Description</th></tr>
<tr><td>1</td><td>TMASS_ID</td><td>2MASS ID for the object</td></tr>
<tr><td>2</td><td>RA</td><td>right ascension of object (J2000) in decimal degrees</td></tr>
<tr><td>3</td><td>DEC</td><td>declination of object (J2000) in decimal degrees</td></tr>
<tr><td>4</td><td>PARAM_ABUND_STD</td><td>see flag descriptions below</td></tr>
<tr><td>5</td><td>CLUSTER_MEMBER</td><td>see flag descriptions below</td></tr>
<tr><td>6</td><td>COROT_STD</td><td>see flag descriptions below</td></tr>
</table>
<p>The objects may have zero or more flags set:</p>
<dl>
<dt>no flags set</dt><dd>Most are red stars selected on <var>J</var>-<var>K</var><sub>0</sub> color. Some are blue stars for
  telluric correction.</dd>
<dt>PARAM_ABUND_STD</dt><dd>High-resolution analysis is available in the
  literature, usually because the star is a cluster member.</dd>
<dt>CLUSTER_MEMBER</dt><dd>Star was identified as a cluster member by proper motion
  or radial velocity, or explicitly included as a confirmed non-member for calibration purposes.</dd>
<dt>COROT_STD</dt><dd>Star is in CoRoT field.</dd>
</dl>
<p>DR10 contains detailed information on these targets.
</p>

<p>Please contact Jennifer Johnson (jaj -at- astronomy.ohio-state.edu) if
you have any questions.</p>

<?php echo foot(); ?>
