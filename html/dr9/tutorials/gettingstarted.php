<?php include '../../header.php'; echo head('Downloading the data'); ?>

<p><a href="dr9/tutorials/index.php">Back to Tutorials</a></p>

<h2>How do I...</h2>

<h2>Get the data?</h2>


<h2>Jump to:</h2>
<ul>
   <li><a href="dr9/tutorials/gettingstarted.php#commands">Commands for getting the data (wget, rsync)</a></li>
   <li><a href="dr9/tutorials/gettingstarted.php#segue2">Getting the data: SEGUE-2</a></li>
   <li><a href="dr9/tutorials/gettingstarted.php#boss">Getting the data: BOSS (imaging and spectral)</a></li>
   <li><a href="http://api.sdss3.org/examples.html">Automating spectrum downloads from a script (e.g. Python) <img src="images/offsite.png" alt=" (offsite)" /></a></li>   
</ul>



<h2 id="commands">Commands for getting the data</h2>
<h3>Overview</h3>
<p>At the moment the data are distributed from the Science Archive Server (<a href="http://data.sdss3.org">SAS</a>), using
two main commands, rsync and wget.  To browse the available data, you might want
to start at the <a href="http://data.sdss3.org/sas/dr9">top level</a>.</p>


<h3>rsync</h3>
<p>First, a disclaimer: the full data volume of the DR9 sample is tens of
terabytes (see <a href="dr9/data_access/volume.php">this table</a> for specifics).
rsync (and http) are <b>not</b> designed for such large data
transfers.  If you really do need the full data set, please
contact the <a href="mailto:helpdesk@sdss3.org">Help Desk</a> to talk to a
data transfer expert who can arrange a custom transfer.  This will be faster for you and
easier on our servers.</p>

<p>Now, below is a typical rsync command:</p>
<pre>
rsync -av rsync://data.sdss3.org/dr9/boss/spectro/data/[MJD]/ [MJD]/
</pre>
<p>This particular command will give you an MJD's data.</p>

<h2 id="segue2">Getting the data: SEGUE-2</h2>

<h3>General Description</h3>

<p>
The data in the <a href="http://dr9.sdss3.org/">DR9 SAS</a> (and the mirror, <a href="http://mirror.sdss3.org/">SAM</a>)
are "clean" samples of SEGUE-2 data. This definition of "clean" specifically covers two things:</p>
<ul>
    <li>All the plates in the list are SEGUE-2 plates, so no need to separate from MARVELS or BOSS plates. </li>
    <li>A plate is not available at until after it is finished. That means that once you download a plate directory, all you have to do is sort to get the version of the data files that have the latest MJD in the filename and you will get all the S/N there is to get for that plate. </li>
</ul>

<p>There are a few exceptions to the latest-MJD-is-best rule. See "Notes on individual plates" below.</p>

<p>NOTE that there are "rerun" numbers, 104 for the spectra and 122 for the stellar parameters. Those rerun numbers are used to designate different versions of the pipeline software. If those get changed you will get many obtrusive announcements to tell you about it, but PLEASE do keep track. The rerun number for the spectra hasn't changed since March 2010 (rerun 104), and is the same pipeline that was run for DR7. Rerun 122 for the SSPP is new for DR9, and has been run on all the SEGUE-1, SEGUE-2 and SDSS legacy plates. This rerun of the SSPP has several improvements over the version used for SSPP rerun 116 (from DR8) and rerun 104 (which was used for DR7).</p>

<p>The <a href="http://data.sdss3.org/datamodel">data model</a> tells you what's what in each file. Easiest is probably to use the file index link at the data model top page.</p>

<p>From the plate subdirectories, the most useful files are the spZbest files (containing parameters measured from the spectra, e.g. redshift, etc) and spPlate files (containing the spectra themselves). For the SSPP outputs, the ssppOut files contain all the stellar parameters, the ssppOut-*-lineindex.fit files contain the measured line indices, and the ssppOut-*.ps.gz files have the condensed plots for the SSPP diagnostic outputs. There are also SSPP diagnostic plots for each object, with instructions for getting them below.</p>

<p>You can get data from the Science Archive Mirror by substituting mirror.sdss3.org for data.sdss3.org in all the commands below.</p>

<h3>Spectra</h3>

<p>To get the spectra you can use the following wget command.
Warning, it will take a long time (10 minutes, last time I checked)
to download a lot of index.html files before it gets to the actual data.
It might hang, though in recent (Feb. 2010) testing of these wget commands
this particular one didn't hang. Others did. </p>

<pre>
wget -N -nv -r -nH -np --cut-dirs=4 -A spPlate"*".fits,spZbest"*".fits \
http://data.sdss3.org/sas/dr9/sdss/spectro/redux/104/segue2/
</pre>

<p>You can also use rsync. Note it will say "receiving file list ..." for a long time while it sorts out the remote directory structure.</p>
<pre>
rsync -avzuL --include "*"/--include "*"/spPlate"*" --include "*"/spZbest"*" --exclude "*" \
rsync://data.sdss3.org/dr9/sdss/spectro/redux/104/segue2/ ./
</pre>

<p>The data are stored in subdirectories by plate number, so <a href="http://data.sdss3.org/sas/dr9/sdss/spectro/redux/104/segue2/3131/">this page</a> has the spectroscopic parameter data and <a href="http://data.sdss3.org/sas/dr9/sdss/sspp/122/3131/"> this page </a> has the stellar parameters data for plate 3131.</p>



<h3>Target and Field (all objects) photometry, astrometry, proper motion, and target selection information</h3>

<p>You can also get the photometry, proper motions and other target selection information <a href="http://data.sdss3.org/sas/dr9/sdss/segue2/target/seguetsObj/">here</a>.   See the data model link again for what is in these files. </p>

<p>
To get all the photometric information for the spectroscopic targets:
</p>
<pre>
wget -N -nv -r -nH -np  -A seguetsObjPlate"*" \
http://data.sdss3.org/sas/dr9/sdss/segue2/target/seguetsObj/
</pre>

<p>
or
</p>

<pre>
rsync -avzuL rsync://data.sdss3.org/sas/dr9/sdss/segue2/target/seguetsObj/ ./
</pre>
<!--
<h2 id="boss">Getting the data: BOSS</h2>

<p><span class="todo">TODOAFTERDR9: Fill in this section</span></p>
-->
<?php echo foot(); ?>

