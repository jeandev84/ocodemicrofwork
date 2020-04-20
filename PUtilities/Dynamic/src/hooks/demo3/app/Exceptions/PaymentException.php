<?php
namespace App\Exceptions;


use App\Exceptions\Traits\ExposesShortName;
use Exception;



/**
 * Class PaymentException
 * @package App\Exceptions
*/
abstract class PaymentException extends Exception
{
    use ExposesShortName;
}