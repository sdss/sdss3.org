<?php include '../../header.php'; echo head('APOGEE stellar parameters and abundances'); ?>

<ul>
<li><a href="dr10/irspec/aspcap.php#intro">Introduction</a></li>
<li><a href="dr10/irspec/aspcap.php#aspcap">ASPCAP (APOGEE Stellar Parameters and Chemical Abundance Pipeline)</a></li>
<li><a href="dr10/irspec/aspcap.php#output">Output data files</a></li>
<li><a href="dr10/irspec/aspcap.php#calibration">Calibration</a></li>
</ul>

<h2 id="intro">Introduction</h2>
<p> A primary goal of the APOGEE survey is to get chemical abundances of multiple elements for
the survey sample. To determine chemical abundances from lines of different elements, the
stellar atmospheric parameters -- effective temperature, surface gravity, overall metallicity,
and microturbulence -- must be known. The APOGEE Stellar Parameters and
Chemical Abundances Pipeline (ASPCAP) implements a two-step process:
first to determine the stellar parameters from a fit to the entire APOGEE spectrum, and then
to use these parameters to fit various small regions of the spectrum dominated by
spectral features associated with one particular element to derive individual abundances.</p>

<p> The wavelength region covered by the APOGEE spectra includes lines of many elements, but
molecular features, in particular, from CN, CO, and OH can be very prominent, especially
in cooler stars that comprise the bulk of the survey sample. A global fit
needs to include the possibility of variations in elemental abundance ratios that involve
elements that contribute to these species. For this reason, the stellar parameters portion
of the ASPCAP pipeline allows for variations in <em>seven</em>
parameters: effective temperature, surface gravity, microturbulence,
overall metal abundance [M/H] , and relative &alpha;-element (which
includes O) [&alpha; /M], carbon [C/M], and nitrogen [N/M] abundances.
The abundance of each individual element X heavier than helium, is defined as</p>
<p>
[X/H] = log<sub>10</sub> (n<sub>X</sub>/n<sub>H</sub>) - log<sub>10</sub>(n<sub>X</sub>/n<sub>H</sub>)<sub>&#9737;</sub>
</p>
<p>where n<sub>X</sub> and n<sub>H</sub> are respectively the number of nuclei of
element X and hydrogen, per unit volume in the stellar photosphere.
We define [M/H] as an overall scaling of metal abundances
with a solar abundance ratio pattern, and [X/M] as
the deviation of element X from the solar abundance pattern:</p>
<pre>
[X/M] = [X/H] - [M/H].
</pre>
<p>The &alpha; elements are defined as O, Ne, Mg, Si, S, Ca, and Ti. For the
current release, the raw ASPCAP metallicities have been calibrated to
objects with known [Fe/H]; see more details about the implications in
the section on <a href="dr10/irspec/aspcap.php#calibration">calibration</a> below.</p>

<p> In DR10, we provide the best fitting values of these seven parameters. DR10 does not
include abundances of other elements; the derivation of these is currently being developed
and they will be included in subsequent data releases.</p>

<p> On this page, we describe the basic operation of ASPCAP. More operational details are
available in Garcia-Perez et al. (2013), and discussions of the accuracy and precision of the results
can be found in Garcia-Perez et al. (2013) and Meszaros et al (2013).</p>

<p>For a discussion of the quality of
the derived parameters, and important things to know about using them, all users
of ASPCAP results should read <a href="dr10/irspec/parameters.php">Using APOGEE stellar
parameters</a>.</p>

<h2 id="aspcap">APOGEE Stellar Parameters and Chemical Abundances Pipeline (ASPCAP)</h2>

<h3>ASPCAP Components</h3>

<ul>
<li> Large grids of synthetic spectra are computed for
the APOGEE wavelength region, using a custom linelist derived
for this portion of the spectrum. The grids cover the full
expected range of the seven parameters mentioned above:
<var>T</var><sub>eff</sub>, log&nbsp;<var>g</var>, vmicro, [metals/H], [&alpha;/M], [C/M], and [N/M].
The synthetic spectra are "pseudo-continuum normalized" using a fitting
procedure so that they can be compared with observed spectra
that are normalized in the same way (because the true continuum
level is hard to determine from the observed spectra).</li>

<li> Combined <a href="surveys/apogee.php">APOGEE</a>
spectra are pseudo-continuum normalized to remove variations of spectral
shape arising from interstellar reddenning, errors in relative fluxing, and
atmospheric absorption. This normalization is done the same way as for the
synthetic spectra, so that they can be directly compared.</li>

