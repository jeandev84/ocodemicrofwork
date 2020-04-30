<?php
namespace App\Pagination;


/**
 * Class PageIterator
 * @package App\Pagination
*/
class PageIterator implements \Iterator
{

    /** @var array  */
    protected $pages;


    /** @var Meta  */
    protected $meta;


    /** @var int  */
    protected $position = 0;


    /**
     * PageIterator constructor.
     * @param array $pages
     * @param Meta $meta
    */
    public function __construct(array $pages, Meta $meta)
    {
        $this->pages = $pages;
        $this->meta  = $meta;
    }


    /**
     * @return bool
    */
    public function isCurrentPage()
    {
        return $this->current() === $this->meta->page;
    }


    /**
     * If current page greater more 1, that is mean has previous
     * @return bool
     */
    public function hasPrevious()
    {
         if($this->meta->page <= 0)
         {
             return false;
         }

         return  $this->meta->page > 1;
    }



    /**
     * If current page leaster that a last page
     * @return bool
    */
    public function hasNext()
    {
        return  $this->meta->page < $this->meta->lastPage;
    }


    /**
     * Current page
     * @return mixed|void
    */
    public function current()
    {
        return $this->pages[$this->position];
    }


    /**
     * Next position
    */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Current position
     * @return bool|float|int|string|void|null
     */
    public function key()
    {
        return $this->position;
    }


    /**
     * Return to the back position
     */
    public function rewind()
    {
        $this->position = 0;
    }


    /**
     * Determine if the current position exist
     * @return bool|void
    */
    public function valid()
    {
         return isset($this->pages[$this->position]);
    }
}