<?php


use DP\Events\MailingListSignup;


require_once __DIR__ . '/../vendor/autoload.php';


# Array Parser
/*
$config = new \App\Config\Config(
    new \App\Config\Parser\ArrayParser()
);

dump($config);
$config->load(__DIR__.'/../config/database.php');


# JsonParser
$config = new \App\Config\Config(
    new \App\Config\Parser\JsonParser()
);

dump($config);
$config->load(__DIR__.'/../config/database.json');

echo $config->get('mysql.host');

$config = new \App\Config\Config(
    new \App\Config\Parser\ArrayParser()
);

// $config->setParser(new \App\Config\Parser\JsonParser());
$config->load(__DIR__.'/../config/database.json');
*/

$config = new \App\Config\Config(
    new \App\Config\Parser\ArrayParser()
);

$config->load(__DIR__ . '/../config/database.php');
// echo $config->get('mysql.host');


$config = new \App\Config\Config(
    new \App\Config\Parser\JsonParser()
);

$config->load(__DIR__ . '/../config/database.json');

echo $config->get('mysql.host');
dump($config->get('sqlite.host', null));
dump($config->get('pgsql.host', ''));

