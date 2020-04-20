<?php

namespace App\Validation\Rules;

use App\Validation\Rules\Rule;

class EmailRule extends Rule
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
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Undocumented function
     *
     * @param [type] $field
     * @return void
     */
    public function message($field)
    {
        return $field . ' must be a valid email address';
    }
}
