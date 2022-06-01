<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bootstrap Trial</title>
    <link rel="icon" type="image/png" sizes="192x192" href="../images/android-chrome-192x192.png">
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

</head>
<header>

    <?php
    session_start();
    $_SESSION['no'] = "";
    $_SESSION['team'] = "";
    $_SESSION['name'] = "";
    $_SESSION['league_id'] = "";
    if(isset($_POST['datapost'])) {
        $_SESSION['no'] = $_POST['no'];
        $_SESSION['team'] = $_POST['team'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['league_id'] = $_POST['league_id'];
        header('Location: optionPages/addFunc.php');
    }

    $sortBy = isset($_GET["column"])? $_GET["column"] : "id";
    $sortOrder = isset($_GET["sort"])? $_GET["sort"] : "DESC";
    $searchName = isset($_GET["search_word"])? $_GET["search_word"] : '';
    $searchTeam = isset($_GET["team_belongings"])? $_GET["team_belongings"] : [];
    $elements = is_array($searchTeam)? count($searchTeam): '0';
    $deleteID = isset($_GET["deleteID"])? $_GET["deleteID"]: '0000';

    include "header.php"; ?>
</header>

<!-- ======= Add Form & Table Section ======= -->
<section id="contact" class="contact section-bg2">
    <div class="container" data-aos="fade-up">
        <br><br>
        <div class="section-title">
            <h2>Search</h2>
            <p>～本家JoBinsみたいな検索機能を目指して～</p>
        </div>

        <div class="row">

            <div class="col-lg-8">
                <div id="ajaxLoad2"></div>
            </div>

            <div class="col-lg-4">
                <br>
                    <form action="index2.php" method="get" role="form" class="php-email-form"><!--not post but get request for test-->
                        <h2 align="center">Search Func.</h2><br>
                        <!--<input type="text" id="search_word" name="search_word" placeholder="search name"  value="<?php /*echo $searchName */?>">-->
                        <input type="hidden" name="sort" id="searchSort" value="<?php echo $sortOrder ?>">
                        <input type="hidden" name="column" id="searchColumn" value="<?php echo $sortBy ?>">
                        <input type="hidden" name="deleteID" id="deleteID" value="<?php echo $deleteID ?>">

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="no2" class="form-control" id="no2" placeholder="No.">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="team2" class="form-control" name="team2" id="team2" placeholder="Team">
                            </div>
                        </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="name2" id="name2" placeholder="Name">
                            </div><br>
                        <div class="text-center"><button type="submit">
                                <i class="fa-regular fa-futbol"></i> Search it！</button></div>
                    </form><br><br>
            </div>

        </div>
        <br>
    </div>
</section>
<!-- ======= Add Form & Table Section END ======= -->

<footer>
    <?php include "footer.php"; ?>
    <?php $page = ($_GET['page']) ? $_GET['page'] : "1";//ユーザーから受け取った値を変数に入れる ?>

    <style>
        .section-bg2 {
            background:rgba(255,255,205,0.3);
        }
    </style>

    <script>
        function reloadData(){
            $.get("tableData3.php?page=<?php echo $page ?>").then(
                function(response){
                    $("#ajaxLoad2").html(response)
                }
            )
        }
        $(document).ready(function(){
            reloadData();
        });
    </script>

    <!--    --><?php
    /*    if(!isset($_SESSION["user_name"])) {
            header("Location: optionPages/ban.php");} */?>

</footer>
</html>