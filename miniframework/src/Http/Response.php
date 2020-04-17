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


    /** @var int  */
    protected $statusCode = 200;


    /** @var array  */
    protected $headers = [];


    /**
     * @param string $body
     * @return Response
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


    /**
     * @param int $statusCode
     * @return Response
    */
    public function withStatus($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }


    /**
     * @return int
    */
    public function getStatusCode()
    {
        return $this->statusCode;
    }


    /**
     * @param $body
    */
    public function withJson($body)
    {
        $this->withHeader('Content-Type', 'application/json');
        $this->body = json_encode($body);
        return $this;
    }


    /**
     * @param $name
     * @param $value
     * @return Response
   */
    public function withHeader($name, $value)
    {
        $this->headers[] = [$name, $value];

        return $this;
    }

    /**
     * @return array
    */
    public function getHeaders()
    {
        return $this->headers;
    }

}