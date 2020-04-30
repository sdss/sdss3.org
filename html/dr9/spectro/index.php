<?php include '../../header.php'; echo head('SDSS Spectroscopic Data'); ?>

<div class="summary">
<p>Data Release 9 includes the first spectroscopic release from the
<a href="surveys/boss.php">Baryon Oscillation Spectroscopic Survey</a>: more than
800,000 spectra with significantly improved throughput and wavelength
coverage from the previous SDSS spectra.</p>

<p>Data
Release 9 also includes new analyses of stellar spectra:
<a href="dr9/spectro/sspp.php">improved stellar parameters</a> for all previously-released
SDSS stellar spectra, and new <a href="dr9/data_access/vac.php">value-added stellar catalogs</a>
from <a href="surveys/segue2.php">SEGUE-2</a>.</p>
</div>

<p>The quickest way to view SDSS spectroscopic data is the SkyServer
<a href="http://skyserver.sdss3.org/dr9/en/tools/quicklook/quickobj.asp">Quick Look</a> tool.
Quick Look shows an image and spectrum for all sky objects for which the SDSS has measured
a "science primary" spectrum. The tool also shows the object's spectroscopic classification
(star/galaxy/quasar) and redshift, and gives links to further data, including the
spectrum as a FITS file.</p>

<table class="figure" style="width:400px;">
  <tr>
    <td>
	  <a href="http://skyserver.sdss3.org/dr9/en/tools/quicklook/quickobj.asp?id=1237664878339031295">
	    <img src="images/skyserver_quick_look.jpg" alt="The SDSS SkyServer quick look tool shows an image and spectrum of a galaxy, with links to further data" />
	  </a>
	</td>
  </tr>
  <tr>
    <td>Quick Look view of the host galaxy of supernova 2011V
	(<a href="http://arxiv.org/abs/1206.5016">Hakobyan et al. in press</a>). Click on
	the image to go to the Quick Look tool.
	</td>
  </tr>
</table>

<h2>Catalog data</h2>

<p>All spectroscopic catalog data is available through the search tools of SkyServer.
The <a href="http://skyserver.sdss3.org/dr9/en/tools/search/SQS.asp">Spectroscopic Query
Form</a> lets you search for spectroscopic catalog objects by position, spectral classification,
redshift, and other constraints in spectroscopy and imaging.
<a href="http://skyserver.sdss3.org/dr9/en/tools/search/sql.asp">SQL Search</a> lets you
create your own search; see the SkyServer
<a href="http://skyserver.sdss3.org/dr9/en/help/howto/search">SQL Tutorial</a> to learn how to
write SQL queries. An even more flexible and powerful interface is
<a href="http://skyservice.pha.jhu.edu/casjobs">CasJobs</a>, which allows you to
save and analyze all your search results.</p>

<h2>Spectra (FITS)</h2>

<p>In addition to spectroscopic catalog data, SDSS also makes all its spectra available as FITS
files through the <a href="http://dr9.sdss3.org">Science Archive Server</a>, which can return
FITS spectra either <a href="http://dr9.sdss3.org/basicSpectra">individually</a> or
<a href="http://dr9.sdss3.org/bulkSpectra">in bulk</a>. To learn how to work with
SDSS FITS spectra, see <a href="dr9/spectro/spectro_basics.php">Understanding SDSS
spectroscopic data</a>.</p>

<h2 id="more">More information about SDSS spectra</h2>

<p>These pages describe how to use SDSS-III spectroscopic data.
Use the links below (echoed on the left sidebar menu on each page) to learn more.</p>

<ul>
<li> <a href="dr9/spectro/spectro_basics.php">Understanding SDSS spectra</a> describes
how SDSS spectroscopic data are organized, and about the various spectroscopic
observing programs that compose the full SDSS.</li>
<li> <a href="dr9/spectro/pipeline.php">Pipeline</a> describes the steps in
the spectroscopic data processing, and the files created at each step.</li>
<li> <a href="dr9/spectro/spectro_access.php">Available data</a> describes in detail
what spectroscopic data products are available through the Science Archive Server
and SkyServer.</li>
<li> <a href="dr9/spectro/targets.php">Target flags</a> describes how to track the way
in which a spectrum was chosen (<span class="term">targeted</span>) for
spectroscopic follow-up.</li>
<li> <a href="dr9/spectro/catalogs.php">Spectroscopic catalogs</a> describes the
parameters available in SDSS spectroscopic catalogs, such as redshifts and
classifications.</li>
<li> <a href="dr9/spectro/galaxy.php">Galaxies</a> describes
some additional galaxy parameters calculated from SDSS spectra.</li>
<li> <a href="dr9/spectro/sspp.php">Stars (SSPP)</a> describes
the SEGUE Stellar Parameter Pipeline, which estimates stellar atmospheric
parameters, and how to use SSPP data.</li>
<li> <a href="dr9/tutorials/segue_sqlcookbook.php">SEGUE SQL cookbook</a>
describes getting stellar parameters out of the SQL database, with examples.</li>
<li> <a href="dr9/spectro/caveats.php">Caveats</a> describes
some important caveats in using SDSS spectroscopic data, including how to check data
quality.</li>
</ul>


<p>To learn how the SDSS chose objects for spectroscopic observation, see the
<a href="dr9/algorithms/#target">SDSS Target Selection pages</a>.</p>


<?php echo foot(); ?>
