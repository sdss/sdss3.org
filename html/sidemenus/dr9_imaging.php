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
    'Imaging data' => 'dr9/imaging/',
    'Understanding' => 'dr9/imaging/imaging_basics.php',
    'Available data' => 'dr9/imaging/imaging_access.php',
    'Pipeline' => 'dr9/imaging/pipeline.php',
    'Image files' => 'dr9/imaging/images.php',
    'Imaging catalogs' => 'dr9/imaging/catalogs.php',
    'Image quality' => 'dr9/imaging/other_info.php',
    'Caveats!' => 'dr9/imaging/caveats.php',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
