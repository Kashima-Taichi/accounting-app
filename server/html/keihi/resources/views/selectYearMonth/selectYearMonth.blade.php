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
        @if ($action != '/costgraph/outputlinegraphMonthAccount')
        @include('components.selectYearMonthDb')
        @endif

        @if ($action == '/costlist/toptencostslist')
        <br>
        <p>金額のソート基準を選択してください</p>
        <select name="ascdesc" id="asc-desc">
            <option value="select">選択してください</option>
            <option value="asc">昇順</option>
            <option value="desc">降順</option>
        </select>
        <br>
        @endif

        @if ($action == '/costaccountcontent/costaccountcontent' || '/costgraph/selectyearmonthlinegraphmonthaccount')
        <br>
        <p>経費計上科目を選択して下さい</p>
        <select class="account" name="account" id="account">
            <option value="select">選択して下さい</option>
            @foreach ($accounts as $account)
                <option value="{{ $account->accountName }}">{{ $account->accountName }}</option>
            @endforeach
        </select>
        <br>
        @endif

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