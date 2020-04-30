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
    'Science Results' => 'science/',
    'Press Releases' => 'press/',
    'SDSS-III Blog' => 'http://sdss3.wordpress.com/',
    'Publications' => 'science/publications.php',
    '&nbsp;&nbsp;&nbsp;&nbsp;Data Release[small]' => 'science/dr_publications.php',
    '&nbsp;&nbsp;&nbsp;&nbsp;Technical[small]' => 'science/technical_publications.php',
    '&nbsp;&nbsp;&nbsp;&nbsp;APOGEE[small]' => 'science/apogee_publications.php',
    '&nbsp;&nbsp;&nbsp;&nbsp;BOSS[small]' => 'science/boss_publications.php',
    '&nbsp;&nbsp;&nbsp;&nbsp;MARVELS[small]' => 'science/marvels_publications.php',
    '&nbsp;&nbsp;&nbsp;&nbsp;SEGUE[small]' => 'science/segue_publications.php',
    'Image Gallery' => 'science/gallery.php',
    // 'M51[small]' => 'science/gallery_m51.php',
    // 'Galaxy Map[small]' => 'science/gallery_sdss_pie2.php',
    // 'Star Streams[small]' => 'science/gallery_fos_dr6_marked.php',
    // 'Supernovae[small]' => 'science/gallery_sn_gallery24.php',
    // 'Quasar Spectra[small]' => 'science/gallery_quasar_stack.php',
    // 'Telescope[small]' => 'science/gallery_telescope.php',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
