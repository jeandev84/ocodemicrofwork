<?php


use DP\Events\MailingListSignup;


require_once __DIR__ . '/../vendor/autoload.php';


//

$user = new \DP\User();
$event = new MailingListSignup($user);
$event->attach(new \DP\Observers\UpdateMailingStatusInDatabase());
$event->attach(new \DP\Observers\SubscribeUserToService());

$event->notify();