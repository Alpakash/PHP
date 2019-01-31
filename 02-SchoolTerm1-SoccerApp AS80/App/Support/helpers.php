<?php

use \App\Support\TapProxy;

if(!function_exists('app')){
	/**
	 * Get a instance of the application, and if there is given a service name, try to resolve it with the container.
	 *
	 * @param string $serviceName
	 * @return mixed
	 */
    function app($serviceName = null)
    {
        // Create a instance of the application with the singleton pattern design
        $app = App\Application::create();

        // If the variable $serviceName is empty, then return the app instance
        if(!$serviceName){
            return $app;
        }

        // Try to resolve the service with the container
        return $app->resolve($serviceName);
    }
}

if(!function_exists('session')){
	/**
	 * Get the session instance or if there is a key available then get a specific session value back
	 *
	 * @param mixed $key
	 * @return mixed
	 */
    function session(string $key = null)
    {

        $session = app()->session;

        if(!$key){
            return $session;
        }

        if(isset($key)){
            return $session->get($key);
        }
    }
}

if(!function_exists('dd')){
	/**
	 * Dump the given arguments, and stop the running the app.
	 *
	 * @param mixed $arguments
	 * @return mixed
	 */
    function dd(...$arguments)
    {
        print_r(...$arguments);
        die();
    }
}

if(!function_exists('redirect')){

}

if(!function_exists('tap')){
	/**
	 * @param $value
	 * @param $callback
	 *
	 * @return \App\Support\TapProxy
	 */
	function tap($value, $callback = null)
    {
        // Check if the callback is not callable, because than we will inject the instance in the TapProxy.
        if(! is_callable($callback)){
            return new TapProxy($value);
        }

        // Inject the instance in the callback
        $callback($value);

        // Return the instance.
        return $value;

    }
}
