<!-- Favicon Game of Thrones -->
<link rel="shortcut icon" type="image/png" href="https://www.favicon.cc/logo3d/438403.png" />

<div class="full-width-img-got"> <!-- Show background image on GOT page -->


        <!-- Show background image on got page -->
        <?php require 'views/partials/head.php'; ?>

        <?php 
// create Users object
        $userObj = new Users();
        $gameObj = new Games();

// get data from the game_id's from the database table games
        $game = $gameObj->gameData(1); // Game of Thrones object

// if user is logged out he can't visit the 'game' and gets redirected to 'home' page
        if (!$userObj->isLoggedIn()) {
                $userObj->redirect('home');
        }
        // if the usernames are selected store the GET values in a variable 
        if (isset($_POST['username'])) {
                $usernames = $_POST['username'];
        }

        // if the usernames (players) are not selected in the games.view.php redirect back to /games
        // and give a error to select players on the game-selection page
        if (!isset($_POST['username'])) {
                header('Location: /games?playerserror=1');
        } else if (count($_POST['username']) < $game->min_players) {
                header('Location: /games?playerserror=got');
        } else if (count($_POST['username']) > $game->max_players) {
                header('Location: /games?playerserror=got');
        }

        ?>
        <!-- the JavaScript timer script -->
        <?php require 'views/partials/timer.php'; ?>

        <div class="container-fluid welcome">
                <!-- Display the timer and timer buttons in the project -->
                <div class="display-3 timer" style="color: #fff;"><span id="hour">00</span>:<span id="minute">00</span>:<span
                                id="seconds">00</span>
                        <button id="start-btn" class="btn btn-success">Start game</button>
                        <button id="stop-btn" class="btn btn-warning">Pause game</button>
                        <button id="reset-btn" class="btn btn-danger">Reset time</button>
                </div> <!-- End of the timer -->

            <!-- Get the player usernames and display them on the screen in a loop -->
            <div class="opacitybg">
                <h3><?php echo count($usernames); ?> Players:</h3>
                <?php foreach ($usernames as $username) : ?>
                    <!-- Show all users that are playing a game together -->
                    <?php echo $username . "<br>"; ?>
                <?php endforeach; ?>
            </div>
            <br>


                <!-- Give a nice opacity black background behind text -->
                <div class="opacitybg">
                        <h3>Now Playing:</h3>
                        <h1 class="display-3">A Game of Thrones boardgame</h1>

                        <!-- Button to trigger the choose winner modal -->
                        <button type="button" class="btn btn-success mr-3 mt-3" data-toggle="modal" data-target="#exampleModal">
                                Choose a winner
                        </button>

                        <!-- Abort game and redirect back to games selection page -->
                        <a href="/games"><button class="btn btn-danger mt-3">Abort game</button></a>
                </div>
        </div>
</div>
</div>

<!-- The modal to choose a winner -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Select The Ultimate Champion</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </button>
                        </div>

                        <div class="modal-body">
                                <!-- Form to select winner, redirect to execute the logic @ 'winner/got' page to update the winners column in games table -->
                                <form method="GET" action="/winner/got">

                                    <!-- input type to give a battle name and send it to the winnergot.view.php-->
                                    <div class="form-group">
                                        <input type="text" name="battleName" class="form-control" id="formGroupExampleInput" required placeholder="Write down a cool battle name ..">
                                    </div>

                                        <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <label class="input-group-text" for="inputGroupSelect01">Winner</label>
                                                </div>
                                                <!-- Make a select input to select a winning player -->
                                                <select name="winnerName" class="custom-select" id="inputGroupSelect01">


                                                        <option value="" disabled selected readonly hidden>Choose...</option>

                                                        <!-- Get this $users from the PagesController in the got function -->
                                                        <?php foreach ($usernames as $username) : ?>
                                                        <!-- Show all users from the db in the form to select a winner and output the same value in the $_GET -->
                                                            <option value="<?php echo $username ?>"><?php echo $username; ?></option>
                                                        <?php endforeach; ?>

                                                </select>


                                            <!--   Set variable $i for the select name score1, score2, score3, this will be put in a variable
                                            in the winner{game}.view.php with a GET score1 and then will be updated in the DB -->
                                            <?php $i = 1; ?>
                                        </div>
                                    <?php foreach ($usernames as $username) : ?>
                                        <!-- Show all users from the db in the form to select a winner and output the same value in the $_GET -->
                                        <option><?php echo $i . ": " . $username . "'s score"; ?></option>
                                        <div class="form-group">

                                            <!-- make the GET score variable score1, score2, score3, score4 etc. and get it in the winner{game}.view.php-->
                                            <select class="form-control" name="<?php echo "score" . $i ?>">
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </div>

                                    <?php $i++ ?>
                                    <?php endforeach; ?>

                                    <!-- In the winnergot.php these GETs turn into variables that will be put in the battles table -->
                                <?php for ($i = 0; $i < count($usernames); $i++) : ?>
                                    <select hidden name="player<?= $i ?>">
                                        <option selected><?= $usernames[$i]; ?></option>
                                    </select>
                                <?php endfor; ?>


                        </div>


                        
                        <div class="modal-footer">
                                <!-- Close the modal with a close button-->
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <!-- Save the form information and redirect to '/winner/got' page-->
                                <input type="submit" value="Save" class="btn btn-success"></button>
                               
                        </div>

                        </form>
                        <!-- End of the winner modal -->



                </div> <!-- End container -->


                <!-- require the footer -->
                <?php require 'partials/foot-.php'; ?>


        </div>
</div>
</div>

