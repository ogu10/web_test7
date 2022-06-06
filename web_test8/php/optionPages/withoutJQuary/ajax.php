<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<!--<script src="ajax.js"></script>-->
<link rel="icon" type="image/png" sizes="192x192" href="http://localhost:8080/web_test7/web_test8/images/android-chrome-180x180.png">
</head>

<div class="cnt_area"><span class="now_cnt">0</span> / 12</div>
    <div id="name-group" class="form-group">
        <input type="text" id="name2" class="name2" name="name2" placeholder="name"></div>

<footer>
    <script>
        $(document).ready(function () {

            //Length Check
            jQuery(function($){
                //入力時のイベント
                $('#name2').keyup(function(){
                    $(".help-block3").remove();

                    //文字数を取得
                    var cnt = $(this).val().length;
                    //現在の文字数を表示
                    $('.now_cnt').text(cnt);
                    if (cnt > 12){
                        $("#name-group").append(
                            '<div class="alert alert-success help-block3" style="color: lime">' + "字数が超えてるよ 😢" + "</div>");
                    }
                });
            });
        });
    </script>
</footer>