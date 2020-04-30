<?php include '../../../header.php'; echo head('Using SEGUE and CASJobs'); ?>

<p>This page describes the SEGUE data available in the DR8 CAS database,
and how to access this data using queries composed in the SQL language. If
you would like to access the data using some other system, please go
to the <a href="dr8/data_access.php">Data Access for SDSS DR8</a> page. </p>

<p>The queries below have information about extracting the "science" data,
i.e., the stellar parameters and photometry, but it also includes important
information about data quality, selection information, and
other things one <i>must</i> consider when using the data for science investigations. </p>

<p>To start, some important definitions for spectroscopic data: </p>
<ul>
<li>An <i>object</i> is a star or galaxy at a particular location on the sky. It may
have multiple spectroscopic observations and thus, have multiple entries in the
catalog tables (like SpecObjAll, sppParams, and PhotoObjAll). </li>
<li>An <i>observation</i> is a spectrum of an object taken on a particular plate-MJD in a
particular fiberid. It is defined by a <i>specobjid</i>. </li>
<li> A plate-MJD combination is an observation of a plate, and is identified by a <i>plateid</i>. </li>
<li>All of the spectroscopic observations are matched to one and only one object
in the photometric catalog. No photometric duplicate observations were eligible
for the matches. The <i>objid</i> of that photometric catalog object is
in the <i>origobjid</i> parameter of the spectroscopic catalog tables. </li>
</ul>
<p>More information about the overall general organizational scheme of
SDSS-III spectroscopy is available at the <a href="dr8/spectro/spectro_basics.php">
Basics of SDSS Spectrograph Data</a> page. </p>

<p>Below we detail a number of queries that will be useful both for quality control
and general data access. To jump to a particular section, use the links below: </p>
<ul>
<li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#SQLBasics">SQL Basics</a>
    <ul>
        <li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Tables">SEGUE CAS Tables</a></li>
        <li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Join">Combining Information From Different Tables - Using JOIN</a></li>
        <li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Functions">Useful Functions for SEGUE</a></li>
        <li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Download">Downloading the FITS spectra</a></li>
        <li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#CommandLine">Running Queries from the Command Line</a></li>
    </ul>
</li>
<li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Quality">Ensuring Data Quality</a>
    <ul>
        <li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#PlateQuality">Plate Quality</a></li>
        <li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#RVCuts">Radial Velocity Quality</a></li>
        <li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#SNCuts">S/N Quality</a></li>
    </ul>
</li>
<li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Duplicates">Avoiding Duplicates</a></li>
<li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Cookbook">Dive right in: Some Sample Queries</a></li>
</ul>

<hr />

<h2 id="SQLBasics">A Brief Overview of SQL</h2>

<p>SDSSIII has resources for individuals just getting started with SQL. The material described below
is particularly useful for use with SEGUE data. However, we highly recommend you use the
provided <a href="http://skyserver.sdss3.org/dr8/en/help/howto/search/">SQL Tutorial</a> if you
are not familiar with the language. Complementing the tutorial, SDSSIII has many
<a href="http://skyserver.sdss3.org/dr8/en/help/docs/realquery.asp">SQL Sample Queries</a>
available. </p>

<p>Note that for the SQL language "---" is a comment, and <i>%</i> works similarly to
the * symbol in UNIX. </p>

<h3 id="Tables">SEGUE Tables in the DR8 CAS </h3>
<p> There are a number of tables in the DR8 CAS which are used to
access spectroscopic, and in particular, SEGUE, information. These
tables are documented in the schema browser <a href="http://skyserver.sdss3.org/dr8/en/help/browser/browser.asp">here</a> (select the Tables menu tab).
We have listed some of the useful parameters in each of the tables below. </p>
<ul>
<li><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=SpecObjAll&amp;t=U">Specobjall</a> -- For all spectra, plate, mjd, fiber, ra, dec</li>
<li><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=sppParams&amp;t=U">sppParams</a> -- [Fe/H], log g, T<sub>eff</sub>, Radial Velocity for all stellar objects</li>
<li><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=sppLines&amp;t=U">spplines</a> -- Equivalent widths for common lines in stars</li>
<li><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=PhotoObjAll&amp;t=U">PhotoObjAll</a> -- Dereddened magnitudes for all stars </li>
<li><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=Star&amp;t=U">Star</a> -- Subset (View) of PhotoObjAll table with all Primary Stellar photometric detections.</li>
<li><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=segueTargetAll&amp;t=U">segueTargetAll</a> -- Target selection flags for all photometric objects</li>
<li><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=sppTargets&amp;t=U">sppTargets</a> -- Target selection flags for all spectroscopic objects</li>
<li><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=Plate2Target&amp;t=U">Plate2Target</a> -- Matches plates to targets observed on that line of sight</li>
<li><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=ProperMotions&amp;t=U">ProperMotions</a> -- Proper motions of the photometry</li>
<li><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=SpecPhotoAll&amp;t=U">specPhotoAll</a> -- pre-determined match between SpecObjAll and PhotoObjAll (matched on flux, not position)</li>
<li><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=PlateX&amp;t=U">PlateX</a> -- Table of all plates, plate centers in RA, Dec, programnames </li>
</ul>


<h3 id="Join">Joining Different Tables</h3>
<p>The <i>JOIN</i> statement is the key to combining information from multiple data tables. Suppose one has a
database with two tables: </p>
<ul>
<li><i>sppParams</i> with parameters for all spectroscopically-observed stars</li>
<li><i>star</i> with parameters for all photometrically-observed stars </li>
</ul>
<p>One wishes to match up the two tables to obtain both photometric and spectroscopic data for all stars,
merged into a single one-row-per-star output file. Normally, a match is done on RA and Dec, requiring
that photometric and spectroscopic objects have positions within 1 arcsec or so of each other. However,
this two dimensional match can be very time consuming. One can "pre-match" objects to save time. </p>

<p>Every spectroscopic object has a unique id, a 64-bit integer, composed of its triplet component
ids, i.e., plate-mjd-fiberid. This number is called the <i>specobjid</i>. Every photometric object also
has a unique identification, also a 64-bit integer, composed of its heptuple components (run, rerun,
camcol, field, obj, firstfield, skyversion). This is called <i>objid</i> in PhotoObjAll. </p>

