<?php include '../../header.php'; echo head('FITS Tutorial'); ?>

<p><a href="dr8/help/#tutorial">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Retrieve FITS Images of Objects?</h2>

<p>This procedure describes how to download a set of FITS images corresponding
to a list of objects that you provide. The input file, which you will
provide, contains the ra and dec of each object in your object list. The
Imaging Query Server is used to retrieve object information and the DAS
Retrieval Form is used to retrieve the actual FITS image files. </p>

<ol>
  <li>Prepare a three-column comma-separated value (CSV) list of your objects. The first two columns should
      contain the ra and dec coordinates of your objects. The last column
      should be set to 1 (which is a separation parameter in arcsec). For example:
      <pre>
      ra,dec,sep
      4.2142,-1.2248,1
      227.6103,61.1158,1
      205.9245,67.0318,1
      199.3531,0.0437,1
      </pre>
  </li>
  <li>Access the <a
      href="http://skyserver.sdss3.org/dr8/en/tools/search/IQS.asp">SDSS
      Imaging Query Server (IQS)</a></li>
  <li>Under Parameters to Return, select "minimal" for the desired set of parameters for your query
      from the scroll box. This will return a csv with the following parameters
    <ul>
      <li>run</li>
      <li>rerun</li>
      <li>camcol</li>
      <li>field</li>
      <li>obj</li>
    </ul>
      You should be aware that one FITS image is 2048x1361 pixels, where 1
      pixel = 0.4 arcsec. You should also be able to use <a
      href="http://hea-www.harvard.edu/RD/ds9/">ds9</a> or other display
      software to see your FITS file.</li>
  <li>Under &quot;Filter names to return (for use by the DAS)&quot;, unselect
      all filters.</li>
  <li>Under Parameters to Return, select &quot;Best Imaging&quot;
      (note that although you can retrieve &quot;Target Imaging&quot;
      <em>parameters</em>, we only provide the &quot;best&quot; <em>images</em>).</li>
  <li>Under Position Constraints, click on the Proximity Search button.</li>
  <li>Cut and paste the CSV file into the Proximity Search scroll box found under the heading &quot;List of ra, dec, [sep].&quot;</li>
  <li>Click on &quot;Submit Request&quot; at the top of the web form to submit your query.</li>
  <li>Look at the results in the html table, or save the resulting CSV
      file.</li>
  <li> Note that the paths to the corrected frames are <code>http://data.sdss3.org/sas/dr8/groups/boss/photoObj/frames/[rerun]/[run]/[camcol]/frame-[band]-[run6]-[camcol]-[field].fits.bz2 </code> (there are also some JPG files there).</li>

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
