<?php include '../../header.php'; echo head('APOGEE_TARGET1: APOGEE primary target bits (Not in DR9)'); ?>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr style="color:white;">
<td>APOGEE_FAINT</td>
<td>0</td>
<td>Star selected in faint bin of cohort</td>
</tr>
<tr style="color:white;">
<td>APOGEE_MEDIUM</td>
<td>1</td>
<td>Star selected in medium bin of cohort</td>
</tr>
<tr style="color:white;">
<td>APOGEE_BRIGHT</td>
<td>2</td>
<td>Star selected in bright bin of cohort</td>
</tr>
<tr style="color:white;">
<td>APOGEE_IRAC_DERED</td>
<td>3</td>
<td>Star selected using RJCE-IRAC dereddening</td>
</tr>
<tr style="color:white;">
<td>APOGEE_WISE_DERED</td>
<td>4</td>
<td>Star selected using RJCE-WISE dereddening</td>
</tr>
<tr style="color:white;">
<td>APOGEE_SFD_DERED</td>
<td>5</td>
<td>Selected using SFD E(B-V) dereddening</td>
</tr>
<tr style="color:white;">
<td>APOGEE_NO_DERED</td>
<td>6</td>
<td>Star selected using no dereddening</td>
</tr>
<tr style="color:white;">
<td>APOGEE_WASH_GIANT</td>
<td>7</td>
<td>Selected as giant star in Washington photometry</td>
</tr>
<tr style="color:white;">
<td>APOGEE_WASH_DWARF</td>
<td>8</td>
<td>Selected as dwarf star in Washington photometry</td>
</tr>
<tr style="color:white;">
<td>APOGEE_SCI_CLUSTER</td>
<td>9</td>
<td>Probable cluster member</td>
</tr>
<tr style="color:white;">
<td>APOGEE_EXTENDED</td>
<td>10</td>
<td>Extended object</td>
</tr>
<tr style="color:white;">
<td>APOGEE_SHORT</td>
<td>11</td>
<td>Short cohort target star</td>
</tr>
<tr style="color:white;">
<td>APOGEE_INTERMEDIATE</td>
<td>12</td>
<td>Intermediate cohort target star</td>
</tr>
<tr style="color:white;">
<td>APOGEE_LONG</td>
<td>13</td>
<td>Long cohort target star</td>
</tr>
<tr style="color:white;">
<td>APOGEE_DO_NOT_OBSERVE</td>
<td>14</td>
<td>Do not observe (again)</td>
</tr>
<tr style="color:white;">
<td>APOGEE_SERENDIPITOUS</td>
<td>15</td>
<td>Serendipitously interesting target to reobserve</td>
</tr>
<tr style="color:white;">
<td>APOGEE_FIRST_LIGHT</td>
<td>16</td>
<td>First list plate target</td>
</tr>
<tr style="color:white;">
<td>APOGEE_ANCILLARY</td>
<td>17</td>
<td>An ancillary program target (particular target specified in other
bits, see below)</td>
</tr>
<tr style="color:white;">
<td>APOGEE_M31_CLUSTER</td>
<td>18</td>
<td>M31 cluster target (ancillary)</td>
</tr>
<tr style="color:white;">
<td>APOGEE_MDWARF</td>
<td>19</td>
<td>M dwarf star selected for RV program (ancillary)</td>
</tr>
<tr style="color:white;">
<td>APOGEE_HIRES</td>
<td>20</td>
<td>Star with optical hi-res spectra (ancillary)</td>
</tr>
<tr style="color:white;">
<td>APOGEE_OLD_STAR</td>
<td>21</td>
<td>Selected as old star (ancillary)</td>
</tr>
<tr style="color:white;">
<td>APOGEE_DISK_RED_GIANT</td>
<td>22</td>
<td>Disk red giant star (ancillary)</td>
</tr>
<tr style="color:white;">
<td>APOGEE_KEPLER_EB</td>
<td>23</td>
<td>Eclipsing binary star from Kepler (ancillary)</td>
</tr>
<tr style="color:white;">
<td>APOGEE_GC_PAL1</td>
<td>24</td>
<td>Star in globular cluster (ancillary)</td>
</tr>
<tr style="color:white;">
<td>APOGEE_MASSIVE_STAR</td>
<td>25</td>
<td>Selected as massive star (ancillary)</td>
</tr>
<tr style="color:white;">
<td>APOGEE_SGR_DSPH</td>
<td>26</td>
<td>Sagittarius dwarf spheroidal member star</td>
</tr>
<tr style="color:white;">
<td>APOGEE_KEPLER_SEISMO</td>
<td>27</td>
<td>Kepler astroseismology program target star</td>
</tr>
<tr style="color:white;">
<td>APOGEE_KEPLER_HOST</td>
<td>28</td>
<td>Kepler planet-host program target star</td>
</tr>
<tr style="color:white;">
<td>APOGEE_FAINT_EXTRA</td>
<td>29</td>
<td>Selected as faint target for low target-density field</td>
</tr>
<tr style="color:white;">
<td>APOGEE_SEGUE_OVERLAP</td>
<td>30</td>
<td>Selected because of overlap with SEGUE survey</td>
</tr>
<tr style="color:white;">
<td>APOGEE_CHECKED</td>
<td>31</td>
<td>This target has been checked</td>
</tr>
</table>

<?php echo foot(); ?>
