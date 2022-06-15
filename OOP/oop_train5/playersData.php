<link rel="icon" type="image/png" sizes="192x192" href="http://localhost:8080/web_test7/web_test8/images/android-chrome-192x192.png">
<?php
require_once('player.php');
require_once('score.php');

$dbh = new PDO('mysql:host=localhost;dbname=jobins;charset=utf8','root','');
$query =  "SELECT * FROM players LIMIT 8";
$result = 0;
$stmt = $dbh->query($query);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php
    $players = array();
    $x=1; foreach ($result as $value):

        $query2 =  "SELECT * FROM scores WHERE `id` = $x";
        $result2 = 0;
        $stmt2 = $dbh->query($query2);
        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    var_dump($result2);
    echo "<br>";
    $players[$x] = new player($value['id'], $value['No'], $value['name'], $value['team']);
    $x++;
endforeach;
echo "<br><br><br>";
var_dump($result);
echo "<br><br><br>";
var_dump($players);
echo "<br><br><br>";
?>


　 <?php $x=1; foreach ($result as $value): ?>
<tr>
    <td>
        　<?php echo $value['No'] ?></td>
    <td>
        　<?php echo $value['name'] ?></td>
    <td>
        　<?php /*$team_list = isset($value['team'])? $value['team']: "-no data-";*/
        echo $value['team']; ?></td>
    <td>&nbsp;&nbsp;&nbsp;
        <?php echo "<!--<button class=`button3`>--><a href=../../edit.php?id=" . $value["id"] . ">"; ?>
        <i class="fa-solid fa-pen-nib"></i>
        <?php echo "</a>\n";
        echo "<td>";?>
        <i class="fa-solid fa-trash"></i>
        <?php echo "<br>";
        echo "</tr>\n"; ?>
        <?php $x++ ?>
        <?php endforeach ?>
