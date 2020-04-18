<?php

use App\Core\Events\Dispatcher;
use App\Events\User\UserSignedIn;
use App\Listeners\User\SendSigninEmail;
use App\Listeners\User\UpdateLastSignInDate;
use App\Models\User;

require_once __DIR__.'/../vendor/autoload.php';


# User Entity
$user = new User();
$user->setId(1);
$user->setEmail('jeanyao@ymail.com');


# Dispatcher object and add listeners for specific event
$dispatcher = new Dispatcher();

$dispatcher->addListener('UserSignedIn', new SendSigninEmail());
$dispatcher->addListener('UserSignedIn', new UpdateLastSignInDate());


$event = new UserSignedIn($user);
$dispatcher->dispatch($event);