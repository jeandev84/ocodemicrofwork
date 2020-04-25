<?php
namespace Framework\Database;


use Framework\Config\Config;

/**
 * Class Database
 * @package Framework\Database
*/
class Database
{

    /** @var Config  */
    protected $config;

    /**
      * Database constructor.
      * @param Config $config
     */
     public function __construct(Config $config)
     {
         $this->config = $config;
     }

     /**
      * @return mixed
     */
     public function connect()
     {
         return $this->config->get('db.host');
     }
}