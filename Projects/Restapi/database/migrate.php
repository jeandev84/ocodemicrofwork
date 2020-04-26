<?php

# cli: php database/migrate.php
$pdo = require_once __DIR__ . '/connect/pdo.php';

$pdo->exec('TRUNCATE TABLE `articles`');

$sql = '
CREATE TABLE IF NOT EXISTS articles(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    body TEXT DEFAULT NULL
);
';

for($i = 1 ; $i <= 10; $i++)
{
    $sql .= "INSERT INTO `articles` (title, body) VALUES('Article $i', '$i - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aspernatur commodi consectetur deserunt iusto labore libero quaerat repellat sunt veritatis!');";
}



/*
$sql .= 'CREATE TABLE IF NOT EXISTS posts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT NULL,
    updated_at TIMESTAMP DEFAULT NULL
);';
*/


try {

    $pdo->prepare($sql)->execute();
    echo "tables created successfully!\n";

} catch (Exception $e){
    die($e->getMessage());
}
