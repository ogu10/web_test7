<link rel="icon" type="image/png" sizes="192x192" href="http://localhost:8080/web_test7/web_test8/images/android-chrome-192x192.png">
<?php
require_once('player.php');
require_once('abilityScores.php');

$dbh = new PDO('mysql:host=localhost;dbname=jobins;charset=utf8','root','');
$query =  "SELECT * FROM players LIMIT 8";
$result = 0;
$stmt = $dbh->query($query);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
    $players = array();
    $score = array();
    $x=1; foreach ($result as $value):

        $query2 =  "SELECT * FROM scores WHERE `id` = $x";
        $result2 = 0;
        $stmt2 = $dbh->query($query2);
        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    $score[$x] = new abilityScores();
    $players[$x] = new player($value['id'], $value['No'], $value['name'], $value['team']);
    $x++;
endforeach;
?>
