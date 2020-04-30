/*
 *  How to use the Feed Control to grab, parse and display feeds.
 */
google.load("feeds", "1");

function OnLoad() {
    // Create a feed control
    var feedControl = new google.feeds.FeedControl();
    feedControl.addFeed("http://sdss3.wordpress.com/rss.xml");
    feedControl.draw(document.getElementById("sdss3blogcontent"));
}

google.setOnLoadCallback(OnLoad);
