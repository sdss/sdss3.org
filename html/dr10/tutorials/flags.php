<?php include '../../header.php'; echo head('Flags Tutorial'); ?>

<p><a href="dr10/tutorials/">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Find out if SDSS's imaging data for an object are reliable?</h2>

<h3>Introduction</h3>

<p>The SDSS does automatic processing to determine the reliability of the imaging data
   for each of the 300 million objects that it has seen. The reliability data are referred to as
   <em>flags</em>. You can view flags for any object through the
   SDSS's <a href="http://skyserver.sdss3.org/dr10">Catalog
   Archive Server (CAS)</a>; the flags are stored in the PhotoObj table in the CAS database. Understanding the
   flags is <b>extremely</b> important for doing science, so that you can understand what data are reliable.</p>

<p>In the Algorithms pages there are <a
href="dr10/algorithms/photo_flags_recommend.php">more detailed
descriptions of the flags and our recommendations on
how to use them</a>. This tutorial shows you some examples of using
these flags.</p>

<p>By using several flags together, you can search for only objects that have clean photometry.
   (<a href="dr10/tutorials/flags.php#clean">skip to clean photometry search guide)</a></p>

<p>Flags are yes/no parameters (see the <a href="dr10/algorithms/bitmasks.php">bitmask</a> page). If a certain flag (such as <i>Saturated</i>) is present for an object,
   the object possesses that characteristic (i.e. its image is saturated). To save space in the database, the
   flags are stored as zeros (absent) or ones (present). Each object has a long bitwise number
   associated with it, where each set of digits corresponds to one flag. The CAS database includes
   functions that translate back and forth between the binary numbers and the flag names.</p>

<p>You can view flag names directly with the <a
   href="http://skyserver.sdss3.org/dr10/en/tools/explore/obj.aspx">
   Explore</a> tool, but to work with flags in search results, you will
   need to know how to use the translate functions.</p>


<h2>Jump to</h2>
<ul>
    <li><a href="dr10/tutorials/flags.php#single">Flags for a single object</a></li>
    <li><a href="dr10/tutorials/flags.php#interpret">Interpret Flags</a></li>
    <li><a href="dr10/tutorials/flags.php#query">Flags in a Query</a></li>
    <li><a href="dr10/tutorials/flags.php#sql">Flags with SQL</a></li>
    <li><a href="dr10/tutorials/flags.php#clean">Clean Photometry</a></li>
    <li><a href="dr10/tutorials/flags.php#cleanflag">A Shortcut: the "clean" flag</a></li>
</ul>

<h3 id="single">Get flags for a single object</h3>

<ol>

<li>Use the <a href="http://skyserver.sdss3.org/dr10/en/tools/explore/obj.aspx">Explore</a> tool
to look at a single object. See the <a href="dr10/tutorials/getimage.php">How do I get an image of my favorite object?</a> tutorial to learn how to use the Explore tool.</li>

<li>Look at <b>flags</b>, the third row of data just below the object's coordinates. You will see the
       object's flags listed, one after the other with one space in between. See the list of flags in the
       <a href="http://skyserver.sdss3.org/dr10/en/help/browser/browser.aspx">Schema Browser</a> for what they mean. Instructions
       for using the Schema Browser are in the next section, <a href="dr10/tutorials/flags.php#interpret">Interpret Flags</a>.</li>

</ol>

<h3 id="interpret">Interpret Flags</h3>

<ol>

<li>Use the <a href="http://skyserver.sdss3.org/dr10/en/help/browser/browser.aspx">Schema Browser</a>
to study the list of the SDSS's flags.</li>

<li>Type <b>flags</b> into the <b>Search</b> window and click <b>Go</b>.</li>

<li>Results of your search will show up in the right-hand window of the Schema Browser. Click on the
       very first <b>PhotoObj</b> link, next to the name <b>flags</b>. You will go to the schema browser
       entry for the PhotoObj view.</li>

<li>The 13<sup>th</sup> entry in the table is <b>flags</b>. Click on the <img src="http://skyserver.sdss3.org/dr10/en/help/docs/images/info.gif" style="float:none;vertical-align:bottom;"  alt="Link to PhotoFlags" />
       (NEED A LOCAL VERSION OF THIS IMAGE) link to the right of <b>flags</b>. </li>

