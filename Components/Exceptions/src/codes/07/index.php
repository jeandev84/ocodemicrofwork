<?php

set_exception_handler(function (Throwable $e) {
    echo $e->getMessage();
});

throw new Exception('Something went wrong');
