<?php
namespace App\Pagination;


use App\Pagination\Renderers\PlainRenderer;

/**
 * Class Results
 * @package App\Pagination
*/
class Results
{

     /** @var  array */
     protected $results;


     /** @var  Meta */
     protected $meta;


     /**
      * Results constructor.
      * @param array $results
      * @param Meta $meta
     */
     public function __construct(array $results, Meta $meta)
     {
         $this->results = $results;
         $this->meta = $meta;
     }


     /**
      * Get all results
      * @return array
     */
     public function get()
     {
         return $this->results;
     }


     /**
      * Render Html for pagination
     */
     public function render()
     {
         // building up links
         // building html

         return (new PlainRenderer($this->meta))
                ->render();
     }
}