<?php include '../../header.php'; echo head('Accounting for Observational Biases in SEGUE'); ?>

<p>
   SEGUE selects targets from SDSS for spectroscopic observation based
   on a series of <a
   href="dr10/algorithms/segue_target_selection.php">photometric and
   proper-motion cuts</a>. For each line-of-sight, SEGUE randomly
   assigns spectroscopic fibers to photometric targets which fulfill
   the criteria of different stellar categories. Each line-of-sight,
   regardless of the number density of stars, is probed with the same
   number of spectroscopic fibers. Thus, many of the SEGUE categories
   will oversample stars in regions of low stellar density, like the
   halo.  </p>

<p> Many of the <a
href="dr10/algorithms/segue_target_selection.php">SEGUE Target
Selection</a> criteria overlap with one another. SEGUE categories
often focus on specific ranges in parameter space, such as stars with
low metallicity or small proper motions. The overlap between different
target categories can bias individual target categories in parameter space.  </p>

<p> Each SEGUE category is affected by the observational bias against
  regions of the sky with high stellar density. However, the biases
  due to target selection criteria vary for the different target
  types. Thus far, there have been a number of SEGUE
  publications that have constrained and corrected for the biases in different SEGUE categories.  <a
  href="http://adsabs.harvard.edu/abs/2012ApJ...746..149C">Cheng et
  al. 2012</a> examined the observational biases of the main sequence
  turn-off stars on low-latitude plates, and Ma et al. (in prep) are
  currently investigating the biases in the K-giant sample. Finally, <a
  href="http://adsabs.harvard.edu/abs/2011arXiv1112.2214S">Schlesinger
  et al. 2012</a> determined and corrected for the effect of
  SEGUE target selection on cool dwarf stars (G and K). A portion of this sample
  was also studied and corrected in a different way by <a
  href="http://adsabs.harvard.edu/abs/2012ApJ...753..148B">Bovy et
  al. 2012</a> and <a
  href="http://adsabs.harvard.edu/abs/2012arXiv1201.1635L">Liu &#38;
  van de Ven 2012</a>. </p>

<p>Here, we provide the complete sample of G- and K-dwarf stars in
  SEGUE (e.g., every star that meets the appropriate photometric
  criteria) and explain how to correct for the various observational
  biases in the sample using the methods of <a
  href="http://adsabs.harvard.edu/abs/2011arXiv1112.2214S">Schlesinger
  et al. 2012</a>. Although this page provides information for only
  two stellar categories, the techniques used to correct for biases
  are applicable for many other types of SEGUE stars.  </p>

<h2>The G- and K-dwarf Sample</h2>

<p>We select the G- and K-dwarf stars from DR9 using <a
href="dr10/algorithms/segue_bit_guide.php">bitmasks</a> in <a
href="http://skyserver.sdss3.org/dr10/en/help/browser/browser.aspx#&&history=description+segueTargetAll+U">segueTargetAll</a>.
Many of these targets are observed multiple times, both in SEGUE-1 and
SEGUE-2. We use a multi-part query to extract the best version of
unique SEGUE-1 G and K dwarfs (note that these categories were not
explicitly targeted by SEGUE-2). We have included the appropriate
queries <a href="dr10/algorithms/gkdwarf_query.php">here</a>. If you
are new to SEGUE, please use the available <a
href="dr10/tutorials/segue_sqlcookbook.php"> SEGUE, SQL, CASJobs
Tutorial</a>. </p>

<h2>Observational Biases in the Sample</h2>

<p> There are three main observational biases in the SEGUE G- and
    K-dwarf sample:
</p>
<ul>
<li>Color cuts select from different portions of the mass function for different metallicities</li>
<li>Different SEGUE target categories overlap with the G- and K-dwarf sample</li>
<li>Regions with high stellar density receive the same number of spectroscopic fibers as those
with low stellar density</li>
</ul>

<p>Due to the variation in the stellar sample over the
   SEGUE footprint, we must correct for these biases separately along each
   individual line-of-sight. We detail each of the observational
   biases that affect the G- and K-dwarf sample and how we correct
   for them below. </p>

<h3>Mass Function</h3> <p> The color cuts used to select the G- and
K-dwarf sample probe a different portion of the mass function over the
range of metallicities. For example, the G-dwarf color cut isolates
stars with mass near 0.7 M<sub>⊙</sub> for [Fe/H] of −1.0 and near-solar
mass stars for solar metallicity. Mass functions for the Galaxy
predict a larger number of less-massive stars; thus, the color cut of
SEGUE will result in a metallicity bias.  </p>

