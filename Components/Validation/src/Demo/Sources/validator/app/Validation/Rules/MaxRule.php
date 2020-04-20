<?php

namespace App\Validation\Rules;

use App\Validation\Rules\Rule;

class MaxRule extends Rule
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $max;

    /**
     * Undocumented function
     *
     * @param [type] $max
     */
    public function __construct($max)
    {
        $this->max = $max;
    }

    /**
     * Undocumented function
     *
     * @param [type] $field
     * @param [type] $value
     * @return void
     */
    public function passes($field, $value, $data)
    {
        return strlen($value) < $this->max;
    }

    /**
     * Undocumented function
     *
     * @param [type] $field
     * @return void
     */
    public function message($field)
    {
        return $field . ' must be a max of ' . $this->max . ' characters';
    }
}
