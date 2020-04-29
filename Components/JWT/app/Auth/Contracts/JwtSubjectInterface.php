<?php
namespace App\Auth\Contracts;

/**
 * Interface JwtSubjectInterface
 * @package App\Auth\Contracts
 *
 * This interface help us to authenticate any user
 * Admin, User, Moderator ...Guest
*/
interface JwtSubjectInterface
{
     public function getJwtIdentifier();
}