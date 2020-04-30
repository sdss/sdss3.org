<?php include '../../header.php'; echo head('SEGUE Plates, organized by Program and Survey'); ?>

<h2>Introduction</h2>

<p>The SEGUE sample consists primarily of two surveys, SEGUE-1 and
SEGUE-2, which in turn encompass various observational programs. Each
program consists of a number of different 7 square degree <a
href="dr10/spectro/spectro_basics.php">plug-plates</a>.  When isolating
a sample of stars from SEGUE, it is important to take into account the
different programs. For example, if a particular line-of-sight was
observed as part of the <i>seglowlat</i> program, it used different
target selection criteria than one targeted as part of the
<i>segue</i> program. Similarly, the different surveys vary in their
observational focus. The <i>survey</i> and <i>programname</i> for each
individual plate are listed in the PlateX table in CASJobs. For most SEGUE plates, <i>survey</i> will be <i>segue1</i>, <i>segue2</i>, or <i>sdss</i>. For later data releases,
it could also be <i>boss</i>, <i>marvels</i>, or <i>apogee</i>.   </p>

<h2>Different Programs in SEGUE</h2>

<p>The <i>programname</i> parameter gives information about
both where and why a particular plate is targeted. The different programs in SEGUE-1 and SEGUE-2 are listed below: </p>

<table class="common">
<caption>SEGUE 1 and 2 Programs</caption>
<tr><th>plateX.programname</th><th>Details</th><th>Number of Unique Plates</th></tr>
<tr><td> <a href="dr10/algorithms/segue_plate_table.php#segue">segue</a>            </td><td> segue-1 bright plates (r<sub>0</sub>&lt;17.8), placed without regard to known substructure </td><td>165</td></tr>
<tr><td> <a href="dr10/algorithms/segue_plate_table.php#segue">seguefaint</a>       </td><td> segue-1 faint plates (r<sub>0</sub>&gt;17.8), placed without regard to know substructure </td><td>157</td></tr>
<tr><td> <a href="dr10/algorithms/segue_plate_table.php#segue2">segue2</a>          </td><td> segue-2 plate. No bright/faint distinction. Always placed without regard to known substructure </td><td>202</td></tr>
<tr><td> <a href="dr10/algorithms/segue_plate_table.php#segtest">segtest</a>        </td><td> bright plate using special target selection for testing purposes </td><td>10</td></tr>
<tr><td> <a href="dr10/algorithms/segue_plate_table.php#segtest">segtestf</a>       </td><td> faint plate using special target selection for testing purposes </td><td>4</td></tr>
<tr><td> <a href="dr10/algorithms/segue_plate_table.php#segcluster">segcluster</a>  </td><td> bright plate placed at the location of a globular or open cluster </td><td>16</td></tr>
<tr><td> <a href="dr10/algorithms/segue_plate_table.php#segcluster">segclusterf</a> </td><td> faint plate placed at the location of a globular or open cluster </td><td>8</td></tr>
<tr><td> <a href="dr10/algorithms/segue_plate_table.php#segpointed">segpointed</a>  </td><td> bright segue-1 plate placed at the probable location of MW substructure </td><td>16</td></tr>
<tr><td> <a href="dr10/algorithms/segue_plate_table.php#segpointed">segpointedf</a> </td><td> faint segue-1 plate placed at the probable location of MW substructure </td><td>16</td></tr>
<tr><td> <a href="dr10/algorithms/segue_plate_table.php#seglowlat">seglowlat</a>    </td><td> segue-1 bright plate placed at low Galactic latitude and designed with the low latitude targeting strategy</td><td>12</td></tr>
<tr><td> <a href="dr10/algorithms/segue_plate_table.php#seglowlat">seglowlatf</a>   </td><td> segue-1 faint plate placed at low Galactic latitude and designed with the low latitude targeting strategy</td><td>11</td></tr>
</table>

<p>Below we list the different plates in each program, in addition to their location on the sky, estimated extinction, and quality of the observations. </p>

<hr />

<h2 id="segue">Program: segue, seguefaint</h2>

<p>The plates under the program name <i>segue</i> are the bright plates from the
<i>segue1</i> survey. Corresponding faint plates are listed as <i>seguefaint</i>. These plates are placed
without regard to known substructure. Note that not every bright plate has a corresponding faint plate.
The target selection value listed indicates the algorithm under which the plate was designed. The quality
parameter is determined by checking the S/N of stars with (g-r) color of old main sequence turnoff stars at a g of 18.  </p>

