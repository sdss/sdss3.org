<?php
/**
 * Read and process BibTeX files.
 */
class BibTeX {
    /** @type array A mapping of TeX special characters to HTML entities. */
    private $entities = array(
        '\~{}' => '{\tilde}',
        "{\\'a}" => '&aacute;',
        '{\^a}' => '&acirc;',
        '{\`a}' => '&agrave;',
        '{\~a}' => '&atilde;',
        '{\"a}' => '&auml;',
        "{\\'c}" => '&#263;',
        '{\v c}' => '&#269;',
        "{\\'E}" => '&Eacute;',
        "{\\'e}" => '&eacute;',
        '{\^e}' => '&ecirc;',
        '{\`e}' => '&egrave;',
        "{\\'{\\i}}" => '&iacute;',
        '{\`i}' => '&igrave;',
        '{\`{\i}}' => '&igrave;',
        '{\L}' => '&#321;',
        '{\~n}' => '&ntilde;',
        "{\\'n}" => '&#324;',
        '{\v S}' => '&Scaron;',
        '{\v s}' => '&scaron;',
        "{\\'o}" => '&oacute;',
        '{\"O}' => '&Ouml;',
        '{\"o}' => '&ouml;',
        '{\"u}' => '&uuml;',
        '{\v Z}' => '&#381;',
        '{$\alpha$}' => '&alpha;',
        '{$\beta$}' => '&beta;',
        '{$\Lambda$}' => '&Lambda;',
        '{$\sigma$}' => '&sigma;',
        '/\$_\{([^}]+)\}\$/' => '<sub>$1</sub>',
        '/\$\^\{([^}]+)\}\$/' => '<sup>$1</sup>',
        //'$_{8}$' => '<sub>8</sub>',
        //'$_{A}$' => '<sub>A</sub>',
        '{\ap}' => '&asymp;',
        '{\lt}' => '&lt;',
        '\%' => '%',
        '~' => '&nbsp;',
        ' ' => '&nbsp;',
        '{\tilde}' => '~',
    );
    /** @type array A mapping of BibTeX journal abbreviations to full names. */
    private $journals = array(
        'aap' => array('A&amp;A','Astronomy &amp; Astrophysics'),
        'aj' => array('AJ','Astronomical Journal'),
        'apj' => array('ApJ','Astrophysical Journal'),
        'apjl' => array('ApJL','Astrophysical Journal Letters'),
        'apjs' => array('ApJS','Astrophysical Journal Supplement'),
        'jcap' => array('JCAP','Journal of Cosmology and Astroparticle Physics'),
        'pasp' => array('PASP','Publications of the Astronomical Society of the Pacific'),
        'spie' => array('SPIE','Society of Photo-Optical Instrumentation Engineers (SPIE) Conference Series'),
        'mnras' => array('MNRAS','Monthly Notices of the Royal Astronomical Society'),
    );
    /** @type array Contains the data read from the BibTeX file. */
    private $data = array();
    /** @type string Contains the bibcode of any erratum associated with the reference. */
    public $erratum = ''; // Does this have an erratum?
    /**
     * Constructor.
     *
     * @param string $bibcode ADS bibcode.
     * @param string $erratum Bibcode for any erratum associated with the paper.
     */
    public function __construct($bibcode='',$erratum='') {
        if (strlen($bibcode) > 0) {
            $filecode = stripos($bibcode,'A&') > 0 ? strtr($bibcode,'&','+') : $bibcode;
            $lines = file_get_contents('./bib/'.$filecode.'.bib');
            $this->process($lines);
        }
        if (strlen($erratum) > 0) {
            $this->erratum = $erratum;
        }
        return;
    }
    /**
     * Get values of the keywords stored in the data array.
     *
     * @param string $key Keyword to check.
     * @return mixed
     */
    public function __get($key) {
        if (array_key_exists($key,$this->data)) {
            if ($key == 'title') {
                return $this->texhtml($this->data[$key],FALSE);
            } else {
                return $this->data[$key];
            }
        }
        return NULL;
    }
    /**
     * Magic function to access keywords set by BibTex.
     *
     * @param string $key Keyword to check.
     * @return bool
     */
    public function __isset($key) {
        return isset($this->data[$key]);
    }
    /**
     * Process the raw text from the BibTeX file.
     *
     * @param string $lines  Raw text from a BibTeX file.
     * @return null
     */
    private function process($lines) {
        $start = stripos($lines,'@') + 1; // Strip the starting @ character.
        $end = strripos($lines,'}');
        $data = substr($lines,$start,$end-$start);
        $m = preg_match('/^([A-Z]+)\{([^,]+),/',$data,$matches);
        if ($m === FALSE) {
            return FALSE;
        }
        if ($m == 0) {
            return $bibtex;
        }
        $this->data['type'] = $matches[1];
        $this->data['bibcode'] = $matches[2];
        $data = trim(preg_replace('/\r?\n/','',substr($data,stripos($data,',') + 1)));
        while (strlen($data) > 0) {
            $next_equals = stripos($data,'=');
            $key = trim(substr($data,0,$next_equals));
            $data = ltrim(substr($data,$next_equals+1));
            $delimiter = substr($data,0,1);
            if ($delimiter == '"') {
                $next_comma = stripos($data,'",');
                $value = substr($data,1,$next_comma-1);
                $next = $next_comma+2;
            } else if ($delimiter == '{') {
                $i = 1;
                $open = 1;
                while ($open > 0) {
                    $c = substr($data,$i,1);
                    if ($c == '{') {
                        $open++;
                    }
                    if ($c == '}') {
                        $open--;
                    }
                    $i++;
                }
                $value = substr($data,1,$i-2);
                $next = $i+1;
            } else {
                $next_comma = stripos($data,',');
                $value = substr($data,0,$next_comma);
                $next = $next_comma+1;
            }
            $this->data[$key] = $value;
            $data = ltrim(substr($data,$next));
        }
        //
        // Post process some fields
        //
        if (isset($this->data['author'])) {
            $authors = preg_split('/\s+and\s+/', $this->data['author']);
            $this->data['author'] = $authors;
        }
        if (isset($this->data['title'])) {
            $this->data['title'] = substr($this->data['title'],1,strlen($this->data['title'])-2);
        }
        if (isset($this->data['journal'])) {
            if ($this->data['journal'][0] == chr(92)) {
                $this->data['journal'] = substr($this->data['journal'],1);
            }
        } else {
            if ($this->data['type'] == 'INPROCEEDINGS') {
                $this->data['journal'] = $this->data['series'];
            }
        }
        if (isset($this->data['erratum'])) {
            $this->erratum = $this->data['erratum'];
        }
        return;
    }
    /**
     * Converts TeX special characters to HTML entities.
     *
     * @param string $tex TeX string.
     * @param bool $nbsp Set this to FALSE to prevent the conversion of space characters to '&nbsp;'
     * @return string
     */
    private function texhtml($tex,$nbsp=TRUE) {
        $html = $tex;
        foreach ($this->entities as $k=>$v) {
            if ($k == ' ' && !$nbsp) {
                continue;
            }
            $html = (substr($k,0,1) == '/') ? preg_replace($k,$v,$html) :
                str_replace($k,$v,$html);
            //$html = str_replace($k,$v,$html);
        }
        return $html;
    }
    /**
     * Convert author names to valid XHTML.
     *
     * @param string $author   Author's name from BibTeX file.
     * @param bool $lastfirst  If set to TRUE, print the author's last name first.
     * @return string
     */
    private function htmlauthor($author,$lastfirst=FALSE) {
        if ($author == 'et al.') {
            return 'et&nbsp;al.';
        }
        if ($author == 'others') {
            return 'et&nbsp;al.';
        }
        $a = explode(',',$author);
        $last = substr($a[0],1,strlen($a[0])-2);
        $n = count($a);
        if ($n == 3) {
            $last .= $a[1];
        }
        $first = trim($a[$n-1]);
        if ($lastfirst) {
            return $this->texhtml($last).',&nbsp;'.$this->texhtml($first);
        } else {
            return $this->texhtml($first).'&nbsp;'.$this->texhtml($last);
        }
    }
    /**
     * Return an ApJ-like reference string.
     *
     * @return string
     */
    public function shortformat() {
        $l = '<a href="'.$this->data['adsurl'].'">';
        $n = count($this->data['author']);
        if ($n == 1) {
            $l .= $this->htmlauthor($this->data['author'][0],TRUE);
        } else if ($n == 2) {
            $l .= $this->htmlauthor($this->data['author'][0],TRUE).' &amp; '.$this->htmlauthor($this->data['author'][1],TRUE);
        } else if ($n == 3) {
            $l .= $this->htmlauthor($this->data['author'][0],TRUE).', '.$this->htmlauthor($this->data['author'][1],TRUE).' &amp; '.$this->htmlauthor($this->data['author'][2],TRUE);
        } else {
            $l .= $this->htmlauthor($this->data['author'][0],TRUE).' et&nbsp;al.';
        }
        $l .= ' '.$this->data['year'].',';
        if (isset($this->journals[$this->data['journal']])) {
            $l .= ' '.$this->journals[$this->data['journal']][0].',';
        } else {
            $l .= ' '.$this->data['journal'].',';
        }
        $l .= ' '.$this->data['volume'].',';
        if (stripos($this->data['pages'],'-') > 0) {
            $p = explode('-',$this->data['pages']);
            $l .= ' '.$p[0];
        } else {
            $l .= ' '.$this->data['pages'];
        }
        $l .= '</a>';
        return $l;
    }
    /**
     * Return a longer reference string containing the full journal name.
     *
     * @param bool $allauthor Set this to TRUE to include all authors.
     * @return string
     */
    public function longformat($allauthor=FALSE) {
        $l = '';
        if ($allauthor) {
            foreach ($this->data['author'] as $a) {
                $l .= $this->htmlauthor($a).', ';
            }
        } else {
            $n = count($this->data['author']);
            if ($n == 1) {
                $l .= $this->htmlauthor($this->data['author'][0]).',';
            } else if ($n == 2) {
                $l .= $this->htmlauthor($this->data['author'][0]).' &amp; '.$this->htmlauthor($this->data['author'][1]).',';
            } else if ($n == 3) {
                $l .= $this->htmlauthor($this->data['author'][0]).', '.$this->htmlauthor($this->data['author'][1]).' &amp; '.$this->htmlauthor($this->data['author'][2]).',';
            } else {
                $l .= $this->htmlauthor($this->data['author'][0]).', '.$this->htmlauthor($this->data['author'][1]).', '.$this->htmlauthor($this->data['author'][2]).' <em>et&nbsp;al.</em>,';
            }
        }
        $l .= ' <q>'.$this->texhtml($this->data['title'],FALSE).',</q>';
        if (isset($this->journals[$this->data['journal']])) {
            $l .= ' <em>'.$this->journals[$this->data['journal']][1].'</em>';
        } else {
            $l .= ' <em>'.$this->data['journal'].'</em>';
        }
        $l .= ' <strong>'.$this->data['volume'].'</strong>';
        $l .= ' ('.$this->data['year'].')';
        if (isset($this->data['pages'])) {
            $l .= ' '.$this->data['pages'].';';
        } else {
            if (isset($this->data['eid'])) {
                $l .= ' '.$this->data['eid'].';';
            } else {
                $l .= ';';
            }
        }
        $l .= ' <a href="'.$this->data['adsurl'].'">adsabs:'.htmlentities($this->data['bibcode']).'</a>';
        if (isset($this->data['doi'])) {
            $l .= '; <a href="http://dx.doi.org/'.$this->data['doi'].'">doi:'.$this->data['doi'].'</a>';
        }
        if (isset($this->data['eprint'])) {
            if (isset($this->archivePrefix)) {
                $l .= '; <a href="http://arxiv.org/abs/'.$this->data['eprint'].'">'.$this->data['archivePrefix'].':'.$this->data['eprint'].'</a>';
            } else {
                $foo = explode(':',$this->data['eprint']);
                $l .= '; <a href="http://arxiv.org/abs/'.$foo[1].'">'.$this->data['eprint'].'</a>';
            }
        }
        //
        // Handle erratum
        //
        if ($this->has_erratum()) {
            $err = new BibTex($this->erratum);
            $l .= ' &mdash; <strong>Erratum:</strong> '.$err->erratumformat();

        }
        //
        // Finish
        //
        $l .= '.';
        return $l;
    }
    /**
     * Return a reference string containing all authors.
     *
     * This method is just an alias for longformat(TRUE).
     *
     * @return string
     */
    public function allauthorformat() {
        return $this->longformat(TRUE);
    }
    /**
     * Check whether this reference has an erratum set.
     *
     * @return bool
     */
    public function has_erratum() {
        return (strlen($this->erratum) > 0);
    }
    /**
     * Return a reference string specific to errata.
     *
     * @return string
     */
    public function erratumformat() {
        $l = '';
        if (isset($this->journals[$this->data['journal']])) {
            $l .= '<em>'.$this->journals[$this->data['journal']][1].'</em>';
        } else {
            $l .= '<em>'.$this->data['journal'].'</em>';
        }
        $l .= ' <strong>'.$this->data['volume'].'</strong>';
        $l .= ' ('.$this->data['year'].')';
        $l .= ' '.$this->data['pages'].';';
        $l .= ' <a href="'.$this->data['adsurl'].'">adsabs:'.$this->data['bibcode'].'</a>';
        if (isset($this->data['doi'])) {
            $l .= '; <a href="http://dx.doi.org/'.$this->data['doi'].'">doi:'.$this->data['doi'].'</a>';
        }
        if (isset($this->data['eprint'])) {
            if (isset($this->archivePrefix)) {
                $l .= '; <a href="http://arxiv.org/abs/'.$this->data['eprint'].'">'.$this->data['archivePrefix'].':'.$this->data['eprint'].'</a>';
            } else {
                $foo = explode(':',$this->data['eprint']);
                $l .= '; <a href="http://arxiv.org/abs/'.$foo[1].'">'.$this->data['eprint'].'</a>';
            }
        }
        return $l;
    }
    /**
     * Return the first author.
     *
     * @param bool $lastfirst  If set to TRUE, print the author's last name first.
     * @return string
     */
    public function first_author($lastfirst=FALSE) {
        return $this->htmlauthor($this->data['author'][0],$lastfirst);
    }
}
?>
