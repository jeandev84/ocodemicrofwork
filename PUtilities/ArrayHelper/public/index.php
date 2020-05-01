<?php

require __DIR__.'/../vendor/autoload.php';


$user = [
    'name' => 'Alex',
    'topics' => [
        ['title' => 'Hi arrays'],
        ['title' => 'Bye arrays']
    ],
    'country' => [
        'name' => 'UK',
        'flag' => [
            'url' => 'path_to_flag.png',
            'size' => 30
        ]
    ]
];


/*
$userDuplicate = &$user;
unset($userDuplicate['name']);
dump($user);
*/


// Variables by reference
// array_shift
// $name = array_shift($user);
// dump($name);

//array_forget($user, 'name');
//dump($user);


//array_forget($user, 'country.flag.url');
//dump($user);


array_forget($user, ['name', 'topics.0', 'country.flag.url']);
dump($user);










