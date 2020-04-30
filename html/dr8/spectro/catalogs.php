<?php include '../../header.php'; echo head('SDSS spectroscopic catalogs'); ?>

<h2>Introduction</h2>

<p>The SDSS spectroscopic catalogs contain parameters such as
redshift, classification, velocity dispersion, quality flags, and the
like, measured from each spectrum. Before reading this page, please
make sure you understand the <a
href="dr8/spectro/spectro_basics.php">basics of SDSS spectra</a>. For
details on the locations of these datasets, see the <a
href="dr8/spectro/spectro_access.php">spectroscopic data access page</a>.</p>

<p>Below we describe how to select "good" spectra, how to exclude
duplicates, and the meaning of the most important spectroscopic
parameters.</p>

<h2 id="unique">Selecting unique, good spectra</h2>

<p>The essential information (redshifts and classifications) of each
object are stored in the specObj file (the specObj table in CAS)
described below. The other tables contain matching photometric
information and detailed measurements of the spectra.</p>

<p>The files contain all spectra, which includes bad spectra as well
as repeat spectra. Use the following procedures to select out unique,
good spectra:</p>
<ul>
    <li>To select the best observations of all unique objects, look
        for objects in specObjAll
    with "sciencePrimary" (called "specprimary" in the SAS flat files)
        greater than zero. Note that this is equivalent to the specObj
        "view" in the database.</li>
    <li>If in addition you want spectra which are on survey quality
        plates,
        search for objects where "platequality" is not "bad" (that is, is
        either "marginal" or "good")</li>
    <li>You might be more interested in the quality of the individual
        spectrum, in which case the safest indicator is "snMedian"</li>
    <li>You may only be interested in survey quality objects from SDSS Legacy,
    in which case you should look for objects with legacyPrimary
        (called "speclegacy" in the SAS flat files) greater than zero.</li>
    <li>You may only be interested in survey quality objects from the
        SEGUE-1 and SEGUE-2 survey plates, in which case you should look
        for objects with seguePrimary (called "specsegue" in the SAS flat
        files) greater than zero.</li>
</ul>

<p>"sciencePrimary" is basically designed to choose the best available
unique set of spectra, in the sense that between two (or more) spectra
of the same location on the sky sciencePrimary will only be set for
one. Any group of spectra which are within 2 arcsec of each other are
considered to be of the same object, and only one of them is called
"sciencePrimary". The object picked as primary is the one that
satisfies best the following conditions, in decreasing order of
importance:</p>
<ol>
<li>whether they are on a "primary" observation of a given
plate (see below for the technical definition); </li>
<li>whether the spectrum has a positive signal-to-noise;</li>
<li> whether the plate they are on is classified as "good"; </li>
<li>whether the redshift
determination spawns no warnings in ZWARNING; and, </li>
<li> in the case that more
than one spectrum satisfies all the above conditions equally well, or
equally badly, the one with the largest signal-to-noise is
selected. </li>
</ol>

<p>Note that a fiber can be "sciencePrimary" even if it is not in a
"primary" MJD for its plate; it just has to be the "best" observation
of that location according to the above conditions. For example, if a
group of spectra of the same location on the sky are ALL on "bad"
plates (failing condition 1), one of them will still be chosen as
"sciencePrimary" based on the subsequent criteria. The subsequent
criteria are treated similarly.</p>

<p>There are similarly defined quantities <code>seguePrimary</code>
and <code>legacyPrimary</code>, which apply the above criteria but
restrict to SEGUE plates and Legacy plates, respectively. (So that a
SEGUE observation of an object is never
<code>legacyPrimary</code>). These can be useful for understanding
window functions and creating homogeneous data sets (though they
differ only a little from <code>sciencePrimary</code>).</p>

<h2 id="platequality">Plate quality and primary plates</h2>

<p>The "plates" file (and the plateX table) contain all
observations of all plates,
including repeats and including some low signal-to-noise plates.
You can restrict that list of plates in the following way:</p>
<ul>
    <li>To select primary, survey quality plates,
    look for plates with <code>isPrimary</code> greater than zero
        (<code>IS_PRIMARY</code> in the flat files)</li>
    <li>To select the best observation of each plate, including
        plates with no survey quality observations,
    look for plates with <code>isBest</code> greater than zero</li>
    <li>To select primary, survey quality tiles from SDSS Legacy,
    look for plates with <code>isTile</code> greater than zero</li>
    <li>To select primary, survey quality tiles from the SEGUE surveys,
    look for plates with <code>isSegue</code> greater than zero</li>
    <li>To simply check for plate quality, regardless of whether it is
        a repeat plate, "platequality" classifies plates into "bad",
        "marginal" and "good".</li>
</ul>

