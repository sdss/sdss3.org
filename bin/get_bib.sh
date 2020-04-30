#!/bin/bash
#
# $Id: get_bib.sh 147950 2013-07-11 21:45:57Z sdss3svn $
#
if [[ $(uname) == 'Darwin' ]]; then
    sedreg='-E'
else
    sedreg='-r'
fi
forReal=True
aaregex='[0-9]{4}A(&[amp;]*|%26)A'
targetfile=seg_publications.php
cd ${WWW_DIR}/html/science/bib
for bibcode in $(grep 'href="http://adsabs' ${WWW_DIR}/html/science/${targetfile} | sed ${sedreg} 's%^.*href="http://adsabs.harvard.edu/abs/([^"]+)".*$%\1%g'); do
    echo ${bibcode}
    if [[ "${bibcode}" =~ ${aaregex} ]]; then
        filename=$(echo ${bibcode} | sed ${sedreg} 's/A(&[amp;]*|%26)A/A+A/').bib
        htmlcode=$(echo ${bibcode} | sed ${sedreg} 's/A(&[amp;]*)A/A%26A/')
    else
        filename=${bibcode}.bib
        htmlcode=${bibcode}
    fi
    if [ -f ${filename} ]; then
        echo "${filename} exists."
    else
        echo "wget -O ${filename} 'http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=${htmlcode}&data_type=BIBTEX'"
        [[ "${forReal}" == "True" ]] && wget -O ${filename} "http://adsabs.harvard.edu/cgi-bin/nph-bib_query?bibcode=${htmlcode}&data_type=BIBTEX"
        echo svn add ${filename}
        [[ "${forReal}" == "True" ]] && svn add ${filename}
        echo svn propset svn:eol-style native ${filename}
        [[ "${forReal}" == "True" ]] && svn propset svn:eol-style native ${filename}
        [[ "${forReal}" == "True" ]] && sleep 5
    fi
done

