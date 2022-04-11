<?php include '../../header.php'; echo head('Using APOGEE Spectra'); ?>

<p> Several different types of APOGEE spectra are available:</p>
<ul>
<li> <a href="dr10/irspec/spectral_combination.php"> Combined spectra </a> from all visits to a stars are available in
<a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/LOCATION_ID/apStar.html">apStar</a>
files.</li>
<li> Individual <a href="dr10/irspec/apred.php"> visit spectra </a> of
each visit of each star are available in
<a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/plates/PLATE_ID/MJD5/apVisit.html"> apVisit</a> files.</li>
<li> Pseudo-continuum normalized spectra that
are used in the derivation of stellar parameters are available in
<a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/ASPCAP_VERS/RESULTS_VERS/LOCATION_ID/aspcapStar.html">aspcapStar</a> files.</li>
</ul>

<p> The construction of these files is described in other locations as linked above.</p>

<p> The combined spectra (apStar files) may be the most useful of these. These
combine spectra from individual visits after resampling them onto a common,
logarithmically-spaced wavelength scale, and after removing derived radial velocities of
each visit; thus the resulting spectra are in <em>rest, vacuum</em> wavelengths. Data from
the entire APOGEE wavelength range (which includes some gaps, see
<a href="dr10/irspec/spectra.php#wavelengths"> below </a>) are
included in a single array. The
wavelength scale is recorded in the header in standard FITS cards; thus, standard
software should allow, e.g., straighforward plotting of flux vs. wavelength.</p>
<ul>
 <li> The apStar files also include the individual visit spectra, resampled
and shifted to rest wavelength.</li>
 <li> The individual visit spectra are also available before resampling in
apVisit files, but note that while these have wavelength calibration information,
the native wavelength scale is not an evenly spaced linear or logarithmic
scale. The wavelength information is included as a separate wavelength array,
and also in a table that gives the parameters of the function used to fit
the pixel-wavelength relation, but this information is not incorporated in a
way that standard software will be able to plot wavelengths from this information.
For the apVisit files, spectra from each of the three chips are stored in different
rows in the image extensions.</li>

</ul>

<p> For all APOGEE spectra, there are several important things to be aware of and that
you are likely to notice if you look at and use the spectra. Some of these
are listed here and discussed in more detail below: </p>

<ul id="pagemenu">
<li><a href="dr10/irspec/spectra.php#flags">Data quality flags</a></li>
<li><a href="dr10/irspec/spectra.php#wavelengths">Wavelength coverage and chip gaps</a></li>
<li><a href="dr10/irspec/spectra.php#skylines">Imperfect subtraction of night sky lines</a> </li>
<li><a href="dr10/irspec/spectra.php#errors">Error arrays</a></li>
<li><a href="dr10/irspec/spectra.php#badpixels">Bad pixels/missing regions</a></li>
<li><a href="dr10/irspec/spectra.php#ghosts">Ghosts</a></li>
<li><a href="dr10/irspec/spectra.php#crosstalk">Fiber cross talk</a></li>
<li><a href="dr10/irspec/spectra.php#incomplete">Incomplete data acquisition</a></li>
<li><a href="dr10/irspec/spectra.php#persistence">Persistence in the "blue" chip</a></li>
</ul>

<h2 id="flags"> Data quality flags</h2>

<p>
Information about the data quality of APOGEE spectra is encoded in several
different <a href="dr10/algorithms/bitmasks.php">bitmasks</a> that are included with the spectra.</p>
<ul>
<li> At the individual pixel level, the visit and combined spectra include a mask array in HDU3 in
the apVisit and apStar files, with bits set according to the
<a href="dr10/algorithms/bitmask_apogee_pixmask.php">APOGEE_PIXMASK</a> bitmask.
This bitmask flags both bad pixels and "warning" pixels; data in bad
pixels are definitely unreliable, while data in "warning" pixels may be unreliable.</li>
<li> At the individual visit level, information is included in a
<a href="dr10/algorithms/bitmask_apogee_starflag.php">APOGEE_STARFLAG</a>
bitmask that is recorded in the FITS header as card STARFLAG.</li>
<li> At the combined spectrum level, there is a bitwise OR and a bitwise AND of the APOGEE_PIXMASK
bitmasks from the individual visits that is output in HDU3 in the apStar files (rows 1 and 2),
as well as a bitwise OR and a bitwise AND of the APOGEE_STARFLAG bitmasks from the individual visits
that are recorded in the apStar headers in the STARFLAG and ANDFLAG cards.</li>
<li> If you inspect the bitmasks you will see that data in some locations may not be reliable; some of
the specific reasons for this are discussed below. In many cases unreliable pixels may come
in "chunks" of contiguous pixels; this can arise even if only a single pixel has bad data, because
the combination
of dithered spectra and spectra from multiple visits requires that values in the final spectra have
contributions from multiple pixels in the raw input spectra. If a bad pixel is expected to have a
significant contribution to any pixel in the final spectrum, then that final pixel will be flagged.</li>
</ul>

