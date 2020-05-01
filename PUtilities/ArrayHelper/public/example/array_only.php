<?php

$user = [
    'name' => 'Alex',
    'topics' => [
        ['title' => 'Hi arrays'],
        ['title' => 'Bye arrays']
    ],
    'country' => [
        'name' => 'UK'
    ]
];


# same results
// $user = array_only($user, 'name');
$user = array_only($user, ['name', 'country']);
//dump($user);


$user = array_merge(['name' => $user['name']], ['country' => $user['country']]);
//dump($user);


