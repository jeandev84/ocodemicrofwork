<?php
use Framework\JsonSerializable\User;


require __DIR__.'/../vendor/autoload.php';


$user1 = new User();
$user1->name = 'Jean';
$user1->email = 'jean@codecourse.com';

$user2 = new User();
$user2->name = 'Alex';
$user2->email = 'alex@codecourse.com';


$users = new \Framework\JsonSerializable\Collection([$user1, $user2, 'somestring']);
dump(json_encode($users));


echo json_encode($users);

// Can do this helping __toString to json_encode() inside Collection class
echo $users;