<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bootstrap Trial</title>
    <link rel="icon" type="image/png" sizes="192x192" href="http://localhost:8080/web_test7/web_test8/images/android-chrome-180x180.png">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2b5ebdc171.js" crossorigin="anonymous"></script>

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

    include '../../connection.php';
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
    ?>
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

        </div>
        <br>
    </div>
</section>
<!-- ======= Add Form & Table Section END ======= -->

<footer>
    <?php $page = isset($_GET['page']) ? $_GET['page'] : "1";//ユーザーから受け取った値を変数に入れる ?>

    <style>
        .section-bg2 {
            background:rgba(235,255,255,0.3);
        }
    </style>

    <script>
        //js limited code
        function loadDoc() {

            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    document.getElementById('ajaxLoad2').innerHTML = xhttp.response;
                }
                else {
                   console.log(this.status)
                }
            };

            xhttp.open("GET", "http://localhost:8080/web_test7/web_test8/php/tableData3.php?name2=<?php echo $searchName ?>&sort=<?php echo $sortOrder ?>&column=<?php echo $sortBy ?>&page=<?php echo $page ?>&listNum=<?php echo $listNum ?>", true);
            xhttp.send();
        }


/*        function reloadDataJs() {

            let xhr = new XMLHttpRequest();
            xhr.open('get', "http://localhost:8080/web_test7/web_test8/php/tableData3.php?name2=<?php echo $searchName ?>&sort=<?php echo $sortOrder ?>&column=<?php echo $sortBy ?>&page=<?php echo $page ?>&listNum=<?php echo $listNum ?>");
            xhr.addEventListener('loaded', function() {
                console.log("loaded")
                    document.getElementById('ajaxLoad2').innerHTML = xhr.response;
            });
        }*/

/*            $.ajax({
                url: "http://localhost:8080/web_test7/web_test8/php/tableData3.php?name2=<?php echo $searchName ?>&sort=<?php echo $sortOrder ?>&column=<?php echo $sortBy ?>&page=<?php echo $page ?>&listNum=<?php echo $listNum ?>",
                type: "get"
            }).then(
                function(data){
                    document.getElementById('ajaxLoad2').innerHTML = data;
                }
            )
        };*/

        document.addEventListener('DOMContentLoaded', function(){
           // reloadDataJs();
            loadDoc();
        });


/*        function reloadData(){
            $.get("table9.php").then(
                function(response){
                    $("#ajaxLoad2").html(response)
                }
            )
        }

 */
        // $(document).ready(function(){
        //     reloadDataJs();
        // });

    </script>

</footer>
</html>