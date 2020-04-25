<?php

# Key is required for doctrine
/*
return[
  'mysql' => [
      'driver' => env('DB_DRIVER', 'pdo_mysql'),
      'host' => env('DB_HOST', '127.0.0.1'),
      'dbname' => env('DB_DATABASE', 'homestand'),
      'user' => env('DB_USERNAME', 'root'),
      'password' => env('DB_PASSWORD', 'secret'),
  ]
];
*/
return[
  'mysql' => [
      'driver' => env('DB_DRIVER', 'pdo_mysql'),
      'host' => env('DB_HOST', '127.0.0.1'),
      'dbname' => env('DB_DATABASE', 'database'),
      'user' => env('DB_USERNAME', 'homestand'),
      'password' => env('DB_PASSWORD', 'secret'),
      'port' => env('DB_PORT', '3306')
  ]
];