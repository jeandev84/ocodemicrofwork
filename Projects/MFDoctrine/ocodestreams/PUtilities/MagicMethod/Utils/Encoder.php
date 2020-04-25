<?php


namespace Utils;

/**
 * Class Encoder
 * @package Utils
*/
class Encoder
{
    /**
     * @param $data
     * @return string
     */
    static function encode($data)
    {
        return base64_encode($data);
    }

    /**
     * @param $data
     * @return false|string
     */
    static function decode($data)
    {
        return base64_decode($data);
    }
}