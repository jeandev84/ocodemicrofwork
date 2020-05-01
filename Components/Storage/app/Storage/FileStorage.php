<?php
namespace App\Storage;


use App\Storage\Contracts\StorageInterface;

/**
 * Class FileStorage
 * @package App\Storage
*/
class FileStorage implements StorageInterface
{

    /** @var string  */
    protected $storageKey = 'items';

    /**
     * @var
    */
    protected $storagePath;

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

        $this->storagePath = __DIR__."/../../storage/{$this->storageKey}";

        if(! file_exists($this->storagePath))
        {
            mkdir( $this->storagePath, 0777, true);
        }

    }

    /**
     * @param string $basePath
     * @return $this
    */
    public function setBasePath(string $basePath)
    {
        $this->storagePath = $basePath.'/'. $this->storageKey;

        if(! file_exists($this->storagePath))
        {
            mkdir( $this->storagePath, 0777, true);
        }

        return $this;
    }


    /**
     * @param $key
     * @param $value
     * @return mixed
    */
    public function set($key, $value)
    {
         file_put_contents($this->storagePath."/$key", $value);
    }


    /**
     * @param $key
     * @return mixed
    */
    public function get($key)
    {
        /*
        if(file_exists($filename = $this->storagePath.'/'. $key))
        {
            return file_get_contents($filename);
        }
        */

        if($this->keyExists($key))
        {
            return file_get_contents($this->storagePath.'/'. $key);
        }

    }

    /**
     * @param $key
     * @return mixed
     */
    public function delete($key)
    {
        if(! $this->keyExists($key))
        {
            return;
        }

        unlink($this->storagePath.'/'. $key);
    }

    /**
     * Destroy all stuff by given Key
     * @return mixed
     */
    public function destroy()
    {
        $dir = opendir($this->storagePath);

        while (false !== ($item = readdir($dir)))
        {
             if(! in_array($item, ['.', '..']))
             {
                 unlink($this->storagePath.'/'. $item);
             }
        }
    }

    /**
     * @return mixed
     */
    public function all()
    {
        $items = [];

        $dir = opendir($this->storagePath);

        while (false !== ($item = readdir($dir)))
        {
            if(! in_array($item, ['.', '..']))
            {
                $items[$item] = file_get_contents($this->storagePath."/". $item);
            }
        }

        return $items;
    }


    /**
     * Determine if file exist
     *
     * @param $key
     * @return bool
    */
    protected function keyExists($key)
    {
        return file_exists($this->storagePath.'/'. $key);
    }
}