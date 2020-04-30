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
    'Ancillary Targets' => 'dr10/algorithms/ancillary/',
    'APOGEE Ancillary' => 'dr10/algorithms/ancillary/apogee/',
    'BOSS Ancillary' => 'dr10/algorithms/ancillary/boss/',
    'Algorithms&nbsp;<img src="images/back.png" alt="Back" />' => 'dr10/algorithms/',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
