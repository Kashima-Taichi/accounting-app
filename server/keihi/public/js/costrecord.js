$(function () {
    // 経費計上の入力チェック
    $('#submit').on('click', function (e) {
        // 勘定科目が未選択ならアラート + データ送信キャンセル
        var $accountVal = $('#account').val();
        if ($accountVal == '選択してください') {
            alert('勘定科目を選択してください');
            e.preventDefault();
        }

        // 金額が未入力ならアラート + データ送信キャンセル
        var $priceVal = $('#price').val();
        if ($priceVal == "") {
            alert('経費金額を入力してください');
            e.preventDefault();
        }

        // 金額欄に入力された整数のチェック
        var $check = $priceVal.match(/^-?[1-9][0-9]+$/);
        if ($check === null) {
            alert('金額を0から始めると経費の計上は行えません');
            e.preventDefault();
        }

        // 摘要が未入力ならアラート + データ送信キャンセル
        var $journalVal = $('#journal').val();
        if ($journalVal == "") {
            alert('摘要を入力してください');
            e.preventDefault();
        }

    });

});