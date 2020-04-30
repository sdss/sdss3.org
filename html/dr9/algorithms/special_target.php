<?php include '../../header.php'; echo head('Special Target Selection'); ?>

<h2>Introduction</h2>

<p>This page provides short summaries of the various target selection
algorithms used for special plates.</p>

<p>During SDSS-I and SDSS-II a number of "special" plates were
designed and observed, which were not part of the Legacy or SEGUE-1
surveys. These plates are designated with a special set of program
names (<a href="dr9/help/glossary.php#programname">programname</a> in the
plateX table in CAS or in the plates-dr8.fits file on SAS). In DR8 we
have identified each target with a resulting spectrum using the <a
href="dr9/algorithms/bitmask_special_target1.php">SPECIAL_TARGET1</a>
target bitmask (in the specObjAll table in CAS or in the
specObj-dr8.fits file on SAS). Here we list the types of programs and
special targets, with a short description of their goals and
methods.</p>

<h2>Special programs</h2>

<p>The table below lists the various special programs, as well as the
SPECIAL_TARGET1 flags set within each one.  Note that some of the
targets on each plate are "filler", sometimes using the standard
Legacy target algorithms.  In those cases, target bits in PRIMTARGET
may be set; however there is no guarantee in those cases regarding the
particular versions of target selection used or basis target set. When
SPECIAL_FILLER is set, this means that the normal non-tiled targets
from the legacy were included from SDSS imaging.</p>

<table class="common">
<tr>
<th><a href="dr9/help/glossary.php#programname">Program Name</a></th>
<th>Description</th>
<th><a href="dr9/algorithms/bitmask_special_target1.php">Bit names</a></th>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#apbias">apbias</a></td>
<td>Galaxy aperture bias test plates</td>
<td>APBIAS</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#commissioning">commissioning</a></td>
<td>Commissioning observations of stellar locus</td>
<td>COMMISSIONING_STAR</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#disk">disk</a></td>
<td>Thick and thin disk stars</td>
<td>DISKSTAR</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#fstars">fstars</a></td>
<td>F star targets</td>
<td>FSTAR</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#hyades">hyades</a></td>
<td>Multi-pointing plate in Hyades</td>
<td>HYADES_MSTAR</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#lowz">lowz</a></td>
<td>Local galaxy clusters (Annis)</td>
<td>LOWZ_ANNIS</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#lowz_loveday">lowz_loveday</a></td>
<td>Photometric redshift test plate (Loveday)</td>
<td>LOWZ_LOVEDAY</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#lowz_lrg">lowz_lrg</a></td>
<td>Merged low-redshift galaxies and deep LRGs</td>
<td>LOWZ_GALAXY, DEEP_GALAXY_RED, DEEP_GALAXY_RED_II, BCG</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#m31_fstars">m31_fstars</a></td>
<td>F-stars near M31</td>
<td>FSTAR, QSO_M31</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#msturnoff">msturnoff</a></td>
<td>Main sequence turn-off</td>
<td>MSTURNOFF</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#orion">orion</a></td>
<td>Low-mass stars in Orion (McGehee)</td>
<td>ORION_BD, ORION_MSTAR_EARLY, ORION_MSTAR_LATE, SPECIAL_FILLER</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#perseus">perseus</a></td>
<td>Galaxies (and some stars) in Perseus-Pisces Cluster</td>
<td>FSTAR, PERSEUS</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#photoz">photoz</a></td>
<td>Photometric redshift test plate (Szalay)</td>
<td>PHOTOZ_GALAXY, SPECIAL_FILLER</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#preboss">preboss</a></td>
<td>Test plate in preparation for BOSS LRGs and QSOs</td>
<td>PREBOSS_QSO, PREBOSS_LRG</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#premarvels_preselection">premarvels_preselection</a></td>
<td>Test pre-selection plate for MARVELS</td>
<td>PREMARVELS</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#reddening">reddening</a></td>
<td>Taurus and Orion reddening plates</td>
<td>TAURUS_STAR, TAURUS_GALAXY</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#southern">southern</a></td>
<td>Merged southern Equatorial stripe targets</td>
<td>
<table class="noborder">
<tr>
<td><a href="dr9/algorithms/special_target.php#completelegacy">Complete Legacy</a></td>
<td>SOUTHERN_COMPLETE</td>
</tr>
<tr>
<td><a href="dr9/algorithms/special_target.php#doublelobed">Double-lobed radio
sources</a></td>
<td>BENT_RADIO, STRAIGHT_RADIO</td>
</tr>
<tr>
<td><a href="dr9/algorithms/special_target.php#extended">Extended Legacy</a></td>
<td>SOUTHERN_EXTENDED</td>
</tr>
<tr>
<td><a href="dr9/algorithms/special_target.php#faintlrg">Faint LRGs</a></td>
<td>FAINT_LRG</td>
</tr>
<tr>
<td><a href="dr9/algorithms/special_target.php#faintqso">Faint quasars</a></td>
<td>FAINT_QSO</td>
</tr>
<tr>
<td><a href="dr9/algorithms/special_target.php#highpm">High proper-motion stars</a></td>
<td>HIPM</td>
</tr>
<tr>
<td><a href="dr9/algorithms/special_target.php#everything">Spectro-of-everything</a></td>
<td>ALLPSF, ALLPSF_NONSTELLAR, ALLPSF_STELLAR</td>
</tr>
<tr>
<td><a href="dr9/algorithms/special_target.php#uband"><var>u</var>-band survey</a></td>
<td>U_PRIORITY, U_EXTRA, U_EXTRA2</td>
</tr>
<tr>
<td><a href="dr9/algorithms/special_target.php#variable">Variable sources</a></td>
<td>VARIABLE_HIPRI, VARIABLE_LOPRI</td>
</tr>
</table>
</td>
</tr>

