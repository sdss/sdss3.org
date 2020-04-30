#!/bin/bash
#
# $Id: find_orphans.sh 142458 2013-01-26 18:18:45Z weaver $
#
function usage {
    echo "find_orphans.sh [-h] [-v]"
    echo "    -h      = Print help and exit."
    echo "    -v      = Verbose mode. Print information about all files, not just orphans."
}
#
# Make sure the www product is setup
#
if [ -z "${WWW_DIR}" ]; then
    echo "WWW_DIR must be set!"
    exit 1
fi
#
# Determine OS
#
sedopt='-r'
[ $(uname) = 'Darwin' ] && sedopt='-E'
#
# Get options
#
verbose=False
while getopts hv argname; do
    case ${argname} in
        h)
            usage
            exit 0
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
#
# Switch to html directory
#
cd ${WWW_DIR}/html
#
# Set record separator to newline
#
IFS=$'\x0a'
#
# Loop over files
#
for php in $(find . -name '*.php'); do
    #
    # Files to skip
    #
    if [ $(dirname ${php}) = './sidemenus' -o "${php}" = './header.php' ]; then
        continue
    fi
    if [ $(basename ${php}) != 'index.php' ]; then
        searchstring=${php#./}
        found=$(php_grep.sh ${searchstring})
        if [ -z "${found}" ]; then
            if [ "${verbose}" = "True" ]; then
                echo "No links to ${searchstring} found!"
                echo
            else
                echo ${searchstring}
            fi
        else
            foundlist=''
            for l in ${found}; do
                foundfile=$(echo ${l} | cut -d: -f1)
                #
                # Ignore self-referential links
                #
                if [ "${foundfile}" != "${php}" ]; then
                    #
                    # Create a list of unique files
                    #
                    if [ "${foundlist/$foundfile//}" = "${foundlist}" ]; then
                        if [ -z "${foundlist}" ]; then
                            foundlist=${foundfile}
                        else
                            foundlist="${foundlist} ${foundfile}"
                        fi
                    fi
                fi
            done
            if [ -z "${foundlist}" ]; then
                #
                # Only self-referential links to the file were found
                #
                if [ "${verbose}" = "True" ]; then
                    echo "No links to ${searchstring} found!"
                    echo
                else
                    echo ${searchstring}
                fi
            else
                if [ "${verbose}" = "True" ]; then
                    echo "${searchstring} is found in these files:"
                    echo ${foundlist} | tr ' ' '\n' | sed ${sedopt} 's%^\./%    %g'
                    echo
                fi
            fi
        fi
    fi
done
