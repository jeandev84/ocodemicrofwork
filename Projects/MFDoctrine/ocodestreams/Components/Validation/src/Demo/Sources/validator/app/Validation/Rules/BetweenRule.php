<?php

namespace App\Validation\Rules;

use App\Validation\Rules\Rule;

class BetweenRule extends Rule
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $lower;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $upper;

    /**
     * Undocumented function
     *
     * @param [type] $max
     */
    public function __construct($lower, $upper)
    {
        $this->lower = $lower;
        $this->upper = $upper;
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
        if (strlen($value) < $this->lower) {
            return false;
        }

        if (strlen($value) > $this->upper) {
            return false;
        }

        return true;
    }

    /**
     * Undocumented function
     *
     * @param [type] $field
     * @return void
     */
    public function message($field)
    {
        return $field . ' must be between ' . $this->lower . ' and ' . $this->upper . ' characters';
    }
}
