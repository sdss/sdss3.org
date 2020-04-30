<?php include '../../header.php'; echo head('Data Volume Table'); ?>

<p>The table below lists the sizes of the various data products in DR9.  Note
that the total data volume is almost 60&nbsp;TB.
A substantial fraction (~50%)
of this is raw or intermediate data that is primarily of interest to
experts.  If your institution requires most or all of this
data you may email us at <a
href="mailto:helpdesk@sdss.org">the helpdesk</a> to contact a
data transfer expert.</p>

<ul>
<li><a href="dr9/data_access/volume.php?sort=name">Sort the table below by name.</a></li>
<li><a href="dr9/data_access/volume.php?sort=up">Sort the table below by size (ascending).</a></li>
<li><a href="dr9/data_access/volume.php?sort=down">Sort the table below by size (descending).</a></li>
</ul>

<table class="common">
    <caption>The Data Volume of Data Release 9</caption>
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
function formatsize( $size ) {
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
'boss/calib/dr8_final' => array('size' => 1052040, 'model' => 'PHOTO_CALIB', 'desc' => 'Photometric calibration files'),
'boss/lss' => array('size' => 2264196, 'model' => 'BOSS_LSS_REDUX', 'desc' => 'Large Scale Structure Catalog Files'),
'sdss/target' => array('size' => 9828780, 'model' => 'SDSS_TARGET', 'desc' => 'Legacy targeting files'),
'boss/photoObj/plates' => array('size' => 10567792, 'model' => 'BOSS_PHOTOOBJ/plates', 'desc' => 'Matches to photometry'),
'sdss/tiling' => array('size' => 11861672, 'model' => 'SDSS_TILING', 'desc' => 'Legacy tiling files'),
'sdss/spectro/plates' => array('size' => 12109748, 'model' => 'SPECTRO_MATCH', 'desc' => 'Matches to photometry'),
'boss/photoObj/photoz-weight' => array('size' => 13541832, 'model' => 'BOSS_PHOTOOBJ/photoz-weight', 'desc' => 'Photometric redshift distributions'),
'boss/photoObj/xdqso' => array('size' => 41118772, 'model' => 'BOSS_PHOTOOBJ/xdqso', 'desc' => 'XDQSO catalog'),
'sdss/segue2/target' => array('size' => 68378904, 'model' => 'SEGUE2_TARGET', 'desc' => 'SEGUE-2 target files'),
'sdss/segue1/target' => array('size' => 93232964, 'model' => 'SEGUE_TARGET', 'desc' => 'SEGUE-1 targeting files'),
'boss/photoObj/astromqa' => array('size' => 97740868, 'model' => 'BOSS_PHOTOOBJ/astromqa', 'desc' => 'QA files for astrometry'),
'boss/photoObj/atlasOutline' => array('size' => 139685292, 'model' => 'BOSS_PHOTOOBJ/atlasOutline', 'desc' => 'Files describing image masks'),
'boss/resolve/2010-05-23' => array('size' => 236631736, 'model' => 'PHOTO_RESOLVE', 'desc' => 'Photo resolve files'),
'sdss/segue2/targetAll' => array('size' => 368913896, 'model' => 'SEGUE2_TARGET_ALL', 'desc' => 'SEGUE-2 targeting on all data'),
'boss/sweeps/dr9' => array('size' => 385343176, 'model' => 'PHOTO_SWEEP', 'desc' => 'Photometric sweep catalog'),
'sdss/sspp' => array('size' => 453715576, 'model' => 'SSPP_REDUX', 'desc' => 'SSPP files'),
'boss/photoObj/external' => array('size' => 660480696, 'model' => 'BOSS_PHOTOOBJ/external', 'desc' => 'Matches to other catalogs'),
'sdss/spectro/data' => array('size' => 1433937072, 'model' => 'RAWDATA_DIR', 'desc' => 'Raw SDSS spectroscopy files'),
'boss/spectro/data' => array('size' => 1771373848, 'model' => 'BOSS_SPECTRO_DATA', 'desc' => 'Raw BOSS spectroscopy files'),
'boss/photoObj/301' => array('size' => 3653386392, 'model' => 'BOSS_PHOTOOBJ/RERUN', 'desc' => 'Complete photometric catalog'),
'boss/spectro/redux' => array('size' => 4506642080, 'model' => 'BOSS_SPECTRO_REDUX', 'desc' => '2d &amp; 1d BOSS spectro reductions'),
'sdss/spectro/redux' => array('size' => 5966569696, 'model' => 'SPECTRO_REDUX', 'desc' => '2d &amp; 1d SDSS spectro reductions'),
'boss/target' => array('size' => 2497810860, 'model' => 'BOSS_TARGET', 'desc' => 'BOSS targeting files'),
'boss/photo/redux' => array('size' => 11030764656, 'model' => 'PHOTO_REDUX', 'desc' => 'Photometric reductions'),
'boss/photo/data' => array('size' => 12420110060, 'model' => 'PHOTO_DATA', 'desc' => 'Raw imaging data'),
'boss/photoObj/frames' => array('size' => 16503029764, 'model' => 'BOSS_PHOTOOBJ/frames', 'desc' => 'Corrected frame files'),
'boss/qso' => array('size' => 195960, 'model' => 'BOSS_QSO', 'desc' => 'QSO catalog'),
'boss/lya' => array('size' => 7349456, 'model' => 'BOSS_LYA', 'desc' => 'Ly-&alpha; forest sample'),
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
$sas = 'http://data.sdss3.org/sas/dr9';
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

