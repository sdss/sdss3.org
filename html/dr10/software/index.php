<?php include '../../header.php'; echo head('SDSS-III Software'); ?>

<p>A substantial portion of the SDSS-III software is written in the
<a href="http://www.ittvis.com/ProductServices/IDL.aspx">IDL</a> language.
We strongly recommend installing the
<a href="dr10/software/idlutils.php">idlutils</a> package, as this
is a prerequisite for many other SDSS-III software packages.</p>

<p>The basic software tools necessary for analyzing SDSS data are
contained in the IDL-based products: <code>idlutils</code>,
<code>idlspec2d</code> and <code>photoop</code>. The latter two often
depend on two more products containing essential meta-data:
<code>photolog</code> and <code>speclog</code>. </p>

<p>Note we also distribute software for reading atlas images (<a
href="binaries/readAtlasImages-v5_4_11.tar.gz">readAtlasImages-v5_4_11.tar.gz</a>),
whose usage can be found in the <a
href="dr10/imaging/images.php#atlas">atlas image description</a>.</p>

<p>Additionally, there are a number of products distributed with the
software that contain external data of various sorts (dust maps, FIRST
catalogs, RC3, Tycho-2, etc).</p>


<?php echo foot(); ?>

