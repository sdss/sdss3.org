<?php include '../header.php'; echo head("What&apos;s New in DR10?"); ?>

<div class="summary">
	 <p>DR10 includes near-infrared spectra of the first 57,454 stars observed using the APOGEE spectrograph, 
     plus 684,000 new optical spectra from the BOSS spectrograph, and new reductions and galaxy parameter fits 
     for all of the BOSS data. The imaging data and previous data from the SDSS spectrograph are included 
     within DR10 as well. Prior data releases have not been changed. Data from <a href="dr9/">DR9</a> and 
<a href="dr8/">DR8</a> are available on this site, and data from
<a href="http://www.sdss.org/dr7">DR7</a> and before are available from
<a href="http://www.sdss.org">the original SDSS website</a>.</p>

</div>

<p>Jump to:</p>

<ul>
<li><a href="dr10/whatsnew.php#APOGEE">New infrared spectra from APOGEE</a></li>
<li><a href="dr10/whatsnew.php#BOSS">BOSS: additional spectra, and new reductions</a></li>
<li><a href="dr10/whatsnew.php#skyserver">SkyServer: no new data, but new SDSS and 2MASS JPGs</a></li>
</ul>

<h2 id="APOGEE">New spectra: Apache Point Observatory Galactic Evolution Experiment (APOGEE)</h2>

<p>SDSS Data Release 10 includes the first public release of spectroscopic data from the
SDSS-III's <a href="surveys/apogee.php">Apache Point Observatory Galactic
Evolution Experiment (APOGEE)</a>, with infrared spectra for 57,454
stars over 170 separate sight lines (known as
<em><a href="dr10/help/glossary.php#field_apogee">fields</a></em>
or <em>locations</em> in APOGEE parlance). This is a complete set of the
APOGEE data taken through July 2012. Each star was observed multiple times,
yielding 178,397 independent
<em><a href="dr10/help/glossary.php#visit">visit spectra</a></em> of these
stars. Full documentation is available on our <a href="dr10/irspec">IR
Spectra</a> pages.</p>

<p> APOGEE is a large-scale survey of the detailed chemistry and
kinematics of the Milky Way, with the primary goal of understanding
the evolution of our home galaxy.  By operating in the near-infrared H
band, APOGEE peers through the interstellar dust extinction that
obscures large fractions of the inner Galaxy at optical wavelengths.
By using high resolution, high S/N spectra, APOGEE provides a large,
uniform database of precision stellar measurements, primarily of
giants, across all Galactic populations. APOGEE includes samples of
halo, thin and thick disk stars, as well as stars in the central bulge
and bar.  The APOGEE spectral window includes numerous chemical
species, including C, N, O -- the most abundant metals in the universe
-- other &alpha; and odd-Z elements, as well as Fe and other iron-peak
elements. </p>


<p>APOGEE uses a custom-built, high resolution, cryogenic <a
href="instruments/apogee_spectrograph.php">spectrograph</a>.  The
spectrograph was installed on-site in April 2011 and commenced survey
operations in September 2011.  The instrument features:</p>

<ul>
<li> A stable optical bench contained within an environmentally-controlled, cryogenic vessel
housed separately but linked to the Sloan 2.5-m telescope by a
40-meter fiber optic run.</li>
<li> Three 2048 x 2048 detectors recording <i>R</i> ~ 22,500 spectra over most of the infrared
<i>H</i> band (1.51-1.70&mu;m, with small gaps between detectors).</li>
<li> Detector dithering to improve spectral sampling with exposures taken in half-pixel-stepped
dither pairs.</li>
</ul>

<p>Using this spectrograph, APOGEE has targeted mostly giant stars
distributed around our galaxy. The strategy has been to probe all
regions of the Galaxy accessible from APO.  A number of ancillary
science projects are devoted to the astrophysics of stars, stellar and
sub-stellar binary companions, star-forming regions, star clusters,
and interstellar dust. Please see the documentation for <a href="dr10/irspec/targets.php">the
full description of the target selection procedure.</a></p>

<p>The stars observed for DR10 have had precise radial velocities and
stellar parameters measured, including temperatures, gravities,
metallicities, and &alpha;-element abundances. Please see the
documentation on <a href="dr10/irspec/spectro_data.php">where the
stellar parameters are</a>, <a href="dr10/irspec/catalogs.php">examples
of how to access them</a>, and <a
href="dr10/irspec/parameters.php">how to use them wisely</a>. For
APOGEE commissioning data, only radial velocities are provided in this
data release. With APOGEE spectra, it is possible to derive precise
abundances for a large range of other elements, which will be the
focus of the next data release at the end of 2014.</p>

<h2 id="BOSS">New spectra: Baryon Oscillation Spectroscopic Survey (BOSS)</h2>

<p>BOSS  is an  ongoing  survey  whose primary  science  driver is  to
measure  the   baryon  acoustic  oscillation  (BAO)   feature  in  the
clustering of galaxies and the Lyman-&alpha; forest. By the end of the
survey, BOSS will measure spectra of 1.5 million galaxies to z~0.7, as
well as for  160,000 quasars with redshifts between 2.2  and 3.5. Data
Release 10  contains the first  three years of BOSS  spectroscopy (all
BOSS observations between  December 5, 2009 and July  2012).</p>

<p>In DR10, BOSS has increased its sample of spectra to 1,515,000
(from 831,000 released in DR9). In addition, all of these BOSS spectra
have been rereduced using an improved pipeline.  To date, there have
now been 3,358,200 optical spectra taken with the SDSS and BOSS
spectrographs, all of which are included in DR10.</p>

<p>DR10 also includes galaxy spectral analysis for all galaxies in the
optical spectra, including now those spectra taken with the SDSS
spectrograph. The measured parameters include stellar masses,
star-formation histories, and emission line measurements. Please see
the <a href="dr10/spectro/galaxy.php">documentation on algorithms and
data access</a>.</p>

<h2 id="skyserver">New in SkyServer: new JPG images and catalog data tools</h2>

<p>The SDSS imaging camera has been retired, so no new imaging data are 
included in DR10. However, existing SDSS imaging data has been reprocessed 
into new JPG images on <a href="http://skyserver.sdss3.org/dr10">SkyServer</a>, 
resulting in an improved image quality in the 
<a href="http://skyserver.sdss3.org/dr10/en/tools/chart/navi.aspx">Navigate 
tool</a>. In addition, because APOGEE targets were selected from 2MASS 
infrared imaging data, those images are also available in SkyServer.</p>

<p>SkyServer also includes new tools designed to work with APOGEE data. 
The <a href="http://skyserver.sdss3.org/dr10/en/tools/explore/obj.aspx">Explore</a> 
tool has been heavily redesigned, and the new 
<a href="http://skyserver.sdss3.org/dr10/en/tools/search/IRQS.aspx">Infrared 
Spectroscopy Query Form</a> offers menu-based searching of APOGEE data.</p>

<p>Lastly, SkyServer has been updated using newer web technology. This means that 
all pages which had the page extension .asp have been updated to use .aspx. All 
links on sdss3.org and SkyServer will still work, but if you have pages bookmarked, 
you will need to update those links.</p>


<?php echo foot(); ?>
