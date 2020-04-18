<?php
namespace Framework\Component\Validation;


use Framework\Component\Validation\Rules\BetweenRule;
use Framework\Component\Validation\Rules\EmailRule;
use Framework\Component\Validation\Rules\MaxRule;
use Framework\Component\Validation\Rules\RequiredRule;
use Framework\Component\Validation\Rules\RequiredWithRule;

/**
 * Class RuleMap
 * @package Framework\Component\Validation
*/
class RuleMap
{
    /** @var array  */
    protected static $map = [
        'required'      => RequiredRule::class,
        'required_with' => RequiredWithRule::class,
        'email'         => EmailRule::class,
        'max'           => MaxRule::class,
        'between'       => BetweenRule::class,
    ];


    /**
     * @param $rule
     * @param $options
     * @return mixed
    */
    public static function resolve($rule, $options)
    {
        // ...$options can support many options
        return new static::$map[$rule](...$options);
    }
}