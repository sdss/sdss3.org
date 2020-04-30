#!/bin/bash
#
# validate_links.sh
#
# $Id: validate_links.sh 147950 2013-07-11 21:45:57Z sdss3svn $
#
function usage {
    echo "validate_links.sh [-e] [-h] [-r ROOT] [-v]"
    echo "    -e      = Attempt to validate external links. Caution: this is slow."
    echo "    -h      = Print help and exit."
    echo "    -r ROOT = Search on this subdirectory."
    echo "    -v      = Verbose mode. Print all links, not just bad ones."
}
#
# Inhibit shell glob processing
#
set -o noglob
#
# Make sure WWW_DIR exists
#
if [ -z "${WWW_DIR}" ]; then
    echo "WWW_DIR does not exist.  setup www first."
    exit 1
fi
#
# Get options
#
external=False
verbose=False
root=''
while getopts ehr:v argname; do
    case ${argname} in
        e)
            external=True
            ;;
        h)
            usage
            exit 0
            ;;
        r)
            root=${OPTARG}
            ;;
        v)
            verbose=True
            ;;
        *)
            echo "Unknown option."
            usage
            exit 1
            ;;
    esac
done
shift $((OPTIND-1))
#
# Get the base URL
#
if [ $(uname) = 'Darwin' ]; then
    sed='sed -E'
else
    sed='sed -r'
fi
baseurl=$(php ${WWW_DIR}/html/index.php | grep -E '<base'  | ${sed} 's/(.*)"(.*)"(.*)/\2/')
#
# Find all php files
#
IFS=$'\x0a' # newline
for php in $(find ${WWW_DIR}/html/${root} \( -name "*.php" -or -name "*.html" \) -exec grep -E -H 'href=".*"' \{\} \;); do
    file=${php%%:*}
    shortfile=${file#*html/}
    #
    # Stuff to skip
    #
    if [ $(basename ${file}) = 'header.php' ]; then
        continue
    fi
    if [ $(basename ${file}) = 'bib.php' ]; then
        continue
    fi
    if [ $(basename ${file}) = 'glossary.html' ]; then
        continue
    fi
    if [[ ${file} =~ 'html/internal/' ]]; then
        continue
    fi
    line=${php#*:}
    #
    # Skip PHP comments
    #
    if [ "${line#//}" != "${line}" ]; then
        continue
    fi
    while [ "${line}" != "${line#*href=\"}" ]; do
        href=${line#*href=\"}
        url=${href%%\"*}
        line=${href#*\"}
        # echo "${line}"
        if [ "${url:0:4}" = "http" ]; then
            if [ "${external}" = "True" ]; then
                response=$(wget -q -S -T 60 -t 1 -O - ${url} 2>&1 | head -1)
                if [ -z "${response}" ]; then
                    echo "NO RESPONSE: ${shortfile} -> ${url} "
                else
                    echo ${response} | grep -E -q 'HTTP/1\.[01] [23]0[0-9]'
                    if [ $? = 0 ]; then
                        [ "${verbose}" = "True" ] && echo "OK response=${response}: ${shortfile} -> ${url}"
                    else
                        echo "PROBLEM LINK response=${response}: ${shortfile} -> ${url}"
                    fi
                fi
            else
                [ "${verbose}" = "True" ] && echo "EXTERNAL: ${shortfile} -> ${url}"
            fi
        elif [ "${url:0:6}" = "mailto" ]; then
            [ "${verbose}" = "True" ] && echo "MAILTO: ${shortfile} -> ${url}"
        elif [ "${url:0:10}" = "javascript" ]; then
            [ "${verbose}" = "True" ] && echo "JAVASCRIPT: ${shortfile} -> ${url}"
        elif [ "${url}" = "'.\$bibtex->adsurl.'" ]; then
            continue
        else
            #
            # Figure out if the internal link actually exists
            #
            url2=${url%#*}
            id=${url#*#}
            url2=${url2%\?*}
            if [ -z "${url2}" -o "${url2: -1:1}" = "/" ]; then
                url2=${url2}index.php
            fi
            if [ $(basename ${url2}) = 'glossary.php' ]; then
                url2='glossary/glossary.html'
                grepid="<dt id=\"${id}\""
            else
                grepid="id=\"${id}\""
            fi
            if [ -e ${WWW_DIR}/html/${url2} ]; then
                if [ "${id}" = "${url}" ]; then
                    [ "${verbose}" = "True" ] && echo "OK: ${shortfile} -> ${baseurl}${url}"
                else
                    #
                    # The link is to an id tag within the url
                    #
                    n=$(grep "${grepid}" ${WWW_DIR}/html/${url2} | wc -l | tr -d ' ')
                    if [ "${n}" = "1" ]; then
                        [ "${verbose}" = "True" ] && echo "OK: ${shortfile} -> ${baseurl}${url}"
                    elif [ "${n}" -gt "1" ]; then
                        echo "MULTIPLY DEFINED id=${id}: ${shortfile} -> ${baseurl}${url}"
                    else
                        [ "${id}" = "Top" ] || echo "UNDEFINED id=${id}: ${shortfile} -> ${baseurl}${url}"
                    fi
                fi
            else
                echo "BROKEN LINK: ${shortfile} -> ${baseurl}${url}"
            fi
        fi
    done
done
