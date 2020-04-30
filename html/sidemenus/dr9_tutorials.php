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
    'Tutorials' => 'dr9/tutorials/',
    'Getting Started' => 'dr9/tutorials/gettingstarted.php',
    'Preview an Object' => 'dr9/tutorials/getimage.php',
	'Finding Chart' => 'dr9/tutorials/finding.php',
	'Clean Photometry' => 'dr9/tutorials/flags.php',
	'Proper Motions' => 'dr9/tutorials/flagspropermotion.php',
	'Get FITS images' => 'dr9/tutorials/retrieveFITS.php',
	'Preview a Spectrum' => 'dr9/tutorials/getspec.php',
	'Get spectra in bulk' => 'dr9/tutorials/allspectra.php',
	'Search by Position' => 'dr9/tutorials/getdata.php',
	'Cross-match objects' => 'dr9/tutorials/crossid.php',
	'Get random subset' => 'dr9/tutorials/random.php',
	'Find close pairs' => 'dr9/tutorials/pairs.php',
	'Spectra by color' => 'dr9/tutorials/colorconstraints.php',
    'Working with SEGUE' => 'dr9/tutorials/segue_getting_started.php',
   //'LSS Galaxy Catalog' => 'dr9/tutorials/lss_galaxy.php',
    'Help <img src="images/back.png" alt="Back to Help section" />' => 'dr9/help/',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
