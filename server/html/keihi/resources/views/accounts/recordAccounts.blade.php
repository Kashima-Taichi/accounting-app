<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <title>勘定科目の登録</title>
</head>
<body>
    <div class="recform">
    @if (count($errors) > 0)
        <h3>入力内容に問題があります</h3>
    @endif
    <h2>勘定科目の登録を行う</h2>
        <form action="/accounts/recordaccountsdone" method="post">
            @csrf

            <div class="account-alpha">
                <p>勘定科目を小文字のアルファベットで入力して下さい</p>
                <input type="text" id="accountAlpha" name="accountAlpha" class="accountAlpha">
            </div>

            <div class="account-kanzi">
                <p>勘定科目を漢字で入力して下さい</p>
                <input type="text" id="accountKanji" name="accountKanji" class="accountKanji">
            </div>

            <br>
            <button class="submit" id="submit" type="submit">送信する</button>
            <div class="display-result">
                {{ $msg ?? '' }}
            </div>
        </form>
        @include('components.linkToTop')
    </div>
</body>
</html>