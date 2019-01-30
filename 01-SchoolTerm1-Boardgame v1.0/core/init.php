<?php

// set timezone to Amsterdam
date_default_timezone_set('Europe/Amsterdam');

  // autoload all classes in the classes folder
spl_autoload_register(function ($class) {
  require_once "classes/{$class}.php";
});


?>