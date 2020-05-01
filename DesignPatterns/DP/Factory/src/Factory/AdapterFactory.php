<?php
namespace DP\Factory;


use DP\Config;
use DP\Adapter\FTPAdapter;
use DP\Adapter\S3Adapter;


/**
 * Class AdapterFactory
 * @package DP\Factory
*/
class AdapterFactory
{

     /**
      * @param Config $config
      * @return string
     */
     public function make(Config $config)
     {
          switch ($config->get('upload.default'))
          {
              case 's3':
                  return new S3Adapter();
                  break;
              case 'ftp':
                  return new FTPAdapter();
                  break;
          }
     }
}