<?php

use App\Events\SomeEvent;
use App\Scheduler\Kernel;
use Carbon\Carbon;

require_once __DIR__ . '/vendor/autoload.php';

$kernel = new Kernel();

# $kernel->add(new SomeEvent())->dailyAt(12, 30);
$kernel->add(new SomeEvent())->daily()->at(12, 30);

$kernel->run();



