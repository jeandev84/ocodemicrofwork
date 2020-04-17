<?php


# Function
function flatternArray(array $items, array $flattened = [])
{
    foreach ($items as $item)
    {
        if(is_array($item))
        {
            $flattened = flatternArray($item, $flattened);
            continue;
        }

        $flattened[] = $item;
    }

    return $flattened;
}

# Demo
$arrayProviders = [
    'name' => [
        'Your name is required',
        'Your name cannot contain any numbers',
        'key' => [
            'Something'
        ]
    ],
    'dob' => [
        'Your date of bith is required'
    ],
    'password' => [
        'Your password must be 6 characters or more',
        'Your password is not strong enough'
    ],
    'Something else'
];

echo '<h3>FlattenArray</h3>';
debug(flatternArray($arrayProviders));

/*
Array
(
    [0] => Your name is required
    [1] => Your name cannot contain any numbers
    [2] => Something
    [3] => Your date of bith is required
    [4] => Your password must be 6 characters or more
    [5] => Your password is not strong enough
    [6] => Something else
)
*/