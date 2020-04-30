<?php include '../../header.php'; echo head('BOSS Target Selection'); ?>

<p>Target selection is the process of selecting objects from the imaging
survey for spectroscopic followup.  </p>

    <ul>
        <li><a href="dr10/algorithms/boss_target_selection.php#types">Target Types</a></li>
        <li><a href="dr10/algorithms/boss_target_selection.php#runs">Target Runs</a></li>
        <li><a href="dr10/algorithms/boss_target_selection.php#software">Target Software</a></li>
        <li><a href="dr10/algorithms/boss_target_selection.php#varcat">Variability Selected Targets</a></li>
    </ul>

<h2 id="types">Target Types</h2>

<p>In BOSS there are four types of targets, which are described in
more detail at the following links:</p>

<ul>
    <li><a href="dr10/algorithms/boss_galaxy_ts.php">Galaxies</a></li>
    <li><a href="dr10/algorithms/boss_quasar_ts.php">Quasars</a></li>
    <li><a href="dr10/algorithms/boss_std_ts.php">Photometric Standards</a></li>
    <li><a href="dr10/algorithms/ancillary/boss/">Ancillary Programs</a></li>
</ul>

<h2 id="runs">Target Runs Used in BOSS</h2>

<p>A target run specifies both a <a
href="dr10/algorithms/boss_target_selection.php#software">target software</a>
version and a version of the data reductions.  The following table contains
information for the various runs of the targeting code. The tag version is
marked <code>BOSSTARGET_V</code>.
For information on tiling chunks, see the <a
href="dr10/algorithms/boss_tiling.php">tiling</a> page.</p>

