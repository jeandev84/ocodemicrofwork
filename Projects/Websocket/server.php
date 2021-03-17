<?php
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use App\Chat;


# http://socketo.me/docs/server
# $ php server.php

require_once __DIR__.'/vendor/autoload.php';


$server = IoServer::factory(
    new HttpServer(
        new WsServer( // websocket server
            new Chat()
        )
    ),
    8000
);


$server->run();