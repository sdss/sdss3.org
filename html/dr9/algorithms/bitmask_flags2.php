<?php include '../../header.php'; echo head('FLAGS2: Object flags from photo reductions (second 32 of CAS flags bitmask)'); ?>

<p>In the flat-files, the photo flags are split into two 32-bit
variables (<code>objc_flags1</code> and <code>objc_flags2</code>).  In
the CAS, these are combined into a single variable
<code>flags</code>. The flags listed here are associated with
<code>objc_flags2</code>, and the second 32-bits of
<code>flags</code>.</p>
<p>
Note there are also flags on a per-band basis.  The names of these
flags in the CAS are appended with the band, <em>e.g.</em>, flags_r.  In the
flat files an array of length 5 is used <code>flags2[5]</code> ordered
<code>u,g,r,i,z</code>
</p>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td>DEBLENDED_AS_MOVING</td>
<td>0</td>
<td>The object has the MOVED flag set, and was deblended on the assumption that it was moving.</td>
</tr>
<tr>
<td>NODEBLEND_MOVING</td>
<td>1</td>
<td>The object has the MOVED flag set, but was not deblended as a moving object.</td>
</tr>
<tr>
<td>TOO_FEW_DETECTIONS</td>
<td>2</td>
<td>The object has the MOVED flag set, but has too few detection to be deblended as moving.</td>
</tr>
<tr>
<td>BAD_MOVING_FIT</td>
<td>3</td>
<td>The fit to the object as a moving object is too bad to be believed.</td>
</tr>
<tr>
<td>STATIONARY</td>
<td>4</td>
<td>A moving objects velocity is consistent with zero</td>
</tr>
<tr>
<td>PEAKS_TOO_CLOSE</td>
<td>5</td>
<td>Peaks in object were too close (set only in parent objects).</td>
</tr>
<tr>
<td>BINNED_CENTER</td>
<td>6</td>
<td>When centroiding the object the object's size is larger than the (PSF) filter used to smooth the image.</td>
</tr>
<tr>
<td>LOCAL_EDGE</td>
<td>7</td>
<td>The object's center in some band was too close to the edge of the frame to extract a profile.</td>
</tr>
<tr>
<td>BAD_COUNTS_ERROR</td>
<td>8</td>
<td>An object containing interpolated pixels had too few good pixels to form a reliable estimate of its error</td>
</tr>
<tr>
<td>BAD_MOVING_FIT_CHILD</td>
<td>9</td>
<td>A putative moving child's velocity fit was too poor, so it was discarded, and the parent was not deblended as moving</td>
</tr>
<tr>
<td>DEBLEND_UNASSIGNED_FLUX</td>
<td>10</td>
<td>After deblending, the fraction of flux assigned to none of the children was too large (this flux is then shared out as described elsewhere).</td>
</tr>
<tr>
<td>SATUR_CENTER</td>
<td>11</td>
<td>An object's center is very close to at least one saturated pixel; the object may well be causing the saturation.</td>
</tr>
<tr>
<td>INTERP_CENTER</td>
<td>12</td>
<td>An object's center is very close to at least one interpolated pixel.</td>
</tr>
<tr>
<td>DEBLENDED_AT_EDGE</td>
<td>13</td>
<td>An object so close to the edge of the frame that it would not ordinarily be deblended has been deblended anyway. Only set for objects large enough to be EDGE in all fields/strips.</td>
</tr>
<tr>
<td>DEBLEND_NOPEAK</td>
<td>14</td>
<td>A child had no detected peak in a given band, but we centroided it anyway and set the BINNED1</td>
</tr>
<tr>
<td>PSF_FLUX_INTERP</td>
<td>15</td>
<td>The fraction of light actually detected (as opposed to guessed at by the interpolator) was less than some number (currently 80%) of the total.</td>
</tr>
<tr>
<td>TOO_FEW_GOOD_DETECTIONS</td>
<td>16</td>
<td>A child of this object had too few good detections to be deblended as moving.</td>
</tr>
<tr>
<td>CENTER_OFF_AIMAGE</td>
<td>17</td>
<td>At least one peak's center lay off the atlas image in some band. This can happen when the object's being deblended as moving, or if the astrometry is badly confused.</td>
</tr>
<tr>
<td>DEBLEND_DEGENERATE</td>
<td>18</td>
<td>At least one potential child has been pruned because its template was too similar to some other child's template.</td>
</tr>
<tr>
<td>BRIGHTEST_GALAXY_CHILD</td>
<td>19</td>
<td>This is the brightest child galaxy in a blend.</td>
</tr>
<tr>
<td>CANONICAL_BAND</td>
<td>20</td>
<td>This band was the canonical band. This is the band used to measure the Petrosian radius used to calculate the Petrosian counts in each band, and to define the model used to calculate model colors; it has no effect upon the coordinate system used for the OBJC center.</td>
</tr>
<tr>
<td>AMOMENT_UNWEIGHTED</td>
<td>21</td>
<td>'Adaptive' moments are actually unweighted.</td>
</tr>
<tr>
<td>AMOMENT_SHIFT</td>
<td>22</td>
<td>Object's center moved too far while determining adaptive moments. In this case, the M_e1 and M_e2 give the (row, column) shift, not the object's shape.</td>
</tr>
<tr>
<td>AMOMENT_MAXITER</td>
<td>23</td>
<td>Too many iterations while determining adaptive moments.</td>
</tr>
<tr>
<td>MAYBE_CR</td>
<td>24</td>
<td>This object may be a cosmic ray. This bit can get set in the cores of bright stars, and is quite likely to be set for the cores of saturated stars.</td>
</tr>
<tr>
<td>MAYBE_EGHOST</td>
<td>25</td>
<td>Object appears in the right place to be an electronics ghost.</td>
</tr>
<tr>
<td>NOTCHECKED_CENTER</td>
<td>26</td>
<td>Center of object lies in a NOTCHECKED region. The object is almost certainly bogus.</td>
</tr>
<tr>
<td>HAS_SATUR_DN</td>
<td>27</td>
<td>This object is saturated in this band and the bleed trail doesn't touch the edge of the frame, we we've made an attempt to add up all the flux in the bleed trails, and to include it in the object's photometry. </td>
</tr>
<tr>
<td>DEBLEND_PEEPHOLE</td>
<td>28</td>
<td>The deblend was modified by the optimizer</td>
</tr>
<tr>
<td>SPARE3</td>
<td>29</td>
<td></td>
</tr>
<tr>
<td>SPARE2</td>
<td>30</td>
<td></td>
</tr>
<tr>
<td>SPARE1</td>
<td>31</td>
<td></td>
</tr>
</table>

<?php echo foot(); ?>
