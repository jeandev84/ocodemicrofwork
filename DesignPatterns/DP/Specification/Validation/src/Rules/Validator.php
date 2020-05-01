<?php
namespace DP\Rules;


/**
 * Class Validator
 * @package DP\Rules
*/
class Validator
{

    /** @var array  */
    protected $rules = [];


    protected $input;


    /**
     * @param $method
     * @param $arguments
     * @return Validator
     */
    public function __call($method, $arguments)
    {
        /* dump($method, $arguments); */

        $this->rules[] = [
            'object' => $this->getRule($method),
            'argument' => $arguments
        ];

        return $this;
    }


    /**
     * @param $input
     * @return $this
     */
    public function withInput($input)
    {
        $this->input = $input;

        return $this;
    }


    /**
     * @return bool
     */
    public function isValid()
    {
        foreach ($this->rules as $rule)
        {
            if(! $rule['object']->isSatisfiedBy($this->input, $rule['argument']))
            {
                return false;
            }

            return true;
        }
    }

    /**
     * @param $rule
     * @return mixed
     */
    protected function getRule($rule)
    {
        return new $rule;
    }

    /**
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }
}