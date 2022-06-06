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
    $searchName = isset($_GET["name2"])? $_GET["name2"] : '';
    $searchTeam = isset($_GET["team2"])? $_GET["team2"] : [];
    $elements = is_array($searchTeam)? count($searchTeam): '0';
    $listNum = isset($_GET["listNum"])? $_GET["listNum"] : '6';
    $deleteID = isset($_GET["deleteID"])? $_GET["deleteID"]: '0000';

    include 'connection.php';
    $result_t = 0;
    $teams = $dbh->query('SELECT DISTINCT `team` FROM players ORDER BY Length(`team`) DESC LIMIT 15');
    $result_t = $teams->fetchAll(PDO::FETCH_ASSOC);

    $array = '';
    $y = 1;
    foreach ($searchTeam as $teams):
        $array .= "'".$teams."'";
        if($y < $elements){
            $array .= ", ";}
        $y ++;
    endforeach;

    $_SESSION['searchTeam'] = $array;

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
                <div id="ajaxLoad2"></div><?php if($array<>''){echo "search words: ".$array;} ?>
            </div>

            <div class="col-lg-4">
                <br>
                    <form action="index2.php" name="form4" id="form4" method="get" role="form" class="php-email-form"><!--not post but get request for test-->
                        <h2 align="center">Search Func.</h2><br>
                        <!--<input type="text" id="search_word" name="search_word" placeholder="search name"  value="<?php /*echo $searchName */?>">-->

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <input type="text" name="no2" class="form-control" id="no2" placeholder="No.">
                            </div>

                            <div class="col-md-8 form-group">
                                <input type="text" class="form-control" name="name2" id="name2" placeholder="Name" value="<?php echo $searchName ?>">
                            </div>

                            <!--<div class="col-md-6 form-group mt-3 mt-md-0">-->
                                <!--<input type="team2" class="form-control" name="team2" id="team2" placeholder="Team" value="<?php /*echo $searchTeam */?>">-->
                                <div class="container form-group mt-3 mt-md-0 col-md-12">
                                    <div class="trigger">
                                        <input id="input" type="text" class="form-control" placeholder="select teams" value="" disabled>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="margin-top:150px">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php $x=1; foreach ($result_t as $value_t): ?>
                                                    <input type="checkbox" name="team2[]" value="<?php echo $value_t['team'] ?>" id="checkbox"
                                                        <?php if(is_array($searchTeam)){if(in_array($value_t['team'], $searchTeam)){echo "checked";}} ?>>
                                                    <?php if($value_t['team'] == ''){echo "-no data-";}else{echo $value_t['team'];} ?><?php if($x % 5 ==0){echo "<br>";}?><?php $x++ ?>
                                                    <?php endforeach ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div align="right">
                                    <select name="listNum" onchange='ListNum()'> <!--onChange="location.href=value;"-->
                                        <option value="6">List Num</option>
                                        <option value="4">4</option>
                                        <option value="6">6</option>
                                        <option value="8">8</option>
                                        <option value="10">10</option>
                                    </select>
                                    </div>
                                </div>
                                <?php include "optionPages/popup/modal3.php"; ?>
                            <!--</div>-->
                        </div>
                            <br>
                        <div class="text-center"><button type="submit">
                                <i class="fa-regular fa-futbol"></i>Search！</button></div>
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
        function ListNum(){
            document.form4.submit();
        }

        function reloadData(){
            $.get("tableData3.php?name2=<?php echo $searchName ?>&sort=<?php echo $sortOrder ?>&column=<?php echo $sortBy ?>&page=<?php echo $page ?>&listNum=<?php echo $listNum ?>").then(
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