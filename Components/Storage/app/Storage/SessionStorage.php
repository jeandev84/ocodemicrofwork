<?php
namespace App\Storage;


use App\Storage\Contracts\StorageInterface;

/**
 * Class SessionStorage
 * @package App\Storage
 */
class SessionStorage implements StorageInterface
{
    /** @var string  */
    protected $storageKey = 'items';

    /**
     * SessionStorage constructor.
     * @param null $storageKey
    */
    public function __construct($storageKey = null)
    {
          if ($storageKey)
          {
              $this->storageKey = $storageKey;
          }

          // set the session by default key
          if(! isset($_SESSION[$this->storageKey]))
          {
              $_SESSION[$this->storageKey] = [];
          }
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value)
    {
        $_SESSION[$this->storageKey][$key] = serialize($value);
    }


    /**
     * @param $key
     * @return mixed
    */
    public function get($key)
    {
        if(! isset($_SESSION[$this->storageKey][$key]))
        {
            return null;
        }

        return unserialize($_SESSION[$this->storageKey][$key]);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function delete($key)
    {
        unset($_SESSION[$this->storageKey][$key]);
    }

    /**
     * Destroy all stuff by given Key
     * @return mixed
    */
    public function destroy()
    {
        unset($_SESSION[$this->storageKey]);
    }

    /**
     * @return mixed
    */
    public function all()
    {
        $items = [];

        foreach ($_SESSION[$this->storageKey] as $key => $item)
        {
            $items[$key] = unserialize($item);
        }

        return $items;
    }
}

/*
$store = new App\Storage\SessionStorage('stuff');
$store->set('name', 'Me');
echo $store->set('age', 30);
$store->delete('name');
echo $store->get('name');

========================================

$store = new App\Storage\SessionStorage();

$user = new \App\Entity\User();
$store->set('user', $user);

dump($store->get('user'));
dump($_SESSION);

// dump($store);


$store = new App\Storage\SessionStorage();

$store->set('name', 'Mo');
$store->set('age', 20);

dump($store->all());

*/