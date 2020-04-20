<?php
namespace Framework\Packages\DotEnv;


# Get the environnement variable

/**
 * Class DotEnvProject
 * @package Framework\Packages\DotEnvProject
*/
class DotEnvProject
{

    /** @var string */
    protected $resource;

    protected $filename = '.env';

    /**
     * DotEnv constructor.
     * @param $resource
     */
    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    /**
     *
    */
    public function load()
    {
        $data = file_get_contents($this->resource.'/'. $this->filename);

        // TO FIX
        foreach ($data as $key => $value)
        {
             $_ENV[$key] = $value;
        }
    }

    /**
     * @param $key
     * @return array|false|string
     */
    public function get($key)
    {
        /*
        if(isset($_ENV[$key]))
        {
            return $_ENV[$key];
        }
        */
        return getenv($key);
    }

}