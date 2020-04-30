<?php include '../../header.php'; echo head('Finding Chart Tutorial'); ?>

<p><a href="dr9/tutorials/">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Create a finding chart for my telescope?</h2>

<p>With its imaging coverage of large sections of sky, the SDSS-III can be useful for planning telescope observations.
You can use the SDSS <a href="http://skyserver.sdss3.org/dr9/en/">SkyServer</a> to generate a finding
chart to help plan these observations.</p>

<ol>

<li>Go to the <a href="http://skyserver.sdss3.org/dr9/en/tools/chart/chart.asp">Finding Chart</a> tool.
From the astronomers' home page, look under <i>Advanced Tools</i>. From the public home page, look
under <i>SkyServer Tools</i>.</li>

<li>Look at the <b>ra</b> and <b>dec</b> input boxes near the top left of the tool. Enter the coordinates of
your object. You may enter them either as decimal degrees or as HMS/DMS. If you enter them as HMS/DMS, use the
format "hh:mm:ss &plusmn;dd:mm:ss". (If you don't know the coordinates, you can get them from name resolver like
<a href="http://simbad.u-strasbg.fr/simbad/">SIMBAD</a> or
<a href="http://nedwww.ipac.caltech.edu/">NED</a>).</li>

<li>In the <b>scale</b> input box, enter the scale of your telescope in arcseconds per pixel.</li>

<li>In the <b>width</b> and <b>height</b> input boxes, enter the desired size of the image in pixels.</li>

<li>Click on one or more of the <b>Drawing Options</b> checkboxes in the left-hand panel to redraw the
image with various features selected. It is usually a good idea to check <i>InvertImage</i>, to display the image as
white-on-black.</li>

<li>Click <b>Get Image</b>.</li>

<li>Click the printer icon to open a printable finding chart. The finding chart print white-on-black,
and it will display the ra and dec of the center, as well as the scale. It will also have a space to take
notes.</li>

</ol>



<?php echo foot(); ?>
