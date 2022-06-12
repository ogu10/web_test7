<!--index.php-->
<?php
require_once('playersData.php');
require_once('all.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" sizes="192x192" href="http://localhost:8080/web_test7/web_test8/images/android-chrome-192x192.png">
    <meta charset="utf-8">
    <title>Players List with OOP</title>
</head>
<body>
<div class="menu-wrapper container">
    <h1 class="logo">Players List with OOP</h1>
    <h3>We have <font color="red"><?php echo Player::getCount() ?></font> players!</h3>

    <table id="players_list" class="players_list table table-striped">
        <th>&nbsp;&nbsp; No.</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;Name</th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;Team</th>
        <th>Score</th>
        </tr>
        　 <?php foreach ($players as $player): ?>
        <tr>
            <td>
                　<?php echo $player->getNumber() ?></td>
            <td>
                　<?php echo $player->getName() ?>
            <td>
                　<?php echo $player->getTeam() ?></td>
            <td>
                <?php if ($player instanceof Forward): ?>
                    <p class="menu-item-type"><font color="red">
                        goal: <?php echo $player->getGoal() ?></font></p><?php endif ?>
                <?php if ($player instanceof Midfielder): ?>
                    <p class="menu-item-type">
                    <font color="lime">assist: <?php echo $player->getAssist() ?></font></p><?php endif ?></td>
            <?php endforeach ?>
    </table>
</div>
</body>


<style>
    table {
        margin-left: 30%;
        width: 40%;
        text-align: left;
    }
</style>
</html>