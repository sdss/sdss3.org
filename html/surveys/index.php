<?php include '../header.php'; echo head('SDSS-III: Four Surveys Executed Simultaneously'); ?>

<p>SDSS-III consists of four surveys executed on the same 2.5m
telescope: the Apache Point Observatory Galactic Evolution Experiment
(<a href="surveys/apogee.php">APOGEE</a>) the Baryon Oscillation Spectroscopic
Survey (<a href="surveys/boss.php">BOSS</a>), the Multi-Object APO Radial
Velocity Exoplanet Large-area Survey (<a
href="surveys/marvels.php">MARVELS</a>), and the Sloan Extension for Galactic
Understanding and Exploration 2 (<a href="surveys/segue2.php">SEGUE-2</a>).</p>

<p>BOSS focuses on mapping the Universe on the largest scales,
creating the largest volume three-dimensional map of galaxies ever
created. SEGUE-2 and APOGEE focus on the structure and evolution of
our own Milky Way galaxy.  MARVELS searches very nearby stars for
evidence of "exoplanets" surrounding them.</p>

<p>The BOSS and SEGUE-2 programs require "dark" time when the Moon is
less than 60% illuminated, or below the horizon.  The APOGEE and
MARVELS programs are executed during the remaining "bright" time.</p>

<table class="centerfigure">
<tr><td><img src="images/sdss3-schedule.png" width="600" alt="SDSS-III schedule" /></td></tr>
<tr><td>High-level SDSS-III schedule. Dark-time observing programs are marked in orange, bright-time
observing programs marked in green.</td></tr>
</table>

<p>The MARVELS and BOSS spectroscopic surveys begin in 2008 and 2009,
and APOGEE begins in 2011.  SDSS-III will be busy taking data through
the summer of 2014. Our projected schedule for future public data releases
over that time period is as follows:</p>

<table class="common">
    <tr>
       <th>Date</th>
       <th>Data Release</th>
       <th>APOGEE</th>
       <th>BOSS</th>
       <th>MARVELS</th>
       <th>SEGUE-2</th>
   </tr>
   <tr>
       <td>2011 Jan</td>
       <td>DR8</td>
       <td></td>
       <td>Final imaging</td>
       <td></td>
       <td>Final spectra</td>
    </tr>
    <tr>
       <td>2012 Jul</td>
       <td>DR9</td>
       <td></td>
       <td>Spectra<br />(up to 2011 Jul)</td>
       <td></td>
       <td></td>
   </tr>
   <tr>
        <td>2013 Jul</td>
        <td>DR10</td>
        <td>Spectra<br />(up to 2012 Jul)</td>
        <td>Spectra<br />(up to 2012 Jul)</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>2014 Dec</td>
        <td>DR11</td>
        <td>Spectra<br />(up to 2013 Jul)</td>
        <td>Spectra<br />(up to 2013 May)</td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>2014 Dec</td>
        <td>DR12</td>
        <td>Final spectra</td>
        <td>Final spectra</td>
        <td>Final radial velocities</td>
        <td></td>
    </tr>
</table>

<p>Why are DR11 and DR12 being released simultaneously?
DR11 will be a packaging of all the data up until mid-2013, 
necessary to validate that season's data. 
In order to preserve that data and make it possible for others to reproduce DR11 results, 
we will publicly release DR11 at the same time as DR12.
</p>

<?php echo foot(); ?>
