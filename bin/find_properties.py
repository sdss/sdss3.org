#!/usr/bin/env python2.7
#
# $Id: find_properties.py 147950 2013-07-11 21:45:57Z sdss3svn $
#
"""
find_properties
===============

Find and correct svn properties.
"""
#
# Top-level definitions.
#
__author__ = 'Benjamin Weaver <benjamin.weaver@nyu.edu>'
__version__ = '$Revision: 147950 $'.split(': ')[1].split()[0]
__all__ = [ ]
__docformat__ = 'restructuredtext en'
#
#
#
def get_extension(path):
    """Return a file's extension & deal with certain files that don't have
    an extension.

    Parameters
    ----------
    path : str
        A file name.

    Returns
    -------
    ext : str
        The file's extension.
    """
    from os.path import basename, splitext
    filename = basename(path)
    if filename in ('Makefile','README'):
        return filename.lower()
    elif path.find('_version') > 0:
        return '_version'
    else:
        root,ext = splitext(path)
        return ext.lower()
#
#
#
def propset(prop,value,path,test=False):
    """Set an svn property.
    """
    from subprocess import call
    command = ['svn','propset','svn:{0}'.format(prop),value,path]
    if test:
        print(' '.join(command))
        status = 0
    else:
        status = call(command)
    return status
#
#
#
def propdel(prop,path,test=False):
    """Delete an svn property.
    """
    from subprocess import call
    command = ['svn','propdel','svn:{0}'.format(prop),path]
    if test:
        print(' '.join(command))
        status = 0
    else:
        status = call(command)
    return status
#
#
#
def main():
    from subprocess import Popen
    from tempfile import TemporaryFile
    from xml.etree.ElementTree import ElementTree
    properties = {
        '.jpg': {'mime-type':'image/jpeg'},
        '.png': {'mime-type':'image/png'},
        '.gif': {'mime-type':'image/gif'},
        '.ico': {'mime-type':'image/x-icon'},
        '.ps':  {'mime-type':'application/postscript'},
        '.eps': {'mime-type':'application/postscript'},
        '.pdf': {'mime-type':'application/pdf'},
        '.sav': {'mime-type':'application/idl'},
        '.php': {'eol-style':'native'},
        '.html':{'eol-style':'native'},
        '.css': {'eol-style':'native'},
        '.js':  {'eol-style':'native'},
        '.table': {'eol-style':'native'},
        '.txt': {'eol-style':'native'},
        '.tex': {'eol-style':'native'},
        'readme': {'eol-style':'native'},
        '.pl':  {'eol-style':'native','keywords':'Id'},
        '.py':  {'eol-style':'native','keywords':'Id'},
        '.sh':  {'eol-style':'native','keywords':'Id'},
        'makefile': {'eol-style':'native','keywords':'Id'},
        '_version': {'eol-style':'native','keywords':'HeadURL'},
        }
    prop_list = ('mime-type','eol-style','keywords')
    command = ['svn','proplist','--xml','--verbose','--depth','infinity']
    # command = ['svn','proplist','--xml','--verbose','--depth','immediates']
    outfile = TemporaryFile()
    errfile = TemporaryFile()
    proc = Popen(command,stdout=outfile,stderr=errfile)
    proc.wait()
    status = proc.returncode
    outfile.seek(0)
    tree = ElementTree()
    root = tree.parse(outfile)
    verbose = False
    test = False
    for t in root.iterfind('target'):
        tpath = t.attrib['path']
        ext = get_extension(tpath)
        try:
            ext_prop = properties[ext]
        except KeyError:
            if verbose:
                print("Unknown extension for {0}.".format(tpath))
            continue
        for prop in prop_list:
            p = t.find('property[@name="svn:{0}"]'.format(prop))
            if p is None:
                #
                # See if the property is supposed to be defined
                #
                try:
                    prop_val = ext_prop[prop]
                except KeyError:
                    if verbose:
                        print("Property svn:{0} is not defined for {1}, and this is appropriate.".format(prop,tpath))
                else:
                    print("Property svn:{0} is not set for {1}!".format(prop,tpath))
                    status = propset(prop,prop_val,tpath,test=test)
                    if status != 0:
                        print("ERROR fixing svn:{0}!".format(prop))
            else:
                #
                # The property IS defined, see if it is supposed to be defined
                #
                try:
                    prop_val = ext_prop[prop]
                except KeyError:
                    print("Property svn:{0} is defined for {1}, but is not supposed to be defined.".format(prop,tpath))
                    status = propdel(prop,tpath,test=test)
                    if status != 0:
                        print("ERROR fixing svn:{0}!".format(prop))
                else:
                    if prop_val == p.text:
                        if verbose:
                            print("{0} has correct svn:{1}.".format(tpath,prop))
                    else:
                        print("{0} has bad svn:{1} {2}.".format(tpath,prop,p.text))
                        status = propset(prop,prop_val,tpath,test=test)
                        if status != 0:
                            print("ERROR fixing svn:{0}!".format(prop))
    outfile.close()
    errfile.close()
    return
#
#
#
if __name__ == '__main__':
    main()
