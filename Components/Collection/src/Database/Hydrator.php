<?php
namespace Framework\Database;


use PDOStatement;

/**
 * Class Hydrator
 * @package Framework\Database
*/
class Hydrator
{
     /** @var PDOStatement */
     protected $statement;

    /**
     * Hydrator constructor.
     * @param PDOStatement $statement
     */
     public function __construct(PDOStatement $statement)
     {
         $this->statement = $statement;
     }

     /**
      * @return array
     */
     public function getAllResultAsObject()
     {
         return $this->statement->fetchAll(\PDO::FETCH_OBJ);
     }
}