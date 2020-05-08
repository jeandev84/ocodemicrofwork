<?php

set_exception_handler(function (Throwable $e) {
    require('exception.twig');
});

throw new Exception('Something went wrong');
