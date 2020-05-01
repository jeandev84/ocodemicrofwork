<?php
namespace App\Config\Contracts;


/**
 * Interface ParserInterface
 * @package App\Config\Contracts
*/
interface ParserInterface
{
    public function parse($file);
}