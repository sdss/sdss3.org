<?php include '../../header.php'; echo head('FLAGS1: Object flags from photo reductions (first 32 of CAS flags bitmask)'); ?>

<p>In the flat-files, the photo flags are split into two 32-bit
variables (<code>objc_flags1</code> and <code>objc_flags2</code>).  In
the CAS, these are combined into a single variable
<code>flags</code>. The flags listed here are associated with
<code>objc_flags1</code>, and the first 32-bits of
<code>flags</code>.</p>
<p>
Note there are also flags on a per-band basis.  The names of these
flags in the CAS are appended with the band, <em>e.g.</em>, flags_r.  In the
flat files an array of length 5 is used <code>flags[5]</code> ordered
<code>u,g,r,i,z</code>.
</p>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td>CANONICAL_CENTER</td>
<td>0</td>
<td>The quantities (psf counts, model fits and likelihoods) that are usually determined at an object's center as determined band-by-band were in fact determined at the canonical center (suitably transformed). This is due to the object being to close to the edge to extract a profile at the local center, and OBJECT1_EDGE is also set.</td>
</tr>
<tr>
<td>BRIGHT</td>
<td>1</td>
<td>Indicates that the object was detected as a bright object. Since these are typically remeasured as faint objects, most users can ignore BRIGHT objects.</td>
</tr>
<tr>
<td>EDGE</td>
<td>2</td>
<td>Object is too close to edge of frame in this band.</td>
</tr>
<tr>
<td>BLENDED</td>
<td>3</td>
<td>Object was determined to be a blend. The flag is set if: more than one peak is detected within an object in a single band together; distinct peaks are found when merging different colours of one object together; or distinct peaks result when merging different objects together. </td>
</tr>
<tr>
<td>CHILD</td>
<td>4</td>
<td>Object is a child, created by the deblender.</td>
</tr>
<tr>
<td>PEAKCENTER</td>
<td>5</td>
<td>Given center is position of peak pixel, as attempts to determine a better centroid failed.</td>
</tr>
<tr>
<td>NODEBLEND</td>
<td>6</td>
<td>Although this object was marked as a blend, no deblending was attempted.</td>
</tr>
<tr>
<td>NOPROFILE</td>
<td>7</td>
<td>Frames couldn't extract a radial profile.</td>
</tr>
<tr>
<td>NOPETRO</td>
<td>8</td>
<td> No Petrosian radius or other Petrosian quanties could be measured.</td>
</tr>
<tr>
<td>MANYPETRO</td>
<td>9</td>
<td>Object has more than one possible Petrosian radius.</td>
</tr>
<tr>
<td>NOPETRO_BIG</td>
<td>10</td>
<td>The Petrosian ratio has not fallen to the value at which the Petrosian radius is defined at the outermost point of the extracted radial profile. NOPETRO is set, and the Petrosian radius is set to the outermost point in the profile.</td>
</tr>
<tr>
<td>DEBLEND_TOO_MANY_PEAKS</td>
<td>11</td>
<td>The object had the OBJECT1_DEBLEND flag set, but it contained too many candidate children to be fully deblended. This flag is only set in the parent, i.e. the object with too many peaks.</td>
</tr>
<tr>
<td>CR</td>
<td>12</td>
<td>Object contains at least one pixel which was contaminated by a cosmic ray. The OBJECT1_INTERP flag is also set. This flag does not mean that this object is a cosmic ray; rather it means that a cosmic ray has been removed. </td>
</tr>
<tr>
<td>MANYR50</td>
<td>13</td>
<td> More than one radius was found to contain 50% of the Petrosian flux. (For this to happen part of the radial profile must be negative).</td>
</tr>
<tr>
<td>MANYR90</td>
<td>14</td>
<td>More than one radius was found to contain 90% of the Petrosian flux. (For this to happen part of the radial profile must be negative).</td>
</tr>
<tr>
<td>BAD_RADIAL</td>
<td>15</td>
<td> Measured profile includes points with a S/N &lt;= 0. In practice this flag is essentially meaningless.</td>
</tr>
<tr>
<td>INCOMPLETE_PROFILE</td>
<td>16</td>
<td>A circle, centerd on the object, of radius the canonical Petrosian radius extends beyond the edge of the frame. The radial profile is still measured from those parts of the object that do lie on the frame.</td>
</tr>
<tr>
<td>INTERP</td>
<td>17</td>
<td> The object contains interpolated pixels (e.g. cosmic rays or bad columns).</td>
</tr>
<tr>
<td>SATUR</td>
<td>18</td>
<td>The object contains saturated pixels; INTERP is also set.</td>
</tr>
<tr>
<td>NOTCHECKED</td>
<td>19</td>
<td>Object includes pixels that were not checked for peaks, for example the unsmoothed edges of frames, and the cores of subtracted or saturated stars.</td>
</tr>
<tr>
<td>SUBTRACTED</td>
<td>20</td>
<td>Object (presumably a star) had wings subtracted.</td>
</tr>
<tr>
<td>NOSTOKES</td>
<td>21</td>
<td>Object has no measured Stokes parameters.</td>
</tr>
<tr>
<td>BADSKY</td>
<td>22</td>
<td>The estimated sky level is so bad that the central value of the radial profile is crazily negative; this is usually the result of the subtraction of the wings of bright stars failing.</td>
</tr>
<tr>
<td>PETROFAINT</td>
<td>23</td>
<td>At least one candidate Petrosian radius occured at an unacceptably low surface brightness.</td>
</tr>
<tr>
<td>TOO_LARGE</td>
<td>24</td>
<td> The object is (as it says) too large. Either the object is still detectable at the outermost point of the extracted radial profile (a radius of approximately 260 arcsec), or when attempting to deblend an object, at least one child is larger than half a frame (in either row or column).</td>
</tr>
<tr>
<td>DEBLENDED_AS_PSF</td>
<td>25</td>
<td>When deblending an object, in this band this child was treated as a PSF.</td>
</tr>
<tr>
<td>DEBLEND_PRUNED</td>
<td>26</td>
<td>When solving for the weights to be assigned to each child the deblender encountered a nearly singular matrix, and therefore deleted at least one of them.</td>
</tr>
<tr>
<td>ELLIPFAINT</td>
<td>27</td>
<td>No isophotal fits were performed.</td>
</tr>
<tr>
<td>BINNED1</td>
<td>28</td>
<td>The object was detected in an unbinned image.</td>
</tr>
<tr>
<td>BINNED2</td>
<td>29</td>
<td> The object was detected in a 2x2 binned image after all unbinned detections have been replaced by the background level.</td>
</tr>
<tr>
<td>BINNED4</td>
<td>30</td>
<td>The object was detected in a 4x4 binned image. The objects detected in the 2x2 binned image are not removed before doing this.</td>
</tr>
<tr>
<td>MOVED</td>
<td>31</td>
<td>The object appears to have moved during the exposure. Such objects are candidates to be deblended as moving objects.</td>
</tr>
</table>

<?php echo foot(); ?>
