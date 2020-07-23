<!DOCTYPE html>
<html lang="ja">
<head>
@include('components.header', ['title' => '勘定科目の登録'])
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
                {{ Form::text('accountAlpha', null, ['class' => 'accountAlpha', 'id' => 'accountAlpha']) }}
            </div>

            <div class="account-kanzi">
                <p>勘定科目を漢字で入力して下さい</p>
                {{ Form::text('accountKanji', null, ['class' => 'accountKanji', 'id' => 'accountKanji']) }}
            </div>

            <br>
            {{ Form::button('送信する', ['class' => 'submit', 'id' => 'submit', 'type' => 'submit']) }}
            <div class="display-result">
                {{ $msg ?? '' }}
            </div>
        </form>
        @include('components.linkToTop')
    </div>
</body>
</html>