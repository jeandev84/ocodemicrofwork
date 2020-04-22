<?php
namespace App\Auth;


/**
 * Class Recaller
 * @package App\Auth
 *
 * Generate hashing
*/
class Recaller
{

    /**
     * (May choose |, ?, @ , ~ , ..)
     * @var string
    */
    protected $separator = '|';


    /**
     * Generate an identifier
    */
    public function generate()
    {
        return [
            $this->generateIdentifier(),
            $this->generateToken()
        ];
    }

    /**
     * @param $plain
     * @param $hash
     * @return bool
    */
    public function validateToken($plain, $hash)
    {
        return $this->getTokenHashForDatabase($plain) === $hash;
    }


    /**
     * Split cookie value by separator
     * @param $value
     * @return false|string[]
    */
    public function splitCookieValue($value)
    {
       return explode($this->separator, $value);
    }

    /**
     * Generate value for cookie
     * @param $identifier
     * @param $token
     * @return string
     */
    public function generateValueForCookie($identifier, $token)
    {
         # $identifier . '|' . $token
         return $identifier . $this->separator . $token;
    }


    /**
     * Get token hash for database
     * @param string $token
     * @return string
    */
    public function getTokenHashForDatabase($token)
    {
       return hash('sha256', $token);
    }


    /**
     * Generate identifier
     * @return string
     * @throws \Exception
    */
    protected function generateIdentifier()
    {
        return bin2hex(random_bytes(32));
    }

    /**
     * Generate token
     * @return string
     * @throws \Exception
    */
    protected function generateToken()
    {
        return bin2hex(random_bytes(32)); // 64
    }

}