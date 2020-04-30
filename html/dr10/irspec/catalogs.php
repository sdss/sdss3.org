<?php include '../../header.php'; echo head('SDSS-III APOGEE parameter catalogs'); ?>

<ul>
<li><a href="dr10/irspec/catalogs.php#intro">Introduction</a></li>
<li><a href="dr10/irspec/catalogs.php#examples">Sample catalog queries</a></li>
</ul>

<h2 id="intro">Introduction</h2>

<p>Parameters derived from APOGEE spectra are stored in several
different locations:</p>
<ul>
<li>summary FITS tables giving parameters of all publicly released
APOGEE objects (allStar and allVisit files; see links on
the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>)</li>
<li>headers of FITS files with spectra of individual objects (apStar
and aspcapStar files; see the <a href="dr10/data_access/bulk.php">bulk
download page</a>)</li>
<li>the CAS database, which contains four tables with APOGEE
information:
<ul>
<li> Catalog information about all possible targets is stored in the
<code>apogeeObject</code> table is CAS. The APOGEE targets are selected
from this master catalog according to the target selection
algorithms.</li>

<li> Information about each visit to each object  is  stored
in the <code>apogeeVisit</code> table in CAS. Individual visit
spectra are available in apVisit files in the SAS.</li>

<li>Information about each observed object is stored in the
<code>apogeeStar</code> table in CAS. This includes catalog
information, derived average radial velocities, and a spectral data
quality flag. Individual combined spectra are available as apStar
files in the SAS (also see
the <a href="dr10/data_access/bulk.php">bulk download page</a>).</li>

<li> ASPCAP information about each observed object is stored in the
<code>aspcapStar</code> table in CAS. This includes the derived
stellar parameters and several data quality flags. The parameter
information, as well as the pseudo-continuum normalized spectra from
which they are derived, are available as aspcapStar files in the SAS
(also see the <a href="dr10/data_access/bulk.php">bulk download
page</a>).</li>

</ul></li>
</ul>

<p>The stars are selected in various ways, as described in
our <a href="dr10/irspec/targets.php">target selection pages</a>. The
manner in which each target was selected can be determined by looking
at the <a href="dr10/algorithms/bitmask_apogee_target1.php">APOGEE_TARGET1</a> and
<a href="dr10/algorithms/bitmask_apogee_target2.php">APOGEE_TARGET2</a> target
bitmasks. </p>

<p> To test if the spectrum is "good", the
<a href="dr10/algorithms/bitmask_apogee_starflag.php">STARFLAG</a>
should be checked. This flag is a bitmask, and each set bit
has a particular meaning, described in <a
href="dr10/algorithms/bitmask_apogee_starflag.php">, our bitmask
documentation</a>.</p>

<p> For ASPCAP results, the <a href="dr10/algorithms/bitmask_apogee_aspcapflag.php"> ASPCAPFLAG </a>
bitmask should be
consulted to get some information about the expected quality of the
stellar parameter results.</p>

<p>The examples below demonstrate how to use this information to
obtain a set of objects.</p>

<h2 id="examples">Some examples of selecting APOGEE data from catalogs</h2>

<p>Here we include a number of examples of getting APOGEE data from
the catalogs.  These examples assume that you are either logged
into <a href="http://skyserver.sdss3.org/casjobs">CASJobs</a> and
using the DR10 context, or have downloaded
the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE catalog files</a>. In the latter, case we
assume you are using IDL with the latest version
of <a href="dr10/software/idlutils.php">idlutils</a>
(<code>v5_5_11</code> or later) or python with numpy and pyfits
available (for example, if you have
installed <a href="http://astropy.org">astropy</a>).</p>

<ul>
<li><a href="dr10/irspec/catalogs.php#plates">Get all PLATES observed for a given LOCATION_ID</a></li>
<!--<li><a href="dr10/irspec/catalogs.php#location">Get the LOCATION_ID and FIELD name for a given PLATE</a></li>-->
<li><a href="dr10/irspec/catalogs.php#main">Get ASPCAP parameters and errors for all stars that were targeted as part of the main APOGEE survey.</a></li>
<li><a href="dr10/irspec/catalogs.php#metalpoor">Get parameters for all stars with [Fe/H] &lt; -2 with no BAD FLAGS set</a></li>
<li><a href="dr10/irspec/catalogs.php#cluster">Get ASPCAP parameters for stars flagged as known cluster members</a></li>
<li><a href="dr10/irspec/catalogs.php#rvs">Get pm, JHK mag and errors, A_K and RV, for stars with abs(RVs) &gt; 100 km/s with small RVscat and no BAD flags for RVs.</a></li>
</ul>

