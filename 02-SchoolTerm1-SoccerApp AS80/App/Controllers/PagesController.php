<?php
/**
 * User: DesleyRoelofsen
 * Date: 25-09-18
 * Time: 15:14
 */

namespace App\Controllers;

use App\Models\User;
use App\Models\Image;

class PagesController extends AbstractController
{

	/**
	 * It will render the index view
	 */
	public function index()
	{
        $userObj = new User($this->app);

        if ($userObj->isLoggedIn()) {
            $userObj->redirect('home');
        }

		// Render the view.
		$this->render('index.twig');
	}

    public function contactAction()
    {
        // Render the view, and give it the values
        $this->render('contact.twig');
    }

    public function aboutAction()
    {
        // Render the view, and give it the values
        $this->render('about.twig');
    }

    public function photosAction()
    {
        $userObj = new User($this->app);

        if (!$userObj->isLoggedIn()) {
            $userObj->redirect('home');
        }

        $user_id = $_SESSION['user_id'];
        $user = $userObj->getUser($user_id);
        $users = $userObj->getAllUsers($user_id);

        $image = new Image($this->app);
        $images = $image->getImages();

        // Render the view, and give it the values
        $this->render('fotos.twig', [
            'users' => $users,
            'user' => $user,
                'images' => $images]
        );
    }

}