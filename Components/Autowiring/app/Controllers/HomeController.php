<?php
namespace App\Controllers;


use Framework\Config\Config;
use Framework\Database\Database;

/**
 * Class HomeController
 * @package App\Controllers
*/
class HomeController
{
    /** @var Config  */
    protected $config;

    /** @var Database  */
    protected $database;


    /**
      * HomeController constructor.
      * @param Config $config
      * @param Database $database
     */
     public function __construct(Config $config, Database $database)
     {
         $this->config = $config;
         $this->database = $database;
     }

    /**
      * @return array
     */
      public function index()
      {
          return [
             $this->config->get('app.name'),
             $this->database->connect()
          ];
      }
}