<h3 id="plates">Get all PLATES observed for a given LOCATION_ID </h3>

<p>The APOGEE survey is conducted along a number of different lines of
sight, each referred to as as a "field" or "location"
(interchangeably).  Each field has a name and an id number
(<code>LOCATION_ID</code>). The stars in each field are observed
multiple times on multiple visits, on different MJDs. These may
involve one or more physical plug plates. </p>

<p>To find all the plate visits, one can search as follows
(for <code>LOCATION_ID</code> 4105):</p>

<ul>
<li>In CAS:
<pre>
SELECT plate, mjd FROM apogeePlate WHERE location_id=4105
</pre>
<p>The same field can be searched by its name (in this case 'M13'):</p>
<pre>
SELECT plate, mjd FROM apogeePlate WHERE name = 'M13'
</pre>
</li>

<li>In IDL, using the <code>allPlates</code> file
(see the links on the <a
href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>):
<pre>
plates=mrdfits('allPlates-v304.fits',1)
ilocation= where(plates.location_id eq 4105, nlocation)
print, plates[ilocation].plate
print, plates[ilocation].mjd
iname= where(strtrim(plates.name,2) eq 'M13', nname)
print, plates[ilocation].plate
print, plates[ilocation].mjd
</pre>
</li>

<li>In python with <code>pyfits</code>, using the <code>allPlates</code> file
(see the links on the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>):
<pre>
import pyfits
plates_hdus=pyfits.open('allPlates-v304.fits')
plates= plates_hdus[1].data
plates_bylocation= plates[plates.field('LOCATION_ID') == 4105]
print plates_bylocation.field('PLATE')
print plates_bylocation.field('MJD')
plates_byname= plates[plates.field('NAME') == 'M13']
print plates_byname.field('PLATE')
print plates_byname.field('MJD')
</pre>
</li>

</ul>

<!--
<h3 id="location">Get the LOCATION_ID and FIELD name for a given PLATE</h3>
-->


<h3 id="main">Get ASPCAP parameters and errors for all stars that were targeted
as part of the main APOGEE survey.</h3>

<p>The stellar parameters are available for all stars that had ASPCAP
run on them.  However, this includes some spectra known to be bad as
well as stars targeted as part of ancillary programs of various
sorts. Restricting to the good, main survey targets requires checking on
target and catalog flags, as in the examples below:</p>

<ul>
<li>In CAS, limiting to the first 100 (remove "TOP 100" to retrieve all the objects):
<pre>
SELECT TOP 100
   s.apogee_id,s.ra, s.dec, s.glon, s.glat,
   s.vhelio_avg,s.vscatter,
   a.teff, a.teff_err, a.logg, a.logg_err, a.metals, a.metals_err, a.alphafe,  a.alphafe_err,
   dbo.fApogeeAspcapFlagN(a.aspcapflag), dbo.fApogeeStarFlagN(s.starflag)
FROM apogeeStar s
JOIN aspcapStar a on a.apstar_id = s.apstar_id
WHERE (a.aspcapflag &amp; dbo.fApogeeAspcapFlag('STAR_BAD')) = 0 and
       s.commiss = 0 and
      (s.apogee_target1 &amp;
       (dbo.fApogeeTarget1('APOGEE_SHORT')+
        dbo.fApogeeTarget1('APOGEE_INTERMEDIATE')+
        dbo.fApogeeTarget1('APOGEE_LONG'))) != 0
</pre>
</li>

<li>In IDL, printing first 100 stars it finds. This uses
the <code>allStar</code> file (see the links on
the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>):
<pre>
star=mrdfits('allStar-v304.fits',1)
mainbits= sdss_flagval('APOGEE_TARGET1', ['APOGEE_SHORT', 'APOGEE_INTERMEDIATE', 'APOGEE_LONG'])
badbits= sdss_flagval('APOGEE_ASPCAPFLAG', 'STAR_BAD')
gd=where((star.aspcapflag and badbits) eq 0 and star.commiss eq 0 and $
    (star.apogee_target1 and mainbits) ne 0,ngd)
