<?php include 'header.php'; echo head('Site Map');
//
//
//
function find_first_h1($data) {
    $f=stripos($data,"<h1");
    if ($f) {
        $f = stripos($data,">",$f);
        if ($f) {
            $f = $f + 1;
        }
    }
    return $f;
}
//
//
//
function get_h1($filename) {
    if ( $filename == './index.php' ) {
        return 'SDSS-III';
    }
    $h1="";
    $data = file_get_contents($filename);
    $first_line = substr($data,0,strpos($data,"\n"));
    $n = preg_match("#;\\s+echo\\s+head\\(\\s*['\"]([^'\"]*)['\"]#",$first_line,$matches);
    if ($n > 0) {
        $h1 = $matches[1];
    } else {
        //
        // In practice, this section should only be called on the top-level
        // index.php file, or redirect files.
        //
        $m = preg_match("#header\\(\\s*['\"]Location:#",$first_line);
        if ($m > 0) {
            //
            // Found a redirect file
            //
            $h1 = "REDIRECT";
        } else {
            $f=find_first_h1($data);
            if ($f) {
                $b=stripos($data,'</h1>',$f);
                if ($b) {
                    if ($f != $b) {
                        $h1 = substr($data, $f, $b-$f);
                        $h1 = trim($h1);
                    }
                }
            }
        }
    }
    return $h1;
}
//
//
//
function remove_ext($str) {
    $rep="/\.(php|html|htm)$/i";
    $out = preg_replace($rep, "", $str);
    return $out;
}
//
//
//
function list_dir($dir,$indent=0) {
    $tab = '';
    $tcount = 0;
    while ($tcount < $indent) {
        $tab .= '    ';
        $tcount++;
    }
    $iterator = new DirectoryIterator($dir);
    $skipdir=array(".","..",".svn","binaries","css","js","bib","images","internal",
                   "sidemenus","movies","glossary");
    $skipfile=array("header.php","custom.php","bib.php","glosslib.php","TODO.php");
    $dirmap=array('dr10'=>'Data Release 10',
        'dr9'=>'Data Release 9',
        'dr8'=>'Data Release 8',
        'apogee' => 'APOGEE',
        'boss' => 'BOSS',
        'irspec'=>'IR Spectra',
        'spectro'=>'Optical Spectra',
        'segueii'=>'SEGUE-2',
        'data_access'=>'Data Access');
    $keep="/\S+\.php$/i";
    $list = "{$tab}<ul>\n";
    $pcount = 0;
    $svn = FALSE;
    foreach ($iterator as $path) {
        $pstring = $path->getFilename();
        $pcount++;
        if ($path->isDir()) {
            if ($pstring == '.svn') {
                $svn = TRUE;
            }
            if (!in_array($pstring,$skipdir)) {
                $h2name = array_key_exists($pstring,$dirmap) ? $dirmap[$pstring] : ucfirst($pstring);
                $list .= "{$tab}<li><h2>{$h2name}</h2>".PHP_EOL;
                $list .= list_dir($dir . "/" . $pstring,$indent+1);
                $list .= "{$tab}</li>".PHP_EOL;
            }
        } else {
            if (preg_match($keep,$pstring) && !in_array($pstring,$skipfile)) {
                $fpath = $dir . "/" . $pstring;
                $h1 = get_h1($fpath);
                if ($h1 != "REDIRECT") {
                    $hlen=strlen($h1);
                    if ($hlen == 0) {
                        $h1 = remove_ext($pstring);
                    } else if ($hlen >= 4) {
                        $sub=substr($h1, 0, 4);
                        if (0 == strcasecmp($sub,"This")) {
                            $h1 = remove_ext($pstring);
                        }
                    }
                    //echo("<li><a href='" . $fpath . "'>" . $h1 . "</a>" . PHP_EOL);
                    $fpath = preg_replace('#^\./#','',$fpath);
                    $list .= "{$tab}<li><a href=\"{$fpath}\">{$h1}</a></li>".PHP_EOL;
                }
            }
        }
    }
    if ($pcount == 2 || ($pcount == 3 && $svn)) {
        //
        // The directory contained only '.' or '..' or '.svn' and is
        // therefore empty.  This prevents a <ul> from having zero <li>'s,
        // which is invalid.  It is also useful to have a warning about
        // empty directories.
        //
        $list .= "{$tab}<li><em>Empty Directory</em></li>".PHP_EOL;
    }
    $list .= "{$tab}</ul>".PHP_EOL;
    return $list;
}
//
//
//
echo list_dir(".",0);
echo foot();
?>
