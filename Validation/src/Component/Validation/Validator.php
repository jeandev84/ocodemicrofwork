<?php
namespace Framework\Component\Validation;


use Framework\Component\Validation\Errors\ErrorBag;
use Framework\Component\Validation\Rules\Contracts\Rule;

/**
 * Class Validator
 * @package Framework\Component\Validation
*/
class Validator
{

    /** @var array  */
    protected $data = [];


    /** @var array  */
    protected $rules = [];


    /** @var array  */
    protected $errors = [];


    /**
     * Validator constructor.
     * @param array $data [ Example data from Form ]
    */
    public function __construct(array $data)
    {
         $this->data = $data;
         $this->errors = new ErrorBag();
    }


    /**
     * @param array $rules
    */
    public function setRules(array $rules)
    {
        $this->rules = $rules;
    }


    /**
     * Kick off validation
     *
     * @return bool
    */
    public function validate()
    {
        foreach ($this->rules as $field => $rules)
        {
            foreach ($rules as $rule)
            {
                 $this->validateRule($field, $rule);
            }
        }

        return $this->errors->hasErrors();
    }


    /**
     * Validate rule
     *
     * @param $field
     * @param Rule $rule
    */
    protected function validateRule($field, Rule $rule)
    {
         $value = $this->getFieldValue($field, $this->data);

         if(! $rule->passes($field, $value))
         {
              /* dump($rule->message($field)); */
              $this->errors->add($field, $rule->message($field));
         }
    }


    /**
     * Get value of field from the parse data
     * Example:
     *   $value = $this->getFieldValue($field, $this->data);
     *
     * @param $field
     * @param array $data
     * @return mixed|null
    */
    protected function getFieldValue($field, array $data)
    {
        return $data[$field] ?? null;
    }


    /**
     * Get errors
     * @return array
    */
    public function getErrors()
    {
         return $this->errors->getErrors();
    }

}