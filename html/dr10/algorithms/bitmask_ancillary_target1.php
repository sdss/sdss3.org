<?php include '../../header.php'; echo head('ANCILLARY_TARGET1: Objects selected as BOSS Ancillary Targets'); ?>

<p>The presence of a nonzero value for this target flag indicates that the object
was selected through one or more of the BOSS
<a href="dr10/algorithms/ancillary/boss/">ancillary target selection programs</a>.</p>

<p>If you don't see the ancillary target bit you're looking for here, try the other
ancillary target flag parameter, <a href="dr10/algorithms/bitmask_ancillary_target2.php"><code>
ANCILLARY_TARGET2</code></a>.</p>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/transient82.php">AMC</a></td>
<td>0</td>
<td>Candidate Am CVn variables in Stripe 82</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/transient82.php">FLARE1</a></td>
<td>1</td>
<td>Flaring M stars in Stripe 82 (year 1 targets)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/transient82.php">FLARE2</a></td>
<td>2</td>
<td>Flaring M stars in Stripe 82 (year 2 targets)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/transient82.php">HPM</a></td>
<td>3</td>
<td>High Proper Motion stars in Stripe 82</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/transient82.php">LOW_MET</a></td>
<td>4</td>
<td>Low-metallicity M dwarfs in Stripe 82</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/transient82.php">VARS</a></td>
<td>5</td>
<td>Unusual variable objects (colors outside the stellar and quasar loci) in Stripe 82</td>
</tr>
<tr>
<td>BLAZGVAR</td>
<td>6</td>
<td>A flag used in a pilot version of the ancillary targeting program
<a href="dr10/algorithms/ancillary/boss/heblazars.php">High-Energy Blazars and Optical
Counterparts to Gamma-Ray Sources</a>; no longer used</td>
</tr>
<tr>
<td>BLAZR</td>
<td>7</td>
<td>A flag used in a pilot version of the ancillary targeting program
<a href="dr10/algorithms/ancillary/boss/heblazars.php">High-Energy Blazars and Optical
Counterparts to Gamma-Ray Sources</a>; no longer used</td>
</tr>
<tr>
<td>BLAZXR</td>
<td>8</td>
<td>A target that might have a match with a Fermi source, but which is now below the
detection limits of the early Fermi source catalogs</td>
</tr>
<tr>
<td>BLAZXRSAM</td>
<td>9</td>
<td>A flag used in a pilot version of the ancillary targeting program
<a href="dr10/algorithms/ancillary/boss/heblazars.php">High-Energy Blazars and Optical
Counterparts to Gamma-Ray Sources</a>; no longer used</td>
</tr>
<tr>
<td>BLAZXRVAR</td>
<td>10</td>
<td>A flag used in a pilot version of the ancillary targeting program
<a href="dr10/algorithms/ancillary/boss/heblazars.php">High-Energy Blazars and Optical
Counterparts to Gamma-Ray Sources</a>; no longer used</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/remarkxray.php">XMMBRIGHT</a></td>
<td>11</td>
<td>An object that matches a serendipitous x-ray source from the
<a href="http://xmmssc-www.star.le.ac.uk/Catalogue/2XMMi/">Second XMM-Newton
Serendipitous Source Catalog (2XMMi)</a>, with bright <i>i</i> magnitudes (<i>i</i> &lt; 20.5)
and bright 2-12 keV fluxes (<i>f<sub>2-12 keV</sub></i> &gt; 5 x 10<sup>-14</sup>
erg*cm<sup>-2</sup>*s<sup>-1</sup>)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/remarkxray.php">XMMGRIZ</a></td>
<td>12</td>
<td>An object that matches a serendipitous x-ray source from the <a href="http://xmmssc-www.star.le.ac.uk/Catalogue/2XMMi/">Second XMM-Newton
Serendipitous Source Catalog (2XMMi)</a>, with outlier SDSS colors
(<i>g</i> - <i>r</i> &gt; 1.2 or <i>r</i> - <i>i</i> &gt; 1.0 or
<i>i</i> - <i>z</i> &gt; 1.4)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/remarkxray.php">XMMHR</a></td>
<td>13</td>
<td>An object that matches a serendipitous x-ray source from the <a href="http://xmmssc-www.star.le.ac.uk/Catalogue/2XMMi/">Second XMM-Newton
Serendipitous Source Catalog (2XMMi)</a>, with unusual hardness
ratios in the HR2-HR3 plane</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/remarkxray.php">XMMRED</a></td>
<td>14</td>
<td>An object that matches a serendipitous x-ray source from the <a href="http://xmmssc-www.star.le.ac.uk/Catalogue/2XMMi/">Second XMM-Newton
Serendipitous Source Catalog (2XMMi)</a> with highly red
SDSS colors (<i>g</i> - <i>i</i> &gt; 1.0)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/balvarqso.php">FBQSBAL</a></td>
<td>15</td>
<td>Broad absorption line (BAL) quasar with spectrum from the
<a href="http://sundog.stsci.edu/first/QSOComposites/">FIRST Bright Quasar
Survey</a></td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/balvarqso.php">LBQSBAL</a></td>
<td>16</td>
<td>Broad absorption line (BAL) quasar with spectrum from the
<a href="http://heasarc.gsfc.nasa.gov/W3Browse/galaxy-catalog/lbqs.html">Large Bright Quasar
Survey</a></td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/balvarqso.php">ODDBAL</a></td>
<td>17</td>
<td>Broad absorption line (BAL) quasar with various unusual properties (selected by hand)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/balvarqso.php">OTBAL</a></td>
<td>18</td>
<td>Photometrically-selected overlapping-trough (OT) broad absorption line (BAL) quasar</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/balvarqso.php">PREVBAL</a></td>
<td>19</td>
<td>Broad absorption line (BAL) quasar with prior spectrum from SDSS-I/-II</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/balvarqso.php">VARBAL</a></td>
<td>20</td>
<td>Photometrically-selected candidate broad absorption line (BAL) quasar</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/brightgal.php">BRIGHTGAL</a></td>
<td>21</td>
<td>Bright (<em>r &lt; 16</em>) galaxies whose spectra were missed by the original SDSS spectroscopic survey</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/varqsoabsorb.php">QSO_AAL</a></td>
<td>22</td>
<td>Radio-quiet variable quasar candidates with one absorption system associated with the
quasar (v &le; 5000 km/s in the quasar rest frame)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/varqsoabsorb.php">QSO_AALS</a></td>
<td>23</td>
<td>Radio-quiet variable quasar candidates with multiple absorption systems (associated and/or
intervening)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/varqsoabsorb.php">QSO_IAL</a></td>
<td>24</td>
<td>Radio-quiet variable quasar candidates with one absorption system in the intervening space
along our line-of-sight (v &gt; 5000 km/s in the quasar rest frame)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/varqsoabsorb.php">QSO_RADIO</a></td>
<td>25</td>
<td>Radio-loud variable quasar candidates with multiple absorption systems (associated
and/or intervening)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/varqsoabsorb.php">QSO_RADIO_AAL</a></td>
<td>26</td>
<td>Radio-loud variable quasar candidates with one absorption system associated with the
quasar (v &le; 5000 km/s in the quasar rest frame)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/varqsoabsorb.php">QSO_RADIO_IAL</a></td>
<td>27</td>
<td>Radio-loud variable quasar candidates with one absorption system in the intervening space
along our line-of-sight (v &gt; 5000 km/s in the quasar rest frame)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/varqsoabsorb.php">QSO_NOAALS</a></td>
<td>28</td>
<td>Radio-quiet variable quasar candidates with no associated absorption systems and
multiple intervening absorption systems</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/highz.php">QSO_GRI</a></td>
<td>29</td>
<td>Candidate high-redshift quasar (z &gt; 3.6), selected in <i>gri</i> color space</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/highz.php">QSO_HIZ</a></td>
<td>30</td>
<td>Candidate high-redshift quasar (z &gt; 5.6), detected only in SDSS
<span class="term">i</span> and <span class="term">z</span> filters.</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/highz.php">QSO_RIZ</a></td>
<td>31</td>
<td>Candidate high-redshift quasar (z &gt; 4.5), selected in <i>riz</i> color space</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/redqso.php">RQSS_SF</a></td>
<td>32</td>
<td>Candidate reddened quasar ( E(B-V)) &gt; 0.5 ), selected from an SDSS
<a href="dr10/help/glossary.php#primary">primary</a> catalog object matched with
<a href="http://sundog.stsci.edu/first/catalogs.html">FIRST catalog</a> data</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/redqso.php">RQSS_SFC</a></td>
<td>33</td>
<td>Candidate reddened quasar ( E(B-V)) &gt; 0.5 ), selected from an SDSS
<a href="dr10/help/glossary.php#child">child</a> catalog object matched with
<a href="http://sundog.stsci.edu/first/catalogs.html">FIRST catalog</a> data</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/redqso.php">RQSS_STM</a></td>
<td>34</td>
<td>Candidate reddened quasar ( E(B-V)) &gt; 0.5 ), selected from an SDSS
<a href="dr10/help/glossary.php#primary">primary</a> catalog object matched with
<a href="http://www.ipac.caltech.edu/2mass/releases/allsky/index.html">2MASS
catalog</a> data</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/redqso.php">RQSS_STMC</a></td>
<td>35</td>
<td>Candidate reddened quasar ( E(B-V)) &gt; 0.5 ), selected from an SDSS
<a href="dr10/help/glossary.php#child">child</a> catalog object matched with
<a href="http://www.ipac.caltech.edu/2mass/releases/allsky/index.html">2MASS
catalog</a> data</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/supernovahosts.php">SN_GAL1</a></td>
<td>36</td>
<td>Likely host galaxy for an
<a href="http://www.sdss.org/supernova/aboutsupernova.html">SDSS-II supernova</a>, with the
BOSS fiber assigned to the galaxy closest to the supernova's position</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/supernovahosts.php">SN_GAL2</a></td>
<td>37</td>
<td>Likely host galaxy for an
<a href="http://www.sdss.org/supernova/aboutsupernova.html">SDSS-II supernova</a>, with the
BOSS fiber assigned to the second-closest galaxy</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/supernovahosts.php">SN_GAL3</a></td>
<td>38</td>
<td>Likely host galaxy for an
<a href="http://www.sdss.org/supernova/aboutsupernova.html">SDSS-II supernova</a>, with the
BOSS fiber assigned to the third-closest galaxy</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/supernovahosts.php">SN_LOC</a></td>
<td>39</td>
<td>Likely host galaxy for an
<a href="http://www.sdss.org/supernova/aboutsupernova.html">SDSS-II supernova</a>, with the
BOSS fiber assigned to the position of the original supernova</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/supernovahosts.php">SPEC_SN</a></td>
<td>40</td>
<td>Likely host galaxy for an
<a href="http://www.sdss.org/supernova/aboutsupernova.html">SDSS-II supernova</a>, where the
original supernova was identified from SDSS spectroscopic data</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/lowmassbinary.php">SPOKE</a></td>
<td>41</td>
<td>Widely-separated binary systems in which both stars are low-mass (spectral class M)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/whitedwarfs.php">WHITEDWARF_NEW</a></td>
<td>42</td>
<td>White dwarf candidate whose spectrum had not been observed previously by the SDSS</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/whitedwarfs.php">WHITEDWARF_SDSS</a></td>
<td>43</td>
<td>White dwarf candidate with a pre-existing SDSS spectrum</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/lowmass.php">BRIGHTERL</a></td>
<td>44</td>
<td>Bright L dwarf candidate (<i>i</i><sub>PSF</sub> &lt; 19.5, <i>i</i><sub>PSF</sub> - <i>z</i><sub>PSF</sub>) &gt; 1.14)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/lowmass.php">BRIGHTERM</a></td>
<td>45</td>
<td>Bright M dwarf candidate (<i>i</i><sub>PSF</sub> &lt; 19.5, <i>i</i><sub>PSF</sub> - <i>z</i><sub>PSF</sub>) &lt; 1.14)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/lowmass.php">FAINTERL</a></td>
<td>46</td>
<td>Faint L dwarf candidate (<i>i</i><sub>PSF</sub> &gt; 19.5, <i>i</i><sub>PSF</sub> - <i>z</i><sub>PSF</sub>) &gt; 1.14)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/lowmass.php">FAINTERM</a></td>
<td>47</td>
<td>Faint M dwarf candidate (<i>i</i><sub>PSF</sub> &gt; 19.5, <i>i</i><sub>PSF</sub> - <i>z</i><sub>PSF</sub>) &lt; 1.14)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/distanthalogiants.php">RED_KG</a></td>
<td>48</td>
<td>Giant star in the Milky Way outer halo</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/distanthalogiants.php">RVTEST</a></td>
<td>49</td>
<td>Known giant star selected as a test of radial velocity measurement techniques</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/heblazars.php">BLAZGRFLAT</a></td>
<td>50</td>
<td>Candidate optical counterpart to a
<a href="http://fermi.gsfc.nasa.gov/ssc/data/access/">Fermi</a> gamma-ray source, within
2" of a <a href="http://adsabs.harvard.edu/abs/2007ApJS..171...61H">CRATES</a> radio
source and within a Fermi error ellipse</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/heblazars.php">BLAZGRQSO</a></td>
<td>51</td>
<td>Candidate optical counterpart to a
<a href="http://fermi.gsfc.nasa.gov/ssc/data/access/">Fermi</a> gamma-ray source, within
2" of a <a href="http://sundog.stsci.edu/">FIRST</a> radio
source and within a Fermi error ellipse</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/heblazars.php">BLAZGX</a></td>
<td>52</td>
<td>Candidate optical counterpart to a
<a href="http://fermi.gsfc.nasa.gov/ssc/data/access/">Fermi</a> gamma-ray source, within
1' of a <a href="http://heasarc.gsfc.nasa.gov/docs/rosat/rass.html">ROSAT All-Sky
Survey</a> x-ray source and within a Fermi error ellipse, and without typical signs
of blazar activity</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/heblazars.php">BLAZGXQSO</a></td>
<td>53</td>
<td>Candidate optical counterpart to a
<a href="http://fermi.gsfc.nasa.gov/ssc/data/access/">Fermi</a> gamma-ray source, within
1' of a <a href="http://heasarc.gsfc.nasa.gov/docs/rosat/rass.html">ROSAT All-Sky
Survey</a> x-ray source and within a Fermi error ellipse</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/heblazars.php">BLAZGXR</a></td>
<td>54</td>
<td>Candidate optical counterpart to a
<a href="http://fermi.gsfc.nasa.gov/ssc/data/access/">Fermi</a> gamma-ray source, with
matches in both radio and x-ray wavelengths: within
1' of a <a href="http://heasarc.gsfc.nasa.gov/docs/rosat/rass.html">ROSAT All-Sky
Survey</a> x-ray source, within 2" of a <a href="http://sundog.stsci.edu/">FIRST</a> radio
source, and within a Fermi error ellipse</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/starformradgal.php">BLUE_RADIO</a></td>
<td>56</td>
<td>Likely star-forming AGN: blue galaxies that match with <a href="http://sundog.stsci.edu/">FIRST</a> radio
sources </td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/xrayview.php">CHANDRAV1</a></td>
<td>57</td>
<td>An object with a Chandra match that is likely to be a star-forming galaxy with
black hole accretion</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/remarkxray.php">CXOBRIGHT</a></td>
<td>58</td>
<td>An object that matches a serendipitous x-ray source from the
<a href="http://cxc.harvard.edu/csc/index.html">Chandra Source Catalog</a>,
with bright <i>i</i> magnitudes (<i>i</i> &lt; 20.0) and bright 2-8 keV fluxes
(<i>f<sub>2-8 keV</sub></i> &gt; 5 x 10<sup>-14</sup>
erg*cm<sup>-2</sup>*s<sup>-1</sup>)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/remarkxray.php">CXOGRIZ</a></td>
<td>59</td>
<td>An object that matches a serendipitous x-ray source from the <a href="http://cxc.harvard.edu/csc/index.html">Chandra Source Catalog</a>,  with outlier
SDSS colors (<i>g</i> - <i>r</i> &gt; 1.2 or <i>r</i> - <i>i</i> &gt; 1.0 or
<i>i</i> - <i>z</i> &gt; 1.4)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/remarkxray.php">CXORED</a></td>
<td>60</td>
<td>An object that matches a serendipitous x-ray source from the <a href="http://cxc.harvard.edu/csc/index.html">Chandra Source Catalog</a>,  with highly red
SDSS colors (<i>g</i> - <i>i</i> &gt; 1.0)</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/luminousblue.php">ELG</a></td>
<td>61</td>
<td>Luminous blue galaxy with <i>g<sub>PSF</sub></i> &lt; 22.5</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/qsosight.php">GAL_NEAR_QSO</a></td>
<td>62</td>
<td>A galaxy that lies between 0.006' and 1' of the line-of-sight for a
spectroscopically-confirmed quasar</td>
</tr>
<tr>
<td><a href="dr10/algorithms/ancillary/boss/transient82.php">MTEMP</a></td>
<td>63</td>
<td>Template M-stars observed as a comparison sample in Stripe 82</td>
</tr>
</table>
<?php echo foot(); ?>
