<?php

namespace App\Routing;

use App\Application;
use Exception;

class Route {

	public $routePath;
	private $name;
	private $callback;
	private $parameters = [];
	private $middleware;
	public $app;

	/**
	 * @param string $path
	 * @return $this
	 */
	public function setPath(string $path) {
		$this->routePath = ltrim($path, '/');
		return $this;
	}

	/**
	 * @param $callback
	 * @return $this
	 */
	public function setCallback($callback) {
		$this->callback = $callback;
		return $this;
	}

	/**
	 * @param $middleware
	 * @return $this
	 */
	public function setMiddleware($middleware) {
		$this->middleware = $middleware;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getRoutePath() {
		return $this->routePath;
	}

	public function setApp(Application $app) : self
	{
		$this->app = $app;
		return $this;
	}

	/**
	 * @param $url
	 * @return bool
	 * @throws Exception
	 */
	public function matchRoute(string $url) {
		$routePath = explode('/', $this->routePath);
		$requestUrl = explode('/', $url);
		if (count($routePath) != count($requestUrl)) {
			return false;
		}
		foreach ($routePath as $key => $route) {
			if (strpos($route, ':') !== false) {
				$value = $this->checkValue($route, $requestUrl[$key]);
				if (!$value) {
					return false;
				}
				$this->parameters[$value] = $requestUrl[$key];
			} else {
				if ($requestUrl[$key] != $route) {
					return false;
				}
			}
		}
		return true;
	}

	/**
	 * @param string $route
	 * @param $id
	 * @return bool
	 * @throws Exception
	 */
	public function checkValue(string $route, $id) {
		if (strpos($route, '[i]') !== false) {
			if (filter_var($id, FILTER_VALIDATE_INT)) {
				return $this->formatRoute($route, '[i]');
			}
			throw new Exception("Route parameter does not contain integers only");
		}
		if (strpos($route, '[s]') !== false) {
			if (preg_match('/[^A-Za-z0-9]/', $id) === 0) {
				return $this->formatRoute($route, '[s]');
			}
			throw new Exception("Route parameter does not contain a string");
		}
		return $this->formatRoute($route);
	}

	public function formatRoute($route, $input = false) {
		if ($input) {
			$formattedRoute = trim($route, $input);
			return trim($formattedRoute, ':');
		}
		return trim($route, ':');
	}

	/**
	 * @return bool|mixed
	 */
	public function call() {
		if (is_string($this->callback)) {
			list($methodName, $controllerName) = explode(':', $this->callback);

			$controller = "App\\Controllers\\$controllerName";

			if (is_object($this->middleware)) {
				$this->middleware->run();
			}

			$controller = new $controller($this->app);
			$request = $this->app->get('request');

			if ($this->parameters) {
				$request->setQueryParameters($this->parameters);
			}

			return call_user_func_array([$controller, $methodName], $this->parameters);
//			return $controller->$methodName();
		}

		if (is_callable($this->callback)) {
			if (is_object($this->middleware)) {
				$this->middleware->run();
			}
			return call_user_func_array($this->callback, $this->parameters);
		}

		return false;
	}
}