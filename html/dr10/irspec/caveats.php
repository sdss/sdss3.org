<?php include '../../header.php'; echo head('SDSS-III APOGEE caveats'); ?>

<p>This page consists of a list of known problems in the DR10 APOGEE data release. Note
that these are problems/bugs, not a list of issues or imperfections to be aware
of that are intrinsic to the data. For those, see the page on <a href="dr10/irspec/spectra.php">
Using APOGEE spectra</a> and on <a href="dr10/irspec/parameters.php">Using ASPCAP stellar
parameters</a>.</p>
<ul>
<li><a href="dr10/irspec/caveats.php#names">Abundance names slightly inaccurate</a></li>
<li><a href="dr10/irspec/caveats.php#tags">Inconsistency in tag/header names</a></li>
<li><a href="dr10/irspec/caveats.php#suspectrv">SUSPECT_RV_COMBINATION bit</a></li>
<li><a href="dr10/irspec/caveats.php#dupid">Inconsistent IDs</a></li>
<li><a href="dr10/irspec/caveats.php#RVs">Incorrect RVs for 583 stars taken during commissioning</a></li>
</ul>

<h3 id="names">Abundance names slightly inaccurate in flag file tag names and database names</h3>

<p>In the summary allStar and allVisit files, as well as in the CAS tables, and in
the ASPCAP bitmask names, the relative abundances of &alpha; elements, carbon and nitrogen,
are named ALPHAFE, CFE, and NFE. To be completely accurate, these are the ratios of &alpha;'s,
C, and N to the derived overall metal abundance (M), and not specifically to Fe, and so
should probably be named ALPHAM, CM, and NM. See the
<a href="dr10/irspec/aspcap.php">ASPCAP description</a>for more details. In actuality, since
the metal abundances are calibrated to Fe abundances, the distinction may be quite small,
and in any case, the C and N abundances, as discussed in
<a href="dr10/irspec/parameters.php">Using parameters</a>, are likely not reliable,
and there are potential issues with the
&alpha; abundances as well (in particular, at lower temperatures).</p>

<h3 id="tags">Inconsistency in tag/header names between flat files and catalog files</h3>

<p>The summary allStar and allVisit files (and related database tables)
compile information from previous steps of data
reduction. Some of the names that were used for FITS header cards and table entries were
judged not to be sufficiently descriptive, so they have been renamed in the summary files.
As a result, there is a mismatch between the names in the lower level files and those
in the summary files. This will be fixed in subsequent data releases. In DR10, beware of
the use of OBJ/APOGEE_ID, FIBER/FIBER_ID, LOCID/LOCATION_ID, AKTARG/AK_TARG, AKMETHOD/AK_TARG_METHOD,
AKWISE/AK_WISE, TARG1/APOGEE_TARGET1, TARG2/APOGEE_TARGET2.</p>

<h3 id="suspectrv">SUSPECT_RV_COMBINATION bit</h3>

<p>There is a bit in APOGEE_STARFLAG that is set when the radial velocity obtained from cross-correlation
of each individual visit spectrum with the combined spectrum differs from the RV obtained from the
cross-correlation of the each individual visit spectrum with the best-fitting template to the combined
spectrum. However, this bit was set too conservatively when RV were determined. In the summary
allStar/allVisit files (and related database tables), the bit was redefined somewhat less
conservatively, so the value of the bit <em>differs</em> between the lower level files and
the summary file. In fact, even in the summary file, the bit definition may be too conservative,
so this bit is set for a significant fraction of all APOGEE targets. As a result, it may not be
of optimal use, although users still might beware when it is set.</p>

<h3 id="dupid">Inconsistent IDs</h3>

<p>For a few objects, slightly incorrect object/star names were used during the reduction. These names
have all been fixed in the final summary files and associated database tables, but if you want to
find the individual star spectrum files (<em>e.g.</em>, the apStar or aspcapStar files), you will need to know
the star name used during the reduction; this is stored in the REDUCTION_ID tag. In future data releases,
we hope that all of the correct names will be used consistently throughout.</p>

<h3 id="RVs">Incorrect RVs for 583 stars taken during commissioning</h3>

<p>For 583 objects that were observed just once during commissioning and just once during
the DR10 survey-quality period, the radial velocities from the survey-quality visit
were inadvertently stuffed into
the summary allStar file and into the apogeeStar table in the CAS database. The correct RV for the
commissioning visit can be obtained from from the summary allVisit file or the apogeeVisit
table in the CAS. In many cases, as expected, the radial velocity from the commissioning
observations is very similar to that obtained from the survey data.</p>

<?php echo foot(); ?>
