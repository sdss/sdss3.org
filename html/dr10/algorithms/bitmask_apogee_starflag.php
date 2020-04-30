<?php include '../../header.php'; echo head('APOGEE_STARFLAG: APOGEE star level bitmask flag '); ?>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td> BAD_PIXELS</td>
<td>           0</td>
<td>Spectrum has many bad pixels (>40%):  BAD</td>
</tr>
<tr>
<td> COMMISSIONING</td>
<td>           1</td>
<td>Commissioning data (MJD&lt;55761), non-standard configuration, poor LSF: WARN</td>
</tr>
<tr>
<td> BRIGHT_NEIGHBOR</td>
<td>           2</td>
<td>Star has neighbor more than 10 times brighter: WARN</td>
</tr>
<tr>
<td> VERY_BRIGHT_NEIGHBOR</td>
<td>           3</td>
<td>Star has neighbor more than 100 times brighter: BAD</td>
</tr>
<tr>
<td> LOW_SNR</td>
<td>           4</td>
<td>Spectrum has low S/N (S/N&lt;5): BAD</td>
</tr>
<tr>
<td> </td>
<td>           5</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>           6</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>           7</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>           8</td>
<td></td>
</tr>
<tr>
<td> PERSIST_HIGH</td>
<td>           9</td>
<td>Spectrum has significant number (>20%) of pixels in high persistence region: WARN</td>
</tr>
<tr>
<td> PERSIST_MED</td>
<td>          10</td>
<td>Spectrum has significant number (>20%) of pixels in medium persistence region: WARN</td>
</tr>
<tr>
<td> PERSIST_LOW</td>
<td>          11</td>
<td>Spectrum has significant number (>20%) of pixels in low persistence region: WARN</td>
</tr>
<tr>
<td> PERSIST_JUMP_POS</td>
<td>          12</td>
<td>Spectrum show obvious positive jump in blue chip: WARN</td>
</tr>
<tr>
<td> PERSIST_JUMP_NEG</td>
<td>          13</td>
<td>Spectrum show obvious negative jump in blue chip: WARN</td>
</tr>
<tr>
<td> </td>
<td>          14</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>          15</td>
<td></td>
</tr>
<tr>
<td> SUSPECT_RV_COMBINATION</td>
<td>          16</td>
<td>WARNING: RVs from synthetic template differ significantly from those from combined template</td>
</tr>
<tr>
<td> SUSPECT_BROAD_LINES</td>
<td>          17</td>
<td>WARNING: cross-correlation peak with template significantly broader than autocorrelation of template</td>
</tr>
<tr>
<td> </td>
<td>          18</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>          19</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>          20</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>          21</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>          22</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>          23</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>          24</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>          25</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>          26</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>          27</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>          28</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>          29</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>          30</td>
<td></td>
</tr>
<tr>
<td> </td>
<td>          31</td>
<td></td>
</tr>
</table>

<?php echo foot(); ?>