<p> As detailed in <a
  href="http://adsabs.harvard.edu/abs/2011arXiv1112.2214S">Schlesinger
  et al. 2012</a>, each metallicity range must be scaled as if it
  probed the same portion of the mass function to correct for this
  effect. The masses probed by the G- and K-dwarf color and
  metallicity range are typically from 0.5 to 1.0 M<sub>solar</sub> , but
  do not necessarily overlap for each metallicity bin. As this is not
  a large range in mass, the metallicity bias introduced by the color
  cuts is a small effect compared to other observational biases that
  affect the sample. There are numerous different mass functions one
  can use to make these adjustments. Different groups prefer using
  different mass functions, and we leave this correction for each
  group to do individually.  </p>

<h3>Overlapping Target Types</h3>

<p> The SEGUE G and K dwarfs are selected based on a range in
(<i>g-r</i>) and <i>r</i>. There are numerous other SEGUE target
categories that overlap this parameter space. SEGUE categories often
focus on specific ranges in parameter space, such as stars with low
metallicity or small proper motions. Targets that fulfill multiple
target- type criteria have multiple opportunities to be assigned a
spectroscopic fiber. This leads to an overabundance of other stellar
categories in the G- and K-dwarf sample. For example, the SEGUE
low-metallicity star and K-giant categories use a <i>ugr</i> selection
based around UV excess to identify targets, overlapping with the G and
K dwarf criteria in (<i>g-r</i>). These target categories will bias
the SEGUE G- and K-dwarf sample toward metal-poor stars.  </p>

<p> As described in the <a
href="dr10/algorithms/segue_bit_guide.php">Guide to SEGUE Bitmasks</a>,
every stellar target observed photometrically by SDSS is labeled with
the SEGUE categories it fulfills in segueTargetAll. Any individual
star that passes the selection criteria for more than one target type
is labeled as being a candidate for more than one SEGUE spectroscopic
category. When we select the SEGUE G- and K-dwarf sample, we extract
every star that meets the color and magnitude criteria, regardless of
whether or not it also fulfills the criteria of other categories.
Thus, we must account for the biases in metallicity space that these
overlapping categories produce.  </p>

<table class="figure" style="width:250px;">
<tr><td><a href="images/segueii/figure3.png"><img src="images/segueii/figure3_thumb.png" alt="Overlapping Target Type Example" /></a></td></tr>
<tr><td>Targets that are in multiple SEGUE categories will bias the G- and K-dwarf
sample.<br />Click on the figure for a larger view.</td></tr>
</table>

<p>The figure to the right compares the sample
of SEGUE K-dwarfs that meet only the K-dwarf criteria (left) to those
that meet the criteria of the K-dwarf <i>and</i> low-metallicity
targets (right). The solid black line shows the distribution in
dereddened <i>r</i> of all photometric stars along the SEGUE lines of
sight that meet the color and magnitude criteria of a K dwarf. On the
left hand side, we show the distribution of all photometric stars that
meet only the criteria of a K dwarf as the dotted line. We also
present the <i>r<sub>0</sub></i> distribution of all SEGUE
spectroscopic observations that meet only the criteria of a K dwarf
(grey line). In contrast, on the right hand side we show the
photometric and spectroscopic sample of stars that meet the criteria
of a K dwarf and a low-metallicity target. It has a significantly
different distribution than the K-dwarf targets alone, which will
manifest as a bias in the SEGUE K-dwarf sample.</p>

<p> For each individual star, we assign a <span class="term">target-type weight</span>. Along
each individual line-of-sight, we compare the number of stars
identified as photometric candidates for each target type and each
combination of target types (i.e., a K-dwarf and a low-metallicity
target) with the number of those candidates that have spectra. The
"target-type weight" adjusts the sample proportions such that the two
distributions match. This removes biases due to the overlapping target
types in SEGUE, be they over- or under-sampled by the spectroscopic
fibers, ensuring that the types of stars probed by SEGUE reflects that
of the underlying photometric sample.</p>

<table class="figure" style="width:250px;">
<tr><td><a href="images/segueii/figure4.png"><img src="images/segueii/figure4_thumb.png" alt="The target-type weights for G and K dwarfs." /></a></td></tr>
<tr><td>The K-dwarf sample is more contaminated by other target types than
the G-dwarf sample.<br />Click on the figure for a larger view.</td></tr>
</table>

<p>G dwarfs are allotted more SEGUE fibers than K dwarfs; as a result,
the K-dwarf sample is more contaminated by stars that meet the criteria of other
categories, resulting in larger target-type weights. </p>


<h3>Limited Spectroscopic Fibers</h3>

