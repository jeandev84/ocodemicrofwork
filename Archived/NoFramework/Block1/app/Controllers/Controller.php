<?php
namespace App\Controllers;


use App\Exceptions\ValidationException;
use Valitron\Validator;


/**
 * Class Controller
 * @package App\Controllers
 */
abstract class Controller
{

    /**
     * @param $request
     * @param array $rules
  request->getParsedBody()  */
    public function validate($request, array $rules)
    {
         $validator = new Validator($request->getParsedBody());

         $validator->mapFieldsRules($rules);

         if(! $validator->validate())
         {
            throw new ValidationException($request, $validator->errors());
         }

         return $request->getParsedBody();
    }


    /**
     * @param $view
     * @param array $data
     * @param null $response
    */
    /*
    protected function render($view, $data = [], $response = null)
    {
        return $this->view->render($response, $view, $data);
    }
    */
}