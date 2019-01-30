<?php require 'views/partials/head.php'; ?>
<?php include "views/partials/navslash.php"; ?>

<?php

// if the user is not logged in return back to login page
if (!$userObj->isLoggedIn()) {
    $userObj->redirect('login?loginerror=1');
}

$battle_id = $_GET['id'];
$battle = $battleObj->battleData($battle_id); // select a id in battles table and make object

?>

    <div class="container-fluid">
        <div class="row">
            <div class="jumbotron jumbotron-fluid">
                <h4 class="page-title">Scoreboard</h4>
                <center><h5 style="color: #fff;" class="bg-text"><?php echo $battle->name; ?></h5></center>
                <center><h5 style="color: #fff;" class="bg-text-sm">Total rounds played: <?php echo $battle->rounds; ?></h5></center>
                <center><h5 style="color: #fff;" class="bg-text-xs winner"><i class="fas fa-trophy"></i> <?php echo $battle->wonby; ?></h5></center>
        </div>

            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">Player ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Points</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Player 1</th>
                    <td><?php echo $battle->player01; ?></td>
                    <td><?php echo $battle->score01; ?></td>

                </tr>
                <tr>
                    <th scope="row">Player 2</th>
                    <td><?php echo $battle->player02; ?></td>
                    <td><?php echo $battle->score02; ?></td>

                </tr>
                <tr>
                    <th scope="row">Player 3</th>
                    <td><?php echo $battle->player03; ?></td>
                    <td><?php echo $battle->score03; ?></td>

                </tr>
                <tr>
                    <th scope="row">Player 4</th>
                    <td><?php echo $battle->player04; ?></td>
                    <td><?php echo $battle->score04; ?></td>

                </tr>
                <tr>
                    <th scope="row">Player 5</th>
                    <td><?php echo $battle->player05; ?></td>
                    <td><?php echo $battle->score05; ?></td>

                </tr>
                <tr>
                    <th scope="row">Player 6</th>
                    <td><?php echo $battle->player06; ?></td>
                    <td><?php echo $battle->score06; ?></td>

                </tr>

                </tbody>
            </table>

<br>
            <div class="champion-title winner"><h1> <?php echo "The Ultimate Champion: " . $battle->wonby; ?></h1></div>






            <div class="container">

            </div> <!-- End div - users container -->

        </div>


    </div> <!-- End div row -->
    </div> <!-- End container -->

    </div> <!-- End div row -->
    </div> <!-- End container -->
<?php require 'partials/foot.php'; ?>