<table class="common">
<caption>Plate Information </caption>
<tr><th>Bright</th><th>Faint</th><th>RA</th><th>Dec</th><th>l</th><th>b</th><th>E(B-V)</th><th>Survey</th><th>Program</th><th>Target Selection</th><th>Quality</th></tr>
<tr><td> 1880 </td><td> 1881 </td><td> 358.26 </td><td> 36.40 </td><td> 110.00 </td><td> -25.00 </td><td> 0.11 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1884 </td><td> 1885 </td><td> 355.89 </td><td> 43.16 </td><td> 110.00 </td><td> -18.00 </td><td> 0.13 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1886 </td><td> 1887 </td><td> 354.71 </td><td> 46.04 </td><td> 110.00 </td><td> -15.00 </td><td> 0.14 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1888 </td><td> 1889 </td><td> 353.41 </td><td> 48.91 </td><td> 110.00 </td><td> -12.00 </td><td> 0.21 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1890 </td><td> 1891 </td><td> 319.01 </td><td> 10.55 </td><td> 61.22  </td><td> -25.64 </td><td> 0.08 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1892 </td><td> 1893 </td><td> 340.25 </td><td> 13.68 </td><td> 81.04  </td><td> -38.36 </td><td> 0.05 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1894 </td><td> 1895 </td><td> 355.69 </td><td> 14.81 </td><td> 99.18  </td><td> -44.87 </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1896 </td><td> 1897 </td><td> 11.21 </td><td> 14.92  </td><td> 120.55 </td><td> -47.93 </td><td> 0.08 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1898 </td><td> 1899 </td><td> 26.67 </td><td> 13.98  </td><td> 142.70 </td><td> -46.76 </td><td> 0.05 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1900 </td><td> 1901 </td><td> 341.00 </td><td> 0.00  </td><td> 69.20  </td><td> -49.10 </td><td> 0.07 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1902 </td><td> 1903 </td><td> 356.00 </td><td> 0.00  </td><td> 89.32  </td><td> -58.40 </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1904 </td><td> 1905 </td><td> 11.00 </td><td> 0.00   </td><td> 118.86 </td><td> -62.81 </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1906 </td><td> 1907 </td><td> 26.00 </td><td> 0.00   </td><td> 150.04 </td><td> -60.08 </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1908 </td><td> 1909 </td><td> 311.00 </td><td> 0.00  </td><td> 46.64  </td><td> -24.82 </td><td> 0.08 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1910 </td><td> 1911 </td><td> 344.72 </td><td> -9.39 </td><td> 61.32  </td><td> -58.07 </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1912 </td><td> 1913 </td><td> 6.02 </td><td> -10.00  </td><td> 100.99 </td><td> -71.69 </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1914 </td><td> 1915 </td><td> 24.27 </td><td> -9.45  </td><td> 156.44 </td><td> -69.30 </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1916 </td><td> 1917 </td><td> 311.58 </td><td> -6.00 </td><td> 41.08  </td><td> -28.23 </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 1918 </td><td> 1919 </td><td> 317.00 </td><td> 0.00  </td><td> 50.11  </td><td> -29.97 </td><td> 0.09 </td><td> segue1 </td><td> segue </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 2038 </td><td> 2058 </td><td> 10.51 </td><td> 24.90  </td><td> 120.23 </td><td> -37.92 </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2040 </td><td> 2060 </td><td> 19.14 </td><td> 25.74  </td><td> 130.00 </td><td> -36.79 </td><td> 0.09 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2041 </td><td> 2061 </td><td> 20.00 </td><td> 31.69  </td><td> 130.00 </td><td> -30.79 </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2042 </td><td> 2062 </td><td> 21.15 </td><td> 38.63  </td><td> 130.00 </td><td> -23.79 </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2043 </td><td> 2063 </td><td> 21.33 </td><td> 39.62  </td><td> 130.00 </td><td> -22.79 </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2044 </td><td> 2064 </td><td> 24.72 </td><td> 23.70  </td><td> 136.73 </td><td> -37.90 </td><td> 0.12 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2046 </td><td> 2066 </td><td> 32.23 </td><td> 22.52  </td><td> 145.47 </td><td> -36.94 </td><td> 0.11 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2047 </td><td> 2067 </td><td> 37.40 </td><td> -8.47  </td><td> 178.72 </td><td> -60.22 </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2048 </td><td> 2068 </td><td> 47.00 </td><td> 0.00   </td><td> 179.01 </td><td> -47.44 </td><td> 0.09 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2049 </td><td> 2069 </td><td> 53.00 </td><td> 0.00   </td><td> 184.53 </td><td> -42.87 </td><td> 0.11 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2050 </td><td> 2070 </td><td> 55.43 </td><td> -6.41  </td><td> 193.71 </td><td> -44.60 </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2051 </td><td> 2071 </td><td> 59.42 </td><td> -5.86  </td><td> 195.91 </td><td> -40.94 </td><td> 0.10 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2052 </td><td> 2072 </td><td> 83.20 </td><td> 0.00   </td><td> 203.68 </td><td> -17.42 </td><td> 0.34 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2053 </td><td> 2073 </td><td> 112.51 </td><td> 35.99 </td><td> 182.90 </td><td> 22.87  </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2054 </td><td> 2074 </td><td> 116.00 </td><td> 18.18 </td><td> 201.97 </td><td> 19.54  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2055 </td><td> 2075 </td><td> 116.88 </td><td> 28.02 </td><td> 192.41 </td><td> 23.86  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2056 </td><td> 2076 </td><td> 121.20 </td><td> 6.75  </td><td> 215.24 </td><td> 19.38  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2057 </td><td> 2077 </td><td> 124.00 </td><td> 0.00  </td><td> 222.93 </td><td> 18.72  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 3.0 </td><td> good </td></tr>
<tr><td> 2175 </td><td> 2186 </td><td> 241.41 </td><td> 5.57  </td><td> 16.92  </td><td> 39.10  </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2176 </td><td> 2187 </td><td> 242.51 </td><td> 52.37 </td><td> 81.35  </td><td> 45.48  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2177 </td><td> 2188 </td><td> 243.77 </td><td> 16.67 </td><td> 31.37  </td><td> 41.94  </td><td> 0.05 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2178 </td><td> 2189 </td><td> 242.33 </td><td> 4.07  </td><td> 15.88  </td><td> 37.53  </td><td> 0.07 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2179 </td><td> 2190 </td><td> 311.16 </td><td> 76.18 </td><td> 110.00 </td><td> 20.00  </td><td> 0.49 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2180 </td><td> 2191 </td><td> 253.12 </td><td> 23.95 </td><td> 43.95  </td><td> 36.06  </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2181 </td><td> 2192 </td><td> 254.92 </td><td> 39.65 </td><td> 63.60  </td><td> 37.73  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2182 </td><td> 2193 </td><td> 261.18 </td><td> 27.01 </td><td> 50.00  </td><td> 30.00  </td><td> 0.05 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2183 </td><td> 2194 </td><td> 266.47 </td><td> 25.43 </td><td> 50.00  </td><td> 25.00  </td><td> 0.07 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2184 </td><td> 2195 </td><td> 271.61 </td><td> 23.67 </td><td> 50.00  </td><td> 20.00  </td><td> 0.12 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2248 </td><td> 2257 </td><td> 306.44 </td><td> 13.67 </td><td> 56.45  </td><td> -13.78 </td><td> 0.12 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2249 </td><td> 2258 </td><td> 309.33 </td><td> 14.73 </td><td> 58.97  </td><td> -15.53 </td><td> 0.09 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2250 </td><td> 2259 </td><td> 312.25 </td><td> 15.76 </td><td> 61.53  </td><td> -17.25 </td><td> 0.09 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2251 </td><td> 2260 </td><td> 332.50 </td><td> 21.47 </td><td> 80.06  </td><td> -27.66 </td><td> 0.07 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2252 </td><td> 2261 </td><td> 340.97 </td><td> 23.07 </td><td> 88.35  </td><td> -31.10 </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2253 </td><td> 2262 </td><td> 263.11 </td><td> 33.16 </td><td> 57.36  </td><td> 30.08  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2299 </td><td> 2301 </td><td> 92.63 </td><td> 64.25  </td><td> 150.00 </td><td> 20.00  </td><td> 0.14 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2300 </td><td> 2302 </td><td> 82.64 </td><td> 62.07  </td><td> 150.00 </td><td> 15.00  </td><td> 0.32 </td><td> segue1 </td><td> segue </td><td> 3.2 </td><td> good </td></tr>
<tr><td> 2303 </td><td> 2318 </td><td> 301.86 </td><td>-11.46 </td><td> 31.00  </td><td> -22.00 </td><td> 0.13 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2304 </td><td> 2319 </td><td> 139.89 </td><td> 22.17 </td><td> 206.64 </td><td> 41.95  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2305 </td><td> 2320 </td><td> 320.56 </td><td> -7.18 </td><td> 44.84  </td><td> -36.65 </td><td> 0.16 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2306 </td><td> 2321 </td><td> 33.20 </td><td> 6.62   </td><td> 156.16 </td><td> -50.93 </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2307 </td><td> 2322 </td><td> 45.24 </td><td> 5.74   </td><td> 171.39 </td><td> -44.61 </td><td> 0.16 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2308 </td><td> 2323 </td><td> 332.78 </td><td> 6.36  </td><td> 67.76  </td><td> -38.78 </td><td> 0.09 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2309 </td><td>      </td><td> 332.60 </td><td> -8.47 </td><td> 51.37  </td><td> -47.64 </td><td> 0.05 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> bad </td></tr>
<tr><td> 2310 </td><td> 2325 </td><td> 344.84 </td><td> 7.05  </td><td> 80.43  </td><td> -46.37 </td><td> 0.07 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2311 </td><td>      </td><td> 356.88 </td><td> -9.90 </td><td> 78.72  </td><td> -67.11 </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2312 </td><td> 2327 </td><td> 9.03 </td><td> 7.48    </td><td> 116.28 </td><td> -55.19 </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2313 </td><td> 2328 </td><td> 17.00 </td><td> 0.00   </td><td> 131.95 </td><td> -62.58 </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2314 </td><td> 2329 </td><td> 21.13 </td><td> 7.21   </td><td> 137.25 </td><td> -54.74 </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2315 </td><td> 2330 </td><td> 127.73 </td><td> 24.40 </td><td> 199.78 </td><td> 31.96  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2316 </td><td> 2331 </td><td> 129.62 </td><td> 53.91 </td><td> 164.26 </td><td> 37.20  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2317 </td><td> 2332 </td><td> 132.58 </td><td> 6.14  </td><td> 221.47 </td><td> 29.17  </td><td> 0.05 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2333 </td><td> 2338 </td><td> 298.44 </td><td> 19.08 </td><td> 57.00  </td><td> -4.41  </td><td> 0.00 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> bad </td></tr>
<tr><td> 2334 </td><td> 2339 </td><td> 51.25 </td><td> 5.20   </td><td> 177.71 </td><td> -40.80 </td><td> 0.19 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2335 </td><td> 2340 </td><td> 48.25 </td><td> 5.48   </td><td> 174.65 </td><td> -42.74 </td><td> 0.22 </td><td> segue1 </td><td> segue </td><td> 3.3 </td><td> good </td></tr>
<tr><td> 2378 </td><td> 2398 </td><td> 43.58 </td><td> 34.33  </td><td> 150.00 </td><td> -22.00 </td><td> 0.12 </td><td> segue1 </td><td> segue </td><td> 3.4 </td><td> good </td></tr>
<tr><td> 2379 </td><td> 2399 </td><td> 38.17 </td><td> 25.50  </td><td> 150.00 </td><td> -32.00 </td><td> 0.13 </td><td> segue1 </td><td> segue </td><td> 3.4 </td><td> good </td></tr>
<tr><td> 2380 </td><td> 2400 </td><td> 134.44 </td><td> 37.13 </td><td> 185.88 </td><td> 40.31  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 3.4 </td><td> good </td></tr>
<tr><td> 2381 </td><td> 2401 </td><td> 139.44 </td><td> 30.43 </td><td> 195.57 </td><td> 43.49  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 3.4 </td><td> good </td></tr>
<tr><td> 2382 </td><td> 2402 </td><td> 141.56 </td><td> 7.30  </td><td> 225.30 </td><td> 37.58  </td><td> 0.05 </td><td> segue1 </td><td> segue </td><td> 3.4 </td><td> good </td></tr>
<tr><td> 2383 </td><td> 2403 </td><td> 146.38 </td><td> 62.07 </td><td> 150.92 </td><td> 43.62  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 3.4 </td><td> good </td></tr>
<tr><td> 2384 </td><td> 2404 </td><td> 144.67 </td><td> 52.86 </td><td> 163.48 </td><td> 46.20  </td><td> 0.01 </td><td> segue1 </td><td> segue </td><td> 3.4 </td><td> good </td></tr>
<tr><td> 2387 </td><td> 2407 </td><td> 152.52 </td><td> 35.29 </td><td> 189.36 </td><td> 54.80  </td><td> 0.01 </td><td> segue1 </td><td> segue </td><td> 3.4 </td><td> good </td></tr>
<tr><td> 2393 </td><td> 2413 </td><td> 168.77 </td><td> 9.61  </td><td> 245.98 </td><td> 61.30  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 3.4 </td><td> good </td></tr>
<tr><td> 2394 </td><td> 2414 </td><td> 169.30 </td><td> 59.05 </td><td> 143.49 </td><td> 54.16  </td><td> 0.01 </td><td> segue1 </td><td> segue </td><td> 3.4 </td><td> good </td></tr>
<tr><td> 2397 </td><td> 2417 </td><td> 48.79 </td><td> 41.20  </td><td> 150.00 </td><td> -14.00 </td><td> 0.17 </td><td> segue1 </td><td> segue </td><td> 3.4 </td><td> good </td></tr>
<tr><td> 2441 </td><td> 2443 </td><td> 46.07 </td><td> 37.79  </td><td> 150.00 </td><td> -18.00 </td><td> 0.15 </td><td> segue1 </td><td> segue </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2445 </td><td> 2460 </td><td> 202.79 </td><td> 66.49 </td><td> 116.77 </td><td> 50.16  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2446 </td><td> 2461 </td><td> 192.96 </td><td> 59.76 </td><td> 122.84 </td><td> 57.37  </td><td> 0.01 </td><td> segue1 </td><td> segue </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2447 </td><td> 2462 </td><td> 214.83 </td><td> 56.35 </td><td> 100.68 </td><td> 56.81  </td><td> 0.01 </td><td> segue1 </td><td> segue </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2449 </td><td> 2464 </td><td> 231.76 </td><td> 49.88 </td><td> 81.08  </td><td> 52.66  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2452 </td><td> 2467 </td><td> 182.39 </td><td> 39.97 </td><td> 154.34 </td><td> 74.50  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2457 </td><td> 2472 </td><td> 191.46 </td><td> 29.84 </td><td> 147.00 </td><td> 87.02  </td><td> 0.01 </td><td> segue1 </td><td> segue </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2459 </td><td> 2474 </td><td> 238.51 </td><td> 26.52 </td><td> 42.88  </td><td> 49.49  </td><td> 0.05 </td><td> segue1 </td><td> segue </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2540 </td><td> 2548 </td><td> 91.83 </td><td> 83.51  </td><td> 130.00 </td><td> 25.71  </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2541 </td><td> 2549 </td><td> 127.07 </td><td> 83.27 </td><td> 130.00 </td><td> 29.71  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2550 </td><td> 2560 </td><td> 247.15 </td><td> 62.85 </td><td> 94.00  </td><td> 40.00  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2551 </td><td> 2561 </td><td> 262.57 </td><td> 64.37 </td><td> 94.00  </td><td> 33.00  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2552 </td><td>      </td><td> 278.72 </td><td> 64.15 </td><td> 94.00  </td><td> 26.00  </td><td> 0.05 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2553 </td><td> 2563 </td><td> 291.69 </td><td> 62.61 </td><td> 94.00  </td><td> 20.00  </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2620 </td><td>      </td><td> 335.67 </td><td> 39.37 </td><td> 94.00  </td><td> -15.00 </td><td> 0.14 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2621 </td><td> 2627 </td><td> 342.14 </td><td> 30.88 </td><td> 94.00  </td><td> -25.00 </td><td> 0.07 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2622 </td><td> 2628 </td><td> 354.52 </td><td> 8.71  </td><td> 94.00  </td><td> -50.00 </td><td> 0.12 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2623 </td><td> 2629 </td><td> 347.53 </td><td> 22.12 </td><td> 94.00  </td><td> -35.00 </td><td> 0.22 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2624 </td><td> 2630 </td><td> 1.02 </td><td> -4.82   </td><td> 94.00  </td><td> -65.00 </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2669 </td><td> 2673 </td><td> 71.00 </td><td> 10.95  </td><td> 187.00 </td><td> -22.00 </td><td> 0.48 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2670 </td><td> 2674 </td><td> 124.50 </td><td> 38.00 </td><td> 183.37 </td><td> 32.64  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2676 </td><td> 2694 </td><td> 102.21 </td><td> 28.39 </td><td> 187.00 </td><td> 12.00  </td><td> 0.10 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2677 </td><td> 2695 </td><td> 110.74 </td><td> 31.44 </td><td> 187.00 </td><td> 20.00  </td><td> 0.07 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2679 </td><td> 2697 </td><td> 57.20 </td><td> 10.31  </td><td> 178.00 </td><td> -33.00 </td><td> 0.25 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2680 </td><td> 2698 </td><td> 63.35 </td><td> 15.61  </td><td> 178.00 </td><td> -25.00 </td><td> 0.56 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2682 </td><td> 2700 </td><td> 101.28 </td><td> 37.61 </td><td> 178.00 </td><td> 15.00  </td><td> 0.14 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2683 </td><td> 2701 </td><td> 113.49 </td><td> 40.89 </td><td> 178.00 </td><td> 25.00  </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2689 </td><td> 2707 </td><td> 191.16 </td><td> -7.83 </td><td> 300.00 </td><td> 55.00  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2690 </td><td> 2708 </td><td> 167.16 </td><td>-16.21 </td><td> 270.00 </td><td> 40.00  </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2713 </td><td> 2728 </td><td> 113.02 </td><td> 15.86 </td><td> 203.00 </td><td> 16.00  </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2714 </td><td> 2729 </td><td> 118.29 </td><td> 18.06 </td><td> 203.00 </td><td> 21.50  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2716 </td><td>      </td><td> 210.10 </td><td> -9.21 </td><td> 330.00 </td><td> 50.00  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2796 </td><td> 2817 </td><td> 253.10 </td><td> 12.49 </td><td> 31.00  </td><td> 32.00  </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 4.3 </td><td> good </td></tr>
<tr><td> 2797 </td><td> 2818 </td><td> 262.52 </td><td> 8.11  </td><td> 31.00  </td><td> 21.75  </td><td> 0.13 </td><td> segue1 </td><td> segue </td><td> 4.3 </td><td> good </td></tr>
<tr><td> 2798 </td><td> 2819 </td><td> 279.34 </td><td> 41.30 </td><td> 70.00  </td><td> 20.00  </td><td> 0.07 </td><td> segue1 </td><td> segue </td><td> 4.3 </td><td> good </td></tr>
<tr><td> 2799 </td><td> 2820 </td><td> 263.44 </td><td> 44.15 </td><td> 70.00  </td><td> 32.00  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.3 </td><td> good </td></tr>
<tr><td> 2801 </td><td> 2822 </td><td> 1.25 </td><td> 24.95   </td><td> 109.77 </td><td> -36.73 </td><td> 0.07 </td><td> segue1 </td><td> segue </td><td> 4.3 </td><td> good </td></tr>
<tr><td> 2802 </td><td>      </td><td> 278.04 </td><td> 78.51 </td><td> 110.00 </td><td> 27.50  </td><td> 0.07 </td><td> segue1 </td><td> segue </td><td> 4.3 </td><td> good </td></tr>
<tr><td> 2803 </td><td> 2824 </td><td> 0.64 </td><td> 28.14   </td><td> 110.00 </td><td> -33.50 </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 4.3 </td><td> good </td></tr>
<tr><td> 2804 </td><td> 2825 </td><td> 17.86 </td><td> 15.60  </td><td> 130.00 </td><td> -47.00 </td><td> 0.08 </td><td> segue1 </td><td> segue </td><td> 4.3 </td><td> good </td></tr>
<tr><td> 2805 </td><td> 2826 </td><td> 64.85 </td><td> 6.56   </td><td> 187.00 </td><td> -29.50 </td><td> 0.25 </td><td> segue1 </td><td> segue </td><td> 4.3 </td><td> good </td></tr>
<tr><td> 2806 </td><td> 2827 </td><td> 122.77 </td><td> -7.39 </td><td> 229.00 </td><td> 14.00  </td><td> 0.14 </td><td> segue1 </td><td> segue </td><td> 4.3 </td><td> good </td></tr>
<tr><td> 2807 </td><td> 2828 </td><td> 127.96 </td><td> -4.33 </td><td> 229.00 </td><td> 20.00  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 4.3 </td><td> good </td></tr>
<tr><td> 2808 </td><td> 2829 </td><td> 255.75 </td><td> 28.39 </td><td> 50.00  </td><td> 35.00  </td><td> 0.08 </td><td> segue1 </td><td> segue </td><td> 4.3 </td><td> good </td></tr>
<tr><td> 2812 </td><td> 2833 </td><td> 283.38 </td><td> 18.79 </td><td> 50.00  </td><td> 8.00   </td><td> 0.41 </td><td> segue1 </td><td> segue </td><td> 4.3 </td><td> bad </td></tr>
<tr><td> 2815 </td><td>      </td><td> 312.72 </td><td> 2.52  </td><td> 50.00  </td><td> -25.00 </td><td> 0.11 </td><td> segue1 </td><td> segue </td><td> 4.3 </td><td> good </td></tr>
<tr><td> 2848 </td><td>      </td><td> 7.78 </td><td> -18.29  </td><td> 94.00  </td><td> -80.00 </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.4 </td><td> good </td></tr>
<tr><td> 2849 </td><td> 2864 </td><td> 18.70 </td><td> -9.72  </td><td> 141.60 </td><td> -71.74 </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 4.4 </td><td> good </td></tr>
<tr><td> 2851 </td><td> 2045 </td><td> 30.00 </td><td> 0.00   </td><td> 157.01 </td><td> -58.26 </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 4.4 </td><td> good </td></tr>
<tr><td> 2852 </td><td> 2867 </td><td> 150.00 </td><td> 0.00  </td><td> 239.10 </td><td> 40.72  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 4.4 </td><td> good </td></tr>
<tr><td> 2854 </td><td> 2869 </td><td> 156.64 </td><td> 8.82  </td><td> 234.18 </td><td> 51.20  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 4.4 </td><td> good </td></tr>
<tr><td> 2855 </td><td> 2870 </td><td> 165.56 </td><td> 28.56 </td><td> 203.12 </td><td> 65.87  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 4.4 </td><td> good </td></tr>
<tr><td> 2856 </td><td> 2871 </td><td> 166.97 </td><td> 38.59 </td><td> 178.45 </td><td> 65.54  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.4 </td><td> good </td></tr>
<tr><td> 2857 </td><td> 2872 </td><td> 169.09 </td><td> 19.29 </td><td> 227.63 </td><td> 66.83  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.4 </td><td> good </td></tr>
<tr><td> 2858 </td><td> 2873 </td><td> 172.12 </td><td> 66.98 </td><td> 134.92 </td><td> 48.17  </td><td> 0.01 </td><td> segue1 </td><td> segue </td><td> 4.4 </td><td> good </td></tr>
<tr><td> 2859 </td><td> 2874 </td><td> 169.73 </td><td>-11.87 </td><td> 270.00 </td><td> 45.00  </td><td> 0.06 </td><td> segue1 </td><td> segue </td><td> 4.4 </td><td> good </td></tr>
<tr><td> 2861 </td><td> 2876 </td><td> 172.22 </td><td> -7.52 </td><td> 270.00 </td><td> 50.00  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 4.4 </td><td> good </td></tr>
<tr><td> 2862 </td><td> 2877 </td><td> 174.00 </td><td> 0.00  </td><td> 266.09 </td><td> 57.37  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.4 </td><td> good </td></tr>
<tr><td> 2889 </td><td> 2914 </td><td> 144.00 </td><td> 30.05 </td><td> 197.01 </td><td> 47.32  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2892 </td><td> 2917 </td><td> 181.00 </td><td> 0.00  </td><td> 278.20 </td><td> 60.57  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2893 </td><td> 2918 </td><td> 181.81 </td><td> 19.97 </td><td> 245.85 </td><td> 77.61  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2894 </td><td> 2919 </td><td> 181.89 </td><td> 49.96 </td><td> 140.22 </td><td> 65.67  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2895 </td><td> 2920 </td><td> 189.00 </td><td> 0.00  </td><td> 294.52 </td><td> 62.62  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2897 </td><td> 2922 </td><td> 191.00 </td><td> -2.50 </td><td> 299.18 </td><td> 60.32  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2898 </td><td> 2923 </td><td> 192.75 </td><td> 49.74 </td><td> 123.11 </td><td> 67.39  </td><td> 0.01 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2899 </td><td> 2924 </td><td> 194.57 </td><td> 19.74 </td><td> 315.26 </td><td> 82.45  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2900 </td><td> 2925 </td><td> 197.96 </td><td> 39.27 </td><td> 104.92 </td><td> 77.13  </td><td> 0.01 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2901 </td><td> 2926 </td><td> 198.00 </td><td> 0.00  </td><td> 314.09 </td><td> 62.43  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2902 </td><td> 2724 </td><td> 229.44 </td><td> 7.18  </td><td> 9.84   </td><td> 50.00  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2903 </td><td> 2928 </td><td> 205.28 </td><td> 9.39  </td><td> 338.75 </td><td> 68.73  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2904 </td><td> 2929 </td><td> 206.68 </td><td> 28.21 </td><td> 41.20  </td><td> 77.72  </td><td> 0.01 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2905 </td><td> 2930 </td><td> 207.22 </td><td> 18.62 </td><td> 3.16   </td><td> 74.29  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2906 </td><td> 2931 </td><td> 212.81 </td><td> 36.58 </td><td> 67.14  </td><td> 70.65  </td><td> 0.01 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2907 </td><td> 2932 </td><td> 217.15 </td><td> 45.26 </td><td> 82.47  </td><td> 63.49  </td><td> 0.01 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2908 </td><td> 2933 </td><td> 217.40 </td><td> 8.47  </td><td> 358.72 </td><td> 60.22  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2909 </td><td> 2934 </td><td> 222.00 </td><td> 0.00  </td><td> 353.65 </td><td> 51.02  </td><td> 0.05 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2910 </td><td> 2935 </td><td> 226.36 </td><td> 32.20 </td><td> 51.02  </td><td> 60.57  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2911 </td><td> 2936 </td><td> 231.38 </td><td> 39.43 </td><td> 63.98  </td><td> 55.84  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2938 </td><td> 2943 </td><td> 107.24 </td><td> 39.41 </td><td> 178.00 </td><td> 20.00  </td><td> 0.07 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2939 </td><td> 2944 </td><td> 116.19 </td><td> 66.11 </td><td> 150.00 </td><td> 30.00  </td><td> 0.04 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2963 </td><td> 2965 </td><td> 193.12 </td><td> 9.90  </td><td> 303.80 </td><td> 72.77  </td><td> 0.02 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2964 </td><td>      </td><td> 219.59 </td><td> 21.00 </td><td> 24.63  </td><td> 64.89  </td><td> 0.03 </td><td> segue1 </td><td> segue </td><td> 4.6 </td><td> good </td></tr>
</table>

