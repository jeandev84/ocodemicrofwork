<?php

class DatabaseWrapper
{
    public function __construct()
    {
        var_dump('open database connection');
    }

    public function query($query)
    {
        var_dump('run ' . $query);
    }

    public function __destruct()
    {
        var_dump('close database connection');
    }
}

$wrapper = new DatabaseWrapper();
$wrapper->query('SELECT * FROM users');