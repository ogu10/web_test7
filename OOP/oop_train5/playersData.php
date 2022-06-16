<link rel="icon" type="image/png" sizes="192x192" href="http://localhost:8080/web_test7/web_test8/images/android-chrome-192x192.png">
<?php
require_once('player.php');
/*require_once('abilityScores.php');*/
require_once('playerScore.php');

$dbh = new PDO('mysql:host=localhost;dbname=jobins;charset=utf8', 'root', '');
$query = "SELECT * FROM players LIMIT 3";
$result = 0;
$stmt = $dbh->query($query);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$players = array();
$score = array();
$playersScore = array();


$x=1; foreach ($result as $value):
    $id = $value['id'];
    $query2 = "SELECT * FROM ability_scores WHERE `id`= $x";
    $stmt2 = $dbh->query($query2);
    $scores = $stmt2->fetch(PDO::FETCH_ASSOC);
    echo "<br>";
    $score[$x] = new abilityScores($x, $scores['speed'], $scores['pass'], $scores['shoot']);
    $players[$x] = new player($value['id'], $value['No'], $value['name'], $value['team']);
    $playerScore[$x] = new playerScore($value['id'], $value['No'], $value['name'], $value['team'], $scores['speed'], $scores['pass'], $scores['shoot']);
    $x++;
endforeach;
?>