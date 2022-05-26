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
    if(isset($_POST['datapost'])) {
        $_SESSION['No'] = $_POST['No'];
        $_SESSION['team'] = $_POST['team'];
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['league_id'] = $_POST['league_id'];
        echo $_SESSION['No'];
        header('Location: optionPages/addFunc.php');
    }
    include "header.php"; ?>
</header>

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" data-aos="fade-up">
        <h1>Welcome to our site!</h1>
        <h2>採用成功にコミットする採用管理ツール JoBins</h2>
        <a href="#services" class="btn-get-started scrollto" data-bs-toggle="tooltip" data-bs-placement="left" title="すくろーる！">
            <i class="fa-solid fa-angles-down"></i></a>
    </div>
</section>
<!-- ======= Hero Section END ======= -->


<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <br><br><br><br><br>
    <div class="container">
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>About Us</h2>
            <p>あなたのキャリアや才能をJoBinsで存分に発揮しませんか？<br>
                きちんと成果が評価される環境、人種も国籍も関係なく個人を尊重する組織文化、<br>
                よく働き、よく遊ぶ仕事仲間があなたを待っています！</p>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up">
                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                    <h4 class="title"><a href="">Passion</a></h4>
                    <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4 class="title"><a href="">Scheme</a></h4>
                    <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon"><i class="bx bx-tachometer"></i></div>
                    <h4 class="title"><a href="">Speedy</a></h4>
                    <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon"><i class="bx bx-world"></i></div>
                    <h4 class="title"><a href="">Global</a></h4>
                    <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                </div>
            </div>

        </div>

    </div>
</section>
<!-- ======= Services Section END ======= -->


<!-- ======= Add Section ======= -->
<section id="addForm" class="photoSlider section-bg">
    <br>
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Add Form</h2>
            <p>新しい選手を</p>
        </div>
    </div>
    <?php include "optionPages/addForm.php"; ?>
</section>
<br>
<!-- ======= Add Section END ======= -->


<!-- ======= Table Section ======= -->
<section id="tables" class="tables section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Table</h2>
            <p>これまで作ったてーぶるを</p>
        </div>
        <div class="container col-md-10">
            <div id="ajaxLoad"></div></div>
    </div>
</section>
<br>
<!-- ======= Table Section END ======= -->


<!-- ======= Slider Section ======= -->
<section id="gallery" class="photoSlider section-bg">
    <br>
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Gallery</h2>
            <p>見たことのない、絶景のやつを</p>
        </div>
    </div>
    <?php include "slider.php"; ?>
</section>
<br>
<!-- ======= Slider Section END ======= -->


<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <br>
        <div class="section-title">
            <h2>Contact</h2>
            <p>サービスや採用、メディア取材等のお問い合わせはこちらのフォームからお願いいたします。</p>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="info-box mb-4">
                    <i class="bx bx-map"></i>
                    <h3>Our Address</h3>
                    <p>1-19-8, Kitahorie, Nishi-ku, Osaka-city, Osaka</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email Us</h3>
                    <p>t_ogura@jobins.jp</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Call Us</h3>
                    <p>06-6567-9460</p>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-6">
                <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d140486.89064982085!2d135.32691743281862!3d34.714534730891685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e71d2942f2d7%3A0x6208c7242f57dea7!2z5qCq5byP5Lya56S-Sm9CaW5z!5e0!3m2!1sja!2sjp!4v1652761262004!5m2!1sja!2sjp" width="100%" height="384" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

            <div class="col-lg-6">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>

        </div>

    </div>
</section>
<!-- ======= Contact Section END ======= -->

<footer>
    <?php include "footer.php"; ?>

    <script>
        function reloadData(){
            $.get("tableData.php").then(
                function(response){
                    $("#ajaxLoad").html(response)
                }
            )
        }
        $(document).ready(function(){
            reloadData();
        });
    </script>

    <?php
    if(!isset($_SESSION["user_name"])) {
        header("Location: optionPages/ban.php");} ?>

</footer>
</html>