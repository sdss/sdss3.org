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
    'Tutorials' => 'dr10/tutorials/',
    'Getting Started' => 'dr10/tutorials/gettingstarted.php',
    'Quick Look' => 'dr10/tutorials/quicklook.php',
    'Get an Image' => 'dr10/tutorials/getimage.php',
    'Get a Spectrum' => 'dr10/tutorials/getspec.php',
		'Clean Photometry' => 'dr10/tutorials/flags.php',
		'Finding Chart' => 'dr10/tutorials/finding.php',
		'Search by Position' => 'dr10/tutorials/getdata.php',
		'Image Search' => 'dr10/tutorials/searchimage.php',
		'Supernovae' => 'dr10/tutorials/getsupernova.php',
		'Cross-match objects' => 'dr10/tutorials/crossid.php',
		'Get random subset' => 'dr10/tutorials/random.php',
		'Find close pairs' => 'dr10/tutorials/pairs.php',
		'Spectra by color' => 'dr10/tutorials/colorconstraints.php',
		'Spectra in bulk' => 'dr10/tutorials/allspectra.php',
		'Stripe 82 Images' => 'dr10/tutorials/get_stripe82_images.php',
		'Get FITS images' => 'dr10/tutorials/retrieveFITS.php',
		'Reading par files' => 'dr10/software/par.php',
        'Spectrum files in IRAF' => 'dr10/tutorials/iraf.php',
		'Reading atlas images' => 'dr10/imaging/images.php#atlas',
		'Reading PSF images' => 'dr10/algorithms/read_psf.php',
		'APOGEE Examples' => 'dr10/irspec/catalogs.php',
		'SEGUE Basics' => 'dr10/tutorials/segue_getting_started.php',
		'SEGUE SQL Cookbook' => 'dr10/tutorials/segue_sqlcookbook.php',
		//'LSS Galaxy Catalog' => 'dr10/tutorials/lss_galaxy.php',
    'Help <img src="images/back.png" alt="Back to Help section" />' => 'dr10/help/',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
