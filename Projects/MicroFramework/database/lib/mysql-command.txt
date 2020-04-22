mysql -uroot -p
Enter password:
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 882
Server version: 10.3.22-MariaDB-1:10.3.22+maria~bionic mariadb.org binary distribution

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]> use ocode_micro_framework;
Database changed
MariaDB [ocode_micro_framework]> CREATE TABLE IF NOT EXISTS users (     id INT(11) AUTO_INCREMENT PRIMARY KEY,     name VARCHAR(255) NOT NULL,     email VARCHAR(255) NOT NULL,     password VARCHAR(255) NOT NULL,     remember_token VARCHAR(255) NOT NULL,     remember_identifier VARCHAR(255) NOT NULL, )  ENGINE=INNODB
-> Ctrl-C -- exit!
Aborted
jeandev@jeandev-Lenovo-G580:~$ mysql -uroot -p
Enter password:
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 884
Server version: 10.3.22-MariaDB-1:10.3.22+maria~bionic mariadb.org binary distribution

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]> use ocode_micro_framework;
Database changed

MariaDB [ocode_micro_framework]> CREATE TABLE IF NOT EXISTS users (
->     id INT AUTO_INCREMENT PRIMARY KEY,
->     name VARCHAR(255) NOT NULL,
->     email VARCHAR(255) NOT NULL,
->     password VARCHAR(255) NOT NULL,
->     remember_token VARCHAR(255) NOT NULL,
->     remember_identifier VARCHAR(255) NOT NULL
-> ) Engine=INNODB;
MariaDB [ocode_micro_framework]> show tables;
+---------------------------------+
| Tables_in_ocode_micro_framework |
+---------------------------------+
| users                           |
+---------------------------------+
1 row in set (0.001 sec)

MariaDB [ocode_micro_framework]> describe users;
+---------------------+--------------+------+-----+---------+----------------+
| Field               | Type         | Null | Key | Default | Extra          |
+---------------------+--------------+------+-----+---------+----------------+
| id                  | int(11)      | NO   | PRI | NULL    | auto_increment |
| name                | varchar(255) | NO   |     | NULL    |                |
| email               | varchar(255) | NO   |     | NULL    |                |
| password            | varchar(255) | NO   |     | NULL    |                |
| remember_token      | varchar(255) | NO   |     | NULL    |                |
| remember_identifier | varchar(255) | NO   |     | NULL    |                |
+---------------------+--------------+------+-----+---------+----------------+
6 rows in set (0.008 sec)

MariaDB [ocode_micro_framework]> insert into users (name, email, password, remember_token, remember_identifier) values('kouassi', 'jeanyao@ymail.com', 'demo', 'sometoken', 'someidentifier');
Query OK, 1 row affected (0.005 sec)

MariaDB [ocode_micro_framework]> describe users;
+---------------------+--------------+------+-----+---------+----------------+
| Field               | Type         | Null | Key | Default | Extra          |
+---------------------+--------------+------+-----+---------+----------------+
| id                  | int(11)      | NO   | PRI | NULL    | auto_increment |
| name                | varchar(255) | NO   |     | NULL    |                |
| email               | varchar(255) | NO   |     | NULL    |                |
| password            | varchar(255) | NO   |     | NULL    |                |
| remember_token      | varchar(255) | NO   |     | NULL    |                |
| remember_identifier | varchar(255) | NO   |     | NULL    |                |
+---------------------+--------------+------+-----+---------+----------------+
6 rows in set (0.001 sec)

MariaDB [ocode_micro_framework]> select * from users;
+----+---------+-------------------+----------+----------------+---------------------+
| id | name    | email             | password | remember_token | remember_identifier |
+----+---------+-------------------+----------+----------------+---------------------+
|  1 | kouassi | jeanyao@ymail.com | demo     | sometoken      | someidentifier      |
+----+---------+-------------------+----------+----------------+---------------------+
1 row in set (0.001 sec)

# Create User and give him all privilieges

MariaDB [ocode_micro_framework]> CREATE USER 'jeandev84'@'localhost' IDENTIFIED BY 'jeandev84';
Query OK, 0 rows affected (0.057 sec)

MariaDB [ocode_micro_framework]> GRANT ALL PRIVILEGES ON * . * TO 'jeandev84'@'localhost';
Query OK, 0 rows affected (0.000 sec)

MariaDB [ocode_micro_framework]> clear
MariaDB [ocode_micro_framework]> Ctrl-C -- exit!
Aborted
