<?php

# Demo
$arrayProviders = [
    'name' => [
        'Your name is required',
        'Your name cannot contain any numbers',
        'inner' => [
            'Some value'
        ]
    ],
    'dob' => [
        'Your date of bith is required'
    ],
    'password' => [
        'Your password must be 6 characters or more',
        'Your password is not strong enough'
    ],
    'String value'
];

/*
$flattened = new RecursiveArrayIterator($arrayProviders);
debug($flattened);
$flattened = new RecursiveIteratorIterator($flattened);
# debug($flattened);
# $flattened = iterator_to_array($flattened);
# debug($flattened);

echo '<h3>RecursiveArrayIterator</h3>';
$flattened = iterator_to_array($flattened, false);
debug($flattened);
*/

$flattened = iterator_to_array(new RecursiveIteratorIterator(
    new RecursiveArrayIterator($arrayProviders)
), false);

echo '<h3>RecursiveArrayIterator</h3>';
debug($flattened);


