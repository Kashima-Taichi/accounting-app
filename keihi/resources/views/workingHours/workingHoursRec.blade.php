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
        <input type="text" id="year" name="year" class="year">
        <p>月数を入力してください</p>
        <input type="text" id="month" name="month" class="month">
        <p>定時間を入力してください</p>
        <input type="text" id="fixed-time" name="fixedTime" class="fixed-time">
        <p>残業時間を入力してください</p>
        <input type="text" id="over-time" name="overTime" class="over-time">
        <br>
        <input type="hidden" name="yearMonth" value="">
        <input class="submit" id="submit" type="submit" value="送信する">
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