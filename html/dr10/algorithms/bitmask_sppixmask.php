<?php include '../../header.php'; echo head('Mask bits for an SDSS spectrum'); ?>

<p>Each of these bits is set for each fiber and each pixel.
Bits 0-15 indicate something about the spectrum as a whole, or at least about its red or blue half (corresponding to the two spectrographs). Within a spectrum, if these bits are set they will be set for all the bits in one or both of the halves.
Bits 16-31 indicate something
about each particular pixel.</p>

<p>The conditions that are considered very bad are already
used to set the errors to infinity for the effected pixels
(specifically, the inverse variance is set to zero).
The most useful mask bit to look at is BRIGHTSKY,
which indicates when the sky is so bright relative to the
object that perhaps one shouldn't trust any of the object flux there.
Our reported errors are meant to include sky-subtraction errors,
but there are instances (particularly around 5577) where these
errors may be untrustworthy.</p>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td>NOPLUG</td>
<td>0</td>
<td>Fiber not listed in plugmap file</td>
</tr>
<tr>
<td>BADTRACE</td>
<td>1</td>
<td>Bad trace from routine TRACE320CRUDE</td>
</tr>
<tr>
<td>BADFLAT</td>
<td>2</td>
<td>Low counts in fiberflat</td>
</tr>
<tr>
<td>BADARC</td>
<td>3</td>
<td>Bad arc solution</td>
</tr>
<tr>
<td>MANYBADCOLUMNS</td>
<td>4</td>
<td>More than 10% of pixels are bad columns</td>
</tr>
<tr>
<td>MANYREJECTED</td>
<td>5</td>
<td>More than 10% of pixels are rejected in extraction</td>
</tr>
<tr>
<td>LARGESHIFT</td>
<td>6</td>
<td>Large spatial shift between flat and object position</td>
</tr>
<tr>
<td>BADSKYFIBER</td>
<td>7</td>
<td>Sky fiber shows extreme residuals</td>
</tr>
<tr>
<td>NEARWHOPPER</td>
<td>8</td>
<td>DEPRECATED, no longer set as of BOSS DR9.  Prior to DR9 meant within 2 fibers of a whopping fiber (exclusive)</td>
</tr>
<tr>
<td>WHOPPER</td>
<td>9</td>
<td>Whopping fiber, with a very bright source.</td>
</tr>
<tr>
<td>SMEARIMAGE</td>
<td>10</td>
<td>DEPRECATED.  Prior to DR9 meant smear available for red and blue cameras</td>
</tr>
<tr>
<td>SMEARHIGHSN</td>
<td>11</td>
<td>DEPRECATED.  Prior to DR9 meant S/N sufficient for full smear fit</td>
</tr>
<tr>
<td>SMEARMEDSN</td>
<td>12</td>
<td>DEPRECATED.  Prior to DR9 meant S/N only sufficient for scaled median fit</td>
</tr>
<tr>
<td>NEARBADPIXEL</td>
<td>16</td>
<td>Bad pixel within 3 pixels of trace.</td>
</tr>
<tr>
<td>LOWFLAT</td>
<td>17</td>
<td>Flat field less than 0.5</td>
</tr>
<tr>
<td>FULLREJECT</td>
<td>18</td>
<td>Pixel fully rejected in extraction (INVVAR=0)</td>
</tr>
<tr>
<td>PARTIALREJECT</td>
<td>19</td>
<td>Some pixels rejected in extraction</td>
</tr>
<tr>
<td>SCATTEREDLIGHT</td>
<td>20</td>
<td>Scattered light significant</td>
</tr>
<tr>
<td>CROSSTALK</td>
<td>21</td>
<td>Cross-talk significant</td>
</tr>
<tr>
<td>NOSKY</td>
<td>22</td>
<td>Sky level unknown at this wavelength (INVVAR=0)</td>
</tr>
<tr>
<td>BRIGHTSKY</td>
<td>23</td>
<td>Sky level &gt; flux + 10*(flux_err) AND sky &gt; 1.25 * median(sky,99 pixels)</td>
</tr>
<tr>
<td>NODATA</td>
<td>24</td>
<td>DEPRECATED, should be ignored in favor of flagging on INVVAR=0.  Prior to DR9 meant no data available in combine B-spline (INVVAR=0)</td>
</tr>
<tr>
<td>COMBINEREJ</td>
<td>25</td>
<td>Rejected in combine B-spline</td>
</tr>
<tr>
<td>BADFLUXFACTOR</td>
<td>26</td>
<td>Low flux-calibration or flux-correction factor</td>
</tr>
<tr>
<td>BADSKYCHI</td>
<td>27</td>
<td>Relative &chi;<sup>2</sup> &gt; 3 in sky residuals at this wavelength</td>
</tr>
<tr>
<td>REDMONSTER</td>
<td>28</td>
<td>Contiguous region of bad &chi;<sup>2</sup> in sky residuals (with threshold of relative &chi;<sup>2</sup> &gt; 3).</td>
</tr>
</table>
<?php echo foot(); ?>
