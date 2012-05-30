<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        
        // Instantiate the FirstFriday object
        $ff = new PHX2600_FirstFriday;
        
        // Get the First Friday timestamp
        $this->view->ff = $ff->firstFriday(false);
        
        // Determine if there's a meeting this week
        if (date('Ymd', time()) == date('Ymd', $this->view->ff)) {
            
            // There's a meeting tonight
            $this->view->meetingTonight = true;
            
        } elseif ($this->view->ff - time() <= 432000) {
            
            // There's a meeting this Friday
            $this->view->meetingThisFriday = true;
            
        }
        
        // Instantiate forum RSS object
        $this->view->forumFeed = new Zend_Feed_Atom('https://www.phx2600.org/forum/feed.php?mode=topics');
        
        // Instantiate twitter RSS object
        $this->view->twitterFeed = new Zend_Feed_Rss('https://api.twitter.com/1/statuses/user_timeline.rss?screen_name=phx2600');
        
    }

}

