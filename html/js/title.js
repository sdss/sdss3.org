//
// Changes the document title to be the same as the first <h1> element
//
function change_title() {
    var h1 = document.getElementsByTagName("h1");
    var title = document.getElementsByTagName("title");
    if (h1.length > 0 && title.length > 0) {
        var h = h1[0].firstChild.cloneNode(false);
        var t = title[0].firstChild;
        h.nodeValue = "SDSS-III - " + h.nodeValue;
        t.parentNode.replaceChild(h,t);
    }
    return true;
}

