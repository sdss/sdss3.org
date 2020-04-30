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
    'Spectro data' => 'dr8/spectro/',
    'Basics' => 'dr8/spectro/spectro_basics.php',
    'Pipeline' => 'dr8/spectro/pipeline.php',
    'Data Access' => 'dr8/spectro/spectro_access.php',
    'Target flags' => 'dr8/spectro/targets.php',
    'Spectra' => 'dr8/spectro/spectra.php',
    'Catalogs' => 'dr8/spectro/catalogs.php',
    'Galaxies' => 'dr8/spectro/galspec.php',
    'Stars (SSPP)' => 'dr8/spectro/sspp.php',
    'SEGUE cookbook' => 'dr8/algorithms/segueii/segue_sqlcookbook.php',
    'Caveats!' => 'dr8/spectro/caveats.php',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
