<?php include '../../header.php'; echo head('Cross-ID Tutorial'); ?>

<p><a href="dr9/tutorials/">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Upload my own data to see what the SDSS knows about those objects?</h2>



<p>You can provide a list of your own objects, then use the <a
href="http://skyserver.sdss3.org/dr9/en/">SkyServer</a> to see what those objects look like in the SDSS. This is especially useful when looking for
optical counterparts to objects seen in other wavelengths. The tool to do this is the
<a href="http://skyserver.sdss3.org/dr9/en/tools/crossid/upload_new.asp">Imaging 
Cross-Identification</a>
tool. From the astronomers' home page, look under <i>Search Tools</i>. From the
public home page, look under <i>SkyServer Tools</i>, then <i>Object Crossid</i>.</p>



<h3 id="crossid">Using the Imaging <a
href="http://skyserver.sdss3.org/dr9/en/tools/crossid/upload_new.asp">Cross-ID tool</a></h3>


<ol>

<li><p>In the <i>Search Type</i> dropdown menu, choose the type of search that you want to do. The options are:</p>

   <ul>
     <li><i>The nearest primary object</i>:   The single <a href="dr9/help/glossary.php#primary">primary</a>
     object nearest to the position that you will enter or upload. Primary object means the best single
     observation of the object; other observations of the same object may be available.</li>

     <li><i>The nearest object</i>:  The object nearest to the position that you will enter or upload,
     whether or not it is a <a href="dr9/help/glossary.php#primary">primary</a>
     observation.</li>

     <li><i>All nearby objects</i>: All objects within your specified search radius.</li>

     <li><i>All nearby primary objects</i>:  All <a href="dr9/help/glossary.php#primary">primary</a> observations of
     objects within your specified search radius.</li>

     <li><i>5-part SDSS ID</i>: instead of searching by RA and dec, the tool will search based on the SDSS's five-part
     imaging ID number (run-rerun-camcol-field-object).</li>

   </ul>

</li>

<li>Enter a search radius (in arcminutes) in the <i>Search Radius</i> textbox. This is the radius around each
of your objects that the tool will search as it looks for a matching SDSS object. The maximum radius you can enter
is 3 arcminutes.</li>

<li>Enter the number of columns that precede your RA and dec in the textbox labeled <i>Number of preceding
non-data columns</i>. For example, if your data consists of (name, ra, dec), enter 1 in this box.</li>

<li>You can enter your data to cross-match (in other words, the list of objects for which you want to see
SDSS data) in one of two ways. Either enter it in the large textbox, or upload a file using the smaller textbox
below it. When there is data in the textbox and a file specified in the upload box, the file takes priority.</li>

<li>Choose the <i>Format</i> you would like results returned in. <i>HTML</i> will return results as a table in your
browser. <i>CSV</i> will return results as a comma-separated value file, which can be opened by many
graphing programs.</li>

<li>You can change what types of data the query returns by editing the SQL query just above the <i>Format</i>
selector. Make sure the photo table/view is aliased as 'p' - for example <i>photoTag p</i>. Do not modify the #x
and #upload parts of the FROM clause; otherwise your upload will not work.</li>

<li>Click <b>Submit</b> to run your query.</li>

<li>If you have chosen the default options, the query will return the following data: the SDSS Object ID,
the position (RA and Dec), the type of object (<i>STAR</i> or <i>GALAXY</i>), and the SDSS's five
magnitudes (<i>u</i>, <i>g</i>, <i>r</i>, <i>i</i>, and <i>z</i>). Click on the object ID to go to the
<a href="http://skyserver.sdss3.org/dr9/en/tools/explore/obj.asp">Explore</a> tool, which will
give you more information about the object.</li>

</ol>



<h3 id="thumbnails">Get SDSS <a href="http://skyserver.sdss3.org/dr9/en/tools/chart/list.asp">thumbnails</a></h3>

<ol>

<li>Once you have the SDSS object ID, RA, and dec of your objects from the Imaging Cross-ID tool, you can
get thumbnail images of what the objects look like in the SDSS using
the <a href="http://skyserver.sdss3.org/dr9/en/tools/chart/list.asp">Image List</a>
tool. To get to the tool from the astronomers' main page, look under <i>Advanced Tools</i>.
From the public main page, look under <i>SkyServer Tools</i>.</li>

<li>Copy and paste the object ID, RA, and dec into the textbox in the upper left of the form, just above
<i>Cut and Paste ra/dec list</i>. Be sure to leave one space between each piece of data. Click <b>Get Image</b>.
The Image List tool is limited to returning 1,000 objects.</li>

<li>A thumbnail image of each result will come up in a new frame within the same window.</li>

<li>Click on the thumbnail image to go to the <a
href="http://skyserver.sdss3.org/dr9/en/tools/chart/navi.asp">Navigate</a>
tool entry for that object. The Navigate tool will give you an image of the object
and the area around it, which you can zoom in or out of.</li>

<li>Click on the object's name (above the thumbnail image) to go to the
<a href="http://skyserver.sdss3.org/dr9/en/tools/explore/obj.asp">Explore</a>
tool entry for that object. The Explore tool shows complete data for the object,
including a spectrum if one was observed by the SDSS.</li>

</ol>





<?php echo foot(); ?>
