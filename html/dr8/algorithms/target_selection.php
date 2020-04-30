<?php include '../../header.php'; echo head('Legacy Survey Target Selection'); ?>

<h2>Introduction</h2>

<p>This page provides short summaries of the various target selection
algorithms used in the SDSS-I and SDSS-II Legacy Survey. These target
flags are relevant for any plate in the survey <code>sdss</code> and
program name <code>legacy</code>.</p>

<p>Note the following subtleties:</p>
                <ul>
  <li>An object can be targeted simultaneously by more than one
      algorithm (that is, have any combination of bits set).</li>
  <li>Unlike DR7 and earlier, the  photometric catalogs do not contain
    target selection flags; the target selection flags are only stored
    in the tiling and spectroscopic tables.</li>
   <li> Target selection flags for spectroscopic objects were based on
                the photometric reductions available at the time, as well as a
                particular version of the target selection software (which
                evolved somewhat during the survey: slightly for galaxies,
                dramatically for QSOs).</li>
</ul>



<p>Jump to:</p>

<ul>
<li><a href="dr8/algorithms/target_selection.php#main">Main Galaxy Sample</a></li>
<li><a href="dr8/algorithms/target_selection.php#lrg">Luminous Red Galaxies</a></li>
<li><a href="dr8/algorithms/target_selection.php#qso">Quasars</a></li>
<li><a href="dr8/algorithms/target_selection.php#stars">Stars</a></li>
<li><a href="dr8/algorithms/target_selection.php#ROSAT">ROSAT All-Sky Survey Sources</a></li>
<li><a href="dr8/algorithms/target_selection.php#serendip">Serendipity targets</a></li>
<li><a href="dr8/algorithms/target_selection.php#references">References</a></li>
</ul>

<h2 id="main">Main Galaxy Sample</h2>

<table class="figure">
<tr><td><a href="images/galts.png"><img src="images/galts.png"
alt="Legacy Main Galaxy Selection Flowchart" /></a></td></tr>
<tr><td>Main Sample target selection </td></tr>
</table>

<p>The main galaxy sample target selection algorithm is detailed in <a
href="http://adsabs.harvard.edu/abs/2002AJ....124.1810S">
Strauss et al. (2002)</a> and
is summarized in the schematic to the right.</p>

<p>
Galaxy targets are selected starting from objects which are detected
in the <var>r</var> band (i.e. those objects which are more than 5&sigma;
above sky after smoothing with a PSF filter).
The photometry is corrected for Galactic extinction using the
reddening maps of
<a href="http://adsabs.harvard.edu/abs/1998ApJ...500..525S">Schlegel, Finkbeiner &amp; Davis (1998)</a>.
Galaxies targeted from DR2 and later data are separated from stars using the following cut on the difference between the <var>r</var>-band
<a href="dr8/algorithms/magnitudes.php#mag_psf">PSF</a>
and
<a href="dr8/algorithms/magnitudes.php#cmodel">cmodel</a>
magnitudes:</p>

<p>
<var>r</var><sub>PSF</sub> - <var>r</var><sub>cmodel</sub> &gt;= 0.24
</p>

<p>Note that this cut is <b><em>more conservative</em></b> for galaxies than the
<a href="dr8/algorithms/classify.php#photo_class">star-galaxy separation</a> cut used by Photo (galaxies targeted off
DR1 data used a slightly different cut, <var>r</var><sub>PSF</sub> - <var>r</var><sub>model</sub> &gt;= 0.3).
Potential targets are then rejected if they have been flagged by Photo
as SATURATED, BRIGHT, or (BLENDED and not NODEBLEND) - see
<a href="dr8/algorithms/flags_detail.php">the descriptions of flags</a>.
The
<a href="dr8/algorithms/magnitudes.php#mag_petro">Petrosian</a>
magnitude limit <var>r</var><sub>P</sub> = 17.77 is then applied, which
results in a main galaxy sample surface density of about 90 per deg<sup>2</sup>.
</p>

