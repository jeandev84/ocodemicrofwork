<?php

require 'Collection.php';

$db = new PDO('mysql:host=localhost;dbname=collection', '', '');

$a = $db->query("SELECT * FROM articles");
$a = $a->fetchAll(PDO::FETCH_OBJ);

$articles = new Collection($a);
