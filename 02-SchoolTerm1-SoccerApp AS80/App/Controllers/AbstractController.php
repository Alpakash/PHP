<?php
/**
 * User: DesleyRoelofsen
 * Date: 20-09-18
 * Time: 21:50
 */

namespace App\Controllers;

use App\Application;

/**
 * Abstract controller.
 */
abstract class AbstractController extends Controller
{

	/**
	 * A Application instance.
	 *
	 * @var Application
	 */
	protected $app;

	/**
	 * AbstractController constructor.
	 *
	 * @param \App\Application $app A Application instance
	 *
	 * @return void
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
	}

}
