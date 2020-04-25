<?php

namespace App\Validation;

use App\Validation\Rules\MaxRule;
use App\Validation\Rules\EmailRule;
use App\Validation\Rules\BetweenRule;
use App\Validation\Rules\OptionalRule;
use App\Validation\Rules\RequiredRule;
use App\Validation\Rules\RequiredWithRule;

class RuleMap
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected static $map = [
        'required' => RequiredRule::class,
        'email' => EmailRule::class,
        'max' => MaxRule::class,
        'between' => BetweenRule::class,
        'required_with' => RequiredWithRule::class,
        'optional' => OptionalRule::class,
    ];

    /**
     * Undocumented function
     *
     * @param [type] $rule
     * @param [type] $options
     * @return void
     */
    public static function resolve($rule, $options)
    {
        return new static::$map[$rule](...$options);
    }
}
