<?php include '../../header.php'; echo head('Pairs Tutorial'); ?>

<p><a href="dr8/help/#tutorial">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Find closely paired objects?</h2>


<h3>Introduction</h3>

<p>One common task is to find objects that form close pairs on the sky. Such close pairs might indicate objects that
are interacting in some way, or might help identify clusters of objects. You can search for closely paired objects
in SDSS data with an <a href="http://skyserver.sdss3.org/dr8/en/tools/search/sql.asp">SQL Search</a>
in the Catalog Archive Server. To get to SQL Search from the astronomers' main page,
look under <i>Search Tools</i>. From the public main page, look under <i>SkyServer Tools</i>, then <i>Search</i>.</p>

<p>To learn more about SQL, see SkyServer's <a href="http://skyserver.sdss3.org/dr8/en/help/howto/search">SQL Tutorial</a>
and guide to <a href="http://skyserver.sdss3.org/dr8/en/help/docs/sql_help.asp">Using SQL with SkyServer</a>.</p>

<ol>

<li><p>In the large textbox of the <a href="http://skyserver.sdss3.org/dr8/en/tools/search/sql.asp">SQL Search</a> tool,
type the following query (or see it in the textbox at the bottom of this page):</p>

<pre>
SELECT P1.objID AS P1_ID, P1.ra AS first_ra, P1.dec AS first_dec,
    P2.objID AS second_ID, P2.ra AS second_ra, P2.dec AS second_dec
                                  -- return object IDs and positions for both objects
FROM PhotoTag  P1,                -- P1 is the first object
    Neighbors  N,                 -- N is the pre-computed neighbor objects
    PhotoTag   P2                 -- P2 is the second object
WHERE P1.objID = N. objID         -- P1 and P2 are neighbors
    AND P2.objID = N.NeighborObjID
    AND N.Distance &lt; .05;      -- objects are within 3 arcseconds
</pre>
</li>

<li>The query will return the object ID, ra, and dec of each of the two objects in each pair.</li>

<li>If you would like to see thumbnail images of each of the objects that matches the query, go to the
<a href="http://skyserver.sdss3.org/dr8/en/tools/chart/list.asp">Image List</a> tool. From
the astronomers' main page, look under <i>Advanced Tools</i>. From the public main page, look under
<i>SkyServer Tools</i>.</li>

</ol>

<h3>View <a href="http://skyserver.sdss3.org/dr8/en/tools/chart/list.asp">thumbnails</a></h3>

<ol>

<li>In the Image List tool, click on the <b>Use query to fill form</b> link, near the top left of the tool.
You will see a textbox appear in the main panel of the window.</li>

<li><p>Queries in the Image List tool must take a slightly different form than queries in the SQL Search
tool. All Image List queries must have the following for their SELECT blocks:</p>
<p><code>SELECT <i>name</i>, ra, dec</code></p>

<p>So you must rewrite your query as:</p>

<pre>
SELECT TOP 100 P1.objID AS name, P1.ra AS ra, P1.dec AS dec,
FROM PhotoTag  P1,                -- P1 is the first object
    Neighbors  N,                 -- N is the pre-computed neighbor objects
    PhotoTag   P2                 -- P2 is the second object
WHERE P1.objID = N. objID         -- P1 and P2 are neighbors
    AND P2.objID = N.NeighborObjID
    AND N.Distance &lt; .05;      -- objects are within 3 arcseconds
</pre>

<p>Note that this will return only the name and position of the first object in the pair (although you should be
able to see both objects in the thumbnail image). Also, note that the <i>top 100</i> means that the query
will be limited to return 100 objects.</p>

</li>

<li>Click <b>Submit</b>, then <b>Send to List</b>. You will see thumbnail images for each of the objects that
match your search criteria. The object at the center of the image will be only one of the objects, but both should
be visible in the frame. You may find it helpful to turn on the <b>Grid</b> and <b>PhotoObjs</b> checkbox options.</li>

<li>Note that if you run this query without the <i>top 100</i>, the query will return many results. To get all
results you will probably need to use <a href="http://casjobs.sdss.org/casjobs/">CasJobs</a>.
See the <a href="http://casjobs.sdss.org/casjobs/guide.aspx">CasJobs help pages</a> for more information.</li>

</ol>



<?php echo foot(); ?>
