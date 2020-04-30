<?php include '../header.php'; echo head('MARVELS Publications and Results'); ?>

<h2 id="scilit">MARVELS Science Papers</h2>

<table class="common">
<tr>
    <th>Title</th>
    <th>First Author</th>
    <th>Journal</th>
</tr>
<?php
include './bib.php';
$pubs = array(
    '2014AJ....148..105G',
    '2013AJ....146...65J',
    '2013ApJ...770..119W',
    '2013AJ....145..155D',
    '2013AJ....145..139M',
    '2013AJ....145...20M',
    '2012AJ....144...72F',
    '2012AJ....143..107W',
    '2011ApJ...728...32L',
    );
foreach ($pubs as $p) {
    $bibtex = new BibTeX($p);
    echo '<tr>'.PHP_EOL;
    echo '    <td class="ref">'.$bibtex->title.'</td>'.PHP_EOL;
    echo '    <td class="ref">'.$bibtex->first_author().'</td>'.PHP_EOL;
    echo '    <td><a href="'.$bibtex->adsurl.'">'.$p.'</a></td>'.PHP_EOL;
    echo '</tr>'.PHP_EOL;
}
?>
</table>

<?php echo foot(); ?>
