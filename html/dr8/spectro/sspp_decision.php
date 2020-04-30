<?php include '../../header.php'; echo head('Decision Tree to Calculate Atmospheric Parameters - SSPP'); ?>

<p><a href="dr8/spectro/sspp.php"><b>[Back to main SSPP page]</b></a></p>

<h2>Introduction</h2>

<p>The SSPP uses multiple methods in
order to obtain estimates of the atmospheric parameters for each star
over a very wide range in parameter space. Each technique has
limitations as to its ability to estimate each parameter, arising from,
<i>e.g.</i>, the coverage of the grids of synthetic spectra, the methods used
for spectral matching, and their sensitivity to the S/N of the
spectrum, the range in parameter space over which the particular
calibration used for a given method extends, etc.. Hence, it is
necessary to specify a prescription for the inclusion or exclusion of a
given technique for the estimation of a given atmospheric parameter. At
present, this is accomplished by the assignment of a null (0, meaning
the parameter estimate is dropped), unity (1, meaning the parameter
estimate is accepted), or 2 (in case for [Fe/H]) value to an indicator
variable associated with each parameter estimated by a given technique,
according to the g-r and S/N criteria listed in the
<a href="dr8/spectro/sspp_methods.php">table</a>. <strong>Among the parameters, it
is recommended to use the adopted <var>T</var><sub>eff</sub>, log <var>g</var>, and [Fe/H] calculated
by these decision trees. These are named "TEFF_ADOP", "LOGG_ADOP", and "FEH_ADOP", respectively,
in the <a href="http://data.sdss3.org/datamodel/files/SSPP_REDUX/RERUN/PLATE4/output/param/ssppOut.html">data model.</a></strong></p>

<h2>Effective Temperature</h2>

<p>There are six primary temperature
estimates determined by the SSPP, and an auxiliary set of five
empirically and theoretically determined estimates. Note that a few of
the primary techniques extend to temperatures below 4500 K and above
7500 K, although the accuracy obtained by these are lower than in the
interval <i>T</i><sub>eff</sub> = 4500 - 7500 K. Thus, for stars
with temperatures outside of this interval, we also include the auxiliary
temperature estimates (in fact, just those that lie within 3 sigma of
the mean of the full auxiliary set) in assembling the final average
estimate of <i>T</i><sub>eff</sub>). Averages are taken using the robust
biweight procedure (See Beers, Flynn, &amp; Gebhardt 1990, and references
therein). In cases where the color flag 'C' is raised, we ignore all
temperatures that rely on the reported g-r color, and only consider
those based on spectroscopy alone (<i>e.g.</i>, the spectral matching
techniques and Balmer-line based temperature). A robust average of the
accepted temperature estimates (those with indicator variables equal to
1) is taken for the final adopted temperature. An internal robust
estimate of the scatter around this value is also obtained.</p>

<h2>Surface Gravity</h2>

<p>There are ten methods used to
estimate surface gravity by the SSPP. Application of the limits on g-r
and S/N eliminates a number of these estimates, and the biweight
average of the accepted log <i>g</i>
estimates (those with indicator
variables equal to 1) is taken for the final adopted surface gravity.
An internal robust estimate of the scatter around this value is also
calculated.</p>

<h2>Metallicity</h2>


<p>There are 12 estimates of [Fe/H] in the SSPP. We adopt the validity
ranges of S/N and g-r listed in the <a href="dr8/spectro/sspp_methods.php">table</a>
in <a href="http://adsabs.harvard.edu/abs/2008AJ....136.2022L">Lee et al. (2008a)</a>
to assign 1 or 0 as an indicator variable for each method. We then proceed as follows.</p>

<p>First, we generate a synthetic spectrum for each estimate of [Fe/H]
that has an indicator variable of 1 (using the adopted
<i>T</i><sub>eff</sub>
and log <i>g</i>) by interpolating
within the pre-existing grid of synthetic
spectra from the NGS1 approach. Next, we calculate a correlation
coefficient (CC) and the mean of the absolute residuals (MAR) between
the observed and the generated synthetic spectrum in two
different wavelength regions: 3850 - 4250 &Aring; and 4500 - 5500 &Aring;,
where the Ca II K and H lines, as well as numerous metallic
lines, are present, yielding two values of CC and MAR for
each metallicity estimator. We then select between the two values by
choosing the one with CC closest to unity, and with MAR
closest to zero. This applies for all estimates of [Fe/H] from
the individual methods. At the end of this process, we have <i>N</i> values
of the CC and MAR (maximum of <i>N</i>=12)
for the <i>N</i> estimates
of [Fe/H] with indicator variables of 1.</p>

<p>There are thus two arrays with <i>N</i>
elements: one from the CC and the other one from the MAR values. We
then sort the CC array in descending order, and
select the metallicity estimate corresponding to the first and second
element of the sorted array. The same procedure is carried out for the
MAR array, after sorting in ascending order. The reason for
implementing calculations involving the MARs is that, although we
may have a correlation coefficient close to unity between the observed
and the synthetic spectrum, from time to time there are large residuals
between the two spectra, indicating a poor match. Thus, the
computations involving the MAR provide additional security that
the methods are producing reasonable abundance estimates at this stage.</p>

<p>At this point we have two metallicity estimates with the highest CCs,
and two metallicity estimates with the lowest MARs. We then
take an average of the four metallicities, and use this average to
select from among the full set of metallicity estimates with an
indicator variable of 1 and within +/-0.5 dex of the average. We
carry along the CCs and MARs for the selected metallicity
estimates for further processing. In the next step we obtain an average
&mu;<sub>CC</sub> (&mu;<sub>MAR</sub>) and standard deviation
&sigma;<sub>CC</sub> (&sigma;<sub>MAR</sub>) of the CCs (MARs) for the
surviving metallicity estimates from the previous step. As a
final step to reject likely outliers, we select from the surviving
metallicity estimates the ones with the CC greater than
(&mu;<sub>CC</sub> - &sigma;<sub>CC</sub>) and the MAR less than
(&mu;<sub>MAR</sub> + &sigma;<sub>MAR</sub>). The metallicity estimators that
remain after this step are assigned indicator variables of 2. This
procedure effectively ignores metallicity estimates that produce poor
matches with the synthetic spectra. The final adopted value of [Fe/H]
is computed by taking a biweight average of the remaining values of
[Fe/H] (those with indicator variables of 2).</p>

<?php echo foot(); ?>
