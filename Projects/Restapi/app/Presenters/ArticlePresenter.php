<?php
namespace App\Presenters;


/**
 * Class ArticlePresenter
 * @package App\Presenters
*/
class ArticlePresenter extends BasePresenter
{
     public function format()
     {
         return [
           'id' => $this->data->id,
           'title' => $this->data->title,
           'body' => $this->data->title
         ];
     }
}