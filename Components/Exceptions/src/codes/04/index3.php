<?php

class ValidationException extends Exception
{

}

try {
    throw new ValidationException('Data was invalid');
} catch (ValidationException $e) {
    var_dump($e->getMessage());
}
