<?php include '../../header.php'; echo head('Target Selection of F Star Photometric Standards'); ?>

<p>
We select F type stars as photometric standards.

In the following, we use <a href="dr9/algorithms/magnitudes.php#mag_psf">PSF magnitudes</a>.
Magnitudes are extinction corrected linear mags defined as
</p>

<pre>
    m = 22.5 - 2.5*alog10( psf_flux )
    m = m - extinction
</pre>

<h2>Star Selection</h2>
<p>
We select stars by demanding <code><a href="dr9/algorithms/classify.php">objc_type</a> == 6</code>.</p>

<h2 id="FlagCuts">Flag Cuts</h2>

<p>
F star standards must be
</p>
<pre>
    STATIONARY     in <a href="dr9/algorithms/bitmask_flags2.php">OBJECT2</a> objc flags
    SURVEY_PRIMARY in <a href="dr9/algorithms/bitmask_resolve_status.php">RESOLVE_STATUS</a> flags
    PHOTOMETRIC    in <a href="dr9/algorithms/bitmask_calib_status.php">CALIB_STATUS</a> flags.
</pre>
<p>
Standards must not be
</p>
<pre>
    in <a href="dr9/algorithms/bitmask_flags1.php">OBJECT1</a> objc_flags
        BLENDED, TOO_MANY_PEAKS, CR, SATUR, BADSKY

    in <a href="dr9/algorithms/bitmask_flags2.php">OBJECT2</a> objc_flags2
        PEAKS_TOO_CLOSE, NOTCHECKED_CENTER SATUR_CENTER, INTERP_CENTER,
        PSF_FLUX_INTERP INTERP
</pre>
<p>
and must fall in these magnitude and color ranges:
</p>
<ul>
<li>15.0 &lt; <var>r</var> &lt; 19</li>
<li>[((<var>u</var>-<var>g</var>) - 0.82)<sup>2</sup> + ((<var>g</var>-<var>r</var>) - 0.30)<sup>2</sup> +
((<var>r</var>-<var>i</var>) - 0.09)<sup>2</sup> + ((<var>i</var>-<var>z</var>) - 0.02)<sup>2</sup>]<sup>1/2</sup> &lt; 0.08</li>
</ul>


<?php echo foot(); ?>

