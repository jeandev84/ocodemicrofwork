<?php

# Front Controller

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;



require_once __DIR__.'/../vendor/autoload.php';

/* dd(password_hash('secret123', PASSWORD_BCRYPT)); */

$config = new Configuration();

$connection = DriverManager::getConnection([
  'dbname' => 'ocode_pagination',
  'user' => 'root',
  'password' => '',
  'host' => '127.0.0.1',
  'driver' => 'pdo_mysql', // pdo_pgsql
]);


$queryBuilder = $connection->createQueryBuilder();
$queryBuilder->select('*')->from('users');


$builder = new \App\Pagination\Builder($queryBuilder);

$users = $builder->paginate($_GET['page'] ?? 1, 2); // (1, 10) if you have more data

// Give us list of all results
// dump($users->get());



// Give us render html
echo $users->render();