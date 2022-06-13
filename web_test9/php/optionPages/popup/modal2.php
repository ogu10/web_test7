<!doctype html>
<html lang="ja">

<head>
    <title>Bootstrap4モーダルサンプル</title>
    <!-- 必要なメタタグ -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
<h1>モーダルサンプル</h1>
<!--ボタンの設定 -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalForm">
    モーダル展開ボタン
</button>
<!-- Modal の中身 -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal ヘッダー -->
            <div class="modal-header">
                　<h5 class="modal-title" id="Modal">モーダルタイトル</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <form role="form" id="form1">
                <!-- Modal ボディー -->
                <div class="modal-body">
                    <label>XXXを入力してください</label>

                    <div class="form-group">
                        <label for="cusno">XXXX数</label>
                        <input type="text" name="NumberWinners" id="NumberWinners">　　
                    </div>
                </div>
                <!-- Modal フッター -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-primary" id="chgDateSub">実行する
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>



<script>
    // 「実行する」ボタンをクリックしたとき
    $('#chgDateSub').on('click', function() {
        console.log('click');
        var NumberWinners = $('#NumberWinners').val();
        console.log(NumberWinners);
        $("#modalForm").modal('hide');
    });

    var $fm = $('<form />', {
        method: 'post',
        action: 'action_xxxx.php',
        target: '_blank',
    });
    $fm.append($('<input />', {
        type: 'hidden',
        name: 'data_id',
        value: $(this).data('id'),
    }));
    $fm.appendTo(document.body);
    $fm.submit();
    $fm.remove();
</script>