<h2 id="wavelengths"> Wavelength coverage and chip gaps</h2>

<p> The APOGEE spectra are recorded onto three different detectors. While the overall
coverage ranges from 1.514 to 1.696 microns, there are small
gaps between the detectors, leading to gaps in the wavelength coverage. While all of the
APOGEE spectra lie in the infrared <i>H</i> band, we sometimes refer to the chips as the
"blue", "green", and "red" chips, going from the shorter wavelengths to longer
wavelengths. Data products refer to the separate chips as chips "a", "b", and "c",
in the order in which they are read out.
As it turns out, the "red" chip is the first one to read out, so this nomenclature
is in reverse wavelength order. The following table explains the terminology.</p>

<table class="common">
<tr> <th>Chip</th><th>Name</th> <th>Start wavelength</th> <th>End wavelength</th><th>Central dispersion</th> </tr>
<tr> <td> a </td> <td> "red" </td> <td>  1.647 &mu;</td> <td> 1.696 &mu;</td><td> -0.236 A/pix</td> </tr>
<tr> <td> b </td> <td> "green" </td> <td> 1.585 &mu;</td> <td> 1.644 &mu;</td><td> -0.283 A/pix </td> </tr>
<tr> <td> c </td> <td> "blue" </td> <td>  1.514 &mu;</td> <td> 1.581 &mu;</td><td> -0.326 A/pix  </td> </tr>
</table>

<p>Note that the starting and ending wavelengths vary slightly from fiber to fiber because of variations of
their placement along the instrument pseudo-slit. The dispersion varies with wavelength, and,
to a lesser extent, with fiber.</p>

<h2 id="skylines"> Imperfect subtraction of night sky lines </h2>

<p>The night sky lines (i.e., "airglow"),
primarily from OH emission in the Earth's atmosphere, can be extremely
bright. In the current version of the pipeline the emission from sky fibers near the sky position
of each target is subtracted
from the spectra of the targets. However, this subtraction is almost always imperfect because (1)
the sky spectra need to be shifted in wavelength to match the object spectra, because of variations
of locations of the fibers along the pseudo-slit, and (2) the line spread function (LSF)
of different fibers varies
because of changes in image quality across the field-of-view.  Because the night sky lines are so
bright, even small fractional variations due to these issues can cause the subtraction to be very noticeably
imperfect; thus most sky lines are either under- or over-subtracted.</p>

<p> We note that, even if the airglow subtraction were perfect, the area of the spectrum "under" the sky
lines would be of <em>significantly</em> lower signal-to-noise, because of the large Poisson
contribution from the bright lines. Partly because of this, we have not yet put significant
effort into improving the sky subtraction. Additional work along these lines may be made for
subsequent data releases.</p>

<p> The imperfect sky subraction does have the unfortunate result of making the
APOGEE spectrum appear a bit "ugly" to a quick, casual inspection.
The APOGEE data products (e.g., apVisit and apStar files)
do have a record of the sky spectrum that was subtracted, and it is possible to use this as
a guide to recognizing pixels that are likely to be affected by imperfect sky subtraction.</p>

<!--
<p class="todo"> Attach image of a typical airglow spectrum across the APOGEE wavelengths? </p>

<p class="todo"> Attach examples of: (a) airglow undersubtraction, (b) oversubtraction, (c) wavelength
mismatch creating P Cygni-like feature, (d) high Poisson noise even in a well-subtracted spectrum?  </p>
-->


<h2 id="errors"> Error arrays </h2>

<p>All APOGEE spectra include an array of uncertainties ("errors") for each pixel. These uncertainties
are initially calculated from the raw pixel data based on the noise properties of the detectors
(gain and readout noise). These raw errors are propagated into subsequent data products. </p>

