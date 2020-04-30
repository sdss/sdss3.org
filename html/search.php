<?php include 'header.php'; echo head('Search');
//
//
//
echo <<<EOT

<form action="search.php" method="post">
    <p>
        <label for="inputq2">Search&nbsp;</label><input type="text" name="q" id="inputq2" maxlength="256" size="15" />
        <input type="submit" name="submit" value="Submit" />
    </p>
</form>

EOT;
//
// $_POST = array('q' => 'astrometry');
//
if ($_POST) {
    $esc = str_replace('/','&#x2F;',htmlspecialchars($_POST['q'], ENT_QUOTES|ENT_XHTML));
    $google = 'https://www.google.com/cse?';
    $google .= 'cx=008884305151858193238:gdzhyyw8zrw&';
    $google .= 'client=google-csbe&';
    $google .= 'output=xml_no_dtd&';
    $url = $google.'q='.urlencode($esc);
    $xml = simplexml_load_file($url);
    if ($xml) {
        $resultstring = "<h2>Results for <q>{$esc}</q></h2>".PHP_EOL;
        foreach ($xml->RES->R as $result) {
            $resultstring .= '<h3>' . $result->T . '</h3>' . PHP_EOL;
            $resultstring .= '<p>' . str_ireplace('<br>','<br />',$result->S) . '</p>' . PHP_EOL;
            $resultstring .= "<p><a href=\"{$result->UE}\">{$result->U}</a></p>" . PHP_EOL;
        }
        echo $resultstring;
    }
}
//
//
//
echo foot();
?>
