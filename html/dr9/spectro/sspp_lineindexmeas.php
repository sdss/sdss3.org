<?php include '../../header.php'; echo head('Line Index Measurement in SSPP - SSPP'); ?>

<p><a href="dr9/spectro/sspp.php"><b>[Back to main SSPP page]</b></a></p>

<h2>Introduction</h2>
<p>The SSPP measures line indices of 82 atomic and molecular absorption lines.
Line-index calculations are performed in two modes; one uses a global
continuum fit over the entire wavelength range (3850 - 9000 &Aring;),
while the other obtains local continuum estimates around the line bands
of interest. The choice between which mode is used depends on the line
depth and width of the feature under consideration. Local continua are
employed for the determinations of stellar atmospheric parameters based
on techniques that depend on individual line indices. Other techniques,
such as the neural network, spectral matching, and auto-correlation
methods, require wider wavelength ranges to be considered; for these
the global continuum (or their own internal continuum routine) is used.
We make use of the errors in the fluxes reported by the SDSS
spectroscopic reduction pipeline to measure the uncertainty in the line
indices. Details of the procedures used to obtain the continuum fits
and line index measures (and their errors) are discussed below.</p>

<h2>Continuum Fit Techniques</h2>

<h3>Global Continuum Fit</h3>

<p>Determination of the appropriate continuum for a given spectrum is a
delicate task, even more so when it must be automated, and obtained for
stars having wide ranges of effective temperatures, as is the case for
the present application. In order to obtain a global continuum fit, the SSPP first divides the
wavelength range into two pieces: blue (3850 - 5800 &Aring;) and red
(5800 - 9000 &Aring;). After removing the strong Balmer lines present in
most spectra, the blue side is iteratively fit to a ninth-order
polynomial, rejecting points that are more than 3 sigma above the
fitted function. The same procedure is applied to the red side, but
using a fourth-order polynomial. Then, the two fitted pseudo-continua
are spliced together, and the joined continuum is again fitted to a
ninth-order polynomial. This is the final global pseudo-continuum used
to calculate line indices.</p>

<p>The reason for dividing a spectrum into two regions is to avoid the
continuum being placed at too high a level around the Ca II Triplet,
due to the poor sky-line subtraction in this region in some
cases. Fitting the entire range of a spectrum requires a high-order
polynomial. As a result, the continuum on the red side of a spectrum
will be artificially boosted due to the presence of poorly subtracted
sky lines or noise spikes, if any. Use of a lower order polynomial fit
to the red side avoids this potential problem.</p>

<h3>Local Continuum Fit</h3>

<p>To compute a local continuum over the line band of interest, we first
calculate a 5 sigma-clipped average of the observed fluxes over the
(blue and red) sidebands corresponding to each feature, as listed in
the line index <a href="http://data.sdss3.org/datamodel/files/SSPP_REDUX/RERUN/PLATE4/output/param/ssppOut_lineindex.html">datamodel</a>.
Using these two points, a linear interpolation is carried out
over the region between the end point of the blue sideband and the
starting point of the red sideband. This linearly interpolated flux is
then connected piecewise with the fluxes of the red and blue sidebands,
and a robust line fit is performed over the entire region of the blue
sideband + line band + red sideband to derive the final local continuum
estimate.</p>


<h2>Measurement of Line Indices</h2>

<p>Line indices (or equivalent widths) are calculated by integrating a
continuum-normalized flux over the specified wavelength regions of each
line band. Two different measurements of line indices, obtained from
the two different continuum methods described above, are reported, even
though the line-index based methods for stellar parameter estimates
only make use of the local continuum-based indices. In order to avoid
spurious values for the derived indices, if a given index measurement
is greater than 100 &Aring;, or is negative, we set the reported value
to -9.999. Thus, the value should be between 0.0 and 100 &Aring;. No
parameter estimates based on that particular line index are used.</p>

<p>Note that, unlike the case for most of the features in the line index
<a href="http://data.sdss3.org/datamodel/files/SSPP_REDUX/RERUN/PLATE4/output/param/ssppOut_lineindex.html">datamodel</a>,
the line indices listed as TiO5, TiO8, CaH1, CaH2, and CaH3 are calculated
following the prescription given by the
"Hammer" program (Covey et al. 2007), UVCN and BLCN by Smith &amp;
Norris (1982), and FeI_4 and FeI_5 by Friel (1987). The line
index for Ca I at 4227 &Aring;, and the Mg Ib and MgH features
around 5170 &Aring;, are computed by following Morrison et al. (2003), so that
they might be used to estimate log <i>g</i>.</p>

<?php echo foot(); ?>
