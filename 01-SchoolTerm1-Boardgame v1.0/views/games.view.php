<?php require 'views/partials/head.php'; ?>
<?php include "views/partials/nav.php"; ?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<?php

// if the user is not logged in return back to login page
if (!$userObj->isLoggedIn()) {
  $userObj->redirect('login?loginerror=1');
}

// Create an object from class Games
$gameObj = new Games();

// get data from the game_id's from the database table games
$gameGOT = $gameObj->gameData(1); // Game of Thrones object
$gameWOW = $gameObj->gameData(3); // World of Warcraft object
$gameLOTR = $gameObj->gameData(4); // Lord of the Rings object

// if the GET playerserror parameter = value then echo error
  if (isset($_GET['playerserror']) && $_GET['playerserror'] == 1) {
  $playersErrorMessage = "Players are not selected";
} else if (isset($_GET['playerserror']) && $_GET['playerserror'] == 'got') {
  $playersErrorMessage = "To play " . $gameGOT->name . " you need at least " . $gameGOT->min_players . " players, the maximum is " . $gameGOT->max_players . " players.";
} else if (isset($_GET['playerserror']) && $_GET['playerserror'] == 'wow') {
  $playersErrorMessage = "To play " . $gameWOW->name . " you need at least " . $gameWOW->min_players . " players, the maximum is " . $gameWOW->max_players . " players.";
} else if (isset($_GET['playerserror']) && $_GET['playerserror'] == 'lotr') {
  $playersErrorMessage = "To play " . $gameLOTR->name . " you need at least " . $gameLOTR->min_players . " players, the maximum is " . $gameLOTR->max_players . " players.";
}

?>


  <?php
  //      GET winnername value after the redirect from the winner{game}.view.php pages
  if (isset($_GET['winner']) && isset($_GET['username'])) {
$winnerName = $_GET['username'];
  }
?>


<?php
// display message to congratulate the winner of the game, the winner{game}.view.php page gives the GET
 if (isset($_GET['username']) && $_GET['username'] == '') {
     $errorMessage = "Hey, something went wrong... You did not select a winner... you are evil, loser!";
 } else if (isset($_GET['winner']) && $_GET['winner'] == 'got') {
     $winnerMessage = "Congratulations " . $winnerName . "! You've won the game: ". $gameGOT->name . '. You are the champion... Hooray!!!';
 } else if (isset($_GET['winner']) && $_GET['winner'] == 'wow') {
     $winnerMessage = "Congratulations " . $winnerName . "! You've won the game: ". $gameWOW->name . '. You are the champion... Hooray!!!';
} else if (isset($_GET['winner']) && $_GET['winner'] == 'lotr') {
     $winnerMessage = "Congratulations " . $winnerName . "! You've won the game: ". $gameLOTR->name . '. You are the champion... Hooray!!!';
 }

?>


<div class="container-fluid">
  <div class="row">
    <div class="jumbotron jumbotron-fluid games-img mb-5">
      <h4 class="page-title">Games</h4>

    </div>


<!-- Display message on screen for winner victory. -->
    <div class="col-10 offset-1">
<center>
    <?php if (isset($winnerMessage)) : ?>
        <div class="alert alert-success">
            <?= $winnerMessage; ?>
        </div>
    <?php endif; ?>
</center>
    <br>

<!--  Display error message that no player is selected. -->
        <center>
            <?php if (isset($errorMessage)) : ?>
                <div class="alert alert-danger">
                    <?= $errorMessage; ?>
                </div>
            <?php endif; ?>
        </center>
        <br>



    <!-- create a form to GET all usernames in URL -->
  <form method="POST" name="gameform">
            <!-- a beautiful multiselect input, store users in username array-->
           <center> Select existing players to play with: <select class="selectpicker" multiple data-live-search="true" name="username[]">
                  <!-- Execute all usernames out of the users table -->
                    <?php foreach ($users as $user) : ?>
                        <option value="<?php echo $user->username; ?>"><?php echo $user->username; ?></option>
                    <?php endforeach; ?>
                </select>
<br><br>
               <div class="container">

                   <!-- Input field to add temporary players in the username[] (array). -->
                   <center> <input type="hidden" name="count" value="1" />
                       <div class="control-group" id="fields">
                           <div class="controls" id="profs">
                               <form class="input-append">
                                   <div id="field"><button style="margin-bottom: 15px;" id="b1" class="btn add-more btn-sm" type="button">Add Temporary Player</button>
                                       <input hidden autocomplete="off" class="input form-control temporary" id="field1" name="" type="text" data-items="8"/> </div>
                               </form>
                           </div>
                       </div></center>
               </div>



           </center>



            </form>