<hr />

<h2 id="segue2">Program: segue2</h2>

<p>The plates under the program name <i>segue2</i> are slightly different than those
from the SEGUE-1. Unlike
the <i>segue</i> program, SEGUE-2 does not do both bright and faint exposures. As SEGUE-2
focuses on the distant Galaxy, it consists solely of deep pointings. Additionally,
the target selection algorithm for the SEGUE-2 targets did not evolve in the manner of the
SEGUE-1 program plates. Thus, we have not listed the Target Selection parameter here.
Similar to SEGUE-1, the plates of SEGUE-2 are placed without regard to known substructure. </p>

<table class="common">
   <caption>Plate Information: segue2 </caption>
<tr><th>Bright</th><th>RA</th><th>Dec</th><th>l</th><th>b</th><th>E(B-V)</th><th>Survey</th><th>Program</th><th>Quality</th></tr>
<tr><td> 3105 </td><td> 8.20 </td><td> -9.99   </td><td> 107.68 </td><td>-72.30 </td><td> 0.03 </td><td> segue2 </td><td> segue2     </td><td> good </td></tr>
<tr><td> 3106 </td><td> 6.86 </td><td> 7.49    </td><td> 112.55 </td><td>-54.89 </td><td> 0.03 </td><td> segue2 </td><td> segue2      </td><td> good </td></tr>
<tr><td> 3109 </td><td> 16.52 </td><td> -9.80  </td><td> 134.90 </td><td>-72.33 </td><td> 0.04 </td><td> segue2 </td><td> segue2    </td><td> good </td></tr>
<tr><td> 3110 </td><td> 18.96 </td><td> 7.28   </td><td> 133.55 </td><td>-55.08 </td><td> 0.05 </td><td> segue2 </td><td> segue2     </td><td> good </td></tr>
<tr><td> 3111 </td><td> 13.00 </td><td> 0.00   </td><td> 123.24 </td><td>-62.87 </td><td> 0.03 </td><td> segue2 </td><td> segue2     </td><td> good </td></tr>
<tr><td> 3112 </td><td> 14.80 </td><td> 0.00   </td><td> 127.18 </td><td>-62.81 </td><td> 0.03 </td><td> segue2 </td><td> segue2     </td><td> good </td></tr>
<tr><td> 3114 </td><td> 28.87 </td><td> 13.76  </td><td> 145.73 </td><td>-46.25 </td><td> 0.06 </td><td> segue2 </td><td> segue2    </td><td> good </td></tr>
<tr><td> 3115 </td><td> 18.12 </td><td> 17.74  </td><td> 130.00 </td><td>-44.85 </td><td> 0.07 </td><td> segue2 </td><td> segue2    </td><td> good </td></tr>
<tr><td> 3116 </td><td> 31.04 </td><td> 6.73   </td><td> 153.03 </td><td>-51.84 </td><td> 0.06 </td><td> segue2 </td><td> segue2     </td><td> good </td></tr>
<tr><td> 3121 </td><td> 58.82 </td><td> 11.75  </td><td> 178.00 </td><td>-30.85 </td><td> 0.28 </td><td> segue2 </td><td> segue2    </td><td> good </td></tr>
<tr><td> 3122 </td><td> 35.23 </td><td> -8.66  </td><td> 176.00 </td><td>-61.92 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3123 </td><td> 73.30 </td><td> -4.66  </td><td> 203.00 </td><td>-28.33 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3126 </td><td> 39.00 </td><td> 0.00   </td><td> 170.04 </td><td>-53.03 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3127 </td><td> 36.85 </td><td> 0.00   </td><td> 167.24 </td><td>-54.40 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3128 </td><td> 340.25 </td><td> 13.68 </td><td> 81.04  </td><td>-38.36 </td><td> 0.06 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3129 </td><td> 338.06 </td><td> 13.43 </td><td> 78.74  </td><td>-37.22 </td><td> 0.07 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3130 </td><td> 355.69 </td><td> 14.81 </td><td> 99.18  </td><td>-44.87 </td><td> 0.05 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3131 </td><td> 357.91 </td><td> 14.89 </td><td> 102.08 </td><td>-45.55 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3132 </td><td> 11.21 </td><td> 14.92  </td><td> 120.55 </td><td>-47.93 </td><td> 0.08 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3133 </td><td> 8.99 </td><td> 14.97   </td><td> 117.36 </td><td>-47.74 </td><td> 0.07 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3134 </td><td> 1.96 </td><td> -6.76   </td><td> 94.00  </td><td>-67.15 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3135 </td><td> 8.14 </td><td> 24.97   </td><td> 117.52 </td><td>-37.70 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3137 </td><td> 305.26 </td><td>-12.97 </td><td> 31.00  </td><td>-25.65 </td><td> 0.07 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3138 </td><td> 303.26 </td><td>-12.08 </td><td> 31.00  </td><td>-23.50 </td><td> 0.11 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3141 </td><td> 330.62 </td><td> 6.20  </td><td> 65.80  </td><td>-37.29 </td><td> 0.07 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3142 </td><td> 353.85 </td><td> 0.00  </td><td> 85.86  </td><td>-57.29 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3143 </td><td> 343.15 </td><td> 0.00  </td><td> 71.56  </td><td>-50.62 </td><td> 0.09 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3144 </td><td> 355.01 </td><td> -9.85 </td><td> 75.29  </td><td>-65.88 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3145 </td><td> 352.83 </td><td> -9.78 </td><td> 71.69  </td><td>-64.35 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3146 </td><td> 333.00 </td><td> 0.00  </td><td> 61.57  </td><td>-43.09 </td><td> 0.07 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3148 </td><td> 129.74 </td><td> 25.55 </td><td> 199.11 </td><td> 34.03 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3149 </td><td> 136.66 </td><td> 38.38 </td><td> 184.43 </td><td> 42.16 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3150 </td><td> 169.68 </td><td> 38.98 </td><td> 175.52 </td><td> 67.34 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3151 </td><td> 143.72 </td><td> 7.55  </td><td> 226.34 </td><td> 39.57 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3152 </td><td> 155.01 </td><td> 36.01 </td><td> 187.88 </td><td> 56.78 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3153 </td><td> 126.39 </td><td> 39.56 </td><td> 181.82 </td><td> 34.36 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3154 </td><td> 149.97 </td><td> 2.05  </td><td> 236.88 </td><td> 41.91 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3155 </td><td> 154.47 </td><td> 8.64  </td><td> 232.62 </td><td> 49.30 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3156 </td><td> 55.15 </td><td> 0.00   </td><td> 186.31 </td><td>-41.17 </td><td> 0.11 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3157 </td><td> 61.55 </td><td> -5.55  </td><td> 197.00 </td><td>-38.96 </td><td> 0.09 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3158 </td><td> 39.26 </td><td> 27.41  </td><td> 150.00 </td><td>-29.85 </td><td> 0.13 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3159 </td><td> 73.30 </td><td> -4.66  </td><td> 203.00 </td><td>-28.33 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3160 </td><td> 108.40 </td><td> 30.68 </td><td> 187.00 </td><td> 17.85 </td><td> 0.07 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3161 </td><td> 116.26 </td><td> 41.42 </td><td> 178.00 </td><td> 27.15 </td><td> 0.05 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3162 </td><td> 120.39 </td><td> 18.88 </td><td> 203.00 </td><td> 23.65 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3166 </td><td> 118.12 </td><td> 29.86 </td><td> 190.88 </td><td> 25.48 </td><td> 0.05 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3167 </td><td> 132.09 </td><td> 55.52 </td><td> 162.05 </td><td> 38.46 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3169 </td><td> 147.92 </td><td> 54.11 </td><td> 160.84 </td><td> 47.62 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3170 </td><td> 171.51 </td><td> 19.49 </td><td> 229.70 </td><td> 69.00 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3171 </td><td> 166.49 </td><td> 66.40 </td><td> 138.18 </td><td> 47.48 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3172 </td><td> 184.26 </td><td> 20.00 </td><td> 253.25 </td><td> 79.37 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3173 </td><td> 178.33 </td><td> 49.81 </td><td> 145.22 </td><td> 64.73 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3174 </td><td> 126.28 </td><td> 47.26 </td><td> 172.50 </td><td> 35.10 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3175 </td><td> 129.67 </td><td> 47.24 </td><td> 172.63 </td><td> 37.40 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3176 </td><td> 157.89 </td><td> 53.56 </td><td> 157.50 </td><td> 53.13 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3177 </td><td> 156.62 </td><td> 55.74 </td><td> 155.12 </td><td> 51.35 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3178 </td><td> 153.68 </td><td> 18.80 </td><td> 217.50 </td><td> 53.13 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3179 </td><td> 152.51 </td><td> 20.82 </td><td> 213.73 </td><td> 52.75 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3180 </td><td> 182.93 </td><td> 29.57 </td><td> 195.00 </td><td> 80.93 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3181 </td><td> 180.72 </td><td> 30.84 </td><td> 190.77 </td><td> 78.75 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3182 </td><td> 127.00 </td><td> 32.00 </td><td> 190.88 </td><td> 33.39 </td><td> 0.05 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3183 </td><td> 49.15 </td><td> 0.00   </td><td> 181.09 </td><td>-45.84 </td><td> 0.09 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3184 </td><td> 44.85 </td><td> 0.00   </td><td> 176.80 </td><td>-49.01 </td><td> 0.09 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3185 </td><td> 47.00 </td><td> -7.47  </td><td> 188.01 </td><td>-52.15 </td><td> 0.08 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3186 </td><td> 49.15 </td><td> -7.21  </td><td> 189.63 </td><td>-50.25 </td><td> 0.07 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3187 </td><td> 51.77 </td><td> 17.71  </td><td> 167.44 </td><td>-31.40 </td><td> 0.14 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3188 </td><td> 124.77 </td><td> 30.71 </td><td> 191.81 </td><td> 31.23 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3189 </td><td> 130.00 </td><td> 15.00 </td><td> 210.97 </td><td> 30.68 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3192 </td><td> 141.00 </td><td> 14.82 </td><td> 216.29 </td><td> 40.39 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3193 </td><td> 150.00 </td><td> 45.00 </td><td> 173.68 </td><td> 51.60 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3194 </td><td> 150.00 </td><td> 42.70 </td><td> 177.33 </td><td> 52.06 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3195 </td><td> 127.96 </td><td> 13.82 </td><td> 211.32 </td><td> 28.39 </td><td> 0.05 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3196 </td><td> 143.38 </td><td> 14.82 </td><td> 217.50 </td><td> 42.50 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3198 </td><td> 8.99 </td><td> 14.97   </td><td> 117.36 </td><td>-47.74 </td><td> 0.07 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3205 </td><td> 109.90 </td><td> 39.88 </td><td> 178.21 </td><td> 22.09 </td><td> 0.06 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3206 </td><td> 106.09 </td><td> 29.87 </td><td> 187.00 </td><td> 15.70 </td><td> 0.09 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3207 </td><td> 104.45 </td><td> 29.27 </td><td> 187.00 </td><td> 14.15 </td><td> 0.08 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3208 </td><td> 121.48 </td><td> 66.01 </td><td> 150.00 </td><td> 32.15 </td><td> 0.05 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3209 </td><td> 75.20 </td><td> -3.64  </td><td> 203.00 </td><td>-26.18 </td><td> 0.09 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3210 </td><td> 42.34 </td><td> 32.45  </td><td> 150.00 </td><td>-24.15 </td><td> 0.18 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3211 </td><td> 173.42 </td><td> 59.49 </td><td> 140.06 </td><td> 54.98 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3212 </td><td> 142.07 </td><td> 22.92 </td><td> 206.45 </td><td> 44.09 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3213 </td><td> 181.81 </td><td> 13.62 </td><td> 263.36 </td><td> 73.00 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3214 </td><td> 181.81 </td><td> 11.47 </td><td> 267.26 </td><td> 71.21 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3215 </td><td> 172.70 </td><td> 44.92 </td><td> 159.81 </td><td> 66.00 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3216 </td><td> 170.32 </td><td> 46.28 </td><td> 159.89 </td><td> 63.85 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3216 </td><td> 170.32 </td><td> 46.28 </td><td> 159.89 </td><td> 63.85 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3221 </td><td> 175.12 </td><td> 26.66 </td><td> 210.57 </td><td> 74.18 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3222 </td><td> 173.09 </td><td> 27.83 </td><td> 206.07 </td><td> 72.46 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3223 </td><td> 145.62 </td><td> 36.81 </td><td> 187.04 </td><td> 49.20 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3224 </td><td> 144.49 </td><td> 38.76 </td><td> 184.08 </td><td> 48.29 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3225 </td><td> 115.12 </td><td> 43.39 </td><td> 175.62 </td><td> 26.78 </td><td> 0.05 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3226 </td><td> 122.66 </td><td> 18.88 </td><td> 203.88 </td><td> 25.64 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3227 </td><td> 118.12 </td><td> 27.71 </td><td> 193.13 </td><td> 24.80 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3228 </td><td> 125.89 </td><td> 32.64 </td><td> 189.88 </td><td> 32.62 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3229 </td><td> 126.39 </td><td> 37.41 </td><td> 184.39 </td><td> 34.01 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3230 </td><td> 126.88 </td><td> 15.70 </td><td> 208.89 </td><td> 28.17 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3231 </td><td> 49.62 </td><td> 18.36  </td><td> 165.10 </td><td>-32.21 </td><td> 0.13 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3232 </td><td> 170.95 </td><td> 9.71  </td><td> 248.90 </td><td> 62.97 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3233 </td><td> 172.01 </td><td> -0.94 </td><td> 264.00 </td><td> 55.50 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3234 </td><td> 195.30 </td><td> 9.84  </td><td> 310.99 </td><td> 72.56 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3235 </td><td> 196.85 </td><td> 19.61 </td><td> 329.70 </td><td> 81.64 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3236 </td><td> 193.93 </td><td> 29.70 </td><td> 103.06 </td><td> 87.26 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3237 </td><td> 197.16 </td><td> 59.43 </td><td> 118.85 </td><td> 57.56 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3238 </td><td> 185.20 </td><td> 40.00 </td><td> 147.27 </td><td> 75.65 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3239 </td><td> 196.04 </td><td> 49.47 </td><td> 117.52 </td><td> 67.52 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3240 </td><td> 200.70 </td><td> 38.93 </td><td> 95.90  </td><td> 76.50 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3241 </td><td> 37.12 </td><td> 23.57  </td><td> 150.00 </td><td>-34.15 </td><td> 0.13 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3242 </td><td> 164.43 </td><td> 3.49  </td><td> 249.00 </td><td> 54.00 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3243 </td><td> 166.51 </td><td> 2.93  </td><td> 252.21 </td><td> 55.07 </td><td> 0.05 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3244 </td><td> 174.56 </td><td> 13.30 </td><td> 248.26 </td><td> 68.00 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3245 </td><td> 176.69 </td><td> 12.73 </td><td> 253.32 </td><td> 69.10 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3246 </td><td> 176.96 </td><td> 6.39  </td><td> 263.98 </td><td> 64.34 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3247 </td><td> 179.05 </td><td> 5.83  </td><td> 268.78 </td><td> 64.97 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3248 </td><td> 150.09 </td><td> 13.77 </td><td> 222.68 </td><td> 48.00 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3249 </td><td> 152.23 </td><td> 13.20 </td><td> 224.84 </td><td> 49.61 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3250 </td><td> 159.76 </td><td> 23.71 </td><td> 212.00 </td><td> 60.00 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3251 </td><td> 162.01 </td><td> 23.11 </td><td> 214.24 </td><td> 61.85 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3252 </td><td> 184.62 </td><td> 5.51  </td><td> 281.52 </td><td> 67.00 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3253 </td><td> 186.71 </td><td> 4.95  </td><td> 287.03 </td><td> 67.06 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3254 </td><td> 188.64 </td><td> 14.74 </td><td> 284.50 </td><td> 77.00 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3255 </td><td> 190.78 </td><td> 14.16 </td><td> 294.02 </td><td> 76.89 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3257 </td><td> 151.94 </td><td> 2.90  </td><td> 237.50 </td><td> 44.00 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3258 </td><td> 160.59 </td><td> 44.27 </td><td> 170.86 </td><td> 59.00 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3259 </td><td> 163.38 </td><td> 43.51 </td><td> 170.63 </td><td> 61.15 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3260 </td><td> 154.00 </td><td> 28.00 </td><td> 202.27 </td><td> 55.69 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3261 </td><td> 156.32 </td><td> 27.38 </td><td> 203.92 </td><td> 57.64 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3262 </td><td> 155.75 </td><td> 38.15 </td><td> 183.86 </td><td> 57.12 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3263 </td><td> 163.15 </td><td> 28.19 </td><td> 203.66 </td><td> 63.73 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3264 </td><td> 140.00 </td><td> 44.00 </td><td> 176.70 </td><td> 44.69 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3265 </td><td> 142.78 </td><td> 43.24 </td><td> 177.56 </td><td> 46.76 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3284 </td><td> 134.88 </td><td> 62.45 </td><td> 153.00 </td><td> 38.50 </td><td> 0.08 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3285 </td><td> 179.46 </td><td> 12.54 </td><td> 259.58 </td><td> 70.75 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3286 </td><td> 124.20 </td><td> 65.89 </td><td> 150.00 </td><td> 33.27 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3287 </td><td> 154.80 </td><td> 42.74 </td><td> 176.00 </td><td> 55.50 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3288 </td><td> 244.78 </td><td> 50.55 </td><td> 78.41  </td><td> 44.50 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3289 </td><td> 241.59 </td><td> 17.64 </td><td> 31.57  </td><td> 44.24 </td><td> 0.05 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3290 </td><td> 254.87 </td><td> 22.31 </td><td> 42.64  </td><td> 34.02 </td><td> 0.06 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3291 </td><td> 253.39 </td><td> 41.64 </td><td> 66.00  </td><td> 39.06 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3292 </td><td> 261.10 </td><td> 35.31 </td><td> 59.34  </td><td> 32.20 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3293 </td><td> 130.29 </td><td> 5.82  </td><td> 220.59 </td><td> 27.00 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3294 </td><td> 150.57 </td><td> 63.33 </td><td> 148.06 </td><td> 44.66 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3295 </td><td> 208.17 </td><td> 65.25 </td><td> 112.89 </td><td> 50.67 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3296 </td><td> 218.48 </td><td> 55.31 </td><td> 96.62  </td><td> 56.27 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3297 </td><td> 228.91 </td><td> 51.29 </td><td> 84.51  </td><td> 53.69 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3298 </td><td> 243.84 </td><td> 6.02  </td><td> 18.96  </td><td> 37.23 </td><td> 0.06 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3299 </td><td> 161.65 </td><td> 15.99 </td><td> 227.53 </td><td> 59.02 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3300 </td><td> 163.80 </td><td> 15.41 </td><td> 230.44 </td><td> 60.59 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3301 </td><td> 202.09 </td><td> 23.73 </td><td> 12.78  </td><td> 81.00 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3303 </td><td> 199.96 </td><td> 24.96 </td><td> 15.73  </td><td> 83.27 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3304 </td><td> 185.47 </td><td> 54.60 </td><td> 132.06 </td><td> 62.00 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3305 </td><td> 185.47 </td><td> 54.60 </td><td> 132.06 </td><td> 62.00 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3306 </td><td> 183.30 </td><td> 0.00  </td><td> 282.66 </td><td> 61.36 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3307 </td><td> 200.30 </td><td> 0.00  </td><td> 318.91 </td><td> 61.94 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3308 </td><td> 231.74 </td><td> 6.89  </td><td> 11.42  </td><td> 47.95 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3310 </td><td> 209.62 </td><td> 18.31 </td><td> 6.70   </td><td> 72.23 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3311 </td><td> 215.52 </td><td> 35.86 </td><td> 62.95  </td><td> 68.87 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3312 </td><td> 214.12 </td><td> 46.15 </td><td> 87.07  </td><td> 64.61 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3313 </td><td> 215.08 </td><td> 8.68  </td><td> 355.80 </td><td> 62.04 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3314 </td><td> 224.30 </td><td> 0.00  </td><td> 356.22 </td><td> 49.40 </td><td> 0.05 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3315 </td><td> 223.88 </td><td> 33.15 </td><td> 53.23  </td><td> 62.61 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3317 </td><td> 141.84 </td><td> 20.39 </td><td> 209.70 </td><td> 43.13 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3318 </td><td> 202.84 </td><td> 53.75 </td><td> 110.16 </td><td> 62.38 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3319 </td><td> 142.37 </td><td> 9.71  </td><td> 223.06 </td><td> 39.42 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3320 </td><td> 148.30 </td><td> 51.55 </td><td> 164.33 </td><td> 48.71 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3321 </td><td> 146.81 </td><td> 43.85 </td><td> 176.14 </td><td> 49.58 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3324 </td><td> 153.55 </td><td> 53.92 </td><td> 159.04 </td><td> 50.72 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3325 </td><td> 170.64 </td><td> 64.46 </td><td> 137.64 </td><td> 50.05 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3326 </td><td> 167.76 </td><td> 41.05 </td><td> 172.45 </td><td> 65.13 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3327 </td><td> 170.51 </td><td> 17.10 </td><td> 234.19 </td><td> 67.04 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3328 </td><td> 170.37 </td><td> 61.52 </td><td> 140.35 </td><td> 52.46 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3329 </td><td> 173.66 </td><td> 47.38 </td><td> 154.44 </td><td> 64.78 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3331 </td><td> 180.33 </td><td> 47.59 </td><td> 145.22 </td><td> 67.31 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3362 </td><td> 127.75 </td><td> 56.23 </td><td> 161.46 </td><td> 35.96 </td><td> 0.06 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3367 </td><td> 193.97 </td><td> 47.32 </td><td> 120.75 </td><td> 69.78 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3368 </td><td> 199.82 </td><td> 41.37 </td><td> 102.84 </td><td> 74.65 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3373 </td><td> 130.07 </td><td> 23.04 </td><td> 202.12 </td><td> 33.57 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3374 </td><td> 189.42 </td><td> 23.94 </td><td> 257.97 </td><td> 85.55 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3375 </td><td> 191.27 </td><td> 36.02 </td><td> 131.17 </td><td> 81.00 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3377 </td><td> 199.91 </td><td> 32.90 </td><td> 78.04  </td><td> 81.60 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3380 </td><td> 208.54 </td><td> 41.67 </td><td> 85.50  </td><td> 70.60 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3384 </td><td> 217.74 </td><td> 30.05 </td><td> 46.45  </td><td> 68.00 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3386 </td><td> 221.33 </td><td> 39.93 </td><td> 68.76  </td><td> 63.20 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3387 </td><td> 223.17 </td><td> 23.39 </td><td> 31.94  </td><td> 62.40 </td><td> 0.04 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3388 </td><td> 223.32 </td><td> 10.03 </td><td> 7.99   </td><td> 56.60 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3390 </td><td> 227.32 </td><td> 44.67 </td><td> 74.61  </td><td> 57.40 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3395 </td><td> 188.76 </td><td> 35.35 </td><td> 145.00 </td><td> 81.07 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3404 </td><td> 216.63 </td><td> 28.13 </td><td> 41.18  </td><td> 68.95 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3406 </td><td> 223.59 </td><td> 41.23 </td><td> 70.13  </td><td> 61.15 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3407 </td><td> 222.61 </td><td> 21.30 </td><td> 27.31  </td><td> 62.32 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3408 </td><td> 223.87 </td><td> 12.11 </td><td> 11.73  </td><td> 57.29 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3426 </td><td> 252.22 </td><td> 21.52 </td><td> 40.78  </td><td> 36.10 </td><td> 0.06 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3427 </td><td> 251.59 </td><td> 39.48 </td><td> 63.08  </td><td> 40.28 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3428 </td><td> 242.44 </td><td> 45.30 </td><td> 71.34  </td><td> 46.89 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3429 </td><td> 232.66 </td><td> 52.40 </td><td> 84.45  </td><td> 51.12 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3442 </td><td> 246.65 </td><td> 52.87 </td><td> 81.25  </td><td> 42.91 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3454 </td><td> 238.95 </td><td> 45.92 </td><td> 72.85  </td><td> 49.20 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3457 </td><td> 252.84 </td><td> 33.88 </td><td> 56.04  </td><td> 38.60 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3459 </td><td> 244.50 </td><td> 31.17 </td><td> 50.97  </td><td> 45.12 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3466 </td><td> 239.51 </td><td> 43.82 </td><td> 69.59  </td><td> 49.16 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3467 </td><td> 242.02 </td><td> 38.83 </td><td> 61.86  </td><td> 47.67 </td><td> 0.01 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3478 </td><td> 240.64 </td><td> 36.53 </td><td> 58.42  </td><td> 48.76 </td><td> 0.02 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
<tr><td> 3480 </td><td> 251.56 </td><td> 31.58 </td><td> 52.89  </td><td> 39.25 </td><td> 0.03 </td><td> segue2 </td><td> segue2 </td><td> good </td></tr>
</table>