<li> An independent code (FERRE -- see
<a href="http://adsabs.harvard.edu/abs/2006ApJ...636..804A">Allende Prieto et al. 2006</a>)
searches for the best matching  synthetic spectrum for each star via
a &chi;<sup>2</sup> minimization technique, allowing
for interpolation in the synthetic spectra grid.</li>

<li> From the results of the different synthetic grids, the
best-fit synthetic spectrum is identified for each object, and the
best-fitting results for all of the stars are compiled. Using
results from the derived parameters for objects of known
parameters, some calibration relations have been derived, and these
relations are applied to the derived parameters. In addition, this
stage sets a series of data quality flags for the stellar parameter
results.</li>
</ul>

<h3> Stellar Spectral Libraries (pre-computed)</h3>

<p>Grids of normalized stellar synthetic spectra
are computed with the spectral synthesis code ASS&epsilon;T
(<a href="http://adsabs.harvard.edu/abs/2009AIPC.1171...73K">Koesterke 2009</a>),
using model atmospheres from <a href="http://kurucz.harvard.edu/">Castelli and Kurucz (2003)</a>,
and a linelist for the APOGEE wavelength region
tuned to match the spectrum of the Sun (see Shetrone et al.).
The model atmospheres are calculated using scaled-solar abundances from
Grevesse and Sauval (1998), while the synthetic spectra adopt scaled-solar
abundances by
<a href="http://adsabs.harvard.edu/abs/2005ASPC..336...25A">Asplund et al. 2005</a>
and variations in  [&alpha;/M], [C/M], and [N/M] not considered in the calculations
of atmospheric structures;
as a result, the synthetic spectra are not fully self-consistent.
Future work will include the use of consistent ATLAS9 and MARCS model
atmospheres  calculated by <a href="http://adsabs.harvard.edu/abs/2012AJ....144..120M">
Meszaros et al. 2012</a> (see
<a href="http://www.iac.es/proyecto/ATLAS-APOGEE/">this site for ATLAS </a> and
<a href="http://marcs.astro.uu.se/"> this one for MARCS</a> models).</p>

<p> The synthetic spectra are smoothed to a nominal spectral resolution
of R=22500 (using an assumed Gaussian profile) and sampled on a
logarithmic wavelength scale (~10<sup>4</sup> frequencies) that
matches the sampling of the combined APOGEE spectra. While the actual
APOGEE spectra have some variations of LSF depending on wavelength and on
the fiber in which they were observed, initial tests
suggest that the assumption of a constant LSF does not change the derived
parameters by much, although future work may consider this in more detail.</p>

<p> Ideally we would store the entire grid of stellar spectra
in memory to allow for efficient computation comparison
of our observed normalized data to the spectrum match each grid point.
However, the multi-dimensional synthetic spectrum library is too large
to store simultaneously in the memory of a typical computer.
For this reason, the flux arrays are compressed
using Principal Component Analysis, and the full parameter space is split into several
different grids that cover different temperature regimes; we refer to
these grids by their approximate spectral classes: A, F, G, and K.</p>

<p> In general, seven parameters are required to adequately describe
the spectra: effective temperature, surface gravity,
microturbulence, metal abundance (all elements heavier than He), &alpha;
element (O, Ne, Mg, Si, S, Ca, and Ti) relative abundance, carbon relative abundance,
and nitrogen relative abundance. However, for hotter stars, there are far fewer
spectral features, and for these, the grids only cover ranges in
effective temperature, surface gravity, and metal abundance. While
microturbulence can be considered a free parameter, we have adopted
a fixed relation that sets microturbulence as a function of surface
gravity:
&xi;<sub>t</sub>=2.24-0.3*log&nbsp;<var>g</var>, which was derived
from a run of a subset of data that fit microturbulence as a free
parameter. Fixing microturbulence in this way decreases the time needed
to do the fittings and enhances precision in the remaining parameters.
</p>

<p> The following table summarizes the synthetic grids:</p>

