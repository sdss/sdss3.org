<?php include '../../header.php'; echo head('Galaxy Products'); ?>

<p>There are some special products for galaxies which are computed after the
spectroscopic pipeline, applying stellar population models to derive a variety
of galaxy parameters including stellar masses, emission-line fluxes and
equivalent widths, stellar and gas kinematics and velocity dispersions.
Each of the stellar population models is applied to all objects that the
spectroscopic pipeline calls a galaxy with a good redshift.</p>

<p>These computations have been provided by:</p>
<ul>
<li><a href="dr9/spectro/galaxy.php#mpa_jhu">MPA-JHU,</a></li>
<li><a href="dr9/spectro/galaxy.php#portsmouth">Portsmouth,</a></li>
<li><a href="dr9/spectro/galaxy.php#wisconsin">Wisconsin</a></li>
</ul>

<h2 id="mpa_jhu">MPA-JHU</h2>

<p>We refer to this set of line measurements as the MPA-JHU measurements,
after the Max Planck Institute for Astrophysics and the Johns Hopkins
University where the technique was developed. The Galspec product provided by
the MPA-JHU group is based on the methods of
<a href="http://adsabs.harvard.edu/abs/2004MNRAS.351.1151B">Brinchmann et al. 2004</a>,
<a href="http://adsabs.harvard.edu/abs/2003MNRAS.341...33K">Kauffmann et al. 2003</a>
and <a href="http://adsabs.harvard.edu/abs/2004ApJ...613..898T">Tremonti et al. 2004</a>, and
has been run on previous SDSS data releases and the catalog has been made
<a href="http://www.mpa-garching.mpg.de/SDSS">publicly available</a>
since DR4; and has been included in the SDSS data release since DR8.
Further details can be found under the
<a href="dr9/algorithms/galaxy_mpa_jhu.php">MPA-JHU stellar population model algorithm</a> web page.</p>

<h2 id="portsmouth">Portsmouth</h2>

<p>The BOSS redshift pipeline now includes the following
<a href="dr9/algorithms/galaxy_portsmouth.php">Portsmouth stellar population model algorithms</a>:</p>
<ul>
<li>Portsmouth spectro-photometric stellar masses, ages and stellar formation
rates based on the star-forming or passive stellar population models of
<a href="http://adsabs.harvard.edu/abs/2005MNRAS.362..799M">Maraston et al. (2005)</a>,
<a href="http://adsabs.harvard.edu/abs/2009MNRAS.394L.107M">Maraston et al. (2009)</a>,
computed from the best-fit SED model of
<a href="http://adsabs.harvard.edu/abs/2006ApJ...652...85M">Maraston et al. (2006)</a>.</li>
<li>Portsmouth Emission-line fluxes and equivalent widths,
stellar and gas kinematics, based on the stellar population synthesis models of
<a href="http://adsabs.harvard.edu/abs/2011MNRAS.418.2785M">Maraston &amp; Stromback (2011)</a>
and <a href="http://adsabs.harvard.edu/abs/2011MNRAS.412.2183T">Thomas, Maraston &amp; Johansson (2011)</a>
applied to BOSS spectra.</li>
</ul>

<h2 id="wisconsin">Wisconsin</h2>

<p>The BOSS redshift pipeline now includes stellar masses and velocity
dispersions based on the
<a href="dr9/algorithms/galaxy_wisconsin.php">Wisconsin stellar population model algorithm</a>:</p>
<p>Wisconsin Stellar masses and velocity dispersions are derived from a
BOSS spectrum principal component analysis (PCA) of
<a href="http://adsabs.harvard.edu/abs/2012MNRAS.421..314C">Chen et al. (2012)</a>
using the stellar population models of
<a href="http://adsabs.harvard.edu/abs/2003MNRAS.344.1000B">Bruzual &amp; Charlot (2003)</a>.</p>

<?php echo foot(); ?>
