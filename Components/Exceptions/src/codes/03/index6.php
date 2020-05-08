<?php

class Database
{
    public function query($sql)
    {
        var_dump($sql);

        // throw new Exception();
    }

    public function close()
    {
        var_dump('close connection');
    }
}

$database = new Database();

try {
    $database->query('SELECT * FROM user');
} catch (Exception $e) {
    var_dump('query failed');
} finally {
    $database->close();
}
