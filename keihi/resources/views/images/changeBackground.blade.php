<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <title>背景画像の変更</title>
</head>
<body>
    <div class="recform">
    @if (count($errors) > 0)
        <h3>入力内容に問題があります</h3>
    @endif
    <h2>背景画像の変更を行う</h2>
    <form action="changebackgrounddone" method="post" enctype="multipart/form-data">
    <!-- URLの重複 -->
        @csrf

        <div class="image-input">
            <p>画像をセットしてください：</p>
            {{ Form::file('image', ['class' => 'set-image', 'id' => 'background-image']) }}
        </div>        

        <br>
        {{ Form::button('送信する', ['class' => 'submit', 'id' => 'submit', 'type' => 'submit']) }}
        <br>
        <br>
        <div class="display-result">
            {{ $msg ?? '' }}
        </div>
        <br>
        <br>
    </form>
        @include('components.linkToTop')
    </div>
</body>
</html>