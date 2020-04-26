<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <title>稼働時間の修正</title>
</head>
<body>
    @if (count($errors) > 0)
        <h3>入力内容に問題があります</h3>
    @endif
    <h2>{{ $wantEditHours->year }}年{{ $wantEditHours->month }}月度の稼働時間の修正を行う</h2>
    <form action="/workinghours/workinghourseditdone" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $wantEditHours->id }}">
        <input type="hidden" name="year" value="{{ $wantEditHours->year }}">
        <input type="hidden" name="year" value="{{ $wantEditHours->month }}">
        <p>定時間を入力してください</p>
        <input type="text" id="fixed-time" name="fixedTime" class="fixed-time" value="{{ $wantEditHours->fixedTime }}">
        <p>残業時間を入力してください</p>
        <input type="text" id="over-time" name="overTime" class="over-time" value="{{ $wantEditHours->overTime }}">
        <br>
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