<tr>
<td><a href="dr9/algorithms/special_target.php#taurus">taurus</a></td>
<td>Low mass stars in Taurus</td>
<td>TAURUS_STAR</td>
</tr>

</table>

<h2>Program Descriptions</h2>

<h3 id="apbias">apbias</h3>

<p>The aperture bias plates targeted normal Legacy-type targets
(marked APBIAS). The
exact target algorithms used are stored in the PRIMTARGET and
SECTARGET plates. However, these plates are not part of the normal
Legacy survey and cannot be used for statistical analysis.</p>

<p> The plates were observed using multiple slightly-offset pointings
in the different exposures, in an attempt to study the effects of
fiber aperture bias.  The resulting spectra were combined together in
the reductions.  For this reason, the resulting spectra are not
calibratable and we have marked all these plates as "bad." However,
redshifts are successfully recovered for a number of the objects on
these plates.</p>

<h3 id="commissioning">commissioning</h3>

<p>The commissioning plates were early plates targeting the stellar
locus. Point sources on the stellar locus were selected from the
photometry (marked COMMISSIONING_STAR). In particular,
grids of width 0.04 magnitude in the (<var>u-g</var>),(<var>r-i</var>)
and (<var>r-i</var>),(<var>i-z</var>) color planes were set down, and
where they existed, a single star was selected in each grid.  The
process was iterated until about 600 targets on each plate had been
assigned. These plates are not part of
any broader stellar survey, and cannot be used for statistical
analysis.</p>

<h3 id="disk">disk</h3>

<p>The disk plates targeted stars in the thin and thick disk of our
Galaxy, to study kinematics. We targeted a complete sample of bright,
red stars in fifteen plates using three adjacent
pointings.  It provides an in situ sample of thin and thick disk stars
with radial velocities, proper motions, and spectroscopic metallicity
determinations, densely sampling a single line of sight out to 2 kpc
above the Galactic plane.</p>

<p> The plates are near (<var>l</var> = 123°, <var>b</var> = -63°),
target point sources, and the color and flux cuts are:
<var>i</var> &lt; 18.26, <var>i-z</var> &gt; 0.2 (marked DISKSTAR)</p>

<h3 id="fstars">fstars</h3>

<p>F stars are numerous in the Galaxy, have sharp spectral features
allowing accurate radial velocities to be measured, are approximate
standard candles if the stars are on the main sequence, and are of
high enough luminosity that they can be seen to great distances.  This
program aims to use F star radial velocities to understand the
kinematics of the outer parts of the Milky Way.  This program was in
the Southern Galactic Cap Equatorial Stripe, but there are similar
targets in other programs in <a
href="dr9/algorithms/special_target.php#m31_fstars">the vicinity of
M31</a>, and the <a href="dr9/algorithms/special_target.php#perseus">Perseus
cluster</a>.</p>


<p>This program selected point sources with -0.3 &lt; <var>(g-r)</var>
&lt; 0.3 and 19.0 &lt; <var>g</var> &lt; 20.5 (marked FSTAR).</p>

<h3 id="hyades">hyades</h3>

<p>This plate targeted M-stars in the Hyades cluster (marked
HYADES_MSTAR). Most fibers on the plate are extremely low
signal-to-noise, but there are ten high signal-to-noise spectra of
M-star targets. Note that their spectra are somewhat contaminated by
emission lines from their cluster environment. </p>

<h3 id="lowz">lowz</h3>

<p>This program is part of a group of programs that selected samples
of low-redshift galaxies deeper than the Legacy Main sample, based on
photometric redshifts.</p>

<p>Extended sources were selected to satisfy the following cuts
<var>i</var><sub>Petro</sub> &le; 20, <var>i</var><sub>Petro</sub> +
(<var>r-i</var>)<sub>model</sub> &ge; 17.75, and photometric redshift
<var>z</var><sub>p</sub> &le; 0.17-0.19, where the last condition was
chosen plate-by-plate to give enough targets to match the available
number of fibers. These targets are marked LOWZ_ANNIS.</p>

<h3 id="lowz_loveday">lowz_loveday</h3>

<p>This program is part of a group of programs that selected samples
of low-redshift galaxies deeper than the Legacy Main sample, based on
photometric redshifts.</p>

<p>Extended sources were selected to satisfy the following cuts: an
EDR photometric redshift from <a
href="http://adsabs.harvard.edu/cgi-bin/bib_query?bibcode=2003AJ....125..580C">Csabai
et al. (2003)</a> &gt; 0.003, <var>r</var><sub>Petro</sub> &lt; 20,
and estimated M<sub><var>r</var></sub> &gt; -18. These targets are
marked LOWZ_LOVEDAY.</p>

<h3 id="lowz_lrg">lowz_lrg</h3>

<p>This program carried out a survey of low-redshift galaxies to 2
magnitudes fainter than the SDSS main sample limit in order to add
more low-luminosity galaxies to the sample.  It also included a deeper
sample of LRGs and Brightest Cluster Galaxies. The exposures here were
taken much deeper than ordinary SDSS exposures.</p>

<p> For the low-redshift galaxies, we used photometric redshifts
derived from second-order polynomial fits to observed Petrosian
<var>r</var> magnitudes and model colors, with separate fits done in
bins of model <var>g-r</var> color.  For Chunks 45, 52, and 62, we
used the SDSS EDR photometry and spectroscopy then available to derive
photometric redshifts, while for Chunks 74 and 97, we were able to
derive improved photometric redshifts using catalog-coadded Stripe 82
SDSS photometry, combined with all available SDSS redshift data on the
Southern Equatorial Stripe as of 11 July 2003.  This included much of
the data taken for the express purpose of calibrating the photometric
redshift relation in the SDSS photometric system.</p>

