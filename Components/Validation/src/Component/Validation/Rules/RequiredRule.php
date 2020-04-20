<?php
namespace Framework\Component\Validation\Rules;


use Framework\Component\Validation\Rules\Contracts\Rule;

/**
 * Class RequiredRule
 * @package Framework\Component\Validation\Rules
*/
class RequiredRule extends Rule
{

    /**
     * @param $field
     * @param $value
     * @param $data
     * @return bool
     */
     public function passes($field, $value, $data)
     {
         return ! empty($value);
     }

     /**
      * @param string $field
      * @return string
     */
     public function message($field)
     {
         return $field .' is required';
     }
}