<li>The <em>Data Values</em> table shows the name, value, and description of each flag. <em>Name</em> is the
       name of the flag; this is what you will see in the Explore tool. <em>Value</em> is the bitmask value
       for the flag. <em>Description</em> is a short description of what the flag means.</li>

<li>The <em>Access Functions</em>, <code>fPhotoFlags</code> and <code>fPhotoFlagsN</code>,
       are needed to use the flag names in SQL queries.</li>

</ol>

<h3 id="query">Search for Flags in a Query</h3>

<p>You can search through flags as part of your searches with the <a href="http://skyserver.sdss3.org/dr10/en/tools/search/iqs.aspx">Imaging
   Query Form</a>. You can request that the tool return only objects that possess one or more flags, such as
   searching for moving objects by looking for the <i>MOVED</i> flag. Or you can search for only those objects that
   do not possess certain flags, such as searching for unsaturated objects by checking that the <i>SATURATED</i>
   flag is off.</p>

<ol>

<li>Go to the <a href="http://skyserver.sdss3.org/dr10/en/tools/search/iqs.aspx">Imaging Query Form</a>. From the astronomers'
       main page, look under <b>Search Tools</b>. For more on how to use the Imaging Query Form, see the guide
       <a href="dr10/tutorials/getdata.php">How do I find data for all objects in a given RA/Dec/Magnitude/Absolute Magnitude
       range?</a></li>

<li>Select any parameters you like on the form, then look at the <b>Obj Flags</b> drop-down menus at the
       bottom of the form.</li>

<li>To guarantee that your results will possess a certain flag, select the flag from the <i>At least one of
       these flags ON</i> menu. To select more than one flag to check, hold down the CTRL key while selecting.</li>

<li>To guarantee that your results will not possess a certain flag, select the flag from the <i>All of these flags
       OFF</i> menu. To select more than one flag to check, hold down the CTRL key while selecting.</li>

<li>The flags will not show up in the search results unless you specifically request them in the
       <i>Imaging</i> menu of the <b>Parameters to Return</b> section above. But the flags will be searched, and the
       search will return only objects that meet your flag criteria.</li>

<li>Click <b>Submit Request</b> to send your query to the database.</li>

</ol>

<h3 id="sql">Search for Flags with SQL</h3>

<p>You can also search through flags as part of your searches using SQL. SQL searches will search for and
   return flags as long decimal numbers that have been converted from binary - but you translate between these
   numbers and the flag names with the functions <code>dbo.fPhotoFlags</code> and <code>dbo.fPhotoFlagsN</code>.</p>

<ol>

<li>Go to the <a href="http://skyserver.sdss3.org/dr10/en/tools/search/sql.aspx">SQL Search</a> tool, under the
       <b>Search</b> menu. To get there from the astronomers' main page, look under <b>Search Tools</b>. To
       get there from the public main page, look for <b>Search</b> under <b>SkyServer tools</b>.</li>

<li>To constrain your search based on flags, add one of the following to the WHERE block of your query:

        <ol>
           <li><p>To find only objects for which a certain flag is present:</p>
               <p><code>WHERE (p.flags &amp; dbo.fPhotoFlags('<i>flag</i>')) &gt; 0</code></p>

               <p>Replace <i>flag</i> with the name of the flag you want to search.  For example, this query will find IDs and positions of objects that have
               been flagged as having moved:</p>
               <p><code>SELECT objid, ra, dec<br />
               FROM photoTag<br />
               WHERE (flags &amp; dbo.fPhotoFlags('MOVED')) &gt; 0</code></p>

           </li>
           <li><p>To find only objects for which a certain flag is absent:</p>
               <p><code>WHERE (p.flags &amp; dbo.fPhotoFlags('flag')) = 0</code></p>

               <p>Replace <i>flag</i> with the name of the flag you want to search.  For example, this query will screen out IDs and positions of objects that have
               been flagged as not being saturated:</p>
               <p><code>SELECT objid, ra, dec<br />
               FROM photoTag<br />
               WHERE (flags &amp; dbo.fPhotoFlags('SATURATED')) = 0</code></p>
           </li>

        </ol>