<p>Galaxies were then chosen for observations based on their
photometric redshift <var>z</var><sub>p</sub> and Petrosian magnitude
<var>r</var><sub>Petro</sub>.  In particular, the aim was to target as
complete a sample as possible for 17.77 ≤ <var>r</var> &lt; 19.0
and true redshift below 0.15, and sparse samples to higher redshifts,
as well as at fainter magnitudes 19.0 ≤ <var>r</var> &lt; 19.5.
The specific target categories, in order of highest to lowest priority
for fiber assignment, are listed in the table below. As there are many
more such targets than available fibers, the available targets were
sampled sparsely.  The sparse sampling fraction values were chosen to
get reasonable distributions of objects over the target categories and
to keep approximately similar target distributions from chunk to
chunk, which resulted in somewhat different sampling fractions for
each of the five chunks in which this algorithm was used.</p>

<table class="common">
  <caption>Sparse sampling fractions</caption>
    <tr>
    <th>magnitudes</th>
    <th>redshift</th>
    <th><code>chunk45</code></th>
    <th><code>chunk52</code></th>
    <th><code>chunk62</code></th>
    <th><code>chunk74</code></th>
    <th><code>chunk97</code></th>
    </tr>
  <tr>
    <td> 17.77 ≤ r &lt; 19.0 </td><td> 0.00 ≤ <var>z</var><sub>p</sub> &lt; 0.15 </td><td> 1.0 </td><td> 0.85 </td><td> 0.7 </td><td>1.0 </td><td> 1.0</td>
  </tr><tr>
    <td>   17.77 ≤ r &lt; 19.0 </td><td> 0.15 ≤ <var>z</var><sub>p</sub> &lt; 0.20 </td><td> 0.15</td><td> 0.1275</td><td>  0.105 </td><td>0.15 </td><td> 0.3 </td>
  </tr><tr>
    <td>   17.77 ≤ r &lt; 19.0 </td><td> 0.20 ≤ <var>z</var><sub>p</sub> &lt; 0.25 </td><td> 0.15</td><td> 0.1275</td><td>  0.105 </td><td>0.15 </td><td> 0.3 </td>
  </tr><tr>
    <td>   19.0  ≤ r &lt; 19.5 </td><td> 0.00 ≤ <var>z</var><sub>p</sub> &lt; 0.15 </td><td> 0.25</td><td> 0.2</td><td>  0.15</td><td>0.25 </td><td> 0.3</td>
  </tr><tr>
    <td>   19.0  ≤ r &lt; 19.5 </td><td> 0.15 ≤ <var>z</var><sub>p</sub> &lt; 0.20 </td><td> 0.25</td><td> 0.16</td><td>  0.1 </td><td>0.25 </td><td> 0.3</td>
  </tr><tr>
    <td>   19.0  ≤ r &lt; 19.5 </td><td> 0.20 ≤ <var>z</var><sub>p</sub> &lt; 0.25 </td><td> 0.25</td><td> 0.18</td><td>  0.15</td><td>0.25 </td><td> 0.3</td>
  </tr><tr>
    <td>   17.77 ≤ r &lt; 19.0 </td><td> 0.25 ≤ <var>z</var><sub>p</sub> </td><td> 0.015</td><td> 0.015</td><td>  0.015</td><td>0.17 </td><td> 0.3</td>
  </tr><tr>
    <td>   17.77 ≤ r &lt; 19.0 </td><td> <var>z</var><sub>p</sub> &lt; 0.0  </td><td> 0.65</td><td> 0.65</td><td>  0.65 </td><td>0 </td><td> 0</td>
  </tr><tr>
    <td>   19.0  ≤ r &lt; 19.5 </td><td> 0.25 ≤ <var>z</var><sub>p</sub> </td><td> 0.005</td><td> 0.005</td><td>  0.005</td><td>0.15 </td><td> 0.3</td>
  </tr><tr>
    <td>   19.0  ≤ r &lt; 19.5 </td><td> <var>z</var><sub>p</sub> &lt; 0.00 </td><td> 1.0 </td><td> 1.0</td><td>  1.0 </td><td>0 </td><td> 0</td>
  </tr>
</table>

<p>A caveat to note is that <code>chunk45</code> used the star/galaxy
separation criteria of the SDSS photometric pipeline to select
galaxies, and this resulted in noticeable contamination of stars in
several of the <code>chunk45</code> plates located at lower galactic latitudes.
The other chunks used the star/galaxy cut employed by the SDSS main
sample target selection algorithm (<var>r</var><sub>PSF</sub> -
<var>r</var><sub>model</sub> ≥ 0.3 or 0.24, depending on the version
of the photometric pipeline), which is more conservative for selecting
galaxies.</p>

<p>In these same plates, we targeted LRGs with <var>z</var> &gt; 0.25
which satisfied the Cut I criteria.  These spectra serve two purposes:
first, to obtain higher signal-to-noise ratio velocity dispersion
measurements; and second, to better constrain the spectra of galaxies
around the discontinuity in the targeting algorithm at <var>z</var> ≅
0.4 (the distinction between Cut I and Cut II; see <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2001AJ....122.2267E">Eisenstein
et al. 2001</a>). In detail, in these plates some Cut II galaxies were
also included (except in <code>chunk97</code>).  The Cut I galaxies
targeted for deep observations are marked DEEP_GALAXY_RED; the Cut II
galaxies targeted for deep observations are marked DEEP_GALAXY_RED and
DEEP_GALAXY_RED_II.</p>

