<?php
namespace Framework\Component\Validation\Rules;

use Framework\Component\Validation\Rules\Contracts\Rule;


/**
 * Class OptionalRule
 * @package Framework\Component\Validation\Rules
*/
class OptionalRule extends Rule
{

    /**
     * @param string $field
     * @param $value
     * @param $data
     * @return bool|void
    */
    public function passes($field, $value, $data)
    {
        return true;
    }


    /**
     * @param $field
     * @return mixed|void
    */
    public function message($field)
    {
        return null;
    }
}