<p>A matching procedure was run in the database after initial loading which sought to match up
every spectroscopic object with a photometric object via RA and Dec position. If a match was found
then the parameter <i>origobjid</i> in the spectroscopic table was filled in with the <i>objid</i>
value from the photometric table. Similarly, the <i>specobjid</i> parameter in the photometric tables
was filled in with the <i>specobjid</i> from the spectroscopic table. Because the photometric table is
much larger than the spectroscopic table, most <i>specobjid</i> in the photometry are 0, as there
is no associated spectrum. There are a number of entries in the spectroscopic data which have no matching
photometry; for them, <i>origobjid</i> is set to 0. This latter case often happens for
a "SKY" spectrum, which is pointed at a blank piece of sky, with no star or other imaging object
underneath. </p>

<p>With these matching fields in place, one can use a <i>JOIN</i> query in SQL to rapidly match
up objects between the two tables. For a very basic example, the
parameter <i>origobjid</i> links up the sppParams and PhotoObjAll tables: </p>
<pre>
SELECT sp.origobjid, ph.objid as photoobjall_origobjid
FROM sppParams as sp
JOIN PhotoObjAll as ph ON sp.origobjid = ph.objid
</pre>

<p>The query above is much faster than matching objects by RA and Dec, which can take on the order
of days to weeks for a similar query. Note that if you fail to include the <i>ON</i> condition in the
<i>JOIN</i> statement, CASJobs will try to do a cross product, attempting to return all of the
approximately 540 trillion objects made up of photometry and spectroscopy matched in every
possible combination. This will quickly fill up all of your myDB disk space before it even comes
close to completing. Do not use any <i>JOIN</i> statements without the <i>ON</i> clause
statement to prevent a runaway. </p>

<p>Most of the tables have various ways to link up to the others. A handy crib sheet for the
major tables is included below.</p>

<table class="common">
<caption>SEGUE 1 and 2 Tables</caption>
<tr style="font-size:small;"><th>Data Table</th>      <th>PlateX</th>          <th>sppParams</th>                             <th>SpecObjAll</th>                            <th>PhotoObjAll</th>                              <th>sppLines</th>   <th>ProperMotions</th>                          <th>SegueTargetAll</th>            <th>Star</th></tr>
<tr style="font-size:x-small;"><td> PlateX         </td><td>                </td><td>PlateID                               </td><td>PlateID                               </td><td>RA, Dec region                           </td><td>Plate      </td><td>                                       </td><td>                          </td><td>                          </td></tr>
<tr style="font-size:x-small;"><td> sppParams      </td><td>PlateID         </td><td>                                      </td><td>specobjid or origobjid                </td><td>origobjid (match with poa.objid)         </td><td>SpecObjId  </td><td>origobjid (match with pm.objid)        </td><td>objid (with sp.origobjid) </td><td>Objid (with sp.origobjid) </td></tr>
<tr style="font-size:x-small;"><td> SpecObjAll     </td><td>PlateID         </td><td>specobjid or origobjid                </td><td>                                      </td><td>origobjid (match with poa.objid)         </td><td>SpecObjId  </td><td>origobjid (match with pm.objid)        </td><td>objid (with soa.origobjid)</td><td>Objid (with soa.origobjid)</td></tr>
<tr style="font-size:x-small;"><td> PhotoObjAll    </td><td>RA, Dec region  </td><td>objid (with sp.origobjid)             </td><td>objid (with soa.origobjid)            </td><td>                                         </td><td>specobjid  </td><td>objid                                  </td><td>objid                     </td><td>objid                     </td></tr>
<tr style="font-size:x-small;"><td> sppLines       </td><td>Plate           </td><td>specobjid                             </td><td>specobjid                             </td><td>specobjid                                </td><td>           </td><td>specobjid                              </td><td>                          </td><td>specobjid                 </td></tr>
<tr style="font-size:x-small;"><td> ProperMotions  </td><td>                </td><td>origobjid (with pm.objid)             </td><td>origobjid (with pm.objid)             </td><td>objid                                    </td><td>specobjid  </td><td>                                       </td><td>objid                     </td><td>objid                     </td></tr>
<tr style="font-size:x-small;"><td> SegueTargetAll </td><td>                </td><td>origobjid (with sta.objid)            </td><td>origobjid (with sta.objid)            </td><td>objid                                    </td><td>           </td><td>objid                                  </td><td>                          </td><td>objid                     </td></tr>
<tr style="font-size:x-small;"><td> sppTargets     </td><td>PlateID         </td><td>origobjid (with spt.objid)            </td><td>origobjid (with spt.objid)            </td><td>objid                                    </td><td>specobjid  </td><td>objid                                  </td><td>objid                     </td><td>objid                     </td></tr>
<tr style="font-size:x-small;"><td> Plate2Target   </td><td>PlateID         </td><td>origobjid (with p2t.objid)            </td><td>origobjid (with p2t.objid)            </td><td>objid                                    </td><td>           </td><td>objid                                  </td><td>objid                     </td><td>objid                     </td></tr>
<tr style="font-size:x-small;"><td> SpecPhotoAll   </td><td>PlateID         </td><td>specobjid, origobjid (with spa.objid) </td><td>specobjid, origobjid (with spa.objid) </td><td>objid                                    </td><td>specobjid  </td><td>objid                                  </td><td>objid                     </td><td>objid                     </td></tr>
<tr style="font-size:x-small;"><td> Star           </td><td>                </td><td>origobjid (with st.objid)             </td><td>origobjid (with st.objid)             </td><td>objid                                    </td><td>specobjid  </td><td>objid                                  </td><td>objid                     </td><td>                          </td></tr>
</table>


<p>Not all of the tables connect easily. Sometimes, it will require connecting them
through another table. Also note that this chart is just to get you started using <i>JOIN</i>s.
ALWAYS verify the database matching yourself. </p>

<h4>More Intricate Joins</h4>

<p>As mentioned earlier, there are some <i>specobjid</i> values in the photometry tables and
some <i>origobjid</i> values in the spectroscopy table set to 0, indicating that there is no spectrum
of a photometric object for the former and no imaging object for the latter. There are ways
to join parts of two tables which allow for non-matches in certain cases. These are called
<i>LEFT OUTER JOIN</i> and are more advanced SQL. </p>

<p>For example, suppose you want all of the photometric data within a particular region in
addition to any spectroscopic information for targets assigned fibers. If a particular target
does not have any spectroscopic information, this query assigns the values -999 to the columns. </p>

