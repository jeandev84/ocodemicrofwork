<?php
namespace DP;


/**
 * Class Config
 * @package DP
 */
class Config extends Singleton
{
     /** @var array  */
     public $data = [
         'db' => [
             'host' => '127.0.0.1'
         ]
     ];
}