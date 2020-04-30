<?php include '../../header.php'; echo head('Imager Filter Sensitivity Tables'); ?>

<h2>Introduction</h2>

<p>Filter curves for the SDSS Camera filters reported by Jim Gunn,
June 2001. Central wavelengths and links to ASCII versions of the
table are given in the table below.  Note that <a
href="http://adsabs.harvard.edu/abs/2010AJ....139.1628D">Doi et
al. 2010</a> have published more recent estimates of the filter curves
using more data and over a longer time baseline. They found that the
<i>u</i> band in particular has changed over time and appears to
differ now from the curve estimated in the 2001 filter curves
distributed above.</p>

<table class="common">
<caption>Central wavelengths of SDSS filters</caption>
<tr>
<th style="text-align:center;"><i>u</i></th>
<th style="text-align:center;"><i>g</i></th>
<th style="text-align:center;"><i>r</i></th>
<th style="text-align:center;"><i>i</i></th>
<th style="text-align:center;"><i>z</i></th>
</tr>
<tr>
<td style="text-align:center;">3551&Aring;</td>
<td style="text-align:center;">4686&Aring;</td>
<td style="text-align:center;">6166&Aring;</td>
<td style="text-align:center;">7480&Aring;</td>
<td style="text-align:center;">8932&Aring;</td>
</tr>
<tr>
<td style="text-align:center;">
<a href="instruments/filters/sdss_jun2001_u_atm.dat">u.dat</a>
</td>
<td style="text-align:center;">
<a href="instruments/filters/sdss_jun2001_g_atm.dat">g.dat</a>
</td>
<td style="text-align:center;">
<a href="instruments/filters/sdss_jun2001_r_atm.dat">r.dat</a>
</td>
<td style="text-align:center;">
<a href="instruments/filters/sdss_jun2001_i_atm.dat">i.dat</a>
</td>
<td style="text-align:center;">
<a href="instruments/filters/sdss_jun2001_z_atm.dat">z.dat</a>
</td>
</tr>
</table>

<p>Jump to: <a href="instruments/filters/#u"><var>u</var></a>&nbsp;&mdash;&nbsp;<a href="instruments/filters/#g"><var>g</var></a>&nbsp;&mdash;&nbsp;<a href="instruments/filters/#r"><var>r</var></a>&nbsp;&mdash;&nbsp;<a href="instruments/filters/#i"><var>i</var></a>&nbsp;&mdash;&nbsp;<a href="instruments/filters/#z"><var>z</var></a></p>

<h2 id="u">Sensitivity table for the <em>u</em> filter</h2>

<table class="common">
<caption>u</caption>
<tr>
<th>Wavelength [&Aring;]</th>
<th>On-sky sensitivity looking through 1.3 airmasses at APO for a
point source. <strong>These define the survey's photometric system.</strong></th>
<th>Sensitivity under these conditions for
very large sources (size greater than about 80 pixels) for
which the infrared scattering is negligible  (the infrared scattering only affects the thinned
detectors used for <var>ugri</var> and among these, it is
negligible for <var>ug</var>; hence this column is different from
column 1 only for <var>ri</var>)</th>
<th>the response of the third column with <em>no</em>atmosphere</th>
<th>assumed atmospheric transparency at <em>one</em> airmass at APO</th>
</tr>
<tr><td> 2980 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.0727 </td></tr>
<tr><td> 3005 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.0014 </td><td> 0.0992 </td></tr>
<tr><td> 3030 </td><td> 0.0005 </td><td> 0.0005 </td><td> 0.0071 </td><td> 0.1308 </td></tr>
<tr><td> 3055 </td><td> 0.0013 </td><td> 0.0013 </td><td> 0.0127 </td><td> 0.1673 </td></tr>
<tr><td> 3080 </td><td> 0.0026 </td><td> 0.0026 </td><td> 0.0198 </td><td> 0.2075 </td></tr>
<tr><td> 3105 </td><td> 0.0052 </td><td> 0.0052 </td><td> 0.0314 </td><td> 0.2470 </td></tr>
<tr><td> 3130 </td><td> 0.0093 </td><td> 0.0093 </td><td> 0.0464 </td><td> 0.2862 </td></tr>
<tr><td> 3155 </td><td> 0.0161 </td><td> 0.0161 </td><td> 0.0629 </td><td> 0.3444 </td></tr>
<tr><td> 3180 </td><td> 0.0240 </td><td> 0.0240 </td><td> 0.0794 </td><td> 0.3920 </td></tr>
<tr><td> 3205 </td><td> 0.0323 </td><td> 0.0323 </td><td> 0.0949 </td><td> 0.4300 </td></tr>
<tr><td> 3230 </td><td> 0.0405 </td><td> 0.0405 </td><td> 0.1093 </td><td> 0.4585 </td></tr>
<tr><td> 3255 </td><td> 0.0485 </td><td> 0.0485 </td><td> 0.1229 </td><td> 0.4817 </td></tr>
<tr><td> 3280 </td><td> 0.0561 </td><td> 0.0561 </td><td> 0.1352 </td><td> 0.5007 </td></tr>
<tr><td> 3305 </td><td> 0.0634 </td><td> 0.0634 </td><td> 0.1458 </td><td> 0.5189 </td></tr>
<tr><td> 3330 </td><td> 0.0700 </td><td> 0.0700 </td><td> 0.1545 </td><td> 0.5351 </td></tr>
<tr><td> 3355 </td><td> 0.0756 </td><td> 0.0756 </td><td> 0.1617 </td><td> 0.5486 </td></tr>
<tr><td> 3380 </td><td> 0.0803 </td><td> 0.0803 </td><td> 0.1679 </td><td> 0.5581 </td></tr>
<tr><td> 3405 </td><td> 0.0848 </td><td> 0.0848 </td><td> 0.1737 </td><td> 0.5669 </td></tr>
<tr><td> 3430 </td><td> 0.0883 </td><td> 0.0883 </td><td> 0.1786 </td><td> 0.5727 </td></tr>
<tr><td> 3455 </td><td> 0.0917 </td><td> 0.0917 </td><td> 0.1819 </td><td> 0.5812 </td></tr>
<tr><td> 3480 </td><td> 0.0959 </td><td> 0.0959 </td><td> 0.1842 </td><td> 0.5959 </td></tr>
<tr><td> 3505 </td><td> 0.1001 </td><td> 0.1001 </td><td> 0.1860 </td><td> 0.6112 </td></tr>
<tr><td> 3530 </td><td> 0.1029 </td><td> 0.1029 </td><td> 0.1870 </td><td> 0.6221 </td></tr>
<tr><td> 3555 </td><td> 0.1044 </td><td> 0.1044 </td><td> 0.1868 </td><td> 0.6294 </td></tr>
<tr><td> 3580 </td><td> 0.1053 </td><td> 0.1053 </td><td> 0.1862 </td><td> 0.6350 </td></tr>
<tr><td> 3605 </td><td> 0.1063 </td><td> 0.1063 </td><td> 0.1858 </td><td> 0.6406 </td></tr>
<tr><td> 3630 </td><td> 0.1075 </td><td> 0.1075 </td><td> 0.1853 </td><td> 0.6476 </td></tr>
<tr><td> 3655 </td><td> 0.1085 </td><td> 0.1085 </td><td> 0.1841 </td><td> 0.6553 </td></tr>
<tr><td> 3680 </td><td> 0.1084 </td><td> 0.1084 </td><td> 0.1812 </td><td> 0.6631 </td></tr>
<tr><td> 3705 </td><td> 0.1064 </td><td> 0.1064 </td><td> 0.1754 </td><td> 0.6702 </td></tr>
<tr><td> 3730 </td><td> 0.1024 </td><td> 0.1024 </td><td> 0.1669 </td><td> 0.6763 </td></tr>
<tr><td> 3755 </td><td> 0.0966 </td><td> 0.0966 </td><td> 0.1558 </td><td> 0.6815 </td></tr>
<tr><td> 3780 </td><td> 0.0887 </td><td> 0.0887 </td><td> 0.1419 </td><td> 0.6863 </td></tr>
<tr><td> 3805 </td><td> 0.0787 </td><td> 0.0787 </td><td> 0.1247 </td><td> 0.6912 </td></tr>
<tr><td> 3830 </td><td> 0.0672 </td><td> 0.0672 </td><td> 0.1054 </td><td> 0.6965 </td></tr>
<tr><td> 3855 </td><td> 0.0549 </td><td> 0.0549 </td><td> 0.0851 </td><td> 0.7023 </td></tr>
<tr><td> 3880 </td><td> 0.0413 </td><td> 0.0413 </td><td> 0.0634 </td><td> 0.7088 </td></tr>
<tr><td> 3905 </td><td> 0.0268 </td><td> 0.0268 </td><td> 0.0405 </td><td> 0.7158 </td></tr>
<tr><td> 3930 </td><td> 0.0145 </td><td> 0.0145 </td><td> 0.0216 </td><td> 0.7235 </td></tr>
<tr><td> 3955 </td><td> 0.0075 </td><td> 0.0075 </td><td> 0.0110 </td><td> 0.7315 </td></tr>
<tr><td> 3980 </td><td> 0.0042 </td><td> 0.0042 </td><td> 0.0062 </td><td> 0.7393 </td></tr>
<tr><td> 4005 </td><td> 0.0022 </td><td> 0.0022 </td><td> 0.0032 </td><td> 0.7464 </td></tr>
<tr><td> 4030 </td><td> 0.0010 </td><td> 0.0010 </td><td> 0.0015 </td><td> 0.7526 </td></tr>
<tr><td> 4055 </td><td> 0.0006 </td><td> 0.0006 </td><td> 0.0008 </td><td> 0.7581 </td></tr>
<tr><td> 4080 </td><td> 0.0004 </td><td> 0.0004 </td><td> 0.0006 </td><td> 0.7631 </td></tr>
<tr><td> 4105 </td><td> 0.0002 </td><td> 0.0002 </td><td> 0.0003 </td><td> 0.7680 </td></tr>
<tr><td> 4130 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.7727 </td></tr>
</table>

