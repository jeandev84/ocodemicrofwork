<?php


require_once __DIR__ . '/../vendor/autoload.php';

try {

    throw new \Debug\ValidationException('Data was invalid');

} catch (\Debug\ValidationException $e) {

    exit($e->getMessage());
}