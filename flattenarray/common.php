<?php

function debug($variable, $die = false) {
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
    if($die) die;
}


function dump($variable, $die = false) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    if($die) die;
}
