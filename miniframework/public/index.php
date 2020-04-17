<?php

require __DIR__.'/helpers/functions.php';
require __DIR__ . '/../vendor/autoload.php';


$app = new \Framework\App();

$container = $app->getContainer();

# Sharing
$container['config'] = function () {
  return [
      'db_driver' => 'mysql',
      'db_host'   => 'localhost',
      'db_name'   => 'ocode_mini_framework',
      'db_user'   => 'root',
      'db_pass' => '',
      'db_charset' => 'utf8'
  ];
};


$container['db'] = function ($c) {

   return new \PDO(
       sprintf('%s:host=%s;dbname=%s;charset=%s',
       $c->config['db_driver'],
       $c->config['db_host'],
       $c->config['db_name'],
       $c->config['db_charset']
       ),
       $c->config['db_user'],
       $c->config['db_pass']
   );
};


# Routing
$app->get('/', function () {
   echo  'Home';
});


$app->get('/users', function () {
    echo  'Users';
});


$app->run();
