<?php
namespace DP;

use DP\Contract\Subscription;


/**
 * Class BasicSubscription
 * @package DP
*/
class BasicSubscription implements Subscription
{

    public function price()
    {
        return 5;
    }

    public function description()
    {
        return 'Basic subscription';
    }
}