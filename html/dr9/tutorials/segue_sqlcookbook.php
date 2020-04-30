<?php include '../../header.php'; echo head('Using SEGUE and CASJobs'); ?>

<p>The best way to extract information for a large number of SEGUE targets
is through the <a href="http://skyserver.sdss3.org/casjobs/">DR9 CasJobs</a>.
This interface allows the user to extract photometric and spectroscopic information, in addition
to estimates of stellar parameters from the SSPP. If you would like to access the data using some
     other system, please go to the <a href="dr9/data_access/">Data Access for SDSS DR9</a> page. If you are looking for more basic information about SEGUE, please go to the <a href="dr9/tutorials/segue_getting_started.php">Getting Started with SEGUE</a> page. </p>

<p>Using the SQL language, one can extract information about individual targets, lines-of-sight,
stellar categories, and more from a range of different SDSS data sets. Below we give an
overview of the SEGUE CAS information and how to access it using SQL. We also have included
queries for ensuring data quality, which <i>must</i>
be considered when using the data for science investigations.
To jump to a particular section, use the links below: </p>
<ul>
<li><a href="dr9/tutorials/segue_sqlcookbook.php#Tables">SEGUE CAS Data Tables</a></li>
<li><a href="dr9/tutorials/segue_sqlcookbook.php#SQLBasics">The Basics of SQL</a>
       <ul>
       <li><a href="dr9/tutorials/segue_sqlcookbook.php#Functions">Useful Functions for SEGUE</a></li>
       <li><a href="dr9/tutorials/segue_sqlcookbook.php#Join">Combining Information From Different Tables</a></li>
       <li><a href="dr9/tutorials/segue_sqlcookbook.php#Quality">Ensuring Data Quality</a>
           <ul>
           <li><a href="dr9/tutorials/segue_sqlcookbook.php#PlateQuality">Plate Quality</a></li>
           <li><a href="dr9/tutorials/segue_sqlcookbook.php#RVCuts">Radial Velocity Quality</a></li>
           <li><a href="dr9/tutorials/segue_sqlcookbook.php#SNCuts">S/N Quality</a></li>
           <li><a href="dr9/tutorials/segue_sqlcookbook.php#Flags">SSPP Flags</a></li>
	   <li><a href="dr9/tutorials/segue_sqlcookbook.php#Caveats">Caveats</a></li>
          </ul>
       </li>
       <li><a href="dr9/tutorials/segue_sqlcookbook.php#Cookbook">Dive Right In: Some Sample Queries</a></li>
       </ul>
</li>
</ul>

<hr />

<h2 id="Tables">SEGUE Tables in DR9 SkyServer</h2>

<p> There are a number of tables in the DR9 CAS which are used to
access photometric and spectroscopic information. These
tables are documented in the <a href="http://skyserver.sdss3.org/dr9/en/help/browser/browser.asp">Schema Browser</a> (select the Tables menu tab). All of these table can be linked together in various ways using SQL queries.
We have listed some of the tables that are particularly useful for SEGUE below. </p>
<ul>
<li><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=SpecObjAll&amp;t=U">SpecObjAll</a> -- For all spectra, plate, mjd, fiber, ra, dec</li>
<li><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=sppParams&amp;t=U">sppParams</a> -- [Fe/H], log g, T<sub>eff</sub>, Radial Velocity for all stellar objects</li>
<li><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=sppLines&amp;t=U">sppLines</a> -- Equivalent widths for common lines in stars</li>
<li><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=PhotoObjAll&amp;t=U">PhotoObjAll</a> -- Photometric information for all stars </li>
<li><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=Star&amp;t=U">Star</a> -- Subset (View) of PhotoObjAll table with all Primary Stellar photometric detections.</li>
<li><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=segueTargetAll&amp;t=U">SegueTargetAll</a> -- Target selection flags for all photometric objects</li>
<li><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=Plate2Target&amp;t=U">Plate2Target</a> -- Matches plates to targets observed on that line of sight</li>
<li><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=ProperMotions&amp;t=U">ProperMotions</a> -- Proper motions of the photometry</li>
<li><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=SpecPhotoAll&amp;t=U">SpecPhotoAll</a> -- pre-determined match between SpecObjAll and PhotoObjAll (matched on flux, not position)</li>
<li><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=PlateX&amp;t=U">PlateX</a> -- Table of all plates, plate centers in RA, Dec, programnames </li>
<li><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=SpecDR7&amp;t=U">SpecDR7</a> -- Spatial cross-match between DR7 and DR8/DR9 Spectroscopy </li>
<li><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=PhotoObjDR7&amp;t=U">PhotoObjDR7</a> -- Spatial cross-match between DR7 and DR8/DR9 Photometry </li>
</ul>

