#!/bin/bash
#
# $Id: php_grep.sh 136797 2012-07-30 17:21:50Z weaver $
#
find . \( -name '*.php' -or -name '*.html' \) -exec grep -H -E "$1" \{\} \;
