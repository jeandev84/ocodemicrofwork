<?php
namespace Debug;


use Exception;

/**
 * Class ValidationException
 * @package Debug
 */
class ValidationException extends Exception
{

}


/**
 * Class Validator
 * @package Debug
 */
class Validator
{
    public function validate()
    {
        throw new ValidationException('data was invalid!');
    }
}



$validator = new \Debug\Validator();


try {

    $validator->validate();

} catch (\Debug\ValidationException $e) {

    exit($e->getMessage());
}