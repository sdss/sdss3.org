#!/bin/bash
#
# Install a branch of the www product to www.sdss3.org/internal/branches.
# This is meant to be run by the sdss3 user on sdss3.lbl.gov.
#
# usage:
#   install_branch.sh mybranch
#
# $Id: install_branch.sh 120353 2010-12-23 16:15:52Z weaver $
#
# Make sure we have the branch name
#
if [ $# -lt 1 ]; then
    echo "usage: install_branch.sh mybranch"
    exit 1
fi
#
# Set up variables
#
mybranch=$1
svndir=${HOME}/svn/repo/www
branchdir=${svndir}/branches/${mybranch}
installdir=/srv/www/html/internal/branches/${mybranch}
#
# Make sure the top-level svn directory is intact.
#
if [ ! -d "${svndir}" ]; then
    echo "svn directory at ${svndir} is missing!"
    exit 1
fi
#
# Update the checked-out version
#
cd ${svndir}
svn up
#
# Make sure the branch exists
#
if [ ! -d "${branchdir}" ]; then
    echo "branch ${mybranch} not found!"
    exit 1
fi
#
# Sync to the install directory.
#
rsync --verbose --recursive --copy-links --times --omit-dir-times \
    --delete --exclude=.svn ${branchdir}/html/ ${installdir}/
