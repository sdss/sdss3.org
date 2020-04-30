<?php include '../../header.php'; echo head('Flags in the SSPP - SSPP'); ?>

<p><a href="dr10/spectro/sspp.php"><b>[Back to main SSPP page]</b></a></p>

<h2>Introduction</h2>

<p>As it is important that the SSPP be
able to identify situations where the quoted atmospheric parameters or the measured
radial velocities may be in doubt, or simply to make the user aware of possible anomalies
that might apply to a given star, the SSPP raises a number of flags
that serve this purpose. Basically, there are two categories of the
flags. The first one is to check if the determined stellar parameters and
the measured radial velocities are reasonably OK, whereas the other
one is to check if a spectrum is needed for visual inspection.</p>

<h2>Flags for Checking Stellar Parameters and Radial Velocities</h2>

<p>There are two primary categories of
flags -- critical flags and cautionary flags. When a critical flag is
raised, the SSPP is set to either ignore the determinations of
atmospheric parameters for a given star, or it is forced (in the case
of the color flag) to take steps that differ from normal processing in
an attempt to rescue this information. Obviously, even when information
is salvaged, the presence of a critical flag means the user must be
aware that special steps have been taken, and the reported estimated
parameters must be viewed with this knowledge in mind. </p>

<p>The second category of flags are the cautionary flags, which are provided for user
consideration, but are not necessarily cause for undue concern. Indeed,
sometimes these flags are raised when all is in fact OK, but the flag
has been raised due to a peculiarity in the spectrum that is relatively
harmless, and which will not unduly influence determination of
atmospheric parameters. The user should nevertheless be aware of the
existence of these flags. The flags are combined into a single set of
five letters, the meanings of which are summarized in the following
table.</p>

