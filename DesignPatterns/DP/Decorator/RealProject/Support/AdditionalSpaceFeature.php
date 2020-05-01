<?php
namespace DP\Support;


use DP\Contract\SubscriptionFeature;

/**
 * Class AdditionalSpaceFeature
 * @package DP\Support
*/
class AdditionalSpaceFeature extends SubscriptionFeature
{

    public function price()
    {
        return $this->subscription->price() + 3;
    }

    public function description()
    {
       return $this->subscription->description() . ' + Additional space';
    }
}