for i=0,(ngd &lt; 100)-1 do $
  print,star[gd[i]].apogee_id,$
  star[gd[i]].ra,star[gd[i]].dec,star[gd[i]].glon,star[gd[i]].glat,$
  star[gd[i]].vhelio_avg,star[gd[i]].vscatter,$
  star[gd[i]].teff,star[gd[i]].teff_err,star[gd[i]].logg,star[gd[i]].logg_err,$
  star[gd[i]].metals,star[gd[i]].metals_err,star[gd[i]].alphafe,star[gd[i]].alphafe_err,$
  star[gd[i]].aspcapflags,star[gd[i]].starflags
</pre>
</li>
<li>In python, printing first 100 stars it finds. This uses
the <code>allStar</code> file (see the links on
the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>):
<pre>
import numpy
import pyfits
star_hdus = pyfits.open('allStar-v304.fits')
star = star_hdus[1].data
star_hdus.close()
badbits= 2**23
mainbits= 2**11+2**12+2**13
gd = (numpy.bitwise_and(star['aspcapflag'],badbits) == 0)  &amp; (star['commiss']==0) &amp; \
  (numpy.bitwise_and(star['apogee_target1'],mainbits) == 0)
ind = numpy.where(gd)[0]
for i in range(0,100):
  j=ind[i]
  print star['ra'][j], star['dec'][j],star['glon'][j],star['glat'][j],\
  star['vhelio_avg'][j], star['vscatter'][j],\
  star['teff'][j], star['teff_err'][j], star['logg'][j], star['logg_err'][j],\
  star['metals'][j], star['metals_err'][j], star['alphafe'][j], star['alphafe_err'][j], \
  star['aspcapflags'][j], star['starflags'][j]
</pre>
</li>
</ul>

<h3 id="metalpoor">Get parameters for all stars with [Fe/H] &lt; -2 with no BAD FLAGS set</h3>

<p>You can also select a subset of the stars based on their
properties.  This example finds a set of metal-poor stars, without any
flags set indicating that the observations or analysis is bad.</p>

<ul>
<li>In CAS, limiting to the first 100:
<pre>
SELECT TOP 100
   s.apogee_id,s.ra, s.dec, s.glon, s.glat,
   s.vhelio_avg,s.vscatter,
   a.teff,a.logg, a.metals, a.alphafe,
   dbo.fApogeeAspcapFlagN(a.aspcapflag), dbo.fApogeeStarFlagN(s.starflag)
FROM apogeeStar s
JOIN aspcapStar a on a.apstar_id = s.apstar_id
WHERE (a.aspcapflag &amp; dbo.fApogeeAspcapFlag('STAR_BAD')) = 0 and a.teff &gt; 0 and a.metals &lt; -2
</pre>
</li>

<li>In IDL, printing first 100 stars it finds. This uses
the <code>allStar</code> file (see the links on
the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>):
<pre>
star=mrdfits('allStar-v304.fits',1)
badbits= sdss_flagval('APOGEE_ASPCAPFLAG', 'STAR_BAD')
gd=where((star.aspcapflag and badbits) eq 0 and star.teff gt 0 and star.metals lt -2,ngd)
for i=0,(ngd &lt; 100)-1 do $
  print,star[gd[i]].apogee_id,$
  star[gd[i]].ra,star[gd[i]].dec,star[gd[i]].glon,star[gd[i]].glat,$
  star[gd[i]].vhelio_avg,star[gd[i]].vscatter,$
  star[gd[i]].teff,star[gd[i]].logg,star[gd[i]].metals,star[gd[i]].alphafe,$
  star[gd[i]].aspcapflags,star[gd[i]].starflags
</pre>
</li>

<li>In python, printing first 100 stars it finds. This uses
the <code>allStar</code> file (see the links on
the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>):
<pre>
import numpy
import pyfits
star_hdus = pyfits.open('allStar-v304.fits')
star = star_hdus[1].data
star_hdus.close()
badbits= 2**23
gd = (numpy.bitwise_and(star['aspcapflag'],badbits) == 0) &amp; (star['teff']&gt;0)\
  &amp; (star['metals'] &lt; -2.)
