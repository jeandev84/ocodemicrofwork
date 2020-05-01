<?php
namespace App\Config\Parser;


use App\Config\Contracts\ParserInterface;

/**
 * Class ArrayParser
 * @package App\Config\Parser
*/
class ArrayParser implements ParserInterface
{

    /**
     * @param $file
     * @return mixed
    */
    public function parse($file)
    {
       return require $file;
    }
}