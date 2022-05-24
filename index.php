<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bootstrap Trial</title>
    <link rel="icon" type="image/png" sizes="192x192" href="images/android-chrome-192x192.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="css/styleSheet.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>

    <!-- Vendor CSS Files -->
<!--    <link href="css/assets/vendor/aos/aos.css" rel="stylesheet">-->
    <link href="css/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--    <link href="css/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">-->
    <link href="css/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="css/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="css/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="css/indexStyle.css" rel="stylesheet">

</head>
<header>
<?php include "php/header.php"; ?>
</header>

<!-- ======= Log in Section ======= -->
<?php
session_start();
include 'php/connection.php';
if (!isset($_SESSION["user_name"])) {}else{
    header("Location: php/are_you_ready.php");}
/*if(isset($_POST['login'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['pass'] = $_POST['pass'];
    header('Location: confirm.php');}*/
?>
<div lang="ja">
    <head>
        <link rel="stylesheet" href="style.css"></head>
    <script src="/web_test3/pages/function.js"></script>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
    </head>
    <font color='white'><div align='center'><br>
            <!--    <a href="submit.php">go to index</a>--><br><br>
            <!--                session ID is <font color='yellow'>
                <?php /*echo($_COOKIE['PHPSESSID'] );*/?></font>--><br>
            <body id="hero" class="log-in-box"><!--background="images/a.jpg"-->
            <head>
                <meta charset="UTF-8">
                <title>PHP_TEST_no_5</title>
            </head>
            <h1>Welcome to JoBins Test7!</h1>
            <br><br>
            <div class="log-in-box">
            <form action="" method="POST">
                <input type="text" id="name" name="name" placeholder="name" oninput="checkName()"><br>
                <input type="password" name="pass" placeholder="pass"><br>
                <br><br>
                <button type="players_list5" name="login" id="button" class="black_button" disabled>
                    <i class="fa-regular fa-futbol"></i> log in！</button></form><br>

            <p> if you are not registered, <br>
                <a href="pages/apply.php"><button type="button"><i class="fa-solid fa-pen-to-square"></i> Apply!</button></a>
            </p>
            </div>
        </div></body>

<!-- ======= Log in Section END ======= -->
<footer>
    <?php include "php/footer.php"; ?>
</footer>
</html>