<hr />

<h2 id="segtest">Program: segtest, segtestf</h2>

<p>The plates under the program name <i>segtest</i> use a special target
selection algorithm used for testing the overall SEGUE programs. When trying
to make a uniform SEGUE sample, it is best to
not use spectra from these plates. If you need the spectrum for a particular object,
it is fine to use the observations.  </p>

<table class="common">
   <caption >Plate Information: segtest </caption>
<tr><th>Bright</th><th>Faint</th><th>RA</th><th>Dec</th><th>l</th><th>b</th><th>E(B-V)</th><th>Survey</th><th>Program</th><th>Target Selection</th><th>Quality</th><th>Test</th></tr>
<tr><td> 1660 </td><td> 1661 </td><td> 303.62 </td><td> 77.18 </td><td> 110.00 </td><td> 22.00  </td><td> 0.00 </td><td> segue1 </td><td> segtest </td><td> test </td><td> good </td><td>low |b| test</td></tr>
<tr><td> 1662 </td><td> 1663 </td><td> 351.41 </td><td> 52.73 </td><td> 110.01 </td><td> -7.97  </td><td> 0.00 </td><td> segue1 </td><td> segtest </td><td> test </td><td> good </td><td>low |b| test</td></tr>
<tr><td> 1664 </td><td>      </td><td> 42.00 </td><td> 0.00   </td><td> 173.65 </td><td> -51.02 </td><td> 0.00 </td><td> segue1 </td><td> segtest </td><td> test </td><td> good </td><td>RV test</td></tr>
<tr><td> 1857 </td><td> 1858 </td><td> 290.34 </td><td> 78.20 </td><td> 110.00 </td><td> 25.00  </td><td> 0.00 </td><td> segue1 </td><td> segtest </td><td> 2.0 </td><td> good </td><td>RV test</td></tr>
<tr><td> 2045 </td><td> 2065 </td><td> 30.00 </td><td> 0.00   </td><td> 157.01 </td><td> -58.26 </td><td> 0.03 </td><td> segue1 </td><td> segtest </td><td> 3.0 </td><td> good </td><td>Target Selection test</td></tr>
<tr><td> 2336 </td><td>      </td><td> 21.33 </td><td> 39.62  </td><td> 130.00 </td><td> -22.79 </td><td> 0.06 </td><td> segue1 </td><td> segtest </td><td> test </td><td> good </td><td>K giant test</td></tr>
<tr><td> 2337 </td><td>      </td><td> 106.24 </td><td> 65.80 </td><td> 150.00 </td><td> 25.94  </td><td> 0.04 </td><td> segue1 </td><td> segtest </td><td> test </td><td> good </td><td>K giant test</td></tr>
<tr><td> 2724 </td><td> 2739 </td><td> 229.44 </td><td> 7.18  </td><td> 9.84   </td><td> 50.00  </td><td> 0.04 </td><td> segue1 </td><td> segtest </td><td> 4.2 </td><td> good </td><td>Target Selection test</td></tr>
<tr><td> 2816 </td><td> 2850 </td><td> 25.28 </td><td> -9.39  </td><td> 158.75 </td><td> -68.73 </td><td> 0.03 </td><td> segue1 </td><td> segtest </td><td> 4.3 </td><td> bad </td><td>Target Selection test</td></tr>
</table>

