#!/bin/bash
#
# Convert a XHTML file produced by make_html_help.pro into a PHP file.
#
# $Id: convert_html.sh 143998 2013-02-28 21:12:59Z weaver $
#
# Define usage function
#
function usage() {
    local execName=$(basename $0)
    (
    echo "usage ${execName} [-d] [-h] [-P DIR] [-p PRODUCT] [-r RELEASE] <file>"
    echo "    <file>     - A XHTML file produced by make_html_help.pro."
    echo "    -b         - This XHTML file was developed from a branch, not at tag."
    echo "    -d         - Debug mode; print lots of extra information."
    echo "    -h         - Print help and exit."
    echo "    -P DIR     - Use DIR as the root of the product tree (default /home/products/Linux)."
    echo "    -p PRODUCT - Use PRODUCT as the product name, if it can't be determined from the file."
    echo "    -r RELEASE - Use RELEASE as the Data Release (default dr9)."
    ) >&2
    exit 1
}
#
# Read options
#
debug=False
productBase=/home/products/Linux
product=''
release=dr9
tags='tags'
while getopts bdhp:P:r: argname; do
    case ${argname} in
        b) tags='branches' ;;
        d) debug=True ;;
        h) usage ;;
        p) product=${OPTARG} ;;
        P) productBase=${OPTARG} ;;
        r) release=${OPTARG} ;;
        *) usage ;;
    esac
done
shift $((OPTIND-1))
#
# Read the filename
#
if [ $# -lt 1 ]; then
    (echo "ERROR: file name required!") >&2
    usage
fi
filename=$1
if [ ! -r "${filename}" ]; then
    (echo "${filename} is missing or unreadable!") >&2
    exit 1
fi
#
# Try to determine the product name from the filename
#
if [ -z "${product}" ]; then
    if [[ ${filename} =~ ([^_]+)_doc\.html ]]; then
        product=${BASH_REMATCH[1]}
        [ "${debug}" = "True" ] && echo "product=${product}"
    fi
fi
if [ -z "${product}" ]; then
    (echo "ERROR: could not determine product name from filename and -p was not set!") >&2
    exit 1
fi
#
# Determine the file size and positions of various lines
#
fileSize=$(wc -l ${filename} | cut -d' ' -f1)
[ "${debug}" = "True" ] && echo "fileSize=${fileSize}"
bodyStart=$(grep -n '<body>' ${filename} | cut -d: -f1)
[ "${debug}" = "True" ] && echo "bodyStart=${bodyStart}"
bodyEnd=$(grep -n '</body>' ${filename} | cut -d: -f1)
[ "${debug}" = "True" ] && echo "bodyEnd=${bodyEnd}"
headOffset=$((bodyStart + 1))
[ "${debug}" = "True" ] && echo "headOffset=${headOffset}"
tailOffset=$((fileSize - bodyEnd + 1))
[ "${debug}" = "True" ] && echo "tailOffset=${tailOffset}"
#
# Start creating the PHP file
#
phpFile=${filename%.html}.php
if [ -f "${phpFile}" ]; then
    /bin/rm -f ${phpFile}
fi
#echo "<?php include '../../header.php'; echo head(\"${release}\"); ?>" > ${phpFile}
#
# Add the content to the PHP file
#
sed -r "s%<h1>([^<]+)</h1>%<?php include '../../header.php'; echo head('\1'); ?>%" ${filename} | \
sed -r s%${productBase}/${product}/'([^/]+)/(.+\.pro)'%\<a\ href=\"http://www.sdss3.org/svn/repo/${product}/${tags}/\\1/\\2\"\>\$IDLUTILS_DIR/\\2\</a\>%g | \
sed -r s%'<a href="(#[^#]+)">'%\<a\ href=\"${release}/software/${phpFile}\\1\"\>%g | \
    head --lines=-${tailOffset} | \
    tail --lines=+${headOffset} > ${phpFile}
#
# Finish the PHP file
#
echo "<?php echo foot(); ?>" >> ${phpFile}
