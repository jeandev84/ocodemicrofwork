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
     * @param $data
     * @return bool
    */
    abstract public function passes($field, $value, $data);


    /**
     * Get message
     * @param $field
     * @return mixed
    */
    abstract public function message($field);
}