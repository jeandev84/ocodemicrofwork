<?php


use DP\Events\MailingListSignup;


require_once __DIR__ . '/../vendor/autoload.php';

/*
$subscription = new \DP\BasicSubscription();
echo $subscription->price();
echo '<br>';
echo $subscription->description();
*/

/*
$subscription = new DP\Support\SupportFeature(
    new \DP\Support\AdditionalSpaceFeature(
        new \DP\BasicSubscription()
    )
);
*/
$subscription = new \DP\BasicSubscription();

// Decorate new support subscription
$subscription = new DP\Support\SupportFeature($subscription);

// Decorate AdditionalSpaceFeature
$subscription = new \DP\Support\AdditionalSpaceFeature($subscription);


echo $subscription->price();
echo '<br>';
echo $subscription->description();