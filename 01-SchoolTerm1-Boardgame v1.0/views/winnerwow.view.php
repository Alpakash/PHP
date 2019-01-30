<?php
// create object Games
$gameObj = new Games();
$userObj = new Users();
$battleObj = new Battles();

// get data from the game_id's from the database table games
$gameGOT = $gameObj->gameData(3); // Game of Thrones object

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
$gameName = "<strong>World of Warcraft:</strong> " . $battleName;
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
    $gameObj->update('games', ['winner' => $winnerName], ['game_id' => "3"]);

// insert the game data in the rows of the battles table
    $battleObj->insert('battles',
        array(
            'gameid' => 3,
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
            'img' => 'https://d1u5p3l4wpay3k.cloudfront.net/wowpedia/thumb/e/e6/WoW_icon.png/250px-WoW_icon.png?version=be2ed78b3c9b7594d78d9fe4eebb20e5'
        ));
}

// redirect back to the games page and congratulate winner with message
$gameObj->redirect("/games?winner=wow&username={$winnerName}");

?>
