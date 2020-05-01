<?php
namespace App\Support;



/**
 * Class Arr
 * @package App\Support
*/
class Arr
{

    /**
     * @param $value
     * @return bool
     */
    public static function accessible($value)
    {
        return is_array($value) || $value instanceof \ArrayAccess;
    }


    /**
     * @param $array
     * @param $key
     * @return bool
     */
    public static function exists($array, $key)
    {
        if ($array instanceof \ArrayAccess) {
            return $array->offsetExists($key);
        }

        return array_key_exists($key, $array);
    }


    /**
     * Get item from config
     *
     * @param $array (php 7.0.1 iterable $array)
     * @param $key
     * @param null $default
     *
     * is array iterable ?
     * is key null ?
     * if 1st level exists, return
     * iterate down and find the value
     * return value
     * @return mixed|null
     */
    public static function get($array, $key, $default = null)
    {
        if (!static::accessible($array)) {
            return $default;
        }


        if (is_null($key)) {
            return $array;
        }

        if (static::exists($array, $key)) {
            return $array[$key];
        }

        foreach (explode('.', $key) as $segment) {
            if (static::accessible($array) && static::exists($array, $segment)) {
                $array = $array[$segment];

            } else {
                return $default;
            }
        }

        return $array;
    }


    /**
     * Get first record
     *
     * @param $array
     * @param callable|null $callback
     * @param null $default
     * @return string
     */
    public static function first($array, callable $callback = null, $default = null)
    {
        if (is_null($callback)) {
            if (empty($array)) {
                return $default;
            }


            foreach ($array as $item) {
                return $item;
            }
        }


        foreach ($array as $key => $value) {
            if (call_user_func($callback, $value, $key)) {
                return $value;
            }
        }

        return $default;
    }


    /**
     * Get last record
     *
     * @param $array
     * @param callable|null $callback
     * @param null $default
     * @return string
     */
    public static function last($array, callable $callback = null, $default = null)
    {
        if (is_null($callback)) {
            if (empty($array)) {
                return $default;
            }

            return end($array);
        }

        // reverse the array
        // call self::first()

        return self::first(array_reverse($array, true), $callback, $default);
    }


    /**
     * Determine if one or multiple keys exists
     *
     * @param $array
     * @param $key
     * @return bool
     */
    public static function has($array, $key)
    {
        if (is_null($key)) {
            return false;
        }

        $keys = (array)$key;

        if ($keys === []) {
            return false;
        }

        foreach ($keys as $key) {
            $subKeyArray = $array;

            if (static::exists($array, $key)) {
                continue;
            }

            foreach (explode('.', $key) as $segment) {
                if (static::accessible($subKeyArray) && static::exists($subKeyArray, $segment)) {
                    $subKeyArray = $subKeyArray[$segment];

                } else {
                    return false;
                }
            }


        }

        return true;
    }


    /**
     * Filter array and used both params
     *
     * @param $array
     * @param callable $callback
     * @return array
     */
    public static function where($array, callable $callback)
    {
        return array_filter($array, $callback, ARRAY_FILTER_USE_BOTH);
    }


    /**
     * Get only params from array
     *
     * @param $array
     * @param $key
     * @return array
     *
     * array_flip
     *  Exchanges all keys with their associated values in array
     *
     * Example:
     * Arr::array_only($user, ['name', 'country'])
     *
     * dump((array) $key)
     *   array:2 [▼
     * 0 => "name"
     * 1 => "country"
     *   ]
     *
     * dump(array_flip((array) $key))
     *
     *  ^ array:2 [▼
     * "name" => 0
     * "country" => 1
     * ]
     *
     *
     * array_intersect_key($array, array_flip((array) $key));
     * ^ array:2 [▼
     * "name" => "Alex"
     * "country" => array:1 [▶]
     * ]
     */
    public static function only($array, $key)
    {
        return array_intersect_key(
            $array,
            array_flip((array)$key)
        );
    }


    /**
     * Remove key in array
     * Work like array_shift()
     *
     * @param $array
     * @param $keys
     */
    public static function forget(&$array, $keys)
    {
        $original = &$array;


        $keys = (array) $keys;

        foreach ($keys as $key)
        {
             if(static::exists($array, $key))
             {
                 unset($array[$key]);
                 continue;
             }

             $parts = explode('.', $key);

             $array = &$original;


             while(count($parts) > 1)
             {
                 $part = array_shift($parts);


                 if (static::accessible($array) && static::exists($array, $part)) {

                     $array = &$array[$part];

                 } else {
                     continue 2;
                 }
             }

             /* unset($array[$parts[0]]); revient a */
             unset($array[array_shift($parts)]);
        }
    }

}