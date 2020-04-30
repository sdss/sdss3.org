#!/usr/bin/env python2.7
#
#
#
"""Convert the bitmask files into a single accordion page.
"""
#
from __future__ import print_function
#
#
#
def main():
    """Main program.
    """
    # from glob import glob
    import re
    from os import getenv
    from os.path import basename, join
    #
    #
    #
    release = 'dr10'
    sidemenu_file = join(getenv('WWW_DIR'),'html','sidemenus','{0}_bitmask.php'.format(release))
    tdre = re.compile(r'<td>\s*(\d+)\s*</td>')
    div = '''
  <div class="panel panel-default" id="{flag_name}">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse{flag_name}">{flag_title}</a>
      </h4>
    </div>
    <div id="collapse{flag_name}" class="panel-collapse collapse">
      <div class="panel-body">
{flag_body}
      </div>
    </div>
  </div>
'''
    #
    #
    #
    with open(sidemenu_file) as s:
        sidemenu = [l.split('=>')[1].strip().replace(',','').replace("'",'')
            for l in s.readlines() if ('=>' in l and not l.startswith('//'))]
    for f in sidemenu:
        base = basename(f)
        if base == 'bitmasks.php':
            continue
        flag_path = join(getenv('WWW_DIR'),'html',f)
        with open(flag_path) as p:
            flag_lines = p.readlines()
        head = flag_lines[0]
        try:
            tail = flag_lines.index("<?php echo foot(); ?>\n")
        except ValueError:
            try:
                tail = flag_lines.index("<?php echo foot(); ?>\r\n")
            except ValueError:
                print(f)
                return 1
        body = ''.join(flag_lines[1:tail]).replace('\r','')
        body = body.replace('<table class="common">','<table class="table table-bordered table-condensed">\n<thead>')
        body = body.replace('<th>Bit name</th>','<th>Bit&nbsp;Name</th>')
        body = body.replace('<th>Binary digit</th>','<th>Binary&nbsp;Digit</th>')
        body = body.replace('<th>Description</th>\n</tr>','<th>Description</th>\n</tr>\n</thead>\n<tbody>')
        body = body.replace('</table>','</tbody>\n</table>')
        body = body.replace('<tr style="color:white;">','<tr>')
        body = tdre.sub(r'<td class="text-right">\1</td>',body)
        bitmask_data = {
            'flag_name':base.split('.')[0].replace('bitmask_','').upper(),
            'flag_title':head[head.index('head(')+6:head.rindex("');")],
            'flag_body':body
            }
        print(div.format(**bitmask_data))
    return 0
#
#
#
if __name__ == '__main__':
    from sys import exit
    exit(main())
