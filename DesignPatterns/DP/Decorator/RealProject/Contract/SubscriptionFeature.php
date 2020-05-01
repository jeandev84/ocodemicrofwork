<?php
namespace DP\Contract;

/**
 * Class SubscriptionFeature
 * @package DP\Contract
*/
abstract class SubscriptionFeature implements Subscription
{

    /** @var  */
    protected $subscription;

    /**
     * SubscriptionFeature constructor.
     *
     * @param Subscription $subscription
    */
    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    abstract public function price();
    abstract public function description();
}