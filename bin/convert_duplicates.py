#!/usr/bin/env python2.7
#
# $Id: convert_duplicates.py 147950 2013-07-11 21:45:57Z sdss3svn $
#
"""
convert_duplicates
===============

Convert SEGUE-2 Duplicates file to FITS format.
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
    hdu0.header.add_comment('Each of these observations has a valid effective temperature, surface')
    hdu0.header.add_comment('gravity, and [Fe/H] from the SSPP. It also has a S/N>=10, a')
    hdu0.header.add_comment('correlation coefficient greater than 0, and no bad pixels. Finally,')
    hdu0.header.add_comment('the difference between the S/N of the multiple observations of an')
    hdu0.header.add_comment('individual target is less than 10.')
    hdu0.header.add_comment('')
    hdu0.header.add_comment('Each row of the table below contains:')
    hdu0.header.add_comment('Column 1: bestobjid')
    hdu0.header.add_comment('Columns 2-9: First observation')
    hdu0.header.add_comment('Columns 10-17: Second observation')
    hdu0.header.add_comment('For both observations, these values are provided:')
    hdu0.header.add_comment('    specobjid, plate, mjd, fiber, S/N, ra, dec, flags')
    now = datetime.datetime.utcnow()
    hdu0.header.add_history('Converted from ASCII, {0} +0000.'.format(now.isoformat()))
    hdu0.header.add_history('Converted using convert_duplicates.py, revision {0}.'.format(__version__))
    tables = [hdu0]
    duptable = np.loadtxt(os.path.join(os.getenv('HOME'),'Downloads','duplicate_list.dat'),
        dtype=[('bestobjid','int64'),
        ('specobjid1','int64'),('plate1','int32'),('mjd1','int32'),('fiberid1','int32'),('SN1','float32'),('ra1','float64'),('dec1','float64'),('flags1','S5'),
        ('specobjid2','int64'),('plate2','int32'),('mjd2','int32'),('fiberid2','int32'),('SN2','float32'),('ra2','float64'),('dec2','float64'),('flags2','S5'),
        ])
    hdu1=pyfits.new_table([
        pyfits.Column(name='bestobjid',format='K',array=duptable['bestobjid']),
        pyfits.Column(name='specobjid1',format='K',array=duptable['specobjid1']),
        pyfits.Column(name='plate1',format='J',array=duptable['plate1']),
        pyfits.Column(name='mjd1',format='J',array=duptable['mjd1']),
        pyfits.Column(name='fiberid1',format='J',array=duptable['fiberid1']),
        pyfits.Column(name='SN1',format='E',array=duptable['SN1']),
        pyfits.Column(name='ra1',format='D',unit='degrees',array=duptable['ra1']),
        pyfits.Column(name='dec1',format='D',unit='degrees',array=duptable['dec1']),
        pyfits.Column(name='flags1',format='5A',array=duptable['flags1']),
        pyfits.Column(name='specobjid2',format='K',array=duptable['specobjid2']),
        pyfits.Column(name='plate2',format='J',array=duptable['plate2']),
        pyfits.Column(name='mjd2',format='J',array=duptable['mjd2']),
        pyfits.Column(name='fiberid2',format='J',array=duptable['fiberid2']),
        pyfits.Column(name='SN2',format='E',array=duptable['SN2']),
        pyfits.Column(name='ra2',format='D',unit='degrees',array=duptable['ra2']),
        pyfits.Column(name='dec2',format='D',unit='degrees',array=duptable['dec2']),
        pyfits.Column(name='flags2',format='5A',array=duptable['flags2']),
        ])
    hdu1.name = 'DUPLICATES'
    #hdu.add_checksum()
    #hdu = pyfits.BinTableHDU(duptable,name=fil)
    #hdu.columns.change_attrib('wavelength','unit','angstrom')
    #hdu.columns.change_unit('wavelength','angstrom')
    #print hdu.columns[0].unit
    #hdu.columns[0].unit = 'angstrom'
    hdulist = pyfits.HDUList([hdu0,hdu1])
    hdulist.writeto('duplicate_list.fits')
    return
#
#
#
if __name__ == '__main__':
    main()
