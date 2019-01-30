<?php

class App {
  protected static $registry = [];

  // the key and value in the routes gets connected, so the key can call the controller
  public static function bind($key, $value)
  {
    static::$registry[$key] = $value;

  }

  // if the key(url) does not exist in the routes.php a Exception will be given
  public static function get($key)
  {
    if(! array_key_exists($key, static::$registry)) {
        throw new Exception("No {key} is bound in the container.");
    }
    
    return static::$registry[$key];
  }
}