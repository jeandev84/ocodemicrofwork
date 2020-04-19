<?php
namespace Framework\Helper;


use phpDocumentor\Reflection\Types\Collection;

/**
 * Class ArrayHelper
 * @package Framework\Helper
 */
class ArrayHelper
{
    static function all()
    {

    }
}


/**
 * @param array $items
 * @return Collection
*/
function collection($items = [])
{
    $instance = null;

    if(! $instance)
    {
        $instance = new Collection($items);
    }

    return $instance;
}