<p>Before getting started, here are some important definitions for working with the spectroscopic data: </p>
<ul>
<li>An <i>object</i> is a star or galaxy at a particular location on the sky. It may
have multiple spectroscopic observations and thus, have multiple entries in the
spectroscopic catalog tables (like SpecObjAll, sppParams). It will only have one listing in the
imaging (PhotoObjAll). </li>
<li>An <i>observation</i> is a spectrum of an object taken on a particular plate-MJD in a
particular fiberid. It is defined by a <i>specobjid</i>. </li>
<li> A plate-MJD combination is an observation of a plate, and is identified by a <i>plateid</i>. </li>
<li>All of the spectroscopic observations are matched to one and only one object
in the photometric catalog. The <i>objid</i> of that photometric catalog object is
in the <i>bestobjid</i> parameter of the spectroscopic catalog tables. </li>
</ul>
<p>More information about the overall general organizational scheme of
SDSS-III spectroscopy is available at the <a href="dr9/spectro/spectro_basics.php">
Basics of SDSS Spectrograph Data</a> page. </p>

<hr />

<h2 id="SQLBasics">The Basics of SQL</h2>

<p>SDSS-III has resources for individuals just getting started with SQL. While the material below
will get you started, it is focuses specifically on extracting SEGUE data. If you are new to the CAS
and SQL, we highly recommend you use the
 <a href="http://skyserver.sdss3.org/dr9/en/help/howto/search/">SQL Tutorial</a> and SDSSIII <a href="http://skyserver.sdss3.org/dr9/en/help/docs/realquery.asp">SQL Sample Queries</a>. </p>

<p>All SQL queries can be run from the command line, rather than the web version of the CAS. This
is particularly useful if you need to run a large series of queries.  There are
two methods of doing this, via <a href="http://skyserver.sdss3.org/casjobs/casjobscl.aspx">Java</a>
or <a href="http://skyserver.sdss3.org/dr9/en/help/download/sqlcl/default.asp">Python</a>. Both
methods are thoroughly explained at the provided links. </p>

<p>Also note that for the SQL language "--" is a comment, and <i>%</i> works similarly to
the * symbol in UNIX. </p>

<h3 id="Functions">Useful Functions for SEGUE</h3>

<p>There are a number of useful functions included in CASJobs.
A list of these functions with brief explanations and instructions is
available in the <a href="http://skyserver.sdss3.org/dr9/en/help/browser/browser.asp">
SDSSIII DR9 Function Browser</a>. </p>

<p>Below we list a few of the functions which are particularly useful with SEGUE data
and a brief description of them. </p>

<table class="common">
<caption>Useful SQL Functions</caption>
<tr><th>Function</th><th>Description</th></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=fDMS&amp;t=F">fDMS</a>                                    </td><td>Converts declination in degrees to &plusmn;dd:mm:ss.ss notation </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=fDocColumns&amp;t=F">fDocColumns</a>                      </td><td> Returns information about all of the columns in a particular data table, including
data type and descriptions of the parameters </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=fDocFunctionParams&amp;t=F">fDocFunctionParams</a>        </td><td>Provides information about the input and output parameters for a specified function </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=fGetLat&amp;t=F">fGetLat</a>                              </td><td>Converts a 3-vector to Latitude </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=fGetLon&amp;t=F">fGetLon</a>                              </td><td>Converts a 3-vector to Longitude </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=fGetNearbyObjEq&amp;t=F">fGetNearbyObjEq</a>              </td><td>Given an RA and Dec, this function will return a table of all primary photometric objects
within a specified distance (in arcminutes) of the point </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=fGetNearbySpecObjEq&amp;t=F">fGetNearbySpecObjEq</a>      </td><td>Given an RA and Dec, this function will return all primary spectroscopic objects
within a specified distance (in arcminutes) of the point </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=fGetNearestSpecObjIdEq&amp;t=F">fGetNearestSpecObjIdEq</a></td><td>Searches within a specified radius about a given RA and Dec for the nearest scienceprimary
spectroscopic observation </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=fGetObjectsEq&amp;t=F">fGetObjectsEq</a>                  </td><td>Returns all objects within a specified radius of a given RA and Dec </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=fGetObjFromRect&amp;t=F">fGetObjFromRect</a>              </td><td>Returns a table of objects within a rectangle defined by two RA and Dec pairs</td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=fHMS&amp;t=F">fHMS</a>                                    </td><td>Converts RA from degrees to hh:mm:ss.ss notation </td></tr>
<tr><td><a href="http://skyserver.sdss3.org/dr9/en/help/browser/description.asp?n=fSpecDescription&amp;t=F">fSpecDescription</a>            </td><td>Returns a string indicating class, status and zWarning for a given specObj </td></tr>
</table>


