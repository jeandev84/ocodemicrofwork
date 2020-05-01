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


//dump(array_has($user, 'name'));
//dump(array_has($user, 'country.name'));
//dump(array_has($user, ['name', 'country.name']));
//dump(array_has($user, ['topics.0.title', 'country.name'])); // true
dump(array_has($user, ['topics.0.flag', 'country.fake'])); // false