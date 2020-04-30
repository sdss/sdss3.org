<?php include '../../header.php'; echo head('BOSS_TARGET1: BOSS survey primary target selection flags'); ?>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr style="color:white;">
<td>GAL_LOZ</td>
<td>0</td>
<td>low-z lrgs</td>
</tr>
<tr style="color:white;">
<td>GAL_CMASS</td>
<td>1</td>
<td>dperp &gt; 0.55, color-mag cut </td>
</tr>
<tr style="color:white;">
<td>GAL_CMASS_COMM</td>
<td>2</td>
<td>dperp &gt; 0.55, commissioning color-mag cut</td>
</tr>
<tr style="color:white;">
<td>GAL_CMASS_SPARSE</td>
<td>3</td>
<td>GAL_CMASS_COMM &amp; (!GAL_CMASS) &amp; (i &lt; 19.9) sparsely sampled</td>
</tr>
<tr style="color:white;">
<td>GAL_LODPERP_DEPRECATED</td>
<td>5</td>
<td>(DEPRECATED) Same as hiz but between dperp00 and dperp0</td>
</tr>
<tr style="color:white;">
<td>SDSS_KNOWN</td>
<td>6</td>
<td>Matches a known SDSS spectra</td>
</tr>
<tr style="color:white;">
<td>GAL_CMASS_ALL</td>
<td>7</td>
<td>GAL_CMASS and the entire sparsely sampled region</td>
</tr>
<tr style="color:white;">
<td>GAL_IFIBER2_FAINT</td>
<td>8</td>
<td>ifiber2 &gt; 21.5, extinction corrected. Used after Nov 2010</td>
</tr>
<tr style="color:white;">
<td>QSO_CORE</td>
<td>10</td>
<td>restrictive qso selection: commissioning only</td>
</tr>
<tr style="color:white;">
<td>QSO_BONUS</td>
<td>11</td>
<td>permissive qso selection: commissioning only</td>
</tr>
<tr style="color:white;">
<td>QSO_KNOWN_MIDZ</td>
<td>12</td>
<td>known qso between [2.2,9.99]</td>
</tr>
<tr style="color:white;">
<td>QSO_KNOWN_LOHIZ</td>
<td>13</td>
<td>known qso outside of miz range. never target</td>
</tr>
<tr style="color:white;">
<td>QSO_NN</td>
<td>14</td>
<td>Neural Net that match to sweeps/pass cuts</td>
</tr>
<tr style="color:white;">
<td>QSO_UKIDSS</td>
<td>15</td>
<td>UKIDSS stars that match sweeps/pass flag cuts</td>
</tr>
<tr style="color:white;">
<td>QSO_KDE_COADD</td>
<td>16</td>
<td>kde targets from the stripe82 coadd </td>
</tr>
<tr style="color:white;">
<td>QSO_LIKE</td>
<td>17</td>
<td>likelihood method</td>
</tr>
<tr style="color:white;">
<td>QSO_FIRST_BOSS</td>
<td>18</td>
<td>FIRST radio match</td>
</tr>
<tr style="color:white;">
<td>QSO_KDE</td>
<td>19</td>
<td>selected by kde+chi2</td>
</tr>
<tr style="color:white;">
<td>STD_FSTAR</td>
<td>20</td>
<td>standard f-stars</td>
</tr>
<tr style="color:white;">
<td>STD_WD</td>
<td>21</td>
<td>white dwarfs</td>
</tr>
<tr style="color:white;">
<td>STD_QSO</td>
<td>22</td>
<td>qso</td>
</tr>
<tr style="color:white;">
<td>TEMPLATE_GAL_PHOTO</td>
<td>32</td>
<td>galaxy templates </td>
</tr>
<tr style="color:white;">
<td>TEMPLATE_QSO_SDSS1</td>
<td>33</td>
<td>QSO templates </td>
</tr>
<tr style="color:white;">
<td>TEMPLATE_STAR_PHOTO</td>
<td>34</td>
<td>stellar templates </td>
</tr>
<tr style="color:white;">
<td>TEMPLATE_STAR_SPECTRO</td>
<td>35</td>
<td>stellar templates (spectroscopically known)</td>
</tr>
<tr style="color:white;">
<td>QSO_CORE_MAIN</td>
<td>40</td>
<td>Main survey core sample</td>
</tr>
<tr style="color:white;">
<td>QSO_BONUS_MAIN</td>
<td>41</td>
<td>Main survey bonus sample</td>
</tr>
<tr style="color:white;">
<td>QSO_CORE_ED</td>
<td>42</td>
<td>Extreme Deconvolution in Core</td>
</tr>
<tr style="color:white;">
<td>QSO_CORE_LIKE</td>
<td>43</td>
<td>Likelihood that make it into core</td>
</tr>
<tr style="color:white;">
<td>QSO_KNOWN_SUPPZ</td>
<td>44</td>
<td>known qso between [1.8,2.15]</td>
</tr>
</table>
<?php echo foot(); ?>
