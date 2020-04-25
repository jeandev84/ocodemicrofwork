<?php
namespace App\Helpers;


/**
 * Class Str
 * @package App\Helpers
 */
class Str
{
    /**
     * @param $string
     * @return false|string|string[]|null
    */
    public function toUpper($string)
    {
         return mb_strtoupper($string);
    }
}