<hr />

<h2 id="segpointed">Program: segpointed, segpointedf</h2>

<p>Plates labeled <i>segpointed</i> were directed at the location of probable Milky Way substructure. They have corresponding faint
plates, labeled <i>segpointedf</i>. Like <i>segtest</i>, these should not be used when creating a uniform SEGUE sample. </p>

<table class="common">
   <caption>Plate Information: segpointed </caption>
<tr><th>Bright</th><th>Faint</th><th>RA</th><th>Dec</th><th>l</th><th>b</th><th>E(B-V)</th><th>Survey</th><th>Program</th><th>Target Selection</th><th>Quality</th></tr>
<tr><td> 1882 </td><td> 1883 </td><td> 357.30 </td><td> 39.30 </td><td> 110.00 </td><td> -22.00 </td><td> 0.13 </td><td> segue1 </td><td> segpointed </td><td> 2.0 </td><td> good </td></tr>
<tr><td> 2386 </td><td> 2406 </td><td> 152.38 </td><td> 25.93 </td><td> 205.39 </td><td> 53.92  </td><td> 0.03 </td><td> segue1 </td><td> segpointed </td><td> 3.4 </td><td> good </td></tr>
<tr><td> 2389 </td><td> 2409 </td><td> 162.00 </td><td> 0.00  </td><td> 250.28 </td><td> 49.82  </td><td> 0.05 </td><td> segue1 </td><td> segpointed </td><td> 3.4 </td><td> good </td></tr>
<tr><td> 2390 </td><td> 2410 </td><td> 163.80 </td><td> 48.01 </td><td> 162.38 </td><td> 59.24  </td><td> 0.02 </td><td> segue1 </td><td> segpointed </td><td> 3.4 </td><td> good </td></tr>
<tr><td> 2442 </td><td> 2444 </td><td> 39.70 </td><td> 28.17  </td><td> 150.00 </td><td> -29.00 </td><td> 0.14 </td><td> segue1 </td><td> segpointed </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2539 </td><td> 2547 </td><td> 217.73 </td><td> 58.24 </td><td> 100.60 </td><td> 54.36  </td><td> 0.01 </td><td> segue1 </td><td> segpointed </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2557 </td><td> 2567 </td><td> 158.57 </td><td> 44.34 </td><td> 171.74 </td><td> 57.63  </td><td> 0.01 </td><td> segue1 </td><td> segpointed </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2558 </td><td> 2568 </td><td> 186.00 </td><td> 0.00  </td><td> 288.15 </td><td> 62.08  </td><td> 0.02 </td><td> segue1 </td><td> segpointed </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2559 </td><td> 2389 </td><td> 162.00 </td><td> 0.00  </td><td> 250.28 </td><td> 49.82  </td><td> 0.05 </td><td> segue1 </td><td> segpointed </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2850 </td><td> 2816 </td><td> 25.28 </td><td> -9.39  </td><td> 158.75 </td><td> -68.73 </td><td> 0.03 </td><td> segue1 </td><td> segpointed </td><td> 4.4 </td><td> good </td></tr>
<tr><td> 2853 </td><td> 2868 </td><td> 156.53 </td><td> 17.74 </td><td> 220.87 </td><td> 55.27  </td><td> 0.03 </td><td> segue1 </td><td> segpointed </td><td> 4.4 </td><td> good </td></tr>
<tr><td> 2888 </td><td> 2913 </td><td> 134.00 </td><td> 3.20  </td><td> 225.20 </td><td> 29.01  </td><td> 0.04 </td><td> segue1 </td><td> segpointed </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2890 </td><td> 2915 </td><td> 116.00 </td><td> 18.30 </td><td> 201.85 </td><td> 19.59  </td><td> 0.04 </td><td> segue1 </td><td> segpointed </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2891 </td><td> 2916 </td><td> 118.00 </td><td> 23.20 </td><td> 197.73 </td><td> 23.16  </td><td> 0.06 </td><td> segue1 </td><td> segpointed </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2940 </td><td> 2945 </td><td> 119.00 </td><td> 9.50  </td><td> 211.61 </td><td> 18.62  </td><td> 0.02 </td><td> segue1 </td><td> segpointed </td><td> 4.6 </td><td> good </td></tr>
<tr><td> 2941 </td><td> 2946 </td><td> 111.29 </td><td> 37.62 </td><td> 180.89 </td><td> 22.44  </td><td> 0.06 </td><td> segue1 </td><td> segpointed </td><td> 4.6 </td><td> good </td></tr>
</table>

