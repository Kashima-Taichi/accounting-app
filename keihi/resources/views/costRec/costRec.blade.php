<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/costrec.css') }}">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/js/costrecord.js') }}"></script>
    <title>経費の計上</title>
</head>
<body>
    <div class="recform">
    @if (count($errors) > 0)
        <h3>入力内容に問題があります</h3>
    @endif
    <h2>経費の計上を行う</h2>
    <form action="/costrec/costrec" method="post">
        @csrf
        <p>科目を選択して下さい</p>
        <select class="account" name="accountName" id="account">
            @foreach(config('accountMst') as $key => $value)
                <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
        </select>
        <p>金額を入力して下さい</p>
        <input type="text" id="price" name="price" class="price numeric">
        <p>摘要の入力:</p>
        <textarea name="journal" id="journal" class="journal"></textarea>
        <input type="hidden" name="year" value="<?= date('Y'); ?>">
        <input type="hidden" name="month" value="<?= date('m'); ?>">
        <input type="hidden" name="day" value="<?= date('d'); ?>">
        <br>
        <input class="submit" id="submit" type="submit" value="送信する">
        <div class="display-result">
            {{ $msg ?? '' }}
        </div>
    </form>
        @include('components.linkToTop')
    </div>
</body>
</html>