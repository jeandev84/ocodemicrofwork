<?php
/*
CREATE TABLE IF NOT EXISTS `articles` (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    body TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)  ENGINE=INNODB;
*/

/*
$ mysql -uroot -p
Enter password:
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 2020
Server version: 10.3.22-MariaDB-1:10.3.22+maria~bionic mariadb.org binary distribution

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]> show databases;
+------------------------+
| Database               |
+------------------------+
| agenceimmobiliere      |
| animals                |
| biblio_api             |
| collection             |
| db_login_system        |
| fosuser                |
| information_schema     |
| laracasts_php          |
| laravel_ecommerce      |
| liorsymfo_blog         |
| monitoring             |
| mvclikepro             |
| mvclikeprologin        |
| mysql                  |
| ocode_mini_framework   |
| performance_schema     |
| recettes               |
| shop                   |
| skills                 |
| symfony_auth           |
| symfony_code_free_blog |
| symfony_easy_admin     |
| symfony_editor         |
| symfony_geo            |
| symfonyskills          |
| users                  |
| voitures               |
| webshake_blog          |
+------------------------+
28 rows in set (0.001 sec)

MariaDB [(none)]> use collection;
Database changed
MariaDB [collection]> CREATE TABLE IF NOT EXISTS `articles` (
    ->     id INT(11) AUTO_INCREMENT PRIMARY KEY,
    ->     title VARCHAR(255) NOT NULL,
    ->     body TEXT,
    ->     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    -> )  ENGINE=INNODB;
Query OK, 0 rows affected (0.059 sec)

MariaDB [collection]> show tables;
+----------------------+
| Tables_in_collection |
+----------------------+
| articles             |
+----------------------+
1 row in set (0.000 sec)


MariaDB [collection]> describe articles;
+------------+--------------+------+-----+---------------------+----------------+
| Field      | Type         | Null | Key | Default             | Extra          |
+------------+--------------+------+-----+---------------------+----------------+
| id         | int(11)      | NO   | PRI | NULL                | auto_increment |
| title      | varchar(255) | NO   |     | NULL                |                |
| body       | text         | YES  |     | NULL                |                |
| created_at | timestamp    | NO   |     | current_timestamp() |                |
+------------+--------------+------+-----+---------------------+----------------+
4 rows in set (0.019 sec)

MariaDB [collection]>

*/

