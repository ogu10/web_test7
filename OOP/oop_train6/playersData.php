<link rel="icon" type="image/png" sizes="192x192" href="http://localhost:8080/web_test7/web_test8/images/android-chrome-192x192.png">
<?php
require_once('player.php');
require_once('playerScore.php');

$dbh = new PDO('mysql:host=localhost;dbname=jobins;charset=utf8', 'root', '');
$join = "SELECT players.id, players.No, players.name, players.team, ability_scores.speed, ability_scores.pass, ability_scores.shoot FROM ability_scores INNER JOIN players ON players.id=ability_scores.id";
$stmt = $dbh->query($join);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$playersScore = array();

$x=1; foreach ($result as $value):
    $playerScore[$x] = new playerScore($value['id'], $value['No'], $value['name'], $value['team'], $value['speed'], $value['pass'], $value['shoot']);
    $x++;
endforeach;
?>