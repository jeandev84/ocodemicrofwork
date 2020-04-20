<?php

$route->get('/', function ($request, $response) {

   /*
      dump($request->getQueryParams());
      dump($request, $response);
   */
   $response->getBody()->write('Home');
   return $response;
});