<!--        Show error message on the page when there is something wrong with the selection of players-->
            <?php if(isset($playersErrorMessage)) : ?>
            <center><div class="red-error-message-allFields"><?= "Error: " . $playersErrorMessage; ?></div></center>
            <?php endif; ?>

           

          

            <br>
      <div class="card-deck">
        <div class="card">
          <!-- Get the image(URL) column from the Game of Thrones row -->
          <img class="card-img-top" src="<?php echo $gameGOT->image; ?>" alt="Card image cap">
          <div class="card-body">
            <!-- Get the total_players column from the Game of Thrones row  -->
            <small>
              <?= $gameGOT->min_players . "-" . $gameGOT->max_players; ?> Players</small>
            <!-- Get the name and release_date column from the Game of Thrones row -->
            <h5 class="card-title">
              <?php echo $gameGOT->name . " - " . $gameGOT->release_date;  ?>
            </h5>
            <!-- Get the description from the Game of Thrones row -->
            <p class="card-text">
              <?php echo $gameGOT->description; ?>
            </p>
          </div>
            <!-- When this play button gets clicked the user is send to the battle/page of the game it belongs to. This is fixed with the onclick and the <script> at the bottom of this page -->        
           <button type="button" name="button1" onclick="return ButtonGOT();" class="btn btn-success" style="border-radius: 0;"><i class="fa fa-play" aria-hidden="true"></i> Play</button>
          <div class="card-footer">
            <!-- Show last winner in column winner in games table -->
            <center><small class="text-muted">
            <strong>Last winner:</strong> <?= $gameGOT->winner; ?></small></center>
          </div>
        </div>


        <div class="card">
          <!-- Get the image(URL) column from the World of Warcraft row -->
          <img class="card-img-top" src="<?php echo $gameWOW->image; ?>" alt="Card image cap">
          <div class="card-body">
            <!-- Get the total_players column from the World of Warcraft row  -->
            <small>
              <?= $gameWOW->min_players . "-" . $gameWOW->max_players; ?> Players</small>
            <!-- Get the name and release_date column from the World of Warcraft row -->
            <h5 class="card-title">
              <?php echo $gameWOW->name . " - " . $gameWOW->release_date; ?>
            </h5>
            <!-- Get the description from the World of Warcraft row -->
            <p class="card-text">
              <?php echo $gameWOW->description; ?>
            </p>

          </div>
           <!-- When this play button gets clicked the user is send to the battle/page of the game it belongs to. This is fixed with the onclick and the <script> at the bottom of this page -->         
          <button type="button" name="button1" onclick="return ButtonWOW();" class="btn btn-success" style="border-radius: 0;"><i class="fa fa-play" aria-hidden="true"></i> Play</button>
          <div class="card-footer">
            <!-- Show last winner in column winner in games table -->
            <center><small class="text-muted"><strong>Last winner:</strong> <?= $gameWOW->winner; ?></small></center>
          </div>
        </div>


        <div class="card">
          <!-- Get the image(URL) column from the Lord of the Rings row -->
          <img class="card-img-top" src="<?php echo $gameLOTR->image; ?>" alt="Card image cap">
          <div class="card-body">
            <!-- Get the total_players column from the Lord of the Rings row  -->
            <small>
              <?= $gameLOTR->min_players . "-" . $gameLOTR->max_players; ?> Players</small>
            <!-- Get the name and release_date column from the Lord of the Rings row -->
            <h5 class="card-title">
              <?php echo $gameLOTR->name . " - " . $gameLOTR->release_date; ?>
            </h5>
            <!-- Get the description from the Lord of the Rings row -->
            <p class="card-text">
              <?php echo $gameLOTR->description; ?>
            </p>
          </div>
          <!-- When this play button gets clicked the user is send to the battle/page of the game it belongs to. This is fixed with the onclick and the <script> at the bottom of this page -->
         <button type="button" name="button2" onclick="return ButtonLOTR();" class="btn btn-success" style="border-radius: 0;"><i class="fa fa-play" aria-hidden="true"></i> Play</button>
          <div class="card-footer">
            <!-- Show last winner in column winner in games table -->
            <center><small class="text-muted"><strong>Last winner:</strong> <?= $gameLOTR->winner; ?></small></center>
          </div>

        </div>
      </div>

    </div><!-- End div - Games -->
    <hr>

  </div> <!-- End div row -->


</div> <!-- End container -->


<!-- onclick the buttons of the games give an other action in the form and go to their own battle/page -->
<script language="Javascript">
function ButtonGOT()
{
    document.gameform.action = "battles/got"
    document.gameform.submit();             // Submit the page
    return true;
}

function ButtonWOW()
{
    document.gameform.action = "battles/wow"
    document.gameform.submit();             // Submit the page
    return true;
}

function ButtonLOTR()
{
    document.gameform.action = "battles/lotr"
    document.gameform.submit();             // Submit the page
    return true;
}
</script> <!-- End of the script only script in the project -->


<!-- Script to add temporary player input field -->
<script>
    $(document).ready(function(){
        var next = 1;
        $(".add-more").click(function(e){
            e.preventDefault();
            var addto = "#field" + next;
            var addRemove = "#field" + (next);
            next = next + 1;
            var newIn = '<input autocomplete="off" required class="form-control temporary" placeholder="Type in a temporary player to play with" id="field' + next + '" name="username[]' + next + '" type="text">';
            var newInput = $(newIn);

            $(addto).after(newInput);
            $(addRemove).after(removeButton);
            $("#field" + next).attr('data-source',$(addto).attr('data-source'));
            $("#count").val(next);
        });



    });

</script>


<?php require 'partials/foot.php'; ?>
