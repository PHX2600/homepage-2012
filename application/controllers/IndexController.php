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
        
        // Instantiate the Zend_Cache from application.ini
        $cache = $this->getFrontController()
            ->getParam('bootstrap')
            ->getPluginResource('cachemanager')
            ->getCacheManager()->getCache('default');
        
        // Load forum feed from cache if applicable else fetch it and cache it
        if ( ($this->view->forumFeed = $cache->load('forumFeed')) === false ) {
            
            try {
                // Instantiate forum RSS object
                $this->view->forumFeed = new Zend_Feed_Atom('https://www.phx2600.org/forum/feed.php?mode=topics');
            } catch (Exception $e) {
                // Set feed data to false on error
                $this->view->forumFeed = false;
            }
            
            // Cache the feed
            $cache->save($this->view->forumFeed, 'forumFeed');
            
        }
        
        // Load Twitter feed from cache if applicable else fetch it and cache it
        if ( ($this->view->twitterFeed = $cache->load('twitterFeed')) === false ) {
            
            try {
                // Instantiate twitter RSS object
                $this->view->twitterFeed = new Zend_Feed_Rss('https://api.twitter.com/1/statuses/user_timeline.rss?screen_name=phx2600');
            } catch (Exception $e) {
                // Set feed data to false on error
                $this->view->twitterFeed = false;
            }
            
            // Cache the feed
            $cache->save($this->view->twitterFeed, 'twitterFeed');
            
        }
        
    }

}

