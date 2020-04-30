<?php include '../../header.php'; echo head('Using APOGEE stellar parameters'); ?>

<ul>
<li><a href="dr10/irspec/parameters.php#intro">Introduction/Summary</a></li>
<li><a href="dr10/irspec/parameters.php#flags">ASPCAP flags</a></li>
<li><a href="dr10/irspec/parameters.php#uncertainties">ASPCAP uncertainties/errors</a></li>
</ul>

<h2 id="intro">Introduction / summary</h2>

<p>Automated determination of stellar parameters
for tens of thousands of stars from IR data is a challenging problem, and one that
we certainly have not fully solved. As a result, there are some uncertainties and
potential issues in the current stellar parameters that are being released as part of
DR10. All potential users of these parameters should carefully consider the
information presented on this page, and note that a significant fraction of
the data for the sample being released has some cautionary note attached
to it! Certainly, these parameters are subject to change in future data releases
as we improve our understanding and techniques!</p>

<p> To understand the caveats presented here, users should understand
the basics of how the <a href="dr10/irspec/aspcap.php">ASPCAP pipeline</a> works,
and what the fundamental parameters affecting the IR spectra are, as
described in the <a href="dr10/irspec/aspcap.php">ASPCAP pipeline</a> description.</p>

<p><em>Executive summary: The ASPCAP fits for DR10 provide Teff, log g,
[M/H], [&alpha;/M], [C/M], and [N/M]; for definitions of these parameters,
see the <a href="dr10/irspec/aspcap.php"> ASPCAP documentation</a>. We believe that useful results
for Teff, log g, and [M/H] are recovered for giants, albeit with some
small calibration offsets applied (both raw and calibrated values are
provided). [&alpha;/M] also seems fairly good,
but there are some additional uncertainties for Teff&lt;~4200 K.
Results for [C/M] and [N/M] are considerably less reliable, and, since the
spectra of cool stars are dominated by absorption lines due to OH, CO, and CN,
which are sensitive to the abundances of those elements, uncertainties in all
parameters are larger for Teff&lt;~4200 K. For warmer
stars (T&gt;5500 K) and dwarfs (log g &gt; 3.8), parameters are less well
determined, but they are well enough determined to identify these
as warm stars and dwarfs!</em></p>

<p><em>We release two sets of ASPCAP stellar parameter results:
validated/calibrated data and raw ASPCAP results. The validated/calibrated
data are released for Teff, log g, [M/H], and [&alpha;/M] for giants, while
the raw ASPCAP results present the data for these parameters without calibrations
applied, as well as for [C/M] and [N/M]. The raw data are likely to have
systematic offsets and considerable uncertainty, but we release it because
the calibrated data are derived from the raw data with all of its uncertainties.
The calibration relations used are documented on the <a href="dr10/irspec/aspcap.php#calibration">ASPCAP
docmentation page</a> and are taken from Meszaros et al (2013), where the
data used to derive them are presented.
</em></p>

<p><em>No calibrated parameters are released for stars with
log g&gt;3.8. No calibrated results for [C/M] or [N/M] are released for any stars.</em></p>

<h2 id="flags">ASPCAP flags</h2>

<p> While DR10 presents stellar parameters and some abundances
from the <a href="dr10/irspec/aspcap.php">ASPCAP</a> pipeline, users must
be aware of several issues before using these indiscriminately.
To facilitate this, every star has associated bitmasks,
<a href="dr10/algorithms/bitmask_apogee_aspcapflag.php">ASPCAPFLAG</a> and
<a href="dr10/algorithms/bitmask_apogee_paramflag.php">PARAMFLAG</a>,
that flag known and potential issues
with some or all of the stellar parameters. Users need to be
sure to consult the bitmasks and use the derived parameters
accordingly.
<a href="dr10/algorithms/bitmask_apogee_aspcapflag.php">ASPCAPFLAG</a>
is used to flag certain parameters
as not to be used (BAD) or to be used with caution (WARN),
and is also used to flag stars that are likely to be
unreliable. If the BAD or WARN flag is set for any
parameter, <a href="dr10/algorithms/bitmask_apogee_paramflag.php">PARAMFLAG</a>
is an array of bitmasks that gives
information, for each parameter, about the reason why
that parameter was flagged.</p>

