<?php
namespace App\Validation\Rules;


use App\Models\Eloquent\User;
use Doctrine\ORM\EntityManager;

/**
 * Class ExistsRule
 * @package App\Validation\Rules
*/
class ExistsRule implements Rule
{

//     /** @var  */
//     protected $db;
//
//     /**
//      * ExistsRule constructor.
//      * @param EntityManager $db
//     */
//     public function __construct(EntityManager $db)
//     {
//         $this->db = $db;
//     }

     /**
       * @param $field
       * @param $value
       * @param $params
       * @param $fields
      */
      public function validate($field, $value, $params, $fields)
      {

          return User::where($field, '=', $value)->first() === null;

          /*
          $result = $this->db->getRepository($params[0])
                             ->findOneBy([
                                 $field => $value
                             ]);

          return $result === null;
          */
      }
}