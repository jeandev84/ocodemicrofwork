<?php
namespace DP;


use DP\Factory\AdapterFactory;


/**
 * Class Uploader
 * @package DP
*/
class Uploader
{

    /** @var  */
    protected $adapter;


    /**
     * Uploader constructor.
     * @param $adapter
    */
    public function __construct($adapter)
    {
         $this->adapter = $adapter;
    }

    /**
     * @param $file
     * @param $destination
     * @return string
    */
    public function upload($file, $destination)
    {
         /*
         $message = sprintf(
             'File (%s) moved to (%s)',
             $file,
             $destination
         );
         */
         /* $this->adapter->upload($file, $destination); */

         return $this->adapter; // ->upload($file, $destination);
    }
}

/*
$uploader = new Uploader();
$uploader->upload('new.png', '/public/uploads');
*/