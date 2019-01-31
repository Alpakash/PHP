<?php

namespace App;

use App\Services\Service;

abstract class Container{

    protected $instances;

    protected $loadedServices;

	/**
	 * Bind a closure to the container
	 *
	 * @param string $name
	 * @param \Closure $closure
	 *
	 * @throws \Exception
	 */
	public function bind(string $name, $closure)
    {
    	if(is_callable($closure)){
			call_user_func($closure, $this);
			$this->instances[$name] = $closure;
	    }

	    if(!is_callable($closure)){
		    $type = gettype($closure);
    		$message = sprintf("The second argument has to be a closure, a %s given.", $type);
    		throw new \Exception($message);
	    }
    }

	/**
	 * Bind a instance to the container
	 *
	 * @param string $name
	 * @param        $instance
	 * @param string $namespace
	 */
	public function instance(string $name, $instance, string $namespace)
    {
		if($instance instanceof Service){
			$this->loadedServices[$name] = true;
		}
		$this->instances[$name]['instance'] = $instance;
		$this->instances[$name]['namespace'] = $namespace;
    }

	/**
	 * If the serviceName exists the service will be returned, else there will be throw a exception
	 *
	 * @param string $name
	 * @param bool $new_instance
	 *
	 *
	 * @return mixed
	 * @throws \Exception
	 */
	public function resolve(string $name, bool $new_instance)
    {
    	// Make the serviceName lowercase
	    $name = strtolower($name);

	    if($new_instance === true){
		    $this->instances[$name]['instance'] = new $this->instances[$name]['namespace']($this);
	    }

	    if($this->instances[$name]['instance'] instanceof Service){
		    $this->instances[$name]['instance']->boot();
	    }

        if(!$this->instances[$name]){
			throw new \Exception("The {$name} instance is not loaded in the container");
        }

        return $this->instances[$name]['instance'];

    }

	/**
	 * @param string $name
	 * @param bool $new_instance
	 *
	 * @return object
	 */
	public function get(string $name, bool $new_instance = false)
    {
    	// Give the resolve method the instanceName
    	return $this->resolve($name, $new_instance);
    }

    public function getLoadedServices()
    {
    	return $this->loadedServices;
    }

	/**
	 * @throws \Exception
	 */
	public function loadServices()
    {
	    foreach($this->services as $service){
            if(!class_exists($service)){
            	$message = \sprintf(
            		'The given service (`%s`) doesn\'t exists',
		            $service
	            );
                throw new \Exception($message);
            }
            $this->loadService(new $service($this), $service);
        }
    }


	/**
	 * @param Service $service A instance of the given service
	 * @param string $serviceName The name of the given service
	 *
	 * @throws \Exception
	 */
	public function loadService($service, string $serviceName)
    {
        if(!is_object($service)){
            throw new \Exception("The given service is not a object");
        }

        if(method_exists($service, 'register')){
            $service->register();
        }

        if(method_exists($service, 'boot')){
            $service->boot();
	        $this->loadedServices[$serviceName] = true;
        }
	    else{
		    $message_boot = sprintf("The given service: %s has not the method register", $serviceName);
        	throw new \Exception($message_boot);
	    }
    }

    public function getExistingInstance(string $name, $closure)
    {
    	$instance = $this->resolve($name, false);

    	$closure($instance);
    }

	/**
	 * Return the container instance
	 *
	 * @return self
	 */
	public function getContainer()
	{
		return $this;
	}
}