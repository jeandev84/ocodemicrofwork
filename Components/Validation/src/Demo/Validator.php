<?php
namespace Framework\Component\Validation;


/**
 * Class Validator
 * @package Framework\Component\Validation
 */
class Validator
{
    /** @var array  */
    private $data = [];


    /** @var array  */
    private $rules = [];


    /** @var array  */
    private $aliases = [];


    /** @var array  */
    private $errors = [];


    /**
     * Validator constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }


    /**
     * @param array $aliases
     */
    public function setAliases($aliases)
    {
        $this->aliases = $aliases;
    }


    /**
     * @param array $rules
     */
    public function setRules(array $rules)
    {
        $this->rules = $rules;
    }


    /**
     *
     */
    public function validate()
    {
        return empty($this->errors);
    }


    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }
}