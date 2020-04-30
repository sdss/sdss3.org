<?php include '../../header.php'; echo head('FITS Tutorial'); ?>

<p><a href="dr9/tutorials/">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Retrieve FITS Images</h2>

<p>This procedure describes how to download a set of FITS images
corresponding to a list of locations that you provide. The SAS can be
used to download the files interactively.  SkyServer can be used to
execute a more complex query to find the list of fields.  Retrieving a
very large number of fields is best done using bulk download
tools.</p>

<p>Within SAS, starting from a list of locations, you get the FITS
files as follows:</p>

<ul>
<li>First, if you have a list of <code>RUN</code>, <code>CAMCOL</code>
and <code>FIELD</code> values or <code>RA</code> and <code>DEC</code>,
you can access <a href="http://data.sdss3.org/bulkFields">the SAS bulk
fields search</a> to get links to a list of fields:</li>

<li><p>Choose the form associated with which type of search you are
doing, and enter your list of values for each field, separated by
spaces, commas (",") or pipes ("|"). For example, for RA and Dec:</p>

<pre>
228.66942|27.13082
228.75516    27.54503
228.60244,27.51250
</pre>
</li>

<li>Clicking "submit" will return a list of fields in the table
below.</li>

<li> You can select which filters (u, g, r, i or z) to download with
the check box at the top of the list, and which fields to download
with the column of check boxes. Clicking "Download Images" will then
download a "tar" file through your browser. </li>

<li>To use the resulting images, you first need to unpack the tar
file, which can be done with the <code>tar</code> command in Unix.
Most standard "zip" utilities can understand the tar format.</li>

<li> Once the files are unzipped, you should also be able to use <a
href="http://hea-www.harvard.edu/RD/ds9/">ds9</a> or other display
software to see your FITS file.  You should be aware that one FITS
image is 2048x1361 pixels, where 1 pixel = 0.396 arcsec.</li>
</ul>

<p>Within SkyServer, one can execute a more complex set of queries on
fields to get just the ones you want.  To start, a simple example
query can be generated with the <a
href="http://skyserver.sdss3.org/dr9/en/tools/search/IQS.asp">SDSS
Imaging Query Server (IQS)</a>:</p>

<ul>
  <li>Under Parameters to Return, select "minimal" for the desired set of parameters for your query
      from the scroll box. This will return a csv with the following parameters
    <ul>
      <li>run</li>
      <li>rerun</li>
      <li>camcol</li>
      <li>field</li>
      <li>obj</li>
    </ul></li>
  <li>Under Position Constraints, click on the Proximity Search button.</li>
  <li>Cut and paste a CSV file with RA and Dec into the Proximity Search scroll box found under the heading &quot;List of ra, dec, [sep].&quot;</li>
  <li>Click on &quot;Submit Request&quot; at the top of the web form to submit your query.</li>
  <li>Use the results to input into the SAS service described above,
  or just use the button at the bottom of the list that will
  automatically query SAS.</li>
</ul>

<p>The above methods are useful for retrieving a few hundred fields or
so, but if you are retrieving many more than that it quickly becomes
cumbersome.  In that case, you should instead use the <a
href="dr9/data_access/bulk.php">bulk data download tools</a>.  The
paths to the corrected frames within wget are:</p>

<pre>http://data.sdss3.org/sas/dr9/boss/photoObj/frames/[rerun]/[run]/[camcol]/frame-[band]-[run6]-[camcol]-[field].fits.bz2
</pre>

<p>As described in the bulk data download documentation, there is a
similar path usable with rsync. In either case, if you generate a list
of <code>run</code>, <code>camcol</code>, <code>field</code> values
from a query, you can generate the list of frame files to
download.</p>


<?php echo foot(); ?>
