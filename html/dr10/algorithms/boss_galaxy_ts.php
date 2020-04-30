<?php include '../../header.php'; echo head('BOSS Galaxy Target Selection'); ?>

<h2>Introduction</h2>
<p>This page summarizes the two principal BOSS galaxy samples, LOWZ
and CMASS, as well as the smaller auxiliary samples, CMASS Sparse and
CMASS Commissioning. Look here to learn how these galaxies were selected and how
to select these subsamples using the target selection flag
<a href="dr10/algorithms/bitmask_boss_target1.php">BOSS_TARGET1</a>.
For more details please refer to the Galaxy Target Selection paper: Padmanabhan et al. 2012 </p>

<p>Whilst reading this page please keep in mind the following important, and occasionally subtle, points:</p>

<ul>
<li>Unless specified differently, in what follows all colors are computed using
<a href="dr10/algorithms/magnitudes.php#mag_model">model</a> magnitudes,
and magnitude cuts are applied on
<a href="dr10/algorithms/magnitudes.php#cmodel">cmodel</a> magnitudes.
All quantities are corrected for Galactic extinction following
<a href="http://adsabs.harvard.edu/abs/1998ApJ...500..525S">Schlegel, Finkbeiner &amp; Davis (1998)</a>.</li>

<li>A galaxy may be in more than one sample.</li>

<li>For chunks boss1 to boss14 the targeting photometry of a given object may
not correspond to the final photometry of the same object. This affects a tiny
percentage of targets, and may mean that the final photometry of a target falls
outside the color and flux limits. In these cases, such objects should still be
considered as valid targets - the scatter across the boundaries simply reflects
the stochastic element of targeting a sample from noisy data. To find the
original targeting photometry for any galaxy use the targetObjID in specObj
(either within CAS or within the flat files).</li>
<!-- , or use the target photometry
file supplied in the <a href="dr10/tutorials/lss_galaxy.php">LSS Galaxy Catalogue cookbook</a>.</li> -->

<li> Early data taken by BOSS (chunks boss1 and boss2) used a different
definition of the BOSS_TARGET1 flags. In particular, the GAL_CMASS and
GAL_CMASS_SPARSE bits were used for internal tests and should not be used to
select objects from these chunks. In order to select a CMASS or CMASS_SPARSE
sample of objects, one should select based on the GAL_CMASS_COMM bit and
sub-select objects that pass the final CMASS cuts (taking into account
    possible changes in photometry) or, alternatively, exclude chunks
boss1 and boss2 (~5% of the data) - more details below.</li>
</ul>

<h2>The BOSS LOWZ Galaxy Sample</h2>

<p> BOSS targets low redshift (z&nbsp;&lt;~&nbsp;0.4) galaxies using a
set of color-magnitude cuts that follow the predicted evolution of a
passively evolving stellar population with redshift. The selected
galaxies are the brightest and reddest of the low-redshift galaxy
population, and the targeting cuts are similar to those of
<a href="dr10/algorithms/legacy_target_selection.php#lrg"> SDSS-I/II Cut-I </a>
Luminous Red Galaxies (LRGs, <a href="http://adsabs.harvard.edu/abs/2001AJ....122.2267E">Eisenstein et al. 2001</a>).
The LOWZ sample extends the SDSS-I/II LRGs by selecting fainter
galaxies, thereby increasing the number density. </p>

<p>The selection cuts are as follows:</p>
<ol>
<li>|<var>c</var><sub>perp</sub>| &lt; 0.2 </li>
<li><var>r</var> &lt; 13.5 + <var>c</var><sub>par</sub>/0.3 </li>
<li>16 &lt; <var>r</var> &lt; 19.6 </li>
<li><var>r</var><sub>psf</sub> - <var>r</var><sub>cmod</sub> &gt; 0.3 </li>
</ol>

<p>where we have used the following auxiliary colors:</p>

<ul>
<li><var>c</var><sub>par</sub> = 0.7(<var>g</var> - <var>r</var>) + 1.2[(<var>r</var> - <var>i</var>) - 0.18)]</li>
<li><var>c</var><sub>perp</sub> = (<var>r</var> - <var>i</var>) - (<var>g</var> - <var>r</var>)/4.0 - 0.18</li>
</ul>

