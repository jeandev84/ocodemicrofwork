<?php

return[
  'mysql' => [
      'driver' => 'mysql',
      'host' => env('DB_HOST', '127.0.0.1'),
      'database' => env('DB_DATABASE', 'ocode_micro_framework'),
      'username' => env('DB_USERNAME', 'jeandev84'),
      'password' => env('DB_PASSWORD', 'jeandev84'),
      'port' => env('DB_PORT', '3306'),
      'charset' => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix' => '', // Example : 'app_' for prefix table names
  ]
];