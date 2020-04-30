<?php include '../../header.php'; echo head('Random Objects Tutorial'); ?>

<p><a href="dr8/help/#tutorial">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Get a random 1% (or x%) subset of the SDSS data?</h2>

<p>The SDSS catalog database is about a terabyte (1,000,000 MB) - far too big for you to download and work with it all at once. But
you can get a random subset of the data using an <a
href="http://skyserver.sdss3.org/dr8/en/tools/search/sql.asp">SQL Search</a>.
To learn more about SQL, see SkyServer's <a href="http://skyserver.sdss3.org/dr8/en/help/howto/search">SQL Tutorial</a>
and guide to <a href="http://skyserver.sdss3.org/dr8/en/help/docs/sql_help.asp">Using SQL with SkyServer</a>.</p>

<ol>

<li>Go to the <a href="http://skyserver.sdss3.org/dr8/en/tools/search/sql.asp">SQL Search</a> page.
From the astronomers' main page, look under <i>Search Tools</i>. From the public main page, look
under <i>SkyServer Tools</i>, then <i>Search</i>.</li>

<li><p>In the large textbox, type the following SQL query:</p>

<pre>
SELECT u, g, r, i, z
FROM Galaxy
WHERE htmid*37 &amp; 0x000000000000FFFF &lt; (650 * 1);
</pre>
</li>

<li>The query will return a 1% subset of the data. To return a different percentage subset of the data,
change the final 1 to a different number (for example, for a random 0.5% subset of the data, change it to 0.5).</li>

<li>The query will return the magnitudes of a 1% subset of the data. You can also return other data, such as
positions and object IDs.</li>

</ol>



<?php echo foot(); ?>
