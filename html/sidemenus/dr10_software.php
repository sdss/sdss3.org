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
    'Software' => 'dr10/software/',
    'Products' => 'dr10/software/products.php',
    'FITS files' => 'dr10/software/fitsfiles.php',
    'Parameter files' => 'dr10/software/par.php',
    'idlutils' => 'dr10/software/idlutils.php',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