<p> A number of surface brightness cuts are then applied, based on
&mu;<sub>50</sub>, the mean surface brightness within the <a
href="dr8/algorithms/classify.php#photo_sb"> Petrosian half-light
radius petroR50</a>.  The most significant cut is &mu;<sub>50</sub>
&lt;= 23.0 mag arcsec<sup>-2</sup> in <var>r</var>, which already
includes 99% of the galaxies brighter than the Petrosian magnitude
limit.  At surface brightnesses in the range 23.0 &lt;=
&mu;<sub>50</sub> &lt;= 24.5 mag arcsec<sup>-2</sup>, several other
criteria are applied in order to reject most spurious targets, as
shown in the <a href="images/galts.png">flowchart</a>.  Please see the
detailed discussion of these surface brightness cuts, including
consideration of selection effects, in
<a href="http://adsabs.harvard.edu/abs/2002AJ....124.1810S">Section 4.4 of Strauss et al. (2002)</a>.
Finally, in order to reject
very bright objects which will cause contamination of the spectra of
adjacent fibers and/or saturation of the spectroscopic CCDs, objects
are rejected if they have (1) <a
href="dr8/algorithms/magnitudes.php#mag_fiber"> fiber magnitudes</a>
brighter than 15.0 in <var>g</var> or <var>r</var>, or 14.5 in <var>i</var>;
or (2) Petrosian magnitude <var>r</var><sub>P</sub> &lt; 15.0 and Petrosian
half-light radius petroR50 &lt; 2 arcsec.</p>

<p>
Main galaxy targets satisfying all of the above criteria have the
GALAXY bit set in their primTarget flag. Among those, the ones with
&mu;<sub>50</sub> &gt;= 23.0 mag arcsec<sup>-2</sup> have the
GALAXY_BIG bit set. Galaxy targets who fail all the surface brightness
selection limits but have r band fiber magnitudes brighter than 19 are
accepted anyway (since they are likely to yield a good spectrum) and
have the GALAXY_BRIGHT_CORE bit set.</p>

<p><a href="dr8/algorithms/target_selection.php#Top">[Back to top]</a></p>

<h2 id="lrg">Luminous Red Galaxies</h2>

<h3>Primary LRG Selection</h3>

<p>SDSS luminous red galaxies (LRGs) are selected on the basis of
color and magnitude to yield a sample of luminous intrinsically red
galaxies that extends fainter and farther than the SDSS main galaxy
sample.  Please see <a
href="http://adsabs.harvard.edu/abs/2001AJ....122.2267">
Eisenstein et al. (2001)</a> for detailed discussions of sample
selection, efficiency, use, and caveats.</p>

<p>LRGs are selected using a variant of the photometric redshift technique
and are meant to comprise a uniform, approximately volume-limited sample of
objects with the reddest colors in the rest frame.  The sample is
selected via cuts in the (<var>g</var>-<var>r</var>, <var>r</var>-<var>i</var>, <var>r</var>)
color-color-magnitude cube.  Note that all colors are measured using
<a href="dr8/algorithms/magnitudes.php#mag_model">
model magnitudes</a>, and all quantities are
corrected for Galactic extinction following
<a href="http://adsabs.harvard.edu/abs/1998ApJ...500..525S">
Schlegel, Finkbeiner &amp; Davis (1998)</a>.</p>

<p>Objects must be detected by Photo as <code>BINNED1 OR BINNED2 OR BINNED4</code>
(see <a href="dr8/algorithms/flags_detail.php">flag descriptions</a>)
in both <var>r</var> and <var>i</var>, but not necessarily in <var>g</var>,
and objects flagged by Photo as <code>BRIGHT</code> or <code>SATURATED</code> in <var>g</var>, <var>r</var>,
or <var>i</var> are excluded.</p>

