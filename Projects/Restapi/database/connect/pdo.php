<?php

$config = [
  'dsn' => 'mysql:host=127.0.0.1;dbname=ocode_restapi;charset=utf8',
  'user' => 'root',
  'password' => ''
];

try {
    $pdo = new PDO($config['dsn'], $config['user'], $config['password']);
} catch (Exception $e){
    die($e->getMessage());
}

return $pdo;