<p> Overall, quantities that are marked as BAD should not be used.
Quantities that are marked as WARN have potential significant uncertainties,
but are likely to be ballpark correct, or at least contain some
relative information. For example, surface gravities at high gravities
(dwarfs) are known to be significantly inaccurate, but they are
good enough to identify that these stars are indeed dwarfs; all of
these are flagged as WARN. In general,
users are cautioned not to use data with WARN bits set for detailed
quantitative chemical analysis indiscriminately. However, we also note that a large
fraction of the DR10 data has such bits set, and that the stars with
WARN bits set fall preferentially in certain regions of parameters space.
In this respect, the elimination of stars with WARN bits from a given
sample may subject it to important biases.  Obviously, we
are working hard to improve our understanding and the performance of
the pipeline. Data released in DR10 represent our current best efforts,
and they will certainly be improved in subsequent data releases.</p>

<p> To facilitate use, we provide summary STAR_WARN and STAR_BAD bits
in addition to individual bits for different parameters and
different conditions (as discussed further below).  The STAR_BAD bit is set if
any critical individual BAD bits are set (specifically, if TEFF, LOGG, CHI2,
COLORTE, ROTATION, SN BAD bits are set, or any parameter is near grid edge).
The STAR_WARN bit is set if the WARN bits are set for Teff (TEFF) or log g (LOGG)
(but not for [M/H], [&alpha;/M], [C/M], or [N/M]) or for WARNings related to
CHI2, ROTATION, SN, or COLORTE. Because of the definition, note that it
is possible for a star not to have STAR_WARN fit, but still to have
ALPHAFE_WARN or METALS_WARN set!</p>

<p> In addition to the ASPCAP flag bits, several star level
flag bits as derived from the spectra may also be relevant,
as encoded in the summary star data and in the
<a href="dr10/algorithms/bitmask_apogee_starflag.php">STARFLAG</a>
bitmask. In particular, users may want to beware of stars with
significant RV variation (as indicated by VSCATTER), as these
are likely indicative of binarity (although not all cases of
binarity are expected to lead to stellar parameter issues, e.g.,
if the luminosity ratio is large), and be more cautious about
stars that are flagged as having potential issues from persistence
in the detectors (PERSIST_HIGH, etc. bits in the STARFLAG mask).</p>

<p> One might hope that uncertainties in the stellar parameters
are well represented by the parameter uncertainties produced
by the pipeline. Unfortunately, the expected random errors are
very small, as the true uncertainties almost certainly arise
from systematics. We provide some estimate of the uncertainties
from such effects, but overall, it is challenging to provide
realistic uncertainties for all of the parameters. See
more discussion of this in the <a href="dr10/irspec/parameters.php#uncertainties"> uncertainties
</a> section below.</p>

<p>Details of different bits in the ASPCAP flags are discussed below:</p>
<ul>
<li><a href="dr10/irspec/parameters.php#calibration">Calibration of raw ASPCAP results</a></li>
<li><a href="dr10/irspec/parameters.php#chi2">Poor matches to synthetic spectra (CHI2)</a></li>
<li><a href="dr10/irspec/parameters.php#sn">Signal-to-noise (SN)</a></li>
<li><a href="dr10/irspec/parameters.php#colorte">Color-temperature relation (COLORTE)</a></li>
<li><a href="dr10/irspec/parameters.php#rotation">Rotation/broad lines (ROTATION)</a></li>
<li><a href="dr10/irspec/parameters.php#degeneracies">Degeneracies between parameters</a></li>
<li><a href="dr10/irspec/parameters.php#teff">TEFF flags</a></li>
<li><a href="dr10/irspec/parameters.php#logg">LOGG flags</a></li>
<li><a href="dr10/irspec/parameters.php#metals">METALS flags</a></li>
<li><a href="dr10/irspec/parameters.php#alphafe">ALPHAFE flags</a></li>
<li><a href="dr10/irspec/parameters.php#cfe">CFE flags</a></li>
<li><a href="dr10/irspec/parameters.php#nfe">NFE flags</a></li>
</ul>