<p>Finally, in <code>chunk74</code> and <code>chunk97</code>, these
plates also targeted brightest galaxies in clusters.  While LRGs are
often the brightest galaxies in their clusters, they need not be.  The
MaxBCG method described by <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2003ApJS..148..243B">Bahcall
et al. (2003)</a> searches for galaxies with the apparent magnitudes
and colors of LRGs, together with a red sequence of fainter
ellipticals in the vicinity (cf., <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2000AJ....120.2148G">Gladders
&amp; Yee 2000</a>).  The BCG program targeted BCG candidates found
with this method, with estimated redshifts in the range 0.4 &lt;
<var>z</var> &lt; 0.7.  The MaxBCG algorithm was run on photometry
derived from co-adding the detections (at the catalog level) of
multiple scans of the Southern Equatorial Stripe. Such targets are
marked BCG.</p>

<h3 id="m31_fstars">m31_fstars</h3>

<p>Near the direction of M31 we targeted F-stars and low-redshift
quasars. Low-redshift quasars were targeted on the M31 imaging data
using the standard quasar selection algorithm (<a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2002AJ....123.2945R">Richards
et al. 2002</a>), but excluding the high-redshift candidates selected
from the <var>griz</var> cube (marked QSO_M31).  The confirmed quasars
can be used to probe gas in the halo of M31.  The plates used for this
program also included F-star targets similar to those in the <a
href="dr9/algorithms/special_target.php#fstars">fstars</a> program (marked FSTAR).  </p>

<p>The M31 (e.g., <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2004ApJ...612L.117Z">Zucker
et al.  2004a</a> and <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2004ApJ...612L.121Z">Zucker
et al.  2004b</a>) imaging data are available in DR8.</p>

<h3 id="msturnoff">msturnoff</h3>

<p>The main-sequence turnoff program was designed to study the
kinematics and metallicities of high-latitude thick disk and halo
stars.  One of the plates overlaps with the area of the <a
href="dr9/algorithms/special_target.php#disk">disk</a>
program described below and uses the extra color cut
<var>i-z</var>&gt;0.2 to avoid overlap with that program.  </p>

<p>One set of spectra is near (l,b) = (64°,-45°), and imposes the
conditions that
<var>r</var> &lt; 19.15 and
  <var>g-r</var> &lt; 0.8.  The other set is near
    (l,b) = (114°,-62°) and imposes the additional condition that
<var>i-z</var> &gt; 0.2. In both cases, they targets are marked
MSTURNOFF. </p>

<h3 id="orion">Orion</h3>

<p>This program targeted low mass stars in Orion, selected by
Peregrine McGehee. There were three classes of low-mass starts
selected for, M1 to M3 (marked ORION_EARLY), greater than M3 (marked
ORION_LATE) and candidate brown dwarfs (marked ORION_BD). </p>

<p>Early M stars needed to satisfy the cuts <var>i</var> &lt; 19.5,
<var>r-i</var> &gt; 1, and <var>i-z</var> &gt; 0.6. </p>

<p>Late M stars needed to satisfy the cuts <var>i</var> &lt; 19.5,
<var>r-i</var> &gt; 1.2, <var>i-z</var> &gt; 1.2 (and anything
classified as late M-star was not classified as an early M star).</p>

<p>Candidate brown dwarfs needed to satisfy the cuts <var>i</var> &lt;
19.0, <var>r-i</var> &gt; 1.8, <var>i-z</var> &gt; 1.8 (and anything
classified as a candidate brown dwarf was not classified as an M
star).</p>

<p>Additionally, standard targets were chosen here (marked
SPECIAL_FILLER, with detailed target selection flags in
PRIMTARGET).</p>

<h3 id="perseus">perseus</h3>

<p>This program targeted galaxies and F-stars around the
Perseus-Pisces cluster. The F-star selection was the same as that
in the <a href="dr9/algorithms/special_target.php#fstars">fstars</a>
program. </p>

<p>Imaging scans were taken centered roughly on the Perseus cluster at
<var>z</var> ≅ 0.018, and were used to target galaxies with a slightly
deeper version of the Legacy Main Sample target selection.  The double
exposure plates 1665, 1666 targeted, and obtained redshifts for,
approximately 400 galaxies as faint as <var>r</var><sub>fiber</sub> =
18.8 in a region centered on the cluster.  The majority of the
galaxies are associated with the cluster, although there are 50
objects in a background overdensity at <var>z</var> ~ 0.05 <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=1999A%26AS..139..141B">(Brunzendorf
&amp; Meusinger 1999)</a>.  </p>

<p>The Perseus-Pisces imaging scans covering this area are available
in DR8.</p>

<h3 id="photoz">photoz</h3>

<p>This program included galaxies likely to be at higher redshifts than
the Main sample for the purpose of calibrating photometric redshift
techniques.  The SDSS five-band photometry goes substantially fainter
than does the spectroscopy, allowing photometric redshifts for vastly
more objects than have spectroscopy (see, for example, <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2003AJ....125..580C">Csabai
et al. 2003</a>).  Calibrating the photometric redshift relation
requires a training sample exploring the same range of apparent
magnitudes and colors as the objects for which photometric redshifts
will eventually be derived.  The SDSS LRG sample <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2001AJ....122.2267E">(Eisenstein
et al. 2001)</a> obtains spectra for red faint (<var>r</var> &lt;
19.5) galaxies; photometric redshifts of this relatively uniform
population (<i>e.g.</i>, <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2003ApJ...585..694E">Eisenstein
et al. 2003</a>) are fairly robust (e.g., <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2005MNRAS.359..237P">Padmanabhan
et al.  2005</a>).  The photoz program aimed to create a corresponding
sample of faint blue galaxies.</p>

