<?php include '../../header.php'; echo head('Individual Methods Used in SSPP - SSPP'); ?>

<p><a href="dr8/spectro/sspp.php"><b>[Back to main SSPP page]</b></a></p>

<p>As <a href="http://adsabs.harvard.edu/abs/2008AJ....136.2022L">Lee et
al. (2008a)</a> describe, the SSPP applies a number of different methods
for determining stellar parameters.
The following table shows the range of g-r color, signal-to-noise ratio
(S/N) , and wavelength range used for each method. As T9, T10, and T11 are
estimated by the g-r color, there is no S/N limit. The meanings of the
names of all of these methods are described in that paper.</p>

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
      <td>0.0 - 0.8</td>
      <td>G1</td>
      <td>ki13</td>
      <td>0.0 -0.8</td>
      <td>M1</td>
      <td>ki13</td>
      <td>0.0 - 0.8</td>
      <td>&ge;15</td>
      <td>4400 - 5500</td>
      <td>Spectral matching</td>
    </tr>
    <tr>
      <td>T2</td>
      <td>k24</td>
      <td>0.0 - 0.8</td>
      <td>G2</td>
      <td>k24</td>
      <td>0.0 - 0.8</td>
      <td>M2</td>
      <td>k24</td>
      <td>0.0 - 0.8</td>
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
      <td>-0.3 - 0.8</td>
      <td>G4</td>
      <td>ANNSR</td>
      <td>-0.3 - 0.8</td>
      <td>M4</td>
      <td>ANNSR</td>
      <td>-0.3 - 0.8</td>
      <td>&ge;20</td>
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
      <td>0.3 - 1.2</td>
      <td>M8</td>
      <td>CaIIK1</td>
      <td>-0.3 - 0.8</td>
      <td>&ge;10</td>
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
      <td>0.1 - 0.8</td>
      <td>&ge;10</td>
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
      <td>0.1 - 0.8</td>
      <td>&ge;10</td>
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
      <td>M11</td>
      <td>ACF</td>
      <td>0.1 - 0.9</td>
      <td>&ge;15</td>
      <td>~ 4000 - 4500</td>
      <td>Line index</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>M12</td>
      <td>CaIIT</td>
      <td>0.1 - 0.7</td>
      <td>&ge;20</td>
      <td>~ 8480 - 8580</td>
      <td>Line index</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>G9</td>
      <td>CaI2</td>
      <td>0.3 - 1.2</td>
      <td></td>
      <td></td>
      <td></td>
      <td>&ge;10</td>
      <td>~ 4227</td>
      <td>Line index</td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td>G10</td>
      <td>MgH</td>
      <td>0.3 - 1.2</td>
      <td></td>
      <td></td>
      <td></td>
      <td>&ge;10</td>
      <td>~ 5170</td>
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
      <td>T<sub>K</sub></td>
      <td>-0.3 - 1.3</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>N/A</td>
      <td>N/A</td>
      <td>N/A</td>
    </tr>
    <tr>
      <td>T10</td>
      <td>T<sub>G</sub></td>
      <td>-0.3 - 1.3</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>N/A</td>
      <td>N/A</td>
      <td>N/A</td>
    </tr>
    <tr>
      <td>T11</td>
      <td>T<sub>I</sub></td>
      <td>-0.3 - 1.3</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>N/A</td>
      <td>N/A</td>
      <td>N/A</td>
    </tr>
</table>

<p>HA24 and HD24 are the temperature estimates from the H&alpha; and H&delta;
line indices in 24 &Aring; widths, respectively. The
temperature estimated from Kurucz models is referred to as
T<sub>K</sub>; T<sub>G</sub> is for the Girardi et al. (2004) isochrones.
T<sub>I</sub> is the temperature determined
from Equation 8 in
<a href="http://adsabs.harvard.edu/abs/2008AJ....136.2022L">Lee et al. (2008a)</a>.
The S/N cut is not applied to these temperature estimates because they
are computed based on the g-r color. The ki13, k24, NGS1, and NGS2 are
grid-matching based methods. WBG is the method from Wilhelm, Beers,
&amp; Gray (1999). ANNSR and ANNRR are the neural network approaches.
CaIIK1 and CaI1 are determined from the 3850 - 4250 &Aring; region. CaI2 and
MgH are methods based on Morrison et al. (2003). CaIIK2 and CaIIK3 are
[Fe/H] estimates based on the Ca II K line. ACF is the Autocorrelation
Function method, and CaIIT is based on the Ca II triplet line index.
S/N is the average signal to noise ratio per pixel over the spectral
region 4000 - 8000 &Aring;. See Section 4 in
<a href="http://adsabs.harvard.edu/abs/2008AJ....136.2022L">Lee et al. (2008a)</a> for
detailed descriptions of individual methods. Normally, the estimator
which satisfies the criteria is considered in averaging the estimates.</p>

<?php echo foot(); ?>
