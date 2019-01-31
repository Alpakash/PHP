<?php
/**
 * User: DesleyRoelofsen
 * Date: 20-09-18
 * Time: 21:10
 */

namespace App\Controllers;

use App\Models\User;
use App\Services\Mail\Mail;

class LoginController extends AbstractController
{
    /**
     * Use the queryBuilder to build the sql, and then use the PDO instance to get the results.
     * Than return the result to te view with the render method.
     */
    public function registerAction()
    {
        $user = new User($this->app);

        $result = $user->userRegister();

        // if the userRegister parameter is filled in execute errors if (!empty($errors)
        $errors = $user->userRegister('notEmptyArray');

        // Render the view, and give it the values
        $this->render('register.twig', [
            'page_name' => 'Register Page',
            'registerLogic' => $result,
            'error' => $errors
        ]);
    }

    public function loginAction()
    {
        $user = new User($this->app);

        $result = $user->userLogin();

        // if the userLogin parameter is filled in execute errors if (!empty($errors)
        $errors = $user->userLogin('notEmptyArray');

        // Render the view, and give it the values
        $this->render('login.twig', [
            'page_name' => 'Login Page',
            'loginLogic' => $result,
            'error' => $errors
        ]);
    }

    public function logoutAction()
    {
        $userObj = new User($this->app);

        if (!$userObj->isLoggedIn()) {
            $userObj->redirect('login');
        } else {
            $userObj->logout();
            $this->render('index.twig');
        }

    }

    public function verifyUser(string $hash)
    {
	    $user_obj = new User($this->app);

	    $user = $user_obj->getVerifyUser($hash);

	    if(!empty($user)){
	    	$user_obj->verifyUser($user->id);
	    }

    }

}