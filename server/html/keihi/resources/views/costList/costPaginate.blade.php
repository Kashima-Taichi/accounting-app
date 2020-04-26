<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/style/costpaginate.css') }}">
    <link rel="stylesheet" href="{{ asset('/style/common.css') }}">
    <title>計上された全ての経費明細の参照</title>
</head>
<body>
    <h2>全ての計上された経費計上一覧</h2>
    <table border="1" style="border-collapse: collapse">
    <tr>
    <th class="id">id</th>
    <th class="accName">科目名称</th>
    <th class="price">金額</th>
    <th class="journal">摘要</th>
    <th class="year">計上年</th>
    <th class="month">計上月</th>
    <th class="day">計上日</th>
    </tr>
        @foreach ($costs as $cost)
            <tr>
                <td>{{ $cost->id }}</td>
                <td>{{ $cost->accountName }}</td>
                <td><?php echo number_format($cost->price); ?></td>
                <td>{{ $cost->journal }}</td>
                <td>{{ $cost->year }}</td>
                <td>{{ $cost->month }}</td>
                <td>{{ $cost->day }}</td>
            </tr>
        @endforeach
    </table>
    {{ $costs->links() }}
    <br>
    @include('components.linkToTop')
</body>
</html>
