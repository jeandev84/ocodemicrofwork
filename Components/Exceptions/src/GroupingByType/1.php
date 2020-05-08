<?php


require_once __DIR__.'/../vendor/autoload.php';


class CustomException extends Exception
{

}


class AnotherCustomException extends CustomException
{

}


throw new AnotherCustomException();


