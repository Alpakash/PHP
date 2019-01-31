<?php
/**
 * User: DesleyRoelofsen
 * Date: 31/10/2018
 * Time: 21:30
 */

namespace App\Routing\Middleware;

use App\Application;
use App\Contracts\MiddlewareInterface;

abstract class Middleware implements MiddlewareInterface
{
	/**
	 * @var \App\Application
	 */
	protected $app;

	/**
	 * The abstract class will be used by default by a middleware class.
	 * And the Application will be injected, so the container is available.
	 *
	 * @param \App\Application $app
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
	}
}