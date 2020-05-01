<?php
namespace App\Storage;


use App\Storage\Contracts\StorageInterface;

/**
 * Class CookieStorage
 * @package App\Storage
*/
class CookieStorage implements StorageInterface
{

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value)
    {
        // TODO: Implement set() method.
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param $key
     * @return mixed
     */
    public function delete($key)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @return mixed
     */
    public function destroy()
    {
        // TODO: Implement destroy() method.
    }

    /**
     * @return mixed
     */
    public function all()
    {
        // TODO: Implement all() method.
    }
}