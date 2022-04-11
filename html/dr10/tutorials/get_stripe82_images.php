<?php include '../../header.php'; echo head('Stripe 82 Images Tutorial'); ?>

<p><a href="dr10/tutorials/">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Download all the images from Stripe 82?</h2>

<h3>Introduction</h3>

<p>
Stripe 82 is an equitorial region repeatedly imaged during
2005, 2006, and 2007.  This tutorial gives instructions for how to identify
images which cover Stripe 82 and how to download them.  See the
<a href="http://www.sdss3.org/dr10/imaging/imaging_basics.php">Imaging Basics</a>
page for a description of SDSS imaging and how they are organized.
</p>

<p>
  <em>NOTE</em>: This is actually quite a bit of data.  If you really want all the
  Stripe 82 data, it may be more effective to email
  <a href="mailto:helpdesk@sdss.org">helpdesk@sdss.org</a> to
  request an optimized custom data transfer between SDSS and your institution.
</p>


<h3>Identifying Images Covering Stripe 82</h3>

<p>
We want to download the
<a href="dr10/help/glossary.php#corrected_frame">corrected frame files</a> as
<a href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/frames/RERUN/RUN/CAMCOL/frame.html">
described in the data model</a>.
These are grouped in directories <tt>$BOSS_PHOTOOBJ/frames/[RERUN]/[RUN]/[CAMCOL]/</tt>,
e.g. for RUN 301, RERUN 4797, CAMCOL 1:
</p>

<ul>
<li><a href="http://data.sdss3.org/sas/dr10/env/BOSS_PHOTOOBJ/frames/301/4797/1/">http://data.sdss3.org/sas/dr10/env/BOSS_PHOTOOBJ/frames/301/4797/1/</a></li>
</ul>

<p>
Note that RUN is a imaging scan producing a set of raw data;
RERUN is a version of software processing of that data which produces
the corrected frame files.
</p>

<p>
Since we want all Stripe 82 images, we want all CAMCOLs (1-6) and all images
in each directory whose RUN covered Stripe 82 and has a RERUN that
processed it for DR10.
</p>

<p>
We'll use the CAS database to find which RERUN, RUN cover Stripe 82.
The
<a href="http://skyserver.sdss3.org/dr10/en/help/browser/browser.aspx">database schema browser</a>
describes all tables in the CAS database:
</p>

<ul>
  <li>Click the Table link on left to see a list of tables.</li>
  <li>Click the Run link on right to see the details of the Run table.</li>
</ul>

<p>
  From inspecting this Run table, we can see that the query can be done with:
</p>
<pre>
    SELECT rerun, run
    FROM Run
    WHERE stripe = 82
</pre>
<p>
Since this is a simple query, we'll use the
<a href="http://skyserver.sdss3.org/dr10/en/tools/search/sql.aspx">
CAS database web interface</a>:
</p>

<ul>
  <li>Click "Clear Query"</li>
  <li>Enter the query given above</li>
  <li>Choose Output Format "CSV" radio button</li>
  <li>Click Submit</li>
</ul>

<p>
This will run the query and download a file like:
</p>
<pre>
rerun,run
301,4797
301,2700
301,2703
301,2708
...
</pre>

<h3>Downloading the data</h3>

<p>
We now need to convert that file into commands to download the data.
</p>

<p>
For RERUN 301, RUN 4797, CAMCOL 1 these are visible on the web at:<br/>
<a href="http://data.sdss3.org/dr10/env/BOSS_PHOTOOBJ/frames/301/4797/1/">
http://data.sdss3.org/dr10/env/BOSS_PHOTOOBJ/frames/301/4797/1/</a>
</p>

<p>
The files could be directly downloaded via wget but
it will be more efficient to get them via rsync instead, e.g.</p>

<pre>
rsync -aLvz --prune-empty-dirs --progress \
  --include "4797/" --include "?/" --include "frame*.fits.bz2" \
  --exclude "*" \
  rsync://data.sdss3.org/dr10/env/BOSS_PHOTOOBJ/frames/301/ ./301/
</pre>

<p>
Here is an example python script to convert the above CSV file into the
appropriate rsync commands:</p>

<pre>
#!/usr/bin/env python

import sys
import os

#- Template rsync command to run:
cmd_template = """rsync -aLvz --prune-empty-dirs --progress \
    --include "%s/" --include "?/" --include "frame*.fits.bz2" \
    --exclude "*" \
    rsync://data.sdss3.org/dr10/env/BOSS_PHOTOOBJ/frames/%s/ ./%s/"""

#- Loop over CSV file from CAS
fx = open(sys.argv[1])
fx.readline()                       #- clear "rerun,run" header
for line in fx:
    rerun, run = line.strip().split(',')
    cmd = cmd_template % (run, rerun, rerun)
    print cmd
    err = os.system(cmd)
    if err != 0:
        print "ERROR downloading RERUN %s RUN %s" % (rerun, run)

fx.close()
</pre>

<?php echo foot(); ?>

