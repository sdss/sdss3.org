<?php include '../header.php'; echo head('SDSS Technical Publications'); ?>

<h2 id="intro">Introduction</h2>

<p>These technical papers describe various aspects of the technical operation of the original
Sloan Digital Sky Survey, the SDSS-II's SEGUE and Supernova surveys, and
the <a href="surveys/">SDSS-III surveys</a>. This list of papers is sorted
by the phase of SDSS (most recent first), the survey within SDSS, and the technical
system that the paper describes.</p>

<h2 id="outline">Outline</h2>

<ul>
    <li><a href="science/technical_publications.php#sdss3">SDSS-III</a>
        <ul>
            <li><a href="science/technical_publications.php#sdss3summary">General Summary</a></li>
            <li><a href="science/technical_publications.php#apogee">APOGEE</a></li>
            <li><a href="science/technical_publications.php#boss">BOSS</a></li>
            <li><a href="science/technical_publications.php#marvels">MARVELS</a></li>
            <li><a href="science/technical_publications.php#segue2">SEGUE-2</a></li>
        </ul>
    </li>
    <li><a href="science/technical_publications.php#sdss2">SDSS-II</a>
        <ul>
            <li><a href="science/technical_publications.php#segue1">SEGUE-1</a></li>
            <li><a href="science/technical_publications.php#sne">Supernova Survey</a></li>
        </ul>
    </li>
    <li><a href="science/technical_publications.php#sdss1">SDSS-I</a>
        <ul>
            <li><a href="science/technical_publications.php#sdss1summary">General Summary</a></li>
            <li><a href="science/technical_publications.php#telescope">Telescope</a></li>
            <li><a href="science/technical_publications.php#imaging">Imaging</a></li>
            <li><a href="science/technical_publications.php#target">Target Selection</a></li>
            <li><a href="science/technical_publications.php#spectro">Spectrograph</a></li>
        </ul>
    </li>
</ul>

<h2 id="sdss3">SDSS-III</h2>

<h3 id="sdss3summary">General Summary</h3>

<?php
include './bib.php';
$bibtex = new BibTeX('2011AJ....142...72E');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h3 id="apogee">APOGEE</h3>

<p>
APOGEE (Apache Point Observatory Galactic Evolution Experiment)
is one of the four surveys that make up SDSS-III. Its goal is to survey the entire
Galaxy from the central bulge, throughout the disk and into the halo
using a high-resolution, near-infrared spectrograpgh.  Spectra of more than
100,000 stars will be a powerful source of data for understanding the
chemical and kinematical evolution of our home galaxy.
APOGEE has been taking data since Spring 2011.  Data Release 10 will contain
data from the first full year of operations, including commissioning.
</p>

<h4>Survey</h4>

<p>The following technical papers describe aspects of the APOGEE survey, target selection
and operations.</p>

<p class="ref">S. R.  Majewski <em>et al.</em>,
<q>The Apache Point Observatory Galactic Evolution Experiment (APOGEE),</q>
<em>Astronomical Journal</em>, <i>in preparation</i>.</p>

<?php
$bibtex = new BibTeX('2013AJ....146...81Z');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<!--
<p class="ref">G. Zasowski <em>et al.</em>,
<q>Target Selection for the  Apache Point Observatory Galactic Evolution Experiment (APOGEE),</q>
<em>Astronomical Journal</em>, <i>in preparation</i>.</p>
-->

<h4>Data Reduction and Calibration</h4>

<p>The following technical papers describe aspects of the APOGEE survey, target selection
and operations.</p>

<p class="ref">D. L. Nidever <em>et al.</em>,
<q>Data Reduction for the Apache Point Observatory Galactic Evolution Experiment (APOGEE),</q>
<em>Astronomical Journal</em>, <i>in preparation</i>.</p>

<p class="ref">A. E. García Pérez <em>et al.</em>,
<q>The APOGEE Stellar Parameters and Chemical Abundances Pipeline (ASPCAP),</q>
<em>Astronomical Journal</em>, <i>in preparation</i>.</p>

