<?php


require_once __DIR__ . '/../vendor/autoload.php';


/**
 * Class Youtube
*/
class Youtube
{
    /**
     * @param $id
     * @return int
    */
    public function getVideoViewCount($id)
    {
        return 5000;
    }
}

/*
$youtube = new Youtube();
echo $youtube->getVideoViewCount('abc');
*/



/**
 * Interface YoutubeAdapterInterface
*/
interface YoutubeAdapterInterface
{
    /**
     * @param $id
     * @return mixed
    */
    public function getViews($id);
}


/**
 * Class YoutubeAdapter
 *
 * Adapte my client Youtube to Youtube interface
*/
class YoutubeAdapter implements YoutubeAdapterInterface
{

    /** @var  */
    protected $client;


    /**
     * YoutubeAdapter constructor.
     * @param Youtube $client
    */
    public function __construct(Youtube $client)
    {
        $this->client = $client;
    }


    /**
     * @param $id
     * @return mixed|void
    */
    public function getViews($id)
    {
        return $this->client->getVideoViewCount($id);
    }
}


$youtube = new YoutubeAdapter(new Youtube());
echo $youtube->getViews('abc');