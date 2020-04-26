<?php

require_once __DIR__.'/../bootstrap/app.php';


/* Send content and headers */
$container->get('emitter')->emit($response);
