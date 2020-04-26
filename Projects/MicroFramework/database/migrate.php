<?php

# cli: php database/migrate.php
$pdo = require_once __DIR__ . '/connect/pdo.php';

$pdo->exec('TRUNCATE TABLE `users`');

$sql = '
CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(255) DEFAULT NULL,
    remember_identifier VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT NULL,
    updated_at TIMESTAMP DEFAULT NULL
);
';

/*
$sql .= 'CREATE TABLE IF NOT EXISTS posts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT NULL,
    updated_at TIMESTAMP DEFAULT NULL
);';
*/


/*
$sql .= 'ALTER TABLE users MODIFY COLUMN remember_token DEFAULT null';
$sql .= 'ALTER TABLE users MODIFY COLUMN remember_identifier DEFAULT null';
*/

try {

    $pdo->prepare($sql)->execute();
    echo "table users created successfully!\n";

} catch (Exception $e){
    die($e->getMessage());
}
