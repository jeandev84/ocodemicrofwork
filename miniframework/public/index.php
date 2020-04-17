<?php

require __DIR__.'/helpers/functions.php';
require __DIR__ . '/../vendor/autoload.php';


$app = new \Framework\App();

$container = $app->getContainer(); /* debug($container); */

# Sharing (use object as array using ArrayAccess)
$container['config'] = function () {
  return [
      'db_driver' => 'mysql',
      'db_host'   => 'localhost',
      'db_name'   => 'ocode_mini_framework',
      'db_user'   => 'root',
      'db_pass' => '', // secret
      'db_charset' => 'utf8'
  ];
};

/*
dump($container->has('config'));
dump($container['config']);
dump($container->config);
debug($container);
*/


$container['db'] = function ($c) {
   /* dump($c, true);
   return new \PDO(
       'mysql:host=localhost;dbname=ocode_mini_framework',
       'root',
       ''
   );
   */

   return new \PDO(
       sprintf('%s:host=%s;dbname=%s;charset=%s',
       $c->config['db_driver'],
       $c->config['db_host'],
       $c->config['db_name'],
       $c->config['db_charset'] ?? 'utf8'
       ),
       $c->config['db_user'],
       $c->config['db_pass']
   );
};

dump($container->db);