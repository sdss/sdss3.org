<?php include '../../header.php'; echo head('System Status'); ?>
<h2>Introduction</h2>
<p>Use this page to check the status of:</p>
<ul>
<li><a href="http://data.sdss3.org">Science Archive Server (SAS), data.sdss3.org</a></li>
<li><a href="http://mirror.sdss3.org">Science Archive Mirror (SAM), mirror.sdss3.org</a></li>
<li><a href="http://skyserver.sdss3.org">SkyServer, skyserver.sdss3.org</a></li>
<li><a href="http://skyserver.sdss3.org/casjobs/">CasJobs, skyserver.sdss3.org/casjobs</a></li>
<li><a href="http://api.sdss3.org">SDSS-III Public API Service, api.sdss3.org</a></li>
<!-- <li><a href="http://globusonline.org">SDSS-III Globus Online Service, sdss3#orion</a></li> -->
</ul>
<h2>@sdss3status Twitter Feed</h2>
<p><?php echo twfeed(520,600); ?></p>

<?php echo foot(); ?>

