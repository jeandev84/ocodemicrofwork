<?php
namespace DP;


/**
 * Class User
 * @package DP
*/
class User
{

    /** @var bool  */
    public  $active;


    /**
     * User constructor.
     * @param bool $active
     */
    public function __construct(bool $active = true)
    {
        $this->active = $active;
    }
}