<p> and <var>r</var><sub>psf</sub> is the <a href="dr10/algorithms/magnitudes.php#mag_psf">PSF</a> magnitude. </p>

<p>Cut (1) defines the color boundaries of the sample, around a passive
stellar population; cut (2) is a sliding magnitude cut, designed to
select the brightest galaxies at each redshift; cut (3) defines the
faint and bright limits, and cut (4) performs a star-galaxy separation.</p>

<p>The LOWZ sample can be selected from the DR9 data by requiring the following:</p>

<ul>
<li>BOSS_TARGET1 &amp;&amp; 2<sup>0</sup> </li>
<li>SPECPRIMARY == 1</li>
<li>ZWARNING_NOQSO == 0</li>
</ul>

<p><span style="color:red;"><b>IMPORTANT:</b></span>
Due to a bug in the target selection, LOWZ galaxies were incorrectly
targeted during the initial stages of the survey (affecting all data
taken until June 2010). In order to select a uniformly targeted sample
of LOWZ galaxies one must therefore also require the following:
</p>

<ul>
  <li>TILEID &gt;= 10324</li>
</ul>

<h2>The BOSS CMASS Galaxy Sample</h2>

<p>BOSS targets high redshift (0.4 &lt; z &lt; 0.7) galaxies using a set of
color-magnitude cuts. The CMASS selection is similar in ethos to the
algorithms used to target <a href="dr10/algorithms/legacy_target_selection.php#lrg">SDSS-I/II Cut-II </a>
(<a href="http://adsabs.harvard.edu/abs/2001AJ....122.2267E">Eisenstein et al. 2001</a>) and
<a href="http://www.2slaq.info/"> 2SLAQ</a> LRGs
(<a href="http://adsabs.harvard.edu/abs/2006MNRAS.372..425C">Cannon et al. 2006</a>),
using (<var>g</var>-<var>r</var>) and (<var>r</var>-<var>i</var>) colors to
isolate high redshift galaxies. A crucial difference, however, is the extension
of the galaxy selection towards the blue: the color boundaries that isolate
red objects in SDSS-I/II CutII and 2SLAQ LRGs have been removed entirely.
Finally, the CMASS selection algorithm introduces a sliding cut in color
vs. magnitude specifically tuned to select the more massive objects in as
uniform way as possible as a function of redshift.</p>


<p>The selection cuts are as follows:</p>
<ol>
<li><var>d</var><sub>perp</sub> &gt; 0.55</li>
<li><var>i</var> &lt; 19.86+ 1.6(<var>d</var><sub>perp</sub> - 0.8)</li>
<li>17.5 &lt; <var>i</var> &lt; 19.9</li>
<li><var>r</var> - <var>i</var> &lt; 2</li>
<li><var>i</var><sub>fib2</sub> &lt; 21.5</li>
<li><var>i</var><sub>psf</sub> - <var>i</var><sub>mod</sub> &gt; 0.2 + 0.2(20.0 - <var>i</var><sub>mod</sub>)</li>
<li><var>z</var><sub>psf</sub> - <var>z</var><sub>mod</sub> &gt;  9.125 - 0.46 <var>z</var><sub>mod</sub></li>
</ol>

<p>Where we define the auxiliary color:</p>

<ul>
<li><var>d</var><sub>perp</sub> = (<var>r</var>-<var>i</var>) - (<var>g</var>-<var>r</var>)/8.0</li>
</ul>

<p> and <var>i</var><sub>fib2</sub> is the <a href="dr10/algorithms/magnitudes.php#mag_fiber">fiber</a> magnitude. </p>

<p>Cut (1) isolates high-redshift objects; cut (2) is a sliding magnitude
cut that selects the brightest or more massive galaxies with redshift;
cut (3) defines the faint and bright limits; cut (4) protects from some
outliers; cut (5) ensures a high redshift measurement success rate; and
cuts (6) and (7) perform a star-galaxy separation. </p>

<p>The CMASS sample can be selected from DR9 data with the following:</p>

<ul>
<li>BOSS_TARGET1 &amp;&amp; 2<sup>1</sup> </li>
<li>SPECPRIMARY == 1</li>
<li>ZWARNING_NOQSO == 0</li>
<li> (CHUNK != "boss1") &amp;&amp; (CHUNK != "boss2")</li>
</ul>

