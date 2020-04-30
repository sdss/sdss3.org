<?php include '../../header.php'; echo head('APOGEE_ASPCAPFLAG: APOGEE ASPCAP bitmask flag '); ?>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td> TEFF_WARN</td>
<td>           0</td>
<td>WARNING on effective temperature (see PARAMFLAG[0] for details) </td>
</tr>
<tr>
<td> LOGG_WARN</td>
<td>           1</td>
<td>WARNING on log g (see PARAMFLAG[1] for details) </td>
</tr>
<tr>
<td> VMICRO_WARN</td>
<td>           2</td>
<td>WARNING on vmicro (see PARAMFLAG[2] for details) </td>
</tr>
<tr>
<td> METALS_WARN</td>
<td>           3</td>
<td>WARNING on metals (see PARAMFLAG[3] for details) </td>
</tr>
<tr>
<td> ALPHAFE_WARN</td>
<td>           4</td>
<td>WARNING on [alpha/Fe] (see PARAMFLAG[4] for details) </td>
</tr>
<tr>
<td> CFE_WARN</td>
<td>           5</td>
<td>WARNING on [C/Fe] (see PARAMFLAG[5] for details) </td>
</tr>
<tr>
<td> NFE_WARN</td>
<td>           6</td>
<td>WARNING on [N/Fe] (see PARAMFLAG[6] for details) </td>
</tr>
<tr>
<td> STAR_WARN</td>
<td>           7</td>
<td>WARNING overall for star: set if any of TEFF, LOGG, CHI2, COLORTE, ROTATION, SN warn are set </td>
</tr>
<tr>
<td> CHI2_WARN</td>
<td>           8</td>
<td>high chi^2 (> 2*median at ASPCAP temperature (WARN)</td>
</tr>
<tr>
<td> COLORTE_WARN</td>
<td>           9</td>
<td>effective temperature more than 500K from photometric temperature for dereddened color (WARN)</td>
</tr>
<tr>
<td> ROTATION_WARN</td>
<td>          10</td>
<td>Spectrum has broad lines, with possible bad effects: FWHM of cross-correlation of spectrum with best RV template relative to auto-correltion of template &gt; 1.5 (WARN)</td>
</tr>
<tr>
<td> SN_WARN</td>
<td>          11</td>
<td>S/N&lt;70 (WARN)</td>
</tr>
<tr>
<td> </td>
<td>          12</td>
<td> </td>
</tr>
<tr>
<td> </td>
<td>          13</td>
<td> </td>
</tr>
<tr>
<td> </td>
<td>          14</td>
<td> </td>
</tr>
<tr>
<td> </td>
<td>          15</td>
<td> </td>
</tr>
<tr>
<td> TEFF_BAD</td>
<td>          16</td>
<td>BAD effective temperature (see PARAMFLAG[0] for details) </td>
</tr>
<tr>
<td> LOGG_BAD</td>
<td>          17</td>
<td>BAD log g (see PARAMFLAG[1] for details) </td>
</tr>
<tr>
<td> VMICRO_BAD</td>
<td>          18</td>
<td>BAD vmicro (see PARAMFLAG[2] for details) </td>
</tr>
<tr>
<td> METALS_BAD</td>
<td>          19</td>
<td>BAD metals (see PARAMFLAG[3] for details) </td>
</tr>
<tr>
<td> ALPHAFE_BAD</td>
<td>          20</td>
<td>BAD [alpha/Fe] (see PARAMFLAG[4] for details) </td>
</tr>
<tr>
<td> CFE_BAD</td>
<td>          21</td>
<td>BAD [C/Fe] (see PARAMFLAG[5] for details) </td>
</tr>
<tr>
<td> NFE_BAD</td>
<td>          22</td>
<td>BAD [N/Fe] (see PARAMFLAG[6] for details) </td>
</tr>
<tr>
<td> STAR_BAD</td>
<td>          23</td>
<td>BAD overall for star: set if any of TEFF, LOGG, CHI2, COLORTE, ROTATION, SN error are set, or any parameter is near grid edge (GRIDEDGE_BAD is set in any PARAMFLAG) </td>
</tr>
<tr>
<td> CHI2_BAD</td>
<td>          24</td>
<td>high chi^2 (> 5*median at ASPCAP temperature (BAD)</td>
</tr>
<tr>
<td> COLORTE_BAD</td>
<td>          25</td>
<td>effective temperature more than 1000K from photometric temperature for dereddened color (BAD)</td>
</tr>
<tr>
<td> ROTATION_BAD</td>
<td>          26</td>
<td>Spectrum has broad lines, with possible bad effects: FWHM of cross-correlation of spectrum with best RV template relative to auto-correltion of template &gt; 2 (BAD)</td>
</tr>
<tr>
<td> SN_BAD</td>
<td>          27</td>
<td>S/N&lt;50 (BAD)</td>
</tr>
<tr>
<td> </td>
<td>          28</td>
<td> </td>
</tr>
<tr>
<td> </td>
<td>          29</td>
<td> </td>
</tr>
<tr>
<td> </td>
<td>          30</td>
<td> </td>
</tr>
<tr>
<td> NO_ASPCAP_RESULT</td>
<td>          31</td>
<td> </td>
</tr>
</table>

<?php echo foot(); ?>

