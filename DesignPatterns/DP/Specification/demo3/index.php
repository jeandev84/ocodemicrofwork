<?php

/**
 * Documentation package
 * https://github.com/ircmaxell/RandomLib
 * https://github.com/GrahamCampbell/Laravel-Flysystem
 *
 * Factory used as Helper class
*/

require_once __DIR__.'/../vendor/autoload.php';


$lesson = new \DP\Lesson(false);
$user = new \DP\User(true);
$specification = (new \DP\IsActive())->isSatisfiedBy($user);
dump($specification);