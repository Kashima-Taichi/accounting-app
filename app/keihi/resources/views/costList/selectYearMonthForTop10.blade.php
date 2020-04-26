<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/js/selectYearMonth.js') }}"></script>
    <title>経費計上金額トップ10を見る</title>
</head>
<body>
    <div class="recform">
    <h2>経費計上金額トップ10を見る</h2>
    <form action="/costlist/toptencostslist" method="post">
        @csrf
        @include('components.selectYearMonthDb')
        <br>
        <p>金額のソート基準を選択してください</p>
        <select name="ascdesc" id="asc-desc">
            <option value="select">選択してください</option>
            <option value="asc">昇順</option>
            <option value="desc">降順</option>
        </select>
        <br>
        <br>
        <input class="submit" id="submit" type="submit" value="指定した年月の経費計上リストを出力する">
        <br>
    </form>
    </div>
    <br>
    @include('components.linkToTop')
</body>
</html>