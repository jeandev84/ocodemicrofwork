<?php
namespace Framework\Http;


/**
 * Class Response
 * @package Framework\Http
*/
class Response
{

    /** @var string */
    protected $body;


    /**
     * @param string $body
    */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }


    /**
     * @return string
    */
    public function getBody()
    {
        return $this->body;
    }
}