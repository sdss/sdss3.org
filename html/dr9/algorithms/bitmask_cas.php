<?php include '../../header.php'; echo head('SDSS-III Bitmasks in CAS'); ?>

<p>As for SDSS-I and -II, the SDSS-III CAS allows the user to check
values of a bitmask. See the links on the side for detailed
information on the meanings of all bit masks. </p>

<p>Checking bitmasks can be included in the <code>where</code> clause
of an SQL query, using a form such as:</p>

<pre>
  (flagname &amp; value) != 0
</pre>

<p>where &amp; is a bit-wise AND operator.  Similarly, | is an OR
operator. A simple example is as follows:</p>

<pre>
SELECT plate, mjd, fiberid
FROM specObjAll
WHERE (zWarning &amp; 128) !=0
</pre>

<p>The bitmask value can also be specified in hex. Incidentally, take
care to not use "&gt;0", since if the sign bit is set that check can
fail.</p>

<p>More usage of bitmasks in CAS is documented in <a
href="http://skyserver.sdss3.org/dr8/en/help/docs/sql_help.asp#flags">a set
of examples on the CAS site</a>. Some values of each bitmask are also
enumerated there as part of the Data Constants documentation in the <a
href="http://skyserver.sdss3.org/dr8/en/help/browser/browser.asp"> schema
browser</a>. </p>

<p>As a final note, you will see in some of the documentation that
there are some functions that one can use to return the values
associated with each bitmask (e.g. <code>fPhotoFlags</code>). Those
are useful for readability; however, note that they come with a
performance cost, and that using the bitmask value explicitly will
result in faster queries.</p>

<?php echo foot(); ?>

