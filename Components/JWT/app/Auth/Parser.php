<?php
namespace App\Auth;


use App\Auth\Providers\Jwt\JwtProviderInterface;

/**
 * Class Parser
 * @package App\Auth
*/
class Parser
{

    /**
     * @var JwtProviderInterface
    */
    protected $jwtProvider;


    /**
     * Parser constructor.
     * @param JwtProviderInterface $jwtProvider
   */
    public function __construct(JwtProviderInterface $jwtProvider)
    {
         $this->jwtProvider = $jwtProvider;
    }


    /**
     * @param string $token
    */
    public function decode($token)
    {
        // extract token Bearer xxxx (token)
        // decode
        // dump($this->extractToken($token));

        return $this->jwtProvider->decode(
            $this->extractToken($token)
        );
    }


    /**
     * @param $token
     * \s (space)
     *
     * if preg match 'Bearer (space) xxxx(token)'
     * @return mixed
    */
    protected function extractToken($token)
    {
         if(preg_match('/Bearer\s(\S+)/', $token, $matches))
         {
              return $matches[1];
         }

         return null;
    }
}

/*
preg_match('/Bearer\s(\S+)/', $token, $matches);
dump($matches);
die;

0 - First capture group
1 - Second capture group

array:2 [
  0 => "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU4ODE4NzY2MCwibmJmIjoxNTg4MTg3NjYwLCJqdGkiOiI2YTRkMzQ1NzRiNjI3MzYzNmY1MjU2NDgzMzQ0Nzk3NDU4NzU0MjU5NTg0ODRlNjc2YzdhNTI2NTRkNmI1YTM2IiwiZXhwIjoxNTg4MTg3NzIwfQ.-dPMe0OH68yOsXz3x66qXqKbvnS_DONRFIQ1yAzA7H8"
  1 => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9hdXRoXC9sb2dpbiIsImlhdCI6MTU4ODE4NzY2MCwibmJmIjoxNTg4MTg3NjYwLCJqdGkiOiI2YTRkMzQ1NzRiNjI3MzYzNmY1MjU2NDgzMzQ0Nzk3NDU4NzU0MjU5NTg0ODRlNjc2YzdhNTI2NTRkNmI1YTM2IiwiZXhwIjoxNTg4MTg3NzIwfQ.-dPMe0OH68yOsXz3x66qXqKbvnS_DONRFIQ1yAzA7H8"
]
*/