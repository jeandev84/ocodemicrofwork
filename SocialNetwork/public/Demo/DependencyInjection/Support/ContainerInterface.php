<?php
namespace Framework\DependencyInjection\Support;


/**
 * Interface ContainerInterface
 * @package Framework\DependencyInjection\Support
*/
interface ContainerInterface extends \ArrayAccess
{

    /**
     * @param $key
     * @return mixed
    */
    public function has($key);


    /**
     * @param $key
     * @return mixed
    */
    public function get($key);
}