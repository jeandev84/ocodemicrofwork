<?php

/**
 * Class Add
*/
class Sum
{
    /** @var  */
    protected $a;


    /** @var  */
    protected $b;


    /**
     * Add constructor.
     * @param $a
     * @param $b
    */
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    /**
     * @return mixed
    */
    public function __invoke()
    {
        return $this->result();
    }

    /**
     * @return mixed
    */
    public function result()
    {
        return $this->a + $this->b;
    }
}

$sum = new Sum(10, 5);
// var_dump($sum->result());

var_dump($sum());