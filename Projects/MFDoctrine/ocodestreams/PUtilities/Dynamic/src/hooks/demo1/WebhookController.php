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
     */
    public function handle($request)
    {
        if($request->type === 'card_declined')
        {
            $this->handleCardDeclined($request);
        }

        if ($request->type === 'subscription_canceled') {

            $this->handleSubscriptionCanceled($request);
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