<?php
$bibtex = new BibTeX('2012AJ....144..120M');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<p class="ref">M. Shetrone <em>et al.</em>,
<q>Spectral Linelist Used for the APOGEE Parameters and Chemical Abundances Pipeline (ASPCAP),</q>
<em>Astronomical Journal</em>, <i>in preparation</i>.</p>

<?php
$bibtex = new BibTeX('2013ApJ...765...16S');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<?php
$bibtex = new BibTeX('2013AJ....146..133M');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<!--
<p class="ref">S. Mészáros <em>et al.</em>,
<q>Calibration of the APOGEE Parameters and Chemical Abundances Pipeline (ASPCAP) Using Star Clusters,</q>
<em>Astronomical Journal</em>, <i>in preparation</i>.</p>
-->

<h4>Spectrograph</h4>

<p>The following technical papers describe aspects of the APOGEE instrument system.</p>

<p class="ref">J. C. Wilson <em>et al.</em>,
<q>The Apache Point Observatory Galactic Evolution Experiment (APOGEE) high-resolution near-infrared multi-object fiber spectrograph,</q>
<em>Astronomical Journal</em>, <i>in preparation</i>.</p>

<?php
$bibtex = new BibTeX('2012SPIE.8446E..0HW');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<?php
$bibtex = new BibTeX('2010SPIE.7735E..46W');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<?php
$bibtex = new BibTeX('2010SPIE.7739E..32A');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<?php
$bibtex = new BibTeX('2010SPIE.7735E.206B');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<?php
$bibtex = new BibTeX('2010SPIE.7735E.207B');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h3 id="boss">BOSS</h3>

<h4>BOSS Summary</h4>

<?php
$bibtex = new BibTeX('2013AJ....145...10D');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>


<h3 id="marvels">MARVELS</h3>

<h3 id="segue2">SEGUE-2</h3>

<h2 id="sdss2">SDSS-II</h2>

<h3 id="segue1">SEGUE-1</h3>

<h4>Introduction</h4>

<p>
  SEGUE (Sloan Extension for Galactic Understanding and Exploration)
  collected images and spectra of stars in the Milky Way to create a detailed three-dimensional map
  of our Galaxy. SEGUE obtained images of 3,200 square degrees of sky and spectra of 240,000 stars in the galactic
  disk and spheroid. Analysis of the spectra revealed the age, composition and phase space distribution of
  stars within the various Galactic components. More information can be found on the
  <a href="http://www.sdss.org/segue/index.html">SEGUE web site</a>.
</p>

<p>
  The complete SEGUE dataset was part of the SDSS's <a href="http://www.sdss.org/dr7/">Data Release 7</a>, and
  additional images and spectra taken as part of the SDSS-III's SEGUE-2 extension are available as a part
  of <a href="dr8/">Data Release 8</a>.
</p>

<p>For technical details of the SEGUE survey, see the technical papers below.</p>

<h4>Stellar Pipeline I: Overview</h4>

<?php
$bibtex = new BibTeX('2008AJ....136.2022L');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h4>Stellar Pipeline II: Validation with Star Clusters</h4>

<?php
$bibtex = new BibTeX('2008AJ....136.2050L');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h4>Stellar Pipeline III: High-Resolution Spectroscopy of Field Stars</h4>

<?php
$bibtex = new BibTeX('2008AJ....136.2070A');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>


<h3 id="sne">Supernova Survey</h3>

<h4>Introduction</h4>

<p>
  The SDSS Supernova Survey was one of three components of SDSS-II, an extension of the original SDSS. The
  Supernova Survey was a time-domain survey, involving repeat imaging of the same region of sky every other night,
  weather permitting. The primary scientific motivation was to detect and measure light curves for several hundred
  supernovae, to help constrain cosmological models in a redshift range where more data were needed.
</p>

<p>
  The Supernova Survey repeatedly imaged the SDSS Southern Equatorial trip (Stripe 82), an area of sky 2.5&deg; wide
  by 120&deg; long (-1.25 &le; Dec &le; 1.25, 310 &lt; RA &lt; 60). Every night, weather permitting, for
  three months in each of three years (Sept/Oct/Nov 2005-2007), the SDSS camera imaged that area. All these
  images are publicly available as FITS files from the SDSS <a href="http://das.sdss.org">Data Archive Server</a>,
  and catalogs derived from the images are available from the <a href="http://cas.sdss.org/stripe82/">Stripe 82
  Catalog Archive Server</a>. The <a href="http://sdssdp62.fnal.gov/sdsssn/SNANA-PUBLIC/">SNANA
  supernova analysis package</a> used by the team is publicly available on the SDSS Supernova Survey website.
