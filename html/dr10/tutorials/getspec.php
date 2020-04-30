<?php include '../../header.php'; echo head('Spectra Tutorial'); ?>

<p><a href="dr10/tutorials/">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Get a spectrum of my favorite object?</h2>

<h3>Introduction</h3>

<p>The SDSS <a href="http://skyserver.sdss3.org/dr10/">Catalog Archive Server (CAS)</a> has images, spectra,
and catalog data for every one of the objects in DR8. This tutorial gives instructions for how to use
the CAS to find an SDSS spectrum of a specified object if you know the RA and Dec.</p>

<p>If you don't know the RA and Dec, use an external name resolver, such as
<a href="http://simbad.u-strasbg.fr/simbad/sim-fid">Simbad</a>.  In particular,
see the <a href="http://simbad.u-strasbg.fr/simbad/sim-fid">SIMBAD name resolver</a>:
enter the name in the <b>Identifier</b> field and click <b>Submit Query</b>.</p>

<h3 id="find">Find your object</h3>

<ol>
  <li>Go to the CAS's <a href="http://skyserver.sdss3.org/dr10/en/tools/chart/navi.aspx">Navigate</a> tool.
         To access the tool from the CAS main page, look under <b>Advanced Tools</b>. (To access
         the Navigate tool from the public main page, look under <b>Visual Tools</b>).</li>

  <li>Look at the <b>ra</b> and <b>dec</b> input boxes near the top left of the tool. Enter the coordinates
         of your object. You may enter them either as decimal degrees or as HMS/DMS. If you enter them as HMS/DMS,
         use the format "hh:mm:ss ±dd:mm:ss", and be sure to include seconds even if they are 00. (You may have to
         re-format the results you copied from SIMBAD).</li>

  <li>Click the blue <b>Get Image</b> button. You will see an interactive image of your object in the center
         panel.</li>

  <li>Find your object. Click the directional buttons (<b>NWSE</b>) to pan the image, and click on the <b>+ or - magnifying
         glasses</b> to zoom in our out within the image.</li>

  <li>Under <b>Drawing Options</b>, click on the <i>Objects with Spectra</i> checkbox to mark which objects have SDSS spectra.
      When that option in selected, a red square will appear on all objects for which the SDSS has measured a spectrum.</li>


  <li><p>Optionally, click on one or more of the other Drawing Options checkboxes in the left-hand panel to redraw the
         image with various features selected.</p>

      <p>Here is a list of what each of the drawing options does:</p>

      <table class="noborder" style="width:100%;">
                <tr>
                  <th style="width:20%">Option</th>
                  <th style="width:80%">Meaning</th>
               </tr>
               <tr>
                  <td style="width:20%">Grid</td>
                  <td style="width:80%">Draw a N-S, E-W grid through the center</td>
               </tr>
               <tr>
                  <td style="width:20%">Label</td>
                  <td style="width:80%">Draw the name, scale, ra, and dec on image</td>
               </tr>
               <tr>
                  <td style="width:20%">PhotoObj</td>
                  <td style="width:80%">Draw a small blue circle around each recognized object</td>
               </tr>
               <tr>
                  <td style="width:20%">SpecObj</td>
                  <td style="width:80%">Draw a small red square around each object with a spectrum</td>
               </tr>
               <tr>
                  <td style="width:20%">Target</td>
                  <td style="width:80%">Draw a small yellow cross-hair around each object
                                                             <a href="dr10/help/glossary.php#target">targeted</a>
                                                             for spectroscopy</td>
               </tr>
               <tr>
                  <td style="width:20%">Outline</td>
                  <td style="width:80%">Draw the outline (in green) of each object</td>
               </tr>
               <tr>
                  <td style="width:20%">BoundingBox</td>
                  <td style="width:80%">Draw the bounding box (in pink) of each object</td>
               </tr>
               <tr>
                  <td style="width:20%">Fields</td>
                  <td style="width:80%">Draw the outline of each imaging
                  <a href="dr10/help/glossary.php#field">field</a>
                  (in gray)</td>
               </tr>
               <tr>
                  <td style="width:20%">Masks</td>
                  <td style="width:80%">Draw the outline (in orange) of each mask
                  considered to be important</td>
               </tr>
               <tr>
                  <td style="width:20%">Plates</td>
                  <td style="width:80%">Draw the outline of each spectral
                  <a href="dr10/help/glossary.php#plate">plate</a> (in pink)</td>
               </tr>
               <tr>
                  <td style="width:20%">Invert</td>
                  <td style="width:80%">Invert the image (display as black-on-white)</td>
               </tr>
             </table>
         </li>

         <li>Click on any object that is marked with a red square. You will see the object's data in the right-hand panel.
                The data displayed are the object's ra and dec, and the object's magnitudes in the SDSS's five
                filters (<i>u, g, r, i, z</i>). You will also see a close-up image of the object.</li>

         <li>Click <b>Add to Notes</b> to add the selected object to your online notebook. Click
             <b>Show Notes</b> to show the notebook. From your notebook, you can click <b>Navigate</b> to
             return to the Navigate tool. Click <b>Explore</b> to go to the Explore tool, which is described below.
             You can also <b>Export</b> the notebook to your computer.</li>
</ol>

<h3 id="explore">Explore the Object</h3>

<ol>

  <li>Click the <b>Explore</b> link in the right panel of the Navigate tool to go to the
         <a href="http://skyserver.sdss3.org/dr10/en/tools/explore/obj.aspx">Explore</a> tool.
         To access the tool from the astronomers' main page, look under <b>Advanced Tools</b>. To access
         the tool from the public main page, look under <b>Visual Tools</b>.</li>

  <li>At the top of the Explore tool window, you will see the object's identifier, ra and dec, and SDSS
         long object ID.</li>

  <li>Below the name and position data, you will see a close-up image of the object, with a scale. The
         object's photometric data is to the right of the image. The magnitudes (<i>u, g, r, i, z</i>) are in the first row.</li>

  <li>The Explore tool will show the spectrum below the photometric data. Click on the picture of the spectrum to see a larger
      view. Spectral lines are marked on the spectrum by green and pink dotted lines, as well as labels. The redshift and error
      are shown at the bottom of the spectrum.</li>

  <li>To see the spectrum as a FITS file, click on the <b>FITS</b> link below the <i>SpecObj</i> heading in
         the left-hand menu. Right-click on the <b>Download</b> link to download the spectrum. It will be a
         FITS file with 4 rows and about 4,000 columns.
         </li>



</ol>



<?php echo foot(); ?>

