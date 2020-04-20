<?php

use App\Events\SomeEvent;
use App\Scheduler\Kernel;
use Carbon\Carbon;

require_once __DIR__.'/vendor/autoload.php';

/*
$event = new SomeEvent();
$event->cron('some cron expression');
var_dump($event->expression);

$kernel = new App\Scheduler\Kernel();
$kernel->add(new SomeEvent())->everyMinute();
$kernel->add(new SomeEvent())->monthly();
$kernel->add(new SomeEvent())->mondays()->at(12, 0);

$kernel->run();

Run this file via command line interface
$ php scheduler.php


$kernel = new Kernel();
$kernel->add(new SomeEvent())->everyMinute();
$kernel->run();

# TimeZone

$kernel = new Kernel();
$kernel->setDate(\Carbon\Carbon::now()->tz('Europe/Moscou'));

$kernel->add(new SomeEvent())->monthly();
$kernel->run();


Create monthly ( $ php scheduler.php )
$kernel = new Kernel();
$kernel->setDate(\Carbon\Carbon::create(2017, 10, 1, 0, 0, 0));

$kernel->add(new SomeEvent())->monthly();
$kernel->run();
*/


$kernel = new Kernel();
$kernel->setDate(Carbon::now()->tz('Europe/London'));

# $kernel->add(new SomeEvent())->monthly();
$kernel->add(new SomeEvent())->everyMinute();
$kernel->run();



