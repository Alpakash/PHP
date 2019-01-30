<?php
// create object Games
$gameObj = new Games();
$userObj = new Users();
$battleObj = new Battles();

// get data from the game_id's from the database table games
$gameGOT = $gameObj->gameData(1); // Game of Thrones object

// This value is passed through via the gamegot.view.php
// put the value of the $_GET['winnerName'] in a variable
$winnerName = $_GET['winnerName'];
$battleName = $_GET['battleName'];

/**
 * Helaas krijg ik op de localhost een bug
 * variable $player1 t/m 6 en de $score1 t/m 6 wilt de app niet herkennen
 * 
 * Als een game wordt gestart met bijv 3 spelers dan worden $player1, $player2, en $player3 ingevuld en opgehaald 
 * in de $_GET, echter voor $player4, $player5 en $player6 krijg ik een foutmelding: undefined variables.
 * Hierdoor werkt de code niet en wordt de redirect niet gedaan terug naar de games page.
 * 
 * WEL WORDEN DE GEGEVENS IN DE BATTLES TABLE GEINSERT!!
 * nu alleen bij winnerwow.php en winnerlotr.php vanwege al m'n issets in deze winnergot.php file
 * 
 * 1. De battle wordt dus wel weergeven op de battles page.
 * 2. de winnaar wordt wel geupdate op de /games.
 * 
 * Helaas dus geen redirect die staat op line 127 in deze file
 */

if (isset($_GET['player0']) && $_GET['player0'] == true) {
$player1 = $_GET['player0'];
} else if (isset($_GET['player1']) && $_GET['player1'] == true) {
$player2 = $_GET['player1'];
  } else if (isset($_GET['$player2']) && $_GET['$player2'] == true) {
$player3 = $_GET['player2'];
  } else if (isset($_GET['$player3']) && $_GET['$player3'] == true) {
$player4 = $_GET['player3'];
  } else if (isset($_GET['$player4']) && $_GET['$player4'] == true) {
$player5 = $_GET['player4'];
  } else if (isset($_GET['$player5']) && $_GET['$player5'] == true) {
$player6 = $_GET['player5'];
  }

$gameName = "<strong>Game of Thrones:</strong> " . $battleName;

if (isset($_GET['score1']) && $_GET['score1'] == true) {
$score1 = $_GET['score1'];
} else if (isset($_GET['score2']) && $_GET['score2'] == true) {
$score2 = $_GET['score2'];
} else if (isset($_GET['score3']) && $_GET['score3'] == true) {
$score3 = $_GET['score3'];
} else if (isset($_GET['score4']) && $_GET['score4'] == true) {
$score4 = $_GET['score4'];
} else if (isset($_GET['score5']) && $_GET['score5'] == true) {
$score5 = $_GET['score5'];
} else if (isset($_GET['score6']) && $_GET['score6'] == true) {
$score6 = $_GET['score6'];
}


if (isset($score2) && $score2 == true) {
  $totalScore = $score1 + $score2;
} else if (isset($score3) && $score3 == true) {
  $totalScore = $score1 + $score2 + $score3;
} else if (isset($score4) && $score4 == true) {
  $totalScore = $score1 + $score2 + $score3 + $score4;
} else if (isset($score5) && $score5 == true) {
  $totalScore = $score1 + $score2 + $score3 + $score4 + $score5;
} else if (isset($score6) && $score6 == true) {
  $totalScore = $score1 + $score2 + $score3 + $score4 + $score5 + $score6;
}

if (isset($_GET['winnerName'])) {
  // update the winner column in the games table with the value of the GET in the URL
  $gameObj->update('games', ['winner' => $winnerName], ['game_id' => "1"]);
}

$player = [];
$score = [];


if (isset($player1)) {
  $player["player1"] = $player1;
  $score["score1"] = $score1;
} else if (isset($player2)) {
  $player["player2"] = $player2;
  $score["score2"] = $score2; 
} else if (isset($player3)) {
  $player["player3"] = $player3;
  $score["score3"] = $score3;
} else if (isset($player4)) {
  $player["player4"] = $player4;
  $score["score4"] = $score4;
} else if (isset($player5)) {
  $player["player5"] = $player5;
  $score["score5"] = $score5;
} else if (isset($player6)) {
  $player["player6"] = $player6;
  $score["score6"] = $score6;
}

// insert the game data in the rows of the battles table
  $battleObj->insert(
    'battles',
    array(
      'gameid' => 1,
      'name' => $gameName,
      'score01' => $score['score1'],
      'score02' => $score["score2"],
      'score03' => $score["score3"],
      'score04' => $score["score4"],
      'score05' => $score["score5"],
      'score06' => $score["score6"],
      'player01' => $player["player1"],
      'player02' => $player["player2"],
      'player03' => $player["player3"],
      'player04' => $player["player4"],
      'player05' => $player["player5"],
      'player06' => $player["player6"],
      'wonby' => $winnerName,
      'rounds' => $totalScore,
      'img' => 'https://freepngimg.com/download/tv_shows/30801-2-game-of-thrones-transparent-background.png'
    )
  );


// redirect back to the games page and congratulate winner with message
$gameObj->redirect("/games?winner=got&username={$winnerName}");

?>