<h3 id="Join">Joining Different Tables</h3>
<p>The <i>JOIN</i> statement is the key to combining information from multiple data tables. Suppose one has a
database with two tables: </p>
<ul>
<li>sppParams with parameters for all spectroscopically-observed stars</li>
<li>PhotoObjAll with parameters for all photometrically-observed targets </li>
</ul>
<p>One wishes to match up the two tables to obtain both photometric and spectroscopic data for all stars,
merged into a single one-row-per-star output file. Normally, a match is done on RA and Dec, requiring
that photometric and spectroscopic objects have positions within 1 arcsec or so of each other. However,
this two dimensional match can be very time consuming. One can "pre-match" objects to save time. </p>

<p>Every spectroscopic object has a unique id, a 64-bit integer, composed of its triplet component
ids, i.e., plate-mjd-fiberid. This number is called the <i>specobjid</i>. Every photometric object also
has a unique identification, also a 64-bit integer, composed of its heptuple components (run, rerun,
camcol, field, obj, firstfield, skyversion). This is called <i>objid</i> in PhotoObjAll. </p>

<p>A matching procedure was run in the database after initial loading
which sought to match up every spectroscopic object with a photometric
object via <a href="dr9/algorithms/match.php">RA and Dec
position</a>. If a match was found then the parameter <i>bestobjid</i>
in the spectroscopic table was filled in with the <i>objid</i> value
from the photometric table. Similarly, the <i>specobjid</i> parameter
in the photometric tables was filled in with the <i>specobjid</i> from
the spectroscopic table. This provides a shortcut to matching up the
photometric and spectroscopic information for a star. Not all of the
stars in the photometry are observed spectroscopically; most
<i>specobjid</i> in PhotoObjAll are set to 0, as there is no
associated spectrum.  </p>

<p>Using <i>specobjid</i> and <i>bestobjid</i>, one can use a <i>JOIN</i> query in SQL to rapidly match
up objects between the two tables. For a very basic example, the
parameter <i>bestobjid</i> links up the sppParams and PhotoObjAll tables: </p>
<pre>
SELECT sp.bestobjid, ph.objid as photoobjall_bestobjid
FROM sppParams as sp
JOIN PhotoObjAll as ph ON sp.bestobjid = ph.objid
</pre>

<p>The query above is much faster than matching objects by RA and Dec, which can take on the order
of days to weeks for a similar query. Note that if you fail to include the <i>ON</i> condition in the
<i>JOIN</i> statement, CASJobs will try to do a cross product, attempting to return all of the
approximately 540 trillion objects made up of photometry and spectroscopy matched in every
possible combination. This will quickly fill up all of your myDB disk space before it even comes
close to completing. Do not use any <i>JOIN</i> statements without the <i>ON</i> clause
statement to prevent a runaway. </p>

<p>Most of the tables have various ways to link up to the others. A handy crib sheet for the
major tables is below.</p>

