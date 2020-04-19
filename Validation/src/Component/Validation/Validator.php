<?php
namespace Framework\Component\Validation;


use Framework\Component\Validation\Errors\ErrorBag;
use Framework\Component\Validation\Rules\Contracts\Rule;
use Framework\Component\Validation\Rules\OptionalRule;


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
    protected static $aliases = [];


    /** @var array  */
    protected $errors = [];



    /**
     * Validator constructor.
     * @param array $data [ Example data from Form ]
    */
    public function __construct(array $data)
    {
         /* dump($data); */
         $this->data = $this->extractWildcardData($data);
         /* dump($this->data); */
         $this->errors = new ErrorBag();
    }

    /**
     * emails.*
     *   [ emails.0, emails.1, emails.2 ...]
     * @param $array
     * @param string $root
     * @param array $results
    */
    protected function extractWildcardData($array, $root = '', $results = [])
    {
         foreach ($array as $key => $value)
         {
              if(is_array($value))
              {
                   $results = array_merge($results, $this->extractWildcardData($value, $root. $key.'.'));
              }else{
                   $results[$root.$key] = $value;
              }
         }

         return $results;
    }


    /**
     * Set rules
     *  email key from data , may be from FORM
     * 'email' => [
     *   new RequiredRule(), // 'required'
     *   new MaxRule(5), // 'max:5'
     *   new BetweenRule(5), // 'between:5,9
     * ]
     * @param array $rules
    */
    public function setRules(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * @param array $aliases
    */
    public function setAliases(array $aliases)
    {
        self::$aliases = $aliases;
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
            $resolved = $this->resolveRules($rules);

            foreach ($resolved as $rule)
            {
                 /* dump($this->resolvedRulesContainsOptional($resolved)); */
                 $this->validateRule($field, $rule, $this->resolvedRulesContainsOptional($resolved));
            }
        }

        return $this->errors->hasErrors();
    }


    /**
     * @param array $rules
     * @return bool
     */
    protected function resolvedRulesContainsOptional(array $rules)
    {
        foreach ($rules as $rule)
        {
            if($rule instanceof OptionalRule)
            {
                 return true;
            }
        }

        return false;
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
     * @param bool $optional
     *
     * Looking:
     *    dump($this->data);
     *    dump($this->getMatchingData($field));
     */
    protected function validateRule($field, Rule $rule, $optional = false)
    {
        foreach ($this->getMatchingData($field) as $matchedField)
        {
             if(($value = $this->getFieldValue($matchedField, $this->data)) === '' && $optional)
             {
                  continue;
             }

             $this->validateUsingRuleObject($matchedField, $value, $rule);
        }
    }


    /**
     * @param $field
     * @param $value
     * @param Rule $rule
     */
    protected function validateUsingRuleObject($field, $value, Rule $rule)
    {
        if(! $rule->passes($field, $value, $this->data))
        {
            /* dump($rule->message($field)); */
            $this->errors->add($field, $rule->message(self::alias($field)));
        }
    }


    /**
     * Get matching data
     * @param $field
     *
     *  "users.0.email" => "jeanyao@ymail.com"
        "users.0.first_name" => "Jean"
        "users.1.email" => "jeanyao"
        "users.1.first_name" => "Brown"
        "users.2.email" => ""
        "users.2.first_name" => "Ashley
     *
    */
    protected function getMatchingData($field)
    {
         return preg_grep(
             '/^'. str_replace('*', '([^\.]+)', $field) .'/',
             array_keys($this->data)
         );
    }

    /*
    Details method
    protected function getMatchingData($field)
    {
         # replace "*" regular expression [ "users.([^\.]+).email"]
         $fieldRegex = str_replace('*', '([^\.]+)', $field);

         # keys for the data
         $dataKeys = array_keys($this->data);

         # find to replace field regex in datakeys
         return preg_grep('/^'. $fieldRegex .'/', $dataKeys);
    }
    */


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
     * Get alias of field
     *
     * Example:
     * dump(Validator::alias('first_name'));
     *
     * @param $field
     * @return mixed
    */
    public static function alias($field)
    {
        return self::$aliases[$field] ?? $field;
    }


    /**
     * Get aliases
     * @param $fields
     * @return array
    */
    public static function aliases($fields)
    {
        return array_map(function ($field) {
           return self::alias($field);
        }, $fields);
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