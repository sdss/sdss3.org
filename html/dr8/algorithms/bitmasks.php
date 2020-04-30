<?php include '../../header.php'; echo head('SDSS-III Bitmasks'); ?>

<h2>Conversion Table</h2>

<table class="common"
style="float:right;margin-left:20px;margin-bottom:20px">
<caption>Converting between hex, binary, and decimal </caption>
<tr><th style="text-align:right;">Hex</th><th style="text-align:right;">Binary</th><th style="text-align:right;">Decimal</th></tr>
<tr><td style="text-align:right;">   0x1</td><td style="text-align:right;">       1</td><td style="text-align:right;">   1 </td></tr>
<tr><td style="text-align:right;">   0x2</td><td style="text-align:right;">      10</td><td style="text-align:right;">   2 </td></tr>
<tr><td style="text-align:right;">   0x4</td><td style="text-align:right;">     100</td><td style="text-align:right;">   4 </td></tr>
<tr><td style="text-align:right;">   0x8</td><td style="text-align:right;">    1000</td><td style="text-align:right;">   8 </td></tr>
<tr><td style="text-align:right;">  0x10</td><td style="text-align:right;">   10000</td><td style="text-align:right;">  16 </td></tr>
<tr><td style="text-align:right;">  0x20</td><td style="text-align:right;">  100000</td><td style="text-align:right;">  32 </td></tr>
<tr><td style="text-align:right;">  0x40</td><td style="text-align:right;"> 1000000</td><td style="text-align:right;">  64 </td></tr>
<tr><td style="text-align:right;">  0x80</td><td style="text-align:right;">10000000</td><td style="text-align:right;"> 128 </td></tr>
<tr><td style="text-align:right;">...</td><td style="text-align:right;">...</td><td style="text-align:right;">... </td></tr>
<tr><td style="text-align:right;">0x80000000</td><td style="text-align:right;">1000000....0</td><td style="text-align:right;">2147483648 </td></tr>
</table>

<h2>Description</h2>

<p>SDSS-III makes heavy use of the concept of a "bitmask": using the
bits in an integer as "toggles" to indicate whether certain conditions
are met. For a more general introduction to this concept, consult <a
href="http://en.wikipedia.org/wiki/Mask_%28computing%29">
wikipedia</a> or other online resources on the subject. The links on
the left side tell you details about usage in <a
href="dr8/algorithms/bitmask_cas.php">CAS</a> and in <a
href="dr8/algorithms/bitmask_idl.php">
idlutils</a> (for those using IDL to look at the flat files).  For the
actual bit values for all SDSS-III flags, see the other links on the
leftside panel. What follows below is a primer for those who have
never used bitmasks before.</p>

<p>Within SDSS-III, the most common sort of use of a bitmask is to
indicate the status of an object (or spectrum, or target, or whatever)
with respect to some set of conditions.  For example, a given
photometric object might be saturated, and be deblended, and have some
interpolated pixels. All of these conditions are tracked as "bits" in
a bitmask called "flags". For instance, if bit 18 is set, it indicates
there is a saturated pixel in the object; if bit 18 is not set, there
is no saturated pixel in the object. This sort of bitmask is useful
when there are many possible boolean (true/false) conditions to track,
since it doesn't require an individual variable for each one.</p>

<p>In more detail, when we refer above to "bit 18", we are referring
to the zero-indexed bit, starting with the least significant.  Thus,
if only bit 18 is set, the integer is equal to
2<sup>18</sup>=262144. Of course, in general, many bits can be set, so
the value of the variable is not necessarily a power of two. If the
integer is signed, note that bit 31 indicates the sign of the integer,
so the integer value of a bitmask might be interpreted by the computer
as negative. </p>

<p>Note also that many people express bitmasks in "hexadecimal"
instead of decimal.  You can tell when people are doing this because
they will start with "0x" as in "0x00000100" instead of "8".  The
choice to write the numbers in hexadecimal is just a convention (the
values in the files and in CAS are regular integers).  However, this
choice does often make it easier to figure out which bit is being
referred to. For example, it is easy to figure out that "0x00040000"
is bit 18 than to figure out that 262144 is bit 18. The table above
shows examples of converting among hex, binary and
decimal numbers.</p>

<p>Be aware that many programming languages provide tools for
translating between binary, hex, and decimal (examples for IDL are
given in the link at left.</p>

<h2>Examples</h2>

<p>To get a sense of this behavior, consider some one-byte unsigned
integers, and what their bits are:</p>

<table class="common" style="text-align:right;">
<tr>
<th>bit 7 </th>
<th>bit 6 </th>
<th>bit 5 </th>
<th>bit 4 </th>
<th>bit 3 </th>
<th>bit 2 </th>
<th>bit 1 </th>
<th>bit 0 </th>
<th></th>
<th>integer value</th>
</tr>
<tr>
<td>0</td>
<td>1</td>
<td>0</td>
<td>0</td>
<td>1</td>
<td>0</td>
<td>1</td>
<td>1</td>
<td>=</td>
<td>75</td>
</tr>
<tr>
<td>1</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>1</td>
<td>0</td>
<td>=</td>
<td>130</td>
</tr>
<tr>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>1</td>
<td>1</td>
<td>1</td>
<td>=</td>
<td>7</td>
</tr>
</table>

<p>To check the value of one or more bits, one needs to execute a
"bitwise and" on the bitmask. The simplest case is checking the value
of a single bit. In C, for example, the bitwise and operator is "&amp;",
so you can write an if statement like:</p>

<pre>
  if((myflag &amp; 4) != 0) {
    printf("Bit 2 is set\n");
  } else {
    printf("Bit 2 is not set\n");
  }
</pre>

<p>which will output whether or not bit 2 is set.</p>

<p>What is the code doing here? It is asking for each bit, "is this
bit set in both myflag and in 4?"  If so, the result (an integer) will
have that bit set. We can look for example at what this operation
would look like if myflag were equal to 13:</p>

<table class="common" style="text-align:right;">
<tr>
<th></th>
<th></th>
<th>bit 7 </th>
<th>bit 6 </th>
<th>bit 5 </th>
<th>bit 4 </th>
<th>bit 3 </th>
<th>bit 2 </th>
<th>bit 1 </th>
<th>bit 0 </th>
</tr>
<tr>
<td>myflag</td>
<td>=</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>1</td>
<td>1</td>
<td>0</td>
<td>1</td>
</tr>
<tr>
<td>4</td>
<td>=</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>1</td>
<td>0</td>
<td>0</td>
</tr>
<tr>
<td>myflag &amp; 4</td>
<td>=</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>0</td>
<td>1</td>
<td>0</td>
<td>0</td>
</tr>
</table>

<p>Clearly the result equals "4", and so the condition is satisfied:
bit 2 is set! You can easily generalize these sort of operations to
bitwise "or" or "exclusive or", or "and not". Consult a good computer
science reference for those details. </p>

<p>For SDSS-III, the important thing to know is what each bit means
for each type of bitmask. The links on the left side will yield tables
for each type, telling you what it means when each bit it set. </p>

<?php echo foot(); ?>