<table class="common" >
<caption>Libraries</caption>
<tr>
<th> Class </th>
<th> Dimensions </th>
<th> <var>T</var><sub>eff</sub> </th>
<th> log&nbsp;<var>g</var> </th>
<th> [M/H] </th>
<th> [C/M] </th>
<th> [N/M] </th>
<th> [&alpha;/M] </th>
</tr>
<tr><td> K </td><td style="text-align:center;">6</td> <td>3500 to 5000</td><td>0 to 5</td><td>-2.5 to 0.5</td><td>-1 to 1</td><td>-1 to 1</td><td>-1 to 1</td></tr>
<tr><td> G </td><td style="text-align:center;">6</td> <td>4750 to  6500</td><td>1 to 5</td><td>-2.5 to 0.5</td><td>-1 to 1</td><td>-1 to 1</td><td>-1 to 1</td></tr>
<tr><td> F </td><td style="text-align:center;">3</td> <td>6000 to 10000</td><td>2 to 5</td><td>-2.5 to 0.5</td><td></td><td></td><td></td></tr>
<tr><td> A </td><td style="text-align:center;">3</td> <td>8000 to 15000</td><td>3 to 5</td><td>-2.5 to 0.0</td><td></td><td></td><td></td></tr>
</table>


<h3> ASPCAP Pre-processing (IDL wrapper) </h3>

<p> The comparison of observations with the library requires
the pre-processing of the combined
<a href="surveys/apogee.php">APOGEE</a>
spectra, which is carried out by an IDL wrapper, and consists of
masking out bad pixels and normalizing the spectra.</p>

<ul>
<li>Since FERRE minimizes &chi;<sup>2</sup>, realistic estimates of
flux uncertainties are critical, and any bad data must be masked.
Pixels flagged as bad (saturated, cosmic ray, etc) in the data-reduction process
and pixels around the sky emission lines are ignored for continuum
normalization, and in the &chi;<sup>2</sup> minimization. To account for small
systematic errors in spectral calibration, we set a minimum error of 0.5 percent
for all pixels.</li>

<li> To normalize the spectra, the spectral regions covered by each
of the three chips used in the APOGEE spectrograph
are considered separately. In each region, a
sigma-clipping algorithm is used to fit a polynomial to the upper envelope of the spectrum.
In order to allow a meaningful comparison to the library of synthetic
spectra, an identical normalization is performed on the library, using
the same spectral regions with the same sigma-clipping and polynomial form.
We emphasize that
this normalization is <em>not</em> a normalization to the <em>true</em>
continuum, because, especially for metal-rich stars, the upper envelope
of the data may still not be at the true continuum level.
Thus, we do not calculate abundances from
eduivalent widths from these "pseudo-continuum"
normalized spectra, but rather comparing to models
that have had the same normalization procedure applied.</li>
</ul>


<h3> Determination of stellar parameters (FERRE) </h3>

<p> Stellar parameters and the relative abundances of C, N and &alpha;-elements
are determined by the FORTRAN90 code FERRE, which compares the observations
with the grid of pre-computed synthetic spectra. The code uses
a &chi;<sup>2</sup> criterion as the merit function, and searches
for the best matching synthetic spectrum using the Nelder-Mead
algorithm (<a href="http://comjnl.oxfordjournals.org/content/7/4/308">Nelder and Mead 1965</a>).
The search is run 12 times starting from
different locations: the center of the grid for [C/M], [N/M] and [&alpha;/M], and
at two different places symmetrically located from the grid center
for [M/H] and log&nbsp;<var>g</var>, and at three for <var>T</var><sub>eff</sub>.
Interpolation within the grid of synthetic spectra is accomplished
using  cubic Bezier interpolation. The code returns
the best matching spectrum, the parameters associated with that spectrum (stellar
parameters and [C/M], [N/M] and [&alpha;/M] abundance ratios),
the covariance matrix of these parameters, and the &chi;<sup>2</sup>
value for the best-matching spectrum. </p>

<h3> ASPCAP post-processing (IDL wrapper) </h3>

<p> Once FERRE has delivered results for the different temperature grids,
the IDL wrapper chooses the result that produces the lowest &chi;<sup>2</sup>.
These results (pseudo continuum, normalized
observed spectra, flux errors, stellar parameters and [C/M], [N/M],
[&alpha;/M] values, covariance matrix, &chi;<sup>2</sup> values)
along with other relevant information (<em>e.g.</em> 2MASS photometry,
reddening, radial velocities, signal-to-noise ratios etc.) are
compiled.</p>


<h2 id="output">Output data files</h2>

