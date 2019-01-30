<?php
// create object Games
$gameObj = new Games();
$userObj = new Users();
$battleObj = new Battles();

// get data from the game_id's from the database table games
$gameGOT = $gameObj->gameData(4); // Lord of the Rings

// This value is passed through via the gamegot.view.php
// put the value of the $_GET['winnerName'] in a variable
$winnerName = $_GET['winnerName'];
$battleName = $_GET['battleName'];

$player1 = $_GET['player0'];
$player2 = $_GET['player1'];
$player3 = $_GET['player2'];
$player4 = $_GET['player3'];
$player5 = $_GET['player4'];
$player6 = $_GET['player5'];
$gameName = "<strong>Lord of the Rings:</strong> " . $battleName;
$score1 = $_GET['score1'];
$score2 = $_GET['score2'];
$score3 = $_GET['score3'];
$score4 = $_GET['score4'];
$score5 = $_GET['score5'];
$score6 = $_GET['score6'];
$totalScore = $score1 + $score2 + $score3 + $score4 + $score5 + $score6;


//Battles::dbData();

if (isset($_GET['winnerName'])) {
    // update the winner column in the games table with the value of the GET in the URL
    $gameObj->update('games', ['winner' => $winnerName], ['game_id' => "4"]);

// insert the game data in the rows of the battles table
    $battleObj->insert('battles',
        array(
            'gameid' => 4,
            'name' => $gameName,
            'score01' => $score1,
            'score02' => $score2,
            'score03' => $score3,
            'score04' => $score4,
            'score05' => $score5,
            'score06' => $score6,
            'player01' => $player1,
            'player02' => $player2,
            'player03' => $player3,
            'player04' => $player4,
            'player05' => $player5,
            'player06' => $player6,
            'wonby' => $winnerName,
            'rounds' => $totalScore,
            'img' => 'https://img00.deviantart.net/0156/i/2013/095/e/9/lord_of_the_rings_icon_by_slamiticon-d60ici4.png'
        ));
}

// redirect back to the games page and congratulate winner with message
$gameObj->redirect("/games?winner=lotr&username={$winnerName}");

?>
