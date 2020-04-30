<?php include '../header.php'; echo head('The Ninth SDSS Data Release (DR9)'); ?>


<?php include 'facts.html'; ?>

<p>Data Release 9 (DR9) offers the latest data from the Sloan Digital Sky Survey. Data
Release 9 is the first release of the spectra from the SDSS-III's Baryon Oscillation
Spectroscopic Survey (BOSS), which includes more than 800,000 spectra over 3,300
square degrees of sky, observed with the new 1,000-fiber BOSS spectrograph.</p>

<p>Data Release 9 also includes all imaging and spectra from prior SDSS data releases, and provides
corrected astrometry for the imaging from Data Release 8.</p>

<p>DR9 also includes
better stellar parameter estimates, provided by an updated SEGUE Stellar Parameter
Pipeline (SSPP). The principal changes from DR8 are summarized in the <a href="dr9/whatsnew.php">
What's New in DR9</a>.</p>


<!-- Include the simple cover check form, which is held in a different file -->
<form action="dr9/index.php#coverage" method="post">
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
echo "Enter the RA/Dec position in decimal degrees or in the format HH:MM:SS / &plusmn;DD:MM:SS.<br />Results will appear in the white space below.";
echo "</td>\n";
echo "</tr>\n";
//
// Results
//
echo "<tr>\n";
echo "<td class=\"resultspane\">\n";
if ($_POST) {
    $message = '';
//    $check = 'http://sdssorgdev.pha.jhu.edu/dr9j/en/tools/search/x_radial.asp?format=html&fp=only&radius=0.02';
    $check = 'http://skyserver.sdss3.org/dr9/en/tools/search/x_radial.asp?format=html&fp=only&radius=0.02';
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
</form>

<table class="figure" style="clear:both;width:300px;">
<tr><td><a href="images/dr9_spectro_coverage.png"><img src="images/dr9_spectro_coverage.thumb300.png" alt="DR9 spectroscopic coverage" style="width:300px;" /></a></td></tr>
<tr><td>DR9 sky coverage<br />(click for a larger version)</td></tr>
</table>


<h2>Using DR9</h2>


<p>The figure to the right shows the sky coverage of DR9. The form to the right allows you
to find whether a sky position (RA and Dec in decimal degrees or HH:MM:SS / &plusmn;DD:MM:SS)
is contained within the DR9 survey area.</p>

<p><a href="dr9/scope.php">The Scope of DR9</a> provides
more detailed information about DR9 sky coverage, and includes a coverage check form that
links directly to SDSS imaging and spectroscopic data.</p>

<p>The items in the menubar above contain the following
information about DR9:</p>
<ul>
  <li><a href="dr9/whatsnew.php">What's new?</a> explains the differences between
  DR9 and previous data releases. </li>
  <li><a href="dr9/scope.php">Scope</a> describes what data are available in DR9, including sky
  coverage, data size, and resolution information.</li>
  <li><a href="dr9/data_access/">Data Access</a> shows how to get common types of SDSS data, and
  provides links to all SDSS data access tools. This is the best place to look for a quick start
  using SDSS data.</li>
  <li><a href="dr9/imaging/">Imaging</a> explains what imaging data DR9 contains.
  It also provides details on the SDSS imaging pipeline, the calibration process, and
  what quantities (including units) are available in the catalog data.</li>
  <li><a href="dr9/spectro/">Spectra</a> explains what spectroscopic data
  are available, and provides details on further data including target flags, redshifts,
  and classifications.</li>
  <li><a href="dr9/algorithms/">Algorithms</a> lists some of the principal SDSS-III
  data processing algorithms, including target selection, and contains complete detail
  on how the algorithms work.</li>
  <li><a href="dr9/software/">Software</a> provides download instructions and documentation
  for a variety of software tools for working with SDSS data.</li>
  <li><a href="dr9/help/">Help</a> contains a glossary, Frequently Asked Questions, and
  other resources to help you get started in using DR9.</li>
  <li><a href="dr9/tutorials">Tutorials</a> provide step-by-step guides to common
  research and teaching tasks using SDSS data. This is a good place to look for guidance
  in doing your science with the SDSS.</li>
</ul>

<p>Complete details about DR9 are documented on this site and in the
<a href="http://adsabs.harvard.edu/abs/2012ApJS..203...21A">Data Release 9 paper</a> 
(Ahn et al., 2012, <i>ApJS, 203</i>, 21).
</p>


<h2>Acknowledging DR9</h2>

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