<p>ASPCAP is generally run separate for each APOGEE field (i.e. location in the sky).
The ASPCAP output for all stars in the field is stored in a single
<a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/ASPCAP_VERS/RESULTS_VERS/LOCATION_ID/aspcapField.html">aspcapField</a> file.
Results for each individual star are stored in
<a href="http://data.sdss3.org/datamodel/files/APOGEE_REDUX/APRED_VERS/APSTAR_VERS/ASPCAP_VERS/RESULTS_VERS/LOCATION_ID/aspcapStar.html">aspcapStar</a>
files. See the links for a full description
of the data in these files, but briefly, these files are binary FITS tables
that contain three separate tables: the first contains the information about
the star and the derived stellar parameters, the second contains the
observed and best-matching synthetic spectra, and the third contains
library and wavelength information.</p>

<h2 id="calibration">External Calibration and Final Error Estimates of the Parameters</h2>


<p> In addition to the raw FERRE output parameters, we also provide
a calibrated set of parameters. The calibrations have been derived
from observation and analysis of spectra from stars in stellar clusters
that span a range of stellar parameters. These observations allow us
to quantify systematic deviations of the raw FERRE output from
 reference literature values. Presumably, these systematics arise because
of issues in the analysis: inaccaccuracies in the atomic/molecular
line data, inadequacies of the stellar models, line formation, etc.</p>

<p> The ASPCAP metallicities have been calibrated to
metallicities from optical spectral analysis of stars in clusters.
Since most optical metallicity values track
iron abundances ([Fe/H]), the ASPCAP metallicity indicator [M/H] can generally
be interpreted as [Fe/H] after the calibration has been applied, and the
abundances relative to metallicity ([alpha/M], [C/M], and [N/M]) can be
interpreted as relative to Fe. However, we maintain the M notation
to underline that they are the result of the fit of lines by many elements other
than Fe. In the next data release we intend to publish individual
elemental abundances, including [Fe/H] (which would allow non-zero
values of [Fe/M]), based on fits to specific absorption lines in
the APOGEE spectral region, making it possible to establish the
detailed abundance patterns of the sample stars beyond the current
set of elements.</p>

<p> The data used to derive the calibration relations and the derivation
of the relations themselves are described in Meszaros et al. (2013). The
calibrations are summarized here:</p>

<ul>
<li>Temperatures have been calibrated to photometric temperatures
using the <a href="http://adsabs.harvard.edu/abs/2009A%26A...497..497G"> Gonz&aacute;lez Hern&aacute;ndez and Bonifacio (2009)</a>
IRFM scale.
<ul>
    <li>Teff = Teff<sub>ASPCAP</sub> - 0.3968 *Teff<sub>ASPCAP</sub> + 1938.3 (4600 &lt; Teff &lt; 5500);<br/>
        Teff = Teff<sub>ASPCAP</sub> + 113 (Teff &lt; 4600)</li>
</ul>
</li>

<li> Metallicity results have been calibrated using a sample of well
studied clusters covering a wide range of metallicities
(M/H]=-2.35&ndash;+0.47) against their overall published spectroscopic
metallicities.
<ul>
    <li>[M/H] = [M/H]<sub>ASPCAP</sub> + 0.06199([M/H]<sub>ASPCAP</sub>)<sup>2</sup> - 1.125&times;10<sup>-4</sup><var>T</var><sub>eff</sub> + 4.734&times;10<sup>-5</sup><var>T</var><sub>eff</sub>[M/H]<sub>ASPCAP</sub> + 0.544</li>
</ul>
</li>

<li> Corrections for the surface
gravities were estimated from the same set of clusters and using
stellar isochrones assuming the ASPCAP <var>T</var><sub>eff</sub>s and the literature
metallicity overall values, as well as from a reference sample of stars
with asteroseismic surface gravities from observations by the Kepler mission.
Based on these, we have used the  following calibration relations:
<ul>
    <li>log&nbsp;<var>g</var> = log g (ASPCAP) + 0.1222 ([M/H]<sub>ASPCAP</sub>) - 0.2396</li>
</ul>
</li>

<li>Internal parameter error estimates are delivered
by FERRE as derived from the &chi;<sup>2</sup> curvature. These
internal errors are generally quite small. We provide
a set of guiding external errors estimated from the scatter observed in
well-studied Galactic stellar clusters covering the bulk of the
parameter range in <a href="surveys/apogee.php">APOGEE</a>
(Meszaros et al., 2013):
<ul>
    <li>&sigma;(Teff) = 83.8 - 39.8*[M/H] </li>
    <li>&sigma;(log&nbsp;<var>g</var>) = 0.2 dex</li>
    <li>&sigma;([M/H]) = 0.0548 - 0.0361 [M/H]</li>
    <li>&sigma;([&alpha;/M]) = 0.1</li>
</ul>
</li>
</ul>

<?php echo foot(); ?>
