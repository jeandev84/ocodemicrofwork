<?php
namespace DP\Subject;


use DP\Contract\Observer;
use DP\Contract\SplSubject;
use DP\Subject\Traits\Subjectable;


/**
 * Class Login
 * @package DP\Subject
*/
class Login implements SplSubject
{
    use Subjectable;

    protected $user;

    public function attempt()
    {

    }
}