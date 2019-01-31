<?php
/**
 * User: DesleyRoelofsen
 * Date: 25-09-18
 * Time: 15:14
 */

namespace App\Controllers;

use App\Models\Image;
use App\Models\User;


class ImageController extends AbstractController
{
    public function imageAction()
    {
        $user = new User($this->app);

        if (!$user->isLoggedIn()) {
            $user->redirect('home');
        }
        $userData = $user->getUser();

        $this->render('image.twig', ['user' => $userData]);
    }

    public function image()
    {
        $image = new Image($this->app);
        $image->insertImage();

    }
}