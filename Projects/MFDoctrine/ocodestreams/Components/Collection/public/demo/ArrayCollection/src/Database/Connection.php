<?php
namespace Framework\Database;


/**
 * Class Connection
 * @package Framework\Database
 */
class Connection
{

     /** @var $pdo */
     protected static $pdo;


     /**
      * @param array $config
      * @return \PDO|null
     */
     public static function make(array $config)
     {
          try {

              self::$pdo = new \PDO($config['dsn'], $config['user'], $config['pass'], $config['options']);

          }  catch (\PDOException $exception){
               die($exception->getMessage());
          }

          return self::$pdo ?? null;
      }
}