ind = numpy.where(gd)[0]
for i in range(0,100):
  j=ind[i]
  print star['ra'][j], star['dec'][j],star['glon'][j],star['glat'][j],\
  star['vhelio_avg'][j], star['vscatter'][j],\
  star['teff'][j], star['logg'][j], star['metals'][j], star['alphafe'][j],\
  star['aspcapflags'][j], star['starflags'][j]
</pre>
</li>
</ul>

<h3 id="cluster">Get ASPCAP parameters for stars flagged as known cluster members</h3>

<p>In addition to selecting main survey targets, you can select other
objects according how they were selected. This is an example of
selecting objects chosen to be calibrator stars in clusters with known
metallicities (<code>APOGEE_CALIB_CLUSTER</code>).</p>

<ul>
<li>In CAS:
<pre>
SELECT TOP 100
   s.apogee_id,s.ra, s.dec, s.glon, s.glat,
   s.vhelio_avg,s.vscatter,
   a.teff, a.teff_err, a.logg, a.logg_err, a.metals, a.metals_err, a.alphafe,  a.alphafe_err,
   dbo.fApogeeAspcapFlagN(a.aspcapflag), dbo.fApogeeStarFlagN(s.starflag)
FROM apogeeStar s
JOIN aspcapStar a on a.apstar_id = s.apstar_id
WHERE (a.aspcapflag &amp; dbo.fApogeeAspcapFlag('STAR_BAD')) = 0 and
   s.commiss = 0 and
   (s.apogee_target2 &amp; (dbo.fApogeeTarget2('APOGEE_CALIB_CLUSTER')) != 0)
</pre>
</li>
<li>In IDL, printing first 100 stars it finds. This uses
the <code>allStar</code> file (see the links on
the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>):
<pre>
star=mrdfits('allStar-v304.fits',1)
badbits= sdss_flagval('APOGEE_ASPCAPFLAG', 'STAR_BAD')
clusterbits= sdss_flagval('APOGEE_TARGET2', 'APOGEE_CALIB_CLUSTER')
gd=where((star.aspcapflag and badbits) eq 0 and star.commiss eq 0 and $
  (star.apogee_target2 and clusterbits) ne 0,ngd)
for i=0,(ngd&lt;100)-1 do $
  print,star[gd[i]].apogee_id,$
  star[gd[i]].ra,star[gd[i]].dec,star[gd[i]].glon,star[gd[i]].glat,$
  star[gd[i]].vhelio_avg,star[gd[i]].vscatter,$
  star[gd[i]].teff,star[gd[i]].logg,star[gd[i]].metals,star[gd[i]].alphafe,$
  star[gd[i]].aspcapflags,star[gd[i]].starflags
</pre>
</li>

<li>In python, printing first 100 stars it finds. This uses
the <code>allStar</code> file (see the links on
the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>):
<pre>
import numpy
import pyfits
star_hdus = pyfits.open('allStar-v304.fits')
star = star_hdus[1].data
star_hdus.close()
badbits= 2**23
clusterbits= 2**10
gd = (numpy.bitwise_and(star['aspcapflag'],badbits) == 0) &amp;\
  (numpy.bitwise_and(star['apogee_target2'],clusterbits) != 0) &amp;\
  (star['commiss'] == 0)
ind = numpy.where(gd)[0]
for i in range(0,100):
  j=ind[i]
  print star['ra'][j], star['dec'][j],star['glon'][j],star['glat'][j],\
  star['vhelio_avg'][j], star['vscatter'][j],\
  star['teff'][j], star['logg'][j], star['metals'][j], star['alphafe'][j],\
  star['aspcapflags'][j], star['starflags'][j]
</pre>
</li>
</ul>

<!-- <h3> the Teff, logg, [Fe/H] and [alpha/Fe] and errors in those
parameters (calibrated if available, fit if not) for all the stars that were targeted as SEGUE overlap regardless of flag</h3>
<ul>
<li> CAS </li>
<li> IDL using allStar </li>
<li> Python using allStar </li>
</ul> -->

