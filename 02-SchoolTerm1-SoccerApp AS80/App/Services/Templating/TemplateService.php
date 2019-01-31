<?php
/**
 * User: DesleyRoelofsen
 * Date: 23-09-18
 * Time: 01:01
 */

namespace App\Services\Templating;

use App\Models\User;
use App\Services\Service;


class TemplateService extends Service
{

	/**
	 * This is the method that will be called by the Router, to load the Service
	 *
	 * @return void
	 */
	public function boot()
	{
		$templatesPath = $this->app->getTemplatesPath();

		$loader = new \Twig_Loader_Filesystem($templatesPath);

		$twig = new \Twig_Environment($loader, [
			'cache' => false
		]);

		// This is the syntax for the cache
		// 'cache' => $this->app->getBasePath(). 'Bootstrap/Cache'

		// Setup the appName, than will it be always accessible in the templates
		$this->setUpAppName($twig);

		// Setup all the functions
		$this->setUpFunctions($twig);

		// Bind the view instance to the container
		$this->app->instance('view', $twig, "App\\Services\\Templating\\TemplateService");
	}

	/**
	 * Setup all the functions
	 *
	 * @param \Twig_Environment $twig
	 * @return void
	 */
	public function setUpFunctions(\Twig_Environment $twig) : void
	{
		// Call userRole method to setup functions
		$this->userRole($twig);
        $this->isLoggedIn($twig);

    }

	/**
	 * Setup the userRole function to check if the loggedin user is a role that we want.
	 *
	 * @param \Twig_Environment $twig
	 * @return void
	 */
	public function userRole(\Twig_Environment $twig) : void
	{
		$function = new \Twig_Function('user_role', function(string $user_role){
			$user = new User($this->app);

			$user_role = ucfirst($user_role);

			if($user->getRoleName() == $user_role){
				return true;
			}

			return false;

		});

		$twig->addFunction($function);
	}

    public function isLoggedIn(\Twig_Environment $twig)
    {
        $function = new \Twig_Function('is_logged_in', function(){
            $user = new User($this->app);

            if($user->isLoggedIn()){
                return true;
            }

            return false;

        });

        $twig->addFunction($function);
    }

	/**
	 * @param \Twig_Environment $twig
	 * @return void
	 */
	public function setUpAppName(\Twig_Environment $twig) : void
	{
		$twig->addGlobal('app_name', getenv('APP_NAME'));
	}
}