<h3 id="calibration">Calibration of raw ASPCAP results</h3>

<p>Results for effective temperature, surface gravity, and overall metal
abundance have been calibrated by comparing APOGEE results for stars in
stellar clusters spanning a wide range of metallicities, to data from the
literature on those same stars.  These comparisons show that
there are likely some small, systematic
errors in the raw ASPCAP parameters. The cluster stars have
been used to derive corrections to the raw parameters, and most
users probably want to use these calibrated parameters. However,
the calibration relations have only been derived in certain
regions of parameter space (effective temperature and surface
gravity), so one needs to be more cautious about using parameters
for stars that fall outside these regions. In such cases, no values
are provided for calibrated parameters (apart from a mistake in
populating Teff, see <a href="dr10/irspec/caveats.php">caveats page</a>, and
the {PARAM}_BAD or {PARAM}_WARN bit (where {PARAM} is one of TEFF, LOGG, METALS,
ALPHAFE, CFE, or NFE) in
<a href="dr10/algorithms/bitmask_apogee_aspcapflag.php">ASPCAPFLAG</a>
is set along with the CALRANGE_BAD or CALRANGE_WARN bit in
<a href="dr10/algorithms/bitmask_apogee_paramflag.php">PARAMFLAG</a>.
</p>

<p> Specifically, </p>
<ul>
<li>the <a href="dr10/irspec/aspcap.php#calibration">Teff calibration</a> is valid within the range 3500 &lt; Teff &lt; 5500 K and for log g &lt; 3.8 (but see <a href="dr10/irspec/caveats.php">caveats</a>)</li>
<li>the <a href="dr10/irspec/aspcap.php#calibration">log g calibration</a> is valid only within the range log g &lt;3.8, 3500 &lt; Teff &lt; 5300, and -2.5 &lt; [M/H] &lt; 0.5.</li>
<li>the <a href="dr10/irspec/aspcap.php#calibration">[M/H] calibration</a> is valid only for log g &lt;3.8 and Teff &lt; 5500 </li>
</ul>

<p> In general, we have applied calibration relations for the red giants
in the sample, with log g &lt; 3.8 and Teff &lt; 5500. For most other stars, calibrations
have not been applied because we have fewer (or no) observations of calibrating
objects outside the giant regime. As a result, for DR10, the stellar parameters
for hotter stars and for stars of higher surface gravity cannot be trusted
too much; stars with Teff &gt; 5500 and/or log g  &gt; 3.8 are almost certainly warm
stars and/or stars with higher surface gravity, but, beyond that, the values returned
by the ASPCAP pipeline may not be highly accurate.</p>

<p>For all stars we supply both the original fit parameters as
returned by the ASPCAP pipeline, as well as the parameters after the calibration
relations have been applied. In the allStar and aspcapStar files, the fit parameters are
provided in the FPARAM array, while  the calibrated parameters are provided into
the PARAM array. In the CAS database, the fit parameters are preceded by FIT_ (e.g.
FIT_TEFF, FIT_LOGG, etc.), while the calibrated parameters are stored in TEFF,
LOGG, etc.</p>

<h3 id="chi2">Poor matches to synthetic spectra (CHI2)</h3>

<table class="figure" style="width:200px;">
  <tr>
    <td><a href="images/apogee/parameters_chi2.gif"><img src="images/apogee/parameters_chi2.gif" alt="CHI2 with Teff" style="width:200px;" /></a></td>
  </tr>
  <tr>
    <td>Reduced CHI2 as a function of Teff for the DR10 sample </td>
  </tr>
</table>

<p> The synthetic spectra may not always be good matches
to real spectra because of possible issues with
the line list and/or model atmospheres adopted, or because of
a peculiar chemical composition (e.g., carbon stars, S-type stars, etc.).
It is likely that
the quality of the results will be better in some regions
of parameter space than in others. In particular, results
at the coolest temperatures may be less reliable, judging from
the quality of the matches to the synthetic spectra. The distribution
of CHI2 with temperature for the entire sample is given in the figure to the right. </p>

<p> For DR10, we set CHI2_WARN if CHI2&gt;10 and CHI2_BAD if CHI2&gt;30.
Note that this flags a significant fraction of stars, including
most of the stars at cooler temperatures, leading to a strong
bias about which stars appear in DR10 without this bit set.
</p>

<h3 id="sn">Signal-to-noise (SN)</h3>

<!--
<table class="figure" style="width:200px;">
  <tr>
    <td> <a href="images/apogee/parameters_sn.gif"> <img src="images/apogee/parameters_sn.gif" alt="S/N histogram " width=200> </a></td>
  </tr>
  <tr>
    <td>Number of stars as a function of S/N for the DR10 sample </td>
  </tr>
</table>
-->
<p> DR10 includes all data taken in the first year of survey
operations. However, since most stars are observed multiple
times, data for some stars in DR10 will not yet have been
observed at the target signal-to-noise. Since the quality
of ASPCAP results depends on S/N, there may be issues with
the ASPCAP results for these stars. SN_BAD and SN_WARN
bits in
<a href="dr10/algorithms/bitmask_apogee_aspcapflag.php">ASPCAPFLAG</a>
flag such stars.</p>

<h3 id="colorte">Color-temperature relation (COLORTE)</h3>
<!--
<table class="figure" style="width:200px;">
  <tr>
    <td> <a href="images/apogee/parameters_colorte.gif"> <img src="images/apogee/parameters_colorte.gif" alt="Color-Teff relation " width=200> </a></td>
  </tr>
  <tr>
    <td>Color-Teff relation for the DR10 sample. Lines show the regions outside of which
stars are flagged with COLORTE_WARN and COLORTE_BAD (which depends on metallicity, hence
the different lines) </td>
  </tr>
</table>
-->


<h3 id="rotation">Rotation/broad lines (ROTATION)</h3>

<p> The technique used by ASPCAP -- matching against a template
library of sythetic spectra -- is only valid to the degree to
which stars are represented in the library. In particular, the
library spectra are all for non-rotating stars, and any stars
with significant rotation will not be well matched. While most
giants are expected to be slow rotators, the same cannot be
said for main sequence stars. An estimate of rotation is made
during the radial velocity determination by comparing the
width of the cross-correlation peak when cross-correlating
the spectrum with best-matching template to the width of the
autocorrelation of the best-matching template. When the
observed peak is significantly broader than the autocorrelation
peak, a bit is set, and this is used to trigger the
ROTATION_BAD or ROTATION_WARN bit in
<a href="dr10/algorithms/bitmask_apogee_aspcapflag.php">ASPCAPFLAG</a>.</p>

<h3 id="degeneracies"> Degeneracies between parameters</h3>

<p> While we characterize the spectra using seven parameters
(effective temperature, surface gravity, microturbulence, overall
metal abundance, alpha-element abundance, carbon abundance,
and nitrogen abundance), there are likely to be significant
degeneracies between some parameters in some regions of
parameter space.</p>

<!-- <p class="todo">TODO: Set bit for this based on covariance
matrix</p> -->

<h3 id="teff">Teff flags (TEFF)</h3>

<p>
Accuracy of the ASPCAP effective temperatures have been judged by
comparing to temperatures obtained from photometric temperature
indicators, and in some case, with effective temperatures from the
literature, based on analysis of high resolution spectra of cluster
stars included in the APOGEE sample.  Results are not fully consistent:
comparison with spectroscopic temperatures show scatter, but little
mean offset, while comparison with photometric temperatures suggest
a small offset at cooler temperatures with ASPCAP underestimating
the temperatures, and ASPCAP overestimating temperatures at warmer
temperatures (>5000K). Based on these, we have applied a small
temperature correction to the ASPCAP results. </p>

<h3 id="logg"> log g flags (LOGG)</h3>

<p> Surface gravities have been checked/calibrated using observations
of Kepler asteroseismic stars, for which independent surface gravities
can be derived, and from cluster stars,
for which surface gravities can be determined, for a given effective temperature,
from theoretical isochrones for the age and chemical composition of the clusters
(to the level to which these isochrones are accurate). These comparisons suggest
that the ASPCAP gravities are systematically high, and provide calibration
relations that we use to correct the ASPCAP gravities.</p>

<p> Unfortunately, the asteroseismic gravities are only available for
relatively metal-rich stars. At the metal-poor end, observations in
globular clusters suggest that the ASPCAP gravities are systematically
even higher. This comparison is perhaps less secure than that from the
asteroseismic stars, because the cluster comparison is with gravities that
are derived from isochrones and the observed photometric sequences; as a result,
the expected gravities depend on accurate temperature estimates as well
as the assumption that the isochrones accurately represent real stars.</p>

<p> Our gravity calibration is derived from a combination of the stars
with asteroseismic gravity and clusters at low metallicity. It is a significant
correction, so there is some concern about gravities, although the formal
scatter of the calibrators after correction is about 0.17 in log g.</p>

<p> For dwarfs, one expects stars to lie along sequences predicted
from stellar models, but we find that the ASPCAP gravities are systematically
low in this regime. Since we have less data to calibrate the issues here,
we do not provide a correction for dwarfs, and warn that, while dwarfs
are correctly identified as such by the ASPCAP results, the derived
surface gravities have some significant issues.</p>

<h3 id="metals"> metallicity ([M/H]) flags (METALS)</h3>

<p>
Metallicities ([M/H]) have been validated through observations of globular
and open clusters. These suggest that the raw ASPCAP metallicities have some
small offsets that are characterized as a function of metallicity, and these
offsets have been applied to giants.
</p>

<h3 id="alphafe">[&alpha;/M] flags (ALPHAFE)</h3>

<p>
Alpha-element enhancements ([&alpha;/M]) have been validated through observations of globular
and open clusters. These suggest that the raw ASPCAP [&alpha;/M] seem generally
reasonable. However, at the lowest and highest metallicities, there seems to be
some degeneracy between [&alpha;/M] and [M/H], such that clusters at these metallicities
have a larger spread in both quantities, with a correlation between the two. As a result,
the ALPHAFE_WARN flag is set for very low and high metallicities.</p>

<p>IN addition, at the cooler temperatures, T &lt; 4200, the results for [&alpha;/M] are
correlated with the results for [C/M] and [N/M]. Since there is some uncertainty
about the quality of these, all such stars are flagged with ALPHAFE_WARN.
</p>

<h3 id="cfe">[C/M] flags (CFE)</h3>

<p>Comparison between ASPCAP [C/M] with literature data show
large scatter and a significant zero point uncertainty.  These data
at this stage should be taken with extreme caution and we discourage
their use for detailed chemical evolution analysis.</p>


<h3 id="nfe">[N/M] flags (NFE)</h3>

<p>Comparison between ASPCAP [N/M] with literature data show
large scatter and a significant zero point uncertainty.  These data
at this stage should be taken with extreme caution and we discourage
their use for detailed chemical evolution analysis.</p>

<h2 id="uncertainties">ASPCAP uncertainties/errors</h2>

<p>ASPCAP calculates internal parameter uncertainties based on the fit
to the spectrum. However, there are also external uncertainties based
on systematic issues and the quality of the models. The <a
href="dr10/irspec/aspcap.php#calibration">ASPCAP calibration
documentation</a> discusses these uncertainties in more detail.</p>

<?php echo foot(); ?>
