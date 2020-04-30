<?php include '../../header.php'; echo head('Understand data'); ?>

<p><a href="dr9/tutorials/">Back to Tutorials</a></p>

<h2>How do I...</h2>

   <h2>Take a quick look at the data using IDL, Python, etc.?</h2>


<p>The methods described below are applicable to BOSS data.</p>

<h2>Jump to:</h2>
<ul>
  <li><a href="dr9/tutorials/quicklook.php#zcode">Z Code</a></li>
  <li><a href="dr9/tutorials/quicklook.php#idl">IDL</a></li>
  <li><a href="dr9/tutorials/quicklook.php#sm">SM</a></li>
  <li><a href="dr9/tutorials/quicklook.php#python">Python</a></li>
</ul>


<!--
<h2 id="zcode">Z Code</h2>
<h3>Overview</h3>
<p><span class="todo">TODOAFTERDR9: To be written...</span></p>
-->
<h2 id="idl">IDL</h2>
<ol>
    <li>
        <p>Download the "idlutils" and "idlspec2d" products, set some environment variables, and put the "pro" subdirectories of each in your path: </p>
<pre>
svn co http://www.sdss3.org/svn/repo/idlutils/trunk idlutils
svn co http://www.sdss3.org/svn/repo/idlutils/trunk idlspec2d
</pre>

        <p>From bash shell:</p>

<pre>
export IDLUTILS_DIR=${HOME}/idlutils
export IDLSPEC2D_DIR=${HOME}/idlspec2d
export IDL_PATH=+${IDLUTILS_DIR}/pro:+${IDLUTILS_DIR}/goddard/pro:+${IDLSPEC2D_DIR}/pro:${IDL_PATH}
</pre>
    </li>


    <li>
        <p>Set environment variables to point to your downloaded data. If you are on riemann.lbl.gov set </p>

<pre>
export BOSS_SPECTRO_REDUX=/clusterfs/riemann/raid006/dr9/boss/spectro/redux
export RUN2D=v5_4_45
export RUN1D=v5_4_45
</pre>

    <p>If you are at Princeton, set </p>

<pre>
export BOSS_SPECTRO_REDUX=/u/dss/spectro/boss
export RUN2D=v5_4_45
export RUN1D=v5_4_45
</pre>
    </li>

    <li><p>From IDL, use "plotspec" to display spectra. For example: </p>

<pre>
IDL> plotspec, 4083, mjd=55443, 101
</pre>
    </li>

    <li><p>Write a spectrum to an ASCII file</p>

<pre>
IDL> writespec, 4083, mjd=55443, 101, filename='junk.dat'
</pre>

    <p>Help is available for these commands with "doc_library":</p>

<pre>
IDL> doc_library,'plotspec'
</pre>
    </li>
</ol>


<h2 id="sm">Using SM</h2>


<p>The above IDL tools can be used to examining the spectra. Another approach is to use SM tools, written by Michael Strauss. Here's how to proceed: </p>
<ol>
<li>Pull the reduced spectra (spPlate and spZbest files) off the SAS, creating one directory per plate. In Princeton, these files are in /u/dss/spectro/boss, and thus have directories called /u/dss/spectro/boss/3615, and so on.</li>
<li>Download the SM macro file called spectro.boss.</li>
<li>Enter SM in the directory where spectro.boss lives, and type the following: </li>
</ol>

<p>First we removes any previous things in SM's macro buffer.</p>

<pre>
DELETE HISTORY 0 10000
</pre>

<p>Then load the macros for BOSS spectra</p>

<pre>
restore spectro.boss
play
xterm_l
</pre>

<p>The last is "xterm underscore ell" for landscape</p>

<p>Now tell SM where to find the spectra. Of course, use the proper path for your own directory structure. Princeton folks need not type this, as it is the current default.</p>

<pre>
define SPECTRO_DATA ('/u/dss/spectro/boss')
</pre>

<p>Tell the MJD of the observations you want to plot.</p>

<pre>
mjd 55098
</pre>

