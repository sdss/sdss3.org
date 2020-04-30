<?php include '../../header.php'; echo head('SDSS Survey coordinates'); ?>

<p> The SDSS has two sets of coordinates it uses which are specially
designed for the survey geometry. These are described in the <a
href="http://www.astro.princeton.edu/PBOOK/welcome.htm">Project Book</a>
in the section on <a
href="http://www.astro.princeton.edu/PBOOK/strategy/strategy.htm">Survey
Strategy</a>.</p>

<p> The first set is the Great Circle (mu, nu) system, where mu and nu
are spherical coordinates (corresponding to ra and dec) in a system
whose equator is along the center of the stripe in question. The
stripes of the survey are great circles which all cross at (ra, dec) =
(95, 0). The stripes are defined by their inclination with respect to
the equator, and are indexed by integers <em>n</em> such that the
inclination of a stripe is -25 + 2.5<em>n</em>. Thus, stripe
<em>n</em>=10 corresponds to the Equator.  The design is that the area
covered by the imaging on a given stripe is a 2.5 degree wide
rectangle centered on nu=0 in Great Circle coordinates.</p>

<p> The second set is the Survey (eta, lambda) system. This is simply
another spherical coordinate system, where (eta,lambda)=(0,90.)
corresponds to (ra,dec)=(275.,0.) and (eta,lambda)=(57.5,0.)
corresponds to (ra,dec)=(0.,90.). Note also that at (eta,
lambda)=(0.,0.), (ra,dec)=(185.,32.5). For some reason, although "eta"
is constant along great circles, it is referred to as "survey
latitude," while "lambda" is referred to as "survey longitude." Also,
"eta" runs only from -90. to 90.; the back of the sphere is covered by
"lambda", which runs from -180. to 180.  The Survey coordinates are
defined such that the "primary" area of a stripe in the north is
defined by a rectangle in Survey coordinates which is 2.5 degrees wide
in eta (coordinate width).</p>

<p>The photometric catalog contains the position of each object in
both Great Circle and survey coordinates.</p>

<p>A variation on survey coordinates are the "corrected survey
coordinates" (ceta, clambda), which are identical to eta and lambda,
but use the more sensible definition ranges of -180 to 180 for ceta,
and -90 to 90 for clambda. </p>

<p>The <a href="dr8/software/idlutils.php">idlutils</a> package
provides a set of IDL utilities to convert from these coordinates to right
ascension and declination and back. These can be consulted for the
mathematical relationship between the coordinate systems:</p>

<ul>
<li><a
href="dr8/software/idlutils_doc.php#MUNU_TO_RADEC">munu_to_radec</a>:
convert from Great Circle coordinates to Celestial coordinates</li>
<li><a
href="dr8/software/idlutils_doc.php#RADEC_TO_MUNU">radec_to_munu</a>:
convert from Celestial coordinates to Great Circle coordinates</li>
<li><a
href="dr8/software/idlutils_doc.php#ETALAMBDA_TO_RADEC">etalambda_to_radec</a>:
convert from survey coordinates to Celestial coordinates</li>
<li><a
href="dr8/software/idlutils_doc.php#RADEC_TO_ETALAMBDA">radec_to_etalambda</a>:
convert from Celestial coordinates to survey coordinates</li>
<li><a
href="dr8/software/idlutils_doc.php#STRIPE_TO_INCL">stripe_to_incl</a>:
return the inclination associated with a given stripe number</li>
<li><a
href="dr8/software/idlutils_doc.php#STRIPE_TO_ETA">stripe_to_eta</a>:
return the eta value along the middle of a Great Circle stripe number</li>
<li><a
href="dr8/software/idlutils_doc.php#ETA_TO_STRIPE">eta_to_stripe</a>:
return the closest stripe center to a given eta value</li>
<li><a
href="dr8/software/idlutils_doc.php#CSURVEY2EQ">csurvey2eq</a>:
convert from survey coordinates to Celestial coordinates</li>
<li><a
href="dr8/software/idlutils_doc.php#EQ2CSURVEY">eq2csurvey</a>:
convert from Celestial coordinates to survey coordinates</li>
</ul>

<?php echo foot(); ?>

