<?php include '../../header.php'; echo head('BOSSTILE_STATUS: BOSS tiling code status bits'); ?>

<table class="common">
<tr>
<th>Bit name</th>
<th>Binary digit</th>
<th>Description</th>
</tr>
<tr style="color:white;">
<td>TILED</td>
<td>0</td>
<td>assigned a fiber</td>
</tr>
<tr style="color:white;">
<td>NAKED</td>
<td>1</td>
<td>not in area covered by tiles</td>
</tr>
<tr style="color:white;">
<td>BOSSTARGET</td>
<td>2</td>
<td>in the high priority set of targets</td>
</tr>
<tr style="color:white;">
<td>DECOLLIDED</td>
<td>3</td>
<td>in the decollided set of high priority</td>
</tr>
<tr style="color:white;">
<td>ANCILLARY</td>
<td>4</td>
<td>in the lower priority, ancillary set</td>
</tr>
<tr style="color:white;">
<td>POSSIBLE_KNOCKOUT</td>
<td>5</td>
<td>knocked out of at least one tile by BOSSTARGET</td>
</tr>
<tr style="color:white;">
<td>IGNORE_PRIORITY</td>
<td>6</td>
<td>priority exceeds max (ANCILLARY only)</td>
</tr>
<tr style="color:white;">
<td>TOOBRIGHT</td>
<td>7</td>
<td>fibermag too bright </td>
</tr>
<tr style="color:white;">
<td>BLUEFIBER</td>
<td>8</td>
<td>allocate this object a blue fiber</td>
</tr>
<tr style="color:white;">
<td>CENTERPOST</td>
<td>9</td>
<td>92 arcsec collision with center post</td>
</tr>
<tr style="color:white;">
<td>REPEAT</td>
<td>10</td>
<td>included on more than one tile</td>
</tr>
<tr style="color:white;">
<td>FILLER</td>
<td>11</td>
<td>was a filler (not normal repeat)</td>
</tr>
<tr style="color:white;">
<td>NOT_TILED_TARGET</td>
<td>12</td>
<td>though in input file, not a tiled target</td>
</tr>
<tr style="color:white;">
<td>OUT_OF_BOUNDS</td>
<td>13</td>
<td>outside bounds for this sort of target (for restricted QSO geometry, e.g.)</td>
</tr>
<tr style="color:white;">
<td>BAD_CALIB_STATUS</td>
<td>14</td>
<td>bad CALIB_STATUS</td>
</tr>
<tr style="color:white;">
<td>PREVIOUS_CHUNK</td>
<td>15</td>
<td>included because not tiled in previous overlapping chunk</td>
</tr>
<tr style="color:white;">
<td>KNOWN_OBJECT</td>
<td>16</td>
<td>galaxy has known redshift</td>
</tr>
<tr style="color:white;">
<td>DUPLICATE</td>
<td>17</td>
<td>trimmed as a duplicate object (only checked if not trimmed for any other reason)</td>
</tr>
<tr style="color:white;">
<td>DUPLICATE_PRIMARY</td>
<td>18</td>
<td>has associated duplicate object that were trimmed (but this one is kept)</td>
</tr>
<tr style="color:white;">
<td>DUPLICATE_TILED</td>
<td>19</td>
<td>trimmed as a duplicate object, and its primary was tiled</td>
</tr>
<tr style="color:white;">
<td>TOOFAINT</td>
<td>20</td>
<td>trimmed because it was fainter than the ifiber2mag limit</td>
</tr>
<tr style="color:white;">
<td>SUPPLEMENTARY</td>
<td>21</td>
<td>supplementary targets tiles after the ancillaries (subset of ancillaries)</td>
</tr>
</table>
<?php echo foot(); ?>
