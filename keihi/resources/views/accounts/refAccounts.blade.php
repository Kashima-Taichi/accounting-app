<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/accountMst.css') }}">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <title>勘定科目マスタ</title>
</head>
<body>
    <h2>全ての計上された経費計上一覧</h2>
    <table border="1" style="border-collapse: collapse" align="center">
    <tr>
    <th class="id">id</th>
    <th class="alpha">アルファベット</th>
    <th class="kanji">漢字</th>
    </tr>
        @foreach ($accountsData as $accountsDatum)
            <tr>
                <td>{{ $accountsDatum->id }}</td>
                <td>{{ $accountsDatum->accountAlpha }}</td>
                <td>{{ $accountsDatum->accountKanji }}</td>
            </tr>
        @endforeach
    </table>
    {{ $accountsData->links() }}
    <br>
    @include('components.linkToTop')
</body>
</html>