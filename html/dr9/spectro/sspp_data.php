<?php include '../../header.php'; echo head('Accessing SSPP Parameters - SSPP'); ?>

<p><a href="dr9/spectro/sspp.php"><b>[Back to main SSPP page]</b></a></p>


<h2>Two Output Files in SSPP</h2>
<p>Note that the FITS files linked to below are very large as they include all DR9 products.</p>

<ul>
<li><a
href="http://data.sdss3.org/sas/dr9/sdss/sspp/ssppOut-dr9.fits">ssppOut</a>
(1.8 Gb) contains information on stellar parameters from individual pipes in the SSPP
(<a href="http://data.sdss3.org/datamodel/files/SSPP_REDUX/RERUN/PLATE4/output/param/ssppOut.html">datamodel</a>).
<strong>Among the various parameters, it is mostly recommended to use the
adopted <var>T</var><sub>eff</sub>, log <var>g</var>, and [Fe/H] unless one
wants to use the parameters from a specific method for a very good
reason</strong>. These are named "TEFF_ADOP", "LOGG_ADOP", and "FEH_ADOP", respectively,
in the <a href="http://data.sdss3.org/datamodel/files/SSPP_REDUX/RERUN/PLATE4/output/param/ssppOut.html">data model.</a></li>
<li><a href="http://data.sdss3.org/sas/dr9/sdss/sspp/ssppOut-dr9.lineindex.fits">ssppOut_lineindex</a>
(2.2 Gb) includes line index measurements for various atomic and molecular lines
(<a href="http://data.sdss3.org/datamodel/files/SSPP_REDUX/RERUN/PLATE4/output/param/ssppOut_lineindex.html">datamodel</a>).</li>
<li> These data are also all available through <a href="dr9/tutorials/segue_sqlcookbook.php#Stellar_Params">CASJobs</a>.</li>
</ul>

<?php echo foot(); ?>
