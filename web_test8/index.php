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
    $searchName = isset($_GET["name2"])? $_GET["name2"] : '';
    $searchTeam = isset($_GET["team2"])? $_GET["team2"] : [];
    $elements = is_array($searchTeam)? count($searchTeam): '0';
    $deleteID = isset($_GET["deleteID"])? $_GET["deleteID"]: '0000';


    include "php/header.php"; ?>
</header>

<!-- ======= Add Form & Table Section ======= -->
<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <br><br>
        <div class="section-title">
            <h2>Pagination</h2>
            <p>???????????????????????????????????????????????????????????????????????????????????????????????????</p>
        </div>

        <div class="row">

            <div class="col-lg-4">
                <br>
                <form action="php/register.php" method="post" role="form" class="php-email-form">
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
                    </div>
                    <div class="form-group mt-3" align="center">
                        <font color=lime><br>
                        <select name="league_id2">
                        <option value="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--League--
                        <option value="5">Ligue 1
                        <option value="4">La Liga
                        <option value="2">Serie A
                        <option value="3">Bundesliga
                        <option value="1">Premium League
                        </select></font>
                    </div>
                    <br><br>
                    <div class="text-center"><button type="submit">Kick off!</button></div>
                </form>
            </div>

            <div class="col-lg-8">
                <div id="ajaxLoad"></div>
            </div>

        </div>
        <br>
    </div>
</section>
<!-- ======= Add Form & Table Section END ======= -->

<footer>
    <?php include "php/footer.php"; ?>
    <?php $page = ($_GET['page']) ? $_GET['page'] : "1";//????????????????????????????????????????????????????????? ?>
    <script>
        function reloadData(){
            $.get("php/tableData.php?name2=<?php echo $searchName ?>&sort=<?php echo $sortOrder ?>&column=<?php echo $sortBy ?>&page=<?php echo $page ?>").then(
                function(response){
                    $("#ajaxLoad").html(response)
                }
            )
        }
        $(document).ready(function(){
            reloadData();
        });
    </script>

</footer>
</html>