<p>The galaxy model colors are rotated first to a basis that is aligned with the galaxy
locus in the (<var>g</var>-<var>r</var>, <var>r</var>-<var>i</var>) plane
according to:</p>
<p>
 <var>c</var><sub>&perp;</sub> = (<var>r</var>-<var>i</var>) - (<var>g</var>-<var>r</var>)/4 - 0.18<br />
 <var>c</var><sub>||</sub> = 0.7(<var>g</var>-<var>r</var>) + 1.2[(<var>r</var>-<var>i</var>) - 0.18]
</p>

<p><strong>Please note</strong> that some earlier versions of SDSS
documentation (notably among them this page and the print version of
the EDR paper) have incorrect signs in the definition of cperp; the
above with just minus signs are now correct, as are those in the LRG
target selection paper (<a href="dr8/algorithms/target_selection.php#references">referenced
below</a>).</p>

<p>Because the 4000 &Aring; break moves from the <var>g</var> band to the <var>r</var> band
at a redshift <var>z</var> ~ 0.4, two separate sets of selection criteria are needed
to target LRGs below and above that redshift:</p>

<p>Cut I for <var>z</var> &lt;~ 0.4</p>

<ul>
<li> <var>r</var><sub>Petro</sub> &lt; 13.1 + <var>c</var><sub>||</sub> / 0.3</li>
<li> <var>r</var><sub>Petro</sub> &lt; 19.2</li>
<li> |<var>c</var><sub>&perp;</sub>| &lt; 0.2</li>
<li> &mu;<sub>50</sub> &lt; 24.2 mag arcsec<sup>-2</sup></li>
<li> <var>r</var><sub>PSF</sub> - <var>r</var><sub>model</sub> &gt; 0.3</li>
</ul>

<p>Cut II for <var>z</var> &gt;~ 0.4</p>
<ul>
<li> <var>r</var><sub>Petro</sub> &lt; 19.5</li>
<li> <var>c</var><sub>&perp;</sub> &gt; 0.45 - (<var>g</var>-<var>r</var>)/6</li>
<li> <var>g</var>-<var>r</var> &gt; 1.30 + 0.25(<var>r</var>-<var>i</var>)</li>
<li> &mu;<sub>50</sub> &lt; 24.2 mag arcsec<sup>-2</sup></li>
<li> <var>r</var><sub>PSF</sub> - <var>r</var><sub>model</sub> &gt; 0.5</li>
</ul>

<p>Cut I selection results in an approximately volume-limited LRG sample to
<var>z</var>=0.38, with additional galaxies to <var>z</var> ~ 0.45.
Cut II selection adds yet more luminous red galaxies to <var>z</var> ~ 0.55.
The two cuts together result in about 12 LRG targets per deg<sup>2</sup>
that are not already in the main galaxy sample (about 10 in Cut I, 2 in Cut II).</p>

<p>In primTarget, GALAXY_RED is set if the LRG passes either Cut I or Cut II.
GALAXY_RED_II is set if the object passes Cut II but not Cut I.
However, neither of these flags is set if the LRG is brighter than the
main galaxy sample flux limit but failed to enter the main sample
(e.g., because of the main sample surface brightness cuts).
Thus LRG target selection never overrules main sample target selection
on bright objects.</p>


<h3 id="dr2LRGchanges">Changes in LRG target selection for DR2 and later data</h3>

<p>With the change in the model magnitude code between DR1 and DR2/DR3
data (see <a href="http://www.sdss.org/dr2/start/aboutdr2.html#photo">improvements to image
processing in DR2</a>), the mean <var>g-r</var> and <var>r-i</var>
model colors of galaxies have shifted by about 0.005 magnitudes.
Because the LRG is very sensitive to color, this would have increased
the number density of targets by about 10%.  Instead, we shifted the
LRG color cuts to compensate; in addition, improved star-galaxy
separation allows tighter cuts on the <code>model-PSF</code> quantity
by which stars are rejected.  Here we give the updated equations for
Cut I applied to data reduced with the DR2/DR3 version of the photometric
pipeline (5_4; criteria not listed here are taken over unchanged from
above):</p>

<p>The definition of the new color basis changes as follows:</p>