<pre>
SELECT  ph.*,isnull(sppobj.specobjid,-999)
FROM PhotoObjAll as ph
LEFT OUTER JOIN
(SELECT
soa.*
FROM SpecObjAll as soa
JOIN PhotoObjAll as ph on soa.origobjid = ph.objid)
AS sppobj
ON sppobj.origobjid = ph.objid
</pre>

<p>More information about these advanced <i>JOIN</i>s is available on the
<a href="http://skyserver.sdss3.org/dr8/en/help/docs/realquery.asp#outer">
SDSSIII SQL Sample Queries page</a>. </p>

<h3 id="Functions">Useful Functions for SEGUE</h3>

<p>There are a number of useful functions included in CASJobs.
A list of these functions with brief explanations and instructions is
available in the <a href="http://skyserver.sdss3.org/dr8/en/help/browser/browser.asp">
SDSSIII DR8 Function Browser</a>. </p>

<p>Below we list a few of the functions which are particularly useful with SEGUE data
and a brief description of them. </p>

<table class="common">
<caption>Useful SQL Functions</caption>
<tr><th>Function</th><th>Description</th></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=fDMS&amp;t=F">fDMS</a>                                    </td><td>Converts declination in degrees to +dd:mm:ss.ss notation </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=fDocColumns&amp;t=F">fDocColumns</a>                      </td><td> Returns information about all of the columns in a particular data table, including
data type and descriptions of the parameters </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=fDocFunctionParams&amp;t=F">fDocFunctionParams</a>        </td><td>Provides information about the input and output parameters for a specified function </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=fGetLat&amp;t=F">fGetLat</a>                              </td><td>Converts a 3-vector to Latitude </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=fGetLon&amp;t=F">fGetLon</a>                              </td><td>Converts a 3-vector to Longitude </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=fGetNearbyObjEq&amp;t=F">fGetNearbyObjEq</a>              </td><td>Given an RA and Dec, this function will return a table of all primary photometric objects
within a specified distance (in arcminutes) of the point </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=fGetNearbySpecObjEq&amp;t=F">fGetNearbySpecObjEq</a>      </td><td>Given an RA and Dec, this function will return all primary spectroscopic objects
within a specified distance (in arcminutes) of the point </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=fGetNearestSpecObjIdEq&amp;t=F">fGetNearestSpecObjIdEq</a></td><td>Searches within a specifed radius about a given RA and Dec for the nearest scienceprimary
spectroscopic observation </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=fGetObjectsEq&amp;t=F">fGetObjectsEq</a>                  </td><td>Returns all objects within a specified radius of a given RA and Dec </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=fGetObjFromRect&amp;t=F">fGetObjFromRect</a>              </td><td>Returns a table of objects within a rectangle defined by two RA and Dec pairs</td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=fHMS&amp;t=F">fHMS</a>                                    </td><td>Converts RA from degrees to +hh:mm:ss.ss notation </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr8/en/help/browser/description.asp?n=fSpecDescription&amp;t=F">fSpecDescription</a>            </td><td>Returns a string indicating class, status and zWarning for a given specObj </td></tr>
</table>

<h3 id="Download">Downloading the FITS spectra</h3>

<p>What if I have a <i>plate</i>, <i>mjd</i>, <i>fiberid</i> of an object of interest and
wish to download the actual spectrum in FITS format for further analysis?</p>

<p>The Science Archive Server (<a href="http://data.sdss3.org">SAS</a>)
is a portal into all the available DR8 images and spectra in FITS format.
The SEGUE and stellar spectra for DR8 are organized into three
<i>reruns</i>: rerun 26 which contains plates from the SDSS Legacy survey and
SEGUE-1 (plates 182 through 2974), rerun 103 which contains
a few special cluster plates, and
rerun 104, which contains SEGUE-2 plates (generally plate number > 3000).
Rerun 103 reexamined the cluster plates to improve flux calibration. Due to crowded
fields or a lack of photometry when the plate was designed, the list of stars used by the SDSS pipeline
for flux calibration needed to be edited by hand for these plates. Note that
for all of the reruns the actual pipeline was unchanged in any way that would
affect the science. </p>

<p> If you know which rerun your plate is in, you may go to the SAS archive for
that plate by pointing your browser at:
http://data.sdss3.org/sas/dr8/sdss/spectro/redux/$SPRERUN/$PLATE/
Where SPRERUN is 26,103 or 104 and PLATE is the plate number.
There you may download the spPlate-$PLATE-$MJD.fits file which contains the
640 spectra associated with that plate.
An easy-to-use browser for the SAS spectroscopic database is available
<a href="http://data.sdss3.org">here</a>.
</p>

<h3 id="CommandLine">Running Queries from the Command Line</h3>

<p>Although the CASJobs SQL interface is incredibly useful, if you need to run a large
series of queries, it can be useful to send them from the command line. There are
two methods of doing this, via <a href="http://skyservice.pha.jhu.edu/casjobs/casjobscl.aspx">Java</a>
or <a href="http://skyserver.sdss3.org/dr8/en/help/download/sqlcl/default.asp">Python</a>. Both
methods are thoroughly explained at the links. </p>

<hr />

<h2 id="Quality">Quality Cuts</h2>

<h3 id="PlateQuality">Selecting SEGUE plates on Quality</h3>

<p>PlateX contains information about the data quality of every SEGUE plate in the parameter <i>plateQuality</i>.
This parameter was determined by checking the S/N of stars with g-r color of old MS turnoff at g=18.* </p>


<table class="common">
<tr><th>Plate Type</th><th>S/N constraint</th></tr>
<tr><td>SEGUE-1 Bright</td><td>>7.5</td></tr>
<tr><td>SEGUE-1 Faint</td><td>>16</td></tr>
<tr><td>SEGUE-2 </td><td>>10</td></tr>
</table>
<p>*Note that the faint limit for SEGUE-1 bright plates is r &lt; 17.8.</p>

<p>These quality constraints ensure that all SEGUE-1 plates in DR7 are included in DR8.
The information used to determine the <i>plateQuality</i> parameter
is also included in PlateX, under the heading <i>snturnoff</i>. Additionally, the number of stars used to calculate
the S/N for each plate is under the heading <i>nturnoff</i>. </p>