<h3 id="rvs">Get proper motions, JHK mag and errors, K-band extinction and radial velocities,
for stars with RVs &gt; 300 km/s (with no BAD flags for RVs).</h3>

<p>There is photometric data associated with each target, including
proper motions and other information. This example looks for such
information for larger (heliocentric) radial velocity stars. It
restricts to objects with good measured ASPCAP parameters. In CAS,
this requires joining the <code>apogeeStar</code>
and <code>aspcapStar</code> tables with the <code>apogeeObject</code>
table, which has the target information.  In the flat-files, enough of
the target information is included in the <code>allStar</code>
file in this case.</p>

<ul>
<li>In CAS:
<pre>
SELECT TOP 100
  star.apogee_id, star.ra, star.dec, star.glon, star.glat,
  star.vhelio_avg, star.vscatter,
  obj.j, obj.h, obj.k, obj.ak_targ, obj.ak_targ_method, obj.ak_wise,
  aspcap.teff, aspcap.logg, aspcap.metals
FROM apogeeStar star
JOIN aspcapStar aspcap on aspcap.apstar_id = star.apstar_id
JOIN apogeeObject obj on aspcap.target_id = obj.target_id
WHERE (aspcap.aspcapflag &amp; dbo.fApogeeAspcapFlag('STAR_BAD')) = 0 and aspcap.teff &gt; 0
     and (star.vhelio_avg &gt; 300) and (star.starflag &amp; dbo.fApogeeStarFlag('SUSPECT_RV_COMBINATION')) = 0
     and star.nvisits &gt; 2 order by aspcap.apogee_id
</pre>
</li>
<li>In IDL, printing first 100 stars it finds. This uses
the <code>allStar</code> file (see the links on
the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>):
<pre>
star=mrdfits('allStar-v304.fits',1)
badbits= sdss_flagval('APOGEE_ASPCAPFLAG', 'STAR_BAD')
suspectbits= sdss_flagval('APOGEE_STARFLAG', 'SUSPECT_RV_COMBINATION')
gd=where((star.aspcapflag and badbits) eq 0 and (star.starflag and suspectbits) eq 0 $
  and (star.vhelio_avg gt 300.) and (star.teff gt 0.) $
  and (star.nvisits gt 2), ngd)
for i=0,(ngd&lt;100)-1 do $
  print,star[gd[i]].apogee_id,$
  star[gd[i]].ra,star[gd[i]].dec,star[gd[i]].glon,star[gd[i]].glat,$
  star[gd[i]].vhelio_avg,star[gd[i]].vscatter,$
  star[gd[i]].teff,star[gd[i]].logg,star[gd[i]].metals,star[gd[i]].alphafe,$
  star[gd[i]].aspcapflags,star[gd[i]].starflags
</pre>
</li>
<li>In python, printing first 10 stars it finds. This uses
the <code>allStar</code> file (see the links on
the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>):
<pre>
import numpy
import pyfits
star_hdus = pyfits.open('allStar-v304.fits')
star = star_hdus[1].data
star_hdus.close()
badbits= 2**23
suspectbits= 2**16
gd = (numpy.bitwise_and(star['aspcapflag'],badbits) == 0) &amp;\
  (numpy.bitwise_and(star['starflag'],suspectbits) == 0) &amp;\
  (star['vhelio_avg'] &gt; 300.) &amp;\
  (star['teff'] &gt; 0.) &amp;\
  (star['nvisits'] &gt; 2)
ind = numpy.where(gd)[0]
for i in range(0,10):
  j=ind[i]
  print star['ra'][j], star['dec'][j],star['glon'][j],star['glat'][j],\
  star['vhelio_avg'][j], star['vscatter'][j],\
  star['teff'][j], star['logg'][j], star['metals'][j], star['alphafe'][j],\
  star['aspcapflags'][j], star['starflags'][j]
</pre>
</li>
</ul>

<h3> Get ASPCAP parameters and targeting flags for all stars with 1 degree of a cluster center.</h3>

<p>CASJobs allows search for objects near any particular RA and Dec.
The following example searches for ASPCAP parameters and targeting
flags for the stars observed near M13. For completeness, we include
the equivalent using IDL and idlutils.</p>