<ul>
<li> <var>c</var><sub>&perp;</sub> = (<var>r</var>-<var>i</var>) - (<var>g</var>-<var>r</var>)/4 - 0.177</li>
<li><var>c</var><sub>||</sub> = 0.7(<var>g</var>-<var>r</var>) +  1.2[(<var>r</var>-<var>i</var>) - 0.177]</li>
</ul>

<p>Cut I for <var>z</var> &lt;~ 0.4 becomes</p>

<ul>
  <li><var>r</var><sub>Petro</sub> &lt; 13.116 + <var>c</var><sub>||</sub> / 0.3</li>
  <li><var>r</var><sub>PSF</sub> - <var>r</var><sub>model</sub> &gt;= 0.24</li>
</ul>

<p>Cut II for <var>z</var> &gt;~ 0.4 becomes</p>
<ul>
  <li><var>c</var><sub>&perp;</sub> &gt; 0.449 - (<var>g-r</var>)/6</li>
  <li><var>g-r</var> &gt; 1.296 + 0.25 (<var>r-i</var>)</li>

  <li><var>r</var><sub>PSF</sub> - <var>r</var><sub>model</sub> &gt;= 0.4</li>
</ul>

<p>This new version of LRG target selection is applied to the
<code>best</code> region of sky reduced with the latest version of the
imaging pipeline.  It is of course not applied retroactively to the
<code>target</code> version of the sky, which used older versions of
the pipeline.</p>

<p>Due to other subtle differences in the photometric pipeline and the
calibration, these changes will not exactly reproduce the selection
criteria actually used when spectroscopy was carried out.  Indeed,
defining an LRG sample based on the <code>best</code> reductions will
result in large spectroscopic incompleteness because so many objects
are close to the boundaries.  Instead, one should use the
<code>target</code> photometry and adjust the calibrations of that
relative to the <code>best</code> calibration.  Of course, if one is
interested in photometric properties of single objects, then we
recommend the <code>best</code> photometry.</p>

<p><a href="dr8/algorithms/target_selection.php#Top">[Back to top]</a></p>

<h2 id="qso">Quasars</h2>

<table class="figure">
<tr><td><a href="images/qsotargchart.gif"><img
src="images/qsotargchart.gif"
alt="Legacy Quasar Selection Flowchart" style="width:305px;"/></a></td></tr>
<tr><td>Quasar target selection </td></tr>
</table>

<p>The final adopted SDSS quasar target selection algorithm is
described in <a
href="http://adsabs.harvard.edu/abs/2002AJ....123.2945R">
Richards et al. (2002)</a>.
However, it should be noted that the
implementation of this algorithm came <strong>after</strong> the last
date of DR1 spectroscopy.  Thus this paper does not technically
describe the DR1 quasar sample and the DR1 quasar sample is
not intended to be used for statistical purposes (but see
below).  Interested parties are instead encouraged to use the catalog
of DR1 quasars that is being prepared by Schneider et al (2003, in
prep.), which will include an indication of which quasars were also
selected by the Richards et al. (2002) algorithm.  At some later time,
we will also perform an analysis of those objects selected by the new
algorithm but for which we do not currently have spectroscopy and will
produce a new sample that is suitable for statistical analysis.</p>

<p>Though the DR1 quasars were not technically selected with the
Richards et al. (2002) algorithm, the algorithms used since the EDR
are quite similar to this algorithm and this paper suffices to
describe the general considerations that were made in selecting
quasars.  Thus it is worth describing the algorithm in more detail.</p>

<p>The quasar target selection algorithms are summarized in this
schematic <a href="images/qsotargchart.gif">flowchart</a>.  Because the
quasar selection cuts are fairly numerous and detailed, the reader is
strongly recommended to refer to <a
href="http://adsabs.harvard.edu/abs/2002AJ....123.2945R">
Richards et al. (2002)</a>
for the full discussion of the sample selection criteria,
completeness, target efficiency, and caveats.</p>

