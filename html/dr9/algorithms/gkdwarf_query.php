<?php include '../../header.php'; echo head('Queries to Isolate the Complete SEGUE-1 G and K dwarf Sample'); ?>

<h2>Introduction</h2>

<p>This multi-part query extracts the best spectroscopic observation of
all targets in SEGUE-1 that meet the criteria of a G or K dwarf. For
some of these targets, the best version of the spectrum is from SEGUE-2.
Below, we include each component of the SQL query for DR9 and a brief description
of what it does. </p>


<h2>Query 1</h2>

<p>Using the bitmasks from segueTargetAll, this extracts
information for all targets that meet the criteria of a G-dwarf,
regardless of whether or not they also fulfill the criteria
of other SEGUE categories. It also ensures that the spectroscopic
observation will be science quality. The resulting table will
have duplicate spectra (e.g., multiple <i>specobjid</i> for
a single <i>bestobjid</i>. </p>

<pre>
SELECT
--any information you need from the various tables

INTO mydb.query1

FROM SpecObjAll as so
JOIN PlateX as px on so.plateid = px.plateid
JOIN sppParams as sp on sp.bestobjid = so.bestobjid
JOIN segueTargetAll as sta on so.bestobjid = sta.objid
JOIN PhotoObjAll as poa on so.bestobjid = poa.objid
JOIN ProperMotions as pm on poa.objid = pm.objid


WHERE so.programname like '&#37;segue&#37;'
--The above statement ensures that all targets are pulled from
--either the segue or seguefaint programs
AND so.survey = 'segue1'
--This specifies that all targets must be from the SEGUE-1 survey
--as SEGUE-2 does not explicitly target these categories
AND (sta.segue1_target1 &amp; 0x40000) &#33;= 0
--The DR9 photometry must meet the criteria of a G-dwarf
--For K dwarf stars, replace 0x40000 with 0x8000
AND px.isprimary = 1
--Requires the plate to be science quality
AND sp.scienceprimary = 1
--Requires the observation to be science quality
ORDER BY sp.bestobjid
--Organizes the resulting sample by bestobjid

</pre>

<h2>Query 2</h2>

<p>Using the <i>bestobjid</i> for each photometric target, we then
make a list of all of the unique targets from the table produced in Query
1. </p>

<pre>
SELECT
  bestobjid, count(bestobjid) as count

INTO mydb.query2
FROM mydb.query1

GROUP BY bestobjid
HAVING count(bestobjid) = 1
</pre>

<h2>Query 3</h2>

<p>This query uses the list made in Query 2 to pull out
the data from Query 1 for all unique targets. </p>

<pre>
SELECT
  q1.*

INTO mydb.query3
FROM mydb.query1 as q1
JOIN mydb.query2 as q2 on q1.bestobjid=q2.bestobjid
</pre>

<h2>Query 4</h2>

<p>We then consider the duplicate spectra, making a list
of all <i>bestobjid</i> with more than one <i>specobjid</i>. There is
only one row for each target in the resulting data set.</p>

<pre>
SELECT

bestobjid, count(bestobjid) as count

INTO mydb.query4
FROM mydb.query1

GROUP BY bestobjid
HAVING count(bestobjid) > 1
</pre>

<h2>Query 5</h2>

<p>Extract all of the information from the Query 1 table for each of the duplicate
observations. One <i>bestobjid</i> will have multiple rows of
data in this file. </p>

<pre>
SELECT
q1.*

INTO mydb.query5
FROM mydb.query1 as q1

JOIN mydb.query4 q4 on q4.bestobjid = q1.bestobjid
ORDER BY q1.bestobjid
</pre>

<h2>Query 6</h2>

<p>To get the best sample of stars from the duplicate spectra, we pull
out all of the observations on the bright plates (<i>programname</i>
is <i>segue</i> rather than <i>seguefaint</i>). There will still be
some duplicates from geometric overlaps. </p>

<pre>
SELECT
*
FROM mydb.query5
INTO mydb.query6
WHERE programname = 'segue'
ORDER BY bestobjid
</pre>

<h2>Query 7</h2>

<p>This goes through the data table from Query 6 and lists the
<i>bestobjid</i> for all targets that now only show up once (e.g.,
eliminates the geometric overlap duplicates). </p>

<pre>
SELECT

bestobjid, count(bestobjid)

INTO mydb.query7
FROM mydb.query6
GROUP BY bestobjid
HAVING count(bestobjid) = 1
</pre>

<h2>Query 8</h2>

<p>Query 8 creates a table for all of the <i>segue</i> plate
observations for the targets that were obsered multiple times. It
removes the targets which are duplicates due to geometric overlaps.</p>

<pre>
SELECT
q7.*

INTO mydb.query8
FROM mydb.query6 as q6
JOIN mydb.query7 as q7 on q7.bestobjid = q6.bestobjid
</pre>

<h2>Query 9</h2>

<p>This query pulls out the <i>bestobjid</i> for all geometric overlap
duplicate spectra. For example, the same line of sight observed on
plates 2042/2062 was studied by plate 2043/2063. Also, plates
2175/2178 line up with 2186/2189.</p>

<pre>
SELECT
q6.bestobjid, count(bestobjid)
INTO mydb.query9
FROM mydb.query6 as q6

WHERE q6.plate=2042 OR q6.plate=2043
OR q6.plate=2175 OR q6.plate=2178
OR q6.plate=2062 OR q6.plate=2063
OR q6.plate=2186 OR q6.plate=2189
GROUP BY q6.bestobjid
HAVING count(bestobjid)>1
</pre>

<h2>Query 10</h2>

<p>For all of the geometric overlap duplicates, extracts only the spectroscopic
observation FROM the brightest plates (2042 and 2175). </p>

<pre>
SELECT
q6.*
INTO mydb.query10
FROM mydb.query6 as q6
JOIN mydb.query9 q9 on q9.bestobjid = q6.bestobjid
WHERE q6.plate=2042 OR q6.plate=2175
</pre>

<h2>Final Step</h2>

<p>Download the resulting tables from Query 3 (data for all stars with
only one spectroscopic observation), Query 8 (data from the bright
plate for all duplicates except geometric overlaps), and Query 10
(bright data for geometric overlap duplicates). These three combined
make a complete G-dwarf sample, with the best, unique observation of
each target that meets the SEGUE selection criteria. </p>



<?php echo foot(); ?>
