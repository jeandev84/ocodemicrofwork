<?php


$users = [
    ['name' => 'Dale', 'score' => 10],
    ['name' => 'Billy', 'score' => 200],
    ['name' => 'Alex', 'score' => 500],
    ['name' => 'Tabby', 'score' => 1],
];

# Get first without callback
$user = array_first($users);
dump($user);

# Get First record
$user = array_first($users, function ($user, $key) {
    // return $user['score'] >= 200;
    // return true;

    return array_get($user, 'score') > 200;
});