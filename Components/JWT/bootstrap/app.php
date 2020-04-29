<?php

use Dotenv\Dotenv;
use Slim\Views\Twig;
use Slim\Factory\AppFactory;
use Slim\Views\TwigExtension;
use Slim\Psr7\Factory\UriFactory;
use Dotenv\Exception\InvalidPathException;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    (new Dotenv(__DIR__ . '/../'))->load();
} catch (InvalidPathException $e) {
    //
}

/*
email: jeanyao@ymail.com
password: secret123
dump(password_hash('secret123', PASSWORD_BCRYPT));
die;
*/

# Instance of application
$app = new Jenssegers\Lean\App();


# Bindings
$container = $app->getContainer();

// Settings
$container->get('settings')
          ->set('displayErrorDetails', true);

$container->get('settings')->set('db', [
    'driver' => 'mysql', // pgsql
    'host'   => '127.0.0.1',
    'database' => 'jwt_auth',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);


// Eloquent
$capsule = new Illuminate\Database\Capsule\Manager();
$capsule->addConnection($container->get('settings')->get('db'));

$capsule->setAsGlobal();
$capsule->bootEloquent();





# Check web routes
require_once __DIR__ . '/../routes/web.php';
