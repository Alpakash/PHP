<?php

namespace App\Services;

class Session{

    public function setUp()
    {
        session_start();
    }
    
    /**
     * Set custom values to the session
     *
     * @param string $key
     * @param mixed $value
     * @param string $prefix
     * @return void
     */
    public function set(string $key, $value, string $prefix = 'custom')
    {
        $_SESSION[$prefix][$key] = $value;
    }

    /**
     * Get the value from the session
     *
     * @param string $key
     * @param string $prefix
     * @return void
     */
    public function get(string $key, string $prefix = 'custom')
    {
        if(!array_key_exists($key, $_SESSION[$prefix])){
            return null;
        }

        return $_SESSION[$prefix][$key];
    }
}