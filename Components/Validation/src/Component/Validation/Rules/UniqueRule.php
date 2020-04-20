<?php
namespace Framework\Component\Validation\Rules;

use Framework\Component\Validation\Rules\Contracts\Rule;


/**
 * Class UniqueRule
 * @package Framework\Component\Validation\Rules
*/
class UniqueRule extends Rule
{

    /**
     * @param string $field
     * @param $value
     * @param $data
     * @return bool|void
    */
    public function passes($field, $value, $data)
    {
        // TODO: Implement passes() method.
    }


    /**
     * @param $field
     * @return mixed|void
    */
    public function message($field)
    {
        // TODO: Implement message() method.
    }
}