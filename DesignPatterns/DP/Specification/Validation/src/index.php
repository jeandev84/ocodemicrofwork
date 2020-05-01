<?php


require_once __DIR__ . '/../vendor/autoload.php';


/**
 * Class Validator
 */
class Validator
{

    /** @var array  */
    protected $rules = [];


    protected $input;


    /**
     * @param $method
     * @param $arguments
     * @return Validator
     */
    public function __call($method, $arguments)
    {
        /* dump($method, $arguments); */

        $this->rules[] = [
            'object' => $this->getRule($method),
            'argument' => $arguments
        ];

        return $this;
    }


    /**
     * @param $input
     * @return $this
    */
    public function withInput($input)
    {
          $this->input = $input;

          return $this;
    }


    /**
     * @return bool
    */
    public function isValid()
    {
         foreach ($this->rules as $rule)
         {
              if(! $rule['object']->isSatisfiedBy($this->input, $rule['argument']))
              {
                     return false;
              }

              return true;
         }
    }

    /**
     * @param $rule
     * @return mixed
     */
    protected function getRule($rule)
    {
        return new $rule;
    }

    /**
     * @return array
    */
    public function getRules()
    {
        return $this->rules;
    }
}


/**
 * Class IsString
 */
class IsString
{

    /**
     * @param $input
     * @return bool
     */
    public function isSatisfiedBy($input)
    {
        return is_string($input);
    }
}



/**
 * Class IsGreaterThan
 */
class IsGreaterThan
{

    /**
     * @param $input
     * @param $argument
     * @return bool
     */
    public function isSatisfiedBy($input, $argument)
    {
        return strlen($input) > $argument[0];
    }
}



/*
$validator = new Validator();
$validator->isString();
$validator->isString()
          ->isGreaterThan(10)
          ->withInput('jean');
*/

$validator = new Validator();

$validator->isString()->isGreaterThan(3)
                      ->withInput(2334949484494994);

dump($validator->isValid());

