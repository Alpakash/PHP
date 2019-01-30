<?php

// bind the config file to a key
App::bind('config', require 'config.php');

// connect to the with the information from the config.php
App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

// Method: views pages are called in the PagesController.php
function view($name, $data = []) {
    // the $data argument is not required and can be empty
    extract($data);
    return require "views/{$name}.view.php";
}




  // session
session_start();

