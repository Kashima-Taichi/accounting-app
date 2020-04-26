<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/js/selectYearMonth.js') }}"></script>
    <title>経費計上円グラフの出力</title>
</head>
<body>
    <div class="recform">
    <h2>経費計上円グラフの出力</h2>
    <form action="/costgraph/outputpiechart" method="post">
        @csrf
        @include('components.selectYearMonthDb')
        <br>
        <br>
        <input class="submit" id="submit" type="submit" value="指定した年月の経費計上データの円グラフを出力する">
        <br>
    </form>
    </div>
    <br>
    @include('components.linkToTop')
</body>
</html>