<p>
The nominal condition for the five letter flag combination is `nnnnn',
which indicates that the SSPP is satisfied that a given stellar
spectrum (and its reported g-r colors and S/N) has passed all of the
tests that have been performed, and the stellar parameters should be
considered well determined.</p>

  <table class="common">
      <tr>
        <th> Position</th>
        <th style="text-align: center;"> Flag </th>
        <th> Description </th>
        <th style="text-align: center;"> Category </th>
        <th style="text-align: center;"> Parameters </th>
      </tr>
      <tr>
        <td> First </td>
        <td style="text-align: center;"> n </td>
        <td> Appears normal </td>
        <td style="text-align: center;"> ...... </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> D </td>
        <td> Likely white dwarf </td>
        <td style="text-align: center;"> Critical </td>
        <td style="text-align: center;"> No </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> d </td>
        <td> Likely sdO or sdB </td>
        <td style="text-align: center;"> Critical </td>
        <td style="text-align: center;"> No </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> H </td>
        <td> Hot star with <i>T</i><sub>eff</sub> &gt; 10000 K </td>
        <td style="text-align: center;"> Critical </td>
        <td style="text-align: center;"> No </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> h </td>
        <td> Helium line detected, possibly very hot star </td>
        <td style="text-align: center;"> Critical </td>
        <td style="text-align: center;"> No </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> l </td>
        <td> Likely late type solar abundance star </td>
        <td style="text-align: center;"> Cautionary </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> E </td>
        <td> Emission lines in spectrum </td>
        <td style="text-align: center;"> Critical </td>
        <td style="text-align: center;"> No </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> S </td>
        <td> Sky spectrum </td>
        <td style="text-align: center;"> Critical </td>
        <td style="text-align: center;"> No </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> V </td>
        <td> No radial velocity information </td>
        <td style="text-align: center;"> Critical </td>
        <td style="text-align: center;"> No </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> N </td>
        <td> Very noisy spectrum </td>
        <td style="text-align: center;"> Cautionary </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td> Second </td>
        <td style="text-align: center;"> n </td>
        <td> Appears normal </td>
        <td style="text-align: center;"> ...... </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> C </td>
        <td> The photometric g-r color may be incorrect </td>
        <td style="text-align: center;"> Cautionary </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td> Third </td>
        <td style="text-align: center;"> n </td>
        <td> Appears normal </td>
        <td style="text-align: center;"> ...... </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> B </td>
        <td> Unexpected H&alpha; strength predicted from H&delta; </td>
        <td style="text-align: center;"> Cautionary </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> b </td>
        <td> If d or D flag is not raised among stars with B flag </td>
        <td style="text-align: center;">.....</td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td> Fourth </td>
        <td style="text-align: center;"> n </td>
        <td> Appears normal </td>
        <td style="text-align: center;"> ...... </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> G </td>
        <td> Strong G-band feature </td>
        <td style="text-align: center;"> Cautionary </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> g </td>
        <td> Mild G-band feature </td>
        <td style="text-align: center;"> Cautionary </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td> Fifth </td>
        <td style="text-align: center;"> n </td>
        <td> Appears normal </td>
        <td style="text-align: center;"> ......</td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> B </td>
        <td> Too blue g-r &lt; -0.3 to estimate parameters </td>
        <td style="text-align: center;"> Critical </td>
        <td style="text-align: center;"> No </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> R </td>
        <td> Too red g-r &gt; 1.3 to estimate parameters </td>
        <td style="text-align: center;"> Critical </td>
        <td style="text-align: center;"> No </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> X </td>
        <td> No parameters estimate </td>
        <td style="text-align: center;"> Critical </td>
        <td style="text-align: center;"> No </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> c </td>
        <td> Correlation coefficient &lt; 0.4 </td>
        <td style="text-align: center;"> Cautionary </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> T </td>
        <td> Difference between adopted <i>T</i><sub>eff</sub> and IRFM <i>T</i><sub>eff</sub> &gt; 500 K </td>
        <td style="text-align: center;"> Cautionary </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> P </td>
        <td> Possible predicted g-r is wrong </td>
        <td style="text-align: center;"> Cautionary </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td> RV </td>
        <td style="text-align: center;"> NORV </td>
        <td> No radial velocity info </td>
        <td style="text-align: center;"> ..... </td>
        <td style="text-align: center;"> no </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> ELRV </td>
        <td> Radial velocity from ELODIE template </td>
        <td style="text-align: center;"> ..... </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> BSRV </td>
        <td> Radial velocity from spetro1d </td>
        <td style="text-align: center;"> ...... </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
      <tr>
        <td></td>
        <td style="text-align: center;"> RVCAL </td>
        <td> Radial velocity calculated from SSPP </td>
        <td style="text-align: center;"> ...... </td>
        <td style="text-align: center;"> Yes </td>
      </tr>
  </table>

<h2>Flags for visual inspection</h2>

<p>A flag based on a six letter
combination is, since the DR7, added to speed up the visual inspection
of the stellar spectra. Those spectra where one or more of these flags
are raised are visually inspected, while those with no flags raised
("nnnnnn") can be safely assumed to be OK. The definitions for each
flag are as follows.</p>

  <table class="common">
      <tr>
        <th> n </th>
        <th> Normal </th>
      </tr>
      <tr>
        <td> F </td>
        <td> Fail: No parameters or radial velocity determined </td>
      </tr>
      <tr>
        <td> T </td>
        <td> Temperature difference between <i>T</i><sub>eff</sub>(adopted) and IRFM <i>T</i><sub>eff</sub> is &gt; 500 K </td>
      </tr>
      <tr>
        <td> t </td>
        <td> Temperature difference between <i>T</i><sub>eff</sub>(adopted) and spectroscopic-based <i>T</i><sub>eff</sub> &gt; 500 K </td>
      </tr>
      <tr>
        <td> M </td>
        <td> Adopted [Fe/H] and spectroscopic-based [Fe/H] is &gt; 0.3 dex </td>
      </tr>
      <tr>
        <td> m </td>
        <td> Error in adopted [Fe/H] is &gt; 0.3 dex </td>
      </tr>
      <tr>
        <td> C </td>
        <td> low confidence: correlation coefficient &lt; 0.4 </td>
      </tr>
  </table>

<?php echo foot(); ?>
