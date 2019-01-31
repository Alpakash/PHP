<?php

// Load the dependencies
require(__DIR__ . '/../vendor/autoload.php');

// Instantiate the application
$app = new App\Application;

// Set the basePath of the application
$app->setBasePath(__DIR__. '/../');

// start the user session
session_start();

// Start the application
$app->start();