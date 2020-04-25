<?php

namespace App\Validation;

use App\Validation\RuleMap;
use App\Validation\Rules\Rule;
use App\Validation\Errors\ErrorBag;
use App\Validation\Rules\OptionalRule;

class Validator
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $data = [];

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $rules = [];

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected static $aliases = [];

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    protected $errors;

    /**
     * Undocumented function
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $this->extractWildcardData($data);
        $this->errors = new ErrorBag();
    }

    /**
     * Undocumented function
     *
     * @param [type] $array
     * @param string $root
     * @param array $results
     * @return void
     */
    protected function extractWildcardData($array, $root = '', $results = [])
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $results = array_merge($results, $this->extractWildcardData($value, $root . $key . '.'));
            } else {
                $results[$root . $key] = $value;
            }
        }

        return $results;
    }

    /**
     * Undocumented function
     *
     * @param array $rules
     * @return void
     */
    public function setRules(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * Undocumented function
     *
     * @param array $aliases
     * @return void
     */
    public function setAliases(array $aliases)
    {
        self::$aliases = $aliases;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function validate()
    {
        foreach ($this->rules as $field => $rules) {
            $resolved = $this->resolveRules($rules);

            foreach ($resolved as $rule) {
                $this->validateRule($field, $rule, $this->resolvedRulesContainsOptional($resolved));
            }
        }

        return $this->errors->hasErrors();
    }

    /**
     * Undocumented function
     *
     * @param array $rules
     * @return void
     */
    protected function resolvedRulesContainsOptional(array $rules)
    {
        foreach ($rules as $rule) {
            if ($rule instanceof OptionalRule) {
                return true;
            }
        }

        return false;
    }

    /**
     * Undocumented function
     *
     * @param array $rules
     * @return void
     */
    protected function resolveRules(array $rules)
    {
        return array_map(function ($rule) {
            if (is_string($rule)) {
                return $this->getRuleFromString($rule);
            }

            return $rule;
        }, $rules);
    }

    /**
     * Undocumented function
     *
     * @param [type] $rule
     * @return void
     */
    protected function getRuleFromString($rule)
    {
        return $this->newRuleFromMap(
            ($exploded = explode(':', $rule))[0],
            explode(',', end($exploded))
        );
    }

    /**
     * Undocumented function
     *
     * @param [type] $rule
     * @param [type] $options
     * @return void
     */
    protected function newRuleFromMap($rule, $options)
    {
        return RuleMap::resolve($rule, $options);
    }

    /**
     * Undocumented function
     *
     * @param [type] $field
     * @param Rule $rule
     * @return void
     */
    protected function validateRule($field, Rule $rule, $optional = false)
    {
        foreach ($this->getMatchingData($field) as $matchedField) {
            if (($value = $this->getFieldValue($matchedField, $this->data)) === '' && $optional) {
                continue;
            }

            $this->validateUsingRuleObject($matchedField, $value, $rule);
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $field
     * @param [type] $value
     * @param Rule $rule
     * @return void
     */
    protected function validateUsingRuleObject($field, $value, Rule $rule)
    {
        if (!$rule->passes($field, $value, $this->data)) {
            $this->errors->add($field, $rule->message(self::alias($field)));
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $field
     * @return void
     */
    protected function getMatchingData($field)
    {
        return preg_grep('/^' . str_replace('*', '([^\.]+)', $field) . '/', array_keys($this->data));
    }

    /**
     * Undocumented function
     *
     * @param [type] $field
     * @param [type] $data
     * @return void
     */
    protected function getFieldValue($field, $data)
    {
        return $data[$field] ?? null;
    }

    /**
     * Undocumented function
     *
     * @param [type] $field
     * @return void
     */
    public static function alias($field)
    {
        return self::$aliases[$field] ?? $field;
    }

    /**
     * Undocumented function
     *
     * @param array $fields
     * @return void
     */
    public static function aliases(array $fields)
    {
        return array_map(function ($field) {
            return self::alias($field);
        }, $fields);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getErrors()
    {
        return $this->errors->getErrors();
    }
}
