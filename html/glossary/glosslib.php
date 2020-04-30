<?php
/**
 * Class that defines an individual dictionary item.
 */
class GlossaryItem {
    /** @type string Keyword used to set id for the item. */
    private $key = '';
    /** @type string The term to be defined. */
    public $term = '';
    /** @type string definition. */
    private $definition = '';
    /** @type array Set the data releases where this definition is visible. */
    private $releases = array(8,9,10);
    /**
     * Constructor.
     *
     * @param string $term
     * @param string $key
     * @param string $def
     * @param array $releases
     */
    public function __construct($term,$key,$def,$releases=NULL) {
        $this->term = $term;
        $this->key = $key;
        $this->definition = $def;
        if (!is_null($releases)) {
            $this->releases = $releases;
        }
        return;
    }
    /**
     * Check for visibility in this release.
     */
    public function visible($release) {
        return (array_search($release,$this->releases) !== FALSE);
    }
    /**
     * The HTML value of the object.
     */
    public function value($release) {
        if ($this->visible($release)) {
            $dt = "<dt id=\"{$this->key}\">{$this->term}</dt>";
            $def = preg_replace("/drXX/","dr{$release}",$this->definition);
            if ($release == 8) {
                $def = preg_replace("#help/glossary\.php#","glossary.php",$def);
            }
            return $dt.$def;
        } else {
            return '';
        }
    }
    /**
     * The letter this term starts with.
     */
    public function startswith() {
        return strtoupper(substr($this->term,0,1));
    }
}
/**
 * Define navigation links
 */
function letterlinks($url,$l) {
    return "<a href=\"${url}#{$l}\">{$l}</a>";
}
/**
 * Define & sort the glossary.
 *
 * @param string $filename
 * @param SiteConstants $constants
 * @return array
 */
function parse_glossary($filename,$constants) {
    $glossary = array();
    $html = new DOMDocument();
    $html->loadHTMLFile($filename);
    $dts = $html->getElementsByTagName('dt');
    foreach ($dts as $dt) {
        $term = $dt->nodeValue;
        $id = $dt->getAttribute('id');
        $releases = $dt->hasAttribute('class') ?
            array_map("intval",explode(' ',$dt->getAttribute('class'))) :
            range($constants->first,$constants->latest);
        $sibling = $dt->nextSibling;
        while ($sibling->nodeName != 'dd') {
            $sibling = $sibling->nextSibling;
        }
        array_push($glossary, new GlossaryItem($term,$id,$sibling->ownerDocument->saveXML($sibling),$releases) );
    }
    /**
     * Sort dictionary terms.
     *
     * @param GlossaryItem $a, $b The objects to be compared.
     * @return int
     */
    function glsort($a,$b) {
        return strcasecmp($a->term,$b->term);
    }
    uasort($glossary,'glsort');
    return $glossary;
}
/**
 * Convert the glossary to html.
 *
 * @param string $filename
 * @param int $release
 */
function generate_glossary($filename,$release=0) {
    $constants = $GLOBALS['constants'];
    if ($release == 0) {
        $release = $constants->latest;
    }
    //
    // Read the glossary
    //
    $glossary = parse_glossary($filename,$constants);
    //
    // Process the glossary
    //
    $glossary_url = ($release == 8) ? "dr{$release}/glossary.php" : "dr{$release}/help/glossary.php";
    $current_letter = '0';
    $letters = array();
    $text = array();
    foreach ($glossary as $g) {
        if ($g->visible($release)) {
            if ($g->startswith() != $current_letter) {
                if ($current_letter != '0') {
                    array_push($text,'</dl>');
                    array_push($text,"<p><a href=\"{$glossary_url}#Top\">Back to Top</a></p>");
                }
                $current_letter = $g->startswith();
                array_push($letters,letterlinks($glossary_url,$current_letter));
                array_push($text,"<h2 id=\"{$current_letter}\" style=\"width:100%;text-align:center;\"><span class=\"u\">{$current_letter}</span></h2>");
                array_push($text,'<dl>');
            }
            array_push($text,$g->value($release));
        }
    }
    array_push($text,'</dl>');
    array_push($text, "<p><a href=\"{$glossary_url}#Top\">Back to Top</a></p>");
    //
    // Convert to string
    //
    $gg = '<p style="width:100%;text-align:center;font-size:large;">'.implode('&nbsp;',$letters).'</p>'.PHP_EOL;
    $gg .= implode(PHP_EOL,$text).PHP_EOL;
    return $gg;
}
?>
