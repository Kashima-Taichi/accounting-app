<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/js/selectYearMonth.js') }}"></script>
    <title>個人PLの参照</title>
</head>
<body>
    <div class="recform">
    <h2>年月を選択してPLを出力しよう！</h2>
    <form action="/outputpl/referencepl" method="post">
        @csrf
        @include('components.selectYearMonthDB')
        <br>
        <br>
        <input class="submit" id="submit" type="submit" value="PL出力">
        <br>
    </form>
    </div>
    <br>
    @include('components.linkToTop')
</body>
</html>