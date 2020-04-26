<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/js/selectYearMonth.js') }}"></script>
    <title>科目別経費計上実績の検索</title>
</head>
<body>
    <div class="recform">
    <h2>経費計上実績科目別抽出</h2>
    <form action="/costaccountcontent/costaccountcontent" method="post">
        @csrf
        @include('components.selectYearMonthDB')
        <br>
        <p>経費計上科目を選択して下さい</p>
        <select class="account" name="account" id="account">
            <option value="select">選択して下さい</option>
            @foreach ($accounts as $account)
                <option value="{{ $account->accountName }}">{{ $account->accountName }}</option>
            @endforeach
        </select>
        <br>
        <br>
        <input class="submit" id="submit" type="submit" value="指定した条件に基づいて経費計上実績を参照する">
        <br>
    </form>
    </div>
    <br>
    @include('components.linkToTop')
</body>
</html>