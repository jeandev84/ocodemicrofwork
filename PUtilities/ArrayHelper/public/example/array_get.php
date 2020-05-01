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

# array_get

echo array_get($user, 'name');
echo '<br>';
echo array_get($user, 'country.name');
echo '<br>';
echo array_get($user, 'topics.0.title');
echo '<br>';
echo array_get($user, 'topics.0.body', 'No Body');
