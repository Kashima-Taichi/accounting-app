<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '5日ごとの経費計上合計金額の参照'])
</head>
<body>
    <h2>5日ごとの経費計上合計金額推移</h2>
    <table border="1" style="border-collapse: collapse" align="center">
        <tr>
            <th style="width:130px;">年月</th>
            <th style="width:130px;">5日</th>
            <th style="width:130px;">10日</th>
            <th style="width:130px;">15日</th>
            <th style="width:130px;">20日</th>
            <th style="width:130px;">25日</th>
            <th style="width:130px;">トータル</th>
        </tr>
        @foreach ($costs as $key => $val)
        <tr>
            <td>{{ $key }}</td>
            @for ($i = 1; $i <= 6; $i++)
            <td>{{ number_format($costs[$key][$i]) }}円</td>
            @endfor
        </tr>
        @endforeach
    </table>
    <br>
    <br>
    @include('components.linkToTop')
</body>
</html>
