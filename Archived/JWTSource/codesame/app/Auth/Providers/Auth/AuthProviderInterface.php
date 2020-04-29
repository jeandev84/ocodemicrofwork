<?php
namespace App\Auth\Providers\Auth;


/**
 * Interface AuthProviderInterface
 * @package App\Auth\Providers\Auth
 */
interface AuthProviderInterface
{
    public function byCredentials($username, $password);
    public function byId($id);
}