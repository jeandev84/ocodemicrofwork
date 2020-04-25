<?php
namespace App\Providers;

use App\Auth\Hashing\Contracts\Hasher;
use App\Auth\Hashing\BcryptHasher;
use League\Container\ServiceProvider\AbstractServiceProvider;

/**
 * Class HashServiceProvider
 * @package App\Providers
*/
class HashServiceProvider extends AbstractServiceProvider
{

    protected $provides = [
        Hasher::class
    ];


    public function register()
    {
        $this->getContainer()->share(Hasher::class, function () {
            return new BcryptHasher();
        });
    }
}