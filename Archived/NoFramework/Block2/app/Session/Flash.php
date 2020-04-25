<?php
namespace App\Session;


use App\Session\Contracts\SessionStore;


/**
 * Class Flash
 * @package App\Session
*/
class Flash
{
    /**
     * @var SessionStore
    */
    protected $session;


    /** @var array  */
    protected $messages;


    /**
     * Flash constructor.
     * @param SessionStore $session
    */
    public function __construct(SessionStore $session)
    {
        $this->session = $session;

        // load flashes
        $this->loadFlashMessagesIntoCache();

        // clear flashes
        $this->clear();
    }


    /**
     * Get message from the cache messages
     * @param $key
     * @return mixed
    */
    public function has($key)
    {
        return isset($this->messages[$key]);
    }


    /**
     * Get message from the cache messages
     * @param $key
     * @return mixed
    */
    public function get($key)
    {
         if($this->has($key))
         {
             return $this->messages[$key];
         }
    }

    /**
     * Add message flash anywhere type
     * @param $key
     * @param $value
    */
    public function now($key, $value)
    {
        $this->session->set('flash', array_merge(
            $this->session->get('flash') ?? [], [$key => $value]
        ));
    }

    /**
     * Clear all flash message
    */
    protected function clear()
    {
         $this->session->clear('flash');
    }

    /**
     * Load flash messages into cache
    */
    protected function loadFlashMessagesIntoCache()
    {
        $this->messages = $this->getAll();
    }


    /**
     * Get all session messages
     * @return mixed
    */
    protected function getAll()
    {
        return $this->session->get('flash');
    }
}