<p><span style="color:red;"><b>IMPORTANT:</b></span> The last line
removes the first two BOSS chunks. This is necessary as the meaning
of the BOSS_TARGET1 flags in these 2 chunks differs from the current
(and final) definitions. For further details please see the
<a href="dr10/spectro/caveats.php#Boss">spectro caveats page</a>.</p>

<p><span style="color:red;"><b>IMPORTANT:</b></span>
Note that for chunks up to and including boss14, the brightness cut for CMASS
targets was <var>i</var><sub>fib2</sub> &lt; 21.7. To improve the
redshift measurement success rate, Cut (5) was later revised to the current value of 21.5. Therefore, to select a uniformly
targeted sample of CMASS galaxies one must also require:
</p>

<ul>
<li><var>i</var><sub>fib2</sub> &lt; 21.5</li>
</ul>

<p>For a small number of targets in chunks boss1 to boss14 the final
photometry differs from the photometry used in
the targeting (see note at the start of this page). As such, for
around 1% of the targets the above cut will effectively
be done in the wrong photometry. Avoid this issue by
using the targetObjID in specObj to access the targeting photometry.
Note that the LSS CMASS galaxy catalogue takes all of these issues into
account, and contains a uniform sample of CMASS galaxies. </p>
<!-- or use the targeting photometry file in the
<a href="dr10/tutorials/lss_galaxy.php">LSS Galaxy Catalogue cookbook</a>.
Note that the LSS CMASS galaxy catalogue takes all of these issues into
account, and contains a uniform sample of CMASS galaxies. </p> -->

<h2>The BOSS CMASS Sparse Sample</h2>

<p>The CMASS selection is extended into fainter and bluer galaxies
(corresponding to lower stellar mass objects) via the CMASS Sparse sample.
The CMASS Sparse cuts are largely the same as the CMASS selection cuts,
with the exception of Cut (2) which instead reads:</p>

<ul>
<li> 19.86 + 1.6(<var>d</var><sub>perp</sub> - 0.8) &lt; <var>i</var> &lt; 20.14 + 1.6(<var>d</var><sub>perp</sub> - 0.8)</li>
</ul>

<p>As the name indicates, CMASS Sparse is sparsely sampled,
to yield approximately 5 objects per deg<sup>2</sup>, corresponding
to randomly selecting 1 in around 10 targets.</p>

<p>The CMASS Sparse sample can be selected from DR9 data with the following:</p>

<ul>
<li>BOSS_TARGET1 &amp;&amp; 2<sup>3</sup> </li>
<li>SPECPRIMARY == 1</li>
<li>ZWARNING_NOQSO == 0</li>
<li> (CHUNK != "boss1") &amp;&amp; (CHUNK != "boss2")</li>
</ul>

<p>The last line removes the first two BOSS chunks. This is
necessary as the meaning of the BOSS_TARGET1 flags in these
2 chunks differs from the current (and final) definitions. For
further details please see the <a href="dr10/spectro/caveats.php#Boss">spectro caveats page</a></p>

<h2>The BOSS CMASS Commissioning Sample</h2>

<p>A different, more inclusive set of cuts was used during the
commissioning stages of the survey to investigate possible CMASS
targeting strategies. This sample of galaxies is frozen - i.e.,
no more GAL_CMASS_COMM have been observed since the commissioning period. </p>

<p>The CMASS commissioning selection cuts are as follows:</p>
<ol>
<li><var>d</var><sub>perp</sub> &gt; 0.55</li>
<li><var>i</var> &lt; 20.14+ 1.6(<var>d</var><sub>perp</sub> - 0.8)</li>
<li>17.5 &lt; <var>i</var> &lt; 20.0</li>
<li><var>r</var> - <var>i</var> &lt; 2</li>
<li><var>i</var><sub>fib2</sub> &lt; 22</li>
<li><var>i</var><sub>psf</sub> - <var>i</var><sub>mod</sub> &gt; 0.2 + 0.2(20.0 - <var>i</var><sub>mod</sub>)</li>
</ol>

<p> Note that the commissioning cuts are the most inclusive set - galaxies flagged as GAL_CMASS_COMM are also flagged as GAL_CMASS and GAL_CMASS_SPARSE. </p>


<?php echo foot(); ?>