<p>However, in downstream spectral products, data in any given pixel
may have been derived from some combination of pixels in the raw
data, and data from any individual raw pixel may contribute to more
than one pixel in the combined spectra, leading to correlated errors
between pixels.  This can occur in visit spectra because these are
combined from two separate dithered observations. If dithers are
exactly spaced by 0.5 pixels, then the combined spectra just interleaves
the two dithered exposures, but if the dithers are slightly imperfect
(as they generally are), any pixel in the combined well-sampled
spectrum will have contributions from multiple raw pixels.  For the
visit-combined apStar spectra, the pixels definitely have contributions
from multiple raw pixels, because the apStar spectra are RV-corrected
and resampled onto a common wavelength grid. Although the uncertainties
are propagated into the apVisit and apStar spectra, this propagation
ignores the correlation of uncertainties that results from having
processed pixels that are derived from multiple raw pixels.</p>

<p>Multiple observations of selected targets have been used to estimate
empirical uncertainties, and these demonstrate that, for most targets,
the calculated uncertainties are reasonable, i.e., the scatter from
observation to observation is comparable to the estimated uncertainty
in each observation. However, for very bright targets the calculated
uncertainties are almost certainly an underestimate, because the accuracy
of these data are most likely limited by systematic errors in the
data processing and calibration data products. We have not yet
fully quantified these, but we think it is likely that there is an
uncertainty "floor" around the 0.5% level, i.e., a maximum S/N of ~200.
We have not set such a floor in the spectrum uncertainty arrays, so
users need to beware that there is a likely maximum S/N~200.</p>

<h2 id="badpixels">Bad pixels/missing regions</h2>

<p>The IR detectors are not cosmetically perfect, leading to small regions of the chip that are bad, as well
as a significant number of bad or "hot" pixels. These are flagged during the data processing, and can lead
to bad or missing regions in any given spectrum. Because visit spectra are combined
from multiple individual dithered spectra, a single bad pixel can propagate into
multiple pixels in the visit-combined spectra. These can have the effect, along
with poorly subtracted sky lines, of making individual visit spectra look
rather "ugly". The mask arrays can be used to identify the cause of most bad
pixels.</p>

<p> Because any given star may not use the same fiber in different
visits, combined spectra generally look somewhat cleaner, especially
if a target happens to be observed on different fibers in different
visits and/or if the observed radial velocity (including differences in
barycentric RV) differs significantly from visit-to-visit. However,
even if the combined spectra do not have regions with data missing, there
may be regions where the noise level is elevated if that portion
of the spectrum landed on a bad region in one or more of the
visits.</p>

<!--
<p class="todo"> Attach flat field image of detectors showing the bad pixels?  Would let
people have an idea of how many there may be.</p>
-->


<h2 id="ghosts">Ghosts</h2>

<p>The use of VPH gratings results in the production of some "ghosts" on the 2-D images.
The most prominent of these is the
"Littrow ghost", which for APOGEE falls somewhere in the wavelength region 1.624 to 1.626 microns,
depending on the fiber. </p>

<!--
<p class="todo"> Attach Litrow ghost image </p>
-->

<p>The amplitude of the ghost depends on the brightness of other stars in the field,
so it does not always contribute a significant amount of flux.
Pixels possibly affected by the Littrow ghost are flagged with the LITTROW_GHOST bit in the
<a href="dr10/algorithms/bitmask_apogee_pixmask.php"> APOGEE_PIXMASK </a> bitmask.</p>

<h2 id="crosstalk"> Fiber cross talk </h2>

<p> In order to pack as many stars as possible in the APOGEE detector, the spacing between adjacent spectra is relatively small, amounting to ~ 6.5 pixels between adjacent PSF peaks.  Therefore, the wings of the PSF overlap slightly with adjacent spectra, in particular if
a faint object is located adjacent to a much brighter object. To mitigate this, the targets on each plate
are sorted into three brightness categories -- bright (B), medium (M), and faint (F) -- and these
categories are placed along the pseudo-slit (and hence, on the detectors) in the order FMBBMF FMBBMF ...,
so, in principle, a faint object
(or sky) should never land next to a bright object. However, the magnitude ranges of these categories
can be broad, so it is possible for objects of significantly different brightness to be adjacent to
each other.</p>

<p> The extraction portion of the data reduction pipeline accounts for contributions of light from
the two adjacent spectra for each object. However, the quality of this extraction depends on a high-quality
knowledge of the amplitude of the wings of the light distribution.
In cases where adjacent targets are significantly brighter than an
object, small inaccuracies in the PSF model may lead to significant
errors in the extraction of adjacent spectra.</p>

