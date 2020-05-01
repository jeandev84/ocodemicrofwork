<?php


$users = [
    ['name' => 'Dale', 'score' => 10],
    ['name' => 'Billy', 'score' => 200],
    ['name' => 'Alex', 'score' => 500],
    ['name' => 'Tabby', 'score' => 1],
];


// $user = array_last($users);
// dump($user);

# Get Last record
$user = array_last($users, function ($user, $key) {

    // bool true/false
    return array_get($user, 'score') <= 500;
});

dump($user);