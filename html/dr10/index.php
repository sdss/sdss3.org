<?php include '../header.php'; echo head('The Tenth SDSS Data Release (DR10)'); ?>

<?php include 'facts.html'; ?>

<p>Data Release 10 (DR10) offers the latest data from the Sloan Digital Sky Survey. 
DR10 is the first release of the spectra from the SDSS-III's Apache Point Observatory 
Galactic Evolution Experiment (APOGEE), which uses infrared spectroscopy to study tens
of thousands  of stars in the Milky Way.</p>

<p>DR10 also includes hundreds of thousands of new galaxy and quasar
spectra from the Baryon Oscillation Spectroscopic Survey (BOSS), in
addition to all imaging and spectra from prior SDSS data releases. The
principal changes from DR9 are summarized in
the <a href="dr10/whatsnew.php">What's New in DR10</a>.</p>

<p>&nbsp;</p>

<!-- Include the simple cover check form, which is held in a different file -->
<!--
<form action="dr10/index.php#coverage" method="post">
<?php
//
// Validate user input
//
function validate_coordinate($input) {
    return is_numeric($input) ||
        (preg_match('/(\+|-|)\d\d:\d\d:\d\d(\.\d+|)/',$input) > 0);
}
//
// Values for testing:
//
// $_POST = array('coverageRA' => '12:15:19.56', 'coverageDec' => '+21:51:33.33');
// $_POST = array('coverageRA' => '186.4567', 'coverageDec' => '-1.23567');
//
// Input section
//
echo "<table class=\"common\" id=\"coverage\" style=\"float:right;width:300px;margin:1em;\">\n";
echo "<caption>Imaging coverage check</caption>\n";
echo "<tr>\n";
echo "<td style=\"text-align:center\">";
$value = ($_POST) ? $_POST['coverageRA'] : '0';
echo "        <label for=\"coverageRA\">RA</label>&nbsp;<input type=\"text\" name=\"coverageRA\" id=\"coverageRA\" style=\"width:33%;\" value=\"{$value}\" />&nbsp;&nbsp;&nbsp;\n";
$value = ($_POST) ? $_POST['coverageDec'] : '0';
echo "        <label for=\"coverageDec\">Dec</label>&nbsp;<input type=\"text\" name=\"coverageDec\" id=\"coverageDec\" style=\"width:33%;\" value=\"{$value}\" />\n";
echo "</td>\n";
echo "</tr>\n";
//
// Instructions
//
echo "<tr>\n";
echo "<td style=\"text-align:center\">";
echo " <input type=\"submit\" name=\"footprintCheckButton\" value=\"Check\" />";
echo "</td>\n";
echo "</tr>\n";
echo "<tr>\n";
echo "<td style=\"text-align:center;\">";
echo "Enter the RA/Dec position in decimal degrees or in the format HH:MM:SS / &plusmn;DD:MM:SS.<br />Results will appear in the white space below. <span class=\"todo\">TODO: wont work until 
DR10 SkyServer is loaded</span>";
echo "</td>\n";
echo "</tr>\n";
//
// Results
//
echo "<tr>\n";
echo "<td class=\"resultspane\">\n";
if ($_POST) {
    $message = '';
    $check = 'http://skyserver.sdss3.org/dr10/en/tools/search/x_radial.aspx?format=html&fp=only&radius=0.02';
    if (validate_coordinate($_POST['coverageRA'])) {
        $check .= '&ra='.urlencode($_POST['coverageRA']);
    } else {
        $message .= "<span class=\"errormsg\">You have entered an invalid RA value. RA should be either in decimal degrees or in the form HH:MM:SS (seconds are required even if zero).</span>\n";
    }
    if (validate_coordinate($_POST['coverageDec'])) {
        $check .= '&dec='.urlencode($_POST['coverageDec']);
    } else {
        $message .= "<span class=\"errormsg\">You have entered an invalid Dec value. Dec should be either in decimal degrees or in the form &plusmn;DD:MM:SS (seconds are required even if zero).</span>\n";
    }
    if (strlen($message) > 0) {
        echo $message;
    } else {
        $result = file_get_contents($check);
        if ($result) {
            $result = preg_replace('#</?h3>#','',$result);
            $result = preg_replace('#<br>#','',$result);
            $result = preg_replace('#<font color=([^>]+)>#', '<span style="font-size:large;color:$1;">', $result);
            $result = preg_replace('#</font>#', '</span>', $result);
            echo "        {$result}\n";
        } else {
            echo "<span class=\"errormsg\">Error retrieving coverage information. Please try again. If you continue to experience problems, please contact the <a href=\"mailto:helpdesk@sdss3.org\">SDSS helpdesk</a>.</span>\n";
        }
    }
}
echo "</td>\n";
echo "</tr>\n";
echo "</table>";
?>
</form> -->

