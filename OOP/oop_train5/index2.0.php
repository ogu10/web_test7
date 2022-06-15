<?php
require_once('playersData.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" sizes="192x192" href="http://localhost:8080/web_test7/web_test8/images/android-chrome-192x192.png">
    <meta charset="utf-8">
    <title>Players List5 with OOP</title>
</head>
<body>
<div class="menu-wrapper container" align="center">
    <h1 class="logo">Players List5 with OOP</h1>
    <form method="post" action="confirm.php">
        <div class="menu-items">
            <table class="menu-item">
                <?php foreach ($players as $player): ?>
                    <tr>
                    <td><?php echo $player->getNumber() ?><td>
                    <td class="menu-item-name"><?php echo $player->getName() ?></td>
                    <td class="menu-item-name"><?php echo $player->getTeam() ?></td>
                    <?php if ($player instanceof Midfielder): ?>
                        <p class="menu-item-type"><?php echo $player->getType() ?></p>
                    <?php else: ?>
                    <?php endif ?>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </form>
</div>
</body>
    <style>
        h1{
            margin-top: 10%;
            margin-bottom: 2%;
        }
        table{
            width: 28%;
            text-align: right;
        }
        body{
            background-color: lightblue;
        }
    </style>

</html>