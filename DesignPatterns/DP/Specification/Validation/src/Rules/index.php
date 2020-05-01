<?php


require_once __DIR__ . '/../vendor/autoload.php';


$validator = new \DP\Validator();

$validator->isString()->isGreaterThan(10, 30);

/*
$validator->isString();
$validator->isString()
          ->isGreaterThan(10)
          ->withInput('jean');
*/