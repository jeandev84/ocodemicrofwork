<?php

/**
 * Documentation package
 * https://github.com/ircmaxell/RandomLib
 * https://github.com/GrahamCampbell/Laravel-Flysystem
 *
 * Factory used as Helper class
*/

require_once __DIR__.'/../vendor/autoload.php';


$lesson = new \DP\Lesson();
$specification = (new \DP\IsActive())->isSatisfiedBy($lesson);
dump($specification);


$lesson = new \DP\Lesson(false);
$specification = (new \DP\IsActive())->isSatisfiedBy($lesson);
dump($specification);