<p>The basic set of cuts applied were:</p>

<ul>
<li>0.40 + 0.6(<var>u-g</var>) &lt; <var>g-r</var> &lt; 1.7 - 0.1(<var>u-g</var>)</li>
<li>-0.5 &lt; <var>u-g</var> &lt; 3.0</li>
<li>0 &lt; <var>g-r</var> &lt; 1.8</li>
<li>-0.5 &lt; <var>r-i</var> &lt; 1.5</li>
<li>-1 &lt; <var>i-z</var> &lt; 1.5</li>
<li>18.0 &lt; <var>u</var>   &lt; 24.0</li>
<li>18.0 &lt; <var>g</var>   &lt; 21.5</li>
<li>17.8 &lt; <var>r</var>   &lt; 19.5</li>
<li>16.5 &lt; <var>i</var>   &lt; 20.5</li>
<li>16.0 &lt; <var>z</var>   &lt; 20.0</li>
<li>&sigma;<sub><var>u</var></sub> &lt; 0.6</li>
<li>&sigma;<sub><var>g,r,i,z</var></sub> &lt; 0.25</li>
</ul>

<p>For objects that satisfied the above cuts, the quantity
exp[<var>c</var>((<var>g-r</var>) - (0.40 +0.6(<var>u-g</var>)))] was
calculated; if it was larger than a random number chosen between zero
and one, the object was targeted for spectroscopy (marked
PHOTOZ_GALAXY).  The coefficient <var>c</var>=0.1411 was chosen to
obtain an appropriate density of targets.  Note that plates 672 and
809 have the same center, and some of the same objects were
inadvertently observed twice.</p>

<p>Additionally, standard targets were chosen here (marked
SPECIAL_FILLER, with detailed target selection flags in
PRIMTARGET).</p>

<h3 id="preboss">preboss</h3>

<p>These plates were pre-BOSS plates meant to be used in testing
throughput and target selection issues.  Roughly speaking, the
luminous red galaxy targets satisfied an early version of the LRG
target selection, using preliminary calibrations of the photometry
(marked PREBOSS_LRG).  The quasar targets were blue point sources
roughly in the color range of quasars at redshifts 2 to 3 (marked
PREBOSS_QSO). </p>

<h3 id="premarvels_preselection">premarvels_preselection</h3>

<p>These plates were pre-MARVELS plates used for stellar
pre-selection. The stars included were ones selected as suitable
candidates for potential MARVELS followup (marked PREMARVELS). A
number of these exposures were very short, due to the fact that we
targeted rather bright stars.</p>

<h3 id="reddening">reddening</h3>

<p>The reddening program observed stars (marked TAURUS_STAR) in the
Taurus and Orion regions for the purposes of testing the dust
reddening law. In addition, some galaxies in these fields were
targeted as well (marked TAURUS_GALAXY).</p>

<h3 id="southern">southern</h3>

<p>The southern program was executed on the Equatorial stripe in the
Southern Galactic Cap, or <a href="dr9/help/glossary.php#stripe82">Stripe
82</a> in SDSS parlance. It consisted of a number of different
targeting classes that in fact evolved over time, as described
here. In particular, there were three different <a
href="dr9/help/glossary.php#tile_run">chunk (or "tile run")</a> defined
over time within this program: <code>chunk22</code> in 2001,
<code>chunk48</code> in 2002, and <code>chunk73</code> in 2003. The
targeting classes and details of the targeting criteria often vary
among these chunks.</p>

<ul>

<li>
<h4 id="completelegacy">Complete Legacy target sample (SOUTHERN_COMPLETE
flag)</h4>

<p>This program is designed to create a region of the sky where the
regular target sample is close to 100 percent complete.  The legacy
target set is as complete as we can make it.  However, over most of
the survey area, the subset for which we actually obtain a spectrum is
only a bit more than 90%.  This incompleteness has several causes,
including the fact that two spectroscopic fibers cannot be placed
closer than 55′′ on a given plate, possible gaps between the plates,
fibers that fall out of their holes, and so on.  This program aimed to
observe the remaining 10% of galaxy targets in order to have a region
of sky with truly complete galaxy spectroscopic coverage.  This is
particularly important for studies of galaxy pairs, which are by
definition strongly affected by the 55′′ rule.  </p>

<p>The target selection algorithm is simple: all galaxies selected by
the algorithm described in <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2002AJ....124.1810S">(Strauss
et al. 2002)</a> in the Southern Equatorial Stripe, minus those
galaxies that actually have a successfully measured redshift in
routine targeting.</p>

<p>Many of these galaxies are included in <code>chunk22</code>, where
they comprised a filler sample. They were included as a primary target
set in <code>chunk48</code> and <code>chunk73</code>. All such targets
are flagged SOUTHERN_COMPLETE. To recover the exact reason for their
initial targeting, it is necessary to consult the original values of
the PRIMTARGET and SECTARGET flags must be used to distinguish the
two, using the target bit definitions of <a
href="dr9/algorithms/bitmask_legacy_target1.php">LEGACY_TARGET1</a>. </p>
</li>

<li>
<h4 id="doublelobed">Double-lobed radio sources (STRAIGHT_RADIO and
BENT_RADIO flags)</h4>

<p>In <code>chunk48</code> we also targeted a small number of known
double-lobed radio sources.  Quasar target selection targets
unresolved optical counterparts to FIRST radio sources, while
"serendipity" target selection (see <a
href="http://adsabs.harvard.edu/cgi-bin/bib_query?2002AJ....123..485S">the
EDR paper, Stoughton et al. 2002</a>) selects FIRST sources with
extended optical counterparts.  This works fine for compact or
core-dominated radio sources, but is less effective for double-lobed
radio sources, in which the optical counterpart is associated with a
point between the two. </p>