<p> The quasar target selection algorithm primarily identifies quasars
as outliers from the stellar locus, modelled following <a
href="http://adsabs.harvard.edu/abs/1997ApJS..113...89N">Newberg &amp; Yanny (1997)</a> as elongated tubes in the
(<var>u</var>-<var>g</var>, <var>g</var>-<var>r</var>,
<var>r</var>-<var>i</var>) (denoted <var>ugri</var>) and
(<var>g</var>-<var>r</var>, <var>r</var>-<var>i</var>,
<var>i</var>-<var>z</var>) (denoted <var>griz</var>) color cubes.  In
addition, targets are also selected by matches to the FIRST catalog of
radio sources (<a
href="http://adsabs.harvard.edu/abs/1995ApJ...450..559B">Becker,
White, &amp; Helfand 1995</a>).  All magnitudes and colors are measured
using <a href="dr8/algorithms/magnitudes.php#mag_psf"> PSF
magnitudes</a>, and all quantities are corrected for Galactic
extinction following <a
href="http://adsabs.harvard.edu/abs/1998ApJ...500..525S">
Schlegel, Finkbeiner, &amp; Davis (1998)</a>. Objects flagged by
Photo as having either "fatal" errors (primarily those flagged BRIGHT,
SATURATED, EDGE, or BLENDED; see <a
href="dr8/algorithms/flags_detail.php">flag
descriptions</a>) or "nonfatal" errors (primarily related to
deblending or interpolation problems) are rejected from the color
selection, but only objects with fatal errors are rejected from the
FIRST radio selection.  See <a
href="http://adsabs.harvard.edu/abs/2002AJ....123.2945R">
Section 3.2 of Richards et al. (2002)</a> for the full details.  Objects are also rejected (from
the color selection, but not the radio selection) if they lie in any
of 3 color-defined exclusion regions which are dominated by white
dwarfs, A stars, and M star+white dwarf pairs; see <a
href="http://adsabs.harvard.edu/abs/2002AJ....123.2945R">
Section 3.5.1 of Richards et al. (2002)</a> for the specific exclusion
region color boundaries.  Such objects are flagged as QSO_REJECT.
Quasar targets are further restricted to objects with
<var>i</var><sub>PSF</sub> &gt; 15.0 in order to exclude bright
objects which will cause contamination of the spectra from adjacent
fibers. Objects which pass the above tests are then selected to
be quasar targets if they lie more than 4&sigma; from either the
<var>ugri</var> or <var>griz</var> stellar locus.  The detailed
specification of the stellar loci and of the outlier rejection
algorithm are provided in Appendices A and B of
<a href="http://adsabs.harvard.edu/abs/2002AJ....123.2945R">Richards et al. (2002)</a>.
These color-selected quasar targets
are divided into main (or low-redshift) and high-redshift samples, as
follows: </p>

