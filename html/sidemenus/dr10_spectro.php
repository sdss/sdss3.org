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
    'Spectroscopic Data' => 'dr10/spectro/',
    'Understanding' => 'dr10/spectro/spectro_basics.php',
    'Pipeline' => 'dr10/spectro/pipeline.php',
    'Available data' => 'dr10/spectro/spectro_access.php',
    'Target flags' => 'dr10/spectro/targets.php',
    'Catalogs' => 'dr10/spectro/catalogs.php',
    'Galaxy Products' => 'dr10/spectro/galaxy.php',
    'Special Plates' => 'dr10/spectro/special_plates.php',
    'Stars (SSPP)' => 'dr10/spectro/sspp.php',
    'Caveats!' => 'dr10/spectro/caveats.php',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
