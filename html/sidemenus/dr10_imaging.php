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
    'Imaging data' => 'dr10/imaging/',
    'Understanding' => 'dr10/imaging/imaging_basics.php',
    'Available data' => 'dr10/imaging/imaging_access.php',
    'Pipeline' => 'dr10/imaging/pipeline.php',
    'Image files' => 'dr10/imaging/images.php',
    'Imaging catalogs' => 'dr10/imaging/catalogs.php',
    'Image quality' => 'dr10/imaging/other_info.php',
    'Caveats!' => 'dr10/imaging/caveats.php',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
