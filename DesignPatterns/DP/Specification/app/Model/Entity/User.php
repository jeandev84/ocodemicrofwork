<?php
namespace DP\Entity;


/**
 * Class User
 * @package DP\Entity
*/
class User
{

    /** @var string */
    protected $table;


    /** @var string  */
    protected $email = 'user@site.com';


    /**
     * @param $column
     * @param $value
     * @return string
     */
    public function where($column, $value)
    {
          return sprintf(
              'SELECT * FROM %s WHERE %s = :%s',
              $this->table,
              $column,
              $column
          );
    }
}