<p> An algorithm was developed to find these double-lobed sources,
including allowing for the more challenging case of <em>bent</em>
double sources.  In particular, pairs of FIRST sources separated by
90′′ or less without SDSS optical counterparts were identified.  Given
the distance <var>d</var> between the centers of these two sources, a
rectangle is drawn centered at the midpoint between the sources, with
dimensions 0.57<var>d</var>, 1.33<var>d</var>, with the short axis
parallel to the line connecting the two sources.  This box size was
chosen empirically to include the core of a sample of bent double
sources compiled by Elizabeth Blanton (see <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2001AJ....121.2915B">Blanton
et al. 2001</a>).  Optical counterparts with <var>r</var> &lt; 19.8
that fell into the box were selected as bent double counterparts.  A
subset of those objects, which fell into a 12 arcsec square centered
on the midpoint between the sources, were selected as straight double
counterparts.</p>

<p>The straight double-lobed sources are marked STRAIGHT_RADIO, while
the bent double-lobed sources are marked BENT_RADIO.</p>
</li>

<li>
<h4 id="extended">Extended Legacy target selection: Main, LRG, and QSO samples
(SOUTHERN_EXTENDED flag)</h4>

<p>In <code>chunk22</code>, observed in Fall 2001, we extended the
main and LRG survey target selection algorithms for some areas of
Stripe 82.  In particular, the main galaxy sample <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2002AJ....124.1810S">(Strauss
et al. 2002)</a> was modified only slightly, by removing the cut on
objects with half-light Petrosian <var>r</var> band surface brightness
μ<sub>50,<var>r</var></sub> below 24.5 mag/arcsec<sup>2</sup>.  This
adds less than one object per square degree. </p>

<p>In these plates, the LRG sample was extended to probe about 0.3 mag
fainter than for the ordinary survey selection described by <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2001AJ....122.2267E">Eisenstein
et al (2001)</a>.  In particular, the following cuts were applied,
which yielded about 40 extra objects/deg<sup>2</sup>:</p>

<ul>
<li><var>r</var> &lt; 19.5</li>
<li><var>r</var> &lt; 13.4 + c<sub>||</sub>/0.3</li>
<li>&mu;<sub>50,<var>r</var></sub> &lt; 25</li>
<li>|<var>c</var><sub>&#8869;</sub>| &lt; 0.4</li>
</ul>

<p>for Cut I, and</p>

<ul>
<li><var>r</var> &lt; 19.5</li>
<li><var>g-r</var> &gt; 1.65 - c<sub>⊥</sub></li>
<li>μ<sub>50,<var>r</var></sub> &lt; 25</li>
<li><var>r</var><sub>PSF</sub><var>-r</var><sub>model</sub> &gt; 0.3</li>
</ul>

<p>for Cut II, with</p>

<ul>
<li><var>c</var><sub>||</sub> = 0.7(<var>g-r</var>) + 1.2(<var>r-i-0.18</var>)</li>
<li><var>c</var><sub>⊥</sub> = (<var>r-i</var>) - (<var>g-r</var>)/8</li>
</ul>

<p> Finally, the quasar target selection algorithm (<a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2002AJ....123.2945R">Richards
et al. 2002</a>) was extended in the following two ways: to fainter
flux limits, and to broader color cuts.  First, for objects selected
from the <var>ugri</var> color cube, the magnitude limit was changed
from <var>i</var> = 19.1 to 19.9, while for the <var>griz</var> color
cube (where high-redshift quasars are selected), we changed the limit
from <var>i</var> = 20.2 to 20.4.</p>

<p>Second, we increased the range of colors that QSO targets could
have. As <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2002AJ....123.2945R">Richards
et al. (2002)</a> describe, there are regions outside the stellar
locus that are heavily contaminated by hot white dwarfs, M dwarf-white
dwarf pairs <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2004ApJ...615L.141S">(Smolcic
et al. 2004)</a>, and other non-quasars.  These regions are explicitly
excluded from quasar target selection in the main survey; however, in
the extension, they are allowed back in.  Similarly, there is a region
of color space where <var>z</var> ≅ 2.7 quasars intersect the stellar
locus.  In the Legacy survey, objects falling in this region are
sparse-sampled to 10% (to reduce the number of stars); in the
extension, all objects falling in the mid-z box defined in Richards et
al. (2002) are targeted.</p>