<table class="common">
    <tr><th>Target Run</th><th>Version Info</th><th>URLs</th><th>Comments</th></tr>
    <tr style="vertical-align:top;">

        <td id="main016">
            main016
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v2_0_18</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_24</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_10_26</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>dr8_final</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2010-05-23</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>dr8_final</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main016/bosstarget-qso-main016-collate-nosuppz-maskngc40.fits">QSO ngc targets</a>
            <br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main016/bosstarget-qso-main016-collate-nosuppz-sgc40.fits">QSO SGC targets</a>
        </td>
        <td>
            QSO bonus chunks<br /> boss29-*.
        </td>
    </tr>

    <tr style="vertical-align:top;">
        <td id="main015">
            main015
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v2_0_18</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_24</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_10_25</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>dr8_final</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2010-05-23</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>dr8_final</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main015/bosstarget-qso-main015-collate-nosuppz-sgc40.fits">QSO SGC targets</a>
        </td>
        <td>
        QSO chunk boss28
        </td>
    </tr>



    <tr style="vertical-align:top;">
        <td id="main014">
            main014
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v2_0_17</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_23</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_10_1</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>dr8_final</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2010-05-23</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>dr8_final</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main014/bosstarget-qso-main014-collate-nosuppz-maskngc40.fits">QSO NGC targets</a>
        </td>
        <td>
        QSO chunk boss24-boss27
        </td>
    </tr>




    <tr style="vertical-align:top;">
        <td id="main013">
            main013
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v2_0_16</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>trunk</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_10_2</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>dr8_final</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2010-05-23</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>dr8_final</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main013/bosstarget-qso-main013-collate-nosuppz-maskngc40.fits">QSO NGC targets</a>
            <br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main013/bosstarget-qso-main013-collate-nosuppz-sgc40.fits">QSO SGC targets</a>
        </td>
        <td>
        QSO chunk boss19-boss23<br /><br />
        A trunk version of idlutils<br />
        was used but this has no affect<br />
        on the targets
        </td>
    </tr>



    <tr style="vertical-align:top;">
        <td id="main012">
            main012
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v2_0_15a</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_24</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_10_2</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>dr8_final</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2010-05-23</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>dr8_final</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main012/bosstarget-qso-main012-collate-nosuppz-maskngc40.fits">QSO NGC targets</a>
            <br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main012/bosstarget-qso-main012-collate-nosuppz-sgc40.fits">QSO SGC targets</a>
        </td>
        <td>
        QSO chunk boss18<br /><br />
        These targets were actually <br />
        bootstrapped from main011 due<br />
        to some disk failures at LBL.<br />
        </td>
    </tr>

    <tr style="vertical-align:top;">
        <td id="main011">
            main011
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v2_0_15</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_24</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_10_2</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>dr8_final</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2010-05-23</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>dr8_final</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main011/bosstarget-qso-main011-collate-maskngc40.fits">QSO NGC target file</a><br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main011/bosstarget-qso-main011-collate-sgc40.fits">QSO SGC target file</a><br />
        </td>
        <td>
            QSO chunk boss17
        </td>
    </tr>

    <tr style="vertical-align:top;">
        <td id="main010">
            main010
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v2_0_14</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_22</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_10_2</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>dr8_final</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2010-05-23</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>dr8_final</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main010/bosstarget-qso-main010-collate-maskngc40.fits">QSO NGC target file</a><br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main010/bosstarget-qso-main010-collate-sgc40.fits">QSO SGC target file</a><br />
        </td>
        <td>
        QSO chunk boss16<br /><br />
        These files include targets<br />
        selected using multi-epoch<br />
        photometry, when available.<br />
        First chunk where new UKIDSS<br />
        information is also included<br />
        in the ExD processing when <br />
        available, which is in turn <br />
        used in the NN combinator.<br />
        </td>
    </tr>

    <tr style="vertical-align:top;">
        <td id="main009">
            main009
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v2_0_13</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_24</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_10_2</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>dr8_final</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2010-05-23</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>dr8_final</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main009/bosstarget-lrg-main009-collate.fits">LRG target file</a><br />
        </td>
        <td>
            LRGs for chunk boss15-* targeted<br />
            from this run.  This differs<br />
            from main008 in the limit <br />
            ifiber2mag - extinction &lt; 21.5
        </td>
    </tr>


    <tr style="vertical-align:top;">
        <td id="main008">
            main008
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v2_0_9</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_20</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_10_2</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>dr8_final</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2010-05-23</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>dr8_final</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main008/bosstarget-qso-main008-collate-maskngc40.fits">QSO NGC target file</a><br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main008/bosstarget-qso-main008-collate-edfinal-maskngc40.fits">QSO edfinal</a><br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main008/bosstarget-qso-main008-collate-sgc40.fits">QSO SGC target file</a><br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main008/bosstarget-lrg-main008-collate.fits">LRG target file</a><br />
        </td>
        <td>
            LRG chunks boss12-boss14<br /><br />
            QSO chunks boss12-boss13<br /> using "sgc40" subset.<br /><br />
            QSO chunk  boss14 using<br />
            "edcore-maskngc40" <br />
            and bootstrapped from <br />
            main008 using code in <br />
            BOSSTARGET v2_0_12.  <br />
            This file was mistakenly<br />
            used instead of <br />
            edfinal-maskngc40; edcore <br />
            is actually trunk but has<br />
            the same targets.  Should <br />
            reference edfinal in the <br />
            future.<br /><br />
            QSO chunk boss15 uses subset <br />
            file edfinal-maskngc40<br /><br />
            STD chunks boss12-*
        </td>
    </tr>


    <tr style="vertical-align:top;">
        <td id="main007">
            main007
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v2_0_5</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_13</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_9_4</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>2009-11-16.v2</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2009-11-16</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>fall09i</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main007/bosstarget-lrg-main007-collate.fits">LRG target file</a><br />
        </td>
        <td>
            LRGs for Chunk boss7-boss11 <br />targeted from this run.
        </td>
    </tr>


    <tr style="vertical-align:top;">
        <td id="main006">
            main006
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v2_0_4</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_11</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_9_4</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>2009-11-16.v2</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2009-11-16</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>fall09i</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main006/bosstarget-qso-main006-collate-maskngc.fits">QSO NGC target file</a><br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main006/bosstarget-qso-main006-collate-masksgc1.fits">QSO SGC target file</a><br />
        </td>
        <td>
            Chunk boss7-boss10 QSOs targeted <br />
            from this run.<br /><br />
            ngc, masked for bad u data.<br /><br />
            Subset file "maskngc", which <br />
            masks out the bad u-band data,<br />
            was used for boss7 but this <br />
            is not *stated* in the <br />
            plan-boss7.par file.<br /><br />
            Subset file "masksgc1" was <br />
            used for boss9 Unlike <br />
            "maskngc", this does not <br />
            mask out bad data, but <br />
            rather restricts to a <br />
            smaller chunk of the SGC.<br /><br />
            Subset file "maskngc" was <br />
            used for boss10.<br /><br />
            In principle "maskngc" <br />
            should have been used for<br />
            boss8 but I think it was <br />
            not needed since the target <br />
            area was further north than <br />
            the "bad" u data runs. Confirm?
        </td>
    </tr>


    <tr style="vertical-align:top;">
        <td id="main005">
            main005
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v2_0_3</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_11</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_9_4</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>2009-11-16.v2</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2009-11-16</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>fall09i</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main005/bosstarget-qso-main005-collate.fits">QSO target file</a><br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main005/bosstarget-lrg-main005-collate.fits">LRG target file</a><br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main005/bosstarget-std-main005-collate.fits">STD target file</a><br />
        </td>
        <td>
            For QSO,LRG chunks boss5+boss6 <br />
                targeted from this run.<br /><br />
            For STD chunks boss5-boss11 <br />
                targeted from this run.<br /><br />
            No cut on calib_status.<br /><br />
            Full survey available at <br />
            that time.

        </td>
    </tr>

    <tr style="vertical-align:top;">
        <td id="main004">
            main004
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v2_0_2</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_11</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_9_4</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>2009-11-16</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2009-06-14</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>default0</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main004/bosstarget-std-main004-collate.fits">STD target file</a><br />
        </td>
        <td>
            Chunks boss3+boss4 STD targeted from <br />
                this run.
        </td>
    </tr>


    <tr style="vertical-align:top;">
        <td id="main002">
            main002
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v2_0_1</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_11</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_9_4</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>2009-11-16</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2009-06-14</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>default0</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main002/bosstarget-qso-main002-collate.fits">QSO target file</a><br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/main002/bosstarget-lrg-main002-collate.fits">LRG target file</a><br />
        </td>
        <td>
            Chunks boss3+boss4 QSO and <br />
                LRG targeted from this run.<br /><br />
            No cut on calib_status.<br />
        </td>
    </tr>


    <tr style="vertical-align:top;">
        <td id="comm2">
            comm2
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v1_1_2</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_9</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_9_4</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>2009-09-28</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2009-06-14</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>default0</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/comm2/bosstarget-qso-comm2-collate.fits">QSO target file</a><br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/comm2/bosstarget-lrg-comm2-collate.fits">LRG target file</a><br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/comm2/bosstarget-std-comm2-collate.fits">STD target file</a><br />
        </td>
        <td>
            Chunk boss2 LRG+QSO+STD
        </td>
    </tr>

    <tr style="vertical-align:top;">
        <td id="comm">
            comm
        </td>
        <td>
                <table class="noborder">
                    <tr><td><code>BOSSTARGET_V</code></td><td><code>v1_0_4</code></td></tr>
                    <tr><td><code>IDLUTILS_V</code></td><td><code>v5_4_7</code></td></tr>
                    <tr><td><code>PHOTOOP_V</code></td><td><code>v1_9_4</code></td></tr>
                    <tr><td><code>PHOTO_SWEEP</code></td><td><code>2009-06-14</code></td></tr>
                    <tr><td><code>PHOTO_RESOLVE</code></td><td><code>2009-06-14</code></td></tr>
                    <tr><td><code>PHOTO_CALIB</code></td><td><code>default0</code></td></tr>
                </table>
        </td>
        <td>
            <a href="http://data.sdss3.org/sas/dr10/boss/target/comm/bosstarget-qso-comm-collate.fits">QSO target file</a><br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/comm/bosstarget-lrg-comm-collate.fits">LRG target file</a><br />
            <a href="http://data.sdss3.org/sas/dr10/boss/target/comm/bosstarget-std-comm-collate.fits">STD target file</a><br />
        </td>
        <td>
            Chunk boss1 LRG+QSO+STD
        </td>
    </tr>

