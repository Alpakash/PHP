<?php

namespace App;

use App\Routing\Router;
use App\Services\Environment;
use App\Services\Request\RequestService;
use App\Services\Redirector\RedirectService;
use App\Services\Templating\TemplateService;
use App\Services\DatabaseManager;
use App\Services\Mail\MailService;

class Application extends Container{
    
    /**
     * The basePath of the application
     *
     * @var string
     */
    protected $basePath;

	/**
	 * @var string
	 */
	protected $route_file = "web.php";

    /**
     * All the services that will be used by the application
     *
     * @var array
     */
    protected $services = [
        Environment::class,
	    RequestService::class,
        RedirectService::class,
	    TemplateService::class,
        DatabaseManager::class,
	    MailService::class,
    ];
    
    /**
     * Set the basePath of the application
     *
     * @param string $basePath
     * @return void
     */
    public function setBasePath(string $basePath) : void
    {
        $this->basePath = $basePath;
    }

    /**
     * Return the application basePath
     *
     * @return string
     */
    public function getBasePath() : string
    {
        return $this->basePath;
    }

	/**
	 * Get the templates path
	 *
	 * @return string
	 */
	public function getTemplatesPath() : string
    {
    	return $this->getBasePath().'templates';
    }


	/**
	 * Return the cache path
	 *
	 * @return string
	 */
	public function getCachePath() : string
    {
    	return $this->getBasePath().'App/Cache';
    }


	/**
	 * Return the routes path
	 *
	 * @return string
	 */
	public function getRoutesPath() : string
    {
    	return $this->getBasePath().'Routes/';
    }

    /**
     * Boot the application
     *
     * @return void
     */
    public function boot() : void
    {
        $this->loadServices();
    }

	/**
	 * Setup the router and give it the application instance, and the web path.
	 * And set the router instance in the container.
	 *
	 * @return void
	 */
	public function setUpRouter() : void
    {
		$web_file_path = $this->getRoutesPath(). $this->route_file;

    	$router = new Router($this, $web_file_path);

    	$router->run();

    	$this->instance('router', $router, "App\\Routing\\Router");
    }

	/**
	 * @param string $name
	 *
	 * @throws \Exception
	 * @return string
	 */
	public function getMiddlewareNamespace($name) : string
    {
    	$middleware_name = ucfirst($name);

	    $middleware = "App\\Routing\\Middleware\\". $middleware_name;

	    if (!class_exists($middleware)) {
		    throw new \Exception("Middleware does not exist");
	    }

    	return $middleware;
    }

    /**
     * Call the methods that are needed to run the application
     *
     * @return void
     */
    public function start() : void
    {
    	// Bind the application instance self to the container.
    	$this->instance('app', $this, "App\\Application");

    	// Call the boot method, to call the needed services.
        $this->boot();

        $this->setUpRouter();
    }
}