<ul>
<li>In CAS, using Equatorial coordinates:
<pre>
SELECT star.apstar_id,
   star.apogee_id, star.ra, star.dec, star.glon, star.glat,
   star.apogee_target1, star.apogee_target2,
   aspcap.teff,aspcap.logg,aspcap.metals
   FROM apogeeStar star
   JOIN fGetNearbyApogeeStarEq(250.423458,36.461306,60) near on star.apstar_id=near.apstar_id
   JOIN aspcapStar aspcap on aspcap.apstar_id = star.apstar_id
</pre>
</li>
<li>In IDL, using the <code>allStar</code> file (see the links on
the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>):
<pre>
star=mrdfits('allStar-v304.fits',1)
ra_m13= 250.423458
dec_m13= 36.461306
spherematch, ra_m13, dec_m13, star.ra, star.dec, 1., m1, m2, max=0
stars_near_m13= star[m2]
</pre>
</li>
</ul>

<h3> Get individual RVs from individual visits, the ASPCAP parameters
for the combined spectra for stars which have more than 6
visits.</h3>

<p>Each star is visited several times, and in some case many times, in
order to build up signal-to-noise and to detect radial velocity
variations. The information about each visit to each star is in
the <code>apogeeVisit</code> table. One could join this table
with <code>apogeeStar</code> on <code>apogee_id</code> in order to
literally find all visits to each star. However, in this example we
are interested in just finding those visits that actually contributed
to each combined spectrum.  In this case, bad visits are excluded and
commissioning data and survey data are kept separate (not
combined). To find these stars, one may use
the <code>apogeeStarVisit</code> table in CAS, or the
array <code>visit_pk</code> which exists for each star in
the <code>allStar</code> file. Alternatively, if you wanted to find
all visits to a particular star, one could replace in the code below
<code>apogeeStarVisit</code> with <code>apogeeStarAllVisit</code>
and <code>visit_pk</code> with <code>all_visit_pk</code>. </p>

<ul>
<li>In CAS:
<pre>
SELECT  top 100
  visit.*, aspcap.teff, aspcap.logg, aspcap.metals
FROM apogeeVisit visit
JOIN apogeeStarVisit starvisit on visit.visit_id = starvisit.visit_id
JOIN aspcapStar aspcap on aspcap.apstar_id = starvisit.apstar_id
JOIN apogeeStar star on star.apstar_id = starvisit.apstar_id
WHERE (aspcap.aspcapflag &amp; dbo.fApogeeAspcapFlag('STAR_BAD')) = 0 and aspcap.teff &gt; 0
  and (star.apogee_target1 &amp; dbo.fApogeeTarget1('APOGEE_LONG')) &gt; 0
  and star.nvisits &gt; 6
ORDER BY visit.apogee_id</pre>
</li>
<li>In IDL. This uses the <code>allStar</code> file (see the links on
the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>):
<pre>
star=mrdfits('allStar-v304.fits',1)
visit=mrdfits('allVisit-v304.fits',1)
badbits= sdss_flagval('APOGEE_ASPCAPFLAG', 'STAR_BAD')
longbits= sdss_flagval('APOGEE_TARGET1', 'APOGEE_LONG')
gd=where((star.aspcapflag and badbits) eq 0 and (star.apogee_target1 and longbits) ne 0 $
  and (star.nvisits gt 6) and (star.teff gt 0.), ngd)
for i=0L, (ngd&lt;100)-1L do $
  for j=0L, star[gd[i]].nvisits-1L do $
    print, visit[star[gd[i]].visit_pk[j]].target_id+" "+visit[star[gd[i]].visit_pk[j]].visit_id
</pre>
</li>
<li>In python, printing first 10 stars it finds. This uses
the <code>allStar</code> file (see the links on
the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>):
<pre>
import numpy
import pyfits
star_hdus = pyfits.open('allStar-v304.fits')
star = star_hdus[1].data
star_hdus.close()
visit_hdus = pyfits.open('allVisit-v304.fits')
visit = visit_hdus[1].data
visit_hdus.close()
badbits= 2**23
longbits= 2**13
gd = (numpy.bitwise_and(star['aspcapflag'],badbits) == 0) &amp;\
  (numpy.bitwise_and(star['apogee_target1'],longbits) != 0) &amp;\
  (star['teff'] &gt; 0.) &amp;\
  (star['nvisits'] &gt; 6)
