<?php
use App\Controllers\WebhookController;

/*
 * Cleaning up code with dynamic method calling
*/


require_once __DIR__.'/../vendor/autoload.php';


/*
 'type' => 'card_declined',  CardDeclined,
 'type' => 'subscription_canceled', SubscriptionCanceled
*/

$request = (object) [
    'type' => 'card_declined',
    'user' => 1
];

$controller = new WebhookController();
$controller->handle($request);