<p>The PLATEQUALITY string is set for each observation (labeled by its MJD)
of each plate. For DR8 plates the definition varies depending on
whether the plate is an SDSS plate (that is, has survey set to
'sdss'), a SEGUE-1 plate (that is, has survey set to 'segue1'), or a
SEGUE-2 plate (that is, has survey set to 'segue2'). </p>
<p>For SDSS plates, the conditions are based on the signal-to-noise
and the fraction of bad pixels:</p>
<pre>
      PLATESN2&gt;15 AND FBADPIX&lt;0.05 -&gt; 'good'
      PLATESN2&gt;9 AND FBADPIX&lt;0.13 -&gt; 'marginal' (if not 'good')
      otherwise -&gt; 'bad'
</pre>
<p>For SEGUE-1 plates, the conditions are based on the signal-to-noise
of the main sequence turnoff at g=18, except for some special plates:</p>
<pre>
      for faint plates SN of turnoff @ g=18 &gt; 16 for 'good'
      for bright plates SN of turnoff @ g=18 &gt; 7.5 for 'good'
      for low-latitude or test plates, consult
         $SAS_DIR/data/segue1-hand.par
</pre>
<p>For SEGUE-2 plates, the conditions are also based on the signal-to-noise
of the main sequence turnoff at g=18:</p>
<pre>
      median(SN for MS-turnoff @ g=18) &gt; 10 -&gt; 'good'
      otherwise -&gt; 'bad'
</pre>

<p>The <code>isPrimary</code> flag is set for each observation (labeled by its
MJD) of each plate. It is "1" if we consider that MJD to be the best
observation of that plate, and for it to be an acceptable observation
from a science point of view (with PLATEQUALITY either 'marginal' or
'good'). It is "0" either if there is a better observation or if all
observations are labeled 'bad'.</p>

<p>The <code>isBest</code> flag is set for each observation (labeled
by its MJD) of each plate. It is "1" if we consider that MJD to be the
best observation of that plate, "0" otherwise.</p>

<!-- <p>To match the results in any specObj entry to the other information
listed below is simple.  For the flat files in SAS, the FITS files are
line-by-line matched.  For the CAS tables, they can be joined on the
unique identifier "specObjID", which is based on PLATE, FIBERID, and
MJD.</p> !-->

<h2 id="objects">Object information</h2>

<p>Each object has a classification (CLASS) and a redshift
determination (Z) with an associated error (Z_ERR). For galaxies, a
velocity dispersion can be determined (down to about 70 km/s).
The redshifts are determined by fitting models to each spectrum
assuming a large range of possible redshifts.  The best model is
chosen on the basis of the chi-squared value of the data with respect
to the model.  </p>

<p>In addition, there is a bitmask called <a
href="dr8/algorithms/bitmask_zwarning.php">ZWARNING</a> which has
flags set in suspicious cases. A ZWARNING equal to zero indicates no
problems identified. Most bits in that mask are signs of substantial
problems; the exception is the MANY_OUTLIERS bit, which can be set for
successful spectra that either happen to be very high signal-to-noise
ratio (<i>e.g.</i> bright stars) or unusual (<i>e.g.</i> some broad-line AGN in
galaxies).</p>

<p>The classifications are stored in the  CLASS and
SUBCLASS parameters. They can take the following values:</p>

<ol>
<li>GALAXY: identified with a galaxy template; can have subclasses:
<ul>
<li><p>STARFORMING: set based on whether the galaxy has detectable
emission lines that are consistent with
star-formation according to the criteria:</p>
<p>
log<sub>10</sub>(OIII/H&beta;) &lt; 0.7 - 1.2(log<sub>10</sub>(NII/H&alpha;) + 0.4)
</p>
</li>
<li>STARBURST: set if the galaxy is star-forming but has an equivalent
width of H&alpha; greater than 50 &Aring; </li>
<li><p>AGN: set based on whether the galaxy has detectable emission lines
that are consistent with being a Seyfert or LINER:</p>
<p>
log<sub>10</sub>(OIII/H&beta;) &gt; 0.7 - 1.2(log<sub>10</sub>(NII/H&alpha;) + 0.4)
</p>
</li>
</ul></li>
<li>QSO: identified with a QSO template </li>
<li>STAR: identified with a stellar template, chosen among the
following subclasses: O, OB, B6, B9, A0, A0p, F2, F5, F9, G0, G2, G5,
K1, K3, K5, K7, M0V, M2V,M1, M2, M3, M4, M5, M6, M7, M8, L0, L1, L2,
L3, L4, L5, L5.5, L9, T2, Carbon, Carbon_lines, CarbonWD, CV</li>
</ol>

<p>If any galaxies or quasars have lines detected at the 10-sigma level with
sigmas &gt; 200 km/sec at the 5-sigma level, the indication "BROADLINE" is
appended to their subclass.</p>

<p>As examples, the full resolution version of the figure showing the
spectra <a href="dr8/spectro/spectra.php">on the spectrum
page</a> lists the CLASSes, SUBCLASSes and error flags of these
particular spectra.</p>

<p>For each object, there are also detailed quality determinations, a
full description of the templates used, and the targeting
information. See the CAS table schema or the <a
href="http://data.sdss3.org/datamodel/files/SPECTRO_REDUX/specObj.html">
the specObj file datamodel page</a> for full information.</p>

<?php echo foot(); ?>

