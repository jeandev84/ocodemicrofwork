<?php
namespace DP;


/**
 * Class Config
 * @package DP
 */
class Config
{

    /**
     * @var array[]
    */
    protected $data = [
        'upload' => [
            'default' => 's3',
            'services' => [
                's3' => [
                    'key' => '123',
                    'secret' => '456',
                ],
                'ftp' => [
                    'host' => 'abc',
                ],
            ],
        ],
    ];

    /**
     * @param $keys
     * @return array|array[]
    */
    public function get($keys)
    {
        $data = $this->data;
        $keys = explode('.', $keys);

        foreach ($keys as $key) {
            if (array_key_exists($key, $data)) {
                $data = $data[$key];
                continue;
            }
        }

        return $data;
    }
}

/*
$config = new \DP\Config();
echo $config->get('upload.services.s3.secret');
*/