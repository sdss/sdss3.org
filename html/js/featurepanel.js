//
// Used with the featurepanel
//
$(document).ready(function() {
    $('a.panel').click(function () {
        $('a.panel').removeClass('selected');
        $(this).addClass('selected');
        current = $(this);
        $('#wrapper').scrollTo($(this).attr('href'), 800);
        return false;
    });
    //
    // This function was never actually called because of a bug.  We actually
    // DON'T want this to run!
    //
    //$(window).resize(function () {
    //    var width = $(window).width();
    //    var height = $(window).height();
    //    var mask_width = width * $('.item').length;
    //    //$('#debug').html(width  + ' ' + height + ' ' + mask_width);
    //    $('#wrapper, .item').css({width: width, height: height, float: 'inherit'});
    //    $('#mask').css({width: mask_width, height: height});
    //    $('#wrapper').scrollTo($('a.selected').attr('href'), 0);
    //    return false;
    //});
});
