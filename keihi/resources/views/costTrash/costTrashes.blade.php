<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <title>削除済の経費データの一覧</title>
</head>
<body>
    <h2>経費計上ゴミ箱データ</h2>
    <table border="1" style="border-collapse: collapse" align="center">
    <tr>
    <th class="id">id</th>
    <th class="accName">科目名称</th>
    <th class="price">金額</th>
    <th class="journal">摘要</th>
    <th class="day">計上日</th>
    </tr>
        @foreach ($trashes as $trash)
            <tr>
                <td>{{ $trash->id }}</td>
                <td>{{ $trash->accountName }}</td>
                <td><?php echo number_format($trash->price); ?></td>
                <td>{{ $trash->journal }}</td>
                <td>{{ $trash->day }}</td>
            </tr>
        @endforeach
    </table>
    <br>
    @include('components.linkToTop')
</body>
</html>
