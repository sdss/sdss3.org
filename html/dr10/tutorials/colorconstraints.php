<?php include '../../header.php'; echo head('Obtaining Spectra based on Color Constraints'); ?>

<p><a href="dr10/tutorials/">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Find all Objects with Spectra that Satisfy a
Given Set of Color Constraints and then Get the Spectra?</h2>

<h3>Introduction</h3>

<p>This query, in particular, finds spectra for all objects at the hot
end of the WD cooling sequence. For a simple example, this list is
defined as objects with g-r &lt;-0.15 and u-g &lt;0.4.&nbsp; Normally,
when querying based on filter or color magnitudes, you should also
make sure all the appropriate <a
href="dr10/algorithms/flags_detail.php">photo QA flags</a> are set
properly (to indicate the object's photometry is trustworthy), but in
this case, since all these objects have spectra, we will assume they
were targeted and allocated a fiber based on good photometric
magnitudes, so we don't bother to check the QA flags.</p>

<h3>Finding the Objects</h3>

<ol>
  <li>Go to the <a
  href="http://skyserver.sdss3.org/dr10/en/tools/search/SQS.aspx">Spectro
  Query Server</a> .</li>
  <li>Select "html" as output format if you want to look at your query
      results in your browser, or "csv" to save them in a
      &quot;comma-separated values&quot; file which you can use to
      retrieve spectra from the Data Archive Server later</li>
  <li>At the first line, enter 0 to have your query return an unlimited number
  of output rows/objects.</li>
  <li>Select &quot;minimal&quot; under &quot;Spectroscopy Parameters&quot; under &quot;Parameters to
  Return&quot;. This will return the MJD, plate, and fiberID that you will need to
  actually get the spectra from the DAS. Make sure none of the
  filters are checked in the "Filter (for DAS use)" section.</li>
  <li>Select the Best radio button between the parameter listboxes.</li>
  <li>Under Position Constraints, make sure &quot;No Position Constraint&quot; is
  selected.</li>
  <li>Enter 0.4 in the &quot;u-g max&quot; box.</li>
  <li>Enter -0.15 in the &quot;g-r max&quot; box.</li>
  <li>Unselect &quot;Extended Sources&quot; and make sure &quot;Point Sources&quot; is selected in
  the &quot;Object Type&quot; section of the form.</li>
  <li>Verify that nothing else is selected.</li>
  <li>Click on &quot;Submit Request&quot;. Depending on database load,
      this query takes about half a minute to run and returns 3493 objects.</li>
</ol>

<h3>To get the actual spectra for these objects:</h3>

<ol>
  <li>Select csv output and save the csv file to disk.</li>
  <li>Go to the <a href="http://data.sdss3.org/bulkSpectra">SAS
      bulk spectroscopic data retrieval form</a>.</li>
  <li>Copy and paste the csv contents into the form.</li>
  <li>Click on "submit".</li>
  <li>Select the desired spectra and click "Download FITS files"</li>
</ol>

<?php echo foot(); ?>