<p> SEGUE probes each line of sight with a limited number of fibers;
the survey cannot spectroscopically observe every target in a
field. Lower latitude pointings are closer to the plane of the Galaxy;
they have many more stars and tend to be more metal rich than high
latitude lines of sight. SEGUE assigns the same number of fibers to
each line of sight, regardless of latitude and stellar density. This
leads to a bias against low-latitude, typically metal-rich, stars in
the spectroscopic sample. </p>

<p> In addition to latitude effects, along any given line-of-sight,
there will be more faint than bright targets, as the fainter stars
probe a larger volume of space. To accurately reflect the properties
of the Milky Way, we must ensure that fainter spectroscopic targets
are weighted more heavily in the sample, as they are representative of
more stars. The spectroscopic sample must reflect the
apparent-magnitude distribution of the underlying photometry along
each line of sight.  </p>

<p>We separate the
spectroscopic and photometric sample into G and K dwarfs based on
(<i>g-r</i>) color for each individual line-of-sight. We examine the
distribution in <i>r</i> magnitude for each individual spectral type,
binning up the spectroscopic and photometric targets in 0.5 magnitude
bins from <i>r</i> of 13 to 21.5 magnitudes. We compare the number of
spectroscopic targets in each bin to the number of potential targets
in the photometric sample. The inverse of this ratio is the weight
assigned to each spectroscopic target with a measurable [Fe/H] and S/N
≥10 to recreate the parent photometric distribution. This quantity,
which we refer to as the "r-magnitude weight", accounts for the fact
that SEGUE does not have unlimited fibers.</p>

<p>Bin sizes of 0.5 mag ensure that we typically have multiple
spectroscopic targets associated with each group of photometric
stars. At the faint end of the <i>r</i> distribution, there are
typically very few spectra with S/N of 10 or higher. Similarly, once we
apply more stringent S/N criteria, there are bins at a range of
<i>r</i> with very few targets. If there are only one or two
spectroscopic targets in a bin, they will have anomalously large
r-magnitude weights because they represent many, many stars observed in
the photometry. To avoid this issue, we remove the stars in any
<i>r</i> bin with only 1 or 2 spectroscopic targets from the sample.  </p>

<p>
As K-dwarf stars are more common than G-dwarf stars, and sampled more sparsely in SEGUE,
these targets tend to have higher r-magnitude weights. Both G- and K-dwarf stars also have high
r-magnitude weights for lines-of-sight that probe lower Galactic latitudes.
</p>

<h2>Description of the Provided Sample</h2>

<p>
We have included here the sample of SEGUE G and K dwarfs, along with their associated
weights to account for SEGUE observational biases. This sample contains the best observation
for all stars that meet the criteria of a G or K dwarf from SEGUE-1. All stars with
                     valid target selection weights (e.g., not 0)
meet the following criteria:
</p>
<ul>
<li>Valid SSPP parameter estimates </li>
<li>At or above an appropriate S/N (see below)</li>
<li>Fainter than <i>r<sub>0</sub></i> of 15. This criteria ensures that the bright end of the sample is complete </li>
<li>More than two stars in their <i>r</i>-magnitude bin</li>
<li>Not flagged in the <a href="dr10/spectro/sspp_flags.php">sppParams.flags</a> as noisy or with a temperature mismatch</li>
</ul>

<p>For each star, we provide various different target-type and r-magnitude weights:
</p>
<ul>
<li>Columns 14 and 15 are the weights with a S/N limit of 10. This is the largest possible sample.</li>
<li>Columns 16 and 17 have a S/N cut at 15.</li>
<li>Columns 18 and 19 have a S/N cut at 20.</li>
<li>Columns 20 and 21 have a S/N cut at 25.</li>
<li>Columns 22 and 23 have a S/N cut at 30.</li>
<li>Columns 24 and 25 have a S/N cut at 30 and require that the star has a valid SSPP determination
of [&alpha;/Fe]. These weights are designed for use with the <a href="http://adsabs.harvard.edu/abs/2011AJ....141...90L">Lee et al. 2011</a>
[&alpha;/Fe] abundance determinations. </li>
</ul>

<p>
When adjusting a sample for observational biases, you scale it by its r-magnitude and target-type weight. For
example, a G-dwarf with a target-type weight of 1.5 and an r-magnitude weight of 20 should be counted 1.5x20=30 times
to reflect the underlying distribution of stars. Stars that don't meet the selection criteria (noisy, inappropriate flags,
no valid SSPP values, etc.) are assigned r-magnitude and target-type weights of 0 such that they will not be counted.
</p>

<ul>
<li><a href="binaries/weight_altable_gd.dat.gz">G-dwarf Table</a></li>
<li><a href="binaries/weight_altable_kd.dat.gz">K-dwarf Table</a></li>
</ul>

<?php echo foot(); ?>
