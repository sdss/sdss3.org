<?php include '../../header.php'; echo head('Data Volume Table'); ?>

<p>The table below lists the sizes of the various data products in DR10.  Note
that the total data volume is about 70&nbsp;TB.
A substantial fraction (~50%)
of this is raw or intermediate data that is primarily of interest to
experts.  If your institution requires most or all of this
data you may email us at <a
href="mailto:helpdesk@sdss.org">the helpdesk</a> to contact a
data transfer expert.</p>

<ul>
<li><a href="dr10/data_access/volume.php?sort=name">Sort the table below by name.</a></li>
<li><a href="dr10/data_access/volume.php?sort=up">Sort the table below by size (ascending).</a></li>
<li><a href="dr10/data_access/volume.php?sort=down">Sort the table below by size (descending).</a></li>
</ul>

<table class="common">
    <caption>The Data Volume of Data Release 10</caption>
    <tr>
        <th>Directory</th>
        <th>Description</th>
        <th style="text-align:right;padding-left:1em;">Size</th>
        <th style="text-align:right;padding-left:1em;">Running Total</th>
    </tr>
<?php
//
// $_GET = array('sort' => 'down');
//
function vol_up($a,$b) {
    if ($a['size'] == $b['size']) {
        return 0;
    }
    return ($a['size'] < $b['size']) ? -1 : 1;
}
//
//
//
function vol_down($a,$b) {
    if ($a['size'] == $b['size']) {
        return 0;
    }
    return ($b['size'] < $a['size']) ? -1 : 1;
}
//
//
//
function formatsize( $bsize ) {
    $size = $bsize/1024.0;  // Convert to kB
    if ($size < 1024) {
        return sprintf("%d&nbsp;kB",$size);
    } elseif ( $size/1024.0 < 1024 ) {
        return sprintf("%.2f&nbsp;MB",$size/1024.0);
    } elseif ( $size/1024.0/1024.0 < 1024 ) {
        return sprintf("%.2f&nbsp;GB",$size/1024.0/1024.0);
    } else {
        return sprintf("%.2f&nbsp;TB",$size/1024.0/1024.0/1024.0);
    }
}
//
//
//
$volume = array(
'boss/calib/dr8_final' => array('size' => 992600366, 'model' => 'PHOTO_CALIB', 'desc' => 'Photometric calibration files'), // Shouldn't change
'boss/lss' => array('size' => 2318488265, 'model' => 'BOSS_LSS_REDUX', 'desc' => 'Large Scale Structure Catalog Files'), // DR9 VALUE!
'sdss/target' => array('size' => 10044386055, 'model' => 'SDSS_TARGET', 'desc' => 'Legacy targeting files'), // Shouldn't change
'boss/photoObj/plates' => array('size' => 10773646902, 'model' => 'BOSS_PHOTOOBJ/plates', 'desc' => 'Matches to photometry'), // Shouldn't change
'sdss/tiling' => array('size' => 11930655621, 'model' => 'SDSS_TILING', 'desc' => 'Legacy tiling files'), // Shouldn't change
'sdss/spectro/plates' => array('size' => 12348111476, 'model' => 'SPECTRO_MATCH', 'desc' => 'Matches to photometry'), // Shouldn't change
'boss/photoObj/photoz-weight' => array('size' => 13864401389, 'model' => 'BOSS_PHOTOOBJ/photoz-weight', 'desc' => 'Photometric redshift distributions'), // Shouldn't change
'boss/photoObj/xdqso' => array('size' => 42018330651, 'model' => 'BOSS_PHOTOOBJ/xdqso', 'desc' => 'XDQSO catalog'), // Shouldn't change.
'sdss/segue2/target' => array('size' => 69980062130, 'model' => 'SEGUE2_TARGET', 'desc' => 'SEGUE-2 target files'), // Shouldn't change.
'sdss/segue1/target' => array('size' => 95470083596, 'model' => 'SEGUE_TARGET', 'desc' => 'SEGUE-1 targeting files'), // Shouldn't change.
'boss/photoObj/astromqa' => array('size' => 86746581774, 'model' => 'BOSS_PHOTOOBJ/astromqa', 'desc' => 'QA files for astrometry'), // Shouldn't change.
'boss/photoObj/atlasOutline' => array('size' => 88609613471, 'model' => 'BOSS_PHOTOOBJ/atlasOutline', 'desc' => 'Files describing image masks'), // Shouldn't change.
'boss/resolve/2010-05-23' => array('size' => 229423318311, 'model' => 'PHOTO_RESOLVE', 'desc' => 'Photo resolve files'), // Shouldn't change.
'sdss/segue2/targetAll' => array('size' => 377734409969, 'model' => 'SEGUE2_TARGET_ALL', 'desc' => 'SEGUE-2 targeting on all data'), // Shouldn't change, but using DR9 value
'boss/sweeps/dr9' => array('size' => 553520783305, 'model' => 'PHOTO_SWEEP', 'desc' => 'Photometric sweep catalog'), // Now includes WISE sweeps along with DR9 sweeps
'sdss/sspp' => array('size' => 459624978640, 'model' => 'SSPP_REDUX', 'desc' => 'SSPP files'), // Shouldn't change, but using DR9 value
'boss/photoObj/external' => array('size' => 765736993551, 'model' => 'BOSS_PHOTOOBJ/external', 'desc' => 'Matches to other catalogs'), // All matches are DR8, except PM is DR9 and WISE is DR10
'sdss/spectro/data' => array('size' => 1465198946110, 'model' => 'RAWDATA_DIR', 'desc' => 'Raw SDSS spectroscopy files'), // Shouldn't change.
'boss/spectro/data' => array('size' => 2484617234793, 'model' => 'BOSS_SPECTRO_DATA', 'desc' => 'Raw BOSS spectroscopy files'), // DR9 + DR10
'boss/photoObj/301' => array('size' => 3739159067919, 'model' => 'BOSS_PHOTOOBJ/RERUN', 'desc' => 'Complete photometric catalog'), // Shouldn't change
'boss/spectro/redux' => array('size' => 7249831810867, 'model' => 'BOSS_SPECTRO_REDUX', 'desc' => '2d &amp; 1d BOSS spectro reductions'), // v5_5_12
'sdss/spectro/redux' => array('size' => 6228571791441, 'model' => 'SPECTRO_REDUX', 'desc' => '2d &amp; 1d SDSS spectro reductions'), // DR9 value + galaxy reductions
'boss/target' => array('size' => 2557530396922, 'model' => 'BOSS_TARGET', 'desc' => 'BOSS targeting files'), // Shouldn't change
'boss/photo/redux' => array('size' => 11235662711220, 'model' => 'PHOTO_REDUX', 'desc' => 'Photometric reductions'), // Shouldn't change
'boss/photo/data' => array('size' => 12698673058931, 'model' => 'PHOTO_DATA', 'desc' => 'Raw imaging data'), // Shouldn't change
'boss/photoObj/frames' => array('size' => 16910579073045, 'model' => 'BOSS_PHOTOOBJ/frames', 'desc' => 'Corrected frame files'), // Shouldn't change
'apogee/target' => array('size' => 6334881168, 'model' => 'APOGEE_TARGET', 'desc' => 'APOGEE target files'), // NEW in DR10
'apogee/spectro/data' => array('size' => 8319619726423, 'model' => 'APOGEE_DATA', 'desc' => 'Raw APOGEE spectroscopy files'), // NEW in DR10
'apogee/spectro/redux' => array('size' => 2511912320100, 'model' => 'APOGEE_REDUX', 'desc' => 'APOGEE spectro reductions'), // NEW in DR10
);
//
// Default sort method
//
ksort($volume);
//
// See whether some other sort method was requested.
//
if ($_GET) {
    if (array_key_exists('sort',$_GET)) {
        if ($_GET['sort'] == 'up' || $_GET['sort'] == 'down') {
            uasort($volume,"vol_{$_GET['sort']}");
        }
    }
}
$running = 0;
$sas = 'http://data.sdss3.org/sas/dr10';
$dm = 'http://data.sdss3.org/datamodel/files';
foreach ($volume as $key=>$value) {
    $running += $value['size'];
    $fsize = formatsize($value['size']);
    $frun = formatsize($running);
    echo "    <tr>\n";
    echo "        <td><a href=\"{$sas}/{$key}/\">{$key}</a></td>\n";
    echo "        <td><a href=\"{$dm}/{$value['model']}/\">{$value['desc']}</a></td>\n";
    echo "        <td style=\"text-align:right;padding-left:1em;\">{$fsize}</td>\n";
    echo "        <td style=\"text-align:right;padding-left:1em;\">{$frun}</td>\n";
    echo "    </tr>\n";
}
echo "</table>\n";
echo foot();
?>