<h2 id="g">Sensitivity table for the <em>g</em> filter</h2>

<table class="common">
<caption>g</caption>
<tr>
<th>Wavelength [&Aring;]</th>
<th>On-sky sensitivity looking through 1.3 airmasses at APO for a point source</th>
<th>Sensitivity under these conditions for very large sources (size greater than about 80 pixels) for which the infrared scattering is negligible</th>
<th>The response of the third column with <em>no</em> atmosphere</th>
<th>Assumed atmospheric transparency at <em>one</em> airmass at APO</th>
</tr>
<tr><td> 3630 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.6476 </td></tr>
<tr><td> 3655 </td><td> 0.0003 </td><td> 0.0003 </td><td> 0.0005 </td><td> 0.6553 </td></tr>
<tr><td> 3680 </td><td> 0.0008 </td><td> 0.0008 </td><td> 0.0013 </td><td> 0.6631 </td></tr>
<tr><td> 3705 </td><td> 0.0013 </td><td> 0.0013 </td><td> 0.0022 </td><td> 0.6702 </td></tr>
<tr><td> 3730 </td><td> 0.0019 </td><td> 0.0019 </td><td> 0.0030 </td><td> 0.6763 </td></tr>
<tr><td> 3755 </td><td> 0.0024 </td><td> 0.0024 </td><td> 0.0039 </td><td> 0.6815 </td></tr>
<tr><td> 3780 </td><td> 0.0034 </td><td> 0.0034 </td><td> 0.0055 </td><td> 0.6863 </td></tr>
<tr><td> 3805 </td><td> 0.0055 </td><td> 0.0055 </td><td> 0.0087 </td><td> 0.6912 </td></tr>
<tr><td> 3830 </td><td> 0.0103 </td><td> 0.0103 </td><td> 0.0162 </td><td> 0.6965 </td></tr>
<tr><td> 3855 </td><td> 0.0194 </td><td> 0.0194 </td><td> 0.0301 </td><td> 0.7023 </td></tr>
<tr><td> 3880 </td><td> 0.0326 </td><td> 0.0326 </td><td> 0.0500 </td><td> 0.7088 </td></tr>
<tr><td> 3905 </td><td> 0.0492 </td><td> 0.0492 </td><td> 0.0745 </td><td> 0.7158 </td></tr>
<tr><td> 3930 </td><td> 0.0686 </td><td> 0.0686 </td><td> 0.1024 </td><td> 0.7235 </td></tr>
<tr><td> 3955 </td><td> 0.0900 </td><td> 0.0900 </td><td> 0.1324 </td><td> 0.7315 </td></tr>
<tr><td> 3980 </td><td> 0.1123 </td><td> 0.1123 </td><td> 0.1629 </td><td> 0.7393 </td></tr>
<tr><td> 4005 </td><td> 0.1342 </td><td> 0.1342 </td><td> 0.1924 </td><td> 0.7464 </td></tr>
<tr><td> 4030 </td><td> 0.1545 </td><td> 0.1545 </td><td> 0.2191 </td><td> 0.7526 </td></tr>
<tr><td> 4055 </td><td> 0.1722 </td><td> 0.1722 </td><td> 0.2419 </td><td> 0.7581 </td></tr>
<tr><td> 4080 </td><td> 0.1873 </td><td> 0.1873 </td><td> 0.2609 </td><td> 0.7631 </td></tr>
<tr><td> 4105 </td><td> 0.2003 </td><td> 0.2003 </td><td> 0.2767 </td><td> 0.7680 </td></tr>
<tr><td> 4130 </td><td> 0.2116 </td><td> 0.2116 </td><td> 0.2899 </td><td> 0.7727 </td></tr>
<tr><td> 4155 </td><td> 0.2214 </td><td> 0.2214 </td><td> 0.3010 </td><td> 0.7774 </td></tr>
<tr><td> 4180 </td><td> 0.2301 </td><td> 0.2301 </td><td> 0.3105 </td><td> 0.7820 </td></tr>
<tr><td> 4205 </td><td> 0.2378 </td><td> 0.2378 </td><td> 0.3186 </td><td> 0.7862 </td></tr>
<tr><td> 4230 </td><td> 0.2448 </td><td> 0.2448 </td><td> 0.3258 </td><td> 0.7902 </td></tr>
<tr><td> 4255 </td><td> 0.2513 </td><td> 0.2513 </td><td> 0.3324 </td><td> 0.7940 </td></tr>
<tr><td> 4280 </td><td> 0.2574 </td><td> 0.2574 </td><td> 0.3385 </td><td> 0.7976 </td></tr>
<tr><td> 4305 </td><td> 0.2633 </td><td> 0.2633 </td><td> 0.3442 </td><td> 0.8013 </td></tr>
<tr><td> 4330 </td><td> 0.2691 </td><td> 0.2691 </td><td> 0.3496 </td><td> 0.8049 </td></tr>
<tr><td> 4355 </td><td> 0.2747 </td><td> 0.2747 </td><td> 0.3548 </td><td> 0.8087 </td></tr>
<tr><td> 4380 </td><td> 0.2801 </td><td> 0.2801 </td><td> 0.3596 </td><td> 0.8124 </td></tr>
<tr><td> 4405 </td><td> 0.2852 </td><td> 0.2852 </td><td> 0.3640 </td><td> 0.8161 </td></tr>
<tr><td> 4430 </td><td> 0.2899 </td><td> 0.2899 </td><td> 0.3678 </td><td> 0.8199 </td></tr>
<tr><td> 4455 </td><td> 0.2940 </td><td> 0.2940 </td><td> 0.3709 </td><td> 0.8235 </td></tr>
<tr><td> 4480 </td><td> 0.2979 </td><td> 0.2979 </td><td> 0.3736 </td><td> 0.8271 </td></tr>
<tr><td> 4505 </td><td> 0.3016 </td><td> 0.3016 </td><td> 0.3763 </td><td> 0.8305 </td></tr>
<tr><td> 4530 </td><td> 0.3055 </td><td> 0.3055 </td><td> 0.3792 </td><td> 0.8337 </td></tr>
<tr><td> 4555 </td><td> 0.3097 </td><td> 0.3097 </td><td> 0.3827 </td><td> 0.8368 </td></tr>
<tr><td> 4580 </td><td> 0.3141 </td><td> 0.3141 </td><td> 0.3863 </td><td> 0.8397 </td></tr>
<tr><td> 4605 </td><td> 0.3184 </td><td> 0.3184 </td><td> 0.3899 </td><td> 0.8425 </td></tr>
<tr><td> 4630 </td><td> 0.3224 </td><td> 0.3224 </td><td> 0.3931 </td><td> 0.8453 </td></tr>
<tr><td> 4655 </td><td> 0.3257 </td><td> 0.3257 </td><td> 0.3955 </td><td> 0.8480 </td></tr>
<tr><td> 4680 </td><td> 0.3284 </td><td> 0.3284 </td><td> 0.3973 </td><td> 0.8505 </td></tr>
<tr><td> 4705 </td><td> 0.3307 </td><td> 0.3307 </td><td> 0.3986 </td><td> 0.8528 </td></tr>
<tr><td> 4730 </td><td> 0.3327 </td><td> 0.3327 </td><td> 0.3997 </td><td> 0.8549 </td></tr>
<tr><td> 4755 </td><td> 0.3346 </td><td> 0.3346 </td><td> 0.4008 </td><td> 0.8568 </td></tr>
<tr><td> 4780 </td><td> 0.3364 </td><td> 0.3364 </td><td> 0.4019 </td><td> 0.8587 </td></tr>
<tr><td> 4805 </td><td> 0.3383 </td><td> 0.3383 </td><td> 0.4030 </td><td> 0.8606 </td></tr>
<tr><td> 4830 </td><td> 0.3403 </td><td> 0.3403 </td><td> 0.4043 </td><td> 0.8625 </td></tr>
<tr><td> 4855 </td><td> 0.3425 </td><td> 0.3425 </td><td> 0.4057 </td><td> 0.8643 </td></tr>
<tr><td> 4880 </td><td> 0.3448 </td><td> 0.3448 </td><td> 0.4073 </td><td> 0.8661 </td></tr>
<tr><td> 4905 </td><td> 0.3472 </td><td> 0.3472 </td><td> 0.4091 </td><td> 0.8678 </td></tr>
<tr><td> 4930 </td><td> 0.3495 </td><td> 0.3495 </td><td> 0.4110 </td><td> 0.8693 </td></tr>
<tr><td> 4955 </td><td> 0.3519 </td><td> 0.3519 </td><td> 0.4129 </td><td> 0.8706 </td></tr>
<tr><td> 4980 </td><td> 0.3541 </td><td> 0.3541 </td><td> 0.4147 </td><td> 0.8719 </td></tr>
<tr><td> 5005 </td><td> 0.3562 </td><td> 0.3562 </td><td> 0.4165 </td><td> 0.8730 </td></tr>
<tr><td> 5030 </td><td> 0.3581 </td><td> 0.3581 </td><td> 0.4181 </td><td> 0.8740 </td></tr>
<tr><td> 5055 </td><td> 0.3597 </td><td> 0.3597 </td><td> 0.4194 </td><td> 0.8750 </td></tr>
<tr><td> 5080 </td><td> 0.3609 </td><td> 0.3609 </td><td> 0.4201 </td><td> 0.8759 </td></tr>
<tr><td> 5105 </td><td> 0.3613 </td><td> 0.3613 </td><td> 0.4201 </td><td> 0.8768 </td></tr>
<tr><td> 5130 </td><td> 0.3609 </td><td> 0.3609 </td><td> 0.4191 </td><td> 0.8777 </td></tr>
<tr><td> 5155 </td><td> 0.3595 </td><td> 0.3595 </td><td> 0.4169 </td><td> 0.8785 </td></tr>
<tr><td> 5180 </td><td> 0.3581 </td><td> 0.3581 </td><td> 0.4147 </td><td> 0.8794 </td></tr>
<tr><td> 5205 </td><td> 0.3558 </td><td> 0.3558 </td><td> 0.4115 </td><td> 0.8803 </td></tr>
<tr><td> 5230 </td><td> 0.3452 </td><td> 0.3452 </td><td> 0.3988 </td><td> 0.8813 </td></tr>
<tr><td> 5255 </td><td> 0.3194 </td><td> 0.3194 </td><td> 0.3684 </td><td> 0.8822 </td></tr>
<tr><td> 5280 </td><td> 0.2807 </td><td> 0.2807 </td><td> 0.3233 </td><td> 0.8832 </td></tr>
<tr><td> 5305 </td><td> 0.2339 </td><td> 0.2339 </td><td> 0.2690 </td><td> 0.8842 </td></tr>
<tr><td> 5330 </td><td> 0.1839 </td><td> 0.1839 </td><td> 0.2112 </td><td> 0.8852 </td></tr>
<tr><td> 5355 </td><td> 0.1352 </td><td> 0.1352 </td><td> 0.1550 </td><td> 0.8861 </td></tr>
<tr><td> 5380 </td><td> 0.0911 </td><td> 0.0911 </td><td> 0.1043 </td><td> 0.8869 </td></tr>
<tr><td> 5405 </td><td> 0.0548 </td><td> 0.0548 </td><td> 0.0627 </td><td> 0.8877 </td></tr>
<tr><td> 5430 </td><td> 0.0295 </td><td> 0.0295 </td><td> 0.0337 </td><td> 0.8885 </td></tr>
<tr><td> 5455 </td><td> 0.0166 </td><td> 0.0166 </td><td> 0.0190 </td><td> 0.8891 </td></tr>
<tr><td> 5480 </td><td> 0.0112 </td><td> 0.0112 </td><td> 0.0128 </td><td> 0.8897 </td></tr>
<tr><td> 5505 </td><td> 0.0077 </td><td> 0.0077 </td><td> 0.0087 </td><td> 0.8902 </td></tr>
<tr><td> 5530 </td><td> 0.0050 </td><td> 0.0050 </td><td> 0.0057 </td><td> 0.8907 </td></tr>
<tr><td> 5555 </td><td> 0.0032 </td><td> 0.0032 </td><td> 0.0037 </td><td> 0.8911 </td></tr>
<tr><td> 5580 </td><td> 0.0021 </td><td> 0.0021 </td><td> 0.0024 </td><td> 0.8914 </td></tr>
<tr><td> 5605 </td><td> 0.0015 </td><td> 0.0015 </td><td> 0.0017 </td><td> 0.8917 </td></tr>
<tr><td> 5630 </td><td> 0.0012 </td><td> 0.0012 </td><td> 0.0014 </td><td> 0.8920 </td></tr>
<tr><td> 5655 </td><td> 0.0010 </td><td> 0.0010 </td><td> 0.0012 </td><td> 0.8923 </td></tr>
<tr><td> 5680 </td><td> 0.0009 </td><td> 0.0009 </td><td> 0.0010 </td><td> 0.8926 </td></tr>
<tr><td> 5705 </td><td> 0.0008 </td><td> 0.0008 </td><td> 0.0009 </td><td> 0.8929 </td></tr>
<tr><td> 5730 </td><td> 0.0006 </td><td> 0.0006 </td><td> 0.0007 </td><td> 0.8933 </td></tr>
<tr><td> 5755 </td><td> 0.0005 </td><td> 0.0005 </td><td> 0.0005 </td><td> 0.8938 </td></tr>
<tr><td> 5780 </td><td> 0.0003 </td><td> 0.0003 </td><td> 0.0003 </td><td> 0.8945 </td></tr>
<tr><td> 5805 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.8952 </td></tr>
<tr><td> 5830 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.8962 </td></tr>
</table>

