<?php

namespace App\Validation\Errors;

class ErrorBag
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $errors = [];

    /**
     * Undocumented function
     *
     * @param [type] $key
     * @param [type] $value
     * @return void
     */
    public function add($key, $value)
    {
        $this->errors[$key][] = $value;
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function hasErrors()
    {
        return empty($this->errors);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
