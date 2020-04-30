<?php include '../../header.php'; echo head('Transformations between SDSS magnitudes and other systems'); ?>

<h2 id="intro">Introduction</h2>

<p>There have been several efforts to calculate transformations
between ugriz (or u'g'r'i'z') and UBVR<sub>c</sub>I<sub>c</sub>.
Here, we summarize seven such efforts. We note that any such
transformation relies on knowledge of the absolute calibration, and is
inherently uncertain.</p>

<p>Jump to:</p>

<ul>
<li><a href="dr8/algorithms/sdssUBVRITransform.php#Jester2005">Jester et al. (2005)</a></li>
<li><a href="dr8/algorithms/sdssUBVRITransform.php#Jordi2006">Jordi et al. (2006)</a></li>
<li><a href="dr8/algorithms/sdssUBVRITransform.php#Karaali2005">Karaali, Bilir &amp; Tun&ccedil;el (2005)</a></li>
<li><a href="dr8/algorithms/sdssUBVRITransform.php#Bilir2005">Bilir, Karaali &amp; Tun&ccedil;el (2005)</a></li>
<li><a href="dr8/algorithms/sdssUBVRITransform.php#West2005">West, Walkowicz &amp; Hawley (2005)</a></li>
<li><a href="dr8/algorithms/sdssUBVRITransform.php#Rodgers2006">Rodgers et al. (2006)</a></li>
<li><a href="dr8/algorithms/sdssUBVRITransform.php#Lupton2005">Lupton (2005)</a></li>
</ul>

<p>Note that Jester et al. (2005) derived transformation equations for stars and for
z &lt;= 2.1 quasars; Jordi et al. (2006), for stars, including those for
Population I and metal-poor Population II stars; Karaali et al. (2005), for stars;
Bilir et al. (2005), for dwarf stars, West et al. (2005), for M and L dwarf stars,
Rodgers et al. (2006), for main sequence stars; and Lupton (2005), for stars. </p>

<p>There are currently no transformation equations explicitly for
galaxies, but <a href="dr8/algorithms/sdssUBVRITransform.php#Jester2005">Jester et al.'s (2005)</a> and <a
href="dr8/algorithms/sdssUBVRITransform.php#Lupton2005">Lupton's (2005)</a> transformation equations for
stars should also provide reasonable results for normal galaxies
(<i>i.e.</i>, galaxies without strong emission lines).</p>

<p>Caveat: Note that these transformation equations are for the SDSS
ugriz (u'g'r'i'z') magnitudes <i>as measured</i>, not for SDSS ugriz
(u'g'r'i'z') corrected for AB offsets.  If you need AB ugriz
magnitudes, please remember to convert from SDSS ugriz to AB ugriz
using AB offsets described <a href="dr8/algorithms/fluxcal.php#SDSStoAB"> here</a>).</p>

<h2 id="Jester2005">Jester et al. (2005)</h2>

<p>The following transformation equations were extracted from Table 1
of <a href="http://adsabs.harvard.edu/abs/2005AJ....130..873J">Jester et al. (2005)</a>
and are generally useful for stars and for quasars.
The transformation equations for z &lt;= 2.1 quasars is based upon
synthetic photometry of an updated version of the quasar composite
spectrum of
<a href="http://adsabs.harvard.edu/abs/2001AJ....122..549V">Vanden Berk et al. (2001)</a>
using DR1 data as well as the red and
reddened quasar composites for
<a href="http://adsabs.harvard.edu/abs/2003AJ....126.1131R">Richards et al. (2003)</a>.
The transformations for stars were derived from the
<a href="http://adsabs.harvard.edu/abs/2002AJ....123.2121S">Smith et al. (2002)</a>
u'g'r'i'z' photometry of Landolt stars, suitably transformed from the
USNO-1.0m u'g'r'i'z' system to the SDSS 2.5m ugriz system via the
<a href="http://www.sdss.org/dr7/algorithms/jeg_photometric_eq_dr1.html#usno2SDSS">u'g'r'i'z'-to-ugriz
transformations</a>.</p>

<p>The transformation equations for stars supercede those of
<a href="http://adsabs.harvard.edu/abs/1996AJ....111.1748F">Fukugita et al. (1996)</a>
and
<a href="http://adsabs.harvard.edu/abs/2002AJ....123.2121S">Smith et al. (2002)</a>.</p>

<pre>

UBVRcIc -&gt; ugriz
================

Quasars at z &lt;= 2.1 (synthetic)
        Transformation                RMS residual
    u-g    =    1.25*(U-B)   + 1.02      0.03
    g-r    =    0.93*(B-V)   - 0.06      0.09
    r-i    =    0.90*(Rc-Ic) - 0.20      0.07
    r-z    =    1.20*(Rc-Ic) - 0.20      0.18
    g      =    V + 0.74*(B-V) - 0.07    0.02
    r      =    V - 0.19*(B-V) - 0.02    0.08


Stars with Rc-Ic &lt; 1.15 and U-B &lt; 0
        Transformation                RMS residual
    u-g    =    1.28*(U-B)   + 1.14      0.05
    g-r    =    1.09*(B-V)   - 0.23      0.04
    r-i    =    0.98*(Rc-Ic) - 0.22      0.01
    r-z    =    1.69*(Rc-Ic) - 0.42      0.03
    g      =    V + 0.64*(B-V) - 0.13    0.01
    r      =    V - 0.46*(B-V) + 0.11    0.03


All stars with Rc-Ic &lt; 1.15
        Transformation                RMS residual
    u-g    =    1.28*(U-B)   + 1.13      0.06
    g-r    =    1.02*(B-V)   - 0.22      0.04
    r-i    =    0.91*(Rc-Ic) - 0.20      0.03
    r-z    =    1.72*(Rc-Ic) - 0.41      0.03
    g      =    V + 0.60*(B-V) - 0.12    0.02
    r      =    V - 0.42*(B-V) + 0.11    0.03


ugriz -&gt; UBVRcIc
================

Quasars at z &lt;= 2.1 (synthetic)
        Transformation                RMS residual
    U-B    =    0.75*(u-g) - 0.81        0.03
    B-V    =    0.62*(g-r) + 0.15        0.07
    V-R    =    0.38*(r-i) + 0.27        0.09
    Rc-Ic  =    0.72*(r-i) + 0.27        0.06
    B      =    g + 0.17*(u-g) + 0.11    0.03
    V      =    g - 0.52*(g-r) - 0.03    0.05


Stars with Rc-Ic &lt; 1.15 and U-B &lt; 0
        Transformation                RMS residual
    U-B    =    0.77*(u-g) - 0.88        0.04
    B-V    =    0.90*(g-r) + 0.21        0.03
    V-R    =    0.96*(r-i) + 0.21        0.02
    Rc-Ic  =    1.02*(r-i) + 0.21        0.01
    B      =    g + 0.33*(g-r) + 0.20    0.02
    V      =    g - 0.58*(g-r) - 0.01    0.02


All stars with Rc-Ic &lt; 1.15
        Transformation                RMS residual
    U-B    =    0.78*(u-g) - 0.88        0.05
    B-V    =    0.98*(g-r) + 0.22        0.04
    V-R    =    1.09*(r-i) + 0.22        0.03
    Rc-Ic  =    1.00*(r-i) + 0.21        0.01
    B      =    g + 0.39*(g-r) + 0.21    0.03
    V      =    g - 0.59*(g-r) - 0.01    0.01

</pre>

<p><a href="dr8/algorithms/sdssUBVRITransform.php#Top">[Back to top]</a></p>


<h2 id="Jordi2006">Jordi et al. (2005)</h2>

<p>The following transformation equations were extracted from Table 3
of <a href="http://adsabs.harvard.edu/abs/2006A%26A...460..339J"> Jordi et
al. (2006)</a> and are generally useful for stars. They are derived from comparing
<a href="http://www3.cadc-ccda.hia-iha.nrc-cnrc.gc.ca/community/STETSON/index.html">Stetson's extension</a>
of the Landolt standard stars with the corresponding SDSS DR4 photometry.
The equations including the Johnson U band are based on the comparison of
Landolt's original standard stars and the SDSS DR4.</p>

<pre>

UBVRcIc -&gt; ugriz
================

        Transformation
    u-g   =     (0.750 &plusmn; 0.050)*(U-B)  + (0.770 &plusmn; 0.070)*(B-V) + (0.720 &plusmn; 0.040)
    g-V   =     (0.630 &plusmn; 0.002)*(B-V)  - (0.124 &plusmn; 0.002)
    g-B   =     (-0.370 &plusmn; 0.002)*(B-V) - (0.124 &plusmn; 0.002)
    g-r   =     (1.646 &plusmn; 0.008)*(V-R)  - (0.139 &plusmn; 0.004)
    g-i   =     (1.481 &plusmn; 0.004)*(V-I)  - (0.536 &plusmn; 0.004) if V-I &lt;= 1.8
    g-i   =     (0.83 &plusmn; 0.01)*(V-I)    + (0.60 &plusmn; 0.03)   if V-I &gt;  1.8
    r-i   =     (1.007 &plusmn; 0.005)*(R-I)  - (0.236 &plusmn; 0.003)
    r-z   =     (1.584 &plusmn; 0.008)*(R-I)  - (0.386 &plusmn; 0.005)
    r-R   =     (0.267 &plusmn; 0.005)*(V-R)  + (0.088 &plusmn; 0.003) if V-R &lt;= 0.93
    r-R   =     (0.77 &plusmn; 0.04)*(V-R)    - (0.37 &plusmn; 0.04)   if V-R &gt;  0.93
    i-I   =     (0.247 &plusmn; 0.003)*(R-I)  + (0.329 &plusmn; 0.002)



ugriz -&gt; UBVRcIc
================

        Transformation
    U-B   =     (0.79 &plusmn; 0.02)*(u-g)    - (0.93 &plusmn; 0.02)
    U-B   =     (0.52 &plusmn; 0.06)*(u-g)    + (0.53 &plusmn; 0.09)*(g-r) - (0.82 &plusmn; 0.04)
    B-g   =     (0.175 &plusmn; 0.002)*(u-g)  + (0.150 &plusmn; 0.003)
    B-g   =     (0.313 &plusmn; 0.003)*(g-r)  + (0.219 &plusmn; 0.002)
    V-g   =     (-0.565 &plusmn; 0.001)*(g-r) - (0.016 &plusmn; 0.001)
    V-I   =     (0.675 &plusmn; 0.002)*(g-i)  + (0.364 &plusmn; 0.002) if  g-i &lt;= 2.1
    V-I   =     (1.11 &plusmn; 0.02)*(g-i)    - (0.52 &plusmn; 0.05)   if  g-i &gt;  2.1
    R-r   =     (-0.153 &plusmn; 0.003)*(r-i) - (0.117 &plusmn; 0.003)
    R-I   =     (0.930 &plusmn; 0.005)*(r-i)  + (0.259 &plusmn; 0.002)
    I-i   =     (-0.386 &plusmn; 0.004)*(i-z) - (0.397 &plusmn; 0.001)


</pre>
<p>The following transformation equations were extracted from Table 4
of <a
href="http://adsabs.harvard.edu/abs/2006A%26A...460..339J">
Jordi et al. (2006)</a> and are generally useful for Population I and
metal-poor Population II stars, respectively. The transformations for
the Population II stars are derived from comparing Stetson fields
around Draco, NGC 2419 and NGC 7078 with their SDSS DR4
photometry. The transformations for the Population I stars are derived
from the <a
href="http://www3.cadc-ccda.hia-iha.nrc-cnrc.gc.ca/community/STETSON/index.html">Stetson
extension</a> of Landolt's equatorial fields compared with the SDSS
DR4 photometry. The transformation equation for Population II stars
including the SDSS (i-z)-color is not calculated, because of the small
number of stars.</p>

<pre>
BVRcIc -&gt; griz
================

        Transformation for Population I stars:
    g-V   =     (0.634 &plusmn; 0.002)*(B-V)  - (0.127 &plusmn; 0.002)
    g-B   =     (-0.366 &plusmn; 0.002)*(B-V) - (0.126 &plusmn; 0.002)
    g-r   =     (1.599 &plusmn; 0.009)*(V-R)  - (0.106 &plusmn; 0.006)
    g-i   =     (1.474 &plusmn; 0.004)*(V-I)  - (0.518 &plusmn; 0.005) if V-I &lt;= 1.8
    g-i   =     (0.83 &plusmn; 0.01)*(V-I)    + (0.62 &plusmn; 0.03)   if V-I &gt;  1.8
    r-i   =     (0.988 &plusmn; 0.006)*(R-I)  - (0.221 &plusmn; 0.004)
    r-z   =     (1.568 &plusmn; 0.009)*(R-I)  - (0.370 &plusmn; 0.006)
    r-R   =     (0.275 &plusmn; 0.006)*(V-R)  + (0.086 &plusmn; 0.004) if V-R &lt;= 0.93
    r-R   =     (0.71 &plusmn; 0.05)*(V-R)    - (0.31 &plusmn; 0.05)   if V-R &gt;  0.93
    i-I   =     (0.251 &plusmn; 0.003)*(R-I)  + (0.325 &plusmn; 0.002)

        Transformation for metal-poor Population II stars:
    g-V   =     (0.596 &plusmn; 0.009)*(B-V)  - (0.148 &plusmn; 0.007)
    g-B   =     (-0.401 &plusmn; 0.009)*(B-V) - (0.145 &plusmn; 0.006)
    g-r   =     (1.72 &plusmn; 0.02)*(V-R)    - (0.198 &plusmn; 0.007)
    g-i   =     (1.48 &plusmn; 0.01)*(V-I)    - (0.57 &plusmn; 0.01)   if V-I &lt;= 1.8
    r-i   =     (1.06 &plusmn; 0.02)*(R-I)    - (0.30 &plusmn; 0.01)
    r-z   =     (1.60 &plusmn; 0.06)*(R-I)    - (0.46 &plusmn; 0.03)
    r-R   =     (0.34 &plusmn; 0.02)*(V-R)    + (0.015 &plusmn; 0.008) if V-R &lt;= 0.93
    i-I   =     (0.21 &plusmn; 0.02)*(R-I)    + (0.34 &plusmn; 0.01)


griz -&gt; BVRcIc
================

        Transformation for Population I stars:
    B-g   =     (0.163 &plusmn; 0.002)*(u-g)  + (0.170 &plusmn; 0.004)
    B-g   =     (0.312 &plusmn; 0.003)*(g-r)  + (0.219 &plusmn; 0.002)
    V-g   =     (-0.573 &plusmn; 0.002)*(g-r) - (0.016 &plusmn; 0.002)
    V-I   =     (0.671 &plusmn; 0.002)*(g-i)  + (0.359 &plusmn; 0.002) if g-i &lt;= 2.1
    V-I   =     (1.12 &plusmn; 0.02)*(g-i)    - (0.53 &plusmn; 0.06)   if g-i &gt;  2.1
    R-r   =     (-0.257 &plusmn; 0.004)*(r-i) + (0.152 &plusmn; 0.002)
    R-I   =     (0.977 &plusmn; 0.006)*(r-i)  + (0.234 &plusmn; 0.003)
    I-i   =     (-0.409 &plusmn; 0.006)*(i-z) - (0.394 &plusmn; 0.002)


        Transformation for metal-poor Population II stars:
    B-g   =     (0.20 &plusmn; 0.01)*(u-g)    + (0.15 &plusmn; 0.01)
    B-g   =     (0.349 &plusmn; 0.009)*(g-r)  + (0.245 &plusmn; 0.006)
    V-g   =     (-0.569 &plusmn; 0.007)*(g-r) + (0.021 &plusmn; 0.004)
    V-I   =     (0.674 &plusmn; 0.005)*(g-i)  + (0.406 &plusmn; 0.004) if g-i &lt;= 2.1
    R-r   =     (-0.25 &plusmn; 0.02)*(r-i)   - (0.119 &plusmn; 0.005)
    R-I   =     (0.80 &plusmn; 0.02)*(r-i)    + (0.317 &plusmn; 0.004)



</pre>

<p><a href="dr8/algorithms/sdssUBVRITransform.php#Top">[Back to top]</a></p>

<h2 id="Karaali2005">Karaali, Bilir &amp; Tun&ccedil;el (2005)</h2>

<p>These transformations appeared in
<a href="http://adsabs.harvard.edu/abs/2005PASA...22...24K">Karaali, Bilir &amp; Tun&ccedil;el (2005)</a>.
They are based on
<a href="http://adsabs.harvard.edu/abs/1992AJ....104..340L">Landolt (1992)</a>
UBV data for 224 stars in the color range
0.3 &lt; B-V &lt; 1.1 with SDSS ugr photometry from the
<a href="http://www.ast.cam.ac.uk/~wfcsur/index.php">CASU INT Wide Field Survey</a>.
An improvement over previous SDSS - UBVR<sub>c</sub>I<sub>c</sub>
transformations is the use of two colors in each equation, which is
particularly helpful for the u-g transformation.</p>

<pre>

UBVRcIc -&gt; ugriz
================

Stars with  0.3 &lt; B-V &lt; 1.1
    u-g    =    0.779*(U-B) + 0.755*(B-V)  + 0.801
    g-r    =    1.023*(B-V) + 0.016*(U-B)  - 0.187


ugriz -&gt; UBVRcIc
================

Stars with  0.3 &lt; B-V &lt; 1.1
    B-V    =    0.992*(g-r) - 0.0199*(u-g) + 0.202

</pre>


<p><a href="dr8/algorithms/sdssUBVRITransform.php#Top">[Back to top]</a></p>


<h2 id="Bilir2005">Bilir, Karaali &amp; Tun&ccedil;el (2005)</h2>

<p>These transformation equations appeared in
<a href="http://adsabs.harvard.edu/abs/2005AN....326..321B">Bilir, Karaali &amp; Tun&ccedil;el (2005)</a>.
They are based upon 195 dwarf stars that have both ugriz photometry and Landolt UBV
photometry.</p>

<pre>

UBVRcIc -&gt; ugriz
================

Dwarf (Main Sequence) Stars
    g-r    =    1.124*(B-V) - 0.252
    r-i    =    1.040*(R-I) - 0.224
    g      =    V + 0.634*(B-V) - 0.108

</pre>

<p><a href="dr8/algorithms/sdssUBVRITransform.php#Top">[Back to top]</a></p>


<h2 id="West2005">West, Walkowicz &amp; Hawley (2005)</h2>

<p>These transformation equations appeared in
<a href="http://adsabs.harvard.edu/abs/2005PASP..117..706W">West, Walkowicz &amp; Hawley (2005)</a>.
They are based upon photometry of M and L dwarf stars from
<a href="http://www.sdss.org/dr3/">SDSS Data Release 3</a>.</p>

<pre>

UBVRcIc -&gt; ugriz
================

M0-L0 Dwarfs, 0.67 &lt;= r-i &lt;= 2.01
       Transformation                      RMS residual
    r-i    =    -2.69 + 2.29*(V-Ic)           0.05
                      - 0.28*(V-Ic)**2

M0-L0 Dwarfs, 0.37 &lt;= i-z &lt;= 1.84
        Transformation                     RMS residual
    i-z    =    -20.6 + 26.0*(Ic-Ks)          0.10
                      - 11.7*(Ic-Ks)**2
                      - 2.30*(Ic-Ks)**3
                      - 0.17*(Ic-Ks)**4

</pre>


<p><a href="dr8/algorithms/sdssUBVRITransform.php#Top">[Back to top]</a></p>


<h2 id="Rodgers2006">Rodgers et al. (2006)</h2>

<p>These equations are from
<a href="http://adsabs.harvard.edu/abs/2006AJ....132..989R">Rodgers et al. (2006)</a>.
They are based upon a set of main sequence stars from the
<a href="http://adsabs.harvard.edu/abs/2002AJ....123.2121S">Smith et al. (2002)</a>
u'g'r'i'z' standard star network that also
have Landolt UBVR<sub>c</sub>I<sub>c</sub> photometry.  Note that
these equations, strictly speaking, transform from
UBVR<sub>c</sub>I<sub>c</sub> to u'g'r'i'z' and not to ugriz.  The <a
href="http://www.sdss.org/dr7/algorithms/jeg_photometric_eq_dr1.html#usno2SDSS">transformation
from
u'g'r'i'z' to ugriz</a>, however, is rather small.  Note also, as with
the <a href="dr8/algorithms/sdssUBVRITransform.php#Karaali2005">Karaali, Bilir &amp; Tun&ccedil;el (2005)
transformations</a> listed above, two colors are used in the u'-g' and
g'-r' equations to improve the fits.  The use of two colors in the
fits is especially useful for u'-g', which is strongly affected by the
Balmer discontinuity.</p>


<pre>

UBVRcIc -&gt; u'g'r'i'z'
=====================

Main Sequence Stars
    u'-g'  =    (1.101 &plusmn; 0.004)*(U-B) + (0.358 &plusmn; 0.004)*(B-V) + 0.971
    g'-r'  =    (0.278 &plusmn; 0.016)*(B-V) + (1.321 &plusmn; 0.030)*(V-Rc) - 0.219
    r'-i'  =    (1.000 &plusmn; 0.006)*(Rc-Ic) - 0.212
    r'-z'  =    (1.567 &plusmn; 0.020)*(Rc-Ic) - 0.365

</pre>


<p><a href="dr8/algorithms/sdssUBVRITransform.php#Top">[Back to top]</a></p>


<h2 id="Lupton2005">Lupton (2005)</h2>

<p>These equations that Robert Lupton derived by matching DR4
photometry to Peter Stetson's published photometry for stars.</p>

<pre>

Stars

   B = u - 0.8116*(u - g) + 0.1313;  sigma = 0.0095
   B = g + 0.3130*(g - r) + 0.2271;  sigma = 0.0107

   V = g - 0.2906*(u - g) + 0.0885;  sigma = 0.0129
   V = g - 0.5784*(g - r) - 0.0038;  sigma = 0.0054

   R = r - 0.1837*(g - r) - 0.0971;  sigma = 0.0106
   R = r - 0.2936*(r - i) - 0.1439;  sigma = 0.0072

   I = r - 1.2444*(r - i) - 0.3820;  sigma = 0.0078
   I = i - 0.3780*(i - z)  -0.3974;  sigma = 0.0063

</pre>

<p>Here is the <a
href="http://skyserver.sdss3.org/dr8/en/tools/search/sql.asp">CAS SQL
query</a> Robert used to perform the matchup of DR4 photometry with
Stetson's:</p>

<pre>

  select
     dbo.fSDSS(P.objId) as ID, name,
     S.B, S.Berr, S.V, S.Verr , S.R, S.Rerr, S.I, S.Ierr,
     psfMag_u, psfMagErr_u, psfMag_g, psfMagErr_g,
     psfMag_r, psfMagErr_r, psfMag_i, psfMagErr_i, psfMag_z, psfMagErr_z,
     case when 0 = (flags_u &amp; 0x800d00000000000) and status_u = 0 then 1 else 0 end as good_u,
     case when 0 = (flags_g &amp; 0x800d00000000000) and status_g = 0 then 1 else 0 end as good_g,
     case when 0 = (flags_r &amp; 0x800d00000000000) and status_r = 0 then 1 else 0 end as good_r,
     case when 0 = (flags_i &amp; 0x800d00000000000) and status_i = 0 then 1 else 0 end as good_i,
     case when 0 = (flags_z &amp; 0x800d00000000000) and status_z = 0 then 1 else 0 end as good_z
  from
     stetson as S
  join star as P on S.objId = P.objId
  join field as F on P.fieldId = F.fieldId
  where
     0 = (flags &amp; 0x40006)


</pre>

<p><a href="dr8/algorithms/sdssUBVRITransform.php#Top">[Back to top]</a></p>

<?php echo foot(); ?>
