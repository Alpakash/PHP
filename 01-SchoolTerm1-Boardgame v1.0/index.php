<!-- I hope I will get a good grade. Ask and you shall receive - "Akash" -->

<?php
// display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Setup your app
 * @bootstrap.php file to initialize database
 * @Request::uri get the uri
 * */

//  autoload all classes in the project and load on all pages
require 'vendor/autoload.php';

// Get the database information
$query = require 'core/bootstrap.php';
$current = Request::uri();


/**
 * Where are you in your page and where do you go with the
 * routes and controllers
 *
 * @routes.php routes to different endpoints
 * @Request::uri get the uri
 * @Request::method POST or GET?
 */
Router::load('routes.php') // Method Chain
    ->direct(Request::uri(), Request::method());




