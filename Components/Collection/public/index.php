<?php

use Framework\Common\Collection;
use Framework\Database\Connection;
use Framework\Database\Statement;


require_once __DIR__ . '/helpers/functions.php';
require_once __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/../config/database.php';

# Connection to database
$db = Connection::make($config);

# Statement
$statement = new Statement($db);
$stmt = $statement->execute('SELECT * FROM `articles`');
$a = $stmt->fetchAll(PDO::FETCH_OBJ);


$stmt = $statement->execute('SELECT * FROM `articles`');
$b = $stmt->fetchAll(PDO::FETCH_OBJ);

/*
$collection = new Collection($a);
$articles = $collection->merge($b);
debug($articles->all());
*/
# Collection articles
$articleCollection = new Collection($a);
$moreArticleCollection = new Collection($b);

$articles = $articleCollection->merge($moreArticleCollection);

echo '<h3>More articles</h3>';
debug($moreArticleCollection->all());

echo '<h3>Articles</h3>';
debug($articles->all());