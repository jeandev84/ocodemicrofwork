<?php

use App\Events\SomeEvent;

require_once __DIR__.'/vendor/autoload.php';


$kernel = new App\Scheduler\Kernel();

/*
$kernel->add(new SomeEvent())->monthly()->at(12, 0);
$kernel->add(new SomeEvent())->everyMinute();
*/

$kernel->add(new SomeEvent())->everyMinute();
$kernel->add(new SomeEvent())->mondays()->at(12, 0);


$kernel->run();