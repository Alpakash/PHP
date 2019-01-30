 <?php require 'views/partials/head.php'; ?>

<?php
if ($userObj->isLoggedIn()) {
  $userObj->redirect('players');
}

if(isset($_POST['register'])) {
  $required = array('name', 'username', 'email', 'password', 'passwordAgain');
  foreach ($_POST as $key => $value) {
    if (empty($value) && in_array($key, $required) === true) {
      $errors['allFields'] = 'All fields are required.';
      break;
    }
  }
  
  if (empty($errors['allFields'])) {
    // validate form
    $fname = Validate::escape(ucfirst($_POST['fname']));
    $username = Validate::escape(ucfirst($_POST['username']));
    $email = Validate::escape(ucfirst($_POST['email']));
    $password = $_POST['password'];
    $rePassword = $_POST['passwordAgain'];


    if (Validate::length($fname, 2, 20)) {
      $errors['fname'] = "first name can only be between 2 and 20 characters";
    } else if (Validate::length($username, 4, 20)) {
      $errors['username'] = "username can only be between 4 and 20 characters";
    } else if ($userObj->usernameExist($username)) {
      $errors['username'] = "Username is already taken!";
    } else if (!Validate::filterEmail($email)) {
      $errors['email'] = "The email that is entered is not valid";
    } else if ($userObj->emailExist($email)) {
      $errors['email'] = 'The email already exists.';
    } else if ($password != $rePassword) {
      $errors['password'] = "Passwords does not match.";
    } else {
            $hash = $userObj->hash($password);
				// method to insert a user (create)
            $user_id = $userObj->insert("users", array("name" => $fname, "username" => $username, "email" => $email, "password" => $hash));

            // $_SESSION['user_id'] = $user_id;
            $userObj->redirect('login');

    }
  }
}


?>


<!DOCTYPE html>

<div class="container form-group mt-4">
    <h1 class="mb-4">Register</h1> 
    <p>Already have an account? <a href="login">Click here to login</a></p>
       <?php if (isset($errors['allFields'])) : ?>
  		  		 <div class="red-error-message-allFields"><?= $errors['allFields'] ?></div>
            <?php endif; ?>
        <form action="" method="post">
            <label for="username">Name</label>  <?php if (isset($errors['fname'])) : ?>
            <div class="red-error-message"><?= $errors['fname'] ?></div>
            <?php endif; ?>
            <input class="form-control" type="text" id="username" name="fname" value="<?php echo ((isset($fname)) ? Validate::escape($fname) : ''); ?>"><br>
         
            <label for="username">Email</label>  <?php if (isset($errors['email'])) : ?>
            <div class="red-error-message"><?= $errors['email'] ?></div>
            <?php endif; ?>
            <input class="form-control" type="email" id="username" name="email" value="<?php echo ((isset($email)) ? Validate::escape($email) : ''); ?>"><br>
              
            <label for="username">Username</label>   <?php if (isset($errors['username'])) : ?>
            <div class="red-error-message"><?= $errors['username'] ?></div>
            <?php endif; ?>
            <input class="form-control" type="text" id="username" name="username" value="<?php echo ((isset($username)) ? Validate::escape($username) : ''); ?>"><br>
          
            <label for="username">Password</label> <?php if (isset($errors['password'])) : ?>
            <div class="red-error-message"><?= $errors['password'] ?></div>
            <?php endif; ?>
            <input class="form-control" type="password" id="username" name="password"><br>
               
            <label for="username">Re-enter Password</label>
            <input class="form-control" type="password" id="username" name="passwordAgain" ><br>
            <input class="btn btn-warning" type="submit" name="register" value="Register"></button>
            
           
        </form>
       
        </div>
    </body>
</html>