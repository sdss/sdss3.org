<?php include '../header.php'; echo head('SDSS-III Publications'); ?>

<h2>Data Release Publications</h2>

<p>Our <a href="science/dr_publications.php">Data Release Publications</a> 
describe what data each of our data releases contain, how the data were 
collected, and technical details of the project. The most current public data 
release of the SDSS-III is
<a href="http://www.sdss.org/dr12">Data Release 12</a>, released in January 2015. 
Data Release 12 is described in the DR12 section of our new, unified 
<a href="http://www.sdss.org/dr12/">Sloan Digital Sky Survey</a> website, as well 
as in the <a href="http://adsabs.harvard.edu/abs/2015ApJS..219...12A":>DR12 
paper</a>.</p>

<p>Prior data releases are available on this site:</p>

<ul>
    <li><a href="dr10/">Data Release 10</a></li>
    <li><a href="dr9/">Data Release 9</a></li>
	<li><a href="dr8/">Data Release 8</a></li>
</ul>


<h2>Technical Publications</h2>

<p>Our <a href="science/technical_publications.php">Technical Publications</a> describe various aspects of the technical operation of the Sloan Digital Sky Survey.
</p>

<h2 id="peerreviewed">Peer-reviewed Publications of the Sloan Digital Sky Survey-III</h2>