<p> For each visit, a bit is set in the <a href="dr10/algorithms/bitmask_apogee_starflag.php"> APOGEE_STARFLAG</a>
bitmask if an adjacent object is more than 100 times brighter
than the star (VERY_BRIGHT_NEIGHBOR) or more than 10 times brighter (BRIGHT_NEIGHBOR). The former case,
which is rare, is automatically considered as a bad spectrum, i.e., not to be included in the combined
spectrum.</p>

<h2 id="incomplete"> Incomplete data acquisition </h2>

<p>In DR10, we release all APOGEE data that have been obtained before July 2012. However, since most fields
are visited multiple times, there are fields in DR10 that will be (or have been) revisited since the
DR10 cutoff date. Both individual spectra taken before this date, as well as combined spectra from
all visits before this date, are included in the DR10 release, but for stars that have not been
completed, the S/N of the DR10 spectra will not be at the survey goal. Subsequent data releases will
yield different, higher S/N, spectra.</p>

<h2 id="persistence"> Persistence in the "blue" chip</h2>

<p>
Some areas of the detectors used in the APOGEE instrument suffer from a problem
that we refer to as "superpersistence". In these locations on the chip,
previous exposure to light causes a glow in subsequent images that can be very
significant and last for a significant amount of time. The problem is most severe
on about 1/3 of the "blue" chip, i.e. the chip that records wavelengths between
1.514 and 1.581 microns. The orientation of the chip is such that this
region affects essentially all of this wavelength region for the 1/3
of the fibers that put light into this area. There are also regions in the "green"
chip that are affected by a lower level of superpersistence, but these are not so
cleanly delineated by fiber or wavelength.</p>

<p> The effect of superpersistence depends on the prior exposure history, and likely on the
brightness of the target being recorded.  Some level of mitigation
is provided by the fiber management system described
<a href="dr10/irspec/spectra.php#crosstalk">above</a>, since the grouping
of fibers according to target brightness makes it relatively uncommon
for a faint target to be observed through a fiber that was previously
placed on a bright target.  However, since the magnitude ranges
that define these categories are broad, there can still be cases
where faint targets follow bright ones. In addition, calibration
flat field exposures are taken between every plate to map the
distribution of light between fibers and to measure the fiber-to-fiber
throughput variations, and these roughly evenly-illuminated frames
give rise to some superpersistence.</p>

<p> Superpersistence is a complex phenomenon, and in DR10 we have made no effort to correct for it.
Subsequent data releases may attempt to incorporate some kind of correction.</p>

<p> The effect of superpersistence can be very significant and easily noticed: the flux levels
in the region of the spectrum affected can be enhanced by tens of percent or more. This enhancement
is likely to have some wavelength dependence, so spectral features might be distorted. However,
depending on the brightness of the target and preceding ones, it is not <em>guaranteed</em> that
the spectra are significantly adversely affected, so we do not immediately call all data that
falls in the persistence region bad.</p>

<p> In the data reduction pipeline, we flag all pixels in the
<a href="dr10/algorithms/bitmask_apogee_pixmask.php">APOGEE_PIXMASK</a>
bitmask where significant superperstence is known
to occur, with three different flags corresponding to the level of the effect: PERSIST_HIGH, PERSIST_MED,
and PERSIST_LOW. In addition, we have a visit level flag,
<a href="dr10/algorithms/bitmask_apogee_starflag.php">APOGEE_STARFLAG</a>,
for each object, with bits that that get set when a significant
number of pixels (>20%) of the spectrum is affected, again split into categories PERSIST_HIGH, PERSIST_MED,
and PERSIST_LOW. In addition, we look for evidence in the spectra of a "jump" in flux between the
"green" and the "blue" chips, and if this is present at a easily recognized level, we set a flag
PERSIST_JUMP_HIGH or PERSIST_JUMP_LOW if the "blue" portion of the spectrum seems abnormally high
or abnormally low (this latter could occur, e.g., if a sky fiber from a region affected by superpersistence
is used for sky subtraction, although the pipeline takes some steps to try to avoid this occurance).</p>

<p> In the combined spectra, we provide star level flags that are bitwise AND and bitwise OR
combinations of the visit <a href="dr10/algorithms/bitmask_apogee_starflag.php"> APOGEE_STARFLAG </a>
flags, so you can tell if a given object was marked as having a significant
number of pixels in the superpersistence region in <em>all</em> or <em>any</em> of the visit
spectra that went into the combination.</p>

<?php echo foot(); ?>