<p>In addition to the <i>plateQuality</i> parameter, the quality information is distilled into two other PlateX table elements: </p>
<ul>
<li> <i>isBest</i>: set to 1 for the highest S/N observation (a plate-mjd combination) of each plate. It is 0 for all other
observations of the plate.    </li>
<li> <i>isPrimary</i>:  set to 1 for a plate-mjd combination if it passes the S/N criteria used for <i>plateQuality</i> and is the highest
S/N observation of the plate. </li>
</ul>

<p>An important thing that <i>isBest</i> and <i>isPrimary</i> do is choose one and only one
observation of a plate. Note that if objects are targeted on multiple plates they will still be
present in a sample selected using criteria on <i>isBest</i> and <i>isPrimary</i>. Here
are some SQL examples using the parameters explained above: </p>

<ul>
<li> <p> To get a unique list of all plates in the "main" SEGUE-2 survey (i.e., not cluster plates), always picking the
highest S/N observation of each plate: </p>
<pre>
SELECT *
FROM platex px
WHERE px.survey = 'segue2'
AND px.programname LIKE '%segue%'
AND px.isPrimary = 1
</pre></li>
<li><p>To get all the SEGUE-1 and SEGUE-2 "main" plates that were placed at random on the sky: </p>
<pre>
SELECT *
FROM platex px
WHERE (px.survey = 'segue2' OR px.survey = 'segue1')
AND px.programname LIKE '%segue%'
AND px.isPrimary = 1
</pre></li>
<li><p>The query above can also be written:</p>
<pre>
SELECT *
FROM platex px
WHERE px.survey LIKE 'segue%'
AND px.programname LIKE '%segue%'
AND px.isPrimary = 1
</pre></li>

<li><p>If you determine that the placement of the plates does not bias a particular target selection
category in which you are interested, you could select from the SEGUE-1 <i>pointed</i> plates, too: </p>
<pre>
SELECT * FROM platex px
WHERE px.survey LIKE 'segue%'
AND (px.programname LIKE '%segue%' OR px.programname LIKE 'segpointed%')
AND px.isPrimary = 1
</pre></li>
</ul>

<p>Remember that even with these criteria, you can still get duplicate observations of
individual targets. </p>

<p>You can also examine the <i>plateQuality</i> parameter for individual plates to
see if you want to impose your own criteria. Keep in mind that the plates were
observed to a fixed S/N criteria, so the variation near the magnitude
limit where the <i>plateQuality</i> is evaluated is not large. It is probably more
useful to return the value of the S/N for each individual object in
your queries and select on that. The <a href="dr8/algorithms/segueii/segue_sqlcookbook.php#SNCuts">S/N quality</a>
section below expands on this. </p>

<h3 id="RVCuts">Radial Velocity Quality</h3>

<p>For radial velocities of stars, use the parameter <i>elodiervfinal</i> in the sppParams data table. To
ensure that the targets have well-determined radial velocities, add the
following two clauses to any query: </p>

<pre>
AND sppParams.elodiefinalerr &gt; 0
AND (sppParams.zwarning = 0 OR sppParams.zwarning = 16)
</pre>

<p>The parameter <i>zwarning</i> is a warning flag about the velocity determination. The clause
above ensures that this aspect of the reduction was normal. </p>

<h3 id="SNCuts">S/N Quality </h3>

<p>There are two S/N measurements made for each spectrum. The first is the
<i>sn_median</i> in the SpecObjAll table. This is the median S/N per
1&Aring; pixel in the extracted spectrum. </p>

<p>The second S/N parameter is typically more informative of the stellar spectra.
<i>snr</i> in the sppParams table is the S/N per 1&Aring; pixel in the
wavelength range from 4000 to 8000 &Aring;, the region typically used by the SSPP
for stellar parameter estimation. Note that the SSPP does not have any
parameters for stars with S/N &lt; 10. </p>

<p>Adding the following clause to any query will set a limit on the S/N of the
returned targets: </p>

<pre>
AND sppParams.snr &gt; 10
</pre>

<hr />

<h2 id="Duplicates">Avoiding Duplicates</h2>

<p>Some objects have multiple spectroscopic observations, either from being an intentional repeat,
as a QA target or as part of a different program, or from being on an overlapping plate.
To make sure that any query returns one and only one
spectroscopic observation of any object, and that it is the best (defined as the highest S/N)
observation of that object, the specObjAll table has an entry called <i>sciencePrimary</i>.
The criteria for an observation to be <i>sciencePrimary</i> and more general information is
available at the <a href="dr8/spectro/catalogs.php">SDSS Spectroscopic Catalogs</a> page.
Adding the following clause to a query will ensure that it returns a unique set of objects:</p>
<pre>
SELECT ...
FROM SpecObjAll as sp
WHERE sp.sciencePrimary = 1
AND ....
</pre>

<p>This same criteria will work for the sppParams table. The
PlateX parameters <i>survey</i> and <i>programname</i> are repeated in the SpecObjAll
and sppParams tables, making it unnecessary to join PlateX to those tables to
use the <i>sciencePrimary</i> selection criteria to specify <i>survey</i> and <i>programname</i>.</p>

<p>If, for any particular reason, you do not want to use the <i>sciencePrimary</i> parameter
to eliminate duplicates, you can examine the number of times a particular target appears in CASJobs output by
using the <i>count</i> function. For example, to examine the number of times each <i>origobjid</i> value
appears in a particular sample, as there will be repeats, one would use the following query: </p>
<pre>
SELECT sp.origobjid, count(sp.origobjid) as count
FROM SpecObjAll as sp
group by sp.origobjid
</pre>

<p>The query above lists every <i>origobjid</i> in the SpecObjAll and the number of times it appears. If you
want to avoid any target that is observed multiple times, which will severly limit any sample, you can use
the following query: </p>
<pre>
SELECT sp.origobjid, count(sp.origobjid) as count
FROM SpecObjAll as sp
group by sp.origobjid
having count(sp.origobjid) = 1
</pre>

<p>Similarly, altering the query above to read <i>having count(sp.origobjid) &gt; 1</i> would list every target that
is observed multiple times. The query above can be particularly useful as a number of SEGUE-1 targets are
reobserved as part of SEGUE-2. Oftentimes, this results in a SEGUE-1 target having its <i>sciencePrimary</i>
observation on a SEGUE-2 plate. By examining the duplicates, one can isolate this issue for a particular sample if
necessary. </p>

