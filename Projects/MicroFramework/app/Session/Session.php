<?php
namespace App\Session;


use App\Session\Contracts\SessionStore;


/**
 * Class Session
 * @package App\Session
*/
class Session implements SessionStore
{

    /**
     * @param $key
     * @param null $default
     * @return mixed|void
     *
     * $this->get('name')
     * $this->get('name', 'Someone')
    */
    public function get($key, $default = null)
    {
         if($this->exists($key))
         {
             return $_SESSION[$key];
         }

         return $default;
    }

    /**
     * Session
     * @param $key
     * @param null $value
     * @return mixed|void
     *
     * $this->set('name', 'Brown');
     * $this->set([
     *   'name' => 'Brown',
     *   'age' => 120
     * ]);
     *
    */
    public function set($key, $value = null)
    {
        if(is_array($key))
        {
            foreach ($key as $sessionKey => $sessionValue)
            {
                $_SESSION[$sessionKey] = $sessionValue;
            }

            return;
        }

        $_SESSION[$key] = $value;
    }


    /**
     * Determine if the given key exist in session
     * @param $key
     * @return bool
     *
     * $this->>exists($key);
    */
    public function exists($key)
    {
        return isset($_SESSION[$key]) && !empty($_SESSION[$key]);
    }


    /**
     * Clear one or many session keys
     * @param mixed ...$key
     * @return mixed|void
     *
     * $this->clear('name');
     * $this->clear('name', 'abc');
     *
     * unset($_SESSION['name'], $_SESSION['age'], $_SESSION['cart'])
    */
    public function clear(...$key)
    {
         foreach ($key as $sessionKey)
         {
             if($this->exists($key))
             {
                 unset($_SESSION[$sessionKey]);
             }
         }
    }

}