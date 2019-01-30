<?php require 'views/partials/head.php'; ?>
<?php include "views/partials/nav.php"; ?>

<?php
// if user is logged out he can't visit the 'edit' and gets redirected to 'login' page
if (!$userObj->isLoggedIn()) {
    $userObj->redirect('login');
}

$user_id = $_SESSION['user_id'];
$user = $userObj->userData($user_id);


if (isset($_POST['update'])) {
    $required = array('fname', 'username', 'email', 'password');
    foreach ($_POST as $key => $value) {
        if (empty($value) && in_array($key, $required)) {
            $errors['allFields'] = "All fields are required";
            break;
        }
    }
    if (empty($errors['allFields'])) {
        $firstName = Validate::escape(ucfirst($_POST['fname']));
        $username = Validate::escape(ucfirst($_POST['username']));
        $email = Validate::escape($_POST['email']);
        $password = $_POST['password'];

        if (Validate::length($firstName, 2, 20)) {
            $errors['fnames'] = "first name can only be between 2 and 20 characters";
        } 
        if (Validate::length($username, 2, 20)) {
            $errors['username'] = "username can only be between 2 and 20 characters";
        } else if ($username != $user->username && $userObj->usernameExist($username)) {
            $errors['username'] = "Username is already taken!";
        }
        if (!Validate::filterEmail($email)) {
            $errors['email'] = "The email that is entered is not valid";
        } else if ($email != $user->email && $userObj->emailExist($email)) {
            $error['email'] = 'The email already exists.';
        } else {
            if (password_verify($password, $user->password)) {
				// update the user's columns if the password is verified correctly
                $userObj->update('users', ['name' => $firstName, 'username' => $username, 'email' => $email], ['user_id' => $user_id]);
                $userObj->redirect('edit');
            } else {
                $errors['password'] = "The password you entered is incorrect.";
            }
        }
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="jumbotron jumbotron-fluid players-img">
            <h4 class="page-title">
                <?= ucfirst($user->username)."'s"; ?> Profile</h4>
        </div>
        <hr>
        <hr>
        <div class="col-10 offset-1">
            <form action="" method="post">
                <label for="username">Name</label>
                <?php if (isset($errors['fname'])) : ?>
                <div class="red-error-message">
                    <?= $errors['fname'] ?>
                </div>
                <?php endif; ?>
                <input class="form-control" type="text" id="username" name="fname" value="<?= ucfirst($user->name); ?>"><br>

                <label for="username">Email</label>
                <?php if (isset($errors['email'])) : ?>
                <div class="red-error-message">
                    <?= $errors['email'] ?>
                </div>
                <?php endif; ?>
                <input class="form-control" type="email" id="username" name="email" value="<?= $user->email; ?>"><br>

                <label for="username">Username</label>
                <?php if (isset($errors['username'])) : ?>
                <div class="red-error-message">
                    <?= $errors['username'] ?>
                </div>
                <?php endif; ?>
                <input class="form-control" type="text" id="username" name="username" value="<?= ucfirst($user->username); ?>"><br>

                <label for="username">Password</label>
                <?php if (isset($errors['password'])) : ?>
                <div class="red-error-message">
                    <?= $errors['password'] ?>
                </div>
                <?php endif; ?>
                <input class="form-control" type="password" id="username" name="password"><br>

                <input class="btn btn-warning" type="submit" name="update" value="Update"></button>
                <div class="float-right">
                    <a href="delete" class="btn btn-outline-danger btn-sm"><i class="fa fa-edit"></i> Delete account</a>
                </div>

            </form>

        </div><!-- End div - class Player-->
    </div> <!-- End div row -->
</div> <!-- End container -->
<?php require 'partials/foot.php'; ?>