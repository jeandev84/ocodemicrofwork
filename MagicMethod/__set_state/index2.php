<?php

/*
__set_state()
var_export() Recupere an data to executed an php code
*/


/**
 * Class Config
*/
class Config
{

    /** @var array  */
    protected $config = [];

    /**
     * Config constructor.
     * @param $data
    */
    public function __construct($config)
    {
        $this->config = $config;
    }


    /**
     * @return array
    */
    public function getConfig()
    {
        return $this->config;
    }


    /**
     * @param $data
     * @return Config
     */
    public static function __set_state($data)
    {
        return new Config($data['config']);
    }


    /* Call not static : public function __set_state($an_array) { } */
    /* Call has static : public static function __set_state($an_array) { } */
}

$config = new Config([
    'db_name' => 'app'
]);

# Using for executing code php
# using for Cache
# var_export($config);

$code = '<?php return '. var_export($config, true) . ';';
# var_dump($code);

file_put_contents('cache.php', $code);

$cached = require('cache.php');

var_dump($cached->getConfig());

