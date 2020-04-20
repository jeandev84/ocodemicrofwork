<?php

namespace App\Validation\Rules;

use App\Validation\Rules\Rule;

class RequiredRule extends Rule
{
    /**
     * Undocumented function
     *
     * @param [type] $field
     * @param [type] $value
     * @return void
     */
    public function passes($field, $value, $data)
    {
        return !empty($value);
    }

    /**
     * Undocumented function
     *
     * @param [type] $field
     * @return void
     */
    public function message($field)
    {
        return $field . ' is required';
    }
}
