<?php

class ConnectionFailedException extends Exception
{
    //
}

class QueryFailedException extends Exception
{
    //
}

class Database
{
    public function query()
    {
        if (true) {
            throw new ConnectionFailedException();
        }

        if (true) {
            throw new QueryFailedException();
        }
    }
}

$database = new Database();

try {
    $database->query();
} catch (ConnectionFailedException $e) {
    var_dump('log error');
} catch (QueryFailedException $e) {
    var_dump('show message to user');
}