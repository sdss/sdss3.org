<?php include '../../header.php'; echo head('SDSS-III Infrared Spectroscopic Data from APOGEE'); ?>

<div class="summary">
<p>Data Release 10 is the first spectroscopic release from the
<a href="surveys/apogee.php">Apache Point Observatory Galactic Evolution Experiment (APOGEE)</a>,
including spectra and derived stellar parameters for more than 50,000 stars.
APOGEE is an ongoing survey of ~100,000 stars accessing all parts of the
Milky Way.  By operating in the infrared (<i>H</i>-band) portion of the electromagnetic spectrum,
APOGEE is better able to detect light from stars lying in dusty regions of the Milky Way
than surveys conducted in the optical,
making this survey particularly well-suited for exploring the Galactic disk and bulge.
APOGEE's high resolution spectra provide detailed information about the
stellar atmospheres; DR10 provides derived effective temperatures, surface gravities, overall
metallicities, and information on the abundances of several chemical elements.  </p>

</div>

<h2>DR10 Scope and Status</h2>

<!--
<p>The APOGEE survey started in Fall 2011 and will run to Summer 2014. DR10 releases data from
the first year of the survey (through summer 2012) as well as some commissioning data.
Since most of the survey stars are observed in separate visits (to identify binaries),
some of the DR10 data are for stars that have not yet been completed (i.e., more data will
be obtained for them before the survey is completed).</p>
-->

<p>The APOGEE survey started in Fall 2011 and will run until Summer 2014.
By design, spectra for most of the survey stars are integrated over
multiple visits spanning at least one month of time
to make possible the identification of binary stars
through detection of radial velocity variations.  In DR10, data for
all stars observed during the first year are released, including stars
for which more visits are scheduled for subsequent years of
the survey.  In general, the S/N for those spectra in DR10 is lower than survey
specifications, which will be met after all planned visits are executed.</p>

<table class="figure" style="width:400px;">
  <tr>
    <td>
	    <img src="images/apogee_fields_dr10.jpg" alt="Map of fields released in DR10" style="width:400px;" />
    </td>
  </tr>
  <tr>
    <td>Index map showing locations of fields for which there are data in DR10. Note that different fields have been visited different numbers of times, and not all fields have been completed. </td>
  </tr>
</table>

<p> Broadly speaking, the main APOGEE data products released in DR10
are the outputs of two software pipelines.  The first one, the data reduction
pipeline, delivers extracted, 1-dimensional, calibrated spectra as well
as derived radial velocity information.  Those interested in working with
APOGEE spectra should be aware of instrumental and reduction-specific features visible in
the data.  Users of the released spectra are strongly advised to visit the
<a href="dr10/irspec/spectra.php"> Using APOGEE
spectra </a> page, and are encouraged to contact us should they
find any undocumented issues with the data.</p>

<p> The second pipeline is the APOGEE Stellar Parameters and Chemical
Abundances Pipeline (ASPCAP), which aims at achieving the unprecedented
feat of determining stellar parameters and 15 elemental abundances
through the automatic analysis of APOGEE's high-resolution H-band spectra.
This is a very challenging problem, and one that we certainly have
not fully solved yet.  Currently, ASPCAP delivers derived effective temperatures
(<i>T</i><sub>eff</sub>), gravities (log <i>g</i>), metallicities ([M/H]),
and chemical abundance ratios
[&alpha;/M], [C/M], and [N/M].  Users interested in working with those
data are <i>*strongly advised*</i> to read the documentation in the
<a href="dr10/irspec/parameters.php">Using APOGEE stellar parameters</a> page,
where uncertainties, potential systematic
effects, and other important issues are discussed. </p>

<!--
<p>DR10 releases both the APOGEE spectra as well as the current results from the stellar
parameters pipeline. Potential users of the spectra need to be aware of certain features
seen in the data, as described in our <a href="dr10/irspec/spectra.php"> Using APOGEE
spectra</a> page.</p>

<p>Automated determination of stellar parameters
for tens of thousands of stars from IR data is a challenging problem, and one that
we certainly have not fully solved. As a result, there are some uncertainties and
potential issues in the current stellar parameters that are being released as part of
DR10. Potential users of these parameters need to be aware of these, as described on
our <a href="dr10/irspec/parameters.php">Using APOGEE stellar parameters</a> page.</p>
-->

<h2>Quick Look: APOGEE Data</h2>

