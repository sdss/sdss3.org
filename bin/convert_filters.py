#!/usr/bin/env python2.7
#
# $Id: convert_filters.py 147950 2013-07-11 21:45:57Z sdss3svn $
#
"""
convert_filters
===============

Convert filter files to FITS format.
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
import os
import os.path
#import sys
import pyfits
import numpy as np
import datetime
#
#
#
def main():
    hdu0 = pyfits.PrimaryHDU()
    hdu0.header.add_comment('The following file is from Jim Gunn, from June 2001.  It should be self-explanatory; for most purposes, you will want to use the second column.  Consider this file preliminary.')
    hdu0.header.add_comment('')
    hdu0.header.add_comment('These filter curves have been used to calculate the effective wavelengths and the qtdl/l (see Chapter 8 of the Black Book) of the filters; the values are:')
    hdu0.header.add_comment('')
    hdu0.header.add_comment('u 3551 0.0171')
    hdu0.header.add_comment('g 4686 0.0893')
    hdu0.header.add_comment('r 6166 0.0886')
    hdu0.header.add_comment('i 7480 0.0591')
    hdu0.header.add_comment('z 8932 0.0099')
    hdu0.header.add_comment('')
    hdu0.header.add_comment('Table Caption For Response Functions')
    hdu0.header.add_comment('')
    hdu0.header.add_comment('The first column is the wavelength in \AAngstroms.')
    hdu0.header.add_comment('')
    hdu0.header.add_comment('The second column (respt) is the quantum efficiency on the sky looking through 1.3 airmasses at APO for a point source.')
    hdu0.header.add_comment('')
    hdu0.header.add_comment('The third column (resbig) is the QE under these conditions for very large sources (size greater than about 80 pixels) for which the infrared scattering is negligible.  The only filters for which the infrared scattering has any effect are r and i; the scattering in the bluer chips is negligible, and the z chips are not thinned and the phenomenon does not exist.')
    hdu0.header.add_comment('')
    hdu0.header.add_comment('The fourth column (resnoa) is the response of the third column with {\it no} atmosphere, and the fifth column is the assumed atmospheric transparency at {\it one} airmass at APO.')
    hdu0.header.add_comment('')
    foo="""The tables were constructed using monochromator
illumination of the camera with a bandpass of about 100 \AA, sampled for
the u filter at 50 \AA intervals and for the others at 100 \AA
intervals.  These measurements were compared with measured responses of
the component filters and detectors and three additional points were
interpolated using these data, two at the extreme toes and one
additional (in g, r, and i) at the point of the beginning of the sharp
cutoff of the shortpass interference filter.  These points are necessary
in order to make spline interpolation of the response data well-behaved.
These spline-interpolated response data were then multiplied by measured
aluminum reflectivities and scaled atmospheric transmission to produce
the tables below. The overall normalization is somewhat uncertain,
but this uncertainty does not affect the shapes. Note, however, that
there has been no attempt to remove the finite resolution of the
monochromator measurements. These tables are the {\it averages} of the
responses for all six of the camera chips with a given filter. The
responses are in general very similar except in the z band, where the
nonuniformity of the infrared rolloff, presumably associated with
varying thickness of the epitaxial layer or perhaps the gate structures
in these thick devices, introduces variations in the effective wavelengths
of the filters of order 100 \AA. We are currently working on better
response functions and will present them when they become available, but
these will suffice for most applications. In all cases the first point
is a measured point, so the grid of wavelengths at which measurements
exist is a subset of the wavelength lists here."""
    hdu0.header.add_comment(foo.replace('\n',' '))
    hdu0.header.add_comment('')
    now = datetime.datetime.utcnow()
    hdu0.header.add_history('Converted from ASCII, {0} +0000.'.format(now.isoformat()))
    hdu0.header.add_history('Converted using convert_filters.py, revision {0}.'.format(__version__))
    filtables = [hdu0]
    for fil in ('u','g','r','i','z'):
        filtable = np.loadtxt(os.path.join(os.getenv('WWW_DIR'),'html','instruments','filters','{0}.dat'.format(fil)),
            dtype=[('wavelength','float32'),('respt','float32'),('resbig','float32'),('resnoa','float32'),('xatm','float32')])
        hdu=pyfits.new_table([
            pyfits.Column(name='wavelength',format='E',unit='angstrom',array=filtable['wavelength']),
            pyfits.Column(name='respt',format='E',array=filtable['respt']),
            pyfits.Column(name='resbig',format='E',array=filtable['resbig']),
            pyfits.Column(name='resnoa',format='E',array=filtable['resnoa']),
            pyfits.Column(name='xatm',format='E',array=filtable['xatm'])])
        hdu.name = fil
        #hdu.add_checksum()
        #hdu = pyfits.BinTableHDU(filtable,name=fil)
        #hdu.columns.change_attrib('wavelength','unit','angstrom')
        #hdu.columns.change_unit('wavelength','angstrom')
        #print hdu.columns[0].unit
        #hdu.columns[0].unit = 'angstrom'
        filtables.append(hdu)
    hdulist = pyfits.HDUList(filtables)
    hdulist.writeto('filter_curves.fits')
    return
#
#
#
if __name__ == '__main__':
    main()
