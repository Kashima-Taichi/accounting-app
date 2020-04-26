<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/costrec.css') }}">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/js/costedit.js') }}"></script>
    <script src="{{ asset('/js/isNumeric.js') }}"></script>
    <title>経費実績の修正</title>
</head>
<body>
    <div class="recform">
    <h2>計上された経費の修正を行う</h2>
    <br>
    <form action="/costlist/costeditdone" method="post">
        @csrf
        <p>必要であれば科目を選択し直して下さい</p>
        <p>現在の勘定科目：{{ $record->accountName }}</p>
        <select class="account" name="accountName">
            @foreach(config('accountMst') as $key => $value)
                <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
        </select>
        <br>
        <br>
        <p>金額を入力し直して下さい</p>
        <p>現在の計上金額：{{ $record->price }}</p>
        <input type="text" id="price" name="price" class="price numeric">
        <br>
        <br>
        <p>摘要の修正もできます:</p>
        <textarea name="journal" id="journal" class="journal">{{ $record->journal }}</textarea>
        <br>
        <br>
        <input type="hidden" name="id" value="{{ $record->id }}">
        <input class="submit" id="submit" type="submit" value="経費の修正を行う">
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