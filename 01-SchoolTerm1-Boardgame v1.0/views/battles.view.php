<?php require 'views/partials/head.php'; ?>
<?php include "views/partials/nav.php"; ?>

<?php 

// if the user is not logged in return back to login page
if (!$userObj->isLoggedIn()) {
    $userObj->redirect('login?loginerror=1');
}

?>

<div class="container-fluid">
    <div class="row">
   <div class="jumbotron jumbotron-fluid battles-img">
    <h4 class="page-title">The Ultimate Battles</h4>
               </div>


        <div class="container">
            <?php $reversedBattles = array_reverse($battles); ?>
            <ul class="list-group">
                <?php foreach ($reversedBattles as $battle) : ?>

                <!-- Get the date and time of the battles and format them in day-month-year and show time played game-->
                    <div>
                    <center><?php
                    echo "<b>Played Date: </b>" . date("d-m-Y ", strtotime($battle->played_date));
                    echo " - ";
                    echo "<b>Time: </b>" . date("H:i:s", strtotime($battle->played_date));
                    echo " - ";
                    echo "<b>Champion: </b>". $battle->wonby;
                    ?>
                    </center>
                    </div>
                    <a style="width: 70%; margin: auto;" class="game-hover" href="battles/show?id=<?= $battle->battles_id ?>">
                        <li  class='list-group-item clearfix smaller-li'>

                    <!-- echo each username in the database in the users table -->

                           <?= ucfirst($battle->name); ?><img src="<?= $battle->img; ?>" width="40px"; style="float:right;"> </li></a>
                    <?php endforeach; ?>
            </ul>
        </div> <!-- End div - users container -->

    </div><!-- End div - players -->


</div> <!-- End div row -->
    </div> <!-- End container -->

    </div> <!-- End div row -->
</div> <!-- End container -->
<?php require 'partials/foot.php'; ?>