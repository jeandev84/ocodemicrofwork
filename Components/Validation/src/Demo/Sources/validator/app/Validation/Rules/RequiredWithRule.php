<?php

namespace App\Validation\Rules;

use App\Validation\Validator;
use App\Validation\Rules\Rule;

class RequiredWithRule extends Rule
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $fields;

    /**
     * Undocumented function
     *
     * @param [type] $max
     */
    public function __construct(...$fields)
    {
        $this->fields = $fields;
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
        foreach ($this->fields as $field) {
            if ($value === '' && $data[$field] !== '') {
                return false;
            }
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
        return $field . ' is required with ' . implode(', ', Validator::aliases($this->fields));
    }
}
