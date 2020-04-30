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
    'Collaboration' => 'collaboration/',
    'Institutions' => 'collaboration/institutions.php',
    'Policies' => 'collaboration/policies.php',
    'Acknowledgements[small]' => 'collaboration/boiler-plate.php',
    'External Collaborators[small]' => 'collaboration/ext_collaborator.php',
    'Image Use[small]' => 'collaboration/imageuse.php',
    'Publications[small]' => 'collaboration/publication.php',
    'Working Groups[small]' => 'collaboration/working_groups.php',
    // 'Reports' => 'collaboration/reports.php',
    'Joining the Wiki' => 'collaboration/wiki.php',
    'TRAC Wiki (Private)[small]' => 'https://trac.sdss3.org/wiki',
    // 'Your Science' => 'asfd.html',
    );
// DO NOT ALTER THE LINE IMMEDIATELY ABOVE!
?>
