<?php

/*
 * Cleaning up code with dynamic method calling
*/


require_once __DIR__.'/../vendor/autoload.php';


$controller = new \App\Controllers\PaymentController();
$controller->store();