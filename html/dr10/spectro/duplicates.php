<?php include '../../header.php'; echo head('SEGUE Duplicate Spectra'); ?>

<p> Oftentimes, there are multiple spectroscopic observations for an
individual photometric object. Some of these targets were
intentionally re-observed, either as a QA target, part of a different
program or survey, or as part of a repeated plate observation. In <a
href="dr10/spectro/caveats.php#Duplicates">Spectroscopic Caveats</a>,
we discuss an effective way to remove these repeat observations, keeping only
the best spectrum with the highest S/N. </p>

<p>Although they should be removed from most samples, duplicates are
very useful for testing different aspects of SEGUE and SDSS, in particular
the SSPP. Here we provide a list of the duplicate spectra. </p>

<p>Columns:</p>
<ol>
  <li><i>bestobjid</i> of target</li>
  <li><i>specobjid</i> of Observation 1</li>
  <li><i>plate</i> of Observation 1</li>
  <li><i>MJD</i> of Observation 1 </li>
  <li><i>fiberid</i> of Observation 1</li>
  <li><i>S/N</i> of Observation 1 </li>
  <li><i>RA</i> of Observation 1 </li>
  <li><i>Dec</i> of Observation 1 </li>
  <li><i>SSPP Flags</i> of Observation 1 </li>
  <li><i>specobjid</i> of Observation 2</li>
  <li><i>plate</i> of Observation 2</li>
  <li><i>MJD</i> of Observation 2 </li>
  <li><i>fiberid</i> of Observation 2</li>
  <li><i>S/N</i> of Observation 2 </li>
  <li><i>RA</i> of Observation 2 </li>
  <li><i>Dec</i> of Observation 2 </li>
</ol>

<ul>
<li><a href="binaries/duplicate_list.fits.gz">Duplicate Catalog</a></li>
</ul> 

<?php echo foot(); ?>

