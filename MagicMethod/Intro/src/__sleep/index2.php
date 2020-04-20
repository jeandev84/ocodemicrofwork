<?php

$serialized = 'O:9:"SomeClass":1:{s:8:"property";s:5:"value";}';

$class = unserialize($serialized);

var_dump($class);