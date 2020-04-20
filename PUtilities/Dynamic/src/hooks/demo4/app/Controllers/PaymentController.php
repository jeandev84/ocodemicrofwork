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

               $response = 'get'. $e->getShortName() . 'Response';

               // dump($response); getCardDeclinedResponse
               return response()->json([
                    'data' => $this->{$response}()
               ]);
         }
     }


    /**
     * @param PaymentException $e
     * @return string
     */
     protected function getCardDeclinedResponse(PaymentException $e)
     {
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


function response()
{
    // return Response object
}