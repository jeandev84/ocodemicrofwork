<?php
namespace App\Pagination;


/**
 * Class Meta
 * @package App\Pagination
*/
class Meta
{

     /** @var int (current page) */
     protected $page;


     /** @var int (How many items to display per page)*/
     protected $perPage;



     /** @var int (Total records) */
     protected $total;



    /**
     * Meta constructor.
     * @param $page
     * @param $perPage
     * @param $total
     */
     public function __construct($page, $perPage, $total)
     {
         $this->page = $page;
         $this->perPage = $perPage;
         $this->total = $total;
     }


     /**
      * @return int
     */
     public function page()
     {
         return (int) $this->page;
     }


    /**
     * @return int
     */
    public function perPage()
    {
        return (int) $this->perPage;
    }


    /**
     * @return int
    */
    public function total()
    {
        return (int) $this->total;
    }


    /**
     * @return int
     * ceil() arround value to integer always
     *
     * because result can return float
     * but ceil arround value
    */
    public function lastPage()
    {
        return (int) ceil($this->total() / $this->perPage());
    }


    /**
     * @param $property
     * @return
   */
    public function __get($property)
    {
         if(method_exists($this, $property))
         {
              return $this->{$property}();
         }
    }
}