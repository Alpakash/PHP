<?php
/**
 * User: DesleyRoelofsen
 * Date: 26-09-18
 * Time: 21:13
 */

namespace App\Support;


use App\Router;

class RouteCollection
{
	protected $routes;

	protected $allRoutes;

	protected $routeNameList;

	protected $actionList;

	protected function add(Router $router)
	{
		$this->addLookups($router);
	}

	protected function addLookups($router)
	{

	}
}