<p>The <i>JOIN</i> below on <i>origobjid</i> extracts targets from sppParams and matches them up
with entries from SpecObjAll and PhotoObjAll. It specifically pulls out G dwarf targets that were
observed as part of SEGUE-1 and then re-observed in SEGUE-2. This query returns the <i>plate</i>,
<i>mjd</i>, and <i>fiberid</i> for the target in both surveys. Additionally, one can compare the
radial velocity determined by SEGUE-1 to that from SEGUE-2. Note that the <i>sp.sciencePrimary</i>,
which is associated with the SEGUE-2 measurements are all set to 1, whereas <i>so.sciencePrimary</i>,
associated with the SEGUE-1 observations, is 0. </p>

<p>One can remove these duplicate SEGUE-1 observations by looking for the <i>objType</i> field in the SpecObjAll table.
Note that although there are multiple spectroscopic observations, there is only one photometric match for the targets.
</p>

<pre>
SELECT top 100
sp.plate, sp.mjd, sp.fiberid, sp.specobjid, sp.origobjid,so.elodiez*3e5+7.3 as rvsegue2,
sp.elodiervfinal as rvsegue1, sp.elodiervfinalerr, sp.teffadop, sp.fehadop, sp.loggadop,
ph.psfmag_g, ph.psfmag_r, ph.psfmagErr_g, ph.psfmagErr_r,
ph.ra, ph.dec, ph.extinction_r, ph.l, ph.b,
so.plate as segue1plate, so.mjd as segue1mjd, so.fiberid as segue1fiberid,
so.survey as segue1survey, so.programname as segue1programname, sp.sciencePrimary, so.sciencePrimary as soSP
FROM sppParams sp
JOIN SpecObjAll as so ON so.origobjid = sp.origobjid AND sp.sciencePrimary = 1
JOIN PhotoObjAll ph ON ph.objid = sp.origobjid
AND (so.segue1_target1 &amp; 262144)!=0
--Could also have used the clause (so.segue1_target1 &amp; 0x40000) != 0
WHERE so.survey = 'segue1'
AND sp.survey = 'segue2'
AND so.programname like 'segue%'
AND elodiervfinalerr &gt; 0
</pre>

<p>It is critical to identify and account for duplicates in your sample, both from the perspective of avoiding
repeats and to ensure a complete sample. </p>

<hr />

<h2 id="Cookbook">Dive Right in:  Some Sample queries</h2>

<p>The following SEGUE-specific queries are a good place to get started.
Open up a window into DR8 CasJobs or the DR8 CAS SQL and cut and paste
these queries to get a sense for how to extract SEGUE spectral parameters
for stars. </p>

<p>Many of the queries below potentially return a lot of objects.
We have included the phrase <i>top 10</i> to limit the number of targets
returned. You can remove the <i>top 10</i> phrase after
the <i>SELECT</i> statements and CAS/CASJobs will return all objects that
satisfy your query <i>WHERE</i> clause, rather than just the first 10 objects.
Starting with <i>top 10</i> until everything appears to be working is a
good way to debug complex queries quickly. It can also be used as a quick check to
see what columns a particular data set contains. </p>

<p>It is <i>always</i> a good idea to return the <i>plate</i>, <i>MJD</i>, and <i>fiberid</i> parameters for the
queries of spectroscopic data tables. It is also very
useful to return the <i>specobjid</i> and  <i>origobjid</i>
for efficient matching to other tables later. </p>

<p>Jump to Sample Queries:</p>
<table class="noborder">
<tr>
<td valign="top">
<ul>
<li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#RADEC">Rectangular RA and Dec Search</a></li>
<li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Program_ID">Selecting by Survey and Programname</a> </li>
<li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Category_ID">Extracting Specific Stellar Categories</a> </li>
</ul></td>
<td valign="top">
<ul>
<li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Stellar_Params">Extracting Stellar Parameters</a> </li>
<li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Col_Mag_Cuts">Color and Magnitude Cuts, with Join</a> </li>
<li><a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Phot_by_Plate">Extract Photometric Targets for Particular Plate</a> </li>
</ul>
</td>
</tr>
</table>

<h3 id="RADEC">RA and Dec Rectangular Search </h3>
<p>To get spectroscopic catalog information for stars in a range of RA and Dec,
returning only the unique and best observation of each:</p>
<pre>
SELECT top 10
sp.plate, sp.mjd, sp.fiberid,
p.run,p.rerun,p.camcol,p.field,p.obj,
--The parameters above have information about the observation of the particular target, such as when and as what field.
--They are very useful for organization and matching different datasets.
s.elodiervfinal,s.elodiervfinalerr,
s.teffadop, s.fehadop, s.fehadopunc,s.loggadop,
sp.ra, sp.dec,
p.psfmag_g,p.psfmag_g-p.extinction_g as g0,
p.psfmag_u-p.psfmag_g as umg,
p.psfmag_u-p.psfmag_g-p.extinction_u+p.extinction_g as umg0,
p.psfmag_g-p.psfmag_r as gmr,
p.psfmag_g-p.psfmag_r-p.extinction_g+p.extinction_r as gmr0
FROM sppParams as s
JOIN SpecObjAll as sp ON s.specobjid = sp.specobjid
JOIN PhotoObjAll as p ON sp.origobjid = p.objid
WHERE sp.ra &gt; 180.0 AND sp.ra &lt; 220.0
AND sp.dec &gt; -1.5 AND sp.dec &lt; 1.5
AND sp.sciencePrimary = 1
AND s.elodiervfinalerr &gt; 0
</pre>

<p>The above basic query joins together the table of all spectra, SpecObjAll,
with the table of stellar spectroscopic parameters (radial velocity,
metallicity, surface temperature, surface gravity), sppParams, and
photometry for the related imaging (g magnitude, colors, de-reddened colors) from the table PhotoObjAll.
<i>JOIN</i> statements are briefly described <a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Join">here</a> and
on the <a href="http://skyserver.sdss3.org/dr8/en/help/docs/realquery.asp">dr8 Sample SQL Queries</a>, </p>

<p>Two <i>JOIN</i>s are required for this very common template query.  The clause
<i>specobjall.sciencePrimary = 1</i> results in a unique list of spectra
(without duplicates), and the clause <i>sppParams.elodiervfinalerr &gt; 0</i>
ensures that we have a spectrum of a star and not a 'noise object'
such as a sky fiber.  The connection to the photometric information (from PhotoObjAll) is done by
requiring <i>specobjall.origobjid = photoobjall.objid</i>.
Approximately 0.5% of spectra provided do not have matching DR8 photometry.
Photometry for those objects may be found in DR7 if necessary, as explained below. </p>

