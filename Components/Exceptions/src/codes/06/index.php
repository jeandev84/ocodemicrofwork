<?php

class CustomException extends Exception
{

}

class AnotherCustomException extends CustomException
{
    
}

throw new AnotherCustomException();