<h2 id="r">Sensitivity table for the <em>r</em> filter</h2>

<table class="common">
<caption>r</caption>
<tr>
<th>Wavelength [&Aring;]</th>
<th>On-sky sensitivity looking through 1.3 airmasses at APO for a point source</th>
<th>Sensitivity under these conditions for very large sources
(size greater than about 80 pixels) for which the infrared scattering
is negligible</th>
<th>the response of the third column with <em>no</em> atmosphere</th>
<th>assumed atmospheric transparency at <em>one</em> airmass at APO</th>
</tr>
<tr><td> 5380 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.8869 </td></tr>
<tr><td> 5405 </td><td> 0.0014 </td><td> 0.0014 </td><td> 0.0016 </td><td> 0.8877 </td></tr>
<tr><td> 5430 </td><td> 0.0099 </td><td> 0.0099 </td><td> 0.0113 </td><td> 0.8885 </td></tr>
<tr><td> 5455 </td><td> 0.0259 </td><td> 0.0260 </td><td> 0.0297 </td><td> 0.8891 </td></tr>
<tr><td> 5480 </td><td> 0.0497 </td><td> 0.0498 </td><td> 0.0568 </td><td> 0.8897 </td></tr>
<tr><td> 5505 </td><td> 0.0807 </td><td> 0.0809 </td><td> 0.0923 </td><td> 0.8902 </td></tr>
<tr><td> 5530 </td><td> 0.1186 </td><td> 0.1190 </td><td> 0.1356 </td><td> 0.8907 </td></tr>
<tr><td> 5555 </td><td> 0.1625 </td><td> 0.1630 </td><td> 0.1856 </td><td> 0.8911 </td></tr>
<tr><td> 5580 </td><td> 0.2093 </td><td> 0.2100 </td><td> 0.2390 </td><td> 0.8914 </td></tr>
<tr><td> 5605 </td><td> 0.2555 </td><td> 0.2564 </td><td> 0.2917 </td><td> 0.8917 </td></tr>
<tr><td> 5630 </td><td> 0.2975 </td><td> 0.2986 </td><td> 0.3395 </td><td> 0.8920 </td></tr>
<tr><td> 5655 </td><td> 0.3326 </td><td> 0.3339 </td><td> 0.3794 </td><td> 0.8923 </td></tr>
<tr><td> 5680 </td><td> 0.3609 </td><td> 0.3623 </td><td> 0.4116 </td><td> 0.8926 </td></tr>
<tr><td> 5705 </td><td> 0.3834 </td><td> 0.3849 </td><td> 0.4371 </td><td> 0.8929 </td></tr>
<tr><td> 5730 </td><td> 0.4010 </td><td> 0.4027 </td><td> 0.4570 </td><td> 0.8933 </td></tr>
<tr><td> 5755 </td><td> 0.4147 </td><td> 0.4165 </td><td> 0.4723 </td><td> 0.8938 </td></tr>
<tr><td> 5780 </td><td> 0.4253 </td><td> 0.4271 </td><td> 0.4839 </td><td> 0.8945 </td></tr>
<tr><td> 5805 </td><td> 0.4333 </td><td> 0.4353 </td><td> 0.4925 </td><td> 0.8952 </td></tr>
<tr><td> 5830 </td><td> 0.4395 </td><td> 0.4416 </td><td> 0.4990 </td><td> 0.8962 </td></tr>
<tr><td> 5855 </td><td> 0.4446 </td><td> 0.4467 </td><td> 0.5040 </td><td> 0.8973 </td></tr>
<tr><td> 5880 </td><td> 0.4489 </td><td> 0.4511 </td><td> 0.5080 </td><td> 0.8986 </td></tr>
<tr><td> 5905 </td><td> 0.4527 </td><td> 0.4550 </td><td> 0.5112 </td><td> 0.9001 </td></tr>
<tr><td> 5930 </td><td> 0.4563 </td><td> 0.4587 </td><td> 0.5141 </td><td> 0.9018 </td></tr>
<tr><td> 5955 </td><td> 0.4599 </td><td> 0.4624 </td><td> 0.5169 </td><td> 0.9037 </td></tr>
<tr><td> 5980 </td><td> 0.4634 </td><td> 0.4660 </td><td> 0.5194 </td><td> 0.9057 </td></tr>
<tr><td> 6005 </td><td> 0.4665 </td><td> 0.4692 </td><td> 0.5213 </td><td> 0.9079 </td></tr>
<tr><td> 6030 </td><td> 0.4689 </td><td> 0.4716 </td><td> 0.5222 </td><td> 0.9103 </td></tr>
<tr><td> 6055 </td><td> 0.4703 </td><td> 0.4731 </td><td> 0.5220 </td><td> 0.9128 </td></tr>
<tr><td> 6080 </td><td> 0.4711 </td><td> 0.4740 </td><td> 0.5212 </td><td> 0.9153 </td></tr>
<tr><td> 6105 </td><td> 0.4717 </td><td> 0.4747 </td><td> 0.5202 </td><td> 0.9177 </td></tr>
<tr><td> 6130 </td><td> 0.4727 </td><td> 0.4758 </td><td> 0.5197 </td><td> 0.9199 </td></tr>
<tr><td> 6155 </td><td> 0.4744 </td><td> 0.4776 </td><td> 0.5202 </td><td> 0.9220 </td></tr>
<tr><td> 6180 </td><td> 0.4767 </td><td> 0.4800 </td><td> 0.5215 </td><td> 0.9238 </td></tr>
<tr><td> 6205 </td><td> 0.4792 </td><td> 0.4827 </td><td> 0.5233 </td><td> 0.9253 </td></tr>
<tr><td> 6230 </td><td> 0.4819 </td><td> 0.4854 </td><td> 0.5254 </td><td> 0.9265 </td></tr>
<tr><td> 6255 </td><td> 0.4844 </td><td> 0.4881 </td><td> 0.5275 </td><td> 0.9275 </td></tr>
<tr><td> 6280 </td><td> 0.4867 </td><td> 0.4905 </td><td> 0.5294 </td><td> 0.9285 </td></tr>
<tr><td> 6305 </td><td> 0.4887 </td><td> 0.4926 </td><td> 0.5310 </td><td> 0.9294 </td></tr>
<tr><td> 6330 </td><td> 0.4902 </td><td> 0.4942 </td><td> 0.5319 </td><td> 0.9305 </td></tr>
<tr><td> 6355 </td><td> 0.4909 </td><td> 0.4951 </td><td> 0.5320 </td><td> 0.9316 </td></tr>
<tr><td> 6380 </td><td> 0.4912 </td><td> 0.4955 </td><td> 0.5316 </td><td> 0.9327 </td></tr>
<tr><td> 6405 </td><td> 0.4912 </td><td> 0.4956 </td><td> 0.5310 </td><td> 0.9337 </td></tr>
<tr><td> 6430 </td><td> 0.4912 </td><td> 0.4958 </td><td> 0.5305 </td><td> 0.9346 </td></tr>
<tr><td> 6455 </td><td> 0.4914 </td><td> 0.4961 </td><td> 0.5302 </td><td> 0.9354 </td></tr>
<tr><td> 6480 </td><td> 0.4915 </td><td> 0.4964 </td><td> 0.5299 </td><td> 0.9363 </td></tr>
<tr><td> 6505 </td><td> 0.4912 </td><td> 0.4962 </td><td> 0.5290 </td><td> 0.9373 </td></tr>
<tr><td> 6530 </td><td> 0.4901 </td><td> 0.4953 </td><td> 0.5271 </td><td> 0.9385 </td></tr>
<tr><td> 6555 </td><td> 0.4878 </td><td> 0.4931 </td><td> 0.5241 </td><td> 0.9395 </td></tr>
<tr><td> 6580 </td><td> 0.4852 </td><td> 0.4906 </td><td> 0.5211 </td><td> 0.9400 </td></tr>
<tr><td> 6605 </td><td> 0.4818 </td><td> 0.4873 </td><td> 0.5176 </td><td> 0.9398 </td></tr>
<tr><td> 6630 </td><td> 0.4697 </td><td> 0.4752 </td><td> 0.5057 </td><td> 0.9386 </td></tr>
<tr><td> 6655 </td><td> 0.4421 </td><td> 0.4474 </td><td> 0.4775 </td><td> 0.9366 </td></tr>
<tr><td> 6680 </td><td> 0.4009 </td><td> 0.4059 </td><td> 0.4341 </td><td> 0.9349 </td></tr>
<tr><td> 6705 </td><td> 0.3499 </td><td> 0.3544 </td><td> 0.3792 </td><td> 0.9345 </td></tr>
<tr><td> 6730 </td><td> 0.2924 </td><td> 0.2963 </td><td> 0.3162 </td><td> 0.9366 </td></tr>
<tr><td> 6755 </td><td> 0.2318 </td><td> 0.2350 </td><td> 0.2488 </td><td> 0.9421 </td></tr>
<tr><td> 6780 </td><td> 0.1715 </td><td> 0.1739 </td><td> 0.1824 </td><td> 0.9492 </td></tr>
<tr><td> 6805 </td><td> 0.1152 </td><td> 0.1168 </td><td> 0.1225 </td><td> 0.9494 </td></tr>
<tr><td> 6830 </td><td> 0.0687 </td><td> 0.0697 </td><td> 0.0747 </td><td> 0.9334 </td></tr>
<tr><td> 6855 </td><td> 0.0380 </td><td> 0.0386 </td><td> 0.0430 </td><td> 0.9057 </td></tr>
<tr><td> 6880 </td><td> 0.0212 </td><td> 0.0215 </td><td> 0.0247 </td><td> 0.8862 </td></tr>
<tr><td> 6905 </td><td> 0.0134 </td><td> 0.0136 </td><td> 0.0155 </td><td> 0.8893 </td></tr>
<tr><td> 6930 </td><td> 0.0099 </td><td> 0.0101 </td><td> 0.0112 </td><td> 0.9083 </td></tr>
<tr><td> 6955 </td><td> 0.0076 </td><td> 0.0077 </td><td> 0.0083 </td><td> 0.9311 </td></tr>
<tr><td> 6980 </td><td> 0.0055 </td><td> 0.0056 </td><td> 0.0059 </td><td> 0.9450 </td></tr>
<tr><td> 7005 </td><td> 0.0039 </td><td> 0.0039 </td><td> 0.0041 </td><td> 0.9464 </td></tr>
<tr><td> 7030 </td><td> 0.0027 </td><td> 0.0028 </td><td> 0.0029 </td><td> 0.9561 </td></tr>
<tr><td> 7055 </td><td> 0.0020 </td><td> 0.0020 </td><td> 0.0021 </td><td> 0.9709 </td></tr>
<tr><td> 7080 </td><td> 0.0015 </td><td> 0.0016 </td><td> 0.0016 </td><td> 0.9826 </td></tr>
<tr><td> 7105 </td><td> 0.0012 </td><td> 0.0013 </td><td> 0.0013 </td><td> 0.9827 </td></tr>
<tr><td> 7130 </td><td> 0.0010 </td><td> 0.0010 </td><td> 0.0010 </td><td> 0.9629 </td></tr>
<tr><td> 7155 </td><td> 0.0007 </td><td> 0.0007 </td><td> 0.0008 </td><td> 0.9192 </td></tr>
<tr><td> 7180 </td><td> 0.0004 </td><td> 0.0004 </td><td> 0.0005 </td><td> 0.8849 </td></tr>
<tr><td> 7205 </td><td> 0.0002 </td><td> 0.0002 </td><td> 0.0002 </td><td> 0.8974 </td></tr>
<tr><td> 7230 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.9182 </td></tr>
</table>

