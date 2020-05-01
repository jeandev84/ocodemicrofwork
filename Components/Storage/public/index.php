<?php


require __DIR__.'/../app/bootstrap.php';

$store = new App\Storage\FileStorage();

//$store->set('name', 'Mo');
//$store->set('age', 20);
//echo $store->get('age');
// $store->delete('name');

//$store->destroy();
//dump($store->all());

dump($store->all());