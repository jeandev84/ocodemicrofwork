<?php



$users = [
    ['name' => 'dale', 'points' => 200],
    ['name' => 'billy', 'points' => 5],
    ['name' => 'ashley', 'points' => 50],
    ['name' => 'alex', 'points' => 10],
    ['name' => 'tabby', 'points' => 1000],
];


$users = array_where($users, function ($user, $key) {

    return array_get($user, 'points') >= 200;
});


dump($users);