<p>All sets of targets are marked SOUTHERN_EXTENDED
(this is a case where the original values of the PRIMTARGET and
SECTARGET flags must be used to distinguish the two, using the target
bit definitions of <a
href="dr9/algorithms/bitmask_legacy_target1.php">LEGACY_TARGET1</a>. </p>
</li>

<li>
<h4 id="faintlrg">Faint LRG sample (FAINT_LRG flag)</h4>

<p>The LRG Cut II sample aims for a flux-limited sample of LRGs with
redshifts roughly between 0.40 and 0.55.  We also experimented with an
extension of this cut, going substantially fainter. Objects that
passed the following cuts were marked FAINT_LRG:</p>

<ul>
<li>17.5 &lt; <var>i</var><sub>deV</sub> &lt; 20</li>
<li><var>i</var><sub>Petro</sub> &lt; 19.1</li>
<li>0.5 &lt; <var>g-r</var>  &lt; 3.0</li>
<li>0.0 &lt; <var>r-i</var>  &lt; 2.0</li>
<li>c<sub>||</sub> [ = 0.7(<var>g-r</var>) + 1.2(<var>r-i</var>-0.18)] &gt; 1.6</li>
<li>c<sub>⊥</sub> [ = (<var>r-i</var>) - (<var>g-r</var>)/8 ] &gt; 0.5</li>
</ul>

<p>Here, <code>deV</code> refers to deVaucouleurs model magnitude,
<code>Petro</code> to Petrosian magnitude, and all colors are based on
model magnitudes (see <a href="dr9/algorithms/magnitudes.php">the
magnitudes algorithms page</a>).</p>
</li>

<li>
<h4 id="faintqso">Faint quasar sample (FAINT_QSO flag)</h4>

<p>In <code>chunk48</code> the quasar target selection was further
modified for the faint quasar targets on the southern plates.  In
particular, the following are the changes over the standard quasar
target selection algorithm described in <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2002AJ....123.2945R">Richards
et al. 2002</a>:</p>

<ul>
  <li>The magnitude limit is set to <var>i</var>= 20.1, rather than
      <var>i </var>= 19.1 for the <var>ugri</var> color cube; </li>
  <li>The magnitude limit for optical counterparts to FIRST sources is
      set to <var>i </var>= 20.65, rather than <var>i </var>=
      19.1;</li>
  <li>The standard quasar target selection algorithm requires that the
      estimated PSF magnitude errors in <var>u</var> and <var>g</var>
      both be less than 0.1 for UV excess sources
      (<var>u-g</var>&lt;0.6).  This limit is now set to 0.2. </li>
  <li>For UV excess objects with 19.1 ≤ <var>i </var> &lt; 20.1,
      we add a requirement that <var>g - r </var>&lt; 0.7 to minimize
      stellar contamination. </li>
  <li>Objects in the "mid-z box" are excluded altogether. </li>
  <li>In addition to the usual "distance from the stellar locus"
      algorithm used to target quasars, in the main sample there are
      hard color cuts used to select high-redshift quasars in the
      <var>griz</var> color cube.  These color cuts are not used in
      the Southern targeting. </li>
  <li>Finally, there were additional color cuts to reject unphysical
      objects affected by bad CCD columns; we required <var>g-r</var>&gt;-0.5,
      r-i&gt;-0.5, and <var>i-z</var>&gt;-0.6.</li>
</ul>

<p>Such targets are marked FAINT_QSO.</p>
</li>

<li>
<h4 id="highpm">High proper motion stars (HIPM flag)</h4>

<p>For <code>chunk73</code>, a sample of high proper motion stars was defined using proper
motions determined using the methods of <a href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2004AJ....127.3034M">Munn
et al. (2004)</a>, where a consistent astrometric solution was found
matching USNO-B data <a href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2003AJ....125..984M">(Monet
et al. 2003)</a> with SDSS. There were two cuts:</p>
<ol>
  <li>A simple cut of proper motion μ &gt; 100 mas/y</li>
  <li>Cuts using reduced proper motion <var>H</var><sub>r</sub>
      defined by:<br /><br />
      <var>H</var><sub>r</sub> = <var>r</var> + 5 log<sub>10</sub> μ + 5<br /><br />
      The sample was defined by:<br /><br />
      <var>g-i</var> &lt; 2      <var>H</var><sub>r</sub> &gt; 16<br />
    2 &lt; <var>g-i</var> &lt; 2.375  <var>H</var><sub>r</sub> &gt; 8 + 4 (<var>g-i</var>)<br />
2.375 &lt; <var>g-i</var>          <var>H</var><sub>r</sub> &gt; 17.5
  </li>
</ol>
<p>Stars selected in this manner are marked HIPM.</p>

</li>

<li>
<h4 id="everything">Spectra of Everything (ALL_PSF* flags)</h4>

<p> As part of an exploration of the full stellar locus, as well as a
search for unusual objects of all sorts, we carried out a survey of
all stellar objects ("Spectra of Everything"), which was used as a
filler for a series of so-called merged program plates, which included
a mixture of mostly extragalactic targets.  </p>

<p> In 2002 (<code>chunk48</code>), this included a random sampling of
all point sources with clean photometry (see the discussion of fatal
and non-fatal flags in <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2002AJ....123.2945R">Richards
et al. 2002</a>) with extinction-corrected <var>i</var>-band PSF
magnitudes brighter than 19.1.  Not surprisingly, the vast majority of
the targets were chosen from the densest core of the stellar locus in
color-color space. These target were flagged <code>ALLPSF</code></p>

<p>In 2003 (<code>chunk73</code>), in an attempt to put greater weight
on the wings of the stellar locus, we revised the selection algorithm
slightly.  We defined a distance from the ridge of the stellar locus,
by asking for the median and standard deviation <var>u-g</var>,
<var>g-r</var>, and <var>i-z</var> of stars in narrow bins of
<var>r-i</var>.  Having tabulated these, we calculated a crude
χ<sup>2</sup>-like quantity:</p>

<p>L = 1/3 &Sigma;<sub>u-g,g-r,i-z</sub> ((color-median color)/(standard deviation))<sup>2</sup></p>

<p>75% of all stars had <var>L</var> &lt; 1.  We gave all stars with
<var>L</var> &gt; 1 highest priority (and marked them
ALLPSF_NONSTELLAR), and for <var>L</var> &lt; 1, the priority
decreased smoothly with <var>L</var> (and they were marked
ALLPSF_STELLAR).</p>

<p>These spectra were used for a determination of the completeness of
the quasar target selection algorithm <a
href="http://adsabs.harvard.edu/cgi-bin/bib_query?bibcode=2005AJ....129.2047V">(Vanden
Berk et al. 2005)</a>.  The overwhelming majority of these objects are
confirmed to be stars; only 10 of the 19,543 of the Spectra of
Everything targets analyzed in that paper are quasars not previously
targeted as such.</p>
</li>


