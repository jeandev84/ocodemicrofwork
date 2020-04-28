<?php
namespace App\Presenters;


/**
 * Class BasePresenter
 * @package App\Presenters
*/
abstract class BasePresenter
{
      /** @var array */
      protected $data;


      /**
       * BasePresenter constructor.
       * @param array $data
      */
      public function __construct($data = [])
      {
          $this->data = (object) $data;
      }


      /**
       * @return false|string
      */
      public function present()
      {
          return json_encode($this->format());
      }

      /**
       * @return mixed
      */
      abstract public function format();
}