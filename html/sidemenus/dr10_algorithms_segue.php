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
    'SEGUE Targets' => 'dr10/algorithms/segue_target_selection.php',
    'Accounting for Bias' => 'dr10/algorithms/segue_target_selection_weights.php',
    'Programs and Plates' => 'dr10/algorithms/segue_plate_table.php',
    'Selection Details' => 'dr10/algorithms/segue_target_selection_details.php',
    'Previous Versions' => 'dr10/algorithms/segue_previous_tselec.php',
    'SEGUE Bitmasks' => 'dr10/algorithms/segue_bit_guide.php',
    'Algorithms <img src="images/back.png" alt="Back to Algorithms" />' => 'dr10/algorithms/',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
