<?php include '../../header.php'; echo head('Bibliographic Database'); ?>

<h2>Introduction</h2>

<p>This directory contains <code>bib</code> files that are used by the
publications pages one level up.</p>
<p>To add to this database, first determine the bibcode of the file.  Then
download the bib file with a command similar to this:</p>
<pre>
wget -O 2012ApJS..203...21A.bib \
    'http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2012ApJS..203...21A&amp;data_type=BIBTEX'
</pre>
<p>You can add additional information to the file provided it follows a keyword = value
pattern and doesn't conflict with any existing BibTeX reserved keywords.  For
example, to declare that a paper has an Erratum associated with it, add a line like this:</p>
<pre>
erratum = {2011ApJS..195...26A},
</pre>
<p>However, in most cases, the BibTeX file may be used as-is, without any
modification.</p>

<h2>A&amp;A</h2>

<p><em>Astronomy &amp; Astrophysics</em> articles require some special handling, because
'&amp;' is a special character in a variety of contexts. You should download the
BibTeX file like so:</p>
<pre>
wget -O 2012A+A...547L...1N.bib \
    'http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=2012A%26A...547L...1N&amp;data_type=BIBTEX'
</pre>
<p>Note that in the filename we have made the subsitution <code>&amp; -&gt; +</code>,
while in the URL, the substitution is <code>&amp; -&gt; %26</code>.  In PHP
code, the '&amp;' character can be used as-is, for example, in the string
<code>'2012A&amp;A...547L...1N'</code>.</p>
<?php echo foot(); ?>
