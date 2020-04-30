<?php include '../../header.php'; echo head('SDSS-III Bitmasks in IDL'); ?>

<p>The flat files contain all of the bit masks. Using them is
particularly convenient for IDL users who use the <a
href="dr10/software/idlutils.php">idlutils</a>
product.</p>

<p>Inside of idlutils, there is a file:</p>

<pre>
  $IDLUTILS_DIR/data/sdss/sdssMaskbits.par
</pre>

<p>which contains a listing of all mask bits defined for SDSS.</p>

<p>To access these from within IDL, one uses either "sdss_flagval()"
or "sdss_flagname()". The first tells you the integer value
corresponding to each bit mask name.  The second returns the names of
the bits set, given an integer. </p>

<p>For example, you can ask what the integer corresponding to
NEGATIVE_EMISSION is as follows:</p>

<pre>
  IDL&gt; PRINT, sdss_flagval('ZWARNING', 'NEGATIVE_EMISSION')
            64
</pre>

<p>Or, if ZWARNING for a spectrum is set to "246", then you
can check what that means as follows:</p>

<pre>
  IDL&gt; PRINT, sdss_flagname('ZWARNING', 246)
  LITTLE_COVERAGE SMALL_DELTA_CHI2 MANY_OUTLIERS Z_FITLIMIT NEGATIVE_EMISSION UNPLUGGED
</pre>

<p>Uh oh! That spectrum must be Very Bad!</p>

<p>The most common usage is within a program. For example, let's say
you want to find all spectrum for which MANY_OUTLIERS is set.  In IDL
you can do this as follows (assuming that "spobj" is a structure which
has "zwarning" as a tag):</p>

<pre>
  imany= WHERE((spobj.zwarning AND sdss_flagval('ZWARNING', 'MANY_OUTLIERS')) NE 0, nmany)
</pre>

<p>which returns "imany" as an array of those elements with ZWARNING
set. You should be careful in calls such as those above to always ask
for the AND to return a non-zero output (do not check for "less than"
zero, which can get you in trouble if zwarning happens to be cast as a
signed integer). </p>

<p>A useful tool in IDL is the ability to write out an integer in hex
format. E.g. the command below outputs "80000000": </p>

<pre>
  PRINT, STRING(2L^31, FORMAT='(Z)')
</pre>

<?php echo foot(); ?>

