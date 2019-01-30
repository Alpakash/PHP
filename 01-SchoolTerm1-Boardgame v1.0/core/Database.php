<?php


class Database
{
  protected $pdo;
  protected static $instance;

 
  protected function __construct()
  {
    
    try {
      // connecting the db an alternative way (get defined info from config.php)
      $this->pdo = new PDO('mysql:host='. DB_HOST . ':' . DB_PORT . ';' . 'dbname=' . DB_NAME, DB_USER , DB_PASS);
    } catch (PDOEXception $e) {
      echo $e->getMessage();
    }
  }

 // when Database::instance() is called a object will be created with the pdo connection automatically in it
  public static function instance()
  {
    if (self::$instance === null) {
      self::$instance = new self;
    }
    return self::$instance;
  }

  // if a method does not exist give a warning which method can't be called
  public function __call($method, $args)
  {
    return call_user_func_array(array($this->pdo, $method), $args);
    echo "You're trying to call a method named: {$method}";
  }

}

?>