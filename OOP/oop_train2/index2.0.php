<!--index.php-->
<?php
require_once('playersData.php');
require_once('common.php');
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
        <th>&nbsp; No.</th>
        <th>&nbsp;Name</th>
        <th>&nbsp;Team</th>
        <th>Position</th>
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
                <?php echo "<font color='red'>FW</font></td><td>"; ?>
                    <p class="menu-item-type"><font color="orange">
                        goal: <?php echo $player->getGoal() ?></font></p><?php endif ?>
                <?php if ($player instanceof Midfielder): ?>
                <?php echo "<font color='lime'>MF</font></td><td>"; ?>
                    <p class="menu-item-type">
                    <font color="yellow">assist: <?php echo $player->getAssist() ?></font></p><?php endif ?></td>
            <?php endforeach ?>
    </table>
</div>
</body>

<style>
    body {
        background: papayawhip;
        text-align: center;
        margin-top: 9%;
    }
    table {
        margin-left: 25%;
        width: 50%;
        text-align: left;
        border-collapse: collapse;
    }

    table tr{
        background-image: linear-gradient(40deg, deepskyblue 0%, blue 74%);
    }

    table tr:last-child *{
        border-bottom: none;
    }

    table th,table td{
        text-align: center;
        border: solid 2px #fff;
        color: white;
        padding: 10px 0;
    }
</style>
</html>