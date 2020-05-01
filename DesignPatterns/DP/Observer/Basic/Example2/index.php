<?php


use DP\App\Entity\User;

require_once __DIR__.'/../vendor/autoload.php';

/*
 Event Handler in the framework
 like Laravel using Observer pattern

 For example
   Update the Database
   Send message to user
   What append ? Observer
   Login example
*/


$user = new User();


$event = new \DP\Subject\MailingListSignup($user);
// dump($event);


# Attach Observer
$event->attach(new \DP\Observers\UpdateMailingStatusInDatabase());
$event->attach(new \DP\Observers\SubscribeUserToService());
// dump($event);


# Detach Observer
/*
$event->detach(new \DP\Observers\UpdateMailingStatusInDatabase());
$event->detach(new \DP\Observers\SubscribeUserToService());
*/

// dump($event);


# Notify
$event->notify();
