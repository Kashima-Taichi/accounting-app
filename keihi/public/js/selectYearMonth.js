$(function() {
    /*
    * 経費計上明細の年月選択ページにて、選択して下さいの状態で項目が選ばれた状態で
    * データが送信されてしまった場合にその送信を無効にする
    */
    $('#submit').on('click', function(e){
        var $yearVal = $('#year').val();
        var $monthVal = $('#month').val();

        if ($yearVal == 'select') {
            alert('経費を計上した年度を選択して下さい');
            e.preventDefault();
        }

        if ($monthVal == 'select') {
            alert('経費を計上した月を選択して下さい');
            e.preventDefault();
        }

    });
});