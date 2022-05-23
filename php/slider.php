<html>
<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.slider').bxSlider({
                auto: true,
                pause: 2000,
            });
        });
    </script>

</head>
<body>

<div class="slider">
    <div><img src="images/2_1.jpg" alt="画像の説明" style="width: 800px; height: 500px"></div>
    <div><img src="images/2_2.jpg" alt="画像の説明" style="width: 800px; height: 500px"></div>
    <div><img src="images/2_3.jpg" alt="画像の説明" style="width: 800px; height: 500px"></div>
    <div><img src="images/2_4.jpg" alt="画像の説明" style="width: 800px; height: 500px"></div>
</div>

</body>

<style type="text/css">
    .bx-wrapper {
        margin: 15% !important;
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: none !important;
        background: none !important;
    }

    .bxslider img{
        width: 100% !important;
        height: 100% !important;
    }

    .bx-wrapper .bx-prev {
        visibility: hidden !important;
    }
    .bx-wrapper .bx-next {
        visibility: hidden !important;
    }
</style>
<footer>
    <link href="css/styleSheet.css" rel="stylesheet">
</footer>
</html>