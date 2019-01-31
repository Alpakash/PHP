<?php

namespace App\Routing;

use App\Application;
use Exception;
use App\Contracts\MiddlewareInterface;

class Router {

	public $app;
	private $url;
	private $routes = [];
	private $middleware = [];
	private $currentRoute;


	/**
	 * Set the Application instance, and the web_file_path.
	 *
	 * @param \App\Application $app
	 * @param string $web_file_path
	 */
	public function __construct(Application $app, $web_file_path)
	{
		$this->app = $app;

		require_once "$web_file_path";

		if (isset($_GET['url'])) {
			$this->url = $_GET['url'];
		}
	}

	/**
	 * Set the path and the callback.
	 *
	 * @param string $path
	 * @param $callback
	 * @return self
	 */
	public function get(string $path, $callback) : self
	{
		$this->currentRoute = $this->add($path, $callback, 'GET');
		return $this;
	}

	/**
	 * Set the path and the callback.
	 *
	 * @param string $path
	 * @param $callback
	 * @return self
	 */
	public function post(string $path, $callback) : self
	{
		$this->currentRoute = $this->add($path, $callback, 'POST');
		return $this;
	}

	/**
	 * @param $middlewareName
	 * @throws Exception
	 *
	 * @return void
	 */
	public function middleware($middlewareName) : void
	{
		$middleware = $this->registerMiddleware($middlewareName);
		$this->currentRoute->setMiddleware($middleware);
	}

	/**
	 * Create the middleware that belongs to the route.
	 * And give the middleware constructor the application instance.
	 * And return the middleware instance.
	 *
	 * @param $name
	 * @return mixed
	 * @throws Exception
	 *
	 * @return MiddlewareInterface
	 */
	public function registerMiddleware($name) : MiddlewareInterface
	{
		if (array_key_exists($name, $this->middleware)) {
			return $this->middleware[$name];
		}

		$middleware = $this->app->getMiddlewareNamespace($name);

		$middlewareObj = new $middleware($this->app);

		if (!$middlewareObj instanceof MiddlewareInterface) {
			throw new Exception('Middleware class does not implement MiddlewareInterface');
		}

		$this->middleware[$name] = $middlewareObj;

		return $this->middleware[$name];
	}

	/**
	 * Add the arguments to the Route, and return the Route.
	 *
	 * @param string $path
	 * @param $callback
	 * @param string $method
	 * @return Route
	 */
	private function add(string $path, $callback, string $method) : Route
	{
		$route = (new Route())
			->setPath($path)
			->setApp($this->app)
			->setCallback($callback);

		$this->routes[$method][] = $route;

		return $route;
	}

	/**
	 * Run the call method on the route that match with the request.
	 *
	 * @return mixed
	 * @throws Exception
	 */
	public function run()
	{

//		if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
//			throw new Exception("Method does not exist");
//		}

		foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if ($route->matchRoute($this->url)) {
					return $route->call();
				}
			}
			if ($_SERVER['REQUEST_METHOD'] === 'GET') {
				if ($route->matchRoute($this->url)) {
					return $route->call();
				}
			}
		}

		throw new Exception("No route found for the request");
	}

}