<hr />

<h2 id="segcluster">Program: segcluster, segclusterf</h2>

<p>The plates under the program name <i>segcluster</i> are directed at both globular and
open clusters. The spectra from these plate pairs, in conjunction with crowded field photometry from
<a href="http://adsabs.harvard.edu/abs/2008ApJS..179..326A">An et al. (2008)</a>, are a useful test for the
SEGUE Stellar Parameter Pipeline as described in Lee et al. (2008)
<a href="http://adsabs.harvard.edu/abs/2008AJ....136.2022L">part I</a> and <a href="http://adsabs.harvard.edu/abs/2008AJ....136.2050L">part II</a>,
and <a href="http://adsabs.harvard.edu/abs/2010arXiv1008.1959S">Smolinski et al. (2010)</a>.
Fibers from these plates are used to spectroscopically target cluster members. All
fibers not devoted to the cluster are assigned to targets based on the target selection algorithm.
However, because of the targeted structure, these plates need to be treated separately than others
  when accounting for target selection. In addition, due to
  the difficulty of deblending their photometry, many of these targets do not have
associate DR7, DR8, or DR9 photometry (see <a href="dr10/spectro/caveats.php#Orphans">Caveats</a>).
 </p>

<table class="common">
   <caption>Plate Information: segcluster </caption>
