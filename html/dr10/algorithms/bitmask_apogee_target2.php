<?php include '../../header.php'; echo head('APOGEE_TARGET2: 2/2 APOGEE target bits (New for DR10)'); ?>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<!-- 
<tr style="color:white;">
<td>LIGHT_TRAP</td>
<td>0</td>
<td>Light trap</td>
</tr>
 -->
<tr style="color:white;">
<td>---</td>
<td>0</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>APOGEE_FLUX_STANDARD</td>
<td>1</td>
<td>Flux standard</td>
</tr>
<tr style="color:white;">
<td>APOGEE_STANDARD_STAR</td>
<td>2</td>
<td>Stellar abundance and/or parameters standard</td>
</tr>
<tr style="color:white;">
<td>APOGEE_RV_STANDARD</td>
<td>3</td>
<td>Stellar radial velocity standard</td>
</tr>
<tr style="color:white;">
<td>SKY</td>
<td>4</td>
<td>Blank sky position</td>
</tr>
<!-- 
<tr style="color:white;">
<td>SKY_BAD</td>
<td>5</td>
<td>Selected as "sky" but identified as bad (via visual exam or observation)</td>
</tr>
 -->
<tr style="color:white;">
<td>---</td>
<td>5</td>
<td>---</td>
</tr>
<!-- 
<tr style="color:white;">
<td>GUIDE_STAR</td>
<td>6</td>
<td>Guide star</td>
</tr>
 -->
<tr style="color:white;">
<td>---</td>
<td>6</td>
<td>---</td>
</tr>
<!-- 
<tr style="color:white;">
<td>BUNDLE_HOLE</td>
<td>7</td>
<td>Bundle hole</td>
</tr>
 -->
<tr style="color:white;">
<td>---</td>
<td>7</td>
<td>---</td>
</tr>
<!-- 
<tr style="color:white;">
<td>APOGEE_TELLURIC_BAD</td>
<td>8</td>
<td>Star selected as telluric standard but identified as bad (via SIMBAD or observation)</td>
</tr>
 -->
<tr style="color:white;">
<td>---</td>
<td>8</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>APOGEE_TELLURIC</td>
<td>9</td>
<td>Hot (telluric) standard star</td>
</tr>
<tr style="color:white;">
<td>APOGEE_CALIB_CLUSTER</td>
<td>10</td>
<td>Known calibration cluster member star</td>
</tr>
<tr style="color:white;">
<td>APOGEE_BULGE_GIANT</td>
<td>11</td>
<td>Probable giant star in Galactic bulge</td>
</tr>
<tr style="color:white;">
<td>APOGEE_BULGE_SUPER_GIANT</td>
<td>12</td>
<td>Probable supergiant star in Galactic bulge</td>
</tr>
<tr style="color:white;">
<td>APOGEE_EMBEDDEDCLUSTER_STAR</td>
<td>13</td>
<td>Young embedded cluster member (ancillary)</td>
</tr>
<tr style="color:white;">
<td>APOGEE_LONGBAR</td>
<td>14</td>
<td>Probable RC star in long bar (ancillary)</td>
</tr>
<tr style="color:white;">
<td>APOGEE_EMISSION_STAR</td>
<td>15</td>
<td>Emission-line star (ancillary)</td>
</tr>
<tr style="color:white;">
<td>APOGEE_KEPLER_COOLDWARF</td>
<td>16</td>
<td>Kepler cool dwarf or subgiant (ancillary)</td>
</tr>
<tr style="color:white;">
<td>APOGEE_MIRCLUSTER_STAR</td>
<td>17</td>
<td>MIR-detected candidate cluster member (ancillary)</td>
</tr>
<tr style="color:white;">
<td>---</td>
<td>18</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>---</td>
<td>19</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>---</td>
<td>20</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>---</td>
<td>21</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>---</td>
<td>22</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>---</td>
<td>23</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>---</td>
<td>24</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>---</td>
<td>25</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>---</td>
<td>26</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>---</td>
<td>27</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>---</td>
<td>28</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>---</td>
<td>29</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>---</td>
<td>30</td>
<td>---</td>
</tr>
<tr style="color:white;">
<td>APOGEE_CHECKED</td>
<td>31</td>
<td>This object was checked for APOGEE target selection.</td>
</tr>
</table>

<?php echo foot(); ?>
