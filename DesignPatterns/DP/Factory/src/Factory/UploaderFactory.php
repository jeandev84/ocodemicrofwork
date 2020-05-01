<?php
namespace DP\Factory;


use DP\Config;
use DP\Uploader;


/**
 * Class UploaderFactory
 * @package DP\Factory
*/
class UploaderFactory
{


    /** @var AdapterFactory  */
    protected $adapter;


    /**
     * Uploader constructor.
     * @param AdapterFactory $adapter
    */
    public function __construct(AdapterFactory $adapter)
    {
        $this->adapter = $adapter;
    }


    /**
     * @param Config $config
     * @return Uploader
     */
    public function make(Config $config)
    {
        // ...some logic here maybe.
        return new Uploader($this->adapter->make($config));
    }

}

/*
$factory = new UploaderFactory();
$factory->make();
*/