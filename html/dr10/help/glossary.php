<?php include '../../header.php'; echo head('Glossary of SDSS-III Terminology'); ?>

<p>This page contains a comprehensive glossary of SDSS-related
terminology. Terms are given in alphabetical order, with definitions and
links to extended descriptions where available. This version of the page is
specific to SDSS-III.  It is based heavily on the
<a href="http://www.sdss.org/dr7/glossary/index.html">equivalent glossary</a>
used in SDSS-I/II, but defines some new terms, and has removed some terms that
are not relevant for SDSS-III.
If you come across a term you
don't understand, or think we should include, please <a
href="contact.php">contact us</a>.</p>

<?php include '../../glossary/glosslib.php'; echo generate_glossary('../../glossary/glossary.html',10); ?>

<?php echo foot(); ?>