<p>The sppParams table has an identical <i>origobjid</i> to that in SpecObjAll for joins to the
photometry. In DR7, this join was done via a field called <i>bestobjid</i>.
In DR8, <i>bestobjid</i> also exists, but it is a 'best flux match', used for deblended
galaxies, and it is not always the best match for stars. Thus, we recommend that
for matching between star spectra, corresponding photometry (color, magnitude), and proper motion information,
one should use the position match term <i>origobjid</i> from the various spectroscopic tables.</p>

<h4> Variant with Proper motion match</h4>

<p>Here is a variant on the above query which also returns proper motion information for each object. This
requires an additional <i>JOIN</i> to the ProperMotions table. </p>

<pre>
SELECT top 10
sp.plate, sp.mjd, sp.fiberid,
p.run,p.rerun,p.camcol,p.field,p.obj,
--The parameters above have information about the observation of the particular target, such as when and as what field.
--They are very useful for organization and matching different datasets.
s.elodiervfinal,s.elodiervfinalerr,
s.teffadop, s.fehadop, s.fehadopunc,s.loggadop,
sp.ra, sp.dec,
p.psfmag_g,p.psfmag_g-p.extinction_g as g0,
p.psfmag_u-p.psfmag_g as umg,
p.psfmag_u-p.psfmag_g-p.extinction_u+p.extinction_g as umg0,
p.psfmag_g-p.psfmag_r as gmr,
p.psfmag_g-p.psfmag_r-p.extinction_g+p.extinction_r as gmr0,
pm.pmra,pm.pmdec,pm.pmraerr,pm.pmdecerr,pm.pml,pm.pmb,pm.match,pm.delta,pm.O,pm.E
FROM sppParams as s
JOIN SpecObjAll as sp ON s.specobjid = sp.specobjid
JOIN PhotoObjAll as p ON sp.origobjid = p.objid
JOIN ProperMotions as pm ON p.objid = pm.objid
WHERE sp.ra &gt; 180.0 AND sp.ra &lt; 220.0
AND sp.dec &gt; -1.5 AND sp.dec &lt; 1.5
AND sp.sciencePrimary = 1
AND s.elodiervfinalerr &gt; 0
</pre>


<h4>Missing DR8 photometry</h4>

<p>All SEGUE-1 and SEGUE-2 spectra were targeted off of DR7 photometry.
The latest DR8 photometry is also available for nearly all objects; however,
for a small fraction of fields (about 0.5%), the DR8 run of the photo pipeline
timed out before it finished cataloging and deblending objects. This is usually because
there is a bright star in the field with scattered light wings that
cause the deblender to think especially hard.  There are about 12,300 stellar
spectra where this is true in DR8. To extract these, search for targets with
<i>sppparams.origobjid = 0 </i> and <i>sppparams.elodiervfinalerr &gt; 0</i>, while rejecting
sky spectra by excluding objects with <i>sp.objtype = 'SKY'</i> or <i>sp.sectarget != 16</i>. </p>

<p>One can still find the photometry for these objects by looking in the DR7 database and
doing a position match.  This requires a two stage query, as follows.</p>

<p>1) Select RA, Dec and other spectral parameters of objects with no DR8 photometry and put them into
    your myDB as a table named <i>mydb.orphandr8spectra</i>: </p>

<pre>
SELECT  s.plate,s.mjd,s.fiberid,ra,dec,elodiervfinal,elodiervfinalerr,fehadop,loggadop,
sp.objtype,sp.primtarget,sp.sectarget
INTO mydb.orphandr8spectra
FROM sppparams s,specobjall sp
WHERE s.specobjid = sp.specobjid
AND s.origobjid = 0
AND s.scienceprimary =1
AND elodiervfinalerr &gt; 0
AND sp.objtype != 'SKY'
AND sp.sectarget != 16
</pre>

<p>2) Use the RA, Dec of these objects and the built-in function <i>fGetNearestObjIdAllEq</i> to get the
DR7 <i>objid</i> of these objects: </p>

<pre>
SELECT top 10
s.run,s.rerun,s.camcol,s.field,s.obj,
s.ra as pra,s.dec as pdec,s.psfmag_g,s.psfmag_r,m.*
FROM mydb.orphandr8spectra m, dr7.photoobjall s
WHERE dbo.fGetNearestObjIdAllEq(m.RA,m.DEC,0.03) = s.objid
</pre>

<p>The function above uses a radius of 0.03 arcminutes (= 1.8 arcseconds). This value is large enough to
allow for slight differences in position, but small enough to avoid mismatches.
More information about this function is available in the
<a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Functions">Built In Functions</a> section.
</p>

<p>Running this query (esp. with the <i>top 10</i> removed) in the DR7 context
rather than the DR8 context makes the query run significantly faster, and
this is recommended for queries which access only DR7 (and MyDB) information.
This query can find photometric information for about 5,456 of the 12,338 objects missing DR8 photometry.</p>

<h3 id="Program_ID">Extracting Plate Information by Programname</h3>

<p>The SEGUE survey consists of both a number of surveys (namely SEGUE-1 and SEGUE-2) which
in turn encompass a number of observing programs, such as a focus on open and globular clusters
or low latitudes. These are detailed in the <a href="dr8/algorithms/segueii/plate_table.php">
Surveys and Programs in SEGUE</a> page. </p>

<p>The PlateX table has details on individual plates, from the basics, like RA and Dec, to more
intricate information, such as the programname. The
following describes some of the useful information in this table and how to use it to your
advantage. </p>

<p> The <i>survey</i> parameter in PlateX varies depending on why a particular plate was observed. For
most SEGUE plates, <i>survey</i> will be <i>segue1</i>, <i>segue2</i>, or <i>sdss</i>. For later data releases,
it could also be <i>boss</i>, <i>marvels</i>, or <i>apogee</i>. In addition, every plate is also labeled with
<i>programname</i>. This parameter provides information about the location and purpose for a particular plate,
i.e., what aspect of SEGUE was the plate observed for? The programnames are
listed below: </p>