<table class="figure" style="clear:both;width:300px;">
<tr><td><a href="images/dr10_spectro_coverage.png"><img src="images/dr10_spectro_coverage.thumb300.png" alt="DR10 SDSS/BOSS coverage" style="width:300px;" /></a></td></tr>
<tr><td>DR10 SDSS/BOSS sky coverage<br />(click for a larger version)<br /></td></tr>
<tr><td><a href="images/apogee_fields_dr10.jpg"><img src="images/apogee_fields_dr10.jpg" alt="DR10 APOGEE coverage" style="width:300px;" /></a></td></tr>
<tr><td>DR10 APOGEE sky coverage<br />(click for a larger version)<br /></td></tr>
</table>


<h2>Using DR10</h2>


<p>The figures to the right shows the sky coverage of DR10. The top figure shows the sky coverage in imaging 
and optical spectroscopy; the bottom figure shows the sky coverage in infrared spectroscopy.</p>
<!--The form to the right allows you
to find whether a sky position (RA and Dec in decimal degrees or HH:MM:SS / &plusmn;DD:MM:SS)
is contained within the DR10 survey area. -->

</p>

<p><a href="dr10/scope.php">The Scope of DR10</a> provides
more detailed information about DR10 sky coverage, and includes a coverage check form that
links directly to SDSS imaging and optical spectroscopy data.</p>

<p>The items in the menubar above contain the following
information about DR10:</p>
<ul>
  <li><a href="dr10/whatsnew.php">What's new?</a> explains the differences between
  DR10 and previous data releases. </li>
  <li><a href="dr10/scope.php">Scope</a> describes what data are available in DR10, including sky
  coverage, data size, and resolution information.</li>
  <li><a href="dr10/data_access/">Data Access</a> shows how to get common types of SDSS data, and
  provides links to all SDSS data access tools. This is the best place to look for a quick start
  using SDSS data.</li>
  <li><a href="dr10/imaging/">Imaging</a> explains what imaging data DR10 contains.
  It also provides details on the SDSS imaging pipeline, the calibration process, and
  what quantities (including units) are available in imaging catalog data.</li>
  <li><a href="dr10/spectro/">Optical Spectra</a> explains what data are available from the SDSS's two 
  optical spectrographs (SDSS-I and BOSS), and provides details on associated data including 
  target flags, redshifts, and classifications.</li>
  <li><a href="dr10/irspec/">Infrared Spectra</a> explains what data are available 
  from the SDSS's new APOGEE infrared spectrograph, and provides details on associated data including 
  information on the spectra, targets, radial velocities, and determinations of stellar atmospheric 
  parameters.</li> 
  <li><a href="dr10/algorithms/">Algorithms</a> lists some of the principal SDSS-III
  data processing algorithms, including target selection, and contains complete details 
  on how the algorithms work.</li>
  <li><a href="dr10/software/">Software</a> provides download instructions and documentation
  for a variety of software tools for working with SDSS data.</li>
  <li><a href="dr10/help/">Help</a> contains a glossary, Frequently Asked Questions, and
  other resources to help you get started in using DR10.</li>
  <li><a href="dr10/tutorials">Tutorials</a> provide step-by-step guides to common
  research and teaching tasks using SDSS data. This is a good place to look for guidance
  in doing your science with the SDSS.</li>
</ul>

<p>Complete details about DR10 are documented on this site and in the <A HREF="science/dr10.pdf">Data Release 10 paper</A>
(Ahn et al. 2013, submitted to <i>ApJS</i> and posted at <A HREF="http://arxiv.org/abs/1307.7735">arXiv:1307.7735</A>).</p>


<h2>Acknowledging DR10</h2>

<p>Publications using SDSS data are required to include the complete <a
href="collaboration/boiler-plate.php">official SDSS-III acknowledgment</a>.
Data from the SDSS-III public archive may not be used for any
commercial publication or other commercial purpose except with
explicit approval by the Astrophysical Research Consortium
(ARC). Requests for such use should be directed to the ARC Corporate
Office via ARC's Business Manager:</p>

<table class="contact">
<tr><td>Michael L. Evans</td></tr>
<tr><td>ARC Business Manager</td></tr>
<tr><td>c/o University of Washington, Department of Astronomy</td></tr>
<tr><td>Box 351580</td></tr>
<tr><td>Seattle, WA 98195</td></tr>
<tr><td>Phone: 206-685-7857</td></tr>
<tr><td>email: evans -at- astro dot washington dot edu.</td></tr>
</table>

<?php echo foot();?>

