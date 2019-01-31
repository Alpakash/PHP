<?php
/**
 * User: DesleyRoelofsen
 * Date: 25-09-18
 * Time: 15:14
 */

namespace App\Controllers;

use App\Application;
use App\Models\City;
use App\Models\Club;
use App\Models\MemberPlayer;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;

class ParentController extends AbstractController
{
    public function editAction()
    {
        $userObj = new User($this->app);

        if (!$userObj->isLoggedIn()) {
            $userObj->redirect('/home');
        }

        $user_id = $_SESSION['user_id'];

        $user = $userObj->getUser();

        $users = $userObj->getAllUsers($user_id);

        // Render the view, and give it the values
        $this->render('edit.twig', [
            'page_name' => 'Edit Page',
            'users' => $users,
            'user' => $user
        ]);
    }

    public function carpoolPlanningAction()
    {
        $userObj = new User($this->app);

        if (!$userObj->isLoggedIn()) {
            $userObj->redirect('/home');
        }

        $user_id = $_SESSION['user_id'];

        $user = $userObj->getUser();

        $users = $userObj->getAllUsers($user_id);

        // Render the view, and give it the values
        $this->render('planning.twig', [
            'page_name' => 'Carpool Planning',
            'users' => $users,
            'user' => $user
        ]);
    }
}