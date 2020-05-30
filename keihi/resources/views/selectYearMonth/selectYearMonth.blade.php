<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/js/selectYearMonth.js') }}"></script>
    <title>{{ $title }}</title>
</head>
<body>
    <div class="recform">
    <h2>{{ $h2 }}</h2>
    <form action="{{ $action }}" method="post">
        @csrf

        <!-- 抽出条件に年月が不要な場合 -->
        @if ($action != '/costgraph/outputlinegraphMonthAccount')
        @include('components.selectYearMonthDb')
        @endif

        <!-- 抽出条件に昇順降順がある場合 -->
        @if ($action == '/costlist/toptencostslist')
        @include('components.selectAscDesc')
        @endif

        <!-- 抽出条件に科目がある場合 -->
        @if (!empty($accounts))
        @include('components.selectAccount')
        @endif

        <!-- 抽出条件に日付がある場合 -->
        @if ($action == '/costlist/costlist')
        @include('components.selectDayDb')
        @endif
        <br>
        <br>
        <input class="submit" id="submit" type="submit" value="{{ $inputVal }}">
        <br>
    </form>
    </div>
    <br>
    @include('components.linkToTop')
</body>
</html>