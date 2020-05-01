<?php
use App\Support\Arr;



if(! function_exists('array_get'))
{
    /**
     * @param $array
     * @param $key
     * @param null $default
     * @return mixed|null
    */
    function array_get($array, $key, $default = null)
    {
         return Arr::get($array, $key, $default);
    }
}



if(! function_exists('array_first'))
{
    /**
     * @param $array
     * @param callable $callback
     * @param null $default
     * @return mixed|null
     */
    function array_first($array, callable $callback = null, $default = null)
    {
         return Arr::first($array, $callback, $default);
    }
}



if(! function_exists('array_last'))
{
    /**
     * @param $array
     * @param callable $callback
     * @param null $default
     * @return mixed|null
     */
    function array_last($array, callable $callback = null, $default = null)
    {
        return Arr::last($array, $callback, $default);
    }
}



if(! function_exists('array_has'))
{
    /**
     * @param $array
     * @param $key
     * @return bool
     */
    function array_has($array, $key)
    {
        return Arr::has($array, $key);
    }
}



if(! function_exists('array_where'))
{
    /**
     * @param $array
     * @param callable $callback
     * @return array
     */
    function array_where($array, $callback)
    {
        return Arr::where($array, $callback);
    }
}




if(! function_exists('array_only'))
{
    /**
     * @param $array
     * @param $key
     * @return array
    */
    function array_only($array, $key)
    {
        return Arr::only($array, $key);
    }
}


if(! function_exists('array_forget'))
{
    /**
     * @param $array
     * @param $keys
     * @return array
     */
    function array_forget(&$array, $keys)
    {
        return Arr::forget($array, $keys);
    }
}