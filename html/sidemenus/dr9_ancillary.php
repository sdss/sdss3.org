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
// DO NOT ALTER THE LINE IMMEDIATELY BELOW!
$sidemenu = array(
    'Ancillary Targets' => 'dr9/algorithms/ancillary/',
    'Transient Universe in Stripe 82' => 'dr9/algorithms/ancillary/transient82.php',
	'Host Galaxies of SDSS-II SNe' => 'dr9/algorithms/ancillary/supernovahosts.php',
	'BCGs in<br />Stripe 82' => 'dr9/algorithms/ancillary/bcg82.php',
	'High-Quality LRG spectra' => 'dr9/algorithms/ancillary/hiqlrg.php',
	'Reddened<br />Quasars' => 'dr9/algorithms/ancillary/redqso.php',
	'No Quasar Left Behind' => 'dr9/algorithms/ancillary/noqso.php',
	'Variability-Selected Quasars' => 'dr9/algorithms/ancillary/varqso.php',
	'K-band Selected Quasars' => 'dr9/algorithms/ancillary/kbandqso.php',
	'Low-Mass Stars and Brown Dwarfs' => 'dr9/algorithms/ancillary/lowmass.php',
	'Low-Mass Binary Stars' => 'dr9/algorithms/ancillary/lowmassbinary.php',	
	'White Dwarfs and Hot Subdwarfs' => 'dr9/algorithms/ancillary/whitedwarfs.php',		
	'Distant Halo<br />Giants' => 'dr9/algorithms/ancillary/distanthalogiants.php',	
	'Bright<br/>Galaxies' => 'dr9/algorithms/ancillary/brightgal.php',	
	'High-Energy Blazars in Optical' => 'dr9/algorithms/ancillary/heblazars.php',
	'An X-Ray View Star Formation' => 'dr9/algorithms/ancillary/xrayview.php',
	'Remarkable X-Ray Sources' => 'dr9/algorithms/ancillary/remarkxray.php',
	'Star-Forming Radio Galaxies' => 'dr9/algorithms/ancillary/starformradgal.php',
	'Galaxies Near QSO Sight Lines' => 'dr9/algorithms/ancillary/qsosight.php',
	'Luminous Blue Galaxies' => 'dr9/algorithms/ancillary/luminousblue.php',
	'BAL Quasar Variability' => 'dr9/algorithms/ancillary/balvarqso.php',
	'Variable QSO Absorption' => 'dr9/algorithms/ancillary/varqsoabsorb.php',		
	'Double-Lobed Radio QSOs' => 'dr9/algorithms/ancillary/doublelobed.php',						
	'High-Redshift Quasars' => 'dr9/algorithms/ancillary/highz.php',					
	'High-z QSOs in SDSS/UKIDSS' =>'dr9/algorithms/ancillary/ukidss.php',					
    'BOSS Targeting<img src="images/back.png" alt="Back" />' => 'dr9/algorithms/boss_target_selection.php',
    'Algorithms<img src="images/back.png" alt="Back" /><img src="images/back.png" alt="Back" />' => 'dr9/algorithms/',	
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
