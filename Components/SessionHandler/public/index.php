<?php


require __DIR__.'/../vendor/autoload.php';


try {

    $db = new PDO(
        'mysql:host=127.0.0.1;dbname=sessions',
        'root',
        ''
    );

} catch (PDOException $e) {

    die('Failed: '. $e->getMessage());
}



session_set_save_handler(
    new \Framework\Session\DatabaseSessionHandler($db)
);
// session_save_path(dirname(__DIR__).'/sessions');
// ini_set('session.gc_probability', 1);
session_start();


$_SESSION['name'] = 'Jean';
$_SESSION['name'] = 'Billy';
$_SESSION['name'] = 'Brown';

// echo $_SESSION['name'];

// session_destroy();