</p>

<p>
  Over the course of the three years, the SDSS Supernova Survey discovered and measured multi-band
  lightcurves for about 500 spectroscopically confirmed Type Ia supernovae in the redshift range z = 0.05-0.4.
  Additional light curves are available for a few hundred more Type Ia supernovae that could not be
  spectroscopically confirmed as supernovae, but for which host galaxy redshifts are known. The survey also
  discovered about 80 spectroscopically confirmed core-collapse supernovae (supernova types Ib/c and II).
</p>

<p>For technical details of the SDSS supernova survey, see the technical papers below.</p>


<h4>Technical Summary</h4>

<?php
$bibtex = new BibTeX('2008AJ....135..338F');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h4>Selection of Candidates</h4>

<?php
$bibtex = new BibTeX('2008AJ....135..348S');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h2 id="sdss1">SDSS-I</h2>

<h3 id="sdss1summary">General Summary</h3>

<?php
$bibtex = new BibTeX('2000AJ....120.1579Y');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h3 id="telescope">Telescope</h3>

<?php
$bibtex = new BibTeX('2006AJ....131.2332G');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h3 id="imaging">Imaging</h3>

<h4>Camera</h4>

<?php
$bibtex = new BibTeX('1998AJ....116.3040G');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h4>Filter Definitions</h4>

<?php
$bibtex = new BibTeX('1996AJ....111.1748F');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h4>Photometric Monitoring System</h4>

<?php
$bibtex = new BibTeX('2001AJ....122.2129H');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h4>Photometric Quality Assessment</h4>

<?php
$bibtex = new BibTeX('2004AN....325..583I');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h4>Photometric System</h4>

<?php
$bibtex = new BibTeX('2002AJ....123.2121S');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h4>Monitor Telescope Pipeline</h4>

<?php
$bibtex = new BibTeX('2006AN....327..821T');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h4>Ubercalibration</h4>

<?php
$bibtex = new BibTeX('2008ApJ...674.1217P');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h4>Astrometry</h4>

<?php
$bibtex = new BibTeX('2003AJ....125.1559P');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h4>Magnitude System</h4>

<p>If you are studying any objects near the magnitude limit of the survey, you should
mention that SDSS uses asinh magnitudes, and reference the paper defining this
magnitude system:</p>
<?php
$bibtex = new BibTeX('1999AJ....118.1406L');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h3 id="target">Target Selection</h3>

<p>If you are dealing with the quasar or galaxy samples, you should reference the corresponding target selection
papers from the list below.</p>

<h4>Main Galaxy Sample</h4>

<?php
$bibtex = new BibTeX('2002AJ....124.1810S');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h4>Luminous Red Galaxy (LRG) Sample</h4>

<?php
$bibtex = new BibTeX('2001AJ....122.2267E');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h4>Quasar Sample</h4>

<?php
$bibtex = new BibTeX('2002AJ....123.2945R');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<h4>Tiling</h4>


<p>If the tiling procedure is at all important to your analysis, you should also reference the tiling paper.</p>
<?php
$bibtex = new BibTeX('2003AJ....125.2276B');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>


<h3 id="spectro">Spectrograph</h3>

<h4>Spectrograph Hardware</h4>

<p class="ref">S. A. Smee, J. E. Gunn, A. Uomoto <em>et al.</em>,
<q>The Multi-Object, Fiber-Fed Spectrographs for SDSS and the Baryon Oscillation Spectroscopic Survey,</q>
<em>Astronomical Journal</em> (2013) accepted; <a href="http://arxiv.org/abs/1208.2233">arXiv:1208.2233</a>.</p>

<h4>Spectral Classifications</h4>

<?php
$bibtex = new BibTeX('2012AJ....144..144B');
echo '<p class="ref">'.$bibtex->longformat().'</p>'.PHP_EOL;
?>

<?php echo foot(); ?>
