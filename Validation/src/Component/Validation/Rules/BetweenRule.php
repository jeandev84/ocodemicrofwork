<?php
namespace Framework\Component\Validation\Rules;


use Framework\Component\Validation\Rules\Contracts\Rule;

/**
 * Class BetweenRule
 * @package Framework\Component\Validation\Rules
*/
class BetweenRule extends Rule
{

    /** @var mixed */
    protected $lower;


    /** @var mixed */
    protected $upper;


    /**
     * BetweenRule constructor.
     * @param $lower
     * @param $upper
    */
    public function __construct($lower, $upper)
    {
        $this->lower = $lower;
        $this->upper = $upper;
    }

    /**
     * @param $field
     * @param $value
     * @return bool
     */
     public function passes($field, $value)
     {
          if(strlen($value) < $this->lower)
          {
              return false;
          }

         if(strlen($value) > $this->upper)
         {
             return false;
         }

         return true;
     }

     /**
      * @param string $field
      * @return string
     */
     public function message($field)
     {
         /* echo $field .' must be between '. $this->lower .' and '. $this->upper .' characters' */
         return sprintf('%s must be between %s and %s characters',
           $field, $this->lower, $this->upper
         );
     }
}