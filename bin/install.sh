#!/bin/bash
#
# Install a branch of the www product to www.sdss3.org/internal/branches.
# Also, install 'trunk', even if no branch is specified.
# This is meant to be run by the sdss3 user on sdss3.lbl.gov.
#
# usage:
#   install.sh [mybranch]
#
# $Id: install.sh 164232 2016-07-11 21:30:27Z sdss3svn $
#
# Set up directories.
#
svndir=${HOME}/Documents/Code/svn/SDSS-III/repo/www
svnurl=file:///srv/svn/sdss3/repo/www
srclist=trunk
installdir=/srv/www/html
#
# See if we have a branch name.
#
if [ $# -gt 0 ]; then
    srclist="${srclist} branches/$1"
fi
#
# Make sure the top-level svn directory is intact.
#
if [ ! -d "${svndir}" ]; then
    echo "svn directory at ${svndir} is missing!"
    exit 1
fi
#
# Install all our sources.
#
for src in ${srclist}; do
    #
    # Make sure the branch exists
    #
    if [ ! -d "${svndir}/${src}" ]; then
        echo "${svndir}/${src} not found!"
        exit 1
    fi
    #
    # Update the checked-out version
    #
    cd ${svndir}/${src}
    /usr/bin/svn up
    #
    # Sync to the install directory.
    #
    /usr/bin/rsync --verbose --recursive --copy-links --times --omit-dir-times \
        --delete --exclude=.svn ${svndir}/${src}/html/ ${installdir}/internal/${src}/
done
#
# Check for new tags
#
if [ -f ${HOME}/.wwwtag ]; then
    lasttag=$(< ${HOME}/.wwwtag)
else
    lasttag=v0_0
fi
lastmajor=$(/bin/cut -d_ -f1 <<< ${lasttag:1})
lastminor=$(/bin/cut -d_ -f2 <<< ${lasttag:1})
for fulltag in $(/usr/bin/svn ls ${svnurl}/tags); do
    tag=$(/bin/basename ${fulltag})
    major=$(/bin/cut -d_ -f1 <<< ${tag:1})
    minor=$(/bin/cut -d_ -f2 <<< ${tag:1})
    if [ ${major} -gt ${lastmajor} ]; then
        lastmajor=${major}
        lastminor=${minor}
    else
        if [ ${minor} -gt ${lastminor} ]; then
            lastmajor=${major}
            lastminor=${minor}
        fi
    fi
done
if [ "${lasttag}" != "v${lastmajor}_${lastminor}" ]; then
    lasttag="v${lastmajor}_${lastminor}"
    echo ${lasttag} > ${HOME}/.wwwtag
    #
    # Clean up old tags
    #
    for dir in ${svndir}/tags/*; do
        basedir=$(/bin/basename ${dir})
        if [[ "${basedir}" == "${lasttag}" ]]; then
            echo "Strange, ${lasttag} was already exported!"
            exit 1
        else
            /bin/rm -rf ${dir}
        fi
    done
    #
    # Export the new tag
    #
    /usr/bin/svn export ${svnurl}/tags/${lasttag} ${svndir}/tags/${lasttag}
    /usr/bin/rsync --verbose --recursive --copy-links --times --omit-dir-times \
        --delete --exclude=.svn \
        --exclude=internal/publications \
        --exclude=internal/branches \
        --exclude=internal/trunk \
        ${svndir}/tags/${lasttag}/html/ ${installdir}/
fi
