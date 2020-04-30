<?php include '../../header.php'; echo head('Finding Data Tutorial'); ?>

<p><a href="dr8/help/#tutorial">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Find data for all objects in a given RA/Dec/Magnitude/Absolute Magnitude range?</h2>


<h3>Introduction</h3>

<p>You can use search tools from the SDSS's <a
href="http://skyserver.sdss3.org/dr8/">Catalog Archive Server</a> to find all
objects that meet certain criteria, such as position,
magnitude, color, or absolute magnitude. For position, magnitude, and color, you can use the
<a href="http://skyserver.sdss3.org/dr8/en/tools/search/iqs.asp">Imaging Query Form</a>.
For absolute magnitude (and any other criteria), you can write queries in
<a href="http://skyserver.sdss3.org/dr8/en/tools/search/sql.asp">SQL</a>.</p>

<p>See the directions for using the Imaging Query Form below to see how to use the form's general
features. Then see the <em>RA and Dec</em> and <em>Magnitude</em> pages of this guide to learn how to search
for those parameters. See the <em>Absolute Magnitude</em> page to learn how to use SQL to search for objects
by absolute magnitude.</p>


<h2>Jump to:</h2>

<ul>
    <li><a href="dr8/help/getdata.php#iqs">Using the Imaging Query Form</a></li>
    <li><a href="dr8/help/getdata.php#radec">Find by Position</a></li>
    <li><a href="dr8/help/getdata.php#magcolor">Find by Magnitude or Color</a></li>
    <li><a href="dr8/help/getdata.php#absmag">Find by Absolute Magnitude</a></li>
</ul>

<h3 id="iqs">Using the <a href="http://skyserver.sdss3.org/dr8/en/tools/search/iqs.asp">Imaging Query Form</a></h3>

<ol>
  <li>In the <em>Limit number of output rows</em> textbox, enter the number of objects you would like the search to
         return. If you want unlimited number of rows returned, enter 0.</li>

  <li>In the <em>Output Format</em> textbox, enter the format you want for your output. <i>HTML</i> will output results as
         a table in your browser. <i>CSV</i> output can be read by many graphing programs.</li>

  <li>In the <em>Parameters</em> section, select what types of <b>Imaging</b> data you would like returned.
         <i>Typical</i> returns the most common parameters. You can also select any parameters from the menu.
         To select more than one, hold down CTRL while clicking on each one.</li>

  <li>Select what type of <b>Spectroscopy</b> data you would like returned. If you select <i>None</i> under
         Spectroscopy, the tool will not return any spectral data. If you select any of the other options, the
         tool will return spectral data for all objects, including those for which no spectrum has been observed,
         but objects without an observed spectrum have zeroes for all spectroscopic data.</li>

  <li>You can use the <b>Filters</b> checkboxes to choose which filter names to return. The Imaging Query Form
         will return only the names of the filters, not the images. You can then use the filter names as part of a
         query to the <a href="http://das.sdss.org">Data Archive Server (DAS)</a>.</li>
</ol>

<p>Next, you will set <em>constraints</em> based on positions or imaging data. Constraints are characteristics of the objects
   that you are interested in. The Imaging Query Form will return data for objects that meet your constraints.</p>



<h3 id="radec">Find by <a href="http://skyserver.sdss3.org/dr8/en/tools/search/iqs.asp">Position</a></h3>

<p>One of the constraints you can use is to find objects only in a specific part of the sky. Use the <em>Position
   Constraints</em> box to choose constraints. You can choose not to use any position constraints (<i>None</i>),
   or you can choose one of three types (<i>Rectangle</i>, <i>Cone</i>, and <i>Proximity</i>). </p>

<ol>

  <li><i>Rectangle</i> finds objects within a rectangle between a minimum and maximum RA and Dec. Enter minimums and
         maximums for RA and Dec, either in decimal degrees or in HMS/DMS. HMS input can be formatted as either HH:MM:SS.ss
         or HH MM SS.ss.</li>

  <li><i>Cone</i> finds objects within a radial patch of sky defined by a center RA/Dec and a radius. The default value
         is a search around RA = 180, Dec = 0.2.</li>

  <li><i>Proximity</i> finds objects near to a list of positions. You give the list, either by pasting into the textbox
            or by uploading a file. You can optionally specify a maximum separation in which to search.</li>

  <li>When you have finished entering all your constraints, click <em>Submit Request</em>. The tool will return only the
         objects you asked for, in the output format you specified. You now have your results; read the next step to see
         how to get the same results using SQL.</li>

