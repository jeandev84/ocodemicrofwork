<?php
namespace App\Pagination\Renderers;


use App\Pagination\Meta;
use App\Pagination\PageIterator;

/**
 * Class RendererAbstract
 * @package App\Pagination\Renderers
*/
abstract class RendererAbstract
{
    /** @var Meta */
    protected $meta;


    /**
     * PlainRenderer constructor.
     * @param Meta $meta
     */
    public function __construct(Meta $meta)
    {
        $this->meta = $meta;
    }


    /**
     * Generate page you want
     * 1 2 3 4 5 ..
     * 28 29 30 31 32 ..100
     * 98 99 100
     *
     * array_unique() permit to not duplicate record
     */
    public function pages()
    {
        $lrCount = 2; // x ... left right count

        $range = range(1, $this->meta->lastPage());

        // 100

        $endDifference = max(0,
            $this->meta->page - ($this->meta->lastPage - $lrCount) + 1
        );


        $range = array_slice(
            array_slice($range, max(1, ($this->meta->page - $lrCount) - $endDifference)),
            0,
            ($lrCount * 2)
        );

        array_unshift($range, 1);
        $range[] = $this->meta->lastPage();


        /* return array_unique($range); */

        return new PageIterator(
            array_unique($range),
            $this->meta
        );
    }


    abstract public function render();
}