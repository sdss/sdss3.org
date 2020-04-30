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
    'APOGEE' => 'dr10/irspec/',
    'Survey overview' => 'dr10/irspec/spectro_basics.php',
    'Available data' => 'dr10/irspec/spectro_data.php',
    'Catalogs/examples' => 'dr10/irspec/catalogs.php',	
    'Using spectra' => 'dr10/irspec/spectra.php',
    'Using parameters' => 'dr10/irspec/parameters.php',	
    'Target info' => 'dr10/irspec/targets.php',
    'Visit reduction ' => 'dr10/irspec/apred.php',
    'Visit combination' => 'dr10/irspec/spectral_combination.php',	
    'Radial Velocities' => 'dr10/irspec/radialvelocities.php',	
    'ASPCAP' => 'dr10/irspec/aspcap.php',	
    'Bitmasks' => 'dr10/algorithms/bitmasks.php',	
    '&nbsp;&nbsp;TARGET1[small]' => 'dr10/algorithms/bitmask_apogee_target1.php',	
    '&nbsp;&nbsp;TARGET2[small]' => 'dr10/algorithms/bitmask_apogee_target2.php',	
    '&nbsp;&nbsp;PIXMASK[small]' => 'dr10/algorithms/bitmask_apogee_pixmask.php',	
    '&nbsp;&nbsp;STARFLAG[small]' => 'dr10/algorithms/bitmask_apogee_starflag.php',	
    '&nbsp;&nbsp;ASPCAPFLAG[small]' => 'dr10/algorithms/bitmask_apogee_aspcapflag.php',	
    '&nbsp;&nbsp;PARAMFLAG[small]' => 'dr10/algorithms/bitmask_apogee_paramflag.php',	
    'Caveats' => 'dr10/irspec/caveats.php',	
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
