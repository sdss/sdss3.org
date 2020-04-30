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
    'Spectroscopic Data' => 'dr9/spectro/',
    'Understanding' => 'dr9/spectro/spectro_basics.php',
    'Pipeline' => 'dr9/spectro/pipeline.php',
    'Available data' => 'dr9/spectro/spectro_access.php',
    'Target flags' => 'dr9/spectro/targets.php',
    'Catalogs' => 'dr9/spectro/catalogs.php',
    'Galaxy Products' => 'dr9/spectro/galaxy.php',
    'Stars (SSPP)' => 'dr9/spectro/sspp.php',
    'SEGUE cookbook' => 'dr9/tutorials/segue_sqlcookbook.php',
    'Caveats!' => 'dr9/spectro/caveats.php',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
