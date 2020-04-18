<?php

use App\Events\SomeEvent;

require_once __DIR__.'/vendor/autoload.php';


$event = new SomeEvent();
$event->cron('some cron expression');
var_dump($event->expression);


/*
$kernel = new App\Scheduler\Kernel();
$kernel->add(new SomeEvent())->everyMinute();
$kernel->add(new SomeEvent())->mondays()->at(12, 0);

$kernel->run();
*/