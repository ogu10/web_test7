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

