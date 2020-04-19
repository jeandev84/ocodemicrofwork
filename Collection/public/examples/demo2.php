<?php

use Framework\Common\Collection;
use Framework\Database\Connection;
use Framework\Database\Statement;


require_once __DIR__.'/helpers/functions.php';
require_once __DIR__.'/../vendor/autoload.php';

$config = require __DIR__.'/../config/database.php';

# Connection to database
$db = Connection::make($config);

# Statement
$statement = new Statement($db);
$stmt = $statement->execute('SELECT * FROM `articles`');
$articles = $stmt->fetchAll(PDO::FETCH_OBJ); /* debug($articles); */


# Collection articles
$collection = new Collection($articles);

// echo $collection->toJson();
echo $collection;

/*
echo json_encode($collection->all());
Dont work !
foreach ($collection->all() as $article)
{
    echo $article->title . '<br>';
}

Work !
foreach ($collection->all() as $article)
{
    echo $article->title . '<br>';
}
*/


