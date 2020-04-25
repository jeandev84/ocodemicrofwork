<?php
namespace App\Exceptions;


use App\Controllers\PaymentController;
use App\Exceptions\Traits\ExposesShortName;




/**
 * Class CardInvalidDeclined
 * @package App\Exceptions
*/
class CardInvalidDeclined extends PaymentException
{

}