ind = numpy.where(gd)[0]
for i in range(0,100):
  k=ind[i]
  vpk= star['visit_pk'][k]
  for j in range(0, star['nvisits'][k]):
    print visit['target_id'][vpk[j]]+" "+visit['visit_id'][vpk[j]]
</pre>
</li>
</ul>

<h3>Get APOGEE_IDs and SDSS/BOSS plate, mjd, fiberid for all stars that have both
APOGEE and SEGUE spectra.</h3>

<p>A small number of objects have been observed both in the optical
with the SDSS and/or BOSS spectrographs and in the infrared with the
APOGEE spectrograph. The examples below finds all matches between
primary SDSS/BOSS spectra and APOGEE stars with a 3 arcsec tolerance
for such cases (note that there are some cases where an entry in one
catalog matches multiple entries in the other).</p>

<ul>
<li>In CAS, using a special function:
<pre>
SELECT TOP 50
  specobj.plate as specobj_plate, specobj.mjd as specobj_mjd, specobj.fiberid as specobj_fiberid,
  specobj.ra as specobj_ra, specobj.dec as specobj_dec,
  star.apstar_id, star.ra as star_ra, star.dec as star_dec
FROM apogeeStar AS star
   CROSS APPLY dbo.fGetNearestSpecObjEq( star.ra, star.dec, 0.05) AS near
   JOIN specobj ON near.specobjid=specobj.specobjid
</pre>
</li>
<li>In IDL. This uses the <code>allStar</code> file (see the links on
the <a href="dr10/irspec/spectro_data.php#catalogs">APOGEE data
page</a>) and also
the unfortunately large <code>specObj</code> file for the SDSS/BOSS
data (see the <a href="dr10/spectro/spectro_access.php">optical
spectroscopic data access documentation</a>).
<pre>
star=mrdfits('allStar-v304.fits',1)
specobj=hogg_mrdfits(getenv('SPECTRO_REDUX')+'/specObj-dr10.fits',1, nrow=20000, $
  columns=['plate', 'fiberid', 'mjd', 'plug_ra', 'plug_dec', 'specprimary'])
iprimary= where(specobj.specprimary eq 1, nprimary)
spherematch, star.ra, star.dec, specobj[iprimary].plug_ra, specobj[iprimary].plug_dec, 3./3600., m1, m2, max=0
star_match= star[m1]
specobj_match= specobj[iprimary[m2]]
</pre>
</li>
</ul>

<h3>Get SDSS ugriz photometry, errors and flags, ASPCAP
parameters for the APOGEE stars with b &gt; 60</h3>

<p>In addition to matching to the SDSS spectroscopy, you can also
match to the SDSS photometric imaging data. In this case, we only give
an example within CAS. To do this purely with flat files requires
either downloading the full photometric catalog (about 3 Tbytes) or
the "datasweep" files (about 300 Gbytes), both described in
the <a href="dr10/imaging/imaging_access.php">imaging data access
documentation</a>, and constructing an efficient flat-file method
to do the matching. For most purposes, CAS will be the right way to
do this.</p>

<ul>
<li>In CAS, using a special function:
<pre>
SELECT TOP 50
  photoobj.run, photoobj.camcol, photoobj.field, photoobj.obj,
  photoobj.psfmag_u, photoobj.psfmag_g, photoobj.psfmag_r, photoobj.psfmag_i, photoobj.psfmag_z,
  photoobj.ra as photoobj_ra, photoobj.dec as photoobj_dec,
  star.apstar_id, star.ra as star_ra, star.dec as star_dec,
  aspcap.teff, aspcap.metals, aspcap.logg
FROM apogeeStar AS star
   CROSS APPLY dbo.fGetNearestObjEq( star.ra, star.dec, 0.05) AS near
   JOIN photoobj ON near.objid=photoobj.objid
   JOIN aspcapStar as aspcap ON star.apstar_id = aspcap.apstar_id
WHERE star.glat > 60. and aspcap.teff > 0
</pre>
</li>
</ul>

<?php echo foot(); ?>
