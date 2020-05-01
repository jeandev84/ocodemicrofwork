<?php


require_once __DIR__.'/../vendor/autoload.php';


$userRepository = new \DP\Repository\UserRepository();
$spec = new \DP\Service\EmailIsAvailable($userRepository);


dump($spec->isSatisfiedBy('jeandev@codecourse.com'));