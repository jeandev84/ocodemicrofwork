<?php

/*
CREATE TABLE IF NOT EXISTS tasks (
    task_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    start_date DATE,
    due_date DATE,
    status TINYINT NOT NULL,
    priority TINYINT NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)  ENGINE=INNODB;


CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(255) NOT NULL,
    remember_identifier VARCHAR(255) NOT NULL,
)  ENGINE=INNODB;
*/

$pdo = new PDO('mysql:host=127.0.0.1;dbname=ocode_micro_framework;charset=utf8', 'root', '');

$sql = '
CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(255) NOT NULL,
    remember_identifier VARCHAR(255) NOT NULL
)  ENGINE=INNODB;
';

try {

    if($pdo->prepare($sql)->execute())
    {
        echo "table users created successfully!\n";
    }
} catch (Exception $e){
    die($e->getMessage());
}
