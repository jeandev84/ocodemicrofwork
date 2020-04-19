<?php

class Config
{
    protected $config = [];

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public static function __set_state($data)
    {
        return new Config($data['config']);
    }
}

$config = new Config([
    'db_name' => 'app'
]);

$code = '<?php return ' . var_export($config, true) . ';';

file_put_contents('cache.php', $code);

$cached = require('cache.php');

var_dump($cached->getConfig());