<table class="common">
<caption>SEGUE 1 and 2 Tables</caption>
<tr style="font-size:small;"><th>Data Table</th>      <th>PlateX</th>          <th>sppParams</th>                             <th>SpecObjAll</th>                            <th>PhotoObjAll</th>                              <th>sppLines</th>   <th>ProperMotions</th>                          <th>SegueTargetAll</th>            <th>Star</th></tr>
<tr style="font-size:x-small;"><td> PlateX         </td><td>                </td><td>PlateID                               </td><td>PlateID                               </td><td>RA, Dec region                           </td><td>Plate      </td><td>                                       </td><td>                          </td><td>                          </td></tr>
<tr style="font-size:x-small;"><td> sppParams      </td><td>PlateID         </td><td>                                      </td><td>specobjid or bestobjid                </td><td>bestobjid (match with poa.objid)         </td><td>SpecObjId  </td><td>bestobjid (match with pm.objid)        </td><td>objid (with sp.bestobjid) </td><td>Objid (with sp.bestobjid) </td></tr>
<tr style="font-size:x-small;"><td> SpecObjAll     </td><td>PlateID         </td><td>specobjid or bestobjid                </td><td>                                      </td><td>bestobjid (match with poa.objid)         </td><td>SpecObjId  </td><td>bestobjid (match with pm.objid)        </td><td>objid (with soa.bestobjid)</td><td>Objid (with soa.bestobjid)</td></tr>
<tr style="font-size:x-small;"><td> PhotoObjAll    </td><td>RA, Dec region  </td><td>objid (with sp.bestobjid)             </td><td>objid (with soa.bestobjid)            </td><td>                                         </td><td>specobjid  </td><td>objid                                  </td><td>objid                     </td><td>objid                     </td></tr>
<tr style="font-size:x-small;"><td> sppLines       </td><td>Plate           </td><td>specobjid                             </td><td>specobjid                             </td><td>specobjid                                </td><td>           </td><td>specobjid                              </td><td>                          </td><td>specobjid                 </td></tr>
<tr style="font-size:x-small;"><td> ProperMotions  </td><td>                </td><td>bestobjid (with pm.objid)             </td><td>bestobjid (with pm.objid)             </td><td>objid                                    </td><td>specobjid  </td><td>                                       </td><td>objid                     </td><td>objid                     </td></tr>
<tr style="font-size:x-small;"><td> SegueTargetAll </td><td>                </td><td>bestobjid (with sta.objid)            </td><td>bestobjid (with sta.objid)            </td><td>objid                                    </td><td>           </td><td>objid                                  </td><td>                          </td><td>objid                     </td></tr>
<tr style="font-size:x-small;"><td> Plate2Target   </td><td>PlateID         </td><td>bestobjid (with p2t.objid)            </td><td>bestobjid (with p2t.objid)            </td><td>objid                                    </td><td>           </td><td>objid                                  </td><td>objid                     </td><td>objid                     </td></tr>
<tr style="font-size:x-small;"><td> SpecPhotoAll   </td><td>PlateID         </td><td>specobjid, bestobjid (with spa.objid) </td><td>specobjid, bestobjid (with spa.objid) </td><td>objid                                    </td><td>specobjid  </td><td>objid                                  </td><td>objid                     </td><td>objid                     </td></tr>
<tr style="font-size:x-small;"><td> Star           </td><td>                </td><td>bestobjid (with st.objid)             </td><td>bestobjid (with st.objid)             </td><td>objid                                    </td><td>specobjid  </td><td>objid                                  </td><td>objid                     </td><td>                          </td></tr>
</table>


<p>Not all of the tables connect easily. Sometimes, it will require connecting them
through another table. Also note that this chart is just to get you started using <i>JOIN</i>s.
ALWAYS verify the database matching yourself. </p>

<h4>More Intricate Joins</h4>

<p>As mentioned earlier, there are some <i>specobjid</i> values in the photometry tables set to 0,
indicating that there is no spectrum of a photometric object. A standard <i>JOIN</i> between
the spectroscopic and photometric tables will only return information on stars which have both
  spectroscopy and photometry. However, there are ways
to join tables which will include stars that may not appear in both tables. These are called
<i>LEFT OUTER JOIN</i> and are more advanced SQL. </p>

  <p>For example, suppose you want all of the photometric data within a particular region,
regardless of whether or not the target was observed spectroscopically. The query below
  pulls out all of the photometry and spectroscopy for a line of sight; if a particular target
does not have spectroscopic information, this query assigns the values -999 to the columns. </p>

<pre>
SELECT
ph.objid,isnull(sppobj.specobjid,-999) as specobjid
FROM PhotoObjAll as ph
LEFT OUTER JOIN
(SELECT
soa.*
FROM SpecObjAll as soa
JOIN PhotoObjAll as ph on soa.bestobjid = ph.objid)
AS sppobj
ON sppobj.bestobjid = ph.objid
</pre>

