<?php
namespace App\Session;

use App\Session\Contracts\SessionStore;


/**
 * Class DatabaseSession
 * @package App\Session
*/
class DatabaseSession implements SessionStore
{


    public function get($key, $default = null)
    {
        // TODO: Implement get() method.
    }

    public function set($key, $value = null)
    {
        // TODO: Implement set() method.
    }

    public function exists($key)
    {
        // TODO: Implement exists() method.
    }

    public function clear(...$key)
    {
        // TODO: Implement clear() method.
    }
}