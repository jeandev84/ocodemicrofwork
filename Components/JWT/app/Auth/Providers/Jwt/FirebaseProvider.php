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

    public function encode(array $claims)
    {
        return JWT::encode($claims, $this->settings->get('jwt.secret'), 'HS256');
    }

    public function decode($token)
    {
        // TODO: Implement decode() method.
    }
}