<tr><th>Bright</th><th>Faint</th><th>RA</th><th>Dec</th><th>l</th><th>b</th><th>E(B-V)</th><th>Survey</th><th>Program</th><th>Target Selection</th><th>Quality</th><th>Cluster ID</th></tr>
<tr><td> 1960 </td><td> 1962 </td><td> 322.67 </td><td> 11.33 </td><td> 64.41  </td><td> -27.98 </td><td> 0.08 </td><td> segue1 </td><td> segcluster </td><td> 2.1 </td><td> good </td><td> M15</td></tr>
<tr><td> 1961 </td><td> 1963 </td><td> 323.36 </td><td> -0.20 </td><td> 54.00  </td><td> -35.43 </td><td> 0.05 </td><td> segue1 </td><td> segcluster </td><td> 2.1 </td><td> good </td><td> M2</td></tr>
<tr><td> 2078 </td><td> 2079 </td><td> 114.60 </td><td> 21.57 </td><td> 198.11 </td><td> 19.64  </td><td> 0.05 </td><td> segue1 </td><td> segcluster </td><td> 3.2 </td><td> good </td><td> NGC2420</td></tr>
<tr><td> 2174 </td><td> 2185 </td><td> 250.01 </td><td> 36.20 </td><td> 58.61  </td><td> 41.22  </td><td> 0.02 </td><td> segue1 </td><td> segcluster </td><td> 3.2 </td><td> good </td><td> M13</td></tr>
<tr><td> 2247 </td><td> 2256 </td><td> 258.78 </td><td> 42.03 </td><td> 66.95  </td><td> 35.10  </td><td> 0.02 </td><td> segue1 </td><td> segcluster </td><td> 3.2 </td><td> good </td><td> M92</td></tr>
<tr><td> 2255 </td><td> 2174 </td><td> 250.01 </td><td> 36.20 </td><td> 58.61  </td><td> 41.22  </td><td> 0.02 </td><td> segue1 </td><td> segcluster </td><td> 3.2 </td><td> good </td><td> M13-offset</td></tr>
<tr><td> 2338 </td><td> 2333 </td><td> 298.44 </td><td> 19.08 </td><td> 57.00  </td><td> -4.41  </td><td> 0.00 </td><td> segue1 </td><td> segcluster </td><td> 0.0 </td><td> good </td><td>M71</td></tr>
<tr><td> 2377 </td><td>      </td><td> 359.35 </td><td> 56.71 </td><td> 115.53 </td><td> -5.39  </td><td> 0.00 </td><td> segue1 </td><td> segcluster </td><td> 3.4 </td><td> good </td><td>NGC7789</td></tr>
<tr><td> 2475 </td><td>      </td><td> 205.55 </td><td> 28.40 </td><td> 42.31  </td><td> 78.70  </td><td> 0.01 </td><td> segue1 </td><td> segcluster </td><td> 4.0 </td><td> good </td><td>M3</td></tr>
<tr><td> 2476 </td><td>      </td><td> 199.03 </td><td> 17.01 </td><td> 333.60 </td><td> 78.38  </td><td> 0.02 </td><td> segue1 </td><td> segcluster </td><td> 4.0 </td><td> good </td><td>NGC5053</td></tr>
<tr><td> 2667 </td><td> 2671 </td><td> 132.82 </td><td> 10.94 </td><td> 216.61 </td><td> 31.53  </td><td> 0.04 </td><td> segue1 </td><td> segcluster </td><td> 4.2 </td><td> good </td><td>M67</td></tr>
<tr><td> 2800 </td><td> 2821 </td><td> 290.57 </td><td> 37.68 </td><td> 70.00  </td><td> 10.62  </td><td> 0.15 </td><td> segue1 </td><td> segcluster </td><td> 4.3 </td><td> good </td><td>NGC6791</td></tr>
<tr><td> 2887 </td><td> 2912 </td><td> 91.30 </td><td> 23.40  </td><td> 187.00 </td><td> 1.00   </td><td> 0.93 </td><td> segue1 </td><td> segcluster </td><td> 4.6 </td><td> good </td><td>M35</td></tr>
<tr><td> 3334 </td><td> 3335 </td><td> 103.27 </td><td> 16.68 </td><td> 198.18 </td><td> 7.87   </td><td> 0.00 </td><td> segue2 </td><td> segcluster </td><td> 0.0 </td><td> good </td><td>Be29</td></tr>
</table>

