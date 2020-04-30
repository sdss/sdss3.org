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
    'Overview' => 'dr10/data_access/',
    'Available Tools' => 'dr10/data_access/tools.php',
    'Value Added Catalogs' => 'dr10/data_access/vac.php',
    'SDSS Supernovae' => 'dr10/data_access/supernovae.php',
    'Bulk Downloads' => 'dr10/data_access/bulk.php',
    'Data Volume' => 'dr10/data_access/volume.php',
    'System Status' => 'dr10/data_access/status.php',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
