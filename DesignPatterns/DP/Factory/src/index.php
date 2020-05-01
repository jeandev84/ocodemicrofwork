<?php

/**
 * Documentation package
 * https://github.com/ircmaxell/RandomLib
 * https://github.com/GrahamCampbell/Laravel-Flysystem
 *
 * Factory used as Helper class
 */

require_once __DIR__.'/../vendor/autoload.php';


// Example
$config = new \DP\Config();


$factory = new \DP\Factory\UploaderFactory(
    new \DP\Factory\AdapterFactory()
);


$uploader = $factory->make($config);

dump($uploader->upload('photo.png', '/public/uploads'));