<p>A quick way to view infrared spectroscopic data from APOGEE is via the SkyServer
<a href="http://skyserver.sdss3.org/dr10/en/tools/explore">Quick Look</a> tool.
Quick Look shows an image and spectrum for all sky objects for which the SDSS has measured
a spectrum. The tool also shows the object's radial velocity and derived stellar atmospheric
parameters, and gives links to further data, including the spectrum as a FITS file.</p>

<table class="figure" style="width:400px;">
  <tr>
    <td>
	  <a href="http://skyserver.sdss3.org/dr10/en/tools/explore/summary.aspx?id=apogee.n.c.s2.4104.2M17524645-2537112">
	    <img src="images/explorer_apogee.png" alt="The SDSS SkyServer quick look tool shows an image and spectrum of any survey star, with links to further data" style="width:400px;" />
	  </a>
	</td>
  </tr>
  <tr>
    <td>Quick Look view of some APOGEE star. Click on
	the image to go to the Quick Look tool
	</td>
  </tr>
</table>

<h2>Catalog Data</h2>

<p>All APOGEE catalog data are available through the search tools of SkyServer.
The <a href="http://skyserver.sdss3.org/dr10/en/tools/search/SQS.aspx">Spectroscopic Query
Form</a> lets you search for spectroscopic catalog objects by position, catalog name,
and several stellar parameters.
<a href="http://skyserver.sdss3.org/dr10/en/tools/search/sql.aspx">SQL Search</a> lets you
create your own search; see the SkyServer
<a href="http://skyserver.sdss3.org/dr10/en/help/howto/search">SQL Tutorial</a> to learn how to
write SQL queries. An even more flexible and powerful interface is
<a href="http://skyserver.sdss3.org/casjobs">CasJobs</a>, which allows you to
save and analyze all of your search results.</p>

<h2>Spectra (FITS)</h2>

<p>In addition to the APOGEE catalog data, SDSS also makes all the APOGEE spectra available as FITS
files through the <a href="http://data.sdss3.org">Science Archive Server</a>, which can return
FITS spectra either <a href="http://data.sdss3.org/basicIRSpectra">individually</a> or
<a href="http://data.sdss3.org/bulkIRSpectra">in bulk</a>.
</p>

<h2 id="more">Information About APOGEE Data</h2>

<p>Additional pages describe how to understand and use APOGEE data.
Use the links below (echoed on the left sidebar menu on each page) to learn more.</p>

<ul>
<li> <a href="dr10/irspec/spectro_basics.php">Understanding the APOGEE survey</a>
gives an overview of how APOGEE spectroscopic data are taken and organized.</li>
<li> <a href="dr10/irspec/spectro_data.php">Available data</a> describes in detail
what APOGEE data products are available through the Science Archive Server
and SkyServer.</li>
<li> <a href="dr10/irspec/spectra.php"> Using APOGEE spectra </a> describes
some important features in APOGEE spectra about which anyone looking at spectra should be aware.</li>
<li> <a href="dr10/irspec/parameters.php">Using APOGEE stellar parameters</a> describes
important things you need to know if you plan to use the derived stellar atmospheric
parameters.</li>
<li> <a href="dr10/irspec/catalogs.php">Database catalogs </a> describes the APOGEE
information that is stored within the CAS database and summary data files and
how it can be used. This includes some examples of
how to query the database or summary data files to select out different pieces
of information for different types of targets.</li>
<li> Several pages describe the steps in
the APOGEE software pipelines, and the files created at each step:
<ul>
<li> <a href="dr10/irspec/targets.php">Target selection</a> describes the way
in which APOGEE targets are chosen (<span class="term">targeted</span>), and
how this is documented in the target flags.</li>
<li> <a href="dr10/irspec/apred.php">Visit reduction</a> gives information about
how individual visit spectra are observed, processed and stored.</li>
<li> <a href="dr10/irspec/spectral_combination.php">Combined spectra</a> gives information about
how the combined spectra for each star are created and stored, including information
about the derivation of <a href="dr10/irspec/radialvelocities.php"> radial velocities</a>.</li>
<li> <a href="dr10/irspec/aspcap.php">Derivation of stellar parameters</a> describes
how the stellar parameters available in APOGEE spectroscopic catalogs (which include
effective temperature, surface gravity, heavy element abundance [metals/H], alpha-element
abundance [&alpha;/M], carbon abundance [C/M], and nitrogen abundance [N/M])
are derived.</li>
</ul>
</li>
<li> <a href="dr10/irspec/caveats.php"> Caveats </a> is a running list of known
issues with the DR10 release.</li>
</ul>

<?php echo foot(); ?>
