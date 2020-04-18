<?php
namespace Framework\Component\Validation\Rules\Contracts;


/**
 * Class Rule
 * @package Framework\Component\Validation\Rules\Contracts
 */
abstract class Rule
{
    /**
     * @param string $field
     * @param $value
     * @return bool
    */
    abstract public function passes($field, $value);


    /**
     * Get message
     * @param $field
     * @return mixed
    */
    abstract public function message($field);
}