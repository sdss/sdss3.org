<?php include '../../header.php'; echo head('Proper Motion Tutorial'); ?>

<p><a href="dr8/help/#tutorial">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Get Flags and Proper Motion for a List of Targets?</h2>

<p>The following procedure outlines how to use the CAS Imaging Query Server
(IQS) to obtain flags and proper motion for a list of targets.</p>
<ol>
  <li>Access the <a
      href="http://skyserver.sdss3.org/dr8/en/tools/search/IQS.asp">SDSS
      Imaging Query Server (IQS)</a>.</li>
  <li>Select whether you want html output to look at the results in
      your browser, or csv output to save them to a file which you can
      later upload to the Data Archive Server to retrieve images or spectra.</li>
  <li>In the Imaging parameters window, select the list of parameters you want. If you
      will be using the results to collect data from the DAS, you will need to select
      the "minimal" set.
      They are listed by alphabetical order. The list and some explanations are
      given in <a href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/RERUN/RUN/CAMCOL/photoObj.html"> the photoObj file description
      </a>. Flags are described
      in <a href="dr8/algorithms/flags_detail.php">the photometric flags page</a>. You can select
      one block of contiguous items by using the usual shift-click, or
      non-contiguous itmes using ctrl-click.</li>
  <li>In the &quot;Position Constraints&quot; panel you can search a rectangular area, a
      circular area (Cone Search), or for the closest object only
      (Proximity Search). For the Proximity Search, your upload file (or the
      window containing the coordinates) must have as the first line
      &quot;ra,dec,sep&quot;, and the separation must be specified in
      arcseconds (max 10). If you specify both an upload file and give
      coordinates in the window, the upload file will be used.</li>
  <li>In the &quot;Imaging Constraints&quot; you can place constraints
      based on magnitudes, colors or flags.</li>
  <li>Submit your query</li>
</ol>

<p>To get fits images, <i>e.g.</i>, of your targets:</p>
<ol>
  <li>Select csv output and save the csv file to disk.</li>
  <li>Go to the <a href="http://das.sdss.org/www/html/post_fields.html">DAS
      imaging data retrieval form</a>.</li>
  <li>Select "All data" for the data release choice, because the CSV generated
      by the "minimal" columns as instructed above includes the rerun.</li>
  <li>Select the result csv file from above in the "select file to
      upload" box.</li>
  <li>Click on "Submit Request" at the bottom of the page.</li>
  <li>Under "File types," select the types of files you want to
      download (fpC or drC for fits images, for example).</li>
  <li>Since either "wget" or "rsync" under the "Download Selection"
      section, depending on how you want to download your data.</li>
  <li>Hit the "request" button at the bottom of the page. When
      queried by your browser, choose where to save the file.</li>
  <li>Follow the instructions in
      the <a href="http://das.sdss.org/www/html/das2.html#interactive">Interactive
      download tools</a> section of the DAS home page to download the
      files you requested.</li>
</ol>

<?php echo foot(); ?>
