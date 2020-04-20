<?php
namespace Framework\Component\Validation\Rules;


use Framework\Component\Validation\Rules\Contracts\Rule;
use Framework\Component\Validation\Validator;

/**
 * Class RequiredWithRule
 * @package Framework\Component\Validation\Rules
*/
class RequiredWithRule extends Rule
{

    /** @var mixed  */
    protected $fields;


    /**
     * RequiredWithRule constructor.
     * @param mixed ...$fields
    */
    public function __construct(...$fields)
    {
        $this->fields = $fields;
    }


    /**
     * @param $field
     * @param $value
     * @return bool
     */
     public function passes($field, $value, $data)
     {
         /* dump($this->fields); */
         foreach ($this->fields as $field)
         {
             if($value === '' && $data[$field] !== '')
             {
                 return false;
             }
         }

         return true;
     }


     /**
      * @param string $field
      * @return string
     */
     public function message($field)
     {
         # [First name, Last Name]
         /* dump(Validator::aliases($this->fields)); */
         return $field .' is required with ' . implode(', ', Validator::aliases($this->fields));
     }
}

/*
^ array:1 [▼
  "first_name" => array:2 [▼
    0 => "First name is required"
    1 => "First name is required with Last name, Middle name"
  ]
]
*/