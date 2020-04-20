<?php
namespace App\Helpers;


/**
 * Class FileSystem
 * @package App\Helpers
 */
class FileSystem
{

    /** @var string  */
    protected $root;


    /**
     * File constructor.
     * @param $root
   */
    public function __construct($root)
    {
        $this->root = rtrim($root, '\/');
    }

    public function resource($path)
    {
        return $this->resolvePath(
            $this->root .'/'. trim($path, '\/')
        );
    }

    /**
     * @param $path
     * @return string|string[]
    */
    protected function resolvePath($path)
    {
         return str_replace(['\\', '\/'], DIRECTORY_SEPARATOR, $path);
    }
}