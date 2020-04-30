<?php
//
// The sidemenu is specified by an array variable.  The keys
// of the array are the names of the link (enclosed in <a></a>)
// and the values of the array are the URLs (the href value).
// For example, an array item of the form
//
//     'Key' => 'value.php',
//
// would produce
//
//     <a href="value.php">Key</a>
//
// If the string '[small]' is appended to the key name, the link will
// be printed with a smaller font. For example
//
//     'Key[small]' => 'value.php',
//
// would produce
//
//     <span style="font-size:smaller;"><a href="value.php">Key</a></span>
//
// If the name of the link is particularly long, it won't look good in the
// sidemenu.  Instead, you can use a shorter key and a longer title that will
// appear when someone hovers over the link.  For example
//
//     'Key|This is a much longer title for this key.' => 'value.php',
//
// would produce
//
//     <a href="value.php" title="This is a much longer title for this key.">Key</a>
//
// DO NOT ALTER THE LINE IMMEDIATELY BELOW!
$sidemenu = array(
    'BOSS Ancillary|BOSS Ancillary Targets' => 'dr10/algorithms/ancillary/boss/',
    'Stripe 82 Transients|Transient Universe in Stripe 82' => 'dr10/algorithms/ancillary/boss/transient82.php',
    'SNe Hosts|Host Galaxies of SDSS-II Supernovae' => 'dr10/algorithms/ancillary/boss/supernovahosts.php',
    'BCGs in Stripe 82|Brightest Cluster Galaxies in SDSS Stripe 82' => 'dr10/algorithms/ancillary/boss/bcg82.php',
    'High-SN LRGs|High-Quality LRG spectra' => 'dr10/algorithms/ancillary/boss/hiqlrg.php',
    'Reddened Quasars|Reddened Quasars' => 'dr10/algorithms/ancillary/boss/redqso.php',
    'NQLB|No Quasar Left Behind' => 'dr10/algorithms/ancillary/boss/noqso.php',
    'Variable QSOs|Variability-Selected Quasars' => 'dr10/algorithms/ancillary/boss/varqso.php',
    'K-band QSOs|K-band Selected Sample of Quasars' => 'dr10/algorithms/ancillary/boss/kbandqso.php',
    'Low-Mass Stars|Very Low-Mass Stars and Brown Dwarfs' => 'dr10/algorithms/ancillary/boss/lowmass.php',
    'Low-Mass Binaries|Low-Mass Binary Stars' => 'dr10/algorithms/ancillary/boss/lowmassbinary.php',
    'White Dwarfs|White Dwarfs and Hot Subdwarfs' => 'dr10/algorithms/ancillary/boss/whitedwarfs.php',
    'Distant Halo Giants|Distant Halo Giants' => 'dr10/algorithms/ancillary/boss/distanthalogiants.php',
    'Bright Galaxies|Bright Galaxies' => 'dr10/algorithms/ancillary/boss/brightgal.php',
    'Optical Blazars|High-Energy Blazars and Optical Counterparts of Gammay-ray Sources' => 'dr10/algorithms/ancillary/boss/heblazars.php',
    'X-Ray Galaxies|An X-Ray View Star Formation and Accretion in Normal Galaxies' => 'dr10/algorithms/ancillary/boss/xrayview.php',
    'X-Ray Sources|Remarkable X-Ray Source Populations' => 'dr10/algorithms/ancillary/boss/remarkxray.php',
    'Radio Galaxies|Star-Forming Radio Galaxies' => 'dr10/algorithms/ancillary/boss/starformradgal.php',
    'Galaxies near QSOs|Galaxies Near SDSS Quasar Sight Lines' => 'dr10/algorithms/ancillary/boss/qsosight.php',
    'LBGs|Luminous Blue Galaxies' => 'dr10/algorithms/ancillary/boss/luminousblue.php',
    'BAL QSO Variability|Broad Absorption Line (BAL) Quasar Variability Survey' => 'dr10/algorithms/ancillary/boss/balvarqso.php',
    'Narrow-line QSOs|Variable Quasars with Narrow-line Absorption' => 'dr10/algorithms/ancillary/boss/varqsoabsorb.php',
    'Double-Lobed QSOs|Double-Lobed Radio Quasars' => 'dr10/algorithms/ancillary/boss/doublelobed.php',
    'High-z QSOs|High-Redshift Quasars' => 'dr10/algorithms/ancillary/boss/highz.php',
    'UKIDSS QSOs|High-Redshift Quasars from SDSS and UKIDSS' =>'dr10/algorithms/ancillary/boss/ukidss.php',
    'BOSS Targeting&nbsp;<img src="images/back.png" alt="Back" />|BOSS Targeting' => 'dr10/algorithms/boss_target_selection.php',
    'Ancillary Targets&nbsp;<img src="images/back.png" alt="Back" />|Ancillary Targets' => 'dr10/algorithms/ancillary/',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
