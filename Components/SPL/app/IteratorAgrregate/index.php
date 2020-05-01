<?php


require __DIR__.'/../vendor/autoload.php';

/*
$users = new \Framework\Collection\Collection(['one', 'two', 'three']);

foreach ($users as $user)
{
    //
}
*/

$user1 = (new \Framework\Iterator\User())->setUsername('alex');
$user2 = (new \Framework\Iterator\User())->setUsername('billy');


# Access by implementation IteratorAggregate
$users = new \Framework\Iterator\Collection([$user1, $user2]);

foreach ($users as $user)
{
    echo $user->getUsername(). "<br>";
}

/*
$users = new \Framework\Iterator\Collection([$user1, $user2]);

foreach ($users->get() as $user)
{
    echo $user->getUsername(). "<br>";
}
*/

$user1 = (new \Framework\Iterator\User())->setUsername('alex');
$user2 = (new \Framework\Iterator\User())->setUsername('billy');


# Access by implementation IteratorAggregate
$users = new \Framework\Iterator\Collection([$user1, $user2]);

# ceci est impossible sans implementations de ArrayIterator (IteratorAggregate)
foreach ($users as $user)
{
    echo $user->getUsername(). "<br>";
}
