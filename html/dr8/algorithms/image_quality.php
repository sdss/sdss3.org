<?php include '../../header.php'; echo head('Image quality flags'); ?>

<p>The image quality of each SDSS field is tracked through a number of
flags and other quantities.  These values are stored in the <a
href="http://data.sdss3.org/datamodel/files/BOSS_PHOTOOBJ/RERUN/RUN/photoField.html">photoField</a>
files on SAS as well as in the <code>field</code> table in the CAS
database. When using SDSS images or catalogs, these values can be
useful in determining whether to use data from a particular
field. This page describes these flags, some of which are bitmasks and
others of which are not. The most important quantity for each field
is <code>score</code>, a combination of the image quality parameters,
described below.
</p>

<p>As noted below, some of these flags are relevant for both the
images and the catalogs, whereas some are flagging problems with the
catalogs alone (that is, the corrected frames may still be of good
quality).</p>

<p>Note that there are some small nomenclature differences between SAS
and CAS for these values; in particular, any underscores in the names
below are omitted in the CAS naming convention.</p>

<ul>
<li><a
href="dr8/algorithms/bitmask_image_status.php"><b><code>image_status</code></b></a>:
This bitmask indicates any issues
regarding the data-taking or telescope status.
<ul>
<li> bit <code>0</code>: CLEAR (indicates clear conditions)</li>
<li> bit <code>1</code>: CLOUDY (indicates cloudy conditions)</li>
<li> bit <code>2</code>: UNKNOWN (indicates unknown conditions)</li>
<li> bit <code>3</code>: BAD_ROTATOR  (rotator error renders this field unusable)</li>
<li> bit <code>4</code>: BAD_ASTROM  (bad astrometry renders this field unusable)</li>
<li> bit <code>5</code>: BAD_FOCUS  (bad focus renders this field unusable)</li>
<li> bit <code>6</code>: SHUTTERS  (shutter error renders this field unusable)</li>
<li> bit <code>7</code>: FF_PETALS  (petals error renders this field
unphotometric)</li>
<li> bit <code>8</code>: DEAD_CCD  (CCD error renders this field
unphotomeric)</li>
<li> bit <code>9</code>: NOISY_CCD  (CCD noise renders this field
unphotometric)</li>
</ul>
If any bit other than 0 is set, it indicates a serious problem with
the data. Neither the catalogs nor the corrected frames ought to be
used (<code>calib_status</code>, as described below, takes this
consideration into account).</li>
<li><b><code>psp_status</code></b>: This flag indicates any issues
found by the
Postage Stamp Pipeline (which makes some initial measurements of the
PSF and other items before
the photo code runs). In detail, the PSP sets these values on a
per-band basis, and what is reported here is the maximum value (worst
case) among the bands for each field.
<ul>
<li><code>0</code>:	PSF_FIELD_OK (Everything OK)</li>
<li><code>1</code>:	PSP_FIELD_PSF22 (Forced to take linear PSF across
field)</li>
<li><code>2</code>:	PSP_FIELD_PSF11 (Forced to take constant PSF across
field)</li>
<li><code>3</code>:	PSP_FIELD_PSF11 (Forced to take default PSF)</li>
<li><code>4</code>:	PSF_FIELD_ABORTED (aborted processing)</li>
<li><code>5</code>:	PSF_FIELD_MISSING (missing field)</li>
<li><code>6</code>:	PSF_FIELD_OE_TRANSIENT (odd/even bias level
transient present)</li>
</ul>
In practice we have not released any runs that have fields flagged
PSF_FIELD_ABORTED or PSF_FIELD_MISSING. One should not consider any
fields with <code>psp_status</code> &gt; 2 as photometric in all
bands. (<code>calib_status</code>, as described below, takes this
consideration into account).</li>
<li><b><code>photo_status</code></b>: Also known in some uncalibrated files
as <code>frames_status</code>. This value indicates what happened when
the photo code tried to run on this field.  It can take the following
values:
<ul>
<li><code>-1</code>: UNKNOWN (indicating catalogs from the
field ought not be used)</li>
<li><code>0</code>: OK</li>
<li><code>1</code>: ABORTED (indicating the resulting catalogs
should be ignored)</li>
<li><code>2</code>: MISSING (indicating the resulting catalogs
should be ignored)</li>
<li><code>3</code>: TOO_LONG (the software timed out, probably during
deblending, indicating the resulting catalogs should be ignored)</li>
</ul>
In practice, we have not released any runs with fields of UNKNOWN,
ABORTED or MISSING status.
</li>
<li><a
href="dr8/algorithms/bitmask_calib_status.php"><b><code>calib_status</code></b></a>:
This bitmask (one for each band) indicates whether a field is well calibrated or not,
which depends on the quality of the photometric reductions, the image
conditions, and the availability of overlapping fields for
ubercalibration.  See the <a
href="dr8/algorithms/fluxcal.php">ubercalibration documentation</a>
for full details.</li>
<li><code>skyflux</code>: This measurement (one for each band) is the
median sky level in each field, given in nanomaggies per square
arcsecond. The sky level is obviously important in setting the
photometric flux limit in each field. The median sky fluxes in the
<var>ugriz</var> bands across all primary photometric fields in the
survey are 1.5, 1.7, 4.2, 8.1, and 24.9 nanomaggies respectively.</li>
<li><code>psfwidth</code>: This measurement (one for each band) is the
FWHM of the PSF in arcsec (as determined using a double-Gaussian fit).
It is obviously important in setting the photometric flux limit for
unresolved sources in each field. The median seeing for primary
photometric fields in the survey in the <var>r</var> band is 1.3
arcsec, with a standard deviation of around 0.2 arcsec. Around 1% of
fields have seeing worse than 2 arcsec.</li>
<li><code>score</code>: The information in all of these flags is
combined into a single number, the <code>score</code>. This score is
used in deciding which field is primary in any given location of sky,
and it is described in full detail in the <a
href="dr8/algorithms/resolve.php">resolve</a> documentation.</li>
</ul>

<p>As noted above, for using the catalogs, the <code>score</code> (and
thus all these other flags are of importance and must be checked.
However, if you are using corrected frames, not all of the above are
relevant.  In particular, the <code>photo_status</code> quantity can
be ignored; typically that indicates a very bright object is in the
field, but not that the data itself is intrinsically bad (though parts
of it might be highly saturated).</p>

<?php echo foot(); ?>