</li>
</ol>



<h3 id="clean">Search for Objects with Clean Photometry</h3>

<p>By using several flags together, you can limit your searches to return only objects that have clean
   photometry, thereby ensuring that you have a good sample. The flags you use differ depending on whether you
   are looking at stars or extended objects.</p>

<p>The queries below run slowly. These are test versions that use <b>TOP 10</b> to return only the first 10
   matching objects. To return all matching objects, remove the top 10 and use the <a href="http://casjobs.sdss.org/casjobs/">CasJobs</a>
   batch query system, which lets you run queries that take up to 8 hours.
   Also, note that lines that start with "--" are comments that are not executed as SQL statements.</p>

<p>For stars, use the following query to return IDs, positions, colors, and flags:</p>

<pre>
SELECT TOP 10 objid, ra, dec, u, g, r, i, z,
dbo.fPhotoFlagsN(flags) as flags
FROM star
WHERE ((flags &amp; 0x10000000) != 0)  -- detected in BINNED1
AND ((flags &amp; 0x8100000c00a4) = 0) -- not EDGE, NOPROFILE, PEAKCENTER,
                                   -- NOTCHECKED, PSF_FLUX_INTERP, SATURATED, or BAD_COUNTS_ERROR
AND (((flags &amp; 0x400000000000) = 0) OR (psfmagerr_g &lt;= 0.2))
                                   -- not DEBLEND_NOPEAK or small PSF error
                                   -- (substitute psfmagerr in other band as appropriate)
AND (((flags &amp; 0x100000000000) = 0) OR (flags &amp; 0x1000) = 0)
</pre>

<p>For extended objects, use the following query to return IDs, positions, colors, and flags:</p>

<pre>
SELECT TOP 10 objid, ra, dec, u, g, r, i, z,
dbo.fPhotoFlagsN(flags) as flags
FROM galaxy
WHERE ((flags &amp; 0x10000000) != 0)  -- detected in BINNED1
AND ((flags &amp; 0x8100000c00a0) = 0) -- not NOPROFILE, PEAKCENTER,
                                   -- NOTCHECKED, PSF_FLUX_INTERP, SATURATED, or BAD_COUNTS_ERROR
                                   -- if you want to accept objects with interpolation problems for PSF mags,
                                   -- change this to: AND ((flags &amp; 0x800a0) = 0)
AND (((flags &amp; 0x400000000000) = 0) OR (psfmagerr_g &lt;= 0.2))
                                   -- not DEBLEND_NOPEAK or small PSF error
                                   -- (substitute psfmagerr in other band as appropriate)
AND (((flags &amp; 0x100000000000) = 0) OR (flags &amp; 0x1000) = 0)
                                   -- not INTERP_CENTER or not COSMIC_RAY omit this AND clause if you
                                   -- want to accept objects with interpolation problems for PSF mags.
</pre>

<p>You might also want to see SkyServer examples, such as  <a
href="http://skyserver.sdss3.org/dr10/en/help/docs/realquery.aspx#cleanStars"> this one </a> and  <a href="http://skyserver.sdss3.org/dr10/en/help/docs/realquery.aspx#cleanGals"> this one </a></p>.

<h3 id="cleanflag">A Shortcut: the "clean" flag</h3>

<p>Finally, the photometric catalogs have a special flag called
<code>clean</code> for each object, which contains an evaluation of
whether the object is "clean" photometry.  This definition is
described in detail in our <a
href="dr10/algorithms/photo_flags_recommend.php">recommended flags
documentation</a>. (It differs slightly from the example directly
above, an example of how different use cases can result in different
decisions about what exactly is the set of "good" data).</p>

<p>Using <code>clean</code> is simple; to get a set of clean
photometry you can just say in CASJobs or SkyServer:</p>

<pre>
  SELECT TOP 100 ra, dec FROM photoObj
  WHERE clean = 1
</pre>

<?php echo foot(); ?>

