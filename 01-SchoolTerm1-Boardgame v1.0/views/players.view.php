<?php require 'views/partials/head.php'; ?>
<?php include "views/partials/nav.php"; ?>
<?php



// if the user is not logged in return back to login page
if (!$userObj->isLoggedIn()) {
    $userObj->redirect('login?loginerror=1');
}

// start session and get the information connected with the user_id of logged in user
$user_id = $_SESSION['user_id'];
$user = $userObj->userData($user_id);
?>

<div class="container-fluid">
    <div class="row">
         <div class="jumbotron jumbotron-fluid mb-5">
             <!-- echo the name of the logged in user -->
          <h4 class="page-title"><?= ucfirst($user->name); ?>, you are a legend</h4>
              
              <div class="d-flex justify-content-center">
              <!-- edit button, sends user to the edit.view.php -->
              <a href="edit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit profile</a> 
                
            </div>
               </div>
        <hr>
        <div class="col-10 offset-1">
         <div class="container">
            <br>
            <h4><i class="fas fa-users mb-4"></i> 
            <!-- show the total amount of users(rows) in the users table in db -->
            <?php echo App::get('database')->countTotalPlayers(); ?>
             Registered Players</h4>
            
             
           
            <ul class="list-group">
                <?php foreach ($users as $user) : ?>
                <li class='list-group-item clearfix grey-hover'>
                    <!-- echo each username in the database in the users table -->
                    <?= ucfirst($user->username) ?>
                <?php endforeach; ?>
            </ul>
            </div> <!-- End div - users container -->

        </div><!-- End div - players -->
        <hr>
        <div class="col-10 offset-1">

        </div><!-- End div - class Player-->
    </div> <!-- End div row -->
</div> <!-- End container -->


<!-- JavaScript / Popper.js / jQuery all for Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<?php require 'partials/foot.php'; ?>
</body>
</html>