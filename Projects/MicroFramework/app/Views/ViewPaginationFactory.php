<?php
namespace App\Views;


/**
 * Class ViewPaginationFactory
 * @package App\Views
*/
class ViewPaginationFactory
{

    /** @var View  */
    protected $view;


    /** @var  */
    protected $rendered;


    /**
     * ViewPaginationFactory constructor.
     * @param View $view
    */
    public function __construct(View $view)
    {
        $this->view = $view;

        /* dump($view); */
    }


    /**
     * @param $view
     * @param array $data
     * @return $this
    */
    public function make($view, $data = [])
    {
         $this->rendered = $this->view->make($view, $data);

         /* dump($view, $data); */

         return $this;
    }


    public function render()
    {
        /*
        return 'pagination links';
        return '<strong>pagination links</strong>';
        */

        return $this->rendered;
    }
}