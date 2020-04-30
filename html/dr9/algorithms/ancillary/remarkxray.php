<?php include '../../../header.php'; echo head('Remarkable X-Ray Source Populations'); ?>

<h2>Summary</h2>

<p>Spectra of the optical counterparts of serendipitous x-ray sources identified by Chandra</p>

<h2>Finding Targets</h2>

<p>An object whose <span class="term">ANCILLARY_TARGET1</span> value include one or more of
the bitmasks in the following table was targeted for spectroscopy as part of this ancillary
target program. See <a href="dr9/algorithms/bitmasks.php">SDSS-III bitmasks</a> to learn how
to use these values to identify objects in this ancillary target program.</p>
<!--
<p class="todo">TODO: survey area???</p>
-->
<table class="ancillary">
<tr>
<th>Sub-program<br />(bit name)</th>
<th>Bit Number</th>
<!--<th>Target density<br />(deg<sup>&ndash;2</sup>)</th>-->
</tr>

<tr>
<td>CXOBRIGHT</td>
<td>58</td>
<!--<td><span class="todo">TODO: ???</span></td>-->
</tr>

<tr>
<td>CXOGRIZt</td>
<td>59</td>
<!--<td><span class="todo">TODO: ???</span></td>-->
</tr>

<tr>
<td>CXORED</td>
<td>60</td>
<!--<td><span class="todo">TODO: ???</span></td>-->
</tr>

</table>

<h2>Description</h2>

<p>This program targets remarkable serendipitous X-ray sources from the
Second XMM-Newton Serendipitous Source Catalog (2XMMi; Watson et al. 2009) and
the Chandra Source Catalog
(CSC; Evans et al. 2010) that do not already have available identification spectra.
Source types of primary interest
include AGN (often obscured), X-ray binaries, magnetic cataclysmic variables, and
strongly flaring stars. </p>

<p>XMM-Newton sources were required to lie within 14' of the pointing center of an
XMM-Newton observation, to have a 2XMMi detection likelihood greater than 12
as defined in Watson et al. (2009), to have a statistically significant
match to an SDSS photometric counterpart, and not to have any 2XMMi problem
flags set. Similarly, Chandra
sources were required to have an SDSS counterpart and not to have any
indication of Chandra source confusion. All
XMM-Newton and Chandra sources having Galactic latitudes of |b| &lt; 20 degrees w
ere furthermore removed to emphasize
extragalactic sources.</p>

<h2>Target Selection Details</h2>

<p>The four XMM-Newton source types for this program were all selected using SDSS model
magnitudes and are determined as follows:</p>
<ul>
 <li><p><span class="term">XMMHR</span>:</p>
     <ul>
      <li>1030 XMM-Newton sources were selected that have  unusual 2XMMi hardness ratios in the HR2-HR3 plane. </li>
     <li> <i>i</i> &lt; 20.5 (to ensure reasonable BOSS spectral quality) </li>
      <li>2-12 keV X-ray to <i>i</i>-band flux ratios greater than 0.03 (to minimize stellar contamination). </li>
   </ul>
  <p>Optical fluxes are defined as <i>f<sub>&#957;</sub> &#916;&#957;</i>, where <i>&#916;&#957;</i>
  is the width of the bandpass.</p></li>


  <li> <span class="term">XMMBRIGHT</span>:
      <ul>
       <li>826 XMM-Newton sources were selected that have bright 2-12 keV fluxes
(brighter than 5 x 10<sup>-14</sup> erg cm<sup>-2</sup> s<sup>-1</sup>). </li>
        <li> <i>i</i> &lt; 20.0</li>
     </ul></li>


   <li> <span class="term">XMMRED</span>:
   <ul>
     <li>627 optically red XMM-Newton sources were selected that have SDSS colors
of<i> g - i</i> &gt; 1.0. </li>
     <li><i>i</i> &lt; 19.3 </li>
     <li>2-12 keV X-ray to <i>i</i>-band flux ratios greater than 0.03.</li>
   </ul></li>


 <li><span class="term">XMMGRIZ</span>:
   <ul>
    <li>149 XMM-Newton sources were selected that have "outlier" SDSS colors: SDSS point-source counterparts that have <i>g - r</i> &gt; 1.2 or <i>r - i</i> &gt; 1.0 or <i>i - z</i> &gt; 1.4.</li>
   <li><i>i</i> &lt; 18-21.3 </li>
   <li>0.5-2 keV X-ray to <i>i</i>-band flux ratios greater than 0.1. </li>
   </ul></li>


</ul>

<p>There is some overlap among these XMM-Newton source-selection approaches (
e.g., a bright XMM-Newton source
might also have optically red colors). At each selection step, we
removed sources already selected in previous XMMNewton
selection steps (following the ordering above). There are 2632 selected
XMM-Newton sources in total.</p>

<p>As with the XMM-Newton sources, Chandra source types were all selected using SDSS model
magnitudues and are determined as follows:</p>
<ul>
  <li> <span class="term">CXOBRIGHT</span>:
    <ul>
     <li>387 Chandra sources were selected that have bright 2-8 keV fluxes (brighter
than 5 x 10<sup>-14</sup> erg cm<sup>-2</sup> s<sup>-1</sup>). </li>
      <li> <i>i</i> &lt; 20.0</li>
    </ul></li>

 <li><span class="term">CXORED</span>:
   <ul>
    <li>635 optically red Chandra sources were selected that have SDSS colors of
(<i>g-i</i>) &gt; 1.0. </li>
     <li><i>i</i> &lt; 19.3 </li>
    <li>2-8 keV X-ray to <i>i</i>-band flux ratios greater than 0.03.</li>
   </ul></li>

 <li><span class="term"> CXOGRIZ </span>:
   <ul>
   <li> 66 Chandra sources were selected that have "outlier" SDSS colors: SDSS point-source counterparts that have <i>g - r</i> &gt; 1.2 or <i>r - i</i> &gt; 1.0 or <i>i - z</i> &gt; 1.4.</li>
   <li><i>i</i> &lt; 18-21.3 </li>
   <li>0.5-2 keV X-ray to <i>i</i>-band flux ratios greater than 0.1. </li>
   </ul></li>


</ul>

<p>Again, there is some overlap among these Chandra source-selection approaches, and again at each step we removed
sources already selected in previous Chandra selection steps (following the ordering above). There are 1088 selected
Chandra sources in total. We furthermore removed selected Chandra sources that were also selected XMM-Newton
sources; this reduced the number of selected Chandra sources to 952. </p>



<h2>Primary contact</h2>

<table class="contact">
<tr><th><a href="http://www2.astro.psu.edu/~niel/">Niel Brandt</a></th></tr>
<tr><td>Pennsylvania State University</td></tr>
<tr><td>niel -at- astro.psu.edu</td></tr>
</table>


<h2>REFERENCES</h2>

<p>

Watson, M. G.,  et al., 2009, A&amp;A, 493, 339
<a href="http://adsabs.harvard.edu/abs/2008arXiv0807.1067W">article</a><br />

Evans, I. N., et al., 2010, ApJS, 189, 37
<a href="http://iopscience.iop.org/0067-0049/189/1/37/">doi:10.1088/0067-0049/189/1/37</a><br />


</p>



<?php echo foot(); ?>