<p>More information about these advanced <i>JOIN</i>s is available on the
<a href="http://skyserver.sdss3.org/dr9/en/help/docs/realquery.asp#outer">
SDSSIII SQL Sample Queries page</a>. </p>

<hr />

<h2 id="Quality">Quality Cuts</h2>

<h3 id="PlateQuality">Selecting SEGUE plates on Quality</h3>

<p>PlateX contains information about the data quality of every SEGUE plate in the parameter <i>plateQuality</i>.
This parameter was determined by checking the S/N of stars with g-r color of old MS turnoff at g=18.* Plates with
low signal-to-noise or other issues will be listed as "bad."</p>

<table class="common">
<tr><th>Plate Type</th><th>S/N constraint</th></tr>
<tr><td>SEGUE-1 Bright</td><td>>7.5</td></tr>
<tr><td>SEGUE-1 Faint</td><td>>16</td></tr>
<tr><td>SEGUE-2 </td><td>>10</td></tr>
</table>
<p>*Note that the faint limit for SEGUE-1 bright plates is r &lt; 17.8.</p>

<p>These quality constraints ensure that all SEGUE-1 plates in DR7 and DR8 are included in DR9.
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
present in a sample selected using criteria on <i>isBest</i> and <i>isPrimary</i>. More information about determining the plate quality is available <a href="dr9/spectro/catalogs.php">here</a>. </p>

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

<p>You can also examine the <i>plateQuality</i> parameter for individual plates to
see if you want to impose your own criteria. Keep in mind that the plates were
observed to a fixed S/N criteria, so the variation near the magnitude
limit where the <i>plateQuality</i> is evaluated is not large. It is probably more
useful to return the value of the S/N for each individual object in
your queries and select on that. The <a href="dr9/tutorials/segue_sqlcookbook.php#SNCuts">S/N quality</a>
section below expands on this. Remember that even with specifying the plate quality, you can still get
duplicate observations of individual targets. </p>

<h3 id="RVCuts">Radial Velocity Quality</h3>

<p>For radial velocities of stars, use the parameter <i>elodiervfinal</i> in the sppParams data table. To
ensure that the targets have well-determined radial velocities, add the
following two clauses to any query: </p>

<pre>
AND sppParams.elodiervfinalerr &gt; 0
AND (sppParams.zwarning = 0 OR sppParams.zwarning = 16)
</pre>

<p>The parameter <i>zwarning</i> is a warning flag about the velocity determination. The clause
above ensures that this aspect of the reduction was normal. </p>

<h3 id="SNCuts">S/N Quality </h3>

<p>Spectra with higher signal-to-noise will tend to have better estimates of
spectroscopic parameters. At a minimum, the SSPP requires a S/N of at least
10 to estimate parameters. </p>

<p>There are two S/N measurements made for each spectrum. The first is the
<i>snMedian</i> in the SpecObjAll table. This is the median S/N per
1&Aring; pixel in the extracted spectrum. The second S/N parameter
is <i>snr</i> in the sppParams table. It is the mean S/N per 1&Aring; pixel in the
wavelength range from 4000 to 8000 &Aring;, the region used by the SSPP
for stellar parameter estimation. <i>snr</i> is typically used to extract
quality spectra. </p>

<p>Adding the following clause to any query will set a limit on the S/N of the
returned targets: </p>

<pre>
AND sppParams.snr &gt; 10
</pre>

<h3 id="Flags">SSPP Flags </h3>

<p>The SSPP has a number of different flags that indicate anomalies
in stellar spectra, listed in <i>sppParams.flag</i>. Even if a spectrum has a high S/N, it may still not
be a high-quality observation. The warnings are divided into two categories, cautionary and critical flags.
For a critical flag, such as a star with emission lines in the spectrum, the SSPP will not report estimated
parameters. When a spectrum has a cautionary flag, such as a large discrepancy between the SSPP-predicted
and observed color, the SSPP provides estimates of stellar parameters. It is up to the user to decide which
of the various cautionary flags are unacceptable for their science. The different flags are
detailed <a href="dr9/spectro/sspp_flags.php">here</a>.
</p>


<h3 id="Caveats">SEGUE Caveats </h3>