<hr />

<h2 id="seglowlat">Program: seglowlat, seglowlatf</h2>

<p>Plates labeled as <i>seglowlat</i>, and their respective faint plates <i>seglowlatf</i>,
are placed at low Galactic latitude. They have their own target selection strategy described briefly on the
<a href="dr10/algorithms/segue_target_selection.php#seguelowlat">SEGUE Target Selection </a> page.</p>

<table class="common">
   <caption>Plate Information: seglowlat </caption>
<tr><th>Bright</th><th>Faint</th><th>RA</th><th>Dec</th><th>l</th><th>b</th><th>E(B-V)</th><th>Survey</th><th>Program</th><th>Target Selection</th><th>Quality</th></tr>
<tr><td> 2534 </td><td> 2542 </td><td> 277.60 </td><td> 21.33  </td><td> 50.00  </td><td> 14.00 </td><td> 0.17 </td><td> segue1 </td><td> seglowlat </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2535 </td><td>      </td><td> 259.41 </td><td> -13.07 </td><td> 10.00  </td><td> 14.00 </td><td> 0.45 </td><td> segue1 </td><td> seglowlat </td><td> 4.0 </td><td> bad </td></tr>
<tr><td> 2536 </td><td> 2544 </td><td> 286.66 </td><td> 39.11  </td><td> 70.00  </td><td> 14.00 </td><td> 0.15 </td><td> segue1 </td><td> seglowlat </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2537 </td><td> 2545 </td><td> 334.17 </td><td> 69.39  </td><td> 110.00 </td><td> 10.50 </td><td> 0.47 </td><td> segue1 </td><td> seglowlat </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2538 </td><td> 2546 </td><td> 323.07 </td><td> 73.64  </td><td> 110.00 </td><td> 16.00 </td><td> 0.64 </td><td> segue1 </td><td> seglowlat </td><td> 4.0 </td><td> good </td></tr>
<tr><td> 2554 </td><td> 2564 </td><td> 302.97 </td><td> 60.01  </td><td> 94.00  </td><td> 14.00 </td><td> 0.19 </td><td> segue1 </td><td> seglowlat </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2555 </td><td> 2565 </td><td> 312.39 </td><td> 56.59  </td><td> 94.00  </td><td> 8.00  </td><td> 0.83 </td><td> segue1 </td><td> seglowlat </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2556 </td><td> 2566 </td><td> 330.15 </td><td> 45.06  </td><td> 94.00  </td><td> -8.00 </td><td> 0.30 </td><td> segue1 </td><td> seglowlat </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2668 </td><td> 2672 </td><td> 79.49 </td><td> 16.61   </td><td> 187.00 </td><td> -12.00</td><td> 0.33 </td><td> segue1 </td><td> seglowlat </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2678 </td><td> 2696 </td><td> 98.13 </td><td> 26.67   </td><td> 187.00 </td><td> 8.00  </td><td> 0.23 </td><td> segue1 </td><td> seglowlat </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2681 </td><td> 2699 </td><td> 71.50 </td><td> 21.98   </td><td> 178.00 </td><td> -15.00</td><td> 0.42 </td><td> segue1 </td><td> seglowlat </td><td> 4.2 </td><td> good </td></tr>
<tr><td> 2712 </td><td> 2727 </td><td> 105.56 </td><td> 12.44  </td><td> 203.00 </td><td> 8.00  </td><td> 0.09 </td><td> segue1 </td><td> seglowlat </td><td> 4.2 </td><td> good </td></tr>
</table>

<?php echo foot(); ?>
