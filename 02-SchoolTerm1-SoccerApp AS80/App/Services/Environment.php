<?php

namespace App\Services;

use Dotenv\Dotenv;

class Environment extends Service{

    public function boot()
    {
    	// get the basePath from the app instance, so we can give it to Dotenv
	    $envPath = $this->app->getBasePath();

	    // Instantiate the Dotenv manager, and give it the basePath
	    $env = new Dotenv($envPath);

        // Load all the environments from the .env file
        $env->load();

        // Make the DB_DRIVER value required, and give it the allowed values
        $env->required('DB_DRIVER')->allowedValues(['pdo_mysql']);

        // Make all the below environment keys required
        $env->required(['APP_NAME', 'DB_HOST', 'DB_NAME', 'DB_USERNAME', 'DB_PASS']);

        // Bind the environment manager to the container
        $this->app->instance('Env', $env, "App\\Services\\Environment");
    }
}