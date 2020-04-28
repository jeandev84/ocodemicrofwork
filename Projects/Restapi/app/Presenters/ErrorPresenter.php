<?php
namespace App\Presenters;


/**
 * Class ErrorPresenter
 * @package App\Presenters
*/
class ArticlePresenter extends BasePresenter
{
     public function format()
     {
         return [
             'success' => false,
             'error' => [
                 'message' => $this->data->message,
                 'code' => $this->data->code
             ]
         ];
     }

     /*
      public function format()
     {
         return [
             'success' => false,
             'error' => [
                 'message' => $this->data->message,
                 'code' => ''// 400 $this->data->code
             ]
         ];
     }
     */
}