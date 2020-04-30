<?php include '../header.php'; echo head('SEGUE Publications and Results'); ?>

<p>Scientific publications based on SEGUE data or SDSS stellar imaging are listed below. Papers based on
general SDSS data are listed <a href="science/publications.php">here</a>. </p>

<h2 id="bkgdlit">SEGUE Background Papers</h2>
<ul>
<li><a href="http://adsabs.harvard.edu/abs/2009AJ....137.4377Y">SEGUE-1 Overview Paper (Yanny et al. 2009)</a> </li>
<li><a>SEGUE-2 Overview Paper (In Progress)</a></li>
<li>The SEGUE Stellar Parameter Pipeline
    <ul>
        <li><a href="http://adsabs.harvard.edu/abs/2008AJ....136.2022L">Paper I. Description and Comparison of Individual Methods</a></li>
        <li><a href="http://adsabs.harvard.edu/abs/2008AJ....136.2050L">Paper II. Validation with Galactic Globular and Open Clusters</a></li>
        <li><a href="http://adsabs.harvard.edu/abs/2008AJ....136.2070A">Paper III. Comparison with High-Resolution Spectroscopy of SDSS/SEGUE Field Stars</a></li>
        <li><a href="http://adsabs.harvard.edu/abs/2011AJ....141...89S">Paper IV. Validation with an Extended Sample of Galactic Globular and Open Clusters </a></li>
        <li><a href="http://adsabs.harvard.edu/abs/2011AJ....141...90L">Paper V. Estimation of Alpha-Element Abundance Ratios from Low-Resolution SDSS/SEGUE Stellar Spectra</a></li>
    </ul>
</li>
</ul>


<h2 id="scilit">SEGUE Science Papers</h2>

<table class="common">
<tr>
    <th>Title</th>
    <th>First Author</th>
    <th>Journal</th>
</tr>
<?php
include './bib.php';
$pubs = array(
    '2012ApJ...752...51C',
    '2012ApJ...755..115B',
    '2012ApJ...751..131B',
    '2012ApJ...753..148B',
    '2012MNRAS.420.1281S',
    '2012ApJ...746..149C',
    '2012MNRAS.419..806R',
    '2012ApJ...749...77S',
    '2012MNRAS.423.3727G',
    '2012MNRAS.425.2144L',
    '2012ASPC..461..573S',
    '2012ApJ...761..160S',
    '2011A&A...534A.136M',
    '2011AJ....142..126S',
    '2011RAA....11..924W',
    '2011ApJ...738..187L',
    '2011ApJ...734...49S',
    '2011ApJ...737..103S',
    '2011MNRAS.410.1113C',
    '2011MNRAS.411.1480D',
    '2011ApJ...733...46S',
    '2011AN....332..597S',
    '2011A&A...526A..39G',
    '2011A&A...525A.157H',
    '2011A&A...525A.123S',
    '2011A&A...525A.114L',
    '2011MNRAS.415.3807S',
    '2011ApJ...738...79X',
    '2011AJ....141...90L',
    '2011AJ....141...89S',
    '2010ApJ...725L.186D',
    '2010ApJ...725.1215S',
    '2010ApJ...716....1B',
    '2010A&A...524A..86S',
    '2010ApJ...723L.201A',
    '2010ApJ...723..812K',
    '2010AJ....140.1428C',
    '2010A&A...520A..86Z',
    '2010A&A...519A..14M',
    '2010ApJ...719..996S',
    '2010ApJ...719..240F',
    '2010AN....331..807Y',
    '2010AJ....140..500C',
    '2010ApJ...716....1B',
    '2010ApJ...714..663D',
    '2010ApJ...712..692C',
    '2010ApJ...711...32N',
    '2010AJ....139.1261M',
    '2010ApJ...722L.104N',
    '2010ApJ...723.1632N',
    '2009ApJ...707L..64A',
    '2009ApJ...703.2177S',
    '2009MNRAS.399.1223S',
    '2009MNRAS.397.1748B',
    '2009ApJ...700L..61N',
    '2009ApJ...700.1282Y',
    '2009ApJ...700..523A',
    '2009ApJ...698.1110S',
    '2009ApJ...698..865K',
    '2009ApJ...697.1543K',
    '2009ApJ...697L..63L',
    '2009ApJ...697..207W',
    '2009ApJS..182..543A',
    '2009AJ....137.4377Y',
    '2009AJ....137.4149F',
    '2008ApJS..179..326A',
    '2008ApJS..175..297A',
    '2008AJ....136.2070A',
    '2008AJ....136.2050L',
    '2008AJ....136.2022L',
    '2008ApJ...684..287I',
    '2008ApJ...684.1143X',
    '2008ApJ...680..295B',
    '2008ApJ...673..864J',
    '2008ApJ...678.1351A',
    '2007ApJS..172..634A',
    '2007ApJ...668..221N',
    '2007AJ....134.1579K',
    '2007ASPC..372..459S',
    '2007A&A...467.1373R',
    '2007ApJ...657L..89B',
    '2007ApJ...654..897B',
    '2007AJ....134..973I',
    '2007AJ....133.1409F',
    '2007ASPC..364..165I',
    '2007MNRAS.375.1171F',
    '2006ApJ...650L..41Z',
    '2006ApJ...647L.111B',
    '2006ApJ...642L.137B',
    '2006ApJ...643L.103Z',
    '2006ApJ...636..804A',
    '2005ApJ...626..128P',
    '2005AJ....129.2692W',
    '2004AJ....127.2210R',
    );
foreach ($pubs as $p) {
    $pamp = preg_replace('/A&A/','A&amp;A',$p);
    $bibtex = new BibTeX($p);
    echo '<tr>'.PHP_EOL;
    echo '    <td class="ref">'.$bibtex->title.'</td>'.PHP_EOL;
    echo '    <td class="ref">'.$bibtex->first_author().'</td>'.PHP_EOL;
    echo '    <td><a href="'.$bibtex->adsurl.'">'.$pamp.'</a></td>'.PHP_EOL;
    echo '</tr>'.PHP_EOL;
}
?>
</table>

<?php echo foot(); ?>