<h2 id="i">Sensitivity table for the <em>i</em> filter</h2>

<table class="common">
<caption>i</caption>
<tr>
<th>Wavelength [&Aring;]</th>
<th>On-sky sensitivity looking through 1.3 airmasses at APO for a point source</th>
<th>Sensitivity under these conditions for very large sources
(size greater than about 80 pixels) for which the infrared scattering
is negligible</th>
<th>The response of the third column with <em>no</em> atmosphere</th>
<th>assumed atmospheric transparency at <em>one</em> airmass at APO</th>
</tr>
<tr><td> 6430 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.9346 </td></tr>
<tr><td> 6455 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.9354 </td></tr>
<tr><td> 6480 </td><td> 0.0003 </td><td> 0.0003 </td><td> 0.0003 </td><td> 0.9363 </td></tr>
<tr><td> 6505 </td><td> 0.0004 </td><td> 0.0004 </td><td> 0.0004 </td><td> 0.9373 </td></tr>
<tr><td> 6530 </td><td> 0.0004 </td><td> 0.0004 </td><td> 0.0005 </td><td> 0.9385 </td></tr>
<tr><td> 6555 </td><td> 0.0003 </td><td> 0.0004 </td><td> 0.0004 </td><td> 0.9395 </td></tr>
<tr><td> 6580 </td><td> 0.0003 </td><td> 0.0003 </td><td> 0.0003 </td><td> 0.9400 </td></tr>
<tr><td> 6605 </td><td> 0.0004 </td><td> 0.0004 </td><td> 0.0005 </td><td> 0.9398 </td></tr>
<tr><td> 6630 </td><td> 0.0009 </td><td> 0.0009 </td><td> 0.0010 </td><td> 0.9386 </td></tr>
<tr><td> 6655 </td><td> 0.0019 </td><td> 0.0019 </td><td> 0.0021 </td><td> 0.9366 </td></tr>
<tr><td> 6680 </td><td> 0.0034 </td><td> 0.0034 </td><td> 0.0036 </td><td> 0.9349 </td></tr>
<tr><td> 6705 </td><td> 0.0056 </td><td> 0.0056 </td><td> 0.0060 </td><td> 0.9345 </td></tr>
<tr><td> 6730 </td><td> 0.0103 </td><td> 0.0104 </td><td> 0.0111 </td><td> 0.9366 </td></tr>
<tr><td> 6755 </td><td> 0.0194 </td><td> 0.0197 </td><td> 0.0208 </td><td> 0.9421 </td></tr>
<tr><td> 6780 </td><td> 0.0344 </td><td> 0.0349 </td><td> 0.0366 </td><td> 0.9492 </td></tr>
<tr><td> 6805 </td><td> 0.0561 </td><td> 0.0569 </td><td> 0.0597 </td><td> 0.9494 </td></tr>
<tr><td> 6830 </td><td> 0.0839 </td><td> 0.0851 </td><td> 0.0913 </td><td> 0.9334 </td></tr>
<tr><td> 6855 </td><td> 0.1164 </td><td> 0.1181 </td><td> 0.1317 </td><td> 0.9057 </td></tr>
<tr><td> 6880 </td><td> 0.1528 </td><td> 0.1552 </td><td> 0.1779 </td><td> 0.8862 </td></tr>
<tr><td> 6905 </td><td> 0.1948 </td><td> 0.1980 </td><td> 0.2260 </td><td> 0.8893 </td></tr>
<tr><td> 6930 </td><td> 0.2408 </td><td> 0.2448 </td><td> 0.2719 </td><td> 0.9083 </td></tr>
<tr><td> 6955 </td><td> 0.2857 </td><td> 0.2906 </td><td> 0.3125 </td><td> 0.9311 </td></tr>
<tr><td> 6980 </td><td> 0.3233 </td><td> 0.3290 </td><td> 0.3470 </td><td> 0.9450 </td></tr>
<tr><td> 7005 </td><td> 0.3503 </td><td> 0.3566 </td><td> 0.3755 </td><td> 0.9464 </td></tr>
<tr><td> 7030 </td><td> 0.3759 </td><td> 0.3829 </td><td> 0.3978 </td><td> 0.9561 </td></tr>
<tr><td> 7055 </td><td> 0.3990 </td><td> 0.4067 </td><td> 0.4142 </td><td> 0.9709 </td></tr>
<tr><td> 7080 </td><td> 0.4162 </td><td> 0.4245 </td><td> 0.4256 </td><td> 0.9826 </td></tr>
<tr><td> 7105 </td><td> 0.4233 </td><td> 0.4320 </td><td> 0.4331 </td><td> 0.9827 </td></tr>
<tr><td> 7130 </td><td> 0.4165 </td><td> 0.4252 </td><td> 0.4377 </td><td> 0.9629 </td></tr>
<tr><td> 7155 </td><td> 0.3943 </td><td> 0.4028 </td><td> 0.4405 </td><td> 0.9192 </td></tr>
<tr><td> 7180 </td><td> 0.3760 </td><td> 0.3844 </td><td> 0.4416 </td><td> 0.8849 </td></tr>
<tr><td> 7205 </td><td> 0.3823 </td><td> 0.3911 </td><td> 0.4411 </td><td> 0.8974 </td></tr>
<tr><td> 7230 </td><td> 0.3918 </td><td> 0.4011 </td><td> 0.4392 </td><td> 0.9182 </td></tr>
<tr><td> 7255 </td><td> 0.3892 </td><td> 0.3988 </td><td> 0.4358 </td><td> 0.9195 </td></tr>
<tr><td> 7280 </td><td> 0.3828 </td><td> 0.3924 </td><td> 0.4315 </td><td> 0.9153 </td></tr>
<tr><td> 7305 </td><td> 0.3820 </td><td> 0.3919 </td><td> 0.4265 </td><td> 0.9225 </td></tr>
<tr><td> 7330 </td><td> 0.3884 </td><td> 0.3988 </td><td> 0.4214 </td><td> 0.9436 </td></tr>
<tr><td> 7355 </td><td> 0.3872 </td><td> 0.3979 </td><td> 0.4165 </td><td> 0.9505 </td></tr>
<tr><td> 7380 </td><td> 0.3821 </td><td> 0.3930 </td><td> 0.4119 </td><td> 0.9496 </td></tr>
<tr><td> 7405 </td><td> 0.3787 </td><td> 0.3898 </td><td> 0.4077 </td><td> 0.9512 </td></tr>
<tr><td> 7430 </td><td> 0.3759 </td><td> 0.3872 </td><td> 0.4039 </td><td> 0.9531 </td></tr>
<tr><td> 7455 </td><td> 0.3727 </td><td> 0.3842 </td><td> 0.4006 </td><td> 0.9535 </td></tr>
<tr><td> 7480 </td><td> 0.3681 </td><td> 0.3799 </td><td> 0.3975 </td><td> 0.9508 </td></tr>
<tr><td> 7505 </td><td> 0.3618 </td><td> 0.3737 </td><td> 0.3943 </td><td> 0.9449 </td></tr>
<tr><td> 7530 </td><td> 0.3565 </td><td> 0.3685 </td><td> 0.3906 </td><td> 0.9416 </td></tr>
<tr><td> 7555 </td><td> 0.3554 </td><td> 0.3678 </td><td> 0.3862 </td><td> 0.9483 </td></tr>
<tr><td> 7580 </td><td> 0.3478 </td><td> 0.3603 </td><td> 0.3812 </td><td> 0.9429 </td></tr>
<tr><td> 7605 </td><td> 0.1473 </td><td> 0.1527 </td><td> 0.3757 </td><td> 0.4926 </td></tr>
<tr><td> 7630 </td><td> 0.2096 </td><td> 0.2176 </td><td> 0.3700 </td><td> 0.6546 </td></tr>
<tr><td> 7655 </td><td> 0.2648 </td><td> 0.2752 </td><td> 0.3641 </td><td> 0.7939 </td></tr>
<tr><td> 7680 </td><td> 0.3300 </td><td> 0.3434 </td><td> 0.3583 </td><td> 0.9530 </td></tr>
<tr><td> 7705 </td><td> 0.3256 </td><td> 0.3392 </td><td> 0.3526 </td><td> 0.9558 </td></tr>
<tr><td> 7730 </td><td> 0.3223 </td><td> 0.3361 </td><td> 0.3473 </td><td> 0.9602 </td></tr>
<tr><td> 7755 </td><td> 0.3179 </td><td> 0.3319 </td><td> 0.3424 </td><td> 0.9615 </td></tr>
<tr><td> 7780 </td><td> 0.3129 </td><td> 0.3272 </td><td> 0.3379 </td><td> 0.9605 </td></tr>
<tr><td> 7805 </td><td> 0.3077 </td><td> 0.3221 </td><td> 0.3337 </td><td> 0.9583 </td></tr>
<tr><td> 7830 </td><td> 0.3026 </td><td> 0.3173 </td><td> 0.3297 </td><td> 0.9559 </td></tr>
<tr><td> 7855 </td><td> 0.2980 </td><td> 0.3129 </td><td> 0.3259 </td><td> 0.9541 </td></tr>
<tr><td> 7880 </td><td> 0.2944 </td><td> 0.3095 </td><td> 0.3224 </td><td> 0.9541 </td></tr>
<tr><td> 7905 </td><td> 0.2921 </td><td> 0.3077 </td><td> 0.3194 </td><td> 0.9567 </td></tr>
<tr><td> 7930 </td><td> 0.2916 </td><td> 0.3075 </td><td> 0.3169 </td><td> 0.9622 </td></tr>
<tr><td> 7955 </td><td> 0.2921 </td><td> 0.3086 </td><td> 0.3150 </td><td> 0.9692 </td></tr>
<tr><td> 7980 </td><td> 0.2927 </td><td> 0.3098 </td><td> 0.3132 </td><td> 0.9762 </td></tr>
<tr><td> 8005 </td><td> 0.2923 </td><td> 0.3098 </td><td> 0.3111 </td><td> 0.9814 </td></tr>
<tr><td> 8030 </td><td> 0.2896 </td><td> 0.3076 </td><td> 0.3081 </td><td> 0.9833 </td></tr>
<tr><td> 8055 </td><td> 0.2840 </td><td> 0.3021 </td><td> 0.3039 </td><td> 0.9801 </td></tr>
<tr><td> 8080 </td><td> 0.2758 </td><td> 0.2939 </td><td> 0.2996 </td><td> 0.9702 </td></tr>
<tr><td> 8105 </td><td> 0.2642 </td><td> 0.2821 </td><td> 0.2945 </td><td> 0.9524 </td></tr>
<tr><td> 8130 </td><td> 0.2427 </td><td> 0.2597 </td><td> 0.2803 </td><td> 0.9285 </td></tr>
<tr><td> 8155 </td><td> 0.2091 </td><td> 0.2242 </td><td> 0.2493 </td><td> 0.9075 </td></tr>
<tr><td> 8180 </td><td> 0.1689 </td><td> 0.1815 </td><td> 0.2060 </td><td> 0.8931 </td></tr>
<tr><td> 8205 </td><td> 0.1276 </td><td> 0.1374 </td><td> 0.1578 </td><td> 0.8853 </td></tr>
<tr><td> 8230 </td><td> 0.0901 </td><td> 0.0973 </td><td> 0.1118 </td><td> 0.8843 </td></tr>
<tr><td> 8255 </td><td> 0.0603 </td><td> 0.0652 </td><td> 0.0743 </td><td> 0.8902 </td></tr>
<tr><td> 8280 </td><td> 0.0378 </td><td> 0.0410 </td><td> 0.0458 </td><td> 0.9033 </td></tr>
<tr><td> 8305 </td><td> 0.0218 </td><td> 0.0237 </td><td> 0.0257 </td><td> 0.9242 </td></tr>
<tr><td> 8330 </td><td> 0.0117 </td><td> 0.0128 </td><td> 0.0134 </td><td> 0.9483 </td></tr>
<tr><td> 8355 </td><td> 0.0068 </td><td> 0.0074 </td><td> 0.0077 </td><td> 0.9591 </td></tr>
<tr><td> 8380 </td><td> 0.0048 </td><td> 0.0053 </td><td> 0.0055 </td><td> 0.9576 </td></tr>
<tr><td> 8405 </td><td> 0.0033 </td><td> 0.0036 </td><td> 0.0037 </td><td> 0.9567 </td></tr>
<tr><td> 8430 </td><td> 0.0020 </td><td> 0.0022 </td><td> 0.0023 </td><td> 0.9564 </td></tr>
<tr><td> 8455 </td><td> 0.0013 </td><td> 0.0014 </td><td> 0.0015 </td><td> 0.9565 </td></tr>
<tr><td> 8480 </td><td> 0.0010 </td><td> 0.0011 </td><td> 0.0011 </td><td> 0.9569 </td></tr>
<tr><td> 8505 </td><td> 0.0009 </td><td> 0.0010 </td><td> 0.0011 </td><td> 0.9576 </td></tr>
<tr><td> 8530 </td><td> 0.0009 </td><td> 0.0010 </td><td> 0.0011 </td><td> 0.9584 </td></tr>
<tr><td> 8555 </td><td> 0.0008 </td><td> 0.0009 </td><td> 0.0009 </td><td> 0.9592 </td></tr>
<tr><td> 8580 </td><td> 0.0005 </td><td> 0.0006 </td><td> 0.0006 </td><td> 0.9598 </td></tr>
<tr><td> 8605 </td><td> 0.0002 </td><td> 0.0003 </td><td> 0.0003 </td><td> 0.9602 </td></tr>
<tr><td> 8630 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.9603 </td></tr>
</table>

