<?php
/**
 * User: DesleyRoelofsen
 * Date: 20-09-18
 * Time: 22:43
 */

namespace App\Controllers;

/**
 * Class Controller
 * @package App\Controllers
 */
abstract class Controller
{
	/**
	 * Render the view and show the view.
	 *
	 * @param string $templatePath Template name.
	 * @param array $params Array of template parameters.
	 *
	 * @return mixed
	 */
	public function render(string $templatePath, array $params = [])
	{
		// Get through the container the view instance
		$view = $this->app->get('view');

		ob_start();

		/** @var \Twig_Environment $view */
		echo $view->render($templatePath, $params);
	}

	/**
	 * Render the email and return the string.
	 *
	 * @param string $templatePath Template name.
	 * @param array $params Array of template parameters.
	 *
	 * @return mixed
	 */
	public function renderEmail(string $templatePath, array $params = [])
	{
		// Get through the container the view instance
		$view = $this->app->get('view');

		/** @var \Twig_Environment $view */
		return $view->render($templatePath, $params);
	}


}