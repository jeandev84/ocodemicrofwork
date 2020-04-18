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


    /** @var array  */
    protected $ruleMap = [];


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
            /* dump($this->resolveRules($rules)); */
            foreach ($this->resolveRules($rules) as $rule)
            {
                 $this->validateRule($field, $rule);
            }
        }

        return $this->errors->hasErrors();
    }


    /**
     * Resolve type of give rule 'string' or 'object'
     *
     * @param array $rules
     * @return array
     */
    protected function resolveRules(array $rules)
    {
        return array_map(function ($rule) {

            if(is_string($rule))
            {
                return $this->getRuleFromString($rule);
            }

            return $rule;
        }, $rules);
    }


    /**
     * Get Rule from string
     *
     * max:5
     * between:3,4
     *
     * @param $rule
     * @return mixed
     */
    protected function getRuleFromString($rule)
    {
        // get new rule from map
        return $this->newRuleFromMap(
            ($exploded = explode(':', $rule))[0],
            explode(',', end($exploded))
        );
    }


    /**
     * @param $rule
     * @param $options
     * @return mixed
    */
    protected function newRuleFromMap($rule, $options)
    {
        return RuleMap::resolve($rule, $options);
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

/*
function getRuleFromString($rule)
{
    $exploded = explode(':', $rule); // max:5
    $rule = $exploded[0]; // max
    $options = [end($exploded)]; // reste des valeurs

    # ...$options, prend plusieurs options (take severals options)
    return new $this->ruleMap[$rule](...$options); // ($a, $b) ..
}

function getRuleFromString($rule)
{
        // $rule = max:5, between:6,7
        $exploded = explode(':', $rule);

        // $rule = max, between
        $rule = $exploded[0];

        // end($exploded) => $options = [5], [6,7]
        $options = explode(',', end($exploded));

        // get new rule from map
        return $this->newRuleFromMap($rule, $options);
}
*/