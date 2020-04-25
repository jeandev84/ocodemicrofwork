<?php
namespace Framework\Component\Validation\Rules;


use Framework\Component\Validation\Rules\Contracts\Rule;

/**
 * Class EmailRule
 * @package Framework\Component\Validation\Rules
*/
class EmailRule extends Rule
{

    /**
     * @param $field
     * @param $value
     * @param $data
     * @return bool
     */
     public function passes($field, $value, $data)
     {
         return filter_var($value, FILTER_VALIDATE_EMAIL);
     }

     /**
      * @param string $field
      * @return string
     */
     public function message($field)
     {
         return $field .' must be a valid email address';
     }
}