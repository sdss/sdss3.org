<?php include '../header.php'; echo head('SDSS Data Release Publications'); ?>

<p>With each data release, the Sloan Digital Sky Survey collaboration has
published a Data Release paper, which describes the data, the data acquisition
process, and other details of the project. The most current public data
release of the SDSS-III is 
<a href="http://www.sdss.org/dr12/">Data Release 12 (DR12)</a>,
which was released in January 2015. Details of DR12 are described in the 
<a href="http://adsabs.harvard.edu/abs/2015ApJS..219...12A">Data Release 12</a> 
paper.

<p>The <a href="http://adsabs.harvard.edu/abs/2014ApJS..211...17A">Data Release 
10 paper</a> describes the details of DR10, our previous public data release. 
The <a href="http://adsabs.harvard.edu/abs/2002AJ....123..485S">Early Data 
Release (EDR) paper</a>, which came out after the first data from the original 
Sloan Digital Sky Survey became public, contains the most detailed description 
of data from the original SDSS.</p>
<dl>
<?php
include './bib.php';
$articles = array(
	'DR12'=> '2015ApJS..219...12A',
    'DR10'=> '2014ApJS..211...17A',
    'DR9' => '2012ApJS..203...21A',
    'DR8' => '2011ApJS..193...29A',
    'DR7' => '2009ApJS..182..543A',
    'DR6' => '2008ApJS..175..297A',
    'DR5' => '2007ApJS..172..634A',
    'DR4' => '2006ApJS..162...38A',
    'DR3' => '2005AJ....129.1755A',
    '<q>Orion</q> Release' => '2004AJ....128.2577F',
    'DR2' => '2004AJ....128..502A',
    'DR1' => '2003AJ....126.2081A',
    'Early Data Release' => '2002AJ....123..485S'
    );
foreach ($articles as $k=>$a) {
    $bibtex = new BibTeX($a);
    echo '<dt>'.$k.'</dt>'.PHP_EOL;
    echo '<dd class="ref">'.$bibtex->longformat().'</dd>'.PHP_EOL;
}
?>
</dl>
<?php echo foot(); ?>