<p>We have listed some useful criteria for isolating a quality SEGUE sample. However,
one must also take into account other <a href="dr9/spectro/caveats.php#Segue_Caveats">caveats</a>
in the SEGUE sample. First of all, not all SEGUE spectra have associated photometry. Second,
there are a number of stars that were observed multiple times in SEGUE. To achieve a complete
sample, both of these must be taken into account. Finally, there are some known anomalies in
the SSPP, which will affect both sample completeness and estimates of stellar atmospheric parameters.
These, in addition to general SDSS spectroscopy <a href="dr9/spectro/caveats.php">caveats</a>
must be taken into account.
</p>

<hr />

<h2 id="Cookbook">Dive Right in:  Some Sample queries</h2>

<p>The following SEGUE-specific queries are a good place to get started.
Open up a window into DR9 CasJobs or the DR9 CAS SQL and cut and paste
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

<p>The queries below are designed to be run in the DR9 context of the CAS. However, if you have
a query that uses only tables from previous data releases or data in your myDB context, running
the queries there, rather than in the DR9 context, can be quicker. </p>

<p>Finally, it is <i>always</i> a good idea to return the <i>plate</i>, <i>MJD</i>, <i>fiberid</i>,
<i>specobjid</i>, and <i>bestobjid</i> parameters for the
queries of spectroscopic data tables for efficient matching to other tables later. </p>

<p>Jump to Sample Queries:</p>
<table class="noborder">
<tr>
<td valign="top">
<ul>
<li><a href="dr9/tutorials/segue_sqlcookbook.php#RADEC">Rectangular RA and Dec Search</a></li>
<li><a href="dr9/tutorials/segue_sqlcookbook.php#Program_ID">Selecting by Survey and Programname</a> </li>
<li><a href="dr9/tutorials/segue_sqlcookbook.php#Category_ID">Extracting Specific Stellar Categories</a> </li>
</ul></td>
<td valign="top">
<ul>
<li><a href="dr9/tutorials/segue_sqlcookbook.php#Stellar_Params">Extracting Stellar Parameters</a> </li>
<li><a href="dr9/tutorials/segue_sqlcookbook.php#Col_Mag_Cuts">Color and Magnitude Cuts, with Join</a> </li>
<li><a href="dr9/tutorials/segue_sqlcookbook.php#Phot_by_Plate">Extract Photometric Targets for Particular Plate</a> </li>
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
--The parameters above have information about the observation of the particular target,
--such as when it was processed.
--They are useful for organization and matching different datasets.
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
JOIN PhotoObjAll as p ON sp.bestobjid = p.objid
WHERE sp.ra &gt; 180.0 AND sp.ra &lt; 220.0
AND sp.dec &gt; -1.5 AND sp.dec &lt; 1.5
AND sp.seguePrimary = 1
AND s.elodiervfinalerr &gt; 0
</pre>

<p>The above basic query joins together the table of all spectra, SpecObjAll,
with the table of stellar spectroscopic parameters (radial velocity,
metallicity, surface temperature, surface gravity), sppParams, and
photometry for the related imaging (g magnitude, colors, de-reddened colors) from the table PhotoObjAll.
<i>JOIN</i> statements are briefly described <a href="dr9/tutorials/segue_sqlcookbook.php#Join">here</a> and
on the <a href="http://skyserver.sdss3.org/dr9/en/help/docs/realquery.asp">DR9 Sample SQL Queries</a>, </p>

<p>Two <i>JOIN</i>s are required for this very common template query.  The clause
<i>specobjall.seguePrimary = 1</i> results in a unique list of spectra
(without duplicates), and the clause <i>sppParams.elodiervfinalerr &gt; 0</i>
ensures that we have a spectrum of a star and not a 'noise object'
such as a sky fiber.  The connection to the photometric information (from PhotoObjAll) is done by
requiring <i>specobjall.bestobjid = photoobjall.objid</i>.
Approximately 0.5% of spectra provided do not have matching DR9 photometry.
Photometry for those objects may be found in DR7 if necessary, as explained in
<a href="dr9/spectro/caveats.php#Orphans">Missing DR9 Photometry</a>. </p>


<h4> Variant with Proper motion match</h4>

<p>Here is a variant on the above query which also returns proper motion information for each object. This
requires an additional <i>JOIN</i> to the ProperMotions table. </p>

