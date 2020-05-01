<?php
namespace App\Config;


use App\Config\Contracts\ParserInterface;

/**
 * Class Config
 * @package App\Config
*/
class Config
{

    /** @var ParserInterface */
    private $parser;

    /** @var  */
    protected $config;

    /**
     * Config constructor.
     * @param ParserInterface $parser
    */
    public function __construct(ParserInterface $parser)
    {
        $this->setParser($parser);
    }


    /**
     * @param ParserInterface $parser
    */
    public function setParser(ParserInterface $parser)
    {
        $this->parser = $parser;
    }


    /**
     * @param $file
    */
    public function load($file)
    {
        $this->config = $this->parser->parse($file);
    }


    /**
     * @param $key
     * @param null $default
    */
    public function get($key, $default = null)
    {
        $keys = explode('.', $key);

        $config = $this->config;

        foreach ($keys as $key)
        {
            if(isset($config[$key]))
            {
                $config = $config[$key];
                continue;
            }else{
                $config = $default;
                break;
            }
        }

        return $config;
    }
}