<?php

use Framework\Collection\Collection;

require __DIR__.'/../vendor/autoload.php';


$collection = new Collection([
    'one',
    'two',
    'three'
]);

dump($collection->count());

if($collection->count() > 0)
{

}

if(count($collection))
{

}

echo count($collection);