<p>You are now ready to look at spectra! The basic command is:</p>

<pre>
plotspec &lt;plate&gt; &lt;fiber&gt;
</pre>

<p>For plate, use one of the plates available (see above for available plates). For fiber, use any number between 501 and 1000; the spectra from the first spectrograph are not yet available due to the problems with the b1 camera.</p>

<p>You should see a spectrum in one panel, and then 3 smaller panels with various zooms. Superposed will be positions of emission and absorption lines, assuming the redshift given in the spZbest file. You are then put in an interactive mode where you can play with the spectra: zoom in and out, change the assumed redshift, change the smoothing (a boxcar smooth of 5 pixels is the default for plotting), and so on. See all the options by typing h at the prompt.</p>

<p>If you want to look at lots of spectra, use the look command:</p>

<pre>
look 3615 501 1000
</pre>

<p>will run plotspec in turn on each of the fibers 501-1000 of plate 3615.</p>

<p>For those of you who are willing to help with updating these SM scripts, modifications should be done to the sm product in SVN. During the commissioning phase these will be constantly updated and debugged, so check back regularly for the latest version.</p>

<p>The package now includes a new macro called 'inspectboss' which reads in the mini-truth tables and allows the user to inspect the plates interactively. A brief tutorial can be found here.</p>

<p>Contact <a href="mailto:lee@astro.princeton.edu">K.G. Lee</a> if there are specific changes you'd like to see. </p>


<h2 id="python">Using Python</h2>
<p>Nothing fancy here. You need numpy, matplotlib, and pyfits. This worked for Python 2.5 under Mac OS X v10.5.8. YMMV!</p>

<p>An alternative stand-alone script is attached below as plotFiber.py. This produces a matplotlib plot of the fiber spectrum with options for over-plotting common galaxy, quasar, or telluric lines on the spectrum. It takes 3 arguments: plate, mjd, fiber typical usage (from the directory where you installed the script) ./plotFiber.py --qlines 3622 55123 933 Like Adam's script, you must edit the "topdir" variable to point to your data directory.</p>

<pre>

#
# Example script for looking at BOSS spectra and redshift fits via Python.
#
# Written by Adam S. Bolton, University of Utah, Oct. 2009
#

# Imports:
import numpy as n
import pyfits as pf
import matplotlib as mpl
mpl.use('TkAgg')
mpl.interactive(True)
from matplotlib import pyplot as p

# Set topdir:
topdir = '/data/BOSS/spectro/redux/v5_4_45/'

# Pick your plate/mjd and read the data:
plate = '3621'
mjd = '55104'
spfile = topdir + plate + '/spPlate-' + plate + '-' + mjd + '.fits'
zbfile = topdir + plate + '/spZbest-' + plate + '-' + mjd + '.fits'
hdulist = pf.open(spfile)
c0 = hdulist[0].header['coeff0']
c1 = hdulist[0].header['coeff1']
npix = hdulist[0].header['naxis1']
wave = 10.**(c0 + c1 * n.arange(npix))
# Following commented-out bit was needed for some of the early redux:
#bzero = hdulist[0].header['bzero']
bunit = hdulist[0].header['bunit']
flux = hdulist[0].data
ivar = hdulist[1].data
hdulist.close()
hdulist = 0
hdulist = pf.open(zbfile)
synflux = hdulist[2].data
zstruc = hdulist[1].data
hdulist.close()
hdulist = 0

i = 499
# Set starting fiber point (above), then copy and paste
# the following repeatedly to loop over spectra:
i+=1
# Following commented-out bit was needed for some of the early redux:
#p.plot(wave, (flux[i,:]-bzero) * (ivar[i,:] > 0), 'k', hold=False)
p.plot(wave, flux[i,:] * (ivar[i,:] > 0), 'k', hold=False)
p.plot(wave, synflux[i,:], 'g', hold=True)
p.xlabel('Angstroms')
p.ylabel(bunit)
p.title(zstruc[i].field('class') + ', z = ' + str(zstruc[i].field('z')))
</pre>

<?php echo foot(); ?>

