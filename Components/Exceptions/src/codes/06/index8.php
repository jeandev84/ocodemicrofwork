<?php

abstract class ValidationException extends Exception
{
    protected $field;

    protected $value;

    abstract public function getError();

    public function __construct($field, $value)
    {
        $this->field = $field;
        $this->value = $value;
    }
}

class EmailException extends ValidationException
{
    public function getError()
    {
        return $this->field . ' must be a valid email';
    }
}

class MaxLengthException extends ValidationException
{
    protected $max;

    public function __construct($field, $value, $max)
    {
        parent::__construct($field, $value);

        $this->max = $max;
    }

    public function getError()
    {
        return $this->field . ' must be smaller than ' . $this->max . ' characters';
    }
}

abstract class Rule
{
    abstract public function run($field, $value);
}

class MaxLengthRule extends Rule
{
    protected $max;

    public function __construct($max)
    {
        $this->max = $max;
    }

    public function run($field, $value)
    {
        if (strlen($value) > $this->max) {
            throw new MaxLengthException($field, $value, $this->max);
        }
    }
}

class EmailRule extends Rule
{
    public function run($field, $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new EmailException($field, $value);
        }
    }
}

class Validator
{
    protected $errors;

    public function validate(array $rules, array $values)
    {
        try {
            foreach ($rules as $field => $ruleSet) {
                foreach ($ruleSet as $rule) {
                    $rule->run($field, $values[$field] ?? null);
                }
            }
        } catch (ValidationException $e) {
            $this->errors[$field][] = $e->getError();

            array_shift($rules[$field]);

            if (count($rules)) {
                $this->validate($rules, $values);
            }
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }
}

$validator = new Validator();
$validator->validate([
    'email' => [
        new MaxLengthRule(10),
        new EmailRule(),
    ]
], [
    'email' => 'alexcodecourse.com'
]);

var_dump($validator->getErrors());