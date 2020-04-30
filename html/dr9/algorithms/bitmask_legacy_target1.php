<?php include '../../header.php'; echo head('Primary target mask bits in SDSS-I, -II (for LEGACY_TARGET1 or PRIMTARGET).'); ?>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td>QSO_HIZ</td>
<td>0</td>
<td>High-redshift (griz) QSO target</td>
</tr>
<tr>
<td>QSO_CAP</td>
<td>1</td>
<td>ugri-selected quasar at high Galactic latitude</td>
</tr>
<tr>
<td>QSO_SKIRT</td>
<td>2</td>
<td>ugri-selected quasar at low Galactic latitude</td>
</tr>
<tr>
<td>QSO_FIRST_CAP</td>
<td>3</td>
<td>FIRST source with stellar colors at high Galactic latitude</td>
</tr>
<tr>
<td>QSO_FIRST_SKIRT</td>
<td>4</td>
<td>FIRST source with stellar colors at low Galactic latitude</td>
</tr>
<tr>
<td>GALAXY_RED</td>
<td>5</td>
<td>Luminous Red Galaxy target (any criteria)</td>
</tr>
<tr>
<td>GALAXY</td>
<td>6</td>
<td>Main sample galaxy</td>
</tr>
<tr>
<td>GALAXY_BIG</td>
<td>7</td>
<td>Low-surface brightness main sample galaxy (mu50>23 in r-band)</td>
</tr>
<tr>
<td>GALAXY_BRIGHT_CORE</td>
<td>8</td>
<td>Galaxy targets who fail all the surface brightness selection limits but have r-band fiber magnitudes brighter than 19</td>
</tr>
<tr>
<td>ROSAT_A</td>
<td>9</td>
<td>ROSAT All-Sky Survey match, also a radio source</td>
</tr>
<tr>
<td>ROSAT_B</td>
<td>10</td>
<td>ROSAT All-Sky Survey match, have SDSS colors of AGNs or quasars</td>
</tr>
<tr>
<td>ROSAT_C</td>
<td>11</td>
<td>ROSAT All-Sky Survey match, fall in a broad intermediate category that includes stars that are bright, moderately blue, or both</td>
</tr>
<tr>
<td>ROSAT_D</td>
<td>12</td>
<td>ROSAT All-Sky Survey match, are otherwise bright enough for SDSS spectroscopy</td>
</tr>
<tr>
<td>STAR_BHB</td>
<td>13</td>
<td>blue horizontal-branch stars</td>
</tr>
<tr>
<td>STAR_CARBON</td>
<td>14</td>
<td>dwarf and giant carbon stars</td>
</tr>
<tr>
<td>STAR_BROWN_DWARF</td>
<td>15</td>
<td>brown dwarfs (note this sample is tiled)</td>
</tr>
<tr>
<td>STAR_SUB_DWARF</td>
<td>16</td>
<td>low-luminosity subdwarfs</td>
</tr>
<tr>
<td>STAR_CATY_VAR</td>
<td>17</td>
<td>cataclysmic variables</td>
</tr>
<tr>
<td>STAR_RED_DWARF</td>
<td>18</td>
<td>red dwarfs</td>
</tr>
<tr>
<td>STAR_WHITE_DWARF</td>
<td>19</td>
<td>hot white dwarfs</td>
</tr>
<tr>
<td>SERENDIP_BLUE</td>
<td>20</td>
<td>lying outside the stellar locus in color space</td>
</tr>
<tr>
<td>SERENDIP_FIRST</td>
<td>21</td>
<td>coincident with FIRST sources but fainter than the equivalent in quasar target selection (also includes non-PSF sources</td>
</tr>
<tr>
<td>SERENDIP_RED</td>
<td>22</td>
<td>lying outside the stellar locus in color space</td>
</tr>
<tr>
<td>SERENDIP_DISTANT</td>
<td>23</td>
<td>lying outside the stellar locus in color space</td>
</tr>
<tr>
<td>SERENDIP_MANUAL</td>
<td>24</td>
<td>manual serendipity flag</td>
</tr>
<tr>
<td>QSO_MAG_OUTLIER</td>
<td>25</td>
<td>Stellar outlier; too faint or too bright to be targeted</td>
</tr>
<tr>
<td>GALAXY_RED_II</td>
<td>26</td>
<td>Luminous Red Galaxy target (Cut II criteria)</td>
</tr>
<tr>
<td>ROSAT_E</td>
<td>27</td>
<td>ROSAT All-Sky Survey match, but too faint or too bright for SDSS spectroscopy</td>
</tr>
<tr>
<td>STAR_PN</td>
<td>28</td>
<td>central stars of planetary nebulae</td>
</tr>
<tr>
<td>QSO_REJECT</td>
<td>29</td>
<td>Object in explicitly excluded region of color space, therefore not targeted at QSO</td>
</tr>
<tr>
<td>SOUTHERN_SURVEY</td>
<td>31</td>
<td>Set in primtarget if this is a special program target</td>
</tr>
</table>

<?php echo foot(); ?>
