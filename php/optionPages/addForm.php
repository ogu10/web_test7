<?php
ini_set('display_errors',1);//画面にエラーを表示
error_reporting(E_ALL);//全ての種類のエラーを表示
if(isset($_POST['datapost'])) {
    $_SESSION['No'] = $_POST['No'];
    $_SESSION['team'] = $_POST['team'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['league_id'] = $_POST['league_id'];
    header('Location: regist.php');
}

?>
<div lang="ja" id="addForm2">
    <head>
        <meta charset="UTF-8">
        <title>Bootstrap Trial</title>
        <link rel="icon" type="image/png" sizes="192x192" href="../../images/android-chrome-192x192.png">

        <link rel="stylesheet" href="style.css">
        <script src="/web_test3/pages/function.js"></script>
        <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
    </head>
        <div align='center'><br>
            <head>
                <meta charset="UTF-8">
                <title>PHP_TEST</title>
            </head>
            <font color="white">
            </p>add your </font><font color='red'>favorite Soccer player </font><font color='white'>below!</p></font>

    <form action="" method="post">
        <input type="int" name="No" placeholder="No"><br>
        <input type="text" id="name" name="name" placeholder="name" oninput="checkName()"><br>
        <input type="text" name="team" placeholder="team"><br><br><font color='Lime'>
            <input type="radio" name="league_id" value="1">Premium League<br>
            <input type="radio" name="league_id" value="3">Bundesliga<br>
            <input type="radio" name="league_id" value="2">Serie A<br>
            <input type="radio" name="league_id" value="4">La Liga<br>
            <input type="radio" name="league_id" value="5">Ligue 1</font>
        <br><br>
        <button type="submit" name="datapost" id="button" class="black_button" <!--disabled-->>
        <i class="fa-regular fa-futbol"></i> Kick off！</button>
        <p><font color='Green'></font></form>
    </p>
    <p>
        <a href="pages/unit.php">go to unit!</a>
    </p></div><br><br>

