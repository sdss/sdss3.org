<?php include '../../header.php'; echo head('Estimates for the ugriz colors of Vega and the Sun'); ?>

<p>Assuming V=+0.03 and U-B = B-V = V-R<sub>c</sub> =
R<sub>c</sub>-I<sub>c</sub> = 0.00, we find for the A0V star Vega the
following:</p>

<pre>
    g   = -0.08  (&plusmn;0.03)
    u-g = +1.02  (&plusmn;0.08)
    g-r = -0.25  (&plusmn;0.03)
    r-i = -0.23  (&plusmn;0.02)
    i-z = -0.17  (&plusmn;0.02)
</pre>

<p>where we used the <a href="dr10/algorithms/sdssUBVRITransform.php#Bilir2005">Bilir, Karaali &amp; Tun&ccedil;el
(2005) transformation for g</a> and the <a href="dr10/algorithms/sdssUBVRITransform.php#Rodgers2006">Rodgers et
al. (2006) transformations</a> (plus the <a href=
"http://www.sdss.org/dr7/algorithms/jeg_photometric_eq_dr1.html#usno2SDSS">u'g'r'i'z'-to-ugriz
transformations</a>) for the u-g, g-r, r-i, and i-z colors.
The error bars in parentheses are rough estimates
of the systematic errors based upon the different values
that different sets of transformation equations yield. </p>

<p>Assuming M(V)=+4.82, U-B=+0.195, B-V=+0.650,
V-R<sub>c</sub>=+0.36, and R<sub>c</sub>-I<sub>c</sub>=+0.32,
we find for the Sun the following:</p>

<pre>
    M(g)= +5.12  (&plusmn;0.02)
    u-g = +1.43  (&plusmn;0.05)
    g-r = +0.44  (&plusmn;0.02)
    r-i = +0.11  (&plusmn;0.02)
    i-z = +0.03  (&plusmn;0.02)
</pre>

<p>where, again, we used the <a
href="dr10/algorithms/sdssUBVRITransform.php#Bilir2005">Bilir, Karaali
&amp; Tun&ccedil;el (2005) transformation for g</a> and the <a
href="dr10/algorithms/sdssUBVRITransform.php#Rodgers2006">Rodgers et
al. (2006) transformations</a> (plus the <a href=
"http://www.sdss.org/dr7/algorithms/jeg_photometric_eq_dr1.html#usno2SDSS">u'g'r'i'z'-to-ugriz
transformations</a>) for the u-g, g-r, r-i, and i-z colors.  As above,
the error bars in parentheses are rough estimates of the systematic
errors based upon the different values that different sets of
transformation equations yield.</p>



<?php echo foot(); ?>