<h2 id="z">Sensitivity table for the <em>z</em> filter</h2>

<table class="common">
<caption>z</caption>
<tr><th>Wavelength [&Aring;]</th>
<th>On-sky sensitivity looking through 1.3 airmasses at APO for a point source</th>
<th>Sensitivity under these conditions for very large sources (size
greater than about 80 pixels) for which the infrared scattering is
negligible</th>
<th>The response of the third column with <em>no</em> atmosphere</th>
<th>Assumed atmospheric transparency at <em>one</em> airmass at APO</th>
</tr>
<tr><td> 7730 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.9602 </td></tr>
<tr><td> 7755 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.9615 </td></tr>
<tr><td> 7780 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.9605 </td></tr>
<tr><td> 7805 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.9583 </td></tr>
<tr><td> 7830 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.9559 </td></tr>
<tr><td> 7855 </td><td> 0.0002 </td><td> 0.0002 </td><td> 0.0002 </td><td> 0.9541 </td></tr>
<tr><td> 7880 </td><td> 0.0002 </td><td> 0.0002 </td><td> 0.0002 </td><td> 0.9541 </td></tr>
<tr><td> 7905 </td><td> 0.0003 </td><td> 0.0003 </td><td> 0.0003 </td><td> 0.9567 </td></tr>
<tr><td> 7930 </td><td> 0.0005 </td><td> 0.0005 </td><td> 0.0005 </td><td> 0.9622 </td></tr>
<tr><td> 7955 </td><td> 0.0007 </td><td> 0.0007 </td><td> 0.0007 </td><td> 0.9692 </td></tr>
<tr><td> 7980 </td><td> 0.0011 </td><td> 0.0011 </td><td> 0.0011 </td><td> 0.9762 </td></tr>
<tr><td> 8005 </td><td> 0.0017 </td><td> 0.0017 </td><td> 0.0017 </td><td> 0.9814 </td></tr>
<tr><td> 8030 </td><td> 0.0027 </td><td> 0.0027 </td><td> 0.0027 </td><td> 0.9833 </td></tr>
<tr><td> 8055 </td><td> 0.0040 </td><td> 0.0040 </td><td> 0.0040 </td><td> 0.9801 </td></tr>
<tr><td> 8080 </td><td> 0.0057 </td><td> 0.0057 </td><td> 0.0058 </td><td> 0.9702 </td></tr>
<tr><td> 8105 </td><td> 0.0079 </td><td> 0.0079 </td><td> 0.0082 </td><td> 0.9524 </td></tr>
<tr><td> 8130 </td><td> 0.0106 </td><td> 0.0106 </td><td> 0.0114 </td><td> 0.9285 </td></tr>
<tr><td> 8155 </td><td> 0.0139 </td><td> 0.0139 </td><td> 0.0155 </td><td> 0.9075 </td></tr>
<tr><td> 8180 </td><td> 0.0178 </td><td> 0.0178 </td><td> 0.0202 </td><td> 0.8931 </td></tr>
<tr><td> 8205 </td><td> 0.0222 </td><td> 0.0222 </td><td> 0.0255 </td><td> 0.8853 </td></tr>
<tr><td> 8230 </td><td> 0.0271 </td><td> 0.0271 </td><td> 0.0311 </td><td> 0.8843 </td></tr>
<tr><td> 8255 </td><td> 0.0324 </td><td> 0.0324 </td><td> 0.0369 </td><td> 0.8902 </td></tr>
<tr><td> 8280 </td><td> 0.0382 </td><td> 0.0382 </td><td> 0.0428 </td><td> 0.9033 </td></tr>
<tr><td> 8305 </td><td> 0.0446 </td><td> 0.0446 </td><td> 0.0484 </td><td> 0.9242 </td></tr>
<tr><td> 8330 </td><td> 0.0511 </td><td> 0.0511 </td><td> 0.0536 </td><td> 0.9483 </td></tr>
<tr><td> 8355 </td><td> 0.0564 </td><td> 0.0564 </td><td> 0.0583 </td><td> 0.9591 </td></tr>
<tr><td> 8380 </td><td> 0.0603 </td><td> 0.0603 </td><td> 0.0625 </td><td> 0.9576 </td></tr>
<tr><td> 8405 </td><td> 0.0637 </td><td> 0.0637 </td><td> 0.0661 </td><td> 0.9567 </td></tr>
<tr><td> 8430 </td><td> 0.0667 </td><td> 0.0667 </td><td> 0.0693 </td><td> 0.9564 </td></tr>
<tr><td> 8455 </td><td> 0.0694 </td><td> 0.0694 </td><td> 0.0720 </td><td> 0.9565 </td></tr>
<tr><td> 8480 </td><td> 0.0717 </td><td> 0.0717 </td><td> 0.0744 </td><td> 0.9569 </td></tr>
<tr><td> 8505 </td><td> 0.0736 </td><td> 0.0736 </td><td> 0.0763 </td><td> 0.9576 </td></tr>
<tr><td> 8530 </td><td> 0.0752 </td><td> 0.0752 </td><td> 0.0779 </td><td> 0.9584 </td></tr>
<tr><td> 8555 </td><td> 0.0765 </td><td> 0.0765 </td><td> 0.0792 </td><td> 0.9592 </td></tr>
<tr><td> 8580 </td><td> 0.0775 </td><td> 0.0775 </td><td> 0.0801 </td><td> 0.9598 </td></tr>
<tr><td> 8605 </td><td> 0.0782 </td><td> 0.0782 </td><td> 0.0808 </td><td> 0.9602 </td></tr>
<tr><td> 8630 </td><td> 0.0786 </td><td> 0.0786 </td><td> 0.0812 </td><td> 0.9603 </td></tr>
<tr><td> 8655 </td><td> 0.0787 </td><td> 0.0787 </td><td> 0.0813 </td><td> 0.9599 </td></tr>
<tr><td> 8680 </td><td> 0.0785 </td><td> 0.0785 </td><td> 0.0812 </td><td> 0.9593 </td></tr>
<tr><td> 8705 </td><td> 0.0780 </td><td> 0.0780 </td><td> 0.0807 </td><td> 0.9586 </td></tr>
<tr><td> 8730 </td><td> 0.0772 </td><td> 0.0772 </td><td> 0.0801 </td><td> 0.9578 </td></tr>
<tr><td> 8755 </td><td> 0.0763 </td><td> 0.0763 </td><td> 0.0791 </td><td> 0.9571 </td></tr>
<tr><td> 8780 </td><td> 0.0751 </td><td> 0.0751 </td><td> 0.0779 </td><td> 0.9567 </td></tr>
<tr><td> 8805 </td><td> 0.0738 </td><td> 0.0738 </td><td> 0.0766 </td><td> 0.9566 </td></tr>
<tr><td> 8830 </td><td> 0.0723 </td><td> 0.0723 </td><td> 0.0750 </td><td> 0.9571 </td></tr>
<tr><td> 8855 </td><td> 0.0708 </td><td> 0.0708 </td><td> 0.0734 </td><td> 0.9582 </td></tr>
<tr><td> 8880 </td><td> 0.0693 </td><td> 0.0693 </td><td> 0.0716 </td><td> 0.9600 </td></tr>
<tr><td> 8905 </td><td> 0.0674 </td><td> 0.0674 </td><td> 0.0698 </td><td> 0.9591 </td></tr>
<tr><td> 8930 </td><td> 0.0632 </td><td> 0.0632 </td><td> 0.0679 </td><td> 0.9314 </td></tr>
<tr><td> 8955 </td><td> 0.0581 </td><td> 0.0581 </td><td> 0.0661 </td><td> 0.8923 </td></tr>
<tr><td> 8980 </td><td> 0.0543 </td><td> 0.0543 </td><td> 0.0642 </td><td> 0.8648 </td></tr>
<tr><td> 9005 </td><td> 0.0526 </td><td> 0.0526 </td><td> 0.0624 </td><td> 0.8633 </td></tr>
<tr><td> 9030 </td><td> 0.0523 </td><td> 0.0523 </td><td> 0.0607 </td><td> 0.8787 </td></tr>
<tr><td> 9055 </td><td> 0.0522 </td><td> 0.0522 </td><td> 0.0590 </td><td> 0.8961 </td></tr>
<tr><td> 9080 </td><td> 0.0512 </td><td> 0.0512 </td><td> 0.0574 </td><td> 0.9020 </td></tr>
<tr><td> 9105 </td><td> 0.0496 </td><td> 0.0496 </td><td> 0.0559 </td><td> 0.8980 </td></tr>
<tr><td> 9130 </td><td> 0.0481 </td><td> 0.0481 </td><td> 0.0546 </td><td> 0.8931 </td></tr>
<tr><td> 9155 </td><td> 0.0473 </td><td> 0.0473 </td><td> 0.0535 </td><td> 0.8962 </td></tr>
<tr><td> 9180 </td><td> 0.0476 </td><td> 0.0476 </td><td> 0.0524 </td><td> 0.9138 </td></tr>
<tr><td> 9205 </td><td> 0.0482 </td><td> 0.0482 </td><td> 0.0515 </td><td> 0.9352 </td></tr>
<tr><td> 9230 </td><td> 0.0476 </td><td> 0.0476 </td><td> 0.0505 </td><td> 0.9407 </td></tr>
<tr><td> 9255 </td><td> 0.0447 </td><td> 0.0447 </td><td> 0.0496 </td><td> 0.9103 </td></tr>
<tr><td> 9280 </td><td> 0.0391 </td><td> 0.0391 </td><td> 0.0485 </td><td> 0.8345 </td></tr>
<tr><td> 9305 </td><td> 0.0329 </td><td> 0.0329 </td><td> 0.0474 </td><td> 0.7441 </td></tr>
<tr><td> 9330 </td><td> 0.0283 </td><td> 0.0283 </td><td> 0.0462 </td><td> 0.6752 </td></tr>
<tr><td> 9355 </td><td> 0.0264 </td><td> 0.0264 </td><td> 0.0450 </td><td> 0.6524 </td></tr>
<tr><td> 9380 </td><td> 0.0271 </td><td> 0.0271 </td><td> 0.0438 </td><td> 0.6794 </td></tr>
<tr><td> 9405 </td><td> 0.0283 </td><td> 0.0283 </td><td> 0.0426 </td><td> 0.7178 </td></tr>
<tr><td> 9430 </td><td> 0.0275 </td><td> 0.0275 </td><td> 0.0415 </td><td> 0.7184 </td></tr>
<tr><td> 9455 </td><td> 0.0254 </td><td> 0.0254 </td><td> 0.0404 </td><td> 0.6897 </td></tr>
<tr><td> 9480 </td><td> 0.0252 </td><td> 0.0252 </td><td> 0.0393 </td><td> 0.7003 </td></tr>
<tr><td> 9505 </td><td> 0.0256 </td><td> 0.0256 </td><td> 0.0383 </td><td> 0.7214 </td></tr>
<tr><td> 9530 </td><td> 0.0246 </td><td> 0.0246 </td><td> 0.0373 </td><td> 0.7147 </td></tr>
<tr><td> 9555 </td><td> 0.0244 </td><td> 0.0244 </td><td> 0.0363 </td><td> 0.7251 </td></tr>
<tr><td> 9580 </td><td> 0.0252 </td><td> 0.0252 </td><td> 0.0353 </td><td> 0.7594 </td></tr>
<tr><td> 9605 </td><td> 0.0258 </td><td> 0.0258 </td><td> 0.0342 </td><td> 0.7923 </td></tr>
<tr><td> 9630 </td><td> 0.0265 </td><td> 0.0265 </td><td> 0.0331 </td><td> 0.8302 </td></tr>
<tr><td> 9655 </td><td> 0.0274 </td><td> 0.0274 </td><td> 0.0319 </td><td> 0.8766 </td></tr>
<tr><td> 9680 </td><td> 0.0279 </td><td> 0.0279 </td><td> 0.0307 </td><td> 0.9150 </td></tr>
<tr><td> 9705 </td><td> 0.0271 </td><td> 0.0271 </td><td> 0.0294 </td><td> 0.9253 </td></tr>
<tr><td> 9730 </td><td> 0.0252 </td><td> 0.0252 </td><td> 0.0280 </td><td> 0.9059 </td></tr>
<tr><td> 9755 </td><td> 0.0236 </td><td> 0.0236 </td><td> 0.0267 </td><td> 0.8947 </td></tr>
<tr><td> 9780 </td><td> 0.0227 </td><td> 0.0227 </td><td> 0.0253 </td><td> 0.9045 </td></tr>
<tr><td> 9805 </td><td> 0.0222 </td><td> 0.0222 </td><td> 0.0240 </td><td> 0.9262 </td></tr>
<tr><td> 9830 </td><td> 0.0216 </td><td> 0.0216 </td><td> 0.0227 </td><td> 0.9500 </td></tr>
<tr><td> 9855 </td><td> 0.0208 </td><td> 0.0208 </td><td> 0.0213 </td><td> 0.9652 </td></tr>
<tr><td> 9880 </td><td> 0.0196 </td><td> 0.0196 </td><td> 0.0201 </td><td> 0.9656 </td></tr>
<tr><td> 9905 </td><td> 0.0183 </td><td> 0.0183 </td><td> 0.0188 </td><td> 0.9642 </td></tr>
<tr><td> 9930 </td><td> 0.0171 </td><td> 0.0171 </td><td> 0.0176 </td><td> 0.9630 </td></tr>
<tr><td> 9955 </td><td> 0.0160 </td><td> 0.0160 </td><td> 0.0165 </td><td> 0.9618 </td></tr>
<tr><td> 9980 </td><td> 0.0149 </td><td> 0.0149 </td><td> 0.0153 </td><td> 0.9607 </td></tr>
<tr><td> 10005 </td><td> 0.0138 </td><td> 0.0138 </td><td> 0.0143 </td><td> 0.9597 </td></tr>
<tr><td> 10030 </td><td> 0.0128 </td><td> 0.0128 </td><td> 0.0132 </td><td> 0.9588 </td></tr>
<tr><td> 10055 </td><td> 0.0118 </td><td> 0.0118 </td><td> 0.0122 </td><td> 0.9579 </td></tr>
<tr><td> 10080 </td><td> 0.0108 </td><td> 0.0108 </td><td> 0.0112 </td><td> 0.9572 </td></tr>
<tr><td> 10105 </td><td> 0.0099 </td><td> 0.0099 </td><td> 0.0103 </td><td> 0.9565 </td></tr>
<tr><td> 10130 </td><td> 0.0091 </td><td> 0.0091 </td><td> 0.0094 </td><td> 0.9559 </td></tr>
<tr><td> 10155 </td><td> 0.0083 </td><td> 0.0083 </td><td> 0.0086 </td><td> 0.9553 </td></tr>
<tr><td> 10180 </td><td> 0.0075 </td><td> 0.0075 </td><td> 0.0078 </td><td> 0.9549 </td></tr>
<tr><td> 10205 </td><td> 0.0068 </td><td> 0.0068 </td><td> 0.0071 </td><td> 0.9545 </td></tr>
<tr><td> 10230 </td><td> 0.0061 </td><td> 0.0061 </td><td> 0.0064 </td><td> 0.9541 </td></tr>
<tr><td> 10255 </td><td> 0.0055 </td><td> 0.0055 </td><td> 0.0058 </td><td> 0.9539 </td></tr>
<tr><td> 10280 </td><td> 0.0050 </td><td> 0.0050 </td><td> 0.0052 </td><td> 0.9537 </td></tr>
<tr><td> 10305 </td><td> 0.0045 </td><td> 0.0045 </td><td> 0.0047 </td><td> 0.9535 </td></tr>
<tr><td> 10330 </td><td> 0.0041 </td><td> 0.0041 </td><td> 0.0042 </td><td> 0.9534 </td></tr>
<tr><td> 10355 </td><td> 0.0037 </td><td> 0.0037 </td><td> 0.0038 </td><td> 0.9534 </td></tr>
<tr><td> 10380 </td><td> 0.0033 </td><td> 0.0033 </td><td> 0.0035 </td><td> 0.9534 </td></tr>
<tr><td> 10405 </td><td> 0.0030 </td><td> 0.0030 </td><td> 0.0031 </td><td> 0.9535 </td></tr>
<tr><td> 10430 </td><td> 0.0027 </td><td> 0.0027 </td><td> 0.0028 </td><td> 0.9536 </td></tr>
<tr><td> 10455 </td><td> 0.0025 </td><td> 0.0025 </td><td> 0.0026 </td><td> 0.9537 </td></tr>
<tr><td> 10480 </td><td> 0.0023 </td><td> 0.0023 </td><td> 0.0024 </td><td> 0.9539 </td></tr>
<tr><td> 10505 </td><td> 0.0021 </td><td> 0.0021 </td><td> 0.0022 </td><td> 0.9541 </td></tr>
<tr><td> 10530 </td><td> 0.0019 </td><td> 0.0019 </td><td> 0.0020 </td><td> 0.9544 </td></tr>
<tr><td> 10555 </td><td> 0.0018 </td><td> 0.0018 </td><td> 0.0019 </td><td> 0.9547 </td></tr>
<tr><td> 10580 </td><td> 0.0017 </td><td> 0.0017 </td><td> 0.0018 </td><td> 0.9551 </td></tr>
<tr><td> 10605 </td><td> 0.0016 </td><td> 0.0016 </td><td> 0.0016 </td><td> 0.9554 </td></tr>
<tr><td> 10630 </td><td> 0.0015 </td><td> 0.0015 </td><td> 0.0015 </td><td> 0.9558 </td></tr>
<tr><td> 10655 </td><td> 0.0014 </td><td> 0.0014 </td><td> 0.0014 </td><td> 0.9563 </td></tr>
<tr><td> 10680 </td><td> 0.0013 </td><td> 0.0013 </td><td> 0.0013 </td><td> 0.9567 </td></tr>
<tr><td> 10705 </td><td> 0.0012 </td><td> 0.0012 </td><td> 0.0012 </td><td> 0.9572 </td></tr>
<tr><td> 10730 </td><td> 0.0011 </td><td> 0.0011 </td><td> 0.0011 </td><td> 0.9577 </td></tr>
<tr><td> 10755 </td><td> 0.0010 </td><td> 0.0010 </td><td> 0.0010 </td><td> 0.9582 </td></tr>
<tr><td> 10780 </td><td> 0.0009 </td><td> 0.0009 </td><td> 0.0009 </td><td> 0.9587 </td></tr>
<tr><td> 10805 </td><td> 0.0008 </td><td> 0.0008 </td><td> 0.0008 </td><td> 0.9593 </td></tr>
<tr><td> 10830 </td><td> 0.0008 </td><td> 0.0008 </td><td> 0.0008 </td><td> 0.9598 </td></tr>
<tr><td> 10855 </td><td> 0.0007 </td><td> 0.0007 </td><td> 0.0007 </td><td> 0.9604 </td></tr>
<tr><td> 10880 </td><td> 0.0006 </td><td> 0.0006 </td><td> 0.0007 </td><td> 0.9609 </td></tr>
<tr><td> 10905 </td><td> 0.0006 </td><td> 0.0006 </td><td> 0.0006 </td><td> 0.9615 </td></tr>
<tr><td> 10930 </td><td> 0.0006 </td><td> 0.0006 </td><td> 0.0006 </td><td> 0.9621 </td></tr>
<tr><td> 10955 </td><td> 0.0005 </td><td> 0.0005 </td><td> 0.0005 </td><td> 0.9626 </td></tr>
<tr><td> 10980 </td><td> 0.0005 </td><td> 0.0005 </td><td> 0.0005 </td><td> 0.9632 </td></tr>
<tr><td> 11005 </td><td> 0.0004 </td><td> 0.0004 </td><td> 0.0004 </td><td> 0.9638 </td></tr>
<tr><td> 11030 </td><td> 0.0004 </td><td> 0.0004 </td><td> 0.0004 </td><td> 0.9643 </td></tr>
<tr><td> 11055 </td><td> 0.0003 </td><td> 0.0003 </td><td> 0.0003 </td><td> 0.9648 </td></tr>
<tr><td> 11080 </td><td> 0.0003 </td><td> 0.0003 </td><td> 0.0003 </td><td> 0.9654 </td></tr>
<tr><td> 11105 </td><td> 0.0002 </td><td> 0.0002 </td><td> 0.0002 </td><td> 0.9659 </td></tr>
<tr><td> 11130 </td><td> 0.0002 </td><td> 0.0002 </td><td> 0.0002 </td><td> 0.9664 </td></tr>
<tr><td> 11155 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.9669 </td></tr>
<tr><td> 11180 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.0001 </td><td> 0.9673 </td></tr>
<tr><td> 11205 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.9677 </td></tr>
<tr><td> 11230 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.0000 </td><td> 0.9682 </td></tr>
</table>

<?php echo foot(); ?>
