<?php include '../../header.php'; echo head('BOSS Quasar Target Selection'); ?>

<p>There is a paper, <a
href="http://adsabs.harvard.edu/abs/2012ApJS..199....3R">Ross et al. 2012</a>,
describing the BOSS quasar target selection in detail.  This
webpage summarizes some of the main points from that paper.</p>

<p>The principal scientific goal of the BOSS quasar sample is to map the
large-scale structure traced by the Ly-&alpha; forest.  This enters the
wavelength coverage of the BOSS spectrographs for redshifts greater than
2.15, thus (unlike <a href="dr10/algorithms/legacy_target_selection.php#qso">quasar target selection in SDSS-I/II</a>),
the BOSS quasar sample is designed to be sensitive to quasars only for 2.15 &lt; z &lt; 3.5.
This is challenging, because the quasar locus crosses that of main sequence stars at z ~ 2.7.
Moreover, while SDSS-I/II targeting was limited to objects with i &lt; 19.1 (for UV-excess objects)
and i &lt; 20.2, BOSS quasar targeting pushes much fainter, g &lt; 22.0, or r &lt; 21.85,
to give a significantly higher surface density of targets than in SDSS; this is
close enough to the magnitude limit of SDSS photometry that the photometric
errors significantly broaden the stellar locus. </p>

<p>The SDSS-I/II quasar target selection algorithm defined the stellar
locus as a one-dimensional structure in SDSS color-color space;
crudely speaking, quasar targets were defined to be those objects
  sufficiently far from this locus.  In BOSS, we took a different approach, and
used a number of algorithms to identify candidates:</p>
<ul>
<li> Kernel Density Estimation (KDE; <a
href="http://adsabs.harvard.edu/abs/2009ApJS..180...67R">Richards et
al. 2009, ApJS, 180, 67</a>) assigns each pixel in multi-dimensional
color-color space an expected density of stars and quasars, allowing a
probability that any given object is a quasar to be estimated. </li>
<li> Likelihoods (<a
href="http://adsabs.harvard.edu/abs/2011ApJ...743..125K">Kirkpatrick et
al. 2011, ApJ, 743, 125</a>) that a given object is a quasar are
calculated by summing its Gaussian distance from each object in a
training set of known quasars and stars in color space. </li>
<li> A Neural Network (<a
href="http://adsabs.harvard.edu/abs/2010A%26A...523A..14Y">Y&egrave;che
et al. 2010, A&amp;A, 523, 14</a>) is used to compare the five-band photometry
and errors of any given object with that of a large training set of
quasars and stars to estimate a probability that a given object is a
high-redshift quasar.</li>
<li> Extreme Deconvolution, or XDQSO (<a
href="http://adsabs.harvard.edu/abs/2011ApJ...729..141B">Bovy et
al. 2011, ApJ, 729, 141</a>), describes the stellar and quasar loci as a sum of
Gaussians convolved with photometric measurement errors; this allows
the likelihood that any given object is a z &gt; 2.2 quasars to be
calculated. </li>
<li>Radio selection: sufficiently red objects (u-g &gt; 0.4) matched
to sources in the <a href="http://sundog.stsci.edu/">FIRST radio
survey</a> were targeted. </li>
<li> Previously known quasars (including those discovered by SDSS I/II)
with z &gt; 2.15 are targeted by BOSS, to get high S/N observations of
the Ly-&alpha; forest.</li>
</ul>

<p>
Note that many objects are selected by more than one of these
algorithms! </p>

<p>
   To meet our science goals, we must obtain spectra for at least 15 z &gt; 2.2
   quasars/deg<sup>2</sup>.   For Ly-&alpha; forest studies, we do not
   need a sample of quasars with well-defined selection function, but
   for many other quasar science goals (such as clustering and
   luminosity function measurements), we do need a uniformly selected
   sample.  We therefore define a <i><b>CORE</b></i> sample of 20
   targets per square degree (of which about half are true
   quasars upon inspection), identified with the XDQSO algorithm,
   which is held fixed
   throughout the BOSS survey.  (<i>Note that the algorithm associated
   with CORE varied through the first year of the survey, as described
   in <a
   href="http://adsabs.harvard.edu/abs/2012ApJS..199....3R">Ross et al.</a></i>).
   </p>

<p>We identify another 20 targets per square degree, from combining
the results of all other target selection algorithms, and refer to
these as the <i><b>BONUS</b></i> sample.  This is not required to be
uniformly selected, and includes additional information (e.g., from
near-infrared photometry from the <a href="http://adsabs.harvard.edu/abs/2007MNRAS.379.1599L">
UKIDSS</a> Large Area Survey) where available. </p>

<p> DR9 includes spectra of over 182,000 quasar targets, of which
almost 62,000 are in fact z &gt; 2.15 quasars. These data have been
used to measure the clustering of
quasars as a function of redshift
(<a href="http://adsabs.harvard.edu/abs/2012MNRAS.424..933W">White et
al. 2012, MNRAS, 424, 933</a>) as well
as the first measurement of the transverse (quasar-to-quasar)
clustering of the Ly-&alpha; forest (<a
href="http://adsabs.harvard.edu/abs/2011JCAP...09..001S">Slosar et
al. 2011, JCAP, 9, 1</a>).  </p>


<?php echo foot(); ?>