<pre>
SELECT top 10
sp.plate, sp.mjd, sp.fiberid,
p.run,p.rerun,p.camcol,p.field,p.obj,
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
JOIN PhotoObjAll as p ON sp.bestobjid = p.objid
JOIN ProperMotions as pm ON p.objid = pm.objid
WHERE sp.ra &gt; 180.0 AND sp.ra &lt; 220.0
AND sp.dec &gt; -1.5 AND sp.dec &lt; 1.5
AND sp.seguePrimary = 1
AND s.elodiervfinalerr &gt; 0
</pre>


<h3 id="Program_ID">Extracting Plate Information by Programname</h3>

<p>The SEGUE survey consists of both a number of surveys (namely SEGUE-1 and SEGUE-2) which
in turn encompass a number of observing programs, such as a focus on open and globular clusters
or low latitudes. These are detailed in the <a href="dr9/algorithms/segue_plate_table.php">
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
<li> segtest</li>
<li> segcluster</li>
<li> segue2</li>
</ul></td>
<td valign="top">
<ul>
<li>seguefaint</li>
<li>segpointedf</li>
<li>seglowlatf</li>
<li>segtestf</li>
<li>segclusterf</li>
</ul>
</td>
</tr>
</table>

<p>By selecting on <i>survey</i> and <i>programname</i> it is possible to identify any desired subset of the SEGUE plates.</p>

<p>The query below returns the <i>plate</i>, <i>MJD</i>, <i>plateid</i>, and the <i>RA</i>, <i>Dec</i> of the plate center
for all of the cluster plates taken in either SEGUE-1 or SEGUE-2 in a DR9 context:</p>
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
for each of the surveys on the <a href="dr9/algorithms/segue_target_selection.php">Target Selection</a>
page. The organizational scheme for these parameters is described in the <a href="dr9/algorithms/segue_bit_guide.php">
Bit Guide</a>. </p>

<h4 id="Fibers">Extracting Stars via Fiber Assignment</h4>

<p>Each target type is allotted a certain amount of fibers per plate. Using
CASJobs, you can ask for the spectroscopic catalog information for all objects
that were <i>assigned to fibers</i> as belonging to a particular target selection category
in SEGUE-1. However, this will not get you every single target <i>that passes
the category criteria</i>. We detail how to extract these different samples below. Selecting
stars by fiber assignment is not an option for SEGUE-2 targets. </p>

<p>The SQL query detailed below will extract every single stellar target that
was assigned a fiber for a particular spectral category in SEGUE1. This query does not
account for the fact that, the target selection criteria
for several of the categories evolved over the course of the survey. A particular
star may have been targeted using early criteria, but would not have been
observed using the latest selection algorithms. </p>

<p>For SEGUE-1, the values in the SpecObjAll and sppParams target selection bitmasks are based
on the criteria as they were at the time the plate was designed. The target selection
versions for individual plates are listed at the
<a href="dr9/algorithms/segue_plate_table.php">SEGUE Plates page</a>. Detailed information
on the changing criteria is available at the <a href="dr9/algorithms/segue_previous_tselec.php">
Previous Versions page</a>. This intricacy is also detailed in Yanny et al. 2009. Accounting for
this nuance while looking at the targets by fiber category may require removing some plates
from your survey sample to ensure homogeneous target selection. </p>

<p>Given the above caveats, here is how to select the spectroscopic catalog information for
all objects that were targeted as, for example, the SEGUE-1 low metallicity candidates, and
take objects only from those plates in the SEGUE-1 survey (run in a DR9 context): </p>
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

<p>This brings up a SEGUE subtlety. Some of the targets that were assigned SEGUE-1 fibers for
a particular target category may have also been observed in other surveys or programs, and
the observation in the other program may be the <i>seguePrimary=1</i> observation. In
that case, demanding that <i>seguePrimary=1</i> in the above query will remove objects
from your sample with a better observation on a SEGUE-2 plate that you wish to include. Setting
 <i>segue1primary=1</i> will select the best spectroscopic
observation from SEGUE-1 plates. The target will be included, but it may not
be the best SEGUE observation of it. Be careful! </p>

<h4 id="Category">Extracting Stars via Stellar Type Criteria</h4>

