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
$a = $stmt->fetchAll(PDO::FETCH_OBJ);


# Collection articles
$collection = new Collection($a);


/* echo count($collection); */

foreach ($collection as $article)
{
    $article->title .'<br>';
}
