<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    
<?php
    // Removes depricated error messages 
    error_reporting(E_ALL & ~E_DEPRECATED);
    
    // Include and instantiate the FirstFriday class
    require_once('libraries/FirstFriday.php'); $ff = new FirstFriday();

    // Include and instantiate the SimplePie class
    require_once('libraries/simplepie.inc'); $feed = new SimplePie();
?>

<head>
    <title>PHX2600 - The Phoenix, Arizona Network of Hackers</title>
    
    <link rel="shortcut icon" href="images/xhtml.png" />

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>
    
    <div class="navbar">
        <div class="header">
            <div class="container">
                <h1 class="site-title">
                    <a href="#">
                        <img src="img/phx2600_logo.png" width="214" height="40" alt="PHX2600 - The Phoenix, Arizona Network of Hackers" title="PHX2600 - The Phoenix, Arizona Network of Hackers" />
                    </a>
                </h1>
                
                <ul class="site-navigation pull-right">
                    <li class="active">
                        <a href="#"><i class="icon-home icon-white"></i> Home</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-th-list icon-white"></i> Forum</a>
                    </li>
                    <li>
                        <a href="#"><i class="icon-download-alt icon-white"></i> Archives</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container">
        
        <div class="definition">
            <strong>Hacker</strong> [hack·er] /n/ - One who seeks to understand the details of a system and strives to stretch it's capabilities beyond the original intent.
        </div>
        
        <?php if (date('Ymd', time()) == $ff->firstFriday('Ymd')): ?>
            <div class="alert alert-success">
                <strong>Meeting tonight starting at 6pm!</strong>
                Check the <a href="https://www.phx2600.org/forum/viewforum.php?f=2">Meeting Discussion</a> thread for more info.
                <a class="close" data-dismiss="alert">×</a>
            </div>
        <?php elseif ($ff->firstFriday(false) - time() <= 432000): ?>
            <div class="alert alert-info">
                <strong>Meeting this Friday, <?php echo $ff->firstFriday('F j, Y'); ?>.</strong>
                Check the <a href="https://www.phx2600.org/forum/viewforum.php?f=2">Meeting Discussion</a> thread for more info.
                <a class="close" data-dismiss="alert">×</a>
            </div>
        <?php endif; ?>
        
        <div class="row">
            
            <div class="span8">
                
                <div id="next-meeting" class="well">
                    <p>The next meeting witll be held at 6:00 PM on</p>                
                            
                    <div class="clearfix">
                        <div class="meeting-month">
                            <div class="number"><?php echo $ff->firstFriday('M'); ?></div>
                            <div class="midLine"></div>
                        </div>
                        <div class="meeting-day">
                            <div class="number"><?php echo $ff->firstFriday('d'); ?></div>
                            <div class="midLine"></div>
                        </div>
                        <div class="meeting-year">
                            <div class="number"><?php echo $ff->firstFriday('Y'); ?></div>
                            <div class="midLine"></div>
                        </div>
                    </div>
                    
                    <p>at <a href="#mapModal" data-toggle="modal">Citizen Espresso Bar</a></p>
                        
                </div>

            </div>
            
            <div id="forum-feed" class="span4 pull-right">
                
                <h3>Latest Forum Topics</h3>
                
                <?php
                    
                    // Fetch the fee URL
                    $feed->set_feed_url('https://www.phx2600.org/forum/feed.php?mode=topics');
                    
                    // Run SimplePie.
                    $feed->init();
                    
                    // Make sure the content is sent to the browser as text/html
                    // and the UTF-8 character set (since we didn't change it).
                    $feed->handle_content_type();
                    
                ?>
                
                <ul class="feed-list">
                    <?php $x = 1; foreach ($feed->get_items() as $item): ?>
                        <li>
                            <a href="<?php echo $item->get_permalink(); ?>">
                                <span class="feed-title"><?php echo $item->get_title(); ?></span>
                                <small><?php echo ($author = $item->get_author()) ? $author->get_name() : FALSE; ?> on <?php echo $item->get_date('M j, Y - g:i a'); ?></small>
                            </a>
                        </li>
                    <?php $x++; endforeach; ?>
                </ul>
                
            </div>
            
        </div>
                
        <div id="info-boxes" class="row">
            
            <div class="info-box span4">
                <h4>The Phoenix, Arizona Netowrk of Hackers</h4>
                <p>The PHX2600 is a local group of hackers and technology enthusiasts that meet on a monthly basis to discuss all things code, tech or otherwise hacker related.</p>
            </div>
            
            <div class="info-box span4">
                <h4>Meeting Info</h4>
                <p>Meetings are held on the first Friday of every month starting at 6PM at the location listed above. There is rarely any planed schedule for the meetings, anyone who is prepared and wishes to give a presentation or show off a project may do so at any time during a meeting. All meetings are open to the public so feel free to drop by.</p>
            </div>
            
            <div class="info-box span4">
                <h4>News and Updates</h4>
                <p>You can follow PHX2600 on Twitter or Google+ for miscellaneous news, meeting reminders and more.</p>
                <center>
                    <p>
                        <a href="https://twitter.com/#!/PHX2600"><img src="img/twitter_48.png" width="48" height="48" title="Follow PHX2600 on Twitter" alt="Twitter" /></a>
                        <a href="https://plus.google.com/117910250839532154362/posts"><img src="img/google_plus_48.png" width="48" height="48" title="Follow PHX2600 on Google+" alt="Google+" /></a>
                    </p>
                </center>
            </div>
            
        </div>
        
        
        <div id="meeting-guidelines" class="row">
            
            <div class="span12">
                <h3 class="section-title">Meeting Guidelines</h3>
            </div>
            
            <div class="guidelines span6">
                
                <h4>Official 2600 Guidelines:</h4>
                
                <p><small>These rules are taken directly from the main 2600 website.</small></p>
                
                <ol>
                    <li class="rules">We meet in a public area. Nobody is excluded. We have nothing to hide and we don't presume to judge who is worthy of attending and who is not. If law enforcement harasses us, it will backfire as it did at the infamous Washington DC meeting in 11/92. (You can find more information on this event in the Secret Service section of our web site.)</li>
                    <li class="rules">We act in a responsible manner. We don't do illegal things and we don't cause problems for the place we're meeting in. *Most* 2600 meetings are welcomed by the establishments we choose.</li>
                    <li class="rules">We meet on the first Friday of the month between 5 pm and 8 pm local time. While there will always be people who can't make this particular time, the same will hold true for *any* time or day chosen. By having all of the meetings on the same day, it makes it very easy to remember, opens up the possibility for inter-meeting communication, and really causes hell for the federal agencies who want to monitor everything we do. (A few meetings have slight variations on the meeting time - these are noted accordingly.)</li>
                    <li class="rules">While meetings are not limited to big cities, most of them take place in large metropolitan areas that are easily accessible.While it's convenient to have a meeting in your home town, we encourage people to go to meetings where they'll meet people from as wide an area as possible. So if there's a meeting within an hour or two of your town, go to that one rather than have two smaller meetings fairly close to each other. You always have the opportunity to get together with "home town hackers" any time you want.</li>
                    <li class="rules">All meetings *must* contact us to let us know how things are going even if nothing unusual is happening. If we don't hear from your city on a regular basis, we'll have to stop publicizing the site since telling people to go to where no meeting is really doesn't do anyone a service. You can email us at meetings@2600.com or call us at (631) 751-2600. We also need a way of getting back in touch with you.</li>
                </ol>
                
                <p>Anyone can have meetings and set whatever rules they wish. However, if they're going to be affiliated with 2600, we ask that these few guidelines be observed. Thanks.</p>
            
            </div>
            
            <div class="guidelines span6">
                    
                <h4>PHX2600 Specific Rules:</h4>
                
                <p>Over time our Phoenix meetings have built a reputation of being a very positive environment where no one will get "flamed" by someone that is super "1337." If you think you're better or smarter than someone, keep your arrogance to yourself, but not the knowledge. I'd like to continue to see such a friendly hacker environment and learn even more from it as well.</p>
                
                <h5>Projects &amp; Presentations</h5>
                
                <ul>
                    <li>There is rarely any planed schedule for the meetings, anyone who is prepared and wishes to give a presentation or show off a project may at any time during a meeting. Also, no one will be forced to give a presentation at any point, ever.</li>
                </ul>

                <h5>2550 Meetings (2600 Hangouts)</h5>
                <ul>
                    <li>2550 meetings (2600 hangouts) are unofficial meetings where a few or more of us from the group get together and just hang out (be it a movie, meal, hack night, etc.). 2550 meetings are rarely planned and usually quite spontaneous but usually announced via PHX2600 public channels (on the forum, via Twitter, etc.).</li>
                </ul>
                
                <div class="note well">
                    <h5>Note to anyone interested in starting a new meeting:</h5>
                    <p>If you've read the above guidelines and you're interested in starting a meeting, please do the following: Advertise the meeting place in your community - BBS's are one good way of getting the word out. Post meeting info on the usenet newsgroup alt.2600. Send us email (meetings@2600.com) telling us how your meetings are going after each meeting. We cannot publicize the meetings in 2600 until they have become established and it's up to you to get the word out in your community. Good luck!</p>
                    <p>IRC USERS: Connect to irc.2600.net and go to the channel for your state or country in order to find other people in your area. Use your state's two letter abbreviation followed by 2600 in order to find the right channel (#md2600, #ct2600, etc.) If you're outside the United States, put your two letter Internet country code after the 2600 (#2600au, #2600dk). For example, California and Canada use the same two letter abbreviation (CA). The California channel would be #ca2600 while the Canadian channel would be #2600ca. Other channels may exist for specific meetings within these areas - they should be referenced in the main state or country channels so people can find them. All 2600 channels, like the meetings, are open to all.</p>
                </div>
                
            </div>

        </div>
        
        <hr/>
        
        <div id="footer">
            &copy; <?php echo date('Y'); ?> <a href="https://www.phx2600.org">PHX2600</a>
        </div>
        
    </div>
    
    <div id="mapModal" class="modal fade hide">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Citizen Espresso Bar</h3>
        </div>
        <div class="modal-body">
            <iframe width="530" height="360" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=lola+coffee,+phoenix,+az&amp;hl=en&amp;ie=UTF8&amp;view=map&amp;cid=17466708338773990751&amp;t=m&amp;ll=33.511558,-112.073679&amp;spn=0.012881,0.022745&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
        </div>
    </div>
    
</body>

<!-- Page by, Chris Kankiewicz <http://www.chriskankiewicz.com> -->

</html>