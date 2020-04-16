<?php

/*
phpinfo();
$ sudo nano /etc/php7/apache2/php.ini
# display_errors=Off (uncomment)
display_errors=On

$ sudo service apache2 restart
*/


require_once __DIR__.'/../vendor/autoload.php';


$app = new \Framework\Application();
$app->run();
