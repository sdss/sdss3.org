<?php include '../../header.php'; echo head('DR9 Galaxy Target Selection'); ?>

<h2>Introduction</h2>

<p>This page provides short summaries of the target selection algorithms used
for the DR9 CMASS and LOWZ samples.  For the purpose of large-scale structure
catalog creation, a few time-dependent details are worth noting.  First, the photometric
catalogs used to select targets for spectroscopy changed during the early parts
of the survey. Second, the targeting algorithm run on early chunks differs.</p>

<h2>Reproducing the target catalog</h2>
<p>Different photometric reductions were used for different chunks (define "chunk"?) of
the survey.  Objects can have different photometric properties based on which
imaging scan is deemed "primary" in a given reduction.  These differences are
driven by differences in the statistical noise in different imaging runs
rather than systematic changes in the photometric pipeline.
Because we are targeting objects on the
steep end of the luminosity functions, this can result in substantial changes in
which objects in the photometric catalogs pass the target selection cuts.
For purposes of determining a completeness map of our large scale structure
catalog, it is necessary to generate a parent target catalog from the imaging
runs used when the targeting algorithm was run to select the spectroscopic
targets.  We provide this parent catalog (somewhere?).  This catalog cannot be
reproduced by simply applying our target selection algorithm to the final DR8
(or DR9?) imaging catalog (is this equal to main009?), and should be used as the basis of
any customized LSS catalogs.  We provide here a table relating the photometric
reduction version used for different chunks (not sure if this is necessary?  are
those files even going to be public?)
</p>

<p>Necessary for reproducing the target catalog, from comment on wiki:
One detail to track -- chunk 5 and chunk 6 overlap (a bug which has now been
fixed in targeting). For targets in both, we use chunk 5 photometry. </p>

<table class="common">
<tr>
<th>Imaging file</th>
<th>Photometic pipeline version</th>
<th>Chunks</th>
</tr>

<tr>
<td>main009:</td>
<td>v2_0_13</td>
<td>15-</td>
</tr>

<tr>
<td>main008:</td>
<td>v2_0_9</td>
<td>12-14</td>
</tr>

<tr>
<td>main007:</td>
<td>v2_0_5</td>
<td>7-11</td>
</tr>

<tr>
<td>main005:</td>
<td>v2_0_3</td>
<td>5-6</td>
</tr>

<tr>
<td>main002:</td>
<td>v2_0_1</td>
<td>3-4</td>
</tr>

<tr>
<td>comm2:</td>
<td>?</td>
<td>2</td>
</tr>

<tr>
<td>comm:</td>
<td>?</td>
<td>1</td>
</tr>
</table>

<h2>Changes to the target selection algorithm</h2>

<h3>LOWZ</h3>
<p>There was a bug in targeting early on, where we incorrectly applied a sliding
S/G cut to the LOZ sample. version 2_0_1 (chunk 3-4) and version 2_0_3 (chunk
5-6) have the wrong sliding S/G cut for the LOZ sample while version 2_0_5
(chunk 7-11) and later have it corrected. For this reason we restrict the DR9
LOZ sample to chunks greater than or equal to 7.  The target selection performed
by mksample exactly agrees with boss_target1 flag, except it misses one galaxy
of 532677 due to a rounding error.</p>

<p>Insert exact cuts used; they are given in the make_samples.pro code, or on the
wiki.</p>

<h3>CMASS</h3>
<p>For CMASS, we restrict the sample to galaxies that would pass every targeting
version. It is the same as the algorithm in the final version of the targeting
code, EXCEPT that the targeting code allows CMASS targets to fail the
star-galaxy separation cuts IF they pass the LOWZ cuts. Since this was
implemented later (we should say when?), we don't include those galaxies in the
DR9 CMASS sample.  There is a small disagreement remaining between boss_target1
CMASS flag and the objects in our final target flag (BR: see paragraph just
above 'How to run it (on RIEMANN)'; perhaps its rounding error, or you guys can
get to the bottom of it)</p>

<p>Insert exact cuts used; they are given in the make_samples.pro code, or on the
wiki.</p>
<?php echo foot(); ?>
