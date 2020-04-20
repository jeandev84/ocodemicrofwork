<?php

/**
 * Class DatabaseWrapper
*/
class DatabaseWrapper
{
    /**
     * DatabaseWrapper constructor.
    */
    public function __construct()
    {
        var_dump('Open connection to database');
    }

    /**
     * @param $query
    */
    public function query($query)
    {
        var_dump('run '. $query);
    }

    /**
     * DatabaseWrapper destructor
    */
    public function __destruct()
    {
        var_dump('Close connection to database');
    }
}


$wrapper = new DatabaseWrapper();
$wrapper->query('SELECT * FROM users');

/*
string(27) "Open connection to database"
string(23) "run SELECT * FROM users"
string(28) "Close connection to database"
*/