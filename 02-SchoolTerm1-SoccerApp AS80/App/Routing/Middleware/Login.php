<?php
/**
 * User: DesleyRoelofsen
 * Date: 31/10/2018
 * Time: 21:18
 */

namespace App\Routing\Middleware;

use App\Models\User;

class Login extends Middleware
{

	public function run()
	{
		$user = new User($this->app);

		if(!$user->isLoggedIn()){
			return $user->redirect('/');
		}
	}
}