<ol>
<?php
include './bib.php';
$pubs = array(
	'2015MNRAS.452.1914G', /* Gil-Marin et al. 2015 */
	'2015ApJ...808..132H', /* Hayden et al. 2015 */
	'2015MNRAS.451.2230M', /* Martig et al. 2015 */
	'2015ApJS..219...12A', /* Alam et al. 2015 */
	'2015ApJ...807...82T',	/* Tayar et al. 2015 */
	'2015ApJ...807...27C', /* Cottaar et al. 2015 */
	'2015MNRAS.451.5058G', /* Gil-Marin et al. 2015 */
	'2015ApJ...806..111G', /* Grier et al. 2015 */
	'2015AJ....149..181Z', /* Zamora et al. 2015 */
	'2015ApJ...805...96S', /* Shen et al. 2015 */
	'2015MNRAS.450.2195S', /* Singh, Mandelbaum & More 2015 */
	'2015ApJ...806....2M', /* More et al. 2015 */
	'2015ApJ...806....1M', /* Miyatake et al. 2015 */
	'2015A&A...577A..81F', /* Fernandez-Alvar et al. 2015 */
	'2015JCAP...05..060B', /* Bautista et al. 2015 */
	'2015AJ....149..153M', /* Meszaros et al. 2015 */
	'2015AJ....149..158S', /* Schmidt et al. 2015*/
	'2015MNRAS.449..867B', /* Belfiore et al. 2015 */
	'2015ApJ...804..125L', /* Li et al. 2015 */
	'2015MNRAS.449..328W', /* Wilkinson et al. 2015 */
	'2015JCAP...05..040H', /* Ho et al. 2015 */
	'2015A&A...576L..12C', /* Chiappini et al. 2015 */
	'2015PASP..127..397W', /* Weaver, Blanton, Brinkmann, & Stauffer 2015 */
	'2015ApJ...802...92Z', /* Zhang et al. 2015 */
	'2015MNRAS.449L..95G', /* Guo et al. 2015 */
	'2015ApJ...802...89B', /* Buchner et al. 2015 */
	'2015AJ....149..143F', /* Fleming et al. 2015 */
	'2015ApJ...802....7C', /* Calberg et al. 2015 */
	'2015A&A...575A..40C', /* Comparat et al. 2015 */
	'2015MNRAS.447.2784P', /* Perez-Rafols et al. 2015 */
	'2015JCAP...02..045P', /* Palanque-Delabrouille et al. 2015 */
	'2015ApJ...800...83B', /* Bovy et al. 2015 */
	'2015ApJ...799..136F', /* Foster et al. 2015 */
	'2015MNRAS.447..234W', /* White et al. 2015 */
	'2015A&A...574A..59D', /* Delubac et al. 2015 */
	'2015ApJ...799..196L', /* Lee et al. 2015 */
	'2015ApJ...798L..41C', /* Cunha et al. 2015 */
	'2015ApJS..216....4S', /* Shen et al. 2015 */
	'2015MNRAS.446..578G', /* Guo et al. 2015 */
	'2015ApJ...798...35Z', /* Zasowski et al. 2015 */
	'2015AJ....149....7C', /* Chojonowski et al. 2015 */
	
	'2014JCAP...12..005S', /* Song et al. 2014 */
	'2014MNRAS.445.3152B', /* Burden et al. 2014 */
    '2014ApJ...797...19R', /* Ruan et al. 2014 */	
	'2014MNRAS.445.2758R', /* Rodrigues et al. 2014 */
	'2014ApJS..215...19P', /* Pinsonneault et al. 2014 */	
	'2014A&A...572A..31F', /* Finley, Petitjean, Noterdaeme, & Paris 2014 */
    '2014AJ....148..105G', /* Ghezzi et al. 2014 */
	'2014ApJ...796...86P', /* Parihar et al. 2014 */
	'2014MNRAS.445..726C', /* Chisari, Strauss, Huff, & Bahcall 2014 */
    '2014ApJ...796...38N', /* Nidever et al. 2014 */
	'2014MNRAS.445L.104P', /* Pieri 2014 */
    '2014MNRAS.444.3501B', /* Beutler et al. 2014 */
	'2014MNRAS.445....2V', /* Vargas-Magana et al. 2014 */
	'2014ApJ...794..125C', /* Cottar et al. 2014 */
	'2014MNRAS.444..476R', /* Reid, Seo, Leauthaud, & White 2014 */
	'2014ApJ...793..139C', /* Cai et al. 2014 */
    '2014MNRAS.443.1065B', /* Beutler et al. 2014 */
    '2014ApJ...792..135T', /* Taylor et al. 2014 */
    '2014ApJ...790..127B', /* Bovy et al. 2014 */
    '2014ApJ...791..112S', /* Schlesinger et al. 2014 */
    '2014ApJ...791...88F', /* Filiz Ak et al. 2014 */
    '2014A&A...568A...7A', /* Allende Prieto 2014 */
	'2014MNRAS.441.2398G', /* Guo et al. 2014 */
    '2014AJ....148...24S', /* Schultheis et al. 2014 */
    '2014ApJ...789...92B', /* Beifori et al. 2014 */
    '2014ApJ...788...91G', /* Greene et al. 2014 */
	'2014MNRAS.441...24A', /* Anderson et al. 2014 */
    '2014A&A...566A..24N', /* Noterdaeme et al. 2014 */
    '2014MNRAS.441.1718P', /* Pieri et al. 2014 */
	'2014AJ....147..116H', /* Hayden et al. 2014 */
	'2014PASP..126..445H', /* Halverson et al. 2014 */
	'2014JCAP...05..027F', /* Font-Ribera et al. 2014 */
	'2014MNRAS.440.2222T', /* Tojeiro et al. 2014 */
	'2014MNRAS.440.2692S', /* Sanchez et al. 2014 */
	'2014MNRAS.439.3504S', /* Samushia et al. 2014 */
	'2014ApJ...785L..28E', /* Epstein et al. 2014 */
	'2014A&A...564A.115A', /* Anders et al. 2014 */
	'2014ApJ...784L..30E', /* Eikenberry et al. 2014 */
	'2014MNRAS.439.2531P', /* Percival et al. 2014 */
	'2014JCAP...04..007A', /* Agarwal et al. 2014 */
	'2014MNRAS.439.3139Z', /* Zhu et al. 2014 */
	'2014ApJS..211...17A', /* Ahn et al. 2014 */
	'2014AJ....147...75O', /* Olmstead et al. 2014 */
	'2014A&A...563A..54P', /* Paris et al. 2014 */
	'2014MNRAS.439...83A', /* Anderson et al. 2014 */
	'2014ApJ...782...61T', /* Terrien et al. 2014 */
	'2014ApJ...781...72R', /* Roig, Blanton, & N. Ross 2014 */
	'2014ApJ...781...96L', /* Lopez-Corredoira 2014 */
	'2014MNRAS.438.1724H', /* Hernandez-Monteagudo et al. 2014 */
	'2014MNRAS.437.1109R', /* A. Ross et al. 2014 */
	'2014ApJ...780...24S', /* Smith et al. 2014 */
	'2014ApJ...780....7P', /* Palladino et al. 2014 */
	'2013ApJ...778..127G', /* Glikman et al. 2014 */
	'2013ApJ...778...98S', /* Shen et al. 2013 */
	'2013AJ....146..156D', /* Deshpande et al. 2013 */	
	'2013MNRAS.436.2038Z', /* Zhao et al. 2013 */
	'2013ApJ...777L...1F', /* Frinchaboy et al. 2013 */
	'2013MNRAS.435.3306A', /* Alexandroff et al. 2013 */
	'2013ApJ...777..168F', /* Filiz Ak et al. 2013 */
	'2013A&A...559A..85P', /* Palanque-Delabrouille 2013 */
	'2013AJ....146..133M', /* Meszaros et al. 2013 */
	'2013ApJ...777L..13M', /* Majewski et al. 2013 */
	'2013MNRAS.435.2764M', /* Maraston et al. 2013 */
	'2013A&A...558A.111F', /* Finley et al. 2013 */
	'2013MNRAS.435...64K', /* Kazin et al. 2013 */
	'2013AJ....146...81Z', /* Zasowski et al. 2013 */
	'2013JCAP...09..016I', /* Irsic et al. 2013 */
	'2013MNRAS.434.1443X', /* Xavier et al. 2013 */
	'2013AJ....146...65J', /* Jiang et al. 2013 */
	'2013MNRAS.434.1792S', /* Scoccola et al. 2013 */
	'2013MNRAS.434..222H', /* Hall et al. 2013 */
	'2013MNRAS.433.3559C', /* Chuang et al. 2013 */
	'2013MNRAS.433.1202S', /* Sanchez et al. 2013 */
	'2013MNRAS.433.1146C', /* Comparat et al. 2013 */
	'2013ApJ...773...14R', /* N. Ross et al. 2013 */
	'2013AJ....146...32S', /* Smee et al. 2013 */
	'2013AJ....145..155D', /* De Lee et al. 2013 */
	'2013ApJ...770..119W', /* Wright et al. 2013 */
	'2013A&A...554A.131V', /* Vargas-Magana et al. 2013 */
	'2013MNRAS.432..743N', /* Nuza et al. 2013 */
    '2013JCAP...05..018F', /* Font-Ribera et al. 2013 */
    '2013AJ....145..139M', /* Mack et al. 2013 */
    '2013ApJ...768..105M', /* McGreer et al. 2013 */
    '2013MNRAS.431.1383T', /* Thomas et al. 2013 */
    '2013ApJ...768...38V', /* Vikas et al. 2013 */
    '2013JCAP...04..026S', /* Slosar et al. 2013 */
    '2013ApJ...767..122G', /* Guo et al. 2013 */
    '2013ApJ...767L...9G', /* Garcia Perez et al. 2013 */
    '2013A&A...552A..96B', /* Busca et al. 2013 */
    '2013JCAP...03..024K', /* Kirkby et al. 2013 */
    '2013AJ....145...69L', /* Lee et al. 2013 */
    '2013ApJ...765...16S', /* Smith et al. 2013 */
    '2013A&A...551A..29P', /* Palanque-Delabrouille et al. 2013 */
    '2013MNRAS.429.3627M', /* Miyatake et al. 2013 */
    '2013MNRAS.429.2643C', /* Chen et al. 2013 */
    '2013ApJ...763...88C', /* Campbell et al. 2013 */
    '2013MNRAS.429.1514S', /* Samushia et al. 2013 */
    '2013MNRAS.429...98P', /* Parejko et al. 2013 */
    '2013AJ....145...10D', /* Dawson et al. 2013 */
    '2013MNRAS.428.1116R', /* A. Ross et al. 2013 */
    '2013MNRAS.428.1498C', /* Comparat et al. 2013 */
    '2013AJ....145...20M', /* Ma et al. 2013 */
    '2013MNRAS.428.1036M', /* Manera et al. 2013 */
	
    '2012ApJS..203...21A', /* Ahn et al. 2012 */
    '2012A&A...548A..66P', /* Paris et al. 2012 */
    '2012AJ....144..188B', /* Bundy et al. 2012 */
    '2012MNRAS.427.3435A', /* Anderson et al. 2012 */
    '2012ApJ...761...12D', /* de Putter et al. 2012 */
    '2012ApJ...761...14H', /* Ho et al. 2012 */
    '2012ApJ...761...13S', /* Seo et al. 2012 */
    '2012ApJ...761..160S', /* Schlesinger et al. 2012 */
    '2012PASP..124.1159W', /* Wang, Wan, De Lee, & Lee 2012 */
    '2012ApJ...759..131B', /* Bovy et al. 2012 */
    '2012JCAP...11..059F', /* Font-Ribera et al. 2012 */
    '2012A&A...547L...1N', /* Noterdaeme et al. 2012 */
    '2012AJ....144..144B', /* Bolton et al. 2012 */
    '2012MNRAS.426.2719R', /* Reid et al. 2012 */
    '2012AJ....144..120M', /* Meszaros et al. 2012 */
    '2012ApJ...757..114F', /* Filiz Ak et al. 2012 */
    '2012AJ....144...72F', /* Fleming et al. 2012 */
    '2012MNRAS.425..415S', /* Sanchez et al 2012 */
    '2012ApJ...757...82B', /* Bolton et al. 2012 */
    '2012ApJ...757...51G', /* Glikman et al. 2012 */
    '2012ApJ...755L..25N', /* Nidever et al. 2012 */
    '2012MNRAS.424.2339T', /* Tojeiro et al. 2012 */
    '2012MNRAS.424..933W', /* White et al. 2012 */
    '2012ApJ...755..125G', /* Galbany et al. 2012 */
    '2012ApJS..201...32S', /* Sheldon et al. 2012 */
    '2012PhRvL.109d1101H', /* Hand et al. 2012 */
    '2012MNRAS.424..136T', /* Tojeiro et al. 2012 */
    '2012MNRAS.424..564R', /* A. Ross et al. 2012 */
    '2012PASP..124..598W', /* Wang, Wan, De Lee, & Lee 2012 */
    '2012ApJ...752...51C', /* Cheng et al. 2012 */
    '2012AJ....143..105B', /* Bonaca et al. 2012 */
    '2012ApJ...750...80K', /* Koposov et al. 2012 */
    '2012AJ....143..107W', /* Wisnewski et al. 2012 */
    '2012AJ....143...90S', /* Shu et al. 2012 */
    '2012ApJ...749...41B', /* Bovy et al. 2012 */
    '2012MNRAS.421..314C', /* Chen et al. 2012 */
    '2012ApJS..199....3R', /* N. Ross et al 2012 */
    '2012ApJ...746..149C', /* Cheng et al. 2012 */
    '2012ApJ...746..138T', /* Tal et al. 2012 */
    '2012ApJ...744...41B', /* Brownstein et al. 2012 */
	
    '2011MNRAS.418.1055M', /* Masters et al. 2011 */
	'2011ApJ...743..125K', /* Kirkpatrick et al. 2011 */
    '2011ApJ...743..172D', /* D'Andrea et al. 2011 */
    '2011MNRAS.417.1350R', /* A. Ross et al. 2011 */
    '2011JCAP...09..001S', /* Slosar et al. 2011 */
    '2011AJ....142...72E', /* Eisenstein et al. 2011 */
    '2011ApJ...738...79X', /* Xue et al. 2011 */
    '2011AJ....142...31B', /* Blanton et al. 2011 */
    '2011A&A...530A.122P', /* Palanque-Delabrouille et al. 2011 */
    '2011ApJS..193...29A', /* Aihara et al. 2011 */
    '2011ApJ...729..141B', /* Bovy et al. 2011 */
    '2011ApJ...728..126W', /* White et al. 2011 */
    '2011ApJ...728...32L', /* Lee et al. 2011 */
	
    '2010ApJ...725.1175S', /* Schafly et al. 2010 */
    '2010ApJ...723..812K', /* Kollmeier et al. 2010 */
    '2010ApJ...719.1032K', /* Kazin et al. 2010 */
    '2010ApJ...719..996S', /* Schlesinger et al. 2010 */
    );
foreach ($pubs as $p) {
    $bibtex = new BibTeX($p);
    echo '<li class="ref">'.$bibtex->longformat(TRUE).'</li>'.PHP_EOL;
}
?>
</ol>

<h2>Other SDSS Publications</h2>

<p>The Sloan Digital Sky Survey is one of the most cited surveys in the
history of astronomy. The SDSS has produced literally thousands of
peer-reviewed publications in astronomy and other sciences - far too many
to list one by one.</p>

<p>The section below contains a page that queries the Astrophysics Data System
(ADS) for all refereed papers that contain "Sloan Survey" or "SDSS" in the
title or abstract, in decreasing order of the number of citations.
Use the scrollbars in the section below to navigate through the list.</p>

<div style="width:100%;">
<object type="text/html" data="http://tinyurl.com/42jxy" width="100%" height="600">
<param name="src" value="http://tinyurl.com/42jxy" />
<p>If you cannot see this list, <a href="http://tinyurl.com/42jxy">visit this link</a>.</p>
</object>
</div>

<?php echo foot(); ?>
