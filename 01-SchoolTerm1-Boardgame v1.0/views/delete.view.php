<?php
$userObj = new Users;

// create session and find all data connected to user
$user_id = $_SESSION['user_id'];
$user = $userObj->userData($user_id);

// Method: delete all users data out of the database and logout
$userObj->delete($user->username);


?>