<?php
//
// CLASS DEFINITIONS
//
/**
 * Defines constants that can be used in the functions below and in other PHP documents.
 */
class SiteConstants {
    /** @type array Contains all the constant data. */
    private $data = array(
        'copyright' => 'Copyright &copy; 2010-2013 SDSS-III', // Common copyright string for all pages.
        'url' => 'https://www.sdss3.org/', // The base URL of this site.
        'internal' => 'https://sdss3.org/internal/', // The base URL of internal pages.
        'headurl' => '$HeadURL: svn+ssh://sdss3svn@sdss3.org/repo/www/tags/v5_63/html/header.php $',
        'dr_regex' => '/dr([0-9]+)/', // Use this regular expression to match DR pages.
        'first' => 8, // Number of the first SDSS-III data release.<br />
		'last' => 10, // Number of final data release on this site; further are on sdss.org
        'latest' => 13, // Number of the latest data release.
        'custom' => '',  // File containing custom configuration.
        'https' => FALSE, // Is https being used to access www.sdss3.org?
        );
    /**
     * Constructor.
     */
    public function __construct() {
        if (isset($_SERVER['HTTPS'])) {
            //
            // This should fix some problems with browser complaining
            // about downloading auxiliary files with http instead of https.
            //
            $this->data['url'] = 'https://www.sdss3.org/';
            $this->data['https'] = TRUE;
        }
        $custom=__DIR__;
        $custom.= '/custom.php';
        if (is_readable($custom)) {
            include_once $custom;
            $this->data['custom'] = $custom;
            if (is_array($override)) {
                foreach ($override as $key=>$value) {
                    if (array_key_exists($key,$this->data)) {
                        $this->data[$key] = $override[$key];
                    }
                }
            }
        }
        return;
    }
    /**
     * Magic method used with echo.
     */
    public function __toString() {
        $str = ($this->is_custom()) ? array("SiteConstants: Custom Configuration read from {$this->data['custom']}") :
            array("SiteConstants: Default Configuration");
        array_push($str,'array(');
        foreach ($this->data as $key=>$value) {
            if (is_bool($value)) {
                $v = $value ? 'TRUE' : 'FALSE';
                array_push($str,"'{$key}' => {$v},");
            } else if (is_int($value)) {
                array_push($str,"'{$key}' => {$value},");
            } else {
                array_push($str,"'{$key}' => '{$value}',");
            }
        }
        array_push($str,');');
        return implode(PHP_EOL,$str).PHP_EOL;
    }
    /**
     * Get values of the keywords stored in the data array.
     *
     * @param string $key Keyword to check.
     * @return mixed
     */
    public function __get($key) {
        if (array_key_exists($key,$this->data)) {
            return $this->data[$key];
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
     * Is this a custom setup?
     */
    public function is_custom() {
        return strlen($this->custom) > 0;
    }
}
/**
 * Object to represent a single row in a side menu.
 */
class SidemenuItem {
    private $name = '';
    private $url = '';
    private $title = '';
    private $small = FALSE;
    private $highlight = FALSE;
    private $external = FALSE;
    public function __construct($name,$url) {
        $small = strpos($name,'[small]');
        $title = strpos($name,'|');
        $ext = strpos($url,'http');
        if ($ext !== FALSE) {
            if ($ext == 0) {
                $this->external = TRUE;
            }
        }
        $this->name = ( $small === FALSE ) ? $name : substr($name,0,$small);
        if ( $title !== FALSE ) {
            $this->title = substr($this->name,$title+1);
            $this->name = substr($this->name,0,$title);
        }
        $this->url = $url;
        $this->small = $small !== FALSE;
        return;
    }
    public function __toString() {
        return $this->value();
    }
    public function highlight() {
        $this->highlight = TRUE;
        return TRUE;
    }
    public function value() {
        $foo = $this->name;
        $link = $this->highlight ? '<a class="highlight" href="' : '<a href="';
        $link .= $this->url;
        $link .= '"';
        if (strlen($this->title) > 0) {
            $link .= ' title="'.$this->title.'"';
        }
        $link .= '>';
        $link .= $foo;
        $link .= '</a>';
        $span = $this->small ? '<span style="font-size:smaller;">'.$link.'</span>' : $link;
        if ($this->external) {
            $span .= '&nbsp;<img src="images/offsite.png" alt="[EXT]" />';
        }
        $li = "<li>{$span}</li>";
        // if ($this->external) {
        //     $li .= '<!-- External Link -->';
        // }
        return $li;
    }
}
/**
 * Object to represent a whole side menu.
 */
class Sidemenu {
    private $data = array();
    private $empty = TRUE;
    private $startul =  '<ul>';
    private $endul =    '</ul>';
    public function __construct($contents=NULL,$highlight=NULL) {
        if (!is_null($contents)) {
            if (is_array($contents)) {
                //
                // Read the contents array
                //
                $sidemenu = $contents;
            } else {
                //
                // Read from a file
                //
                // $d = dirname($_SERVER['SCRIPT_FILENAME']);
                $d = dirname(__FILE__);
                // if ($d == '.') {
                //     $dir = getcwd();
                //     $d = preg_replace('#^(.*/html)(/.*|)$#','$1',$dir);
                // }
                $filepath = $d.'/sidemenus/'.$contents.'.php';
                // echo "<!-- {$filepath} -->\n";
                if (file_exists($filepath)) {
                    include $filepath;
                } else {
                    $sidemenu = array();
                }
            }
            foreach ($sidemenu as $key=>$value) {
                $c = new SidemenuItem($key,$value);
                if ($this->empty) {
                    $this->empty = FALSE;
                }
                if (!is_null($highlight) and $highlight == $value) {
                    $c->highlight();
                }
                array_push($this->data,$c);
            }
        }
        return;
    }
    public function __toString() {
        return $this->value();
    }
    public function lines() {
        $foo = array();
        if (!$this->empty) {
            array_push($foo,$this->startul);
            foreach ($this->data as $li) {
                array_push($foo,$li->value());
            }
            array_push($foo,$this->endul);
        }
        return $foo;
    }
    public function value() {
        return implode(PHP_EOL,$this->lines()).PHP_EOL;
    }
}
/**
 * Object to process all header information.
 */
class Header {
    private $constants = NULL; // Will hold a SiteConstants instance.
    private $base = NULL; // The base tag.  Set the first time the base() method is called.
    private $path = NULL; // The path of the file within the www product.  Set the first time the path() method is called.
    private $type = NULL; // The general type of the page.  Set the first time the type() method is called.
    // The first few lines of the header.
    private $top = array(
        '<?xml version="1.0" encoding="UTF-8"?>',
        '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">',
        '<html xmlns="http://www.w3.org/1999/xhtml">');
    private $container = array('<div class="main_container">'); // Opens the container area.
    private $content = array('<div class="right_content">'); // Opens the content area.
    private $title = 'SDSS-III'; // The contents of the <title> tag.
    private $pressdate = ''; // Date on press releases.
    private $pressrelease = FALSE; // Used by is_press;
    public function __construct($title='',$pressdate='',$constants=NULL) {
        if (is_null($constants)) {
            $this->constants = new SiteConstants();
        } else {
            $this->constants = $constants;
        }
        //
        // Set the title.
        //
        if (strlen($title) > 0) {
            $this->title = $title;
        }
        if (strlen($pressdate) > 0) {
            $this->pressdate = $pressdate;
            $this->press = TRUE;
        }
        return;
    }
    public function __toString() {
        return $this->value();
    }
    public function value() {
        $h = array_merge(
            $this->top,
            $this->head(),
            $this->body(),
            $this->navbars(),
            $this->featurepanel(),
            $this->container,
            $this->side(),
            $this->content,
            $this->h1()
            );
        return implode(PHP_EOL,$h).PHP_EOL;
    }
    private function head() {
        //
        // Generates everything that goes inside the <head> tag.
        //
        $start = array(
            '<head>',
            '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />',
            $this->title(),
            $this->base()
            );
        $head = array_merge($start,$this->links(),$this->scripts());
        array_push($head,'</head>');
        return $head;
    }
    private function title() {
        //
        // Generates the <title> tag.
        //
        return '<title>'.$this->title.($this->title == 'SDSS-III' ? '':' - SDSS-III').'</title>';
    }
    private function base() {
        //
        // Returns the <base> tag appropriate for whatever branch, tag or trunk
        // we are working on.
        //
        if (is_null($this->base)) {
            $url = $this->constants->url;
            $internal = $this->constants->internal;
            $headurl = $this->constants->headurl;
            $regex = '#^\$[LRUdaeH]+: (file|svn\+ssh)://(/srv/svn/sdss3|sdss3svn@sdss3.org)/repo/www/(branches|tags|trunk)(/\S+|)/html/header.php \$$#';
            $n = preg_match($regex,$headurl,$matches);
            // print_r($matches);
            if ($n == 1 && !$this->constants->is_custom()) {
                //
                // Figure out what we've matched.
                //
                if ($matches[3] == 'trunk') {
                    $url = $internal."trunk/";
                } else {
                    if ($matches[3] == 'branches') {
                        $url = $internal."branches".$matches[4]."/";
                    }
                }
            }
            $this->base = "<base href=\"{$url}\" />";
        }
        return $this->base;
    }
    private function links() {
        //
        // Link tags
        //
        $pagetype = $this->type();
        $style = $pagetype == 'index' ? 'index' : 'inner';
        $links = array(
            array('href' => "images/sdss3.ico", 'rel' => 'icon', 'type' => 'image/x-icon'),
            array('href' => "images/sdss3.ico", 'rel' => 'shortcut icon', 'type' => 'image/x-icon'),
            array('href' => "css/styles_{$style}.css", 'rel' => 'stylesheet', 'type' => 'text/css'),
            array('href' => "css/styles.css", 'rel' => 'stylesheet', 'type' => 'text/css'),
            );
        $regex = $this->constants->dr_regex;
        if (preg_match($regex,$pagetype,$matches)) {
            array_push($links,array('href' => "css/{$pagetype}.css", 'rel' => 'stylesheet', 'type' => 'text/css'));
        }
        if ($pagetype == 'press') {
            array_push($links,array('href' => "press/feed.xml", 'rel' => 'alternate', 'type' => 'application/rss+xml','title' => 'SDSS-III Press Releases'));
        }
        //
        // Convert link arrays
        //
        function convert1($linkarray) {
            $l = '<link';
            foreach ($linkarray as $key=>$value) {
                $l .= " {$key}=\"{$value}\"";
            }
            $l .= ' />';
            return $l;
        }
        return array_map('convert1',$links);
    }
    private function scripts() {
        //
        // Generate <script> tags
        //
        $pagetype = $this->type();
        $jsproto = $this->constants->https ? 'https' : 'http';
        $js = array('js/sdss3lib.js');
        if ($pagetype == 'index' || $this->title == 'System Status') {
            array_push($js,"{$jsproto}://platform.twitter.com/widgets.js");
        }
        if ($pagetype == 'index') {
            $indexjs = array('js/jquery-1.3.1.min.js',
                'js/jquery.scrollTo.js',
                'js/featurepanel.js',
                "{$jsproto}://www.google.com/jsapi?key=ABQIAAAA1XbMiDxx_BTCY2_FkPh06RRaGTYH6UMl8mADNa0YKuWNNa8VNxQEerTAUcfkyrr6OwBovxn7TDAH5Q",
                'js/blog.js');
            $js = array_merge($js,$indexjs);
        }
        function convert3($script) {
            return "<script type=\"text/javascript\" src=\"{$script}\"></script>";
        }
        return array_map('convert3',$js);
    }
    private function body() {
        // The start of the body section.
        $body = array(
            '<body>',
			'<script> (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\'); ga(\'create\', \'UA-51460428-1\', \'sdss3.org\'); ga(\'send\', \'pageview\'); </script>',
            '<div class="header">',
            '<form action="search.php" method="post"><p><label for="inputq">Search&nbsp;</label><input type="text" name="q" id="inputq" maxlength="256" size="7" /></p></form>',
            '<p><a href="sitemap.php">Site Map</a></p>',
            '</div><!-- end class="header" -->');
        $myself = $this->path();
        if ($myself[0] == 'sitemap.php') {
            $body[4] = '<p><a class="highlight" href="sitemap.php">Site Map</a></p>';
        }
        return $body;
    }
    private function navbars() {
        //
        // Top menu
        //
        $myself = $this->path();
        $latest = $this->constants->latest;
        $k = $latest;
        $releases = array('DEFAULT' => "http://www.sdss.org/data/");
        while ($k >= $this->constants->first) {
            $releases["DR{$k}"] = "dr${k}/";
            $k--;
        }
        $k = 7;
        while ($k > 0) {
            $releases["DR{$k}"] = "http://classic.sdss.org/dr{$k}/";
            $k--;
        }
		$k = 13;
        while ($k > 10) {
            $releases["DR{$k}"] = "http://www.sdss.org/dr{$k}/";
            $k--;
        }

        $topnav = array(
            'Home' => 'index.php',
            'Surveys' => 'surveys/',
            'Results' => 'science/',
            'Instruments' => 'instruments/',
            'Data Releases' => $releases,
            'Education' => 'education/',
            'Collaboration' => 'collaboration/',
            'Future' => 'future/',
            'Contact' => 'contact.php',
            );
        //print_r($topnav);
        $n = $this->navbar($topnav,$myself[0],'topnav');
        //
        // Middle menu
        //
        $regex = $this->constants->dr_regex;
        $pagetype = $this->type();
        if (preg_match($regex,$pagetype,$matches)) {
            $releasenumber = $matches[1];
            //$dataaccesslink = ($releasenumber == 8) ? "{$pagetype}/data_access.php" : "{$pagetype}/data_access/";
            //$tutorialslink = ($releasenumber == 8) ? "{$pagetype}/help/#tutorial" : "{$pagetype}/tutorials/";
            switch ($pagetype) {
                case "dr8":
                  $midnav = array(
                    'What&apos;s New?' => "{$pagetype}/whatsnew.php",
                    'Scope' => "{$pagetype}/scope.php",
                    'Data Access' => "{$pagetype}/data_access.php",
                    'Imaging' => "{$pagetype}/imaging/",
                    'Optical Spectra' => "{$pagetype}/spectro/",
                    'Algorithms' => "{$pagetype}/algorithms/",
                    'Software' => "{$pagetype}/software/",
                    'Help' => "{$pagetype}/help/",
                    'Glossary' => "{$pagetype}/glossary.php",
                    );
                    break;
                case "dr9":
                  $midnav = array(
                    'What&apos;s New?' => "{$pagetype}/whatsnew.php",
                    'Scope' => "{$pagetype}/scope.php",
                    'Data Access' => "{$pagetype}/data_access/",
                    'Imaging' => "{$pagetype}/imaging/",
                    'Optical Spectra' => "{$pagetype}/spectro/",
                    'Algorithms' => "{$pagetype}/algorithms/",
                    'Software' => "{$pagetype}/software/",
                    'Help' => "{$pagetype}/help/",
                    'Tutorials' => "{$pagetype}/tutorials/",
                    );
                    break;
                case "dr10":
                  $midnav = array(
                    'What&apos;s New?' => "{$pagetype}/whatsnew.php",
                    'Scope' => "{$pagetype}/scope.php",
                    'Data Access' => "{$pagetype}/data_access/",
                    'Imaging' => "{$pagetype}/imaging/",
                    'Optical Spectra' => "{$pagetype}/spectro/",
                    'IR Spectra' => "{$pagetype}/irspec/",
                    'Algorithms' => "{$pagetype}/algorithms/",
                    'Software' => "{$pagetype}/software/",
                    'Help' => "{$pagetype}/help/",
                    'Tutorials' => "{$pagetype}/tutorials/",
                    );
                    break;
                }
            $foot = ($releasenumber < $latest) ?
                "<p>This document describes <span class=\"i\">Data Release {$releasenumber}</span>. The latest data release is <a href=\"http://www.sdss.org/dr{$latest}/\">Data Release {$latest}</a>.</p>" : '';
            $midnav_id = ($releasenumber < $latest) ? 'midnav_older' : 'midnav';
            //print_r($midnav);
            $n = array_merge($n, $this->navbar($midnav,"{$myself[0]}/{$myself[1]}",$midnav_id,$foot));
        }
        return $n;
    }
    private function navbar($nav,$highlight='',$id='',$foot='') {
        //
        // Generate a top-level, horizontal menu.
        //
        $regex = $this->constants->dr_regex;
        $lines = array((strlen($id) > 0) ? "<div class=\"navbar\" id=\"{$id}\">" : '<div class="navbar">');
        array_push($lines,'<ul>');
        foreach ($nav as $key=>$value) {
            if (is_array($value)) {
                $listyle = ($highlight == trim($value['DEFAULT'],'/')) ? ' class="highlight"' : '';
                if (preg_match($regex,$highlight) && preg_match($regex,trim($value['DEFAULT'],'/'))) {
                    $listyle = ' class="highlight"';
                }
                array_push($lines,"<li><a{$listyle} href=\"{$value['DEFAULT']}\">{$key}</a>");
                array_push($lines,'<ul>');
                foreach ($value as $subkey=>$subvalue) {
                    $listyle = ($highlight == trim($subvalue,'/')) ? ' class="highlight"' : '';
                    if ($subkey != 'DEFAULT') {
                        $ext = strpos($subvalue,'http');
                        $extimage = ($ext !== FALSE) ?
                            (($ext == 0) ? '&nbsp;<img src="images/offsite.png" alt="[EXT]" />' : '')
                            : '';
                        array_push($lines,"<li><a{$listyle} href=\"{$subvalue}\">{$subkey}{$extimage}</a></li>");
                    }
                }
                array_push($lines,'</ul></li>');
            } else {
                $listyle = ($highlight == trim($value,'/')) ? ' class="highlight"' : '';
                array_push($lines,"<li><a{$listyle} href=\"{$value}\">{$key}</a></li>");
            }
        }
        array_push($lines,'</ul>');
        if (strlen($foot) > 0) {
            array_push($lines,"{$foot}");
        }
        array_push($lines,'</div><!-- end class="navbar" -->');
        return $lines;
    }
    private function featurepanel() {
        //
        // Feature panel on home page
        //
        if ($this->type() != 'index') {
            return array();
        }
        $lines = array('<div class="clearone"></div>',
            '<div class="featurepanel">',
            '<div id="wrapper">',
            '<div id="mask">',
            );
        $content = array(
            array('id' => 'item1', 'href' => '/',                   'h1' => 'SDSS-III', 'h2' => 'Massive Spectroscopic Surveys of the Distant Universe, the Milky Way Galaxy and Extrasolar Planetary Systems'),
            array('id' => 'item2', 'href' => 'surveys/boss.php',    'h1' => 'BOSS',     'h2' => 'Understanding Our Universe through Baryon Acoustic Oscillations'),
            array('id' => 'item3', 'href' => 'surveys/segue2.php',  'h1' => 'SEGUE-2',  'h2' => 'Mapping the Milky Way'),
            array('id' => 'item5', 'href' => 'surveys/apogee.php',  'h1' => 'APOGEE',   'h2' => 'Probing the evolution of the Milky Way'),
            array('id' => 'item4', 'href' => 'surveys/marvels.php', 'h1' => 'MARVELS',  'h2' => 'Finding and Characterizing Extrasolar Planetary Systems'),
            );
        $panel = array('<div id="panel_links">','<ul>');
        foreach ($content as $c) {
            $contentclass = preg_replace('/item(\d+)/','content$1',$c['id']);
            $link = $c['href'] == '/' ? 'www.sdss3.org' : 'www.sdss3.org/'.$c['href'];
            array_push($lines,"<div id=\"{$c['id']}\" class=\"item\"><div class=\"{$contentclass}\"><p class=\"content_text\"><a href=\"{$c['href']}\"><span class=\"h1\">{$c['h1']}</span><br /><span class=\"h2\">{$c['h2']}</span><br /><br /><span class=\"p\">{$link}</span></a></p></div></div>");
            array_push($panel,"<li><a href=\"#{$c['id']}\" class=\"panel\">{$c['h1']}</a></li>");
        }
        array_push($lines,'</div><!-- end id="mask" -->');
        array_push($lines,'</div><!-- end id="wrapper" -->');
        array_push($lines,'</div><!-- end class="featurepanel" -->');
        array_push($lines,'<div class="clearone"></div>');
        array_push($panel,'</ul>');
        array_push($panel,'</div><!-- end id="panel_links" -->');
        return array_merge($lines,$panel);
    }
    private function side() {
        $start = array('<div class="leftnav">');
        $stuffing = $this->type() == 'index' ? $this->newspanels() : $this->sidemenu();
        $side = array_merge($start,$stuffing);
        array_push($side,'</div><!-- end class="leftnav" -->');
        return $side;
    }
    private function newspanels() {
        //
        // News panels on home page
        //
        $feed = twfeed();
        $content = array(
//            array('id' => 'sdss3spidercontent', 'title' => 'The Data Release 8 Image', 'content' => '<p><a href="images/home/orangespider.jpg" title="Click for a larger image."><img src="images/home/orangespider.thumb.jpg" alt="Image of the universe from SDSS-III" /></a></p>'),
            array('id' => 'sdss3spidercontent', 'title' => 'The Data Release 10 Image', 'content' => '<p><a href="images/home/dr10_galaxy.jpg" title="Click for a larger image."><img src="images/home/dr10_galaxy_thumb.jpg" alt="The Milky Way, showing availble SDSS-III APOGEE spectra" /></a></p>'),
            array('id' => 'sdss3blogcontent', 'title' => 'Latest News from our <a href=\'http://blog.sdss3.org\'>Science Blog</a>', 'content' => 'Loading...'),
            array('id' => 'sdss3statuscontent', 'title' => 'SDSS-III Server Status', 'content' => $feed));
        function convert2($c) {
            return "<div class=\"news-panel\"><h3>{$c['title']}</h3><div id=\"{$c['id']}\">{$c['content']}</div></div>";
        }
        return array_map('convert2', $content);
    }
    private function sidemenu() {
        //
        // Choose a sidemenu to pass to a Sidemenu object.
        //
        $regex = $this->constants->dr_regex;
        $myself = $this->path();
        if (is_array($myself)) {
            $myurl = preg_replace('/index\.php$/','',implode('/',$myself));
            // $myurl = preg_replace('/$\.php$/','',implode('/',$myself));
            if (preg_match($regex,$myself[0])) {
                if (preg_match('#algorithms/bitmask#',$myurl)) {
                    $menufile = $myself[0].'_bitmask';
                } elseif (preg_match('#algorithms/galaxy#',$myurl)) {
                    $menufile = $myself[0].'_galaxy';
                } elseif (preg_match('#algorithms/boss#',$myurl)) {
                    $menufile = $myself[0].'_boss';
                } elseif (preg_match('#algorithms/ancillary/apogee#',$myurl)) {
                    $menufile = $myself[0].'_ancillary_apogee';
                } elseif (preg_match('#algorithms/ancillary/boss#',$myurl)) {
                    $menufile = $myself[0].'_ancillary_boss';
                } elseif (preg_match('#algorithms/ancillary#',$myurl)) {
                    $menufile = $myself[0].'_ancillary';
                } elseif (preg_match('#algorithms/legacy#',$myurl)) {
                    $menufile = $myself[0].'_algorithms_legacy';
                } elseif (preg_match('#algorithms/segue#',$myurl)) {
                    $menufile = $myself[0].'_algorithms_segue';
                } else {
                    $menufile = $myself[0].'_'.$myself[1];
                }
            } else {
                $menufile = ($myself[0] == 'press') ? 'science' : $myself[0];
            }
            $s = new Sidemenu($menufile,$myurl);
        } else {
            $s = new Sidemenu();
        }
        return $s->lines();
    }
    private function h1() {
        //
        // Generates the <h1> tag.
        //
        $press = $this->is_press() ? array('<p class="press">'.$this->pressdate.'</p>') : array();
        $h1 = ($this->title == 'SDSS-III' && $this->type() != 'index') ?
            'This Page Has No Title' : $this->title;
        array_push($press,'<h1 id="Top">'.$h1.'</h1>');
        return $press;
    }
    public function path() {
        //
        // Return the path of the current file within the directory tree
        //
        if (is_null($this->path)) {
            $php_self = $_SERVER['PHP_SELF'];
            if ( preg_match('#^[^/]+\.php$#',$php_self) ) {
                //
                // This should be the case if we run php on the command line.
                //
                $dir = getcwd();
                $html = preg_replace('#^.*/html(/.*|)$#','$1',$dir);
                $php_self = "{$html}/{$php_self}";
            }
            if ($this->constants->is_custom()) {
                $url = preg_replace('#https?://[^/]+#','',$this->constants->url);
                $php_self = str_replace($url,'/',$php_self);
            }
            $myself = explode('/',$php_self);
            //
            // Remove the blank item caused by the leading '/'.
            //
            $foo = array_shift($myself);
            if ($myself[0] == 'internal') {
                //
                // Remove 'internal'
                //
                $foo = array_shift($myself);
                if ($myself[0] == 'branches') {
                    //
                    // Remove 'branches'
                    //
                    $foo = array_shift($myself);
                }
                //
                // Remove the branch name or 'trunk'
                //
                $foo = array_shift($myself);
            }
            // print_r($myself);
            $this->path = $myself;
        }
        return $this->path;
    }
    public function type() {
        if (is_null($this->type)) {
            $myself = $this->path();
            //
            // Key:
            //
            // $pagetype = "generic" - most normal pages
            // $pagetype = "dr8" - subpages of DR8
            // $pagetype = "dr9" - subpages of DR9
            // $pagetype = "dr10" - subpages of DR10
            // $pagetype = "index" - the top-level index.php page
            // $pagetype = "press" - the press/index.php file.
            //
            $regex = $this->constants->dr_regex;
            if ($myself[0] == 'press' && $myself[1] == 'index.php') {
                $pagetype = 'press';
            } elseif (preg_match($regex,$myself[0])) {
                $pagetype = $myself[0];
            } elseif ($myself[0] == 'index.php') {
                $pagetype = 'index';
            } else {
                $pagetype = 'generic';
            }
            $this->type = $pagetype;
        }
        return $this->type;
    }
    public function is_press() {
        return $this->pressrelease;
    }
}
//
// PUBLIC GLOBALS
//
/** @type SiteConstants Define a global constants object. */
$constants = new SiteConstants();
//
// PUBLIC FUNCTIONS
//
/**
 * Generate the main header.
 */
function head($title='',$pressdate='') {
    $constants = $GLOBALS['constants'];
    $h = new Header($title,$pressdate,$constants);
    return $h->value();
}
/**
 * Return a link to the sdss3status twitter feed.
 */
function twfeed($width=0,$height=0) {
    $a = '<a href="https://twitter.com/sdss3status" class="twitter-timeline" data-dnt="true" data-widget-id="263008739827781632"';
    if ($width > 0) {
        $a .= " width=\"{$width}\"";
    }
    if ($height > 0) {
        $a .= " height=\"{$height}\"";
    }
    $a .= '>Tweets by @sdss3status</a>';
    return $a;
}
/**
 * This function should close all <div> tags that are opened in head().
 */
function foot($dummy=NULL) {
    $constants = $GLOBALS['constants'];
    $foot = <<<EOT
<p class="footer">{$constants->copyright}</p>
<table class="footer"><tr><td id="fileft">&nbsp;</td><td id="firight">&nbsp;</td></tr></table>
</div><!-- end class="right_content" -->
</div><!-- end class="main_container" -->
</body>
</html>

EOT;
    return $foot;
}
?>