<li>If you would rather use SQL to search by position, write your query so that it uses one of the position functions,
         either <code>dbo.fGetNearbyObjEq(ra,dec,radius)</code> or <code>dbo.fGetObjFromRect(ra1,ra2,dec1,dec2)</code>.
         Specify the function in the FROM block, and be sure to check that the object IDs are the same in the WHERE block. So here is
         a query to search a radial patch of sky, returning IDs and positions (click <b>Submit</b> to run):<br />

      <code>SELECT p.objid, p.ra, p.dec<br />
            FROM PhotoObj p, dbo.fGetNearbyObjEq(180,0.2,5) n<br />
            WHERE n.objID = p.objID</code>
         </li>
</ol>


<h3 id="magcolor">Find by <a href="http://skyserver.sdss3.org/dr8/en/tools/search/iqs.asp">Magnitude or Color</a></h3>

<p>Instead of, or in addition to, searching by position, you can also tell the Imaging Query Form to search by magnitude.
   To do this, use the <em>Imaging Constraints</em> section. The default is no constraints (that is, to return objects with any magnitudes and colors).</p>

<ol>
  <li>First, select the <em>Type</em> of magnitude on which you would like to search: <i>Petrosian</i>, <i>Model</i> (the better fit of
         a DeVaucouleurs and exponential profile), or <i>PSF</i>.</li>

  <li>Next, enter the magnitudes you would like to search for in the <em>Magnitudes</em> textbox. You can enter constraints on any of the
         SDSS's five filters (<i>u</i>, <i>g</i>, <i>r</i>, <i>i</i>, <i>z</i>), and you can enter minima and/or maxima for each value.</li>

  <li>You can search by color instead of or in addition to magnitude. Your choices for colors are <i>u-g</i>, <i>g-r</i>, <i>r-i</i>, and
         <i>i-z</i>. You can enter minima and/or maxima for each value.</li>

  <li>You also search for specific types of object: <i>extended sources</i>, <i>point sources</i>, <i>sky</i>, or <i>unknown</i>.</li>

  <li>You can also search for the presence or absence of specific <em>flags</em>. See the tutorial <a href="dr8/help/flags.php">Find out if SDSS's imaging data for an object are reliable?</a>
  to see what flags mean and how to use them.</li>

  <li>When you have finished entering all your constraints, click <em>Submit Request</em>. The tool will return only the objects you asked for,
         in the output format you specified. You now have the data you requested. See the next step to learn how to get the same data using SQL.</li>

  <li><p>If you would rather search by magnitudes with SQL, add the following line to the WHERE block of your query:</p>

  <p><code>WHERE g &lt; 17</code></p>

  <p>Substitute any of the filters, any operator (=, &lt;, &gt;, &lt;=, &gt;=, !=), and any value. You can also use BETWEEN to specify a range of magnitudes.</p>

  <p>For example, here is a query to find objects with r magnitudes between 15 and 19:</p>

  <p><code>SELECT TOP 10 objid,ra,dec,r<br />
        FROM PhotoObj<br />
        WHERE g BETWEEN 15 AND 19</code></p>

    </li>

</ol>

<h3 id="absmag">Find by <a href="http://skyserver.sdss3.org/dr8/en/tools/search/sql.asp">Absolute Magnitude</a></h3>

<p>Unfortunately, the Imaging Query Form allows you to search only by apparent magnitude, which is what is observed and stored in the
   database. To find objects by absolute magnitude, you will need to perform a <a href="http://skyserver.sdss3.org/dr8/en/tools/search/sql.asp">
   SQL search</a>.</p>

<p>Absolute magnitude relies on a distance calculation, which the SDSS can supply through redshift. Assuming Hubble Cosmology,
   the distance is equal to (4,280 Mpc) x redshift. So the equation for absolute magnitude is:</p>

<p><em>M</em> = <em>m</em> - 5 log<sub>10</sub> ( 4280&nbsp;Mpc&nbsp;<em>z</em> )</p>

<p>SQL can perform simple mathematical calculations. But, to find magnitude and distance data together, you will need to search
   the <code>specPhoto</code> view, which has both photometric and spectroscopic data. To search this view, and
   add a statement like this to the WHERE block of your query:</p>

<p><code>WHERE modelmag_r-5*log10(4.28E+08*z) &lt; -21</code></p>

<p>For example, this query returns the object IDs, positions, and apparent and absolute r magnitudes for all objects with absolute
magnitude less than -21:</p>

<p><code>SELECT top 10 objid,ra,dec,modelmag_r,modelmag_r-5*log10(4.28E+08*z) as abs_mag_r<br />
FROM SpecPhoto<br />
WHERE modelmag_r-5*log10(4.28E+08*z) &lt; -21</code> </p>



<?php echo foot(); ?>
