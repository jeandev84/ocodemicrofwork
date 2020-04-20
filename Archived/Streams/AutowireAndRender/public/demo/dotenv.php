<?php
session_start();

require_once __DIR__.'/../vendor/autoload.php';

/*
# version dotenv 3.3.3
# $dotenv = \Dotenv\Dotenv::create(__DIR__.'/..//');
# $dotenv->load();
# var_dump(getenv('APP_NAME'));
*/


# version dotenv ^2.4
$dotenv = (new \Dotenv\Dotenv(__DIR__.'/..//'))->load();

var_dump(getenv('APP_NAME'));