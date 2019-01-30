<!-- Favicon Game of Thrones -->
<link rel="shortcut icon" type="image/png" href="https://www.favicon.cc/logo3d/438403.png" />

<div class="full-width-img"> <!-- Show background image on home -->

        <?php require 'views/partials/head.php'; ?>

        <?php 
// The user gets redirected after deleting account to home?deleted=1
if (isset($_GET['deleted']) && $_GET['deleted'] == 1) {
        $deletedMessage = "Your account has succesfully been deleted";
}
?>
        <!-- show succesfully deleted message if the URL is home?deleted=1 -->
       <?php if (isset($_GET['deleted']) && $_GET['deleted'] == 1) : ?>
        <div class="alert alert-success">
                <?= $deletedMessage ?>
        </div>
        <?php endif; ?>

        <?php 
        
// create Users object
$userObj = new Users();

// if the user is already logged in return back to players page
if ($userObj->isLoggedIn()) {
        $userObj->redirect('players');
}
?>

        <div class="container-fluid welcome">
                <h1 class="display-3">Board Games project</h1>
                <a href="login"><button class="btn btn-primary mr-3">Login</button></a>
                <a href="register"><button class="btn btn-warning">Register</button></a>
        </div>
</div>
</div><!-- End div - class Player-->
</div> <!-- End container -->



<?php require 'partials/foot-.php'; ?>