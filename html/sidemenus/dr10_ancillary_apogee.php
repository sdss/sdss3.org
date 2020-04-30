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
    'APOGEE Ancillary|APOGEE Ancillary Targets' => 'dr10/algorithms/ancillary/apogee/',
    'M31 Clusters|Globular Clusters in M31' => 'dr10/algorithms/ancillary/apogee/M31_clusters.php',
    'Red Giant Ages|Ages of Red Giants in the Kepler and CoRoT Fields' => 'dr10/algorithms/ancillary/apogee/RG_ages.php',
    'Eclipsing Binaries|Eclipsing Binaries' => 'dr10/algorithms/ancillary/apogee/Eclipsing_Binaries.php',
    'The Cluster Palomar 1|The Cluster Palomar 1' => 'dr10/algorithms/ancillary/apogee/Pal1.php',
    'Optical Calibrator Stars|Optical Calibrator Stars' => 'dr10/algorithms/ancillary/apogee/optical_stars.php',
    'Massive Stars|Massive Stars' => 'dr10/algorithms/ancillary/apogee/massive_stars.php',
    'APOGEE Targeting&nbsp;<img src="images/back.png" alt="Back" />|APOGEE Targeting' => 'dr10/irspec/targets.php',
    'Ancillary Targets&nbsp;<img src="images/back.png" alt="Back" />|Ancillary Targets' => 'dr10/algorithms/ancillary/',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
