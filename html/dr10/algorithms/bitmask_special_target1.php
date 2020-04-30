<?php include '../../header.php'; echo head('SPECIAL_TARGET1: SDSS special program target bits'); ?>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr>
<td>APBIAS</td>
<td>0</td>
<td>aperture bias target</td>
</tr>
<tr>
<td>LOWZ_ANNIS</td>
<td>1</td>
<td>low-redshift cluster galaxy</td>
</tr>
<tr>
<td>QSO_M31</td>
<td>2</td>
<td>QSO in M31</td>
</tr>
<tr>
<td>COMMISSIONING_STAR</td>
<td>3</td>
<td>star in commissioning </td>
</tr>
<tr>
<td>DISKSTAR</td>
<td>4</td>
<td>thin/thick disk star </td>
</tr>
<tr>
<td>FSTAR</td>
<td>5</td>
<td>F-stars</td>
</tr>
<tr>
<td>HYADES_MSTAR</td>
<td>6</td>
<td>M-star in Hyades</td>
</tr>
<tr>
<td>LOWZ_GALAXY</td>
<td>7</td>
<td>low-redshift galaxy</td>
</tr>
<tr>
<td>DEEP_GALAXY_RED</td>
<td>8</td>
<td>deep LRG</td>
</tr>
<tr>
<td>DEEP_GALAXY_RED_II</td>
<td>9</td>
<td>deep LRG</td>
</tr>
<tr>
<td>BCG</td>
<td>10</td>
<td>brightest cluster galaxy</td>
</tr>
<tr>
<td>MSTURNOFF</td>
<td>11</td>
<td>main sequence turnoff</td>
</tr>
<tr>
<td>ORION_BD</td>
<td>12</td>
<td>Brown dwarf in Orion</td>
</tr>
<tr>
<td>ORION_MSTAR_EARLY</td>
<td>13</td>
<td>Early-type M-star (M0-3) in Orion</td>
</tr>
<tr>
<td>ORION_MSTAR_LATE</td>
<td>14</td>
<td>Late-type M-star (M4-) in Orion</td>
</tr>
<tr>
<td>SPECIAL_FILLER</td>
<td>15</td>
<td>filler from completeTile, check primtarget for details</td>
</tr>
<tr>
<td>PHOTOZ_GALAXY</td>
<td>16</td>
<td>test galaxy for photometric redshifts</td>
</tr>
<tr>
<td>PREBOSS_QSO</td>
<td>17</td>
<td>QSO for pre-BOSS observations</td>
</tr>
<tr>
<td>PREBOSS_LRG</td>
<td>18</td>
<td>QSO for pre-BOSS observations</td>
</tr>
<tr>
<td>PREMARVELS</td>
<td>19</td>
<td>pre-MARVELS stellar target</td>
</tr>
<tr>
<td>SOUTHERN_EXTENDED</td>
<td>20</td>
<td>simple extension of southern targets</td>
</tr>
<tr>
<td>SOUTHERN_COMPLETE</td>
<td>21</td>
<td>completion in south of main targets</td>
</tr>
<tr>
<td>U_PRIORITY</td>
<td>22</td>
<td>priority u-band target </td>
</tr>
<tr>
<td>U_EXTRA</td>
<td>23</td>
<td>extra u-band target </td>
</tr>
<tr>
<td>U_EXTRA2</td>
<td>24</td>
<td>extra u-band target </td>
</tr>
<tr>
<td>FAINT_LRG</td>
<td>25</td>
<td>faint LRG in south</td>
</tr>
<tr>
<td>FAINT_QSO</td>
<td>26</td>
<td>faint QSO in south</td>
</tr>
<tr>
<td>BENT_RADIO</td>
<td>27</td>
<td>bent double-lobed radio source</td>
</tr>
<tr>
<td>STRAIGHT_RADIO</td>
<td>28</td>
<td>straight double-lobed radio source</td>
</tr>
<tr>
<td>VARIABLE_HIPRI</td>
<td>29</td>
<td>high priority variable</td>
</tr>
<tr>
<td>VARIABLE_LOPRI</td>
<td>30</td>
<td>low priority variable</td>
</tr>
<tr>
<td>ALLPSF</td>
<td>31</td>
<td>i &lt; 19.1 point sources</td>
</tr>
<tr>
<td>ALLPSF_NONSTELLAR</td>
<td>32</td>
<td>i &lt; 19.1 point sources off stellar locus</td>
</tr>
<tr>
<td>ALLPSF_STELLAR</td>
<td>33</td>
<td>i &lt; 19.1 point sources on stellar locus</td>
</tr>
<tr>
<td>HIPM</td>
<td>34</td>
<td>high proper motion</td>
</tr>
<tr>
<td>TAURUS_STAR</td>
<td>35</td>
<td>star on Taurus or reddening plate</td>
</tr>
<tr>
<td>TAURUS_GALAXY</td>
<td>36</td>
<td>galaxy on Taurus or reddening plate</td>
</tr>
<tr>
<td>PERSEUS</td>
<td>37</td>
<td>galaxy in Perseus-Pisces</td>
</tr>
<tr>
<td>LOWZ_LOVEDAY</td>
<td>38</td>
<td>low redshift galaxy selected by Loveday</td>
</tr>
</table>

<?php echo foot(); ?>
