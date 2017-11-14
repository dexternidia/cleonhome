<?php
namespace System\tools\session;


class Session
{
    /**
     * Constructor.
     */
    public function __construct()
    {
      
    }
    /**
     * Destructor.
     */
    public function __destruct()
    {
        unset($this);
    }

    /**
     * Register the session.
     *
     * @param integer $time.
     */
    public function register($time)
    {
        $_SESSION['session_id'] = session_id();
        $_SESSION['session_start'] = $this->newTime();
        $_SESSION['session_time'] = $time;
    }

    /**
     * Checks to see if the session is registered.
     *
     * @return  True if it is, False if not.
     */
    public function isRegistered()
    {
        if (! empty($_SESSION['session_id'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set key/value in session.
     *
     * @param mixed $key
     * @param mixed $value
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Retrieve value stored in session by key.
     *
     * @var mixed
     */
    public function get($key)
    {
        if (array_key_exists(sessionNameDefault, $_SESSION)) 
        {
            return $_SESSION[$key];
        }
        else
        {
            return false;
        }
        //return $_SESSION[$key];
    }

    /**
     * Retrieve the global session variable.
     *
     * @return array
     */
    public function getSession()
    {
        return $_SESSION;
    }

    /**
     * Gets the id for the current session.
     *
     * @return integer - session id
     */
    public function getSessionId()
    {
        return $_SESSION[sessionNameDefault];
    }

    /**
     * Checks to see if the session is over based on the amount of time given.
     *
     * @return boolean
    */
    public function isExpired()
    {
        if ($_SESSION['session_start'] < $this->timeNow()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Renews the session when the given time is not up and there is activity on the site.
     */
    public function renew()
    {
        $_SESSION['session_start'] = $this->newTime();
    }

    /**
     * Returns the current time.
     *
     * @return unix timestamp
     */
    private function timeNow()
    {
        $currentHour = date('H');
        $currentMin = date('i');
        $currentSec = date('s');
        $currentMon = date('m');
        $currentDay = date('d');
        $currentYear = date('y');
        return mktime($currentHour, $currentMin, $currentSec, $currentMon, $currentDay, $currentYear);
    }

    /**
     * Generates new time.
     *
     * @return unix timestamp
     */
    private function newTime()
    {
        $currentHour = date('H');
        $currentMin = date('i');
        $currentSec = date('s');
        $currentMon = date('m');
        $currentDay = date('d');
        $currentYear = date('y');
        return mktime($currentHour, ($currentMin + 60), $currentSec, $currentMon, $currentDay, $currentYear);
    }

    /**
     * Destroys the session.
     */
    public function end()
    {
        session_destroy();
        $_SESSION = array();
    }
}
