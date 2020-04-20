<?php
namespace App\Controllers;


use App\Exceptions\CardDeclined;
use App\Exceptions\PaymentException;
use Exception;



/**
 * Class PaymentController
 * @package App\Controllers
*/
class PaymentController
{
     public function store()
     {
         // dump('store');

         try {

             $this->makePayment();

         } catch (PaymentException $e) {

              if(method_exists($this, $handler = 'handle'. $e->getShortName()))
              {
                   $this->{$handler}($e);
              }
         }
     }


    /**
     * @param PaymentException $e
     * @return string
     */
     protected function handleCardDeclined(PaymentException $e)
     {
           // dump('handle card declined');
           dump($e->getMessage());
     }


     /**
      * @throws Exception
     */
     protected function makePayment()
     {
          throw new CardDeclined('Card was declined');
     }


    /**
     * @param Exception $e
     * @return bool
    */
    protected function existMethodHandleException(Exception $e)
    {
        return method_exists($this, 'handle'. $e->getShortName());
    }
}