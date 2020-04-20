<?php

namespace App\Validation\Rules;

abstract class Rule
{
    /**
     * Undocumented function
     *
     * @param [type] $field
     * @param [type] $value
     * @return void
     */
    abstract public function passes($field, $value, $data);

    /**
     * Undocumented function
     *
     * @param [type] $field
     * @return void
     */
    abstract public function message($field);
}
