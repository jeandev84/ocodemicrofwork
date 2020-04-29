<?php
namespace App\Auth\Providers\Jwt;


use Firebase\JWT\JWT;
use Slim\Settings;

/**
 * Class FirebaseProvider
 * @package App\Auth\Providers\Jwt
 */
class FirebaseProvider implements JwtProviderInterface
{


    /** @var Settings  */
    protected $settings;



    /**
     * Factory constructor.
     * @param Settings $settings
     */
    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }


    /**
     * @param array $claims
     * @return mixed|string
    */
    public function encode(array $claims)
    {
        return JWT::encode($claims, $this->settings->get('jwt.secret'), 'HS256');
    }


    /**
     * @param string $token
     * @return object
     */
    public function decode($token)
    {
        return JWT::decode($token, $this->settings->get('jwt.secret'), ['HS256']);
    }
}