<ul>
<li><h4>Main Quasar Sample (QSO_CAP, QSO_SKIRT)</h4>
<p>
These are outliers from the <var>ugri</var> stellar locus and are
selected in the magnitude range 15.0 &lt; <var>i</var><sub>PSF</sub>
&lt; 19.1.  Both point sources and extended objects are included,
except that extended objects must have colors that are far from the
colors of the main galaxy distribution and that are consistent with
the colors of AGNs; these additional color cuts for extended objects
are specified in <a
href="http://adsabs.harvard.edu/abs/2002AJ....123.2945R">
Section 3.4.4 of Richards et al. (2002)</a>.  Even if an object is
not a <var>ugri</var> stellar locus outlier, it may be selected as a
main quasar sample target if it lies in either of these 2 "inclusion"
regions: (1) "mid-z", used to select 2.5 &lt; <var>z</var> &lt; 3
quasars whose colors cross the stellar locus in SDSS color space; and
(2) "UVX", used to duplicate selection of <var>z</var> &lt;= 2.2
UV-excess quasars in previous surveys.  These inclusion boxes are
specified in <a
href="http://adsabs.harvard.edu/abs/2002AJ....123.2945R">
Section 3.5.2 of Richards et al. (2002)</a>.   Note that the
QSO_CAP and QSO_SKIRT distinction is kept for historical reasons (as
some data that are already public use this notation) and results from
an original intent to use separate selection criteria in regions of
low ("cap") and high ("skirt") stellar density.  It turns out that the
selection efficiency is indistinguishable in the cap and skirt
regions, so that the target selection used is in fact identical in the
2 regions (similarly for QSO_FIRST_CAP and QSO_FIRST_SKIRT, below).
</p>
</li>
<li><h4>High-Redshift Quasar Sample (QSO_HIZ)</h4>
<p>
These are outliers from the <var>griz</var> stellar locus and are selected in
the magnitude range 15.0 &lt; <var>i</var><sub>PSF</sub> &lt; 20.2.
Only point sources are selected, as these quasars will lie at
redshifts above <var>z</var>~3.5 and are expected to be classified
as stellar at SDSS resolution.  Also, to avoid contamination from
faint low-redshift quasars which are also <var>griz</var> stellar locus
outliers, blue objects are rejected according to eq. (1) in
<a href="http://adsabs.harvard.edu/abs/2002AJ....123.2945R">
Section 3.4.5 of Richards et al. (2002)</a>.
Moreover, several additional color cuts are used in order to
recover more high-redshift quasars than would be possible using only
<var>griz</var> stellar locus outliers.
So an object will be selected as a high-redshift quasar target if it
lies in any of these 3 "inclusion" regions:
(1) "<var>gri</var> high-z", for <var>z</var> &gt;= 3.6 quasars;
(2) "<var>riz</var> high-z", for <var>z</var> &gt;= 4.5 quasars; and
(3) "<var>ugr</var> red outlier", for <var>z</var> &gt;= 3.0 quasars.
The specifics are given in eqs. (6-8) in
<a href="http://adsabs.harvard.edu/abs/2002AJ....123.2945R">
Section 3.5.2 of Richards et al. (2002)</a>.
</p>
</li>
<li><h4>FIRST Sources (QSO_FIRST_CAP, QSO_FIRST_SKIRT)</h4>
<p>
Irrespective of the various color selection criteria above,
SDSS stellar objects are selected as quasar targets if they have
15.0 &lt; <var>i</var><sub>PSF</sub> &lt; 19.1 and are matched to within 2 arcsec of
a counterpart in the FIRST radio catalog.
</p>
</li>
<li><h4>Other</h4>
<p>
Finally, those targets which otherwise meet the color selection
or radio selection criteria described above, but fail the cuts
on <var>i</var><sub>PSF</sub>, will be flagged as QSO_MAG_OUTLIER
(also called QSO_FAINT).
Such objects may be of interest for follow-up studies,
but are not otherwise targeted for spectroscopy under routine
operations (unless another "good" quasar target flag is set).
</p>
</li>
</ul>

<p><a href="dr8/algorithms/target_selection.php#Top">[Back to top]</a></p>

<h2 id="other">Other Science Targets</h2>

<h3>Overview</h3>

<p>A variety of other science targets are also selected; see also <a
href="http://adsabs.harvard.edu/abs/2002AJ....123..485S">
Section 4.8.4 of Stoughton et al. (2002)</a>.  With the exception of
brown dwarfs, these samples are <b><em>not</em></b> complete, but are
assigned to excess fibers left over after the main samples of
galaxies, LRGs, and quasars have been <a
href="dr8/algorithms/tiling.php">tiled</a>.</p>

<h3 id="stars">Stars</h3>

<p>A variety of stars are also targeted using color selection criteria,
as follows:</p>
<ul>
<li> blue horizontal-branch stars (STAR_BHB)</li>
<li> both dwarf and giant carbon stars (STAR_CARBON)</li>
<li> brown dwarfs (STAR_BROWN_DWARF) - this is the only <a
    href="dr8/algorithms/tiling.php">tiled</a> sample of stars</li>