<table class="noborder">
<tr>
<td valign="top">
<ul>
<li> segue</li>
<li> segpointed</li>
<li> seglowlat</li>
<li> segue2</li>
<li> segtest</li>
<li> segcluster</li>
</ul></td>
<td valign="top">
<ul>
<li>seguefaint</li>
<li>segpointedf</li>
<li>seglowlatf</li>
</ul>
</td>
</tr>
</table>

<p>By selecting on <i>survey</i> and <i>programname</i> it is possible to identify any desired subset of the SEGUE plates.</p>

<p>The query below returns the <i>plate</i>, <i>MJD</i>, <i>plateid</i>, and the <i>RA</i>, <i>Dec</i> of the plate center
for all of the cluster plates taken in either SEGUE-1 or SEGUE-2 in a DR8 context:</p>
<pre>
SELECT px.plate, px.programname, px.plateid, px.ra, px.dec
FROM platex as px
WHERE (px.survey = 'segue1' OR px.survey = 'segue2')
AND px.programname LIKE 'segcluster%'
</pre>

<h3 id="Category_ID">Extracting Specific Stellar Categories</h3>

<p>Just as you can use the PlateX dataset to extract all plates from a particular
program, you can also use various parameters to extract all targets within a particular
spectral category. The various target categories, and their different criteria, are detailed
for each of the surveys on the <a href="dr8/algorithms/segueii/segue_target_selection.php">Target Selection</a>
page. The organizational scheme for these parameters is described in the <a href="dr8/algorithms/segueii/bit_guide.php">
Bit Guide</a>. </p>

<h4 id="Fibers">Extracting Stars via Fiber Assignment</h4>

<p>Each target type is allotted a certain amount of fibers per plate. Using
CASJobs, you can ask for the spectroscopic catalog information for all objects
that were <i>assigned to fibers</i> as belonging to a particular target selection category
in SEGUE-1 and SEGUE-2. However, this will not get you every single target <i>that passes
the category criteria</i>. We detail how to extract these different samples below. </p>

<p>The SQL query detailed below will extract every single stellar target that
was assigned a fiber for a particular spectral category. This query does not
account for the fact that, in SEGUE-1 especially, the target selection criteria
for several of the categories evolved over the course of the survey. A particular
star may have been targeted using early criteria, but would not have been
observed using the latest selection algorithms. </p>

<p>The values in the SpecObjAll and sppParams target selection bitmasks are based
on the criteria as they were at the time the plate was designed. The target selection
versions for individual plates are listed at the
<a href="dr8/algorithms/segueii/plate_table.php">SEGUE Plates page</a>. Detailed information
on the changing criteria is available at the <a href="dr8/algorithms/segueii/previous_tselec_seg1.php">
Previous Versions page</a>. This intricacy is also detailed in Yanny et al. 2009. Accounting for
this nuance while looking at the targets by fiber category may require removing some plates
from your survey sample to ensure homogeneous target selection. </p>

<p>Given the above caveats, here is how to select the spectroscopic catalog information for
all objects that were targeted as, for example, the SEGUE-1 low metallicity candidates, and
take objects only from those plates in the SEGUE-1 survey (run in a DR8 context): </p>
<pre>
SELECT top 10
sp.*
FROM sppParams as sp
WHERE (sp.segue1_target1 &amp; 0x10000) != 0
AND sp.survey = 'segue1'
AND sp.programname like 'segue%'
</pre>

<p>The above query will also return all the duplicate observations of each object, too, if they
were given fibers on more than one plate in SEGUE-1 as low metallicity candidates.  </p>

<p>This brings up a third subtlety. Some of the targets that were assigned SEGUE-1 fibers for
a particular target category may have also been observed in other surveys or programs, and
the observation in the other program may be the <i>sciencePrimary=1</i> observation. In
that case, demanding that <i>sciencePrimary=1</i> in the above query will remove objects
from your sample that you intend to include. </p>

<h4 id="Category">Extracting Stars via Stellar Type Criteria</h4>

<p>It is possible to ask for the spectroscopic catalog information for all objects
that pass the target selection criteria for a particular category, <i>regardless of
why it was actually assigned a fiber</i>. This information is in the target
selection bitmasks of the SegueTargetAll table. This bitmask is
set once the survey was completed, using the latest target selection criteria.
Below is a query that asks for the catalog information for all objects that passed the
SEGUE-1 low metallicity target selection criteria, independent of why it was assigned a fiber.
This requires a <i>JOIN</i> on the SegueTargetAll table. Here, as an example of double <i>JOIN</i>s, we
also extract data from the PhotoObjAll table. </p>

<pre>
SELECT top 10
sp.segue1_target1, t.segue1_target1 as seg1_targ1, ph.psfmag_g
FROM sppParams sp
JOIN PhotoObjAll ph on sp.origobjid = ph.objid
JOIN SegueTargetAll t on ph.objid = t.objid
WHERE (t.segue1_target1 &amp; 0x10000) != 0
AND sp.survey = 'segue1'
AND sp.programname like 'segue%'
</pre>

<p>Whereas with the fiber assignment query, every target had <i>segue1_target1</i>
of -2147418112, with this new query one can see that this parameter varies. Not every
star that meets the low-metallicity criteria was assigned a fiber for this category. </p>

<p>In addition, a particular target can fulfill the criteria
for multiple spectral types, resulting in it having multiple bits set.
Specifying that <i>(t.segue1_target1 &amp; 0x10000) != 0</i> will
return all objects with that bit set, including objects that have other
target bits set as well. </p>

<p>As with the query based on fiber assignment, some of the targets here
may have been observed as part of other surveys or programs. Combining criteria
on <i>survey</i>, <i>programname</i>, and <i>sciencePrimary</i> can potentially
remove objects from your sample, so be conscientious! </p>

<p>The SEGUE target bitmasks are set for <i>all</i> objects in the
PhotoObjAll table, not just spectroscopic targets. Thus, it is possible
to get the entire sample of photometric candidates for each category for
each plate using a similar query to that above, but only using
PhotoObjAll and SegueTargetAll. </p>

<pre>
SELECT top 10
t.segue1_target1, count(t.segue1_target1)
FROM SegueTargetAll t
JOIN PhotoObjAll ph on ph.objid = t.objid
WHERE (t.segue1_target1 &amp; 0x10000) != 0
group by t.segue1_target1
</pre>

