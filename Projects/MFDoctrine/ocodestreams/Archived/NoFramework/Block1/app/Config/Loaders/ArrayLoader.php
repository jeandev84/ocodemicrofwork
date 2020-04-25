<?php
namespace App\Config\Loaders;

use App\Config\Loaders\Contracts\Loader;
use Exception;

/**
 * Class ArrayLoader
 * @package App\Config\Loaders
*/
class ArrayLoader implements Loader
{

    /** @var array  */
    protected $files;


    /**
     * ArrayLoader constructor.
     * @param array $files
    */
    public function __construct(array $files)
    {
        $this->files = $files;
    }


    public function parse()
    {
        $parsed = [];

        foreach ($this->files as $namespace => $path)
        {
            try {

                $parsed[$namespace] = require $path;

            } catch (Exception $e) {

            }
        }

        return $parsed;
    }
}