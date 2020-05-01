<?php
namespace DP\Contract;


/**
 * Interface UploaderInterface
 * @package DP\Contract
 */
interface UploaderInterface
{
    /**
     * @param $file
     * @param $destination
     * @return mixed
     */
     public function upload($file, $destination);
}