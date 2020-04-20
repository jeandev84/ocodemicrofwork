<?php

$serialized = 'O:9:"SomeClass":1:{s:8:"property";s:5:"value";}';

$class = unserialize($serialized);
var_dump($class);

/*
object(__PHP_Incomplete_Class)#1 (2) {
  ["__PHP_Incomplete_Class_Name"]=>
  string(9) "SomeClass"
  ["property"]=>
  string(5) "value"
}
*/
