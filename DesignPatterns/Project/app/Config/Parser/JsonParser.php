<?php
namespace App\Config\Parser;


use App\Config\Contracts\ParserInterface;

/**
 * Class JsonParser
 * @package App\Config\Parser
*/
class JsonParser implements ParserInterface
{

    /**
     * @param $file
     * @return mixed
    */
    public function parse($file)
    {
        return json_decode(@file_get_contents($file), true);
    }
}