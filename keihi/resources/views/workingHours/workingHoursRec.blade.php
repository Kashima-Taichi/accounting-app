<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <title>稼働時間の計上</title>
</head>
<body>
    @if (count($errors) > 0)
        <h3>入力内容に問題があります</h3>
    @endif
    @if (!empty($notice))
        <h3>ご入力されました年月は登録されております</h3>
    @endif
    <h2>稼働時間の計上を行う</h2>
    <form action="/workinghours/workinghoursrec" method="post">
        @csrf
        <p>年数を入力してください</p>
        {{ Form::text('year', date('Y'), ['class' => 'year', 'id' => 'year']) }}
        <p>月数を入力してください</p>
        {{ Form::text('month', date('n'), ['class' => 'month', 'id' => 'month']) }}
        <p>定時間を入力してください</p>
        {{ Form::text('fixedTime', null, ['id' => 'fixed-time', 'class' => 'fixed-time']) }}
        <p>残業時間を入力してください</p>
        {{ Form::text('overTime', null, ['id' => 'over-time', 'class' => 'over-time']) }}
        <br>
        {{ Form::hidden('yearMonth', '') }}
        {{ Form::button('送信する', ['class' => 'submit', 'id' => 'submit', 'type' => 'submit']) }}
        <br>
        <br>
        <div class="display-result">
            {{ $msg ?? '' }}
        </div>
    </form>
        <br>
        @include('components.linkToTop')
    </div>
</body>
</html>