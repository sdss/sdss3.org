//
// Used to show or hide long blocks of text.
//
// For example, the document contains:
// <div id="shortText" style="display:block;">
// <p>Short text.</p>
// <p><a href="javascript:longer('Text');">MORE</a></p>
// </div>
// <div id="longText" style="display:none;">
// <p>Short text.</p>
// <p>Additional, much longer text.</p>
// <p><a href="javascript:shorter('Text');">LESS</a></p>
// </div>
//
function longer(layer)
{
    document.getElementById('short'+layer).style.display="none";
    document.getElementById('long'+layer).style.display="block";
}

function shorter(layer)
{
    document.getElementById('long'+layer).style.display="none";
    document.getElementById('short'+layer).style.display="block";
}
//
// Dynamically adjust the padding of items in the horizontal top and middle
// navbar menus.  This should work no matter what exact, font-dependent width
// is assigned to the individual items.
//
window.onload = function() {
    var debug = false;
    var border = 0; // width, in pixels of any border
    var divs = ['topnav','midnav','midnav_older','panel_links'];
    var indent = [0,25,25,0];
    for (var k=0; k<divs.length; k++) {
        var div = document.getElementById(divs[k]);
        if (div !== null) {
            var ul = div.getElementsByTagName('ul')[0];
            var ul_style = window.getComputedStyle(ul,null);
            var ul_width = parseFloat(ul_style.getPropertyValue('width'));
            var li = ul.getElementsByTagName('li');
            var total_width = 0;
            var total_padding = 0;
            var total_li = 0;
            if (debug) var txt = ''
            for (var i=0; i<li.length; i++) {
                if (li[i].parentNode.parentNode.nodeName == 'DIV') {
                    total_li++;
                    var style = window.getComputedStyle(li[i].firstChild,null)
                    if (debug) txt += (li[i].firstChild.nodeName+'('+li[i].firstChild.firstChild.nodeValue+'): '+style.getPropertyValue('padding-left')+','+style.getPropertyValue('width')+','+style.getPropertyValue('padding-right')+"\n");
                    var width = parseFloat(style.getPropertyValue('width'));
                    var paddingLeft = parseFloat(style.getPropertyValue('padding-left'));
                    var paddingRight = parseFloat(style.getPropertyValue('padding-right'));
                    total_width += width;
                    total_padding += paddingLeft+paddingRight;
                }
            }
            var pad = Math.floor(((ul_width - total_width -2*border*total_li) - indent[k])/(2*total_li));
            if (debug) alert(txt+"\npad="+pad);
            for (var i=0; i<li.length; i++) {
                if (li[i].parentNode.parentNode.nodeName == 'DIV') {
                    li[i].firstChild.style.paddingLeft = i == 0 ? (pad+indent[k]).toString()+'px' : pad.toString()+'px';
                    li[i].firstChild.style.paddingRight = pad.toString()+'px';
                }
            }
        }
    }
    return;
}



/** * Function that tracks a click on an outbound link in Google Analytics. 
	* This function takes a valid URL string as an argument, and uses that URL string as the event label. */ 
var trackOutboundLink = function(url) { ga('send', 'event', 'outbound', 'click', url, {'hitCallback': function () { document.location = url; } }); }