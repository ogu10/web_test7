<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bootstrap Trial</title>
    <link rel="icon" type="image/png" sizes="192x192" href="images/android-chrome-192x192.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="../css/styleSheet.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>

    <!-- Vendor CSS Files -->
    <!--    <link href="css/assets/vendor/aos/aos.css" rel="stylesheet">-->
    <link href="../css/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--    <link href="css/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">-->
    <link href="../css/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../css/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../css/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../css/indexStyle.css" rel="stylesheet">

</head>
<?php
ini_set('display_errors',1);//画面にエラーを表示
error_reporting(E_ALL);//全ての種類のエラーを表示
session_start();
if(isset($_POST['datapost'])) {header('Location: regist2.php');} ?>
<?php include "header.php"; ?>
<html>
<div lang="ja">
    <head>
        <link rel="stylesheet" href="style1.css"></head>
    <div class="anim-box">
        <body background="images/0_7.jpg">
    </div>
    <script src="/web_test3/pages/function.js"></script>
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>
    </head>
    <font color='white'><div align='center' class="log-in-body"><br><br><br>
            <!--            session ID is <font color='yellow'>
                <?php /*echo($_COOKIE['PHPSESSID'] );*/?></font><br>-->
            <head>
                <meta charset="UTF-8">
                <title>PHP_TEST_no_5</title>
            </head>
            <h2>Create new account!</h2><br><br><br>
            <div class="log-in-box">
            <form action="../regist2.php" method="post">
                <input type="text" id="name" name="name" placeholder="name" oninput="checkName()"><br>
                <input type="password" name="pass" placeholder="pass"><br>
                <br><br>
                <button type="players_list5" name="datapost" id="button" disabled>
                    <i class="fa-solid fa-pen-to-square"></i> Apply！</button><br><br><br>
                <font color='white'>or<br>back to <a href="../index.php">log in page</a>
            </div>
        </div></font>
<?php include "footer.php"; ?>
</html>