<h3 id="Stellar_Params">Extracting Stellar Parameters</h3>
<p>The queries below demonstrate how to access spectroscopic catalog information for the unique and best
observation of stars in a certain range of T<sub>eff</sub>, [Fe/H], and log(g).
When the SSPP is unable to calculate a particular stellar parameter for a target,
due to things such as a substandard S/N, the placeholder in the data table is
-9999. Thus, we specify the parameter ranges to avoid these undetermined parameters.  </p>

<pre>
SELECT top 100
sp.plate, sp.mjd, sp.fiberid, sp.specobjid, sp.origobjid,
sp.elodiervfinal, sp.teffadop, sp.fehadop, sp.loggadop
FROM sppParams as sp
WHERE sp.teffadop between 5500 and 6500
AND sp.fehadop &lt; -1
---This next clause avoids observations with no [Fe/H] determination
AND sp.fehadop &gt; -5
---This restricts the selection to stars with surface gravities within the range of Giants.
AND sp.loggadop &lt; 3
---This next clause avoids observations with no log(g) determination
AND sp.loggadop &gt; 0
AND sp.sciencePrimary = 1
</pre>

<p>We can expand the query listed above by adding in quality checks on
radial velocities and S/N. Additionally, the query below selects
only the spectra taken as part of the "main" SEGUE-1 and SEGUE-2 surveys:</p>

<pre>
SELECT top 100
sp.plate, sp.mjd, sp.fiberid, sp.specobjid, sp.origobjid,
sp.elodiervfinal, sp.teffadop, sp.fehadop, sp.loggadop
FROM sppParams as sp
WHERE sp.teffadop between 5500 and 6500
AND sp.fehadop &lt; -1
---This next clause avoids observations with no [Fe/H] determination
AND sp.fehadop &gt; -5
AND sp.loggadop &lt; 3
---This next clause avoids observations with no log(g) determination
AND sp.loggadop &gt; 0
AND sp.sciencePrimary = 1
AND sp.survey LIKE 'segue%'
AND sp.programname LIKE 'segue%'
---The next clause avoids targets which have warning flags about velocity/redshift determination
AND (sp.zwarning = 0 OR sp.zwarning = 16)
AND sp.elodiervfinalerr != 0
and sp.snr &gt; 35
</pre>

<p>Alternatively, one can use <i>BETWEEN</i> statements to replace
some of the conditional statements used above: </p>

<pre>
SELECT top 100
sp.plate, sp.mjd, sp.fiberid, sp.specobjid, sp.origobjid,
sp.elodiervfinal, sp.teffadop, sp.fehadop, sp.loggadop
FROM sppParams as sp
WHERE sp.teffadop between 5500 and 6500
AND sp.fehadop between -5 and -1
AND sp.loggadop between 0 and 3
AND sp.sciencePrimary = 1
AND sp.survey LIKE 'segue%'
AND sp.programname LIKE 'segue%'
---The next clause avoids targets which have warning flags about velocity/redshift determination
AND (sp.zwarning = 0 OR sp.zwarning = 16)
AND sp.elodiervfinalerr != 0
AND sp.snr &gt; 35
</pre>

<h3 id="Col_Mag_Cuts">Color and Magnitude Cuts, with Join</h3>

<p>This query extracts spectroscopic data which meets specified color and magnitude
criteria. This requires matching the entry for each spectroscopic observation in
the sppParams table to an entry for that same object in the PhotoObjAll table
that contains the photometric catalog information. This can be done using <i>origobjid</i>
in the SpecObjAll and sppParams table, as explained by the section on
<a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Join">Joins</a>. </p>
<pre>
SELECT top 10
sp.plate, sp.mjd, sp.fiberid, sp.specobjid, sp.origobjid,
sp.elodiervfinal, sp.teffadop, sp.fehadop, sp.loggadop,
ph.psfmag_g, ph.psfmag_r, ph.psfmag_i,
ph.psfmagErr_g, ph.psfmagErr_r, ph.psfmagErr_i
FROM sppParams sp
JOIN PhotoObjAll ph ON sp.origobjid = ph.objid
WHERE sp.sciencePrimary = 1
AND ph.psfmag_g-ph.psfmag_r &gt; 0.5
AND ph.psfmag_g-ph.psfmag_r &lt; 1.0
AND ph.psfmag_g &lt; 20.0
AND sp.snr &gt; 10.0
AND elodiervfinalerr &gt; 0
</pre>

<h3 id="Phot_by_Plate">Extract Photometric Targets for a Particular Plate</h3>
<p>The PhotoObjAll table does not have information of what spectroscopic plate
it overlaps with. To extract all photometric targets within a particular plate
region, you must use RA and Dec parameters with fGetNearbyObjEq, a provided
<a href="dr8/algorithms/segueii/segue_sqlcookbook.php#Functions">SQL function</a>.
First lookup the plate center of the plate you
are interested in (say SEGUE-1 plate 1880)</p>
<pre>
SELECT ra,dec
FROM platex
WHERE plate=1880
</pre>

<p>Then select all objects within 1.5 degrees of the plate center (90 arcmin) which
are stellar and have magnitudes within the range for spectroscopy:</p>

<pre>
SELECT top 100
plmatch.*, ph.objid as poa_objid, ph.psfmag_g, ph.psfmag_r
FROM fGetNearbyObjEq(358.2639, 36.40135,90) plmatch
JOIN PhotoObjAll ph on ph.objid = plmatch.objid
--Ensure the targets are stars and spectroscopically accessible with statement below--
WHERE plmatch.type = 6
AND (ph.psfmag_g &lt; 21 or ph.psfmag_z &lt; 21)
</pre>

<p>If you would like to look at the parameters for only a particular target
type, alter the query as follows: </p>
<pre>
SELECT top 100
plmatch.*, ph.objid as poa_objid, ph.psfmag_g, ph.psfmag_r
FROM fGetNearbyObjEq(358.2639, 36.40135,90) plmatch
JOIN PhotoObjAll ph on ph.objid = plmatch.objid
JOIN SegueTargetAll st on st.objid = ph.objid
--Ensure the targets are stars with statement below--
WHERE plmatch.type = 6
AND (ph.psfmag_g &lt; 21 OR ph.psfmag_z &lt; 21)
AND (st.segue1_target1 &amp; 0x40000) != 0
</pre>
<p>The above query will do the trick nicely for all targets that meet the criteria of
G dwarfs. Using the different bitmasks, you can isolate individual target types as desired.  </p>


<?php echo foot(); ?>