<p>It is possible to ask for the spectroscopic catalog information for all objects
that pass the target selection criteria for a particular category, <i>regardless of
why it was actually assigned a fiber</i>. This information is in the target
selection bitmasks of the segueTargetAll table; the
specObjAll and sppParams table also have this information for the SEGUE-2 targets. This bitmask is
set once the survey was completed, using the latest target selection criteria on the
latest photometry and astrometry.
Below is a query that asks for the catalog information for all objects that passed the
SEGUE-1 low metallicity target selection criteria, independent of why it was assigned a fiber.
This requires a <i>JOIN</i> on the segueTargetAll table. Here, as an example of double <i>JOIN</i>s, we
also extract data from the PhotoObjAll table. </p>

<pre>
SELECT top 10
sp.segue1_target1, t.segue1_target1 as seg1_targ1, ph.psfmag_g
FROM sppParams sp
JOIN PhotoObjAll ph on sp.bestobjid = ph.objid
JOIN SegueTargetAll t on ph.objid = t.objid
WHERE (t.segue1_target1 &amp; 0x10000) != 0
AND sp.survey = 'segue1'
AND sp.programname like 'segue%'
</pre>

<p>Whereas with the fiber assignment query, every target had <i>segue1_target1</i>
of -2147418112, with this new query one can see that this parameter varies. Not every
star that meets the low-metallicity criteria was assigned a fiber for this category. </p>

<p>In addition, a particular target can fulfill the criteria
for multiple spectral types, resulting in it having <a href="dr9/algorithms/segue_bit_guide.php">multiple bits set</a>.
Specifying that <i>(t.segue1_target1 &amp; 0x10000) != 0</i> will
return all objects with that bit set, including objects that have other
target bits set as well. </p>

<p>As with the query based on fiber assignment, some of the targets here
may have been observed as part of other surveys or programs. Combining criteria
on <i>survey</i>, <i>programname</i>, and <i>seguePrimary</i> can potentially
remove objects from your sample, so be conscientious! </p>

<p>The SEGUE target bitmasks are set for <i>all</i> objects in the
SegueTargetAll table, not just spectroscopic targets. Thus, it is possible
to get the entire sample of photometric candidates for each category for
each plate using a similar query to that above. </p>

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
sp.plate, sp.mjd, sp.fiberid, sp.specobjid, sp.bestobjid,
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
---Finally, avoid duplicate spectra
AND sp.seguePrimary = 1
</pre>

<p>We can expand the query listed above by adding in quality checks on
radial velocities and S/N. Additionally, the query below selects
only the spectra taken as part of the "main" SEGUE-1 and SEGUE-2 surveys:</p>

<pre>
SELECT top 100
sp.plate, sp.mjd, sp.fiberid, sp.specobjid, sp.bestobjid,
sp.elodiervfinal, sp.teffadop, sp.fehadop, sp.loggadop
FROM sppParams as sp
WHERE sp.teffadop between 5500 and 6500
AND sp.fehadop &lt; -1
---This next clause avoids observations with no [Fe/H] determination
AND sp.fehadop &gt; -5
AND sp.loggadop &lt; 3
---This next clause avoids observations with no log(g) determination
AND sp.loggadop &gt; 0
AND sp.seguePrimary = 1
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
sp.plate, sp.mjd, sp.fiberid, sp.specobjid, sp.bestobjid,
sp.elodiervfinal, sp.teffadop, sp.fehadop, sp.loggadop
FROM sppParams as sp
WHERE sp.teffadop between 5500 and 6500
AND sp.fehadop between -5 and -1
AND sp.loggadop between 0 and 3
AND sp.seguePrimary = 1
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
that contains the photometric catalog information. This can be done using <i>bestobjid</i>
in the SpecObjAll and sppParams table, as explained by the section on
<a href="dr9/tutorials/segue_sqlcookbook.php#Join">Joins</a>. </p>
<pre>
SELECT top 10
sp.plate, sp.mjd, sp.fiberid, sp.specobjid, sp.bestobjid,
sp.elodiervfinal, sp.teffadop, sp.fehadop, sp.loggadop,
ph.psfmag_g, ph.psfmag_r, ph.psfmag_i,
ph.psfmagErr_g, ph.psfmagErr_r, ph.psfmagErr_i
FROM sppParams sp
JOIN PhotoObjAll ph ON sp.bestobjid = ph.objid
WHERE sp.seguePrimary = 1
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
<a href="dr9/tutorials/segue_sqlcookbook.php#Functions">SQL function</a>.
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
