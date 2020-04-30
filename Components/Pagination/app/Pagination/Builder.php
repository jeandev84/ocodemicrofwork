<?php
namespace App\Pagination;


/**
 * Class Builder
 * @package App\Pagination
*/
class Builder
{

     /** @var  */
     protected $builder;


     /**
      * Builder constructor.
      * @param $builder
     */
     public function __construct($builder)
     {
         $this->builder = $builder;
     }


    /**
     * Paginate items
     *
     * @param int $page (current page)
     * @param int $perPage (how many items display per page)
     * @return Results
     */
     public function paginate($page = 1, $perPage = 10)
     {
         // get current page
         $page = max(1, $page);


         // get row count (determine how many pages we have)
         $total = $this->builder->execute()->rowCount();


         // get max results
         $result = $this->builder
                        ->setFirstResult($this->getFirstResultIndex($page, $perPage))
                        ->setMaxResults($perPage) // le total d'elements (limit)
                        ->execute()
                        ->fetchAll();

         /* dump($result); */

         return new Results(
             $result,
             new Meta($page, $perPage, $total)
         );

     }


     /**
      * @param $page
      * @param $perPage
      * @return float|int
     */
     public function getFirstResultIndex($page, $perPage)
     {
         return ($page - 1) * $perPage;
     }


     /*
     public function paginate($page = 1, $perPage = 10)
     {
         // resolve page = -1 in query
         // return always 1 or +
         $page = max(1, $page);

         // LIMIT 20 OFFSET perpage=10
         $result = $this->builder
                         // LIMIT 20 OFFSET perpage=10
         $result = $this->builder
                        ->setFirstResult(0 ...n
                            ($page - 1) * $perPage // (0, 1, 2) * 10 = (0, 10, 20..)
                        ) // la ou on commence a compter les elements
                        ->setMaxResults($perPage) // le total d'elements (limit)
                        ->execute()
                        ->fetchAll();
                        ->setMaxResults($perPage) // le total d'elements (limit)
                        ->execute()
                        ->fetchAll();

         dump($result);
     }
     */
}