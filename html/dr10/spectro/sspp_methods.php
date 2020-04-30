<?php include '../../header.php'; echo head('Individual Methods Used in SSPP - SSPP'); ?>

<p><a href="dr10/spectro/sspp.php"><b>[Back to main SSPP page]</b></a></p>

<p>The SSPP implements a number of different methods for determining stellar 
parameters. The following table shows the range of g-r color, signal-to-noise ratio
(S/N), and wavelength range used for each method in the DR9 SSPP. The details on 
each method and the meaning of the name of each technique can be found in 
<a href="http://adsabs.harvard.edu/abs/2008AJ....136.2022L">Lee et al. (2008a)</a>, 
except for T9 (IRFM), which is employed in the DR9 SSPP.
</p>

<table class="common">
    <tr>
      <th colspan="3" style="text-align:center;"><var>T</var><sub>eff</sub></th>
      <th colspan="3" style="text-align:center;">log <i>g</i></th>
      <th colspan="3" style="text-align:center;">[Fe/H]</th>
      <th colspan="3" style="text-align:center;"></th>
    </tr>
    <tr>
      <th>Name</th>
      <th>Method</th>
      <th>g-r</th>
      <th>Name</th>
      <th>Method</th>
      <th>g-r</th>
      <th>Name</th>
      <th>Method</th>
      <th>g-r</th>
      <th>S/N</th>
      <th>Wavelength range (&Aring;)</th>
      <th>Method</th>
    </tr>
    <tr>
      <td>T1</td>
      <td>ki13</td>
      <td>0.0 - 0.6</td>
      <td>G1</td>
      <td>ki13</td>
      <td>0.0 -0.6</td>
      <td>M1</td>
      <td>ki13</td>
      <td>0.0 - 0.6</td>
      <td>&ge;20</td>
      <td>4400 - 5500</td>
      <td>Spectral matching</td>
    </tr>
    <tr>
      <td>T2</td>
      <td>k24</td>
      <td>0.0 - 0.6</td>
      <td>G2</td>
      <td>k24</td>
      <td>0.0 - 0.6</td>
      <td>M2</td>
      <td>k24</td>
      <td>0.0 - 0.6</td>
      <td>&ge;15</td>
      <td>4400 - 5500</td>
      <td>Spectral matching</td>
    </tr>
    <tr>
      <td>T3</td>
      <td>WBG</td>
      <td>-0.3 - 0.3</td>
      <td>G3</td>
      <td>WBG</td>
      <td>-0.3 - 0.3</td>
      <td>M3</td>
      <td>WBG</td>
      <td>-0.3 - 0.3</td>
      <td>&ge;10</td>
      <td>3900 - 6000</td>
      <td>Spectral Matching</td>
    </tr>
    <tr>
      <td>T4</td>
      <td>ANNSR</td>
      <td>-0.3 - 0.7</td>
      <td>G4</td>
      <td>ANNSR</td>
      <td>-0.3 - 0.7</td>
      <td>M4</td>
      <td>ANNSR</td>
      <td>-0.3 - 0.7</td>
      <td>&ge;15</td>
      <td>3850 - 9000</td>
      <td>Spectral Matching</td>
    </tr>
    <tr>
      <td>T5</td>
      <td>ANNRR</td>
      <td>-0.3 - 1.2</td>
      <td>G5</td>
      <td>ANNRR</td>
      <td>-0.3 - 1.2</td>
      <td>M5</td>
      <td>ANNRR</td>
      <td>-0.3 - 1.2</td>
      <td>&ge;10</td>
      <td>3850 - 9000</td>
      <td>Spectral Matching</td>
    </tr>
    <tr>
      <td>T6</td>
      <td>NGS1</td>
      <td>-0.3 - 1.3</td>
      <td>G6</td>
      <td>NGS1</td>
      <td>-0.3 - 1.3</td>
      <td>M6</td>
      <td>NGS1</td>
      <td>-0.3 - 1.3</td>
      <td>&ge;10</td>
      <td>4500 - 5500</td>
      <td>Spectral Matching</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>G7</td>
      <td>NGS2</td>
      <td>0.0 - 1.3</td>
      <td>M7</td>
      <td>NGS2</td>
      <td>0.0 - 1.3</td>
      <td>&ge;20</td>
      <td>4500 - 5500</td>
      <td>Spectral Matching</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>G8</td>
      <td>CaI1</td>
      <td>0.1 - 1.2</td>
      <td>M8</td>
      <td>CaIIK1</td>
      <td>-0.1 - 1.2</td>
      <td>&ge;15</td>
      <td>3850 - 4250</td>
      <td>Spectral Matching</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>M9</td>
      <td>CaIIK2</td>
      <td>0.1 - 0.7</td>
      <td>&ge;15</td>
      <td>~ 3933</td>
      <td>Line index</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>M10</td>
      <td>CaIIK3</td>
      <td>0.1 - 0.7</td>
      <td>&ge;15</td>
      <td>~ 3933</td>
      <td>Line index</td>
    </tr>
    <tr>
      <td>T7</td>
      <td>HA24</td>
      <td>0.1 - 0.8</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>&ge;10</td>
      <td>~ 6563</td>
      <td>Line index</td>
    </tr>
    <tr>
      <td>T8</td>
      <td>HD24</td>
      <td>0.1 - 0.6</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>&ge;10</td>
      <td>~ 4102</td>
      <td>Line index</td>
    </tr>
    <tr>
      <td>T9</td>
      <td>IRFM</td>
      <td>-0.3 - 1.3</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>&ge;10</td>
      <td>N/A</td>
      <td>Color-temperature</td>
    </tr>
</table>

<p>The ki13, k24, NGS1, and NGS2 are grid-matching based methods. WBG is the 
method from Wilhelm, Beers, &amp; Gray (1999). ANNSR and ANNRR are the neural 
network approaches. CaIIK1 and CaI1 are determined from the 3850 - 4250 &Aring; region. 
CaIIK2 and CaIIK3 are [Fe/H] estimates based on the Ca II K line. S/N is the average 
signal to noise ratio per pixel over the spectral region 4000 - 8000 &Aring;. HA24 
and HD24 are the temperature estimates from the H&alpha; and H&delta;
line indices in 24 &Aring; widths, respectively. See Section 4 in
<a href="http://adsabs.harvard.edu/abs/2008AJ....136.2022L">Lee et al. (2008a)</a> for
detailed descriptions of individual methods. Normally, the estimator which 
satisfies the criteria is considered in averaging the estimates.
</p>

<p>
The SSPP for the DR9 adopts a much improved color (g-i)-temperature
relation, the InfraRed Flux Method (IRFM). This relation is derived 
from about 14,000 stars, having both SDSS (u, g, r, i, z) and 
near infrared (J, H, and K) photometry, as well as surface gravity and metallicity 
from the SSPP. Because the IRFM relation depends on the metallicity 
and surface gravity of the stars in question, an iterative procedure is used for the 
IRFM temperature estimate. The metallicity and gravity determined by NGS1 are used 
in this equation to obtain the first guess for effective temperature.  With this first 
pass of temperature held fixed during the &chi;<sup>2</sup>
minimization in the NGS1 synthetic spectra grid, a new set of log <i>g</i> and [Fe/H] is obtained.
These log <i>g</i> and [Fe/H] are again plugged into the derived color-temperature relation 
to determine the final estimate of <var>T</var><sub>eff</sub>. This IRFM temperature estimate
is considered in averaging to obtain the adopted <var>T</var><sub>eff</sub> for the range 
of -0.3 &le; g-r &le; 1.3 and S/N &ge; 10.
</p>

<?php echo foot(); ?>