</table>

<h2 id="software">Targeting Software</h2>

<p>Targets lists for galaxies, quasars and standards were generated using
a unified software framework <code>bosstarget</code>.
This code can be checked out from the svn repository</p>

<pre>
    svn export http://www.sdss3.org/svn/repo/boss/bosstarget/tags/{tag} bosstarget-{tag}
</pre>

<p>Where <code>{tag}</code> represents a "tagged" version of the code.  Targets
used for BOSS spectroscopic followup are always generated using
a tagged version of <code>bosstarget</code></p>

<p>To run the code, make sure the <code>PHOTO_SWEEP</code> environment variable
points to the location of your copy of the <a
href="dr10/imaging/catalogs.php#sweeps">datasweeps</a>
Similarly, make sure <code>PHOTO_RESOLVE</code> points to the relevant
<a href="dr10/algorithms/resolve.php">resolve</a> files and
<code>PHOTO_CALIB</code>
points to the relevant <a
href="http://data.sdss3.org/datamodel/files/PHOTO_CALIB/">calib</a> files.</p>

<p>Then the following IDL commands will execute targeting for a particular
set of imaging runs and camcols</p>
<pre>
    IDL> bt=obj_new('bosstarget')
    IDL> bt-&gt;self-&gt;process_runs, target_type, target_run,  $
            runs=runs, camcols=camcols
</pre>

<p>where <code>target_type</code> is 'lrg','qso','std' and <code>target_run</code>
is an arbitrary string.  There are more options documented in the code.  The
<code>-&gt;process_partial_runs</code> method can be used to process a set of
runs.  The targets can then be collated into a single file using
<code>-&gt;gather</code> or the partial sets using <code>->gather_partial</code>.</p>

<p>After the collation, appropriate <a
href="dr10/algorithms/bitmask_boss_target1.php">BOSS_TARGET1</a> flags can be
applied to limit to a smaller subset of targets.</p>

<p>For QSOs a further trimming is applied in order to limit the target density
to 40/sq degree in "cells" on the sky.  This code is in
<code>/pro/bosstarget_util.pro</code> in the <code>-&gt;subreg_density_tune</code>.</p>

<h2 id="varcat">Variability Selected Targets</h2>

<p>The variability selected catalog used for quasars in chunk boss11
is described in <a href="http://arxiv.org/abs/1012.2391">Palanque-Delabrouille
et al. 2011</a></p>

<?php echo foot(); ?>