<li> low-luminosity subdwarfs (STAR_SUB_DWARF)</li>
<li> cataclysmic variables (STAR_CATY_VAR)</li>
<li> red dwarfs (STAR_RED_DWARF)</li>
<li> hot white dwarfs (STAR_WHITE_DWARF)</li>
<li> central stars of planetary nebulae (STAR_PN)</li>
</ul>

<p><a href="dr8/algorithms/target_selection.php#Top">[Back to top]</a></p>

<h3 id="ROSAT">ROSAT Sources</h3>


<p>ROSAT targeting is described in <a
href="http://adsabs.harvard.edu/abs/2003AJ....126.2209A">Anderson,
S., et al. 2003, AJ, 126, 2209</a> SDSS objects are positionally
matched against X-ray sources from the ROSAT All-Sky Survey (RASS; <a
href="http://adsabs.harvard.edu/abs/1999A%26A...349..389V">Voges
et al. 1999</a>), and SDSS objects within the RASS error circles
(commonly 10-20 arcsec) are targeted using algorithms tuned to select
likely optical counterparts to the X-ray sources.  Objects are
targeted which:</p>
<ul>
<li> are also radio sources (ROSAT_A) </li>
<li>have SDSS colors of AGNs or quasars (ROSAT_B) </li>
<li> fall in a broad, intermediate category that includes stars that are bright, moderately
blue, or both (ROSAT_C) </li>
<li> are otherwise bright enough for SDSS spectroscopy (ROSAT_D)</li>
</ul>
<p>Objects are flagged ROSAT_E if they
fall within the RASS error circle but are either too faint or too
bright for SDSS spectroscopy.</p>

<p><a href="dr8/algorithms/target_selection.php#Top">[Back to top]</a></p>
<h3 id="serendip">Serendipity</h3>


<p>This is an open category of targets whose selection
criteria may change as different regions of parameter space
are explored.  These consist of:</p>
<ul>
<li> objects lying outside the stellar locus in color space
     (SERENDIP_RED, SERENDIP_BLUE, SERENDIP_DISTANT)</li>
<li> objects coincident with FIRST sources but fainter
     than the equivalent in quasar target selection;
     also not restricted to point sources (SERENDIP_FIRST)</li>
<li> hand-selected targets (SERENDIP_MANUAL)</li>
</ul>

<p><a href="dr8/algorithms/target_selection.php#Top">[Back to top]</a></p>
<h2 id="references">Target Selection References</h2>

<ul>
<li> <a href="http://adsabs.harvard.edu/abs/2002AJ....123..485S">
     Sloan Digital Sky Survey: Early Data Release</a>, Stoughton, C., et al. 2002, AJ, 123, 485</li>

<li> <a href="http://adsabs.harvard.edu/abs/2002AJ....124.1810S">
     Spectroscopic Target Selection in the Sloan Digital Sky Survey: The Main Galaxy Sample</a>,
     Strauss, M., et al. 2002, AJ, 124, 1810</li>
<li> <a href="http://adsabs.harvard.edu/abs/2001AJ....122.2267E">
     Spectroscopic Target Selection for the Sloan Digital Sky Survey: The Luminous Red Galaxy Sample</a>,
     Eisenstein, D., et al. 2001, AJ, 122, 2267</li>
<li> <a href="http://adsabs.harvard.edu/abs/2002AJ....123.2945R">
     Spectroscopic Target Selection in the Sloan Digital Sky Survey: The Quasar Sample</a>,
     Richards, G., et al. 2002, 123, 2945</li>
<li> <a
    href="http://adsabs.harvard.edu/abs/2003AJ....126.2209A">A
    Large, Uniform Sample of X-Ray-Emitting AGNs: Selection Approach
    and an Initial Catalog from the ROSAT All-Sky and Sloan Digital
    Sky Surveys</a>, Anderson, S., et al. 2003, AJ, 126, 2209</li>

</ul>


<?php echo foot(); ?>
