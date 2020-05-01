<?php


use DP\Events\MailingListSignup;


require_once __DIR__.'/../vendor/autoload.php';


$subscription = new \DP\Subscription();
// echo $subscription->price() . "<br>";

$subscription->setCost($subscription->price());
$subscription->setCost($subscription->priceWithSupport());
echo $subscription->getCost()."<br>";