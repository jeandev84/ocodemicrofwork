<?php
namespace Framework\Component\Validation\Errors;


/**
 * Class ErrorBag
 * @package Framework\Component\Validation\Errors
*/
class ErrorBag
{

    /** @var array  */
    protected $errors = [];


    /**
     * Collect | Add error
     *
     * @param $key
     * @param $value
    */
    public function add($key, $value)
    {
        $this->errors[$key][] = $value;
    }


    /**
     * Determine if has errors
     *
     * @return bool
    */
    public function hasErrors()
    {
        return empty($this->errors);
    }

    /**
     * Get collected errors
     *
     * @return array
    */
    public function getErrors()
    {
        return $this->errors;
    }
}