<?php include '../../header.php'; echo head('The Sloan Digital Sky Survey Quasar Catalog: tenth data release'); ?>

<h2 id="intro">The SDSS-DR10 Quasar Catalog (DR10Q)</h2>

<!-- INTRODUCTION -->

<p>
Following the tradition established by SDSS-I/II, the SDSS-III BOSS collaboration produces a quasar catalog.
The SDSS-DR10 quasar catalog is the second publicly released one and it contains the same information as
in DR9Q (<a href="http://www.aanda.org/articles/aa/abs/2012/12/aa20142-12/aa20142-12.html">Pâris et al., 2012</a>).
In addition we now provide a matching to the UKIRT Infrared Deep Sky Survey (<a href="http://adsabs.harvard.edu/abs/2007MNRAS.379.1599L">UKIDSS</a>) 
and to the second XMM-Newton Serendipitous Source Catalog (Third Data Release, <a href="http://adsabs.harvard.edu/abs/2009A%26A...493..339W">2XMMi-DR3</a>).
</p>

<p>
The SDSS-DR10 Quasar catalog is fully described in
<a href="http://arxiv.org/abs/1311.4870">Pâris et al. 2013</a>.
We summarize below the main characteristics of this catalog.
</p>

<!-- CATALOG PRODUCTION -->
<h2 id="production">Catalog production</h2>

<h3>Introduction</h3>

<p>
In order to provide the first measurement of the BAO scale in the Lyman-α forest at z ∼ 2.5, BOSS aims at successfully
observing over 150,000 quasars in the redshift range 2.2 ≤ z ≤ 4, where at least part of the Lyman-α forest lies in the
SDSS spectral range. The target selection has been designed in order to provide at least 15 quasars with z ≥ 2.2 per square degree.
The catalog is therefore not uniform by construction but a uniform sample is also identified.
Since BAO measurements require a catalog of maximal purity, all quasar candidates have been visually inspected.
</p>

<h3>Inspected quasar candidates</h3>

<p>
The objects that were inspected have been selected in three different ways:
</p>
<dl>
<dt>Objects targeted as quasars by the main BOSS survey</dt>
<dd>The quasar target selection is described on the
<a href="dr10/algorithms/boss_quasar_ts.php"> quasar target selection page</a>
and in detail in <a href="http://adsabs.harvard.edu/abs/2012ApJS..199....3R">Ross et al. (2012)</a>.</dd>

<dt>Ancillary programs</dt>
<dd>Some BOSS ancillary programs target quasars through peculiar criteria
(special selection, search for variability, peculiar AGN population etc...).
Those objects have been included in the catalog, and extra flags
indicate which ancillary program they are part of.
The whole description of these flags can be found as part of the
<a href="dr10/algorithms/ancillary/"> DR10 documentation</a> and in
the <a href="http://iopscience.iop.org/1538-3881/145/1/10/">BOSS overview paper</a>.</dd>

<dt>Serendipitous objects</dt>
<dd>Quasars might be targeted by chance by other programs, such as the luminous galaxy survey.
In order to be as complete as possible, we also tried to identify serendipitous quasars.
In particular, objects that the pipeline identified as QSO with z&gt;2, or GALAXY/BROADLINE objects have
been inspected.</dd>
</dl>

<h3>Visual inspection</h3>

<p>
The visual inspection is performed to
(i) secure the identification of the objects,
(ii) reliably estimate the emission redshift of quasars, and
(iii) identify peculiar features sucha as Damped Lyman-α systems (DLA) and Broad Absorption Lines (BAL).
We therefore manually confirmed or modified the identification of the object and,
when needed, corrected the redshift provided by the pipeline, <em>i.e.</em> when it was wrong
(when <em>e.g.</em> an emission line is misidentified or a bad feature is
considered an emission line) or inaccurate (when emission lines are correctly
identified but not properly centered).
</p>
<p>
After visual inspection, each quasar candidate is classified among one of the following categories:
QSO, QSO_BAL, QSO_Z? when we know this is a quasar but its redshift is not certain, QSO_? when the object
is possibly a quasar, Star, Star_? when the object is possibly a star, Galaxy, ? when the identification is uncertain or Bad
when the data are not good enough to ascertain identification.
The SDSS-DR10 Quasar Catalog only contains secure identifications (<em>i.e.</em> QSO and QSO_BAL).
We provide the result of the visual inspection of the full superset used to derive DR10Q.
</p>


<!-- CATALOG CONTENT DESCRIPTION -->

<h2>Catalog content</h2>

<p>
The full content of the SDSS-DR10 Quasar Catalog content can be found in Table 3 of <a href="http://arxiv.org/abs/1311.4870">Pâris et al. (2013)</a>
and the detailed description of the data model is available
<a href="http://data.sdss3.org/datamodel/files/BOSS_QSO/DR10Q/DR10Q.html">here</a>.
</p>

<!-- DESCRIPTION OF THE FILES -->

<h2 id="files">Description of the files</h2>

<p>
<b>Note: The main catalog, supplemental list and superset files have been updated (v2) to correct for a bug in the SDSS object name that existed in the first released version. </b>
</p>

<h3>The SDSS-DR10 Quasar Catalog (DR10Q)</h3>
<p>
This file contains all the quasars of the SDSS-DR10 Quasar Catalog.
166,583 quasars have been identified.
This sample is the one used by the SDSS-BOSS collaboration.
</p>
<p>
<a href="http://data.sdss3.org/sas/dr10/boss/qso/DR10Q/DR10Q_v2.fits">DR10Q.fits</a> (177 MB): SDSS-DR10Q (Main catalog, fits format)
</p>


<h3>Supplemental list</h3>
<p>
We also provide a supplemental list of an additional 2,376 quasars that have
been identified, respectively, among the galaxy targets of the BOSS and among
missed QSO targets.</p>


<p>Though the supplemental list has strictly the same format as
the main catalog, note that pieces of information can be missing for
some objects. In that case, the corresponding value in the column
(<em>e.g.</em> "-1" or "-9999" or "0" etc...) has no meaning (see <a href="http://arxiv.org/abs/1311.4870">Pâris et al. 2013</a>).
Only the identification of the object should be considered as secure.
</p>

<p>
<a href="http://data.sdss3.org/sas/dr10/boss/qso/DR10Q/Supplementary_DR10Q_v2.fits">Supplementary_DR10Q.fits</a> (3 MB): Supplemental list (fits format)
</p>


<h3>Superset used to derive DR10Q</h3>

<p>
We provide the result of the visual inspection for the whole superset used to derive DR10Q.
The meaning of Z_CONF_PERSON and CLASS_PERSON is given in Table 2 of <a href="http://arxiv.org/abs/1311.4870">Pâris et al. 2013</a>.
</p>

<p>
<a href="http://data.sdss3.org/sas/dr10/boss/qso/DR10Q/Superset_DR10Q_v2.fits">Superset_DR10Q.fits</a> (76 MB): Superset used to derive DR10Q (fits format)
</p>


<?php echo foot(); ?>

