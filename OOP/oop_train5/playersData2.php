<link rel="icon" type="image/png" sizes="192x192"
      href="http://localhost:8080/web_test7/web_test8/images/android-chrome-192x192.png">
<?php
require_once('player.php');
require_once('abilityScores.php');

$dbh = new PDO('mysql:host=localhost;dbname=jobins;charset=utf8', 'root', '');
$query = "SELECT * FROM players LIMIT 3";
$result = 0;
$stmt = $dbh->query($query);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$players = array();
$score = array();


$x=1; foreach ($result as $value):
    $id = $value['id'];
    $query2 = "SELECT * FROM ability_scores WHERE `id`= $x";
    $stmt2 = $dbh->query($query2);
    $scores = $stmt2->fetch(PDO::FETCH_ASSOC);
    //var_dump($scores);
    var_dump($scores['speed']);
    echo "<br>";
    $score[$x] = new abilityScores($x, $scores['speed'], $scores['pass'], $scores['shoot']);
    $players[$x] = new player($value['id'], $value['No'], $value['name'], $value['team']);
    $x++;
endforeach;
echo "<br><br><br>";
var_dump($score);
echo "<br><br><br>";
var_dump($players);
echo "<br><br><br>";
?>


 <?php $x = 1; foreach ($result as $value): ?>
<tr>
    <td>
        　<?php echo $value['No'] ?></td>
    <td>
        　<?php echo $value['name'] ?></td>
    <td>
        　<?php echo $value['team']; ?></td>
    <td>
        <?php echo $scores['speed'] ?></td>

        <?php echo "<br>";
        echo "</tr>\n"; ?>
        <?php $x++ ?>
        <?php endforeach ?>
