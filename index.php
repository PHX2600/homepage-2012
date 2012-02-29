<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

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
    
    <div class="navbar navbar-fixed-top">
        <div class="header">
            <div class="container">
                <h1 class="site-title span4">
                    <a href="#">
                        <span class="hide-text">
                            PHX2600 - The Phoenix, Arizona Network of Hackers
                        </span>
                    </a>
                </h1>
                
                <ul class="site-navigation pull-right">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Forum</a></li>
                    <li><a href="#">Archives</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container">
        
        <div class="definition">
            <strong>Hacker</strong> [hack·er] /n/ - One who seeks to understand the details of a system and strives to stretch it's capabilities beyond the original intent.
        </div>
        
        <div class="next-meeting well">
            <p>The next meeting witll be held at 6:00 PM on</p>                
                
            <?php require_once('libraries/FirstFriday.php'); $ff = new FirstFriday(); ?>
                    
            <div class="clearfix">
                <div class="meeting-month">
                    <div class="number"><?php echo $ff->firstFriday(true, "M"); ?></div>
                    <div class="midLine"></div>
                </div>
                <div class="meeting-day">
                    <div class="number"><?php echo $ff->firstFriday(true, "d"); ?></div>
                    <div class="midLine"></div>
                </div>
                <div class="meeting-year">
                    <div class="number"><?php echo $ff->firstFriday(true, "Y"); ?></div>
                    <div class="midLine"></div>
                </div>
            </div>
            
            <p>at <a href="#mapModal" data-toggle="modal">Lola Coffee</a></p>
                
        </div>
            
        <div class="feeds row">
        
            <div class="forum-feed span7">
                <h3>Forum Feed</h3>
                
                <?php
                    // Include the SimplePie class
                    require_once('libraries/simplepie.inc');
                    
                    // Instantiate the SimplePie class
                    $feed = new SimplePie();
                    
                    // Fetch the fee URL
                    $feed->set_feed_url('https://www.phx2600.org/forum/feed.php?mode=topics');
                    
                    // Limit number of items retrieved
                    $feed->set_item_limit(5);
                    
                    // Run SimplePie.
                    $feed->init();
                    
                    // Make sure the content is sent to the browser as text/html
                    // and the UTF-8 character set (since we didn't change it).
                    $feed->handle_content_type();
                    
                    
                ?>
                
                <ul class="forum-feed">
                    <?php foreach ($feed->get_items() as $item): ?>
                        <li>
                            <h4><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h4>
                            <p><small>Posted by <?php echo ($author = $item->get_author()) ? $author->get_name() : FALSE; ?> on <?php echo $item->get_date('F j, Y - g:i a'); ?></small></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
                
                
            </div>
            
            <div class="twitter-feed span5">
                <h3>Twitter Feed</h3>
            </div>
        
        </div>
        
    </div>
    
    <div id="mapModal" class="modal fade">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Lola Coffee</h3>
        </div>
        <div class="modal-body">
            <iframe width="530" height="360" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=lola+coffee,+phoenix,+az&amp;hl=en&amp;ie=UTF8&amp;view=map&amp;cid=17466708338773990751&amp;t=m&amp;ll=33.511558,-112.073679&amp;spn=0.012881,0.022745&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
        </div>
    </div>
    
</body>

<!-- Page by, Chris Kankiewicz <http://www.chriskankiewicz.com> -->

</html>