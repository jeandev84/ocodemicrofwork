<?php
namespace Framework\Component\Validation\Rules;


use Framework\Component\Validation\Rules\Contracts\Rule;

/**
 * Class MaxRule
 * @package Framework\Component\Validation\Rules
*/
class MaxRule extends Rule
{

    /** @var mixed */
    protected $max;


    /**
     * MaxRule constructor.
     * @param $max
    */
    public function __construct($max)
    {
        $this->max = $max;
    }

    /**
     * @param $field
     * @param $value
     * @return bool
     */
     public function passes($field, $value)
     {
         return strlen($value) < $this->max;
     }

     /**
      * @param string $field
      * @return string
     */
     public function message($field)
     {
         return $field .' must be a max of '. $this->max .' characters';
     }
}