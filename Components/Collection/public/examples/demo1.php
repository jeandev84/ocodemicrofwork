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


# Testing
// debug($collection);
// debug($collection->all());
// debug($collection->count());
// dump($collection->isEmpty());
// debug($collection->first());
// debug($collection->last());


/*
Article 1 0
Article 2 1
Article 3 2
*/
$collection->each(function ($article, $key) {
    echo $article->title .' ', $key . '<br>';
});


/*
array_filter(['a', 'b', 'c'], function () {
    return true;
});

array_filter(['a', 'b', 'c'], function ($item) {
    return $item == 'a';
});


$articles = $collection->filter(function () {
    return false; // return empty array
});

dump($articles);


$articles = $collection->filter(function () {
    return true; // return items of collection
});

debug($articles);


$articles = $collection->filter(function ($article) {
    return $article; // each article
});

debug($articles);

$articles = $collection->filter(function ($article) {
    return $article->id == 1; // all article where id equal to 1
});

debug($articles);


$articles = $collection->filter(function ($article) {
    return $article->id > 1; // all article greatter 1
});

debug($articles);

$articles = $collection->filter(function ($article) {
    return $article->id > 1; // all article greatter 1
})->last();

debug($articles);

*/

/* debug($collection->keys()->all()); */


$articles = $collection->map(function ($article) {

    $article->title = 'Test';

    return $article;
});

dump($articles);



