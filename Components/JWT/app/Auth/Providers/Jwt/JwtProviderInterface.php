<?php
namespace App\Auth\Providers\Jwt;


/**
 * Interface JwtProviderInterface
 * @package App\Auth\Providers\Jwt
*/
interface JwtProviderInterface
{
    /**
     * @param array $claims
     * @return mixed
    */
    public function encode(array $claims);
}