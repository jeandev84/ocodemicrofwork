<?php
namespace App\Controllers;

/**
 * Class WebhookController
 * @package App\Controllers
*/
class WebhookController
{

   /**
     * @param $request
     *
     * var_dump($request);
     * $request = object(stdClass)#3 (2) {
           ["type"]=>
           string(13) "card_declined"
           ["user"]=>
           int(1)
       }
    *
    * dump($method); Example: CardDeclined
   */
   public function handle($request)
   {
        $method = str_replace('_', '', ucwords($request->type, '_'));

        if(method_exists($this, $handler = 'handle'. $method))
        {
            $this->{$handler}($request);
        }
   }


   /**
     * @param $request
   */
   protected function handleCardDeclined($request)
   {
       dump('handle card declined.');
   }


    /**
     * @param $request
   */
   protected function handleSubscriptionCanceled($request)
   {
       dump('handle subscription canceled.');
   }
}