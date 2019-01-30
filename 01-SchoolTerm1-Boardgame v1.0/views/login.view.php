 <?php require 'views/partials/head.php'; ?>

<?php

// if the user is already logged in return back to players page
if ($userObj->isLoggedIn()) {
        $userObj->redirect('players');
}

// show error if the user gets redirected from a restricted page
// restricted pages are: players, games & battles
if (isset($_GET['loginerror']) && $_GET['loginerror'] == 1) {
    $error = "You must login to visit that page.";
}

if (isset($_POST['login'])) {
    $email = Validate::escape(ucfirst($_POST['email']));
    $password = Validate::escape($_POST['password']);

    if (empty($email) or empty($password)) {
        $error = "Enter an email and password to login.";
    } else {
        // check in the database with the Users->method if the email or username that the user did input in the $_POST['email'] exists in the database
            if ($user = $userObj->emailExist($email) or $user = $userObj->usernameExist($email)) {

                // store the hashed password in db in $hash
                $hash = $user->password;
                // if the given password matches with the hashed password in DB then redirect to players (logged in) page
                if (password_verify($password, $hash)) {
                    $_SESSION['user_id'] = $user->user_id;
                    $userObj->redirect('players');
                } else {
                    $error = "Email/Username or Password is incorrect!";
                }

            } else {
                $error = "There is no account with that email.";
            } 
        }
          
}

?>

    <div class="container form-group mt-4">
    <h1 class="mb-4">Login</h1>
        <form action="" method="post">
            <label for="username">Email or Username</label>
            <input class="form-control" type="text" id="username" name="email" placeholder="Type in your beautiful username.." value="<?php echo ((isset($email)) ? Validate::escape($email) : ''); ?>"><br>
            <label for="username">Password</label>
            <input type="password" id="password" name="password"
                required class="form-control" placeholder="Don't tell anybody.."><br>
          <input class="btn btn-primary" type="submit" name="login" value="Login"></button>

            <!-- display validation error messages on the register page -->
            <?php if (isset($error)) : ?>
				<div class="red-error-message ml-2"><?php echo $error; ?></div>
<?php endif; ?>
        </form>
        <br>

        <!-- Link to register page -->
        <p>Do you not have an account yet? <a href="register">Click here to register</a></p>
        </div>