<li>
<h4 id="uband"><var>u</var>-band galaxies (U_PRIORITY, U_EXTRA,
U_EXTRA2 flags)</h4>

<p>This program is designed to create a deeper <var>u</var>-band
flux-limited sample of galaxies than is possible using the normal Main
sample.  The main galaxy target selection is carried out in the
<var>r</var> band, and is flux-limited at <var>r</var> = 17.77.  The
bluest galaxies have <var>u-r</var> ≅ 0.6, thus a magnitude-limited in
the <var>u</var> band corresponds to <var>u</var> ≅ 18.4.</p>

<p>In order to explore the <var>u</var>-band luminosity density of the
universe, and explore the recent history of star formation in the
universe, we carried out a <var>u</var>-band survey of galaxies in the
SDSS. <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2005MNRAS.358..441B">Baldry
et al. (2005)</a> describe the sample in detail and present the
resulting <var>u</var>-band luminosity function.</p>

<p>In the selection criteria below, we use a (dereddened)
"Pseudo-Petrosian" <var>u</var>-band magnitude</p>

<p><var>u</var><sub>select</sub> = <var>u</var><sub>model</sub> - <var>r</var><sub>model</sub> + <var>r</var><sub>Petro</sub>.</p>

<p>Note that the objects targeted in this program do not include
objects with spectroscopic observations already in hand.  Thus one
needs to combine objects from various programs to define a complete
sample.  See the discussion in <a
href="http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2005MNRAS.358..441B">Baldry
et al. (2005)</a> for determination of the completeness of the
resulting sample.</p>

<p>For <code>chunk48</code>, the flux limit was at <var>u</var> =
19.8; for <code>chunk73</code> we included those galaxies but at lower
priority targeted a slightly fainter set as well.  The exact cuts and
resulting bits in SPECIAL_TARGET1 are described in the table
below.</p>

<table class="common">
  <tr>
    <th>Chunks</th>
    <th><code>SPECIAL_TARGET1</code> flag</th>
    <th>Selection</th>
  </tr>
  <tr>
    <td><code>chunk48</code>, <code>chunk73</code></td>
    <td><code>U_PRIORITY</code></td>
    <td><var>u</var><sub>select</sub> &lt; 19.8<br />
    <var>g</var><sub>Petro</sub> &lt; 20.5<br />
    17.5 &lt; <var>r</var><sub>Petro</sub> &lt; 20.5<br />
    μ<sub>50,<var>r</var></sub> &lt; 24.5<br />
    <var>r</var><sub>PSF</sub><var>-r</var><sub>model</sub> &gt; 0.2</td>
  </tr>
  <tr>
    <td><code>chunk73</code></td>
    <td><code>U_EXTRA</code></td>
    <td><var>u</var><sub>select</sub> &lt; 20.3 or
    <var>u</var><sub>model</sub> &lt; 19.8 or
    <var>u</var><sub>Petro</sub> &lt; 19.5<br />
    <var>g</var><sub>Petro</sub> &lt; 19.5<br />
    17.3 &lt; <var>r</var><sub>Petro</sub> &lt; 20.7<br />
    μ<sub>50,<var>r</var></sub> &lt; 24.7<br />
    <var>r</var><sub>PSF</sub><var>-r</var><sub>model</sub> &gt; 0.15</td>
  </tr>
  <tr>
    <td><code>chunk73</code></td>
    <td><code>U_EXTRA2</code></td>
    <td><var>u</var><sub>select</sub> &lt; 20.3<br />
    <var>g</var><sub>Petro</sub> &lt; 20.5<br />
    17.5 &lt; <var>r</var><sub>Petro</sub> &lt; 20.5<br />
    μ<sub>50,<var>r</var></sub> &lt; 24.5<br />
    <var>r</var><sub>PSF</sub><var>-r</var><sub>model</sub> &gt; 0.2</td>
  </tr>
</table>
</li>



<li>
<h4 id="variable">Variable sources (VARIABLE_HIPRI and
VARIABLE_LOPRI flags)</h4>

<p>In <code>chunk73</code> we also targeted some sources selected for
variability. The Southern Equatorial Stripe was imaged many times in
the course of the SDSS, allowing the study of photometric variability.
For this targeting class (executed before the major SNe campaigns of
SDSS-II), variable sources were selected for follow-up spectroscopy
using pairs of observations of unique unsaturated point sources with
<var>i</var> &lt; 21.  We required that the changes in the
<var>g</var> and <var>r</var> bands exceeded 0.1 mag, and were at
least 3 sigma significant (using error estimates computed by the
photometric pipeline). The time difference between the two
observations varied from 56 days to 1212 days.</p>

<p>This target selection produced targets over the Southern Equatorial
stripe with a surface density of about 10 objects
deg<sup>-2</sup>. The majority of these targets have colors consistent
with <var>z</var> &lt; 2 (UV excess) quasars and RR Lyrae stars,
classifications confirmed by the spectroscopy.  </p>

<p>We prioritized targets with <var>i</var> &lt; 19.5, which we mark
with VARIABLE_HIPRI. Targets with 19.5 &le; <var>i</var> &lt; 21 we
mark with VARIABLE_LOPRI.</p>
</li>
</ul>

<h3 id="taurus">Taurus</h3>

<p>The taurus program targeted stars in Taurus program, mainly
selected to be M-dwarfs or potential brown dwarfs using similar cuts
to those in the <a
href="dr9/algorithms/special_target.php#orion">orion</a> program
(marked TAURUS_STAR).</p>


<?php echo foot(); ?>
