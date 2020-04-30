<?php include '../../header.php'; echo head('Finding Files Tutorial'); ?>

<p><a href="dr8/help/#tutorial">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Find images and spectra for all objects in a given RA/Dec/Magnitude/Absolute Magnitude range?</h2>

<h3>Introduction</h3>

<p>You can use the Catalog Archive Server (CAS)'s search tools to find all objects that meet certain criteria, such as position,
magnitude, color, or absolute magnitude. The guide <a href="dr8/help/getdata.php">How do I find data for all objects
in a given RA/Dec/Magnitude/Absolute Magnitude range?</a> shows how to use search tools to find such catalog data.</p>

<p>But in addition to searching for catalog data, you can also search for images and spectra using any
constraints you want, including position, magnitude, and absolute magnitude. To search for images and
spectra, you will use the <a href="http://skyserver.sdss3.org/dr8/en/tools/chart/list.asp">Image List</a> tool along
with <a href="http://skyserver.sdss3.org/dr8/en/help/howto/search">SQL</a>.</p>

<p>This is an extremely powerful way to access SDSS data, because it allows you to search based on any
criteria, and then to quickly view all objects that meet your criteria.</p>

<h2>Jump to:</h2>
<ul>
    <li><a href="dr8/help/searchimage.php#imagelist">Using the Image List tool</a></li>
    <li><a href="dr8/help/searchimage.php#query">Submit a Query to Image List</a></li>
    <li><a href="dr8/help/searchimage.php#view">View Your Search Results</a></li>
</ul>


<h3 id="imagelist">Using the <a href="http://skyserver.sdss3.org/dr8/en/tools/chart/list.asp">Image List tool</a></h3>

<ol>

  <li><p>Go to the <a href="http://skyserver.sdss3.org/dr8/en/tools/chart/list.asp">Image List tool</a>.
  From the astronomers' main page, look under <i>Advanced Tools</i>. From the public main page, look under
  <i>SkyServer Tools</i>.</p></li>

  <li><p>You can use the textbox in the upper left of the form, just above <i>Cut and Paste ra/dec list</i>, to
  get thumbnail images of a list of objects. Paste the list into the textbox in the upper left corner, in
  this format: <em>name ra dec</em> (with spaces between). <i>name</i> can be anything you want; <i>ra</i> and
  <i>dec</i> must be in decimal degrees.</p></li>

  <li><p>However, you can also fill in the Image List with results from an SQL search (also called a <i>query</i>),
  allowing you to see thumbnail images of objects that meet your search criteria. To send query results to the
  Image List tool, click the small <b>Use query to fill form</b> link above the textbox. </p></li>

</ol>

<h3 id="query">Submit a Query to <a href="http://skyserver.sdss3.org/dr8/en/tools/chart/list.asp">Image List</a></h3>

<ol>

  <li><p>Replace the default query in the textbox with your own query. <em>IMPORTANT</em>: the <i>SELECT</i> block of the
  query must take the form:</p>
  <p><code>SELECT <i>name</i>, ra, dec</code></p>
  <p>The name can be any piece of data you want, but the RA and Dec must be the <i>ra</i> and <i>dec</i>
     fields from the database (note: SQL is not case-sensitive). For example, this query returns object
     IDs and positions of 40 galaxies:</p>
  <pre>
  SELECT TOP 40 objid, ra, dec
  FROM photoObj
  WHERE type = 3;
  </pre>
  <p>The Image List tool is limited to returning 1,000 objects from search results. If you request more than
  1,000 objects, the list will only display the first 1,000.</p>
  </li>

  <li><p>Click <b>Submit</b> to send the query to the database. A list of results will come up in a new frame
  in the same window.</p></li>

  <li><p>Click <b>Send to List</b> to send the results to the Image List tool. You will now see a frame of
  thumbnail images of your search results.</p></li>

</ol>


<h3 id="view">View Your <a href="http://skyserver.sdss3.org/dr8/en/tools/chart/list.asp">Search Results</a></h3>

<ol>

  <li><p>Click on the thumbnail image to go to the <a href="http://skyserver.sdss3.org/dr8/en/tools/chart/navi.asp">Navigate</a> tool
  entry for that object. The Navigate tool will give you an image of the object and the
  area around it, which you can zoom in or out of.</p></li>

  <li><p>Click on the object's name (above the thumbnail image) to go
  to the <a href="http://skyserver.sdss3.org/dr8/en/tools/explore/obj.asp">Explore</a>
  tool entry for that object. The Explore tool shows complete data for the object,
  including a spectrum if one was observed by the SDSS.</p></li>

  <li><p>To download FITS images of the object, click on the <b>FITS</b> link below the <i>PhotoObj</i> heading in
  the left-hand menu of the Explore tool. <i>Corrected Frames</i> are the final step of processing for SDSS images. There is one
  image for each filter. Right-click on the label for the filter you want to download the image.</p></li>

  <li><p>From the <i>Summary</i> page, click on the spectrum to show a larger view. Spectral lines are marked
  in pink and green. The redshift and redshift error are also marked on the spectrum.</p></li>

  <li><p>To see the spectrum as a FITS file, click on the <b>FITS</b> link below the <i>SpecObj</i> heading
  in the left-hand menu. Right-click on the <b>Download</b> link to download the spectrum. It will be a fits file
  with 4 rows and about 4,000 columns. </p></li>

  <li><p>You can view and analyze the spectrum using the <a href="http://www.stsci.edu/resources/software_hardware/specview/">SpecView</a>
  applet, developed by the Space Telescope Science Institute.</p></li>

</ol>



<?php echo foot(); ?>
