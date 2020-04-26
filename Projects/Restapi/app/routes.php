<?php

# [{id}] , [] signifit Parametre non obligatoire
$app->route(
    ['GET', 'PUT', 'POST', 'DELETE'],
    '/article[/{id}]',
    \App\Controllers\ArticleController::class
);
