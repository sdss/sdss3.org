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
    'Galaxy Properties' => 'dr9/algorithms/galaxy.php',
    'MPA-JHU' => 'dr9/algorithms/galaxy_mpa_jhu.php',
    'Portsmouth' => 'dr9/algorithms/galaxy_portsmouth.php',
    'Wisconsin' => 'dr9/algorithms/galaxy_wisconsin.php',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
