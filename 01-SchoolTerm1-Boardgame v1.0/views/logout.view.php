<?php
$userObj = new Users();

if (!$userObj->isLoggedIn()) {
  $userObj->redirect('login');
} else {
  $userObj->logout();
}


?>