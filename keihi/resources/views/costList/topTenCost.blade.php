<!DOCTYPE html>
<html lang="ja">
<head>
    @include('components.header', ['title' => '経費計上金額トップ10'])
</head>
<body>
    <h2>{{ $selectedYear }}年{{ $selectedMonth }}月経費計上金額トップ10</h2>
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
        @foreach ($topTenCosts as $topTenCost)
            <tr>
                <td>{{ $topTenCost->id }}</td>
                <td>{{ $topTenCost->accountName }}</td>
                <td><?php echo number_format($topTenCost->price); ?></td>
                <td>{{ $topTenCost->journal }}</td>
                <td>{{ $topTenCost->year }}</td>
                <td>{{ $topTenCost->month }}</td>
                <td>{{ $topTenCost->day }}</td>
            </tr>
        @endforeach
    </table>
    <br>
    @include('components.linkToTop')
</body>
</html>
