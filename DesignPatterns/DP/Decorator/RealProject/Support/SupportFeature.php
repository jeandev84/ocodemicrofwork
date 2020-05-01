<?php
namespace DP\Support;


use DP\Contract\SubscriptionFeature;
use DP\Subscription;


/**
 * Class SupportFeature
 * @package DP\Support
*/
class SupportFeature extends SubscriptionFeature
{

    public function price()
    {
        return $this->subscription->price() + 1;
    }

    public function description()
    {
       return $this->subscription->description() . ' + Support';
    }
}