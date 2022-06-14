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
<div class="menu-wrapper container">
    <h1 class="logo">Players List5 with OOP</h1>
    <form method="post" action="confirm.php">
        <div class="menu-items">
            <?php foreach ($players as $player): ?>
                <div class="menu-item">
                    <h3 class="menu-item-name"><?php echo $player->getNumber() ?></h3>
                    <h3 class="menu-item-name"><?php echo $player->getName() ?></h3>
                    <h3 class="menu-item-name"><?php echo $player->getTeam() ?></h3>
                    <?php if ($player instanceof Midfielder): ?>
                        <p class="menu-item-type"><?php echo $player->getType() ?></p>
                    <?php else: ?>
                    <?php endif ?>
                </div>
            <?php endforeach ?>
        </div>
    </form>
</div>
</body>
</html>