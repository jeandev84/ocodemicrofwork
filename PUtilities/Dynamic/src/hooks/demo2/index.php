<?php

/*
 * Cleaning up code with dynamic method calling
*/


require_once __DIR__.'/../vendor/autoload.php';


/*
 'type' => 'card_declined',  CardDeclined,
 'type' => 'subscription_canceled', SubscriptionCanceled
*/

$request = (object) [
    'type' => 'subscription_canceled',
    'user' => 1
];

$controller = new \App\Controllers\WebhookController();
$controller->handle($request);